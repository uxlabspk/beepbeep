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
$hideHeaderFooter = true;
include __DIR__ . '/includes/header.php';
?>

    <main>
      <section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-gray-50 to-white py-10 sm:py-14">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,107,0,0.14),_transparent_42%),radial-gradient(circle_at_bottom_left,_rgba(26,26,46,0.05),_transparent_46%)]"></div>

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

                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-brand">Password Update</p>
                <h1 class="mb-4 text-4xl font-bold leading-tight">Protect your account</h1>
                <p class="text-base leading-relaxed text-gray-600">
                  Keep your profile secure with a strong password. We recommend changing it regularly and avoiding reused credentials.
                </p>
              </div>

              <div class="space-y-3 text-sm text-gray-600">
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Strong password guidance included</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Real-time strength and match checks</p>
                <p class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-brand"></span>Secure token support for reset links</p>
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
                  <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-green-600">Updated</p>
                  <h2 class="mb-3 text-3xl font-bold text-gray-900">Password changed successfully</h2>
                  <p class="mb-6 text-sm leading-relaxed text-gray-600">
                    Your password has been updated. Use your new password the next time you sign in.
                  </p>
                  <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    <a href="login.php" class="rounded-xl bg-brand px-8 py-4 font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl">Sign In Now</a>
                    <a href="dashboard.php" class="rounded-xl bg-gray-200 px-8 py-4 font-semibold text-gray-700 transition-all hover:bg-gray-300">Back to Dashboard</a>
                  </div>
                </div>

              <?php else: ?>
                <div class="mb-6 text-center sm:text-left">
                  <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-brand/10 sm:mx-0">
                    <svg class="h-8 w-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                  </div>
                  <p class="mb-2 text-xs font-semibold uppercase tracking-[0.22em] text-brand">Security Settings</p>
                  <h2 class="mb-2 text-3xl font-bold text-gray-900">Update password</h2>
                  <p class="text-sm leading-relaxed text-gray-600">
                    <?php echo $isResetFlow ? 'Set a strong new password for your account.' : 'Enter your current password and choose a new one.'; ?>
                  </p>
                </div>

                <div class="mb-6 rounded-xl border border-blue-200 bg-blue-50 p-4">
                  <div class="flex items-start gap-3">
                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="text-sm text-blue-800">
                      <p class="mb-1 font-medium">Password requirements</p>
                      <ul class="space-y-1 text-blue-700">
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

                  <?php if (!$isResetFlow): ?>
                    <div>
                      <label for="currentPassword" class="mb-2 block text-sm font-semibold text-gray-700">Current Password</label>
                      <div class="relative">
                        <input
                          type="password"
                          id="currentPassword"
                          name="currentPassword"
                          required
                          class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-12 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                          placeholder="Enter your current password"
                        />
                        <button
                          type="button"
                          id="toggleCurrentPassword"
                          class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 transition-colors hover:text-brand"
                          aria-label="Toggle current password visibility"
                        >
                          <svg id="eyeIconCurrent" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  <?php endif; ?>

                  <div>
                    <label for="newPassword" class="mb-2 block text-sm font-semibold text-gray-700">New Password</label>
                    <div class="relative">
                      <input
                        type="password"
                        id="newPassword"
                        name="newPassword"
                        required
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-12 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                        placeholder="Enter new password"
                      />
                      <button
                        type="button"
                        id="toggleNewPassword"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 transition-colors hover:text-brand"
                        aria-label="Toggle new password visibility"
                      >
                        <svg id="eyeIconNew" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                    </div>

                    <div id="passwordStrength" class="mt-2 hidden">
                      <div class="mb-1 flex items-center gap-2">
                        <div class="h-2 flex-1 rounded-full bg-gray-200">
                          <div id="strengthBar" class="h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                        </div>
                        <span id="strengthText" class="text-xs font-medium text-gray-600"></span>
                      </div>
                    </div>
                  </div>

                  <div>
                    <label for="confirmPassword" class="mb-2 block text-sm font-semibold text-gray-700">Confirm New Password</label>
                    <div class="relative">
                      <input
                        type="password"
                        id="confirmPassword"
                        name="confirmPassword"
                        required
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 pr-12 text-base text-gray-800 shadow-sm transition-all placeholder:text-gray-400 focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/25"
                        placeholder="Confirm new password"
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

                    <div id="passwordMatch" class="mt-2 hidden">
                      <p id="matchText" class="text-sm font-medium"></p>
                    </div>
                  </div>

                  <div class="flex flex-col gap-4 pt-2 sm:flex-row">
                    <button
                      type="submit"
                      class="flex-1 rounded-xl bg-brand px-8 py-4 font-semibold text-white transition-all hover:-translate-y-0.5 hover:bg-brand-dark hover:shadow-xl"
                    >
                      Update Password
                    </button>
                    <a
                      href="<?php echo $isResetFlow ? 'login.php' : 'dashboard.php'; ?>"
                      class="flex-1 rounded-xl bg-gray-200 px-8 py-4 text-center font-semibold text-gray-700 transition-all hover:bg-gray-300"
                    >
                      Cancel
                    </a>
                  </div>
                </form>

                <div class="mt-6 text-center">
                  <p class="text-sm text-gray-600">
                    Forgot your password?
                    <a href="forgot-password.php" class="font-medium text-brand transition-colors hover:text-brand-dark">Reset it here</a>
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
