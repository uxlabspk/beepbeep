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
      <!-- Login Form Section -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="max-w-2xl mx-auto">
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
                  <h2 class="text-3xl font-bold mb-4">Welcome Back to BeepBeep</h2>
                  <p class="text-gray-300 mb-8">
                    Sign in to access your driving lessons, progress tracking, and exclusive resources.
                    Our DVSA-approved instructors are ready to help you become a confident driver.
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

                  <h3 class="text-2xl font-bold text-gray-800 mb-2">Sign In to Your Account</h3>
                  <p class="text-gray-600 text-sm mb-8">
                    Enter your credentials to access your personalized dashboard.
                  </p>

                  <form action="auth/login-handler.php" method="POST" class="space-y-6">
                    <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                    <div>
                      <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                      <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        placeholder="your@email.com"
                      />
                    </div>

                    <div>
                      <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="forgot-password.php" class="text-sm text-brand hover:text-brand-dark transition-colors font-medium">
                          Forgot Password?
                        </a>
                      </div>
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

                    <button
                      type="submit"
                      class="w-full px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg transform hover:-translate-y-0.5"
                    >
                      Sign In
                    </button>
                  </form>

                  <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-gray-600 text-sm text-center">
                      Don't have an account?
                      <a href="signup.php" class="text-brand hover:text-brand-dark transition-colors font-semibold">
                        Sign Up Now
                      </a>
                    </p>
                  </div>
                </div>
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

<?php 
if (!isset($hideHeaderFooter) || !$hideHeaderFooter): 
  include __DIR__ . '/includes/footer.php'; 
endif; 
?>
