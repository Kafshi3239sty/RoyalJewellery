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

document.addEventListener("DOMContentLoaded", function () {
    let quantityInput = document.getElementById("quantity");
    let increaseBtn = document.getElementById("increaseBtn");
    let decreaseBtn = document.getElementById("decreaseBtn");

    // Function to increase quantity
    increaseBtn.addEventListener("click", function () {
        let currentValue = parseInt(quantityInput.value) || 0;
        quantityInput.value = currentValue + 1;
    });

    // Function to decrease quantity (preventing negative values)
    decreaseBtn.addEventListener("click", function () {
        let currentValue = parseInt(quantityInput.value) || 0;
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });
});





function checkSize() {
    let size = document.getElementById("ringSize").value;
    let ringId = document.getElementById("ringId").value; // Ensure this exists

    fetch(`/check-size/${ringId}/${size}`)
        .then(response => response.json())
        .then(data => {
            console.log("API Response:", data);
            let messageEl = document.getElementById("sizeMessage");
            let addToCartButton = document.getElementById("addToCartButton");

            if (data.available) {
                messageEl.innerHTML = `<span class="text-success">Size available!</span>`;
                document.getElementById("ringVariantId").value = data.variant_id;
                document.getElementById("ringPrice").value = data.price;
                // Enable the Add to Cart button
                addToCartButton.disabled = false;
                addToCartButton.classList.remove("disabled"); // Remove disabled styles if any
            } else {
                messageEl.innerHTML = `<span class="text-danger">Size not available.</span>`;
                // Disable the Add to Cart button
                addToCartButton.disabled = true;
                addToCartButton.classList.add("disabled");
            }
        })
        .catch(error => console.error("Error:", error));
}

