@extends('layouts.headadminmaster')
@section('content')

@php
$page ='Manage Tutors'
@endphp

<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="delete" viewBox="0 -960 960 960">
            <title>delete</title>
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
        </symbol>
        <symbol id="deac" viewBox="0 -960 960 960">
            <title>deac</title>
            <path d="M280-440h400v-80H280v80ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
        <symbol id="add" viewBox="0 -960 960 960">
            <title>add</title>
            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
        </symbol>
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="edit" viewBox="0 -960 960 960">
            <title>edit</title>
            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
        </symbol>
        <symbol id="message" viewBox="0 -960 960 960">
            <title>message</title>
            <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
        <symbol id="feedback" viewBox="0 -960 960 960">
            <title>feedback</title>
            <path d="M240-400h122l200-200q9-9 13.5-20.5T580-643q0-11-5-21.5T562-684l-36-38q-9-9-20-13.5t-23-4.5q-11 0-22.5 4.5T440-722L240-522v122Zm280-243-37-37 37 37ZM300-460v-38l101-101 20 18 18 20-101 101h-38Zm121-121 18 20-38-38 20 18Zm26 181h273v-80H527l-80 80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
        </symbol>
        <symbol id="star" viewBox="0 -960 960 960">
            <title>star</title>
            <path d="m384-334 96-74 96 74-36-122 90-64H518l-38-124-38 124H330l90 64-36 122ZM233-120l93-304L80-600h304l96-320 96 320h304L634-424l93 304-247-188-247 188Zm247-369Z" />
        </symbol>
    </svg>
</head>

<body>

    <!--feedback modal-->
    <div class="modal" tabindex="-1" id="feedbackModal" data-bs-backdrop="static" data-bs-keyboard="false">
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
    <!--main content-->
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <h4>Tutoring Sessions</h4>
            </div>
        </div>
        <div class="" id="alert-div">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">{{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(Session::has('info'))
            <div class="alert alert-success ">{{Session::get('info')}}</div>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif
        </div>
       
        <div class="mb-3">
            <h6 class="fw-semibold">Total Complete Sessions: <span class="fw-normal badge badge-success p-2 rounded-3 text-dark" id="tutorCount"></span></h6>
        </div>
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


    </main>

</body>

</html>
<script>
    $(document).ready(function() {
        var token = $('input[name="_token"]').val();
        loadTutoringSessions();
        dropdown();
        dateAndCount();
        loadFeedbacks();
        openSessionsModal();
        loadCompleteSessions();
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
            url: "{{route('headAdmin.count.tutoring.sessions')}}",
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
    function loadFeedbacks(sessionID) {
        $.ajax({
            type: "GET",
            url: "{{route('headAdmin.load.feedbacks',  ['sessionId' => ':sessionId'])}}".replace(':sessionId', sessionID),
            beforeSend: function() {
                console.log('Fetching feedback for session ID:', sessionID); // Debugging
                $('#hiddenLoading').removeClass('d-none');
            },
            success: function(data) {
                console.log('feedback', data);
                $('#hiddenLoading').addClass('d-none');
                if (!data.length) {
                    $('#noFeedbacks').removeClass('d-none');
                } else {
                    $('#noFeedbacks').addClass('d-none');
                }
                buildFeedbacks(data);
            },
            error: function(xhr) {
                console.log('Error fetching feedback:', xhr.responseText); // Debugging
            }
        })
    }

    //build feedbacks
    function buildFeedbacks(data) {
        let feedbacksList = $('#feedbacks-list');
        feedbacksList.empty();

        $.each(data, function(index, item) {
            let rating = item.rating ? item.rating.rating : 'No rating';
            let feedback = item.feedback || {};
            let created_at = item.created_at ? moment(item.created_at).format('M/D/YYYY') : 'Unknown Date';

            let parentName =
                (item.tutor_session?.guardian_main?.guardian?.user_profile?.fname || 'Unknown') +
                ' ' +
                (item.tutor_session?.guardian_main?.guardian?.user_profile?.lname || 'Parent');

            let parentImg = item.tutor_session?.guardian_main?.guardian?.user_profile?.profile_pic || '/path/to/default/image.jpg';

            let feedbackItem = `
            <li class="feedback-item">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Parent Details -->
                        <div class="mb-3 d-flex align-items-center gap-2">
                            <img class="rounded-circle" src="${parentImg}" height="45" width="45" alt="Parent">
                            <h5 class="mb-0">${parentName}</h5>
                        </div>

                         <!-- Ratings -->
                        <div class="mb-3">
                            <h6 class="fw-semibold">Engagement and Interaction</h6>
                            <div class="d-flex align-items-center">
                                ${generateStars(item.engagement)}
                            </div>

                            <h6 class="fw-semibold mt-2">Patience and Support</h6>
                            <div class="d-flex align-items-center">
                                ${generateStars(item.patience)}
                            </div>

                            <h6 class="fw-semibold mt-2">Preparedness</h6>
                            <div class="d-flex align-items-center">
                                ${generateStars(item.preparedness)}
                            </div>

                            <h6 class="fw-semibold mt-2">Relevance of Content</h6>
                            <div class="d-flex align-items-center">
                                ${generateStars(item.relevance)}
                            </div>

                            <h6 class="fw-semibold mt-2">Pace of the Session</h6>
                            <div class="d-flex align-items-center">
                                ${generateStars(item.pace)}
                            </div>

                            <h6 class="fw-semibold mt-2">Overall Satisfaction</h6>
                            <div class="d-flex align-items-center">
                                ${generateStars(item.overall)}
                            </div>
                        </div>

                        <!-- Additional Feedback -->
                        <div class="mb-3">
                            <h6 class="fw-semibold">Additional Feedback:</h6>
                            <p>${item.feedback || 'No additional feedback provided.'}</p>
                        </div>

                        <!-- Submission Date -->
                        <div class="d-flex justify-content-end">
                            <small class="text-muted">Submitted on: ${created_at}</small>
                        </div>
                    </div>
                </div>
            </li>
        `;

            feedbacksList.append(feedbackItem);
        });
    }

    //
    //
    //load

    function generateStars(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += `
                    <svg class="star ${i <= rating ? 'active' : ''}" height="20" width="20">
                        <use xlink:href="#star" />
                    </svg>
                `;
        }
        return stars;
    }


    function loadTutoringSessions() {
        $.ajax({
            type: 'GET',
            url: "{{ route('headAdmin.load.tutorSessions') }}",
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
                                        ${
                                            statusID === 2 // Assuming "2" corresponds to "Complete"
                                                ? `<button class="btn feedbackBtn d-flex align-items-center justify-content-center" type="button" data-session-id="${sessionID}"  data-bs-toggle="modal" data-bs-target="#feedbackModal">
                                                    <svg class="feedback-icon" height="30" width="30" fill="currentColor">
                                                        <use xlink:href="#feedback" />
                                                    </svg>
                                                </button>`
                                                : ''
                                        }
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
    $('#sessionsTable').on('click', '.feedbackBtn', function() {
        var sessionID = $(this).data('session-id'); // Get the session ID from the button's data attribute

        // Log the session ID for debugging
        console.log('Loading feedback for session ID:', sessionID);

        // Clear the feedback modal content and show the loading spinner
        $('#feedbacks-list').empty();
        $('#hiddenLoading').removeClass('d-none');
        $('#noFeedbacks').addClass('d-none');

        // Call the loadFeedbacks function to fetch and display feedback for the session
        loadFeedbacks(sessionID);
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

    //total session
    function loadCompleteSessions() {
    $.ajax({
        type: 'GET',
        url: "{{ route('headAdmin.complete.sessions') }}", // Use the route created
        dataType: 'json',
        beforeSend: function () {
            $('#tutorCount').text('Loading...'); // Optional loading indicator
        },
        success: function (sessions) {
            // Update the total count
            const totalCompleted = sessions.length; // Count total completed sessions
            $('#tutorCount').text(totalCompleted); // Display the count
        },
        error: function (xhr) {
            console.error('Error fetching complete sessions:', xhr.responseText);
            $('#tutorCount').text('Error'); // Optional: show error message
        }
    });
}

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
@endsection
<style>
    #clear-filter {
    color: white;
    background-color: #759C75; /* Replace with your preferred color */
    border-color: #759C75; /* Border matches the background */
    transition: all 0.3s ease;
    }

    #clear-filter:hover {
        background-color: #99CC99; /* Lighter hover effect */
        color: black;
    }

    .cancelBtn:hover {
        .cancel-icon {
            fill: #759C75 !important;
            transition: all 0.3s ease;
        }
    }


    .feedbackBtn {
    background-color: #759C75; /* Green background */
    color: white; /* White icon */
    border: none; /* Remove border */
    border-radius: 10px; /* Rounded corners */
    transition: all 0.3s ease; /* Smooth hover effect */
    padding: 10px; /* Add padding for better spacing */
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Hover effect */
.feedbackBtn:hover {
    background-color: black; /* Change background to black */
    color: white; /* Keep icon white */
    transform: scale(1.1); /* Slightly enlarge the button on hover */
}

    .feedback-icon {
        fill: currentColor;
        transition: fill 0.3s ease, transform 0.3s ease;
    }

    .feedbackBtn:hover .feedback-icon {
        fill: #759C75;
        /* Highlight color on hover */
    }


    select:required:invalid {
        color: #666;
    }

    option[value=""][disabled] {
        display: none;
    }

    option {
        color: #000;
    }

    .viewBtn {
        border-color: #759C75 !important;
        color: black !important;
        transition: all 0.3s ease !important;
    }

    .viewBtn:hover {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        color: white !important;
    }

    .submitBtn {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        color: white !important;
        transition: all 0.3s ease !important;
    }

    .submitBtn:hover {
        border-color: #99CC99 !important;
        background-color: #99CC99 !important;
        color: black !important;
    }

    #ClearSearch:hover {
        .close-icon {
            fill: #99CC99 !important;
            transition: all 0.3s ease-in-out;
        }
    }

    .filter-btn {
        color: black;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        width: 240px !important
    }

    .filter-btn.pref {
        color: white;
        cursor: default !important;
        pointer-events: none !important;
        background-color: #759C75;
    }

    .filter-btn.submit:hover {
        color: white !important;
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        transition: all 0.2s ease-in-out;
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

    .form-check input {
        border-color: black !important;
    }

    .form-check input:checked {
        background-color: #759C75 !important;
        transition: all 0.3s ease;
    }

    .star {
        fill: #ccc;
        /* Default star color */
        transition: fill 0.3s ease;
    }

    .star.active {
        fill: gold;
        /* Highlight color for active stars */
    }

    .eval-star {
        fill: currentcolor;
        /* Default color */
        transition: fill 0.3s ease;
        /* Smooth transition */
        cursor: pointer;
        /* Show pointer on hover */
    }

    .eval-star.selected {
        fill: gold;
        /* Keep selected stars gold */
    }

    .eval-star.selected-hover {
        fill: gold;
        /* Keep selected stars gold */
    }

    .eval-star:hover,
    .eval-star:hover~.eval-star {
        fill: gold;
        /* Highlight hovered star and all to the left (this includes the current star and all previous stars) */
    }

    /* Reset the right-side stars when hovering over a new star */
    .eval-star:hover~.eval-star {
        fill: currentcolor;
        /* Reset the stars to the right to the default color */
    }
</style>