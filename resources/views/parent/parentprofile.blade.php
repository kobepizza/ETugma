@extends('layouts.clientmaster')
@section('content')
@php
$firstPreference = session('clientMain')->preferenceLanguage->preference->first();
$count=0;

$page='Profile'
@endphp

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
                <form method="post" action="{{route('parent.profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label">Upload Profile Picture</label><!--new profile pic-->
                            <input type="file" class="form-control" name="profilePic" accept="image/png, image/jpeg" required>
                            <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
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
    <!--ADD CHILD-->
    <div class="modal fade" tabindex="-1" id="addchild" data-bs-backdrop="static">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Child Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{route('child.add')}}" enctype="multipart/form-data" data-action=""><!--with multipart-->
                    @csrf

                    <div class="modal-body p-4" style="max-height:700px; overflow-y:auto; scrollbar-width:thin;">
                        <p class="mb-3 text-danger">Note: Each account can only have a maximum of 3 children enrolled.</p>
                        <div class="mb-3">
                            <label class="form-label">Upload Profile Picture<span style="color:red;">*</span></label><!--new profile pic-->
                            <input type="file" class="form-control" name="profilePic" accept="image/png, image/jpeg" required>
                            <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">First Name<span style="color:red;">*</span></label> <!--new first name-->
                            <input type="text" class="form-control" value="{{old('studFname')}}" name="studFname" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name<span style="color:red;">*</span></label> <!--new last name-->
                            <input type="text" class="form-control" value="{{old('studLname')}}" name="studLname" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender<span style="color:red;">*</span></label> <!--new gender-->
                            <select class="form-select" name="studGender" required>
                                <option value="" selected disabled>Select Gender</option> <!--db value-->
                                @foreach ($gender as $data)
                                <option value="{{ $data->id }}" {{ old('studGender') == $data->id ? 'selected' : '' }}>{{ $data->gender }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Birthday<span style="color:red;">*</span></label> <!--new bday-->
                            <input type="date" id="studBday" value="{{old('studBday')}}" name="studBday" class="form-control studbday" required>
                        </div>
                        <hr class="mb-3">
                        <h5 class="mb-3">Academic Information</h5>
                        <div class="mb-3">
                            <label class="form-label">Learner's Reference Number (optional)</label> <!--new LRN-->
                            <input type="text" class="form-control" value="{{old('lrn')}}" name="lrn" minlength="12" maxlength="12">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">School<span style="color:red;">*</span></label> <!--new school-->
                            <input type="text" class="form-control" value="{{old('studSchool')}}" name="studSchool" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Year Level<span style="color:red;">*</span></label> <!--new year level-->
                            <select class="form-select" name="studYearLevel" required>
                                <option value="" selected disabled>Select Year Level</option>
                                <!--looping-->
                                @foreach ($yearLevel as $data)
                                <option value="{{ $data->id }}" {{ old('studYearLevel') == $data->id ? 'selected' : '' }}>{{ $data->year }}</option>
                                @endforeach
                                <!---->
                            </select>
                        </div>
                        <hr class="mb-3">
                        <h5 class="mb-3">Select Preferences<span style="color:red;">*</span></h5>
                        <div class="container-fluid d-flex justify-content-center">
                            <div>
                                <div class="form-check mb-4">
                                    <h3>Modality</h3>
                                    <div class="hstack gap-3 mb-3">
                                        @foreach ($modality as $data)
                                        <input type="radio" class="btn-check" name="studModality" id="modality{{ $data->id }}" autocomplete="off" value="{{$data->id}}">
                                        <label class="btn modal-pref" for="modality{{ $data->id }}">{{ $data->modality}}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-check mb-4">
                                    <h3>Learning Style</h3>
                                    <div class="hstack gap-3 mb-3">
                                        @foreach($teaching as $data)
                                        <input type="radio" class="btn-check" name="studTeachingStyle" id="learning-style{{ $data->id}}" autocomplete="off" value="{{$data->id}}">
                                        <label class="btn modal-pref" for="learning-style{{ $data->id }}">{{$data->style}}</label>

                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-check mb-4">
                                    <h3>Language</h3>
                                    <div class="hstack gap-3 mb-3">
                                        @foreach ( $language as $data)
                                        <input type="checkbox" class="btn-check" name="studLanguage[]" id="{{$data->language}}" autocomplete="off" value="{{$data->id}}">
                                        <label class="btn modal-pref" for="{{$data->language}}">{{$data->language}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline btn-lg close-btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline btn-lg save-btn">Create profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of add child-->
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
            <!--LOOPING--><!--guardian_main-->
            <!--header-->
            <section class="mb-4">
                <div class="vstack gap-2 d-flex align-items-center w-100">
                    <div class="profile-pic">
                        @foreach ($profile as $data)
                        <img src="{{ asset($data->profile_pic)}}" alt="" width="140" height="140" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--parent profile picture-->
                        @endforeach
                        <a type="button" class="rounded-circle bg-white p-2 change-profile-btn" id="changeprofilebtn" data-bs-toggle="modal" data-bs-target="#changeprofile"><svg class="" height="25" width="23">
                                <use xlink:href="#edit" />
                            </svg>
                        </a>
                    </div>
                    <h1 class="fw-bold text-capitalize">{{ strtoupper(session('user_profiles')->fname) . ' ' .  strtoupper(session('user_profiles')->lname) ?? 'N/A' }}</h1> <!--parent full name-->
                    <h3>{{ session('clientMain')->guardian->relation->relation}}</h3><!---Relation to student-->
                </div>
            </section>
            <!---->
            <!--nav tabs-->
            <ul class="nav nav-tabs mb-4" id="profile-tabs" role="tablist">

                @if($children)
                @foreach($children as $client)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }} text-capitalize" id="child-tab{{$client->child->id}}" data-bs-toggle="tab" data-bs-target="#child-tab-pane{{$client->child->id}}" type="button" role="tab" aria-controls="child-tab-pane{{$client->child->id}}" aria-selected="true"><!--include child id -->
                        {{ ucwords(strtolower($client->child->fname)) }}<!--child first name-->
                    </button>
                </li>
                @endforeach

                @if($children->count() < 3)
                    <li class="nav-item"> <!--add child button--> <!--will disappear when account has >=3 children-->
                    <button class="nav-link addchild-btn" id="addchild" data-bs-toggle="modal" data-bs-target="#addchild" type="button"><!--include child id -->
                        <svg height="20" width="20" fill="currentcolor">
                            <use xlink:href="#add" />
                        </svg>
                        Add child
                    </button>
                    </li>
                    @endif

            </ul>
            <!---->
            <!--body-->
            <div class="tab-content" id="profile-tabs-content">
                @foreach($children as $clients)
                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="child-tab-pane{{$clients->child->id}}" role="tabpanel" aria-labelledby="child-tab{{$clients->child->id}}" tabindex="0"> <!--include child id -->
                    <!--MODALS-->
                    <!--EDIT PROFILE-->
                    <div class="modal fade" tabindex="-1" id="editprofile{{$clients->child->id}}" data-bs-backdrop="static"> <!--include child id -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Profile Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{route('child.update')}}">
                                    @csrf

                                    <input type="hidden" name="updateProfile" value="{{$clients->child->id}}">
                                    <div class="modal-body p-4">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label> <!--new first name-->
                                            <input type="text" class="form-control text-capitalize" name="fname" value="{{old('fname',$clients->child->fname)}}"> <!--db value first name-->
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label> <!--new last name-->
                                            <input type="text" class="form-control text-capitalize" name="lname" value="{{old('lname',$clients->child->lname)}}"> <!--db value last name-->
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label> <!--new gender-->
                                            <select class="form-select" name="gender">
                                                <option value="{{ $clients->child->gender->id }}" selected disabled>Select Gender</option> <!--db value gender-->
                                                @php
                                                $childGender = $clients->child->gender->id;
                                                @endphp
                                                @foreach ($gender as $data)
                                                <option value="{{ $data->id }}" {{ old('gender', $data->id) == $childGender ? 'selected' : '' }}>{{ $data->gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Birthday</label> <!--new bday-->
                                            <input type="date" name="bday" class="form-control studbday" value="{{old('bday',$clients->child->bday)}}" required> <!--db value bday-->
                                        </div>
                                        <hr class="mb-3">
                                        <h5 class="mb-3">Academic Information</h5>
                                        <div class="mb-3">
                                            <label class="form-label">Learner's Reference Number</label> <!--new LRN-->
                                            <input type="text" class="form-control" name="lrn" minlength="12" maxlength="12" value="{{old('lrn',$clients->child->lrn)}}"> <!--db value lrn-->
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">School</label> <!--new school-->
                                            <input type="text" class="form-control text-capitalize" name="school" value="{{old('school',$clients->child->school)}}"> <!--db value school-->
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Year Level</label> <!--new year level-->
                                            <select class="form-select" name="yearLevel" value=""> <!--db value yr level-->
                                                <option value="" selected disabled>Select Year Level</option>
                                                @php
                                                $childYear = $clients->child->yearLevel->id;
                                                @endphp
                                                @foreach ($yearLevel as $data)
                                                <option value="{{ $data->id }}" {{ old('yearLevel',$data->id) == $childYear ? 'selected' : '' }}>{{ $data->year }}</option>
                                                @endforeach
                                            </select>
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
                    <!--end of edit profile-->
                    <!--CHANGE PROFILE-->
                    <div class="modal fade" tabindex="-1" id="studentchangeprofile{{$clients->child->id}}" data-bs-backdrop="static"> <!--include child id -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Change Child's Profile Picture</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{route('child.pic')}}" data-action="" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="child_id" value="{{ $clients->child->id }}">
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
                    <!--EDIT PREFERENCE-->
                    <div class="modal fade" id="edit-preference{{$clients->child->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> <!--include child id -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit {{ strtoupper(substr($clients->child->fname, 0, 1)) }}{{ strtolower(substr($clients->child->fname, 1)) }}'s Preferences</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('update.preference')}}">
                                        @csrf
                                        <input type="hidden" name="preference_id" value="{{$clients->preferenceLanguage->id}}">
                                        <div class="form-check mb-4">
                                            <h3>Modality</h3>
                                            <div class="hstack gap-3 mb-3">
                                                @foreach ($clients->preferenceLanguage->preference as $modality)
                                                <input type="radio" class="btn-check" name="modality" autocomplete="off" value="1" id="modality1{{$clients->child->id}}"
                                                    @if ($clients->preferenceLanguage->preference->first()->modality->id == '1')
                                                checked
                                                @endif
                                                >
                                                <label class="btn modal-pref" for="modality1{{$clients->child->id}}">Face-to-Face</label>

                                                <input type="radio" class="btn-check" name="modality" autocomplete="off" value="2" id="modality2{{$clients->child->id}}"
                                                    @if ($clients->preferenceLanguage->preference->first()->modality->id == '2')
                                                checked
                                                @endif
                                                >
                                                <label class="btn modal-pref" for="modality2{{$clients->child->id}}">Online</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-check mb-4">
                                            <h3>Learning Style</h3>
                                            <div class="hstack gap-3 mb-3">
                                                @foreach ($clients->preferenceLanguage->preference as $teachingStyle)
                                                <input type="radio" class="btn-check" name="learning_style" autocomplete="off" value="1" id="teachingStyle1{{$clients->child->id}}"
                                                    @if ($clients->preferenceLanguage->preference->first()->teachingStyle->id == '1')
                                                checked
                                                @endif
                                                >
                                                <label class="btn modal-pref" for="teachingStyle1{{$clients->child->id}}">Visual Aids</label>

                                                <input type="radio" class="btn-check" name="learning_style" autocomplete="off" value="2" id="teachingStyle2{{$clients->child->id}}"
                                                    @if ($clients->preferenceLanguage->preference->first()->teachingStyle->id == '2')
                                                checked
                                                @endif
                                                >
                                                <label class="btn modal-pref" for="teachingStyle2{{$clients->child->id}}">Verbal</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-check mb-4">
                                            <h3>Language</h3>
                                            <div class="hstack gap-3 mb-3">
                                                @foreach (['1' => 'English', '2' => 'Filipino'] as $languageId => $languageName)
                                                <input type="checkbox" class="btn-check" name="languages[]" id="editlanguage{{$languageId}}{{$clients->child->id}}" autocomplete="off" value="{{$languageId}}"
                                                    @if (in_array($languageId, explode(',', $clients->preferenceLanguage->languages)))
                                                checked
                                                @endif
                                                >
                                                <label class="btn modal-pref" for="editlanguage{{$languageId}}{{$clients->child->id}}">{{$languageName}}</label>
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
                    <!--DISPLAY-->
                    <div class="row">
                        <div class="info col-12 col-xl-7">
                            <section class="mb-4">
                                <div class="hstack gap-3 d-flex justify-content-center align-items-center w-100">
                                    <div class="profile-pic">
                                        <img src="{{ asset($clients->child->profile_pic)}}" alt="" width="140" height="140" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';"> <!--child profile picture-->
                                        <a type="button" class="rounded-circle bg-white p-2 change-profile-btn" id="studentchangeprofilebtn{{$clients->child->id}}" data-bs-toggle="modal" data-bs-target="#studentchangeprofile{{$clients->child->id}}">
                                            <svg class="" height="25" width="23"><!--include child id -->
                                                <use xlink:href="#edit" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="vstack gap-1">
                                        <h2 class="fw-bold"> {{ ucwords(strtolower($clients->child->fname)) }} {{ ucwords(strtolower($clients->child->lname)) }}</h2> <!--child full name-->
                                        <h4 class="fw-bold">{{$clients->child->gender->gender}}</h4> <!--child gender-->
                                        <h4 class="fw-bold">{{ \Carbon\Carbon::parse($clients->child->bday)->age }} Years Old</h4> <!--child age-->

                                    </div>
                                    <a type="button" class="rounded-circle bg-white p-2 edit-profile-btn align-self-start" id="editprofile{{$clients->child->id}}" data-bs-toggle="modal" data-bs-target="#editprofile{{$clients->child->id}}"><!--edit profile button --> <!--include child id -->
                                        <svg class="" height="35" width="33">
                                            <use xlink:href="#edit" />
                                        </svg>
                                    </a>
                                </div>
                            </section>
                            <section class="mb-4">
                                <h3 class="pb-2 text-center text-xl-start">Academic Information</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col-5">
                                                LRN
                                            </span>
                                            <div class="col-7">
                                                <span class="fs-5 data-value">{{$clients->child->lrn}}</span> <!--LRN-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col-5">
                                                School
                                            </span>
                                            <div class="col-7">
                                                <span class="fs-5 data-value text-capitalize">{{ ucwords(strtolower($clients->child->school)) }}</span> <!--school-->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="data-container d-flex align-items-center p-2">
                                            <span class="data-title fs-5 fw-bold col-5">
                                                Year Level
                                            </span>
                                            <div class="col-7">
                                                <span class="fs-5 data-value">{{$clients->child->yearLevel->year}}</span> <!--year level-->
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </section>
                        </div>
                        <div class="col-12 col-xl preference">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="text-center mb-3">Student's Preference</h3>
                                <a type="button" id="edit-preference-btn{{$clients->child->id}}" class="float-end p-0 editprefbtn" data-bs-toggle="modal" data-bs-target="#edit-preference{{$clients->child->id}}">
                                    <svg height="35" width="33">
                                        <use xlink:href="#edit" />
                                    </svg>
                                </a>
                            </div>
                            <!--IF ELSE-->
                            <div class="container d-flex justify-content-center border border-1 rounded-5 shadow-sm p-3 mb-2">
                                <div>
                                    <div class="form-check mb-4">
                                        <h3>Modality</h3>
                                        <div class="hstack gap-3 mb-3 ">
                                            @foreach ($clients->preferenceLanguage->preference as $modality)

                                            @if ($modality->modality->id == '1')
                                            <input type="radio" class="btn-check" name="modality{{$clients->child->id}}" autocomplete="off" value="f2f" id="modality1{{$clients->child->id}}" checked>
                                            @else
                                            <input type="radio" class="btn-check" name="modality{{$clients->child->id}}" autocomplete="off" value="f2f" id="modality1{{$clients->child->id}}">
                                            @endif
                                            <label class="btn option-btn" for="modality1{{$clients->child->id}}">Face-to-Face</label>

                                            @if ($modality->modality->id == '2')
                                            <input type="radio" class="btn-check" name="modality{{$clients->child->id}}" autocomplete="off" value="online" id="modality2{{$clients->child->id}}" checked>
                                            @else
                                            <input type="radio" class="btn-check" name="modality{{$clients->child->id}}" autocomplete="off" value="online" id="modality2{{$clients->child->id}}">
                                            @endif
                                            <label class="btn option-btn" for="modality2{{$clients->child->id}}">Online</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-check mb-4">
                                        <h3>Learning Style</h3>
                                        <div class="hstack gap-3 mb-3 ">
                                            @foreach ($clients->preferenceLanguage->preference as $teachingStyle)

                                            @if ($teachingStyle->teachingStyle->id== '1')

                                            <input type="radio" class="btn-check" name="learning-style{{$clients->child->id}}" autocomplete="off" value="visual" id="teachingStyle1{{$clients->child->id}}" checked>
                                            @else
                                            <input type="radio" class="btn-check" name="learning-style{{$clients->child->id}}" autocomplete="off" value="visual" id="teachingStyle1{{$clients->child->id}}">
                                            <!--include child id -->
                                            @endif
                                            <label class="btn option-btn" for="teachingStyle1{{$clients->child->id}}">Visual Aids</label>

                                            @if ($teachingStyle->teachingStyle->id== '2')
                                            <input type="radio" class="btn-check" name="learning-style{{$clients->child->id}}" autocomplete="off" value="verbal" id="teachingStyle2{{$clients->child->id}}" checked><!--include child id -->
                                            @else
                                            <input type="radio" class="btn-check" name="learning-style{{$clients->child->id}}" autocomplete="off" value="verbal" id="teachingStyle2{{$clients->child->id}}"><!--include child id -->
                                            @endif
                                            <label class="btn option-btn" for="teachingStyle2{{$clients->child->id}}">Verbal</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-check mb-4">
                                        <h3>Language</h3>
                                        <div class="hstack gap-3 mb-3">
                                            @foreach (['1' => 'English', '2' => 'Filipino'] as $languageId => $languageName)
                                            <input type="checkbox" class="btn-check" name="languages[]" id="editlanguage{{$languageId}}{{$clients->child->id}}" autocomplete="off" value="{{$languageId}}"
                                                @if (in_array($languageId, explode(',', $clients->preferenceLanguage->languages)))
                                            checked
                                            @endif
                                            >
                                            <label class="btn option-btn" for="editlanguage{{$languageId}}{{$clients->child->id}}">{{$languageName}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                </div>
                @endforeach
            </div>
            <!---->
            <!--END OF LOOP-->
            @endif
        </div>
    </main>
    <script>
        $(document).ready(function() {
            dates();
            openProfilePicModal();
        });

        setTimeout(function() {
            $('.alert').remove();
        }, 3000);

        function dates() {
            const today = new Date();
            const oneHundredYearsAgo = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate());
            const sixteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
            const fourYearsAgo = new Date(today.getFullYear() - 2, today.getMonth(), today.getDate());

            const minDate = oneHundredYearsAgo.toISOString().split('T')[0];
            const maxDate = sixteenYearsAgo.toISOString().split('T')[0];
            const studMaxDate = fourYearsAgo.toISOString().split('T')[0];

            const studbdayInputs = document.querySelectorAll('.studbday');

            studbdayInputs.forEach(input => {
                input.min = minDate;
                input.max = studMaxDate;
            });
        }

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

    .info:hover {
        .edit-profile-btn {
            visibility: visible;
            opacity: 1;
        }
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

    .addchild-btn:hover {
        transition: all 0.3s ease;
        color: #759C75 !important;
    }

    .editprefbtn {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    .preference:hover {
        .editprefbtn {
            visibility: visible;
            opacity: 1;
        }
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
</style>