document.addEventListener("DOMContentLoaded", function () {
    const feats = document.querySelectorAll(".feats");
    let currentIndex = 0;
    let autoSwitch;

    function showSlide(index) {
        feats.forEach((feat, i) => {
            feat.classList.toggle("active", i === index);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % feats.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + feats.length) % feats.length;
        showSlide(currentIndex);
    }

    function startAutoSwitch() {
        autoSwitch = setInterval(nextSlide, 5000); // Change every 5 seconds
    }

    function stopAutoSwitch() {
        clearInterval(autoSwitch);
    }

    // Start automatic switching
    startAutoSwitch();

    // Stop auto switch on hover
    feats.forEach(feat => {
        feat.addEventListener("mouseenter", stopAutoSwitch);
        feat.addEventListener("mouseleave", startAutoSwitch);
    });

    // Manual navigation buttons
    document.getElementById("nextBtn").addEventListener("click", nextSlide);
    document.getElementById("prevBtn").addEventListener("click", prevSlide);
});


document.addEventListener("DOMContentLoaded", function () {
    const bestItems = document.querySelectorAll(".best");
    let currentIndex = 1;

    function updateCarousel() {
        bestItems.forEach((item, index) => {
            if (index === currentIndex) {
                item.classList.add("active");
            } else {
                item.classList.remove("active");
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % bestItems.length;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + bestItems.length) % bestItems.length;
        updateCarousel();
    }

    document.getElementById("next").addEventListener("click", nextSlide);
    document.getElementById("prev").addEventListener("click", prevSlide);

    setInterval(nextSlide, 5000); // Auto-slide every 5 seconds
});

