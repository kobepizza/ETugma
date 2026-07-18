<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;" viewBox="0 0 210 38">
        <g id="name" data-name="Group 228" transform="translate(-158 102)">
            <text id="Scribbles_Schemes" data-name="Scribbles &amp; Schemes" transform="translate(263 -84)" fill="#360" font-size="20" font-family="CooperBlack, Cooper"><tspan x="-104.199" y="0">Scribbles </tspan><tspan y="0" fill="#fc3">&amp;</tspan><tspan y="0" xml:space="preserve"> Schemes</tspan></text>
            <text id="EARLY_CHILDHOOD_CENTER" data-name="EARLY CHILDHOOD CENTER" transform="translate(263 -67)" fill="red" font-size="13" font-family="BerlinSansFB-Reg, Berlin Sans FB"><tspan x="-81.11" y="0">EARLY CHILDHOOD CENTER</tspan></text>
        </g>
    </svg>
</head>

<nav class="navbar navbar-expand-xxl border">
    <div class="container-fluid">
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-flex align-items-center me-auto" href="{{route('home')}}">
            <img src="" class="d-none d-md-flex" alt="logo" height="105" width="100" id="logo"> <!--CMS scribbles logo-->
            <svg class="bi ms-2" height="40">
                <use xlink:href="#name" />
            </svg>
        </a>
        <a class="navbtn-1 btn btn-outline d-none d-md-flex d-xxl-none ms-2" type="button" aria-current="page" href="{{route('login')}}">Log In</a><!--Login Button-->
        <a class="navbtn-2 btn btn-outline d-none d-md-flex d-xxl-none ms-2" type="button" aria-current="page" href="{{route('choice')}}">Sign Up</a><!--Signup Button-->
        <div class="collapse navbar-collapse" id="collapsenav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mt-1 me-2" aria-current="page" href="{{route('signup.client')}}">Find a Tutor</a><!--find tutor Button-->
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 me-2" aria-current="page" href="{{route('grad.choice')}}">Become a Tutor</a><!--become tutor Button-->
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mt-1 me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Our Programs
                    </a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="{{route('program')}}">Programs Offered</a></li><!--programs Button-->
                        <li><a class="dropdown-item" href="{{route('subject')}}">Subjects & Rates</a></li><!--subjects and rates Button-->
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 me-2" aria-current="page" href="{{route('contact')}}">Contact Us</a> <!--contact us Button-->
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 me-2" aria-current="page" href="{{route('about')}}">About Us</a> <!--about us Button-->
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 me-2 d-md-none d-xxl-none d-block" aria-current="page" href="{{route('login')}}">Log In</a> <!--Login Button-->
                </li>
                <li class="nav-item">
                    <a class="nav-link mt-1 me-2 d-md-none d-xxl-none d-block" aria-current="page" href{{route('choice')}}">Sign Up</a><!--Signup Button-->
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ms-auto d-xxl-flex d-none">
            <li class="nav-item">
                <a class="navbtn-1 btn btn-outline ms-2" type="button" aria-current="page" href="{{route('login')}}">Log In</a><!--Login Button-->
            </li>
            <li class="nav-item">
                <a class="navbtn-2 btn btn-outline ms-2" type="button" aria-current="page" href="{{route('choice')}}">Sign Up</a><!--Signup Button-->
            </li>
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function() {
        loadCMS();

        function loadCMS() {
            $.ajax({
                type: "GET",
                url: "{{ route('guest.cms.load') }}",
                success: function(data) {
                    //console.log('data:', data);

                    if (data.success) {
                        buildLogo(data);
                    }

                    function buildLogo(data) {
                        let logo = data.cms.logo;
                        $('#logo').attr('src',logo);
                    }

                },
                error: function() {

                }
            });
            
        };
    });
</script>

</html>
<style>
    .navbar {
        font-size: large;
        font-family: Arial, Helvetica, sans-serif;
    }

    .dropdown-item {
        color: black;
    }

    .dropdown-item:hover {
        color: #759C75;
    }

    .navbtn-1 {
        width: 100px;
        border-radius: 50px;
        justify-content: center;
        background-color: #99CC99;
        border-color: #99CC99;
        color: black;
        transition: all 0.3s ease;
    }

    .navbtn-1:hover {
        background-color: #759C75;
        border-color: #759C75;
        color: white;
    }

    .navbtn-2 {
        width: 100px;
        justify-content: center;
        border-radius: 50px;
        border-color: #99CC99;
        color: black;
        transition: all 0.3s ease;
    }

    .navbtn-2:hover {
        background-color: #759C75;
        border-color: #759C75;
        color: white;
    }

    .nav-link {
        color: black;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #759C75 !important;
    }

    .navbar-collapse {
        transition: all 0.3s ease;
        overflow: visible;
        height: auto;
    }

    .navbar-collapse.collapsing {
        transition: all 0.3s ease;
        height: 0;
        overflow: hidden;
    }

    .dropdown-toggle::after {
        transition: transform 0.2s ease-out;
    }

    .dropdown-toggle[aria-expanded="true"]::after {
        transform: rotate(-180deg);
        color: #759c75 !important;
    }
</style>