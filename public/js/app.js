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


document.addEventListener("DOMContentLoaded", function () {
    updateCartUI();
});

// Function to Add Item to Cart
function addToCart(id, name, price, imageUrl) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let existingItem = cart.find(item => item.id === id);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ id, name, price, imageUrl, quantity: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartUI();
}


// Function to Update Cart UI
function updateCartUI() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartCount = document.getElementById("cartCount");
    let cartItemsList = document.getElementById("cartItemsList");

    cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);
    cartItemsList.innerHTML = "";

    cart.forEach((item, index) => {
        cartItemsList.innerHTML += `
            <li class="list-group-item d-flex align-items-center gap-3 p-3">
            <img src="${item.imageUrl}" alt="${item.name}" class="cart-item-image">
                <div>
                    <p class="m-0">${item.name}</p>
                    <p class="text-muted">Ksh ${item.price}</p>
                </div>
                <div class="input-group">
                    <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(${index}, -1)">-</button>
                    <input type="text" class="form-control text-center" value="${item.quantity}" disabled style="width: 40px;">
                    <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(${index}, 1)">+</button>
                </div>
            </li>
        `;
    });
}

// Function to Update Item Quantity
function updateQuantity(index, change) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart[index].quantity += change;

    if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartUI();
}
