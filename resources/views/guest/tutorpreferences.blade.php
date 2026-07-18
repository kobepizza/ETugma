@extends('layouts.signmaster')
@section('content')

@php
$page="Preferences";
@endphp

<body>
    <main>
        <div class="preferences container col-10 col-sm-10 col-md-7 col-lg-5 col-xl-4 col-xxl-3 py-5">
            <h1 class="py-4 text-center">Select Preferences</h1>
            <form method="POST" action="{{route('tutor.preferences')}}">
                @csrf
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif


                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
                @endforeach
                @endif

                <input type="hidden" name="employmentSession_id" value="{{ session('employmentSession_id') }}">
                <input type="hidden" name="requirements_id" value="{{ session('requirements_id') }}">
                <input type="hidden" name="user_profile_id" value="{{ session('user_profile_id') }}">
                <input type="hidden" name="user_type_id" value="{{ session('user_type_id') }}">

                <div class="form-check mb-4">
                    <h3>Modality</h3>
                    <div class="hstack gap-3 mb-3">
                        @foreach ($modality as $data)
                        <input type="radio" class="btn-check" name="tutorModality" id="tutorModality{{ $data->id }}" autocomplete="off" value="{{$data->id}}">
                        <label class="btn option-btn" for="tutorModality{{ $data->id }}">{{ $data->modality}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-check mb-4">
                    <h3>Teaching Style</h3>
                    <div class="hstack gap-3 mb-3">
                        @foreach($teaching as $data)
                        <input type="radio" class="btn-check" name="tutorTeaching_style" id="tutorLearning-style{{ $data->id}}" autocomplete="off" value="{{$data->id}}">
                        <label class="btn option-btn" for="tutorLearning-style{{ $data->id }}">{{$data->style}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-check mb-4">
                    <h3>Language</h3>
                    <div class="hstack gap-3 mb-3">
                        @foreach ( $language as $data)
                        <input type="checkbox" class="btn-check" name="tutorLanguage[]" id="tutor{{$data->language}}" autocomplete="off" value="{{$data->id}}">
                        <label class="btn option-btn" for="tutor{{$data->language}}">{{$data->language}}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-check mb-4">
                    <h3>Specialization</h3>
                    <div class="dropdown-center">
                        <button class="spec-btn btn btn-lg filter-btn dropdown-toggle  d-flex align-items-center justify-content-between w-100" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Select Specialization
                        </button>
                        <div class="spec-menu dropdown-menu filter-menu w-100">
                            <input type="hidden" data-action="{{route('gradeLevel')}}" id="grdLvlAct">
                            <div class="vstack">
                                <!--specialization looping-->
                                @foreach ($department as $dept)
                                <div class="form-check ms-3 kinder">
                                    <input class="form-check-input spec-radio" type="radio" name="dept" id="pre-read{{$dept->id}}" value="{{$dept->id}}">
                                    <label class="form-check-label filter-item" for="pre-read{{$dept->id}}">
                                        {{ $dept->department}}
                                    </label>
                                </div>
                                @endforeach
                                <!--end looping-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <h3>Year Level</h3>
                    <div class="dropdown-center">
                        <button class="year-btn btn btn-lg filter-btn dropdown-toggle  d-flex align-items-center justify-content-between w-100" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Select Year Level
                        </button>
                        <div class="year-menu dropdown-menu filter-menu w-100">
                            <input type="hidden" data-action="{{route('getSubject')}}" id="subjAct">
                            <div class="vstack" id="grdLevelForm">
                                <!--year looping-->
                                @foreach ($yearLevel as $grade)
                                <div class="form-check ms-3 kinder">
                                    <input class="form-check-input year-radio" type="radio" name="grade" id="pre-grd{{$grade->id}}" value="{{$grade->id}}">
                                    <label class="form-check-label filter-item" for="pre-read{{$grade->id}}">
                                        {{ $grade->year }}
                                    </label>
                                </div>
                                @endforeach
                                <!--end looping-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <h3>Subject</h3>
                    <div class="dropdown-center">
                        <button class="subj-btn btn btn-lg filter-btn dropdown-toggle  d-flex align-items-center justify-content-between w-100" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                            Select Subject
                        </button>
                        <div class="subj-menu dropdown-menu filter-menu w-100">
                            <div class="vstack" id="subjForm">
                                <!--subject looping-->
                                @foreach ($subject as $data)
                                <div class="form-check ms-3 kinder">
                                    <input class="form-check-input subj-radio" type="radio" name="subject" id="pre-subj{{$data->id}}" value="{{$data->id}}">
                                    <label class="form-check-label filter-item" for="pre-read{{$data->id}}">
                                        {{ $data->subjects }}
                                    </label>
                                </div>
                                @endforeach
                                <!--end looping-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check mt-5 py-3">
                    <button class="btn continue-btn w-100">Continue</button>
                </div>
            </form>
        </div>
    </main>
</body>
<script type="module">
    $(function() {
        onload();
    });

    function onload() {
        retrieveGradeLevel();
        //retrieveSubjPerLevel();
    }

    function retrieveGradeLevel() {
        $('input[type=radio][name=dept]').change(function() {
            var selectedDept = $(this).next('label').text();
            $(this).closest('.dropdown-center').find('.filter-btn').text(selectedDept);
            $(this).closest('.dropdown-menu').removeClass('show');

            var id = this.value;
            var url = $("#grdLvlAct").attr('data-action');
            //console.log('URL:', url);
            //console.log('ID:', id);
            $.ajax({
                url: url + "?id=" + id,
                method: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    //console.log('Response:', response);
                    $("#grdLevelForm").empty();
                    $("#subjForm").empty();
                    $.each(response, function(index, data) {
                        buildDropGrdLevel(data);
                    });

                    //Need to initialize
                    retrieveSubjPerLevel();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    }

    function buildDropGrdLevel(data) {
        //console.log('Data:', data);
        var html = " <div class='form-check ms-3 kinder'>" +
            "<input class='form-check-input radio' type='radio' name='grade' id='pre-grd" + data.year_id + "' value = '" + data.year_id + "'>" +
            "<label class='form-check-label filter-item' for='pre-grd" + data.year_id + "'>" +
            data.grade_level.year +
            "</label>" +
            "</div>";
        $("#grdLevelForm").append(html);
    }

    function retrieveSubjPerLevel() {
        $('input[type=radio][name=grade]').change(function() {
            var selectedGrade = $(this).next('label').text();
            $(this).closest('.dropdown-center').find('.filter-btn').text(selectedGrade);
            $(this).closest('.dropdown-menu').removeClass('show');

            var grade = this.value;
            var deptId = $('input[type=radio][name=dept]:checked').val();

            var url = $("#subjAct").attr('data-action');
            //console.log('URL:', url);
            //console.log('ID:', id);
            $.ajax({
                url: url + "?grade=" + grade + "&dept=" + deptId,
                method: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    //console.log('Response:', response);
                    $("#subjForm").empty();
                    $.each(response, function(index, data) {
                        buildDropSubj(data);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    }

    function buildDropSubj(data) {
        //console.log('Data:', data);
        var html = " <div class='form-check ms-3 kinder'>" +
            "<input class='form-check-input radio' type='radio' name='subject' id='pre-subj" + data.subject.id + "' value = '" + data.subject.id + "'>" +
            "<label class='form-check-label filter-item' for='pre-subj" + data.subject.id + "'>" +
            data.subject.subjects +
            "</label>" +
            "</div>"
        $("#subjForm").append(html);
    }
    $('#subjForm').on('change','input[type=radio][name=subject]',function() {
        var selectedSub = $(this).next('label').text();
        $(this).closest('.dropdown-center').find('.filter-btn').text(selectedSub);
        $(this).closest('.dropdown-menu').removeClass('show');
    });
</script>


@endsection
<style>
    select:required:invalid {
        color: #666;
    }

    option[value=""][disabled] {
        display: none;
    }

    option {
        color: #000;
    }

    .preferences {
        font-family: Arial, Helvetica, sans-serif !important;
    }

    label.option-btn {
        width: 200px;
        padding: 10px;
        font-size: large;
        color: black;
        border-color: #759C75 !important;
        border-radius: 50px;

    }

    input[type="radio"]:checked+label,
    input[type="checkbox"]:checked+label {
        color: white !important;
        border-color: #759C75 !important;
        border-radius: 50px;
        background-color: #759C75 !important;
        transition: all 0.3s ease-in-out;
    }

    .continue-btn {
        font-size: x-large !important;
        color: white !important;
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        border-radius: 50px !important;
    }

    .continue-btn:hover {
        color: black !important;
        border-color: #99CC99 !important;
        background-color: #99CC99 !important;
        border-radius: 50px !important;
        transition: all 0.3s ease !important;
    } 

    .filter-btn {
        border-color: #759C75 !important;
    }

    .filter-btn.dropdown-toggle[aria-expanded="true"]::after {
        transform: rotate(-180deg);
        color: #759c75 !important;
    }

    .filter-btn.dropdown-toggle::after {
        transition: transform 0.2s ease-out;
    }


    .filter-menu {
        background-color: white !important;
        border-color: #000;
    }

    .filter-item {
        background-color: white !important;
        color: black;
        width: 100%;
        cursor: pointer;
    }

    .filter-check {
        background-color: white !important;
        color: black;
        overflow-x: hidden;
        border-color: #000;
    }

    .form-check input {
        border-color: black !important;
    }

    .form-check input:checked {
        background-color: #759C75 !important;
        transition: all 0.3s ease;
    }

    input[type="radio"].form-check-input:checked+label {
        background-color: white !important;
        color: black !important;
    }
</style>