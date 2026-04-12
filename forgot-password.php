<?php
require_once __DIR__ . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();

if (isLoggedIn()) {
  redirect('/dashboard.php');
}

$pageTitle = 'Forgot Password | Beep Beep Driving School - Reset Your Password';
$currentPage = 'forgot-password';
$customStyles = '';
include __DIR__ . '/includes/header.php';
?>

    <main>
      <!-- Forgot Password Form Section -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
              <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Left side - Branding -->
                <div class="hidden lg:block bg-gradient-to-br from-dark-card to-dark p-8 text-white">
                  <div class="flex items-center gap-2 text-2xl font-bold mb-6">
                    <div class="w-10 h-10 bg-brand rounded-lg flex items-center justify-center">
                      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                      </svg>
                    </div>
                    <span>Beep<span class="text-brand">Beep</span></span>
                  </div>
                  <h2 class="text-3xl font-bold mb-4">Reset Your Password</h2>
                  <p class="text-gray-300 mb-8">
                    Enter your email address and we'll send you a link to reset your password and regain access to your account.
                  </p>
                  <div class="mt-auto">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=400&q=80"
                         alt="Driving school car"
                         class="w-full h-48 object-cover rounded-lg opacity-80" />
                  </div>
                </div>

                <!-- Right side - Form -->
                <div class="p-8 lg:p-12">
                  <div class="lg:hidden mb-8">
                    <div class="flex items-center gap-2 text-2xl font-bold text-dark mb-4">
                      <div class="w-10 h-10 bg-brand rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                      </div>
                      <span>Beep<span class="text-brand">Beep</span></span>
                    </div>
                  </div>
              <div class="text-center mb-6">
                <div
                  class="w-16 h-16 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-4"
                >
                  <svg
                    class="w-8 h-8 text-brand"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"
                    />
                  </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                  Reset Your Password
                </h3>
                <p class="text-gray-600 text-sm">
                  Enter the email address associated with your account and we'll send you a link to reset your password.
                </p>
              </div>

              <form action="auth/forgot-password-handler.php" method="POST" class="space-y-6">
                <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                <div>
                  <label
                    for="email"
                    class="block text-sm font-medium text-gray-700 mb-2"
                    >Email Address *</label
                  >
                  <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                    placeholder="john@example.com"
                  />
                </div>

                <button
                  type="submit"
                  class="w-full px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                >
                  Send Reset Link
                </button>
              </form>

              <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                  Remember your password?
                  <a
                    href="login.php"
                    class="text-brand hover:text-brand-dark transition-colors font-medium"
                  >
                    Back to Login
                  </a>
                </p>
              </div>

              <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <div class="flex items-start gap-3">
                  <svg
                    class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                  <div class="text-sm text-blue-800">
                    <p class="font-medium mb-1">Didn't receive the email?</p>
                    <p class="text-blue-600">
                      Check your spam folder.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
