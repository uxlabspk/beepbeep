<?php
$pageTitle = "Professional Driving Lessons UK";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?w=1600&q=80" alt="Driving"
            class="w-full h-full object-cover opacity-40">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-dark via-dark/80 to-transparent"></div>
    <div class="container mx-auto px-4 relative z-10 py-24">
        <div class="max-w-xl">
            <p class="text-brand font-semibold text-sm uppercase tracking-widest mb-4 flex items-center gap-2">
                <span class="w-8 h-0.5 bg-brand inline-block"></span>
                Start Your Driving Skills
            </p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                Learn to Drive<br>with <span class="text-brand">Confidence</span>
            </h1>
            <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-8">
                Professional driving lessons across the UK with DVSA-certified instructors. Your journey to
                passing your driving test starts here!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <a href="book-now.php"
                    class="px-8 py-4 bg-brand text-white font-semibold rounded-lg hover:bg-brand-dark transition-all hover:-translate-y-0.5 hover:shadow-xl text-lg text-center">
                    Book Your First Lesson
                </a>
                <a href="lessons.php"
                    class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-gray-900 transition-all text-lg text-center">
                    View Packages
                </a>
            </div>
            <div class="flex flex-wrap gap-4 sm:gap-6">
                <div class="flex items-center gap-2 text-gray-300 text-sm font-medium">
                    <svg class="w-5 h-5 text-brand" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>DVSA Approved</span>
                </div>
                <div class="flex items-center gap-2 text-gray-300 text-sm font-medium">
                    <svg class="w-5 h-5 text-brand" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>5-Star Rated</span>
                </div>
                <div class="flex items-center gap-2 text-gray-300 text-sm font-medium">
                    <svg class="w-5 h-5 text-brand" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Flexible Hours</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-dark-card">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-dark p-6 rounded-xl text-center">
                <div class="w-16 h-16 bg-brand/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Flexible Timing</h3>
                <p class="text-gray-400 text-sm">Lessons available 7 days a week, including evenings and weekends</p>
            </div>
            
            <div class="bg-dark p-6 rounded-xl text-center">
                <div class="w-16 h-16 bg-brand/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">DVSA Approved</h3>
                <p class="text-gray-400 text-sm">All instructors are DVSA certified and highly experienced</p>
            </div>
            
            <div class="bg-dark p-6 rounded-xl text-center">
                <div class="w-16 h-16 bg-brand/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Affordable Pricing</h3>
                <p class="text-gray-400 text-sm">Competitive rates with package deals and discounts</p>
            </div>
            
            <div class="bg-dark p-6 rounded-xl text-center">
                <div class="w-16 h-16 bg-brand/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Friendly Support</h3>
                <p class="text-gray-400 text-sm">Dedicated support team to help you throughout your journey</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-dark">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Driving Lesson Packages</h2>
            <p class="text-gray-400 text-lg">Choose the perfect learning package that suits your needs and budget</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Package 1 -->
            <div class="bg-dark-card rounded-2xl p-8 border border-gray-800 hover:border-brand transition-all hover:-translate-y-2">
                <div class="text-center mb-6">
                    <h3 class="text-xl font-bold text-white mb-2">Beginner Package</h3>
                    <p class="text-gray-400 text-sm mb-4">Perfect for first-time drivers</p>
                    <div class="text-4xl font-bold text-brand">£350</div>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>10 Hours of Tuition</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Free Theory Test Support</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Progress Tracking</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Flexible Scheduling</span>
                    </li>
                </ul>
                <a href="book-now.php" class="block w-full py-3 bg-brand hover:bg-brand-dark text-white font-semibold rounded-lg text-center transition-colors">Book Now</a>
            </div>

            <!-- Package 2 -->
            <div class="bg-dark-card rounded-2xl p-8 border-2 border-brand relative">
                <div class="absolute top-0 right-0 bg-brand text-white px-4 py-1 rounded-bl-lg rounded-tr-lg text-sm font-semibold">Popular</div>
                <div class="text-center mb-6">
                    <h3 class="text-xl font-bold text-white mb-2">Standard Package</h3>
                    <p class="text-gray-400 text-sm mb-4">Most popular choice</p>
                    <div class="text-4xl font-bold text-brand">£630</div>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>20 Hours of Tuition</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Mock Theory Tests</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Highway Code Training</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Priority Booking</span>
                    </li>
                </ul>
                <a href="book-now.php" class="block w-full py-3 bg-brand hover:bg-brand-dark text-white font-semibold rounded-lg text-center transition-colors">Book Now</a>
            </div>

            <!-- Package 3 -->
            <div class="bg-dark-card rounded-2xl p-8 border border-gray-800 hover:border-brand transition-all hover:-translate-y-2">
                <div class="text-center mb-6">
                    <h3 class="text-xl font-bold text-white mb-2">Advanced Package</h3>
                    <p class="text-gray-400 text-sm mb-4">Complete driver training</p>
                    <div class="text-4xl font-bold text-brand">£900</div>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>30 Hours of Tuition</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Practical Test Included</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Night Driving Session</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Motorway Training</span>
                    </li>
                </ul>
                <a href="book-now.php" class="block w-full py-3 bg-brand hover:bg-brand-dark text-white font-semibold rounded-lg text-center transition-colors">Book Now</a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-20 bg-dark-card">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-brand mb-2 stat-number" data-target="500">0</div>
                <p class="text-gray-400">Students Trained</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-brand mb-2 stat-number" data-target="95">0</div>
                <p class="text-gray-400">Pass Rate (%)</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-brand mb-2 stat-number" data-target="15">0</div>
                <p class="text-gray-400">Expert Instructors</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-brand mb-2 stat-number" data-target="10">0</div>
                <p class="text-gray-400">Years Experience</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-brand">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Start Your Driving Journey?</h2>
        <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">Book your first lesson today and take the first step towards getting your full driving license.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="book-now.php" class="px-8 py-4 bg-white text-brand font-semibold rounded-lg hover:bg-gray-100 transition-all hover:-translate-y-0.5 shadow-lg">Book a Lesson</a>
            <a href="contact.php" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-brand transition-all hover:-translate-y-0.5">Contact Us</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
