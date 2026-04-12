<?php
require_once __DIR__ . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();

$emailPrefill = sanitize($_GET['email'] ?? '');

$pageTitle = 'Verify Email | Beep Beep Driving School - Confirm Your Account';
$currentPage = 'verify-email';
$customStyles = '';
$hideHeaderFooter = true;
include __DIR__ . '/includes/header.php';
?>

    <main>
      <section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-gray-50 to-white py-10 sm:py-14">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(255,107,0,0.14),_transparent_42%),radial-gradient(circle_at_bottom_right,_rgba(26,26,46,0.05),_transparent_46%)]"></div>

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

                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-brand">Email Verification</p>
                <h1 class="mb-4 text-4xl font-bold leading-tight">Activate your account</h1>
                <p class="text-base leading-relaxed text-gray-600">
                  Verifying your email keeps your account secure and unlocks your full dashboard experience.
                </p>
              </div>

              <div class="space-y-3 text-sm text-gray-600">
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Secure account activation</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Fast verification process</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Support if your link expires</p>
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

              <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                <div class="text-center">
                  <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-green-100">
                    <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-green-600">Success</p>
                  <h2 class="mb-3 text-3xl font-bold text-gray-900">Email verified</h2>
                  <p class="mb-6 text-sm leading-relaxed text-gray-600">
                    Your account is now active and ready to use.
                  </p>
                  <a
                    href="login.php"
                    class="inline-block rounded-xl bg-brand px-8 py-4 font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl"
                  >
                    Sign In to Your Account
                  </a>
                </div>

              <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                <div class="text-center">
                  <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-red-100">
                    <svg class="h-10 w-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-red-600">Verification Error</p>
                  <h2 class="mb-3 text-3xl font-bold text-gray-900">Verification failed</h2>
                  <p class="mb-6 text-sm leading-relaxed text-gray-600">
                    The verification link may be expired or invalid.
                  </p>
                  <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    <a
                      href="signup.php"
                      class="rounded-xl bg-brand px-8 py-4 font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl"
                    >
                      Sign Up Again
                    </a>
                    <a
                      href="contact.php"
                      class="rounded-xl bg-gray-200 px-8 py-4 font-semibold text-gray-700 transition-all hover:bg-gray-300"
                    >
                      Contact Support
                    </a>
                  </div>
                </div>

              <?php else: ?>
                <div>
                  <div class="mb-6 text-center sm:text-left">
                    <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-2xl bg-brand/10 sm:mx-0">
                      <svg class="h-10 w-10 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-brand">One More Step</p>
                    <h2 class="mb-3 text-3xl font-bold text-gray-900">Check your email</h2>
                    <p class="text-sm leading-relaxed text-gray-600">
                      We have sent a verification link to your email address. Open that link to activate your account.
                    </p>
                  </div>

                  <div class="mb-6 rounded-xl border border-blue-200 bg-blue-50 p-4">
                    <div class="flex items-start gap-3">
                      <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <div class="w-full text-left text-sm text-blue-800">
                        <p class="mb-1 font-medium">Didn’t receive the email?</p>
                        <p class="mb-3 text-blue-700">Check your spam folder or request a new verification email.</p>
                        <form action="auth/resend-verification-handler.php" method="POST" class="flex flex-col gap-3 sm:flex-row">
                          <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                          <input
                            type="email"
                            name="resend_email"
                            value="<?php echo e($emailPrefill); ?>"
                            required
                            class="flex-1 rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-800 transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                            placeholder="Enter your email"
                          />
                          <button
                            type="submit"
                            class="whitespace-nowrap rounded-xl bg-brand px-6 py-3 font-semibold text-white transition-all hover:bg-brand-dark hover:shadow-lg"
                          >
                            Resend Email
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <p class="mb-4 text-sm text-gray-600">Already verified your email?</p>
                    <a
                      href="login.php"
                      class="inline-block rounded-xl bg-brand px-8 py-4 font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl"
                    >
                      Sign In Now
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
