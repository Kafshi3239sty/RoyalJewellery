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
    <div class="logo">
        <img src="{{URL::to('img/RoyalJewellery.png')}}" alt="Business Logo" class="photo">
    </div>
    <section id="login">
        <div id="login-form">
            <div id="credentials">
                <div id="email-section">
                    <p id="Email-text">Email</p>
                    <input type="email" name="Email" id="Email">
                </div>
                <div id="password-section">
                    <p id="Password-text">Password</p>
                    <input type="password" name="password" id="Password">
                </div>
                <button type="button" class="btn btn-secondary btn-sm">Sign in</button>
            </div>
        </div>
    </section>
</body>

</html>