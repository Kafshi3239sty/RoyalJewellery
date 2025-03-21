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
                <div class="profile dropdown">
                    <i class="fa-solid fa-user"></i>
                    <div class="dropdown-menu">
                        <a href="/profile">Profile</a>
                        <a href="/settings">Settings</a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>

            </div>

        </div>
        <div class="navigation">
            <a href="" class="home">
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
    <section class="hero">
        <div class="container">
            <h1>Discover Timeless Elegance</h1>
            <p>We bring you exclusive handcrafted rings for every occasion.</p>
            <div class="cta_shop"><a href="" class="shop">Shop Now</a></div>
        </div>
    </section>
    <div class="featured">
        <div class="ftitle">
            <h1>Featured Products</h1>
        </div>
        <div class="feats-container">
            <div class="feats active" style="background-image: url('/img/fphoto.jpg')">
                <h2>Engagement Rings</h2>
                <p class="desc">Celebrate your love with exquisite engagement rings, crafted for your perfect moment.</p>
            </div>

            <div class="feats" style="background-image: url('/img/photo1.jpg')">
                <h2>Wedding Rings</h2>
                <p class="desc">Timeless wedding rings that symbolize your everlasting commitment.</p>
            </div>

            <div class="feats" style="background-image: url('/img/f1photo.jpg')">
                <h2>Anniversary Rings</h2>
                <p class="desc">Mark your milestones with elegant anniversary rings, a tribute to your journey together.</p>
            </div>

            <div class="feats" style="background-image: url('/img/f1photo.jpg')">
                <h2>Custom Rings</h2>
                <p class="desc">Design your dream ring with our custom jewelry experts, tailored to your unique style.</p>
            </div>
        </div>
        <button id="prevBtn"><i class="fa-solid fa-angle-left"></i></button>
        <button id="nextBtn"><i class="fa-solid fa-angle-right"></i></button>
    </div>


    <div class="best_sellers">
        <div class="btitle">
            <h1>Featured Products</h1>
        </div>
        <div class="best-container">
            <div class="best" style="background-image: url('/img/b1photo.jpg')" data-index="0">
                <h2>Gold Filled with Zircon Crystals</h2>
                <p class="desc">Perfect as a gift or engagement ring</p>
            </div>

            <div class="best active" style="background-image: url('/img/b2photo.jpg')" data-index="1">
                <h2>Diamond Wedding Band</h2>
                <p class="desc">Timeless elegance for your special day</p>
            </div>

            <div class="best" style="background-image: url('/img/b3photo.jpg')" data-index="2">
                <h2>Platinum Engagement Ring</h2>
                <p class="desc">A symbol of everlasting love</p>
            </div>

            <div class="best" style="background-image: url('/img/b4photo.jpg')" data-index="3">
                <h2>18K Gold Classic Ring</h2>
                <p class="desc">Perfect blend of luxury and tradition</p>
            </div>
        </div>
        <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
        <button id="next"><i class="fa-solid fa-angle-right"></i></button>
    </div>


</body>

</html>