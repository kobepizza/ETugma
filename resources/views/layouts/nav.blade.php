<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="logout" viewBox="0 -960 960 960">
            <title>logout</title>
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
        </symbol>
        <symbol id="settings" viewBox="0 -960 960 960">
            <title>settings</title>
            <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
        </symbol>
        <symbol id="messageAdmin" viewBox="0 -960 960 960">
            <title>messageAdmin</title>
            <path d="M480-680q17 0 28.5-11.5T520-720q0-17-11.5-28.5T480-760q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Zm-40 320h80v-240h-80v240ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
        </symbol>
        <symbol id="help" viewBox="0 -960 960 960">
            <title>help</title>
            <path d="M478-240q21 0 35.5-14.5T528-290q0-21-14.5-35.5T478-340q-21 0-35.5 14.5T428-290q0 21 14.5 35.5T478-240Zm-36-154h74q0-33 7.5-52t42.5-52q26-26 41-49.5t15-56.5q0-56-41-86t-97-30q-57 0-92.5 30T342-618l66 26q5-18 22.5-39t53.5-21q32 0 48 17.5t16 38.5q0 20-12 37.5T506-526q-44 39-54 59t-10 73Zm38 314q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
    </svg>
</head>
<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn d-none d-md-flex " id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="btn d-md-none " id="offcanvass-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#topbar" aria-controls="topbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    @if(session('clientMain') || session('tutorMain'))
    <button class="btn p-1 help-btn" id="toggle-help-modal" type="button" data-bs-toggle="modal" data-bs-target="#helpModal">
        <svg class="bi" width="30" height="30" fill="currentcolor">
            <use xlink:href="#help" />
        </svg>
    </button>
    @endif
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav align-items-center gap-2">
            <li>
                <!---<h6 class="mb-0">{{ucwords(strtolower(session('user_profiles')->fname)). ' ' .  ucwords(strtolower(session('user_profiles')->lname))}}</h6>-->
                <h6 class="mb-0">{{ ucwords(strtolower(session('user_profiles')->fname)).' '. ucwords(strtolower(session('user_profiles')->lname)) }}</h6>
            </li>
            <li class="nav-item dropdown">
                <a href="" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="{{session('user_profiles')->profile_pic}}" height="35" width="35" style="object-fit:cover;object-position:50% 50%;border-radius:50%;" onerror="this.src='Images/default-profile.png';" alt=""> <!--user profile image-->
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{route('load.settings')}}" class="dropdown-item text-decoration-none">
                        <svg class="bi" width="20" height="20" fill="currentcolor">
                            <use xlink:href="#settings" />
                        </svg>
                        Settings
                    </a>
                    @if(session('clientMain') || session('tutorMain') )
                    <a href="{{route('message.admin')}}" class="dropdown-item text-decoration-none">
                        <svg class="bi" width="20" height="20" fill="currentcolor">
                            <use xlink:href="#messageAdmin" />
                        </svg>
                        Message Admin
                    </a>
                    @endif

                    @if(session('clientMain') || session('tutorMain') )
                    <hr class="dropdown-divider">
                    <a href="{{route('logout')}}" class="dropdown-item text-decoration-none">
                        <svg class="bi" width="20" height="20" fill="currentcolor">
                            <use xlink:href="#logout" />
                        </svg>
                        Logout
                    </a>
                    @else
                    <a href="{{route('admin.logout')}}" class="dropdown-item text-decoration-none">
                        <svg class="bi" width="20" height="20" fill="currentcolor">
                            <use xlink:href="#logout" />
                        </svg>
                        Logout
                    </a>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">How It Works</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('clientMain'))
                <section class="p-2 parent-guide">
                    <h5 class="mb-2 help-title">How to start your tutoring session:</h5>
                    <ol class="list-group list-group-numbered mb-3">
                        <li class="list-group-item">Setup your <a class="link" href="{{route('parent.profile')}}">profile</a></li>
                        <li class="list-group-item">Find tutors</li>
                        <li class="list-group-item">Wait for acceptance</li>
                        <li class="list-group-item">Pay tutoring fee</li>
                        <li class="list-group-item">Start your tutoring session!</li>
                    </ol>
                    <hr>
                    <h5 class="mb-3 help-title">Reminders:</h5>
                    <ul class="list-group">
                        <li class="list-group-item">* Set profile pictures for you and your children for a better experience.</li>
                        <li class="list-group-item">* You may only message a tutor when you have an active tutoring session.</li>
                        <li class="list-group-item">* A pay-first policy is implemented.</li>
                        <li class="list-group-item">* Primary mode of payment is through GCash.</li>
                        <li class="list-group-item">* If you have any concerns or complaints about a tutor you may <a class="link" href="{{route('message.admin')}}">message an admin</a>.</li>
                    </ul>
                </section>
                @endif
                @if(session('tutorMain'))
                <section class="p-2 parent-guide">
                    <h5 class="mb-2 help-title">How to start your tutoring session:</h5>
                    <ol class="list-group list-group-numbered mb-3">
                        <li class="list-group-item">Setup your <a class="link" href="{{route('tutor.profile')}}">profile</a></li>
                        <li class="list-group-item">Wait for <a class="link" href="{{route('load.settings',['openRequirements' => 'true'])}}">verification</a> of your account</li>
                        <li class="list-group-item">Wait for applications</li>
                        <li class="list-group-item">Confirm applications</li>
                        <li class="list-group-item">Start your tutoring session!</li>
                    </ol>
                    <hr>
                    <h5 class="mb-3 help-title">Reminders:</h5>
                    <ul class="list-group">
                        <li class="list-group-item">* Set up your profile picture for a better experience.</li>
                        <li class="list-group-item">* Set your credentials and availability to appeal more applications.</li>
                        <li class="list-group-item">* Wait for the confirmation of payment from the parent before starting your session.</li>
                        <li class="list-group-item">* You may only message a parent when you have an active tutoring session.</li>
                        <li class="list-group-item">* If you have any concerns or complaints about a parent you may <a class="link" href="{{route('message.admin')}}">message an admin</a>.</li>
                    </ul>
                </section>
                @endif
                <hr>
                <section class="p-2 terms">
                <h5 class="mb-2 help-title">Legal:</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Your data is our priority. Learn how we protect and use it in our <a class="link" target="_blank" href="{{route('legal', ['openPrivacy' => 'true'])}}">privacy policy</a>.</li>
                        <li class="list-group-item">We are committed to transparency in our operations. You can review the <a class="link" target="_blank" href="{{route('legal', ['openTerms' => 'true'])}}">terms of service</a> you agreed to when using ETugma at any time.</li>
                    </ul>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-view" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    .help-btn:hover {
        .bi {
            fill: #759C75;
            transition: all 0.3s ease;
        }
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

    .help-title {
        color: #759C75;
    }

    .link {
        color: #759C75;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .link:hover {
        color: #99CC99;
        text-decoration: underline;
    }
</style>