@extends('layouts.clientmaster')
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
        <symbol id="pending" viewBox="0 -960 960 960">
            <title>pending</title>
            <path d="M280-420q25 0 42.5-17.5T340-480q0-25-17.5-42.5T280-540q-25 0-42.5 17.5T220-480q0 25 17.5 42.5T280-420Zm200 0q25 0 42.5-17.5T540-480q0-25-17.5-42.5T480-540q-25 0-42.5 17.5T420-480q0 25 17.5 42.5T480-420Zm200 0q25 0 42.5-17.5T740-480q0-25-17.5-42.5T680-540q-25 0-42.5 17.5T620-480q0 25 17.5 42.5T680-420ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="user" viewBox="0 -960 960 960">
            <title>user</title>
            <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
        </symbol>
        <symbol id="find" viewBox="0 -960 960 960">
            <title>find</title>
            <path d="M440-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-80q33 0 56.5-23.5T520-640q0-33-23.5-56.5T440-720q-33 0-56.5 23.5T360-640q0 33 23.5 56.5T440-560ZM884-20 756-148q-21 12-45 20t-51 8q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 27-8 51t-20 45L940-76l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-540 40v-111q0-34 17-63t47-44q51-26 115-44t142-18q-12 18-20.5 38.5T407-359q-60 5-107 20.5T221-306q-10 5-15.5 14.5T200-271v31h207q5 22 13.5 42t20.5 38H120Zm320-480Zm-33 400Z" />
        </symbol>
        <symbol id="msg" viewBox="0 -960 960 960">
            <title>message</title>
            <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
        </symbol>
        <symbol id="assess" viewBox="0 -960 960 960">
            <title>assessment</title>
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm80-80h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z" />
        </symbol>
        <symbol id="notif" viewBox="0 -960 960 960">
            <title>notifications</title>
            <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
        </symbol>
        <symbol id="trans" viewBox="0 -960 960 960">
            <title>transaction</title>
            <path d="M240-80q-50 0-85-35t-35-85v-120h120v-560l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-560H320v440h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h240v80H360Zm0 120v-80h240v80H360Zm320-120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm0 120q-17 0-28.5-11.5T640-520q0-17 11.5-28.5T680-560q17 0 28.5 11.5T720-520q0 17-11.5 28.5T680-480ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm-40 0v-80 80Z" />
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Parent Dashboard</h4>
            </div>
            <div>
                @if($profilePic == 1)
                <div class="alert alert-secondary alert-dismissible fade show d-flex align-items-center gap-1" role="alert">
                    <svg class="dash-icon" height="25" width="25" fill="black">
                        <use xlink:href="#info" />
                    </svg>
                    <strong>Don't have a profile picture yet? </strong><a class="profile-setup-link" href="{{route('parent.profile', ['openProfilePic' => 'true'])}}">setup my profile picture.</a>
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
                                        <p class="mb-0 text-white fs-6">{{ session('clientMain')->guardian->relation->relation}}</p>
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
            <h3 class="px-2" id="date-today"></h3>
            <!--children tutoring sessions-->
            <!--modals-->
            <!--request termination modal-->
            <div class="modal fade" id="noticeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="vstack gap-4 d-flex align-items-center">
                                <svg class="" height="50" fill="currentcolor">
                                    <use xlink:href="#info" />
                                </svg>
                                <span>
                                    <h3>Request tutor to terminate tutoring session?</h3>
                                    <p class="text-danger fw-semibold">Warning: Please note that a strict no-refund policy is in place.</p>
                                </span>
                                <div class="vstack gap-2 align-items-center justify-content-center w-100">
                                    <form class="p-0 m-0 w-100" method="POST">
                                        @csrf
                                        <input type="hidden" name="sessionID" value="" id="hiddenSessionId">
                                        <input type="hidden" name="tutorID" value="" id="hiddenTutorId">
                                        <input type="hidden" name="parentID" value="" id="hiddenParentId">
                                        <textarea class="form-control mb-3" name="reason" placeholder="Reason for termination" id="reasonTermination" required></textarea>
                                        <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                            <button class="btn btn-lg btn-view dismiss-requestModal" type="button" data-bs-toggle="modal" data-bs-target="#tutoringSessions">Dismiss</button>
                                            <button type="submit" class="btn btn-lg btn-book">Proceed</button><!--confirm booking-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of terminate modal-->
            <!--tutoring sessions mdoal-->
            <div class="modal" tabindex="-1" id="tutoringSessions" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tutoring Sessions | <span class="" id="childName"></span></h5>
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
                                <div class="d-flex justify-content-center p-5 d-none" id="sessionDiv">
                                    <div class="spinner-border text-secondary text-center d-none " role="status" id="sessionLoad">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="d-flex justify-content center d-none" id="sessionError">
                                        <h5>No tutoring sessions yet.</h5>
                                    </div>
                                </div>
                            </section>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
            <!--end of tutor session modal-->
            <!--end of modals-->
            <h5 class="px-2">My Children</h5>
            <section class="px-2 py-1 mb-1" style="max-height:310px; overflow-x:hidden; overflow-y:auto; scrollbar-width:thin;">
                <div class="row" id="children-list">

                </div>
            </section>
            <!---->
            <!--dashboard quick links-->
            <section class="px-2 py-1" style="max-height:300px; overflow-x:hidden; overflow-y:auto; scrollbar-width:thin;">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('parent.profile')}}" class="text-decoration-none quick-link">
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
                        <a href="{{route('parent.find.tutor')}}" class="text-decoration-none quick-link">
                            <div class="card p-4 shadow flex-fill dashboard-card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <svg class="dash-icon" height="45" width="43" fill="black">
                                            <use xlink:href="#find" />
                                        </svg>
                                        <h4 class="fw-semibold">Find Tutor</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{route('parent.assessments')}}" class="text-decoration-none quick-link">
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
                        <a href="{{route('parent.message')}}" class="text-decoration-none quick-link">
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
    <script>
        $(document).ready(function() {
            //loadTutoringSessions();
            loadChildren();
            dropdowns();
            checkFinishedSessions();
        });
        setTimeout(function() {
            $('.login-alert').remove();
        }, 3000);
        
        //check for completed sessions
        function checkFinishedSessions(){
             $.ajax({
                type: "GET",
                url: "{{route('load.finished.sessions')}}",
                success: function(data) {
                    console.log(data);
                }
            })
        }
        //
        //change radio texts when selected
        function dropdowns() {
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
        //load children
        function loadChildren() {
            $.ajax({
                type: "GET",
                url: "{{route('load.children')}}",
                success: function(data) {
                    //console.log(data);
                    buildChildren(data);
                }
            })
        }
        //
        //build children
        function buildChildren(data) {

            let todayText = $('#date-today');

            let today = moment(new Date()).format('dddd, MMMM D, YYYY');

            todayText.html(today);

            let childrenList = $('#children-list');
            childrenList.empty();

            $.each(data, function(key, item) {
                //console.log('child details:', item);
                let childID = item.child_id;
                let childImage = item.child.profile_pic;
                let childName = item.child.fname + ' ' + item.child.lname;
                let childYear = item.child.year_level.year;

                let childCard = `
                    <div class="col-12 col-md-4">
                        <div class="card rounded-4 shadow dashboard-card">
                            <div class="card-body">
                                <div class="vstack gap-3 align-items-center w-100 text-center">
                                    <img src="${childImage}" alt="" width="110" height="110" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--child profile picture-->
                                    <h4 class="fw-bold mb-0">${childName}</h4>
                                    <h6 class="fw-semibold mb-0">${childYear}</h6>
                                    <button class="btn btn-view viewSession" type="button" data-bs-toggle="modal" data-bs-target="#tutoringSessions" data-child-name="${childName}" data-child-id="${childID}">View Sessions</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                childrenList.append(childCard);
            });

        }
        //
        //load sessions
        function loadTutoringSessions(childID) {
            var token = $('input[name="_token"]').val();
            $.ajax({
                type: 'POST',
                url: "{{ route('load.tutoring.sessions') }}",
                dataType: 'json',
                data: {
                    _token: token,
                    childID: childID,

                },
                beforeSend: function() {
                    $('#sessionDiv').removeClass('d-none');
                    var spinner = $('#sessionLoad');
                    spinner.removeClass('d-none');
                },
                success: function(data) {
                    //console.log('data:', data, 'length', data.length);

                    var spinner = $('#sessionLoad');
                    spinner.addClass('d-none');

                    if (!data.length) {
                        $('#sessionError').removeClass('d-none');
                    } else {
                        $('#sessionError').addClass('d-none');
                        $('#sessionDiv').addClass('d-none');
                    }
                    buildTutoringSessions(data)
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                    var spinner = $('#sessionLoad');
                    spinner.addClass('d-none');
                }
            });
        }
        //build sessions
        function buildTutoringSessions(data) {
            var tableBody = $('#sessionsTable');
            tableBody.empty();

            $.each(data, function(index, session) {
                var sessionID = session.id;
                var tutorID = session.tutor.id;
                var parentID = session.guardian.id;
                var statusID = session.status.id;
                var subjectID = session.subject.id;
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
                            <button class="btn cancelBtn d-flex align-items-center justify-content-center ${statusID > 1 || terminate == 1 ? 'd-none' : '' }" type="button" data-bs-toggle="modal" data-bs-target="#noticeModal" data-session-id="${sessionID}" data-tutor-id="${tutorID}" data-parent-id="${parentID}">
                                <svg class="cancel-icon" height="20" width="20" fill="currentcolor">
                                    <use xlink:href="#close" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    `;

                tableBody.append(tableData);
            });
        }
        //
        //view sessions
        $('#children-list').on('click', '.viewSession', function() {
            let childID = $(this).data('child-id');
            let childName = $(this).data('child-name');
            //console.log('child id', childID, 'child name', childName);

            $('#childName').html(childName);
            loadTutoringSessions(childID);
        })
        //
        //clear sessions table
        $('.close-sessions').on('click', function() {
            var tableBody = $('#sessionsTable');
            var childName = $('#childName');
            var sessionDiv = $('#sessionDiv');
            var sessionError = $('#sessionError');
            var sessionLoad = $('#sessionLoad');

            tableBody.empty();
            childName.html('');
            sessionDiv.addClass('d-none');
            sessionError.addClass('d-none');
            sessionLoad.addClass('d-none');
        })
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
        //send request
        $('#noticeModal').on('submit', function(e) {
            e.preventDefault();
            var token = $('input[name="_token"]').val();
            var hiddenID = $('#hiddenSessionId').val();
            var tutorID = $('#hiddenTutorId').val();
            var parentID = $('#hiddenParentId').val();
            var reason = $('#reasonTermination').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('request.terminate.session') }}",
                data: {
                    _token: token,
                    session_id: hiddenID,
                    tutor_id: tutorID,
                    parent_id: parentID,
                    reason: reason
                },
                beforeSend: function() {
                    $('#noticeModal').find('button[type=submit]').prop('disabled', true);
                },
                success: function(data) {
                    if (data.success) {
                        $('#noticeModal').find('button[type=submit]').prop('disabled', false);
                        $('#reasonTermination').val('');
                        $('#hiddenSessionId').val('');
                        $('#noticeModal').modal('hide');
                        $('#tutoringSessions').modal('show');
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

                    } else {
                        $('#noticeModal').find('button[type=submit]').prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }

            })
        })
        //close request
        $('.dismiss-requestModal').on('click', function() {
            $('#reasonTermination').val('');
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

    .profile-setup-link {
        color: #759C75;
        text-decoration: underline;
        transition: all 0.3s ease;
    }

    .profile-setup-link:hover {
        color: #99CC99;
    }
</style>