@extends(
(session('clientMain') ? 'layouts.clientmaster' :
(session('tutorMain') ? 'layouts.tutormaster' :
(session('adminMain') ? 'layouts.adminmaster' :
(session('headAdminMain') ? 'layouts.headadminmaster' : ''))))
)

@section('content')

@php
$page='Settings';
@endphp
<html>

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
        
        <symbol id="visible" viewBox="0 -960 960 960">
            <title>visible</title>
            <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
        </symbol>
        
        <symbol id="invisible" viewBox="0 -960 960 960">
            <title>invisible</title>
            <path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/>
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Settings</h4>
            </div>
            <section class="mb-4">
                <div class="vstack gap-2 d-flex align-items-center w-100">
                    <div class="profile-pic">
                        <img src="{{$profile->profile_pic}}" alt="" width="140" height="140" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';">
                    </div>
                    <h2 class="fw-semibold text-capitalize text-center">{{ ucwords(strtolower($profile->fname)).' '. ucwords(strtolower($profile->lname)) }}</h2>
                </div>
            </section>
            <div class="d-flex w-100 justify-content-end" id="alert-div">
                <div>
                    @if (session('error'))
                    <div class="alert fade show alert-danger session-alert ">
                        {{ session('error') }}
                    </div>
                    @endif
                    
                    @if (session('success'))
                    <div class="alert fade show alert-success session-alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    @if (session('info'))
                    <div class="alert fade show alert-success session-alert">
                        {{ session('info') }}
                    </div>
                    @endif
                   
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert fade show alert-danger session-alert">{{$error}}</div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col-12 col-lg-2">
                    <!--nav tabs-->
                    <ul class="nav nav-pills gap-2 nav-justified flex-lg-column w-100 p-2" id="settings-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active close-change-pass" data-bs-toggle="tab" data-bs-target="#account-tab-pane" type="button" role="tab" aria-controls="account-tab">Account</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#change-password-tab-pane" type="button" role="tab" aria-controls="change-password-tab" id="change-pass-tab-button">Password</button>
                        </li>
                        @if($profile->user_type_id == 2)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link close-change-pass" data-bs-toggle="tab" data-bs-target="#verification-tab-pane" type="button" role="tab" aria-controls="verification-tab" id="change-reqs-tab-button">Verification</button>
                        </li>
                        @endif
                    </ul>
                    <!---->
                </div>
                <div class="col-12 col-lg-10">
                    <div class="tab-content px-2 py-1" id="settings-tab-content">
                        <div class="tab-pane fade show active" id="account-tab-pane" role="tabpanel" aria-labelledby="account-tab" tabindex="0"> <!--ACCOUNT TAB-->
                            <form action="{{route('update.account')}}" method="POST" id="updateAccountForm">
                                @csrf
                                <section class="p-2" style="overflow-x:hidden; overflow-y:auto; max-height:410px; scrollbar-width:thin;">
                                    <div class="row">
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" value="{{ old('fname',$profile->fname) }}" id="fname" name="fname" placeholder="ex. Juan" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" value="{{ old('lname',$profile->lname) }}" id="lname" name="lname" placeholder="ex. Dela Cruz" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Birthday</label>
                                            <input type="date" class="form-control" value="{{ old('bday',$profile->bday) }}" id="bday" name="bday" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Gender</label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                @foreach($gender as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ (old('gender', $profile->gender_id) == $data->id) ? 'selected' : '' }}>
                                                    {{ $data->gender }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Mobile Number</label>
                                            <input type="text" class="form-control" value="{{$profile->contact_num}}" id="cpnum" name="cpnum" maxlength="11" placeholder="ex. 09123456789" required>
                                        </div>
                                        @if($profile->user_type_id == 1)
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Relation to Student</label>
                                            <select class="form-select" id="relation" name="relation" required>
                                                <option value="" disabled selected>Relation to student</option>
                                                @foreach($relation as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ (old('relation', $relationId) == $data->id) ? 'selected' : '' }}>
                                                    {{ $data->relation }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Country</label>
                                            <input type="text" class="form-control" value="{{ old('country',$profile->country) }}" id="country" name="country" placeholder="ex. Philippines" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Municipality</label>
                                            <input type="text" class="form-control" value="{{ old('city',$profile->municipality) }}" id="city" name="city" placeholder="ex. Manila City" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" value="{{ old('address',$profile->address) }}" id="address" name="address" placeholder="Blk,Lot,Street" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" value="{{ old('email',$profile->email) }}" id="email" name="email" placeholder="ex. juanDelaCruz@gmail.com" required>
                                        </div>
                                    </div>
                                </section>
                                <div class="w-100 d-flex justify-content-center p-3">
                                    <button class="btn saveBtn" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="change-password-tab-pane" role="tabpanel" aria-labelledby="change-password-tab" tabindex="0"> <!--CHANGE PASSWORD TAB-->
                            <div class="mb-3 p-2">
                                <p class="text-danger fw-bold">Reminders:</p>
                                <p class="text-danger">* New password <span class="fw-bold">must be different</span> from current password.</p>
                                <p class="text-danger">* Password must contain at least 1 special character (!_*), 1 uppercase, 1 lowercase, 1 digit</p>
                                @if($profile->user_type_id == 3)
                                <p class="text-danger">* Default admin password: <span class="fw-bold">"scribblesadmin"</span>. Please change your password.</p>
                                @endif
                            </div>
                            <form action="{{route('update.password')}}" method="POST" id="updatePasswordForm">
                                @csrf
                                <section class="p-2" style="overflow-x:hidden; overflow-y:auto; max-height:410px; scrollbar-width:thin;">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="">Current Password</label>
                                            <input type="password" class="form-control" id="currentpass" name="currentpass" placeholder="Current Password" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">New Password</label>
                                            <div class="input-group flex-nowrap">
                                                <input type="password" class="form-control border-end-0" name="newpass" placeholder="New Password" onfocus="passwordFocus()" onblur="passwordBlur()" id="password-input" required>
                                                <span class="input-group-text border-start-0 bg-transparent" role="button" id="password-toggle">
                                                    <svg class="bi visible" width="20" height="20" fill="currentcolor" id="visibility-icon">
                                                        <use xlink:href="#invisible" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <label class="fst-italic text-secondary d-none" id="password-placeholder">Minimum 8 Chars, 1, Uppercase, 1, Lowercase, 1 digit, 1 Special Char (ex. !_*)</label>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="">Confirm New Password</label>
                                            <input type="password" class="form-control" id="confirmnew" name="confirmnew" placeholder="Confirm New Password" required>
                                        </div>
                                    </div>
                                </section>
                                <div class="w-100 d-flex justify-content-center p-3">
                                    <button class="btn saveBtn" type="submit">Update Password</button>
                                </div>
                            </form>
                        </div>
                        @if($profile->user_type_id == 2)
                        <div class="tab-pane fade" id="verification-tab-pane" role="tabpanel" aria-labelledby="verification-tab" tabindex="0"> <!--VERIFICATION TAB FOR TUTORS-->
                            @php
                            $class=[
                            1 => 'text-success',
                            2 => 'text-secondary',
                            3 => 'text-danger'
                            ];
                            $alertclass=[
                            1 => 'alert-success',
                            2 => 'alert-secondary',
                            3 => 'alert-danger'
                            ];
                            @endphp
                            <h6 class="fw-semibold px-2">
                                Verification Status:
                                <span class="fw-normal {{$class[$verificationId]}}">
                                    {{$verificationStatus}}
                                </span>
                            </h6>
                            <div class="alert px-2 {{$alertclass[$verificationId]}}">
                                <p class="mb-0">{{$verificationMessage}}</p>
                            </div>
                            <p class="fw-semibold fst-italic mb-3 px-2">Accepted document formats: <span class="fw-normal text-danger"> .pdf</span></p>
                            <form action="{{route('update.requirements')}}" method="POST" enctype="multipart/form-data" id="updateRequirementsForm">
                                @csrf
                                <fieldset {{ $verificationId == 1 ? 'disabled' : '' }}>
                                    <section class="p-2" style="overflow-x:hidden; overflow-y:auto; max-height:330px; scrollbar-width:thin;">
                                        <div class="row">
                                            <h6>Academic Background</h6>
                                            <hr class="col-12 mb-3">
                                            </hr>
                                            @if($educationId == 1)
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="">School Graduated</label>
                                                <input type="text" class="form-control" value="{{$requirements->school}}" readonly disabled>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="">Year Graduated</label>
                                                <input type="text" class="form-control" value="{{$requirements->year_of_graduate}}" readonly disabled>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="">Degree</label>
                                                <input type="text" class="form-control" value="{{$requirements->degree}}" readonly disabled>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <label for="">Upload TOR</label>
                                                    <a href="{{$requirements->tor_upload}}" class="file-preview-link" target="_blank">Submitted TOR</a>
                                                </div>
                                                <input type="file" name="uploadTOR" accept="application/pdf" class="form-control">
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <label for="">Upload Diploma</label>
                                                    <a href="{{$requirements->diploma_upload}}" class="file-preview-link" target="_blank">Submitted Diploma</a>
                                                </div>
                                                <input type="file" name="uploadDiploma" accept="application/pdf" class="form-control">
                                            </div>
                                            @endif
                                            @if($educationId == 2)
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="">School </label>
                                                <input type="text" class="form-control" value="{{$requirements->school}}" readonly disabled>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <label for="">Upload Certificate of Enrollment</label>
                                                    <a href="{{$requirements->certificate_of_enrollment}}" class="file-preview-link" target="_blank">Submitted Certificate of Enrollment</a>
                                                </div>
                                                <input type="file" name="uploadCOE" accept="application/pdf" class="form-control">
                                            </div>
                                            @endif
                                            <div class="col-12 col-lg-6 mb-3">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <label for="">Upload Resume</label>
                                                    <a href="{{$requirements->resume_upload}}" class="file-preview-link" target="_blank">Submitted Resume</a>
                                                </div>
                                                <input type="file" name="uploadResume" accept="application/pdf" class="form-control">
                                            </div>
                                            <hr class="col-12 mb-3">
                                            </hr>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="">Select a valid ID</label>
                                                <select class="form-select" id="selectValid" name="validIdType" required>
                                                    <option value="" disabled selected>Select Valid ID</option>
                                                    @foreach($validIds as $data)
                                                    <option value="{{ $data->id }}" {{$requirements->valid_id_type == $data->id ? 'selected' : ''}}>{{ $data->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="">Valid ID Number</label>
                                                <input type="text" class="form-control" maxlength="20" placeholder="Valid ID Number" value="{{$requirements->valid_id_number}}" name="validIdNum" required>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <label for="">Upload Valid ID</label>
                                                    <a href="{{$requirements->upload_valid_id}}" class="file-preview-link" target="_blank">Submitted Valid ID</a>
                                                </div>
                                                <input type="file" name="uploadValidId" accept="application/pdf" class="form-control">
                                            </div>
                                            @if($educationId == 1)
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="">PRC ID Number (optional)</label>
                                                <input type="text" class="form-control" maxlength="7" placeholder="PRC ID Number" value="{{$requirements->prc_number}}" name="prcNum">
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <label for="">Upload PRC ID (optional)</label>
                                                    @if($requirements->upload_prc !== null)
                                                    <a href="{{$requirements->upload_prc}}" class="file-preview-link" target="_blank">Submitted PRC</a>
                                                    @endif
                                                </div>
                                                <input type="file" name="uploadPRC" accept="application/pdf" class="form-control">
                                            </div>
                                            @endif
                                        </div>
                                    </section>
                                    <div class="w-100 d-flex justify-content-center p-3">
                                        <button class="btn saveBtn" type="submit">Save Changes</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        birthday();
        openChangepass();
    });

    function birthday() {
        const today = new Date(); //script for min & max bday//
        const oneHundredYearsAgo = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate());
        const sixteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

        const minDate = oneHundredYearsAgo.toISOString().split('T')[0];
        const maxDate = sixteenYearsAgo.toISOString().split('T')[0];

        document.getElementById('bday').min = minDate;
        document.getElementById('bday').max = maxDate;
    }
    
    setTimeout(function() {
        let alertElement = $('.session-alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 5000); // The alert will disappear after 3 seconds

    function openChangepass() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('openChangePass')) {
            $('#change-pass-tab-button').tab('show');
            //$('#change-password-tab-pane').addClass('show active');
        }
        if (urlParams.has('openRequirements')) {
            $('#change-reqs-tab-button').tab('show');
            //$('#change-password-tab-pane').addClass('show active');
        }
    }

    function closeChangePass() {
        const url = new URL(window.location.href);
        url.searchParams.delete('openChangePass'); // Replace 'parameter_name' with the actual name of your URL parameter
        url.searchParams.delete('openRequirements'); // Replace 'parameter_name' with the actual name of your URL parameter
        window.history.replaceState(null, '', url);
    }

    $('.close-change-pass').on('click', function() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('openChangePass')) {
            closeChangePass();
        }
        if (urlParams.has('openRequirements')) {
            closeChangePass();
        }
    })
    
    $('#password-toggle').on('click', function () {
            toggleVisibility();
        });
        
    function toggleVisibility(){
        var passInput = $('#password-input');
        var icon = $('#visibility-icon');
        
        // Check the current state and toggle
        if (icon.find('use').attr('xlink:href') === '#invisible') {
            passInput.attr('type', 'text');
            icon.find('use').attr('xlink:href', '#visible'); // Change icon to "visible"
        } else {
            passInput.attr('type', 'password');
            icon.find('use').attr('xlink:href', '#invisible'); // Change icon to "invisible"
        }
    }
    
    function passwordFocus(){
        var placeholder = $('#password-placeholder');
        
        placeholder.removeClass('d-none');
    }
    function passwordBlur(){
        var placeholder = $('#password-placeholder');
        
        placeholder.addClass('d-none');
    }
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

    ul#settings-tabs button {
        transition: all 0.3s ease;
        color: black;
    }

    ul#settings-tabs button:hover {
        background-color: #759C75 !important;
        color: white !important;
    }

    ul#settings-tabs button.active {
        background-color: #759C75;
        color: white;
    }

    .saveBtn {
        width: 250px;
        border-color: #759C75 !important;
        transition: all 0.3s ease !important;
    }

    .saveBtn:hover {
        background-color: #759C75 !important;
        color: white !important;
    }

    .btn-view {
        background-color: transparent;
        border-color: #759C75 !important;
        color: black;
        transition: all 0.3s ease !important;
    }

    .btn-view:hover {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        color: white !important;
    }

    .file-preview-link {
        text-decoration: none;
        color: #759C75 !important;
        transition: all 0.3s ease !important;
    }

    .file-preview-link:hover {
        color: #99CC99 !important;
    }
    
    #password-toggle:hover{
        #visibility-icon{
        fill: #99CC99 !important;
        transition: all 0.3s ease;
        }
    }
</style>