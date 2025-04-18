document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('#productCarousel .carousel-inner-custom'); // The inner wrapper
    const items = document.querySelectorAll('#productCarousel .carousel-item-custom'); // The carousel items
    const prevButton = document.getElementById('customPrev'); // Previous button
    const nextButton = document.getElementById('customNext'); // Next button

    let currentIndex = 0; // The current starting index
    const visibleItems = 5; // Number of visible items in the carousel
    const totalItems = items.length; // Total number of items
    const itemWidth = items[0].offsetWidth; // The width of a single item

    // Update the carousel's position
    function updateCarousel() {
        const offset = -currentIndex * itemWidth; // Calculate the offset
        carousel.style.transform = `translateX(${offset}px)`; // Slide the carousel
    }

    // Event listeners for navigation buttons
    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    nextButton.addEventListener('click', () => {
        if (currentIndex < totalItems - visibleItems) {
            currentIndex++;
            updateCarousel();
        }
    });

    // Initialize the carousel
    updateCarousel();
});