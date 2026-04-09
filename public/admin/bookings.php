<?php
require_once dirname(__DIR__, 2) . '/auth/middleware.php';
requireAdmin();

$db = getDB();

// ---------- POST handlers ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        setFlash('error', 'Invalid security token.');
        redirect('/admin/bookings.php');
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'update_status') {
        $id     = (int) ($_POST['booking_id'] ?? 0);
        $status = $_POST['status'] ?? '';
        $validStatuses = ['pending','confirmed','completed','cancelled','no_show'];
        if (in_array($status, $validStatuses, true)) {
            $db->prepare("UPDATE bookings SET status = ? WHERE id = ?")->execute([$status, $id]);
            setFlash('success', 'Booking status updated.');
        }
        redirect('/admin/bookings.php' . ($_GET ? '?' . http_build_query($_GET) : ''));
    }

    if ($action === 'update_booking') {
        $id             = (int) ($_POST['booking_id'] ?? 0);
        $instructorId   = $_POST['instructor_id'] !== '' ? (int) $_POST['instructor_id'] : null;
        $courseId       = $_POST['course_id'] !== '' ? (int) $_POST['course_id'] : null;
        $lessonDate     = $_POST['lesson_date'] ?: null;
        $startTime      = $_POST['start_time'] ?: null;
        $duration       = (int) ($_POST['duration_minutes'] ?? 60);
        $pickup         = trim($_POST['pickup_location'] ?? '');
        $notes          = trim($_POST['notes'] ?? '');
        $totalAmount    = (float) ($_POST['total_amount'] ?? 0);
        $amountPaid     = (float) ($_POST['amount_paid'] ?? 0);
        $paymentStatus  = $_POST['payment_status'] ?? 'unpaid';
        $status         = $_POST['status'] ?? 'pending';

        $stmt = $db->prepare("UPDATE bookings SET instructor_id=?, course_id=?, lesson_date=?, start_time=?, duration_minutes=?, pickup_location=?, notes=?, total_amount=?, amount_paid=?, payment_status=?, status=? WHERE id=?");
        $stmt->execute([$instructorId, $courseId, $lessonDate, $startTime, $duration, $pickup ?: null, $notes ?: null, $totalAmount, $amountPaid, $paymentStatus, $status, $id]);
        setFlash('success', 'Booking updated.');
        redirect('/admin/bookings.php');
    }

    if ($action === 'delete') {
        $id = (int) ($_POST['booking_id'] ?? 0);
        $db->prepare("DELETE FROM bookings WHERE id = ?")->execute([$id]);
        setFlash('success', 'Booking deleted.');
        redirect('/admin/bookings.php');
    }
}

// ---------- Filters ----------
$statusFilter = $_GET['status'] ?? '';
$search       = trim($_GET['search'] ?? '');

$where  = [];
$params = [];
$validStatuses = ['pending','confirmed','completed','cancelled','no_show'];

if (in_array($statusFilter, $validStatuses, true)) {
    $where[]  = "b.status = ?";
    $params[] = $statusFilter;
}
if ($search !== '') {
    $where[]  = "(u.first_name LIKE ? OR u.last_name LIKE ? OR u.email LIKE ?)";
    $like     = '%' . $search . '%';
    $params[] = $like; $params[] = $like; $params[] = $like;
}

$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$bookings = $db->prepare("
    SELECT b.*,
           u.first_name, u.last_name, u.email,
           c.name AS course_name,
           CONCAT(iu.first_name, ' ', iu.last_name) AS instructor_name
    FROM bookings b
    JOIN users u ON u.id = b.user_id
    LEFT JOIN courses c ON c.id = b.course_id
    LEFT JOIN instructors i ON i.id = b.instructor_id
    LEFT JOIN users iu ON iu.id = i.user_id
    $whereSQL
    ORDER BY b.created_at DESC
    LIMIT 200
");
$bookings->execute($params);
$bookings = $bookings->fetchAll();

// For edit modal dropdowns
$courses     = $db->query("SELECT id, name FROM courses WHERE is_active = 1 ORDER BY name")->fetchAll();
$instructors = $db->query("SELECT i.id, CONCAT(u.first_name,' ',u.last_name) AS name FROM instructors i JOIN users u ON u.id = i.user_id WHERE i.is_active = 1 ORDER BY u.first_name")->fetchAll();

$adminPageTitle  = 'Bookings';
$adminActivePage = 'bookings';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<!-- Filters -->
<div class="flex flex-col sm:flex-row gap-3 mb-6">
  <form method="GET" class="flex gap-2 flex-wrap flex-1">
    <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Search by student…"
           class="flex-1 min-w-40 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
    <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
      <option value="">All statuses</option>
      <?php foreach ($validStatuses as $s): ?>
      <option value="<?php echo $s; ?>" <?php echo $statusFilter===$s?'selected':''; ?>><?php echo ucfirst(str_replace('_',' ',$s)); ?></option>
      <?php endforeach; ?>
    </select>
    <button type="submit" class="px-4 py-2 bg-brand text-white rounded-lg text-sm hover:bg-brand-dark">Filter</button>
    <?php if ($search || $statusFilter): ?>
    <a href="/admin/bookings.php" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm hover:bg-gray-200">Clear</a>
    <?php endif; ?>
  </form>
  <p class="text-sm text-gray-500 self-center"><?php echo count($bookings); ?> booking<?php echo count($bookings)!==1?'s':''; ?></p>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wide">
        <tr>
          <th class="px-5 py-3 text-left">#</th>
          <th class="px-5 py-3 text-left">Student</th>
          <th class="px-5 py-3 text-left">Course</th>
          <th class="px-5 py-3 text-left">Instructor</th>
          <th class="px-5 py-3 text-left">Date / Time</th>
          <th class="px-5 py-3 text-left">Amount</th>
          <th class="px-5 py-3 text-left">Payment</th>
          <th class="px-5 py-3 text-left">Status</th>
          <th class="px-5 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php if (empty($bookings)): ?>
        <tr><td colspan="9" class="px-5 py-10 text-center text-gray-400">No bookings found.</td></tr>
        <?php else: foreach ($bookings as $b): ?>
        <?php
        $statusColors = ['pending'=>'bg-yellow-100 text-yellow-700','confirmed'=>'bg-blue-100 text-blue-700','completed'=>'bg-green-100 text-green-700','cancelled'=>'bg-red-100 text-red-700','no_show'=>'bg-gray-100 text-gray-600'];
        $payColors    = ['unpaid'=>'bg-red-100 text-red-600','partial'=>'bg-yellow-100 text-yellow-700','paid'=>'bg-green-100 text-green-700','refunded'=>'bg-gray-100 text-gray-600'];
        $sc = $statusColors[$b['status']] ?? 'bg-gray-100 text-gray-600';
        $pc = $payColors[$b['payment_status']] ?? 'bg-gray-100 text-gray-600';
        ?>
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-3 text-gray-400">#<?php echo $b['id']; ?></td>
          <td class="px-5 py-3">
            <p class="font-medium text-gray-800"><?php echo e($b['first_name'].' '.$b['last_name']); ?></p>
            <p class="text-xs text-gray-400"><?php echo e($b['email']); ?></p>
          </td>
          <td class="px-5 py-3 text-gray-600"><?php echo $b['course_name'] ? e($b['course_name']) : '—'; ?></td>
          <td class="px-5 py-3 text-gray-600"><?php echo $b['instructor_name'] ? e($b['instructor_name']) : '—'; ?></td>
          <td class="px-5 py-3 text-gray-600">
            <?php echo $b['lesson_date'] ? date('d M Y', strtotime($b['lesson_date'])) : '—'; ?>
            <?php echo $b['start_time'] ? '<br><span class="text-xs text-gray-400">'.substr($b['start_time'],0,5).'</span>' : ''; ?>
          </td>
          <td class="px-5 py-3 font-medium text-gray-800">£<?php echo number_format($b['total_amount'],2); ?></td>
          <td class="px-5 py-3"><span class="px-2 py-1 rounded-full text-xs font-medium <?php echo $pc; ?>"><?php echo ucfirst($b['payment_status']); ?></span></td>
          <td class="px-5 py-3">
            <form method="POST" class="inline">
              <input type="hidden" name="csrf_token"  value="<?php echo e($adminCsrf); ?>"/>
              <input type="hidden" name="action"      value="update_status"/>
              <input type="hidden" name="booking_id"  value="<?php echo (int)$b['id']; ?>"/>
              <select name="status" onchange="this.form.submit()"
                      class="text-xs px-2 py-1 border-0 rounded-full font-medium cursor-pointer <?php echo $sc; ?> focus:outline-none">
                <?php foreach ($validStatuses as $s): ?>
                <option value="<?php echo $s; ?>" <?php echo $b['status']===$s?'selected':''; ?>><?php echo ucfirst(str_replace('_',' ',$s)); ?></option>
                <?php endforeach; ?>
              </select>
            </form>
          </td>
          <td class="px-5 py-3">
            <div class="flex gap-2">
              <button onclick='openBookingModal(<?php echo htmlspecialchars(json_encode($b), ENT_QUOTES); ?>)'
                      class="text-xs px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Edit</button>
              <form method="POST" class="inline">
                <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
                <input type="hidden" name="action"     value="delete"/>
                <input type="hidden" name="booking_id" value="<?php echo (int)$b['id']; ?>"/>
                <button type="submit" data-confirm="Delete booking #<?php echo $b['id']; ?>?"
                        class="text-xs px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Booking Edit Modal -->
<div id="bookingModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between sticky top-0 bg-white">
      <h2 class="font-semibold text-gray-800">Edit Booking</h2>
      <button onclick="closeBookingModal()" class="text-gray-400 hover:text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <form method="POST" class="px-6 py-4 space-y-4">
      <input type="hidden" name="csrf_token"  value="<?php echo e($adminCsrf); ?>"/>
      <input type="hidden" name="action"      value="update_booking"/>
      <input type="hidden" name="booking_id"  id="bkId"/>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Course</label>
          <select name="course_id" id="bkCourseId" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="">— None —</option>
            <?php foreach ($courses as $c): ?>
            <option value="<?php echo (int)$c['id']; ?>"><?php echo e($c['name']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Instructor</label>
          <select name="instructor_id" id="bkInstructorId" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="">— None —</option>
            <?php foreach ($instructors as $ins): ?>
            <option value="<?php echo (int)$ins['id']; ?>"><?php echo e($ins['name']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Lesson Date</label>
          <input type="date" name="lesson_date" id="bkLessonDate"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Start Time</label>
          <input type="time" name="start_time" id="bkStartTime"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Duration (minutes)</label>
        <input type="number" name="duration_minutes" id="bkDuration" min="30" step="30"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Pickup Location</label>
        <input type="text" name="pickup_location" id="bkPickup"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Total Amount (£)</label>
          <input type="number" name="total_amount" id="bkTotal" step="0.01" min="0"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Amount Paid (£)</label>
          <input type="number" name="amount_paid" id="bkPaid" step="0.01" min="0"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Payment Status</label>
          <select name="payment_status" id="bkPaymentStatus" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="unpaid">Unpaid</option>
            <option value="partial">Partial</option>
            <option value="paid">Paid</option>
            <option value="refunded">Refunded</option>
          </select>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Booking Status</label>
          <select name="status" id="bkStatus" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
            <option value="no_show">No Show</option>
          </select>
        </div>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Notes</label>
        <textarea name="notes" id="bkNotes" rows="3"
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 resize-none"></textarea>
      </div>
      <div class="flex justify-end gap-3 pt-2">
        <button type="button" onclick="closeBookingModal()" class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
        <button type="submit" class="px-4 py-2 text-sm text-white bg-brand rounded-lg hover:bg-brand-dark">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<script>
function openBookingModal(b) {
  document.getElementById('bkId').value            = b.id;
  document.getElementById('bkCourseId').value      = b.course_id || '';
  document.getElementById('bkInstructorId').value  = b.instructor_id || '';
  document.getElementById('bkLessonDate').value    = b.lesson_date || '';
  document.getElementById('bkStartTime').value     = b.start_time ? b.start_time.substring(0,5) : '';
  document.getElementById('bkDuration').value      = b.duration_minutes || 60;
  document.getElementById('bkPickup').value        = b.pickup_location || '';
  document.getElementById('bkTotal').value         = b.total_amount || '0';
  document.getElementById('bkPaid').value          = b.amount_paid || '0';
  document.getElementById('bkPaymentStatus').value = b.payment_status || 'unpaid';
  document.getElementById('bkStatus').value        = b.status || 'pending';
  document.getElementById('bkNotes').value         = b.notes || '';
  document.getElementById('bookingModal').classList.remove('hidden');
}
function closeBookingModal() {
  document.getElementById('bookingModal').classList.add('hidden');
}
document.getElementById('bookingModal').addEventListener('click', function(e) {
  if (e.target === this) closeBookingModal();
});
</script>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
