@extends('layouts.signmaster')
@section('content')

@php
$page= 'Forgot Password';
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="person" viewBox="0 -960 960 960">
            <title>Person</title>
            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
        </symbol>
        <symbol id="lock" viewBox="0 -960 960 960">
            <title>Lock</title>
            <path d="M280-400q-33 0-56.5-23.5T200-480q0-33 23.5-56.5T280-560q33 0 56.5 23.5T360-480q0 33-23.5 56.5T280-400Zm0 160q-100 0-170-70T40-480q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280-240Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z" />
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
    <main class="login container growable-flex p-4">
        <div class="container col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-4 py-4 border border-1 mt-5 mb-5 shadow-lg" style="border-radius:30px;">
            <form action="{{route('password.update')}}" method="POST">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf

                <input type="hidden" name="token" value="{{$token}}">
                <div class="container">
                    <div class="logo text-center">
                        <img class="mb-3 mt-5" src="Images/logo2.png" height="95">
                        <h4 class="display-7 fw-normal pb-3">Reset Your Password</h4>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="d-flex align-items-center">
                                <h7>Email Address</h7><span style="color:red;">*</span>
                            </label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                        <use xlink:href="#person" />
                                    </svg>
                                </span>
                                <input type="text" name="email" class="form-control" placeholder="Email Address" value="{{$email}}" required readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="d-flex align-items-center">
                                <h7>New Password</h7><span style="color:red;">*</span>
                            </label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                        <use xlink:href="#lock" />
                                    </svg>
                                </span>
                                <input type="password" name="password" class="form-control border-end-0" value="" placeholder="New Password" onblur="passwordBlur()" onfocus="passwordFocus()" id="password-input" required>
                                <span class="input-group-text border-start-0 bg-transparent" role="button" id="password-toggle">
                                    <svg class="bi visible" width="20" height="20" fill="currentcolor" id="visibility-icon">
                                        <use xlink:href="#invisible" />
                                    </svg>
                                </span>
                            </div>
                            <label class="fst-italic text-secondary d-none" id="password-placeholder">Minimum 8 Chars, 1, Uppercase, 1, Lowercase, 1 digit, 1 Special Char (ex. !_*)</label>
                        </div>
                        <div class="mb-3">
                            @error('resetPassword')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label class="d-flex align-items-center">
                                <h7>Confirm New Password</h7><span style="color:red;">*</span>
                            </label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                        <use xlink:href="#lock" />
                                    </svg>
                                </span>
                                <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Confirm New Password" required>
                            </div>
                        </div>
                        <button type="submit" class="lgn btn btn-lg btn-primary w-100">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
<script>
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
    .login {
        font-family: Arial, Helvetica, sans-serif;
    }

    .lgn.btn {
        background-color: #759C75;
        border-color: #759C75;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .lgn.btn:hover {
        background-color: #99CC99 !important;
        border-color: #99CC99 !important;
        color: black !important;
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
    }
    
    #password-toggle:hover{
        #visibility-icon{
        fill: #99CC99 !important;
        transition: all 0.3s ease;
        }
    }
</style>