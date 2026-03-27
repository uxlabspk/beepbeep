<?php
$pageTitle = "Page Not Found";
include 'includes/header.php';
?>

<!-- 404 Page Content -->
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-2xl mx-auto text-center">
        <!-- 404 Icon -->
        <div class="w-32 h-32 mx-auto mb-8 bg-brand/20 rounded-full flex items-center justify-center">
            <svg class="w-16 h-16 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <!-- Heading -->
        <h1 class="text-6xl md:text-8xl font-bold text-white mb-4">404</h1>
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-6">Page Not Found</h2>
        
        <!-- Description -->
        <p class="text-gray-400 text-lg mb-8">
            Oops! The page you're looking for doesn't exist or has been moved.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-wrap gap-4 justify-center mt-8">
            <a href="index.php" class="px-8 py-4 bg-brand hover:bg-brand-dark text-white font-semibold rounded-lg transition-colors shadow-lg hover:-translate-y-0.5">
                ← Back to Home
            </a>
            <a href="contact.php" class="px-8 py-4 bg-dark-card hover:bg-dark text-white font-semibold rounded-lg transition-colors shadow-lg border border-gray-700 hover:-translate-y-0.5">
                Contact Us
            </a>
        </div>

        <!-- Quick Links -->
        <div class="mt-12 pt-8 border-t border-gray-800">
            <p class="text-gray-400 mb-4">You might be looking for:</p>
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="lessons.php" class="text-gray-300 hover:text-brand transition-colors">Driving Lessons</a>
                <span class="text-gray-600">•</span>
                <a href="prices.php" class="text-gray-300 hover:text-brand transition-colors">Pricing</a>
                <span class="text-gray-600">•</span>
                <a href="about.php" class="text-gray-300 hover:text-brand transition-colors">About Us</a>
                <span class="text-gray-600">•</span>
                <a href="book-now.php" class="text-gray-300 hover:text-brand transition-colors">Book Now</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
