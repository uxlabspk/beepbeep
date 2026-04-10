<?php
require_once dirname(__DIR__) . '/auth/middleware.php';
requireAdmin();

$db = getDB();

// ---------- POST handlers ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        setFlash('error', 'Invalid security token.');
        redirect('/admin/contacts.php');
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'update_status') {
        $id     = (int) ($_POST['contact_id'] ?? 0);
        $status = $_POST['status'] ?? '';
        if (in_array($status, ['new','read','replied','archived'], true)) {
            $db->prepare("UPDATE contact_submissions SET status = ? WHERE id = ?")->execute([$status, $id]);
        }
        redirect('/admin/contacts.php' . ($_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : ''));
    }

    if ($action === 'delete') {
        $id = (int) ($_POST['contact_id'] ?? 0);
        $db->prepare("DELETE FROM contact_submissions WHERE id = ?")->execute([$id]);
        setFlash('success', 'Submission deleted.');
        redirect('/admin/contacts.php');
    }

    if ($action === 'bulk_archive') {
        $ids = array_map('intval', $_POST['ids'] ?? []);
        if ($ids) {
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $db->prepare("UPDATE contact_submissions SET status = 'archived' WHERE id IN ($placeholders)")->execute($ids);
            setFlash('success', count($ids) . ' submission(s) archived.');
        }
        redirect('/admin/contacts.php');
    }
}

// ---------- View single ----------
$viewId = (int) ($_GET['view'] ?? 0);
$viewContact = null;
if ($viewId) {
    $viewContact = $db->prepare("SELECT * FROM contact_submissions WHERE id = ?");
    $viewContact->execute([$viewId]);
    $viewContact = $viewContact->fetch();
    if ($viewContact && $viewContact['status'] === 'new') {
        $db->prepare("UPDATE contact_submissions SET status = 'read' WHERE id = ?")->execute([$viewId]);
        $viewContact['status'] = 'read';
    }
}

// ---------- Filters ----------
$statusFilter = $_GET['status'] ?? '';
$validStatuses = ['new','read','replied','archived'];

$where  = [];
$params = [];
if (in_array($statusFilter, $validStatuses, true)) {
    $where[]  = "status = ?";
    $params[] = $statusFilter;
}
$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$contacts = $db->prepare("SELECT * FROM contact_submissions $whereSQL ORDER BY created_at DESC");
$contacts->execute($params);
$contacts = $contacts->fetchAll();

$adminPageTitle  = 'Contact Submissions';
$adminActivePage = 'contacts';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<!-- Filter bar -->
<div class="flex flex-wrap gap-2 mb-6">
  <?php
  $tabs = ['' => 'All', 'new' => 'New', 'read' => 'Read', 'replied' => 'Replied', 'archived' => 'Archived'];
  foreach ($tabs as $val => $label):
    $isActive = $statusFilter === $val;
  ?>
  <a href="/admin/contacts.php<?php echo $val ? '?status='.$val : ''; ?>"
     class="px-4 py-2 rounded-lg text-sm font-medium transition-colors <?php echo $isActive ? 'bg-brand text-white' : 'bg-white text-gray-600 hover:bg-gray-50 shadow-sm'; ?>">
    <?php echo $label; ?>
  </a>
  <?php endforeach; ?>
  <span class="ml-auto self-center text-sm text-gray-500"><?php echo count($contacts); ?> result<?php echo count($contacts)!==1?'s':''; ?></span>
</div>

<div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
  <!-- List -->
  <div class="lg:col-span-2">
    <form method="POST" id="bulkForm">
      <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
      <input type="hidden" name="action"     value="bulk_archive"/>
      <div class="bg-white rounded-xl shadow-sm overflow-hidden divide-y divide-gray-100">
        <?php if (empty($contacts)): ?>
        <div class="px-5 py-10 text-center text-gray-400 text-sm">No submissions found.</div>
        <?php else: foreach ($contacts as $c): ?>
        <?php $isViewing = $viewId === (int)$c['id']; ?>
        <div class="flex items-start gap-3 px-4 py-4 hover:bg-gray-50 <?php echo $isViewing ? 'bg-brand/5 border-l-2 border-brand' : ''; ?>">
          <input type="checkbox" name="ids[]" value="<?php echo (int)$c['id']; ?>" class="mt-1 w-4 h-4 text-brand rounded"/>
          <a href="/admin/contacts.php?view=<?php echo (int)$c['id']; ?><?php echo $statusFilter ? '&status='.$statusFilter : ''; ?>"
             class="flex-1 min-w-0 block">
            <div class="flex items-center gap-2 mb-1">
              <span class="font-medium text-gray-800 text-sm truncate"><?php echo e($c['first_name'].' '.$c['last_name']); ?></span>
              <?php if ($c['status'] === 'new'): ?>
              <span class="w-2 h-2 bg-brand rounded-full flex-shrink-0"></span>
              <?php endif; ?>
            </div>
            <p class="text-xs text-gray-500 truncate"><?php echo e($c['email']); ?></p>
            <p class="text-xs text-gray-400 mt-1 line-clamp-1"><?php echo e(substr($c['message'], 0, 60)); ?>…</p>
            <p class="text-xs text-gray-300 mt-1"><?php echo date('d M Y H:i', strtotime($c['created_at'])); ?></p>
          </a>
        </div>
        <?php endforeach; endif; ?>
      </div>
      <?php if (!empty($contacts)): ?>
      <div class="mt-3 flex gap-2">
        <button type="submit" data-confirm="Archive selected submissions?"
                class="px-3 py-1.5 text-xs text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Archive selected</button>
      </div>
      <?php endif; ?>
    </form>
  </div>

  <!-- Detail panel -->
  <div class="lg:col-span-3">
    <?php if ($viewContact): ?>
    <div class="bg-white rounded-xl shadow-sm p-6">
      <!-- Header -->
      <div class="flex items-start justify-between mb-6">
        <div>
          <h2 class="text-lg font-semibold text-gray-800"><?php echo e($viewContact['first_name'].' '.$viewContact['last_name']); ?></h2>
          <p class="text-sm text-gray-500"><?php echo e($viewContact['email']); ?> · <?php echo e($viewContact['phone']); ?></p>
          <p class="text-xs text-gray-400 mt-1"><?php echo date('d M Y \a\t H:i', strtotime($viewContact['created_at'])); ?></p>
        </div>
        <div class="flex items-center gap-2 flex-shrink-0">
          <form method="POST" class="inline">
            <input type="hidden" name="csrf_token"  value="<?php echo e($adminCsrf); ?>"/>
            <input type="hidden" name="action"      value="update_status"/>
            <input type="hidden" name="contact_id"  value="<?php echo (int)$viewContact['id']; ?>"/>
            <select name="status" onchange="this.form.submit()"
                    class="text-xs px-3 py-1.5 border border-gray-300 rounded-lg focus:outline-none">
              <?php foreach (['new','read','replied','archived'] as $s): ?>
              <option value="<?php echo $s; ?>" <?php echo $viewContact['status']===$s?'selected':''; ?>><?php echo ucfirst($s); ?></option>
              <?php endforeach; ?>
            </select>
          </form>
          <form method="POST" class="inline">
            <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
            <input type="hidden" name="action"     value="delete"/>
            <input type="hidden" name="contact_id" value="<?php echo (int)$viewContact['id']; ?>"/>
            <button type="submit" data-confirm="Delete this submission?" class="text-xs px-3 py-1.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">Delete</button>
          </form>
        </div>
      </div>

      <!-- Details -->
      <?php if ($viewContact['service']): ?>
      <div class="mb-3">
        <span class="text-xs font-medium text-gray-500">Service Interest:</span>
        <span class="ml-2 text-sm text-gray-700"><?php echo e($viewContact['service']); ?></span>
      </div>
      <?php endif; ?>
      <?php if ($viewContact['instructor_preference']): ?>
      <div class="mb-3">
        <span class="text-xs font-medium text-gray-500">Instructor Preference:</span>
        <span class="ml-2 text-sm text-gray-700"><?php echo e($viewContact['instructor_preference']); ?></span>
      </div>
      <?php endif; ?>

      <div class="bg-gray-50 rounded-xl p-4 text-sm text-gray-700 leading-relaxed whitespace-pre-wrap mb-6">
        <?php echo e($viewContact['message']); ?>
      </div>

      <a href="mailto:<?php echo e($viewContact['email']); ?>?subject=Re: Your enquiry with <?php echo e(SITE_NAME); ?>"
         class="inline-flex items-center gap-2 px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        Reply via Email
      </a>
    </div>
    <?php else: ?>
    <div class="bg-white rounded-xl shadow-sm p-10 text-center text-gray-400">
      <svg class="w-12 h-12 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
      </svg>
      <p class="text-sm">Select a submission to view details.</p>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
