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
      <!-- Signup Form Section -->
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
                  <h2 class="text-3xl font-bold mb-4">Start Your Driving Journey</h2>
                  <p class="text-gray-300 mb-8">
                    Join thousands of successful drivers who learned with BeepBeep. Our DVSA-approved instructors provide personalized lessons to help you pass your test with confidence.
                  </p>
                  <div class="space-y-4 text-sm text-gray-300">
                    <div class="flex items-center gap-3">
                      <svg class="w-5 h-5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      Expert DVSA-approved instructors
                    </div>
                    <div class="flex items-center gap-3">
                      <svg class="w-5 h-5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      Flexible scheduling to fit your lifestyle
                    </div>
                    <div class="flex items-center gap-3">
                      <svg class="w-5 h-5 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                      </svg>
                      Modern vehicles with dual controls
                    </div>
                  </div>
                  <div class="mt-8">
                    <img src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=400&q=80"
                         alt="Happy driving student"
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

                  <h3 class="text-2xl font-bold text-gray-800 mb-2">Create Your Account</h3>
                  <p class="text-gray-600 text-sm mb-8">
                    Fill in your details to start your journey to becoming a confident driver.
                  </p>

                  <form action="auth/signup-handler.php" method="POST" class="space-y-6">
                    <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <input
                          type="text"
                          id="firstName"
                          name="firstName"
                          required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                          placeholder="John"
                        />
                      </div>
                      <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                        <input
                          type="text"
                          id="lastName"
                          name="lastName"
                          required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                          placeholder="Smith"
                        />
                      </div>
                    </div>

                    <div>
                      <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
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
                      <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                      <input
                        type="tel"
                        id="phone"
                        name="phone"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        placeholder="07123 456789"
                      />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                          <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                            placeholder="Create password"
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
                      <div>
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <div class="relative">
                          <input
                            type="password"
                            id="confirmPassword"
                            name="confirmPassword"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                            placeholder="Confirm password"
                          />
                          <button
                            type="button"
                            id="toggleConfirmPassword"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-brand transition-colors"
                          >
                            <svg
                              id="eyeIconConfirm"
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
                    </div>

                    <div class="flex items-start gap-3">
                      <input
                        type="checkbox"
                        id="terms"
                        name="terms"
                        required
                        class="mt-1 w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand"
                      />
                      <label for="terms" class="text-sm text-gray-600">
                        I agree to the
                        <a href="terms.php" class="text-brand hover:underline font-medium">
                          Terms & Conditions</a>
                        and
                        <a href="privacy.php" class="text-brand hover:underline font-medium">
                          Privacy Policy</a>.
                      </label>
                    </div>

                    <button
                      type="submit"
                      class="w-full px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg transform hover:-translate-y-0.5"
                    >
                      Create Account
                    </button>
                  </form>

                  <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-gray-600 text-sm text-center">
                      Already have an account?
                      <a href="login.php" class="text-brand hover:text-brand-dark transition-colors font-semibold">
                        Sign In
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

<?php 
if (!isset($hideHeaderFooter) || !$hideHeaderFooter): 
  include __DIR__ . '/includes/footer.php'; 
endif; 
?>
