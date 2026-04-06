<!doctype html>
<html lang="en-GB">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us | Beep Beep Driving School - Get in Touch</title>
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
              class="font-medium text-gray-600 hover:text-brand transition-colors"
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
              class="font-medium text-brand border-b-2 border-brand pb-1"
              >Contact Us</a
            >
          </li>
        </ul>
        <a
          href="book-now.php"
          class="hidden lg:inline-block px-6 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:-translate-y-0.5 hover:shadow-lg"
          >Book Now</a
        >
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

    <main>
      <!-- Page Hero Section -->
      <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
          <img
            src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=1600&q=80"
            alt="Contact Us"
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
              Get In Touch
            </p>
            <h1
              class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
            >
              Contact Our<br /><span class="text-brand">Friendly Team</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
              Have questions? We're here to help! Reach out to us and we'll
              respond as soon as possible.
            </p>
          </div>
        </div>
      </section>

      <!-- Contact Form & Info -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <!-- Contact Information -->
            <div class="lg:col-span-1 space-y-6">
              <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-6">
                  Contact Information
                </h3>
                <div class="space-y-4">
                  <div class="flex items-start gap-4">
                    <div
                      class="w-10 h-10 bg-brand/10 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                      <svg
                        class="w-5 h-5 text-brand"
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
                    </div>
                    <div>
                      <h4 class="font-semibold text-gray-800 text-sm">
                        Our Location
                      </h4>
                      <p class="text-gray-600 text-sm mt-1">
                        123 High Street, Manchester, M1 1AA
                      </p>
                    </div>
                  </div>
                  <div class="flex items-start gap-4">
                    <div
                      class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                      <svg
                        class="w-5 h-5 text-blue-600"
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
                    </div>
                    <div>
                      <h4 class="font-semibold text-gray-800 text-sm">
                        Phone Number
                      </h4>
                      <p class="text-gray-600 text-sm mt-1">01234 567 890</p>
                    </div>
                  </div>
                  <div class="flex items-start gap-4">
                    <div
                      class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                      <svg
                        class="w-5 h-5 text-green-600"
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
                    </div>
                    <div>
                      <h4 class="font-semibold text-gray-800 text-sm">
                        Email Address
                      </h4>
                      <p class="text-gray-600 text-sm mt-1">
                        info@beepbeepdriving.co.uk
                      </p>
                    </div>
                  </div>
                  <div class="flex items-start gap-4">
                    <div
                      class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0"
                    >
                      <svg
                        class="w-5 h-5 text-purple-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <div>
                      <h4 class="font-semibold text-gray-800 text-sm">
                        Opening Hours
                      </h4>
                      <p class="text-gray-600 text-sm mt-1">
                        Mon-Sat: 8am-8pm<br />Sun: 10am-4pm
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Social Media -->
              <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Follow Us</h3>
                <p class="text-gray-600 text-sm mb-4">
                  Stay connected on social media for updates and driving tips.
                </p>
                <div class="flex gap-3">
                  <a
                    href="#"
                    class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors"
                  >
                    <svg
                      class="w-5 h-5"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                      />
                    </svg>
                  </a>
                  <a
                    href="#"
                    class="w-10 h-10 bg-sky-500 text-white rounded-lg flex items-center justify-center hover:bg-sky-600 transition-colors"
                  >
                    <svg
                      class="w-5 h-5"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                      />
                    </svg>
                  </a>
                  <a
                    href="#"
                    class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 text-white rounded-lg flex items-center justify-center hover:from-purple-600 hover:to-pink-600 transition-colors"
                  >
                    <svg
                      class="w-5 h-5"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                    >
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                      <path
                        d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"
                      />
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                    </svg>
                  </a>
                  <a
                    href="#"
                    class="w-10 h-10 bg-red-600 text-white rounded-lg flex items-center justify-center hover:bg-red-700 transition-colors"
                  >
                    <svg
                      class="w-5 h-5"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"
                      />
                      <polygon
                        points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"
                        fill="#fff"
                      />
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
              <div class="bg-white p-8 rounded-2xl shadow-md">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                  Send Us a Message
                </h3>
                <p class="text-gray-600 text-sm mb-6">
                  Fill out the form below and we'll get back to you within 24
                  hours.
                </p>

                <form action="#" method="POST" class="space-y-6">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                      <label
                        for="firstName"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >First Name *</label
                      >
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
                      <label
                        for="lastName"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Last Name *</label
                      >
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

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                        for="phone"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Phone Number *</label
                      >
                      <input
                        type="tel"
                        id="phone"
                        name="phone"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        placeholder="07123 456789"
                      />
                    </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                      <label
                        for="service"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Service Interested In *</label
                      >
                      <select
                        id="service"
                        name="service"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      >
                        <option value="">Select a service</option>
                        <option value="beginner">
                          Beginner Driving Lessons
                        </option>
                        <option value="refresher">Refresher Course</option>
                        <option value="test-prep">Test Preparation</option>
                        <option value="intensive">Intensive Course</option>
                        <option value="manual">Manual Driving</option>
                        <option value="automatic">Automatic Driving</option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                    <div>
                      <label
                        for="instructor"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Preferred Instructor</label
                      >
                      <select
                        id="instructor"
                        name="instructor"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      >
                        <option value="">No preference</option>
                        <option value="max">
                          Max Abacus (Senior Instructor)
                        </option>
                        <option value="jenifer">
                          Jenifer Lopez (Lead Instructor)
                        </option>
                        <option value="henry">Henry Jassy (Instructor)</option>
                      </select>
                    </div>
                  </div>

                  <div>
                    <label
                      for="message"
                      class="block text-sm font-medium text-gray-700 mb-2"
                      >Message *</label
                    >
                    <textarea
                      id="message"
                      name="message"
                      rows="5"
                      required
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all resize-none"
                      placeholder="Tell us about your driving goals, availability, or any questions you have..."
                    ></textarea>
                  </div>

                  <div class="flex items-start gap-3">
                    <input
                      type="checkbox"
                      id="consent"
                      name="consent"
                      required
                      class="mt-1 w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand"
                    />
                    <label for="consent" class="text-sm text-gray-600">
                      I agree to the
                      <a href="privacy.php" class="text-brand hover:underline"
                        >Privacy Policy</a
                      >
                      and consent to having this website store my submitted
                      information so they can respond to my inquiry. *
                    </label>
                  </div>

                  <div class="flex gap-4">
                    <button
                      type="submit"
                      class="flex-1 px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
                    >
                      Send Message
                    </button>
                    <button
                      type="reset"
                      class="px-8 py-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-all"
                    >
                      Clear Form
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Map Section -->
      <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Our Location
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Find Us Here</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
              Visit our office in Manchester city centre. Free parking available
              for students.
            </p>
          </div>
          <div class="rounded-2xl overflow-hidden shadow-xl h-96 bg-gray-200">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.5!2d-2.24!3d53.48!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTPCsDI4JzQ4LjAiTiAywrAxNCcyNC4wIlc!5e0!3m2!1sen!2suk!4v1234567890"
              width="100%"
              height="100%"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              class="w-full h-full"
            >
            </iframe>
          </div>
        </div>
      </section>

      <!-- FAQ Section -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              FAQ
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              Frequently Asked Questions
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
              Quick answers to common questions about our driving school.
            </p>
          </div>

          <div class="max-w-4xl mx-auto space-y-4">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
              <details class="group">
                <summary
                  class="flex justify-between items-center cursor-pointer p-6"
                >
                  <h3 class="font-semibold text-gray-800">
                    How do I book my first lesson?
                  </h3>
                  <svg
                    class="w-5 h-5 text-brand transform group-open:rotate-180 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </summary>
                <div class="px-6 pb-6 text-gray-600 text-sm leading-relaxed">
                  You can book your first lesson by calling us at 01234 567 890,
                  emailing info@beepbeepdriving.co.uk, or using the contact form
                  on this page. We'll match you with an instructor based on your
                  location and availability.
                </div>
              </details>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
              <details class="group">
                <summary
                  class="flex justify-between items-center cursor-pointer p-6"
                >
                  <h3 class="font-semibold text-gray-800">
                    What should I bring to my first lesson?
                  </h3>
                  <svg
                    class="w-5 h-5 text-brand transform group-open:rotate-180 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </summary>
                <div class="px-6 pb-6 text-gray-600 text-sm leading-relaxed">
                  Bring your provisional driving license (both the photocard and
                  paper counterpart if applicable), comfortable shoes for
                  driving, and glasses/contact lenses if you need them for
                  vision correction.
                </div>
              </details>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
              <details class="group">
                <summary
                  class="flex justify-between items-center cursor-pointer p-6"
                >
                  <h3 class="font-semibold text-gray-800">
                    Can I choose my own instructor?
                  </h3>
                  <svg
                    class="w-5 h-5 text-brand transform group-open:rotate-180 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </summary>
                <div class="px-6 pb-6 text-gray-600 text-sm leading-relaxed">
                  Yes! You can request a specific instructor when booking. All
                  our instructors are DVSA-approved and highly rated. If you're
                  not sure who to choose, we'll recommend the best match based
                  on your learning style and schedule.
                </div>
              </details>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
              <details class="group">
                <summary
                  class="flex justify-between items-center cursor-pointer p-6"
                >
                  <h3 class="font-semibold text-gray-800">
                    What's your cancellation policy?
                  </h3>
                  <svg
                    class="w-5 h-5 text-brand transform group-open:rotate-180 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </summary>
                <div class="px-6 pb-6 text-gray-600 text-sm leading-relaxed">
                  We require at least 48 hours notice for cancellations or
                  rescheduling. Cancellations with less than 48 hours notice may
                  be charged at 50% of the lesson cost. Emergency cancellations
                  due to illness with a doctor's note are exempt.
                </div>
              </details>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden">
              <details class="group">
                <summary
                  class="flex justify-between items-center cursor-pointer p-6"
                >
                  <h3 class="font-semibold text-gray-800">
                    Do you offer intensive courses?
                  </h3>
                  <svg
                    class="w-5 h-5 text-brand transform group-open:rotate-180 transition-transform"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </summary>
                <div class="px-6 pb-6 text-gray-600 text-sm leading-relaxed">
                  Yes! We offer 1-week and 2-week intensive courses that include
                  30-40 hours of driving plus your test. These are perfect if
                  you need to pass quickly. Contact us for current availability
                  and pricing.
                </div>
              </details>
            </div>
          </div>

          <div class="text-center mt-12">
            <p class="text-gray-600 mb-4">Have more questions?</p>
            <a
              href="tel:01234567890"
              class="inline-flex items-center gap-2 text-brand font-semibold hover:underline"
            >
              <svg
                class="w-5 h-5"
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
              Call us at 01234 567 890
            </a>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="bg-dark py-16">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="flex items-center gap-6">
              <img
                src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=200&q=80"
                alt="Instructor"
                class="w-24 h-24 rounded-full object-cover border-4 border-brand hidden md:block"
              />
              <div>
                <p
                  class="text-brand font-semibold text-sm uppercase tracking-widest mb-2"
                >
                  Ready to Start?
                </p>
                <h2 class="text-3xl font-bold text-white">
                  Book Your First Lesson Today<br />Let's Get Driving!
                </h2>
              </div>
            </div>
            <div class="flex flex-wrap gap-4 lg:justify-end">
              <a
                href="book-now.php"
                class="px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-xl"
              >
                Book Now
              </a>
              <a
                href="tel:01234567890"
                class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-gray-900 transition-all"
              >
                Call Us Now
              </a>
            </div>
          </div>
        </div>
      </section>
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
                  href="lessons.php#intensive"
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

    <script>
      // Mobile menu toggle
      const menuToggle = document.getElementById("menuToggle");
      const mobileMenu = document.getElementById("mobileMenu");
      const closeMenu = document.getElementById("closeMenu");

      if (menuToggle && mobileMenu && closeMenu) {
        menuToggle.addEventListener("click", () => {
          mobileMenu.classList.remove("hidden");
          document.body.style.overflow = "hidden";
        });

        closeMenu.addEventListener("click", () => {
          mobileMenu.classList.add("hidden");
          document.body.style.overflow = "";
        });

        // Close menu when clicking on a link
        const menuLinks = mobileMenu.querySelectorAll("a");
        menuLinks.forEach((link) => {
          link.addEventListener("click", () => {
            mobileMenu.classList.add("hidden");
            document.body.style.overflow = "";
          });
        });
      }
    </script>
  </body>
</html>
