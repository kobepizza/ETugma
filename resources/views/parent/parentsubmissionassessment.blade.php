@extends('layouts.clientmaster')
@section('content')
@php

    $page ='Assessment'
@endphp


        <head>
        <style>
    .star-rating .star {
        cursor: pointer;
        transition: color 0.25s;
        font-size: 24px; /* Adjust the font size as needed */
    }

    .star-rating .star:hover,
    .star-rating .star:hover ~ .star {
        color: yellow;
    }
    .confetti-button{
  background-color: #0000FF; /* Green */
  border: none;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
   margin: 0;
  position: absolute;
  top: 92%;
  left: 12%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.header { 
  width: 100%;
  text-allign: Center;
  position: fixed;
  background-color: rgb(40,40,40);
  color: white;
}

.progress-bar {
  height: .5rem;
  width: 0%;
  position: fixed;
  background-color: hotpink;
}
.hero1 {
	background-image: url("https://images.unsplash.com/photo-1568640347023-a616a30bc3bd?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2ODQ1MTcyMTd8&ixlib=rb-4.0.3&q=85"); /*photo by okeykat for Unsplash */
	background-size: cover;
	background-position: center;
	text-align: center;
	padding: 100px 0;
	color: black;
	-webkit-text-stroke: 1px hotpink;
	text-stroke: 1px hotpink;
}
.hero1 p {
	font-size: 1.5rem;
}
</style>
</head>


<body>
    
<div class="content">
    <br>
    <h2>Submit Assessment</h2>
    <hr style="width: 100%; margin: 0;">
</div>
<br>


<div class="content col-lg-8 col-md-10 col-sm-11">
    <div class="card">
        <form method="POST" action="{{ route('submit.work',$result->id) }}" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            <div class="text-center">
                <h1>Submit Assessment</h1>
            </div>

            <!-- Content Title -->
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5> {{$result->subject->subjects}}</h5>
                        <h3>{{$result->title}}</h3>
                    </div>
                    <div class="col-md-6">
                        <h5>Juan Miguel Doroja</h5>
                        <h5>{{$result->username}}</h5>
                    </div>
                </div>
            </div>


            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Description:</h4>
                        <p>{{$result->description}}.</p>
                    </div>
                    <div class="col-md-6">
                        <h4>Due Date:</h4>
                        <p>{{$result->deadline}}</p>
                    </div>

                   
                </div>
            </div>


            <div class="mt-4">
                <div class="row">
                <div class="col-md-6">
                        <h4>Submission:</h4>
                        <div class="form-group">
                            <label for="fileUpload">Upload File:</label>
                            <input type="file" class="form-control-file" id="fileUpload" name ="submission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Rubrics:</h4>
                        <p>Attached file: <img src = '{{$result->rubrics}}'></a></p>
                    </div>
                </div>
            </div>

            <!-- Submit Grade Button -->
            <div class="form-group mt-4">
                <button type="submit" class="confetti-button" onclick="confetti()">Submit Assessment</button>
                <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
            </div>
        </div>
    </div>
</div>

<script>
    const progressBarEl = document.getElementById("progress-bar");

window.addEventListener("scroll", () => {
  let height = document.body.scrollHeight - window.innerHeight;
  let scrollPosition = document.documentElement.scrollTop;
  let width = (scrollPosition / height) * 100;
  progressBarEl.style.width ='${width}%'
  
});
</script>
</body>
@endsection

