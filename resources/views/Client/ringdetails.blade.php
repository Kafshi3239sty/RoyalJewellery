<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ URL::to('img/RoyalJewellery.png') }}">

    <title>Royal Jewellery - Add Ring</title>

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

    <!-- Sidebar Toggle Button -->
    <button class="sidebarbtn btn btn-light btn-m" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" id="offcanvasSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <a href="/admin/dashboard" class="dashboard mb-3">
                <i class="fa-solid fa-house"></i>
                <p class="menu-text">Dashboard</p>
            </a>
            <a href="/admin/your_products" class="collections mb-3">
                <i class="fa-solid fa-ring"></i>
                <p class="menu-text">Your Products</p>
            </a>
            <a href="/admin/sign_out" class="sign-out">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p class="menu-text">Sign Out</p>
            </a>
        </div>
    </div>

    <main class="main p-4">
        <!-- Back Button -->
        <section class="addons mb-4">
            <button class="btn btn-secondary">
                <a href="/rings" class="text-white text-decoration-none">
                    <i class="fa-solid fa-arrow-left-long"></i> Back
                </a>
            </button>
        </section>
        <section class="productDescription">
            <div class="prodimg">
                <img src="{{ Storage::url($ring->image_url) }}" alt="{{ $ring->name }}" class="ringimage">
            </div>
            <div class="prodinfo">
                <div class="prodname">
                    <p>{{ $ring->name }}</p>
                </div>
                <div class="proddet">
                    <p>{{ $ring->description }}</p>
                </div>
                <div class="prodprice">Ksh{{ $ring->price }}</div>
                <img src="{{ URL::to('img/gold-color.jpeg') }}" alt="Material color" class="material-color">
                <div class="ringmat">Material: {{ $ring->material }}</div>

                <div class="ringsize">
                    <div class="rs">
                        <p>Ring Size (mm): </p>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control text-center" id="ringSize" name="size" placeholder="Enter size (e.g., 7)" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="checkSize()">Check Availability</button>
                    </div>
                    <p id="sizeMessage" class="text-danger mt-2"></p>
                </div>

                <div class="addcart">
                    <form id="addToCartForm" action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="ringId" value="{{ $ring->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="price" id="ringPrice">

                        <button type="submit" class="btn btn-secondary cart " id="addToCartButton">
                            Add to Cart
                        </button>

                    </form>
                </div>

                <button class="btn collapsebtn" type="button" data-bs-toggle="collapse" data-bs-target="#productdescCollapse" aria-expanded="false" aria-controls="collapseExample">
                    <h4>PRODUCT DESCRIPTION</h4><i class="fa-solid fa-angle-down"></i>
                </button>
                <div class="collapse" id="productdescCollapse">
                    <div class="card card-body">
                        {{ $ring->description }}
                    </div>
                </div>
                </p>
            </div>
        </section>
    </main>
    <footer class="logfooter">
        <div class="footer-content">
            <div class="footer-left">
                <p>&copy; 2025 Royal Jewellery. All rights reserved.</p>
            </div>
            <div class="footer-center">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Us</a>
            </div>
            <div class="footer-right">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <div class="offcanvas-body">
        <ul id="cartItemsList" class="list-group">
            @foreach ($orders as $order)
            @foreach ($order->orderdetails as $item)
            <li class="list-group-item d-flex align-items-center gap-3 p-3">
                <img src="{{ Storage::url($item->variants->rings->image_url) }}" class="cart-item-image w-25 h-25">
                <div>
                    <p><strong>{{ $item->variants->rings->name }}</strong></p>
                    <p class="text-muted">Size: {{ $item->variants->size }}</p>
                    <p class="text-muted">Ksh {{ $item->price }} x {{ $item->quantity }}</p>
                </div>
            </li>
            @endforeach
            @endforeach
        </ul>
    </div>


</body>

</html>