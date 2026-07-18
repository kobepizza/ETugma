@extends('layouts.master')
@section('content')

@php
$page="About Us";
@endphp

<html>

<body>
    <section>
        <div class="containter-fluid px-4 py-5 ">
            <div class="container" style="margin-bottom:50px;">
                <div class="row row cols-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-end">
                        <img src="" class="img-fluid rounded-5 mb-3" id="aboutIMG"><!--CMS about scribbles img-->
                    </div>
                    <div class="abt col-12 col-sm-12 col-md-12 col-lg-6 text-start">
                        <h2 class="mb-0">About</h2>
                        <h1>Scribbles & Schemes</h1>
                        <hr style="height:2px;color:black;width:45%;">
                        <p class="body lh-1 text-break" id="aboutTEXT" style="white-space: pre-wrap;"></p><!--CMS about scribbles statement-->
                        <a href="{{route('choice')}}" class="btn btn-join btn-lg">Join Now</a><!--signup button-->
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="container text-center" style="margin-bottom:50px;">
            <img src="" style="height:230px; margin-bottom:50px;" id="logo1"><!--CMS scribbles logo-->
            <div class="mv row">
                <div class="col-12 col-md-6">
                    <div>
                        <h1 class="pb-3 border-bottom">MISSION<h1>
                                <p class="statement lh-lg" id="mission" style="white-space: pre-wrap;"></p><!--CMS mission statement-->
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div>
                        <h1 class="pb-3  border-bottom">VISION<h1>
                                <p class="statement lh-lg" id="vision" style="white-space: pre-wrap;"></p><!--CMS vision statement-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
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
                    buildAboutPage(data);
                }

            },
            error: function() {

            }
        });
    };

    function buildAboutPage(data) {
        let logo = data.cms.logo;
        let aboutIMG = data.cms.about_img;
        let aboutTEXT = data.cms.about_txt;
        let mission = data.cms.mission;
        let vision = data.cms.vision;

        $('#logo1').attr('src', logo);
        $('#aboutIMG').attr('src', aboutIMG);
        $('#aboutTEXT').html(aboutTEXT);
        $('#mission').html(mission);
        $('#vision').html(vision);
    }
</script>

</html>
@endsection

<style>
    .statement {
        font-size: x-large;
        text-align: center;
        padding: 30px;
    }

    .mv {
        font-family: 'Times New Roman', Times, serif;
    }

    .abt {
        font-family: 'Times New Roman', Times, serif;
    }

    .body {
        font-size: large;
    }

    a.btn-join {
        width: 200px;
        border-radius: 50px;
        border-color: #759C75;
        color: white;
        background-color: #759C75;
        transition: all 0.3s ease;
    }

    a.btn-join:hover {
        background-color: #99CC99 !important;
        color: black;
        border-color: #99CC99 !important;
    }
</style>