// Customer Reviews JavaScript

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('review-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const review = document.getElementById('review').value;

        if (name && review) {
            alert('Thank you for your review!');
            form.reset();
        } else {
            alert('Please fill in all fields.');
        }
    });
});