@extends('layouts.headadminmaster')
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
        <symbol id="tutors" viewBox="0 -960 960 960">
            <title>tutors</title>
            <path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z" />
        </symbol>
        <symbol id="admins" viewBox="0 -960 960 960">
            <title>admins</title>
            <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z" />
        </symbol>
        <symbol id="parents" viewBox="0 -960 960 960">
            <title>parents</title>
            <path d="M680-360q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM480-160v-56q0-24 12.5-44.5T528-290q36-15 74.5-22.5T680-320q39 0 77.5 7.5T832-290q23 9 35.5 29.5T880-216v56H480Zm-80-320q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-160ZM80-160v-112q0-34 17-62.5t47-43.5q60-30 124.5-46T400-440q35 0 70 6t70 14l-34 34-34 34q-18-5-36-6.5t-36-1.5q-58 0-113.5 14T180-306q-10 5-15 14t-5 20v32h240v80H80Zm320-80Zm0-320q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Z" />
        </symbol>
        <symbol id="verified" viewBox="0 -960 960 960">
            <title>verified</title>
            <path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z" />
        </symbol>
        <symbol id="announce" viewBox="0 -960 960 960">
            <title>announcement</title>
            <path d="M720-440v-80h160v80H720Zm48 280-128-96 48-64 128 96-48 64Zm-80-480-48-64 128-96 48 64-128 96ZM200-200v-160h-40q-33 0-56.5-23.5T80-440v-80q0-33 23.5-56.5T160-600h160l200-120v480L320-360h-40v160h-80Zm240-182v-196l-98 58H160v80h182l98 58Zm120 36v-268q27 24 43.5 58.5T620-480q0 41-16.5 75.5T560-346ZM300-480Z" />
        </symbol>
        <symbol id="advert" viewBox="0 -960 960 960">
            <title>advert</title>
            <path d="M160-120q-33 0-56.5-23.5T80-200v-640l67 67 66-67 67 67 67-67 66 67 67-67 67 67 66-67 67 67 67-67 66 67 67-67v640q0 33-23.5 56.5T800-120H160Zm0-80h280v-240H160v240Zm360 0h280v-80H520v80Zm0-160h280v-80H520v80ZM160-520h640v-120H160v120Z" />
        </symbol>
        <symbol id="delete" viewBox="0 -960 960 960">
            <title>delete</title>
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
        </symbol>
        <symbol id="menu" viewBox="0 -960 960 960">
            <title>menu</title>
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </symbol>
        <symbol id="date" viewBox="0 -960 960 960">
            <title>date</title>
            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
        </symbol>
        <symbol id="edit" viewBox="0 -960 960 960">
            <title>edit</title>
            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
        </symbol>
        <symbol id="complete" viewBox="0 -960 960 960">
            <title>completed session</title>
            <path d="M438-226 296-368l58-58 84 84 168-168 58 58-226 226ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Z" />
        </symbol>
        <symbol id="ongoing" viewBox="0 -960 960 960">
            <title>ongoing session</title>
            <path d="M200-640h560v-80H200v80Zm0 0v-80 80Zm0 560q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v227q-19-9-39-15t-41-9v-43H200v400h252q7 22 16.5 42T491-80H200Zm520 40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40Zm67-105 28-28-75-75v-112h-40v128l87 87Z" />
        </symbol>
        <symbol id="cancelled" viewBox="0 -960 960 960">
            <title>cancelled session</title>
            <path d="m388-212-56-56 92-92-92-92 56-56 92 92 92-92 56 56-92 92 92 92-56 56-92-92-92 92ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Z" />
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Head Admin Dashboard</h4>
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
                                        <p class="mb-0 text-white fs-6">{{ session('user_profiles')->userType->type}}</p>
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
            <!---->
            <!--announcements modal-->
            <div class="modal fade" id="announcementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Announcements</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="announcement-alert"></div>
                            <section class="mb-3">
                                <form data-action="{{route('headAdmin.create.announcement')}}" method="POST" id="CreateAnnouncementForm">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="fw-semibold mb-3">Create New Announcement</h6>
                                        <label for="">Select user type</label>
                                        <select class="form-select" name="userType" required>
                                            <option value="" selected disabled>Select user type</option>
                                            <option value="4" {{old('userType') == 4 ? 'selected' : ''  }}>All</option>
                                            @foreach($userType as $data)
                                            <option value="{{$data->id}}" {{old('userType') == $data->id ? 'selected' : ''  }}>{{$data->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Content</label>
                                        <textarea class="form-control" rows="5" name="content" id="" value="{{old('content')}}" required></textarea>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-center">
                                        <button type="submit" class="btn save-btn ">Post announcement</button>
                                    </div>
                                </form>
                            </section>
                            <hr class="border-2 border-black opacity-75 mb-3">
                            <h6 class="fw-semibold mb-3">Announcements</h6>
                            <div class="row row-cols-auto d-flex align-items-center justify-content-center justify-content-lg-start">
                                <div class="col">
                                    <div class="dropdown-center mb-3">
                                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="typeDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                            User Type
                                        </button>
                                        <div class="dropdown-menu filter-menu w-100">
                                            <div class="vstack" id="typeRadio">
                                                @foreach($userType as $data)
                                                <div class="form-check ms-3 ">
                                                    <input class="form-check-input filter-check radio" type="radio" name="typeFilter" id="type{{$data->id}}" value="{{$data->id}}">
                                                    <label class="form-check-label filter-item" for="type{{$data->id}}">
                                                        {{ $data->type }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg d-flex justify-content-center justify-content-lg-start">
                                    <button id="clear-filter" type="button" class="btn btn-outline save-btn mb-3">Clear Filters</button>
                                </div>
                            </div>
                            <section class="mb-3" style="max-height:450px; overflow-y:auto; scrollbar-width:thin;">
                                <table class="table table-responsive table-borderless">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Title</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">User Type</th>
                                            <th scope="col">Creation Date</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="announcement-list">

                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-view" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!----->
            <!--announcement content modal-->
            <div class="modal" tabindex="-1" id="announcementContent" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Announcement</h5>
                        </div>
                        <div class="modal-body text-center">
                            <h4 class="fw-bold mb-3 text-capitalize" id="announceTitle"></h4>
                            <h6 class="mb-3">Content:</h6>
                            <p id="announceContent"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-view" data-bs-toggle="modal" data-bs-target="#announcementModal" id="dismissContent">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--delete announcement modal-->
            <div class="modal fade" id="announceDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="vstack gap-4 d-flex align-items-center">
                                <svg class="" height="50" fill="currentcolor">
                                    <use xlink:href="#info" />
                                </svg>
                                <span>
                                    <h3 class="mb-3">Are you sure you want to delete this announcement?</h3>
                                    <p class="fw-semibold text-danger">Warning: This will delete the announcement for all user types.</p>
                                </span>
                                <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                    <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#announcementModal">Dismiss</button>
                                    <form class="p-0 m-0" data-action="{{ route('headAdmin.delete.announcement') }}" method="POST" id="deleteAnnouncementForm">
                                        @csrf
                                        <input type="hidden" name="announcementID" value="" id="deleteAnnouncementID">
                                        <button type="submit" class="btn btn-lg btn-book">Delete</button><!--confirm booking-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--advertisments modal-->
            <div class="modal fade" id="advertisementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Advertisements</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="ads-alert"></div>
                            <section class="mb-3">
                                <form data-action="{{route('headAdmin.create.advertisement')}}" method="POST" id="createAdvertisementForm" enctype="multipart/form-data">
                                    @csrf
                                    <h6 class="fw-semibold mb-3">Create New Advertisement</h6>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="advertisementTitle" class="form-label">Advertisement Title</label>
                                            <input type="text" class="form-control" value="{{ old('title') }}" name="title" required>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="">Select Status</label>
                                            <select class="form-select" name="active_status" required>
                                                <option value="" selected disabled>Select Status</option>
                                                @foreach($adStatus as $data)
                                                <option value="{{$data->id}}" {{old('active_status') == $data->id ? 'selected' : ''  }}>{{$data->status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="">Select Priority Status</label>
                                            <select class="form-select" name="priority_status" required>
                                                <option value="" selected disabled>Select Priority Status</option>
                                                @foreach($adPriority as $data)
                                                <option value="{{$data->id}}" {{old('priority_status') == $data->id ? 'selected' : ''  }}>{{$data->status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="">Select Start Date</label>
                                            <div class="input-group flex-nowrap"> <!--session date-->
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <svg class="bi" width="20" height="20">
                                                        <use xlink:href="#date" />
                                                    </svg>
                                                </span>
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="startDateInput" value="{{ old('startDate') }}" name="startDate" class="form-control" placeholder="Select Start Date" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="">Select End Date</label>
                                            <div class="input-group flex-nowrap"> <!--session date-->
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <svg class="bi" width="20" height="20">
                                                        <use xlink:href="#date" />
                                                    </svg>
                                                </span>
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="endDateInput" value="{{ old('endDate') }}" name="endDate" class="form-control" placeholder="Select End Date" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="">Upload Image <span class="fw-light fst-italic fs-6"> Accepted image formats: .jpg, .jpeg, .png, </span></label>
                                            <input type="file" class="form-control" name="image_upload" accept="image/png, image/jpeg" id="imageInput" required>
                                        </div>
                                        <div class="col-12 vstack justify-content-center mb-3">
                                            <label for="">Image Preview</label>
                                            <img src="" class="" alt="" id="previewImage">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mb-3">
                                        <button type="submit" class="btn save-btn">Create Advertisement</button>
                                    </div>
                                </form>
                            </section>
                            <hr class="border-2 border-black opacity-75 mb-3">
                            <h6 class="fw-semibold mb-3">Advertisements</h6>
                            <section class="mb-3" style="max-height:450px; overflow-y:auto; scrollbar-width:thin;">
                                <table class="table table-responsive table-borderless">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Priority Status</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Date Status</th>
                                            <th scope="col">Creation Date</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="advert-list">

                                    </tbody>
                                </table>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-view" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--edit advertisments modal-->
            <div class="modal fade" id="editAdvertisementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Advertisement</h1>
                        </div>
                        <div class="modal-body">
                            <section class="mb-3">
                                <form data-action="{{route('headAdmin.update.advertisement')}}" method="POST" id="editAdvertisementForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="advertID" id="editAdvertID">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="advertisementTitle" class="form-label">Advertisement Title</label>
                                            <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="editTitle" required>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="">Select Status</label>
                                            <select class="form-select" name="active_status" id="editStatus" required>
                                                <option value="" selected disabled>Select Status</option>
                                                @foreach($adStatus as $data)
                                                <option value="{{$data->id}}" {{old('active_status') == $data->id ? 'selected' : ''  }}>{{$data->status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="">Select Priority Status</label>
                                            <select class="form-select" name="priority_status" id="editPriority" required>
                                                <option value="" selected disabled>Select Priority Status</option>
                                                @foreach($adPriority as $data)
                                                <option value="{{$data->id}}" {{old('priority_status') == $data->id ? 'selected' : ''  }}>{{$data->status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="">Select Start Date</label>
                                            <div class="input-group flex-nowrap"> <!--session date-->
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <svg class="bi" width="20" height="20">
                                                        <use xlink:href="#date" />
                                                    </svg>
                                                </span>
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ old('title') }}" id="editStartDateInput" name="startDate" class="form-control" placeholder="Select Start Date" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="">Select End Date</label>
                                            <div class="input-group flex-nowrap"> <!--session date-->
                                                <span class="input-group-text" id="addon-wrapping">
                                                    <svg class="bi" width="20" height="20">
                                                        <use xlink:href="#date" />
                                                    </svg>
                                                </span>
                                                <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="editEndDateInput" name="endDate" class="form-control" placeholder="Select End Date" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="">Upload Image <span class="fw-light fst-italic fs-6"> Accepted image formats: .jpg, .jpeg, .png, </span></label>
                                            <input type="file" class="form-control" name="image_upload" accept="image/png, image/jpeg" id="editImageInput">
                                        </div>
                                        <div class="col-12 vstack justify-content-center mb-3">
                                            <label for="">Image Preview</label>
                                            <img src="" class="" alt="" id="editPreviewImage">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mb-3">
                                        <button type="submit" class="btn save-btn">Save Changes</button>
                                    </div>
                                </form>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-view close-edit-advert" data-bs-toggle="modal" data-bs-target="#advertisementModal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--delete advertisement modal-->
            <div class="modal fade" id="adsDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="vstack gap-4 d-flex align-items-center">
                                <svg class="" height="50" fill="currentcolor">
                                    <use xlink:href="#info" />
                                </svg>
                                <span>
                                    <h3 class="mb-3">Are you sure you want to delete this advertisement?</h3>
                                    <p class="fw-semibold text-danger"><span class="fw-bold">Warning:</span> This will remove active home page advertisements.</p>
                                </span>
                                <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                    <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#advertisementModal">Dismiss</button>
                                    <form class="p-0 m-0" data-action="{{ route('headAdmin.delete.advertisement') }}" method="POST" id="deleteAdvertForm">
                                        @csrf
                                        <input type="hidden" name="advertID" value="" id="deleteAdvertID">
                                        <button type="submit" class="btn btn-lg btn-book">Delete</button><!--confirm booking-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <div class="d-flex align-items-center justify-content-end gap-1 mb-2">
                <button class="btn btn-view d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#announcementModal">
                    <svg class="" height="20" width="20" fill="currentcolor">
                        <use xlink:href="#announce" />
                    </svg>
                    Announcements
                </button>
                <button class="btn btn-view d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#advertisementModal">
                    <svg class="" height="20" width="20" fill="currentcolor">
                        <use xlink:href="#advert" />
                    </svg>
                    Advertisements
                </button>
            </div>
            <h6 class="fst-italic px-2">Updated as of: <span class="fw-semibold" id="updatedAt"></span></h6>
            <section class="px-2" style="max-height:600px; overflow-x:hidden; overflow-y:auto; scrollbar-width:thin;">
                <div class="row row-cols-auto">
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="" height="45" width="43">
                                        <use xlink:href="#parents" />
                                    </svg>
                                    <h4 class="fw-semibold">Total Parent Accounts:</h4>
                                    <h1 class="fw-bold stats-count" id="parentCount"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="" height="45" width="43">
                                        <use xlink:href="#tutors" />
                                    </svg>
                                    <h4 class="fw-semibold">Total Tutor Accounts:</h4>
                                    <h1 class="fw-bold stats-count" id="tutorCount"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="" height="45" width="43">
                                        <use xlink:href="#verified" />
                                    </svg>
                                    <h4 class="fw-semibold">Total Verified Tutors:</h4>
                                    <h1 class="fw-bold stats-count" id="verifiedCount"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="" height="45" width="43">
                                        <use xlink:href="#ongoing" />
                                    </svg>
                                    <h4 class="fw-semibold">Total Active Sessions:</h4>
                                    <h1 class="fw-bold stats-count" id="activeCount"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="" height="45" width="43">
                                        <use xlink:href="#complete" />
                                    </svg>
                                    <h4 class="fw-semibold">Total Completed Sessions:</h4>
                                    <h1 class="fw-bold stats-count" id="completeCount"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card p-4 shadow flex-fill">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <svg class="" height="45" width="43">
                                        <use xlink:href="#cancelled" />
                                    </svg>
                                    <h4 class="fw-semibold">Total Cancelled Sessions:</h4>
                                    <h1 class="fw-bold stats-count" id="cancelledCount"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            loadStats();
            loadAnnouncements();
            dropDowns();
            advertisementDates();
            loadAdvertisements();
        })

        setTimeout(function() {
            $('.login-alert').remove();
        }, 3000);

        function advertisementDates() {
            // Get today's date and format it using Moment.js
            var dateToday = moment().format('YYYY-MM-DD'); // Get today in YYYY-MM-DD format

            // Set the minimum date for startDateInput to today's date
            $('#startDateInput').attr('min', dateToday);
            $('#endDateInput').attr('min', dateToday);

            // When the start date changes
            $('#startDateInput').on('change', function() {
                var startDate = moment($(this).val()); // Get selected start date using Moment.js

                // Add 1 day to the start date for the end date's minimum
                var minEndDate = startDate.add(1, 'days').format('YYYY-MM-DD');

                // Set the min attribute of endDateInput
                $('#endDateInput').attr('min', minEndDate);
            });
            $('#editStartDateInput').on('change', function() {
                var startDate = moment($(this).val()); // Get selected start date using Moment.js

                // Add 1 day to the start date for the end date's minimum
                var minEndDate = startDate.add(1, 'days').format('YYYY-MM-DD');

                // Set the min attribute of endDateInput
                $('#editEndDateInput').attr('min', minEndDate);
            });
        }

        function dropDowns() {
            //dropdowns
            const dropdownButtons = document.querySelectorAll('.filter-btn');
            const radioInputs = document.querySelectorAll('.radio');

            // Add an event listener to each radio input
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

        function loadStats() {
            $.ajax({
                type: "GET",
                url: "{{route('headAdmin.count.stats')}}",
                success: function(data) {
                    //console.log(data);
                    buildStats(data);
                }
            })
        }

        function buildStats(data) {
            let parentCount = $('#parentCount');
            let adminCount = $('#adminCount');
            let tutorCount = $('#tutorCount');
            let verifiedCount = $('#verifiedCount');
            let updatedAt = $('#updatedAt');

            let activeCount = $('#activeCount');
            let completeCount = $('#completeCount');
            let cancelledCount = $('#cancelledCount');

            let parent = data.clientCount;
            let admin = data.adminCount;
            let tutor = data.tutorCount;
            let verified = data.verifiedTutorCount;

            let active = data.activeSessionCount;
            let complete = data.completeSessionCount;
            let cancelled = data.cancelledSessionCount;

            let updated = moment(new Date()).format('MMMM D, YYYY [at] h:mm A');

            parentCount.html('');
            adminCount.html('');
            tutorCount.html('');
            verifiedCount.html('');
            updatedAt.html('');

            activeCount.html('');
            completeCount.html('');
            cancelledCount.html('');

            parentCount.html(parent);
            adminCount.html(admin);
            tutorCount.html(tutor);
            verifiedCount.html(verified);
            updatedAt.html(updated);

            activeCount.html(active);
            completeCount.html(complete);
            cancelledCount.html(cancelled);


        }
        //announcements
        function loadAnnouncements() {
            $.ajax({
                type: "GET",
                url: "{{route('headAdmin.load.announcements')}}",
                success: function(data) {
                    //console.log(data);
                    buildAnnouncements(data);
                }
            })
        }

        function buildAnnouncements(data) {
            let announcementList = $('#announcement-list');
            announcementList.empty();

            const userTypeClass = {
                '1': 'text-primary',
                '2': 'text-danger',
                '3': 'text-success',
            }

            $.each(data, function(index, item) {
                //console.log('announcement', item);
                let id = item.id;
                let title = item.title;
                let content = item.content;
                let userType = item.user_type.type;
                let userTypeID = item.user_type.id;
                let creationDate = moment(item.created_at).format('MM/D/YYYY');

                let tableRow = `
                    <tr class="text-center" data-user-type-id="${userTypeID}" >
                        <td>${title}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-view view-content" data-content="${content}" data-title="${title}" data-bs-toggle="modal" data-bs-target="#announcementContent">
                                <svg class="" height="20" width="20" fill="currentcolor">
                                    <use xlink:href="#menu" />
                                </svg>
                            </button>
                        </td>
                        <td class="${userTypeClass[userTypeID]}">${userType}</td>
                        <td>${creationDate}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-view delete-announcement" data-delete-id="${id}" data-bs-toggle="modal" data-bs-target="#announceDelete">
                                <svg class="" height="20" width="20" fill="currentcolor">
                                    <use xlink:href="#delete" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    `;
                announcementList.append(tableRow);
            })
        }

        $('#announcement-list').on('click', '.view-content', function() {
            let content = $(this).data('content');
            let title = $(this).data('title');

            let ContentTEXT = $('#announceContent');
            let titleTEXT = $('#announceTitle');

            ContentTEXT.html('');
            titleTEXT.html('');

            ContentTEXT.html(content);
            titleTEXT.html(title);
        })
        $('#announcement-list').on('click', '.delete-announcement', function() {
            let id = $(this).data('delete-id');
            let deleteInput = $('#deleteAnnouncementID');
            deleteInput.val(id);
        })

        $('#dismissContent').on('click', function() {
            let ContentTEXT = $('#announceContent');
            let titleTEXT = $('#announceTitle');

            ContentTEXT.html('');
            titleTEXT.html('');
        })

        $('#CreateAnnouncementForm').on('submit', function(e) {
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
                    $('#CreateAnnouncementForm').find('button[type="submit"]').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.success) {
                        $('#CreateAnnouncementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#CreateAnnouncementForm')[0].reset();
                        loadAnnouncements();

                        let Alert =
                            `
                        <div class="alert alert-success alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#announcement-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                        $('#deleteTopics').modal('hide');


                    } else if (response.error) {
                        $('#CreateAnnouncementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#CreateAnnouncementForm')[0].reset();
                        loadAnnouncements();

                        let Alert =
                            `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#announcement-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                    }
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            Error deleting topic
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#announcement-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            });
        })

        $('#deleteAnnouncementForm').on('submit', function(e) {
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
                    $('#deleteAnnouncementForm').find('button[type="submit"]').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.success) {
                        $('#deleteAnnouncementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#deleteAnnouncementForm')[0].reset();
                        $('#announceDelete').modal('hide');
                        $('#announcementModal').modal('show');
                        loadAnnouncements();

                        let Alert =
                            `
                        <div class="alert alert-success alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#announcement-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                        $('#deleteTopics').modal('hide');


                    } else if (response.error) {
                        $('#deleteAnnouncementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#deleteAnnouncementForm')[0].reset();
                        $('#announceDelete').modal('hide');
                        $('#announcementModal').modal('show');
                        loadAnnouncements();

                        let Alert =
                            `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#announcement-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                    }
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            Error deleting topic
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#announcement-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            });
        })

        $('input[name="typeFilter"]').on('change', function() {
            let typeId = $('input[name="typeFilter"]:checked').val();

            $('#announcement-list tr').hide();

            if (typeId) {
                $('#announcement-list tr[data-user-type-id="' + typeId + '"]').show();
            } else {
                $('#announcement-list tr').show();
            }
        })

        $('#clear-filter').on('click', function() {
            var filterType = $('#typeDrop');

            filterType.text('User Type');
            filterType.dropdown('hide');

            $('input[name="typeFilter"]').prop('checked', false);
            $('#announcement-list tr').show(); // modified to show all table rows
        });
        //
        //advertisements
        $('#imageInput').on('change', function() {
            let file = this.files[0];
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        })
        $('#editImageInput').on('change', function() {
            let file = this.files[0];
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#editPreviewImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        })

        function loadAdvertisements() {
            $.ajax({
                type: 'GET',
                url: "{{route('headAdmin.load.advertisements')}}",
                success: function(data) {
                    //console.log(data);
                    buildAdvertisements(data);
                }

            })
        }

        function buildAdvertisements(data) {
            let adsTable = $('#advert-list');
            adsTable.empty();

            const statusClass = {
                '1': 'text-success',
                '2': 'text-danger'
            }
            const dateStatusText = {
                '1': 'Upcoming',
                '2': 'Ongoing',
                '3': 'Completed'
            }
            const dateStatusClass = {
                '1': 'text-warning',
                '2': 'text-primary',
                '3': 'text-success'
            }

            $.each(data, function(index, item) {
                let id = item.id;
                let title = item.title;
                let image = item.image;
                let status = item.advert_status.status;
                let statusID = item.advertisement_status_id;
                let priority = item.priority_status.status;
                let priorityID = item.advertisement_priority_status_id;
                let startDate = moment(item.start_date).format('MM/D/YYYY');
                let endDate = moment(item.end_date).format('MM/D/YYYY');
                let createdAt = moment(item.created_at).format('MM/D/YYYY');
                //console.log('ads', item);

                let today = moment(new Date()).format('MM/D/YYYY');

                let dateStatus = null;

                if (today < startDate) {
                    dateStatus = 1; //upcoming
                } else if (today >= startDate && today <= endDate) {
                    dateStatus = 2; //ongoing
                } else if (today > endDate) {
                    dateStatus = 3; //completed
                };

                //console.log('today', today, 'end date', endDate, 'date status', dateStatus, 'ads', item);


                let tableRow = `
                    <tr class="text-center" data-id="${id}">
                        <td>${title}</td>
                        <td>
                            <img src="${image}" height="35" width="50" alt="">
                        </td>
                        <td class="${statusClass[statusID]}">${status}</td>
                        <td class="${statusClass[priorityID]}">${priority}</td>
                        <td>${startDate}</td>
                        <td>${endDate}</td>
                        <td class="${dateStatusClass[dateStatus]}">${dateStatusText[dateStatus]}</td>
                        <td>${createdAt}</td>
                        <td class="d-flex justify-content-center align-items-center gap-1">
                            <button type="button" class="btn btn-view edit-ads" data-id="${id}" data-bs-toggle="modal" data-bs-target="#editAdvertisementModal" ${dateStatus == 3 ? 'disabled':''}>
                                <svg class="" height="20" width="20" fill="currentcolor">
                                    <use xlink:href="#edit" />
                                </svg>
                            </button>
                            <button type="button" class="btn btn-view delete-ads" data-id="${id}" data-bs-toggle="modal" data-bs-target="#adsDelete">
                                <svg class="" height="20" width="20" fill="currentcolor">
                                    <use xlink:href="#delete" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    `;
                adsTable.append(tableRow);
            })
        }

        $('#createAdvertisementForm').on('submit', function(e) {
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
                    $('#createAdvertisementForm').find('button[type="submit"]').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.success) {
                        $('#createAdvertisementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#createAdvertisementForm')[0].reset();
                        loadAdvertisements();
                        $('#previewImage').attr('src', '');

                        let Alert =
                            `
                        <div class="alert alert-success alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#ads-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                        $('#deleteTopics').modal('hide');


                    } else if (response.error) {
                        $('#createAdvertisementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#createAdvertisementForm')[0].reset();
                        loadAdvertisements();
                        $('#previewImage').attr('src', '');

                        let Alert =
                            `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#ads-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                    }
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            Error deleting topic
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#ads-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            });
        })
        $('#advert-list').on('click', '.edit-ads', function() {
            var advertId = $(this).data('id');

            $.ajax({
                type: 'GET',
                url: "{{route('headAdmin.load.edit.advertisements')}}",
                data: {
                    advertID: advertId
                },
                success: function(data) {
                    //console.log(data);
                    buildEditAdvertisements(data);
                }

            })

        })

        function buildEditAdvertisements(data) {
            let id = data.id;
            let title = data.title;
            let status = data.advertisement_status_id;
            let priority = data.advertisement_priority_status_id;
            let startDate = data.start_date;
            let endDate = data.end_date;
            let creationDate = moment(data.created_at).format('YYYY-MM-DD');
            let image = data.image;

            creationDateObj = new Date(creationDate);
            creationDateObj.setDate(creationDateObj.getDate() + 1);
            let formattedCreationDate = creationDateObj.toISOString().split('T')[0];

            //console.log('creation date', creationDate, '1 day after creation date:', formattedCreationDate);
            let idInput = $('#editAdvertID');
            let titleInput = $('#editTitle');
            let statusInput = $('#editStatus');
            let priorityInput = $('#editPriority');
            let startDateInput = $('#editStartDateInput');
            let endDateInput = $('#editEndDateInput');
            let imagePreview = $('#editPreviewImage');

            idInput.val(id);
            titleInput.val(title);
            statusInput.val(status);
            priorityInput.val(priority);
            startDateInput.val(startDate);
            startDateInput.attr('min', creationDate);
            endDateInput.val(endDate);
            endDateInput.attr('min', formattedCreationDate);
            imagePreview.attr('src', image);

        }

        $('#editAdvertisementForm').on('submit', function(e) {
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
                    $('#editAdvertisementForm').find('button[type="submit"]').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.success) {
                        $('#editAdvertisementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#editAdvertisementForm')[0].reset();
                        $('#editAdvertisementModal').modal('hide');
                        $('#advertisementModal').modal('show');
                        loadAdvertisements();

                        let Alert =
                            `
                        <div class="alert alert-success alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#ads-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                        $('#deleteTopics').modal('hide');


                    } else if (response.error) {
                        $('#editAdvertisementForm').find('button[type="submit"]').prop('disabled', false);
                        $('#editAdvertisementForm')[0].reset();
                        $('#editAdvertisementModal').modal('hide');
                        $('#advertisementModal').modal('show');
                        loadAdvertisements();

                        let Alert =
                            `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#ads-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                    }
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            Error deleting topic
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#ads-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            });
        })

        $('.close-edit-advert').on('click', function() {
            let idInput = $('#editAdvertID');
            let titleInput = $('#editTitle');
            let statusInput = $('#editStatus');
            let priorityInput = $('#editPriority');
            let startDateInput = $('#editStartDateInput');
            let endDateInput = $('#editEndDateInput');
            let imagePreview = $('#editPreviewImage');

            idInput.val('');
            titleInput.val('');
            statusInput.val('');
            priorityInput.val('');
            startDateInput.val('');
            startDateInput.attr('min', '');
            endDateInput.val('');
            endDateInput.attr('min', '');
            imagePreview.attr('src', '');
        })

        $('#advert-list').on('click', '.delete-ads', function() {
            var id = $(this).data('id');
            $('#deleteAdvertID').val(id);
        })
        $('#deleteAdvertForm').on('submit', function(e) {
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
                    $('#deleteAdvertForm').find('button[type="submit"]').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.success) {
                        $('#deleteAdvertForm').find('button[type="submit"]').prop('disabled', false);
                        $('#deleteAdvertForm')[0].reset();
                        $('#adsDelete').modal('hide');
                        $('#advertisementModal').modal('show');
                        loadAdvertisements();

                        let Alert =
                            `
                        <div class="alert alert-success alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#ads-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                        $('#deleteTopics').modal('hide');


                    } else if (response.error) {
                        $('#deleteAdvertForm').find('button[type="submit"]').prop('disabled', false);
                        $('#deleteAdvertForm')[0].reset();
                        $('#adsDelete').modal('hide');
                        $('#advertisementModal').modal('show');
                        loadAdvertisements();

                        let Alert =
                            `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                        let alertElement = $(Alert).appendTo('#ads-alert');

                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);

                    }
                },
                error: function(xhr, status, error) {
                    //console.log(xhr.responseText);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center " role="alert">
                            Error deleting topic
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#ads-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            });
        })
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
        color: white !important;
    }

    .btn-book:hover {
        background-color: #99CC99 !important;
        border-color: #99CC99 !important;
        color: black !important;
        transition: all 0.3s ease-in-out;
    }

    .btn-view {
        background-color: transparent;
        border-color: #759C75 !important;
        color: black;
    }

    .btn-view:hover {
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
        width: 200px !important
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

    .stats-count {
        color: #759C75 !important;
    }
</style>