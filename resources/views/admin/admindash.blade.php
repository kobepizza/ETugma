@extends('layouts.adminmaster')
@section('content')
@php
$page="Dashboard";
@endphp

<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
        <symbol id="style" viewBox="0 -960 960 960">
            <title>style</title>
            <path d="m280-620 80-80-80-80-80 80 80 80Zm200-40ZM160-400q-33 0-56.5-23.5T80-480v-360q0-33 23.5-56.5T160-920h640q33 0 56.5 23.5T880-840v360q0 33-23.5 56.5T800-400H671q6-20 8-40t0-40h121v-360H160v360h121q-2 20 0 40t8 40H160Zm500-280q25 0 42.5-17.5T720-740q0-25-17.5-42.5T660-800q-25 0-42.5 17.5T600-740q0 25 17.5 42.5T660-680ZM200-40v-84q0-35 19.5-65t51.5-45q49-23 102-34.5T480-280q54 0 107 11.5T689-234q32 15 51.5 45t19.5 65v84H200Zm80-80h400v-4q0-12-7-22t-18-15q-42-19-86-29t-89-10q-45 0-89 10t-86 29q-11 5-18 15t-7 22v4Zm200-200q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T540-460q0-25-17.5-42.5T480-520q-25 0-42.5 17.5T420-460q0 25 17.5 42.5T480-400Zm0-60Zm0 340Z" />
        </symbol>
        <symbol id="apply" viewBox="0 -960 960 960">
            <title>applications</title>
            <path d="M680-320q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T720-440q0-17-11.5-28.5T680-480q-17 0-28.5 11.5T640-440q0 17 11.5 28.5T680-400ZM440-40v-116q0-21 10-39.5t28-29.5q32-19 67.5-31.5T618-275l62 75 62-75q37 6 72 18.5t67 31.5q18 11 28.5 29.5T920-156v116H440Zm79-80h123l-54-66q-18 5-35 13t-34 17v36Zm199 0h122v-36q-16-10-33-17.5T772-186l-54 66Zm-76 0Zm76 0Zm-518 0q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v200q-16-20-35-38t-45-24v-138H200v560h166q-3 11-4.5 22t-1.5 22v36H200Zm80-480h280q26-20 57-30t63-10v-40H280v80Zm0 160h200q0-21 4.5-41t12.5-39H280v80Zm0 160h138q11-9 23.5-16t25.5-13v-51H280v80Zm-80 80v-560 137-17 440Zm480-240Z" />
        </symbol>
        <symbol id="today" viewBox="0 -960 960 960">
            <title>session today</title>
            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Z" />
        </symbol>
        <symbol id="upcoming" viewBox="0 -960 960 960">
            <title>upcoming session</title>
            <path d="M600-80v-80h160v-400H200v160h-80v-320q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H600ZM320 0l-56-56 103-104H40v-80h327L264-344l56-56 200 200L320 0ZM200-640h560v-80H200v80Zm0 0v-80 80Z" />
        </symbol>
        <symbol id="complete" viewBox="0 -960 960 960">
            <title>completed session</title>
            <path d="M438-226 296-368l58-58 84 84 168-168 58 58-226 226ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Z" />
        </symbol>
        <symbol id="ongoing" viewBox="0 -960 960 960">
            <title>ongoing session</title>
            <path d="M200-640h560v-80H200v80Zm0 0v-80 80Zm0 560q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v227q-19-9-39-15t-41-9v-43H200v400h252q7 22 16.5 42T491-80H200Zm520 40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm67-105 28-28-75-75v-112h-40v128l87 87Z" />
        </symbol>
        <symbol id="star" viewBox="0 -960 960 960">
            <title>star</title>
            <path d="m384-334 96-74 96 74-36-122 90-64H518l-38-124-38 124H330l90 64-36 122ZM233-120l93-304L80-600h304l96-320 96 320h304L634-424l93 304-247-188-247 188Zm247-369Z" />
        </symbol>
        <symbol id="tutors" viewBox="0 -960 960 960">
            <title>tutors</title>
            <path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z" />
        </symbol>
        <symbol id="verify" viewBox="0 -960 960 960">
            <title>verify</title>
            <path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z" />
        </symbol>
        <symbol id="pending" viewBox="0 -960 960 960">
            <title>pending verify</title>
            <path d="m438-338 226-226-57-57-169 169-84-84-57 57 141 141Zm42 258q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z" />
        </symbol>
        <symbol id="declined" viewBox="0 -960 960 960">
            <title>declined verify</title>
            <path d="m396-340 84-84 84 84 56-56-84-84 84-84-56-56-84 84-84-84-56 56 84 84-84 84 56 56Zm84 260q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z" />
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Admin Dashboard</h4>
            </div>
            <div>
                @if($profilePic == 1)
                <div class="alert alert-secondary alert-dismissible fade show d-flex align-items-center gap-1" role="alert">
                    <svg class="dash-icon" height="25" width="25" fill="black">
                        <use xlink:href="#info" />
                    </svg>
                    <strong>Don't have a profile picture yet? </strong><a class="profile-setup-link" href="{{route('admin.profile', ['openProfilePic' => 'true'])}}">setup my profile picture.</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if($password == 1)
                <div class="alert alert-secondary alert-dismissible fade show d-flex align-items-center gap-1" role="alert">
                    <svg class="dash-icon" height="25" width="25" fill="black">
                        <use xlink:href="#info" />
                    </svg>
                    <strong>New admin account? </strong><a class="profile-setup-link" href="{{route('load.settings', ['openChangePass' => 'true'])}}">change my password.</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert login-alert alert-success alert-dismissible fade show">{{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <!--headers-->
            <div class="row">
                <div class="col">
                    <div class="card flex-fill border-0 shadow info-card">
                        <div class="card-body p-2 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col-8">
                                    <div class="p-3 m-1">
                                        <h3 class="text-white">Welcome, {{ ucwords(strtolower(session('user_profiles')->fname)) . ' ' .  ucwords(strtolower(session('user_profiles')->lname)) ?? 'N/A' }}</h3>
                                        <p class="mb-0 text-white fs-6">{{ session('user_profiles')->userType->type}}</p>
                                    </div>
                                </div>
                                <div class="col-4 align-self-start text-end">
                                    <img src="Images/logo2.png" class="img-fluid illustration-img" alt="college logo"><!--cms logo-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex">
                    <div class="card flex-fill border-0 shadow">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h4 class="mb-2 info-text">
                                        Scribbles and Schemes Early Childhood Center
                                    </h4>
                                    <p class="info-text">
                                        &copy; 2024 ETugma.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of headers-->
            <h6 class="fst-italic px-2">Updated as of: <span class="fw-semibold" id="updatedAt"></span></h6>
            <section class="px-2 py-1 mb-3" style="max-height:270px; overflow-x:hidden; overflow-y:auto; scrollbar-width:thin;">
                <div class="row row-cols-auto">
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="dash-icon" height="45" width="43" fill="black">
                                        <use xlink:href="#pending" />
                                    </svg>
                                    <h4 class="fw-semibold">Pending Verifications</h4>
                                    <h1 class="fw-bold stats-count" id="unverified-count"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="dash-icon" height="45" width="43" fill="black">
                                        <use xlink:href="#verify" />
                                    </svg>
                                    <h4 class="fw-semibold">Verified Tutors</h4>
                                    <h1 class="fw-bold stats-count" id="verified-count"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="dash-icon" height="45" width="43" fill="black">
                                        <use xlink:href="#declined" />
                                    </svg>
                                    <h4 class="fw-semibold">Declined Verifications</h4>
                                    <h1 class="fw-bold stats-count" id="declined-count"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!---->
            <!--dashboard quick links-->
            <section class="px-2 py-1 mb-1" style="max-height:250px; overflow-x:hidden; overflow-y:auto; scrollbar-width:thin;">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('admin.profile')}}" class="text-decoration-none quick-link">
                            <div class="card p-4 shadow flex-fill dashboard-card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <svg class="dash-icon" height="45" width="43" fill="black">
                                            <use xlink:href="#user" />
                                        </svg>
                                        <h4 class="fw-semibold">Profile</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('admin.tutor')}}" class="text-decoration-none quick-link">
                            <div class="card p-4 shadow flex-fill dashboard-card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <svg class="dash-icon" height="45" width="43" fill="black">
                                            <use xlink:href="#tutors" />
                                        </svg>
                                        <h4 class="fw-semibold">Tutors</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('admin.verify')}}" class="text-decoration-none quick-link">
                            <div class="card p-4 shadow flex-fill dashboard-card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <svg class="dash-icon" height="45" width="43" fill="black">
                                            <use xlink:href="#verify" />
                                        </svg>
                                        <h4 class="fw-semibold">Verifications</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('admin.message')}}" class="text-decoration-none quick-link">
                            <div class="card p-4 shadow flex-fill dashboard-card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <svg class="dash-icon" height="45" width="43" fill="black">
                                            <use xlink:href="#msg" />
                                        </svg>
                                        <h4 class="fw-semibold">Messages</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <!--end of quick links-->
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        loadStats();
    });

    setTimeout(function() {
        $('.login-alert').remove();
    }, 3000);

    function loadStats() {
        $.ajax({
            type: "GET",
            url: "{{route('admin.load.stats')}}",
            success: function(data) {
                //console.log(data);
                buildStats(data);
            }
        })
    }

    function buildStats(data) {
        var unverifiedText = $('#unverified-count');
        var verifiedText = $('#verified-count');
        var declinedText = $('#declined-count');
        let updatedAt = $('#updatedAt');

        let verified = data.verified;
        let unverified = data.unverified;
        let declined = data.declined;

        let updated = moment(new Date()).format('MMMM D, YYYY [at] h:mm A');

        unverifiedText.html(unverified);
        verifiedText.html(verified);
        declinedText.html(declined);
        updatedAt.html(updated);
    }
</script>

</html>
@endsection
<style>
    .info-card {
        background-color: #759C75 !important;
    }

    .info-text {
        color: black !important;
    }

    .cancelBtn:hover {
        .cancel-icon {
            fill: #759C75 !important;
            transition: all 0.3s ease;
        }
    }

    .btn-book {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: white !important;
    }

    .btn-book:hover {
        background-color: #99CC99 !important;
        border-color: #99CC99 !important;
        border-radius: 15px !important;
        color: black !important;
        transition: all 0.3s ease-in-out;
    }

    .btn-view {
        background-color: transparent;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: black;
    }

    .btn-view:hover {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: white !important;
        transition: all 0.3s ease-in-out;
    }

    .btnView {
        background-color: transparent;
        border-color: #759C75 !important;
        color: black;
    }

    .btnView:hover {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        color: white !important;
        transition: all 0.3s ease-in-out;
    }

    .save-btn {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        color: white !important;
        transition: all 0.3s ease !important;
    }

    .save-btn:hover {
        border-color: #99CC99 !important;
        background-color: #99CC99 !important;
        color: black !important;
    }

    .filter-btn {
        color: black;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        width: 285px !important
    }


    .filter-btn.dropdown-toggle[aria-expanded="true"]::after {
        transform: rotate(-180deg);
        color: #759c75 !important;
    }

    .filter-btn.dropdown-toggle::after {
        transition: transform 0.2s ease-out;
    }

    .filter-menu {
        background-color: white !important;
    }

    .filter-item {
        background-color: white !important;
        color: black;
        width: 100%;
        cursor: pointer;
    }

    .filter-check {
        background-color: white !important;
        color: black;
        overflow-x: hidden;
    }

    .form-check input {
        border-color: black !important;
    }

    .form-check input:checked {
        background-color: #759C75 !important;
        transition: all 0.3s ease;
    }

    input[type="radio"].radio:checked+label.filter-item {
        background-color: white !important;
        color: black !important;
    }

    .dashboard-card {
        transition: transform 0.1s ease;
    }

    .dashboard-card:hover {
        transform: scale(1.01);
    }

    .quick-link:hover h4 {
        color: #759C75 !important;
        transition: all 0.3s ease;
    }

    .quick-link:hover .dash-icon {
        fill: #759C75 !important;
        transition: all 0.3s ease;
    }

    .stats-count {
        color: #759C75 !important;
    }

    .star {
        fill: currentColor;
    }

    .star.active {
        color: gold;
    }

    .profile-setup-link {
        color: #759C75;
        text-decoration: underline;
        transition: all 0.3s ease;
    }

    .profile-setup-link:hover {
        color: #99CC99;
    }
</style>