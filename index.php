<!doctype html>
<html lang="en-GB">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beep Beep Driving School | Professional Driving Lessons UK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: { primary: ["Poppins", "sans-serif"] },
            colors: {
              brand: "#FF6B00",
              "brand-dark": "#E05A00",
              dark: "#1A1A2E",
              "dark-card": "#16213E",
            },
          },
        },
      };
    </script>
    <style>
      /* Fix for mobile responsiveness */
      html,
      body {
        overflow-x: hidden;
        width: 100%;
        max-width: 100vw;
      }

      * {
        box-sizing: border-box;
      }

      img {
        max-width: 100%;
        height: auto;
      }

      .container {
        margin-left: auto;
        margin-right: auto;
      }

      /* Hide scrollbar for courses section */
      .scrollbar-hide {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
      }

      .scrollbar-hide::-webkit-scrollbar {
        display: none; /* Chrome, Safari and Opera */
      }
    </style>
  </head>

  <body class="font-primary text-gray-800 antialiased overflow-x-hidden">
    <!-- Mobile Menu Overlay -->
    <div id="mobileMenu" class="fixed inset-0 bg-dark/95 z-40 hidden">
      <div class="container mx-auto px-4 py-6">
        <div class="flex justify-end mb-8">
          <button id="closeMenu" class="text-white hover:text-brand">
            <svg
              class="w-8 h-8"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
        <ul class="flex flex-col gap-6 items-center">
          <li>
            <a
              href="index.php"
              class="text-white text-xl font-medium hover:text-brand transition-colors"
              >Home</a
            >
          </li>
          <li>
            <a
              href="about.php"
              class="text-white text-xl font-medium hover:text-brand transition-colors"
              >About Us</a
            >
          </li>
          <li>
            <a
              href="lessons.php"
              class="text-white text-xl font-medium hover:text-brand transition-colors"
              >Courses</a
            >
          </li>
          <li>
            <a
              href="contact.php"
              class="text-white text-xl font-medium hover:text-brand transition-colors"
              >Contact Us</a
            >
          </li>
          <li>
            <a
              href="book-now.php"
              class="px-8 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all"
              >Book Now</a
            >
          </li>
        </ul>
      </div>
    </div>

    <!-- Top Bar -->
    <div class="bg-gray-900 text-gray-300 text-xs py-2 hidden lg:block">
      <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex gap-6">
          <span class="flex items-center gap-1">
            <svg
              class="w-3 h-3 text-brand"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
              />
            </svg>
            info@beepbeepdriving.co.uk
          </span>
          <span class="flex items-center gap-1">
            <svg
              class="w-3 h-3 text-brand"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
              />
            </svg>
            01234 567 890
          </span>
          <span class="flex items-center gap-1">
            <svg
              class="w-3 h-3 text-brand"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
              />
            </svg>
            123 High Street, Manchester
          </span>
        </div>
        <div class="flex gap-3">
          <a href="#" class="hover:text-brand transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
              />
            </svg>
          </a>
          <a href="#" class="hover:text-brand transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
              />
            </svg>
          </a>
          <a href="#" class="hover:text-brand transition-colors">
            <svg
              class="w-4 h-4"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
      <nav
        class="container mx-auto px-4 py-4 flex justify-between items-center"
      >
        <a
          href="index.php"
          class="flex items-center gap-2 text-2xl font-bold text-dark"
        >
          <div
            class="w-10 h-10 bg-brand rounded-lg flex items-center justify-center"
          >
            <svg
              class="w-6 h-6 text-white"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M13 10V3L4 14h7v7l9-11h-7z"
              />
            </svg>
          </div>
          <span>Beep<span class="text-brand">Beep</span></span>
        </a>
        <ul class="hidden lg:flex gap-8 items-center">
          <li>
            <a
              href="index.php"
              class="font-medium text-brand border-b-2 border-brand pb-1"
              >Home</a
            >
          </li>
          <li>
            <a
              href="about.php"
              class="font-medium text-gray-600 hover:text-brand transition-colors"
              >About Us</a
            >
          </li>
          <li>
            <a
              href="lessons.php"
              class="font-medium text-gray-600 hover:text-brand transition-colors"
              >Courses</a
            >
          </li>
          <li>
            <a
              href="contact.php"
              class="font-medium text-gray-600 hover:text-brand transition-colors"
              >Contact Us</a
            >
          </li>
        </ul>
        <a
          href="book-now.php"
          class="hidden lg:inline-block px-6 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:-translate-y-0.5 hover:shadow-lg"
        >
          Book Now
        </a>
        <button
          id="menuToggle"
          class="lg:hidden text-gray-700 focus:outline-none"
        >
          <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
          </svg>
        </button>
      </nav>
    </header>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
      <div class="container mx-auto px-4">
        <div
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12"
        >
          <div>
            <a
              href="index.php"
              class="flex items-center gap-2 text-2xl font-bold mb-4"
            >
              <div
                class="w-10 h-10 bg-brand rounded-lg flex items-center justify-center"
              >
                <svg
                  class="w-6 h-6 text-white"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z"
                  />
                </svg>
              </div>
              <span>Beep<span class="text-brand">Beep</span></span>
            </a>
            <p class="text-gray-400 text-sm leading-relaxed mb-5">
              Professional driving lessons in the UK with DVSA-approved
              instructors. Your safety and success are our priority.
            </p>
            <div class="flex gap-3">
              <a
                href="#"
                class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-brand transition-colors"
              >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                  />
                </svg>
              </a>
              <a
                href="#"
                class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-brand transition-colors"
              >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                  />
                </svg>
              </a>
              <a
                href="#"
                class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-brand transition-colors"
              >
                <svg
                  class="w-4 h-4"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                >
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                </svg>
              </a>
            </div>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-5">Our Courses</h4>
            <ul class="space-y-3 text-gray-400 text-sm">
              <li>
                <a
                  href="lessons.php#beginners"
                  class="hover:text-brand transition-colors"
                  >Beginner Lessons</a
                >
              </li>
              <li>
                <a
                  href="lessons.php#refresher"
                  class="hover:text-brand transition-colors"
                  >Refresher Courses</a
                >
              </li>
              <li>
                <a
                  href="lessons.php#test-prep"
                  class="hover:text-brand transition-colors"
                  >Test Preparation</a
                >
              </li>
              <li>
                <a
                  href="lessons.php#manual"
                  class="hover:text-brand transition-colors"
                  >Manual Driving</a
                >
              </li>
              <li>
                <a
                  href="lessons.php#automatic"
                  class="hover:text-brand transition-colors"
                  >Automatic Driving</a
                >
              </li>
              <li>
                <a
                  href="lessons.php"
                  class="hover:text-brand transition-colors"
                  >Intensive Courses</a
                >
              </li>
            </ul>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-5">Contact Us</h4>
            <ul class="space-y-4 text-gray-400 text-sm">
              <li class="flex items-start gap-3">
                <svg
                  class="w-5 h-5 text-brand flex-shrink-0 mt-0.5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                  />
                </svg>
                123 High Street, Manchester, M1 1AA
              </li>
              <li class="flex items-center gap-3">
                <svg
                  class="w-5 h-5 text-brand flex-shrink-0"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                  />
                </svg>
                <a
                  href="tel:01234567890"
                  class="hover:text-brand transition-colors"
                  >01234 567 890</a
                >
              </li>
              <li class="flex items-center gap-3">
                <svg
                  class="w-5 h-5 text-brand flex-shrink-0"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
                <a
                  href="mailto:info@beepbeepdriving.co.uk"
                  class="hover:text-brand transition-colors"
                  >info@beepbeepdriving.co.uk</a
                >
              </li>
            </ul>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-5">Our Gallery</h4>
            <div class="grid grid-cols-3 gap-2">
              <img
                src="https://images.unsplash.com/photo-1489824904134-891ab64532f1?w=150&q=80"
                alt="Gallery"
                class="w-full h-16 object-cover rounded-lg hover:opacity-80 transition-opacity cursor-pointer"
              />
              <img
                src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=150&q=80"
                alt="Gallery"
                class="w-full h-16 object-cover rounded-lg hover:opacity-80 transition-opacity cursor-pointer"
              />
              <img
                src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=150&q=80"
                alt="Gallery"
                class="w-full h-16 object-cover rounded-lg hover:opacity-80 transition-opacity cursor-pointer"
              />
              <img
                src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=150&q=80"
                alt="Gallery"
                class="w-full h-16 object-cover rounded-lg hover:opacity-80 transition-opacity cursor-pointer"
              />
              <img
                src="https://images.unsplash.com/photo-1502877338535-766e1452684a?w=150&q=80"
                alt="Gallery"
                class="w-full h-16 object-cover rounded-lg hover:opacity-80 transition-opacity cursor-pointer"
              />
              <img
                src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=150&q=80"
                alt="Gallery"
                class="w-full h-16 object-cover rounded-lg hover:opacity-80 transition-opacity cursor-pointer"
              />
            </div>
          </div>
        </div>
        <div
          class="border-t border-white/10 pt-8 flex flex-wrap justify-between items-center gap-4"
        >
          <p class="text-gray-500 text-sm">
            © 2026 Beep Beep Driving School. All rights reserved.
          </p>
          <ul class="flex gap-6 text-gray-500 text-sm">
            <li>
              <a href="privacy.php" class="hover:text-brand transition-colors"
                >Privacy Policy</a
              >
            </li>
            <li>
              <a href="terms.php" class="hover:text-brand transition-colors"
                >Terms & Conditions</a
              >
            </li>
            <li>
              <a href="cookies.php" class="hover:text-brand transition-colors"
                >Cookie Policy</a
              >
            </li>
          </ul>
        </div>
      </div>
    </footer>

    <script src="js/main.js"></script>
  </body>
</html>
