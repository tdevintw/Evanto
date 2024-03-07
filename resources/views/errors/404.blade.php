<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evanto</title>
    <link rel="icon" type="image/x-icon"
        href="{{ asset('storage/images/ticket.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/404.css') }}">

</head>

<body class="bg-purple">
        
    <div class="stars">
        <div class="custom-navbar">
            <div class="brand-logo">
                <img src="http://salehriaz.com/404Page/img/logo.svg" width="80px">
            </div>
            <div class="navbar-links">
                <ul>e
                  <li><a href="{{route('home')}}" >Home</a></li>
                  <li><a href="{{route('profile.edit')}}" >Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="central-body">
            <img class="image-404" src="http://salehriaz.com/404Page/img/404.svg" width="300px">
            <a href="{{route('home')}}" class="btn-go-home">GO BACK HOME</a>
        </div>
        <div class="objects">
            <img class="object_rocket" src="http://salehriaz.com/404Page/img/rocket.svg" width="40px">
            <div class="earth-moon">
                <img class="object_earth" src="http://salehriaz.com/404Page/img/earth.svg" width="100px">
                <img class="object_moon" src="http://salehriaz.com/404Page/img/moon.svg" width="80px">
            </div>
            <div class="box_astronaut">
                <img class="object_astronaut" src="http://salehriaz.com/404Page/img/astronaut.svg" width="140px">
            </div>
        </div>
        <div class="glowing_stars">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>

        </div>

    </div>

    </body>
</html>