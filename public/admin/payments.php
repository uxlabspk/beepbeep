<?php
require_once dirname(__DIR__, 2) . '/auth/middleware.php';
requireAdmin();

$db = getDB();

// ---------- POST handlers ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        setFlash('error', 'Invalid security token.');
        redirect('/admin/payments.php');
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $userId    = (int) ($_POST['user_id'] ?? 0);
        $bookingId = $_POST['booking_id'] !== '' ? (int) $_POST['booking_id'] : null;
        $amount    = (float) ($_POST['amount'] ?? 0);
        $method    = $_POST['method'] ?? 'cash';
        $status    = $_POST['status'] ?? 'completed';
        $reference = trim($_POST['transaction_reference'] ?? '');
        $notes     = trim($_POST['notes'] ?? '');
        $paidAt    = $_POST['paid_at'] ?: null;

        if (!$userId || $amount <= 0) {
            setFlash('error', 'User and a positive amount are required.');
            redirect('/admin/payments.php');
        }

        $stmt = $db->prepare("INSERT INTO payments (user_id, booking_id, amount, method, status, transaction_reference, notes, paid_at) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$userId, $bookingId, $amount, $method, $status, $reference ?: null, $notes ?: null, $paidAt]);

        // Update booking payment fields if linked
        if ($bookingId && $status === 'completed') {
            $db->prepare("UPDATE bookings SET amount_paid = amount_paid + ?, payment_status = CASE WHEN amount_paid + ? >= total_amount THEN 'paid' ELSE 'partial' END WHERE id = ?")
               ->execute([$amount, $amount, $bookingId]);
        }

        setFlash('success', 'Payment recorded.');
        redirect('/admin/payments.php');
    }

    if ($action === 'update_status') {
        $id     = (int) ($_POST['payment_id'] ?? 0);
        $status = $_POST['status'] ?? '';
        if (in_array($status, ['pending','completed','failed','refunded'], true)) {
            $db->prepare("UPDATE payments SET status = ? WHERE id = ?")->execute([$status, $id]);
            setFlash('success', 'Payment status updated.');
        }
        redirect('/admin/payments.php');
    }

    if ($action === 'delete') {
        $id = (int) ($_POST['payment_id'] ?? 0);
        $db->prepare("DELETE FROM payments WHERE id = ?")->execute([$id]);
        setFlash('success', 'Payment deleted.');
        redirect('/admin/payments.php');
    }
}

// ---------- Filters ----------
$statusFilter = $_GET['status'] ?? '';
$methodFilter = $_GET['method'] ?? '';

$where  = [];
$params = [];
if (in_array($statusFilter, ['pending','completed','failed','refunded'], true)) {
    $where[]  = "p.status = ?";
    $params[] = $statusFilter;
}
if (in_array($methodFilter, ['cash','card','bank_transfer','online'], true)) {
    $where[]  = "p.method = ?";
    $params[] = $methodFilter;
}
$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$payments = $db->prepare("
    SELECT p.*, u.first_name, u.last_name, u.email
    FROM payments p
    JOIN users u ON u.id = p.user_id
    $whereSQL
    ORDER BY p.created_at DESC
    LIMIT 200
");
$payments->execute($params);
$payments = $payments->fetchAll();

// Summary stats
$totalCompleted = $db->query("SELECT COALESCE(SUM(amount),0) FROM payments WHERE status = 'completed'")->fetchColumn();
$totalPending   = $db->query("SELECT COALESCE(SUM(amount),0) FROM payments WHERE status = 'pending'")->fetchColumn();
$totalRefunded  = $db->query("SELECT COALESCE(SUM(amount),0) FROM payments WHERE status = 'refunded'")->fetchColumn();

$allUsers    = $db->query("SELECT id, first_name, last_name FROM users ORDER BY first_name")->fetchAll();
$allBookings = $db->query("SELECT id FROM bookings ORDER BY id DESC LIMIT 500")->fetchAll();

$adminPageTitle  = 'Payments';
$adminActivePage = 'payments';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<!-- Summary cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-6">
  <?php
  $summaries = [
    ['label'=>'Total Collected', 'value'=>'£'.number_format($totalCompleted,2), 'color'=>'text-green-600','bg'=>'bg-green-50'],
    ['label'=>'Pending',         'value'=>'£'.number_format($totalPending,2),   'color'=>'text-yellow-600','bg'=>'bg-yellow-50'],
    ['label'=>'Refunded',        'value'=>'£'.number_format($totalRefunded,2),  'color'=>'text-red-600','bg'=>'bg-red-50'],
  ];
  foreach ($summaries as $s): ?>
  <div class="<?php echo $s['bg']; ?> rounded-xl p-5">
    <p class="text-sm text-gray-600"><?php echo $s['label']; ?></p>
    <p class="text-2xl font-bold <?php echo $s['color']; ?> mt-1"><?php echo $s['value']; ?></p>
  </div>
  <?php endforeach; ?>
</div>

<!-- Toolbar -->
<div class="flex flex-col sm:flex-row gap-3 mb-6">
  <form method="GET" class="flex gap-2 flex-wrap flex-1">
    <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
      <option value="">All statuses</option>
      <?php foreach (['pending','completed','failed','refunded'] as $s): ?>
      <option value="<?php echo $s; ?>" <?php echo $statusFilter===$s?'selected':''; ?>><?php echo ucfirst($s); ?></option>
      <?php endforeach; ?>
    </select>
    <select name="method" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
      <option value="">All methods</option>
      <?php foreach (['cash','card','bank_transfer','online'] as $m): ?>
      <option value="<?php echo $m; ?>" <?php echo $methodFilter===$m?'selected':''; ?>><?php echo ucfirst(str_replace('_',' ',$m)); ?></option>
      <?php endforeach; ?>
    </select>
    <button type="submit" class="px-4 py-2 bg-brand text-white rounded-lg text-sm hover:bg-brand-dark">Filter</button>
    <?php if ($statusFilter || $methodFilter): ?>
    <a href="/admin/payments.php" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm hover:bg-gray-200">Clear</a>
    <?php endif; ?>
  </form>
  <button onclick="document.getElementById('addPaymentModal').classList.remove('hidden')"
          class="px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-colors">
    + Record Payment
  </button>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wide">
        <tr>
          <th class="px-5 py-3 text-left">#</th>
          <th class="px-5 py-3 text-left">User</th>
          <th class="px-5 py-3 text-left">Booking</th>
          <th class="px-5 py-3 text-left">Amount</th>
          <th class="px-5 py-3 text-left">Method</th>
          <th class="px-5 py-3 text-left">Reference</th>
          <th class="px-5 py-3 text-left">Paid At</th>
          <th class="px-5 py-3 text-left">Status</th>
          <th class="px-5 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php if (empty($payments)): ?>
        <tr><td colspan="9" class="px-5 py-10 text-center text-gray-400">No payments found.</td></tr>
        <?php else: foreach ($payments as $p): ?>
        <?php
        $payColors = ['pending'=>'bg-yellow-100 text-yellow-700','completed'=>'bg-green-100 text-green-700','failed'=>'bg-red-100 text-red-700','refunded'=>'bg-gray-100 text-gray-600'];
        $pc = $payColors[$p['status']] ?? 'bg-gray-100 text-gray-600';
        ?>
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-3 text-gray-400">#<?php echo $p['id']; ?></td>
          <td class="px-5 py-3">
            <p class="font-medium text-gray-800"><?php echo e($p['first_name'].' '.$p['last_name']); ?></p>
            <p class="text-xs text-gray-400"><?php echo e($p['email']); ?></p>
          </td>
          <td class="px-5 py-3 text-gray-600"><?php echo $p['booking_id'] ? '#'.$p['booking_id'] : '—'; ?></td>
          <td class="px-5 py-3 font-semibold text-gray-800">£<?php echo number_format($p['amount'],2); ?></td>
          <td class="px-5 py-3 text-gray-600"><?php echo ucfirst(str_replace('_',' ',$p['method'])); ?></td>
          <td class="px-5 py-3 text-gray-500 font-mono text-xs"><?php echo $p['transaction_reference'] ? e($p['transaction_reference']) : '—'; ?></td>
          <td class="px-5 py-3 text-gray-500"><?php echo $p['paid_at'] ? date('d M Y', strtotime($p['paid_at'])) : '—'; ?></td>
          <td class="px-5 py-3">
            <form method="POST" class="inline">
              <input type="hidden" name="csrf_token"  value="<?php echo e($adminCsrf); ?>"/>
              <input type="hidden" name="action"      value="update_status"/>
              <input type="hidden" name="payment_id"  value="<?php echo (int)$p['id']; ?>"/>
              <select name="status" onchange="this.form.submit()"
                      class="text-xs px-2 py-1 border-0 rounded-full font-medium cursor-pointer <?php echo $pc; ?> focus:outline-none">
                <?php foreach (['pending','completed','failed','refunded'] as $s): ?>
                <option value="<?php echo $s; ?>" <?php echo $p['status']===$s?'selected':''; ?>><?php echo ucfirst($s); ?></option>
                <?php endforeach; ?>
              </select>
            </form>
          </td>
          <td class="px-5 py-3">
            <form method="POST" class="inline">
              <input type="hidden" name="csrf_token"  value="<?php echo e($adminCsrf); ?>"/>
              <input type="hidden" name="action"      value="delete"/>
              <input type="hidden" name="payment_id"  value="<?php echo (int)$p['id']; ?>"/>
              <button type="submit" data-confirm="Delete payment #<?php echo $p['id']; ?>?"
                      class="text-xs px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Add Payment Modal -->
<div id="addPaymentModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between sticky top-0 bg-white">
      <h2 class="font-semibold text-gray-800">Record Payment</h2>
      <button onclick="document.getElementById('addPaymentModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <form method="POST" class="px-6 py-4 space-y-4">
      <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
      <input type="hidden" name="action"     value="create"/>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">User *</label>
        <select name="user_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
          <option value="">— Select user —</option>
          <?php foreach ($allUsers as $u): ?>
          <option value="<?php echo (int)$u['id']; ?>"><?php echo e($u['first_name'].' '.$u['last_name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Booking ID (optional)</label>
        <input type="number" name="booking_id" placeholder="Leave blank if not linked"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Amount (£) *</label>
        <input type="number" name="amount" step="0.01" min="0.01" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Method</label>
          <select name="method" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="cash">Cash</option>
            <option value="card">Card</option>
            <option value="bank_transfer">Bank Transfer</option>
            <option value="online">Online</option>
          </select>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Status</label>
          <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="completed" selected>Completed</option>
            <option value="pending">Pending</option>
            <option value="failed">Failed</option>
            <option value="refunded">Refunded</option>
          </select>
        </div>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Transaction Reference</label>
        <input type="text" name="transaction_reference" placeholder="Optional"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Paid At</label>
        <input type="datetime-local" name="paid_at"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Notes</label>
        <textarea name="notes" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 resize-none"></textarea>
      </div>
      <div class="flex justify-end gap-3 pt-2">
        <button type="button" onclick="document.getElementById('addPaymentModal').classList.add('hidden')"
                class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
        <button type="submit" class="px-4 py-2 text-sm text-white bg-brand rounded-lg hover:bg-brand-dark">Record</button>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('addPaymentModal').addEventListener('click', function(e) {
  if (e.target === this) this.classList.add('hidden');
});
</script>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
