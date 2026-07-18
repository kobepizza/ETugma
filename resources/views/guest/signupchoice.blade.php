@extends('layouts.signmaster')
@section('content')

@php
$page="Join";
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
    </svg>
</head>

<body class="main" style="overflow:auto;">
    <div class="container py-5 mb-3">
        <form id="choiceForm" method="get">
            @csrf
            <section>
                <div class="row justify-content-center gap-5 py-2">
                    <h1 class="display-3 fw-bold text-center">Join as a parent or tutor</h1>
                    <div class="col-10 col-md-4 text-center d-flex align-items-center  justify-content-center choice " id="parentChoice" style="cursor: pointer;">
                        <div>
                            <svg id="parent-icon" class="" height="75" width="75">
                                <use xlink:href="#parent" />
                            </svg>

                            <h3 style="font-size: 30px">I'm a parent, looking for a tutor</h3>
                        </div>
                    </div>

                    <div class="col-10 col-md-4 text-center d-flex align-items-center justify-content-center choice" id="tutorChoice" style="cursor: pointer;">
                        <div>
                            <svg id="tutor-icon" class="" height="75" width="75">
                                <use xlink:href="#tutor" />
                            </svg>
                            <h3 style="font-size: 30px">I'm a tutor, looking for a client/student</h3>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" id="getstarted" class="btn btn-primary btn-lg mb-3">Get Started</button>
                        <h5>Already have an account?<a href="{{route('login')}}" class="text-decoration-none" id="link"> Login</a></h5>
                    </div>
                </div>
            </section>
        </form>
    </div>
</body>
@endsection
<style>
    #parentchoice,
    #tutorchoice {
        border-radius: 50px;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 0;
        padding-bottom: 0;
        height: 250px;
        border: 2px solid #707070
    }

    div #parentchoice:hover {
        border: 3px solid #759C75;
        color: #759C75;

        #parent-icon {
            fill: #759C75 !important;
        }

    }

    div #tutorchoice:hover {
        border: 3px solid #759C75;
        color: #759C75;

        #tutor-icon {
            fill: #759C75 !important;
        }
    }

    #tutorchoice.active {
        border: 3px solid #759C75;
        color: #759C75;

        #tutor-icon {
            fill: #759C75 !important;
        }
    }

    #parentchoice.active {
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
        const parentChoice = document.getElementById("parentChoice");
        const tutorChoice = document.getElementById("tutorChoice");

        // Function to handle the click event for parent choice
        parentChoice.addEventListener("click", function() {
            parentChoice.classList.add("selected");
            tutorChoice.classList.remove("selected");
        });

        // Function to handle the click event for tutor choice
        tutorChoice.addEventListener("click", function() {
            tutorChoice.classList.add("selected");
            parentChoice.classList.remove("selected");
        });

        document.getElementById("getstarted").addEventListener("click", function() {
            if (parentChoice.classList.contains("selected")) {
                choiceForm.action = "{{ route('signup.client') }}";
            } else if (tutorChoice.classList.contains("selected")) {
                choiceForm.action = "{{ route('grad.choice') }}";
            }
            choiceForm.submit();
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        const parentChoiceElement = document.getElementById('parentChoice');
        const tutorChoiceElement = document.getElementById('tutorChoice');

        parentChoiceElement.addEventListener('click', function() {
            if (parentChoiceElement.classList.contains('active')) {
                return;
            }
            clearActiveChoice();
            parentChoiceElement.classList.add('active');
        });

        tutorChoiceElement.addEventListener('click', function() {
            if (tutorChoiceElement.classList.contains('active')) {
                return;
            }
            clearActiveChoice();
            tutorChoiceElement.classList.add('active');
        });

        function clearActiveChoice() {
            parentChoiceElement.classList.remove('active');
            tutorChoiceElement.classList.remove('active');
        }
    });
</script>