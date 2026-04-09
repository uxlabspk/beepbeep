<?php
$pageTitle = 'Book Now | Beep Beep Driving School - Reserve Your Lesson';
$currentPage = 'book-now';
include dirname(__DIR__) . '/includes/header.php';
?>

    <main>
      <!-- Page Hero Section -->
      <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0">
          <img
            src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=1600&q=80"
            alt="Book Now"
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
              Start Your Journey
            </p>
            <h1
              class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6"
            >
              Book Your First<br /><span class="text-brand"
                >Driving Lesson</span
              >
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed">
              Ready to get behind the wheel? Fill out the form below and we'll
              match you with the perfect instructor.
            </p>
          </div>
        </div>
      </section>

      <!-- Booking Form -->
      <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <!-- Form Section -->
            <div class="lg:col-span-2">
              <div class="bg-white p-8 rounded-2xl shadow-md">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                  Your Details
                </h3>
                <p class="text-gray-600 text-sm mb-6">
                  Complete the form below to book your lesson or package.
                </p>

                <form action="#" method="POST" class="space-y-6">
                  <!-- Personal Information -->
                  <div class="space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2">
                      Personal Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                    <div>
                      <label
                        for="dob"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Date of Birth *</label
                      >
                      <input
                        type="date"
                        id="dob"
                        name="dob"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      />
                    </div>
                    <div>
                      <label
                        for="address"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Full Address</label
                      >
                      <textarea
                        id="address"
                        name="address"
                        rows="2"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all resize-none"
                        placeholder="Your full postal address"
                      ></textarea>
                    </div>
                  </div>

                  <!-- License Information -->
                  <div class="space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2">
                      License Information
                    </h4>
                    <div>
                      <label
                        for="licenseStatus"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Do you have a provisional license? *</label
                      >
                      <select
                        id="licenseStatus"
                        name="licenseStatus"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      >
                        <option value="">Select an option</option>
                        <option value="yes-have">
                          Yes, I have my provisional license
                        </option>
                        <option value="yes-applying">
                          Yes, I'm currently applying for one
                        </option>
                        <option value="no">No, but I plan to get one</option>
                      </select>
                    </div>
                    <div id="licenseNumberField" class="hidden">
                      <label
                        for="licenseNumber"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >License Number (if you have it)</label
                      >
                      <input
                        type="text"
                        id="licenseNumber"
                        name="licenseNumber"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        placeholder="SMITH012345AB9CD"
                      />
                    </div>
                  </div>

                  <!-- Booking Preferences -->
                  <div class="space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2">
                      Booking Preferences
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div>
                        <label
                          for="serviceType"
                          class="block text-sm font-medium text-gray-700 mb-2"
                          >Service Type *</label
                        >
                        <select
                          id="serviceType"
                          name="serviceType"
                          required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        >
                          <option value="">Select a service</option>
                          <option value="single">Single Lesson (£35)</option>
                          <option value="block5">
                            Block of 5 Lessons (£165)
                          </option>
                          <option value="block10">
                            Block of 10 Lessons (£300)
                          </option>
                          <option value="starter">
                            Starter Pack - 5hrs (£350)
                          </option>
                          <option value="standard">
                            Standard Pack - 10hrs (£650)
                          </option>
                          <option value="premium">
                            Premium Pack - 20hrs (£1,200)
                          </option>
                          <option value="intensive1">
                            Intensive 1 Week (£1,450)
                          </option>
                          <option value="intensive2">
                            Intensive 2 Weeks (£1,950)
                          </option>
                        </select>
                      </div>
                      <div>
                        <label
                          for="transmission"
                          class="block text-sm font-medium text-gray-700 mb-2"
                          >Transmission Type *</label
                        >
                        <select
                          id="transmission"
                          name="transmission"
                          required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        >
                          <option value="">Select transmission</option>
                          <option value="manual">Manual</option>
                          <option value="automatic">Automatic</option>
                          <option value="either">Either (No preference)</option>
                        </select>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div>
                        <label
                          for="experience"
                          class="block text-sm font-medium text-gray-700 mb-2"
                          >Driving Experience *</label
                        >
                        <select
                          id="experience"
                          name="experience"
                          required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        >
                          <option value="">Select experience level</option>
                          <option value="beginner">
                            Complete Beginner (Never driven)
                          </option>
                          <option value="some">
                            Some Experience (Had a few lessons)
                          </option>
                          <option value="intermediate">
                            Intermediate (Can drive but need practice)
                          </option>
                          <option value="test-ready">
                            Test Ready (Just need mock tests)
                          </option>
                          <option value="refresher">
                            Refresher (Already passed, need refresh)
                          </option>
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
                          <option value="henry">
                            Henry Jassy (Instructor)
                          </option>
                        </select>
                      </div>
                    </div>
                    <div>
                      <label
                        for="location"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Pick-up Location *</label
                      >
                      <input
                        type="text"
                        id="location"
                        name="location"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                        placeholder="Your postcode or area"
                      />
                    </div>
                    <div>
                      <label
                        for="availability"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Preferred Days/Times *</label
                      >
                      <select
                        id="availability"
                        name="availability"
                        required
                        multiple
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all h-32"
                      >
                        <option value="mon-morning">Monday Morning</option>
                        <option value="mon-afternoon">Monday Afternoon</option>
                        <option value="mon-evening">Monday Evening</option>
                        <option value="tue-morning">Tuesday Morning</option>
                        <option value="tue-afternoon">Tuesday Afternoon</option>
                        <option value="tue-evening">Tuesday Evening</option>
                        <option value="wed-morning">Wednesday Morning</option>
                        <option value="wed-afternoon">
                          Wednesday Afternoon
                        </option>
                        <option value="wed-evening">Wednesday Evening</option>
                        <option value="thu-morning">Thursday Morning</option>
                        <option value="thu-afternoon">
                          Thursday Afternoon
                        </option>
                        <option value="thu-evening">Thursday Evening</option>
                        <option value="fri-morning">Friday Morning</option>
                        <option value="fri-afternoon">Friday Afternoon</option>
                        <option value="fri-evening">Friday Evening</option>
                        <option value="sat-morning">Saturday Morning</option>
                        <option value="sat-afternoon">
                          Saturday Afternoon
                        </option>
                        <option value="sun-morning">Sunday Morning</option>
                        <option value="sun-afternoon">Sunday Afternoon</option>
                      </select>
                      <p class="text-xs text-gray-500 mt-1">
                        Hold Ctrl/Cmd to select multiple options
                      </p>
                    </div>
                    <div>
                      <label
                        for="startDate"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Preferred Start Date *</label
                      >
                      <input
                        type="date"
                        id="startDate"
                        name="startDate"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      />
                    </div>
                  </div>

                  <!-- Additional Information -->
                  <div class="space-y-4">
                    <h4 class="font-semibold text-gray-700 border-b pb-2">
                      Additional Information
                    </h4>
                    <div>
                      <label
                        for="message"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >Any Special Requirements or Questions?</label
                      >
                      <textarea
                        id="message"
                        name="message"
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all resize-none"
                        placeholder="Tell us about any specific goals, anxieties, medical conditions, or scheduling constraints..."
                      ></textarea>
                    </div>
                    <div>
                      <label
                        for="hearing"
                        class="block text-sm font-medium text-gray-700 mb-2"
                        >How did you hear about us?</label
                      >
                      <select
                        id="hearing"
                        name="hearing"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all"
                      >
                        <option value="">Select an option</option>
                        <option value="google">Google Search</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="friend">
                          Friend/Family Recommendation
                        </option>
                        <option value="previous-student">
                          Previous Student
                        </option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                  </div>

                  <!-- Account Creation (Optional) -->
                  <div class="space-y-4">
                    <div class="flex items-center justify-between border-b pb-2">
                      <h4 class="font-semibold text-gray-700">
                        Create an Account (Optional)
                      </h4>
                      <span
                        class="text-xs text-brand font-medium bg-brand/10 px-2 py-1 rounded-full"
                      >
                        Recommended
                      </span>
                    </div>
                    <p class="text-sm text-gray-600">
                      Create an account to track your bookings, view your progress, and manage your lessons. Your credentials will be emailed to you.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div>
                        <label
                          for="password"
                          class="block text-sm font-medium text-gray-700 mb-2"
                          >Password</label
                        >
                        <div class="relative">
                          <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                            placeholder="Create password"
                          />
                          <button
                            type="button"
                            id="togglePassword"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-brand transition-colors"
                          >
                            <svg
                              id="eyeIcon"
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
                      <div>
                        <label
                          for="confirmPassword"
                          class="block text-sm font-medium text-gray-700 mb-2"
                          >Confirm Password</label
                        >
                        <div class="relative">
                          <input
                            type="password"
                            id="confirmPassword"
                            name="confirmPassword"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-transparent transition-all pr-12"
                            placeholder="Confirm password"
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
                      </div>
                    </div>
                    <div id="passwordHelp" class="hidden">
                      <div class="p-3 bg-blue-50 rounded-lg border border-blue-200">
                        <p class="text-sm text-blue-800">
                          <strong>Password requirements:</strong> At least 8 characters, including one uppercase letter, one number, and one special character.
                        </p>
                      </div>
                    </div>
                  </div>

                  <!-- Terms and Consent -->
                  <div class="space-y-3">
                    <div class="flex items-start gap-3">
                      <input
                        type="checkbox"
                        id="terms"
                        name="terms"
                        required
                        class="mt-1 w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand"
                      />
                      <label for="terms" class="text-sm text-gray-600">
                        I agree to the
                        <a
                          href="terms.php"
                          class="text-brand hover:underline"
                          target="_blank"
                          >Terms & Conditions</a
                        >
                        and
                        <a
                          href="privacy.php"
                          class="text-brand hover:underline"
                          target="_blank"
                          >Privacy Policy</a
                        >. *
                      </label>
                    </div>
                    <div class="flex items-start gap-3">
                      <input
                        type="checkbox"
                        id="marketing"
                        name="marketing"
                        class="mt-1 w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand"
                      />
                      <label for="marketing" class="text-sm text-gray-600">
                        I'd like to receive helpful tips, updates, and special
                        offers via email.
                      </label>
                    </div>
                    <div class="flex items-start gap-3">
                      <input
                        type="checkbox"
                        id="sms"
                        name="sms"
                        class="mt-1 w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand"
                      />
                      <label for="sms" class="text-sm text-gray-600">
                        I'd like to receive lesson reminders and updates via
                        SMS.
                      </label>
                    </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="pt-4">
                    <button
                      type="submit"
                      class="w-full px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-lg text-lg"
                    >
                      Submit Booking Request
                    </button>
                    <p class="text-center text-xs text-gray-500 mt-3">
                      By submitting this form, you're requesting a booking. Our
                      team will contact you within 24 hours to confirm
                      availability.
                    </p>
                  </div>
                </form>
              </div>
            </div>

            <!-- Sidebar Information -->
            <div class="space-y-6">
              <!-- Why Choose Us -->
              <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  Why Book With Us?
                </h3>
                <ul class="space-y-3">
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
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                    <span class="text-sm text-gray-600"
                      >DVSA-approved instructors</span
                    >
                  </li>
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
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                    <span class="text-sm text-gray-600"
                      >98% first-time pass rate</span
                    >
                  </li>
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
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                    <span class="text-sm text-gray-600"
                      >Flexible scheduling</span
                    >
                  </li>
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
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                    <span class="text-sm text-gray-600"
                      >Modern dual-control vehicles</span
                    >
                  </li>
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
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                    <span class="text-sm text-gray-600"
                      >Free theory test support</span
                    >
                  </li>
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
                        d="M5 13l4 4L19 7"
                      />
                    </svg>
                    <span class="text-sm text-gray-600">Fully insured</span>
                  </li>
                </ul>
              </div>

              <!-- What Happens Next -->
              <div class="bg-brand text-white p-6 rounded-2xl shadow-md">
                <h3 class="text-xl font-bold mb-4">What Happens Next?</h3>
                <div class="space-y-4">
                  <div class="flex items-start gap-3">
                    <div
                      class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 font-bold"
                    >
                      1
                    </div>
                    <div>
                      <h4 class="font-semibold text-sm">Submit Form</h4>
                      <p class="text-xs text-white/80">
                        Complete the booking form above
                      </p>
                    </div>
                  </div>
                  <div class="flex items-start gap-3">
                    <div
                      class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 font-bold"
                    >
                      2
                    </div>
                    <div>
                      <h4 class="font-semibold text-sm">We Contact You</h4>
                      <p class="text-xs text-white/80">
                        We'll call/email within 24 hours
                      </p>
                    </div>
                  </div>
                  <div class="flex items-start gap-3">
                    <div
                      class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 font-bold"
                    >
                      3
                    </div>
                    <div>
                      <h4 class="font-semibold text-sm">Match Instructor</h4>
                      <p class="text-xs text-white/80">
                        We match you with the best instructor
                      </p>
                    </div>
                  </div>
                  <div class="flex items-start gap-3">
                    <div
                      class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 font-bold"
                    >
                      4
                    </div>
                    <div>
                      <h4 class="font-semibold text-sm">Start Learning</h4>
                      <p class="text-xs text-white/80">
                        Begin your first lesson!
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Quick Contact -->
              <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  Need Help Booking?
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                  Our team is here to help you choose the right package.
                </p>
                <div class="space-y-3">
                  <a
                    href="tel:01234567890"
                    class="flex items-center gap-3 text-brand font-semibold hover:underline"
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
                    01234 567 890
                  </a>
                  <a
                    href="mailto:info@beepbeepdriving.co.uk"
                    class="flex items-center gap-3 text-brand font-semibold hover:underline"
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
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                      />
                    </svg>
                    info@beepbeepdriving.co.uk
                  </a>
                </div>
              </div>

              <!-- Payment Methods -->
              <div class="bg-white p-6 rounded-2xl shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                  Payment Methods
                </h3>
                <div class="space-y-2 text-sm text-gray-600">
                  <div class="flex items-center gap-2">
                    <svg
                      class="w-4 h-4 text-green-600"
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
                    Credit/Debit Cards
                  </div>
                  <div class="flex items-center gap-2">
                    <svg
                      class="w-4 h-4 text-green-600"
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
                    PayPal
                  </div>
                  <div class="flex items-center gap-2">
                    <svg
                      class="w-4 h-4 text-green-600"
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
                    Bank Transfer
                  </div>
                  <div class="flex items-center gap-2">
                    <svg
                      class="w-4 h-4 text-green-600"
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
                    Cash (In Person)
                  </div>
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
                  Questions?
                </p>
                <h2 class="text-3xl font-bold text-white">
                  Need Help Choosing The Right Package?<br />Get in Touch!
                </h2>
              </div>
            </div>
            <div class="flex flex-wrap gap-4 lg:justify-end">
              <a
                href="contact.php"
                class="px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:shadow-xl"
              >
                Contact Us
              </a>
              <a
                href="tel:01234567890"
                class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-gray-900 transition-all"
              >
                Call Now
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <script>
      // Show/hide license number field based on selection
      document
        .getElementById("licenseStatus")
        .addEventListener("change", function () {
          const licenseNumberField =
            document.getElementById("licenseNumberField");
          if (this.value === "yes-have") {
            licenseNumberField.classList.remove("hidden");
          } else {
            licenseNumberField.classList.add("hidden");
          }
        });

      // Toggle password visibility
      const togglePassword = document.getElementById("togglePassword");
      const passwordInput = document.getElementById("password");
      const eyeIcon = document.getElementById("eyeIcon");

      if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener("click", () => {
          const type =
            passwordInput.getAttribute("type") === "password"
              ? "text"
              : "password";
          passwordInput.setAttribute("type", type);

          if (type === "text") {
            eyeIcon.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
          } else {
            eyeIcon.innerHTML = `
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

      // Password validation and form submission
      const form = document.querySelector("form");
      const passwordHelp = document.getElementById("passwordHelp");

      if (form && passwordInput && confirmPasswordInput) {
        form.addEventListener("submit", function (e) {
          const password = passwordInput.value;
          const confirmPassword = confirmPasswordInput.value;

          // Only validate if password field has a value (optional account creation)
          if (password || confirmPassword) {
            // Check password strength
            const hasMinLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

            if (
              !hasMinLength ||
              !hasUppercase ||
              !hasNumber ||
              !hasSpecial
            ) {
              e.preventDefault();
              passwordHelp.classList.remove("hidden");
              alert(
                "Password must be at least 8 characters and include an uppercase letter, a number, and a special character."
              );
              return;
            }

            // Check passwords match
            if (password !== confirmPassword) {
              e.preventDefault();
              alert("Passwords do not match. Please try again.");
              return;
            }

            passwordHelp.classList.add("hidden");
          }
        });

        // Show password help when user starts typing
        if (passwordInput) {
          passwordInput.addEventListener("focus", () => {
            passwordHelp.classList.remove("hidden");
          });
        }
      }
    </script>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
