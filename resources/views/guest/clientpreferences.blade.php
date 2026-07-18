@extends('layouts.signmaster')
@section('content')

@php
$page="Preferences";
@endphp


<body>
    <main>
        <div class="preferences container mb-3 col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 py-5">
            <h1 class="py-4 text-center">Select Preferences</h1>
            <form method="POST" action="{{route('client.preferences')}}">
                @csrf
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
              

                @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class = "alert alert-danger">{{$error}}</div>
                @endforeach
                @endif
                <input type="hidden" name="children_id" value="{{ session('children_id') }}">
                <input type="hidden" name="user_profile_id" value="{{ session('user_profile_id') }}">
                <input type="hidden" name="user_type_id" value="{{ session('user_type_id') }}">

                <div class="form-check mb-4 px-0">
                    <h3>Modality</h3>
                    <div class="hstack gap-3 mb-3 d-flex justify-content-around">
                        @foreach ($modality as $data)
                            <input type="radio" class="btn-check" name="modality" id="modality{{ $data->id }}" autocomplete="off" value="{{$data->id}}">
                            <label class="btn option-btn" for="modality{{ $data->id }}">{{ $data->modality}}</label> 
                        @endforeach
                        
                       
                    </div>
                </div>
                <div class="form-check mb-4 px-0">
                    <h3>Learning Style</h3>
                    <div class="hstack gap-3 mb-3 d-flex justify-content-around">
                       @foreach($teaching as $data)
                            <input type="radio" class="btn-check" name="teaching_style" id="learning-style{{ $data->id}}" autocomplete="off" value="{{$data->id}}">
                            <label class="btn option-btn" for="learning-style{{ $data->id }}">{{$data->style}}</label>

                        @endforeach
                    </div>
                </div>
                <div class="form-check mb-4 px-0">
                    <h3>Language</h3>
                    <div class="hstack gap-3 mb-3 d-flex justify-content-around">
                        @foreach ( $language as $data)
                            <input type="checkbox" class="btn-check" name="language[]" id="{{$data->language}}" autocomplete="off" value="{{$data->id}}">
                            <label class="btn option-btn" for="{{$data->language}}">{{$data->language}}</label> 
                        @endforeach
                       
                    </div>
                </div>
                
                <div class="form-check mt-5 px-0 py-3">
                    <button class="btn continue-btn w-100">Continue</button>
                </div>
            </form>
        </div>
    </main>
</body>
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
        transition: all 0.3s ease;

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
        transition: all 0.3s ease !important;
    }

    .continue-btn:hover {
        color: black !important;
        border-color: #99CC99 !important;
        background-color: #99CC99 !important;
        border-radius: 50px !important;
    }
</style>