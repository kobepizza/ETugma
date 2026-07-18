@extends('layouts.clientmaster')
@section('content')

@php
$page ='Assessments'
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none; " fill="#000000">
        <symbol id="task" viewBox="0 -960 960 960">
            <title>task</title>
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm80-80h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z" />
        </symbol>
        <symbol id="star" viewBox="0 -960 960 960">
            <title>star</title>
            <path d="m384-334 96-74 96 74-36-122 90-64H518l-38-124-38 124H330l90 64-36 122ZM233-120l93-304L80-600h304l96-320 96 320h304L634-424l93 304-247-188-247 188Zm247-369Z" />
        </symbol>
        <symbol id="calendar" viewBox="0 -960 960 960">
            <title>calendar</title>
            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
        </symbol>
        <symbol id="rubric" viewBox="0 -960 960 960">
            <title>rubric</title>
            <path d="M160-120v-720h640v400H240v80h200v80H240v80h200v80H160Zm456 0L504-232l56-56 56 56 142-142 56 56-198 198ZM240-520h200v-80H240v80Zm280 0h200v-80H520v80ZM240-680h200v-80H240v80Zm280 0h200v-80H520v80Z" />
        </symbol>
        <symbol id="submission" viewBox="0 -960 960 960">
            <title>submission</title>
            <path d="m424-318 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm280-590q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z" />
        </symbol>
        <symbol id="attempt" viewBox="0 -960 960 960">
            <title>attempt</title>
            <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
        </symbol>
        <symbol id="visibility" viewBox="0 -960 960 960">
            <title>visibility</title>
            <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z" />
        </symbol>
        <symbol id="document" viewBox="0 -960 960 960">
            <title>document</title>
            <path d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z" />
        </symbol>
    </svg>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <h4>Assessments</h4>
                <button id="viewHiddenAssessments" class="btn viewBtn d-flex align-items-center gap-1 d-none" data-bs-toggle="modal" data-bs-target="#hiddenAssessments" data-assessment-id="">
                    <svg fill="currentcolor" height="20" width="20">
                        <use xlink:href="#visibility" />
                    </svg>
                    Hidden Assessments
                </button>
            </div>
            <div class="modal fade" tabindex="-1" id="hiddenAssessments" data-bs-backdrop="false">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content" id="asssessment-rubrics">
                        <form action="">
                            <div class="modal-header">
                                <h5 class="modal-title">Hidden Assessments | <span class="" id="hiddenAssessmentName"></span></h5>
                            </div>
                            <div class="modal-body">
                                <section class="px-2" style="max-height:450px; overflow-y:auto; scrollbar-width:thin;">
                                    <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="hiddenLoading">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <ul class="hidden-assessments m-0 p-0" id="hidden-assessment-list">

                                    </ul>
                                    <h5 class="p-3 text-center d-none" id="hiddenNoAssessment">No hidden assessments available.</h5>
                                </section>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn viewBtn dismissHiddenBtn" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="" id="alert-div"></div>
            <section class="mb-3">
                <h6 class="fw-semibold">Load Assessments For</h6>
                <div class="dropdown-center" style="width:280px;">
                    <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" id="studentDrop">
                        Load Assessments For
                    </button>
                    <div class="dropdown-menu filter-menu w-100">
                        <div class="vstack">
                            @foreach ($child as $data)
                            <div class="form-check ms-3 kinder">

                                <input class="form-check-input radio" type="radio" name="child" id="child{{$data->child->id}}" value="{{$data->child->id}}">
                                <label class="form-check-label filter-item" for="child{{$data->child->id}}" id="selectedChildName">
                                    {{ ucwords(strtolower($data->child->fname)) }} {{ ucwords(strtolower($data->child->lname)) }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <input type="hidden" value="" id="selectedChildID">
            </section>
            <div class="modal fade" tabindex="-1" id="rubricPreview" data-bs-backdrop="false">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" id="asssessment-rubrics">
                        <form action="">
                            <div class="modal-header">
                                <h5 class="modal-title">Rubrics</h5>
                            </div>
                            <div class="modal-body">
                                <iframe class="p-1" src="" frameborder="1" style="width:100%; height:500px;" id="RUBRICS"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn viewBtn" data-bs-toggle="modal" data-bs-target="#assessment-modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" id="assessment-modal" data-bs-backdrop="false">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content" id="assessment-body">
                        <div class="modal-header">
                            <h5 class="modal-title">Assessment | <span id="SUBJECT"></span> | <span id="YEAR"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form data-action="{{ route('parent.submit.work') }}" method="POST" enctype="multipart/form-data" id="submitAsssessmentForm">
                                @csrf
                                <div class="row row-cols-auto mb-3">
                                    <div class="col-12 col-lg-7 order-lg-1 order-2 mb-3">
                                        <h6 class="mb-0 text-break" id="TITLE"></h6>
                                        <hr class="border-black border-2 opacity-75">
                                        <div class="shadow-sm p-3 rounded-4 text-break mb-3" style="height:180px; max-height:180px; overflow-y:auto; white-space: pre-wrap;" id="DESCRIPTION">

                                        </div>
                                        <div class="p-2 mb-3">
                                            <a target="_blank" href="" class="btn viewBtn d-flex align-items-center gap-1 d-none" style="width:fit-content;" id="MODULE">
                                                <svg fill="currentcolor" height="20" width="20">
                                                    <use xlink:href="#document" />
                                                </svg>
                                                Open Module
                                            </a>
                                        </div>
                                        <div class="input-group mb-1">
                                            <label class="input-group-text fw-semibold" for="">Submission</label>
                                            <input type="file" class="form-control" name="submission" accept="application/pdf" id="fileSubmit">
                                            <input type="hidden" value="" name="assessmentID" id="ASSESSMENT_ID">
                                            <input type="hidden" value="" name="childID" id="CHILD_ID">
                                            <input type="hidden" value="" name="tutorID" id="TUTOR_ID">
                                        </div>
                                        <p class="mb-1 fw-semibold">Accepted documents: .pdf</p>
                                    </div>
                                    <div class="col-12 col-lg-5 order-lg-2 order-1 mb-3">
                                        <h6 class="mb-0">Details & Information</h6>
                                        <hr class="border-black border-2 opacity-75">
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#calendar" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Due Date:</p>
                                                <p class="mb-0" id="DEADLINE"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#attempt" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Attempts:</p>
                                                <p class="mb-0" id="ATTEMPTS"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#submission" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Submission Status:</p>
                                                <p class="mb-0" id="SUBMISSION_STATUS"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#rubric" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Rubrics:</p>
                                                <button type="button" class="btn viewbtn" data-bs-toggle="modal" data-bs-target="#rubricPreview">View Rubrics</button>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#star" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Grading: <span class="text-success" id="GRADETEXT"></span></p>
                                                <p class="mb-0">1 Nice | 2 Good | 3 Very Good | 4 Excellent | 5 Outstanding</p>
                                                <div class="d-flex align-items-center" id="GRADING">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                            </form>
                            <h6 class="fw-semibold">Submission Preview</h6>
                            <iframe class="p-1" src="" frameborder="1" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" style="width:100%; height:500px; border: 1px solid black;" id="SUBMISSION_PREVIEW"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn viewBtn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn submitBtn confetti-btn" id="SUBMIT_BTN"></button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="assessment-stream" style="max-height:650px; overflow-y:auto; scrollbar-width:thin;">
                <input type="hidden" value="" id="hidden-assessment-id">
                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="loading">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="d-flex w-100 mb-3">
                    <div class="vr opacity-75 text-danger d-none" style="width:3px;" id="past-due-line"></div>
                    <ul class="late-assessments px-3 w-100 d-none" id="past-due-list">
                        <h5 class="text-danger" id="past-due-text">Past Due | <span class="text-dark fw-semibold fs-6">Current date: </span><span class="text-dark fs-6" id="past-due-date"></span></h5>

                    </ul>
                </div>
                <div class="d-flex w-100">
                    <div class="vr opacity-75" style="width:3px; background-color:#759C75;"></div>
                    <ul class="upcoming-assessments w-100 px-3" id="upcoming-list">
                        <h5>Upcoming</h5>

                    </ul>
                </div>
                <h5 class="p-3 text-center d-none" id="noAssessment">No assessments available.</h5>
            </section>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        var hiddenAssessmentBtn = $('#viewHiddenAssessments');
        hiddenAssessmentBtn.addClass('d-none');

        $('.filter-menu input[type="radio"]').on('change', function() {
            var childId = $(this).val();
            var childName = $('#selectedChildName').text();

            $('#selectedChildID').val(childId);
            loadAssessments();
        });
        dropDowns();
    });

    function dropDowns() {
        const dropdownButtons = document.querySelectorAll('.filter-btn');
        const radioInputs = document.querySelectorAll('.radio');
        const hiddenModalName = document.getElementById('hiddenAssessmentName');

        // Add an event listener to each radio input
        radioInputs.forEach((radio) => {
            radio.addEventListener('change', (e) => {
                // Get the selected radio input's label text
                const selectedText = e.target.nextElementSibling.textContent.trim();

                // Get the corresponding dropdown button
                const dropdownButton = e.target.closest('.dropdown-center').querySelector('.filter-btn');

                // Update the dropdown button's text
                dropdownButton.textContent = selectedText;
                hiddenModalName.textContent = selectedText;

                // Close the dropdown
                const dropdown = bootstrap.Dropdown.getInstance(dropdownButton);
                dropdown.hide();
            });

        });
    }

    function loadAssessments() {
        let childId = $('#selectedChildID').val();
        let hiddenAssessmentBtn = $('#viewHiddenAssessments');
        hiddenAssessmentBtn.removeClass('d-none');
        hiddenAssessmentBtn.attr('data-assessment-id', childId);

        $.ajax({
            type: 'GET',
            url: "{{ route('parent.load.assessment') }}",
            data: {
                childId: childId
            },
            beforeSend: function() {
                $('#loading').removeClass('d-none');
                $('#noAssessment').addClass('d-none');
            },
            success: function(data) {
                //console.log('Received data:', data);
                $('#loading').addClass('d-none');

                if (!data.data.length) {
                    $('#noAssessment').removeClass('d-none');
                } else {
                    $('#noAssessment').addClass('d-none');
                }
                buildAssessments(data)
            }
        });
    }

    function buildAssessments(data) {


        var upcomingList = $('#upcoming-list');
        var pastDueList = $('#past-due-list');
        var pastDueLine = $('#past-due-line');
        var pastDueText = $('#past-due-text');
        var pastDueDate = $('#past-due-date');


        pastDueText.addClass('d-none');
        pastDueLine.addClass('d-none');
        pastDueList.find('li').remove();
        upcomingList.find('li').remove();

        var today = moment(new Date())
        var todayString = moment(new Date()).format('dddd, MMMM D, YYYY');

        $.each(data.data, function(index, value) {
            //console.log(value);
            let id = value.id;
            let title = value.title;
            let deadline = moment(value.deadline);
            let deadlineString = moment(value.deadline).format('M/D/YY, h:mm A');
            let subject = value.subject.subjects;
            let gradeStatus = value.assessment_submission_grade[0]?.grade?.mark?.mark ?? '';
            let gradeStatusID = value.assessment_submission_grade[0]?.grade?.grade_status_id ?? '';

            //console.log('grade status:', gradeStatus, 'grade ID:', gradeStatusID);


            let assessment = `
                <li class="assessment-item" data-assessment-id="${id}">
                    <div class="card shadow-sm assessment-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="hstack gap-3 align-items-center w-100" role="button" data-bs-toggle="modal" data-bs-target="#assessment-modal">
                                <svg fill="currentcolor" height="45" width="45">
                                    <use xlink:href="#task" />
                                </svg>
                                <div>
                                    <h5 class="fw-bold">${subject}</h5>
                                    <h6 class="text-break">${title}</h6>
                                    <p class="mb-0 fw-semibold">Grade: <span class="text-success">${gradeStatus}</span></p>
                                    <p class="mb-0"><span class="fw-semibold">Due Date: </span>${deadlineString}</p>
                                </div>
                            </div>
                            <div>
                                <button class="btn dismissBtn ${gradeStatusID == 1 && today.isAfter(deadline) ? '' : 'd-none'}" data-hide-id="${id}" >Hide</button>
                            </div>
                        </div>
                    </div> 
                </li>`;

            if (today.isAfter(deadline)) {
                pastDueList.removeClass('d-none');
                pastDueLine.removeClass('d-none');
                pastDueText.removeClass('d-none');
                pastDueDate.html(todayString);
                pastDueList.append(assessment);
            } else if (today.isBefore(deadline)) {
                upcomingList.append(assessment);
            } else {
                upcomingList.append(assessment);
            }

        });

    }

    function loadHiddenAssessment(hiddenAssessmentId) {
        $.ajax({
            type: 'GET',
            url: "{{ route('parent.load.hidden.assessment') }}",
            data: {
                childId: hiddenAssessmentId
            },
            beforeSend: function() {
                $('#hiddenLoading').removeClass('d-none');
                $('#hiddenNoAssessment').addClass('d-none');
            },
            success: function(data) {
                //console.log('Received data:', data);
                $('#hiddenLoading').addClass('d-none');

                if (!data.length) {
                    $('#hiddenNoAssessment').removeClass('d-none');
                } else {
                    $('#hiddenNoAssessment').addClass('d-none');
                }
                buildHiddenAssessments(data)
            }
        });
    }

    function buildHiddenAssessments(data) {
        let hiddenList = $('#hidden-assessment-list');
        //let hiddenName = $('#hiddenAssessmentName');
        hiddenList.empty();
        //hiddenName.html('');

        $.each(data, function(index, value) {
            //console.log(value);
            let id = value.id;
            let visibility = value.assessment_visibility_status_id;
            let title = value.title;
            let deadlineString = moment(value.deadline).format('M/D/YY, h:mm A');
            let subject = value.subject.subjects;
            let gradeStatus = value.assessment_submission_grade[0]?.grade?.mark?.mark ?? '';
            let gradeStatusID = value.assessment_submission_grade[0]?.grade?.grade_status_id ?? '';
            let childName = value.tutor_session.guardian_main.child.fname + ' ' + value.tutor_session.guardian_main.child.lname;
            //console.log('grade status:', gradeStatus, 'grade ID:', gradeStatusID);

            let assessment = `
                <li class="hidden-assessment-item" data-visibility-id="${visibility}" data-assessment-id="${id}">
                    <div class="card shadow-sm ">
                        <div class="card-body d-flex align-items-center">
                            <div class="hstack gap-3 align-items-center w-100">
                                <svg fill="currentcolor" height="45" width="45">
                                    <use xlink:href="#task" />
                                </svg>
                                <div>
                                    <h5 class="fw-bold">${subject}</h5>
                                    <h6 class="text-break">${title}</h6>
                                    <p class="mb-0 fw-semibold">Grade: <span class="text-success">${gradeStatus}</span></p>
                                    <p class="mb-0"><span class="fw-semibold">Due Date: </span>${deadlineString}</p>
                                </div>
                            </div>
                            <div>
                                <button class="btn viewBtn" type="button" data-bs-toggle="modal" data-bs-target="#assessment-modal">View</button>
                            </div>
                        </div>
                    </div> 
                </li>`;

            hiddenList.append(assessment);
        });
    }

    function displayAssessment(response) {
        //console.log(response);
        const submissionStatus = {
            '1': 'text-success',
            '2': 'text-secondary',
            '3': 'text-danger',
        }
        const submissionText = {
            '1': 'Submit New Attempt',
            '2': 'Submit Attempt',
            '3': 'Submit Late Attempt',
        }
        const submittedFile = {
            '1': '',
            '2': 'd-none',
            '3': '',
        }

        let today = moment(new Date())
        let todayString = moment(new Date()).format('M/D/YY, h:mm A');
        let id = response.data.id;
        let childId = response.data.tutor_session.guardian_main.child_id;
        let tutorId = response.data.tutor_session.tutor_main.tutor.user_profile_id;
        let submission_status = response.data.assessment_status.status;
        let submission_statusID = response.data.assessment_status_id;
        let attempts = response.data.attempts;
        let title = response.data.title;

        let deadline = moment(response.data.deadline);
        let deadlineString = moment(response.data.deadline).format('M/D/YY, h:mm A');

        let description = response.data.description;
        let rubrics = response.data.rubrics;
        let moduleFile = response.data.module;
        let subject = response.data.subject.subjects;
        let yearLevel = response.data.tutor_session.tutor_main.department_year_subject.grade_level.year;
        let submittedWork = response.data.assessment_submission_grade[0]?.submission?.submission ?? '';
        let gradeStatusID = response.data.assessment_submission_grade[0].grade.grade_status_id;
        let grade = response.data.assessment_submission_grade[0]?.grade?.mark_id ?? '';
        let gradeText = response.data.assessment_submission_grade[0]?.grade?.mark?.mark ?? '';
        //console.log('id', id, 'statusID', submission_statusID, 'status', submission_status, 'grade:', grade, 'gradeText', gradeText);
        //console.log('today:', today, 'deadline:', deadline);

       // console.log('child', childId, 'tutor', tutorId);

        let deadlineDisplay;

        if (today.isAfter(deadline)) {
            deadlineDisplay = `${deadlineString} <span class="text-danger">| Past Due</span>`;
        } else if (today.isBefore(deadline)) {
            deadlineDisplay = deadlineString;
        }
        let stars = `
            <svg class="star ${grade >= 1 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade >= 2 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade >= 3 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade >= 4 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade == 5 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            `;

        $('#fileSubmit').wrap('<form>').closest('form').get(0).reset();
        $('#fileSubmit').unwrap();
        $('#fileSubmit').val(''); // reset the file input value
        $('#SUBMISSION_PREVIEW').attr('src', 'about:blank'); // reset the iframe src

        let assessmentID = $('#ASSESSMENT_ID');
        let childID = $('#CHILD_ID');
        let tutorID = $('#TUTOR_ID');
        let subjectTEXT = $('#SUBJECT');
        let yearTEXT = $('#YEAR');
        let titleTEXT = $('#TITLE');
        let descriptionTEXT = $('#DESCRIPTION');
        let deadlineTEXT = $('#DEADLINE');
        let attemptsTEXT = $('#ATTEMPTS');
        let moduleBtn = $('#MODULE');

        let rubricsDocument = $('#RUBRICS');
        let submissionStatusTEXT = $('#SUBMISSION_STATUS');
        let submitButtonTEXT = $('#SUBMIT_BTN');
        let grading = $('#GRADING');
        let gradeTEXT = $('#GRADETEXT');
        let fileInput = $('#fileSubmit');
        let iframe = $('#SUBMISSION_PREVIEW');

        assessmentID.val('');
        childID.val('');
        tutorID.val('');
        subjectTEXT.html('');
        yearTEXT.html('');
        titleTEXT.html('');
        descriptionTEXT.html('');
        deadlineTEXT.html('');
        attemptsTEXT.html('');
        rubricsDocument.attr('src', 'rubrics');
        submissionStatusTEXT.html('');
        submissionStatusTEXT.removeClass();
        submitButtonTEXT.html('');
        grading.html('');
        gradeTEXT.html('');
        moduleBtn.attr('href', '')

        if (attempts == 0) {
            fileInput.prop('disabled', true);
            attemptsTEXT.html(`${attempts} <span class="text-danger">| Max attempts reached</span> `);
        } else if (attempts >= 1) {
            fileInput.prop('disabled', false);
            attemptsTEXT.html(attempts);
        }

        if (gradeStatusID == 1) {
            submitButtonTEXT.prop('disabled', true);
            fileInput.prop('disabled', true);
        } else {
            disableSubmission();
        }

        if (moduleFile && moduleFile.trim() !== "") {
            moduleBtn.removeClass('d-none');
            moduleBtn.attr('href', moduleFile);
        } else {
            moduleBtn.addClass('d-none');
        }

        assessmentID.val(id);
        childID.val(childId);
        tutorID.val(tutorId);
        subjectTEXT.html(subject);
        yearTEXT.html(yearLevel);
        titleTEXT.html(title);
        descriptionTEXT.html(description);
        deadlineTEXT.html(deadlineDisplay);
        rubricsDocument.attr('src', rubrics);
        iframe.attr('src', submittedWork);
        submissionStatusTEXT.html(submission_status);
        submissionStatusTEXT.addClass(submissionStatus[submission_statusID]);
        submitButtonTEXT.html(submissionText[submission_statusID]);
        gradeTEXT.html(gradeText);
        grading.append(stars);
    }

    function clearHiddenAssessments() {
        let hiddenList = $('#hidden-assessment-list');
        hiddenList.empty();
    }

    function clearDisplay() {
        $('#fileSubmit').wrap('<form>').closest('form').get(0).reset();
        $('#fileSubmit').unwrap();
        $('#fileSubmit').val(''); // reset the file input value
        $('#SUBMISSION_PREVIEW').attr('src', 'about:blank'); // reset the iframe src

        let assessmentID = $('#ASSESSMENT_ID')
        let subjectTEXT = $('#SUBJECT');
        let titleTEXT = $('#TITLE');
        let descriptionTEXT = $('#DESCRIPTION');
        let deadlineTEXT = $('#DEADLINE');
        let attemptsTEXT = $('#ATTEMPTS');
        let rubricsDocument = $('#RUBRICS');
        let submissionStatusTEXT = $('#SUBMISSION_STATUS');
        let submitButtonTEXT = $('#SUBMIT_BTN');
        let grading = $('#GRADING');
        let gradeTEXT = $('#GRADETEXT');
        let childID = $('#CHILD_ID');
        let tutorID = $('#TUTOR_ID');

        childID.val('');
        tutorID.val('');
        assessmentID.val('');
        subjectTEXT.html('');
        titleTEXT.html('');
        descriptionTEXT.html('');
        deadlineTEXT.html('');
        attemptsTEXT.html('');
        rubricsDocument.attr('href', '');
        submissionStatusTEXT.html('');
        submissionStatusTEXT.removeClass();
        submitButtonTEXT.html('');
        grading.html('');
        gradeTEXT.html('');
    }

    $('#viewHiddenAssessments').on('click', function() {
        let hiddenAssessmentId = $(this).attr('data-assessment-id');
        //console.log('hidden assessment id', hiddenAssessmentId);
        loadHiddenAssessment(hiddenAssessmentId);

    })

    $('.dismissHiddenBtn').on('click', function() {
        clearHiddenAssessments();
    })

    $('#past-due-list').on('click', '.dismissBtn', function() {
        let hideID = $(this).data('hide-id');
        //console.log('hideID', hideID);

        $.ajax({
            type: 'GET',
            url: "{{ route('parent.hide.assessment') }}",
            data: {
                'hideID': hideID
            },
            success: function(response) {
                //console.log(response);

                if (response.success) {
                    loadAssessments();
                    clearDisplay();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {
                    //console.log(response);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            }
        });
    })

    $('#fileSubmit').on('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var iframe = $('#SUBMISSION_PREVIEW');
            iframe.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    })

    $('#hidden-assessment-list').on('click', '.hidden-assessment-item', function() {
        var assessmentId = $(this).data('assessment-id');
        var visibilityId = $(this).data('visibility-id');
      //  console.log('hidden assessment:', assessmentId)

        $.ajax({
            type: 'GET',
            url: "{{ route('parent.display.assessment') }}",
            data: {
                assessmentID: assessmentId,
                visibilityID: visibilityId
            },
            success: function(response) {
                //console.log(response);
                displayAssessment(response);
            }
        });

    })

    $('#past-due-list, #upcoming-list').on('click', '.assessment-item', function() {

        var assessmentID = $(this).data('assessment-id');
        $('#hidden-assessment-id').val(assessmentID);
        var hiddenAssessmentID = $('#hidden-assessment-id').val();
        //console.log('assessmentID:', hiddenAssessmentID);

        $.ajax({
            type: 'GET',
            url: "{{ route('parent.display.assessment') }}",
            data: {
                assessmentID: hiddenAssessmentID
            },
            success: function(response) {
                //console.log(response);
                displayAssessment(response);
            }
        });

    })

    $('button[data-bs-dismiss="modal"]').on('click', function() {
        clearDisplay();
    })

    //submit form 
    function disableSubmission() {
        $('#SUBMIT_BTN').prop('disabled', true);

        $('#fileSubmit').on('change', function() {
            if ($(this).val() !== '') {
                // If a file is selected, enable the confetti button
                $('#SUBMIT_BTN').prop('disabled', false);
            } else {
                // If no file is selected, disable the confetti button
                $('#SUBMIT_BTN').prop('disabled', true);
            }
        });
    }

    $('#SUBMIT_BTN').on('click', function() {
        $('#submitAsssessmentForm').submit();
    })
    

    $('#submitAsssessmentForm').on('submit', function(e) {
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
                $('#submitAsssessmentForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
             //   console.log(response);
                if (response.success) {
                    $('#submitAsssessmentForm').find('button[type="submit"]').prop('disabled', false);
                    $('#assessment-modal').modal('hide');
                    confetti();

                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.success}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {

                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.error}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                    $('#assessment-modal').modal('hide');
                    $('#submitAsssessmentForm').find('button[type="submit"]').prop('disabled', false);

                }

            },
            error: function(response) {
                $('#submitAsssessmentForm').find('button[type="submit"]').prop('disabled', false);
                $('#assessment-modal').modal('hide');
            }
        })
    })
</script>

</html>

@endsection
<style>
    .assessment-item {
        transition: background-color 0.3s ease, transform 0.2s;
    }

    .assessment-item:hover {
        transform: translateY(-3px);

        .assessment-card {
            background-color: #759C75;
            color: white;
            transition: all 0.3s ease;
        }
    }

    .star {
        fill: currentColor;
    }

    .star.active {
        fill: gold;
    }

    /*Filters*/
    .filter-btn {
        color: black;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        width: 280px !important
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

    .dismissBtn {
        background-color: #99CC99 !important;
        color: black !important;
        transition: all 0.3s ease !important;
    }

    .dismissBtn:hover {
        background-color: white !important;
        color: black !important;
    }
</style>