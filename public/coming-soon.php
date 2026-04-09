<?php
$pageTitle = 'Page Coming Soon | Beep Beep Driving School - Learn to Drive with Confidence';
$currentPage = 'coming-soon';
include dirname(__DIR__) . '/includes/header.php';
?>

    <!-- Main Content -->
    <main class="min-h-screen flex items-center justify-center pt-20">
      <div class="container mx-auto px-4 text-center py-20">
        <div class="max-w-2xl mx-auto">
          <!-- Icon -->
          <div
            class="w-24 h-24 mx-auto mb-8 bg-primary/10 rounded-full flex items-center justify-center"
          >
            <svg
              class="w-12 h-12 text-primary"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
              ></path>
            </svg>
          </div>

          <!-- Heading -->
          <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
            Page Coming Soon
          </h1>

          <!-- Description -->
          <p class="text-xl text-gray-600 mb-8 leading-relaxed">
            We're currently working on this page. It will be available soon with
            great content about our driving school services.
          </p>

          <!-- Features List -->
          <div class="bg-white rounded-xl shadow-md p-8 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
              What You'll Find Here
            </h2>
            <ul class="text-left space-y-3">
              <li class="flex items-start gap-3">
                <svg
                  class="w-6 h-6 text-green-500 mt-0.5 flex-shrink-0"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  ></path>
                </svg>
                <span class="text-gray-700"
                  >Detailed information about our services</span
                >
              </li>
              <li class="flex items-start gap-3">
                <svg
                  class="w-6 h-6 text-green-500 mt-0.5 flex-shrink-0"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  ></path>
                </svg>
                <span class="text-gray-700">Pricing and package options</span>
              </li>
              <li class="flex items-start gap-3">
                <svg
                  class="w-6 h-6 text-green-500 mt-0.5 flex-shrink-0"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  ></path>
                </svg>
                <span class="text-gray-700">Easy online booking system</span>
              </li>
              <li class="flex items-start gap-3">
                <svg
                  class="w-6 h-6 text-green-500 mt-0.5 flex-shrink-0"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  ></path>
                </svg>
                <span class="text-gray-700">Contact form and FAQ section</span>
              </li>
            </ul>
          </div>

          <!-- CTA Buttons -->
          <div class="flex flex-wrap gap-4 justify-center">
            <a
              href="index.php"
              class="px-8 py-4 bg-primary text-white font-medium rounded-md hover:bg-primary-dark transition-all shadow-md hover:-translate-y-0.5"
            >
              Explore Our Services
            </a>
            <a
              href="tel:01234567890"
              class="px-8 py-4 bg-secondary text-black font-medium rounded-md hover:bg-secondary-dark transition-all shadow-md hover:-translate-y-0.5"
            >
              📞 Call Us Now
            </a>
          </div>

          <!-- Contact Info -->
          <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-600 mb-4">Need immediate assistance?</p>
            <div class="flex flex-wrap gap-6 justify-center text-gray-700">
              <a
                href="tel:01234567890"
                class="hover:text-primary transition-colors"
              >
                📞 01234 567 890
              </a>
              <a
                href="mailto:info@beepbeepdriving.co.uk"
                class="hover:text-primary transition-colors"
              >
                ✉️ info@beepbeepdriving.co.uk
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>