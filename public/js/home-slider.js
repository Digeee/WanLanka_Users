document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.ci');
    const inputs = document.querySelectorAll('.c input[name="a"]');
    let currentSlide = 0;
    const totalSlides = slides.length;

    // Function to show the next slide
    const showSlide = (index) => {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
        inputs[index].checked = true;
    };

    // Auto-slide every 5 seconds
    setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }, 5000);

    // Manual navigation via radio inputs
    inputs.forEach((input, index) => {
        input.addEventListener('change', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Show the first slide initially
    showSlide(currentSlide);
});
