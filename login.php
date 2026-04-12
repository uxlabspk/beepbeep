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
      <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
          <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
              <div class="px-6 py-10 sm:px-10 lg:px-12">
                  <!-- Mobile Logo -->
                  <div class="lg:hidden mb-8 text-center">
                    <div class="inline-flex items-center gap-2 text-2xl font-bold text-dark mb-2">
                      <div class="w-10 h-10 bg-brand rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                      </div>
                      <span>Beep<span class="text-brand">Beep</span></span>
                    </div>
                  </div>

                  <!-- Header -->
                  <div class="mb-8">
                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 leading-tight">Welcome Back</h3>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                      Sign in to access your personalized dashboard and continue your learning journey.
                    </p>
                  </div>

                  <!-- Form -->
                  <form action="auth/login-handler.php" method="POST" class="space-y-5">
                    <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                    
                    <!-- Email Field -->
                    <div>
                      <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                      <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full px-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all text-base placeholder-gray-400"
                        placeholder="your@email.com"
                      />
                    </div>

                    <!-- Password Field -->
                    <div>
                      <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
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
                          class="w-full px-4 py-3.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12 text-base placeholder-gray-400"
                          placeholder="Enter your password"
                        />
                        <button
                          type="button"
                          id="togglePassword"
                          class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-brand transition-colors focus:outline-none"
                          aria-label="Toggle password visibility"
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

                    <!-- Remember Me -->
                    <div class="flex items-center">
                      <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand cursor-pointer"
                      />
                      <label for="remember" class="ml-2 text-sm text-gray-600 cursor-pointer select-none">
                        Remember me for 30 days
                      </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                      type="submit"
                      class="w-full px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg transform hover:-translate-y-0.5 text-base focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2"
                    >
                      Sign In
                    </button>
                  </form>

                  <!-- Sign Up Link -->
                  <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-gray-600 text-sm text-center leading-relaxed">
                      Don't have an account?
                      <a href="signup.php" class="text-brand hover:text-brand-dark transition-colors font-semibold">
                        Create Account
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
