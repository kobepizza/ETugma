@extends('layouts.tutormaster')
@section('content')

@if(session('tutorMain'))
@php
$firstPreference = session('tutorMain')->preferenceLanguage->preference->first();
$page= "Profile";
@endphp
@endif

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="edit" viewBox="0 -960 960 960">
            <title>edit</title>
            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
        </symbol>
        <symbol id="add" viewBox="0 -960 960 960">
            <title>add</title>
            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="check" viewBox="0 -960 960 960">
            <title>check</title>
            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
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
</head>

<body>
    <!--MODALS-->
    <!--CHANGE PROFILE-->
    <div class="modal fade" tabindex="-1" id="changeprofile" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Profile Picture</h5>
                    <button type="button" class="btn-close close-profile-pic" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('tutor.profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label">Upload Profile Picture</label><!--new profile pic-->
                            <input type="file" class="form-control" name="profilePic" accept="image/png, image/jpeg" required>
                            <span class="fw-light fst-italic fs-6">Accepted document formats: .png, jpg, jpeg</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline btn-lg close-btn close-profile-pic" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline btn-lg save-btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of change profile-->
    <!--MANAGE CREDENTIALS-->
    <div class="modal fade" id="manage-credentials" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="ManageCredentialsLabel" tabindex="-1">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Manage Credentials</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- upload credentials -->
                    <section class="pb-4">
                        <h5 class="mb-5">Upload Credentials</h5>
                        <form method="post" id="credentialView" data-action="{{route('tutor.credentials')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col">
                                    <label class="form-label">Credential Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Credential Title" name="credentialName" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">Year Obtained <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Year Obtained" onblur="(this.placeholder='Year Obtained')" onfocus="(placeholder='ex. 2024')" maxlength="4" minlength="4" name="credentialYear" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Upload Credential File <span class="text-danger">*</span></label>
                                    <input type="file" accept="application/pdf" class="form-control" aria-label="Last name" name="credentialFile" required>
                                    <span class="fw-light fst-italic fs-6">Accepted document formats: .pdf</span>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline btn-lg save-btn">Upload Credential</button>
                                </div>
                            </div>
                    </section>
                    <!-- Credentials List -->
                    <section class="pb-4">
                        <h5>Your Credentials</h5>
                        <hr>
                        <ul class="credential list-group" id="credentialList" style="max-height:300px; overflow-y:auto; scrollbar-width:thin;">

                        </ul>
                        </form>
                        <!--end of loop-->

                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-lg close-btn" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end of manage credentials-->
    <!--MANAGE AVAILABILITY-->
    <div class="modal fade" id="manage-availability" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="ManageCredentialsLabel" tabindex="-1">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Manage Availability</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- add availability -->
                    <div id="avail-alert"></div>
                    <section class="pb-4">
                        <h5 class="mb-3">Add Availability</h5>
                        <form method="POST" id="availabilityView" data-action="{{route('tutor.dayTime')}}">
                            @csrf
                            <div class="row row-cols-auto align-items-center justify-content-center justify-content-lg-start">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="fs-5">Select Day<span class="text-danger">*</span></label>
                                        <div class="dropdown-center">
                                            <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                                Select Day
                                            </button>
                                            <div class="dropdown-menu filter-menu w-100" style="max-height: 200px; overflow-y: auto;">
                                                <div class="vstack">
                                                    @foreach ($day as $data)
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input radio" type="radio" name="day" id="day{{$data->id}}" value="{{$data->id}}"><!--dayID-->
                                                        <label class="form-check-label filter-item" for="day{{$data->id}}"><!--dayID-->
                                                            {{$data->day }}<!--day-->
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    <!--end looping-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="fs-5">Select Start Time<span class="text-danger">*</span></label>
                                        <div class="dropdown-center">
                                            <button id="startTimeBtn" class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                                Select Start Time
                                            </button>
                                            <div class="dropdown-menu filter-menu w-100" style="max-height: 200px; overflow-y: auto;">
                                                <div class="vstack">
                                                    @foreach ($availability as $data)
                                                    @if ($loop->remaining > 1)
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input radio" type="radio" name="startTime" id="startTime{{$data->id}}" value="{{$data->id}}"><!--timeID-->
                                                        <label class="form-check-label filter-item" for="startTime{{$data->id}}"><!--timeID-->
                                                            {{$data->availability }}<!--time-->
                                                        </label>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    <!--end looping-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="fs-5">Select End Time<span class="text-danger">*</span></label>
                                        <div class="dropdown-center">
                                            <button id="endTimeBtn" class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                                Select End Time
                                            </button>
                                            <div class="dropdown-menu filter-menu w-100" style="max-height: 200px; overflow-y: auto;">
                                                <div class="vstack">
                                                    @foreach ($availability as $data)
                                                    @if ($loop->index >= 2)
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input radio" type="radio" name="endTime" id="endTime{{$data->id}}" value="{{$data->id}}"><!--timeID-->
                                                        <label class="form-check-label filter-item" for="endTime{{$data->id}}"><!--timeID-->
                                                            {{$data->availability }}<!--time-->
                                                        </label>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    <!--end looping-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-outline btn-lg save-btn mt-2">Add Availability</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- availability List -->
                    <section class="pb-4">
                        <h5>Your Availability</h5>
                        <hr>
                        <div class="row row-cols-auto align-items-center justify-content-center justify-content-lg-start pb-4">
                            <div class="col-12">
                                <h5 class="mb-3">Filters</h5>
                            </div>
                            <div class="col">
                                <div class="dropdown-center mb-3">
                                    <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterDayDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                        Day
                                    </button>
                                    <div class="dropdown-menu filter-menu w-100">
                                        <input type="hidden" data-action="{{route('filter.availability')}}" id="AvailAct">
                                        <div class="vstack" id="dayForm">
                                            <!--day looping-->
                                            @foreach ($day as $data)
                                            <div class="form-check ms-3">
                                                <input class="form-check-input radio" type="radio" name="filterDay" id="filterDay{{$data->id}}" value="{{$data->id}}"><!--dayID-->
                                                <label class="form-check-label filter-item" for="filterDay{{$data->id}}"><!--dayID-->
                                                    {{$data->day }}<!--day-->
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
                                    <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterStartTimeDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                        Start Time
                                    </button>
                                    <div class="dropdown-menu filter-menu w-100" style="max-height: 200px; overflow-y: auto;">
                                        <div class="vstack" id="timeForm">
                                            <!--time looping-->
                                            @foreach ($availability as $data)
                                            @if ($loop->remaining > 1)
                                            <div class="form-check ms-3">
                                                <input class="form-check-input radio" type="radio" name="startFilterTime" id="startFilterTime{{$data->id}}" value="{{$data->id}}"><!--timeID-->
                                                <label class="form-check-label filter-item" for="startFilterTime{{$data->id}}"><!--timeID-->
                                                    {{$data->availability }}<!--time-->
                                                </label>
                                            </div>
                                            @endif
                                            @endforeach
                                            <!--end looping-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="dropdown-center mb-3">
                                    <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterEndTimeDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                        End Time
                                    </button>
                                    <div class="dropdown-menu filter-menu w-100" style="max-height: 200px; overflow-y: auto;">
                                        <div class="vstack" id="timeForm">
                                            <!--time looping-->
                                            @foreach ($availability as $data)
                                            @if ($loop->index >= 2)
                                            <div class="form-check ms-3">
                                                <input class="form-check-input radio" type="radio" name="endFilterTime" id="endFilterTime{{$data->id}}" value="{{$data->id}}"><!--timeID-->
                                                <label class="form-check-label filter-item" for="endFilterTime{{$data->id}}"><!--timeID-->
                                                    {{$data->availability }}<!--time-->
                                                </label>
                                            </div>
                                            @endif
                                            @endforeach
                                            <!--end looping-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button id="clear-filter" type="button" class="btn btn-outline save-btn mb-3">Clear Filters</button>
                            </div>
                        </div>
                        <ul class="availabilities list-group px-2" id="availabilityList" style="max-height:300px; overflow-y:auto; scrollbar-width:thin;">

                        </ul>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-lg close-btn" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end of manage availability-->
    <!--DELETE CREDENTIAL-->
    <div class="modal fade" id="deleteCredential" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCredentialModal" aria-hidden="true"><!--include tutor id-->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="vstack gap-4 d-flex align-items-center">
                        <svg class="" height="50" fill="currentcolor">
                            <use xlink:href="#info" />
                        </svg>
                        <h3>Are you sure you want to delete this credential?</h3>
                        <div class="hstack align-items-center justify-content-center w-100">
                            <form method="post" action="{{route('credential.delete')}}">
                                @csrf
                                <input type="hidden" value="" name="credentialId"> <!--value from credential-id will be passed here-->
                                <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#manage-credentials">Dismiss</button>
                                <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm deletion-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of delete credential-->
    <!--DELETE AVAILABILITY-->
    <div class="modal fade" id="deleteAvailability" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCredentialModal" aria-hidden="true"><!--include tutor id-->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="vstack gap-4 d-flex align-items-center">
                        <svg class="" height="50" fill="currentcolor">
                            <use xlink:href="#info" />
                        </svg>
                        <h3>Are you sure you want to delete this availability?</h3>
                        <div class="hstack align-items-center justify-content-center w-100">
                            <form method="POST" action="{{route('delete.availability')}}">
                                @csrf
                                <input type="hidden" value="" name="availabilityId"> <!--value from availability-id will be passed here-->
                                <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#manage-availability">Dismiss</button>
                                <button type="submit" class="btn btn-lg btn-book">Confirm</button><!--confirm deletion-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of delete availability-->
    <!--EDIT PREFERENCE-->
    <div class="modal fade" id="edit-preference" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <!--include child id -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Tutor's Preferences</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('tutor.updatePreference')}}">
                        @csrf
                        @foreach ($tutorMain as $tutor)


                        <input type="hidden" name="preference_id" value="{{$tutor->preferenceLanguage->id}}">

                        <div class="form-check mb-4">
                            <h3>Modality</h3>
                            <div class="hstack gap-3 mb-3">
                                @foreach ($tutor->preferenceLanguage->preference as $modality)
                                <input type="radio" class="btn-check" name="modality" autocomplete="off" value="1" id="modality1{{$tutor->tutor->id}}"
                                    @if ($tutor->preferenceLanguage->preference->first()->modality->id == '1')
                                checked
                                @endif
                                >
                                <label class="btn modal-pref" for="modality1{{$tutor->tutor->id}}">Face-to-Face</label>

                                <input type="radio" class="btn-check" name="modality" autocomplete="off" value="2" id="modality2{{$tutor->tutor->id}}"
                                    @if ($tutor->preferenceLanguage->preference->first()->modality->id == '2')
                                checked
                                @endif
                                >
                                <label class="btn modal-pref" for="modality2{{$tutor->tutor->id}}">Online</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-check mb-4">
                            <h3>Learning Style</h3>
                            <div class="hstack gap-3 mb-3">
                                @foreach ($tutor->preferenceLanguage->preference as $teachingStyle)
                                <input type="radio" class="btn-check" name="learning_style" autocomplete="off" value="1" id="teachingStyle1{{$tutor->tutor->id}}"
                                    @if ($tutor->preferenceLanguage->preference->first()->teachingStyle->id == '1')
                                checked
                                @endif
                                >
                                <label class="btn modal-pref" for="teachingStyle1{{$tutor->tutor->id}}">Visual Aids</label>

                                <input type="radio" class="btn-check" name="learning_style" autocomplete="off" value="2" id="teachingStyle2{{$tutor->tutor->id}}"
                                    @if ($tutor->preferenceLanguage->preference->first()->teachingStyle->id == '2')
                                checked
                                @endif
                                >
                                <label class="btn modal-pref" for="teachingStyle2{{$tutor->tutor->id}}">Verbal</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-check mb-4">
                            <h3>Language</h3>
                            <div class="hstack gap-3 mb-3">
                                @foreach (['1' => 'English', '2' => 'Filipino'] as $languageId => $languageName)
                                <input type="checkbox" class="btn-check" name="languages[]" id="editlanguage{{$languageId}}{{$tutor->tutor->id}}" autocomplete="off" value="{{$languageId}}"
                                    @if (in_array($languageId, explode(',', $tutor->preferenceLanguage->languages)))
                                checked
                                @endif
                                >
                                <label class="btn modal-pref" for="editlanguage{{$languageId}}{{$tutor->tutor->id}}">{{$languageName}}</label>
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-lg close-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline btn-lg save-btn">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end of edit preference-->
    <!--end of modals-->
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>My Profile</h4>
            </div>
            <div>
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">{{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
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
            <!--LOOPING--><!--tutor_main-->
            @foreach ($tutorMain as $tutor)
            <!--header-->
            <section class="mb-4">
                <div class="vstack gap-2 d-flex align-items-center w-100">
                    <div class="profile-pic">
                        @foreach ($profile as $data)
                        <img src="{{ asset($data->profile_pic)}}" alt="" width="140" height="140" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--parent profile picture-->
                        @endforeach
                        <a type="button" class="rounded-circle bg-white p-2 change-profile-btn" id="changeprofilebtn" data-bs-toggle="modal" data-bs-target="#changeprofile">
                            <svg class="" height="25" width="23">
                                <use xlink:href="#edit" />
                            </svg>
                        </a>
                    </div>
                    <span class="d-flex align-items-center justify-content-center">
                        <svg class="verified-icon {{session('tutorMain')->tutor->verificationStatus->id == 1 ? 'd-flex' : 'd-none'}}" height="45" width="45"> <!-- from session verification-->
                            <use xlink:href="#verified" />
                        </svg>
                        <h1 class="fw-bold mb-0">{{ strtoupper(session('user_profiles')->fname) . ' ' . strtoupper(session('user_profiles')->lname) ?? 'N/A' }}</h1>
                    </span> <!--Tutor full name-->
                    <h3>{{ session('tutorMain')->tutor->employmentSession->employmentType->type}} Tutor</h3><!---Employment type-->
                </div>
            </section>
            <!---->
            <!--nav tabs-->
            <ul class="nav nav-tabs mb-4" id="profile-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">
                        Profile
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="credential-tab" data-bs-toggle="tab" data-bs-target="#credential-tab-pane" type="button" role="tab" aria-controls="credential-tab-pane" aria-selected="false">
                        Credentials
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="preference-tab" data-bs-toggle="tab" data-bs-target="#preference-tab-pane" type="button" role="tab" aria-controls="preference-tab-pane" aria-selected="false">
                        Preference
                    </button>
                </li>
                <!--END OF LOOP-->
            </ul>
            <!---->
            <!--body-->
            <div class="tab-content" id="profile-tabs-content">
                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"> <!--profile-->
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <section class="mb-5">
                                <h3 class="text-center text-xl-start pb-2">Tutor Information</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Session Type
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ session('tutorMain')->tutor->employmentSession->sessionType->type}} Sessions</span> <!--session type-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Department
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ session('tutorMain')->departmentYearSubject->department->department}}</span> <!--department-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Subject
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ session('tutorMain')->departmentYearSubject->subject->subjects}}</span> <!--Subject-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Year Level
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ session('tutorMain')->departmentYearSubject->gradeLevel->year}}</span> <!--year level-->
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </section>
                        </div>
                        <div class="col-12 col-xl-6">
                            <section class="mb-5">
                                <h3 class="text-center text-xl-start pb-2">Academic Background</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                School
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ session('tutorMain')->requirement->school}}</span> <!--school-->
                                            </div>
                                        </div>
                                    </li>
                                    @if(session('tutorMain')->education_level_id == 1)
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Degree
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ !empty(session('tutorMain')->requirement->degree) ? session('tutorMain')->requirement->degree: 'N/A' }}</span> <!--school-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Year Graduated
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ !empty(session('tutorMain')->requirement->year_of_graduate) ? session('tutorMain')->requirement->year_of_graduate : 'N/A' }}</span> <!--year level-->
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="credential-tab-pane" role="tabpanel" aria-labelledby="credential-tab" tabindex="0"> <!--credentials-->
                    <div class="credentials">
                        <a type="button" id="manage-credential-btn" class="float-end p-0" data-bs-toggle="modal" data-bs-target="#manage-credentials">
                            <svg height="35" width="33">
                                <use xlink:href="#edit" />
                            </svg>
                        </a>
                        <h3 class="text-center text-xl-start pb-2">Your Credentials</h3>
                        <ul class="list-group p-2" id="credentialMain" style="max-height:380px; overflow-y:auto;">

                        </ul>
                        <div class="d-flex justify-content-center d-none" id="add-credentials-btn">
                            <button type="button" class="btn btn-view d-flex align-items-center justify-content-center gap-1" data-bs-toggle="modal" data-bs-target="#manage-credentials">
                                <svg height="25" width="25" fill="currentcolor">
                                    <use xlink:href="#add" />
                                </svg>
                                Add Credentials
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="preference-tab-pane" role="tabpanel" aria-labelledby="credential-tab" tabindex="0"> <!--preference-->
                    <div class="row">
                        <div class="availability col-12 col-xl-7">
                            <a type="button" id="manage-availability-btn" class="float-end p-0" data-bs-toggle="modal" data-bs-target="#manage-availability">
                                <svg height="35" width="33">
                                    <use xlink:href="#edit" />
                                </svg>
                            </a>
                            <h3 class="text-center text-xl-start pb-2">Availability</h3>
                            <section class="mb-5" style="overflow-x:auto;">
                                <table class="table table-xl table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">7:00AM</th><!--0-->
                                            <th scope="col">7:30AM</th><!--1-->
                                            <th scope="col">8:00AM</th><!--2-->
                                            <th scope="col">8:30AM</th><!--3-->
                                            <th scope="col">9:00AM</th><!--4-->
                                            <th scope="col">9:30AM</th><!--5-->
                                            <th scope="col">10:00AM</th><!--6-->
                                            <th scope="col">10:30AM</th><!--7-->
                                            <th scope="col">11:00AM</th><!--8-->
                                            <th scope="col">11:30AM</th><!--9-->
                                            <th scope="col">12:00PM</th><!--10-->
                                            <th scope="col">12:30PM</th><!--11-->
                                            <th scope="col">1:00PM</th><!--12-->
                                            <th scope="col">1:30PM</th><!--13-->
                                            <th scope="col">2:00PM</th><!--14-->
                                            <th scope="col">2:30PM</th><!--15-->
                                            <th scope="col">3:00PM</th><!--16-->
                                            <th scope="col">3:30PM</th><!--17-->
                                            <th scope="col">4:00PM</th><!--18-->
                                            <th scope="col">4:30PM</th><!--19-->
                                            <th scope="col">5:00PM</th><!--20-->
                                            <th scope="col">5:30PM</th><!--21-->
                                            <th scope="col">6:00PM</th><!--22-->
                                            <th scope="col">6:30PM</th><!--23-->
                                            <th scope="col">7:00PM</th><!--24-->
                                            <th scope="col">7:30PM</th><!--25-->
                                            <th scope="col">8:00PM</th><!--26-->
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider" id="checkCells">
                                        <tr><!--monday-->
                                            <th scope="row">Monday</th>
                                            <td><!--1--></td>
                                            <td><!--2--></td>
                                            <td><!--3--></td>
                                            <td><!--4--></td>
                                            <td><!--5--></td>
                                            <td><!--6--></td>
                                            <td><!--7--></td>
                                            <td><!--8--></td>
                                            <td><!--9--></td>
                                            <td><!--10--></td>
                                            <td><!--11--></td>
                                            <td><!--12--></td>
                                            <td><!--13--></td>
                                            <td><!--14--></td>
                                            <td><!--15--></td>
                                            <td><!--16--></td>
                                            <td><!--17--></td>
                                            <td><!--18--></td>
                                            <td><!--19--></td>
                                            <td><!--20--></td>
                                            <td><!--21--></td>
                                            <td><!--22--></td>
                                            <td><!--23--></td>
                                            <td><!--24--></td>
                                            <td><!--25--></td>
                                            <td><!--26--></td>
                                            <td><!--27--></td>
                                        </tr>
                                        <tr><!--tuesday-->
                                            <th scope="row">Tuesday</th>
                                            <td><!--1--></td>
                                            <td><!--2--></td>
                                            <td><!--3--></td>
                                            <td><!--4--></td>
                                            <td><!--5--></td>
                                            <td><!--6--></td>
                                            <td><!--7--></td>
                                            <td><!--8--></td>
                                            <td><!--9--></td>
                                            <td><!--10--></td>
                                            <td><!--11--></td>
                                            <td><!--12--></td>
                                            <td><!--13--></td>
                                            <td><!--14--></td>
                                            <td><!--15--></td>
                                            <td><!--16--></td>
                                            <td><!--17--></td>
                                            <td><!--18--></td>
                                            <td><!--19--></td>
                                            <td><!--20--></td>
                                            <td><!--21--></td>
                                            <td><!--22--></td>
                                            <td><!--23--></td>
                                            <td><!--24--></td>
                                            <td><!--25--></td>
                                            <td><!--26--></td>
                                            <td><!--27--></td>
                                        </tr>
                                        <tr><!--wednesday-->
                                            <th scope="row">Wednesday</th>
                                            <td><!--1--></td>
                                            <td><!--2--></td>
                                            <td><!--3--></td>
                                            <td><!--4--></td>
                                            <td><!--5--></td>
                                            <td><!--6--></td>
                                            <td><!--7--></td>
                                            <td><!--8--></td>
                                            <td><!--9--></td>
                                            <td><!--10--></td>
                                            <td><!--11--></td>
                                            <td><!--12--></td>
                                            <td><!--13--></td>
                                            <td><!--14--></td>
                                            <td><!--15--></td>
                                            <td><!--16--></td>
                                            <td><!--17--></td>
                                            <td><!--18--></td>
                                            <td><!--19--></td>
                                            <td><!--20--></td>
                                            <td><!--21--></td>
                                            <td><!--22--></td>
                                            <td><!--23--></td>
                                            <td><!--24--></td>
                                            <td><!--25--></td>
                                            <td><!--26--></td>
                                            <td><!--27--></td>
                                        </tr>
                                        <tr><!--thursday-->
                                            <th scope="row">Thursday</th>
                                            <td><!--1--></td>
                                            <td><!--2--></td>
                                            <td><!--3--></td>
                                            <td><!--4--></td>
                                            <td><!--5--></td>
                                            <td><!--6--></td>
                                            <td><!--7--></td>
                                            <td><!--8--></td>
                                            <td><!--9--></td>
                                            <td><!--10--></td>
                                            <td><!--11--></td>
                                            <td><!--12--></td>
                                            <td><!--13--></td>
                                            <td><!--14--></td>
                                            <td><!--15--></td>
                                            <td><!--16--></td>
                                            <td><!--17--></td>
                                            <td><!--18--></td>
                                            <td><!--19--></td>
                                            <td><!--20--></td>
                                            <td><!--21--></td>
                                            <td><!--22--></td>
                                            <td><!--23--></td>
                                            <td><!--24--></td>
                                            <td><!--25--></td>
                                            <td><!--26--></td>
                                            <td><!--27--></td>
                                        </tr>
                                        <tr><!--friday-->
                                            <th scope="row">Friday</th>
                                            <td><!--1--></td>
                                            <td><!--2--></td>
                                            <td><!--3--></td>
                                            <td><!--4--></td>
                                            <td><!--5--></td>
                                            <td><!--6--></td>
                                            <td><!--7--></td>
                                            <td><!--8--></td>
                                            <td><!--9--></td>
                                            <td><!--10--></td>
                                            <td><!--11--></td>
                                            <td><!--12--></td>
                                            <td><!--13--></td>
                                            <td><!--14--></td>
                                            <td><!--15--></td>
                                            <td><!--16--></td>
                                            <td><!--17--></td>
                                            <td><!--18--></td>
                                            <td><!--19--></td>
                                            <td><!--20--></td>
                                            <td><!--21--></td>
                                            <td><!--22--></td>
                                            <td><!--23--></td>
                                            <td><!--24--></td>
                                            <td><!--25--></td>
                                            <td><!--26--></td>
                                            <td><!--27--></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <div class="col-12 preference col-xl">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="text-center mb-3">Tutor's Preference</h3>
                                <a type="button" id="edit-preference-btn" class="float-end p-0 editprefbtn" data-bs-toggle="modal" data-bs-target="#edit-preference">
                                    <svg height="35" width="33">
                                        <use xlink:href="#edit" />
                                    </svg>
                                </a>
                            </div>
                            <section>
                                <div class="container d-flex justify-content-center border border-1 rounded-5 shadow-sm p-3 mb-2">
                                    <div>
                                        <div class="form-check mb-4">
                                            <h3>Modality</h3>
                                            <div class="hstack gap-3 mb-3 ">
                                                @foreach ($tutor->preferenceLanguage->preference as $modality)
                                                @if ($modality->modality->id == '1')
                                                <input type="radio" class="btn-check" name="modality{{$tutor->tutor->id}}" autocomplete="off" value="f2f" id="modality1{{$tutor->tutor->id}}" checked>
                                                @else
                                                <input type="radio" class="btn-check" name="modality{{$tutor->tutor->id}}" autocomplete="off" value="f2f" id="modality1{{$tutor->tutor->id}}">
                                                @endif
                                                <label class="btn option-btn" for="modality1{{$tutor->tutor->id}}">Face-to-Face</label>

                                                @if ($modality->modality->id == '2')
                                                <input type="radio" class="btn-check" name="modality{{$tutor->tutor->id}}" autocomplete="off" value="online" id="modality2{{$tutor->tutor->id}}" checked>
                                                @else
                                                <input type="radio" class="btn-check" name="modality{{$tutor->tutor->id}}" autocomplete="off" value="online" id="modality2{{$tutor->tutor->id}}">
                                                @endif
                                                <label class="btn option-btn" for="modality2{{$tutor->tutor->id}}">Online</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-check mb-4">
                                            <h3>Learning Style</h3>
                                            <div class="hstack gap-3 mb-3 ">
                                                @foreach ($tutor->preferenceLanguage->preference as $teachingStyle)
                                                @if ($teachingStyle->teachingStyle->id== '1')

                                                <input type="radio" class="btn-check" name="learning-style{{$tutor->tutor->id}}" autocomplete="off" value="visual" id="teachingStyle1{{$tutor->tutor->id}}" checked>
                                                @else
                                                <input type="radio" class="btn-check" name="learning-style{{$tutor->tutor->id}}" autocomplete="off" value="visual" id="teachingStyle1{{$tutor->tutor->id}}">
                                                <!--include child id -->
                                                @endif
                                                <label class="btn option-btn" for="teachingStyle1{{$tutor->tutor->id}}">Visual Aids</label>

                                                @if ($teachingStyle->teachingStyle->id== '2')
                                                <input type="radio" class="btn-check" name="learning-style{{$tutor->tutor->id}}" autocomplete="off" value="verbal" id="teachingStyle2{{$tutor->tutor->id}}" checked><!--include child id -->
                                                @else
                                                <input type="radio" class="btn-check" name="learning-style{{$tutor->tutor->id}}" autocomplete="off" value="verbal" id="teachingStyle2{{$tutor->tutor->id}}"><!--include child id -->
                                                @endif
                                                <label class="btn option-btn" for="teachingStyle2{{$tutor->tutor->id}}">Verbal</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-check mb-4">
                                            <h3>Language</h3>
                                            <div class="hstack gap-3 mb-3">
                                                @foreach (['1' => 'English', '2' => 'Filipino'] as $languageId => $languageName)
                                                <input type="checkbox" class="btn-check" name="languages[]" id="editlanguage{{$languageId}}{{$tutor->tutor->id}}" autocomplete="off" value="{{$languageId}}"
                                                    @if (in_array($languageId, explode(',', $tutor->preferenceLanguage->languages)))
                                                checked
                                                @endif
                                                >
                                                <label class="btn option-btn" for="editlanguage{{$languageId}}{{$tutor->tutor->id}}">{{$languageName}}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--END OF LOOP-->
            @endforeach
        </div>
    </main>
    <script>
        $(document).ready(function() {
            loadAvailability();
            loadCredential();
            dropdowns();
            openProfilePicModal();
        });

        setTimeout(function() {
            $('.alert').remove();
        }, 3000);

        //profile picture
        function openProfilePicModal() {
            const urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('openProfilePic')) {
                $('#changeprofile').modal('show');
            }
        }

        function closeProfilePicModal() {
            const url = new URL(window.location.href);
            url.searchParams.delete('openProfilePic'); // Replace 'parameter_name' with the actual name of your URL parameter
            window.history.replaceState(null, '', url);
        }

        $('.close-profile-pic').on('click', function() {
            const urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('openProfilePic')) {
                closeProfilePicModal();
            }
        })
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

        // Bind event to Start Time radio buttons
        $('input[name="startTime"]').on('change', function() {
            const selectedStartTime = $(this).next('label').text().trim(); // Get the selected start time

            // Update the Start Time button text
            $('#startTimeBtn').text(selectedStartTime);

            // Filter End Time options based on Start Time
            filterEndTimeOptions(selectedStartTime);
        });

        // Function to filter End Time options
        function filterEndTimeOptions(startTime) {
            const [startHourRaw, startMinutesRaw] = startTime.split(':');
            let startHour = parseInt(startHourRaw);
            let startMinutes = parseInt(startMinutesRaw);

            // Convert AM/PM to 24-hour format for better comparison
            if (startTime.includes('PM') && startHour !== 12) {
                startHour += 12;
            } else if (startTime.includes('AM') && startHour === 12) {
                startHour = 0; // Midnight case
            }

            // Loop through all end time radio buttons
            $('input[name="endTime"]').each(function() {
                const endTime = $(this).next('label').text().trim();
                const [endHourRaw, endMinutesRaw] = endTime.split(':');
                let endHour = parseInt(endHourRaw);
                let endMinutes = parseInt(endMinutesRaw);

                // Convert AM/PM for the end time
                if (endTime.includes('PM') && endHour !== 12) {
                    endHour += 12;
                } else if (endTime.includes('AM') && endHour === 12) {
                    endHour = 0;
                }

                // Calculate total minutes for easier comparison
                const startTotalMinutes = startHour * 60 + startMinutes;
                const endTotalMinutes = endHour * 60 + endMinutes;

                // Show times with at least a 1-hour interval
                if (endTotalMinutes >= startTotalMinutes + 60) {
                    $(this).closest('.form-check').show(); // Show valid end times
                } else {
                    $(this).closest('.form-check').hide(); // Hide invalid end times
                }
            });

            // Reset the End Time button text
            $('#endTimeBtn').text('Select End Time');
        }

        //get availability and display in the table
        function loadAvailability() {
            $.ajax({
                type: "GET",
                url: "{{ route('tutor.load.availability') }}",
                success: function(data) {
                    $('#availabilityList').html(''); // Clear previous availability list
                    let availability = '';

                    // Clear previous table highlights
                    $('#checkCells tr td').each(function() {
                        $(this).html('').css('background-color', ''); // Clear existing content and background
                    });

                    $.each(data, function(index, value) {
                        let day = value.day.day; // e.g., Monday
                        let startTime = value.availability_start.availability; // e.g., "9:00AM"
                        let endTime = value.availability_end.availability; // e.g., "12:00PM"
                        let dayIndex = getDayIndex(day);
                        let startTimeIndex = getTimeIndex(startTime);
                        let endTimeIndex = getTimeIndex(endTime);

                        // Find the corresponding table row (day) and highlight cells (time)
                        let tableRow = $('#checkCells').find('tr:eq(' + dayIndex + ')');

                        // Loop through each cell in the range between startTimeIndex and endTimeIndex
                        for (let i = startTimeIndex; i < endTimeIndex; i++) {
                            let cell = tableRow.find('td:eq(' + i + ')'); // Select the cell at index i
                            cell.empty(); // Clear the content of the cell
                            cell.append('<hr class="border-3 opacity-75 text-success">'); // Add the <hr> element
                        }

                        /*
                        // Find the corresponding table row (day) and highlight cells (time)
                        let tableRow = $('#checkCells').find('tr:eq(' + dayIndex + ')');

                        // Calculate the colspan (similar to blockSpan in your Blade code)
                        let blockSpan = endTimeIndex - startTimeIndex;

                        // Find the starting table cell (the first one to span across)
                        let startCell = tableRow.find('td:eq(' + startTimeIndex + ')');

                        // Remove the additional cells in the range between startTimeIndex and endTimeIndex
                        for (let i = startTimeIndex + 1; i < endTimeIndex; i++) {
                            tableRow.find('td:eq(' + startTimeIndex + 1 + ')').remove(); // Remove cells after the starting one
                        }

                        // Adjust the first cell: set colspan and insert the <hr>
                        startCell.attr('colspan', blockSpan); // Set the colspan attribute
                        startCell.empty(); // Clear the content of the cell
                        startCell.append('<hr class="border-3 opacity-75 text-success">'); // Add the <hr> element
                        */


                        // Update availability list
                        availability += `
                    <li class="list-group-item" data-day-id="${value.day_id}" data-startTime-id="${value.availability_start_id}" data-endTime-id="${value.availability_end_id}">
                        <div class="data-container d-flex align-items-center p-2">
                            <span class="data-title fs-5 col-8">
                                ${day} <!--Day-->
                            </span>
                            <div class="col-4 d-flex align-items-center justify-content-between">
                                <span class="fs-5 data-value">${startTime} - ${endTime}</span> <!--Time-->
                                <a class="DeleteAvailability" type="button" data-bs-toggle="modal" data-bs-target="#deleteAvailability" data-availability-id="${value.id}">
                                    <svg class="delete-availability-icon" height="30" width="28">
                                        <use xlink:href="#close" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </li>`;
                    });

                    $('#availabilityList').append(availability);
                }
            });
        }

        // Get day index for table row mapping
        function getDayIndex(day) {
            switch (day) {
                case 'Monday':
                    return 0;
                case 'Tuesday':
                    return 1;
                case 'Wednesday':
                    return 2;
                case 'Thursday':
                    return 3;
                case 'Friday':
                    return 4;
                default:
                    return -1;
            }
        }

        // Time index mapping to table columns
        const timeIndexMap = {
            '7:00AM': 0,
            '7:30AM': 1,
            '8:00AM': 2,
            '8:30AM': 3,
            '9:00AM': 4,
            '9:30AM': 5,
            '10:00AM': 6,
            '10:30AM': 7,
            '11:00AM': 8,
            '11:30AM': 9,
            '12:00PM': 10,
            '12:30PM': 11,
            '1:00PM': 12,
            '1:30PM': 13,
            '2:00PM': 14,
            '2:30PM': 15,
            '3:00PM': 16,
            '3:30PM': 17,
            '4:00PM': 18,
            '4:30PM': 19,
            '5:00PM': 20,
            '5:30PM': 21,
            '6:00PM': 22,
            '6:30PM': 23,
            '7:00PM': 24,
            '7:30PM': 25,
            '8:00PM': 26
        };

        function getTimeIndex(time) {
            return timeIndexMap[time];
        }
        //
        //create and append new availability
        $("#availabilityView").on('submit', function(event) {
            event.preventDefault();

            var selectedStartTime = $('input[name="startTime"]:checked');
            var selectedEndTime = $('input[name="endTime"]:checked');

            if (selectedEndTime.val() - selectedStartTime.val() < 2) {
                alert("Please select at least an hour availability");
                return;
            }

            var url = $(this).attr('data-action');
            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(response) {

                    loadAvailability();
                    //AvailabilityData(response); // Move this line here

                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#avail-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                },
                error: function(xhr, status, error) {
                    console.log('Error response:', xhr.responseText);
                    //alert('Error adding availability. Check if availability already exists.');

                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             Error adding availability. Check if availability already exists.
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#avail-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            });

        });

        function AvailabilityData(response) {
            //console.log(response);
            var html = "<li class='list-group-item' data-day-id='" + response.day_id + "' data-startTime-id='" + response.availability_start_id + "' data-endTime-id='" + response.availability_end_id + "''>" +
                "<div class='data-container d-flex align-items-center p-2'>" +
                "<span class='data-title fs-5 col-8'>" +
                response.day.day +
                "</span>" +
                "<div class='col-4 d-flex align-items-center justify-content-between'>" +
                "<span class='fs-5 data-value'>" + response.availabilityStart.availability + ' - ' + response.availabilityEnd.availability + "</span>" +
                "<a class='DeleteAvailability' type='button' data-bs-toggle='modal' data-bs-target='#deleteAvailability' data-availability-id='" + response.id + "'>" +
                "<svg class='delete-availability-icon' height='30' width='28'>" +
                "<use xlink:href='#close'/>" +
                "</svg>" +
                "</a>" +
                "</div>" +
                "</div>" +
                "</li>";

            $("#availabilityList").append(html);
        }
        //filter availability
        // Filter availability based on day, start time, and end time
        $('input[name="filterDay"], input[name="startFilterTime"], input[name="endFilterTime"]').on('change', function() {
            let dayId = $('input[name="filterDay"]:checked').val();
            let startTimeId = $('input[name="startFilterTime"]:checked').val();
            let endTimeId = $('input[name="endFilterTime"]:checked').val();

            $('#availabilityList li').hide(); // Hide all list items initially

            // Show filtered items based on selections (priority on combined filters first)
            if (dayId && startTimeId && endTimeId) {
                // Filter by day, start time, and end time
                $('#availabilityList li[data-day-id="' + dayId + '"][data-startTime-id="' + startTimeId + '"][data-endTime-id="' + endTimeId + '"]').show();
            } else if (dayId && startTimeId) {
                // Filter by day and start time
                $('#availabilityList li[data-day-id="' + dayId + '"][data-startTime-id="' + startTimeId + '"]').show();
            } else if (dayId && endTimeId) {
                // Filter by day and end time
                $('#availabilityList li[data-day-id="' + dayId + '"][data-endTime-id="' + endTimeId + '"]').show();
            } else if (startTimeId && endTimeId) {
                // Filter by start time and end time
                $('#availabilityList li[data-startTime-id="' + startTimeId + '"][data-endTime-id="' + endTimeId + '"]').show();
            } else if (dayId) {
                // Filter by day only
                $('#availabilityList li[data-day-id="' + dayId + '"]').show();
            } else if (startTimeId) {
                // Filter by start time only
                $('#availabilityList li[data-startTime-id="' + startTimeId + '"]').show();
            } else if (endTimeId) {
                // Filter by end time only
                $('#availabilityList li[data-endTime-id="' + endTimeId + '"]').show();
            } else {
                // Show all if no filter is selected
                $('#availabilityList li').show();
            }
        });

        // Clear filters button
        $('#clear-filter').on('click', function() {
            // Reset the filter dropdowns and uncheck the radio buttons

            var filterDay = $('#filterDayDrop');
            var filterStart = $('#filterStartTimeDrop');
            var filterEnd = $('#filterEndTimeDrop');


            filterDay.text('Day');
            filterStart.text('Start Time');
            filterEnd.text('End Time');

            filterDay.dropdown('hide');
            filterStart.dropdown('hide');
            filterEnd.dropdown('hide');

            $('input[name="filterDay"], input[name="startFilterTime"], input[name="endFilterTime"]').prop('checked', false);

            $('#availabilityList li').show(); // Show all items after clearing filters
        });
        //
        //delete availability
        $('#deleteAvailability form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('delete.availability') }}",
                data: formData,
                success: function(data) {

                    loadAvailability();
                    $('#deleteAvailability').modal('hide');
                    $('#manage-availability').modal('show');
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                }
            });
        });
        //
        //get credentials
        function loadCredential() {
            $.ajax({
                type: "GET",
                url: "{{ route('tutor.load.credential') }}",
                success: function(data) {
                    let credentialList = $('#credentialList');
                    let credentialMain = $('#credentialMain');
                    credentialList.empty();
                    credentialMain.empty();

                    if (!data.length) {
                        $('#add-credentials-btn').removeClass('d-none');
                    } else {
                        $('#add-credentials-btn').addClass('d-none');
                    }

                    $.each(data, function(index, value) {
                       // console.log('credential:', value);
                        let credentialId = value.id;
                        let name = value.name;
                        let year = value.year;
                        //console.log('availabilityID:',value.id,'day:',day,'time:',time,'dayID:',dayId,'timeID:',timeId);
                        credentialMainData = `
                        <li class="list-group-item">
                            <div class="data-container d-flex align-items-center p-2">
                                <span class="data-title fs-5 col-10">
                                    ${name}
                                </span>
                                <div class="col-2">
                                    <span class="fs-5 data-value">${year}</span>
                                </div>
                            </div>
                        </li>
                    `;
                        credentialListData = `
                        <li class="list-group-item">
                            <div class="data-container d-flex align-items-center p-2">
                                <span class="data-title fs-5 col-10">
                                    ${name}
                                </span>
                                <div class="col-2 d-flex align-items-center justify-content-between">
                                    <span class="fs-5 data-value">${year}</span>
                                    <a class="DeleteCredential" type="button" data-bs-toggle="modal" data-bs-target="#deleteCredential" data-credential-id="${credentialId}">
                                        <svg class="delete-credential-icon" height="30" width="28">
                                            <use xlink:href="#close" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </li>
                    `;
                        credentialMain.append(credentialMainData);
                        credentialList.append(credentialListData);
                    });

                }

            })
        }
        //
        //create and append new credential
        $("#credentialView").on('submit', function(event) {
            event.preventDefault();

            var url = $(this).attr('data-action');
            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(response) {
                    //console.log(response);
                    loadCredential();
                },
                error: function(response) {
                    //console.error('Error:', error);

                }
            });

        });

        //
        //delete credential
        $('#deleteCredential form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('credential.delete') }}",
                data: formData,
                success: function(data) {
                    $('#deleteCredential').modal('hide');
                    $('#manage-credentials').modal('show');
                    $('#credentialList').empty();
                    $('#credentialMain').empty();
                    loadCredential();
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                }
            });
        });
        //
        $('#credentialList').on('click', '.DeleteCredential', function() {
            var credentialId = $(this).attr('data-credential-id');
            $('#deleteCredential input[name="credentialId"]').val(credentialId);
            var todelete = $('#deleteCredential input[name="credentialId"]').val()
            //console.log('deleteCredential:', todelete);
        });
        $('#availabilityList').on('click', '.DeleteAvailability', function() {
            var avalabilityId = $(this).attr('data-availability-id');
            $('#deleteAvailability input[name="availabilityId"]').val(avalabilityId);
            var todelete = $('#deleteAvailability input[name="availabilityId"]').val()
            //console.log('deleteAvail:', todelete);
        });
    </script>
</body>
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

    .profile-pic {
        width: 140px;
        height: 140px;
        bottom: -60px;
        border-radius: 50%;
    }

    .profile-pic:hover {
        cursor: pointer;

        .change-profile-btn {
            visibility: visible;
            opacity: 1;
        }
    }

    .change-profile-btn {
        border: 1px solid gray;
        visibility: hidden;
        position: relative;
        left: 100px;
        bottom: 140px;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    .edit-profile-btn {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    ul#profile-tabs button {
        color: black;
        width: 150px;
        transition: all 0.3s ease;
    }

    ul#profile-tabs button :hover {
        transition: all 0.3s ease;
    }

    ul#profile-tabs button.active {
        color: #759C75;
    }

    #edit-preference-btn {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    .preference:hover {
        #edit-preference-btn {
            visibility: visible;
            opacity: 1;
        }
    }

    #manage-credential-btn {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    .credentials:hover {
        #manage-credential-btn {
            visibility: visible;
            opacity: 1;
        }
    }

    .DeleteCredential:hover {
        .delete-credential-icon {
            fill: #99CC99 !important;
            transition: 0.3s ease;
        }
    }

    .delete-credential-icon {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    ul.credential .list-group-item:hover {
        cursor: auto;
        background-color: #eeee;
        transition: all 0.3s ease-in-out;

        .delete-credential-icon {
            visibility: visible;
            opacity: 1;
        }
    }

    .DeleteAvailability:hover {
        .delete-availability-icon {
            fill: #99CC99 !important;
            transition: 0.3s ease;
        }
    }

    .delete-availability-icon {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    ul.availabilities .list-group-item:hover {
        cursor: auto;
        background-color: #eeee;
        transition: all 0.3s ease-in-out;

        .delete-availability-icon {
            visibility: visible;
            opacity: 1;
        }
    }

    .availability:hover {
        #manage-availability-btn {
            visibility: visible;
            opacity: 1;
        }
    }

    #manage-availability-btn {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
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

    label.option-btn {
        /* Display only*/
        width: 200px;
        padding: 10px;
        font-size: large;
        color: black;
        border-color: #759C75 !important;
        border-radius: 50px;
        pointer-events: none !important;
    }

    .modal-pref {
        /* modal*/
        width: 200px !important;
        padding: 10px !important;
        font-size: large !important;
        color: black !important;
        border-color: #759C75 !important;
        border-radius: 50px !important;
    }

    input[type="radio"]:checked+label,
    input[type="checkbox"]:checked+label {
        color: white !important;
        border-color: #759C75 !important;
        border-radius: 50px;
        background-color: #759C75 !important;
        transition: all 0.3s ease-in-out;
    }

    .close-btn {
        border-color: #99CC99 !important;
        color: #000 !important;
        transition: all 0.3s ease !important;
    }

    .close-btn:hover {
        background-color: #99CC99 !important;
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
        width: 250px !important
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

    #checkCells {
        border-collapse: collapse;
        /* Ensures that cells have no spacing between borders */
    }

    #checkCells th[scope=row] {
        border: none;
        padding-right: 25px;
    }

    #checkCells td {
        padding: 0;
        /* Removes padding inside each cell */
        margin: 0;
        /* Removes margin (though typically table cells do not have margin by default) */
        border: none;
        /* Optional: Remove borders if present */
    }
</style>