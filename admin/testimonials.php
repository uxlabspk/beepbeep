<?php
require_once dirname(__DIR__) . '/auth/middleware.php';
requireAdmin();

$db = getDB();

// ---------- POST handlers ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        setFlash('error', 'Invalid security token.');
        redirect('/admin/testimonials.php');
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'approve') {
        $id = (int) ($_POST['testimonial_id'] ?? 0);
        $db->prepare("UPDATE testimonials SET is_approved = 1 WHERE id = ?")->execute([$id]);
        setFlash('success', 'Testimonial approved.');
        redirect('/admin/testimonials.php');
    }

    if ($action === 'unapprove') {
        $id = (int) ($_POST['testimonial_id'] ?? 0);
        $db->prepare("UPDATE testimonials SET is_approved = 0 WHERE id = ?")->execute([$id]);
        setFlash('success', 'Testimonial unapproved.');
        redirect('/admin/testimonials.php');
    }

    if ($action === 'delete') {
        $id = (int) ($_POST['testimonial_id'] ?? 0);
        $db->prepare("DELETE FROM testimonials WHERE id = ?")->execute([$id]);
        setFlash('success', 'Testimonial deleted.');
        redirect('/admin/testimonials.php');
    }

    if ($action === 'create') {
        $userId       = $_POST['user_id'] !== '' ? (int) $_POST['user_id'] : null;
        $instructorId = $_POST['instructor_id'] !== '' ? (int) $_POST['instructor_id'] : null;
        $studentName  = trim($_POST['student_name'] ?? '');
        $rating       = (int) ($_POST['rating'] ?? 5);
        $testimonial  = trim($_POST['testimonial'] ?? '');
        $isApproved   = isset($_POST['is_approved']) ? 1 : 0;

        if (!$studentName || !$testimonial || $rating < 1 || $rating > 5) {
            setFlash('error', 'Name, testimonial text, and a valid rating (1–5) are required.');
            redirect('/admin/testimonials.php');
        }

        $stmt = $db->prepare("INSERT INTO testimonials (user_id, instructor_id, student_name, rating, testimonial, is_approved) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$userId, $instructorId, $studentName, $rating, $testimonial, $isApproved]);
        setFlash('success', 'Testimonial added.');
        redirect('/admin/testimonials.php');
    }
}

// ---------- Filters ----------
$filterApproved = $_GET['approved'] ?? '';
$where  = [];
$params = [];
if ($filterApproved === '1') { $where[] = "t.is_approved = 1"; }
if ($filterApproved === '0') { $where[] = "t.is_approved = 0"; }
$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$testimonials = $db->query("
    SELECT t.*,
           u.first_name, u.last_name,
           CONCAT(iu.first_name,' ',iu.last_name) AS instructor_name
    FROM testimonials t
    LEFT JOIN users u ON u.id = t.user_id
    LEFT JOIN instructors i ON i.id = t.instructor_id
    LEFT JOIN users iu ON iu.id = i.user_id
    $whereSQL
    ORDER BY t.created_at DESC
")->fetchAll();

$allUsers       = $db->query("SELECT id, first_name, last_name FROM users ORDER BY first_name")->fetchAll();
$allInstructors = $db->query("SELECT i.id, CONCAT(u.first_name,' ',u.last_name) AS name FROM instructors i JOIN users u ON u.id=i.user_id ORDER BY u.first_name")->fetchAll();

$adminPageTitle  = 'Testimonials';
$adminActivePage = 'testimonials';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<!-- Toolbar -->
<div class="flex flex-wrap items-center gap-3 mb-6">
  <div class="flex gap-2">
    <?php
    $tabs = ['' => 'All', '0' => 'Pending', '1' => 'Approved'];
    foreach ($tabs as $val => $label):
      $isActive = $filterApproved === $val;
    ?>
    <a href="/admin/testimonials.php<?php echo $val !== '' ? '?approved='.$val : ''; ?>"
       class="px-4 py-2 rounded-lg text-sm font-medium transition-colors <?php echo $isActive ? 'bg-brand text-white' : 'bg-white text-gray-600 hover:bg-gray-50 shadow-sm'; ?>">
      <?php echo $label; ?>
    </a>
    <?php endforeach; ?>
  </div>
  <span class="text-sm text-gray-500"><?php echo count($testimonials); ?> result<?php echo count($testimonials)!==1?'s':''; ?></span>
  <div class="ml-auto">
    <button onclick="document.getElementById('addTestimonialModal').classList.remove('hidden')"
            class="px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-colors">
      + Add Testimonial
    </button>
  </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
  <?php if (empty($testimonials)): ?>
  <div class="col-span-full bg-white rounded-xl shadow-sm p-10 text-center text-gray-400 text-sm">No testimonials found.</div>
  <?php else: foreach ($testimonials as $t): ?>
  <div class="bg-white rounded-xl shadow-sm p-5 flex flex-col gap-3">
    <!-- Stars -->
    <div class="flex gap-0.5">
      <?php for ($s = 1; $s <= 5; $s++): ?>
      <svg class="w-4 h-4 <?php echo $s <= $t['rating'] ? 'text-yellow-400' : 'text-gray-200'; ?>" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
      </svg>
      <?php endfor; ?>
    </div>

    <!-- Text -->
    <p class="text-sm text-gray-700 leading-relaxed flex-1">"<?php echo e($t['testimonial']); ?>"</p>

    <!-- Meta -->
    <div class="flex items-center gap-2">
      <div class="w-8 h-8 bg-brand/10 rounded-full flex items-center justify-center flex-shrink-0">
        <span class="text-brand text-xs font-semibold"><?php echo strtoupper(substr($t['student_name'],0,1)); ?></span>
      </div>
      <div>
        <p class="text-sm font-medium text-gray-800"><?php echo e($t['student_name']); ?></p>
        <?php if ($t['instructor_name']): ?>
        <p class="text-xs text-gray-400">Instructor: <?php echo e($t['instructor_name']); ?></p>
        <?php endif; ?>
      </div>
      <?php if ($t['is_approved']): ?>
      <span class="ml-auto text-xs px-2 py-1 bg-green-100 text-green-700 rounded-full font-medium">Approved</span>
      <?php else: ?>
      <span class="ml-auto text-xs px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full font-medium">Pending</span>
      <?php endif; ?>
    </div>

    <!-- Actions -->
    <div class="flex gap-2 pt-2 border-t border-gray-100">
      <?php if (!$t['is_approved']): ?>
      <form method="POST" class="inline">
        <input type="hidden" name="csrf_token"       value="<?php echo e($adminCsrf); ?>"/>
        <input type="hidden" name="action"           value="approve"/>
        <input type="hidden" name="testimonial_id"   value="<?php echo (int)$t['id']; ?>"/>
        <button type="submit" class="text-xs px-3 py-1 bg-green-100 text-green-700 rounded-lg hover:bg-green-200">Approve</button>
      </form>
      <?php else: ?>
      <form method="POST" class="inline">
        <input type="hidden" name="csrf_token"       value="<?php echo e($adminCsrf); ?>"/>
        <input type="hidden" name="action"           value="unapprove"/>
        <input type="hidden" name="testimonial_id"   value="<?php echo (int)$t['id']; ?>"/>
        <button type="submit" class="text-xs px-3 py-1 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200">Unapprove</button>
      </form>
      <?php endif; ?>
      <form method="POST" class="inline ml-auto">
        <input type="hidden" name="csrf_token"       value="<?php echo e($adminCsrf); ?>"/>
        <input type="hidden" name="action"           value="delete"/>
        <input type="hidden" name="testimonial_id"   value="<?php echo (int)$t['id']; ?>"/>
        <button type="submit" data-confirm="Delete this testimonial?"
                class="text-xs px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">Delete</button>
      </form>
      <span class="self-center text-xs text-gray-300"><?php echo date('d M Y', strtotime($t['created_at'])); ?></span>
    </div>
  </div>
  <?php endforeach; endif; ?>
</div>

<!-- Add Testimonial Modal -->
<div id="addTestimonialModal" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between sticky top-0 bg-white">
      <h2 class="font-semibold text-gray-800">Add Testimonial</h2>
      <button onclick="document.getElementById('addTestimonialModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <form method="POST" class="px-6 py-4 space-y-4">
      <input type="hidden" name="csrf_token" value="<?php echo e($adminCsrf); ?>"/>
      <input type="hidden" name="action"     value="create"/>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Student Name *</label>
        <input type="text" name="student_name" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Linked User (optional)</label>
        <select name="user_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
          <option value="">— None —</option>
          <?php foreach ($allUsers as $u): ?>
          <option value="<?php echo (int)$u['id']; ?>"><?php echo e($u['first_name'].' '.$u['last_name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Instructor (optional)</label>
        <select name="instructor_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40">
          <option value="">— None —</option>
          <?php foreach ($allInstructors as $i): ?>
          <option value="<?php echo (int)$i['id']; ?>"><?php echo e($i['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Rating *</label>
        <div class="flex gap-2" id="ratingStars">
          <?php for ($s = 1; $s <= 5; $s++): ?>
          <button type="button" data-rating="<?php echo $s; ?>"
                  class="star-btn text-2xl text-gray-300 hover:text-yellow-400 transition-colors"
                  onclick="setRating(<?php echo $s; ?>)">★</button>
          <?php endfor; ?>
        </div>
        <input type="hidden" name="rating" id="ratingInput" value="5"/>
      </div>
      <div>
        <label class="block text-xs font-medium text-gray-600 mb-1">Testimonial *</label>
        <textarea name="testimonial" rows="4" required
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand/40 resize-none"></textarea>
      </div>
      <div>
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="checkbox" name="is_approved" value="1" class="w-4 h-4 text-brand rounded"/>
          <span class="text-sm text-gray-700">Approve immediately</span>
        </label>
      </div>
      <div class="flex justify-end gap-3 pt-2">
        <button type="button" onclick="document.getElementById('addTestimonialModal').classList.add('hidden')"
                class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Cancel</button>
        <button type="submit" class="px-4 py-2 text-sm text-white bg-brand rounded-lg hover:bg-brand-dark">Add</button>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('addTestimonialModal').addEventListener('click', function(e) {
  if (e.target === this) this.classList.add('hidden');
});

function setRating(rating) {
  document.getElementById('ratingInput').value = rating;
  document.querySelectorAll('.star-btn').forEach((btn, i) => {
    btn.style.color = i < rating ? '#facc15' : '#d1d5db';
  });
}
// Init star display at 5
setRating(5);
</script>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
