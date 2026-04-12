<?php
require_once __DIR__ . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

initSession();

$resetToken = sanitize($_GET['token'] ?? '');
$isResetFlow = !empty($resetToken);

if (!$isResetFlow && !isLoggedIn()) {
  setFlash('error', 'Please log in to change your password.');
  redirect('/login.php');
}

$pageTitle = 'Change Password | Beep Beep Driving School - Update Your Password';
$currentPage = 'change-password';
$customStyles = '';
include __DIR__ . '/includes/header.php';
?>

    <main>
      <!-- Change Password Form Section -->
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
                  <h2 class="text-3xl font-bold mb-4">Update Your Password</h2>
                  <p class="text-gray-300 mb-8">
                    Keep your account secure by updating your password regularly. Our system ensures your information stays protected.
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
              <!-- Success Message (shown when password is changed successfully) -->
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
                    Password Changed Successfully!
                  </h3>
                  <p class="text-gray-600 mb-6">
                    Your password has been updated. You can now login with your new password.
                  </p>
                  <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                      href="login.php"
                      class="px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                    >
                      Sign In Now
                    </a>
                    <a
                      href="dashboard.php"
                      class="px-8 py-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-all"
                    >
                      Back to Dashboard
                    </a>
                  </div>
                </div>

              <?php else: ?>
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
                    Update Your Password
                  </h3>
                  <p class="text-gray-600 text-sm">
                    Enter your current password and choose a new one.
                  </p>
                </div>

                <!-- Password Requirements Info -->
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
                    <div class="text-sm text-blue-800">
                      <p class="font-medium mb-1">Password Requirements:</p>
                      <ul class="text-blue-600 space-y-1">
                        <li>• At least 8 characters long</li>
                        <li>• At least one uppercase letter (A-Z)</li>
                        <li>• At least one number (0-9)</li>
                        <li>• At least one special character (!@#$%^&*)</li>
                      </ul>
                    </div>
                  </div>
                </div>

                <form action="auth/change-password-handler.php" method="POST" class="space-y-6">
                  <input type="hidden" name="csrf_token" value="<?php echo e(generateCsrfToken()); ?>" />
                  <?php if ($isResetFlow): ?>
                    <input type="hidden" name="reset_token" value="<?php echo e($resetToken); ?>" />
                  <?php endif; ?>

                  <!-- Current Password -->
                  <?php if (!$isResetFlow): ?>
                  <div>
                    <label
                      for="currentPassword"
                      class="block text-sm font-medium text-gray-700 mb-2"
                      >Current Password *</label
                    >
                    <div class="relative">
                      <input
                        type="password"
                        id="currentPassword"
                        name="currentPassword"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                        placeholder="Enter your current password"
                      />
                      <button
                        type="button"
                        id="toggleCurrentPassword"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-brand transition-colors"
                      >
                        <svg
                          id="eyeIconCurrent"
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
                  <?php endif; ?>

                  <!-- New Password -->
                  <div>
                    <label
                      for="newPassword"
                      class="block text-sm font-medium text-gray-700 mb-2"
                      >New Password *</label
                    >
                    <div class="relative">
                      <input
                        type="password"
                        id="newPassword"
                        name="newPassword"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                        placeholder="Enter new password"
                      />
                      <button
                        type="button"
                        id="toggleNewPassword"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-brand transition-colors"
                      >
                        <svg
                          id="eyeIconNew"
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
                    <!-- Password Strength Indicator -->
                    <div id="passwordStrength" class="mt-2 hidden">
                      <div class="flex items-center gap-2 mb-1">
                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                          <div
                            id="strengthBar"
                            class="h-2 rounded-full transition-all duration-300"
                            style="width: 0%"
                          ></div>
                        </div>
                        <span
                          id="strengthText"
                          class="text-xs font-medium text-gray-600"
                        ></span>
                      </div>
                    </div>
                  </div>

                  <!-- Confirm New Password -->
                  <div>
                    <label
                      for="confirmPassword"
                      class="block text-sm font-medium text-gray-700 mb-2"
                      >Confirm New Password *</label
                    >
                    <div class="relative">
                      <input
                        type="password"
                        id="confirmPassword"
                        name="confirmPassword"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                        placeholder="Confirm new password"
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
                    <!-- Password Match Indicator -->
                    <div id="passwordMatch" class="mt-2 hidden">
                      <p
                        id="matchText"
                        class="text-sm font-medium"
                      ></p>
                    </div>
                  </div>

                  <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button
                      type="submit"
                      class="flex-1 px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                    >
                      Update Password
                    </button>
                    <a
                      href="<?php echo $isResetFlow ? 'login.php' : 'dashboard.php'; ?>"
                      class="flex-1 px-8 py-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-all text-center"
                    >
                      Cancel
                    </a>
                  </div>
                </form>

                <div class="mt-6 text-center">
                  <p class="text-gray-600 text-sm">
                    Forgot your password?
                    <a
                      href="forgot-password.php"
                      class="text-brand hover:text-brand-dark transition-colors font-medium"
                    >
                      Reset it here
                    </a>
                  </p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </main>

    <script>
      // Toggle current password visibility
      const toggleCurrentPassword = document.getElementById("toggleCurrentPassword");
      const currentPasswordInput = document.getElementById("currentPassword");
      const eyeIconCurrent = document.getElementById("eyeIconCurrent");

      if (toggleCurrentPassword && currentPasswordInput && eyeIconCurrent) {
        toggleCurrentPassword.addEventListener("click", () => {
          const type =
            currentPasswordInput.getAttribute("type") === "password"
              ? "text"
              : "password";
          currentPasswordInput.setAttribute("type", type);

          if (type === "text") {
            eyeIconCurrent.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
          } else {
            eyeIconCurrent.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
          }
        });
      }

      // Toggle new password visibility
      const toggleNewPassword = document.getElementById("toggleNewPassword");
      const newPasswordInput = document.getElementById("newPassword");
      const eyeIconNew = document.getElementById("eyeIconNew");

      if (toggleNewPassword && newPasswordInput && eyeIconNew) {
        toggleNewPassword.addEventListener("click", () => {
          const type =
            newPasswordInput.getAttribute("type") === "password"
              ? "text"
              : "password";
          newPasswordInput.setAttribute("type", type);

          if (type === "text") {
            eyeIconNew.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
          } else {
            eyeIconNew.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
          }
        });
      }

      // Toggle confirm password visibility
      const toggleConfirmPassword = document.getElementById(
        "toggleConfirmPassword"
      );
      const confirmPasswordInput = document.getElementById("confirmPassword");
      const eyeIconConfirm = document.getElementById("eyeIconConfirm");

      if (toggleConfirmPassword && confirmPasswordInput && eyeIconConfirm) {
        toggleConfirmPassword.addEventListener("click", () => {
          const type =
            confirmPasswordInput.getAttribute("type") === "password"
              ? "text"
              : "password";
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

      // Password strength checker
      const passwordStrength = document.getElementById("passwordStrength");
      const strengthBar = document.getElementById("strengthBar");
      const strengthText = document.getElementById("strengthText");

      if (newPasswordInput) {
        newPasswordInput.addEventListener("input", function () {
          const password = this.value;

          if (password.length === 0) {
            passwordStrength.classList.add("hidden");
            return;
          }

          passwordStrength.classList.remove("hidden");

          let strength = 0;
          if (password.length >= 8) strength++;
          if (/[A-Z]/.test(password)) strength++;
          if (/[0-9]/.test(password)) strength++;
          if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;

          const percentage = (strength / 4) * 100;
          strengthBar.style.width = percentage + "%";

          if (strength <= 1) {
            strengthBar.className = "h-2 rounded-full transition-all duration-300 bg-red-500";
            strengthText.textContent = "Weak";
            strengthText.className = "text-xs font-medium text-red-500";
          } else if (strength === 2) {
            strengthBar.className = "h-2 rounded-full transition-all duration-300 bg-yellow-500";
            strengthText.textContent = "Fair";
            strengthText.className = "text-xs font-medium text-yellow-500";
          } else if (strength === 3) {
            strengthBar.className = "h-2 rounded-full transition-all duration-300 bg-blue-500";
            strengthText.textContent = "Good";
            strengthText.className = "text-xs font-medium text-blue-500";
          } else {
            strengthBar.className = "h-2 rounded-full transition-all duration-300 bg-green-500";
            strengthText.textContent = "Strong";
            strengthText.className = "text-xs font-medium text-green-500";
          }
        });
      }

      // Password match checker
      const passwordMatch = document.getElementById("passwordMatch");
      const matchText = document.getElementById("matchText");

      if (confirmPasswordInput && newPasswordInput) {
        confirmPasswordInput.addEventListener("input", function () {
          const newPassword = newPasswordInput.value;
          const confirmPass = this.value;

          if (confirmPass.length === 0) {
            passwordMatch.classList.add("hidden");
            return;
          }

          passwordMatch.classList.remove("hidden");

          if (newPassword === confirmPass) {
            matchText.textContent = "✓ Passwords match";
            matchText.className = "text-sm font-medium text-green-600";
          } else {
            matchText.textContent = "✗ Passwords do not match";
            matchText.className = "text-sm font-medium text-red-600";
          }
        });
      }

      // Form validation
      const form = document.querySelector("form");

      if (form) {
        form.addEventListener("submit", function (e) {
          const currentPassword = currentPasswordInput ? currentPasswordInput.value : "";
          const newPassword = newPasswordInput.value;
          const confirmPassword = confirmPasswordInput.value;

          // Check password strength
          const hasMinLength = newPassword.length >= 8;
          const hasUppercase = /[A-Z]/.test(newPassword);
          const hasNumber = /[0-9]/.test(newPassword);
          const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(newPassword);

          if (
            !hasMinLength ||
            !hasUppercase ||
            !hasNumber ||
            !hasSpecial
          ) {
            e.preventDefault();
            alert(
              "Password must be at least 8 characters and include an uppercase letter, a number, and a special character."
            );
            return;
          }

          // Check passwords match
          if (newPassword !== confirmPassword) {
            e.preventDefault();
            alert("New passwords do not match. Please try again.");
            return;
          }

          // Check new password is different from current
          if (currentPasswordInput && currentPassword === newPassword) {
            e.preventDefault();
            alert("New password must be different from your current password.");
            return;
          }
        });
      }
    </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
