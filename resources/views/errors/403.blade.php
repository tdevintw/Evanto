<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evanto</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/ticket.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/403.css') }}">

</head>

<body>

    <div class="maincontainer">
        <div class="bat">
            <img class="wing leftwing" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-wing.png">
            <img class="body" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-body.png"
                alt="bat">
            <img class="wing rightwing" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-wing.png">
        </div>
        <div class="bat">
            <img class="wing leftwing" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-wing.png">
            <img class="body" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-body.png"
                alt="bat">
            <img class="wing rightwing" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-wing.png">
        </div>
        <div class="bat">
            <img class="wing leftwing" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-wing.png">
            <img class="body" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-body.png"
                alt="bat">
            <img class="wing rightwing" src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/bat-wing.png">
        </div>
        <img class="foregroundimg"
            src="https://aimieclouse.com/Media/Portfolio/Error403Forbidden/HauntedHouseForeground.png"
            alt="haunted house">

    </div>
    <h1 class="errorcode">ERROR 403</h1>
    <a style="text-decoration: none" href="{{route('home')}}"><div class="errortext">This area is forbidden. Turn back now!</div></a>
</body>

</html>
