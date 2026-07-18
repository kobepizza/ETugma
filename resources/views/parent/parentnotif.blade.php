@extends('layouts.clientmaster')
@section('content')

@php
$page= "Notifications";
@endphp

<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="menu" viewBox="0 -960 960 960">
            <title>menu</title>
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </symbol>
        <symbol id="notif" viewBox="0 -960 960 960">
            <title>notifications</title>
            <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
        </symbol>
        <symbol id="announce" viewBox="0 -960 960 960">
            <title>announcement</title>
            <path d="M720-440v-80h160v80H720Zm48 280-128-96 48-64 128 96-48 64Zm-80-480-48-64 128-96 48 64-128 96ZM200-200v-160h-40q-33 0-56.5-23.5T80-440v-80q0-33 23.5-56.5T160-600h160l200-120v480L320-360h-40v160h-80Zm240-182v-196l-98 58H160v80h182l98 58Zm120 36v-268q27 24 43.5 58.5T620-480q0 41-16.5 75.5T560-346ZM300-480Z" />
        </symbol>
        <symbol id="delete" viewBox="0 -960 960 960">
            <title>delete</title>
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
        </symbol>
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
    </svg>
</head>

<body>

<!--feedback modal-->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Rate Your Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Rating Section -->
                <form method="POST" action="{{ route('parent.feedback') }}">
                    @csrf
                    <input type="hidden" id="tutor_session_id" name="tutor_session_id" value="">

                    <!-- Category 1: Tutor's Performance -->
                    <h5 class="mb-3">Tutor's Performance</h5>
                    <center><small class="text-muted">1 - Very Unsatisfactory | 5 - Very Satisfactory</small></center>
                    @php
                        $performanceCriteria = [
                            'Engagement and Interaction',
                            'Patience and Support',
                            'Preparedness'
                        ];
                    @endphp
                    @foreach ($performanceCriteria as $index => $criteria)
                    <div class="mb-3">
                        <label for="performance_rating_{{ $index }}" class="form-label">{{ $criteria }}</label>
                        <div class="rating-scale d-flex justify-content-between">
                            @for ($i = 1; $i <= 5; $i++)
                            <div class="rating-circle">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="performance_ratings[{{ $index }}]"
                                    id="performance_rating_{{ $index }}_{{ $i }}"
                                    value="{{ $i }}"
                                    required
                                >
                                <label for="performance_rating_{{ $index }}_{{ $i }}">{{ $i }}</label>
                            </div>
                            @endfor
                        </div>
                      
                    </div>
                    @endforeach
                   
                    <!-- Category 2: Session Effectiveness -->

                    @php
                        $effectivenessCriteria = [
                            'Relevance of Content',
                            'Pace of the Session',
                            'Overall Satisfaction'
                        ];
                    @endphp
                    @foreach ($effectivenessCriteria as $index => $criteria)
                    <div class="mb-3">
                        <label for="effectiveness_rating_{{ $index }}" class="form-label">{{ $criteria }}</label>
                        <div class="rating-scale d-flex justify-content-between">
                            @for ($i = 1; $i <= 5; $i++)
                            <div class="rating-circle">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="effectiveness_ratings[{{ $index }}]"
                                    id="effectiveness_rating_{{ $index }}_{{ $i }}"
                                    value="{{ $i }}"
                                    required
                                >
                                <label for="effectiveness_rating_{{ $index }}_{{ $i }}">{{ $i }}</label>
                            </div>
                            @endfor
                        </div>
                    
                    </div>
                    @endforeach

                    <!-- Additional Feedback Textarea -->
                    <div class="mb-3">
                        <label for="feedback" class="form-label">Do you have any additional feedback?</label>
                        <textarea
                            class="form-control"
                            id="feedback"
                            name="feedback"
                            rows="3"
                            placeholder="Your feedback is valuable to us"
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success feedback-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="row w-100">
                <!--contacts-->

                <div class="col-12 col-md-5">
                    <div class="card collapsed shadow rounded-2 mt-2" id="chats">
                        <div class="d-flex justify-content-between align-items-center w-100 p-3" style="height:70px">
                            <h3 class="fw-bold text-truncate">Notifications</h3>
                            <button class="btn d-md-none" data-bs-target="#contactBody" data-bs-toggle="collapse" id="collapseBtn">
                                <svg class="collapse-icon" width="30" height="30" fill="currentcolor">
                                    <use xlink:href="#menu" />
                                </svg>
                            </button>
                        </div>
                        <div class="contacts collapse p-3" id="contactBody" data-bs-parent="#chats">
                            <div class="row row-cols-auto gap-3 px-3 mb-3"> <!--filters-->
                                <div class="col">
                                    <h4 class="mb-0">Filters:</h4>
                                </div>
                                <div class="col">
                                    <div class="row row-cols-auto gap-1">
                                        <div class="col">
                                            <div class="d-flex align-items-center gap-1 mb-0">
                                                <input class="form-check-input filter-check" type="checkbox" value="1" name="notif_filter" id="notif-filter">
                                                <svg class="" height="25" width="25" fill="currentcolor">
                                                    <use xlink:href="#notif" />
                                                </svg>
                                                <p class="mb-0 text-truncate">Notifications</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex align-items-center gap-1 mb-0">
                                                <input class="form-check-input filter-check" type="checkbox" value="3" name="notif_filter" id="announce-filter">
                                                <svg class="" height="25" width="25" fill="currentcolor">
                                                    <use xlink:href="#announce" />
                                                </svg>
                                                <p class="mb-0 text-truncate">Announcements</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-center d-none" id="notifLoad">
                                    <div class="spinner-border text-secondary text-center" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="list-group gap-1 p-2" id="notifList">
                                    <!--APPEND CONTACTS-->
                                </div>
                                <h5 class="p-3 text-center d-none" id="noContact">No notifications yet.</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of contacts-->
                <!--messages-->
                <div class="col-12 col-md-7">
                    <div class="modal fade" id="deleteNotification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteNotificationModal" aria-hidden="true"><!--include tutor id-->
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center p-5">
                                    <div class="vstack gap-4 d-flex align-items-center">
                                        <svg class="" height="50" fill="currentcolor">
                                            <use xlink:href="#info" />
                                        </svg>
                                        <h3>Are you sure you want to delete this notification?</h3>
                                        <div class="hstack align-items-center justify-content-center w-100">
                                            <form method="POST" action="">
                                                @csrf
                                                <input type="hidden" value="" name="deleteNotif"> <!--value from availability-id will be passed here-->
                                                <button class="btn btn-lg btn-view" type="button" data-bs-dismiss="modal">Dismiss</button>
                                                <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm deletion-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow rounded-2 mt-2 px-2" id="content">
                        <div class="card-header message-header bg-white border-0 rounded-4 p-3 mb-5" style="height:70px;">
                            <div class="row gap-2 d-flex align-items-center" style="height:100px">
                                <!--APPEND-->
                                <div class="col d-flex align-items-center gap-2">
                                    <svg id="notifIcon" height="50" width="50" fill="currentcolor">
                                        <use xlink:href="" />
                                    </svg>
                                    <h3 id="notifHead" class="text-capitalize mb-0 text-truncate"></h3>
                                </div>
                                <div class="col d-flex justify-content-end w-100">
                                    <button class="btn p-1 d-none" type="submit" data-notif-id="" id="deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteNotification">
                                        <svg class="notif-type" height="25" width="25" fill="currentcolor">
                                            <use xlink:href="#delete" />
                                        </svg>
                                    </button>
                                </div>
                                <!--end of append-->
                            </div>
                        </div>
                        <div class="card-body message-container" id="notifBody">
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">{{Session::get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">{{Session::get('error')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger alert-dismissible fade show">{{Session::get('fail')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <span class="w-100 h-100 text-center p-5 m-5" id="noNotif">
                                <h5>No notification selected</h5>
                            </span>
                            <div class="d-flex justify-content-center d-none" id="infoLoad">
                                <div class="spinner-border text-secondary text-center" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="p-2" id="notifDetails">

                            </div>
                            <!--APPEND MESSAGES HERE-->
                            <!--END OF MESSAGES-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end of messages-->
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        var activeNotif = null;
        var token = $('input[name="_token"]').val();

        const notifTypeStrings = {
            1: 'Notification',
            3: 'Announcement'
        };
        const notifTypeIcons = {
            1: '#notif',
            3: '#announce'
        };

        function loadNotifs() {
            $.ajax({
                type: 'GET',
                url: '{{ route("load.notif") }}',
                beforeSend: function() {
                    var spinner = $('#notifLoad');
                    spinner.removeClass('d-none');
                },
                success: function(data) {
                    //console.log('Received data:', data);
                    var spinner = $('#notifLoad');
                    spinner.addClass('d-none');

                    if (!data.length) {
                        $('#noContact').removeClass('d-none');
                    } else {
                        $('#noContact').addClass('d-none');
                    }

                    var notifList = document.getElementById('notifList');
                    notifList.innerHTML = ''; // Clear the table

                    $.each(data, function(index, notif) {
                        let notifID = notif.id;
                        let notifType = notif.notification_type;
                        let title = notif.title;
                        let time = moment(notif.created_at).fromNow();
                        let seen = notif.seen;

                        var newNotif =
                            `
                        <button class="list-group-item list-group-item-action notif-item" aria-current="true" type="button" data-notif-id="${notifID}" data-notif-type="${notifType}">
                            <div class="hstack gap-3">
                                <div>
                                    <svg class="" height="30" width="30" fill="currentcolor">
                                        <use xlink:href="${notifTypeIcons[notifType]}" />
                                    </svg>
                                </div>
                                <div class="w-75 overflow-hidden">
                                    <h5 class="mb-1 text-truncate">${notifTypeStrings[notifType]}</h5>
                                    <p class="mb-0 text-truncate">${title}</p><!--notif title-->
                                </div>
                                <div class="hstack align-items-center justify-content-between w-25">
                                    <small class="message_time fw-bold text-truncate">${time}</small><!--notif time-->
                                    <div class="${seen == 0 ? 'seen-status' : '' }"></div><!--notif seen status-->
                                </div>
                            </div>
                        </button>
                        `;
                        notifList.insertAdjacentHTML('beforeend', newNotif);
                    });
                }
            });
        }
        loadNotifs();

        $('#notifList').on('click', '.notif-item', function() {
            $('#notifDetails').html('');
            $('.notif-item').removeClass('active');
            $(this).addClass('active');
            $('#noNotif').addClass('d-none');
            let notifId = $(this).data('notif-id');
            let notifType = $(this).data('notif-type');
            let self = this;

            if (notifType != 3) {
                $('#deleteBtn').removeClass('d-none');
            } else {
                $('#deleteBtn').addClass('d-none');
            }

            activeNotif = notifId;

            //console.log('id:', notifId, 'type:', notifType, 'active:', activeNotif);

            $('#notifIcon use').attr('xlink:href', notifTypeIcons[notifType]);
            $('#notifHead').html(notifTypeStrings[notifType]);
            $('#deleteBtn').attr('data-notif-id', notifId);

            let notifIdValue = $('#deleteBtn').attr('data-notif-id');
            //console.log('delete-value:', notifIdValue); // This should log the value of notifId

            fetchNotifDetails();

            function fetchNotifDetails() {
                $.ajax({
                    type: 'post',
                    url: '{{ route("fetch.notif") }}',
                    data: {
                        notif_id: notifId,
                        notif_type: notifType,
                        _token: token
                    },
                    beforeSend: function() {
                        var spinner = $('#infoLoad');
                        spinner.removeClass('d-none');
                    },
                    success: function(data) {
                        //console.log('Notif Details:', data);

                        $(self).find('.seen-status').remove();

                        var spinner = $('#infoLoad');
                        spinner.addClass('d-none');

                        let notifType = data.type;
                        let bookingId = data.booking_id;
                        let sessionId = data.tutoring_session_id;

                        let detailContainer = $('#notifDetails');
                        detailContainer.html('');
                        //console.log('boooking', bookingId);
                        if (notifType == 1) {
                            if (notifType == 1 && bookingId > 0) {
                                displayBookingNotif(data);
                            } else if (notifType == 1 && bookingId <= 0 && sessionId > 0) {
                                displaySessionNotif(data);
                            } else if (notifType == 1 && bookingId <= 0) {
                                displaySystemNotif(data);
                            }
                        } else if (notifType == 3 && bookingId <= 0) {
                            displayAnnouncement(data);
                        }

                        function displayBookingNotif(data) {
                            let title = data.title;
                            let statusID = data.statusID

                            //console.log('sess', statusID);
                            const statusColor = {
                                '1': 'text-success',
                                '2': 'text-warning',
                                '3': 'text-danger'
                            };
                            let content = data.content;
                            let status = data.status;
                            let tutor = data.tutorFname + ' ' + data.tutorLname;
                            let student = data.childFname + ' ' + data.childLname;
                            let guardian = data.guardianFname + ' ' + data.guardianLname;
                            let subject = data.subject;
                            let year = data.year;
                            let dayTime = data.day + ' ' + data.time;
                            let date = moment(data.date).format('MMMM D, YYYY');
                            let time = moment(data.created_at).format('DD MMM LT');

                            let details =
                                `
                                    <h2 class="title text-center text-capitalize mb-5 fw-bold ${statusColor[statusID]}"> ${title}</h2>
                                    <span class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold">Details:</h5>
                                        <h6>${time}</h6>
                                    </span>
                                    <h5 class="mb-3 status text-capitalize"><span class="fw-bold">Status:</span><span class="${statusColor[statusID]}"> ${status}</span></h5>
                                    <h5 class="mb-3 tutor text-capitalize"><span class="fw-bold">Tutor:</span> ${tutor}</h5>
                                    <h5 class="mb-3 student text-capitalize"><span class="fw-bold">Student:</span> ${student}</h5>
                                    <h5 class="mb-5 guardian text-capitalize"><span class="fw-bold">Parent:</span> ${guardian}</h5>
                                    <h5 class="mb-3 subject text-capitalize"><span class="fw-bold">Subject:</span> ${subject}</h5>
                                    <h5 class="mb-3 subject text-capitalize"><span class="fw-bold">Year Level:</span> ${year}</h5>
                                    <h5 class="mb-3 availability text-capitalize"><span class="fw-bold">Day & Time:</span> ${dayTime}</h5>
                                    <h5 class="date text-capitalize"><span class="fw-bold">Date:</span> ${date}</h5>
                                    <div class="mt-5 ${content !== "" ? '' : 'd-none'}">
                                        <h5 class="mb-3 new-date text-capitalize fw-bold">Remarks:</h5>
                                        <h5 class="mb-3 new-date">${content}</h5>
                                    </div>
                                    `;
                            let payment =
                                `
                                    <div class="d-flex flex-column align-items-center p-4" id="paymentBtn">
                                        <h5 class="mb-3">Please proceed to <span class="fw-bold">Payments</span> to confirm your session.</h5>
                                        <a href="{{ route('parent.transaction', ['openPayments' => 'true']) }}" class="btn d-md-w-25  payment " role="button">Payments</a>
                                    </div>
                                    `;

                            if (statusID == 1) {
                                detailContainer.append(details);
                                detailContainer.append(payment);
                            } else {
                                detailContainer.append(details);
                            }
                        }

                        function displaySessionNotif(data) {

                            let title = data.title;
                            let subject = data.subject;
                            let content = data.content;
                            let year = data.year;
                            let tutor = data.tutor.fname + " " + data.tutor.lname;
                            let student = data.student.fname + " " + data.student.lname;
                            let guardian = data.guardian.fname + " " + data.guardian.lname;
                            let session_type = data.session_type;
                            let session_start = moment(data.session_start).format('MMMM D, YYYY');
                            let session_end = moment(data.session_end).format('MMMM D, YYYY');
                            let status = data.status.status;
                            let statusID = data.status.id;
                            let terminate = data.termination;
                            let tutor_session = data.tutoring_session_id;
                            let time = moment(data.created_at).format('DD MMM LT');


                            const statusColor = {
                                '1': 'text-primary',
                                '2': 'text-success',
                                '3': 'text-danger'
                            };
                            
                            let paymentNotif = false;
                            
                            if(title == "Your payment has been confirmed. Tutoring session may now begin."){
                                paymentNotif = true;
                            }

                            let details =
                                `
                            <h2 class="title text-center text-capitalize mb-5 fw-bold ${statusColor[statusID]}"> ${title}</h2>
                            <span class="mb-4 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold">Details:</h5>
                                <h6>${time}</h6>
                            </span>
                            <h5 class="mb-3 status text-capitalize"><span class="fw-bold">Status:</span><span class="${statusColor[statusID]}"> ${status}</span></h5>
                            <h5 class="mb-3 subject text-capitalize"><span class="fw-bold">Subject:</span> ${subject}</h5>
                            <h5 class="mb-3 subject text-capitalize"><span class="fw-bold">Year Level:</span> ${year}</h5>
                            <h5 class="mb-3 tutor text-capitalize"><span class="fw-bold">Tutor:</span> ${tutor}</h5>
                            <h5 class="mb-3 student text-capitalize"><span class="fw-bold">Student:</span> ${student}</h5>
                            <h5 class="mb-5 guardian text-capitalize"><span class="fw-bold">Parent:</span> ${guardian}</h5>
                            <h5 class="mb-3 start text-capitalize"><span class="fw-bold">Session Start:</span> ${session_start}</h5>
                            <h5 class="mb-5 end text-capitalize"><span class="fw-bold">Session End:</span> ${session_end}</h5>
                            <h5 class="mb-3 content text-capitalize fw-bold ${content !== '' ? '' : 'd-none'}">Remarks:</h5>
                            <h5 class="mb-5 content ${content !== '' ? '' : 'd-none'}">${content}</h5>
                            `;
                           
                            let feedback =
                                `
                                    <div class="d-flex flex-column align-items-center p-4 ${paymentNotif == true ? 'd-none' : ''}" id="paymentBtn" data-tutor-session-id="${tutor_session}">
                                        <h5 class="mb-3">How was your tutoring Session? Give your Tutor a <span class="fw-bold">Feedback</span> </h5>
                                        <a href="" class="btn d-md-w-25  payment " role="button" data-bs-toggle="modal" data-bs-target="#feedbackModal">Feedback</a>
                                    </div>
                                    `;

                            if (statusID == 1 && tutor_session <= 0) {
                                detailContainer.append(details);
                                // detailContainer.append(payment);
                            } else if (statusID == 2) {
                                detailContainer.append(details);
                                detailContainer.append(feedback);

                                // Get the modal and the hidden input field
                                let feedbackModal = document.getElementById('feedbackModal');
                                let tutorSessionIdInput = document.getElementById('tutor_session_id');

                                // Add an event listener to the modal to set the value of the hidden input field when the modal is shown
                                feedbackModal.addEventListener('show.bs.modal', function(event) {
                                    // Get the tutor session ID from the button that triggered the modal
                                    let tutorSessionId = event.relatedTarget.parentNode.getAttribute('data-tutor-session-id');

                                    // Set the value of the hidden input field in the modal
                                    tutorSessionIdInput.value = tutorSessionId;
                                });
                            } else if (statusID == 1 && tutor_session > 0) {
                                detailContainer.append(details);
                            } else if (statusID == 3) {
                                detailContainer.append(details);
                            } else {
                                alert('error loading notification');
                            }

                        }

                        function displaySystemNotif(data) {
                            let title = data.title;
                            let content = data.content;
                            let created_at = moment(data.created_at).format('DD MMM LT');
                            
                            let assessmentNotif = false;
                            
                            if(title === "A tutor has graded an assessment" || title === "A tutor has posted a new assessment"){
                                assessmentNotif = true;
                            }
                            
                            let assessment =
                                `
                                    <div class="d-flex flex-column align-items-center p-4" id="paymentBtn">
                                        <h5 class="mb-3">Proceed to <span class="fw-bold">Assessments</span>.</h5>
                                        <a href="{{ route('parent.assessments') }}" class="btn d-md-w-25  payment " role="button">Assessments</a>
                                    </div>
                                    `;

                            let details =
                                `
                                <h2 class="title text-center text-capitalize mb-5 fw-bold">${title}</h2>
                                    <span class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold">Details:</h5>
                                        <h6>${created_at}</h6>
                                    </span>
                                    <h5 class="mb-3">${content}</h5>
                                `;
                            detailContainer.append(details);
                            
                            if(assessmentNotif == true){
                                detailContainer.append(assessment);
                            }
                        }

                        function displayAnnouncement(data) {
                            let title = data.title;
                            let content = data.content;
                            let created_at = moment(data.created_at).format('DD MMM LT');

                            let details =
                                `
                            <h2 class="title text-center text-capitalize mb-5 fw-bold">${title}</h2>
                                <span class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold">Details:</h5>
                                    <h6>${created_at}</h6>
                                </span>
                                <h5 class="mb-3 fw-bold">Message:</h5>
                                <h5 class="mb-3">${content}</h5>
                            `;
                            detailContainer.append(details);
                        }
                    }
                })
            };

        });

        let originalNotifs;

        $('.filter-check').on('change', function() {
            const notifType = $(this).val();
            const isChecked = $(this).is(':checked');

            const notifList = $('#notifList');

            if (!originalNotifs) {
                originalNotifs = notifList.children().clone(); // store the original list
            }

            if (isChecked) {
                const filteredNotifs = notifList.children().filter(function() {
                    const notifTypeAttr = $(this).attr('data-notif-type');
                    return notifTypeAttr === notifType;
                });
                notifList.html('');
                filteredNotifs.appendTo(notifList);
            } else {
                notifList.html('');
                originalNotifs.appendTo(notifList); // restore the original list
            }
        });

        $('#deleteBtn').on('click', function() {
            var notifId = $(this).attr('data-notif-id');
            $('#deleteNotification input[name="deleteNotif"]').val(notifId);
        });

        $('#deleteNotification').on('submit', function(e) {
            e.preventDefault();
            var deleteModalID = $('#deleteNotification input[name="deleteNotif"]').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.notif') }}",
                data: {
                    notifID: deleteModalID,
                    _token: token
                },
                success: function(data) {
                    //console.log(data.message);

                    let Alert = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `;
                    let alertElement = $(Alert).appendTo('#notifBody'); // Assuming you have a container with class 'alert-container'

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                    loadNotifs();
                    $('#deleteNotification').modal('hide');
                    $('#notifDetails').html('');
                    $('#notifHead').html('');
                    $('#noNotif').removeClass('d-none');
                    $('#notifIcon use').attr('xlink:href', '');
                    $('#notifHead').html('');
                    $('#deleteBtn').attr('data-notif-id', '');
                    $('#deleteBtn').addClass('d-none');
                }
            });
        })

    });
</script>
<script>
    setTimeout(function() {
        $('.alert').remove();
    }, 3000);
</script>

</html>
@endsection
<style>
    #chats {
        transition: all 0.2s ease;
    }

    @media only screen and (max-width:540px) {
        #chats {
            max-height: 500px;
        }
    }

    @media only screen and (min-width:768px) {
        #chats {
            height: 785px;
        }

        #contactBody {
            display: block !important;
        }

        #notifList {
            max-height: 570px !important;
        }
    }

    #content {
        height: 785px !important;
    }

    .seen-status {
        border-radius: 50%;
        height: 10px;
        width: 10px;
        background-color: #FF3838;
    }


    .collapsed[data-bs-parent="#chats"].contacts {
        transition: all 0.15s ease-out !important;
    }

    :not(.collapsed)[data-bs-parent="#chats"].contacts {
        transition: all 0.15s ease-out !important;
    }

    #collapseBtn:hover {
        .collapse-icon {
            fill: #99CC99;
            transition: all 0.3s ease-in-out;
        }
    }

    #notifList {
        overflow-y: auto !important;
        scrollbar-width: thin;
        scroll-behavior: smooth;
        max-height: 300px;
    }

    #notifBody {
        overflow-y: auto !important;
        scrollbar-width: thin;
        scroll-behavior: smooth;
        max-height: 650px;
    }

    #notifList button {
        transition: all 0.5s ease;
    }


    #notifList button.active {
        background-color: #759C75;
        border-color: #759C75;
    }

    #notifList button.active:hover {
        background-color: #759C75;
        border-color: #759C75;
    }

    #notifList button:hover {
        background-color: #99CC99;
        border-color: #99CC99;
        transition: all 0.5s ease;
    }

    input.filter-check[type="checkbox"] {
        height: 18px !important;
        width: 18px !important;
        border-radius: 7px !important;
        border-color: black !important;
        transition: all 0.3s ease;
    }

    input.filter-check[type="checkbox"]:checked {
        background-color: #759C75 !important;
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

    .payment {
        background-color: #759C75 !important;
        color: white !important;
        transition: all 0.3s ease !important;
    }

    .payment:hover {
        background-color: #99CC99 !important;
        color: black !important;
    }

    /*.for feedback modal */
    .rating-scale {
        display: flex;
        justify-content: space-between;
    }

    .rating-circle {
        text-align: center;
        position: relative;
    }

    .rating-circle input[type="radio"] {
        display: none;
        /* Hide default radio */
    }

    .rating-circle label {
        display: inline-block;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        color: #000;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .rating-circle input[type="radio"]:checked+label {
        background-color: #759C75;
        /* Active color */
        color: #fff;
    }

    .rating-circle label:hover {
        background-color: #e0e0e0;
    }

    .feedback-submit {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: white !important;
    }

    .feedback-submit:hover {
        background-color: #99CC99 !important;
        border-color: #99CC99 !important;
        border-radius: 15px !important;
        color: black !important;
        transition: all 0.3s ease-in-out;
    }



</style>