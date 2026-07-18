<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;" viewBox="0 0 210 38">
        <g id="name" data-name="Group 228" transform="translate(-158 102)">
            <text id="Scribbles_Schemes" data-name="Scribbles &amp; Schemes" transform="translate(263 -84)" fill="#7CA7D8" font-size="20" font-family="CooperBlack, Cooper"><tspan x="-104.199" y="0">Messaging </tspan><tspan y="0" fill="#fc3">&amp;</tspan><tspan y="0" xml:space="preserve"> System</tspan></text>
        </g>
    </svg>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>{{config('app.name')}} | {{$page}}</title>
    <link rel="icon" href="{{ asset('Images/logo2.png') }}" type="image/x-icon"><!--website icon--> <!--CMS scribbles logo-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="app">
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar collapsed d-none d-md-block">
            @include('layouts.clientsidebar')
        </aside>
        <div class="offcanvas offcanvas-top d-block d-md-none h-100 collapsed" data-bs-backdrop="false" id="topbar" aria-labelledby="topbarLabel" tabindex="-1" style="background-color:#759C75;">
            @include('layouts.clientsidebar2')
        </div>
        <div class="main">
            @include('layouts.nav')
            @yield('content')
            @include('components.notifs')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/pusher.js"></script>
    <script src="js/script.js"></script>

    <body>

</html>
<style>
    .offcanvas-top {
        transition: all 0.5s ease-in-out;
    }
</style>