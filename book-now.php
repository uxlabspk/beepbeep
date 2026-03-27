<?php
$pageTitle = "Book Now";
include 'includes/header.php';
?>

<!-- Placeholder Page -->
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-2xl mx-auto text-center py-20">
        <div class="w-24 h-24 mx-auto mb-8 bg-brand/20 rounded-full flex items-center justify-center">
            <svg class="w-12 h-12 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h1 class="text-4xl font-bold text-white mb-6">Book Your Lesson</h1>
        <p class="text-xl text-gray-400 mb-8">Our online booking system is coming soon! In the meantime, please call or email us to schedule your first lesson.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
            <a href="tel:01234567890" class="px-8 py-4 bg-brand hover:bg-brand-dark text-white font-semibold rounded-lg transition-all shadow-lg hover:-translate-y-0.5">📞 Call: 01234 567 890</a>
            <a href="mailto:info@beepbeepdriving.co.uk" class="px-8 py-4 bg-dark-card hover:bg-dark text-white font-semibold rounded-lg transition-all border border-gray-700 hover:-translate-y-0.5">✉️ Email Us</a>
        </div>
        <div class="mt-12 pt-8 border-t border-gray-800">
            <p class="text-gray-400 mb-4">Opening Hours:</p>
            <p class="text-gray-300">Monday - Friday: 8:00 AM - 8:00 PM<br>Saturday: 9:00 AM - 6:00 PM<br>Sunday: 10:00 AM - 4:00 PM</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
