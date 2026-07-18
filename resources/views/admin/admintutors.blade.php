@extends('layouts.adminmaster')
@section('content')

@php
$page ='Tutors'
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
    </svg>
</head>

<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>View Tutors</h4>
            </div>
            <!--search bar-->
            <section class="d-flex align-items-center justify-content-center ">
                <div class="input-group w-75">
                    <div class="input-group mb-3">
                        <span class="input-group-text border-end-0 rounded-start-3 px-2 bg-secondary-subtle">
                            <svg class="search-icon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#search" />
                            </svg>
                        </span>
                        <input type="text" class="form-control border-start-0 bg-secondary-subtle rounded-end-3 px-1" placeholder="Search Tutors" role="search" id="AsessmentSearch">
                        <button class="btn bg-secondary-subtle rounded-end-3 d-none" type="button" id="ClearSearch">
                            <svg class="close-icon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#close" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
            <!---->
            <div class="" id="alert-div"></div>
            <div class="mb-3">
                <h6 class="fw-semibold">Total Tutor Accounts: <span class="fw-normal badge badge-success p-2 rounded-3 text-dark" id="tutorCount"></span></h6>
            </div>
            <div class="row row-cols-auto align-items-center justify-content-center justify-content-lg-start pb-4">
                <div class="col">
                    <div class="dropdown-center mb-3">
                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterStatusDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Status
                        </button>
                        <div class="dropdown-menu filter-menu w-100">

                            <div class="vstack">
                                <!--day looping-->
                                @foreach($userStatus as $data)
                                <div class="form-check ms-3">
                                    <input class="form-check-input radio" type="radio" name="filterStatus" id="filterStatus{{ $data->id }}" value="{{ $data->id }}"><!--dayID-->
                                    <label class="form-check-label filter-item" for="filterStatus{{ $data->id }}">
                                        {{ $data->status }}
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
                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterEducationDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Education Level
                        </button>
                        <div class="dropdown-menu filter-menu w-100">

                            <div class="vstack">
                                <!--day looping-->
                                @foreach($education as $data)
                                <div class="form-check ms-3">
                                    <input class="form-check-input radio" type="radio" name="filterEducation" id="filterEducation{{ $data->id }}" value="{{ $data->id }}"><!--dayID-->
                                    <label class="form-check-label filter-item" for="filterEducation{{ $data->id }}">
                                        {{ $data->level }}
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
                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterEmploymentDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Employment Type
                        </button>
                        <div class="dropdown-menu filter-menu w-100">

                            <div class="vstack">
                                <!--day looping-->
                                @foreach($employment as $data)
                                <div class="form-check ms-3">
                                    <input class="form-check-input radio" type="radio" name="filterEmployment" id="filterEmployment{{ $data->id }}" value="{{ $data->id }}"><!--dayID-->
                                    <label class="form-check-label filter-item" for="filterEmployment{{ $data->id }}">
                                        {{ $data->type }}
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
                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterSessionDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Session Type
                        </button>
                        <div class="dropdown-menu filter-menu w-100">

                            <div class="vstack">
                                <!--day looping-->
                                @foreach($session as $data)
                                <div class="form-check ms-3">
                                    <input class="form-check-input radio" type="radio" name="filterSession" id="filterSession{{ $data->id }}" value="{{ $data->id }}"><!--dayID-->
                                    <label class="form-check-label filter-item" for="filterSession{{ $data->id }}">
                                        {{ $data->type }}
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
                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterVerificationDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Verification
                        </button>
                        <div class="dropdown-menu filter-menu w-100">

                            <div class="vstack">
                                <!--day looping-->
                                @foreach($verification as $data)
                                <div class="form-check ms-3">
                                    <input class="form-check-input radio" type="radio" name="filterVerification" id="filterVerification{{ $data->id }}" value="{{ $data->id }}"><!--dayID-->
                                    <label class="form-check-label filter-item" for="filterVerification{{ $data->id }}">
                                        {{ $data->verify_status }}
                                    </label>
                                </div>
                                @endforeach
                                <!--end looping-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center justify-content-sm-start col-sm-auto">
                    <button id="clear-filter" type="button" class="btn btn-outline submitBtn mb-3">Clear Filters</button>
                </div>
            </div>
            <section class="mb-3" style="max-height:575px; overflow:auto; scrollbar-width:thin;">
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">USER ID</th>
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">GENDER</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">EMAIL ADDRESS</th>
                            <th scope="col">MOBILE NUMBER</th>
                            <th scope="col">EDUCATION LEVEL</th>
                            <th scope="col">EMPLOYMENT TYPE</th>
                            <th scope="col">SESSION TYPE</th>
                            <th scope="col">VERIFICATION</th>
                            <th scope="col">ACCOUNT CREATION</th>
                            <th scope="col">STATUS</th>
                        </tr>
                    </thead>
                    <tbody id="userTable">

                    </tbody>
                </table>
                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="loading">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <h5 class="p-3 text-center d-none" id="noSearch">No matches.</h5>
                <h5 class="p-3 text-center d-none" id="noSession">No tutors yet.</h5>
            </section>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        loadTutors();
        dropdown();
    });

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

    function loadTutors() {
        $.ajax({
            type: "GET",
            url: "{{route('admin.load.tutor')}}",
            beforeSend: function() {
                $('#loading').removeClass('d-none');
            },
            success: function(data) {
                //console.log(data);
                $('#loading').addClass('d-none');

                if (!data.tutors.length) {
                    $('#noSession').removeClass('d-none');
                } else {
                    $('#noSession').addClass('d-none');
                }
                buildTutors(data);
                buildCount(data);
            }
        })
    }

    function buildTutors(data) {
        let tutorTable = $('#userTable');
        tutorTable.empty();

        const educationLevelClass = {
            '1': 'text-primary',
            '2': 'text-danger',
        }
        const employmentClass = {
            '1': 'text-danger',
            '2': 'text-primary',
        }
        const sessionTypeClass = {
            '1': 'text-primary',
            '2': 'text-danger',
        }
        const verificationClass = {
            '1': 'text-success',
            '2': 'text-secondary',
            '3': 'text-danger'
        }
        const statusClass = {
            '1': 'text-primary',
            '2': 'text-danger',
        }
        const statusCheck = {
            '1': 'checked',
            '2': 'unchecked',
        }

        $.each(data.tutors, function(index, item) {
            //console.log(item);

            let id = item.tutor.user_profile_id;
            let user_id = item.tutor.user_profile.user_id;
            let educationLevelID = item.education_level_id;
            let employmentTypeID = item.tutor.employment_session.employment_type_id;
            let sessionTypeID = item.tutor.employment_session.session_type_id;
            let verificationID = item.tutor.verification_status_id;
            let userStatusID = item.tutor.user_profile.user_status_id;

            let fname = item.tutor.user_profile.fname;
            let lname = item.tutor.user_profile.lname;
            let gender = item.tutor.user_profile.gender.gender;
            let address = item.tutor.user_profile.municipality + ', ' + item.tutor.user_profile.country;
            let email = item.tutor.user_profile.email;
            let cpnum = item.tutor.user_profile.contact_num;
            let educationLevel = item.education_level.level;
            let employmentType = item.tutor.employment_session.employment_type.type;
            let sessionType = item.tutor.employment_session.session_type.type;
            let verification = item.tutor.verification_status.verify_status;
            let userStatus = item.tutor.user_profile.user_status.status;
            let accountCreation = moment(item.tutor.user_profile.created_at).format('M/DD/YYYY');

            let tableData = `
                <tr class="text-center" data-id="${id}" data-status-id="${userStatusID}" data-education-id="${educationLevelID}" data-employment-id="${employmentTypeID}" data-session-id="${sessionTypeID}" data-verification-id="${verificationID}">
                    <td class="text-capitalize">${user_id}</td>
                    <td class="text-capitalize">${fname}</td>
                    <td class="text-capitalize">${lname}</td>
                    <td class="">${gender}</td>
                    <td class="">${address}</td>
                    <td class="">${email}</td>
                    <td class="">${cpnum}</td>
                    <td class="${educationLevelClass[educationLevelID]}">${educationLevel}</td>
                    <td class="${employmentClass[employmentTypeID]}">${employmentType}</td>
                    <td class="${sessionTypeClass[sessionTypeID]}">${sessionType}</td>
                    <td class="${verificationClass[verificationID]}">${verification}</td>
                    <td>${accountCreation}</td>
                    <td class="${statusClass[userStatusID]}">${userStatus}</td>
                </tr>
                `;
            tutorTable.append(tableData);
        })
    }

    function buildCount(data) {
        let tutorCountText = $('#tutorCount');
        tutorCountText.html('');

        let tutorCount = data.tutorCount;

        tutorCountText.html(tutorCount);
    }

    $('#userTable').on('click', '.status-switch', function(e) {
        e.preventDefault();

        var userID = $(this).data('id');
        var userStatusID = $(this).data('status-id');

        var hiddenID = $('#hiddenUserID');
        var switchText = $('#switchText');
        var textarea = $('#switchPlaceholder');

        const message = {
            '1': 'Are you sure you want to deactivate this user?',
            '2': 'Are you sure you want to activate this user?'
        }
        const placeholder = {
            '1': 'Reason for deactivation',
            '2': 'Remarks'
        }

        let modalMessage = message[userStatusID];
        let modalPlaceholder = placeholder[userStatusID];

        hiddenID.val(userID);
        switchText.html(modalMessage);
        textarea.attr('placeholder', modalPlaceholder);

        let showHidden = hiddenID.val();

        $('#switchModal').modal('show');

        //console.log('user ID:', showHidden, 'user status ID:', userStatusID);
    })

    $('#userTable').on('click', '.message', function() {
        var userID = $(this).data('id');
        var userName = $(this).data('name');

        var hiddenID = $('#hiddenMessageID');
        var recepient = $('#messageName');

        hiddenID.val(userID);
        recepient.html(userName);

        //console.log('user ID:', userID, 'recepient:', userName);
    })

    //search
    $('#AsessmentSearch').on('keyup', function() {
        var searchQuery = $(this).val().trim();
        var clearBtn = $('#ClearSearch');
        var searchBox = $('#AsessmentSearch');

        if (searchQuery != '') {
            searchContacts(searchQuery);
            clearBtn.removeClass('d-none');
            searchBox.removeClass('rounded-end-3');
        } else {
            clearSearchResults();
        }
    });

    $('#ClearSearch').on('click', function() {
        clearSearchResults();
    });

    function clearSearchResults() {
        var searchBox = $('#AsessmentSearch');
        var clearBtn = $('#ClearSearch');
        var noResult = $('#noSearch');
        var assessmentTable = $('#userTable');
        searchBox.val('');
        searchBox.addClass('rounded-end-3');
        clearBtn.addClass('d-none');
        noResult.addClass('d-none');
        assessmentTable.empty();
        loadTutors();
    };

    function searchContacts(searchQuery) {
        $.ajax({
            type: 'GET',
            url: "{{ route('admin.view.search.tutor')}}",
            data: {
                query: searchQuery
            },
            beforeSend: function() {
                var spinner = $('#loading');
                spinner.removeClass('d-none');
            },
            success: function(data) {

                var spinner = $('#loading');
                spinner.removeClass('d-none');

                if (!data.length) {
                    $('#noSearch').removeClass('d-none');

                    if (!$('#noSession').hasClass('d-none')) {
                        $('#noSession').addClass('d-none');
                    }

                } else {
                    $('#noSearch').addClass('d-none');
                }
                displaySearchResults(data);
            },
            complete: function() {
                var spinner = $('#loading');
                spinner.addClass('d-none');

                var noResults = $('#loading');
                noResults.addClass('d-none');
            }
        })
    };

    function displaySearchResults(data) {
        //console.log('search success!');

        var spinner = $('#loading');
        spinner.removeClass('d-none');

        let tutorTable = $('#userTable');
        tutorTable.empty();

        const educationLevelClass = {
            '1': 'text-primary',
            '2': 'text-danger',
        }
        const employmentClass = {
            '1': 'text-danger',
            '2': 'text-primary',
        }
        const sessionTypeClass = {
            '1': 'text-primary',
            '2': 'text-danger',
        }
        const verificationClass = {
            '1': 'text-success',
            '2': 'text-secondary',
            '3': 'text-danger'
        }
        const statusClass = {
            '1': 'text-primary',
            '2': 'text-danger',
        }
        const statusCheck = {
            '1': 'checked',
            '2': 'unchecked',
        }

        $.each(data, function(index, item) {
            //console.log('search result', item);

            let id = item.tutor.user_profile_id;
            let user_id = item.tutor.user_profile.user_id;
            let educationLevelID = item.education_level_id;
            let employmentTypeID = item.tutor.employment_session.employment_type_id;
            let sessionTypeID = item.tutor.employment_session.session_type_id;
            let verificationID = item.tutor.verification_status_id;
            let userStatusID = item.tutor.user_profile.user_status_id;

            let fname = item.tutor.user_profile.fname;
            let lname = item.tutor.user_profile.lname;
            let gender = item.tutor.user_profile.gender.gender;
            let address = item.tutor.user_profile.municipality + ', ' + item.tutor.user_profile.country;
            let email = item.tutor.user_profile.email;
            let cpnum = item.tutor.user_profile.contact_num;
            let educationLevel = item.education_level.level;
            let employmentType = item.tutor.employment_session.employment_type.type;
            let sessionType = item.tutor.employment_session.session_type.type;
            let verification = item.tutor.verification_status.verify_status;
            let userStatus = item.tutor.user_profile.user_status.status;
            let accountCreation = moment(item.tutor.user_profile.created_at).format('M/DD/YYYY');

            let tableData = `
                <tr class="text-center" data-id="${id}" data-status-id="${userStatusID}" data-education-id="${educationLevelID}" data-employment-id="${employmentTypeID}" data-session-id="${sessionTypeID}" data-verification-id="${verificationID}">
                    <td class="text-capitalize">${user_id}</td>
                    <td class="text-capitalize">${fname}</td>
                    <td class="text-capitalize">${lname}</td>
                    <td class="">${gender}</td>
                    <td class="">${address}</td>
                    <td class="">${email}</td>
                    <td class="">${cpnum}</td>
                    <td class="${educationLevelClass[educationLevelID]}">${educationLevel}</td>
                    <td class="${employmentClass[employmentTypeID]}">${employmentType}</td>
                    <td class="${sessionTypeClass[sessionTypeID]}">${sessionType}</td>
                    <td class="${verificationClass[verificationID]}">${verification}</td>
                    <td>${accountCreation}</td>
                    <td class="${statusClass[userStatusID]}">${userStatus}</td>
                </tr>
                `;
            tutorTable.append(tableData);
        })

    };
    //

    //filter 
    $('input[name="filterStatus"], input[name="filterEducation"], input[name="filterEmployment"], input[name="filterSession"], input[name="filterVerification"]').on('change', function() {
        let statusId = $('input[name="filterStatus"]:checked').val() || '';
        let educationId = $('input[name="filterEducation"]:checked').val() || '';
        let employmentId = $('input[name="filterEmployment"]:checked').val() || '';
        let sessionId = $('input[name="filterSession"]:checked').val() || '';
        let verificationId = $('input[name="filterVerification"]:checked').val() || '';

        $('#userTable tr').hide(); // Hide all rows initially

        // Build selector for filtering based on available values
        let selector = '#userTable tr';

        if (statusId) {
            selector += '[data-status-id="' + statusId + '"]';
        }
        if (educationId) {
            selector += '[data-education-id="' + educationId + '"]';
        }
        if (employmentId) {
            selector += '[data-employment-id="' + employmentId + '"]';
        }
        if (sessionId) {
            selector += '[data-session-id="' + sessionId + '"]';
        }
        if (verificationId) {
            selector += '[data-verification-id="' + verificationId + '"]';
        }

        // Show matching rows
        $(selector).show();

        // If no filters are selected, show all rows
        if (!statusId && !educationId && !employmentId && !sessionId && !verificationId) {
            $('#userTable tr').show();
        }
    });

    $('#clear-filter').on('click', function() {
        var filterStatus = $('#filterStatusDrop');
        var filterEducation = $('#filterEducationDrop');
        var filterEmployment = $('#filterEmploymentDrop');
        var filterSession = $('#filterSessionDrop');
        var filterVerification = $('#filterVerificationDrop');

        filterStatus.text('Status');
        filterEducation.text('Education Level');
        filterEmployment.text('Employment Type');
        filterSession.text('Session Type');
        filterVerification.text('Verification');

        filterStatus.dropdown('hide');
        filterEducation.dropdown('hide');
        filterEmployment.dropdown('hide');
        filterSession.dropdown('hide');
        filterVerification.dropdown('hide');

        $('input[name="filterStatus"],input[name="filterEducation"],input[name="filterEmployment"],input[name="filterSession"],input[name="filterVerification"]').prop('checked', false);
        $('#userTable tr').show(); // modified to show all table rows
    });
    //
</script>

</html>
@endsection
<style>
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
        fill: currentColor;
    }

    .star.active {
        fill: gold;
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