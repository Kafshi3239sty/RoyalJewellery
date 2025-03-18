<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For PNG file -->
    <link rel="icon" type="image/png" href="{{URL::to('img/RoyalJewellery.png')}}">

    <title>Royal Jewellery</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{URL::to('css/app.css')}}">


    <script src="https://kit.fontawesome.com/e4f36ce664.js" crossorigin="anonymous"></script>
    <script src="{{URL::to('js/app.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body class="antialiased">
    <header class="header_section">
        <div class="header_container">
            <div class="header_items">
                <div class="logo">
                    <img src="{{URL::to('img/RoyalJewellery.png')}}" alt="Business Logo" class="photo">
                </div>
                <div class="cartheader">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

        </div>
        <div class="navigation">
            <a href="/" class="home">
                Home
            </a>
            <a href="/rings" class="rings">
                Rings
            </a>
            <a href="" class="bestsell">
                Best Sellers
            </a>
            <a href="" class="collect">
                Featured Collections
            </a>
            <a href="" class="blog">
                Blog
            </a>
        </div>
    </header>

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

    <section class="ringcollections">
        <h1 class="section-title">Our Exclusive Ring Collection</h1>
        <div class="ring-grid">
            <!-- Repeat this block for each of the 40 items -->
            @foreach($rings as $ring)
            <a href="{{URL::to('/rings/'.$ring->id)}}" class="add-ring">
                <div class="ringitem">
                    <!-- Image -->
                    <img src="{{ Storage::url($ring->image_url) }}" alt="{{ $ring->name }}" class="ringimage">
                    <!-- Ring Name -->
                    <div class="ringdesc">{{ $ring->name }}</div>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <!-- Price -->
                    <div class="ringprice">Ksh{{ $ring->price }}</div>
                </div>
                <!-- Add more ring items as needed (up to 40) -->
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
</body>

</html>