@extends('layouts.headadminmaster')
@section('content')


@php
$page= "Profile";
@endphp
<html>

<head>
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
</head>

<body>
    <!--MODALS-->
    <!--CHANGE PROFILE-->
    <div class="modal fade" tabindex="-1" id="changeprofile" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('headAdmin.profileEdit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label">Upload Profile Picture</label><!--new profile pic-->
                            <input type="file" class="form-control" name="profilePic" accept="image/png, image/jpeg" required>
                            <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline btn-lg close-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline btn-lg save-btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of change profile-->

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
            <!--header-->
            <section class="mb-4">
                <div class="vstack gap-2 d-flex align-items-center w-100">
                    <div class="profile-pic">

                        <img src="{{asset($profile->profile_pic)}}" alt="" width="140" height="140" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--parent profile picture-->

                        <a type="button" class="rounded-circle bg-white p-2 change-profile-btn" id="changeprofilebtn" data-bs-toggle="modal" data-bs-target="#changeprofile">
                            <svg class="" height="25" width="23">
                                <use xlink:href="#edit" />
                            </svg>
                        </a>
                    </div>
                    <span class="d-flex align-items-center justify-content-center">

                        <h1 class="fw-bold">{{ strtoupper(session('headAdminMain')->fname) . ' ' . strtoupper(session('headAdminMain')->lname) ?? 'N/A' }}</h1>
                    </span> <!--Tutor full name-->
                    <h3>{{ session('headAdminMain')->userType->type  ?? 'N/A' }}</h3><!---Employment type-->
                </div>
            </section>
            <!---->
            <!--body-->
            <div class="tab-content" id="profile-tabs-content">
                <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"> <!--profile-->
                    <div class="row">
                        <div class="col-12">
                            <section class="mb-5">
                                <h3 class="text-center text-xl-start pb-2">Admin Information</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Full Name
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ ucwords(strtolower(session('headAdminMain')->fname)) . ' ' . ucwords(strtolower(session('headAdminMain')->lname)) ?? 'N/A' }}</span> <!--session type-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Email
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ session('headAdminMain')->email  ?? 'N/A' }}</span> <!--department-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col col-lg-5">
                                                Contact Number
                                            </span>
                                            <div class="col col-lg-7">
                                                <span class="fs-5 data-value">{{ session('headAdminMain')->contact_num  ?? 'N/A' }}</span> <!--Subject-->
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </main>

</body>
<script>
    $(document).ready(function() {

    });
    setTimeout(function() {
        $('.alert').remove();
    }, 3000);
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
</style>