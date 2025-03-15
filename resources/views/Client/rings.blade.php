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
                <div class="cart">
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
            <div class="ringitem">

                <!-- Ring Name -->
                <div class="ringdesc">{{ $ring->rings()->price  }}</div>
                <i class="fa-solid fa-cart-shopping"></i>
                <!-- Price -->
                <div class="ringprice">Ksh{{ $ring->rings()->price }}</div>
            </div>

            <div class="ringitem">
                <img src="{{URL::to('img/b1photo.jpg')}}" alt="Diamond Wedding Band" class="ringimage">
                <div class="ringdesc">Diamond Wedding Band</div>
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="ringprice">$200.00</div>
            </div>
            <div class="ringitem">
                <img src="{{URL::to('img/f1photo.jpg')}}" alt="Gold Filled Ring" class="ringimage">
                <div class="ringdesc">Gold Filled with Zircon Crystals</div>
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="ringprice">$150.00</div>
            </div>

            <div class="ringitem">
                <img src="{{URL::to('img/b1photo.jpg')}}" alt="Diamond Wedding Band" class="ringimage">
                <div class="ringdesc">Diamond Wedding Band</div>
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="ringprice">$200.00</div>
            </div>
            <div class="ringitem">
                <img src="{{URL::to('img/f1photo.jpg')}}" alt="Gold Filled Ring" class="ringimage">
                <div class="ringdesc">Gold Filled with Zircon Crystals</div>
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="ringprice">$150.00</div>
            </div>

            <div class="ringitem">
                <img src="{{URL::to('img/b1photo.jpg')}}" alt="Diamond Wedding Band" class="ringimage">
                <div class="ringdesc">Diamond Wedding Band</div>
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="ringprice">$200.00</div>
            </div>
            <!-- Add more ring items as needed (up to 40) -->
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

</body>

</html>