<?php
require_once dirname(__DIR__, 2) . '/auth/middleware.php';
requireAdmin();

$db = getDB();

// Stats
$totalStudents    = $db->query("SELECT COUNT(*) FROM users WHERE role = 'student'")->fetchColumn();
$totalInstructors = $db->query("SELECT COUNT(*) FROM users WHERE role = 'instructor'")->fetchColumn();
$totalBookings    = $db->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
$pendingBookings  = $db->query("SELECT COUNT(*) FROM bookings WHERE status = 'pending'")->fetchColumn();
$confirmedBookings= $db->query("SELECT COUNT(*) FROM bookings WHERE status = 'confirmed'")->fetchColumn();
$totalRevenue     = $db->query("SELECT COALESCE(SUM(amount),0) FROM payments WHERE status = 'completed'")->fetchColumn();
$monthRevenue     = $db->query("SELECT COALESCE(SUM(amount),0) FROM payments WHERE status = 'completed' AND MONTH(paid_at)=MONTH(NOW()) AND YEAR(paid_at)=YEAR(NOW())")->fetchColumn();
$newContacts      = $db->query("SELECT COUNT(*) FROM contact_submissions WHERE status = 'new'")->fetchColumn();
$pendingTestimonials = $db->query("SELECT COUNT(*) FROM testimonials WHERE is_approved = 0")->fetchColumn();
$totalCourses     = $db->query("SELECT COUNT(*) FROM courses WHERE is_active = 1")->fetchColumn();

// Recent bookings
$recentBookings = $db->query("
    SELECT b.id, b.status, b.lesson_date, b.start_time, b.total_amount, b.payment_status,
           u.first_name, u.last_name,
           c.name AS course_name,
           CONCAT(iu.first_name,' ',iu.last_name) AS instructor_name
    FROM bookings b
    JOIN users u ON u.id = b.user_id
    LEFT JOIN courses c ON c.id = b.course_id
    LEFT JOIN instructors i ON i.id = b.instructor_id
    LEFT JOIN users iu ON iu.id = i.user_id
    ORDER BY b.created_at DESC
    LIMIT 5
")->fetchAll();

// Recent users
$recentUsers = $db->query("
    SELECT id, first_name, last_name, email, role, created_at
    FROM users
    ORDER BY created_at DESC
    LIMIT 5
")->fetchAll();

$adminPageTitle  = 'Dashboard';
$adminActivePage = 'dashboard';
require_once INCLUDES_PATH . '/admin-layout.php';
?>

<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-brand to-brand-dark rounded-2xl p-8 mb-8 text-white">
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
      <h2 class="text-3xl font-bold mb-2">Welcome back, <?php echo e($adminUser['first_name']); ?>! 👋</h2>
      <p class="text-white/90">Here's what's happening with your driving school today.</p>
    </div>
    <a href="/admin/bookings.php" class="px-6 py-3 bg-white text-brand font-semibold rounded-xl hover:bg-gray-100 transition-all flex-shrink-0">
      View Bookings
    </a>
  </div>
</div>

<!-- Alert badges -->
<?php if ($newContacts > 0 || $pendingTestimonials > 0 || $pendingBookings > 0): ?>
<div class="flex flex-wrap gap-3 mb-6">
  <?php if ($pendingBookings > 0): ?>
  <a href="/admin/bookings.php?status=pending"
     class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-100 text-yellow-800 border border-yellow-200 rounded-xl text-sm font-medium hover:bg-yellow-200 transition-colors">
    <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
    <?php echo $pendingBookings; ?> booking<?php echo $pendingBookings!=1?'s':''; ?> pending
  </a>
  <?php endif; ?>
  <?php if ($newContacts > 0): ?>
  <a href="/admin/contacts.php"
     class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-800 border border-blue-200 rounded-xl text-sm font-medium hover:bg-blue-200 transition-colors">
    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
    <?php echo $newContacts; ?> new contact<?php echo $newContacts!=1?'s':''; ?>
  </a>
  <?php endif; ?>
  <?php if ($pendingTestimonials > 0): ?>
  <a href="/admin/testimonials.php?approved=0"
     class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-800 border border-purple-200 rounded-xl text-sm font-medium hover:bg-purple-200 transition-colors">
    <span class="w-2 h-2 bg-purple-500 rounded-full"></span>
    <?php echo $pendingTestimonials; ?> testimonial<?php echo $pendingTestimonials!=1?'s':''; ?> to review
  </a>
  <?php endif; ?>
</div>
<?php endif; ?>

<!-- Stats cards -->
<div class="grid grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
  <?php
  $stats = [
    ['label'=>'Students',        'value'=>number_format($totalStudents),        'sub'=>'registered',         'href'=>'/admin/users.php?role=student',   'icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z','bg'=>'bg-blue-500'],
    ['label'=>'Instructors',     'value'=>number_format($totalInstructors),     'sub'=>'active',             'href'=>'/admin/instructors.php',           'icon'=>'M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z','bg'=>'bg-purple-500'],
    ['label'=>'Total Bookings',  'value'=>number_format($totalBookings),        'sub'=>$confirmedBookings.' confirmed', 'href'=>'/admin/bookings.php', 'icon'=>'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z','bg'=>'bg-brand'],
    ['label'=>'This Month',      'value'=>'£'.number_format($monthRevenue,2),   'sub'=>'£'.number_format($totalRevenue,2).' total', 'href'=>'/admin/payments.php', 'icon'=>'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z','bg'=>'bg-green-500'],
  ];
  foreach ($stats as $s): ?>
  <a href="<?php echo $s['href']; ?>" class="bg-white rounded-2xl shadow-md p-5 flex items-center gap-4 hover:shadow-lg transition-shadow group">
    <div class="w-14 h-14 <?php echo $s['bg']; ?> rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform">
      <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $s['icon']; ?>"/>
      </svg>
    </div>
    <div>
      <p class="text-2xl font-bold text-gray-800"><?php echo $s['value']; ?></p>
      <p class="text-sm font-medium text-gray-600"><?php echo $s['label']; ?></p>
      <p class="text-xs text-gray-400"><?php echo $s['sub']; ?></p>
    </div>
  </a>
  <?php endforeach; ?>
</div>

<!-- Quick Actions -->
<div class="mb-8">
  <h2 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <?php
    $actions = [
      ['href'=>'/admin/users.php',       'label'=>'Manage Users',    'bg'=>'bg-blue-50',   'text'=>'text-blue-700',   'icon'=>'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'],
      ['href'=>'/admin/bookings.php',    'label'=>'All Bookings',    'bg'=>'bg-orange-50', 'text'=>'text-orange-700', 'icon'=>'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
      ['href'=>'/admin/courses.php',     'label'=>'Manage Courses',  'bg'=>'bg-green-50',  'text'=>'text-green-700',  'icon'=>'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
      ['href'=>'/admin/payments.php',    'label'=>'Record Payment',  'bg'=>'bg-purple-50', 'text'=>'text-purple-700', 'icon'=>'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
    ];
    foreach ($actions as $a): ?>
    <a href="<?php echo $a['href']; ?>"
       class="<?php echo $a['bg']; ?> <?php echo $a['text']; ?> rounded-2xl p-5 flex flex-col items-start gap-3 hover:shadow-md transition-shadow">
      <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $a['icon']; ?>"/>
      </svg>
      <span class="font-semibold text-sm"><?php echo $a['label']; ?></span>
    </a>
    <?php endforeach; ?>
  </div>
</div>

<!-- Recent Bookings & Recent Registrations -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
  <!-- Recent Bookings -->
  <div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
      <h2 class="font-bold text-gray-800">Recent Bookings</h2>
      <a href="/admin/bookings.php" class="text-sm text-brand hover:text-brand-dark font-medium">View all</a>
    </div>
    <div class="divide-y divide-gray-50">
      <?php if (empty($recentBookings)): ?>
      <p class="px-6 py-8 text-center text-gray-400 text-sm">No bookings yet.</p>
      <?php else: foreach ($recentBookings as $b):
        $statusColors = ['pending'=>'bg-yellow-100 text-yellow-700','confirmed'=>'bg-blue-100 text-blue-700','completed'=>'bg-green-100 text-green-700','cancelled'=>'bg-red-100 text-red-700','no_show'=>'bg-gray-100 text-gray-600'];
        $sc = $statusColors[$b['status']] ?? 'bg-gray-100 text-gray-600';
      ?>
      <div class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50 transition-colors">
        <div class="w-10 h-10 bg-brand/10 rounded-full flex items-center justify-center flex-shrink-0">
          <span class="text-brand text-sm font-bold"><?php echo strtoupper(substr($b['first_name'],0,1).substr($b['last_name'],0,1)); ?></span>
        </div>
        <div class="flex-1 min-w-0">
          <p class="font-semibold text-gray-800 text-sm truncate"><?php echo e($b['first_name'].' '.$b['last_name']); ?></p>
          <p class="text-xs text-gray-400"><?php echo $b['course_name'] ? e($b['course_name']) : '—'; ?> <?php echo $b['lesson_date'] ? '· '.date('d M Y', strtotime($b['lesson_date'])) : ''; ?></p>
        </div>
        <span class="px-2.5 py-1 rounded-full text-xs font-medium flex-shrink-0 <?php echo $sc; ?>"><?php echo ucfirst(str_replace('_',' ',$b['status'])); ?></span>
      </div>
      <?php endforeach; endif; ?>
    </div>
  </div>

  <!-- Recent Registrations -->
  <div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
      <h2 class="font-bold text-gray-800">Recent Registrations</h2>
      <a href="/admin/users.php" class="text-sm text-brand hover:text-brand-dark font-medium">View all</a>
    </div>
    <div class="divide-y divide-gray-50">
      <?php if (empty($recentUsers)): ?>
      <p class="px-6 py-8 text-center text-gray-400 text-sm">No users yet.</p>
      <?php else: foreach ($recentUsers as $u):
        $roleColors = ['student'=>'bg-blue-100 text-blue-700','instructor'=>'bg-purple-100 text-purple-700','admin'=>'bg-brand/10 text-brand'];
        $rc = $roleColors[$u['role']] ?? 'bg-gray-100 text-gray-600';
      ?>
      <div class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50 transition-colors">
        <div class="w-10 h-10 bg-brand/10 rounded-full flex items-center justify-center flex-shrink-0">
          <span class="text-brand text-sm font-bold"><?php echo strtoupper(substr($u['first_name'],0,1).substr($u['last_name'],0,1)); ?></span>
        </div>
        <div class="flex-1 min-w-0">
          <p class="font-semibold text-gray-800 text-sm truncate"><?php echo e($u['first_name'].' '.$u['last_name']); ?></p>
          <p class="text-xs text-gray-400 truncate"><?php echo e($u['email']); ?></p>
        </div>
        <div class="flex flex-col items-end gap-1 flex-shrink-0">
          <span class="px-2.5 py-1 rounded-full text-xs font-medium <?php echo $rc; ?>"><?php echo ucfirst($u['role']); ?></span>
          <span class="text-xs text-gray-300"><?php echo date('d M', strtotime($u['created_at'])); ?></span>
        </div>
      </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
</div>

<?php require_once INCLUDES_PATH . '/admin-layout-end.php'; ?>
