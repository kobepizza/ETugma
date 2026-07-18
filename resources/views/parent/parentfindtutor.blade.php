@extends('layouts.clientmaster')
@section('content')
@php
$rate= 3;
$page ='Find Tutor'


@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="star" viewBox="0 -960 960 960">
            <title>star</title>
            <path d="m384-334 96-74 96 74-36-122 90-64H518l-38-124-38 124H330l90 64-36 122ZM233-120l93-304L80-600h304l96-320 96 320h304L634-424l93 304-247-188-247 188Zm247-369Z" />
        </symbol>
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
        <symbol id="more" viewBox="0 -960 960 960">
            <title>more</title>
            <path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z" />
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
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="date" viewBox="0 -960 960 960">
            <title>date</title>
            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
        </symbol>
    </svg>
    <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' style="display: none;">
        <symbol id="verified" viewBox='0 0 24 24'>
            <title></title>
            <g transform="matrix(0.42 0 0 0.42 12 12)">
                <g>
                    <g transform="matrix(1 0 0 1 0 0)">
                        <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(66,165,245); fill-rule: nonzero; opacity: 1;" points="5.62,-21 9.05,-15.69 15.37,-15.38 15.69,-9.06 21,-5.63 18.12,0 21,5.62 15.69,9.05 15.38,15.37 9.06,15.69 5.63,21 0,18.12 -5.62,21 -9.05,15.69 -15.37,15.38 -15.69,9.06 -21,5.63 -18.12,0 -21,-5.62 -15.69,-9.05 -15.38,-15.37 -9.06,-15.69 -5.63,-21 0,-18.12 " />
                    </g>
                    <g transform="matrix(1 0 0 1 -0.01 0.51)">
                        <polygon style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-2.6,6.74 -9.09,0.25 -6.97,-1.87 -2.56,2.53 7,-6.74 9.09,-4.59 " />
                    </g>
                </g>
            </g>
        </symbol>
    </svg>
    <scrip src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
        </script>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <h4>Find Tutor</h4>
                <button class="btn btn-view d-flex align-items-center gap-1" type="button" data-bs-toggle="modal" data-bs-target="#bookingsModal">
                    <svg fill="currentcolor" height="20" width="20">
                        <use xlink:href="#date" />
                    </svg>
                    My Bookings
                </button>
            </div>

            <div class="modal fade" tabindex="-1" id="bookingsModal" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content" id="asssessment-rubrics">
                        <form action="">
                            <div class="modal-header">
                                <h5 class="modal-title">My Bookings | {{ ucfirst(strtolower(session('user_profiles')->fname)) . ' ' .  ucfirst(strtolower(session('user_profiles')->lname)) ?? 'N/A' }}</span></h5>
                            </div>
                            <div class="modal-body">
                                <div id="bookings-alert-div"></div>
                                <section class="p-2" style="max-height:450px; overflow-y:auto; scrollbar-width:thin;">
                                    <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="bookingLoading">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <ul class="cliient-bookings m-0 p-0" id="bookings-list">

                                    </ul>
                                    <h5 class="p-3 text-center d-none" id="noBookings">No bookings made.</h5>
                                </section>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-view" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END OF BOOKINGS MODAL-->
            <!--CANCEL BOOKING MODAL-->
            <div class="modal fade" id="cancelBookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="vstack gap-4 d-flex align-items-center">
                                <svg class="" height="50" fill="currentcolor">
                                    <use xlink:href="#info" />
                                </svg>
                                <span>
                                    <h3>Are you sure you want to cancel this booking?</h3>
                                    <p class="text-danger">Warning: Last minute cancellations will not be refunded.</p>
                                </span>
                                <div class="vstack gap-2 align-items-center justify-content-center w-100">
                                    <form class="p-0 m-0 w-100" method="POST" data-action="{{route('parent.cancel.bookings')}}" id="cancelBookingForm">
                                        @csrf
                                        <input type="hidden" name="cancelBookingId" value="" id="cancelBookingID">
                                        <input type="hidden" name="receiverId" value="" id="receiverId">
                                        <textarea class="form-control mb-3" name="reason" placeholder="Reason for cancellation" id="reasonTermination" required></textarea>
                                        <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                            <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#bookingsModal">Dismiss</button>
                                            <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm booking-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END OF CANCEL BOOKING MODAL-->
            <!--Filters-->
            @if(Session::has('success'))
            @if(is_array(Session::get('success')))
            <div class="alert alert-success">
                @foreach(Session::get('success') as $success)
                {{$success}}<br>
                @endforeach
            </div>
            @else
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @endif

            @if(Session::has('fail'))
            @if(is_array(Session::get('fail')))
            <div class="alert alert-danger">
                @foreach(Session::get('fail') as $error)
                {{$error}}<br>
                @endforeach
            </div>
            @else
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @endif
            <section class="py-4 mb-3">
                <form class="d-flex" action="{{route('find.tutor')}}" method="POST">
                    @csrf
                    <h2 class="ms-3 me-3">Filters</h2>
                    <div class="row row-cols-auto">
                        <div class="col">
                            <div class="dropdown-center mb-2">
                                <label>
                                    <h6>Find Tutor For</h6>
                                </label>
                                <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" id="studentDrop">
                                    Find Tutor For
                                </button>
                                <div class="dropdown-menu filter-menu w-100"> <!--child radio-->
                                    <input type="hidden" data-action="{{route('preference.filter')}}" id="prefAct">
                                    <div class="vstack">
                                        @foreach ($child as $data)
                                        <div class="form-check ms-3 kinder">

                                            <input class="form-check-input radio" type="radio" name="child" id="child1{{$data->child->id}}" value="{{$data->child->id}}"><!--child id-->
                                            <label class="form-check-label filter-item" for="child1{{$data->child->id}}"><!--child id-->
                                                {{ ucwords(strtolower($data->child->fname)) }} {{ ucwords(strtolower($data->child->lname)) }} <!--cihld full name-->
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2 mb-2" id="modalYear"> <!--Preferences-->
                                <!--childID-->
                                <input type="hidden" name="child_id" id="childText" value="">
                                <button class="btn btn-lg filter-btn pref" type="button" id="modalityForm" value=""><input type="hidden" name="modality" value=""><span id="modalityText">Modality</span></button><!--preferenceID--><!--preferenceName-->
                                <button class="btn btn-lg filter-btn pref" type="button" id="yearLevelForm" value=""><input type="hidden" name="grade" value=""><span id="yearLevelText">Year Level</span></button><!--preferenceID--><!--preferenceName-->
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2 mb-2" id="langStyle">
                                <button class="btn btn-lg filter-btn pref" type="button" id="languageForm" value=""><input type="hidden" name="language[]" value=""><span id="languageText">Language</span></button><!--preferenceID--><!--preferenceName-->
                                <button class="btn btn-lg filter-btn pref" type="button" id="teachingStyleForm" value=""><input type="hidden" name="learnStyle" value=""><span id="teachingStyleText">Learning Style </span></button><!--preferenceID--><!--preferenceName-->
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2 mb-2"> <!--session type radio-->
                                <div class="dropdown-center">
                                    <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false" id="sessionDrop">
                                        Session Type
                                    </button>
                                    <div class="dropdown-menu filter-menu w-100">
                                        <div class="vstack">
                                            @foreach ($sessionType as $data)
                                            <div class="form-check ms-3">
                                                <input class="form-check-input filter-check radio" type="radio" name="sessionType" id="session1{{$data->id}}" value="{{$data->id}}"><!--sessiontypeID-->
                                                <label class="form-check-label filter-item" for="session1{{$data->id}}"><!--sessiontypeID-->
                                                    {{$data->type}}<!--session type-->
                                                </label>
                                            </div>
                                            @endforeach
                                            <!--end looping-->
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-center">
                                    <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" id="subjectDrop">
                                        Subjects
                                    </button>
                                    <div class="dropdown-menu filter-menu w-100"> <!--Subject checkboxes-->
                                        <div class="vstack">
                                            @foreach ($subject as $data)
                                            <div class="form-check ms-3 kinder">
                                                <input class="form-check-input filter-check" type="checkbox" name="subject" id="sub1{{$data->id}}" value="{{$data->id}}"><!--subjectID-->
                                                <label class="form-check-label filter-item" for="sub1{{$data->id}}"><!--subjectID-->
                                                    {{$data->subjects}} <!--subjectName-->
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2 mb-2"> <!--Availability-->
                                <div class="dropdown-center ">
                                    <button class="btn btn-lg filter-btn dropdown-toggle  d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" id="availDrop">
                                        Availability
                                    </button>
                                    <div class="dropdown-menu filter-menu w-200">
                                        <div class="hstack">

                                            <!-- Label for Day -->
                                            <div class="vstack">
                                                <label class="form-label ms-3">Day</label> <!-- Day Label -->
                                                @foreach ($day as $data)
                                                <!--Days looping-->
                                                <div class="form-check ms-3 kinder">
                                                    <input class="form-check-input filter-check" type="checkbox" name="day" id="day1{{$data->id}}" value="{{$data->id}}">
                                                    <label class="form-check-label filter-item" for="day1{{$data->id}}">
                                                        {{$data->day }} <!--days-->
                                                    </label>
                                                </div>
                                                @endforeach
                                                <!--end looping-->
                                            </div>

                                            <!-- Label for Start Time -->
                                            <div class="vstack">
                                                <label class="form-label ms-3">Start Time</label> <!-- Start Time Label -->
                                                @foreach ($availability as $index => $data)
                                                @if ($index < count($availability) - 2)
                                                    <div class="form-check ms-3 kinder">
                                                    <input class="form-check-input filter-check" type="checkbox" name="startTime" id="startTime1{{$data->id}}" value="{{$data->id}}">
                                                    <label class="form-check-label filter-item" for="startTime1{{$data->id}}">
                                                        {{$data->availability}} <!--time-->
                                                    </label>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>

                                        <!-- Label for End Time -->
                                        <div class="vstack">
                                            <label class="form-label ms-3">End Time</label> <!-- End Time Label -->
                                            @foreach ($availability as $data)
                                            @if($loop->index >= 2 )
                                            <div class="form-check ms-3 kinder">
                                                <input class="form-check-input filter-check" type="checkbox" name="endTime" id="endTime1{{$data->id}}" value="{{$data->id}}">
                                                <label class="form-check-label filter-item" for="endTime1{{$data->id}}">
                                                    {{$data->availability}} <!--time-->
                                                </label>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-grid gap-2 mb-2"> <!--Find button-->
                            <button class="btn btn-lg filter-btn submit d-flex align-items-center justify-content-center shadow-sm border-2" type="submit" id="findTutor">
                                Find Tutor
                            </button>
                        </div>
                    </div>
                    </div>
                </form>
            </section>
        <!----->
        <!--CONFIRM MODAL-->
        <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <div class="vstack gap-4 d-flex align-items-center">
                            <svg class="" height="50" fill="currentcolor">
                                <use xlink:href="#info" />
                            </svg>
                            <h3>Are you sure you want to book this tutor?</h3>
                            <div class="hstack align-items-center justify-content-center w-100">
                                <form method="POST" action="{{route('tutor.book')}}">
                                    @csrf
                                    <input type="hidden" value="" name="bookingDuration" id="bookingDuration">
                                    <input type="hidden" value="" id="finalChildIdInput" name="finalChildId">
                                    <input type="hidden" value="" name="session">
                                    <input type="hidden" value="" name="finalTutorId" id="confirmTutorID">
                                    <input type="hidden" value="" name="finalStartDate" id="confirmStartDate">
                                    <input type="hidden" value="" name="finalEndDate" id="confirmEndDate">
                                    <input type="hidden" value="" name="finalDay" id="confirmDay">
                                    <input type="hidden" value="" id="selectedStartTime" name="selectedStartTime">
                                    <input type="hidden" value="" id="selectedEndTime" name="selectedEndTime">
                                    <input type="hidden" value="" id="finalMultiplier" name="finalMultiplier">
                                    <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="" id="returnToModalBtn">Dismiss</button>
                                    <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm booking-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF CONFIRM MODAL-->
        <!--Results-->
        <section class="py-5 result-section">
            <!--foreach loop-->
            <div class="row row-cols-auto gap-1 search-container">
                @if(Session::has('matched'))
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="alert alert-success d-flex justify-content-center align-items-center">
                        <div class="hstack gap-1">
                            <svg fill="currentcolor" height="30" width="30">
                                <use xlink:href="#info" />
                            </svg>
                            <h5 class="mb-0">{!! Session::get('matched') !!}</h5>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($filter))
                @forelse ($filter as $data)
                 @if ($data->tutor->verification_status_id== 1)
                <div class="col mb-3">
                    <!--modals-->
                    <!--TUTOR DETAILS-->
                    <div class="modal fade" id="detailModal{{$data->id}}" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="detailModalLabel" tabindex="-1"><!--include tutor id-->
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header text-black">
                                    <h1 class="modal-title fs-5">Tutor Details</h1>
                                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="header container-fluid mb-5 text-white" style="background-color:#759C75;">
                                        <div class="hstack gap-2">
                                            <div class="modal-profile-pic-holder">
                                                <img src="{{ asset($data->tutor->userProfile->profile_pic)}}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--profile pic-->
                                            </div>
                                            <!--Header Content-->
                                            <div class="vstack d-flex align-items-start">
                                                <h1 class="d-flex align-items-center gap-1">
                                                    <svg class="verified-icon  {{$data->tutor->verificationStatus->id == 1 ? 'd-flex' : 'd-none'}}">
                                                        <use xlink:href="#verified" />
                                                    </svg>
                                                    {{ ucwords(strtolower($data->tutor->userProfile->fname)) }} {{ ucwords(strtolower($data->tutor->userProfile->lname)) }} <!--Complete Name-->
                                                </h1>
                                                <h4 class="d-flex align-items-center gap-1">
                                                    <svg fill="currentcolor" height="30" width="50">
                                                        <use xlink:href="#school" />
                                                    </svg>
                                                    {{ ucwords(strtolower($data->requirement->school)) }} <!--School-->
                                                </h4>
                                                <h4 class="d-flex align-items-center gap-1">
                                                    <svg fill="currentcolor" height="30" width="50">
                                                        <use xlink:href="#location" />
                                                    </svg>
                                                    {{ ucwords(strtolower($data->tutor->userProfile->municipality)) }}, {{ ucwords(strtolower($data->tutor->userProfile->country)) }}<!--City & Country -->
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
                                                        @foreach ($data->preferenceLanguage->preference as $preferenceLanguage)
                                                        {{ $preferenceLanguage->modality->modality }}
                                                        @endforeach
                                                    </h4>
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#style" />
                                                        </svg>
                                                        @foreach ($data->preferenceLanguage->preference as $preferenceLanguage)
                                                        {{ $preferenceLanguage->teachingStyle->style}}
                                                        @endforeach
                                                    </h4>


                                                    @if ($data->preferenceLanguage->languages == 1)
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#language" />
                                                        </svg>
                                                        English<!--language -->
                                                    </h4>
                                                    @elseif ($data->preferenceLanguage->languages == 2)
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
                                                    <h5>
                                                        Ratings:
                                                    </h5>
                                                </div>
                                                <div class="vstack gap-1">
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#session" />
                                                        </svg>
                                                        {{$data->tutor->employmentSession->sessionType->type }}
                                                    </h4>
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#subject" />
                                                        </svg>
                                                        {{$data->departmentYearSubject->subject->subjects }}<!--subject -->
                                                        <a type="button" class="subject-btn" data-bs-toggle="modal" data-bs-target="#subjectModal{{$data->id}}" id="subject-btn"><!--id-->
                                                            <svg fill="currentcolor" height="25" width="30">
                                                                <use xlink:href="#more" />
                                                            </svg>
                                                        </a>
                                                    </h4>
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#level" />
                                                        </svg>
                                                        {{$data->departmentYearSubject->gradeLevel->year}}<!--year lvl -->
                                                    </h4>

                                                    <div class="hstack"> <!--Ratings-->
                                                        <svg class="star {{ $data->average_rating >= '1' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating >= '2' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating >= '3' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating >= '4' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating == '5' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!---->
                                        <!--credentials-->
                                        <h4 class="p-3 fw-bold">Credentials</h4>
                                        <section class="p-3" style="max-height:400px; overflow-y:auto; overflow-x:hidden;">
                                            <ul class="credential list-group">
                                                <!--credential looping-->
                                                @foreach ($credentials as $credential)
                                                <li class="list-group-item">
                                                    <div class="data-container d-flex align-items-center p-2">
                                                        <span class="data-title fs-5 col-10">
                                                            {{$credential->name}} <!--credential name-->
                                                        </span>
                                                        <div class="col-2 d-flex align-items-center">
                                                            <span class="fs-5 data-value">{{$credential->year}} </span><!--year-->
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <!--end of loop-->
                                            </ul>
                                        </section>
                                        <!---->
                                        <!--availability-->
                                        <h4 class="p-3 fw-bold">Availability</h4>
                                        <div class="px-3">
                                            <p class="fw-semibold mb-0">Legend:</p>
                                            <div class="hstack gap-2">
                                            <p class="mb-0">Available Day & Time</p>
                                            <hr class="opacity-100 border-5" style="color: #759C75; width:35px;">
                                            </div>
                                        </div>
                                        <section class="p-3" style="overflow-x:auto;">
                                            <table class="table table-xl table-responsive" id="tableAvailability{{ $data->id }}">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        @php
                                                        $times = [
                                                        '7:00AM', '7:30AM', '8:00AM', '8:30AM', '9:00AM', '9:30AM',
                                                        '10:00AM', '10:30AM', '11:00AM', '11:30AM', '12:00PM', '12:30PM',
                                                        '1:00PM', '1:30PM', '2:00PM', '2:30PM', '3:00PM', '3:30PM',
                                                        '4:00PM', '4:30PM', '5:00PM', '5:30PM', '6:00PM', '6:30PM',
                                                        '7:00PM', '7:30PM', '8:00PM'
                                                        ];
                                                        @endphp
                                                        @foreach($times as $time)
                                                        <th scope="col">{{ $time }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody class="table-group-divider">
                                                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                                    <tr>
                                                        <th scope="row">{{ $day }}</th>
                                                        @php
                                                        $timeIndex = 0;
                                                        @endphp

                                                        @while($timeIndex < count($times))
                                                            @php
                                                            $available=false;
                                                            $startTime=null;
                                                            $endTime=null;
                                                            @endphp

                                                            @foreach($dayAvailabilitySessionTypeFinal[$data->id] as $sessionType)
                                                            @if($sessionType->day->day == $day)
                                                            @php
                                                            $startTime = array_search($sessionType->availabilityStart->availability, $times);
                                                            $endTime = array_search($sessionType->availabilityEnd->availability, $times);
                                                            @endphp

                                                            @if($timeIndex >= $startTime && $timeIndex < $endTime)
                                                                @php
                                                                $available=true;
                                                                $blockSpan=$endTime - $startTime;
                                                                @endphp
                                                                <td colspan="{{ $blockSpan }}" style="background-color: #759C75; ">&nbsp;</td>
                                                                @php
                                                                $timeIndex = $endTime;
                                                                @endphp
                                                                @endif
                                                                @endif
                                                                @endforeach

                                                                @if(!$available)
                                                                <td>&nbsp;</td>
                                                                @php
                                                                $timeIndex++;
                                                                @endphp
                                                                @endif
                                                                @endwhile
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </section>
                                        <!---->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 float-end">
                                        <button class="btn btn-lg btn-view close-modal" type="button" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-lg btn-book" type="button" data-bs-toggle="modal" data-bs-target="#bookModal{{$data->id}}">Book Tutor</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END OF TUTOR DETAILS-->
                    <!--SUBJECT OUTLINE MODAL-->
                    <div class=" modal fade" id="subjectModal{{$data->id}}" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="subjectModalLabel" tabindex="-1"><!--include tutor id-->
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header text-black">
                                    <h1 class="modal-title fs-5">Subject Outline</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid py-4">
                                        <section class="py-3">
                                            <div class="d-flex align-items-center justify-content-center py-2">
                                                <img src="Images/deped-logo.png" alt="DepEd" height="120"><!--deped logo-->
                                            </div>
                                            <div class="hstack gap-3 justify-content-center">
                                                <div class="display-5">{{$data->departmentYearSubject->subject->subjects}}</div> <!--subject-->
                                                <div class="vr"></div>
                                                <div class="display-6">{{$data->departmentYearSubject->gradeLevel->year}}</div><!--year level-->
                                            </div>
                                        </section>
                                        <section class="py-3">
                                            @if(isset($data->departmentYearSubject->topics))
                                            <h4>Topics</h4>
                                            <ol class="list-group list-group-flush list-group-numbered">
                                                <!--topics looping-->
                                                @foreach(explode(',', $data->departmentYearSubject->topics) as $topic)
                                                <li class="list-group-item">{{ trim($topic) }}</li>
                                                @endforeach
                                            </ol>
                                            @endif
                                        </section>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 float-end">
                                        <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END OF SUBJECT OUTLINE-->
                    <!--BOOK TUTOR MODAL-->
                    <div class="modal fade" id="bookModal{{$data->id}}" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="bookModalLabel" tabindex="-1"><!--include tutor id-->
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header text-black">
                                    <h1 class="modal-title fs-5">Book Tutor</h1>
                                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="header container-fluid mb-5 text-white" style="background-color:#759C75;">
                                        <div class="hstack gap-2">
                                            <div class="modal-profile-pic-holder">
                                                <img src="{{ asset($data->tutor->userProfile->profile_pic)}}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--profile pic-->
                                            </div>
                                            <!--Header Content-->
                                            <div class="vstack d-flex align-items-start">
                                                <h1 class="d-flex align-items-center gap-1">
                                                    <svg class="verified-icon {{$data->tutor->verificationStatus->id == 1 ? 'd-flex' : 'd-none'}}">
                                                        <use xlink:href="#verified" />
                                                    </svg>
                                                    {{ ucwords(strtolower($data->tutor->userProfile->fname)) }} {{ ucwords(strtolower($data->tutor->userProfile->lname)) }} <!--Complete Name-->
                                                </h1>
                                                <h4 class="d-flex align-items-center gap-1">
                                                    <svg fill="currentcolor" height="30" width="50">
                                                        <use xlink:href="#school" />
                                                    </svg>
                                                    {{ ucwords(strtolower($data->requirement->school)) }} <!--School-->
                                                </h4>
                                                <h4 class="d-flex align-items-center gap-1">
                                                    <svg fill="currentcolor" height="30" width="50">
                                                        <use xlink:href="#location" />
                                                    </svg>
                                                    {{ ucwords(strtolower($data->tutor->userProfile->municipality))}}, {{ ucwords(strtolower($data->tutor->userProfile->country)) }} <!--City & Country -->
                                                </h4>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="container-fluid py-3 mt-5">
                                        <!--preferences-->
                                        <section class="p-3">
                                            <div class="hstack gap-2">
                                                <div class="vstack gap-1">
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#modality" />
                                                        </svg>
                                                        @foreach ($data->preferenceLanguage->preference as $preferenceLanguage)
                                                        {{ $preferenceLanguage->modality->modality }}
                                                        @endforeach
                                                        <!--modality-->
                                                    </h4>
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#style" />
                                                        </svg>
                                                        @foreach ($data->preferenceLanguage->preference as $preferenceLanguage)
                                                        {{ $preferenceLanguage->teachingStyle->style}}
                                                        @endforeach
                                                        <!--teaching style -->
                                                    </h4>
                                                    @if ($data->preferenceLanguage->languages == 1)
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#language" />
                                                        </svg>
                                                        English<!--language -->
                                                    </h4>
                                                    @elseif ($data->preferenceLanguage->languages == 2)
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
                                                    <h5>
                                                        Ratings:
                                                    </h5>
                                                </div>
                                                <div class="vstack gap-1">
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#session" />
                                                        </svg>
                                                        {{$data->tutor->employmentSession->sessionType->type }}<!--session type -->
                                                    </h4>
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#subject" />
                                                        </svg>
                                                        {{$data->departmentYearSubject->subject->subjects }}<!--subject -->
                                                    </h4>
                                                    <h4 class="card-text d-flex align-items-center">
                                                        <svg fill="currentcolor" height="25" width="30">
                                                            <use xlink:href="#level" />
                                                        </svg>
                                                        {{$data->departmentYearSubject->gradeLevel->year}}<!--year lvl -->
                                                    </h4>
                                                    <div class="hstack"><!--Ratings-->
                                                        <svg class="star {{ $data->average_rating >= '1' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating >= '2' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating >= '3' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating >= '4' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                        <svg class="star {{ $data->average_rating == '5' ? 'active' : '' }}">
                                                            <use xlink:href="#star" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!---->
                                        <!--Reminders-->
                                        <ul class="list-group list-group-flush mb-3">
                                            <li class="list-group-item text-danger fw-bold">Important Reminders:</li>
                                            <li class="list-group-item text-danger">* <a href="{{route('subject')}}" target="_blank" class="fw-bold text-danger text-decoration-underline">Tutorial Rates</a> are fixed and depend on <span class="fw-bold">modalities, session types,</span> and <span class="fw-bold">year levels</span>.</li>
                                            <li class="list-group-item text-danger">* Bookings will be <span class="fw-bold">confirmed</span> by <span class="fw-bold">tutors</span>.</li>
                                            <li class="list-group-item text-danger">* Session <span class="fw-bold">start date</span> should be at least <span class="fw-bold">3 days</span> from current date.</li>
                                            <li class="list-group-item text-danger">* <span class="fw-bold">"No available start times"</span> indicates the time-slots for that day are <span class="fw-bold">occupied</span>.</li>
                                            @if($data->tutor->employmentSession->session_type_id == 2 )
                                            <li class="list-group-item text-danger">* For <span class="fw-bold">Hourly Sessions</span>, "booking duration" is considered as <span class="fw-bold">per day</span>.</li>
                                            <li class="list-group-item text-danger">* For <span class="fw-bold">Hourly Sessions</span>, "more than once" booking duration will only cover <span class="fw-bold">weekdays</span>.</li>
                                            <li class="list-group-item text-danger">* For <span class="fw-bold">Hourly Sessions</span>, the tutorial rate is multiplied by the <span class="fw-bold">number of weekdays between start date and end date</span>.</li>
                                            @endif
                                            @if($data->tutor->employmentSession->session_type_id == 1 )
                                            <li class="list-group-item text-danger">* For <span class="fw-bold">Monthly Sessions</span>, please select your <span class="fw-bold">daily</span> preferred <span class="fw-bold">1-hour</span> time slot.</li>
                                            @endif

                                        </ul>
                                        <!---->
                                        <section class="p-3"> <!--availability and date-->
                                            <input type="hidden" value="" name="multiplier">
                                            <input type="hidden" value="" name="duration">
                                            <input type="hidden" value="{{$data->tutor->employmentSession->session_type_id}}" name="session_type">
                                            @if($data->tutor->employmentSession->session_type_id == 2 )
                                            <div class="col mb-3">
                                                <div class="dropdown-center d-flex justify-content-center justify-content-lg-start">
                                                    <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between durationDrop bookDurationBtn{{$data->id}}" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                        Booking Duration
                                                    </button>
                                                    <div class="dropdown-menu filter-menu " style="max-height:150px; overflow-y:auto; width:267px;">
                                                        <!-- Booking duration options -->
                                                        <div class="hstack">
                                                            <div class="vstack bookingDuration">
                                                                @foreach ($bookingDuration as $duration)
                                                                <div class="form-check ms-3 kinder">
                                                                    <input class="form-check-input radio" type="radio" name="bookingDuration" id="duration1week{{$data->id}}_{{$duration->id}}" value="{{$duration->id}}">
                                                                    <label class="form-check-label filter-item" for="duration1week{{$data->id}}_{{$duration->id}}">{{$duration->duration}}</label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row row-cols-auto d-flex align-items-center justify-content-center">
                                                <div class="col mb-3">
                                                    <div class="dropdown-center">
                                                        <button class=" selectDayButton btn btn-lg filter-btn dropdown-toggle  d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" data-tutor-id="{{$data->id}}">
                                                            Select Day
                                                        </button>
                                                        <div class="dropdown-menu filter-menu w-100" style="max-height:150px; overflow-y:auto"> <!--availability radio-->
                                                            <div class="hstack">
                                                                <div class="vstack " id="dayOptions">
                                                                    @foreach($dayAvailabilitySessionTypeFinal[$data->id]->unique('day_id') as $availability)
                                                                    <div class="form-check ms-3 kinder">
                                                                        <input class="form-check-input radio" type="radio" name="bookDay" id="{{$availability->id}}" value="{{$availability->day_id}}"><!--day id-->
                                                                        <label class="form-check-label filter-item" for="{{$availability->id}}"><!--day id-->
                                                                            {{$availability->day->day}}<!--days-->
                                                                        </label>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col mb-3">
                                                    <div class="dropdown-center">
                                                        <button class=" selectStartTimeButton btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                            Select Start Time
                                                        </button>
                                                        <div class="dropdown-menu filter-menu w-100" style="max-height:150px; overflow-y:auto">
                                                            <div class="hstack">
                                                                <div class="vstack startTimeOptions" id="">
                                                                    <!-- Check if there are availability times for this tutor -->

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col mb-3">
                                                    <div class="dropdown-center">
                                                        <button class=" selectEndTimeButton btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                            Select End Time
                                                        </button>
                                                        <div class="dropdown-menu filter-menu w-100" style="max-height:150px; overflow-y:auto">
                                                            <div class="hstack">
                                                                <div class="vstack endTimeOptions" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-12 mb-3 ">
                                                    <div class="d-flex w-100 gap-2 justify-content-center">
                                                        <!-- Add margin top for spacing -->
                                                        <div class="startDate">
                                                            <label for="">Select Start Date</label>
                                                            <div class="input-group flex-nowrap"> <!--session date-->
                                                                <span class="input-group-text" id="addon-wrapping">
                                                                    <svg class="bi" width="20" height="20">
                                                                        <use xlink:href="#date" />
                                                                    </svg>
                                                                </span>
                                                                <input type="date"  name="sessionStartDate" class="form-control session-date start-date" placeholder="Select Start Date" aria-describedby="addon-wrapping" required>
                                                            </div>
                                                        </div>

                                                        <div class="endDate d-none">
                                                            <label for="">Select End Date</label>
                                                            <div class="input-group flex-nowrap"> <!--session date-->
                                                                <span class="input-group-text" id="addon-wrapping">
                                                                    <svg class="bi" width="20" height="20">
                                                                        <use xlink:href="#date" />
                                                                    </svg>
                                                                </span>
                                                                <input type="date" name="sessionEndDate" class="form-control session-date end-date" placeholder="Select End Date" aria-describedby="addon-wrapping" data-rate="{{ $data->rate }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rates-container text-center shadow rounded-4 p-2 mb-3 mt-3">
                                                <h6 class="fw-semibold">Tutorial Rate: <span class="fw-normal">₱{{number_format($data->rate,0)}}</span></h6>
                                                <h6 class="fw-semibold number-weekdays d-none">Number of Weekdays: <span class="fw-normal book-multiplier">0</span></h6>
                                                <h4 class="fw-semibold">Total: <span class="fw-normal original-total">₱{{number_format($data->rate,0)}}</span><span class="fw-normal book-total d-none">₱{{number_format($data->rate,0)}}</span></h4>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 float-end">
                                        <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">View Details</button>
                                        <button class="btn btn-lg btn-book confirm-book" type="button" data-tutor-id="{{$data->id}}">Book Tutor</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--END OF BOOK TUTOR MODAL-->
                    <!--end of modals-->
                    <!--CARDS-->
                    <div class="card rounded-5 shadow-lg border-0 mb-3 tutor-card" id="card" style="width:35rem; height:30rem;">
                        <div class="card-header d-flex align-items-center rounded-top-5 mb-1 text-white" style="background-color:#759C75; height:10rem;">
                            <div class="profile-pic-holder">
                                <img src="{{ asset($data->tutor->userProfile->profile_pic)}}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';">
                            </div>
                            <div class="vstack gap-0 mt-2 d-flex justify-content-center">
                                <h4 class="d-flex align-items-center gap-1">
                                    <svg class="verified-icon {{$data->tutor->verificationStatus->id == 1 ? 'd-flex' : 'd-none'}}">
                                        <use xlink:href="#verified" />
                                    </svg>
                                    {{ ucwords(strtolower($data->tutor->userProfile->fname)) }} {{ ucwords(strtolower($data->tutor->userProfile->lname)) }}<!--Complete Name-->
                                </h4>
                                <h5 class="d-flex align-items-center gap-1">
                                    <svg height="30" width="50" fill="currentcolor">
                                        <use xlink:href="#school" />
                                    </svg>
                                    {{ ucwords(strtolower($data->requirement->school))}} <!--School-->
                                </h5>
                                <h5 class="d-flex align-items-center gap-1">
                                    <svg fill="currentcolor" height="30" width="50">
                                        <use xlink:href="#location" />
                                    </svg>
                                    {{ ucwords(strtolower($data->tutor->userProfile->municipality)) }}, {{ ucwords(strtolower($data->tutor->userProfile->country)) }}
                                </h5>
                            </div>
                        </div>
                        <div class="card-body  mt-5 mb-3">
                            <div class="hstack gap-2 ">
                                <div class="vstack gap-1">
                                    <h5 class="card-text d-flex align-items-center">
                                        <svg fill="currentcolor" height="25" width="30">
                                            <use xlink:href="#modality" />
                                        </svg>
                                        @foreach ($data->preferenceLanguage->preference as $preferenceLanguage)
                                        {{ $preferenceLanguage->modality->modality }}
                                        @endforeach
                                        <!--modality-->
                                    </h5>
                                    <h5 class="card-text d-flex align-items-center">
                                        <svg fill="currentcolor" height="25" width="30">
                                            <use xlink:href="#style" />
                                        </svg>
                                        @foreach ($data->preferenceLanguage->preference as $preferenceLanguage)
                                        {{ $preferenceLanguage->teachingStyle->style}}
                                        @endforeach
                                        <!--teaching style -->
                                    </h5>
                                    @if ($data->preferenceLanguage->languages == 1)
                                    <h5 class="card-text d-flex align-items-center">
                                        <svg fill="currentcolor" height="25" width="30">
                                            <use xlink:href="#language" />
                                        </svg>
                                        English<!--language -->
                                    </h5>
                                    @elseif ($data->preferenceLanguage->languages == 2)
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
                                    <h5>
                                        Ratings:
                                    </h5>
                                </div>
                                <div class="vstack gap-1">
                                    <h5 class="card-text d-flex align-items-center">
                                        <svg fill="currentcolor" height="25" width="30">
                                            <use xlink:href="#session" />
                                        </svg>
                                        {{$data->tutor->employmentSession->sessionType->type}} <!--session type -->
                                    </h5>
                                    <h5 class="card-text d-flex align-items-center">
                                        <svg fill="currentcolor" height="25" width="30">
                                            <use xlink:href="#subject" />
                                        </svg>
                                        {{$data->departmentYearSubject->subject->subjects}}<!--subject -->
                                    </h5>
                                    <h5 class="card-text d-flex align-items-center">
                                        <svg fill="currentcolor" height="25" width="30">
                                            <use xlink:href="#level" />
                                        </svg>
                                        {{$data->departmentYearSubject->gradeLevel->year}}<!--year lvl -->
                                    </h5>
                                    <div class="hstack"> <!--Ratings-->
                                        <svg class="star {{ $data->average_rating >= '1' ? 'active' : '' }}">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star {{ $data->average_rating >= '2' ? 'active' : '' }}">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star {{ $data->average_rating >= '3' ? 'active' : '' }}">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star {{ $data->average_rating >= '4' ? 'active' : '' }}">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star {{ $data->average_rating == '5' ? 'active' : '' }}">
                                            <use xlink:href="#star" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 rounded-bottom-5" style="background-color:white;">
                            <div class="hstack gap-2 float-end">
                                <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id}}">View Details</button><!--target should be #modal$id -->
                                <button class="btn btn-lg btn-book" type="button" data-bs-toggle="modal" data-bs-target="#bookModal{{$data->id}}">Book Tutor</button>
                            </div>
                        </div>
                    </div>
                    <!--END OF CARDS-->
                </div>
                @endif
                @empty
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="alert alert-info d-flex justify-content-center align-items-center">
                        <div class="hstack gap-1">
                            <svg fill="currentcolor" height="30" width="30">
                                <use xlink:href="#info" />
                            </svg>
                            <h5 class="mb-0">No Matches Found.</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!----->
            @endforelse
            @endif
        </section>
        <!----->
        </div>
    </main>
    <script>
        $(document).ready(function() {
            bookDuration();
            bookOptions();
        });

        function bookOptions() {
            $('input[name="bookDay"]').on('change', function() {
                var selectedDayId = $(this).val();
                var selectedDayBtn = $(this).closest('.selectDayButton');
                var startOptions = $(this).closest('.modal').find('.startTimeOptions');
                var endOptions = $(this).closest('.modal').find('.endTimeOptions');
                var tutorMainId = $(this).closest('.modal').find('.selectDayButton').data('tutor-id');

                console.log('tutor', tutorMainId, 'day id', selectedDayId);
                //selectedDayBtn.text($(this).next('label').text());

                $.ajax({
                    url: "{{route('tutor.get.start.time')}}",
                    type: 'GET',
                    data: {
                        day_id: selectedDayId,
                        tutor_main_id: tutorMainId
                    },
                    success: function(data) {
                        startOptions.empty();
                        endOptions.empty();

                        if (data.length > 0) {
                            data.forEach(function(time) {
                                let start = `
                            <div class="form-check ms-3 kinder">
                                <input class="form-check-input radio" type="radio" name="startTime" id="start${time.id}" value="${time.id}" data-day-id="${selectedDayId}">
                                <label class="form-check-label filter-item" for="start${time.id}">${time.availability}</label>
                            </div>
                        `;
                                startOptions.append(start);
                            });
                        } else {
                            startOptions.append('<div class="ms-3">No available start times</div>');
                        }
                    }
                });
            });

            $('.startTimeOptions').on('change', 'input[name="startTime"]', function() {
                var selectedStartTimeId = $(this).val();
                var selectedDayId = $(this).data('day-id');
                var selectStartBtn = $(this).closest('.dropdown-center').find('.selectStartTimeButton');
                var endOptions = $(this).closest('.modal').find('.endTimeOptions');

                selectStartBtn.text($(this).next('label').text());
                selectStartBtn.dropdown('hide');

               // console.log('start time id', selectedStartTimeId);

                $.ajax({
                    url: "{{route('tutor.get.end.time')}}",
                    type: 'GET',
                    data: {
                        start_time_id: selectedStartTimeId,
                        day_id: selectedDayId
                    },
                    success: function(data) {
                        endOptions.empty();

                        if (data.length > 0) {
                            data.forEach(function(time) {
                                let end = `
                            <div class="form-check ms-3 kinder">
                                <input class="form-check-input radio" type="radio" name="endTime" id="end${time.id}" value="${time.id}">
                                <label class="form-check-label filter-item" for="end${time.id}">${time.availability}</label>
                            </div>
                        `;
                                endOptions.append(end);
                            });
                        } else {
                            endOptions.append('<div class="ms-3">No available end times</div>');
                        }
                    },
                });
            });



            $('.endTimeOptions').on('change', 'input[name="endTime"]', function() {
                var endTimeId = $(this).val();
                var endTimeBtn = $(this).closest('.dropdown-center').find('.selectEndTimeButton');
                endTimeBtn.text($(this).next('label').text());
                endTimeBtn.dropdown('hide');
                //console.log('end time id', endTimeId);
            });
        }

        function bookDuration() {
            $('.bookingDuration').on('change', 'input[name="bookingDuration"]', function() {
                var bookText = $(this).attr('name').replace('bookingDuration', ''); // Extract tutor ID from name             
                var selectedDuration = $(this).val();

                var startDate = $('.startDate');
                var endDate = $('.endDate');
                var multiplierText = $('.number-weekdays');
                var originalTotal = $('.original-total');
                var multiplierTotal = $('.book-total');

                var durationInput = $('input[name="duration"]');

                durationInput.val(selectedDuration);

                var durationInputVal = durationInput.val();
                console.log('duration input val:', durationInputVal);

                var display;
                if (selectedDuration == '1') {
                    startDate.removeClass('d-none');
                    originalTotal.removeClass('d-none');
                    endDate.addClass('d-none');
                    multiplierText.addClass('d-none');
                    multiplierTotal.addClass('d-none');
                } else if (selectedDuration == '2') {
                    startDate.removeClass('d-none');
                    endDate.removeClass('d-none');
                    multiplierText.removeClass('d-none');
                    multiplierTotal.removeClass('d-none');
                    originalTotal.addClass('d-none');
                }
                var bookDurationBtn = $('.bookDurationBtn' + bookText); // Select the button for the correct tutor
                bookDurationBtn.text($(this).next('label').text());
            });
            sessionDates();
        }

        function sessionDates() {
            let selectedStartDate;
            let selectedEndDate;
            let days;

            $('[name="sessionStartDate"]').on('change', function() {
                selectedStartDate = new Date($(this).val()); // Store the selected start date
                var endDate = $('[name="sessionEndDate"]');

                // Set the minimum date to one day after the selected start date
                var minDate = new Date(selectedStartDate);
                minDate.setDate(minDate.getDate() + 1);

                // Set the maximum date to one week after the minimum date
                var maxDate = new Date(selectedStartDate);
                maxDate.setDate(maxDate.getDate() + 7);

                // Convert the minDate and maxDate to strings in the format yyyy-mm-dd
                var minDateStr = minDate.toISOString().split('T')[0];
                var maxDateStr = maxDate.toISOString().split('T')[0];

                // Set the min and max attributes on the end-date input field
                endDate.attr('min', minDateStr);
                endDate.attr('max', maxDateStr);

                //console.log('Selected Start date:', selectedStartDate);
            });

            $('[name="sessionEndDate"]').on('change', function() {
                selectedEndDate = new Date($(this).val());
                var rate = $(this).data('rate');
                var originalTotal = $(this).closest('.modal').find('span.original-total');
                var multiplierText = $(this).closest('.modal').find('span.book-multiplier');
                var totalText = $(this).closest('.modal').find('span.book-total');

               // console.log('Selected End date:', selectedEndDate, 'tutorial rate:', rate);

                if (selectedStartDate && selectedEndDate) {
                    // Calculate the difference excluding weekends
                    let businessDays = calculateBusinessDays(selectedStartDate, selectedEndDate);
                    let multiplier = $('input[name="multiplier"]');
                    multiplier.val(businessDays);

                    let mulitipliedRate = rate * businessDays;
                    let formattedRate = mulitipliedRate.toLocaleString('en-US');
                    originalTotal.addClass('d-none');
                    totalText.removeClass('d-none');
                    multiplierText.html(businessDays);
                    totalText.html(`₱${formattedRate}`);

                    //console.log('Business Days:', businessDays, 'multiplied rate:', mulitipliedRate);
                }
            });

            // Function to calculate the number of business days (excluding weekends) between two dates
            function calculateBusinessDays(startDate, endDate) {
                let currentDate = new Date(startDate);
                let businessDays = 0;

                while (currentDate < endDate) {
                    let dayOfWeek = currentDate.getDay();
                    if (dayOfWeek !== 0 && dayOfWeek !== 6) { // 0 = Sunday, 6 = Saturday
                        businessDays++;
                    }
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                return businessDays;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            retrieveModal();

            $('#sessionDrop, #subjectDrop, #availDrop, #findTutor').prop('disabled', true);

            function addDays(date, days) {
                const result = new Date(date);
                while (days > 0) {
                    result.setDate(result.getDate() + 1);
                    if (result.getDay() !== 0 && result.getDay() !== 6) {
                        days--;
                    }
                }
                return result;
            }

            const today = new Date();
            const threeBusinessDaysFromNow = addDays(today, 3);
            const oneYearFromNow = new Date(today.getFullYear() + 1, today.getMonth(), today.getDate());

            const minSessionDate = threeBusinessDaysFromNow.toISOString().split('T')[0];
            const maxSessionDate = oneYearFromNow.toISOString().split('T')[0];

            document.querySelectorAll('.session-date').forEach((input) => {
                input.min = minSessionDate;
                input.max = maxSessionDate;
                input.addEventListener('input', function() {
                    const date = new Date(input.value);
                    if (date.getDay() === 0 || date.getDay() === 6) {
                        alert('Please select only weekdays');
                        input.value = '';
                    }
                });
            });
        });

        $('.filter-check').on('change', function() {
            if ($('.filter-check:checked').length >= 3) {
                $('#findTutor').prop('disabled', false);
            } else {
                $('#findTutor').prop('disabled', true);
            }
        });

        $('.confirm-book').on('click', function(e) {
            e.preventDefault();
            var tutorID = $(this).data('tutor-id');

            var sessionStartDate = $(this).closest('.modal').find('input[name=sessionStartDate]').val();
            var sessionEndDate = $(this).closest('.modal').find('input[name=sessionEndDate]').val();
            var availability = $(this).closest('.modal').find('input[name=bookDay]:checked').val();
            var selectedStartTime = $(this).closest('.modal').find('input[name=startTime]:checked').val(); // Get selected start time
            var selectedEndTime = $(this).closest('.modal').find('input[name=endTime]:checked').val(); // Get selected end time
            var selectedDuration = $(this).closest('.modal').find('input[name="bookingDuration"]:checked').val();
            var multiplier = $(this).closest('.modal').find('input[name=multiplier]').val();
            var session_type = $(this).closest('.modal').find('input[name=session_type]').val();

           // console.log('start date:', sessionStartDate, 'end date:', sessionEndDate, 'day:', availability, 'start time:', selectedStartTime, 'end time:', selectedEndTime, 'duration:', selectedDuration, 'session type:', session_type);

            if (!availability) {
                alert('Please select a day.');
                return;
            }
            if (!selectedStartTime) {
                alert('Please select a start time.');
                return;
            }
            if (!selectedEndTime) {
                alert('Please select an end time.');
                return;
            }
            if (!sessionStartDate) {
                alert('Please select a start date.');
                return;
            }

            let timeDifference = selectedEndTime - selectedStartTime;
            if (timeDifference !== 2) {
                alert('Please select only 1 hour duration.');
                return;
            }

            if (session_type == 2) {
                if (!selectedDuration) {
                    alert('Please select booking duration.');
                    return;
                }
                if (selectedDuration == 2 && !sessionEndDate) {
                    alert('Please select an end date.');
                    return;
                }
            }

            $('#confirmDay').val(availability);
            $('#confirmStartDate').val(sessionStartDate);
            $('#confirmEndDate').val(sessionEndDate);
            $('#confirmTutorID').val(tutorID);
            $('#selectedStartTime').val(selectedStartTime); // Set start time
            $('#selectedEndTime').val(selectedEndTime); // Set end time
            $('#bookingDuration').val(selectedDuration); // Set booking duration
            $('#finalMultiplier').val(multiplier); // Set booking duration

            //console.log( 'startTime',  $('#selectedStartTime').val(), 'endTime', $('#selectedEndTime').val(), 'book duration', $('#bookingDuration').val());
            var bookModal = $(`#bookModal${tutorID}`);
            var confirmationModal = $('#confirmModal');
            bookModal.modal('hide');
            confirmationModal.modal('show');

            var confirmedDay = $('#confirmDay').val();
            var confirmedID = $('#confirmTutorID').val();

            var dismissBtn = $('#returnToModalBtn');
            dismissBtn.attr('data-bs-target', `#bookModal${tutorID}`);

          //  console.log('session date', confirmedDay, 'tutor', confirmedID);
        });

        $('.close-modal').on('click', function() {
            var endDate = $('.endDate');
            var durationDropdown = $('.durationDrop');
            var durationInput = $('input[name="bookingDuration"]');
            var multiplierText = $('.number-weekdays');
            var multiplier = $('.book-multiplier');
            var originalTotal = $('.original-total');
            var multiplierTotal = $('.book-total');

            endDate.addClass('d-none');
            originalTotal.removeClass('d-none');
            multiplierTotal.addClass('d-none');
            multiplierText.addClass('d-none');
            durationDropdown.dropdown('hide');
            durationDropdown.html('Booking Duration');
            durationInput.prop('checked', false);
            multiplier.html();
        })

        const dropdownButtons = document.querySelectorAll('.filter-btn');
        const radioInputs = document.querySelectorAll('.radio');

        // Add an event listener to each radio input
        radioInputs.forEach((radio) => {
            radio.addEventListener('change', (e) => {
                const selectedText = e.target.nextElementSibling.textContent.trim();
                const dropdownButton = e.target.closest('.dropdown-center').querySelector('.filter-btn');
                dropdownButton.textContent = selectedText;
                const dropdown = bootstrap.Dropdown.getInstance(dropdownButton);
                dropdown.hide();
            });
        });

        function retrieveModal() {
            $('input[type=radio][name=child]').click(function() {
                var id = this.value;
                var url = $("#prefAct").attr('data-action');
                $.ajax({
                    url: url + "?id=" + id,
                    method: 'GET',
                    dataType: 'JSON',
                    success: function(response) {
                        $("#modalityText, #yearLevelText, #LanguageText, #teachingStyleText, #childText").empty();
                        $.each(response, function(index, data) {
                            buildModalText(data.modality);
                            buildYearLevelText(data.yearLevel);
                            buildLanguageText(data.language);
                            buildTeachingStyleText(data.teachingStyle);
                            buildChildText(data.child);
                            $('#sessionDrop, #subjectDrop, #availDrop').prop('disabled', false);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        }

        function buildChildText(data) {
            var html = "<input type='hidden' name='child_id' id='childText" + data.id + "' value='" + data.id + "'>";
            $("#childText").append(html);
        }

        function buildModalText(data) {
            var html = "<input type='hidden' name='modality' value='" + data.id + "'><span id='modalityText'>" + data.modality + "</span>";
            $("#modalityText").append(html);
        }

        function buildYearLevelText(data) {
            var html = "<input type='hidden' name='grade' value='" + data.id + "'><span id='yearLevelText'>" + data.year + "</span>";
            $("#yearLevelText").append(html);
        }

        function buildTeachingStyleText(data) {
            var html = "<input type='hidden' name='learnStyle' value='" + data.id + "'><span id='teachingStyleText'>" + data.style + "</span>";
            $("#teachingStyleText").append(html);
        }

        function buildLanguageText(data) {
            var language = [];
            if (data.includes(1)) {
                language.push('English');
            }
            if (data.includes(2)) {
                language.push('Filipino');
            }
            var html = "<input type='hidden' name='language[]' value='" + data + "'><span id='languageText'>" + language.join(', ') + "</span>";
            $("#languageText").html(html);
        }

        setTimeout(function() {
            $('.alert').remove();
        }, 5000);
    </script>

    <!--NEW SCRIPT FOR BOOKING CANCELLATIONS-->
    <script>
        $(document).ready(function() {
            loadBookings();
        });

        function loadBookings() {
            $.ajax({
                type: 'GET',
                url: "{{ route('parent.load.bookings') }}",
                beforeSend: function() {
                    $('#bookingLoading').removeClass('d-none');
                },
                success: function(data) {
                    //console.log(data);
                    $('#bookingLoading').addClass('d-none');

                    if (!data.length) {
                        $('#noBookings').removeClass('d-none');
                    } else {
                        $('#noBookings').addClass('d-none');
                    }
                    buildBookings(data);
                },
                error: function(xhr, status, error) {

                }
            })
        }

        function buildBookings(data) {
            const bookingStatusClass = {
                '1': 'text-success',
                '2': 'text-warning',
                '3': 'text-danger',
            }

            let bookingList = $('#bookings-list');
            bookingList.empty();

            $.each(data, function(index, item) {
                let id = item.id;
                let receiverID = item.tutor_main.tutor.user_profile_id;
                let bookingStatusID = item.booking_status_id;
                let bookingStatus = item.booking_status.status;
                let startDate = moment(item.session_start_date).format('MMMM D, YYYY');
                let endDate = item.session_end_date ? moment(item.session_end_date).format('MMMM D, YYYY') : '';
                let tutorName = item.tutor_main.tutor.user_profile.fname + ' ' + item.tutor_main.tutor.user_profile.lname;
                let studentName = item.guardian_main.child.fname + ' ' + item.guardian_main.child.lname;
                let tutorPic = item.tutor_main.tutor.user_profile.profile_pic;
                let subject = item.tutor_main.department_year_subject.subject.subjects;
                let yearLevel = item.tutor_main.department_year_subject.grade_level.year;
                let session_type = item.booking_availability.session_type.type;
                let day = item.booking_availability.day.day;
                let start_time = item.booking_availability.availability_start.availability;
                let end_time = item.booking_availability.availability_end.availability;

                let bookingItem = `
                    <li class="booking-item" data-booking-id="${id}">
                        <div class="card shadow-sm booking-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="row align-items-center justify-content-center w-100">
                                  <div class="col-12 col-md-4 d-flex justify-content-center mb-2">
                                        <div class="booking-profile-pic">
                                            <img src="${tutorPic}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--profile pic-->
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2">
                                        <div>
                                            <h6 class="fw-semibold">Tutor: <span class="fw-normal text-capitalize text-break">${tutorName}</span></h6>
                                            <h6 class="fw-semibold">Student: <span class=" fw-normal text-capitalize text-break">${studentName}</span></h6>
                                            <h6 class="fw-semibold">Subject: <span class="fw-normal">${subject}</span></h6>
                                            <h6 class="fw-semibold mb-3">Year Level: <span class="fw-normal">${yearLevel}</span></h6>
                                            <p class="mb-0 fw-semibold">Status: <span class="${bookingStatusClass[bookingStatusID]}">${bookingStatus}</span></p>
                                            <p class="mb-0 fw-semibold">Session Type: <span class="fw-normal">${session_type}</span></p>
                                            <p class="mb-0 fw-semibold">Day & Time: <span class="fw-normal text-break">${day}, ${start_time} - ${end_time}</span></p>
                                            <p class="mb-0 fw-semibold">Start Date: <span class="fw-normal text-break">${startDate}</span></p>
                                            <p class="mb-0 fw-semibold ${!endDate ? 'd-none' : ''}">End Date: <span class="fw-normal text-break">${endDate}</span></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-view bookingDismissBtn " data-tutor-id="${receiverID}" data-cancel-id="${id}" data-bs-toggle="modal" data-bs-target="#cancelBookingModal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </li>
                    `;
                bookingList.append(bookingItem);
            })

        }

        $('#bookings-list').on('click', '.bookingDismissBtn', function() {
            var cancelId = $(this).data('cancel-id');
            var receiverId = $(this).data('tutor-id');

            $('#cancelBookingID').val(cancelId);
            $('#receiverId').val(receiverId);

            var hiddenReceiver = $('#receiverId').val();
            var hiddenCancel = $('#cancelBookingID').val();
           // console.log('hidden cancel', hiddenCancel, 'receiver', hiddenReceiver);
        })

        $('#cancelBookingForm').on('submit', function(e) {
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
                    $('#cancelBookingForm').find('[type="submit"]').prop('disabled', true);
                },
                success: function(response) {

                    if (response.success) {
                        $('#cancelBookingForm')[0].reset();
                        $('#cancelBookingForm').find('[type="submit"]').prop('disabled', false);
                        $('#cancelBookingModal').modal('hide');
                        $('#bookingsModal').modal('show');
                        loadBookings();

                        let Alert =
                            `
                            <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                                ${response.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `;

                        let alertElement = $(Alert).appendTo('#bookings-alert-div');

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

                        let alertElement = $(Alert).appendTo('#bookings-alert-div');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);
                        $('#cancelBookingForm')[0].reset();
                        $('#cancelBookingForm').find('[type="submit"]').prop('disabled', false);
                        $('#cancelBookingModal').modal('hide');
                        $('#bookingsModal').modal('show');
                    }

                },
                error: function(response) {
                    if (response.error) {
                        let Alert =
                            `
                            <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                                ${response.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `;

                        let alertElement = $(Alert).appendTo('#bookings-alert-div');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);
                    }
                    $('#cancelBookingForm').find('[type="submit"]').prop('disabled', false);
                    $('#cancelBookingModal').modal('hide');
                    $('#bookingsModal').modal('show');
                }
            })
        })
    </script>
    <!----->





</body>

</html>

@endsection
<style>
    /*Filters*/
    .filter-btn {
        color: black;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        width: 267px !important
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

    /* Ensure the dropdown is wider than the button */
    .dropdown-menu {
        height: auto;
        max-height: 300px;
        /* Set maximum height to control dropdown length */
        overflow-y: auto;
        /* Add vertical scrollbar when content exceeds height */
        padding: 15px;
        /* Adjust padding for white space */
        min-width: 600px;
        /* Increase width to ensure enough space */
        width: auto;
        /* Allow the width to expand based on content */
        white-space: nowrap;
        /* Prevent text from wrapping */
    }

    /* Ensure labels and checkboxes are aligned properly */
    .form-check {
        padding-bottom: 10px;
    }

    /* Adjust spacing between label and inputs */
    .form-label {
        margin-bottom: 10px;
        font-weight: bold;
    }

    /* Optional: Adjust column spacing if needed */
    .vstack {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }




    /*cards*/
    .profile-pic-holder {
        width: 117px;
        height: 115px;
        position: relative;
        bottom: -75px;
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

    .result-section {
        overflow-y: auto;
        overflow-x: hidden;
        max-height: 580px;
        scrollbar-width: thin;
    }


    @media only screen and (max-width:1500px) {
        .search-container {
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

    .availChecks {
        fill: currentcolor;
        height: 25;
        width: 25;
    }
</style>