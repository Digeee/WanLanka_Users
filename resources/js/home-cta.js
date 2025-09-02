function redirectToProvinces() {
    // Scroll to the provinces section if it's on the same page
    const provincesSection = document.querySelector('.provinces-section');
    if (provincesSection) {
        provincesSection.scrollIntoView({ behavior: 'smooth' });
    } else {
        // If provinces section doesn't exist, redirect to a provinces page
        // You'll need to create this route in your web.php file
        window.location.href = "{{ url('/provinces') }}";
    }
}

// Add event listener for the button
document.addEventListener('DOMContentLoaded', function() {
    const ctaButton = document.querySelector('.cta-button');
    if (ctaButton) {
        ctaButton.addEventListener('click', redirectToProvinces);
    }
});