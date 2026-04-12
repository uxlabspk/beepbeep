<?php
require_once __DIR__ . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();

if (isLoggedIn()) {
  redirect('/dashboard.php');
}

$pageTitle = 'Sign Up | Beep Beep Driving School - Create Your Account';
$currentPage = 'signup';
$customStyles = '';
$hideHeaderFooter = true;
include __DIR__ . '/includes/header.php';
?>

    <main>
      <section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-gray-50 to-white py-10 sm:py-14">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(255,107,0,0.14),_transparent_40%),radial-gradient(circle_at_bottom_right,_rgba(26,26,46,0.05),_transparent_45%)]"></div>

        <div class="container relative z-10 mx-auto px-4">
          <div class="mx-auto grid max-w-6xl overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-2xl lg:grid-cols-2">
            <div class="hidden bg-gradient-to-br from-orange-50 to-white p-10 text-gray-900 lg:flex lg:flex-col">
              <div class="mb-8 inline-flex items-center gap-2 text-2xl font-bold">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand shadow-lg shadow-brand/30">
                  <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <span>Beep<span class="text-brand">Beep</span></span>
              </div>

              <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-brand">New Student Registration</p>
              <h1 class="mb-4 text-4xl font-bold leading-tight">Build your driving confidence from day one</h1>
              <p class="mb-8 text-base leading-relaxed text-gray-600">
                Join a structured learning experience with certified instructors, flexible schedules, and progress tracking designed for first-time and returning drivers.
              </p>

              <div class="space-y-4 text-sm text-gray-600">
                <div class="flex items-center gap-3">
                  <span class="h-2 w-2 rounded-full bg-brand"></span>
                  Personalized lessons tailored to your pace
                </div>
                <div class="flex items-center gap-3">
                  <span class="h-2 w-2 rounded-full bg-brand"></span>
                  Manual and automatic packages available
                </div>
                <div class="flex items-center gap-3">
                  <span class="h-2 w-2 rounded-full bg-brand"></span>
                  Dedicated dashboard for bookings and updates
                </div>
              </div>

              <div class="mt-auto rounded-2xl border border-orange-100 bg-white p-5 shadow-sm">
                <p class="text-sm leading-relaxed text-gray-700">
                  “The instructors were patient, professional, and helped me pass first time. The online dashboard made everything simple.”
                </p>
                <p class="mt-3 text-xs font-semibold uppercase tracking-widest text-brand">— Recent Student</p>
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
                <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-brand">Create Account</p>
                <h2 class="mb-2 text-3xl font-bold text-gray-900">Sign up</h2>
                <p class="text-sm leading-relaxed text-gray-600">Fill in your details to start your driving journey.</p>
              </div>

              <form action="auth/signup-handler.php" method="POST" class="space-y-6">
                <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                  <div>
                    <label for="firstName" class="mb-2 block text-sm font-semibold text-gray-700">First Name</label>
                    <input
                      type="text"
                      id="firstName"
                      name="firstName"
                      required
                      class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                      placeholder="John"
                    />
                  </div>
                  <div>
                    <label for="lastName" class="mb-2 block text-sm font-semibold text-gray-700">Last Name</label>
                    <input
                      type="text"
                      id="lastName"
                      name="lastName"
                      required
                      class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                      placeholder="Smith"
                    />
                  </div>
                </div>

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

                <div>
                  <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">Phone Number</label>
                  <input
                    type="tel"
                    id="phone"
                    name="phone"
                    required
                    class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                    placeholder="07123 456789"
                  />
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                  <div>
                    <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">Password</label>
                    <div class="relative">
                      <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-12 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                        placeholder="Create password"
                      />
                      <button
                        type="button"
                        id="togglePassword"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 transition-colors hover:text-brand"
                        aria-label="Toggle password visibility"
                      >
                        <svg id="eyeIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div>
                    <label for="confirmPassword" class="mb-2 block text-sm font-semibold text-gray-700">Confirm Password</label>
                    <div class="relative">
                      <input
                        type="password"
                        id="confirmPassword"
                        name="confirmPassword"
                        required
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-12 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                        placeholder="Confirm password"
                      />
                      <button
                        type="button"
                        id="toggleConfirmPassword"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 transition-colors hover:text-brand"
                        aria-label="Toggle confirm password visibility"
                      >
                        <svg id="eyeIconConfirm" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="flex items-start gap-3 rounded-xl border border-gray-200 bg-gray-50 p-4">
                  <input
                    type="checkbox"
                    id="terms"
                    name="terms"
                    required
                    class="mt-1 h-4 w-4 rounded border-gray-300 text-brand focus:ring-brand"
                  />
                  <label for="terms" class="text-sm leading-relaxed text-gray-600">
                    I agree to the
                    <a href="terms.php" class="font-medium text-brand hover:underline">Terms & Conditions</a>
                    and
                    <a href="privacy.php" class="font-medium text-brand hover:underline">Privacy Policy</a>.
                  </label>
                </div>

                <button
                  type="submit"
                  class="w-full rounded-xl bg-brand px-8 py-4 font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl"
                >
                  Create Account
                </button>
              </form>

              <div class="mt-8 border-t border-gray-200 pt-6">
                <p class="text-center text-sm text-gray-600">
                  Already have an account?
                  <a href="login.php" class="font-semibold text-brand transition-colors hover:text-brand-dark">Sign In</a>
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

      // Toggle confirm password visibility
      const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
      const confirmPasswordInput = document.getElementById("confirmPassword");
      const eyeIconConfirm = document.getElementById("eyeIconConfirm");

      if (toggleConfirmPassword && confirmPasswordInput && eyeIconConfirm) {
        toggleConfirmPassword.addEventListener("click", () => {
          const type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password";
          confirmPasswordInput.setAttribute("type", type);

          if (type === "text") {
            eyeIconConfirm.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
          } else {
            eyeIconConfirm.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
          }
        });
      }
    </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
