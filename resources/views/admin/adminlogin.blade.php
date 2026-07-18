@extends('layouts.signmaster')
@section('content')

@php
$page="Admin Login";
@endphp

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
        <symbol id="mail" viewBox="0 -960 960 960">
            <title>email</title>
            <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480v58q0 59-40.5 100.5T740-280q-35 0-66-15t-52-43q-29 29-65.5 43.5T480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480v58q0 26 17 44t43 18q26 0 43-18t17-44v-58q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v80H480Zm0-280q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z" />
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

<main class="login container growable-flex px-4 py-5">
    <div class="container col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-4 py-4 mb-3 border border-1 shadow-lg" style="border-radius:30px;">
        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-succes session-alert">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('info'))
            <div class="alert alert-success ">{{Session::get('info')}}</div>
            @endif
            @if(Session::has('deactivated'))
            <div class="alert alert-danger">{!! session::get('deactivated') !!}</div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger session-alert">{{Session::get('error')}}</div>
            @endif
            @if($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger session-alert">{{$error}}</div>
            @endforeach
            @endif
            <div class="container">
                <div class="logo text-center">
                    <img class="mb-3 mt-5" src="Images/logo2.png" height="95">
                    <h2 class="display-7 fw-normal pb-3">Admin Login</h2>
                </div>
                <div class="form-group">
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                <use xlink:href="#mail" />
                            </svg></span>
                        <input type="email" name="adminEmail" class="form-control" value="{{old('adminEmail',Cookie::get('remember_email'))}}" placeholder="Email" required>
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                <use xlink:href="#lock" />
                            </svg></span>
                        <input type="password" name="adminPassword" class="form-control border-end-0" value="{{Cookie::get('remember_password')}}" placeholder="Password" id="password-input" required>
                         <span class="input-group-text border-start-0 bg-transparent" role="button" id="password-toggle">
                             <svg class="bi visible" width="20" height="20" fill="currentcolor" id="visibility-icon">
                                <use xlink:href="#invisible" />
                            </svg>
                        </span>
                    </div>
                    <div class="row row-cols-2 mb-3">
                        <div class="col-6 text-start">
                            <div class="form-check mb-3">
                                <input class="form-check-input border-1 border-black" type="checkbox" name="rememberCookie" {{ Cookie::get('remember_email') ? 'checked' : '' }} id="remember">
                                <label class="form-check-label" for="flexCheckDefault">
                                    &nbsp;Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <a class="link" href="{{route('password.request')}}">Forgot password?</a>
                        </div>
                    </div>
                    <button type="submit" class="lgn btn btn-lg btn-primary w-100 mb-5">Log In</button>
                </div>
            </div>
        </form>
    </div>
</main>
<script>
    setTimeout(function() {
        let alertElement = document.querySelector('.session-alert');
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
</script>
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
        transition: all 0.3s ease;
    }
    
    #password-toggle:hover{
        #visibility-icon{
        fill: #99CC99 !important;
        transition: all 0.3s ease;
        }
    }
</style>