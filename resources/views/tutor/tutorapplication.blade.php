@extends('layouts.tutormaster')
@section('content')
@php
$page="Applications";
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
        <symbol id="school" viewBox="0 -960 960 960">
            <title>school</title>
            <path d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z" />
        </symbol>
        <symbol id="location" viewBox="0 -960 960 960">
            <title>location</title>
            <path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
        </symbol>
        <symbol id="session" viewBox="0 -960 960 960">
            <title>session</title>
            <path d="M160-200v-440 440-15 15Zm0 80q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v171q-18-13-38-22.5T800-508v-132H160v440h283q3 21 9 41t15 39H160Zm240-600h160v-80H400v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm20-208v-112h-40v128l86 86 28-28-74-74Z" />
        </symbol>
        <symbol id="modality" viewBox="0 -960 960 960">
            <title>modality</title>
            <path d="m352-522 86-87-56-57-44 44-56-56 43-44-45-45-87 87 159 158Zm328 329 87-87-45-45-44 43-56-56 43-44-57-56-86 86 158 159Zm24-567 57 57-57-57ZM290-120H120v-170l175-175L80-680l200-200 216 216 151-152q12-12 27-18t31-6q16 0 31 6t27 18l53 54q12 12 18 27t6 31q0 16-6 30.5T816-647L665-495l215 215L680-80 465-295 290-120Zm-90-80h56l392-391-57-57-391 392v56Zm420-419-29-29 57 57-28-28Z" />
        </symbol>
        <symbol id="subject" viewBox="0 -960 960 960">
            <title>subject</title>
            <path d="M240-80q-50 0-85-35t-35-85v-560q0-50 35-85t85-35h440v640H240q-17 0-28.5 11.5T200-200q0 17 11.5 28.5T240-160h520v-640h80v720H240Zm120-240h240v-480H360v480Zm-80 0v-480h-40q-17 0-28.5 11.5T200-760v447q10-3 19.5-5t20.5-2h40Zm-80-480v487-487Z" />
        </symbol>
        <symbol id="level" viewBox="0 -960 960 960">
            <title>level</title>
            <path d="M220-464 64-620l156-156 156 156-156 156ZM360-80v-200q-61-5-121-14.5T120-320l20-80q84 23 168.5 31.5T480-360q87 0 171.5-8.5T820-400l20 80q-59 16-119 25.5T600-280v200H360ZM220-576l44-44-44-44-44 44 44 44Zm260-104q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35Zm0 280q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-360q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Zm202 280-68-120 68-120h136l68 120-68 120H682Zm46-80h44l22-40-22-40h-44l-22 40 22 40Zm-508-60Zm260-180Zm270 200Z" />
        </symbol>
        <symbol id="language" viewBox="0 -960 960 960">
            <title>language</title>
            <path d="m476-80 182-480h84L924-80h-84l-43-122H603L560-80h-84ZM160-200l-56-56 202-202q-35-35-63.5-80T190-640h84q20 39 40 68t48 58q33-33 68.5-92.5T484-720H40v-80h280v-80h80v80h280v80H564q-21 72-63 148t-83 116l96 98-30 82-122-125-202 201Zm468-72h144l-72-204-72 204Z" />
        </symbol>
        <symbol id="style" viewBox="0 -960 960 960">
            <title>style</title>
            <path d="m280-620 80-80-80-80-80 80 80 80Zm200-40ZM160-400q-33 0-56.5-23.5T80-480v-360q0-33 23.5-56.5T160-920h640q33 0 56.5 23.5T880-840v360q0 33-23.5 56.5T800-400H671q6-20 8-40t0-40h121v-360H160v360h121q-2 20 0 40t8 40H160Zm500-280q25 0 42.5-17.5T720-740q0-25-17.5-42.5T660-800q-25 0-42.5 17.5T600-740q0 25 17.5 42.5T660-680ZM200-40v-84q0-35 19.5-65t51.5-45q49-23 102-34.5T480-280q54 0 107 11.5T689-234q32 15 51.5 45t19.5 65v84H200Zm80-80h400v-4q0-12-7-22t-18-15q-42-19-86-29t-89-10q-45 0-89 10t-86 29q-11 5-18 15t-7 22v4Zm200-200q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T540-460q0-25-17.5-42.5T480-520q-25 0-42.5 17.5T420-460q0 25 17.5 42.5T480-400Zm0-60Zm0 340Z" />
        </symbol>
        <symbol id="check" viewBox="0 -960 960 960">
            <title>check</title>
            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
        </symbol>
        <symbol id="bday" viewBox="0 -960 960 960">
            <title>bday</title>
            <path d="M160-80q-17 0-28.5-11.5T120-120v-200q0-33 23.5-56.5T200-400v-160q0-33 23.5-56.5T280-640h160v-58q-18-12-29-29t-11-41q0-15 6-29.5t18-26.5l56-56 56 56q12 12 18 26.5t6 29.5q0 24-11 41t-29 29v58h160q33 0 56.5 23.5T760-560v160q33 0 56.5 23.5T840-320v200q0 17-11.5 28.5T800-80H160Zm120-320h400v-160H280v160Zm-80 240h560v-160H200v160Zm80-240h400-400Zm-80 240h560-560Zm560-240H200h560Z" />
        </symbol>
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="rs" viewBox="0 -960 960 960">
            <title>relation</title>
            <path d="M40-160v-160q0-34 23.5-57t56.5-23h131q20 0 38 10t29 27q29 39 71.5 61t90.5 22q49 0 91.5-22t70.5-61q13-17 30.5-27t36.5-10h131q34 0 57 23t23 57v160H640v-91q-35 25-75.5 38T480-200q-43 0-84-13.5T320-252v92H40Zm440-160q-38 0-72-17.5T351-386q-17-25-42.5-39.5T253-440q22-37 93-58.5T480-520q63 0 134 21.5t93 58.5q-29 0-55 14.5T609-386q-22 32-56 49t-73 17ZM160-440q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T280-560q0 50-34.5 85T160-440Zm640 0q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T920-560q0 50-34.5 85T800-440ZM480-560q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-680q0 50-34.5 85T480-560Z" />
        </symbol>
        <symbol id="user" viewBox="0 -960 960 960">
            <title>user</title>
            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Client Applications</h4>
            </div>

            <section class="p-5 result-section" style="overflow-y:auto; max-height:780px; scrollbar-width:thin;"> <!--Results-->
                <div class="alert-container">
                    @if(Session::has('success'))
                    <div class="alert alert-success fade show session-alert">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger fade show session-alert">{{Session::get('error')}}</div>
                    @endif
                </div>
                @if(session('tutorMain')->tutor->verification_status_id == 1)
                <!--foreach loop-->
                <div class="row row-cols-auto gap-1 result-container">
                    @forelse($applicants as $data)
                    @php
                    $found = false;
                    foreach($tutorSession as $session) {
                    if($session->guardian_main_id == $data->guardian_main_id && $session->tutor_main_id == $data->tutor_main_id) {
                    if ($data->booking_status_id == 2 && $session->session_status_id == 1) {
                    $found = true; // Hide this tutor application
                    break;
                    }
                    }
                    }
                    @endphp
                    @if(!$found)
                    <div class="col-auto mb-5">
                        <!--modals-->
                        <!--CLIENT DETAILS-->
                        <div class="modal fade" id="detailModal{{$data->id}}" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="detailModalLabel" tabindex="-1"><!--include tutor id-->
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header text-black">
                                        <h1 class="modal-title fs-5">Client Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="header container-fluid mb-5 text-white" style="background-color:#759C75;">
                                            <div class="hstack gap-2">
                                                <div class="modal-profile-pic-holder">
                                                    <img src="{{ asset($data->guardianMain->child->profile_pic)}}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--profile pic-->
                                                </div>
                                                <!--Header Content-->
                                                <div class="vstack d-flex align-items-start">
                                                    <h1 class="d-flex align-items-center">
                                                        <svg class="verified-icon">
                                                            <use xlink:href="#verified" />
                                                        </svg>
                                                        {{ ucwords(strtolower($data->guardianMain->child->fname)) ." ". ucwords(strtolower($data->guardianMain->child->lname)) }} <!--Complete Name-->
                                                    </h1>
                                                    <h4 class="d-flex align-items-center">
                                                        <svg fill="currentcolor" height="30" width="50">
                                                            <use xlink:href="#school" />
                                                        </svg>
                                                        {{ ucwords(strtolower($data->guardianMain->child->school)) }} <!--School-->
                                                    </h4>
                                                    <h4 class="d-flex align-items-center">
                                                        <svg fill="currentcolor" height="30" width="50">
                                                            <use xlink:href="#location" />
                                                        </svg>
                                                        {{ ucwords(strtolower($data->guardianMain->guardian->userProfile->municipality)) .", ". ucwords(strtolower($data->guardianMain->guardian->userProfile->country)) }} <!--City & Country -->
                                                    </h4>
                                                </div>
                                                <!---->
                                            </div>
                                        </div>
                                        <div class="container-fluid py-5 mt-5">
                                            <!--preferences-->
                                            <section class="p-3">
                                                <div class="hstack gap-2">
                                                    <div class="vstack gap-1">
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#modality" />
                                                            </svg>
                                                            @foreach ($data->guardianMain->preferenceLanguage->preference as $datas)
                                                            {{$datas->modality->modality}}
                                                            @endforeach
                                                        </h4>
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#style" />
                                                            </svg>
                                                            @foreach ($data->guardianMain->preferenceLanguage->preference as $datas)
                                                            {{$datas->teachingStyle->style}}
                                                            @endforeach
                                                        </h4>

                                                        @if ($data->guardianMain->preferenceLanguage->languages == 1)
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#language" />
                                                            </svg>
                                                            English<!--language -->
                                                        </h4>
                                                        @elseif ($data->guardianMain->preferenceLanguage->languages == 2)
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#language" />
                                                            </svg>
                                                            Filipino<!--language -->
                                                        </h4>
                                                        @else
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#language" />
                                                            </svg>
                                                            English & Filipino<!--language -->
                                                        </h4>
                                                        @endif
                                                    </div>
                                                    <div class="vstack gap-1">
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#session" />
                                                            </svg>
                                                            {{ session('tutorMain') ? session('tutorMain')->tutor->employmentSession->sessionType->type: 'N/A' }} <!--session type -->
                                                        </h4>
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#subject" />
                                                            </svg>
                                                            {{ session('tutorMain') ? session('tutorMain')->departmentYearSubject->subject->subjects: 'N/A' }}<!--subject -->
                                                        </h4>
                                                        <h4 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#level" />
                                                            </svg>
                                                            {{ session('tutorMain') ? session('tutorMain')->departmentYearSubject->gradeLevel->year: 'N/A' }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </section>
                                            <!---->
                                            <!--selected availability-->
                                            <section class="py-1 px-3">
                                                <div class="vstack gap-2 justify-content-center">
                                                    <span class="card-text mb-0 d-flex align-items-center gap-2">
                                                        <h5 class="fw-bold">Selected Availability:</h5>
                                                        <h5>{{ $data->bookingAvailability->day->day }},</h5>
                                                        <h5>{{ $data->bookingAvailability->availabilityStart->availability}} - {{ $data->bookingAvailability->availabilityEnd->availability}}</h5>
                                                    </span>
                                                    <span class="card-text mb-0 d-flex align-items-center gap-2">
                                                        <h5 class="fw-bold">Selected Start Date:</h5>
                                                        <h5>{{ \Carbon\Carbon::parse($data->session_start_date)->format('l, F j, Y') }}</h5>
                                                    </span>
                                                    @if(session('tutorMain')->tutor->employmentSession->session_type_id == 2 && $data->session_end_date !== null)
                                                    <span class="card-text mb-0 d-flex align-items-center gap-2">
                                                        <h5 class="fw-bold">Selected End Date:</h5>
                                                        <h5>{{ \Carbon\Carbon::parse($data->session_end_date)->format('l, F j, Y') }}</h5>
                                                    </span>
                                                    @endif
                                                </div>
                                            </section>
                                            <!---->
                                            <!--guardian information-->
                                            <section class="px-3">
                                                <hr>
                                                <h5 class="fw-bold mb-3">Parent Information</h5>
                                                <div class="hstack gap-2 d-flex align-items-center mb-0">
                                                    <div class="guardian-profile-pic-holder">
                                                        <img src="{{ asset($data->guardianMain->guardian->userProfile->profile_pic)}}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--profile pic-->
                                                    </div>
                                                    <div class="vstack gap-1 justify-content-center">
                                                        <span class="card-text mb-0 d-flex align-items-center gap-2">
                                                            <h5 class="fw-bold">Name:</h5>
                                                            <h5>{{ ucwords(strtolower($data->guardianMain->guardian->userProfile->fname)) }} {{ ucwords(strtolower($data->guardianMain->guardian->userProfile->lname)) }}</h5> <!--guardian name-->
                                                        </span>
                                                        <span class="card-text mb-0 d-flex align-items-center gap-2">
                                                            <h5 class="fw-bold">Relation:</h5>
                                                            <h5>{{$data->guardianMain->guardian->relation->relation}}</h5> <!--guardian relation-->
                                                        </span>
                                                    </div>
                                                </div>
                                            </section>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 float-end">
                                            <button class="btn btn-lg btn-view" type="button" data-bs-dismiss="modal"">Dismiss</button>
                                                        <button class=" btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#inViewdeclineModal{{$data->id}}">Decline</button>
                                            <button class="btn btn-lg btn-book" type="button" data-bs-toggle="modal" data-bs-target="#inViewconfirmModal{{$data->id}}"">Accept</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END OF CLIENT DETAILS-->
                                    <!--CONFIRM MODAL-->
                                    <div class=" modal fade" id="confirmModal{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center p-5">
                                                            <div class="vstack gap-4 d-flex align-items-center">
                                                                <svg class="" height="50" fill="currentcolor">
                                                                    <use xlink:href="#info" />
                                                                </svg>
                                                                <span>
                                                                    <h3>Are you sure you want to accept this client?</h3>
                                                                    <p class="text-danger mb-0"><span class="fw-bold">Reminder: </span>Please confirm the dates before accepting the application. If schedule conflicts require changes, kindly state the reason to inform the client.</p>
                                                                </span>
                                                                <div class="vstack gap-2 align-items-center justify-content-center w-100">
                                                                    <form class="m-0 p-0 w-100" method="POST" action="{{route('tutor.applicants')}}">
                                                                        @csrf
                                                                        <input type="hidden" value="{{$data->id}}" name="bookingId"><!--booking ID-->
                                                                        <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                                            <div class="mb-3">
                                                                                <label>Confirm Start Date</label>
                                                                                <input type="date" class="form-control date-picker confirm-start-dates" name="confirmStartDate" min="{{$data->session_start_date}}" data-session-type="{{ session('tutorMain')->tutor->employmentSession->session_type_id }}" data-start-date="{{$data->session_start_date}}" data-end-date="{{ $data->session_end_date ?? null }}" value="{{$data->session_start_date}}">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label>Confirm End Date</label>
                                                                                <input type="date" class="form-control date-picker confirm-end-dates" name="confirmEndDate" value="{{$data->session_end_date}}" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <textarea class="form-control mb-3" name="reasonChange" placeholder="Reason for changes" id="reasonChange"></textarea>
                                                                        <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                                            <button class="btn btn-lg btn-view" type="button" data-bs-dismiss="modal">Dismiss</button>
                                                                            <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm booking-->
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <!--END OF CONFIRM MODAL-->
                                        <!--IN VIEW CONFIRM MODAL-->
                                        <div class="modal fade" id="inViewconfirmModal{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="vstack gap-4 d-flex align-items-center">
                                                            <svg class="" height="50" fill="currentcolor">
                                                                <use xlink:href="#info" />
                                                            </svg>
                                                            <span>
                                                                <h3>Are you sure you want to accept this client?</h3>
                                                                <p class="text-danger mb-0"><span class="fw-bold">Reminder: </span>Please confirm the dates before accepting the application. If schedule conflicts require changes, kindly state the reason to inform the client.</p>
                                                            </span>
                                                            <div class="vstack gap-2 align-items-center justify-content-center w-100">
                                                                <form class="m-0 p-0 w-100" method="POST" action="{{route('tutor.applicants')}}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$data->id}}" name="bookingId"><!--booking ID-->
                                                                    <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                                        <div class="mb-3">
                                                                            <label>Confirm Start Date</label>
                                                                            <input type="date" class="form-control date-picker confirm-start-dates" name="confirmStartDate" min="{{$data->session_start_date}}" data-session-type="{{ session('tutorMain')->tutor->employmentSession->session_type_id }}" data-start-date="{{$data->session_start_date}}" data-end-date="{{ $data->session_end_date ?? null }}" value="{{$data->session_start_date}}">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label>Confirm End Date</label>
                                                                            <input type="date" class="form-control confirm-end-dates" name="confirmEndDate" value="{{$data->session_end_date}}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <textarea class="form-control mb-3" name="reasonChange" placeholder="Reason for changes" id="reasonChange"></textarea>
                                                                    <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                                        <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">Dismiss</button>
                                                                        <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm booking-->
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--END OF CONFIRM MODAL-->
                                        <!--IN VIEW DECLINE MODAL-->
                                        <div class="modal fade" id="inViewDeclineModal{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="vstack gap-4 d-flex align-items-center">
                                                            <svg class="" height="50" fill="currentcolor">
                                                                <use xlink:href="#info" />
                                                            </svg>
                                                            <span>
                                                                <h3>Are you sure you want to decline this client?</h3>
                                                                <p class="text-danger mb-0">Please state the reason for declining application.</p>
                                                            </span>
                                                            <div class="vstack gap-2 align-items-center justify-content-center w-100">
                                                                <form class="m-0 p-0 w-100" method="POST" action="{{route('applicant.delete')}}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$data->id}}" name="deleteBookingId"><!--booking ID-->
                                                                    <textarea class="form-control mb-3" name="reasonDecline" placeholder="Reason for declining" id="reasonDecline" required></textarea>
                                                                    <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                                        <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">Dismiss</button>
                                                                        <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm booking-->
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--END OF DECLINE MODAL-->
                                        <!--DECLINE MODAL-->
                                        <div class="modal fade" id="DeclineModal{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="vstack gap-4 d-flex align-items-center">
                                                            <svg class="" height="50" fill="currentcolor">
                                                                <use xlink:href="#info" />
                                                            </svg>
                                                            <span>
                                                                <h3>Are you sure you want to decline this client?</h3>
                                                                <p class="text-danger mb-0">Please state the reason for declining application.</p>
                                                            </span>
                                                            <div class="vstack gap-2 align-items-center justify-content-center w-100">
                                                                <form class="m-0 p-0 w-100" method="POST" action="{{route('applicant.delete')}}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$data->id}}" name="deleteBookingId"><!--booking ID-->
                                                                    <textarea class="form-control mb-3" name="reasonDecline" placeholder="Reason for declining" id="reasonDecline" required></textarea>
                                                                    <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                                        <button class="btn btn-lg btn-view" type="button" data-bs-dismiss="modal">Dismiss</button>
                                                                        <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm booking-->
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--END OF DECLINE MODAL-->
                                        <!--end of modals-->
                                        <!--CARDS-->
                                        <div class="card rounded-5 shadow-lg border-0 mb-3 tutor-card" style="width:35rem; height:31rem;">
                                            <div class="card-header d-flex align-items-center rounded-top-5 mb-1 text-white" style="background-color:#759C75; height:10rem;">
                                                <div class="profile-pic-holder">
                                                    <img src="{{ asset($data->guardianMain->child->profile_pic)}}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';">
                                                </div>
                                                <div class="vstack gap-0 mt-2 d-flex justify-content-center">
                                                    <h4 class="d-flex align-items-center gap-1">
                                                        <svg height="30" width="50" fill="transparent">
                                                            <use xlink:href="#school" />
                                                        </svg>
                                                        {{ ucwords(strtolower($data->guardianMain->child->fname)) ." ". ucwords(strtolower($data->guardianMain->child->lname)) }}<!--Complete Name-->
                                                    </h4>
                                                    <h5 class="d-flex align-items-center gap-1">
                                                        <svg height="30" width="50" fill="currentcolor">
                                                            <use xlink:href="#school" />
                                                        </svg>
                                                        {{ ucwords(strtolower($data->guardianMain->child->school)) }} <!--School-->
                                                    </h5>
                                                    <h5 class="d-flex align-items-center gap-1">
                                                        <svg fill="currentcolor" height="30" width="50">
                                                            <use xlink:href="#location" />
                                                        </svg>
                                                        {{ ucwords(strtolower($data->guardianMain->guardian->userProfile->municipality)) .", ". ucwords(strtolower($data->guardianMain->guardian->userProfile->country)) }} <!--City & Country -->
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="card-body mt-5">
                                                <div class="hstack gap-5 mb-3">
                                                    <div class="vstack gap-1">
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#modality" />
                                                            </svg>
                                                            @foreach ($data->guardianMain->preferenceLanguage->preference as $datas)
                                                            {{$datas->modality->modality}}
                                                            @endforeach
                                                        </h5>
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#style" />
                                                            </svg>
                                                            @foreach ($data->guardianMain->preferenceLanguage->preference as $datas)
                                                            {{$datas->teachingStyle->style}}
                                                            @endforeach
                                                        </h5>
                                                        @if ($data->guardianMain->preferenceLanguage->languages == 1)
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#language" />
                                                            </svg>
                                                            English<!--language -->
                                                        </h5>
                                                        @elseif ($data->guardianMain->preferenceLanguage->languages == 2)
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#language" />
                                                            </svg>
                                                            Filipino<!--language -->
                                                        </h5>
                                                        @else
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#language" />
                                                            </svg>
                                                            English & Filipino<!--language -->
                                                        </h5>
                                                        @endif
                                                    </div>
                                                    <div class="vstack gap-1">
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#session" />
                                                            </svg>
                                                            {{ session('tutorMain') ? session('tutorMain')->tutor->employmentSession->sessionType->type: 'N/A' }}
                                                        </h5>
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#subject" />
                                                            </svg>
                                                            {{ session('tutorMain') ? session('tutorMain')->departmentYearSubject->subject->subjects: 'N/A' }}
                                                        </h5>
                                                        <h5 class="card-text d-flex align-items-center">
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#level" />
                                                            </svg>
                                                            {{ session('tutorMain') ? session('tutorMain')->departmentYearSubject->gradeLevel->year: 'N/A' }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <h5 class="fw-semibold">Selected Availability: <span class="fw-normal">{{ $data->bookingAvailability->day->day}}, {{ $data->bookingAvailability->availabilityStart->availability}} - {{ $data->bookingAvailability->availabilityEnd->availability}}</span></h5>
                                                    <h5 class="fw-semibold">Selected Start Date: <span class="fw-normal">{{ \Carbon\Carbon::parse($data->session_start_date)->format('l, F j, Y') }}</span></h5>
                                                    @if(session('tutorMain')->tutor->employmentSession->session_type_id == 2 && $data->session_end_date !== null)
                                                    <h5 class="fw-semibold">Selected End Date: <span class="fw-normal">{{ \Carbon\Carbon::parse($data->session_end_date)->format('l, F j, Y') }}</span></h5>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 rounded-bottom-5" style="background-color:white;">
                                                <div class="hstack gap-2 float-end">
                                                    <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">View Details</button>
                                                    <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#declineModal{{$data->id}}">Decline</button>
                                                    <button class="btn btn-lg btn-book" type="button" data-bs-toggle="modal" data-bs-target="#confirmModal{{$data->id}}">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--END OF CARDS-->
                                    </div>
                                    @endif
                                    @empty
                                    <div class="alert-container d-flex w-100">
                                        <div class="alert alert-secondary d-flex justify-content-center align-items-center gap-2 w-100" role="alert">
                                            <svg fill="black" height="35" width="35">
                                                <use xlink:href="#info" />
                                            </svg>
                                            <strong>No applications yet.</strong>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                                @else
                                <!-- Alert message -->
                                <div class="alert-container">
                                    <div class="alert alert-warning d-flex justify-content-center align-items-center gap-2 w-100" role="alert">
                                        <svg fill="black" height="35" width="35">
                                            <use xlink:href="#info" />
                                        </svg>
                                        <strong>Please wait for account verification to accept client applications.</strong>You can set up your profile in the meantime.
                                    </div>
                                </div>
                                @endif
            </section>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        dates();
    });

    function dates() {
        $('input[name="confirmStartDate"]').on('change', function() {
            var newStartDate = new Date($(this).val());
            var startDate = new Date($(this).data('start-date'));
            var endDate = new Date($(this).data('end-date'));
            var sessionTypeID = $(this).data('session-type');
            var endDateInput = $(this).closest('.modal').find('input[name="confirmEndDate"]');
            var reasonInput = $(this).closest('.modal').find('textarea[name="reasonChange"]');

            if (newStartDate.getTime() !== startDate.getTime()) {
                reasonInput.prop('required', true);
            } else {
                reasonInput.prop('required', false);
            }

            var newEndDate;

            if (sessionTypeID == 2) {
                var maxBusinessDays = calculateBusinessDays(startDate, endDate);
                newEndDate = addBusinessDays(newStartDate, maxBusinessDays);
            } else if (sessionTypeID == 1) {
                // Calculate the difference in days between original start and end dates
                var dateDifference = (endDate - startDate) / (1000 * 60 * 60 * 24);

                // Update newEndDate based on the newStartDate and the calculated dateDifference
                newEndDate = new Date(newStartDate);
                newEndDate.setDate(newEndDate.getDate() + dateDifference);
            }

            // Format new end date to 'YYYY-MM-DD'
            var formattedDate = newEndDate.toISOString().split('T')[0];

            // Set the new end date value
            endDateInput.val(formattedDate);

            //console.log('Business Days:', maxBusinessDays, 'New End Date:', formattedDate, 'date difference', dateDifference);
        });

        // Helper function to add business days to a date
        function addBusinessDays(date, daysToAdd) {
            var currentDate = new Date(date);
            while (daysToAdd > 1) {
                currentDate.setDate(currentDate.getDate() + 1); // Move to the next day
                var day = currentDate.getDay();
                if (day !== 0 && day !== 6) { // Exclude weekends (0 = Sunday, 6 = Saturday)
                    daysToAdd--;
                }
            }
            return currentDate;
        }

        // Calculate business days between two dates (assumes this function exists)
        function calculateBusinessDays(start, end) {
            var count = 0;
            var currentDate = new Date(start);

            while (currentDate <= end) {
                var day = currentDate.getDay();
                if (day !== 0 && day !== 6) { // Exclude Sundays (0) and Saturdays (6)
                    count++;
                }
                currentDate.setDate(currentDate.getDate() + 1); // Move to the next day
            }

            return count;
        }

        const today = new Date();
        const oneYearFromNow = new Date(today.getFullYear() + 1, today.getMonth(), today.getDate());
        const maxSessionDate = oneYearFromNow.toISOString().split('T')[0];

        $('.date-picker').each(function() {
            this.max = maxSessionDate;
            this.addEventListener('input', function() {

                const date = new Date(this.value);

                if (date.getDay() === 0 || date.getDay() === 6) {
                    alert('Please select only weekdays');
                    this.value = this.min;
                }

            });
        });
    }
    setTimeout(function() {
        $('.session-alert').remove();
    }, 3000);
</script>

</html>
@endsection
<style>
    /*cards*/
    .profile-pic-holder {
        width: 117px;
        height: 115px;
        position: relative;
        bottom: -75px;
    }

    .guardian-profile-pic-holder {
        width: 117px;
        height: 115px;
    }

    .modal-profile-pic-holder {
        width: 150px;
        height: 145px;
        position: relative;
        left: 15px;
        bottom: -70px;

    }

    .verified-icon {
        height: 35;
        width: 50;
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

    .subject-btn {
        color: #759C75 !important;
        transition: all 0.3s ease;
    }

    .subject-btn:hover {
        color: #99CC99 !important;
    }

    @media only screen and (max-width:1000px) {
        .result-container {
            justify-content: center !important;
        }

        .result-section {
            overflow-x: auto !important;
        }

    }

    .star {
        fill: currentColor;
        height: 30;
        width: 30;
    }

    .star.active {
        fill: gold !important;
    }
</style>