@extends('layouts.master')
@section('content')

@php
$page="Subjects & Rates";
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="dropdown" viewBox="0 -960 960 960">
            <title>dropdown</title>
            <path d="M480-360 280-560h400L480-360Z" />
        </symbol>
        <symbol id="check" viewBox="0 0 16 16">
            <title>Check</title>
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
    </svg>
</head>
<div class="container-fluid px-4 py-5">
    <div class="sub container">
        <section class="mb-5">
            <h1 class="display-5 fw-normal text-shadow-1 text-center text-lg-center mb-5">Academic Tutorial Subjects</h1>
            <div class="row row-cols-lg-auto justify-content-lg-center justify-content-xxl-start gap-3 " id="subDropdowns">
                <!--looping-->

                <!--end of loop-->
            </div>
        </section>
        <section class="mt-5">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="pricing-header mx-auto text-center">
                        <h1 class="display-5 pricing-header fw-normal text-shadow-1">Tutorial Rates</h1>
                    </div>
                    <div class="row mb-3 text-center">
                        <div class="col-12 col-lg-6">
                            <div class="card mb-4 rounded-3 shadow-sm ">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Hourly Sessions</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><small class="text-muted fw-light">starts at</small><br><span id="hourMinRate"></span></h1><!--hourly lowest price-->
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>
                                            <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-0">
                                                <svg class="bi" width="15" height="15">
                                                    <use xlink:href="#check" />
                                                </svg>
                                                <p class="mb-0">
                                                    Focused on 1-2 subjects
                                                </p>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-0">
                                                <svg class="bi" width="15" height="15">
                                                    <use xlink:href="#check" />
                                                </svg>
                                                <p class="mb-0">
                                                    Booking 3 days
                                                </p>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-0">
                                                <svg class="bi" width="15" height="15">
                                                    <use xlink:href="#check" />
                                                </svg>
                                                <p class="mb-0">
                                                    Online or Face-To-Face
                                                </p>
                                            </span>
                                        </li>
                                        <li>&ensp;</li>
                                    </ul>
                                    <a href="{{route('signup.client')}}" type="button" class="w-100 btn btn-lg">Get started</a><!--sign up button-->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="prc card mb-4 rounded-3 shadow-sm border-primary ">
                                <div class="prc card-header py-3 text-white bg-primary border-primary">
                                    <h4 class="my-0 fw-normal">Monthly Sessions</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title"><small class="text-muted fw-light">starts at</small><br><span id="monthMinRate"></span></h1><!--monthly lowest price-->
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>
                                            <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-0">
                                                <svg class="bi" width="15" height="15">
                                                    <use xlink:href="#check" />
                                                </svg>
                                                <p class="mb-0">
                                                    20 hours
                                                </p>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-0">
                                                <svg class="bi" width="15" height="15">
                                                    <use xlink:href="#check" />
                                                </svg>
                                                <p class="mb-0">
                                                    4-5 weeks
                                                </p>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-0">
                                                <svg class="bi" width="15" height="15">
                                                    <use xlink:href="#check" />
                                                </svg>
                                                <p class="mb-0">
                                                    Covers all subjects
                                                </p>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="d-flex align-items-center justify-content-center justify-content-lg-start mb-0">
                                                <svg class="bi" width="15" height="15">
                                                    <use xlink:href="#check" />
                                                </svg>
                                                <p class="mb-0">
                                                    Online or Face-To-Face
                                                </p>
                                            </span>
                                        </li>
                                    </ul>
                                    <a href="{{route('signup.client')}}" type="button" class="w-100 btn btn-lg">Enroll now</a><!--sign up button-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="display-7 text-center mb-4">Rates Per Level</h2>
                    <div class="table-responsive">
                        <table class="table  w-100 text-center">
                            <thead>
                                <tr>
                                    <th style="width: 22%;"></th>
                                    <th style="width: 22%;">Hourly (Online)</th>
                                    <th style="width: 22%;">Monthly (Online)</th>
                                    <th style="width: 22%;">Hourly (F2F)</th>
                                    <th style="width: 22%;">Monthly (F2F)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-start">Pre-School/Kinder</th>
                                    <!--pre school kinder loop-->
                                    <td id="hour_ol_pk"></td><!--hourly online-->
                                    <td id="month_ol_pk"></td><!--monthly online-->
                                    <td id="hour_f2f_pk"></td><!--hourly f2f-->
                                    <td id="month_f2f_pk"></td><!--monthly f2f-->
                                    <!--end of loop-->
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">Grade 1-3</th>
                                    <!--grade 1-3 loop-->
                                    <td id="hour_ol_g1"></td><!--hourly online-->
                                    <td id="month_ol_g1"></td><!--monthly online-->
                                    <td id="hour_f2f_g1"></td><!--hourly f2f-->
                                    <td id="month_f2f_g1"></td><!--monthly f2f-->
                                    <!--end of loop-->
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">Grade 4-6</th>
                                    <!--grade 4-5 loop-->
                                    <td id="hour_ol_g4"></td><!--hourly online-->
                                    <td id="month_ol_g4"></td><!--monthly online-->
                                    <td id="hour_f2f_g4"></td><!--hourly f2f-->
                                    <td id="month_f2f_g4"></td><!--monthly f2f-->
                                    <!--end of loop-->
                                </tr>
                                <tr>
                                    <th scope="row" class="text-start">High School</th>
                                    <!--highschool loop-->
                                    <td id="hour_ol_hs"></td><!--hourly online-->
                                    <td id="month_ol_hs"></td><!--monthly online-->
                                    <td id="hour_f2f_hs"></td><!--hourly f2f-->
                                    <td id="month_f2f_hs"></td><!--monthly f2f-->
                                    <!--end of loop-->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        loadCMS();
    });
        function loadCMS() {
            $.ajax({
                type: "GET",
                url: "{{ route('guest.cms.load') }}",
                success: function(data) {
                    //console.log('data:', data);

                    if (data.success) {
                        buildSubjectDropdowns(data);
                        displayRatePHP(data);
                    }

                },
                error: function() {

                }
            });
        };

        function buildSubjectDropdowns(data) {
            var dropdownContainer = $('#subDropdowns');
            dropdownContainer.html('');

            $.each(data.subjects, function(index, subject) {
                let subjectID = subject.id;
                let subjectName = subject.subject;
                let subjectImg = subject.image;
                let dropdown = `
                                    <div class="col subjects"><!--english-->
                                        <div class=" collapsed card rounded-3 shadow-lg" id="subject-${subjectID}-card" data-bs-target="#subject${subjectID}" data-bs-toggle="collapse" style="width:400px; height:135px; cursor:pointer;">
                                            <div class="card-body subject-container text-white  overflow-hidden bg-dark rounded-3 d-flex justify-content-center align-items-center" style="background-image: url('${subjectImg}'); background-size: cover; background-position: center;">
                                                <h1 class="display-5 fw-bold d-flex align-items-center">
                                                    ${subjectName}
                                                    <svg class="dropdown-icon" width="50" height="50" fill="currentcolor">
                                                        <use xlink:href="#dropdown" />
                                                    </svg>
                                                </h1>
                                            </div>
                                        </div>
                                        <div id="subject${subjectID}" class="rounded-3 collapse" style="width:400px; height:200px;" data-bs-parent="#subject-${subjectID}-card">
                                            <div class="card bg-tertiary p-2">
                                                <ul class="list-group list-group-flush">
                                `;
                $.each(subject.year_levels, function(index, yearLevel) {
                    dropdown += `
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <svg class="dropdown-icon" width="20" height="20" fill="currentcolor">
                                                            <use xlink:href="#check" />
                                                        </svg>
                                                        ${yearLevel}
                                                    </li>
                                                `;
                });
                dropdown += `
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    `;

                // append the dropdown to the page
                dropdownContainer.append(dropdown);
            });

        }

        function displayRatePHP(data) {

            let hour_ol_pk = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_ol_pk);
            let month_ol_pk = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_ol_pk);
            let hour_f2f_pk = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_f2f_pk);
            let month_f2f_pk = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_f2f_pk);

            let hour_ol_g1 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_ol_g1);
            let month_ol_g1 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_ol_g1);
            let hour_f2f_g1 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_f2f_g1);
            let month_f2f_g1 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_f2f_g1);

            let hour_ol_g4 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_ol_g4);
            let month_ol_g4 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_ol_g4);
            let hour_f2f_g4 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_f2f_g4);
            let month_f2f_g4 = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_f2f_g4);

            let hour_ol_hs = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_ol_hs);
            let month_ol_hs = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_ol_hs);
            let hour_f2f_hs = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.hourly_f2f_hs);
            let month_f2f_hs = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(data.rates.monthly_f2f_hs);

            $('#hourMinRate').html(hour_ol_pk);
            $('#monthMinRate').html(month_ol_pk);

            $('#hour_ol_pk').html(hour_ol_pk);
            $('#month_ol_pk').html(month_ol_pk);
            $('#hour_f2f_pk').html(hour_f2f_pk);
            $('#month_f2f_pk').html(month_f2f_pk);

            $('#hour_ol_g1').html(hour_ol_g1);
            $('#month_ol_g1').html(month_ol_g1);
            $('#hour_f2f_g1').html(hour_f2f_g1);
            $('#month_f2f_g1').html(month_f2f_g1);

            $('#hour_ol_g4').html(hour_ol_g4);
            $('#month_ol_g4').html(month_ol_g4);
            $('#hour_f2f_g4').html(hour_f2f_g4);
            $('#month_f2f_g4').html(month_f2f_g4);

            $('#hour_ol_hs').html(hour_ol_hs);
            $('#month_ol_hs').html(month_ol_hs);
            $('#hour_f2f_hs').html(hour_f2f_hs);
            $('#month_f2f_hs').html(month_f2f_hs);


        }

</script>

</html>
@endsection


<style>
    .sub {
        font-family: Arial, Helvetica, sans-serif;
    }

    .prc.card {
        border-color: #759C75 !important;
    }

    .prc.card-header {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
    }

    .btn-lg {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        color: white !important;
    }

    .btn-lg:hover {
        border-color: #99CC99 !important;
        background-color: #99CC99 !important;
        color: black !important;
        transition: all 0.3s ease;
    }

    .collapsed:hover {
        border-color: #99CC99 !important;
        transition: all 0.3s ease-in-out;
    }

    .collapse {
        transition: all 0.3s ease !important;
        overflow: visible;
    }

    .collapsing {
        transition: all 0.3s ease !important;
    }

    .collapse.collapsing {
        transition: all 0.3s ease !important;
        overflow: hidden;
        height: 0;
    }

    .collapsed[data-bs-toggle="collapse"] .dropdown-icon {
        transform: rotate(0) !important;
        transition: all .2s ease-out !important;
    }

    :not(.collapsed)[data-bs-toggle="collapse"] .dropdown-icon {
        transform: rotate(-180deg) !important;
        transition: all .2s ease-out !important;
    }

    .collapsed[data-bs-toggle="collapse"] .card-body {
        color: unset;
        transition: all .2s ease-out !important;
    }

    :not(.collapsed)[data-bs-toggle="collapse"] .card-body {
        color: #99CC99 !important;
        transition: all .2s ease-out !important;
    }

    @media only screen and (max-width:1000px) {
        .subjects {
            display: flex !important;
            align-items: center !important;
            flex-direction: column !important;
        }
    }

    .subject-container {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        /* adjust the opacity value to your liking */
    }

    .text-white {
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
    }
</style>