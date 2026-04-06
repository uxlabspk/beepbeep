<?php
$pageTitle = 'Dashboard | Beep Beep Driving School';
$currentPage = 'dashboard';
$customStyles = '
      .dashboard-section {
        min-height: calc(100vh - 200px);
      }
      .sidebar-link.active {
        background-color: rgba(255, 107, 0, 0.1);
        color: #FF6B00;
        border-right: 3px solid #FF6B00;
      }
';
include 'includes/header.php';
?>

    <main>
      <!-- Dashboard Section -->
      <section class="py-12 bg-gray-50 dashboard-section">
        <div class="container mx-auto px-4">
          <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <aside class="lg:w-64 flex-shrink-0">
              <div class="bg-white rounded-2xl shadow-md p-6 lg:sticky lg:top-24">
                <!-- User Profile -->
                <div class="text-center mb-6 pb-6 border-b border-gray-200">
                  <div
                    class="w-20 h-20 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-3"
                  >
                    <span class="text-3xl font-bold text-brand">JD</span>
                  </div>
                  <h3 class="text-lg font-bold text-gray-800">John Doe</h3>
                  <p class="text-gray-500 text-sm">john@example.com</p>
                  <span
                    class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full"
                  >
                    Active Student
                  </span>
                </div>

                <!-- Navigation -->
                <nav class="space-y-1">
                  <a
                    href="#"
                    class="sidebar-link active flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors"
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
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      />
                    </svg>
                    Dashboard
                  </a>
                  <a
                    href="#"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors"
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
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                    My Bookings
                  </a>
                  <a
                    href="#"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors"
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
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                      />
                    </svg>
                    Lessons History
                  </a>
                  <a
                    href="#"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors"
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
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                    My Instructor
                  </a>
                  <a
                    href="#"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors"
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
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                    Test Progress
                  </a>
                  <a
                    href="#"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors"
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
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                      />
                    </svg>
                    Payment History
                  </a>
                  <a
                    href="#"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors"
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
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                    </svg>
                    Settings
                  </a>
                  <a
                    href="index.php"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors"
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
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                      />
                    </svg>
                    Logout
                  </a>
                </nav>
              </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1">
              <!-- Welcome Banner -->
              <div class="bg-gradient-to-r from-brand to-brand-dark rounded-2xl p-8 mb-8 text-white">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                  <div>
                    <h1 class="text-3xl font-bold mb-2">Welcome back, John! 👋</h1>
                    <p class="text-white/90">
                      Ready for your next driving lesson? You're making great progress!
                    </p>
                  </div>
                  <a
                    href="book-now.php"
                    class="px-6 py-3 bg-white text-brand font-semibold rounded-lg hover:bg-gray-100 transition-all hover:shadow-lg whitespace-nowrap"
                  >
                    Book a Lesson
                  </a>
                </div>
              </div>

              <!-- Stats Cards -->
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-md">
                  <div class="flex items-center justify-between mb-4">
                    <div
                      class="w-12 h-12 bg-brand/10 rounded-lg flex items-center justify-center"
                    >
                      <svg
                        class="w-6 h-6 text-brand"
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
                    <span class="text-green-600 text-sm font-medium">+2 this week</span>
                  </div>
                  <h3 class="text-3xl font-bold text-gray-800 mb-1">18</h3>
                  <p class="text-gray-500 text-sm">Lessons Completed</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-md">
                  <div class="flex items-center justify-between mb-4">
                    <div
                      class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center"
                    >
                      <svg
                        class="w-6 h-6 text-blue-600"
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
                    <span class="text-brand text-sm font-medium">75%</span>
                  </div>
                  <h3 class="text-3xl font-bold text-gray-800 mb-1">18h</h3>
                  <p class="text-gray-500 text-sm">Total Hours Driven</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-md">
                  <div class="flex items-center justify-between mb-4">
                    <div
                      class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center"
                    >
                      <svg
                        class="w-6 h-6 text-purple-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                      </svg>
                    </div>
                    <span class="text-green-600 text-sm font-medium">Upcoming</span>
                  </div>
                  <h3 class="text-3xl font-bold text-gray-800 mb-1">3</h3>
                  <p class="text-gray-500 text-sm">Upcoming Lessons</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-md">
                  <div class="flex items-center justify-between mb-4">
                    <div
                      class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center"
                    >
                      <svg
                        class="w-6 h-6 text-green-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                        />
                      </svg>
                    </div>
                    <span class="text-brand text-sm font-medium">On Track</span>
                  </div>
                  <h3 class="text-3xl font-bold text-gray-800 mb-1">65%</h3>
                  <p class="text-gray-500 text-sm">Test Readiness</p>
                </div>
              </div>

              <!-- Upcoming Lessons & Quick Actions -->
              <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <!-- Upcoming Lessons -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-md p-6">
                  <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Upcoming Lessons</h3>
                    <a
                      href="#"
                      class="text-sm text-brand hover:text-brand-dark transition-colors font-medium"
                    >
                      View All
                    </a>
                  </div>

                  <div class="space-y-4">
                    <!-- Lesson 1 -->
                    <div
                      class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors"
                    >
                      <div class="flex items-start gap-4 mb-3 sm:mb-0">
                        <div
                          class="w-12 h-12 bg-brand/10 rounded-lg flex items-center justify-center flex-shrink-0"
                        >
                          <svg
                            class="w-6 h-6 text-brand"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                          </svg>
                        </div>
                        <div>
                          <h4 class="font-semibold text-gray-800">
                            Beginner Driving Lesson
                          </h4>
                          <p class="text-gray-500 text-sm mt-1">
                            with Max Abacus
                          </p>
                          <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                            <span class="flex items-center gap-1">
                              <svg
                                class="w-4 h-4"
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
                              Apr 8, 2026 at 10:00 AM
                            </span>
                            <span class="flex items-center gap-1">
                              <svg
                                class="w-4 h-4"
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
                              2 hours
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="flex gap-2">
                        <button
                          class="px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-all"
                        >
                          Confirm
                        </button>
                        <button
                          class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-all"
                        >
                          Reschedule
                        </button>
                      </div>
                    </div>

                    <!-- Lesson 2 -->
                    <div
                      class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors"
                    >
                      <div class="flex items-start gap-4 mb-3 sm:mb-0">
                        <div
                          class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0"
                        >
                          <svg
                            class="w-6 h-6 text-blue-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                          </svg>
                        </div>
                        <div>
                          <h4 class="font-semibold text-gray-800">
                            Highway Code Practice
                          </h4>
                          <p class="text-gray-500 text-sm mt-1">
                            with Jenifer Lopez
                          </p>
                          <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                            <span class="flex items-center gap-1">
                              <svg
                                class="w-4 h-4"
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
                              Apr 10, 2026 at 2:00 PM
                            </span>
                            <span class="flex items-center gap-1">
                              <svg
                                class="w-4 h-4"
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
                              1.5 hours
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="flex gap-2">
                        <button
                          class="px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-all"
                        >
                          Confirm
                        </button>
                        <button
                          class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-all"
                        >
                          Reschedule
                        </button>
                      </div>
                    </div>

                    <!-- Lesson 3 -->
                    <div
                      class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors"
                    >
                      <div class="flex items-start gap-4 mb-3 sm:mb-0">
                        <div
                          class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0"
                        >
                          <svg
                            class="w-6 h-6 text-purple-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                          </svg>
                        </div>
                        <div>
                          <h4 class="font-semibold text-gray-800">
                            Mock Driving Test
                          </h4>
                          <p class="text-gray-500 text-sm mt-1">
                            with Henry Jassy
                          </p>
                          <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                            <span class="flex items-center gap-1">
                              <svg
                                class="w-4 h-4"
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
                              Apr 12, 2026 at 9:00 AM
                            </span>
                            <span class="flex items-center gap-1">
                              <svg
                                class="w-4 h-4"
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
                              2.5 hours
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="flex gap-2">
                        <button
                          class="px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-all"
                        >
                          Confirm
                        </button>
                        <button
                          class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-all"
                        >
                          Reschedule
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Quick Actions & Instructor -->
                <div class="space-y-6">
                  <!-- Quick Actions -->
                  <div class="bg-white rounded-2xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                      Quick Actions
                    </h3>
                    <div class="space-y-3">
                      <a
                        href="book-now.php"
                        class="flex items-center gap-3 p-3 bg-brand/10 rounded-lg hover:bg-brand/20 transition-colors group"
                      >
                        <div
                          class="w-10 h-10 bg-brand rounded-lg flex items-center justify-center"
                        >
                          <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                            />
                          </svg>
                        </div>
                        <span class="text-gray-800 font-medium text-sm group-hover:text-brand transition-colors">
                          Book New Lesson
                        </span>
                      </a>
                      <a
                        href="#"
                        class="flex items-center gap-3 p-3 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors group"
                      >
                        <div
                          class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center"
                        >
                          <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                            />
                          </svg>
                        </div>
                        <span class="text-gray-800 font-medium text-sm group-hover:text-blue-600 transition-colors">
                          Make Payment
                        </span>
                      </a>
                      <a
                        href="#"
                        class="flex items-center gap-3 p-3 bg-purple-100 rounded-lg hover:bg-purple-200 transition-colors group"
                      >
                        <div
                          class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center"
                        >
                          <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                            />
                          </svg>
                        </div>
                        <span class="text-gray-800 font-medium text-sm group-hover:text-purple-600 transition-colors">
                          Message Instructor
                        </span>
                      </a>
                      <a
                        href="#"
                        class="flex items-center gap-3 p-3 bg-green-100 rounded-lg hover:bg-green-200 transition-colors group"
                      >
                        <div
                          class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center"
                        >
                          <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            />
                          </svg>
                        </div>
                        <span class="text-gray-800 font-medium text-sm group-hover:text-green-600 transition-colors">
                          View Progress Report
                        </span>
                      </a>
                    </div>
                  </div>

                  <!-- My Instructor -->
                  <div class="bg-white rounded-2xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                      My Instructor
                    </h3>
                    <div class="text-center">
                      <div
                        class="w-20 h-20 bg-gray-200 rounded-full mx-auto mb-3 overflow-hidden"
                      >
                        <img
                          src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=80"
                          alt="Instructor Max Abacus"
                          class="w-full h-full object-cover"
                        />
                      </div>
                      <h4 class="font-semibold text-gray-800">Max Abacus</h4>
                      <p class="text-gray-500 text-sm mb-3">Senior Instructor</p>
                      <div class="flex items-center justify-center gap-1 mb-4">
                        <svg
                          class="w-4 h-4 text-yellow-400"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-400"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-400"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-400"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-400"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                          />
                        </svg>
                        <span class="text-sm text-gray-600 ml-1">5.0</span>
                      </div>
                      <div class="space-y-2">
                        <a
                          href="tel:01234567890"
                          class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-brand text-white text-sm font-medium rounded-lg hover:bg-brand-dark transition-all"
                        >
                          <svg
                            class="w-4 h-4"
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
                          Call Instructor
                        </a>
                        <a
                          href="#"
                          class="flex items-center justify-center gap-2 w-full px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition-all"
                        >
                          <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                            />
                          </svg>
                          Send Message
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Learning Progress -->
              <div class="bg-white rounded-2xl shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                  <h3 class="text-xl font-bold text-gray-800">
                    Learning Progress
                  </h3>
                  <span class="text-sm text-gray-500">Overall: 65%</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                  <!-- Skill 1 -->
                  <div>
                    <div class="flex justify-between items-center mb-2">
                      <span class="text-sm font-medium text-gray-700">
                        Car Controls
                      </span>
                      <span class="text-sm font-semibold text-brand">85%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                      <div
                        class="bg-brand h-2 rounded-full"
                        style="width: 85%"
                      ></div>
                    </div>
                  </div>

                  <!-- Skill 2 -->
                  <div>
                    <div class="flex justify-between items-center mb-2">
                      <span class="text-sm font-medium text-gray-700">
                        Roundabouts
                      </span>
                      <span class="text-sm font-semibold text-brand">70%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                      <div
                        class="bg-brand h-2 rounded-full"
                        style="width: 70%"
                      ></div>
                    </div>
                  </div>

                  <!-- Skill 3 -->
                  <div>
                    <div class="flex justify-between items-center mb-2">
                      <span class="text-sm font-medium text-gray-700">
                        Emergency Stop
                      </span>
                      <span class="text-sm font-semibold text-brand">60%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                      <div
                        class="bg-brand h-2 rounded-full"
                        style="width: 60%"
                      ></div>
                    </div>
                  </div>

                  <!-- Skill 4 -->
                  <div>
                    <div class="flex justify-between items-center mb-2">
                      <span class="text-sm font-medium text-gray-700">
                        Parallel Parking
                      </span>
                      <span class="text-sm font-semibold text-brand">55%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                      <div
                        class="bg-brand h-2 rounded-full"
                        style="width: 55%"
                      ></div>
                    </div>
                  </div>

                  <!-- Skill 5 -->
                  <div>
                    <div class="flex justify-between items-center mb-2">
                      <span class="text-sm font-medium text-gray-700">
                        Highway Driving
                      </span>
                      <span class="text-sm font-semibold text-brand">75%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                      <div
                        class="bg-brand h-2 rounded-full"
                        style="width: 75%"
                      ></div>
                    </div>
                  </div>

                  <!-- Skill 6 -->
                  <div>
                    <div class="flex justify-between items-center mb-2">
                      <span class="text-sm font-medium text-gray-700">
                        Theory Knowledge
                      </span>
                      <span class="text-sm font-semibold text-brand">80%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                      <div
                        class="bg-brand h-2 rounded-full"
                        style="width: 80%"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Recent Activity -->
              <div class="bg-white rounded-2xl shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                  <h3 class="text-xl font-bold text-gray-800">
                    Recent Activity
                  </h3>
                  <a
                    href="#"
                    class="text-sm text-brand hover:text-brand-dark transition-colors font-medium"
                  >
                    View All
                  </a>
                </div>

                <div class="space-y-4">
                  <div class="flex items-start gap-4 pb-4 border-b border-gray-200">
                    <div
                      class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0"
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
                          d="M5 13l4 4L19 7"
                        />
                      </svg>
                    </div>
                    <div class="flex-1">
                      <p class="text-sm font-medium text-gray-800">
                        Completed lesson with Max Abacus
                      </p>
                      <p class="text-xs text-gray-500 mt-1">
                        2-hour beginner driving lesson - Apr 5, 2026
                      </p>
                    </div>
                  </div>

                  <div class="flex items-start gap-4 pb-4 border-b border-gray-200">
                    <div
                      class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0"
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
                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                        />
                      </svg>
                    </div>
                    <div class="flex-1">
                      <p class="text-sm font-medium text-gray-800">
                        Payment received
                      </p>
                      <p class="text-xs text-gray-500 mt-1">
                        £60.00 for 2 hours - Apr 5, 2026
                      </p>
                    </div>
                  </div>

                  <div class="flex items-start gap-4 pb-4 border-b border-gray-200">
                    <div
                      class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0"
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
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                      </svg>
                    </div>
                    <div class="flex-1">
                      <p class="text-sm font-medium text-gray-800">
                        Booked new lesson
                      </p>
                      <p class="text-xs text-gray-500 mt-1">
                        Mock Driving Test on Apr 12, 2026
                      </p>
                    </div>
                  </div>

                  <div class="flex items-start gap-4">
                    <div
                      class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0"
                    >
                      <svg
                        class="w-5 h-5 text-yellow-600"
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
                    <div class="flex-1">
                      <p class="text-sm font-medium text-gray-800">
                        Achieved new milestone
                      </p>
                      <p class="text-xs text-gray-500 mt-1">
                        Completed 15 hours of driving - Apr 3, 2026
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <script>
      // Mobile sidebar toggle (if needed)
      const sidebarLinks = document.querySelectorAll(".sidebar-link");
      sidebarLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
          if (this.getAttribute("href") === "#") {
            e.preventDefault();
          }
        });
      });
    </script>

<?php include 'includes/footer.php'; ?>
