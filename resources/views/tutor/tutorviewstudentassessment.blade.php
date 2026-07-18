@extends('layouts.tutormaster')
@section('content')

@php
$page= "Assessments";
@endphp

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif

<div class="content px-3 py-2">
    <div class="mb-3">
        <h4>Assessments</h4>
    </div>
    @if(session('tutorMain')->tutor->verification_status_id == 1)
    <div class="row">
        <div class="col-3">
            <strong>STUDENT</strong>
        </div>
        <div class="col-3">
            <strong>SUBJECT</strong>
        </div>
        <div class="col-3">
            <strong>SESSION TYPE</strong>
        </div>
        <div class="col-3">
            <strong>ACTIONS</strong>
        </div>
    </div>

    @foreach ($students as $data)
    <div class="row mb-2">
        <div class="col-3">
            <div class="p-2 border">{{ $data->guardianMain->child->fname }} {{ $data->guardianMain->child->lname }}</div>
        </div>
        <div class="col-3">
            <div class="p-2 border">{{ $data->tutorMain->departmentYearSubject->subject->subjects }}</div>
        </div>
        <div class="col-3">
            <div class="p-2 border">{{ $data->tutorMain->tutor->employmentSession->sessionType->type }}</div>
        </div>
        <div class="col-3">
            <div class="hstack d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createAssessment{{$data->id}}">Create Assessment</button>
                <a href="{{route('assess.showdata' ,  ['tutor_session_id' => $data->id, 'child_id' => $data->guardianMain->child->id])}}" type="button" class="btn btn-outline-primary">View Assessments</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createAssessment{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">CREATE ASSESSMENT FOR {{strtoupper($data->guardianMain->child->fname)}} {{strtoupper($data->guardianMain->child->lname)}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('tutor.create', ['tutor_session_id' => $data->id, 'child_id' => $data->guardianMain->child->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="inputTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Enter Title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputDeadline" class="form-label">Deadline</label>
                                <div class="input-group">
                                    <input type="datetime-local" class="form-control" id="inputDeadline" name="deadline" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="inputDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="inputDescription" name="description" rows="3" placeholder="Enter Description" required></textarea>
                        </div>

                        <div class="row mb-3 mt-3">
                            <div class="col-12">
                                <label for="rubrics" class="form-label">Upload Rubrics</label>
                                <input type="file" id="rubrics{{ $data->id }}" name="rubrics" class="form-control" accept=".pdf,.docx,.txt,.zip,.rar">
                                <div id="preview{{ $data->id }}" style="margin-top: 10px;"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <select class="form-select" name="visibility" aria-label="Default select example">
                                <option selected disabled>Select Visibility</option>
                                @foreach($assessmentVisibility as $visible)
                                <option value="{{$visible->id}}">{{$visible->status}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade file-modal" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-focus="false">
        <div class="modal-dialog modal-xl" style="max-width: 1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel">File Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="" id="filePreview" style="width: 100%; height: 800px;"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <!-- Alert message -->
    <div class="alert alert-warning" role="alert">
        Wait for the verification of your account
    </div>
    @endif
</div>

@foreach ($students as $data)
<script>
    // Get the input field and the preview div
    const inputField = document.getElementById('rubrics{{ $data->id }}');
    const previewDiv = document.getElementById('preview{{ $data->id }}');

    // Add an event listener to the input field
    inputField.addEventListener('change', function() {
        // Get the selected file
        const file = inputField.files[0];

        // Create a button to view the file
        const viewButton = document.createElement('button');
        viewButton.type = 'button';
        viewButton.className = 'btn btn-primary';
        viewButton.textContent = 'View File';
        viewButton.onclick = function() {
            // Open the modal and display the file preview
            const fileModal = new bootstrap.Modal(document.getElementById('fileModal'));
            fileModal.show();
            document.getElementById('filePreview').src = URL.createObjectURL(file);
        };

        // Clear the preview div and add the button
        previewDiv.innerHTML = '';
        previewDiv.appendChild(viewButton);
    });
</script>
@endforeach

@endsection

<style>
    .row {
        margin-bottom: 10px;
    }

    .col-3 {
        padding-left: 5px;
        padding-right: 5px;
    }
</style>