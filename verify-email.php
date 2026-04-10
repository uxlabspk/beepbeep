<?php
require_once __DIR__ . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();

$emailPrefill = sanitize($_GET['email'] ?? '');

$pageTitle = 'Verify Email | Beep Beep Driving School - Confirm Your Account';
$currentPage = 'verify-email';
$customStyles = '
      .auth-section {
        min-height: calc(100vh - 200px);
      }
';
include __DIR__ . '/includes/header.php';
?>

    <main>
      <!-- Page Hero Section -->
      <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
          <img
            src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1600&q=80"
            alt="Verify Email"
            class="w-full h-full object-cover opacity-40"
          />
        </div>
        <div
          class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent"
        ></div>
        <div class="container mx-auto px-4 relative z-10">
          <div class="max-w-3xl">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-4 flex items-center gap-2"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Email Verification
            </p>
            <h1
              class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
            >
              Verify Your<br /><span class="text-brand">Email Address</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
              Confirm your email to activate your account and start your driving journey.
            </p>
          </div>
        </div>
      </section>

      <!-- Email Verification Section -->
      <section class="py-20 bg-gray-50 auth-section">
        <div class="container mx-auto px-4">
          <div class="max-w-2xl mx-auto">
            <div class="bg-white p-8 rounded-2xl shadow-md">
              <!-- Success State (shown when verification is successful) -->
              <!-- To show this state, add ?status=success to the URL -->
              <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                <div class="text-center">
                  <div
                    class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6"
                  >
                    <svg
                      class="w-10 h-10 text-green-600"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Email Verified Successfully!
                  </h3>
                  <p class="text-gray-600 mb-6">
                    Your email has been successfully verified. Your account is now active and ready to use.
                  </p>
                  <a
                    href="login.php"
                    class="inline-block px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                  >
                    Sign In to Your Account
                  </a>
                </div>

              <!-- Error State (shown when verification fails) -->
              <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                <div class="text-center">
                  <div
                    class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6"
                  >
                    <svg
                      class="w-10 h-10 text-red-600"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Verification Failed
                  </h3>
                  <p class="text-gray-600 mb-6">
                    We were unable to verify your email. The link may have expired or is invalid.
                  </p>
                  <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                      href="signup.php"
                      class="px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                    >
                      Sign Up Again
                    </a>
                    <a
                      href="contact.php"
                      class="px-8 py-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-all"
                    >
                      Contact Support
                    </a>
                  </div>
                </div>

              <!-- Default State (pending verification / check email) -->
              <?php else: ?>
                <div class="text-center">
                  <div
                    class="w-20 h-20 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-6"
                  >
                    <svg
                      class="w-10 h-10 text-brand"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                      />
                    </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Check Your Email
                  </h3>
                  <p class="text-gray-600 mb-6">
                    We've sent a verification link to your email address. Click the link in the email to verify your account.
                  </p>

                  <div class="p-4 bg-blue-50 rounded-lg border border-blue-200 mb-6">
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
                      <div class="text-sm text-blue-800 text-left">
                        <p class="font-medium mb-1">Didn't receive the email?</p>
                        <p class="text-blue-600 mb-3">
                          Check your spam folder or request a new verification email.
                        </p>
                        <form action="auth/resend-verification-handler.php" method="POST" class="flex flex-col sm:flex-row gap-3">
                          <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                          <input
                            type="email"
                            name="resend_email"
                            value="<?php echo e($emailPrefill); ?>"
                            required
                            class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                            placeholder="Enter your email"
                          />
                          <button
                            type="submit"
                            class="px-6 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg whitespace-nowrap"
                          >
                            Resend Email
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="mt-6">
                    <p class="text-gray-600 text-sm mb-4">
                      Already verified your email?
                    </p>
                    <a
                      href="login.php"
                      class="inline-block px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
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
