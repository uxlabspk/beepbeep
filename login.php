<?php
require_once __DIR__ . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();

if (isLoggedIn()) {
  redirect('/dashboard.php');
}

$pageTitle = 'Login | Beep Beep Driving School';
$currentPage = 'login';
$customStyles = '';
$hideHeaderFooter = true;
include __DIR__ . '/includes/header.php';
?>

    <main>
      <section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-gray-50 to-white py-10 sm:py-14">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,107,0,0.14),_transparent_45%),radial-gradient(circle_at_bottom_left,_rgba(26,26,46,0.05),_transparent_40%)]"></div>

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
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-brand">Student Access</p>
                <h1 class="mb-4 text-4xl font-bold leading-tight">Welcome back to your learning dashboard</h1>
                <p class="text-base leading-relaxed text-gray-600">
                  Track your lessons, review progress milestones, and manage your bookings with a clean and secure account area.
                </p>
              </div>

              <div class="space-y-3 text-sm text-gray-600">
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>DVSA-approved instructor network</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Flexible manual and automatic lessons</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Secure account and booking management</p>
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

              <div class="mb-8">
                <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-brand">Account Login</p>
                <h2 class="mb-2 text-3xl font-bold text-gray-900">Sign in</h2>
                <p class="text-sm leading-relaxed text-gray-600">Use your account details to continue your driving journey.</p>
              </div>

              <form action="auth/login-handler.php" method="POST" class="space-y-5">
                <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />

                <div>
                  <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email Address</label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                    placeholder="your@email.com"
                  />
                </div>

                <div>
                  <div class="mb-2 flex items-center justify-between">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                    <a href="forgot-password.php" class="text-sm font-medium text-brand transition-colors hover:text-brand-dark">Forgot password?</a>
                  </div>

                  <div class="relative">
                    <input
                      type="password"
                      id="password"
                      name="password"
                      required
                      class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3.5 pr-12 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                      placeholder="Enter your password"
                    />
                    <button
                      type="button"
                      id="togglePassword"
                      class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 transition-colors hover:text-brand focus:outline-none"
                      aria-label="Toggle password visibility"
                    >
                      <svg id="eyeIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="flex items-center">
                  <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    class="h-4 w-4 cursor-pointer rounded border-gray-300 text-brand focus:ring-brand"
                  />
                  <label for="remember" class="ml-2 cursor-pointer select-none text-sm text-gray-600">Remember me for 30 days</label>
                </div>

                <button
                  type="submit"
                  class="w-full rounded-xl bg-brand px-8 py-4 text-base font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2"
                >
                  Sign In
                </button>
              </form>

              <div class="mt-8 border-t border-gray-200 pt-6">
                <p class="text-center text-sm leading-relaxed text-gray-600">
                  Don't have an account?
                  <a href="signup.php" class="font-semibold text-brand transition-colors hover:text-brand-dark">Create Account</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <script>
      // Toggle password visibility
      const togglePassword = document.getElementById("togglePassword");
      const passwordInput = document.getElementById("password");
      const eyeIcon = document.getElementById("eyeIcon");

      if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener("click", () => {
          const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
          passwordInput.setAttribute("type", type);

          if (type === "text") {
            eyeIcon.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
          } else {
            eyeIcon.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
          }
        });
      }
    </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
