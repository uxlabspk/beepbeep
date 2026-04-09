<?php
$pageTitle = 'Forgot Password | Beep Beep Driving School - Reset Your Password';
$currentPage = 'forgot-password';
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
            src="https://images.unsplash.com/photo-1502877338535-766e1452684a?w=1600&q=80"
            alt="Forgot Password"
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
              Reset Password
            </p>
            <h1
              class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
            >
              Forgot Your<br /><span class="text-brand">Password?</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
              No worries! Enter your email and we'll send you instructions to reset your password.
            </p>
          </div>
        </div>
      </section>

      <!-- Forgot Password Form Section -->
      <section class="py-20 bg-gray-50 auth-section">
        <div class="container mx-auto px-4">
          <div class="max-w-md mx-auto">
            <div class="bg-white p-8 rounded-2xl shadow-md">
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
                  Reset Your Password
                </h3>
                <p class="text-gray-600 text-sm">
                  Enter the email address associated with your account and we'll send you a link to reset your password.
                </p>
              </div>

              <form action="#" method="POST" class="space-y-6">
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

                <button
                  type="submit"
                  class="w-full px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                >
                  Send Reset Link
                </button>
              </form>

              <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                  Remember your password?
                  <a
                    href="login.php"
                    class="text-brand hover:text-brand-dark transition-colors font-medium"
                  >
                    Back to Login
                  </a>
                </p>
              </div>

              <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
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
                    <p class="font-medium mb-1">Didn't receive the email?</p>
                    <p class="text-blue-600">
                      Check your spam folder or
                      <a href="#" class="text-brand hover:underline">contact support</a>
                      if you still need help.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
