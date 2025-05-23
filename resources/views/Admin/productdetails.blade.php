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
                <a href="/admin/your_products" class="text-white text-decoration-none">
                    <i class="fa-solid fa-arrow-left-long"></i> Back
                </a>
            </button>
        </section>
        <section class="productDescription">
            <div class="prodimg">
                <img src="{{ Storage::url($ring->image_url) }}" alt="{{ $ring->name }}" class="ringimage">
            </div>
            <div class="prodinfo">
                <div class="prodname"><p>{{ $ring->name }}</p></div>
                <div class="proddet"><p>{{ $ring->description }}</p></div>
                <form action="{{ route('addpd', ['id' => $ring->id]) }}" method="POST" enctype="multipart/form-data" class="">
                @csrf

                <!-- Ring Size -->
                <div class="mb-3">
                    <label for="name" class="form-label">Set Ring size</label>
                    <input type="number" class="form-control" id="size" name="size" required>
                </div>

                <!-- Stock Quantity -->
                <div class="mb-3">
                    <label for="price" class="form-label">Stock Quantity</label>
                    <input type="number" class="form-control" id="stock" name="stock" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Add Ring Variations</button>
            </form>
            </div>
        </section>
    </main>
</body>

</html>