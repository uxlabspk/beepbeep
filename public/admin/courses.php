<?php
require_once dirname(__DIR__, 2) . '/auth/middleware.php';
requireAdmin();

$db = getDB();

// ---------- POST handlers ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        setFlash('error', 'Invalid security token.');
        redirect('/admin/courses.php');
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'delete') {
        $id = (int) ($_POST['course_id'] ?? 0);
        $db->prepare("DELETE FROM courses WHERE id = ?")->execute([$id]);
        setFlash('success', 'Course deleted.');
        redirect('/admin/courses.php');
    }

    if (in_array($action, ['create', 'update'], true)) {
        $id            = (int) ($_POST['course_id'] ?? 0);
        $name          = trim($_POST['name'] ?? '');
        $slug          = trim($_POST['slug'] ?? '');
        $description   = trim($_POST['description'] ?? '');
        $level         = $_POST['level'] ?? 'beginner';
        $transmission  = $_POST['transmission'] ?? 'either';
        $minHours      = (float) ($_POST['min_hours'] ?? 10);
        $pricePerLesson = (float) ($_POST['price_per_lesson'] ?? 0);
        $packagePrice  = $_POST['package_price'] !== '' ? (float) $_POST['package_price'] : null;
        $packageHours  = $_POST['package_hours'] !== '' ? (int) $_POST['package_hours'] : null;
        $isActive      = isset($_POST['is_active']) ? 1 : 0;
        $sortOrder     = (int) ($_POST['sort_order'] ?? 0);

        if (!$name || !$slug || $pricePerLesson <= 0) {
            setFlash('error', 'Name, slug, and price are required.');
            redirect('/admin/courses.php');
        }

        // Auto-generate slug if empty
        if (!$slug) {
            $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $name));
        }

        if ($action === 'create') {
            $stmt = $db->prepare("INSERT INTO courses (name, slug, description, level, transmission, min_hours, price_per_lesson, package_price, package_hours, is_active, sort_order) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$name, $slug, $description, $level, $transmission, $minHours, $pricePerLesson, $packagePrice, $packageHours, $isActive, $sortOrder]);
            setFlash('success', 'Course created.');
        } else {
            $stmt = $db->prepare("UPDATE courses SET name=?, slug=?, description=?, level=?, transmission=?, min_hours=?, price_per_lesson=?, package_price=?, package_hours=?, is_active=?, sort_order=? WHERE id=?");
            $stmt->execute([$name, $slug, $description, $level, $transmission, $minHours, $pricePerLesson, $packagePrice, $packageHours, $isActive, $sortOrder, $id]);
            setFlash('success', 'Course updated.');
        }
        redirect('/admin/courses.php');
    }

    if ($action === 'toggle_active') {
        $id = (int) ($_POST['course_id'] ?? 0);
        $db->prepare("UPDATE courses SET is_active = NOT is_active WHERE id = ?")->execute([$id]);
        redirect('/admin/courses.php');
    }
}

$courses = $db->query("SELECT * FROM courses ORDER BY sort_order ASC, name ASC")->fetchAll();

$adminPageTitle  = 'Courses';
$adminActivePage = 'courses';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<div class="flex justify-end mb-6">
  <button onclick="openCourseModal()" class="px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-colors">
    + Add Course
  </button>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wide">
        <tr>
          <th class="px-5 py-3 text-left">Name</th>
          <th class="px-5 py-3 text-left">Level</th>
          <th class="px-5 py-3 text-left">Transmission</th>
          <th class="px-5 py-3 text-left">Price/Lesson</th>
          <th class="px-5 py-3 text-left">Package</th>
          <th class="px-5 py-3 text-left">Status</th>
          <th class="px-5 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php if (empty($courses)): ?>
        <tr><td colspan="7" class="px-5 py-10 text-center text-gray-400">No courses yet. Add one above.</td></tr>
        <?php else: foreach ($courses as $c): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-3">
            <p class="font-medium text-gray-800"><?php echo e($c['name']); ?></p>
            <p class="text-xs text-gray-400"><?php echo e($c['slug']); ?></p>
          </td>
          <td class="px-5 py-3 text-gray-600"><?php echo ucfirst(e($c['level'])); ?></td>
          <td class="px-5 py-3 text-gray-600"><?php echo ucfirst(e($c['transmission'])); ?></td>
          <td class="px-5 py-3 text-gray-800 font-medium">£<?php echo number_format($c['price_per_lesson'],2); ?></td>
          <td class="px-5 py-3 text-gray-600">
            <?php echo $c['package_price'] ? '£'.number_format($c['package_price'],2).' / '.$c['package_hours'].'h' : '—'; ?>
          </td>
          <td class="px-5 py-3">
            <form method="POST" class="inline">
              <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
              <input type="hidden" name="action"    value="toggle_active"/>
              <input type="hidden" name="course_id" value="<?php echo (int)$c['id']; ?>"/>
              <button type="submit" class="px-2 py-1 rounded-full text-xs font-medium <?php echo $c['is_active'] ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'; ?>">
                <?php echo $c['is_active'] ? 'Active' : 'Inactive'; ?>
              </button>
            </form>
          </td>
          <td class="px-5 py-3">
            <div class="flex gap-2">
              <button onclick='openCourseModal(<?php echo htmlspecialchars(json_encode($c), ENT_QUOTES); ?>)'
                      class="text-xs px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Edit</button>
              <form method="POST" class="inline">
                <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
                <input type="hidden" name="action"    value="delete"/>
                <input type="hidden" name="course_id" value="<?php echo (int)$c['id']; ?>"/>
                <button type="submit" data-confirm="Delete course &quot;<?php echo e($c['name']); ?>&quot;?"
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

<!-- Course Modal -->
<div id="courseModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between sticky top-0 bg-white">
      <h2 id="courseModalTitle" class="font-semibold text-gray-800">Add Course</h2>
      <button onclick="closeCourseModal()" class="text-gray-400 hover:text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <form method="POST" class="px-6 py-4 space-y-4">
      <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
      <input type="hidden" name="action"    id="courseAction" value="create"/>
      <input type="hidden" name="course_id" id="courseId" value=""/>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Course Name *</label>
        <input type="text" name="name" id="courseName" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Slug *</label>
        <input type="text" name="slug" id="courseSlug" required placeholder="e.g. beginner-manual"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Description</label>
        <textarea name="description" id="courseDescription" rows="3"
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 resize-none"></textarea>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Level</label>
          <select name="level" id="courseLevel" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
            <option value="advanced">Advanced</option>
          </select>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Transmission</label>
          <select name="transmission" id="courseTransmission" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
            <option value="either">Either</option>
            <option value="manual">Manual</option>
            <option value="automatic">Automatic</option>
          </select>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Min Hours</label>
          <input type="number" name="min_hours" id="courseMinHours" step="0.5" min="0" value="10"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Price per Lesson (£) *</label>
          <input type="number" name="price_per_lesson" id="coursePricePerLesson" step="0.01" min="0" required
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Package Price (£)</label>
          <input type="number" name="package_price" id="coursePackagePrice" step="0.01" min="0" placeholder="Optional"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Package Hours</label>
          <input type="number" name="package_hours" id="coursePackageHours" min="0" placeholder="Optional"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-medium text-gray-600 mb-1">Sort Order</label>
          <input type="number" name="sort_order" id="courseSortOrder" min="0" value="0"
                 class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
        </div>
        <div class="flex items-end pb-1">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" id="courseIsActive" value="1" checked class="w-4 h-4 text-brand rounded"/>
            <span class="text-sm text-gray-700">Active</span>
          </label>
        </div>
      </div>
      <div class="flex justify-end gap-3 pt-2">
        <button type="button" onclick="closeCourseModal()" class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
        <button type="submit" class="px-4 py-2 text-sm text-white bg-brand rounded-lg hover:bg-brand-dark">Save Course</button>
      </div>
    </form>
  </div>
</div>

<script>
function openCourseModal(course) {
  const isEdit = !!course;
  document.getElementById('courseModalTitle').textContent = isEdit ? 'Edit Course' : 'Add Course';
  document.getElementById('courseAction').value      = isEdit ? 'update' : 'create';
  document.getElementById('courseId').value          = isEdit ? course.id : '';
  document.getElementById('courseName').value        = isEdit ? course.name : '';
  document.getElementById('courseSlug').value        = isEdit ? course.slug : '';
  document.getElementById('courseDescription').value = isEdit ? (course.description || '') : '';
  document.getElementById('courseLevel').value       = isEdit ? course.level : 'beginner';
  document.getElementById('courseTransmission').value= isEdit ? course.transmission : 'either';
  document.getElementById('courseMinHours').value    = isEdit ? course.min_hours : '10';
  document.getElementById('coursePricePerLesson').value = isEdit ? course.price_per_lesson : '';
  document.getElementById('coursePackagePrice').value= isEdit ? (course.package_price || '') : '';
  document.getElementById('coursePackageHours').value= isEdit ? (course.package_hours || '') : '';
  document.getElementById('courseSortOrder').value   = isEdit ? course.sort_order : '0';
  document.getElementById('courseIsActive').checked  = isEdit ? course.is_active == 1 : true;
  document.getElementById('courseModal').classList.remove('hidden');
}
function closeCourseModal() {
  document.getElementById('courseModal').classList.add('hidden');
}
document.getElementById('courseModal').addEventListener('click', function(e) {
  if (e.target === this) closeCourseModal();
});

// Auto-generate slug from name
document.getElementById('courseName').addEventListener('input', function() {
  const slugField = document.getElementById('courseSlug');
  if (document.getElementById('courseAction').value === 'create') {
    slugField.value = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
  }
});
</script>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
