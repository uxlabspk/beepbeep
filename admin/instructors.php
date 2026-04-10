<?php
require_once dirname(__DIR__) . '/auth/middleware.php';
requireAdmin();

$db = getDB();

// ---------- POST handlers ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        setFlash('error', 'Invalid security token.');
        redirect('/admin/instructors.php');
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'delete') {
        $id = (int) ($_POST['instructor_id'] ?? 0);
        $db->prepare("DELETE FROM instructors WHERE id = ?")->execute([$id]);
        setFlash('success', 'Instructor profile deleted.');
        redirect('/admin/instructors.php');
    }

    if (in_array($action, ['create', 'update'], true)) {
        $id             = (int) ($_POST['instructor_id'] ?? 0);
        $userId         = (int) ($_POST['user_id'] ?? 0);
        $adNumber       = trim($_POST['ad_number'] ?? '');
        $bio            = trim($_POST['bio'] ?? '');
        $yearsExp       = (int) ($_POST['years_experience'] ?? 0);
        $isActive       = isset($_POST['is_active']) ? 1 : 0;
        $specialtiesRaw = $_POST['specialties'] ?? [];
        $specialties    = json_encode(array_values(array_filter($specialtiesRaw)));

        if (!$userId) {
            setFlash('error', 'Please select a user.');
            redirect('/admin/instructors.php');
        }

        if ($action === 'create') {
            $stmt = $db->prepare("INSERT INTO instructors (user_id, ad_number, bio, specialties, years_experience, is_active) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$userId, $adNumber ?: null, $bio, $specialties, $yearsExp, $isActive]);
            // Update user role to instructor
            $db->prepare("UPDATE users SET role = 'instructor' WHERE id = ?")->execute([$userId]);
            setFlash('success', 'Instructor created and user role updated.');
        } else {
            $stmt = $db->prepare("UPDATE instructors SET user_id=?, ad_number=?, bio=?, specialties=?, years_experience=?, is_active=? WHERE id=?");
            $stmt->execute([$userId, $adNumber ?: null, $bio, $specialties, $yearsExp, $isActive, $id]);
            setFlash('success', 'Instructor updated.');
        }
        redirect('/admin/instructors.php');
    }

    if ($action === 'toggle_active') {
        $id = (int) ($_POST['instructor_id'] ?? 0);
        $db->prepare("UPDATE instructors SET is_active = NOT is_active WHERE id = ?")->execute([$id]);
        redirect('/admin/instructors.php');
    }
}

$instructors = $db->query("
    SELECT i.*, u.first_name, u.last_name, u.email, u.phone
    FROM instructors i
    JOIN users u ON u.id = i.user_id
    ORDER BY i.created_at DESC
")->fetchAll();

// Users eligible to be instructors (not yet linked)
$linkedUserIds = array_column($instructors, 'user_id');
$allUsers = $db->query("SELECT id, first_name, last_name, email FROM users ORDER BY first_name")->fetchAll();

$adminPageTitle  = 'Instructors';
$adminActivePage = 'instructors';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<div class="flex justify-end mb-6">
  <button onclick="openInstructorModal()" class="px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-colors">
    + Add Instructor
  </button>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wide">
        <tr>
          <th class="px-5 py-3 text-left">Name</th>
          <th class="px-5 py-3 text-left">Email</th>
          <th class="px-5 py-3 text-left">ADI No.</th>
          <th class="px-5 py-3 text-left">Experience</th>
          <th class="px-5 py-3 text-left">Rating</th>
          <th class="px-5 py-3 text-left">Status</th>
          <th class="px-5 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php if (empty($instructors)): ?>
        <tr><td colspan="7" class="px-5 py-10 text-center text-gray-400">No instructors yet.</td></tr>
        <?php else: foreach ($instructors as $i): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-3">
            <div class="flex items-center gap-2">
              <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-purple-700 text-xs font-semibold"><?php echo strtoupper(substr($i['first_name'],0,1).substr($i['last_name'],0,1)); ?></span>
              </div>
              <span class="font-medium text-gray-800"><?php echo e($i['first_name'].' '.$i['last_name']); ?></span>
            </div>
          </td>
          <td class="px-5 py-3 text-gray-600"><?php echo e($i['email']); ?></td>
          <td class="px-5 py-3 text-gray-600"><?php echo $i['ad_number'] ? e($i['ad_number']) : '—'; ?></td>
          <td class="px-5 py-3 text-gray-600"><?php echo $i['years_experience']; ?> yr<?php echo $i['years_experience']!=1?'s':''; ?></td>
          <td class="px-5 py-3">
            <span class="text-yellow-500">★</span>
            <span class="text-gray-700"><?php echo number_format($i['rating'],1); ?></span>
            <span class="text-gray-400 text-xs">(<?php echo $i['total_reviews']; ?>)</span>
          </td>
          <td class="px-5 py-3">
            <form method="POST" class="inline">
              <input type="hidden" name="csrf_token"     value="<?php echo e($adminCsrf); ?>"/>
              <input type="hidden" name="action"         value="toggle_active"/>
              <input type="hidden" name="instructor_id"  value="<?php echo (int)$i['id']; ?>"/>
              <button type="submit" class="px-2 py-1 rounded-full text-xs font-medium <?php echo $i['is_active'] ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'; ?>">
                <?php echo $i['is_active'] ? 'Active' : 'Inactive'; ?>
              </button>
            </form>
          </td>
          <td class="px-5 py-3">
            <div class="flex gap-2">
              <button onclick='openInstructorModal(<?php echo htmlspecialchars(json_encode($i), ENT_QUOTES); ?>)'
                      class="text-xs px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Edit</button>
              <form method="POST" class="inline">
                <input type="hidden" name="csrf_token"    value="<?php echo e($adminCsrf); ?>"/>
                <input type="hidden" name="action"        value="delete"/>
                <input type="hidden" name="instructor_id" value="<?php echo (int)$i['id']; ?>"/>
                <button type="submit" data-confirm="Remove instructor profile for <?php echo e($i['first_name']); ?>?"
                        class="text-xs px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">Remove</button>
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Instructor Modal -->
<div id="instructorModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between sticky top-0 bg-white">
      <h2 id="instructorModalTitle" class="font-semibold text-gray-800">Add Instructor</h2>
      <button onclick="closeInstructorModal()" class="text-gray-400 hover:text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <form method="POST" class="px-6 py-4 space-y-4">
      <input type="hidden" name="csrf_token"    value="<?php echo e($adminCsrf); ?>"/>
      <input type="hidden" name="action"        id="instructorAction" value="create"/>
      <input type="hidden" name="instructor_id" id="instructorId" value=""/>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">User Account *</label>
        <select name="user_id" id="instructorUserId" required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
          <option value="">— Select user —</option>
          <?php foreach ($allUsers as $u): ?>
          <option value="<?php echo (int)$u['id']; ?>"><?php echo e($u['first_name'].' '.$u['last_name'].' ('.$u['email'].')'); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">ADI Registration Number</label>
        <input type="text" name="ad_number" id="instructorAdNumber" placeholder="Optional"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Years of Experience</label>
        <input type="number" name="years_experience" id="instructorYearsExp" min="0" value="0"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Specialties</label>
        <div class="space-y-2">
          <?php foreach (['beginner','refresher','intensive','test-preparation','motorway','pass-plus'] as $sp): ?>
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="specialties[]" value="<?php echo $sp; ?>" class="specialty-check w-4 h-4 text-brand rounded"/>
            <span class="text-sm text-gray-700"><?php echo ucwords(str_replace('-',' ',$sp)); ?></span>
          </label>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Bio</label>
        <textarea name="bio" id="instructorBio" rows="3"
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 resize-none"></textarea>
      </div>
      <div>
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="checkbox" name="is_active" id="instructorIsActive" value="1" checked class="w-4 h-4 text-brand rounded"/>
          <span class="text-sm text-gray-700">Active</span>
        </label>
      </div>
      <div class="flex justify-end gap-3 pt-2">
        <button type="button" onclick="closeInstructorModal()" class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
        <button type="submit" class="px-4 py-2 text-sm text-white bg-brand rounded-lg hover:bg-brand-dark">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
function openInstructorModal(instructor) {
  const isEdit = !!instructor;
  document.getElementById('instructorModalTitle').textContent = isEdit ? 'Edit Instructor' : 'Add Instructor';
  document.getElementById('instructorAction').value    = isEdit ? 'update' : 'create';
  document.getElementById('instructorId').value        = isEdit ? instructor.id : '';
  document.getElementById('instructorUserId').value    = isEdit ? instructor.user_id : '';
  document.getElementById('instructorAdNumber').value  = isEdit ? (instructor.ad_number || '') : '';
  document.getElementById('instructorYearsExp').value  = isEdit ? instructor.years_experience : '0';
  document.getElementById('instructorBio').value       = isEdit ? (instructor.bio || '') : '';
  document.getElementById('instructorIsActive').checked= isEdit ? instructor.is_active == 1 : true;

  // Reset specialties
  document.querySelectorAll('.specialty-check').forEach(cb => { cb.checked = false; });
  if (isEdit && instructor.specialties) {
    let specs = [];
    try { specs = JSON.parse(instructor.specialties); } catch(e) {}
    specs.forEach(s => {
      const cb = document.querySelector(`.specialty-check[value="${s}"]`);
      if (cb) cb.checked = true;
    });
  }
  document.getElementById('instructorModal').classList.remove('hidden');
}
function closeInstructorModal() {
  document.getElementById('instructorModal').classList.add('hidden');
}
document.getElementById('instructorModal').addEventListener('click', function(e) {
  if (e.target === this) closeInstructorModal();
});
</script>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
