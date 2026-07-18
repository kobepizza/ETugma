@extends('layouts.tutormaster')
@section('content')
@php
$page="Dashboard";
@endphp

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
    </svg>
</head>

<body>
    <div class="modal fade" id="noticeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="vstack gap-4 d-flex align-items-center">
                        <svg class="" height="50" fill="currentcolor">
                            <use xlink:href="#info" />
                        </svg>
                        <span>
                            <h3>Parent has requested to terminate tutoring session</h3>
                            <p class="text-danger fw-semibold">Are you sure you want to terminate?</p>
                        </span>
                        <div class="hstack gap-2 align-items-center justify-content-center w-100">
                            <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#tutoringSessions">Dismiss</button>
                            <form class="p-0 m-0 " data-action="{{ route('terminate.session') }}" method="POST" id="terminateSessionForm">
                                @csrf
                                <input type="hidden" name="sessionID" value="" id="hiddenSessionId">
                                <input type="hidden" name="tutorID" value="" id="hiddenTutorId">
                                <input type="hidden" name="parentID" value="" id="hiddenParentId">
                                <button type="submit" class="btn btn-lg btn-book">Terminate</button><!--confirm booking-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Tutor Dashboard</h4>
            </div>
            <div>
                @if($profilePic == 1)
                <div class="alert alert-secondary alert-dismissible fade show d-flex align-items-center gap-1" role="alert">
                    <svg class="dash-icon" height="25" width="25" fill="black">
                        <use xlink:href="#info" />
                    </svg>
                    <strong>Don't have a profile picture yet? </strong><a class="profile-setup-link" href="{{route('tutor.profile', ['openProfilePic' => 'true'])}}">setup my profile picture.</a>
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
                                        <p class="mb-0 text-white fs-6">{{ session('tutorMain')->tutor->employmentSession->employmentType->type}} Tutor</p>
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
            <!--date and count-->
            <section class="px-2 py-1 mb-1">
                <h3 id="date-today"></h3>
                <div class="d-flex align-items-center justify-content-end gap-2">
                    <button class="btn btnView d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#tutoringSessions">
                        <svg class="" height="20" width="20" fill="currentcolor">
                            <use xlink:href="#style" />
                        </svg>
                        My Tutoring Sessions
                    </button>
                    <!--
                    <button class="btn btnView d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#feedbacks">
                        <svg class="" height="20" width="20" fill="currentcolor">
                            <use xlink:href="#star" />
                        </svg>
                        Ratings & Feedbacks
                    </button>
                    -->
                </div>
            </section>
            <section class="px-2 py-1 mb-3" style="max-height:270px; overflow-x:hidden; overflow-y:auto; scrollbar-width:thin;">
                <div class="row row-cols-auto">
                    <div class="col-12 col-lg-3">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="dash-icon" height="45" width="43" fill="black">
                                        <use xlink:href="#today" />
                                    </svg>
                                    <h4 class="fw-semibold">Sessions Today</h4>
                                    <h1 class="fw-bold stats-count" id="today-count"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="dash-icon" height="45" width="43" fill="black">
                                        <use xlink:href="#upcoming" />
                                    </svg>
                                    <h4 class="fw-semibold">Upcoming Sessions</h4>
                                    <h1 class="fw-bold stats-count" id="upcoming-count"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="dash-icon" height="45" width="43" fill="black">
                                        <use xlink:href="#ongoing" />
                                    </svg>
                                    <h4 class="fw-semibold">Active Sessions</h4>
                                    <h1 class="fw-bold stats-count" id="ongoing-count"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="dash-icon" height="45" width="43" fill="black">
                                        <use xlink:href="#complete" />
                                    </svg>
                                    <h4 class="fw-semibold">Completed Sessions</h4>
                                    <h1 class="fw-bold stats-count" id="completed-count"></h1>
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
                        <a href="{{route('tutor.profile')}}" class="text-decoration-none quick-link">
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
                        <a href="{{route('tutor.apply')}}" class="text-decoration-none quick-link">
                            <div class="card p-4 shadow flex-fill dashboard-card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <svg class="dash-icon" height="45" width="43" fill="black">
                                            <use xlink:href="#apply" />
                                        </svg>
                                        <h4 class="fw-semibold">Applications</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('tutor.assessment')}}" class="text-decoration-none quick-link">
                            <div class="card p-4 shadow flex-fill dashboard-card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <svg class="dash-icon" height="45" width="43" fill="black">
                                            <use xlink:href="#assess" />
                                        </svg>
                                        <h4 class="fw-semibold">Assessments</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('tutor.message')}}" class="text-decoration-none quick-link">
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
            <!--tutoring sessions modal-->
            <div class="modal" tabindex="-1" id="tutoringSessions" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">My Tutoring Sessions | {{ ucwords(strtolower(Session('user_profiles')->fname .' '. Session('user_profiles')->lname)) }}</span></h5>
                            <button type="button" class="btn-close close-sessions" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="sessions"></div>
                            <!---->
                            <div class="row row-cols-auto align-items-center justify-content-center justify-content-lg-start pb-4">
                                <div class="col">
                                    <div class="dropdown-center mb-3">
                                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterSubDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                            Subject
                                        </button>
                                        <div class="dropdown-menu filter-menu w-100">

                                            <div class="vstack" id="dayForm">
                                                <!--day looping-->
                                                @foreach($subjects as $data)
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input radio" type="radio" name="filterSub" id="filterSub{{ $data->id }}" value="{{ $data->id }}"><!--dayID-->
                                                    <label class="form-check-label filter-item" for="filterSub{{ $data->id }}"><!--dayID-->
                                                        {{ $data->subjects }}<!--day-->
                                                    </label>
                                                </div>
                                                @endforeach
                                                <!--end looping-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="dropdown-center mb-3">
                                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterYearDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                            Year Level
                                        </button>
                                        <div class="dropdown-menu filter-menu w-100">
                                            <div class="vstack" id="timeForm">
                                                <!--time looping-->
                                                @foreach($yearLevel as $data)
                                                <div class="form-check ms-3">
                                                    <input class="form-check-input radio" type="radio" name="filterLevel" id="filterLevel{{ $data->id }}" value="{{ $data->id }}"><!--timeID-->
                                                    <label class="form-check-label filter-item" for="filterLevel{{ $data->id }}"><!--timeID-->
                                                        {{ $data->year }}
                                                    </label>
                                                </div>
                                                @endforeach
                                                <!--end looping-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center justify-content-sm-start col-sm-auto">
                                    <button id="clear-filter" type="button" class="btn btn-outline save-btn mb-3">Clear Filters</button>
                                </div>
                            </div>
                            <section class="p-2 shadow " style="max-height:530px; overflow:auto;">
                                <table class="table table-striped table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Year Level</th>
                                            <th scope="col">Modality</th>
                                            <th scope="col">Tutor</th>
                                            <th scope="col">Student</th>
                                            <th scope="col">Parent</th>
                                            <th scope="col">Day</th>
                                            <th scope="col">Start Time</th>
                                            <th scope="col">End Time</th>
                                            <th scope="col">Session Type</th>
                                            <th scope="col">Session Start</th>
                                            <th scope="col">Session End</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sessionsTable">

                                    </tbody>
                                </table>
                                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="loading">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <h5 class="p-3 text-center d-none" id="noSession">No tutoring sessions yet.</h5>
                            </section>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
            <!--end of sessions modal-->
            <!--ratings & feedback modal-->
            <!--
            <div class="modal" tabindex="-1" id="feedbacks" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ratings & Feedbacks | {{ ucwords(strtolower(Session('user_profiles')->fname .' '. Session('user_profiles')->lname)) }}</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <section class="p-2" style="max-height:450px; overflow-y:auto; scrollbar-width:thin;">
                                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="hiddenLoading">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <ul class="feedbacks m-0 p-0" id="feedbacks-list">

                                </ul>
                                <h5 class="p-3 text-center d-none" id="noFeedbacks">No ratings & feedbacks yet.</h5>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btnView" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            -->
            <!---->
        </div>
    </main>
    <script>
        $(document).ready(function() {
            var token = $('input[name="_token"]').val();
            loadTutoringSessions();
            dropdown();
            dateAndCount();
            loadFeedbacks();
            openSessionsModal();
        });
        setTimeout(function() {
            $('.login-alert').remove();
        }, 3000);
        //session modal
        function openSessionsModal() {
            const urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('openSessions')) {
                $('#tutoringSessions').modal('show');
            }
        }

        function closeSessionsModal() {
            const url = new URL(window.location.href);
            url.searchParams.delete('openSessions'); // Replace 'parameter_name' with the actual name of your URL parameter
            window.history.replaceState(null, '', url);
        }

        $('.close-sessions').on('click', function() {
            const urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('openSessions')) {
                closeSessionsModal();
            }
        })
        //
        //dropdowns
        function dropdown() {
            //change radio texts when selected
            const dropdownButtons = document.querySelectorAll('.filter-btn');
            const radioInputs = document.querySelectorAll('.radio');
            radioInputs.forEach((radio) => {
                radio.addEventListener('change', (e) => {
                    // Get the selected radio input's label text
                    const selectedText = e.target.nextElementSibling.textContent.trim();

                    // Get the corresponding dropdown button
                    const dropdownButton = e.target.closest('.dropdown-center').querySelector('.filter-btn');

                    // Update the dropdown button's text
                    dropdownButton.textContent = selectedText;

                    // Close the dropdown
                    const dropdown = bootstrap.Dropdown.getInstance(dropdownButton);
                    dropdown.hide();
                });
            });
        }
        //
        //date and count
        function dateAndCount() {
            let todayText = $('#date-today');

            let today = moment(new Date()).format('dddd, MMMM D, YYYY');

            todayText.html(today);

            $.ajax({
                type: "GET",
                url: "{{route('tutor.count.tutoring.sessions')}}",
                success: function(data) {
                    //console.log(data);
                    buildStats(data);
                }
            })

        }

        function buildStats(data) {
            let upcomingText = $('#upcoming-count');
            let todayText = $('#today-count');
            let completeText = $('#completed-count');
            let ongoingText = $('#ongoing-count');

            let todayCount = data.today;
            let upcomingCount = data.upcoming;
            let completeCount = data.completed;
            let ongoingCount = data.ongoing;

            upcomingText.html(upcomingCount);
            todayText.html(todayCount);
            completeText.html(completeCount);
            ongoingText.html(ongoingCount);

        }
        //
        //load feedbacks
        function loadFeedbacks() {
            $.ajax({
                type: "GET",
                url: "{{route('tutor.load.feedbacks')}}",
                beforeSend: function() {
                    $('#hiddenLoading').removeClass('d-none');
                },
                success: function(data) {
                   // console.log(data);
                    $('#hiddenLoading').addClass('d-none');
                    if (!data.length) {
                        $('#noFeedbacks').removeClass('d-none');
                    } else {
                        $('#noFeedbacks').addClass('d-none');
                    }
                    buildFeedbacks(data);
                }
            })
        }
        
        //build feedbacks
        function buildFeedbacks(data) {
            let feedbacksList = $('#feedbacks-list');
            feedbacksList.empty();

            $.each(data, function(index, item) {
                let ratingID = item.rating_id;
                let rating = item.rating.rating;
                let feedback = item.feedback;
                let created_at = moment(item.created_at).format('M/D/YYYY');

                let parentName = item.tutor_session.guardian_main.guardian.user_profile.fname + ' ' + item.tutor_session.guardian_main.guardian.user_profile.lname;
                let parentImg = item.tutor_session.guardian_main.guardian.user_profile.profile_pic;
                //let childName = item.tutor_session.guardian_main.child.fname + ' ' + item.tutor_session.guardian_main.child.lname;


                let feedbackItem = `
                    <li class="feedback-item">
                        <div class="card shadow-sm ">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="mb-3 d-flex align-items-center gap-2">
                                        <img class="rounded-circle" src="${parentImg}" height="45" width="45" alt="Parent">
                                        <h5 class="mb-0">${parentName}</h5>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="p-1 fw-semibold">Rating: <span class="text-success">${rating}</span></h6>
                                        <svg class="star ${ratingID >= 1 ? 'active' : ''}" height="25" width="25">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star ${ratingID >= 2 ? 'active' : ''}" height="25" width="25">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star ${ratingID >= 3 ? 'active' : ''}" height="25" width="25">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star ${ratingID >= 4 ? 'active' : ''}" height="25" width="25">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star ${ratingID == 5 ? 'active' : ''}" height="25" width="25">
                                            <use xlink:href="#star" />
                                        </svg>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="p-1 fw-semibold">Feedback: </h6>
                                        <p class="p-1">${feedback}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <h6>${created_at}</h6>
                                </div>
                            </div>
                        </div>
                    </li>
                    `;

                feedbacksList.append(feedbackItem);
            })
        }
        //
        //
        //load
        function loadTutoringSessions() {
            $.ajax({
                type: 'GET',
                url: "{{ route('tutor.load.tutoring.sessions') }}",
                dataType: 'json',
                beforeSend: function() {
                    var spinner = $('#loading');
                    spinner.removeClass('d-none');
                },
                success: function(data) {
                    //console.log('data:', data);
                    //load all contacts
                    var spinner = $('#loading');
                    spinner.addClass('d-none');

                    if (!data.length) {
                        $('#noSession').removeClass('d-none');
                    } else {
                        $('#noSession').addClass('d-none');
                    }

                    var tableBody = $('#sessionsTable');
                    tableBody.empty();

                    $.each(data, function(index, session) {
                        var sessionID = session.id;
                        var subjectID = session.subject.id;
                        var tutorID = session.tutor.id;
                        var parentID = session.guardian.id;
                        var statusID = session.status.id;
                        var yearLevelID = session.year_level.id;

                        var subject = session.subject.subjects;
                        var modality = session.modality;
                        var year = session.year_level.year;
                        var tutor = session.tutor.fname + " " + session.tutor.lname;
                        var student = session.student.fname + " " + session.student.lname;
                        var guardian = session.guardian.fname + " " + session.guardian.lname;
                        var sessionType = session.session_type;
                        var sessionStart = moment(session.session_start).format('MMM DD, YYYY');
                        var sessionEnd = moment(session.session_end).format('MMM DD, YYYY');
                        var day = session.day;
                        var start_time = session.start_time;
                        var end_time = session.end_time;
                        var status = session.status.status;
                        var terminate = session.terminate;

                        //console.log('sessionID', sessionID);
                        const statusTexts = {
                            1: 'text-primary',
                            2: 'text-success',
                            3: 'text-danger',
                        }

                        var tutorCapitalized = tutor.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                        var studentCapitalized = student.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                        var guardianCapitalized = guardian.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

                        var tableData = `
                                <tr data-subject-id="${subjectID}" data-year-id="${yearLevelID}">
                                    <td>${subject}</td>
                                    <td>${year}</td>
                                    <td>${modality}</td>
                                    <td>${tutorCapitalized}</td>
                                    <td>${studentCapitalized}</td>
                                    <td>${guardianCapitalized}</td>
                                    <td>${day}</td>
                                    <td>${start_time}</td>
                                    <td>${end_time}</td>
                                    <td>${sessionType}</td>
                                    <td>${sessionStart}</td>
                                    <td>${sessionEnd}</td>
                                    <td class="${statusTexts[statusID]}">${status}</td>
                                    <td>
                                        <button class="btn cancelBtn d-flex align-items-center justify-content-center ${statusID > 1 || terminate == 0 ? 'd-none' : '' }" type="button" data-bs-toggle="modal" data-bs-target="#noticeModal" data-session-id="${sessionID}" data-tutor-id="${tutorID}" data-parent-id="${parentID}">
                                            <svg class="cancel-icon" height="20" width="20" fill="currentcolor">
                                                <use xlink:href="#close" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                `;

                        tableBody.append(tableData);
                    });
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
        //
        //request termination
        $('#sessionsTable').on('click', '.cancelBtn', function() {
            var sessionID = $(this).data('session-id');
            var tutorID = $(this).data('tutor-id');
            var parentID = $(this).data('parent-id');
            $('#hiddenSessionId').val(sessionID);
            $('#hiddenTutorId').val(tutorID);
            $('#hiddenParentId').val(parentID);
        });
        //
        //send request 
        /*$('#noticeModal').on('submit', function(e) {
            e.preventDefault();

            var hiddenID = $('#hiddenSessionId').val();
            var tutorID = $('#hiddenTutorId').val();
            var parentID = $('#hiddenParentId').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('terminate.session') }}",
                data: {
                    _token: token,
                    session_id: hiddenID,
                    tutor_id: tutorID,
                    parent_id: parentID
                },
                success: function(data) {
                    if (data.success) {
                        $('#hiddenSessionId').val('');
                        $('#noticeModal').modal('hide');
                        $('[data-session-id="' + hiddenID + '"]').addClass('d-none');

                        let Alert = `
                                <div class="alert alert-success alert-dismissible fade show float-center w-25" role="alert">
                                    ${data.message}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `;

                        let alertElement = $(Alert).appendTo('#sessions');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                        loadTutoringSessions();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }

            })
        })*/
        $('#terminateSessionForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $(this).data('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#terminateSessionForm').find('[type="submit"]').prop('disabled', true);
                },
                success: function(response) {
    
                    if (response.success) {
                        $('#terminateSessionForm').find('[type="submit"]').prop('disabled', false);
                        $('#terminateSessionForm')[0].reset();
                        $('#noticeModal').modal('hide');
                        $('#tutoringSessions').modal('show');
                        loadTutoringSessions();
    
                        let Alert =
                            `
                             <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                                 ${response.message}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                             `;
    
                        let alertElement = $(Alert).appendTo('#sessions');
    
                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);
    
                    } else if (response.error) {
    
                        let Alert =
                            `
                             <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                                 ${response.message}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                             `;
    
                        let alertElement = $(Alert).appendTo('#sessions');
    
                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);
                        $('#terminateSessionForm').find('[type="submit"]').prop('disabled', false);
                        $('#terminateSessionForm')[0].reset();
                        $('#noticeModal').modal('hide');
                        $('#tutoringSessions').modal('show');
                        loadTutoringSessions();
                    }
    
                },
                error: function(response) {
                    $('#terminateSessionForm').find('[type="submit"]').prop('disabled', false);
                }
            })
        })
        //
        //filter 
        $('input[name="filterSub"], input[name="filterLevel"]').on('change', function() {
            let subId = $('input[name="filterSub"]:checked').val();
            let levelId = $('input[name="filterLevel"]:checked').val();

            $('#sessionsTable tr').hide();

            if (subId && levelId) {
                $('#sessionsTable tr[data-subject-id="' + subId + '"][data-year-id="' + levelId + '"]').show();
            } else if (subId) {
                $('#sessionsTable tr[data-subject-id="' + subId + '"]').show();
            } else if (levelId) {
                $('#sessionsTable tr[data-year-id="' + levelId + '"]').show();
            } else {
                $('#sessionsTable tr').show();
            }
        });

        $('#clear-filter').on('click', function() {
            var filterSub = $('#filterSubDrop');
            var filterLevel = $('#filterYearDrop');

            filterSub.text('Subject');
            filterLevel.text('Year Level');
            filterSub.dropdown('hide');
            filterLevel.dropdown('hide');
            $('input[name="filterSub"], input[name="filterLevel"]').prop('checked', false);
            $('#sessionsTable tr').show(); // modified to show all table rows
        });
        //
    </script>
</body>
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