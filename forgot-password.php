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
$hideHeaderFooter = true;
include __DIR__ . '/includes/header.php';
?>

    <main>
      <section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-gray-50 to-white py-10 sm:py-14">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,107,0,0.14),_transparent_40%),radial-gradient(circle_at_bottom_left,_rgba(26,26,46,0.05),_transparent_45%)]"></div>

        <div class="container relative z-10 mx-auto px-4">
          <div class="mx-auto grid max-w-5xl overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-2xl lg:grid-cols-2">
            <div class="hidden bg-gradient-to-br from-orange-50 to-white p-10 text-gray-900 lg:flex lg:flex-col lg:justify-between">
              <div>
                <div class="mb-8 inline-flex items-center gap-2 text-2xl font-bold">
                  <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand shadow-lg shadow-brand/30">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                  </div>
                  <span>Beep<span class="text-brand">Beep</span></span>
                </div>
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-brand">Account Security</p>
                <h1 class="mb-4 text-4xl font-bold leading-tight">Reset your password securely</h1>
                <p class="text-base leading-relaxed text-gray-600">
                  Enter the email linked to your account and we will send a secure reset link to help you regain access quickly.
                </p>
              </div>

              <div class="space-y-3 text-sm text-gray-600">
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Secure one-time reset links</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Quick recovery process</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Support available if needed</p>
              </div>
            </div>

            <div class="px-6 py-10 sm:px-10 lg:px-12">
              <div class="mb-8 lg:hidden">
                <div class="inline-flex items-center gap-2 text-2xl font-bold text-dark">
                  <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                  </div>
                  <span>Beep<span class="text-brand">Beep</span></span>
                </div>
              </div>

              <div class="mb-6 text-center sm:text-left">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-brand/10 sm:mx-0">
                  <svg class="h-8 w-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                  </svg>
                </div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-brand">Password Recovery</p>
                <h2 class="mb-2 text-3xl font-bold text-gray-900">Forgot your password?</h2>
                <p class="text-sm leading-relaxed text-gray-600">
                  Provide your email address and we will send a password reset link.
                </p>
              </div>

              <form action="auth/forgot-password-handler.php" method="POST" class="space-y-6">
                <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                <div>
                  <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email Address</label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                    placeholder="john@example.com"
                  />
                </div>

                <button
                  type="submit"
                  class="w-full rounded-xl bg-brand px-8 py-4 font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl"
                >
                  Send Reset Link
                </button>
              </form>

              <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                  Remember your password?
                  <a href="login.php" class="font-medium text-brand transition-colors hover:text-brand-dark">Back to Login</a>
                </p>
              </div>

              <div class="mt-6 rounded-xl border border-blue-200 bg-blue-50 p-4">
                <div class="flex items-start gap-3">
                  <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <div class="text-sm text-blue-800">
                    <p class="mb-1 font-medium">Didn’t receive the email?</p>
                    <p class="text-blue-700">Check your spam folder and make sure the address is correct.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
