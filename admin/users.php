<?php
require_once dirname(__DIR__) . '/auth/middleware.php';
requireAdmin();

$db = getDB();
$errors = [];

// ---------- POST handlers ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        setFlash('error', 'Invalid security token. Please try again.');
        redirect('/admin/users.php');
    }

    $action = $_POST['action'] ?? '';

    // Delete user
    if ($action === 'delete') {
        $uid = (int) ($_POST['user_id'] ?? 0);
        if ($uid === (int) currentUser()['id']) {
            setFlash('error', 'You cannot delete your own account.');
        } else {
            $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$uid]);
            setFlash('success', 'User deleted successfully.');
        }
        redirect('/admin/users.php');
    }

    // Update role
    if ($action === 'update_role') {
        $uid  = (int) ($_POST['user_id'] ?? 0);
        $role = $_POST['role'] ?? '';
        if (!in_array($role, ['student','instructor','admin'], true)) {
            setFlash('error', 'Invalid role selected.');
        } elseif ($uid === (int) currentUser()['id']) {
            setFlash('error', 'You cannot change your own role.');
        } else {
            $stmt = $db->prepare("UPDATE users SET role = ? WHERE id = ?");
            $stmt->execute([$role, $uid]);
            setFlash('success', 'User role updated.');
        }
        redirect('/admin/users.php');
    }

    // Update user details
    if ($action === 'update_user') {
        $uid       = (int) ($_POST['user_id'] ?? 0);
        $firstName = trim($_POST['first_name'] ?? '');
        $lastName  = trim($_POST['last_name'] ?? '');
        $email     = trim($_POST['email'] ?? '');
        $phone     = trim($_POST['phone'] ?? '');
        $role      = $_POST['role'] ?? '';

        if (!$firstName || !$lastName || !$email) {
            setFlash('error', 'Name and email are required.');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setFlash('error', 'Invalid email address.');
        } elseif (!in_array($role, ['student','instructor','admin'], true)) {
            setFlash('error', 'Invalid role.');
        } else {
            $stmt = $db->prepare("UPDATE users SET first_name=?, last_name=?, email=?, phone=?, role=? WHERE id=?");
            $stmt->execute([$firstName, $lastName, $email, $phone, $role, $uid]);
            setFlash('success', 'User updated.');
        }
        redirect('/admin/users.php');
    }
}

// ---------- Filters ----------
$search    = trim($_GET['search'] ?? '');
$roleFilter = $_GET['role'] ?? '';

$where  = [];
$params = [];

if ($search !== '') {
    $where[]  = "(first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
    $like     = '%' . $search . '%';
    $params[] = $like; $params[] = $like; $params[] = $like;
}
if (in_array($roleFilter, ['student','instructor','admin'], true)) {
    $where[]  = "role = ?";
    $params[] = $roleFilter;
}

$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';
$users    = $db->prepare("SELECT * FROM users $whereSQL ORDER BY created_at DESC");
$users->execute($params);
$users = $users->fetchAll();

$adminPageTitle  = 'Users';
$adminActivePage = 'users';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<!-- Toolbar -->
<div class="flex flex-col sm:flex-row gap-3 mb-6">
  <form method="GET" class="flex gap-2 flex-1">
    <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Search by name or email…"
           class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
    <select name="role" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
      <option value="">All roles</option>
      <option value="student"    <?php echo $roleFilter==='student'    ? 'selected':'' ?>>Student</option>
      <option value="instructor" <?php echo $roleFilter==='instructor' ? 'selected':'' ?>>Instructor</option>
      <option value="admin"      <?php echo $roleFilter==='admin'      ? 'selected':'' ?>>Admin</option>
    </select>
    <button type="submit" class="px-4 py-2 bg-brand text-white rounded-lg text-sm hover:bg-brand-dark transition-colors">Filter</button>
    <?php if ($search || $roleFilter): ?>
    <a href="/admin/users.php" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm hover:bg-gray-200 transition-colors">Clear</a>
    <?php endif; ?>
  </form>
  <p class="text-sm text-gray-500 self-center"><?php echo count($users); ?> user<?php echo count($users)!==1?'s':''; ?></p>
</div>

<!-- Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wide">
        <tr>
          <th class="px-5 py-3 text-left">Name</th>
          <th class="px-5 py-3 text-left">Email</th>
          <th class="px-5 py-3 text-left">Phone</th>
          <th class="px-5 py-3 text-left">Role</th>
          <th class="px-5 py-3 text-left">Verified</th>
          <th class="px-5 py-3 text-left">Joined</th>
          <th class="px-5 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php if (empty($users)): ?>
        <tr><td colspan="7" class="px-5 py-10 text-center text-gray-400">No users found.</td></tr>
        <?php else: foreach ($users as $u): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-3">
            <div class="flex items-center gap-2">
              <div class="w-8 h-8 bg-brand/10 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-brand text-xs font-semibold"><?php echo strtoupper(substr($u['first_name'],0,1).substr($u['last_name'],0,1)); ?></span>
              </div>
              <span class="font-medium text-gray-800"><?php echo e($u['first_name'].' '.$u['last_name']); ?></span>
            </div>
          </td>
          <td class="px-5 py-3 text-gray-600"><?php echo e($u['email']); ?></td>
          <td class="px-5 py-3 text-gray-600"><?php echo e($u['phone'] ?: '—'); ?></td>
          <td class="px-5 py-3">
            <?php
            $roleColors = ['student'=>'bg-blue-100 text-blue-700','instructor'=>'bg-purple-100 text-purple-700','admin'=>'bg-red-100 text-red-700'];
            $rc = $roleColors[$u['role']] ?? 'bg-gray-100 text-gray-600';
            ?>
            <span class="px-2 py-1 rounded-full text-xs font-medium <?php echo $rc; ?>"><?php echo ucfirst(e($u['role'])); ?></span>
          </td>
          <td class="px-5 py-3">
            <?php if ($u['email_verified']): ?>
            <span class="text-green-600">✓</span>
            <?php else: ?>
            <span class="text-gray-400">—</span>
            <?php endif; ?>
          </td>
          <td class="px-5 py-3 text-gray-500"><?php echo date('d M Y', strtotime($u['created_at'])); ?></td>
          <td class="px-5 py-3">
            <div class="flex items-center gap-2">
              <button onclick="openEditModal(<?php echo htmlspecialchars(json_encode($u), ENT_QUOTES); ?>)"
                      class="text-xs px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">Edit</button>
              <?php if ((int)$u['id'] !== (int)currentUser()['id']): ?>
              <form method="POST" class="inline">
                <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
                <input type="hidden" name="action"    value="delete"/>
                <input type="hidden" name="user_id"   value="<?php echo (int)$u['id']; ?>"/>
                <button type="submit" data-confirm="Delete <?php echo e($u['first_name'].' '.$u['last_name']); ?>? This cannot be undone."
                        class="text-xs px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors">Delete</button>
              </form>
              <?php endif; ?>
            </div>
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
      <h2 class="font-semibold text-gray-800">Edit User</h2>
      <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <form method="POST" class="px-6 py-4 space-y-4">
      <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
      <input type="hidden" name="action"    value="update_user"/>
      <input type="hidden" name="user_id"   id="editUserId"/>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">First Name</label>
          <input type="text" name="first_name" id="editFirstName" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Last Name</label>
          <input type="text" name="last_name" id="editLastName" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Email</label>
        <input type="email" name="email" id="editEmail" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Phone</label>
        <input type="text" name="phone" id="editPhone"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Role</label>
        <select name="role" id="editRole"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
          <option value="student">Student</option>
          <option value="instructor">Instructor</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="flex justify-end gap-3 pt-2">
        <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
        <button type="submit" class="px-4 py-2 text-sm text-white bg-brand rounded-lg hover:bg-brand-dark">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditModal(user) {
  document.getElementById('editUserId').value    = user.id;
  document.getElementById('editFirstName').value = user.first_name;
  document.getElementById('editLastName').value  = user.last_name;
  document.getElementById('editEmail').value     = user.email;
  document.getElementById('editPhone').value     = user.phone || '';
  document.getElementById('editRole').value      = user.role;
  document.getElementById('editModal').classList.remove('hidden');
}
function closeEditModal() {
  document.getElementById('editModal').classList.add('hidden');
}
document.getElementById('editModal').addEventListener('click', function(e) {
  if (e.target === this) closeEditModal();
});
</script>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
