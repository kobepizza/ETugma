@extends('layouts.master')
@section('content')

@php
$page="Home";

@endphp

<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="arrow-left" viewBox="0 -960 960 960">
            <title>arrow left</title>
            <path d="m480-320 56-56-64-64h168v-80H472l64-64-56-56-160 160 160 160Zm0 240q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="arrow-right" viewBox="0 -960 960 960">
            <title>arrow right</title>
            <path d="m480-320 160-160-160-160-56 56 64 64H320v80h168l-64 64 56 56Zm0 240q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="logo" viewBox="0 -960 960 960">
            <title>math logo</title>
            <path d="M320-240h60v-80h80v-60h-80v-80h-60v80h-80v60h80v80Zm200-30h200v-60H520v60Zm0-100h200v-60H520v60Zm44-152 56-56 56 56 42-42-56-58 56-56-42-42-56 56-56-56-42 42 56 56-56 58 42 42Zm-314-70h200v-60H250v60Zm-50 472q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
        </symbol>
        <symbol id="check" viewBox="0 0 16 16">
            <title>Check</title>
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="medal" viewBox="0 -960 960 960">
            <title>medal</title>
            <path d="M480-160q75 0 127.5-52.5T660-340q0-75-52.5-127.5T480-520q-75 0-127.5 52.5T300-340q0 75 52.5 127.5T480-160ZM363-572q20-11 42.5-17.5T451-598L350-800H250l113 228Zm234 0 114-228H610l-85 170 19 38q14 4 27 8.5t26 11.5ZM256-208q-17-29-26.5-62.5T220-340q0-36 9.5-69.5T256-472q-42 14-69 49.5T160-340q0 47 27 82.5t69 49.5Zm448 0q42-14 69-49.5t27-82.5q0-47-27-82.5T704-472q17 29 26.5 62.5T740-340q0 36-9.5 69.5T704-208ZM480-80q-40 0-76.5-11.5T336-123q-9 2-18 2.5t-19 .5q-91 0-155-64T80-339q0-87 58-149t143-69L120-880h280l80 160 80-160h280L680-559q85 8 142.5 70T880-340q0 92-64 156t-156 64q-9 0-18.5-.5T623-123q-31 20-67 31.5T480-80Zm0-260ZM363-572 250-800l113 228Zm234 0 114-228-114 228ZM406-230l28-91-74-53h91l29-96 29 96h91l-74 53 28 91-74-56-74 56Z" />
        </symbol>
        <symbol id="trophy" viewBox="0 -960 960 960">
            <title>trophy</title>
            <path d="M280-120v-80h160v-124q-49-11-87.5-41.5T296-442q-75-9-125.5-65.5T120-640v-40q0-33 23.5-56.5T200-760h80v-80h400v80h80q33 0 56.5 23.5T840-680v40q0 76-50.5 132.5T664-442q-18 46-56.5 76.5T520-324v124h160v80H280Zm0-408v-152h-80v40q0 38 22 68.5t58 43.5Zm200 128q50 0 85-35t35-85v-240H360v240q0 50 35 85t85 35Zm200-128q36-13 58-43.5t22-68.5v-40h-80v152Zm-200-52Z" />
        </symbol>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" style="display:none;">
        <symbol id="external" viewBox="0 0 16 16">
            <title>external link</title>
            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
        </symbol>
    </svg>
</head>

<!-- AD MODAL -->
<div class="modal fade" id="adModal" tabindex="-1" aria-labelledby="adModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header p-2">
                <div class="form-check p-0 ms-auto">
                    <input class="form-check-input border-1 border-black" type="checkbox" id="dontShowAgainCheckbox">
                    <label class="form-check-label" for="dontShowAgainCheckbox">
                        Don't show this again
                    </label>
                </div>
                <button type="button" class="btn-close ms-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body border-0 p-0">

                <div id="advertismentCarousel" class="carousel slide " data-bs-ride="false">
                    <div class="carousel-indicators" id="adsIndicators">

                    </div>
                    <div class="carousel-inner" id="adsBody">

                    </div>
                    <button class="carousel-control-prev ads-control" type="button" data-bs-target="#advertismentCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next ads-control" type="button" data-bs-target="#advertismentCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>

            </div>
            <div class="modal-footer p-2">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <span>
                        <p class="fst-italic mb-0">&copy; 2024 ETugma.</p>
                        <p class="fst-italic mb-0">All rights reserved.</p>
                    </span>
                    <button class="btn btn-view" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!---->

<body class="home">
    <section class="py-4 mt-5 main">
        <div class="container">
            <div class="row row-cols-2">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-2 order-lg-1">
                    <div class="landing mt-5">
                        <h1 class="display-1 lh-1">Scribbles and Schemes Early Childhood Center</h1>
                        <h2 class="display-7 lh-1" id="tagline"></h2><!--CMS TAGLINE-->
                        <a href="{{route('choice')}}" type="button" id="getstarted" class="btn btn-outline btn-lg mb-3">Get Started</a><!--sign up button-->
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-1 order-lg-2">
                    <img src="" id="taglineIMG" class=" img-fluid rounded-5"><!--CMS TAGLINE IMAGE-->
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 main">
        <div id="carouselExampleInterval" class="carousel slide col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 h-50" data-bs-ride="true">
            <div class="carousel-inner" id="carousel" style="background-color:#759C75">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="float-start d-flex align-items-center justify-content-center w-50 h-100">
                        <div class="d-none d-md-block text-center">
                            <h1 class="display-5 carousel-text">WHY</h1>
                            <h1 class="display-1 carousel-text">SCRIBBLES</h1>
                            <h1 class="display-1 carousel-text"><span style="font-size:xx-large">& </span>SCHEMES</h1>
                            <a href="{{route('about')}}" type="button" id="carousel-btn" class="btn btn-outline-primary btn-lg">Learn More</a> <!--about page button-->
                        </div>
                        <div class="d-block d-md-none text-center">
                            <h1 class="display-7 carousel-text">WHY</h1>
                            <h1 class="display-5 carousel-text">SCRIBBLES</h1>
                            <h1 class="display-5 carousel-text"><span style="font-size:xx-large">& </span>SCHEMES</h1>
                            <a href="{{route('about')}}" type="button" id="carousel-btn" class="btn btn-outline-primary btn">Learn More</a> <!--about page button-->
                        </div>
                    </div>
                    <div>
                        <img src="" style="object-fit:cover; object-position:100% 20%;" class="img fluid d-block h-100 w-50 float-end" alt="carousel 1 image" id="carousel1IMG"> <!--CMS carousel1 image -->
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="" style="object-fit:cover; object-position:center" class=" img-fluid d-block w-100 h-100" alt="carousel 2 image" id="carousel2IMG"> <!--CMS carousel2 image -->
                    <div class="carousel-caption">
                        <h1 class="display-1 carousel-text">EXPLORE OUR PROGRAMS</h1>
                        <a href="{{route('program')}}" type="button" id="carousel-btn2" class="btn btn-outline-primary btn-lg">Our Programs</a>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="" style="object-fit:cover; object-position:100% 13%;" class=" img-fluid d-block w-50 h-100 float-start" alt="carousel 3 image" id="carousel3IMG"> <!--CMS carousel3 image -->
                    <div class="float-end d-flex align-items-center justify-content-center w-50 h-100">
                        <div class="d-none d-md-block text-center">
                            <h1 class="display-5 carousel-text">FIND</h1>
                            <h1 class="display-1 carousel-text">YOUR IDEAL</h1>
                            <h1 class="display-1 carousel-text">TUTOR</h1>
                            <a href="{{route('signup.client')}}" type="button" id="carousel-btn" class="btn btn-outline-primary btn-lg">Get Started</a>
                        </div>
                        <div class="d-block d-md-none text-center">
                            <h1 class="display-7 carousel-text">FIND</h1>
                            <h1 class="display-5 carousel-text">YOUR IDEAL</h1>
                            <h1 class="display-5 carousel-text">TUTOR</h1>
                            <a href="{{route('signup.client')}}" type="button" id="carousel-btn" class="btn btn-outline-primary btn">Get Started</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="py-4 mb-5 d-none d-md-flex align-items-center justify-content-center"> <!--partners large-->
        <div class="container">
            <h1 class="pb-4"> In Partnership With</h1>
            <div class="wrapper" data-bs-ride="carousel">
                <svg class="controls" id="left">
                    <use xlink:href="#arrow-left" />
                </svg>
                <ul class="carousels p-3">
                    <li class="partner-card rounded-5" style="background-color:#5A6F8C;"><!--SAM-->
                        <div class="d-flex flex-column p-3 gap-5">
                            <div class="top-half">
                                <div class="vstack gap-2">
                                    <a href="https://seriouslyaddictivemaths.com.sg/?fbclid=IwZXh0bgNhZW0CMTEAAR0QZS8xQ2yL78TH542aPMtyjOVs0qtxzt2YSF7ysk8G9GefDrZS9RXHuag_aem_5Ff8ypTMan4jETCkdt7wLA" target="_blank">
                                        <img src="Images/sam.png" height="100" width="250" alt="SAM"><!--SAM logo-->
                                    </a>
                                    <h4 class="partner-text lh-sm"><!--SAM description-->
                                        S.A.M, or Seriously Addictive Mathematics, is a Mathematics Learning Program from Singapore, with a unique Mathematics curriculum designed for students from 4 to 12 years of age.
                                    </h4>
                                </div>
                            </div>
                            <div class="bottom-half"><!--SAM achievements-->
                                <div class="vstack gap-1">
                                    <hr class="border-2 border-white opacity-100">
                                    <div class="d-flex flex-column">
                                        <div class="col-md-12">
                                            <div class="vstack gap-1 text-center align-items-center">
                                                <svg class="partner-icons">
                                                    <use xlink:href="#trophy" />
                                                </svg>
                                                <p class="partner-text fw-semibold">
                                                    Recognized as one of the most successful in the world, according to the TIMSS survey since 1995.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="vstack gap-1 text-center align-items-center">
                                                <svg class="partner-icons">
                                                    <use xlink:href="#medal" />
                                                </svg>
                                                <p class="partner-text fw-semibold">
                                                    10+Years | 20+ Countries | 30,000+ Students
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="partner-card rounded-5" style="background-color:#69983A;"><!--peonz-->
                        <div class="d-flex flex-column p-3 gap-5">
                            <div class="top-half">
                                <div class="vstack gap-2">
                                    <a href="https://peonz.tech/" target="_blank">
                                        <img src="Images/peonz.png" height="100" width="250" alt="PEONZ"><!--peonz logo-->
                                    </a>
                                    <h4 class="partner-text lh-sm"><!--peonz description-->
                                        PeOnz is an educational consultancy group providing Mathematics and Robotics programs to schools and learning centers with kids as young as 5 years old.
                                    </h4>
                                </div>
                            </div>
                            <div class="bottom-half"><!--peonz achievements-->
                                <div class="vstack gap-1">
                                    <hr class="border-2 border-white opacity-100">
                                    <div class="d-flex flex-column">
                                        <div class="col-md-12">
                                            <div class="vstack gap-1 text-center align-items-center">
                                                <svg class="partner-icons">
                                                    <use xlink:href="#trophy" />
                                                </svg>
                                                <p class="partner-text fw-semibold">
                                                    Recognized as, the most affordable, comprehensive and reliable partner of educational facilities for mathematics and robotics learning for children.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="vstack gap-1 text-center align-items-center">
                                                <svg class="partner-icons">
                                                    <use xlink:href="#medal" />
                                                </svg>
                                                <p class="partner-text fw-semibold">
                                                    9 Years | Over 15,000 Students | 25 Diverse Courses
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="partner-card rounded-5" style="background-color:#6D2FE9;"><!--instant reader-->
                        <div class="d-flex flex-column p-3 gap-5">
                            <div class="top-half">
                                <div class="vstack gap-2">
                                    <a href="https://readin20-days.com/?fbclid=IwZXh0bgNhZW0CMTEAAR1kgDOPovAIixXb8LcYfwAZc--rWqV7mgvEf6edyzArCojQik6On3Qs9qg_aem_uljjTRVbhwddX-SeAj7U0w" target="_blank">
                                        <img src="Images/reader.png" height="100" width="250" alt="PEONZ"><!--instant reader logo-->
                                    </a>
                                    <h4 class="partner-text lh-sm"><!--instant reader description-->
                                        Instant Reader aims to reach the widest number of kids possible and expose them to the life-changing benefits of being able to read and understand what they are reading.
                                    </h4>
                                </div>
                            </div>
                            <div class="bottom-half"><!--instant reader achievements-->
                                <div class="vstack gap-1">
                                    <hr class="border-2 border-white opacity-100">
                                    <div class="d-flex flex-column">
                                        <div class="col-md-12">
                                            <div class="vstack gap-1 text-center align-items-center">
                                                <svg class="partner-icons">
                                                    <use xlink:href="#trophy" />
                                                </svg>
                                                <p class="partner-text fw-semibold">
                                                    Recognized for its use of artificial intelligence in summarizing and enhancing reading efficiency by Tech Innovation Council 2023
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="vstack gap-1 text-center align-items-center">
                                                <svg class="partner-icons">
                                                    <use xlink:href="#medal" />
                                                </svg>
                                                <p class="partner-text fw-semibold">
                                                    19 Years of Experience | 20,000 Happy Students
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <svg class="controls" id="right">
                    <use xlink:href="#arrow-right" />
                </svg>
            </div>
        </div>
    </section>
    <section class="p-4 mb-5 d-md-none"><!--partners small-->
        <h1 class="text-center pb-4"> In Partnership With</h1>
        <div class="d-flex flex-column align-items-center gap-3">
            <div class="col">
                <a href="https://seriouslyaddictivemaths.com.sg/?fbclid=IwZXh0bgNhZW0CMTEAAR0QZS8xQ2yL78TH542aPMtyjOVs0qtxzt2YSF7ysk8G9GefDrZS9RXHuag_aem_5Ff8ypTMan4jETCkdt7wLA" target="_blank">
                    <img class="partner-logo" src="Images/sam.png" height="100" alt="SAM"><!--SAM logo-->
                </a>
            </div>
            <div class="col">
                <a href="https://peonz.tech/" target="_blank">
                    <img class="partner-logo" src="Images/peonz.png" height="100" alt="PEONZ"><!--peonz logo-->
                </a>
            </div>
            <div class="col">
                <a href="https://readin20-days.com/?fbclid=IwZXh0bgNhZW0CMTEAAR1kgDOPovAIixXb8LcYfwAZc--rWqV7mgvEf6edyzArCojQik6On3Qs9qg_aem_uljjTRVbhwddX-SeAj7U0w" target="_blank">
                    <img class="partner-logo" src="Images/reader.png" height="100" alt="READER"><!--reader logo-->
                </a>
            </div>
        </div>
    </section>
</body>
<script>
    //onload function
    $(document).ready(function() {
        loadCMS();
        partnerCarousel();
        loadAdvertisements();
    });

    function loadCMS() {
        $.ajax({
            type: "GET",
            url: "{{ route('guest.cms.load') }}",
            success: function(data) {
                //console.log('data:', data);
                if (data.success) {
                    buildHomePage(data);
                }

            },
            error: function() {

            }
        });
    };

    function buildHomePage(data) {
        let homeIMG = data.cms.tagline_img;
        let carousel1IMG = data.cms.carousel1;
        let carousel2IMG = data.cms.carousel2;
        let carousel3IMG = data.cms.carousel3;
        let tagline = data.cms.tagline_txt;

        let aboutIMG = data.cms.about_img;
        let aboutTEXT = data.cms.about_txt;
        let tutorialIMG = data.cms.tutorial_img;
        let tutorialTEXT = data.cms.tutorial_txt;

        //console.log(aboutTEXT);
        $('#taglineIMG').attr('src', homeIMG);
        $('#carousel1IMG').attr('src', carousel1IMG);
        $('#carousel2IMG').attr('src', carousel2IMG);
        $('#carousel3IMG').attr('src', carousel3IMG);
        $('#tagline').text(tagline);

        $('#aboutIMG').attr('src', aboutIMG);
        $('#aboutTEXT').val(aboutTEXT);
        $('#tutorialIMG').attr('src', tutorialIMG);
        $('#tutorialTEXT').val(tutorialTEXT);
    }

    function loadAdvertisements() {
        $.ajax({
            type: "GET",
            url: "{{ route('guest.ads.load') }}",
            success: function(data) {
                //console.log('data:', data);
                openAdModal(data);
                buildAdvertisements(data);
            }
        })
    }

    function buildAdvertisements(data) {
        let adsBody = $('#adsBody');
        let adsButton = $('#adsIndicators');
        let adsControl = $('.ads-control');

        adsBody.empty();
        adsButton.empty();

        let count = data.length;

        //console.log('number of ads:', count);

        $.each(data, function(index, item) {
            let image = item.image;


            let adIndicator = `
                <button type="button" data-bs-target="#advertismentCarousel" data-bs-slide-to="${index}" class="ads-indicators ${index == 0 ? 'active' : ''}" aria-current="true" aria-label="Slide ${index + 1}"></button>
            `;
            adsButton.append(adIndicator);

            let adItem = `
                <div class="carousel-item ${index == 0 ? 'active' : ''}">
                    <img src="${image}" style="object-fit:cover; object-position:center" class="img-fluid d-block w-100 h-100" alt="Advertisement ${index + 1}">
                </div>
            `;
            adsBody.append(adItem);

        });

        if (count > 1) {
            adsControl.removeClass('d-none');
            adsButton.removeClass('d-none');
        } else {
            adsControl.addClass('d-none');
            adsButton.addClass('d-none');
        }

    }

    // Ads modal Script

    function openAdModal(data) {
        let adsCount = data.length;

        if (!getCookie('hideAdModal')) {
            if (!adsCount) {
                jQuery('#adModal').modal('hide');
            } else {
                jQuery('#adModal').modal('show');
            }
            jQuery('#dontShowAgainCheckbox').on('change', function() {
                if ($(this).is(':checked')) {
                    setCookie('hideAdModal', true, 1); 
                } else {
                    deleteCookie('hideAdModal'); 
                }
            });
        }

    }

    // Don't show this again cookie
    function setCookie(cname, cvalue, exdays = 1) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function deleteCookie(cname) {
        setCookie(cname, '', -1); // set the cookie to expire immediately
    }

    function partnerCarousel() {
        const carousels = document.querySelector(".carousels");
        const arrowBtns = document.querySelectorAll(".wrapper svg");
        const firstCardWidth = carousels.querySelector(".partner-card").offsetWidth;
        const carouselsChildrens = [...carousels.children];

        let isDragging = false,
            startX, startScrollingLeft;

        //Get the number of cards that can fit in the carousel at once
        let cardPerView = Math.round(carousels.offsetWidth / firstCardWidth);

        //Insert copies of the last few cards to beginning of carousel for infinite scrolling
        carouselsChildrens.slice(-cardPerView).reverse().forEach(card => {
            carousels.insertAdjacentHTML("afterbegin", card.outerHTML);
        });

        //Insert copies of the first few cards to end of carousel for infinite scrolling
        carouselsChildrens.slice(0, cardPerView).forEach(card => {
            carousels.insertAdjacentHTML("beforeend", card.outerHTML);
        });

        //add event listeners for the arraow buttons to scroll the carousel left and right
        arrowBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                if (btn.id === "left") {
                    carousels.scrollLeft -= firstCardWidth;
                } else {
                    carousels.scrollLeft += firstCardWidth;
                }
            });
        });
        const dragStart = () => {
            isDragging = true;
            carousels.classList.add("dragging");
            //Records the initial position of the mouse when starting to drag
            startX = event.pageX;
            startScrollingLeft = carousels.scrollLeft;
        }

        const dragging = (event) => {
            if (!isDragging) return; // if Dragging is false return from here
            //update the scroll position of the carousel based on the cursor movement
            const delta = event.pageX - startX;
            carousels.scrollLeft = startScrollingLeft - delta;
        }

        const dragStop = () => {
            isDragging = false;
            carousels.classList.remove("dragging");
        }

        const infiniteScroll = () => {
            const threshold = 1;
            if (carousels.scrollLeft === 10) {
                carousels.classList.add("no-transition");
                carousels.scrollLeft = carousels.scrollWidth - (2 * carousels.offsetWidth);
                carousels.classList.remove("no-transition");
            } else if (carousels.scrollLeft >= carousels.scrollWidth - carousels.offsetWidth - threshold) {
                // Scroll to the beginning of the carousel
                carousels.classList.add("no-transition");
                carousels.scrollLeft = carousels.offsetWidth;
                carousels.classList.remove("no-transition");
            }
        }
        carousels.addEventListener("mousedown", dragStart);
        carousels.addEventListener("mousemove", dragging);
        document.addEventListener("mouseup", dragStop);
        carousels.addEventListener("scroll", infiniteScroll);
    }
</script>




</html>
@endsection
<style>
    .main {
        font-family: 'Times New Roman', Times, serif;
    }

    .home {
        font-family: Arial, Helvetica, sans-serif;
    }

    .ads-indicators {
        background-color: #848884 !important;
    }

    .ads-indicators.active {
        background-color: #71797E !important;
    }

    #getstarted {
        margin-top: 15px;
        font-size: x-large;
        border-radius: 50px;
        color: white;
        background-color: #759C75;
        border-color: #759C75;
        width: 250px;
        transition: all 0.3s ease;
    }

    #getstarted:hover {
        border-color: #99CC99;
        background-color: #99CC99;
        color: black;
    }

    .item1 {
        background-color: #759C75;
    }

    .carousel-item {
        transition: -webkit-transform 1.5s ease !important;
        transition: transform 1.5s ease !important;
        -webkit-backface-visibility: hidden !important;
        backface-visibility: hidden !important;
    }

    .carousel-item {
        transition: all 0.3s ease-in-out;
    }

    .carousel-item h1 {
        color: antiquewhite;
    }

    #carousel-btn {

        border-radius: 50px;
        color: white;
        background-color: #99CC99;
        border-color: #99CC99;
        width: 200px;
        transition: all 0.3s ease;
    }

    #carousel-btn:hover {
        color: white;
        background-color: rgba(0, 0, 0, 0.2);
        border-color: #99CC99;
    }

    #carousel-btn2 {
        margin-top: 15px;
        border-radius: 50px;
        color: white;
        border-color: white;
        width: 200px;
        transition: all 0.3s ease;
        background-color: rgba(0, 0, 0, 0.2);
    }

    #carousel-btn2:hover {
        color: #99CC99;
        border-color: #99CC99;
        background-color: rgba(0, 0, 0, 0.3);
    }

    .carousel-text {
        text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.3);
    }

    /* partnership carousel */

    #card-btn {
        border-radius: 50px;
        color: white !important;
        background-color: transparent;
        border-color: white;
    }

    #card-btn:hover {
        background-color: transparent;
        border-color: #759C75;
        color: #759C75 !important;

        #link-icon {
            fill: #759C75;
        }
    }

    #link-icon {
        height: 20px;
        width: 20px;
        fill: white;
    }

    .partner-icons {
        width: 35px;
        height: 35px;
        fill: white !important;
    }

    .partner-text {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: white;
    }

    .partner-card {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    .partner-logo:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }

    .wrapper {
        width: 100%;
        padding: 0 35px;
        position: relative;
    }

    .controls {
        height: 50px;
        width: 50px;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
        cursor: pointer;
        position: absolute;
        top: 50%;
        font-size: 1.25rem;
        transform: translateY(-50%);

    }

    .controls:hover {
        fill: #759C75 !important;
        transition: all .3s ease-in-out;
    }

    .wrapper svg:first-child {
        left: -25px;
    }

    .wrapper svg:last-child {
        right: -25px;
    }

    .wrapper .carousels {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: calc((100% /2 - 12px));
        gap: 16px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth !important;
        scrollbar-width: none;
    }

    .carousel::-webkit-scrollbar {
        display: none;
    }

    .carousels :where(.card, .img) {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carousels.no-transition {
        scroll-behavior: auto;
    }

    .carousels.dragging {
        scroll-snap-type: none;
        scroll-behavior: auto;
    }

    .carousels.dragging .card {
        cursor: grab;
        user-select: none;
    }

    .carousels li {
        scroll-snap-align: start;
        display: flex;
        cursor: pointer;
        padding-bottom: 15px;
        transition: transform 0.5s ease-in-out !important;
        scroll-behavior: smooth !important;
        justify-content: center;
        flex-direction: column;
    }

    .btn-view {
        background-color: transparent;
        border-color: #759C75 !important;
        color: black;
    }

    .btn-view:hover {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        color: white !important;
        transition: all 0.3s ease-in-out;
    }

    .form-check input:checked {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        transition: all 0.3s ease;
    }
</style>