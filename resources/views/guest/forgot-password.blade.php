@extends('layouts.signmaster')
@section('content')


@php
$page= 'Forgot Password';
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
    </svg>
</head>

<body>
    <main class="login container growable-flex mt-5 mb-5 p-5">
        <div class="container col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-4 py-4 border border-1 shadow-lg" style="border-radius:30px;">

            <form action="{{route('password.request')}}" method="post">
                @if(Session::has('status'))
                <div class="alert alert-success session-alert">{{Session::get('status')}}</div>
                @endif
                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger session-alert">{{$error}}</div>
                @endforeach
                @endif
                @csrf
                <div class="container">
                    <div class="logo text-center">
                        <img class="mb-3 mt-5" src="Images/logo2.png" height="95">
                        <h4 class="display-7 fw-normal pb-3">Request a Password Reset</h4>
                        <h6 class="d fw-normal pb-3">Enter your email address and we'll send you a reset link.</h6>
                    </div>
                    <div class="form-group">
                        <label class="d-flex align-items-center">
                            <h7>Email Address</h7><span style="color:red;">*</span>
                        </label>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping"><svg class="bi" width="20" height="20">
                                    <use xlink:href="#mail" />
                                </svg></span>
                            <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <button type="submit" class="lgn btn btn-lg btn-primary w-100 mb-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
<script>
    setTimeout(function() {
        let alertElement = document.querySelector('.session-alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 3000); // The alert will disappear after 3 seconds
</script>
@endsection
<style>
    .login {
        font-family: Arial, Helvetica, sans-serif;
        height: 68vh;
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
</style>