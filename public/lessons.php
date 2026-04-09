<?php
$pageTitle = 'Courses | Beep Beep Driving School - Learn to Drive';
$currentPage = 'courses';
include dirname(__DIR__) . '/includes/header.php';
?>

    <main>
      <!-- Page Hero Section -->
      <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
          <img
            src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?w=1600&q=80"
            alt="Driving Courses"
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
              Our Driving Courses
            </p>
            <h1
              class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
            >
              Choose The Right<br /><span class="text-brand"
                >Course For You</span
              >
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
              From beginner lessons to advanced training, we offer comprehensive
              courses tailored to your needs. All courses include DVSA-approved
              instruction and flexible scheduling.
            </p>
          </div>
        </div>
      </section>

      <!-- Course Filter/Search -->
      <section class="bg-white py-10 shadow-lg relative z-10">
        <div class="container mx-auto px-4">
          <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">
            Find Your Perfect Course
          </h2>
          <div class="flex flex-wrap gap-4 items-end justify-center">
            <div class="flex-1 min-w-[180px] max-w-xs">
              <label class="block text-sm font-medium text-gray-600 mb-2"
                >Course Level</label
              >
              <select
                class="w-full border border-gray-200 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-brand"
              >
                <option>All Levels</option>
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>
              </select>
            </div>
            <div class="flex-1 min-w-[180px] max-w-xs">
              <label class="block text-sm font-medium text-gray-600 mb-2"
                >Transmission Type</label
              >
              <select
                class="w-full border border-gray-200 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-brand"
              >
                <option>Manual or Automatic</option>
                <option>Manual</option>
                <option>Automatic</option>
              </select>
            </div>
            <div class="flex-1 min-w-[180px] max-w-xs">
              <label class="block text-sm font-medium text-gray-600 mb-2"
                >Duration</label
              >
              <select
                class="w-full border border-gray-200 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-brand"
              >
                <option>Any Duration</option>
                <option>Intensive (1-2 weeks)</option>
                <option>Standard (4-8 weeks)</option>
                <option>Extended (12+ weeks)</option>
              </select>
            </div>
            <button
              class="px-8 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
            >
              Search Courses
            </button>
          </div>
        </div>
      </section>

      <!-- All Courses Grid -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Available Courses
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              Explore Our Comprehensive Courses
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
              Choose from our range of professionally designed courses to suit
              every skill level and learning goal.
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Beginner Lessons -->
            <div
              id="beginners"
              class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all group"
            >
              <!-- Course Image -->
              <div class="relative h-56 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=600&q=80"
                  alt="Beginner Lessons"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div class="absolute top-4 right-4">
                  <span
                    class="bg-green-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg"
                    >Most Popular</span
                  >
                </div>
                <div class="absolute top-4 left-4">
                  <span
                    class="bg-white/95 backdrop-blur-sm text-brand text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg"
                    >Beginner Level</span
                  >
                </div>
              </div>

              <!-- Course Content -->
              <div class="p-6">
                <!-- Title & Rating -->
                <div class="mb-4">
                  <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Beginner Driving Lessons
                  </h3>
                  <div class="flex items-center gap-3 text-sm">
                    <div class="flex items-center gap-1">
                      <svg
                        class="w-4 h-4 text-yellow-400 fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                        />
                      </svg>
                      <span class="font-semibold text-gray-900">4.9</span>
                      <span class="text-gray-500">(520+ students)</span>
                    </div>
                  </div>
                </div>

                <!-- Course Stats -->
                <div
                  class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-gray-100"
                >
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Duration</p>
                    <p class="text-sm font-bold text-gray-900">8-12 weeks</p>
                  </div>
                  <div class="text-center border-x border-gray-100">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Lesson Time</p>
                    <p class="text-sm font-bold text-gray-900">60-90 mins</p>
                  </div>
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Min Lessons</p>
                    <p class="text-sm font-bold text-gray-900">20-40 hrs</p>
                  </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Perfect for complete beginners. Start from scratch with
                  patient, professional instruction covering all the basics of
                  safe driving.
                </p>

                <!-- Key Features -->
                <div class="space-y-2.5 mb-5">
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Manual & Automatic transmission options</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Flexible scheduling to fit your routine</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >DVSA approved curriculum & certified instructors</span
                    >
                  </div>
                </div>

                <!-- Price & CTA -->
                <div
                  class="flex items-center justify-between pt-5 border-t border-gray-100"
                >
                  <div>
                    <p class="text-xs text-gray-500 mb-1">Starting from</p>
                    <div class="flex items-baseline gap-1">
                      <span class="text-3xl font-bold text-brand">£75</span>
                      <span class="text-gray-500 text-sm font-medium"
                        >/lesson</span
                      >
                    </div>
                  </div>
                  <a
                    href="book-now.php"
                    class="px-7 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0"
                  >
                    Book Now
                  </a>
                </div>
              </div>
            </div>

            <!-- Refresher Course -->
            <div
              id="refresher"
              class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all group"
            >
              <!-- Course Image -->
              <div class="relative h-56 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600&q=80"
                  alt="Refresher Course"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div class="absolute top-4 left-4">
                  <span
                    class="bg-white/95 backdrop-blur-sm text-blue-600 text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg"
                    >Intermediate Level</span
                  >
                </div>
              </div>

              <!-- Course Content -->
              <div class="p-6">
                <!-- Title & Rating -->
                <div class="mb-4">
                  <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Refresher Course
                  </h3>
                  <div class="flex items-center gap-3 text-sm">
                    <div class="flex items-center gap-1">
                      <svg
                        class="w-4 h-4 text-yellow-400 fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                        />
                      </svg>
                      <span class="font-semibold text-gray-900">4.8</span>
                      <span class="text-gray-500">(280+ students)</span>
                    </div>
                  </div>
                </div>

                <!-- Course Stats -->
                <div
                  class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-gray-100"
                >
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Duration</p>
                    <p class="text-sm font-bold text-gray-900">4-8 weeks</p>
                  </div>
                  <div class="text-center border-x border-gray-100">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Lesson Time</p>
                    <p class="text-sm font-bold text-gray-900">60-90 mins</p>
                  </div>
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Min Lessons</p>
                    <p class="text-sm font-bold text-gray-900">10-20 hrs</p>
                  </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Already have your license but need to regain confidence? Brush
                  up on your skills with targeted refresher lessons.
                </p>

                <!-- Key Features -->
                <div class="space-y-2.5 mb-5">
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Personalized skill assessment and focused training</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Learn at your own pace with flexible scheduling</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Confidence building in challenging road situations</span
                    >
                  </div>
                </div>

                <!-- Price & CTA -->
                <div
                  class="flex items-center justify-between pt-5 border-t border-gray-100"
                >
                  <div>
                    <p class="text-xs text-gray-500 mb-1">Starting from</p>
                    <div class="flex items-baseline gap-1">
                      <span class="text-3xl font-bold text-brand">£70</span>
                      <span class="text-gray-500 text-sm font-medium"
                        >/lesson</span
                      >
                    </div>
                  </div>
                  <a
                    href="book-now.php"
                    class="px-7 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0"
                  >
                    Book Now
                  </a>
                </div>
              </div>
            </div>

            <!-- Test Preparation -->
            <div
              id="test-prep"
              class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all group"
            >
              <!-- Course Image -->
              <div class="relative h-56 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80"
                  alt="Test Preparation"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div class="absolute top-4 right-4">
                  <span
                    class="bg-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg"
                    >High Success Rate</span
                  >
                </div>
                <div class="absolute top-4 left-4">
                  <span
                    class="bg-white/95 backdrop-blur-sm text-purple-600 text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg"
                    >Advanced Level</span
                  >
                </div>
              </div>

              <!-- Course Content -->
              <div class="p-6">
                <!-- Title & Rating -->
                <div class="mb-4">
                  <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Test Preparation Course
                  </h3>
                  <div class="flex items-center gap-3 text-sm">
                    <div class="flex items-center gap-1">
                      <svg
                        class="w-4 h-4 text-yellow-400 fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                        />
                      </svg>
                      <span class="font-semibold text-gray-900">5.0</span>
                      <span class="text-gray-500">(410+ students)</span>
                    </div>
                  </div>
                </div>

                <!-- Course Stats -->
                <div
                  class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-gray-100"
                >
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Duration</p>
                    <p class="text-sm font-bold text-gray-900">2-4 weeks</p>
                  </div>
                  <div class="text-center border-x border-gray-100">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Lesson Time</p>
                    <p class="text-sm font-bold text-gray-900">60-90 mins</p>
                  </div>
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Min Lessons</p>
                    <p class="text-sm font-bold text-gray-900">5-10 hrs</p>
                  </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Intensive preparation focused on passing your practical
                  driving test. Mock tests and exam techniques included.
                </p>

                <!-- Key Features -->
                <div class="space-y-2.5 mb-5">
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Full mock tests with detailed feedback</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Test route familiarization and local area training</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Anxiety management and confidence building</span
                    >
                  </div>
                </div>

                <!-- Price & CTA -->
                <div
                  class="flex items-center justify-between pt-5 border-t border-gray-100"
                >
                  <div>
                    <p class="text-xs text-gray-500 mb-1">Starting from</p>
                    <div class="flex items-baseline gap-1">
                      <span class="text-3xl font-bold text-brand">£85</span>
                      <span class="text-gray-500 text-sm font-medium"
                        >/lesson</span
                      >
                    </div>
                  </div>
                  <a
                    href="book-now.php"
                    class="px-7 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0"
                  >
                    Book Now
                  </a>
                </div>
              </div>
            </div>

            <!-- Intensive Course -->
            <div
              id="intensive"
              class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all group"
            >
              <!-- Course Image -->
              <div class="relative h-56 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1502877338535-766e1452684a?w=600&q=80"
                  alt="Intensive Course"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div class="absolute top-4 right-4">
                  <span
                    class="bg-brand text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg"
                    >Best Value</span
                  >
                </div>
                <div class="absolute top-4 left-4">
                  <span
                    class="bg-white/95 backdrop-blur-sm text-red-600 text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg"
                    >Fast Track</span
                  >
                </div>
              </div>

              <!-- Course Content -->
              <div class="p-6">
                <!-- Title & Rating -->
                <div class="mb-4">
                  <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Intensive Driving Course
                  </h3>
                  <div class="flex items-center gap-3 text-sm">
                    <div class="flex items-center gap-1">
                      <svg
                        class="w-4 h-4 text-yellow-400 fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                        />
                      </svg>
                      <span class="font-semibold text-gray-900">4.9</span>
                      <span class="text-gray-500">(350+ students)</span>
                    </div>
                  </div>
                </div>

                <!-- Course Stats -->
                <div
                  class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-gray-100"
                >
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Duration</p>
                    <p class="text-sm font-bold text-gray-900">1-2 weeks</p>
                  </div>
                  <div class="text-center border-x border-gray-100">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Training</p>
                    <p class="text-sm font-bold text-gray-900">20-40 hrs/wk</p>
                  </div>
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Total Hours</p>
                    <p class="text-sm font-bold text-gray-900">30-45 hrs</p>
                  </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Learn to drive in just 1-2 weeks! Full-time intensive training
                  perfect for those who want to pass quickly.
                </p>

                <!-- Key Features -->
                <div class="space-y-2.5 mb-5">
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >20-40 hours of training per week</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Driving test included in package deal</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Convenient pick-up & drop-off service included</span
                    >
                  </div>
                </div>

                <!-- Price & CTA -->
                <div
                  class="flex items-center justify-between pt-5 border-t border-gray-100"
                >
                  <div>
                    <p class="text-xs text-gray-500 mb-1">Package price</p>
                    <div class="flex items-baseline gap-1">
                      <span class="text-3xl font-bold text-brand">£950</span>
                      <span class="text-gray-500 text-sm font-medium"
                        >/week</span
                      >
                    </div>
                  </div>
                  <a
                    href="book-now.php"
                    class="px-7 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0"
                  >
                    Book Now
                  </a>
                </div>
              </div>
            </div>

            <!-- Manual Driving -->
            <div
              id="manual"
              class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all group"
            >
              <!-- Course Image -->
              <div class="relative h-56 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1489824904134-891ab64532f1?w=600&q=80"
                  alt="Manual Driving"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div class="absolute top-4 left-4">
                  <span
                    class="bg-white/95 backdrop-blur-sm text-indigo-600 text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg"
                    >Full License</span
                  >
                </div>
              </div>

              <!-- Course Content -->
              <div class="p-6">
                <!-- Title & Rating -->
                <div class="mb-4">
                  <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Manual Driving Lessons
                  </h3>
                  <div class="flex items-center gap-3 text-sm">
                    <div class="flex items-center gap-1">
                      <svg
                        class="w-4 h-4 text-yellow-400 fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                        />
                      </svg>
                      <span class="font-semibold text-gray-900">4.8</span>
                      <span class="text-gray-500">(470+ students)</span>
                    </div>
                  </div>
                </div>

                <!-- Course Stats -->
                <div
                  class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-gray-100"
                >
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Duration</p>
                    <p class="text-sm font-bold text-gray-900">8-12 weeks</p>
                  </div>
                  <div class="text-center border-x border-gray-100">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Lesson Time</p>
                    <p class="text-sm font-bold text-gray-900">60-90 mins</p>
                  </div>
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Min Lessons</p>
                    <p class="text-sm font-bold text-gray-900">25-45 hrs</p>
                  </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Master clutch control and gear changes. Learn in a modern
                  manual transmission vehicle with expert guidance.
                </p>

                <!-- Key Features -->
                <div class="space-y-2.5 mb-5">
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Hill starts & junction mastery techniques</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Comprehensive gear coordination training</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Modern dual-control safety vehicles</span
                    >
                  </div>
                </div>

                <!-- Price & CTA -->
                <div
                  class="flex items-center justify-between pt-5 border-t border-gray-100"
                >
                  <div>
                    <p class="text-xs text-gray-500 mb-1">Starting from</p>
                    <div class="flex items-baseline gap-1">
                      <span class="text-3xl font-bold text-brand">£75</span>
                      <span class="text-gray-500 text-sm font-medium"
                        >/lesson</span
                      >
                    </div>
                  </div>
                  <a
                    href="book-now.php"
                    class="px-7 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0"
                  >
                    Book Now
                  </a>
                </div>
              </div>
            </div>

            <!-- Automatic Driving -->
            <div
              id="automatic"
              class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all group"
            >
              <!-- Course Image -->
              <div class="relative h-56 overflow-hidden">
                <img
                  src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=600&q=80"
                  alt="Automatic Driving"
                  class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div class="absolute top-4 left-4">
                  <span
                    class="bg-white/95 backdrop-blur-sm text-teal-600 text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg"
                    >Easy Learning</span
                  >
                </div>
              </div>

              <!-- Course Content -->
              <div class="p-6">
                <!-- Title & Rating -->
                <div class="mb-4">
                  <h3 class="text-2xl font-bold text-gray-900 mb-2">
                    Automatic Driving Lessons
                  </h3>
                  <div class="flex items-center gap-3 text-sm">
                    <div class="flex items-center gap-1">
                      <svg
                        class="w-4 h-4 text-yellow-400 fill-current"
                        viewBox="0 0 20 20"
                      >
                        <path
                          d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                        />
                      </svg>
                      <span class="font-semibold text-gray-900">4.9</span>
                      <span class="text-gray-500">(390+ students)</span>
                    </div>
                  </div>
                </div>

                <!-- Course Stats -->
                <div
                  class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-gray-100"
                >
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Duration</p>
                    <p class="text-sm font-bold text-gray-900">6-10 weeks</p>
                  </div>
                  <div class="text-center border-x border-gray-100">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Lesson Time</p>
                    <p class="text-sm font-bold text-gray-900">60-90 mins</p>
                  </div>
                  <div class="text-center">
                    <div class="flex items-center justify-center mb-1">
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
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                      </svg>
                    </div>
                    <p class="text-xs text-gray-500 mb-1">Min Lessons</p>
                    <p class="text-sm font-bold text-gray-900">20-35 hrs</p>
                  </div>
                </div>

                <!-- Description -->
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                  Simpler learning with no gears or clutch. Perfect for those
                  who want to focus purely on road skills and safety.
                </p>

                <!-- Key Features -->
                <div class="space-y-2.5 mb-5">
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Easier to learn with no clutch or gears</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Less stress means faster progress and confidence</span
                    >
                  </div>
                  <div class="flex items-start gap-2.5">
                    <div class="mt-0.5">
                      <svg
                        class="w-4 h-4 text-green-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </div>
                    <span class="text-sm text-gray-700"
                      >Latest automatic transmission vehicles</span
                    >
                  </div>
                </div>

                <!-- Price & CTA -->
                <div
                  class="flex items-center justify-between pt-5 border-t border-gray-100"
                >
                  <div>
                    <p class="text-xs text-gray-500 mb-1">Starting from</p>
                    <div class="flex items-baseline gap-1">
                      <span class="text-3xl font-bold text-brand">£80</span>
                      <span class="text-gray-500 text-sm font-medium"
                        >/lesson</span
                      >
                    </div>
                  </div>
                  <a
                    href="book-now.php"
                    class="px-7 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0"
                  >
                    Book Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Defensive Driving Feature -->
      <section class="py-20 bg-dark">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="relative rounded-2xl overflow-hidden">
              <img
                src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?w=700&q=80"
                alt="Defensive Driving"
                class="w-full h-96 object-cover"
              />
              <div class="absolute top-4 left-4 flex gap-2">
                <span
                  class="bg-brand text-white text-xs font-semibold px-3 py-1 rounded-full"
                  >Advanced</span
                >
                <span
                  class="bg-white text-gray-800 text-xs font-semibold px-3 py-1 rounded-full"
                  >Premium Course</span
                >
              </div>
            </div>
            <div class="text-white">
              <p
                class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2"
              >
                <span class="w-8 h-0.5 bg-brand inline-block"></span>
                Featured Course
              </p>
              <h2 class="text-3xl font-bold mb-4">
                Defensive Driving Masterclass
              </h2>
              <p class="text-gray-400 leading-relaxed mb-6">
                Go beyond standard lessons and master advanced defensive driving
                techniques. This premium course focuses on hazard perception,
                anticipation skills, and advanced safety techniques that will
                make you a safer driver for life.
              </p>
              <div class="flex gap-8 mb-6">
                <div class="flex items-center gap-2 text-gray-400 text-sm">
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
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                  8 Hours Total
                </div>
                <div class="flex items-center gap-2 text-gray-400 text-sm">
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
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"
                    />
                  </svg>
                  Small Groups (Max 4)
                </div>
              </div>
              <div class="flex items-center gap-4 mb-8">
                <div class="flex -space-x-3">
                  <img
                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=60&q=80"
                    alt="Student"
                    class="w-9 h-9 rounded-full border-2 border-dark object-cover"
                  />
                  <img
                    src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=60&q=80"
                    alt="Student"
                    class="w-9 h-9 rounded-full border-2 border-dark object-cover"
                  />
                  <img
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&q=80"
                    alt="Student"
                    class="w-9 h-9 rounded-full border-2 border-dark object-cover"
                  />
                </div>
                <span class="text-gray-400 text-sm"
                  >200+ Students Enrolled</span
                >
              </div>
              <div class="flex items-center gap-4">
                <div>
                  <span class="text-3xl font-bold text-brand">£299</span>
                  <span class="text-gray-400 text-sm">/course</span>
                </div>
                <a
                  href="book-now.php"
                  class="px-8 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-xl"
                >
                  Enrol Now
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- What's Included -->
      <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Course Features
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              What's Included in Every Course
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
              All our courses come with comprehensive features to ensure your
              success on the road to becoming a confident driver.
            </p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
              class="text-center p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all"
            >
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
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                DVSA Approved Instructors
              </h3>
              <p class="text-gray-600 text-sm">
                All instructors are fully qualified and DVSA-certified with
                years of teaching experience.
              </p>
            </div>
            <div
              class="text-center p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all"
            >
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
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Flexible Scheduling
              </h3>
              <p class="text-gray-600 text-sm">
                Book lessons around your schedule. Weekend and evening slots
                available.
              </p>
            </div>
            <div
              class="text-center p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all"
            >
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
                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Fully Insured
              </h3>
              <p class="text-gray-600 text-sm">
                Complete insurance coverage for all lessons. Your safety is our
                priority.
              </p>
            </div>
            <div
              class="text-center p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all"
            >
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
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Theory Support
              </h3>
              <p class="text-gray-600 text-sm">
                Free access to theory test resources and practice materials.
              </p>
            </div>
            <div
              class="text-center p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all"
            >
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
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Progress Tracking
              </h3>
              <p class="text-gray-600 text-sm">
                Digital progress reports and structured learning pathways.
              </p>
            </div>
            <div
              class="text-center p-6 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition-all"
            >
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
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"
                  />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-gray-800 mb-2">
                Small Group Sizes
              </h3>
              <p class="text-gray-600 text-sm">
                Maximum 4 students per group for personalised attention.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="bg-brand py-16">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap items-center justify-between gap-6">
            <div>
              <h3 class="text-2xl font-bold text-white mb-1">
                Ready to Start Learning?
              </h3>
              <p class="text-white/80 text-sm">
                Book your first lesson today and take the first step towards
                independence!
              </p>
            </div>
            <div class="flex gap-4">
              <a
                href="book-now.php"
                class="px-8 py-4 bg-white text-brand font-semibold rounded-lg hover:bg-gray-100 transition-all hover:shadow-xl"
              >
                Book Your First Lesson
              </a>
              <a
                href="contact.php"
                class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-brand transition-all"
              >
                Contact Us
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>


    <script>
      // Course Filter Functionality
      const courseLevelFilter = document.querySelector("select:nth-of-type(1)");
      const transmissionFilter = document.querySelector(
        "select:nth-of-type(2)",
      );
      const durationFilter = document.querySelector("select:nth-of-type(3)");
      const searchButton = document.querySelector("button");
      const courseCards = document.querySelectorAll(
        ".grid.grid-cols-1.lg\:grid-cols-2.gap-8 > div",
      );

      // Add data attributes to course cards for filtering
      const courseData = {
        beginners: {
          level: "beginner",
          transmission: "both",
          duration: "standard",
        },
        refresher: {
          level: "intermediate",
          transmission: "both",
          duration: "standard",
        },
        "test-prep": {
          level: "advanced",
          transmission: "both",
          duration: "intensive",
        },
        intensive: {
          level: "all",
          transmission: "both",
          duration: "intensive",
        },
        manual: { level: "all", transmission: "manual", duration: "standard" },
        automatic: {
          level: "all",
          transmission: "automatic",
          duration: "standard",
        },
      };

      // Add data attributes to each card
      courseCards.forEach((card) => {
        const cardId = card.id;
        if (courseData[cardId]) {
          card.setAttribute("data-level", courseData[cardId].level);
          card.setAttribute(
            "data-transmission",
            courseData[cardId].transmission,
          );
          card.setAttribute("data-duration", courseData[cardId].duration);
        }
      });

      function filterCourses() {
        const selectedLevel = courseLevelFilter.value.toLowerCase();
        const selectedTransmission = transmissionFilter.value.toLowerCase();
        const selectedDuration = durationFilter.value.toLowerCase();

        courseCards.forEach((card) => {
          const cardLevel = card.getAttribute("data-level");
          const cardTransmission = card.getAttribute("data-transmission");
          const cardDuration = card.getAttribute("data-duration");

          let showCard = true;

          // Filter by level
          if (
            selectedLevel !== "all levels" &&
            cardLevel !== "all" &&
            cardLevel !== selectedLevel
          ) {
            showCard = false;
          }

          // Filter by transmission
          if (selectedTransmission !== "manual or automatic") {
            const transmissionValue = selectedTransmission.split(" ")[0]; // 'manual' or 'automatic'
            if (
              cardTransmission !== "both" &&
              cardTransmission !== transmissionValue
            ) {
              showCard = false;
            }
          }

          // Filter by duration
          if (selectedDuration !== "any duration") {
            const durationKey = selectedDuration.split(" ")[0]; // 'intensive', 'standard', 'extended'
            if (cardDuration !== durationKey && cardDuration !== "all") {
              showCard = false;
            }
          }

          // Show/hide card with animation
          if (showCard) {
            card.style.display = "block";
            setTimeout(() => {
              card.style.opacity = "1";
              card.style.transform = "scale(1)";
            }, 50);
          } else {
            card.style.opacity = "0";
            card.style.transform = "scale(0.95)";
            setTimeout(() => {
              card.style.display = "none";
            }, 300);
          }
        });
      }

      // Event listeners for filters
      if (searchButton) {
        searchButton.addEventListener("click", filterCourses);
      }

      // Also filter when any dropdown changes
      if (courseLevelFilter)
        courseLevelFilter.addEventListener("change", filterCourses);
      if (transmissionFilter)
        transmissionFilter.addEventListener("change", filterCourses);
      if (durationFilter)
        durationFilter.addEventListener("change", filterCourses);
    </script>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>