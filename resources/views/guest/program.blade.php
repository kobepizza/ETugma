@extends('layouts.master')
@section('content')

@php
$page="Programs";
@endphp
<html>

<head>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" style="display:none;">
    <symbol id="external" viewBox="0 0 16 16">
      <title>external link</title>
      <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
      <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
    </symbol>
  </svg>
</head>
<div class="prg container col-xxl-8 px-4 py-5">
  <h1 class="pb-2">Programs Offered</h1>
  <section>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
        <img src="" class="d-block img-fluid rounded-5" alt="tutorial image" id="tutorialIMG"><!--CMS tutorial img-->
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Academic Tutorial</h1>
        <p class="lead text-break lh-base" id="tutorialTEXT" style="white-space: pre-wrap;"> <!--CMS tutorial text-->

        </p>
        <div class="d-grid gap-2 d-flex justify-content-start">
          <a href="{{route('signup.client')}}" class="prgm btn btn-outline btn-lg ">Get Started</a><!--sign up button-->
          <a href="{{route('subject')}}" class="lrn btn btn-outline btn-lg">Subjects & Rates</a><!--subject&rates button-->
        </div>
      </div>
    </div>
  </section>
</div>
<section>
  <div class="prg container  py-5">
    <h2 class="pb-2">Partnership & Exclusive Programs</h2>
    <h5>These programs are exclusively available at Scribbles & Schemes - Silang, Cavite branch</h5>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5 text-center">

      <div class="col">
        <div class="card card-cover program h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('Images/sam3.jpeg');background-size:cover;background-position:center;"><!--SAM bg pic-->
          <div class="d-flex flex-column h-100 p-3 pb-5 text-white text-shadow-1">
            <div class="card-body">
              <h2 class=" display-5 lh-5 fw-bold">S.A.M Singapore Math</h2>
            </div>
            <div class="card-footer border-0">
              <a href="https://seriouslyaddictivemaths.com.sg/?fbclid=IwZXh0bgNhZW0CMTEAAR0QZS8xQ2yL78TH542aPMtyjOVs0qtxzt2YSF7ysk8G9GefDrZS9RXHuag_aem_5Ff8ypTMan4jETCkdt7wLA" type="button" target="_blank" class="btn btn-outline btn-lg external-btn d-flex align-items-center justify-content-center text-white"> <!--SAM website link-->
                Learn More &nbsp;
                <svg class="" height="14" width="14" fill="currentcolor">
                  <use xlink:href="#external" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover program h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('Images/peonz1.jpg');background-size:cover;background-position:center;"><!--peonz bg pic-->
          <div class="d-flex flex-column h-100 p-3 pb-5 text-white text-shadow-1">
            <div class="card-body">
              <h2 class=" display-5 lh-5 fw-bold">PeOnz Math & Robotics</h2>
            </div>
            <div class="card-footer border-0">
              <a href="https://peonz.tech/" type="button" target="_blank" class="btn btn-outline btn-lg external-btn d-flex align-items-center justify-content-center text-white"> <!--peonz website link-->
                Learn More &nbsp;
                <svg class="" height="14" width="14" fill="currentcolor">
                  <use xlink:href="#external" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover program h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('Images/reader1.jpg');background-size:cover;background-position:center;"><!--instant reader bg pic-->
          <div class="d-flex flex-column h-100 p-3 pb-5 text-shadow-1">
            <div class="card-body">
              <h2 class=" display-5 lh-5 fw-bold">Instant Reader</h2>
            </div>
            <div class="card-footer border-0">
              <a href="https://readin20-days.com/?fbclid=IwZXh0bgNhZW0CMTEAAR1kgDOPovAIixXb8LcYfwAZc--rWqV7mgvEf6edyzArCojQik6On3Qs9qg_aem_uljjTRVbhwddX-SeAj7U0w" type="button" target="_blank" class="btn btn-outline btn-lg external-btn d-flex align-items-center justify-content-center text-white"> <!--instant reader website link-->
                Learn More &nbsp;
                <svg class="" height="14" width="14" fill="currentcolor">
                  <use xlink:href="#external" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
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
          buildProgramPage(data);
        }

      },
      error: function() {

      }
    });
  };

  function buildProgramPage(data) {
    let tutorialIMG = data.cms.tutorial_img;
    let tutorialTEXT = data.cms.tutorial_txt;
    $('#tutorialIMG').attr('src', tutorialIMG);
    $('#tutorialTEXT').text(tutorialTEXT);
  }
</script>

</html>
@endsection
<style>
  .prg {
    font-family: Arial, Helvetica, sans-serif;
  }

  .prgb.btn-outline {
    border-radius: 50px;
    width: 250px;
    background-color: transparent;
    color: white;
    border-color: white;
  }

  .prgb.btn-outline:hover {
    background-color: unset;
    color: #759C75 !important;
    border-color: #759C75 !important;
  }

  .prgm.btn-outline {
    border-radius: 50px;
    width: 250px;
    background-color: #759C75;
    color: white;
    border-color: #759C75;
    transition: all 0.3s ease;
  }

  .prgm.btn-outline:hover {
    background-color: #99CC99;
    color: black !important;
    border-color: #99CC99 !important;
  }

  .lrn.btn-outline {
    width: 200px;
    background-color: white;
    color: black;
    border-color: #759C75;
    border-radius: 50px;
    transition: all 0.3s ease;
  }

  .lrn.btn-outline:hover {
    background-color: #759C75;
    color: white !important;
    border-color: #759C75 !important;
  }

  .external-btn.btn-outline {
    border-color: white;
    transition: all 0.3s ease;
    background-color: rgba(0, 0, 0, 0.2);
  }

  .external-btn.btn-outline:hover {
    border-color: #99CC99;
    background-color: rgba(0, 0, 0, 0.3);
    color: #99CC99 !important;
  }

  .card-cover {
    position: relative;
  }

  .card-cover {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.1);
    /* adjust the opacity value to your liking */
  }

  .text-white {
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
  }
</style>