<?php
require_once dirname(__DIR__) . '/includes/config.php';
require_once INCLUDES_PATH . '/functions.php';

// Initialize session if not already done
if (session_status() === PHP_SESSION_NONE) {
    initSession();
}
$flashMessage = getFlash();
$authUser = currentUser();
?>
<!doctype html>
<html lang="en-GB">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Beep Beep Driving School'; ?></title>
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

      <?php if (isset($customStyles)): ?><?php echo $customStyles; ?><?php endif; ?>
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
          <?php if (isLoggedIn()): ?>
            <li>
              <a
                href="dashboard.php"
                class="text-white text-xl font-medium hover:text-brand transition-colors"
                >Dashboard</a
              >
            </li>
            <li>
              <a
                href="/auth/logout.php"
                class="text-white text-xl font-medium hover:text-red-400 transition-colors"
                >Logout</a
              >
            </li>
          <?php else: ?>
            <li>
              <a
                href="login.php"
                class="px-8 py-3 bg-white text-brand font-semibold rounded-lg hover:bg-gray-100 transition-all"
                >Login</a
              >
            </li>
          <?php endif; ?>
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
              class="font-medium <?php echo ($currentPage == 'home') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-600 hover:text-brand transition-colors'; ?>"
              >Home</a
            >
          </li>
          <li>
            <a
              href="about.php"
              class="font-medium <?php echo ($currentPage == 'about') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-600 hover:text-brand transition-colors'; ?>"
              >About Us</a
            >
          </li>
          <li>
            <a
              href="lessons.php"
              class="font-medium <?php echo ($currentPage == 'lessons') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-600 hover:text-brand transition-colors'; ?>"
              >Courses</a
            >
          </li>
          <li>
            <a
              href="contact.php"
              class="font-medium <?php echo ($currentPage == 'contact') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-600 hover:text-brand transition-colors'; ?>"
              >Contact Us</a
            >
          </li>
        </ul>
        <div class="hidden lg:flex items-center gap-3">
          <?php if (isLoggedIn()): ?>
            <!-- User Avatar with Dropdown -->
            <div class="relative" id="userMenu">
              <button 
                id="userMenuButton"
                class="flex items-center gap-2 px-3 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition-all cursor-pointer"
                onclick="document.getElementById('userDropdown').classList.toggle('hidden')"
              >
                <div class="w-8 h-8 bg-brand rounded-full flex items-center justify-center">
                  <span class="text-white text-sm font-semibold">
                    <?php echo strtoupper(substr(currentUser()['first_name'], 0, 1) . substr(currentUser()['last_name'], 0, 1)); ?>
                  </span>
                </div>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              
              <!-- Dropdown Menu -->
              <div 
                id="userDropdown" 
                class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50"
              >
                <!-- User Info -->
                <div class="px-4 py-3 border-b border-gray-100">
                  <p class="text-sm font-semibold text-gray-800">
                    <?php echo e(currentUser()['first_name'] . ' ' . currentUser()['last_name']); ?>
                  </p>
                  <p class="text-xs text-gray-500 mt-1">
                    <?php echo e(currentUser()['email']); ?>
                  </p>
                </div>
                
                <!-- Menu Links -->
                <a
                  href="dashboard.php"
                  class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors"
                >
                  <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                  Dashboard
                </a>
                
                <!-- Divider -->
                <div class="border-t border-gray-100 my-2"></div>
                
                <!-- Logout -->
                <a
                  href="/auth/logout.php"
                  class="flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                  </svg>
                  Logout
                </a>
              </div>
            </div>
          <?php else: ?>
            <a
              href="login.php"
              class="px-5 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-all"
            >
              Login
            </a>
            <a
            href="book-now.php"
            class="px-6 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:-translate-y-0.5 hover:shadow-lg"
          >
            Book Now
          </a>
          <?php endif; ?>
        </div>
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

    <!-- Close dropdown when clicking outside -->
    <script>
      document.addEventListener('click', function(event) {
        const userMenu = document.getElementById('userMenu');
        const userDropdown = document.getElementById('userDropdown');
        if (userMenu && userDropdown) {
          if (!userMenu.contains(event.target)) {
            userDropdown.classList.add('hidden');
          }
        }
      });
    </script>

    <?php if ($flashMessage): ?>
      <div class="container mx-auto px-4 mt-4">
        <div class="px-4 py-3 rounded-lg <?php echo $flashMessage['type'] === 'success' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200'; ?>">
          <?php echo e($flashMessage['message']); ?>
        </div>
      </div>
    <?php endif; ?>
