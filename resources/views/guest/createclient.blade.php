@extends('layouts.signmaster')
@section('content')

@php
$page="Parent Sign Up";
@endphp

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="user" viewBox="0 -960 960 960">
            <title>user</title>
            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
        </symbol>

        <symbol id="key" viewBox="0 -960 960 960">
            <title>Lock</title>
            <path d="M280-400q-33 0-56.5-23.5T200-480q0-33 23.5-56.5T280-560q33 0 56.5 23.5T360-480q0 33-23.5 56.5T280-400Zm0 160q-100 0-170-70T40-480q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280-240Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z" />
        </symbol>

        <symbol id="num" viewBox="0 -960 960 960">
            <title>age</title>
            <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm100-200h46v-240h-36l-70 50 24 36 36-26v180Zm124 0h156v-40h-94l-2-2q21-20 34.5-34t21.5-22q18-18 27-36t9-38q0-29-22-48.5T458-600q-26 0-47 15t-29 39l40 16q5-13 14.5-20.5T458-558q15 0 24.5 8t9.5 20q0 11-4 20.5T470-486l-32 32-54 54v40Zm296 0q36 0 58-20t22-52q0-18-10-32t-28-22v-2q14-8 22-20.5t8-29.5q0-27-21-44.5T678-600q-25 0-46.5 14.5T604-550l40 16q4-12 13-19t21-7q13 0 21.5 7.5T708-534q0 14-10 22t-26 8h-18v40h20q20 0 31 8t11 22q0 13-11 22.5t-25 9.5q-17 0-26-7.5T638-436l-40 16q7 29 28.5 44.5T680-360ZM160-240h640v-480H160v480Zm0 0v-480 480Z" />
        </symbol>

        <symbol id="gender" viewBox="0 0 16 16">
            <title>gender</title>
            <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z" />
        </symbol>

        <symbol id="rs" viewBox="0 -960 960 960">
            <title>relation</title>
            <path d="M40-160v-160q0-34 23.5-57t56.5-23h131q20 0 38 10t29 27q29 39 71.5 61t90.5 22q49 0 91.5-22t70.5-61q13-17 30.5-27t36.5-10h131q34 0 57 23t23 57v160H640v-91q-35 25-75.5 38T480-200q-43 0-84-13.5T320-252v92H40Zm440-160q-38 0-72-17.5T351-386q-17-25-42.5-39.5T253-440q22-37 93-58.5T480-520q63 0 134 21.5t93 58.5q-29 0-55 14.5T609-386q-22 32-56 49t-73 17ZM160-440q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T280-560q0 50-34.5 85T160-440Zm640 0q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T920-560q0 50-34.5 85T800-440ZM480-560q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-680q0 50-34.5 85T480-560Z" />
        </symbol>

        <symbol id="phone" viewBox="0 -960 960 960">
            <title>phone</title>
            <path d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
        </symbol>

        <symbol id="world" viewBox="0 -960 960 960">
            <title>country</title>
            <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-40-82v-78q-33 0-56.5-23.5T360-320v-40L168-552q-3 18-5.5 36t-2.5 36q0 121 79.5 212T440-162Zm276-102q20-22 36-47.5t26.5-53q10.5-27.5 16-56.5t5.5-59q0-98-54.5-179T600-776v16q0 33-23.5 56.5T520-680h-80v80q0 17-11.5 28.5T400-560h-80v80h240q17 0 28.5 11.5T600-440v120h40q26 0 47 15.5t29 40.5Z" />
        </symbol>

        <symbol id="building" viewBox="0 -960 960 960">
            <title>city</title>
            <path d="M120-120v-560h240v-80l120-120 120 120v240h240v400H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm240 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm240 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z" />
        </symbol>

        <symbol id="mail" viewBox="0 -960 960 960">
            <title>email</title>
            <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v58q0 59-40.5 100.5T740-280q-35 0-66-15t-52-43q-29 29-65.5 43.5T480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480v58q0 26 17 44t43 18q26 0 43-18t17-44v-58q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v80H480Zm0-280q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
        </symbol>

        <symbol id="yearlvl" viewBox="0 -960 960 960">
            <title>year level</title>
            <path d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z" />
        </symbol>

        <symbol id="school" viewBox="0 -960 960 960">
            <title>school</title>
            <path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z" />
        </symbol>

        <symbol id="lrn" viewBox="0 -960 960 960">
            <title>LRN</title>
            <path d="M560-440h200v-80H560v80Zm0-120h200v-80H560v80ZM200-320h320v-22q0-45-44-71.5T360-440q-72 0-116 26.5T200-342v22Zm160-160q33 0 56.5-23.5T440-560q0-33-23.5-56.5T360-640q-33 0-56.5 23.5T280-560q0 33 23.5 56.5T360-480ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm0-80h640v-480H160v480Zm0 0v-480 480Z" />
        </symbol>

        <symbol id="add" viewBox="0 -960 960 960">
            <title>address</title>
            <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
        </symbol>

        <symbol id="bday" viewBox="0 -960 960 960">
            <title>bday</title>
            <path d="M160-80q-17 0-28.5-11.5T120-120v-200q0-33 23.5-56.5T200-400v-160q0-33 23.5-56.5T280-640h160v-58q-18-12-29-29t-11-41q0-15 6-29.5t18-26.5l56-56 56 56q12 12 18 26.5t6 29.5q0 24-11 41t-29 29v58h160q33 0 56.5 23.5T760-560v160q33 0 56.5 23.5T840-320v200q0 17-11.5 28.5T800-80H160Zm120-320h400v-160H280v160Zm-80 240h560v-160H200v160Zm80-240h400-400Zm-80 240h560-560Zm560-240H200h560Z" />
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
    <div class="register container growable-flex px-4 py-5">
        <div class="container d-flex">
            <p class="ms-auto me-2">Looking for work?</p>
            <a class="link" href="{{route('grad.choice')}}"> <!--tutor button-->
                <p>Sign Up as a Tutor</p>
            </a>
        </div>
        <main>
            <div class="container col-auto shadow-lg rounded-4 p-3">
                <form method="POST" action="{{route('signup.client')}}">
                    @csrf

                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    @endif
                    <div class="container d-fluid">
                        <h2 class=" display-6 fw-normal mt-5 mb-5 text-center">Sign Up as a Parent</h2>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>First Name</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--first name-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#user" />
                                            </svg></span>
                                        <input type="text" name="fname" class="form-control" value="{{old('fname')}}" placeholder="First name" onfocus="(placeholder='ex. Juan')" onblur="(placeholder='First name')" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Last Name</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--last name-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#user" />
                                            </svg></span>
                                        <input type="text" name="lname" class="form-control" value="{{old('lname')}}" placeholder="Last name" onfocus="(placeholder='ex. Dela Cruz')" onblur="(placeholder='Last name')" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Birthday</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--bday-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#bday" />
                                            </svg></span>
                                        <input type="date" id="bdayinput" value="{{old('bday')}}" name="bday" class="form-control" aria-describedby="addon-wrapping" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Gender</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group mb-3"> <!--sex-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#gender" />
                                            </svg></span>
                                        <select name="gender" class="form-select" required>
                                            <option value="" selected disabled>Select Gender</option>
                                            @foreach ($gender as $data)
                                            <option value="{{ $data->id }}" {{ old('gender') == $data->id ? 'selected' : '' }}>{{ $data->gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Relation to Student</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group mb-3"> <!--relation-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#rs" />
                                            </svg></span>
                                        <select class="form-select" name="relation" required>
                                            <option value="" selected disabled>Relation to student</option>
                                            @foreach ($relation as $data)
                                            <option value="{{ $data->id }}" {{old('relation') == $data->id ? 'selected' : ''}}>{{ $data->relation }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Mobile Number</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--cpnum-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#phone" />
                                            </svg></span>
                                        <input type="text" name="cpNum" min="0" maxlength="11" value="{{old('cpNum')}}" class="form-control" placeholder="Mobile Number" onfocus="(placeholder='ex. 09123456789')" onblur="(placeholder='Mobile Number')" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Country</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--country-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#world" />
                                            </svg></span>
                                        <input type="text" name="country" class="form-control" value="{{old('country')}}" placeholder="Country" onfocus="(placeholder='ex. Philippines')" onblur="(placeholder='Country')" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Municipality</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--municipality-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#building" />
                                            </svg></span>
                                        <input type="text" name="city" class="form-control" value="{{old('city')}}" placeholder="Municipality" onfocus="(placeholder='ex. Makati City')" onblur="(placeholder='Municipality')" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="d-flex align-items-center">
                                        <h7>Address</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--address-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#add" />
                                            </svg></span>
                                        <input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder="Address" onfocus="(placeholder='Blk,Lot,Street')" onblur="(placeholder='Address')" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="d-flex align-items-center">
                                        <h7>Email Address</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--email-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#mail" />
                                            </svg></span>
                                        <input type="email" name="clientEmail" class="form-control" value="{{old('clientEmail')}}" placeholder="Email" required>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Password</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--password-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#key" />
                                            </svg></span>
                                        <input type="password" minlength="8" name="clientPassword" class="form-control border-end-0" onblur="passwordBlur()" onfocus="passwordFocus()" placeholder="Password" id="password-input" required>
                                        <span class="input-group-text border-start-0 bg-transparent" role="button" id="password-toggle">
                                             <svg class="bi visible" width="20" height="20" fill="currentcolor" id="visibility-icon">
                                                <use xlink:href="#invisible" />
                                            </svg>
                                        </span>
                                    </div>
                                    <label class="fst-italic text-secondary d-none" id="password-placeholder">Minimum 8 Chars, 1, Uppercase, 1, Lowercase, 1 digit, 1 Special Char (ex. !_*)</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Re-type Password</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--confirm password-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#key" />
                                            </svg></span>
                                        <input type="password" minlength="8" name="clientConfirm" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <hr class="col-12 mb-3 mt-3">
                                </hr>
                                <h5 class=" display-7 fw-normal mb-3">Child/Student Information</h5>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>First Name</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--stud first name-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#user" />
                                            </svg></span>
                                        <input type="text" name="studFname" class="form-control" value="{{old('studFname')}}" placeholder="First name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Last Name</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--stud last name-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#user" />
                                            </svg></span>
                                        <input type="text" name="studLname" class="form-control" value="{{old('studLname')}}" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Birthday</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!--stud bday-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#bday" />
                                            </svg></span>
                                        <input type="date" id="studBday" value="{{old('studBday')}}"  onfocus="this.min=minDate; this.max=studMaxDate;" name="studBday" class="form-control" aria-describedby="addon-wrapping" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Gender</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group mb-3"> <!--stud sex-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#gender" />
                                            </svg></span>
                                        <select class="form-select" name="studGender" value="{{old('studGender')}}" required>
                                            <option value="" selected disabled>Select Gender</option>
                                            @foreach ($gender as $data)
                                            <option value="{{ $data->id }}" {{old('studGender') == $data->id ? 'selected' : ''}}>{{ $data->gender}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>School</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!-- stud school-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#school" />
                                            </svg></span>
                                        <input type="text" name="studSchool" value="{{old('studSchool')}}" id="studschool" class="form-control" placeholder="School" aria-label="School" aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Year Level</h7><span style="color:red;">*</span>
                                    </label>
                                    <div class="input-group mb-3"> <!--stud year level-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#yearlvl" />
                                            </svg></span>
                                        <select class="form-select" name="yearLevel" required>
                                            <option value="" selected disabled>Year Level</option>
                                            @foreach ($yearLevel as $data)
                                            <option value="{{ $data->id }}" {{old('yearLevel') == $data->id ? 'selected' : ''}}>{{ $data->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="d-flex align-items-center">
                                        <h7>Learner's Reference Number (optional)</h7>
                                    </label>
                                    <div class="input-group flex-nowrap mb-3"> <!-- stud LRN-->
                                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                                <use xlink:href="#lrn" />
                                            </svg></span>
                                        <input type="text" name="lrn" maxlength="12" value="{{old('lrn')}}" class="form-control" placeholder="Learner's Reference Number">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mt-5 mb-1 d-flex justify-content-center">
                                        <input class="form-check-input border-1 border-black" type="checkbox" value="" name="agree" required>
                                        <label class="form-check-label text-center" for="flexCheckDefault">
                                            &nbsp;By checking this, I agree to ETugma's <a class="link" target="_blank" href="{{route('legal', ['openPrivacy' => 'true'])}}">Privacy Policy</a>
                                            and <a class="link" target="_blank" href="{{route('legal', ['openTerms' => 'true'])}}">Terms of Service</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="sub btn btn-lg btn-primary mb-3 mt-2">Create Account</button>
                                    <div class="sign container text-center mb-3 mt-1">
                                        <h7 class="fw-normal">Already have an account? <a class="link" href="{{route('login')}}">Log In</a></h7>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
   <script>
        const today = new Date(); //script for min & max bday//
        const oneHundredYearsAgo = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate());
        const sixteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        const fourYearsAgo = new Date(today.getFullYear() - 2, today.getMonth(), today.getDate());

        const minDate = oneHundredYearsAgo.toISOString().split('T')[0];
        const maxDate = sixteenYearsAgo.toISOString().split('T')[0];
        const studMaxDate = fourYearsAgo.toISOString().split('T')[0];

        document.getElementById('bdayinput').min = minDate;
        document.getElementById('bdayinput').max = maxDate;

        //document.getElementById('studbday').min = minDate;
        //document.getElementById('studbday').max = studMaxDate;
    </script>
    <script>
        setTimeout(function() {
            let alertElement = document.querySelector('.alert');
            if (alertElement) {
                alertElement.remove();
            }
        }, 3000); // The alert will disappear after 3 seconds
        
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
</body>
@endsection
<style>
    .register {
        font-family: Arial, Helvetica, sans-serif;
    }

    select:required:invalid {
        color: #666;
    }

    option[value=""][disabled] {
        display: none;
    }

    option {
        color: #000;
    }

    .link {
        text-decoration: none;
        color: #759C75;
        transition: all 0.3s ease;
    }

    .link:hover {
        color: #99CC99 !important;
    }

    .form-check input:checked {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        transition: all 0.3s ease;
    }

    .sub.btn {
        background-color: #759C75;
        color: white;
        border-color: #759C75;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .sub.btn:hover {
        background-color: #99CC99 !important;
        color: black;
        border-color: #99CC99 !important;
    }
    
    #password-toggle:hover{
        #visibility-icon{
        fill: #99CC99 !important;
        transition: all 0.3s ease;
        }
    }
</style>