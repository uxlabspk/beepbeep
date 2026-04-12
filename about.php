<?php
$pageTitle = 'About Us | Beep Beep Driving School - Our Story & Team';
$currentPage = 'about';
include __DIR__ . '/includes/header.php';
?>
    <main>
      <!-- Page Hero Section -->
      <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
          <img
            src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=1600&q=80"
            alt="About Us"
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
              About Our Company
            </p>
            <h1
              class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
            >
              We're More Than Just<br />A
              <span class="text-brand">Driving School</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
              Building confident, safe drivers across the UK for over 23 years
              with DVSA-approved instructors and a proven track record of
              success.
            </p>
          </div>
        </div>
      </section>

      <!-- About / Why Choose Us -->
      <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Images collage -->
            <div class="relative">
              <div class="grid grid-cols-2 gap-4">
                <img
                  src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=400&q=80"
                  alt="Driving lesson"
                  class="w-full h-56 object-cover rounded-2xl"
                />
                <img
                  src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80"
                  alt="Instructor with student"
                  class="w-full h-56 object-cover rounded-2xl mt-8"
                />
              </div>
              <!-- Badge -->
              <div
                class="absolute bottom-4 left-4 bg-brand text-white rounded-2xl px-6 py-4 shadow-xl"
              >
                <span class="text-4xl font-bold block">8+</span>
                <span class="text-sm opacity-90">Years of Excellence</span>
              </div>
            </div>
            <!-- Content -->
            <div>
              <p
                class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2"
              >
                <span class="w-8 h-0.5 bg-brand inline-block"></span>
                Who We Are
              </p>
              <h2 class="text-4xl font-bold text-gray-900 mb-6 leading-tight">
                The Best Driving School In The UK
              </h2>
              <p class="text-gray-600 leading-relaxed mb-6">
                At Beep Beep Driving School, we're passionate about creating
                safe, confident drivers. Since our founding in 2018, we've
                maintained the highest standards of driver training across the
                United Kingdom.
              </p>
              <p class="text-gray-600 leading-relaxed mb-8">
                Our DVSA-approved instructors are carefully selected not just
                for their driving expertise, but for their patience,
                communication skills, and genuine desire to help others succeed.
                We believe everyone learns differently, which is why we tailor
                our approach to match your individual learning style.
              </p>
              <div class="grid grid-cols-2 gap-6 mb-8">
                <div class="flex items-start gap-3">
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
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800 text-sm">
                      DVSA Approved
                    </h4>
                    <p class="text-xs text-gray-500 mt-1">
                      All instructors fully certified
                    </p>
                  </div>
                </div>
                <div class="flex items-start gap-3">
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
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800 text-sm">
                      Flexible Hours
                    </h4>
                    <p class="text-xs text-gray-500 mt-1">
                      Weekday, evening & weekends
                    </p>
                  </div>
                </div>
                <div class="flex items-start gap-3">
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
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                      />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800 text-sm">
                      Fully Insured
                    </h4>
                    <p class="text-xs text-gray-500 mt-1">
                      Complete peace of mind
                    </p>
                  </div>
                </div>
                <div class="flex items-start gap-3">
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
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"
                      />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800 text-sm">
                      Expert Instructors
                    </h4>
                    <p class="text-xs text-gray-500 mt-1">
                      3+ qualified professionals
                    </p>
                  </div>
                </div>
              </div>
              <a
                href="contact.php"
                class="inline-block px-8 py-3 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg"
              >
                Get in Touch
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Stats Banner -->
      <section class="bg-brand py-12">
        <div class="container mx-auto px-4">
          <div
            class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center text-white"
          >
            <div>
              <span
                class="text-3xl sm:text-4xl md:text-5xl font-bold block mb-1"
                >200+</span
              >
              <span class="text-white/80 text-xs sm:text-sm"
                >Total Students</span
              >
            </div>
            <div>
              <span
                class="text-3xl sm:text-4xl md:text-5xl font-bold block mb-1"
                >170+</span
              >
              <span class="text-white/80 text-xs sm:text-sm">Tests Passed</span>
            </div>
            <div>
              <span
                class="text-3xl sm:text-4xl md:text-5xl font-bold block mb-1"
                >80+</span
              >
              <span class="text-white/80 text-xs sm:text-sm"
                >5-Star Reviews</span
              >
            </div>
            <div>
              <span
                class="text-3xl sm:text-4xl md:text-5xl font-bold block mb-1"
                >50+</span
              >
              <span class="text-white/80 text-xs sm:text-sm">Awards Won</span>
            </div>
          </div>
        </div>
      </section>

      <!-- Our Mission & Values -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Our Mission
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              Why Choose Beep Beep?
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
              We're committed to providing the highest quality driver training
              with safety, confidence and success at the heart of everything we
              do.
            </p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
              class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all hover:-translate-y-1"
            >
              <div
                class="w-14 h-14 bg-brand/10 rounded-xl flex items-center justify-center mb-6"
              >
                <svg
                  class="w-7 h-7 text-brand"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-3">Safety First</h3>
              <p class="text-gray-600 text-sm leading-relaxed">
                We don't just teach you to pass a test — we instil lifelong safe
                driving practices that protect you and others on the road.
              </p>
            </div>
            <div
              class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all hover:-translate-y-1"
            >
              <div
                class="w-14 h-14 bg-brand/10 rounded-xl flex items-center justify-center mb-6"
              >
                <svg
                  class="w-7 h-7 text-brand"
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
              <h3 class="text-xl font-bold text-gray-800 mb-3">
                Personalised Learning
              </h3>
              <p class="text-gray-600 text-sm leading-relaxed">
                Every student is unique. We adapt our teaching methods to match
                your learning pace and style for optimal results.
              </p>
            </div>
            <div
              class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all hover:-translate-y-1"
            >
              <div
                class="w-14 h-14 bg-brand/10 rounded-xl flex items-center justify-center mb-6"
              >
                <svg
                  class="w-7 h-7 text-brand"
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
              <h3 class="text-xl font-bold text-gray-800 mb-3">
                Proven Success
              </h3>
              <p class="text-gray-600 text-sm leading-relaxed">
                Our structured approach and expert instruction mean 98% of our
                students pass their driving test on the first attempt.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Meet Instructors -->
      <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Our Team
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              Meet Our Qualified Instructors
            </h2>
            <p class="text-gray-600 max-w-xl mx-auto">
              Our DVSA-approved team brings patience, expertise and a passion
              for teaching safe driving.
            </p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center group">
              <div class="relative mb-5 inline-block">
                <img
                  src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&q=80"
                  alt="Max Abacus"
                  class="w-48 h-48 rounded-2xl object-cover mx-auto group-hover:shadow-xl transition-all"
                />
                <div
                  class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-8 h-8 bg-brand rounded-full flex items-center justify-center shadow-lg"
                >
                  <svg
                    class="w-4 h-4 text-white"
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
              </div>
              <h4 class="text-lg font-bold text-gray-800 mt-4">Max Abacus</h4>
              <p class="text-brand text-sm font-medium">
                5+ yrs
              </p>
            </div>
            <div class="text-center group">
              <div class="relative mb-5 inline-block">
                <img
                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&q=80"
                  alt="Jenifer Lopez"
                  class="w-48 h-48 rounded-2xl object-cover mx-auto group-hover:shadow-xl transition-all"
                />
                <div
                  class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-8 h-8 bg-brand rounded-full flex items-center justify-center shadow-lg"
                >
                  <svg
                    class="w-4 h-4 text-white"
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
              </div>
              <h4 class="text-lg font-bold text-gray-800 mt-4">
                Jenifer Lopez
              </h4>
              <p class="text-brand text-sm font-medium">
                4+ yrs
              </p>
            </div>
            <div class="text-center group">
              <div class="relative mb-5 inline-block">
                <img
                  src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300&q=80"
                  alt="Henry Jassy"
                  class="w-48 h-48 rounded-2xl object-cover mx-auto group-hover:shadow-xl transition-all"
                />
                <div
                  class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-8 h-8 bg-brand rounded-full flex items-center justify-center shadow-lg"
                >
                  <svg
                    class="w-4 h-4 text-white"
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
              </div>
              <h4 class="text-lg font-bold text-gray-800 mt-4">Henry Jassy</h4>
              <p class="text-brand text-sm font-medium">5+ yrs</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Our Story Timeline -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Our Journey
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              Our Story Through the Years
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
              From humble beginnings to becoming the UK's most trusted driving
              school.
            </p>
          </div>
          <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
              <div class="flex gap-6">
                <div class="flex-shrink-0 w-24 text-right">
                  <span class="text-2xl font-bold text-brand">2003</span>
                </div>
                <div class="flex-grow">
                  <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">
                      Founded with a Vision
                    </h3>
                    <p class="text-gray-600 text-sm">
                      Beep Beep Driving School was established with a simple
                      mission: to provide patient, professional instruction that
                      creates safe, confident drivers for life.
                    </p>
                  </div>
                </div>
              </div>
              <div class="flex gap-6">
                <div class="flex-shrink-0 w-24 text-right">
                  <span class="text-2xl font-bold text-brand">2010</span>
                </div>
                <div class="flex-grow">
                  <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">
                      Rapid Expansion
                    </h3>
                    <p class="text-gray-600 text-sm">
                      Grew to 15+ instructors across Manchester and surrounding
                      areas, maintaining our commitment to quality while scaling
                      our impact.
                    </p>
                  </div>
                </div>
              </div>
              <div class="flex gap-6">
                <div class="flex-shrink-0 w-24 text-right">
                  <span class="text-2xl font-bold text-brand">2018</span>
                </div>
                <div class="flex-grow">
                  <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">
                      National Recognition
                    </h3>
                    <p class="text-gray-600 text-sm">
                      Awarded "Best Driving School in the UK" by the National
                      Driver Training Association, recognising our excellence in
                      instruction and student success rates.
                    </p>
                  </div>
                </div>
              </div>
              <div class="flex gap-6">
                <div class="flex-shrink-0 w-24 text-right">
                  <span class="text-2xl font-bold text-brand">2026</span>
                </div>
                <div class="flex-grow">
                  <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">
                      Continuing Excellence
                    </h3>
                    <p class="text-gray-600 text-sm">
                      Today, we continue to lead the industry with innovative
                      teaching methods, modern vehicles, and a track record of
                      over 5,400 successful students.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials -->
      <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
          <div class="text-center mb-14">
            <p
              class="text-brand font-semibold text-sm uppercase tracking-widest mb-3 flex items-center gap-2 justify-center"
            >
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
              Testimonials
              <span class="w-8 h-0.5 bg-brand inline-block"></span>
            </p>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
              What Our Students Say
            </h2>
            <p class="text-gray-600 max-w-xl mx-auto">
              Don't just take our word for it — hear from our thousands of
              successful students.
            </p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
              class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all hover:-translate-y-1"
            >
              <div class="flex gap-1 mb-4">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
              </div>
              <p class="text-gray-600 italic mb-6 leading-relaxed">
                "Passed my test first time thanks to my amazing instructor! The
                lessons were fun and professional. Highly recommend Beep Beep!"
              </p>
              <div class="flex items-center gap-3">
                <img
                  src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&q=80"
                  alt="Sarah M."
                  class="w-12 h-12 rounded-full object-cover"
                />
                <div>
                  <h4 class="font-semibold text-gray-800">Hassan Zubair</h4>
                  <p class="text-sm text-gray-500">Manchester · ⭐ 5.0</p>
                </div>
              </div>
            </div>
            <div
              class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all hover:-translate-y-1"
            >
              <div class="flex gap-1 mb-4">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
              </div>
              <p class="text-gray-600 italic mb-6 leading-relaxed">
                "Great patient instruction. I was nervous at first but they made
                me feel comfortable from day one. Worth every penny!"
              </p>
              <div class="flex items-center gap-3">
                <img
                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80"
                  alt="Ana Pinchi"
                  class="w-12 h-12 rounded-full object-cover"
                />
                <div>
                  <h4 class="font-semibold text-gray-800">Ana Pinchi</h4>
                  <p class="text-sm text-gray-500">London · ⭐ 5.0</p>
                </div>
              </div>
            </div>
            <div
              class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all hover:-translate-y-1"
            >
              <div class="flex gap-1 mb-4">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#FF6B00">
                  <polygon
                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                  />
                </svg>
              </div>
              <p class="text-gray-600 italic mb-6 leading-relaxed">
                "Excellent service! Very flexible with scheduling and the
                intensive course got me test ready in just 6 weeks."
              </p>
              <div class="flex items-center gap-3">
                <img
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&q=80"
                  alt="Brian Settings"
                  class="w-12 h-12 rounded-full object-cover"
                />
                <div>
                  <h4 class="font-semibold text-gray-800">Brian Settings</h4>
                  <p class="text-sm text-gray-500">Birmingham · ⭐ 5.0</p>
                </div>
              </div>
            </div>
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
                  Learn With Pros
                </p>
                <h2 class="text-3xl font-bold text-white">
                  Start Your Driving Journey Today<br />Join Us Now!
                </h2>
              </div>
            </div>
            <div class="flex flex-wrap gap-4 lg:justify-end">
              <a
                href="contact.php"
                class="px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-xl"
              >
                Contact Now
              </a>
              <a
                href="book-now.php"
                class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-gray-900 transition-all"
              >
                Book A Lesson
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include __DIR__ . '/includes/footer.php'; ?>