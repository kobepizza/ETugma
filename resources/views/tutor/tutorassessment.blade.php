@extends('layouts.tutormaster')
@section('content')

@php
$page = 'Assessments'
@endphp

<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none; " fill="#000000">
        <symbol id="task" viewBox="0 -960 960 960">
            <title>task</title>
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm80-80h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm200-190q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z" />
        </symbol>
        <symbol id="star" viewBox="0 -960 960 960">
            <title>star</title>
            <path d="m384-334 96-74 96 74-36-122 90-64H518l-38-124-38 124H330l90 64-36 122ZM233-120l93-304L80-600h304l96-320 96 320h304L634-424l93 304-247-188-247 188Zm247-369Z" />
        </symbol>
        <symbol id="calendar" viewBox="0 -960 960 960">
            <title>calendar</title>
            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
        </symbol>
        <symbol id="rubric" viewBox="0 -960 960 960">
            <title>rubric</title>
            <path d="M160-120v-720h640v400H240v80h200v80H240v80h200v80H160Zm456 0L504-232l56-56 56 56 142-142 56 56-198 198ZM240-520h200v-80H240v80Zm280 0h200v-80H520v80ZM240-680h200v-80H240v80Zm280 0h200v-80H520v80Z" />
        </symbol>
        <symbol id="submission" viewBox="0 -960 960 960">
            <title>submission</title>
            <path d="m424-318 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm280-590q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z" />
        </symbol>
        <symbol id="attempt" viewBox="0 -960 960 960">
            <title>attempt</title>
            <path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
        </symbol>
        <symbol id="add" viewBox="0 -960 960 960">
            <title>add</title>
            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
        </symbol>
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
        <symbol id="delete" viewBox="0 -960 960 960">
            <title>delete</title>
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
        </symbol>
        <symbol id="edit" viewBox="0 -960 960 960">
            <title>edit</title>
            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
        </symbol>
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="add-link" viewBox="0 -960 960 960">
            <title>add link</title>
            <path d="M680-160v-120H560v-80h120v-120h80v120h120v80H760v120h-80ZM440-280H280q-83 0-141.5-58.5T80-480q0-83 58.5-141.5T280-680h160v80H280q-50 0-85 35t-35 85q0 50 35 85t85 35h160v80ZM320-440v-80h320v80H320Zm560-40h-80q0-50-35-85t-85-35H520v-80h160q83 0 141.5 58.5T880-480Z" />
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <h4>Assessments</h4>
                <div class="" id="alert-div"></div>
            </div>
            <!--search bar-->
            <section class="d-flex align-items-center justify-content-center ">
                <div class="input-group w-75">
                    <div class="input-group mb-3">
                        <span class="input-group-text border-end-0 rounded-start-3 px-2 bg-secondary-subtle">
                            <svg class="search-icon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#search" />
                            </svg>
                        </span>
                        <input type="text" class="form-control border-start-0 bg-secondary-subtle rounded-end-3 px-1" placeholder="Search Student or Parent" role="search" id="AsessmentSearch">
                        <button class="btn bg-secondary-subtle rounded-end-3 d-none" type="button" id="ClearSearch">
                            <svg class="close-icon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#close" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
            <!---->
            <!--tutoring session students-->
            <section class="mb-3" style="max-height:700px; overflow:auto; scrollbar-width:thin;">
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">STUDENT</th>
                            <th scope="col">PARENT</th>
                            <th scope="col">SUBJECT</th>
                            <th scope="col">SESSION TYPE</th>
                            <th scope="col">SESSION STATUS</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="assessmentTable">
                    </tbody>
                </table>
                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="loading">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <h5 class="p-3 text-center d-none" id="noSearch">No matches.</h5>
                <h5 class="p-3 text-center d-none" id="noSession">No tutoring sessions yet.</h5>
            </section>
            <!---->
            <!--MODALS-->
            <!--delete modal-->
            <div class="modal fade" id="deleteAssessmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="vstack gap-4 d-flex align-items-center">
                                <svg class="" height="50" fill="currentcolor">
                                    <use xlink:href="#info" />
                                </svg>
                                <h3>Are you sure you want to delete this assessment?</h3>
                                <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                    <button class="btn btn-lg viewBtn" type="button" data-bs-toggle="modal" data-bs-target="#viewAssessments">Dismiss</button>
                                    <form class="p-0 m-0" method="POST" data-action="{{route('tutor.delete.assessment')}}" id="deleteAssessmentForm">
                                        @csrf
                                        <input type="hidden" name="deleteAssessmentID" value="" id="deleteAssessmentID">
                                        <button type="submit" class="btn btn-lg submitBtn">Confirm</button><!--confirm booking-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--create assessment-->
            <div class="modal fade" id="createAssessment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Assessment | <span id="createSubject"></span> | <span id="createYear"></span></h5>
                            <button type="button" class="btn-close dismissCreate" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="fw-bold mb-3">Student: <span class="fw-normal text-capitalize" id="createChildName"></span></h6>
                            <form method="POST" data-action="{{ route('tutor.create.assessment') }}" enctype="multipart/form-data" id="createAssessmentForm">
                                @csrf
                                <input type="hidden" value="" name="tutor_session_id" id="tutorSessionId">
                                <input type="hidden" value="" name="child_id" id="childId">
                                <input type="hidden" value="" name="guardian_id" id="guardianId">
                                <div class="row mb-3">
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="inputTitle" class="form-label fw-semibold">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Enter Title" required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="inputDeadline" class="form-label fw-semibold">Deadline<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" id="inputDeadline" name="deadline" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Visibility<span class="text-danger">*</span></label>
                                        <select class="form-select" name="visibility" aria-label="Default select example" required>
                                            <option selected disabled>Select Visibility</option>
                                            @foreach($assessmentVisibility as $data)
                                            <option value="{{ $data->id }}">{{ $data->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="inputDescription" class="form-label fw-semibold mb-0">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="inputDescription1" name="description" rows="3" placeholder="Enter Description" required></textarea>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Upload Module</label>
                                        <input type="file" id="module" name="module" class="form-control" accept="application/pdf">
                                        <p class="fw-semibold">Accepted documents: .pdf</p>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Upload Rubrics<span class="text-danger">*</span></label>
                                        <input type="file" id="rubrics" name="rubrics" class="form-control" accept="application/pdf" required>
                                        <p class="fw-semibold">Accepted documents: .pdf</p>
                                    </div>
                                </div>

                            </form>
                            <h6 class="fw-semibold">Module Preview</h6>
                            <iframe src="" id="filePreview" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" style="width: 100%; height: 500px; border: 1px solid black;"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn viewBtn dismissCreate" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn submitBtn" id="submitCreateAsssessment">Create Assessment</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--edit assessment-->
            <div class="modal fade" id="editAssessment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Assessment | <span id="editSubject"></span> | <span id="editYear"></span></h5>
                            <button type="button" class="btn-close dismissEdit" data-bs-toggle="modal" data-bs-target="#viewAssessments" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="fw-bold mb-3">Student: <span class="fw-normal text-capitalize" id="editChildName"></span></h6>
                            <form method="POST" data-action="{{ route('tutor.edit.assessment') }}" enctype="multipart/form-data" id="editAssessmentForm">
                                @csrf
                                <input type="hidden" value="" name="tutor_session_id" id="editTutorSessionId">

                                <div class="row mb-3">
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="inputTitle" class="form-label fw-semibold">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="editTitle" name="title" placeholder="Enter Title" required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="inputDeadline" class="form-label fw-semibold">Deadline<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" id="editDeadline" name="deadline" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Visibility<span class="text-danger">*</span></label>
                                        <select class="form-select" name="visibility" id="editVisibility" aria-label="Default select example" required>
                                            <option selected disabled>Select Visibility</option>
                                            @foreach($assessmentVisibility as $data)
                                            <option value="{{ $data->id }}">{{ $data->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="inputDescription" class="form-label fw-semibold mb-0">Description<span class="text-danger">*</span></label>
                                        </span>
                                        <textarea class="form-control" id="editDescription" name="description" rows="3" placeholder="Enter Description" required></textarea>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Upload Module</label>
                                        <input type="file" id="editModule" name="module" class="form-control" accept="application/pdf">
                                        <p class="fw-semibold">Accepted documents: .pdf</p>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Upload Rubrics</label>
                                        <input type="file" id="editRubrics" name="rubrics" class="form-control" accept="application/pdf">
                                        <p class="fw-semibold">Accepted documents: .pdf</p>
                                    </div>
                                </div>
                            </form>
                            <h6 class="fw-semibold">Module Preview</h6>
                            <iframe src="" id="editFilePreview" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" style="width: 100%; height: 500px; border: 1px solid black;"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn viewBtn dismissEdit" data-bs-toggle="modal" data-bs-target="#viewAssessments">Close</button>
                            <button type="submit" class="btn submitBtn" id="submitEditAssessment">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--view assessments-->
            <div class="modal fade" id="viewAssessments" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">View Assessments</h5>
                            <button type="button" class="btn-close dismissView" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="" id="view-alert-div"></div>
                            <input type="hidden" name="" value="" id="viewAssessmentID">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h4 class="fw-semibold">Student: <span class="fw-normal text-capitalize" id="viewStudentName"></span></h4>
                                <button class="btn viewBtn d-flex align-items-center gap-1" id="viewCreateAsessmentBtn" data-bs-toggle="modal" data-bs-target="#viewCreateAssessment" data-view-create-guardian-id="" data-view-create-child-id="" data-view-create-form-id="" data-view-create-name="" data-view-create-subject="" data-view-create-year="">
                                    <svg fill="currentcolor" height="20" width="20">
                                        <use xlink:href="#add" />
                                    </svg>
                                    Create Assessment
                                </button>
                            </div>
                            <!--filters-->
                            <section class="mb-3 ">
                                <div class="row row-cols-auto align-items-center justify-content-center justify-content-lg-start pb-4">
                                    <div class="col">
                                        <div class="dropdown-center mb-3">
                                            <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterSubmitDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                                Submission Status
                                            </button>
                                            <div class="dropdown-menu filter-menu w-100">

                                                <div class="vstack" id="dayForm">
                                                    <!--day looping-->
                                                    @foreach($submitStatus as $data)
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input radio" type="radio" name="filterSubmit" id="filterSubmit{{ $data->id }}" value="{{ $data->id }}">
                                                        <label class="form-check-label filter-item" for="filterSubmit{{ $data->id }}">
                                                            {{ $data->status }}<!--day-->
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    <!--end looping-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="dropdown-center mb-3">
                                            <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="filterGradeDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                                Grade Status
                                            </button>
                                            <div class="dropdown-menu filter-menu w-100">
                                                <div class="vstack" id="timeForm">
                                                    <!--time looping-->
                                                    @foreach($gradeStatus as $data)
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input radio" type="radio" name="filterGrade" id="filterGrade{{ $data->id }}" value="{{ $data->id }}">
                                                        <label class="form-check-label filter-item" for="filterGrade{{ $data->id }}">
                                                            {{ $data->status }}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                    <!--end looping-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center justify-content-sm-start col-sm-auto">
                                        <button id="clear-filter" type="button" class="btn btn-outline submitBtn mb-3">Clear Filters</button>
                                    </div>
                                </div>
                            </section>
                            <!---->
                            <!--table-->
                            <h6 class="fw-semibold mb-3">Assessments</h6>
                            <section style="max-height:700px; overflow:auto; scrollbar-width:thin;">
                                <table class="table table-responsive table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">TITLE</th>
                                            <th scope="col">SUBJECT</th>
                                            <th scope="col">DEADLINE</th>
                                            <th scope="col">SUBMISSION STATUS</th>
                                            <th scope="col">GRADE STATUS</th>
                                            <th scope="col">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody id="viewAssessmentsTable">

                                    </tbody>
                                </table>
                                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="viewLoading">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <h5 class="p-3 text-center d-none" id="viewNoAsess">No assessments available.</h5>
                            </section>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--view page create assessment-->
            <div class="modal fade" id="viewCreateAssessment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Assessment | <span id="viewCreateSubject"></span> | <span id="viewCreateYear"></span></h5>
                            <button type="button" class="btn-close viewDismissCreate" data-bs-toggle="modal" data-bs-target="#viewAssessments" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="fw-bold mb-3">Student: <span class="fw-normal text-capitalize" id="viewCreateChildName"></span></h6>
                            <form method="POST" data-action="{{ route('tutor.create.assessment') }}" enctype="multipart/form-data" id="viewCreateAssessmentForm">
                                @csrf
                                <input type="hidden" value="" name="tutor_session_id" id="viewTutorSessionId">
                                <input type="hidden" value="" name="child_id" id="viewChildId">
                                <input type="hidden" value="" name="guardian_id" id="viewGuardianId">
                                <div class="row mb-3">
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="inputTitle" class="form-label fw-semibold">Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Enter Title" required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="inputDeadline" class="form-label fw-semibold">Deadline<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="datetime-local" class="form-control" id="inputDeadline" name="deadline" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Visibility<span class="text-danger">*</span></label>
                                        <select class="form-select" name="visibility" aria-label="Default select example" required>
                                            <option selected disabled>Select Visibility</option>
                                            @foreach($assessmentVisibility as $data)
                                            <option value="{{ $data->id }}">{{ $data->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="inputDescription" class="form-label fw-semibold mb-0">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="inputDescription2" name="description" rows="3" placeholder="Enter Description" required></textarea>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Upload Module</label>
                                        <input type="file" id="viewCreateModule" name="module" class="form-control" accept="application/pdf">
                                        <p class="fw-semibold">Accepted documents: .pdf</p>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="rubrics" class="form-label fw-semibold">Upload Rubrics<span class="text-danger">*</span></label>
                                        <input type="file" id="viewCreateRubrics" name="rubrics" class="form-control" accept="application/pdf" required>
                                        <p class="fw-semibold">Accepted documents: .pdf</p>
                                    </div>
                                </div>
                            </form>
                            <h6 class="fw-semibold">Module Preview</h6>
                            <iframe src="" id="ViewCreateFilePreview" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" style="width: 100%; height: 500px; border: 1px solid black;"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn viewBtn viewDismissCreate" data-bs-toggle="modal" data-bs-target="#viewAssessments">Close</button>
                            <button type="submit" class="btn submitBtn" id="submitViewCreateAsssessment">Create Assessment</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--view page view submission rubrics-->
            <div class="modal fade" tabindex="-1" id="submissionRubric" data-bs-backdrop="false">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" id="asssessment-rubrics">
                        <form action="">
                            <div class="modal-header">
                                <h5 class="modal-title">Rubrics</h5>
                            </div>
                            <div class="modal-body">
                                <iframe class="p-1" src="" frameborder="1" style="width:100%; height:500px;" id="submissionRubrics"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn viewBtn" data-bs-toggle="modal" data-bs-target="#submissionAssessment">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--->
            <!--view page view submission-->
            <div class="modal fade" tabindex="-1" id="submissionAssessment" data-bs-backdrop="static">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content" id="assessment-body">
                        <div class="modal-header">
                            <h5 class="modal-title">Submission | <span class="text-capitalize" id="submissionName"></span> | <span id="submissionSubject"></span> | <span id="submissionYear"></span></h5>
                            <button type="button" class="btn-close dismissSubmission" data-bs-toggle="modal" data-bs-target="#viewAssessments" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form data-action="{{ route('tutor.grade.assessment') }}" method="POST" enctype="multipart/form-data" id="gradeSubmissionForm">
                                @csrf
                                <input type="hidden" value="" name="assessment_id" id="submissionId">
                                <input type="hidden" value="" name="guardian_id" id="submissionGuardianId">
                                <input type="hidden" value="" name="child_id" id="submissionChildId">
                                <div class="row row-cols-auto mb-3">
                                    <div class="col-12 col-lg-7 order-lg-1 order-2 mb-3">
                                        <h6 class="mb-0 text-break" id="submissionTitle"></h6>
                                        <hr class="border-black border-2 opacity-75">
                                        <div class="shadow-sm p-3 rounded-4 text-break mb-3" style="height:180px; max-height:180px; overflow-y:auto; white-space: pre-wrap;" id="submissionDescription">

                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 order-lg-2 order-1 mb-3">
                                        <h6 class="mb-0">Details & Information</h6>
                                        <hr class="border-black border-2 opacity-75">
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#calendar" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Due Date:</p>
                                                <p class="mb-0" id="submissionDeadline"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#attempt" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Attempts Used:</p>
                                                <p class="mb-0" id="submissionAttempts"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#submission" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Submission Status:</p>
                                                <p class="mb-0" id="submissionStatus"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#rubric" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Rubrics:</p>
                                                <button type="button" class="btn viewbtn" data-bs-toggle="modal" data-bs-target="#submissionRubric">View Rubrics</button>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#star" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Grading: <span class="text-success" id="submissionGradeText"></span></p>
                                                <div class="d-flex align-items-center" id="submissionGrade">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 order-lg-3 order-3 mb-3">
                                        <h6 class="text-center fw-semibold">Evaluation</h6>
                                        <div class="d-flex flex-column align-items-center gap-2">
                                            <span class="eval-star-container">
                                                <input type="hidden" value="" name="submission_grade" id="submissionEval" required>
                                                @foreach ($mark as $data)
                                                <svg class="eval-star {{$data->id}}" data-value="{{$data->id}}" height="40" width="40">
                                                    <use xlink:href="#star" />
                                                </svg>
                                                @endforeach
                                            </span>
                                            <p class="mb-0">1 Nice | 2 Good | 3 Very Good | 4 Excellent | 5 Outstanding</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <h6 class="fw-semibold">Submission Preview</h6>
                            <iframe class="p-1" src="" frameborder="1" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" style="width:100%; height:500px; border: 1px solid black;" id="submissionPreview"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn viewBtn dismissSubmission" data-bs-toggle="modal" data-bs-target="#viewAssessments">Close</button>
                            <button type="submit" class="btn submitBtn " id="submitGradeBtn">Submit Grade</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--END OF MODALS-->
        </div>
    </main>
</body>

<script>
    $(document).ready(function() {
        loadAssessments();
        minDeadline();
        dropDowns();
    });

    function dropDowns() {
        //change radio texts when selected
        const dropdownButtons = document.querySelectorAll('.filter-btn');
        const radioInputs = document.querySelectorAll('.radio');
        radioInputs.forEach((radio) => {
            radio.addEventListener('change', (e) => {
                // Get the selected radio input's label text
                const selectedText = e.target.nextElementSibling.textContent.trim();

                // Get the corresponding dropdown button
                const dropdownButton = e.target.closest('.dropdown-center').querySelector('.filter-btn');

                // Update the dropdown button's text
                dropdownButton.textContent = selectedText;

                // Close the dropdown
                const dropdown = bootstrap.Dropdown.getInstance(dropdownButton);
                dropdown.hide();
            });
        });
    }
    //
    function minDeadline() {
        var currentDate = new Date();
        var currentDateTime = currentDate.getFullYear() + '-' +
            ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
            ('0' + currentDate.getDate()).slice(-2) + 'T' +
            ('0' + currentDate.getHours()).slice(-2) + ':' +
            ('0' + currentDate.getMinutes()).slice(-2);

        $('#inputDeadline').attr('min', currentDateTime);
    }
    //load 
    function loadAssessments() {
        $.ajax({
            type: "GET",
            url: "{{ route('tutor.load.assessment') }}",
            beforeSend: function() {
                var spinner = $('#loading');
                spinner.removeClass('d-none');
            },
            success: function(data) {
                //console.log(data);
                var spinner = $('#loading');
                spinner.addClass('d-none');
                if (!data.length) {
                    $('#noSession').removeClass('d-none');
                } else {
                    $('#noSession').addClass('d-none');
                }
                buildAssessments(data);
            }
        })
    }

    function buildAssessments(data) {
        var assessmentTable = $('#assessmentTable');
        assessmentTable.empty();

        const sessionStatus = {
            '1': 'text-primary',
            '2': 'text-success',
            '3': 'text-danger',
        }

        $.each(data, function(index, value) {
            //console.log(value);

            let id = value.id;
            let tutorMainID = value.tutor_main_id;
            let guardianID = value.guardian_main.guardian.user_profile.id;
            let childID = value.guardian_main.child.id;
            let childName = value.guardian_main.child.fname + " " + value.guardian_main.child.lname;
            let guardianName = value.guardian_main.guardian.user_profile.fname + " " + value.guardian_main.guardian.user_profile.lname;
            let subject = value.tutor_main.department_year_subject.subject.subjects;
            let year = value.tutor_main.department_year_subject.grade_level.year;
            let sessionType = value.tutor_main.tutor.employment_session.session_type.type;
            let tutorSessionId = value.session_status_id;
            let tutorSessionStatus = value.session_status.status;

            let tableData = `
                <tr class="text-center">
                    <td class="text-capitalize">${childName}</td>
                    <td class="text-capitalize">${guardianName}</td>
                    <td>${subject}</td>
                    <td>${sessionType}</td>
                    <td class="${sessionStatus[tutorSessionId]}">${tutorSessionStatus}</td>
                    <td class="d-flex justify-content-center">
                        <div class="hstack align-items-center gap-3">
                            <button class="btn submitBtn create-assessment d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#createAssessment" data-create-child-id="${childID}" data-create-guardian-id="${guardianID}" data-create-form-id="${id}" data-create-name="${childName}" data-create-subject="${subject}" data-create-year="${year}">
                            <svg fill="currentcolor" height="20" width="20">
                                <use xlink:href="#add" />
                            </svg>
                            Create Assessment
                            </button>
                            <button class="btn viewBtn view-assessment d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#viewAssessments" data-view-child-id="${childID}" data-view-guardian-id="${guardianID}" data-tutor-session-view-id="${id}" data-view-name="${childName}" data-view-subject="${subject}" data-view-year="${year}">
                             <svg fill="currentcolor" height="20" width="20">
                                <use xlink:href="#task" />
                            </svg>
                            View Assessments
                            </button>
                        </div>
                    </td>
                </tr>
                `;
            assessmentTable.append(tableData);
        })
    }
    //
    //create assessment
    $('#assessmentTable').on('click', '.create-assessment', function() {
        var tutorSessionId = $(this).data('create-form-id');
        var childName = $(this).data('create-name');
        var subject = $(this).data('create-subject');
        var year = $(this).data('create-year');
        var childId = $(this).data('create-child-id');
        var guardianId = $(this).data('create-guardian-id');


        $('#createYear').html(year);
        $('#createSubject').html(subject);
        $('#createChildName').html(childName);
        $('#tutorSessionId').val(tutorSessionId);
        $('#childId').val(childId);
        $('#guardianId').val(guardianId);
        var hiddenID = $('#tutorSessionId').val();
       // console.log('hidden', hiddenID, 'child', childId, 'guardian', guardianId);
    })

    $('.dismissCreate').on('click', function() {
        dismissCreate();
    })

    function dismissCreate() {
        $('#createSubject').html('');
        $('#tutorSessionId').val('');
        $('#createChildName').html('');
        $('#rubrics').val(''); // reset the file input value
        $('#filePreview').attr('src', 'about:blank'); // reset the iframe src
    }

    $('.viewDismissCreate').on('click', function() {
        viewDismissCreate();
    })

    function viewDismissCreate() {
        $('#viewCreateSubject').html('');
        $('#viewTutorSessionId').val('');
        $('#viewCreateChildName').html('');
        $('#viewCreateRubrics').val(''); // reset the file input value
        $('#ViewCreateFilePreview').attr('src', 'about:blank'); // reset the iframe src
    }

    $('#module').on('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var iframe = $('#filePreview');
            iframe.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    })

    $('#viewCreateModule').on('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var iframe = $('#ViewCreateFilePreview');
            iframe.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    })

    $('#viewCreateAsessmentBtn').on('click', function() {
        var viewTutorSessionId = $(this).attr('data-view-create-form-id');
        var viewChildName = $(this).attr('data-view-create-name');
        var viewSubject = $(this).attr('data-view-create-subject');
        var viewYear = $(this).attr('data-view-create-year');
        var viewChildId = $(this).attr('data-view-create-child-id');
        var viewGuardianId = $(this).attr('data-view-create-guardian-id');

        //console.log('viewTutorSessionId:', viewTutorSessionId);
        //console.log('viewChildName:', viewChildName);
        //console.log('viewSubject:', viewSubject);
        //console.log('viewYear:', viewYear);
       // console.log('viewChildId:', viewChildId);
        //console.log('viewGuardianId:', viewGuardianId);

        $('#viewCreateSubject').html(viewSubject);
        $('#viewCreateChildName').html(viewChildName);
        $('#viewCreateYear').html(viewYear);
        $('#viewTutorSessionId').val(viewTutorSessionId);
        $('#viewChildId').val(viewChildId);
        $('#viewGuardianId').val(viewGuardianId);

        var hiddenID = $('#viewTutorSessionId').val();
        //console.log('viewHidden', hiddenID, 'viewName', viewChildName);
    })

    $('#submitViewCreateAsssessment').on('click', function() {
        var title = $('#viewCreateAssessmentForm input[name="title"]');
        var deadline = $('#viewCreateAssessmentForm input[name="deadline"]');
        var visibility = $('#viewCreateAssessmentForm select[name="visibility"]');
        var description = $('#viewCreateAssessmentForm textarea[name="description"]');
        var rubrics = $('#viewCreateAssessmentForm input[name="rubrics"]');

        if (title.val().trim() === "") {
            alert("Please enter the title of the assessment");
            return;
        }
        if (!deadline.val()) {
            alert("Please enter the deadline of the assessment");
            return;
        }
        if (!visibility.val()) {
            alert("Please select the visibility of the assessment");
            return;
        }
        if (!description.length || description.val().trim() === "") {
            alert("Please enter the description of the assessment");
            return;
        }
        if (rubrics.val() === "") {
            alert("Please upload the rubrics of the assessment");
            return;
        }
        $('#viewCreateAssessmentForm').submit();


    })

    $('#submitCreateAsssessment').on('click', function() {
        var title = $('#createAssessmentForm input[name="title"]');
        var deadline = $('#createAssessmentForm input[name="deadline"]');
        var visibility = $('#createAssessmentForm select[name="visibility"]');
        var description = $('#createAssessmentForm textarea[name="description"]');
        var rubrics = $('#createAssessmentForm input[name="rubrics"]');

        if (title.val().trim() === "") {
            alert("Please enter the title of the assessment");
            return;
        }
        if (!deadline.val()) {
            alert("Please enter the deadline of the assessment");
            return;
        }
        if (!visibility.val()) {
            alert("Please select the visibility of the assessment");
            return;
        }
        if (!description.length || description.val().trim() === "") {
            alert("Please enter the description of the assessment");
            return;
        }
        if (rubrics.val() === "") {
            alert("Please upload the rubrics of the assessment");
            return;
        }
        $('#createAssessmentForm').submit();
    })

    $('#viewCreateAssessmentForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).data('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#viewCreateAsssessment').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#viewCreateAsssessment').prop('disabled', false);
                    $('#viewCreateAssessmentForm')[0].reset();
                    $('#viewCreateAssessment').modal('hide');
                    viewDismissCreate();
                    viewAssessments();
                    $('#viewAssessments').modal('show');


                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {
                    $('#viewCreateAsssessment').prop('disabled', true);
                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }

            },
            error: function(response) {
                $('#viewCreateAsssessment').prop('disabled', false);
            }
        })
    })

    $('#createAssessmentForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).data('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#submitCreateAsssessment').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#createAssessmentForm')[0].reset();
                    dismissCreate();
                    $('#submitCreateAsssessment').prop('disabled', false);
                    $('#createAssessment').modal('hide');

                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {
                    $('#submitCreateAsssessment').prop('disabled', false);
                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }

            },
            error: function(response) {
                $('#submitCreateAsssessment').prop('disabled', false);
            }
        })
    })
    //
    //view assessments
    $('#assessmentTable').on('click', '.view-assessment', function() {
        var tutorSessionId = $(this).data('tutor-session-view-id');
        var childName = $(this).data('view-name');
        var subject = $(this).data('view-subject');
        var year = $(this).data('view-year');
        var childId = $(this).data('view-child-id');
        var guardianId = $(this).data('view-guardian-id');
        var viewCreateBtn = $('#viewCreateAsessmentBtn');

        viewCreateBtn.attr('data-view-create-form-id', '');
        viewCreateBtn.attr('data-view-create-name', '');
        viewCreateBtn.attr('data-view-create-subject', '');
        viewCreateBtn.attr('data-view-create-year', '');
        viewCreateBtn.attr('data-view-create-child-id', '');
        viewCreateBtn.attr('data-view-create-guardian-id', '');

        viewCreateBtn.attr('data-view-create-form-id', tutorSessionId);
        viewCreateBtn.attr('data-view-create-name', childName);
        viewCreateBtn.attr('data-view-create-subject', subject);
        viewCreateBtn.attr('data-view-create-year', year);
        viewCreateBtn.attr('data-view-create-child-id', childId);
        viewCreateBtn.attr('data-view-create-guardian-id', guardianId);

        //console.log('Updated tutorSessionId:', viewCreateBtn.attr('data-view-create-form-id'));
        //console.log('Updated childName:', viewCreateBtn.attr('data-view-create-name'));
        //console.log('Updated subject:', viewCreateBtn.attr('data-view-create-subject'));
       // console.log('Updated child:', viewCreateBtn.attr('data-view-create-child-id'));
        //console.log('Updated guardian:', viewCreateBtn.attr('data-view-create-guardian-id'));

        $('#viewStudentName').html(childName);
        $('#viewAssessmentID').val(tutorSessionId);
        viewAssessments();
    })

    function viewAssessments() {
        var tutorSessionId = $('#viewAssessmentID').val();
        $.ajax({
            type: "GET",
            url: "{{ route('tutor.view.assessment')}}",
            data: {
                tutorSessionID: tutorSessionId
            },
            beforeSend: function() {
                $('#viewLoading').removeClass('d-none');
            },
            success: function(data) {
               // console.log(data);
                $('#viewLoading').addClass('d-none');

                if (!data.length) {
                    $('#viewNoAsess').removeClass('d-none');
                } else {
                    $('#viewNoAsess').addClass('d-none');
                }
                buildViewAssessments(data);
            }
        })
    }

    function buildViewAssessments(data) {

        const submitStatusClass = {
            '1': 'text-success',
            '2': 'text-secondary',
            '3': 'text-danger',
        }
        const gradeStatusClass = {
            '1': 'text-success',
            '2': 'text-secondary'
        }

        var assessmentTable = $('#viewAssessmentsTable');

        assessmentTable.empty();


        $.each(data, function(index, value) {
            //console.log(value);
            //let tutorSessionID = value.tutor_sessions_id;
            let id = value.id;
            let title = value.title;
            let subject = value.subject.subjects;
            let yearLevel = value.tutor_session.tutor_main.department_year_subject.grade_level.year;
            let deadline = moment(value.deadline).format('M/D/YY, h:mm A');
            let submitStatusID = value.assessment_status_id;
            let submitStatus = value.assessment_status.status;
            let gradeStatusID = value.assessment_submission_grade[0].grade.grade_status_id;
            let gradeStatus = value.assessment_submission_grade[0].grade.grade_status.status;
            //let submissionID = value.assessment_submission_grade[0]?.submission_id ?? '';
            let childName = value.tutor_session.guardian_main.child.fname + ' ' + value.tutor_session.guardian_main.child.lname;




            let tableData = `
                <tr class="text-center" data-submission-id="${submitStatusID}" data-grade-id="${gradeStatusID}">
                    <td>${title}</td>
                    <td>${subject}</td>
                    <td>${deadline}</td>
                    <td class="${submitStatusClass[submitStatusID]}">${submitStatus}</td>
                    <td class="${gradeStatusClass[gradeStatusID]}">${gradeStatus}</td>   
                    <td class="d-flex justify-content-center">
                        <div class="">
                            <div class="hstack align-items-center gap-2">
                                <button class="btn submitBtn view-assessment d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#submissionAssessment" data-submission-id="${id}" data-submission-name="${childName}" data-submission-subject="${subject}" data-submission-year="${yearLevel}">
                                    <svg fill="currentcolor" height="20" width="20">
                                        <use xlink:href="#submission" />
                                    </svg>
                                    View Submission
                                </button>
                                <button ${submitStatusID == 2 ? '' : 'disabled'} class="btn viewBtn edit-assessment d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#editAssessment" data-assessment-id="${id}" data-assessment-name="${childName}" data-assessment-subject="${subject}" data-assessment-year="${yearLevel}">
                                    <svg fill="currentcolor" height="20" width="20">
                                        <use xlink:href="#edit" />
                                    </svg>
                                    Edit
                                </button>
                                <button ${submitStatusID == 2 ? '' : 'disabled'} class="btn viewBtn delete-assessment d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#deleteAssessmentModal" data-assessment-id="${id}">
                                    <svg fill="currentcolor" height="20" width="20">
                                        <use xlink:href="#delete" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                `;
            assessmentTable.append(tableData);
        })
    }

    $('.dismissView').on('click', function() {
        $('#viewStudentName').html('');
        $('#viewAssessmentsTable').html('');
        $('#viewNoAsess').addClass('d-none');
    })
    //
    //edit assessment
    $('#viewAssessmentsTable').on('click', '.edit-assessment', function() {
        var assessmentId = $(this).data('assessment-id');
        var childName = $(this).data('assessment-name');
        var subject = $(this).data('assessment-subject');
        var year = $(this).data('assessment-year');

        $('#editYear').html(year);
        $('#editSubject').html(subject);
        $('#editChildName').html(childName);
        $('#editTutorSessionId').val(assessmentId);

        var hiddenID = $('#editTutorSessionId').val();
       // console.log('hidden', hiddenID);
        loadEditAssessments();
    })

    function loadEditAssessments() {
        var tutorSessionId = $('#editTutorSessionId').val();
       // console.log(tutorSessionId);
        $.ajax({
            type: "GET",
            url: "{{ route('tutor.load.edit.assessment')}}",
            data: {
                tutorSessionID: tutorSessionId
            },
            success: function(data) {
               // console.log(data);
                buildEditAssessments(data);
            }
        })
    }

    function buildEditAssessments(data) {
        let title = $('#editTitle');
        let description = $('#editDescription');
        let modules = $('#editFilePreview');
        let deadline = $('#editDeadline');
        let visibility = $('#editVisibility');

        let titleTEXT = data.title;
        let descriptionTEXT = data.description;
        let moduleSrc = data.module;
        let deadlineTEXT = moment(data.deadline).format('YYYY-MM-DDTHH:mm');
        let visibilityId = data.assessment_visibility_status_id;
        //console.log(visibilityId);

        title.val(titleTEXT);
        description.text(descriptionTEXT);
        modules.attr('src', moduleSrc);
        deadline.val(deadlineTEXT);
        visibility.val(visibilityId);
    }
    $('#submitEditAssessment').on('click', function() {

        var title = $('#editAssessmentForm input[name="title"]');
        var deadline = $('#editAssessmentForm input[name="deadline"]');
        var visibility = $('#editAssessmentForm select[name="visibility"]');
        var description = $('#editAssessmentForm textarea[name="description"]');

        if (title.val().trim() === "") {
            alert("Please enter the title of the assessment");
            return;
        }
        if (!deadline.val()) {
            alert("Please enter the deadline of the assessment");
            return;
        }
        if (!visibility.val()) {
            alert("Please select the visibility of the assessment");
            return;
        }
        if (!description.length || description.val().trim() === "") {
            alert("Please enter the description of the assessment");
            return;
        }
        $('#editAssessmentForm').submit();
    })

    $('#editAssessmentForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).data('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#submitEditAssessment').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#submitEditAssessment').prop('disabled', false);
                    $('#editAssessmentForm')[0].reset();
                    $('#editAssessment').modal('hide');
                    $('#viewAssessments').modal('show');
                    dismissEdit();
                    viewAssessments();

                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {

                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                    $('#submitEditAssessment').prop('disabled', false);
                    $('#editAssessmentForm')[0].reset();
                    $('#editAssessment').modal('hide');
                    $('#viewAssessments').modal('show');
                    dismissEdit();
                    viewAssessments();
                }

            },
            error: function(response) {
                $('#submitEditAssessment').prop('disabled', false);
            }
        })
    })

    $('.dismissEdit').on('click', function() {
        dismissEdit();
    })

    function dismissEdit() {
        let title = $('#editTitle');
        let description = $('#editDescription');
        let modules = $('#editFilePreview');
        let deadline = $('#editDeadline');
        let visibility = $('#editVisibility');

        title.val('');
        description.text('');
        modules.attr('src', '');
        deadline.val('');
        visibility.val('');
    }
    $('#editModule').on('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var iframe = $('#editFilePreview');
            iframe.attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    })
    //
    //delete assessment
    $('#viewAssessmentsTable').on('click', '.delete-assessment', function() {
        var deleteAssessmentId = $(this).attr('data-assessment-id');
        $('#deleteAssessmentID').val(deleteAssessmentId);

        var hiddenDelete = $('#deleteAssessmentID').val();
        //console.log('delete assessment', hiddenDelete);
    })
    $('#deleteAssessmentForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).data('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#deleteAssessmentForm').find('[type="submit"]').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#deleteAssessmentForm')[0].reset();
                    $('#deleteAssessmentForm').find('[type="submit"]').prop('disabled', false);
                    $('#deleteAssessmentModal').modal('hide');
                    $('#viewAssessments').modal('show');
                    viewAssessments();

                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {

                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                    $('#deleteAssessmentForm')[0].reset();
                    $('#deleteAssessmentForm').find('[type="submit"]').prop('disabled', false);
                    $('#deleteAssessmentModal').modal('hide');
                    $('#viewAssessments').modal('show');
                }

            },
            error: function(response) {
                if (response.error) {
                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
                $('#deleteAssessmentForm').find('[type="submit"]').prop('disabled', false);
                $('#deleteAssessmentModal').modal('hide');
                $('#viewAssessments').modal('show');
            }
        })
    })
    //
    //submission view and grading assessment
    $('.eval-star').on('mouseenter', function() {
        // Remove the 'selected' class from all stars (so they don't interfere with the hover effect)
        $('.eval-star').removeClass('selected-hover');

        // Highlight the current star and all previous stars on hover
        $(this).prevAll().addBack().addClass('selected-hover');
    });

    // Reset hover effect when the mouse leaves the star container
    $('.eval-star').on('mouseleave', function() {
        // Remove hover highlight
        $('.eval-star').removeClass('selected-hover');

        // Re-apply the 'selected' class to stars that were clicked
        $('.eval-star.selected').prevAll().addBack().addClass('selected');
    });

    // Handle click event on any star
    $('.eval-star').on('click', function() {
        // Get the value from the clicked star's data-value attribute
        var starValue = $(this).data('value');

        // Set the value into the hidden input
        $('#submissionEval').val(starValue);

        // Remove 'selected' class from all stars
        $('.eval-star').removeClass('selected');

        // Add 'selected' class to the clicked star and all previous ones
        $(this).prevAll().addBack().addClass('selected'); // Highlight clicked star and all previous stars
    });

    $('#viewAssessmentsTable').on('click', '.view-assessment', function() {
        var assessmentId = $(this).data('submission-id');
        var childName = $(this).data('submission-name');
        var subject = $(this).data('submission-subject');
        var year = $(this).data('submission-year');

        $('#submissionYear').html(year);
        $('#submissionSubject').html(subject);
        $('#submissionName').html(childName);
        $('#submissionId').val(assessmentId);

        var hiddenID = $('#submissionId').val();
       // console.log('hidden', hiddenID);
        loadSubmission();
    })

    function loadSubmission() {
        var tutorSessionId = $('#submissionId').val();
        //console.log(tutorSessionId);
        $.ajax({
            type: "GET",
            url: "{{ route('tutor.load.edit.assessment')}}",
            data: {
                tutorSessionID: tutorSessionId
            },
            success: function(data) {
               // console.log(data);
                buildSubmission(data);
            }
        })
    }

    function buildSubmission(data) {

        const submissionStatus = {
            '1': 'text-success',
            '2': 'text-secondary',
            '3': 'text-danger',
        }

        let id = data.id;
        let guardianId = data.tutor_session.guardian_main.guardian.user_profile_id;
        let childId = data.tutor_session.guardian_main.child_id;
        let submission_status = data.assessment_status.status;
        let submission_statusID = data.assessment_status_id;
        let attempts = 2 - data.attempts;
        let title = data.title;
        let deadline = moment(data.deadline).format('M/D/YY, h:mm A');
        let description = data.description;
        let rubrics = data.rubrics;
        let submittedWork = data.assessment_submission_grade[0]?.submission?.submission ?? '';
        let grade = data.assessment_submission_grade[0]?.grade?.mark_id ?? '';
        let gradeText = data.assessment_submission_grade[0]?.grade?.mark?.mark ?? '';

        let stars = `
            <svg class="star ${grade >= 1 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade >= 2 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade >= 3 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade >= 4 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            <svg class="star ${grade == 5 ? 'active' : ''}" height="25" width="25">
                <use xlink:href="#star" />
            </svg>
            `;


        let titleTEXT = $('#submissionTitle');
        let descriptionTEXT = $('#submissionDescription');
        let deadlineTEXT = $('#submissionDeadline');
        let attemptsTEXT = $('#submissionAttempts');
        let rubricsIframe = $('#submissionRubrics');
        let submissionStatusTEXT = $('#submissionStatus');
        let grading = $('#submissionGrade');
        let gradeTEXT = $('#submissionGradeText');
        let gradeEval = $('#submissionEval');
        let iframe = $('#submissionPreview');
        let evalStar = $('.eval-star-container');
        let guardianInput = $('#submissionGuardianId');
        let childInput = $('#submissionChildId');

        guardianInput.val('');
        childInput.val('');
        titleTEXT.html('');
        descriptionTEXT.html('');
        deadlineTEXT.html('');
        attemptsTEXT.html('');
        rubricsIframe.attr('src', 'about:blank');
        submissionStatusTEXT.html('');
        submissionStatusTEXT.removeClass();
        iframe.attr('src', 'about:blank'); // reset the iframe src
        gradeEval.val();
        grading.html('');
        gradeTEXT.html('');
        evalStar.find('svg').removeClass('selected');


        if (grade) {
            let selectedStar = evalStar.find('svg[data-value="' + grade + '"]');

            selectedStar.prevAll().addBack().addClass('selected');
        }

        guardianInput.val(guardianId);
        childInput.val(childId);
        attemptsTEXT.html(attempts);
        titleTEXT.html(title);
        descriptionTEXT.html(description);
        deadlineTEXT.html(deadline);
        rubricsIframe.attr('src', rubrics);
        iframe.attr('src', submittedWork);
        submissionStatusTEXT.html(submission_status);
        submissionStatusTEXT.addClass(submissionStatus[submission_statusID]);
        gradeEval.val(grade);
        gradeTEXT.html(gradeText);
        grading.append(stars);
    }

    $('.dismissSubmission').on('click', function() {
        dismissSubmission();
    })

    function dismissSubmission() {
        let titleTEXT = $('#submissionTitle');
        let descriptionTEXT = $('#submissionDescription');
        let deadlineTEXT = $('#submissionDeadline');
        let attemptsTEXT = $('#submissionAttempts');
        let rubricsIframe = $('#submissionRubrics');
        let submissionStatusTEXT = $('#submissionStatus');
        let grading = $('#submissionGrade');
        let gradeTEXT = $('#submissionGradeText');
        let gradeEval = $('#submissionEval');
        let iframe = $('#submissionPreview');
        let evalStar = $('.eval-star-container');
        let guardianInput = $('#submissionGuardianId');
        let childInput = $('#submissionChildId');

        guardianInput.val('');
        childInput.val('');
        titleTEXT.html('');
        descriptionTEXT.html('');
        deadlineTEXT.html('');
        attemptsTEXT.html('');
        rubricsIframe.attr('src', 'about:blank');
        submissionStatusTEXT.html('');
        submissionStatusTEXT.removeClass();
        iframe.attr('src', 'about:blank'); // reset the iframe src
        gradeEval.val('');
        grading.html('');
        gradeTEXT.html('');
        evalStar.find('svg').removeClass('selected');
    }

    $('#submitGradeBtn').on('click', function() {
        
        var gradeInput = $('#gradeSubmissionForm input[name="submission_grade"]');
        
        if(gradeInput.val() == 0){
            alert('Please input grade');
            return;
        } 
        $('#gradeSubmissionForm').submit();
        
        
    })

    $('#gradeSubmissionForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).data('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#submitGradeBtn').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#submitGradeBtn').prop('disabled', false);
                    $('#gradeSubmissionForm')[0].reset();
                    $('#submissionAssessment').modal('hide');
                    $('#viewAssessments').modal('show');
                    dismissSubmission();
                    viewAssessments();

                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {

                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#view-alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                    $('#submitGradeBtn').prop('disabled', false);
                    $('#gradeSubmissionForm')[0].reset();
                    $('#submissionAssessment').modal('hide');
                    $('#viewAssessments').modal('show');
                    dismissSubmission();
                    viewAssessments();
                }

            },
            error: function(response) {
                $('#submitGradeBtn').prop('disabled', false);
            }
        })
    })
    //
    //search
    $('#AsessmentSearch').on('keyup', function() {
        var searchQuery = $(this).val().trim();
        var clearBtn = $('#ClearSearch');
        var searchBox = $('#AsessmentSearch');

        if (searchQuery != '') {
            searchContacts(searchQuery);
            clearBtn.removeClass('d-none');
            searchBox.removeClass('rounded-end-3');
        } else {
            clearSearchResults();
        }
    });

    $('#ClearSearch').on('click', function() {
        clearSearchResults();
    });

    function clearSearchResults() {
        var searchBox = $('#AsessmentSearch');
        var clearBtn = $('#ClearSearch');
        var noResult = $('#noSearch');
        var assessmentTable = $('#assessmentTable');
        searchBox.val('');
        searchBox.addClass('rounded-end-3');
        clearBtn.addClass('d-none');
        noResult.addClass('d-none');
        assessmentTable.empty();
        loadAssessments();
    };

    function searchContacts(searchQuery) {
        $.ajax({
            type: 'GET',
            url: "{{ route('tutor.search.assessment') }}",
            data: {
                query: searchQuery
            },
            beforeSend: function() {
                var spinner = $('#loading');
                spinner.removeClass('d-none');
            },
            success: function(data) {
                var spinner = $('#loading');
                spinner.removeClass('d-none');

                if (!data.length) {
                    $('#noSearch').removeClass('d-none');

                    if(!$('#noSession').hasClass('d-none')){
                        $('#noSession').addClass('d-none');
                    }

                } else {
                    $('#noSearch').addClass('d-none');
                }
                displaySearchResults(data);
            },
            complete: function() {
                var spinner = $('#loading');
                spinner.addClass('d-none');

                var noResults = $('#loading');
                noResults.addClass('d-none');
            }
        })
    };

    function displaySearchResults(data) {

        var spinner = $('#loading');
        spinner.removeClass('d-none');

        var assessmentTable = $('#assessmentTable');
        assessmentTable.empty();

        const sessionStatus = {
            '1': 'text-primary',
            '2': 'text-success',
            '3': 'text-danger',
        }

        $.each(data, function(index, value) {
            //console.log(value);
            let id = value.id;
            let tutorMainID = value.tutor_main_id;
            let guardianMainID = value.guardian_main_id;
            let childID = value.guardian_main.child.id;
            let childName = value.guardian_main.child.fname + " " + value.guardian_main.child.lname;
            let guardianName = value.guardian_main.guardian.user_profile.fname + " " + value.guardian_main.guardian.user_profile.lname;
            let subject = value.tutor_main.department_year_subject.subject.subjects;
            let sessionType = value.tutor_main.tutor.employment_session.session_type.type;
            let tutorSessionId = value.session_status_id;
            let tutorSessionStatus = value.session_status.status;

            let tableData = `
                <tr class="text-center">
                    <td class="text-capitalize">${childName}</td>
                    <td class="text-capitalize">${guardianName}</td>
                    <td>${subject}</td>
                    <td>${sessionType}</td>
                    <td class="${sessionStatus[tutorSessionId]}">${tutorSessionStatus}</td>
                    <td class="d-flex justify-content-center">
                        <div class="hstack align-items-center gap-3">
                            <button class="btn submitBtn create-assessment d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#createAssessment" data-create-form-id="${id}" data-create-name="${childName}" data-create-subject="${subject}">
                            <svg fill="currentcolor" height="20" width="20">
                                <use xlink:href="#add" />
                            </svg>
                            Create Assessment
                            </button>
                            
                            <button class="btn viewBtn view-assessment d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#viewAssessments" data-tutor-session-view-id="${id}" data-view-name="${childName}" data-view-subject="${subject}">
                                <svg fill="currentcolor" height="20" width="20">
                                <use xlink:href="#task" />
                            </svg>
                            View Assessments
                            </button>
                        </div>
                    </td>
                </tr>
                `;

            assessmentTable.append(tableData);
        });

    };
    //
    //filter 
    $('input[name="filterSubmit"], input[name="filterGrade"]').on('change', function() {
        let subId = $('input[name="filterSubmit"]:checked').val();
        let levelId = $('input[name="filterGrade"]:checked').val();

        $('#viewAssessmentsTable tr').hide();

        if (subId && levelId) {
            $('#viewAssessmentsTable tr[data-submission-id="' + subId + '"][data-grade-id="' + levelId + '"]').show();
        } else if (subId) {
            $('#viewAssessmentsTable tr[data-submission-id="' + subId + '"]').show();
        } else if (levelId) {
            $('#viewAssessmentsTable tr[data-grade-id="' + levelId + '"]').show();
        } else {
            $('#viewAssessmentsTable tr').show();
        }
    });

    $('#clear-filter').on('click', function() {
        var filterSub = $('#filterSubmitDrop');
        var filterLevel = $('#filterGradeDrop');

        filterSub.text('Submission Status');
        filterLevel.text('Grade Status');
        filterSub.dropdown('hide');
        filterLevel.dropdown('hide');
        $('input[name="filterSubmit"], input[name="filterGrade"]').prop('checked', false);
        $('#viewAssessmentsTable tr').show(); // modified to show all table rows
    });
    //
</script>

</html>
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

    .viewBtn {
        border-color: #759C75 !important;
        color: black !important;
        transition: all 0.3s ease !important;
    }

    .viewBtn:hover {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        color: white !important;
    }

    .submitBtn {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        color: white !important;
        transition: all 0.3s ease !important;
    }

    .submitBtn:hover {
        border-color: #99CC99 !important;
        background-color: #99CC99 !important;
        color: black !important;
    }

    #ClearSearch:hover {
        .close-icon {
            fill: #99CC99 !important;
            transition: all 0.3s ease-in-out;
        }
    }

    .filter-btn {
        color: black;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        width: 240px !important
    }

    .filter-btn.pref {
        color: white;
        cursor: default !important;
        pointer-events: none !important;
        background-color: #759C75;
    }

    .filter-btn.submit:hover {
        color: white !important;
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        transition: all 0.2s ease-in-out;
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
    }

    .filter-item {
        background-color: white !important;
        color: black;
        width: 100%;
        cursor: pointer;
    }

    .form-check input {
        border-color: black !important;
    }

    .form-check input:checked {
        background-color: #759C75 !important;
        transition: all 0.3s ease;
    }

    .star {
        fill: currentColor;
    }

    .star.active {
        fill: gold;
    }

    .eval-star {
        fill: currentcolor;
        /* Default color */
        transition: fill 0.3s ease;
        /* Smooth transition */
        cursor: pointer;
        /* Show pointer on hover */
    }

    .eval-star.selected {
        fill: gold;
        /* Keep selected stars gold */
    }

    .eval-star.selected-hover {
        fill: gold;
        /* Keep selected stars gold */
    }

    .eval-star:hover,
    .eval-star:hover~.eval-star {
        fill: gold;
        /* Highlight hovered star and all to the left (this includes the current star and all previous stars) */
    }

    /* Reset the right-side stars when hovering over a new star */
    .eval-star:hover~.eval-star {
        fill: currentcolor;
        /* Reset the stars to the right to the default color */
    }
</style>