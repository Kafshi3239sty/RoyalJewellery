<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{URL::to('img/RoyalJewellery.png')}}">

    <title>Royal Jewellery</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{URL::to('css/app.css')}}">
    <script src="https://kit.fontawesome.com/e4f36ce664.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body class="antialiased">
    <!-- Header -->
    <header class="header_section">
        <div class="header_container">
            <div class="header_items">
                <div class="logo">
                    <img src="{{URL::to('img/RoyalJewellery.png')}}" alt="Business Logo" class="photo">
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar Toggle Button -->
    <button class="sidebarbtn btn btn-light btn-m" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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

    <main class="main">
        <section class="addons">
            <div id="filter">
                Filter
                <i class="fa-solid fa-filter"></i>
            </div>
            <form class="searchform" role="search">
                <input class="searchbox" type="search" placeholder="Search" aria-label="Search">
                <button class="searchbtn" type="submit">Search</button>
            </form>
            <div class="sort">
                <button class="btn" type="button">
                    Sort
                    <i class="fa-solid fa-sort"></i>
                </button>
            </div>
        </section>

        <section class="addons">
            <div class="add-item">
                <button class="btn btn-secondary" type="submit">
                    <a href="/admin/your_products/add_product" class="add-ring">
                        Add new ring
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </button>
            </div>
        </section>

        <section class="ringcollections">
            <h1 class="section-title">Your Ring Collections</h1>
            <div class="ring-grid">
                <!-- Repeat this block for each of the 40 items -->
                @foreach($rings as $ring)
                <a href="{{URL::to('/admin/your_products/'.$ring->id)}}" class="add-ring">
                    <div class="ringitem">
                        <!-- Image -->
                        <img src="{{ Storage::url($ring->image_url) }}" alt="{{ $ring->name }}" class="ringimage">

                        <!-- Ring Name -->
                        <div class="ringdesc">{{ $ring->name }}</div>

                        <!-- Material -->
                        <div class="ringmaterial">{{ $ring->material }}</div>

                        <!-- Price -->
                        <div class="ringprice">Ksh{{ $ring->price }}</div>

                        <!-- Add to Cart Icon -->
                        <div class="cart-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </section>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </main>

</body>

</html>