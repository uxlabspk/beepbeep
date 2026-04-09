<?php
require_once dirname(__DIR__) . '/auth/middleware.php';
require_once DATABASE_PATH . '/db.php';

requireAuth();

$sessionUser = currentUser();
$userId = (int) ($sessionUser['id'] ?? 0);

if ($userId <= 0) {
    setFlash('error', 'Please log in to continue.');
    redirect('/login.php');
}

try {
    $db = getDB();
    $stmt = $db->prepare('SELECT id, first_name, last_name, email, phone FROM users WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $userId]);
    $profile = $stmt->fetch();

    if (!$profile) {
        logoutUser();
        initSession();
        setFlash('error', 'Your account was not found. Please sign in again.');
        redirect('/login.php');
    }
} catch (PDOException $e) {
    error_log('Profile page load error: ' . $e->getMessage());
    setFlash('error', 'Could not load profile right now.');
    redirect('/dashboard.php');
}

$userInitials = strtoupper(substr(($profile['first_name'] ?? 'U'), 0, 1) . substr(($profile['last_name'] ?? 'S'), 0, 1));

$pageTitle = 'Profile Settings | Beep Beep Driving School';
$currentPage = 'dashboard';
$customStyles = '
      .dashboard-section {
        min-height: calc(100vh - 200px);
      }
      .sidebar-link.active {
        background-color: rgba(255, 107, 0, 0.1);
        color: #FF6B00;
        border-right: 3px solid #FF6B00;
      }
';
include dirname(__DIR__) . '/includes/header.php';
?>

    <main>
      <section class="py-12 bg-gray-50 dashboard-section">
        <div class="container mx-auto px-4">
          <div class="flex flex-col lg:flex-row gap-8">
            <aside class="lg:w-64 flex-shrink-0">
              <div class="bg-white rounded-2xl shadow-md p-6 lg:sticky lg:top-24">
                <div class="text-center mb-6 pb-6 border-b border-gray-200">
                  <div class="w-20 h-20 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-3xl font-bold text-brand"><?php echo e($userInitials); ?></span>
                  </div>
                  <h3 class="text-lg font-bold text-gray-800"><?php echo e(trim($profile['first_name'] . ' ' . $profile['last_name'])); ?></h3>
                  <p class="text-gray-500 text-sm"><?php echo e($profile['email']); ?></p>
                  <span class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">
                    Active Student
                  </span>
                </div>

                <nav class="space-y-1">
                  <a href="dashboard.php" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                  </a>
                  <a href="profile.php" class="sidebar-link active flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Profile
                  </a>
                  <a href="#danger-zone" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 7h12m-9 0V5a3 3 0 016 0v2m-7 0l1 12h6l1-12M10 11v5m4-5v5" />
                    </svg>
                    Delete Profile
                  </a>
                  <a href="auth/logout.php" class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                  </a>
                </nav>
              </div>
            </aside>

            <div class="flex-1 space-y-8">
              <div class="bg-white rounded-2xl shadow-md p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Profile Settings</h1>
                <p class="text-gray-500 mb-6">Update your personal account details below.</p>

                <form action="auth/profile-update-handler.php" method="POST" class="space-y-6">
                  <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                      <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                      <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        required
                        value="<?php echo e($profile['first_name']); ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      />
                    </div>

                    <div>
                      <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                      <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        required
                        value="<?php echo e($profile['last_name']); ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      />
                    </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                      <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                      <input
                        type="email"
                        id="email"
                        value="<?php echo e($profile['email']); ?>"
                        disabled
                        class="w-full px-4 py-3 border border-gray-200 bg-gray-100 text-gray-500 rounded-lg"
                      />
                      <p class="text-xs text-gray-500 mt-2">Email address cannot be changed here.</p>
                    </div>

                    <div>
                      <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                      <input
                        type="text"
                        id="phone"
                        name="phone"
                        required
                        value="<?php echo e($profile['phone']); ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      />
                    </div>
                  </div>

                  <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit" class="px-6 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all">
                      Save Profile Changes
                    </button>
                    <a href="change-password.php" class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-all text-center">
                      Change Password
                    </a>
                  </div>
                </form>
              </div>

              <div id="danger-zone" class="bg-white rounded-2xl shadow-md p-8 border border-red-200">
                <h2 class="text-2xl font-bold text-red-700 mb-2">Danger Zone</h2>
                <p class="text-gray-600 mb-6">Deleting your profile is permanent and cannot be undone.</p>

                <form action="auth/delete-profile-handler.php" method="POST" class="space-y-4">
                  <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />

                  <div>
                    <label for="confirm_delete" class="block text-sm font-medium text-gray-700 mb-2">Type DELETE to confirm</label>
                    <input
                      type="text"
                      id="confirm_delete"
                      name="confirm_delete"
                      required
                      placeholder="DELETE"
                      class="w-full max-w-md px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                    />
                  </div>

                  <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                    <input
                      type="password"
                      id="current_password"
                      name="current_password"
                      required
                      placeholder="Enter your current password"
                      class="w-full max-w-md px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                    />
                  </div>

                  <button
                    type="submit"
                    class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all"
                    onclick="return confirm('Delete your profile permanently? This cannot be undone.');"
                  >
                    Delete Profile Permanently
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
