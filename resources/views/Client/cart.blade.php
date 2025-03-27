<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ URL::to('img/RoyalJewellery.png') }}">

    <title>Royal Jewellery - Your Shopping Cart</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
    <script src="https://kit.fontawesome.com/e4f36ce664.js" crossorigin="anonymous"></script>
    <script src="{{URL::to('js/app.js')}}"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="antialiased">
    <!-- Header -->
    <header class="header_section">
        <div class="header_container">
            <div class="header_items">
                <div class="logo">
                    <img src="{{ URL::to('img/RoyalJewellery.png') }}" alt="Business Logo" class="photo">
                </div>
                <div class="right-items">
                    <div class="cartheader" id="cartIcon" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span id="cartCount" class="cart-badge">0</span>
                    </div>
                    <div class="profile dropdown">
                        
                        <i class="fa-solid fa-user"></i>
                        <div class="dropdown-menu">
                            <a href="/profile">Profile</a>
                            <a href="/settings">Settings</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="mt-3">
        <div class="container-fluid">
            <div class="row gx-4">
                <div class="col">
                    <div id="shopping-list">
                        <h3>Shopping Bag</h3>
                        <ul id="shopping-list-items" class="list-group"></ul>
                    </div>
                </div>
                <div class="col-5">
                    <div id="shopping-summary">
                        <h3>You have 1 item in your Shopping Bag</h3>
                        <ul id="shopping-list-items" class="list-group list-group-flush">
                            <li class="list-group-item">Shipping</li>
                            <li class="list-group-item">SubTotal</li>
                            <li class="list-group-item">Total</li>
                        </ul>
                        <div class="mt-3">
                            <button class="btn btn-primary w-100 mt-3" onclick="checkout()">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            loadCartItems();
        });

        function loadCartItems() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let shoppingList = document.getElementById("shopping-list-items");

            shoppingList.innerHTML = ""; // Clear previous list

            if (cart.length === 0) {
                shoppingList.innerHTML = "<p class='text-muted'>Your cart is empty.</p>";
                return;
            }

            cart.forEach((item, index) => {
                shoppingList.innerHTML += `
            <li class="list-group-item d-flex align-items-center gap-3 p-3">
                <img src="${item.imageUrl}" alt="${item.name}" class="cart-item-image w-25 h-25">
                <div>
                    <p class="m-0"><strong>${item.name}</strong></p>
                    <p class="text-muted">Ksh ${item.price} x ${item.quantity}</p>
                </div>
                <div class="input-group ms-auto">
                    <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(${index}, -1)">-</button>
                    <input type="text" class="form-control text-center" value="${item.quantity}" disabled style="width: 40px;">
                    <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(${index}, 1)">+</button>
                </div>
            </li>
        `;
            });
        }


        function updateQuantity(index, change) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart[index].quantity += change;

            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            loadCartItems();
        }
    </script>



</body>

</html>