<?php
$pageTitle = "About Us";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-r from-dark to-dark-card">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">About Beep Beep Driving School</h1>
            <p class="text-xl text-gray-400">Your trusted partner in learning to drive safely and confidently</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-20 bg-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            <div>
                <img src="https://images.unsplash.com/photo-1580273916550-e323be2ed5fa?w=800&q=80" alt="Driving Instructor" 
                     class="rounded-2xl shadow-2xl w-full">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-white mb-6">Our Story</h2>
                <p class="text-gray-400 mb-4 leading-relaxed">
                    Founded in 2016, Beep Beep Driving School has been providing professional driving instruction across the UK for over 10 years. 
                    We're passionate about creating safe, confident drivers through personalized, patient instruction.
                </p>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Our team of DVSA-certified instructors are among the best in the business, with extensive experience 
                    helping students of all ages and abilities achieve their goal of passing their driving test.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <div class="text-3xl font-bold text-brand mb-2">500+</div>
                        <p class="text-gray-400 text-sm">Students Trained</p>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-brand mb-2">95%</div>
                        <p class="text-gray-400 text-sm">Pass Rate</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-white text-center mb-12">Our Core Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-dark-card p-8 rounded-2xl border border-gray-800">
                    <div class="w-14 h-14 bg-brand/20 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Safety First</h3>
                    <p class="text-gray-400">We prioritize safety in every lesson, ensuring you develop lifelong safe driving habits.</p>
                </div>

                <div class="bg-dark-card p-8 rounded-2xl border border-gray-800">
                    <div class="w-14 h-14 bg-brand/20 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Patient Instruction</h3>
                    <p class="text-gray-400">Our instructors are known for their patience and supportive teaching approach.</p>
                </div>

                <div class="bg-dark-card p-8 rounded-2xl border border-gray-800">
                    <div class="w-14 h-14 bg-brand/20 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Quality Guaranteed</h3>
                    <p class="text-gray-400">DVSA-approved training with certified instructors committed to your success.</p>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div>
            <h2 class="text-3xl font-bold text-white text-center mb-12">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Instructor 1 -->
                <div class="bg-dark-card rounded-2xl overflow-hidden border border-gray-800">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80" alt="Instructor" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">John Smith</h3>
                        <p class="text-brand text-sm mb-3">Senior Instructor</p>
                        <p class="text-gray-400 text-sm">15 years of experience helping students become confident drivers.</p>
                    </div>
                </div>

                <!-- Instructor 2 -->
                <div class="bg-dark-card rounded-2xl overflow-hidden border border-gray-800">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80" alt="Instructor" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">Sarah Johnson</h3>
                        <p class="text-brand text-sm mb-3">Lead Instructor</p>
                        <p class="text-gray-400 text-sm">Specializes in nervous drivers and has a 98% pass rate.</p>
                    </div>
                </div>

                <!-- Instructor 3 -->
                <div class="bg-dark-card rounded-2xl overflow-hidden border border-gray-800">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&q=80" alt="Instructor" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">Mike Williams</h3>
                        <p class="text-brand text-sm mb-3">Driving Instructor</p>
                        <p class="text-gray-400 text-sm">Expert in defensive driving and motorway training.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
