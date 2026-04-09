<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();

if (isLoggedIn()) {
  redirect('/dashboard.php');
}

$pageTitle = 'Login | Beep Beep Driving School';
$currentPage = 'login';
$customStyles = '
      .auth-section {
        min-height: calc(100vh - 200px);
      }
';
include dirname(__DIR__) . '/includes/header.php';
?>

    <main>
      <!-- Page Hero Section -->
      <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
          <img
            src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?w=1600&q=80"
            alt="Login"
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
              Welcome Back
            </p>
            <h1
              class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
            >
              Login to Your<br /><span class="text-brand">Account</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
              Access your dashboard, book lessons, and track your progress.
            </p>
          </div>
        </div>
      </section>

      <!-- Login Form Section -->
      <section class="py-20 bg-gray-50 auth-section">
        <div class="container mx-auto px-4">
          <div class="max-w-md mx-auto">
            <div class="bg-white p-8 rounded-2xl shadow-md">
              <h3 class="text-2xl font-bold text-gray-800 mb-2">
                Sign In to Your Account
              </h3>
              <p class="text-gray-600 text-sm mb-6">
                Enter your email and password to access your account.
              </p>

              <form action="auth/login-handler.php" method="POST" class="space-y-6">
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

                <div>
                  <label
                    for="password"
                    class="block text-sm font-medium text-gray-700 mb-2"
                    >Password *</label
                  >
                  <div class="relative">
                    <input
                      type="password"
                      id="password"
                      name="password"
                      required
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                      placeholder="Enter your password"
                    />
                    <button
                      type="button"
                      id="togglePassword"
                      class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-brand transition-colors"
                    >
                      <svg
                        id="eyeIcon"
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-2">
                    <input
                      type="checkbox"
                      id="remember"
                      name="remember"
                      class="w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand"
                    />
                    <label for="remember" class="text-sm text-gray-600">
                      Remember me
                    </label>
                  </div>
                  <a
                    href="forgot-password.php"
                    class="text-sm text-brand hover:text-brand-dark transition-colors font-medium"
                  >
                    Forgot Password?
                  </a>
                </div>

                <button
                  type="submit"
                  class="w-full px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                >
                  Sign In
                </button>
              </form>

              <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                  Don't have an account?
                  <a
                    href="signup.php"
                    class="text-brand hover:text-brand-dark transition-colors font-medium"
                  >
                    Sign Up Now
                  </a>
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
          const type =
            passwordInput.getAttribute("type") === "password"
              ? "text"
              : "password";
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

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
