<?php
/**
 * Admin Layout — matches the student dashboard style.
 * Requires auth/middleware.php already loaded and requireAdmin() already called.
 */
$adminUser    = currentUser();
$adminFlash   = getFlash();
$adminCsrf    = generateCsrfToken();
$adminInitials = strtoupper(substr($adminUser['first_name'], 0, 1) . substr($adminUser['last_name'], 0, 1));

$pageTitle   = isset($adminPageTitle) ? $adminPageTitle . ' | Admin | ' . SITE_NAME : 'Admin | ' . SITE_NAME;
$currentPage = 'admin';
$customStyles = '
  .admin-section { min-height: calc(100vh - 200px); }
  .sidebar-link.active { background-color: rgba(255,107,0,0.1); color: #FF6B00; border-right: 3px solid #FF6B00; }
';

include dirname(__DIR__) . '/includes/header.php';
?>

<main>
  <section class="py-12 bg-gray-50 admin-section">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-8">

        <!-- Sidebar -->
        <aside class="lg:w-64 flex-shrink-0">
          <div class="bg-white rounded-2xl shadow-md p-6 lg:sticky lg:top-24">
            <!-- Admin Profile -->
            <div class="text-center mb-6 pb-6 border-b border-gray-200">
              <div class="w-20 h-20 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-3">
                <span class="text-3xl font-bold text-brand"><?php echo $adminInitials; ?></span>
              </div>
              <h3 class="text-lg font-bold text-gray-800"><?php echo e($adminUser['first_name'] . ' ' . $adminUser['last_name']); ?></h3>
              <p class="text-gray-500 text-sm"><?php echo e($adminUser['email']); ?></p>
              <span class="inline-block mt-2 px-3 py-1 bg-brand/10 text-brand text-xs font-medium rounded-full">Administrator</span>
            </div>

            <!-- Nav -->
            <nav class="space-y-1">
              <?php
              $navItems = [
                ['href' => '/admin/index.php',       'page' => 'dashboard',    'label' => 'Dashboard',    'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['href' => '/admin/users.php',        'page' => 'users',        'label' => 'Users',        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                ['href' => '/admin/instructors.php',  'page' => 'instructors',  'label' => 'Instructors',  'icon' => 'M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z'],
                ['href' => '/admin/courses.php',      'page' => 'courses',      'label' => 'Courses',      'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ['href' => '/admin/bookings.php',     'page' => 'bookings',     'label' => 'Bookings',     'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['href' => '/admin/payments.php',     'page' => 'payments',     'label' => 'Payments',     'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
                ['href' => '/admin/contacts.php',     'page' => 'contacts',     'label' => 'Contacts',     'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['href' => '/admin/testimonials.php', 'page' => 'testimonials', 'label' => 'Testimonials', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
              ];
              foreach ($navItems as $item):
                $isActive = (($adminActivePage ?? '') === $item['page']);
              ?>
              <a href="<?php echo $item['href']; ?>"
                 class="sidebar-link <?php echo $isActive ? 'active' : ''; ?> flex items-center gap-3 px-4 py-3 text-sm font-medium <?php echo $isActive ? 'text-brand' : 'text-gray-600'; ?> rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $item['icon']; ?>"/>
                </svg>
                <?php echo $item['label']; ?>
              </a>
              <?php endforeach; ?>

              <div class="pt-2 border-t border-gray-100 mt-2">
                <a href="/auth/logout.php"
                   class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                  </svg>
                  Logout
                </a>
              </div>
            </nav>
          </div>
        </aside>

        <!-- Page content -->
        <div class="flex-1 min-w-0">
          <!-- Page title bar -->
          <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800"><?php echo isset($adminPageTitle) ? e($adminPageTitle) : 'Admin'; ?></h1>
          </div>

          <?php if ($adminFlash): ?>
          <div class="mb-5 px-4 py-3 rounded-lg text-sm font-medium <?php echo $adminFlash['type'] === 'success' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200'; ?>">
            <?php echo e($adminFlash['message']); ?>
          </div>
          <?php endif; ?>
