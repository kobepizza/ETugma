@extends('layouts.signmaster')
@section('content')

@php
$page="Education Level";
@endphp

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="parent" viewBox="0 -960 960 960">
            <title>parent</title>
            <path d="M680-360q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM480-160v-56q0-24 12.5-44.5T528-290q36-15 74.5-22.5T680-320q39 0 77.5 7.5T832-290q23 9 35.5 29.5T880-216v56H480Zm-80-320q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-160ZM80-160v-112q0-34 17-62.5t47-43.5q60-30 124.5-46T400-440q35 0 70 6t70 14l-34 34-34 34q-18-5-36-6.5t-36-1.5q-58 0-113.5 14T180-306q-10 5-15 14t-5 20v32h240v80H80Zm320-80Zm0-320q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Z" />
        </symbol>
        <symbol id="tutor" viewBox="0 -960 960 960">
            <title>tutor</title>
            <path d="M820-300q-25 0-42.5-17.5T760-360v-100q0-25 17.5-42.5T820-520q25 0 42.5 17.5T880-460v100q0 25-17.5 42.5T820-300Zm-20 140v-62q-51-8-85.5-46.5T680-360h40q0 42 29 71t71 29q42 0 71-29t29-71h40q0 53-34.5 91.5T840-222v62h-40ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q14 0 27.5 2t26.5 7q-26 31-40 69.5T360-640q0 43 14 81.5t40 69.5q-13 5-26.5 7t-27.5 2ZM40-160v-111q0-34 17-63t47-44q38-20 82.5-34.5T284-435q-40 28-62 71t-22 93v111H40Zm560-320q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-80q33 0 56.5-23.5T680-640q0-33-23.5-56.5T600-720q-33 0-56.5 23.5T520-640q0 33 23.5 56.5T600-560ZM280-160v-111q0-34 17-63t47-44q51-26 115.5-44T600-440q12 0 23.5.5T646-438q-10 18-16.5 37.5T621-360h-21q-72 0-127.5 18T381-306q-10 5-15.5 14.5T360-271v31h287q15 26 37 46t49 34H280Zm320-480Zm0 400Z" />
        </symbol>
        <symbol id="check" viewBox="0 -960 960 960">
            <title>check</title>
            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
        </symbol>
        <symbol id="yearlvl" viewBox="0 -960 960 960">
            <title>year level</title>
            <path d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z" />
        </symbol>
        <symbol id="bag" viewBox="0 -960 960 960">
            <title>bag</title>
            <path d="M280-80q-33 0-56.5-23.5T200-160v-320q0-85 44.5-152T360-732v-28q0-50 35-85t85-35q50 0 85 35t35 85v28q71 33 115.5 100T760-480v320q0 33-23.5 56.5T680-80H280Zm0-80h400v-320q0-83-58.5-141.5T480-680q-83 0-141.5 58.5T280-480v320Zm320-160q17 0 28.5-11.5T640-360v-120H320v80h240v40q0 17 11.5 28.5T600-320ZM440-756q11-2 20-3t20-1q11 0 20 1t20 3v-4q0-17-11.5-28.5T480-800q-17 0-28.5 11.5T440-760v4ZM280-160h400-400Z" />
        </symbol>
    </svg>
</head>

<body class="main" style="overflow:auto;">
    <div class="container py-5 mb-3">
        <form id="choiceForm" method="get">
            @csrf
            <section>
                <div class="row justify-content-center gap-5 py-2">
                    <h1 class="display-3 fw-bold text-center">Select your educational level</h1>
                    <div class="col-10 col-md-4 text-center d-flex align-items-center  justify-content-center choice " id="underChoice" style="cursor: pointer;">
                        <div>
                            <svg id="parent-icon" class="" height="75" width="75">
                                <use xlink:href="#bag" />
                            </svg>

                            <h3 style="font-size: 30px">I'm an undergraduate</h3>
                        </div>
                    </div>

                    <div class="col-10 col-md-4 text-center d-flex align-items-center justify-content-center choice" id="gradChoice" style="cursor: pointer;">
                        <div>
                            <svg id="tutor-icon" class="" height="75" width="75">
                                <use xlink:href="#yearlvl" />
                            </svg>
                            <h3 style="font-size: 30px">I'm a college graduate</h3>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" id="getstarted" class="btn btn-primary btn-lg mb-3">Proceed</button>
                        <h5>Already have an account?<a href="{{route('login')}}" class="text-decoration-none" id="link"> Login</a></h5>
                    </div>
                </div>
            </section>
        </form>
    </div>
</body>
@endsection
<style>
    #underChoice,
    #gradChoice {
        border-radius: 50px;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 0;
        padding-bottom: 0;
        height: 250px;
        border: 2px solid #707070;

    }

    div #underChoice:hover {
        border: 3px solid #759C75;
        color: #759C75;

        #parent-icon {
            fill: #759C75 !important;
        }

    }

    div #gradChoice:hover {
        border: 3px solid #759C75;
        color: #759C75;

        #tutor-icon {
            fill: #759C75 !important;
        }
    }

    #gradChoice.active {
        border: 3px solid #759C75;
        color: #759C75;

        #tutor-icon {
            fill: #759C75 !important;
        }
    }

    #underChoice.active {
        border: 3px solid #759C75;
        color: #759C75;

        #parent-icon {
            fill: #759C75 !important;
        }
    }

    #link {
        color: #759C75;
        transition: all 0.3s ease;
    }

    #link:hover {
        color: #99CC99;
    }

    .choice {
        position: relative;
    }


    .choice::before {
        content: '';
        position: absolute;
        top: 20px;
        /* Adjust as needed */
        right: 20px;
        /* Adjust as needed */
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: transparent;
        border: 2px solid #759C75;
        transition: all 0.3s ease;

    }

    .selected::before {
        background-color: #759C75;
    }

    #getstarted {
        border: 2px solid #759C75;
        background-color: #759C75;
        color: white;
        border-radius: 80px;
        font-size: 25px;
        padding: 10px 60px;
        transition: all 0.3s ease;
    }

    #getstarted:hover {
        background-color: #99CC99;
        color: black;
        border-color: #99CC99;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const underChoice = document.getElementById("underChoice");
        const gradChoice = document.getElementById("gradChoice");

        // Function to handle the click event for parent choice
        underChoice.addEventListener("click", function() {
            underChoice.classList.add("selected");
            gradChoice.classList.remove("selected");
        });

        // Function to handle the click event for tutor choice
        gradChoice.addEventListener("click", function() {
            gradChoice.classList.add("selected");
            underChoice.classList.remove("selected");
        });

        document.getElementById("getstarted").addEventListener("click", function() {
            if (underChoice.classList.contains("selected")) {
                choiceForm.action = "{{ route('signup.undertutor') }}";
            } else if (gradChoice.classList.contains("selected")) {
                choiceForm.action = "{{ route('signup.gradtutor') }}";
            }
            choiceForm.submit();
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        const underChoiceElement = document.getElementById('underChoice');
        const gradChoiceElement = document.getElementById('gradChoice');

        underChoiceElement.addEventListener('click', function() {
            if (underChoiceElement.classList.contains('active')) {
                return;
            }
            clearActiveChoice();
            underChoiceElement.classList.add('active');
        });

        gradChoiceElement.addEventListener('click', function() {
            if (gradChoiceElement.classList.contains('active')) {
                return;
            }
            clearActiveChoice();
            gradChoiceElement.classList.add('active');
        });

        function clearActiveChoice() {
            underChoiceElement.classList.remove('active');
            gradChoiceElement.classList.remove('active');
        }
    });
</script>