@extends('layouts.headadminmaster')
@section('content')
@php
$page = "Manage Content";
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
        <symbol id="pending" viewBox="0 -960 960 960">
            <title>pending</title>
            <path d="M280-420q25 0 42.5-17.5T340-480q0-25-17.5-42.5T280-540q-25 0-42.5 17.5T220-480q0 25 17.5 42.5T280-420Zm200 0q25 0 42.5-17.5T540-480q0-25-17.5-42.5T480-540q-25 0-42.5 17.5T420-480q0 25 17.5 42.5T480-420Zm200 0q25 0 42.5-17.5T740-480q0-25-17.5-42.5T680-540q-25 0-42.5 17.5T620-480q0 25 17.5 42.5T680-420ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="download" viewBox="0 -960 960 960">
            <title>download</title>
            <path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
        </symbol>
        <symbol id="upload" viewBox="0 -960 960 960">
            <title>upload</title>
            <path d="M440-320v-326L336-542l-56-58 200-200 200 200-56 58-104-104v326h-80ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
        </symbol>
        <symbol id="topics" viewBox="0 -960 960 960">
            <title>topics</title>
            <path d="M360-200v-80h480v80H360Zm0-240v-80h480v80H360Zm0-240v-80h480v80H360ZM200-160q-33 0-56.5-23.5T120-240q0-33 23.5-56.5T200-320q33 0 56.5 23.5T280-240q0 33-23.5 56.5T200-160Zm0-240q-33 0-56.5-23.5T120-480q0-33 23.5-56.5T200-560q33 0 56.5 23.5T280-480q0 33-23.5 56.5T200-400Zm0-240q-33 0-56.5-23.5T120-720q0-33 23.5-56.5T200-800q33 0 56.5 23.5T280-720q0 33-23.5 56.5T200-640Z" />
        </symbol>
        <symbol id="add" viewBox="0 -960 960 960">
            <title>add</title>
            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
        </symbol>
        <symbol id="images" viewBox="0 -960 960 960">
            <title>images</title>
            <path d="M360-400h400L622-580l-92 120-62-80-108 140Zm-40 160q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
        </symbol>
        <symbol id="delete" viewBox="0 -960 960 960">
            <title>delete</title>
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
        </symbol>
        <symbol id="edit" viewBox="0 -960 960 960">
            <title>edit</title>
            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
        </symbol>
        <symbol id="manage" viewBox="0 -960 960 960">
            <title>manage</title>
            <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
        </symbol>
    </svg>
</head>

<body>
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Manage Content</h4>
            </div>
            <section class="mb-4">
                <div class="vstack gap-2 d-flex align-items-center w-100">
                    <div class="profile-pic">
                        <img src="" alt="" width="100" height="100" style="object-fit:cover;object-position:50% 50%;border-radius:50%" id="cmsLogo">
                    </div>
                    <h3 class="fw-semibold text-capitalize text-center">Content Management System</h3>
                </div>
            </section>
            <div class="d-flex w-100 justify-content-end" id="alert-div"></div>
            <div class="row row-cols-auto">
                <div class="col-12 col-lg-2">
                    <!--nav tabs-->
                    <ul class="nav nav-pills gap-2 nav-justified flex-lg-column w-100 p-2" id="cms-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#content-tab-pane" type="button" role="tab" aria-controls="contents-tab">Contents</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#rates-tab-pane" type="button" role="tab" aria-controls="rates-tab">Rates</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#subjects-tab-pane" type="button" role="tab" aria-controls="subjects-tab">Subjects</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#organization-tab-pane" type="button" role="tab" aria-controls="organization-tab">Organization</button>
                        </li>
                    </ul>
                    <!---->
                </div>
                <div class="col-12 col-lg-10">
                    <div class="tab-content px-2 py-1" id="cms-tab-content">
                        <div class="tab-pane fade show active" id="content-tab-pane" role="tabpanel" aria-labelledby="contents-tab" tabindex="0"> <!--CONTENTS TAB-->
                            <form data-action="{{ route('cms.update.content') }}" method="POST" class="m-0 p-0" enctype="multipart/form-data" id="updateContentForm">
                                @csrf
                                <section class="tab-sections p-3 mb-3">
                                    <div class="row row-cols-auto">
                                        <!--Text and images in home-->
                                        <div class="col-12 col-md">
                                            <h5 class="mb-3">Home Page</h5>
                                            <hr class="border-2 border-black opacity-75">
                                            <div class="vstack gap-3 mb-3">
                                                <img src="" loading="lazy" alt="home page image" height="175" width="180" id="homeIMG"> <!--HOME IMAGE-->
                                                <div>
                                                    <label>Home Page Image </label>
                                                    <input type="file" name="home_img" class="form-control" value="" accept="image/png, image/jpeg">
                                                    <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                                </div>
                                            </div>
                                            <div class="vstack gap-3 mb-3">
                                                <img src="" loading="lazy" alt="carousel 1 image" height="175" width="180" id="carousel1IMG"> <!--CAROUSEL 1 IMAGE-->
                                                <div>
                                                    <label>Carousel #1 Image </label>
                                                    <input type="file" name="carousel1_img" class="form-control" value="" accept="image/png, image/jpeg">
                                                    <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                                </div>
                                            </div>
                                            <div class="vstack gap-3 mb-3">
                                                <img src="" loading="lazy" alt="carousel 2 image" height="175" width="180" id="carousel2IMG"> <!--CAROUSEL 2 IMAGE-->
                                                <div>
                                                    <label>Carousel #2 Image </label>
                                                    <input type="file" name="carousel2_img" class="form-control" value="" accept="image/png, image/jpeg">
                                                    <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                                </div>
                                            </div>
                                            <div class="vstack gap-3 mb-3">
                                                <img src="" loading="lazy" alt="carousel 3 image" height="175" width="180" id="carousel3IMG"> <!--CAROUSEL 3 IMAGE-->
                                                <div>
                                                    <label>Carousel #3 Image </label>
                                                    <input type="file" name="carousel3_img" class="form-control" value="" accept="image/png, image/jpeg">
                                                    <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <!--Text and images in about-->
                                        <div class="col-12 col-md">
                                            <h5 class="mb-3">About Page</h5>
                                            <hr class="border-2 border-black opacity-75">
                                            <div class="vstack gap-3 mb-3">
                                                <img src="" loading="lazy" alt="about image" height="175" width="180" id="aboutIMG"> <!--ABOUT IMAGE-->
                                                <div>
                                                    <label>About Image </label>
                                                    <input type="file" name="about_img" class="form-control" value="" accept="image/png, image/jpeg">
                                                    <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                                </div>
                                            </div>
                                            <div class="vstack mb-3">
                                                <label>About Text </label>
                                                <textarea name="about_text" class="form-control" id="aboutTEXT" value="" rows="3"></textarea> <!--ABOUT TEXT-->
                                            </div>
                                        </div>
                                        <!---->
                                        <!--Text and images in programs-->
                                        <div class="col-12 col-md">
                                            <h5 class="mb-3">Programs Page</h5>
                                            <hr class="border-2 border-black opacity-75">
                                            <div class="vstack gap-3 mb-3">
                                                <img src="" loading="lazy" alt="academic tutorial image" height="175" width="180" id="tutorialIMG"><!--ACADEMIC TUTORIAL IMAGE-->
                                                <div>
                                                    <label>Academic Tutorial Image </label>
                                                    <input type="file" name="tutorial_img" class="form-control" value="" accept="image/png, image/jpeg">
                                                    <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                                </div>
                                            </div>
                                            <div class="vstack mb-3">
                                                <label>Academic Tutorial Text </label>
                                                <textarea name="tutorial_text" class="form-control" id="tutorialTEXT" value="" rows="3"></textarea> <!--ACADEMIC TUTORIAL TEXT-->
                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </section>
                                <div class="w-100 d-flex justify-content-center p-3">
                                    <button class="btn saveBtn" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="rates-tab-pane" role="tabpanel" aria-labelledby="rates-tab" tabindex="0"> <!--RATES TAB-->
                            <!--CSV MODAL-->
                            <div class="modal fade" tabindex="-1" id="uploadModal" data-bs-backdrop="static">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">CSV Upload</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="" enctype="multipart/form-data" id="uploadRatesForm"><!--with multipart-->
                                            @csrf
                                            <div class="modal-body p-4">
                                                <h6>Upload CSV File</h6>
                                                <input type="file" class="form-control" name="rateCSV" value="" accept=".csv">
                                                <span class="fw-light fst-italic fs-6">Accepted document formats: .csv</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline close-btn" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline save-btn">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="d-flex align-items-center gap-3 justify-content-end p-3">
                                <button class="btn fileBtn gap-2 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                    <svg class="file-icon" width="20" height="20" fill="currentcolor">
                                        <use xlink:href="#upload" />
                                    </svg>
                                    <span>
                                        Upload File
                                    </span>
                                </button>
                                <button class="btn fileBtn gap-2 d-flex align-items-center justify-content-center">
                                    <svg class="file-icon" width="20" height="20" fill="currentcolor">
                                        <use xlink:href="#download" />
                                    </svg>
                                    <span>
                                        Download File
                                    </span>
                                </button>
                            </div>
                            <!--RATES FORM-->
                            <form data-action="{{ route('cms.update.rates') }}" method="POST" class="m-0 p-0" id="updateRatesForm">
                                @csrf
                                <section class="tab-sections p-3 mb-3">
                                    <table class="table table-responsive table-striped p-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Hourly(Online)</th>
                                                <th scope="col">Monthly(Online)</th>
                                                <th scope="col">Hourly(F2F)</th>
                                                <th scope="col">Monthly(F2F)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Pre-School/Kinder</th>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_ol_pk" value="" id="hour_ol_pk"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_ol_pk" value="" id="month_ol_pk"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_f2f_pk" value="" id="hour_f2f_pk"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_f2f_pk" value="" id="month_f2f_pk"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Grade 1-3</th>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_ol_g1" value="" id="hour_ol_g1"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_ol_g1" value="" id="month_ol_g1"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_f2f_g1" value="" id="hour_f2f_g1"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_f2f_g1" value="" id="month_f2f_g1"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Grade 4-6</th>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_ol_g4" value="" id="hour_ol_g4"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_ol_g4" value="" id="month_ol_g4"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_f2f_g4" value="" id="hour_f2f_g4"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_f2f_g4" value="" id="month_f2f_g4"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Junior Highschool</th>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_ol_hs" value="" id="hour_ol_hs"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_ol_hs" value="" id="month_ol_hs"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="hour_f2f_hs" value="" id="hour_f2f_hs"></td>
                                                <td><input type="number" class="form-control" placeholder="ex. 6000" name="month_f2f_hs" value="" id="month_f2f_hs"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                                <div class="w-100 d-flex justify-content-center p-3">
                                    <button class="btn saveBtn" type="submit">Save Changes</button>
                                </div>
                            </form>
                            <!---->
                        </div>
                        <div class="tab-pane fade" id="subjects-tab-pane" role="tabpanel" aria-labelledby="subjects-tab" tabindex="0"> <!--SUBJECTS TAB-->
                            <!--MANAGE SUBJECT MODAL-->
                            <div class="modal fade" tabindex="-1" id="manageSubModal" data-bs-backdrop="static">
                                <div class="modal-dialog modal-xl modal-fullscreen-md-down modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Manage Subjects</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="d-flex align-items-center" id="manage-sub-alert"></div>
                                            <section class="mb-3">
                                                <form method="POST" data-action="{{ route('cms.add.subject') }}" enctype="multipart/form-data" id="addSubjectForm"><!--with multipart-->
                                                    @csrf
                                                    <div class="row row-cols-auto mb-3">
                                                        <div class="col-12 col-md-6">
                                                            <h6 class="">Add Subject</h5>
                                                                <hr class="border-2 border-black opacity-50 mb-3">
                                                                <div class="mb-3">
                                                                    <label for="subject_name" class="form-label">Subject Name<span class="text-danger">*</span></label>
                                                                    <input type="text" placeholder="ex. Geometry" class="form-control" id="subject_name" name="subject" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="">Year Level <span class="text-danger">*</span></label>
                                                                    <select class="form-select" name="year_id" value="" required id="yearSelect">
                                                                        <option value="" disabled selected>Select Year Level</option>
                                                                        @foreach($YearLevels as $level)
                                                                        <option value="{{ $level->id }}">{{ $level->year }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="subject_image" class="form-label">Subject Image<span class="text-danger">*</span></label>
                                                                    <input type="file" class="form-control" id="subject_image" name="subjectImg" accept="image/png, image/jpeg" required>
                                                                    <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                                                </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <h6>Subject Topics</h6>
                                                            <hr class="border-2 border-black opacity-50 mb-3">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Lesson Title</span>
                                                                <input type="text" class="form-control" name="lesson_title" required>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Topic 1</span>
                                                                <textarea class="form-control" name="topic_1"></textarea>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Topic 2</span>
                                                                <textarea class="form-control" name="topic_2"></textarea>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Topic 3</span>
                                                                <textarea class="form-control" name="topic_3"></textarea>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Topic 4</span>
                                                                <textarea class="form-control" name="topic_4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 d-flex align-items-center justify-content-center">
                                                        <button type="submit" class="btn btn-outline save-btn mb-3">Add Subject</button>
                                                    </div>
                                                </form>
                                            </section>
                                            <section class="mb-3">
                                                <span class="d-flex align-items-center justify-content-between">
                                                    <h5 class="">Subjects</h5>
                                                    <button class="btn fileBtn gap-2 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#manageImages">
                                                        <svg class="file-icon" width="20" height="20" fill="currentcolor">
                                                            <use xlink:href="#images" />
                                                        </svg>
                                                        <span>
                                                            Manage Images
                                                        </span>
                                                    </button>
                                                </span>
                                                <hr class="border-2 border-black opacity-75 mb-3">
                                                <ul class="subject list-group" style="max-height:500px; overflow-y:auto;" id="subjectList">
                                                    <!--looping-->

                                                    <!--end of loop-->
                                                </ul>
                                            </section>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline close-btn" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!--MANAGE SUBJECT IMAGES MODAL-->
                            <div class="modal fade" tabindex="-1" id="manageImages" data-bs-backdrop="static">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Manage Images</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" data-action="{{ route('cms.update.subject.image') }}" enctype="multipart/form-data" id="updateSubjectImageForm"><!--with multipart-->
                                            @csrf
                                            <div class="modal-body p-4">
                                                <div class="d-flex align-items-center" id="edit-image-alert"></div>
                                                <div style="max-height:500px; overflow-y:auto; scrollbar-width:thin;" id="subjectImageList">

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline close-btn" data-bs-toggle="modal" data-bs-target="#manageSubModal">Close</button>
                                                <button type="submit" class="btn btn-outline save-btn">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!--TOPICS MODAL-->
                            <div class="modal fade" tabindex="-1" id="subTopics" data-bs-backdrop="static">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Subject Topics</h5>
                                            <button type="button closeTopic" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="hstack gap-3 justify-content-center mb-3">
                                                <h2 class="fw-semibold" id="viewSubName"></h2> <!--subject-->
                                                <div class="vr"></div>
                                                <h3 class="fw-semibold" id="viewYearLvl"></h3><!--year level-->
                                            </div>
                                            <h5 class="mb-2 text-center  fw-semibold" id="viewLessonTitle"></h5><!--lesson title-->
                                            <ol class="list-group list-group-flush list-group-numbered" id="topicsList">
                                                <!--topics looping-->

                                            </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline close-btn closeTopic" data-bs-dismiss="modal">Dismiss</button>
                                            <button class="btn fileBtn gap-2 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#editTopics">
                                                <svg class="file-icon" width="20" height="20" fill="currentcolor">
                                                    <use xlink:href="#edit" />
                                                </svg>
                                                <span>
                                                    Edit Topics
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!--EDIT TOPICS MODAL-->
                            <div class="modal fade" tabindex="-1" id="editTopics" data-bs-backdrop="static">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Subject Topics</h5>
                                            <button type="button closeTopic" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form data-action="{{ route('cms.update.topic') }}" method="POST" id="editTopicsForm">
                                            @csrf
                                            <div class="modal-body p-4">
                                                <div class="d-flex align-items-center" id="edit-topic-alert"></div>
                                                <div class="hstack gap-3 justify-content-center mb-5">
                                                    <h2 class="fw-semibold" id="editSubName"></h2> <!--subject-->
                                                    <div class="vr"></div>
                                                    <h3 class="fw-semibold" id="editYearLvl"></h3><!--year level-->
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Lesson Title</span>
                                                    <input type="text" class="form-control" name="lesson_title" value="" id="editLessonTitle"></input>
                                                </div>
                                                <div id="editTopicList">

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="topicID" value="" id="hidden-topic-id">
                                                <button type="button" class="btn btn-outline close-btn" data-bs-toggle="modal" data-bs-target="#subTopics">Close</button>
                                                <button type="submit" class="btn btn-outline save-btn">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!--DELETE SUBJECT MODAL-->
                            <div class="modal fade" id="subDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center p-5">
                                            <div class="vstack gap-4 d-flex align-items-center">
                                                <svg class="" height="50" fill="currentcolor">
                                                    <use xlink:href="#info" />
                                                </svg>
                                                <span>
                                                    <h3 class="mb-3">Are you sure you want to delete this subject?</h3>
                                                    <p class="fw-semibold text-danger">Warning: This will delete the subject for all year levels.</p>
                                                </span>
                                                <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                    <button class="btn btn-lg btn-view" type="button" data-bs-toggle="modal" data-bs-target="#manageSubModal">Dismiss</button>
                                                    <form class="p-0 m-0" data-action="{{ route('cms.delete.subject') }}" method="POST" id="deleteSubjectForm">
                                                        @csrf
                                                        <input type="hidden" name="subID" value="" id="deleteSubID">
                                                        <button type="submit" class="btn btn-lg btn-book">Delete</button><!--confirm booking-->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!--DELETE TOPIC MODAL-->
                            <div class="modal fade" id="deleteTopics" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center p-5">
                                            <div class="vstack gap-4 d-flex align-items-center">
                                                <svg class="" height="50" fill="currentcolor">
                                                    <use xlink:href="#info" />
                                                </svg>
                                                <span>
                                                    <h3 class="mb-3">Are you sure you want to delete this topic?</h3>
                                                    <p class="fw-semibold text-danger">Warning: This will delete the topics for this year level.</p>
                                                </span>
                                                <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                                    <button class="btn btn-lg btn-view" type="button" data-bs-dismiss="modal">Dismiss</button>
                                                    <form class="p-0 m-0" data-action="{{ route('cms.delete.topic') }}" method="POST" id="deleteTopicForm">
                                                        @csrf
                                                        <input type="hidden" name="topicID" value="" id="deleteTopicID">
                                                        <button type="submit" class="btn btn-lg btn-book">Delete</button><!--confirm booking-->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="d-flex align-items-center justify-content-end p-3">
                                <button class="btn fileBtn gap-2 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#manageSubModal">
                                    <svg class="file-icon" width="20" height="20" fill="currentcolor">
                                        <use xlink:href="#manage" />
                                    </svg>
                                    <span>
                                        Manage Subjects
                                    </span>
                                </button>
                            </div>
                            <h5 class="mb-3 text-center text-md-start">Subject Topics</h5>
                            <!--FILTERS-->
                            <div class="row row-cols-auto d-flex align-items-center justify-content-center justify-content-lg-start">
                                <div class="col">
                                    <div class="dropdown-center mb-3">
                                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="deptDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                            Department
                                        </button>
                                        <div class="dropdown-menu filter-menu w-100">
                                            <div class="vstack" id="deptRadio">
                                                @foreach($Departments as $dept)
                                                <div class="form-check ms-3 ">
                                                    <input class="form-check-input filter-check radio" type="radio" name="departmentFilter" id="dept{{$dept->id}}" value="{{$dept->id}}">
                                                    <label class="form-check-label filter-item" for="dept{{$dept->id}}">
                                                        {{ $dept->department }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="dropdown-center mb-3">
                                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="subDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                            Subject
                                        </button>
                                        <div class="dropdown-menu filter-menu w-100">
                                            <div class="vstack" id="subRadio">
                                                @foreach($Subjects as $sub)
                                                <div class="form-check ms-3 ">
                                                    <input class="form-check-input filter-check radio" type="radio" name="subjectFilter" id="sub{{$sub->id}}" value="{{$sub->id}}">
                                                    <label class="form-check-label filter-item" for="sub{{$sub->id}}">
                                                        {{ $sub->subjects }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="dropdown-center mb-3">
                                        <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="yearDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                            Year Level
                                        </button>
                                        <div class="dropdown-menu filter-menu w-100">
                                            <div class="vstack" id="yearRadio">
                                                @foreach($YearLevels as $year)
                                                <div class="form-check ms-3 ">
                                                    <input class="form-check-input filter-check radio" type="radio" name="levelFilter" id="year{{$year->id}}" value="{{$year->id}}">
                                                    <label class="form-check-label filter-item" for="year{{$year->id}}">
                                                        {{ $year->year }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg d-flex justify-content-center justify-content-lg-start">
                                    <button id="clear-filter" type="button" class="btn btn-outline save-btn mb-3">Clear Filters</button>
                                </div>
                            </div>
                            <!---->
                            <!--SUBJECTS TABLE-->
                            <section class="subject-section p-3 mb-3">
                                <table class="table table-responsive table-striped p-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Department</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Year Level</th>
                                            <th scope="col">Topics</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="topicTable">

                                    </tbody>
                                </table>
                            </section>
                            <!---->
                        </div>
                        <div class="tab-pane fade" id="organization-tab-pane" role="tabpanel" aria-labelledby="organization-tab" tabindex="0"> <!--ORGANIZATION TAB-->
                            <form method="POST" data-action="{{ route('cms.update.org.content') }}" class="m-0 p-0" enctype="multipart/form-data" id="updateOrganizationForm">
                                @csrf
                                <section class="tab-sections p-3 mb-3">
                                    <div class="d-flex gap-3 align-items-center mb-3">
                                        <img src="" loading="lazy" alt="logo" height="100" width="100" id="logo">
                                        <div class="w-100">
                                            <label for="">Logo</label>
                                            <input type="file" class="form-control" placeholder="ex. scribbles@gmail.com" name="logo" value="" id="logoval" accept="image/png, image/jpeg">
                                            <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" class="form-control" placeholder="ex. scribbles@gmail.com" name="email" value="" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="ex. 09123456789" name="cpnum" value="" maxlength="11" minlength="11" id="cpnum">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tagline</label>
                                        <textarea class="form-control" name="tagline" rows="3" value="" id="tagline"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Mission</label>
                                        <textarea class="form-control" name="mission" rows="3" value="" id="mission"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Vision</label>
                                        <textarea class="form-control" name="vision" rows="3" value="" id="vision"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Address</span>
                                        <input type="text" class="form-control" name="address" id="inputAddress" value="">
                                        <input type="hidden" value="" name="mapSrc" id="map-src">
                                        <button class="btn fileBtn" type="button" id="locateBtn">Locate</button>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9"><!--CMS gmaps location-->
                                        <iframe id="mapFrame" class="embed-responsive-item w-100 h-50" aria-labelledby="GmapsFrame" allow="" referrerpolicy="no-referrer-when-downgrade" loading="lazy"
                                            src="">
                                        </iframe>
                                    </div>
                                </section>
                                <div class="w-100 d-flex justify-content-center p-3">
                                    <button class="btn saveBtn" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        var token = $('input[name="_token"]').val();

        //dropdowns
        const dropdownButtons = document.querySelectorAll('.filter-btn');
        const radioInputs = document.querySelectorAll('.radio');

        // Add an event listener to each radio input
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
        //
        //load contents
        loadCMS();
    });

    function loadCMS() {
        $.ajax({
            type: "GET",
            url: "{{ route('cms.load') }}",
            success: function(data) {
                //console.log('data:', data);

                if (data.success) {
                    buildContentTab(data);
                    buildOrgTab(data);
                    buildRatesTab(data);
                    buildTopicsTable(data);
                    buildSubjectModal(data);
                }

            },
            error: function() {

            }
        });
    };

    function buildContentTab(data) {
        let homeIMG = data.cms.tagline_img;
        let carousel1IMG = data.cms.carousel1;
        let carousel2IMG = data.cms.carousel2;
        let carousel3IMG = data.cms.carousel3;
        let aboutIMG = data.cms.about_img;
        let aboutTEXT = data.cms.about_txt;
        let tutorialIMG = data.cms.tutorial_img;
        let tutorialTEXT = data.cms.tutorial_txt;

        //console.log(aboutTEXT);
        $('#homeIMG').attr('src', homeIMG);
        $('#carousel1IMG').attr('src', carousel1IMG);
        $('#carousel2IMG').attr('src', carousel2IMG);
        $('#carousel3IMG').attr('src', carousel3IMG);
        $('#aboutIMG').attr('src', aboutIMG);
        $('#aboutTEXT').val(aboutTEXT);
        $('#tutorialIMG').attr('src', tutorialIMG);
        $('#tutorialTEXT').val(tutorialTEXT);
    }

    function buildOrgTab(data) {
        let logo = data.cms.logo;
        let email = data.cms.email;
        let cpnum = data.cms.cp_num;
        let tagline = data.cms.tagline_txt;
        let mission = data.cms.mission;
        let vision = data.cms.vision;
        let address = data.cms.address;
        let gmaps = data.cms.gmaps;

        $('#cmsLogo').attr('src', logo);
        $('#logo').attr('src', logo);
        //$('#logoval').val(logo);
        $('#email').val(email);
        $('#cpnum').val(cpnum);
        $('#tagline').val(tagline);
        $('#mission').val(mission);
        $('#vision').val(vision);
        $('#inputAddress').val(address);
        $('#mapFrame').attr('src', gmaps);
        $('#map-src').val(gmaps);
    }

    function buildRatesTab(data) {
        //kinder-pk
        let hour_ol_pk = data.rates.hourly_ol_pk;
        let month_ol_pk = data.rates.monthly_ol_pk;
        let hour_f2f_pk = data.rates.hourly_f2f_pk;
        let month_f2f_pk = data.rates.monthly_f2f_pk;
        //g1-g3
        let hour_ol_g1 = data.rates.hourly_ol_g1;
        let month_ol_g1 = data.rates.monthly_ol_g1;
        let hour_f2f_g1 = data.rates.hourly_f2f_g1;
        let month_f2f_g1 = data.rates.monthly_f2f_g1;
        //g4-g6
        let hour_ol_g4 = data.rates.hourly_ol_g4;
        let month_ol_g4 = data.rates.monthly_ol_g4;
        let hour_f2f_g4 = data.rates.hourly_f2f_g4;
        let month_f2f_g4 = data.rates.monthly_f2f_g4;
        //hs
        let hour_ol_hs = data.rates.hourly_ol_hs;
        let month_ol_hs = data.rates.monthly_ol_hs;
        let hour_f2f_hs = data.rates.hourly_f2f_hs;
        let month_f2f_hs = data.rates.monthly_f2f_hs;

        $('#hour_ol_pk').val(hour_ol_pk);
        $('#month_ol_pk').val(month_ol_pk);
        $('#hour_f2f_pk').val(hour_f2f_pk);
        $('#month_f2f_pk').val(month_f2f_pk);

        $('#hour_ol_g1').val(hour_ol_g1);
        $('#month_ol_g1').val(month_ol_g1);
        $('#hour_f2f_g1').val(hour_f2f_g1);
        $('#month_f2f_g1').val(month_f2f_g1);

        $('#hour_ol_g4').val(hour_ol_g4);
        $('#month_ol_g4').val(month_ol_g4);
        $('#hour_f2f_g4').val(hour_f2f_g4);
        $('#month_f2f_g4').val(month_f2f_g4);

        $('#hour_ol_hs').val(hour_ol_hs);
        $('#month_ol_hs').val(month_ol_hs);
        $('#hour_f2f_hs').val(hour_f2f_hs);
        $('#month_f2f_hs').val(month_f2f_hs);

    }

    function buildTopicsTable(data) {
        let topicTable = $('#topicTable');
        topicTable.html('');

        $.each(data.topics, function(index, topic) {
            //console.log('topics:', topic);
            let topicID = topic.id;
            let departmentID = topic.department.id;
            let subjectID = topic.subject.id;
            let yearLevelID = topic.grade_level.id;
            let department = topic.department.department;
            let subject = topic.subject.subjects;
            let yearLevel = topic.grade_level.year;

            let row = `
                            <tr data-dept-id="${departmentID}" data-subject-id="${subjectID}" data-year-id="${yearLevelID}">
                                <td>${department}</td>
                                <td>${subject}</td>
                                <td>${yearLevel}</td>
                                <td>
                                    <button class="btn topicsBtn viewTopicBtn d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#subTopics" data-topic-id="${topicID}">
                                        <svg class="topics-icon" width="20" height="20" fill="currentcolor">
                                            <use xlink:href="#topics" />
                                        </svg>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn topicsBtn deleteTopicBtn d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#deleteTopics" data-delete-topic-id="${topicID}">
                                        <svg class="topics-icon" width="20" height="20" fill="currentcolor">
                                            <use xlink:href="#delete" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            `;

            topicTable.append(row);

        });
    }

    function buildSubjectModal(data) {
        let subjectContainer = $('#subjectList');
        let subjectImageContainer = $('#subjectImageList');
        subjectContainer.html('');
        subjectImageContainer.html('');

        $.each(data.subjects, function(index, sub) {
            let subName = sub.subjects;
            let subID = sub.id;
            let subImg = sub.image;

            let item = `
                            <li class="list-group-item">
                                <div class="data-container d-flex align-items-center p-2">
                                    <span class="data-title fs-5 col-10">
                                        ${subName}
                                    </span>
                                    <div class="col-2 d-flex align-items-center justify-content-between">
                                        <img src="${subImg}" alt="" height="50" width="50">
                                        <a class="DeleteSubject" type="button" data-bs-toggle="modal" data-bs-target="#subDelete" data-sub-id="${subID}">
                                            <svg class="delete-subject-icon" height="30" width="28">
                                                <use xlink:href="#close" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            `;

            let image = `
                            <div class="vstack gap-2 mb-3">
                                <img src="${subImg}" loading="lazy" alt="subjectImg" height="175" width="300">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text"> ${subName}</span>
                                    <input type="hidden" name="subjects[${index}][id]" value="${subID}">
                                    <input type="file" class="form-control" name="subjects[${index}][img]" accept="image/png, image/jpeg">
                                </div>
                                <span class="fw-light fst-italic fs-6">Accepted image formats: .png, jpg, jpeg</span>
                            </div>
                            `;

            subjectContainer.append(item);
            subjectImageContainer.append(image);
        })

    }

    //
    //fetch topics
    $('#topicTable').on('click', '.viewTopicBtn', function() {
        var topicId = $(this).data('topic-id');
        //console.log('topicID:', topicId);
        $('#hidden-topic-id').val(topicId);

        fetchTopics()
    })

    function fetchTopics() {
        var topicId = $('#hidden-topic-id').val();
        $.ajax({
            type: 'GET',
            url: "{{ route('cms.fetch.topic') }}",
            data: {
                topic_id: topicId
            },
            success: function(data) {
                //console.log('data', data)

                if (data.success) {
                    buildTopicModal(data)
                }

                function buildTopicModal(data) {
                    clearTopicModal();

                    let lesson_title = data.lesson_title;
                    let subject = data.subject;
                    let year = data.yearLevel;

                    let topicList = $('#topicsList');
                    let editTopicList = $('#editTopicList');
                    let viewSub = $('#viewSubName');
                    let viewYear = $('#viewYearLvl');
                    let viewTitle = $('#viewLessonTitle');
                    let editSub = $('#editSubName');
                    let editYear = $('#editYearLvl');
                    let editTitle = $('#editLessonTitle');

                    viewSub.text(subject);
                    viewYear.text(year);
                    viewTitle.text(lesson_title);
                    editSub.text(subject);
                    editYear.text(year);
                    editTitle.val(lesson_title);

                    $.each(data.topics, function(index, topic) {
                        let topicText = topic;

                        let items = `
                                <li class="list-group-item">${topicText}</li>
                                `;

                        let editItems = `
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Topic ${index + 1}</span>
                                    <textarea class="form-control" name="topic${index + 1}">${topicText}</textarea>
                                </div>
                                `;

                        topicList.append(items);
                        editTopicList.append(editItems);
                    })

                }
            }
        })
    }
    //
    //clear topic modal
    $('.closeTopic').on('click', function() {
        clearTopicModal();
    })

    function clearTopicModal() {
        let topicList = $('#topicsList');
        let editTopicList = $('#editTopicList');
        let viewSub = $('#viewSubName');
        let viewYear = $('#viewYearLvl');
        let viewTitle = $('#viewLessonTitle');
        let editSub = $('#editSubName');
        let editYear = $('#editYearLvl');
        let editTitle = $('#editLessonTitle');

        topicList.html('');
        editTopicList.html('');

        viewSub.text('');
        viewYear.text('');
        viewTitle.text('');
        editSub.text('');
        editYear.text('');
        editTitle.val('');
    }
    //
    //update map
    $('#locateBtn').on('click', function() {
        updateMap();
    })

    function updateMap() {
        var place = document.getElementById("inputAddress").value;
        var mapFrame = document.getElementById("mapFrame");
        var apiKey = "AIzaSyBn7D7q4ANfGR-5pYDzomt63FgL1_JrPzk"; //actual api ko na ito dko lang sure kung nagana pa
        var src = "https://www.google.com/maps/embed/v1/place?key=" + apiKey + "&q=" + encodeURIComponent(place);
        mapFrame.src = src;
        $('#map-src').val(src);
        var newSrc = $('#map-src').val();
        //console.log('mapSRC:', newSrc);
    }
    //
    //filter
    $('input[name="departmentFilter"], input[name="levelFilter"], input[name="subjectFilter"]').on('change', function() {
        let subId = $('input[name="subjectFilter"]:checked').val();
        let levelId = $('input[name="levelFilter"]:checked').val();
        let deptId = $('input[name="departmentFilter"]:checked').val();

        $('#topicTable tr').hide();

        if (subId && levelId && deptId) {
            $('#topicTable tr[data-dept-id="' + deptId + '"][data-subject-id="' + subId + '"][data-year-id="' + levelId + '"]').show();
        } else if (subId && levelId) {
            $('#topicTable tr[data-subject-id="' + subId + '"][data-year-id="' + levelId + '"]').show();
        } else if (deptId && levelId) {
            $('#topicTable tr[data-dept-id="' + deptId + '"][data-year-id="' + levelId + '"]').show();
        } else if (subId && deptId) {
            $('#topicTable tr[data-subject-id="' + subId + '"][data-dept-id="' + deptId + '"]').show();
        } else if (deptId) {
            $('#topicTable tr[data-dept-id="' + deptId + '"]').show();
        } else if (subId) {
            $('#topicTable tr[data-subject-id="' + subId + '"]').show();
        } else if (levelId) {
            $('#topicTable tr[data-year-id="' + levelId + '"]').show();
        } else {
            $('#topicTable tr').show();
        }
    });
    //
    //clear filters
    $('#clear-filter').on('click', function() {
        var filterSub = $('#subDrop');
        var filterLevel = $('#yearDrop');
        var filterDept = $('#deptDrop');

        filterSub.text('Subject');
        filterLevel.text('Year Level');
        filterDept.text('Department');
        filterSub.dropdown('hide');
        filterLevel.dropdown('hide');
        filterDept.dropdown('hide');
        $('input[name="departmentFilter"], input[name="levelFilter"], input[name="subjectFilter"]').prop('checked', false);
        $('#topicTable tr').show(); // modified to show all table rows
    });
    //
    //update contents tab
    $('#updateContentForm').on('submit', function(e) {
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
                $('#updateContentForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);

                if (response.success) {
                    $('#updateContentForm').find('button[type="submit"]').prop('disabled', false);
                    loadCMS();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center w-25" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {

                    $('#updateContentForm').find('button[type="submit"]').prop('disabled', false);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }

            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            Error updating content
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#alert-div');

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
    });
    //
    //update organization tab
    $('#updateOrganizationForm').on('submit', function(e) {
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
                $('#updateOrganizationForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    $('#updateOrganizationForm').find('button[type="submit"]').prop('disabled', false);
                    loadCMS();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center w-25" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                } else if (response.error) {
                    $('#updateOrganizationForm').find('button[type="submit"]').prop('disabled', false);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                //console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            Error updating content
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#alert-div');
                $('#updateOrganizationForm').find('button[type="submit"]').prop('disabled', false);

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
    });
    //
    //update rates tab
    $('#updateRatesForm').on('submit', function(e) {
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
                $('#updateRatesForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    $('#updateRatesForm').find('button[type="submit"]').prop('disabled', false);
                    loadCMS();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center w-25" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {
                    $('#updateRatesForm').find('button[type="submit"]').prop('disabled', false);
                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                //console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            Error updating rates
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#alert-div');

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
    });
    //
    //add subject
    $('#addSubjectForm').on('submit', function(e) {
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
                $('#addSubjectForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    $('#addSubjectForm').find('button[type="submit"]').prop('disabled', false);
                    loadCMS();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#manage-sub-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                    $('#addSubjectForm')[0].reset();
                } else if (response.error) {
                    $('#addSubjectForm').find('button[type="submit"]').prop('disabled', false);

                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#manage-sub-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                    $('#addSubjectForm')[0].reset();
                }
            },
            error: function(xhr, status, error) {
                //console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            Error adding subject
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#manage-sub-alert');

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
    });
    //
    //delete subject
    $('#subjectList').on('click', '.DeleteSubject', function() {
        var subjectID = $(this).data('sub-id');
        $('#deleteSubID').val(subjectID);
        var toDelete = $('#deleteSubID').val();
        //console.log('subject id to delete', toDelete);
    })
    $('#deleteSubjectForm').on('submit', function(e) {
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
                $('#deleteSubjectForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    $('#deleteSubjectForm').find('button[type="submit"]').prop('disabled', false);
                    $('#deleteSubID').val('');
                    loadCMS();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#manage-sub-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                    $('#subDelete').modal('hide');
                    $('#manageSubModal').modal('show');

                } else if (response.error) {
                    $('#deleteSubjectForm').find('button[type="submit"]').prop('disabled', false);
                    $('#deleteSubID').val('');
                    $('#subDelete').modal('hide');
                    $('#manageSubModal').modal('show');

                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#manage-sub-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                }
            },
            error: function(xhr, status, error) {
                //console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            Error deleting subject
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#manage-sub-alert');

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
    });
    //
    //delete topic
    $('#topicTable').on('click', '.deleteTopicBtn', function() {
        var topicID = $(this).data('delete-topic-id');
        $('#deleteTopicID').val(topicID);
        var toDelete = $('#deleteTopicID').val();
        //console.log('topic id to delete', toDelete);
    })
    $('#deleteTopicForm').on('submit', function(e) {
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
                $('#deleteTopicForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    $('#deleteTopicForm').find('button[type="submit"]').prop('disabled', false);
                    $('#deleteTopicID').val('');
                    loadCMS();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center w-25" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                    $('#deleteTopics').modal('hide');


                } else if (response.error) {
                    $('#deleteSubjectForm').find('button[type="submit"]').prop('disabled', false);
                    $('#deleteTopicID').val('');
                    $('#deleteTopics').modal('hide');

                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#alert-div');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                }
            },
            error: function(xhr, status, error) {
                //console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center w-25" role="alert">
                            Error deleting topic
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#alert-div');

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
    });
    //
    //update subject images
    $('#updateSubjectImageForm').on('submit', function(e) {
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
                $('#updateSubjectImageForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    $('#updateSubjectImageForm').find('button[type="submit"]').prop('disabled', false);

                    loadCMS();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#edit-image-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {
                    $('#updateSubjectImageForm').find('button[type="submit"]').prop('disabled', false);

                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#edit-image-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                }
            },
            error: function(xhr, status, error) {
                //console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            Error updating images
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#edit-image-alert');

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
    });
    //
    //update subject images
    $('#editTopicsForm').on('submit', function(e) {
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
                $('#editTopicsForm').find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    $('#editTopicsForm').find('button[type="submit"]').prop('disabled', false);

                    loadCMS();
                    fetchTopics();

                    let Alert =
                        `
                        <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                            ${response.success}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#edit-topic-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {
                    $('#updateSubjectImageForm').find('button[type="submit"]').prop('disabled', false);

                    let Alert =
                        `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            ${response.error}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                    let alertElement = $(Alert).appendTo('#edit-topic-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                }
            },
            error: function(xhr, status, error) {
                //console.log(xhr.responseText);
                let Alert =
                    `
                        <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                            Error updating images
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;

                let alertElement = $(Alert).appendTo('#edit-topic-alert');

                setTimeout(function() {
                    alertElement.alert('close');
                }, 3000);
            }
        });
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

    .DeleteSubject:hover {
        .delete-subject-icon {
            fill: #99CC99 !important;
            transition: 0.3s ease;
        }
    }

    .delete-subject-icon {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.2s linear;
    }

    ul.subject .list-group-item:hover {
        cursor: auto;
        background-color: #eeee;
        transition: all 0.3s ease-in-out;

        .delete-subject-icon {
            visibility: visible;
            opacity: 1;
        }
    }

    ul#cms-tabs button {
        transition: all 0.3s ease;
        color: black;
    }

    ul#cms-tabs button:hover {
        background-color: #759C75 !important;
        color: white !important;
    }

    ul#cms-tabs button.active {
        background-color: #759C75;
        color: white;
    }

    .tab-sections {
        max-height: 500px;
        overflow-y: auto;
        scrollbar-width: thin;
    }

    .subject-section {
        max-height: 400px;
        overflow-y: auto;
        scrollbar-width: thin;
    }

    .saveBtn {
        width: 250px;
        border-color: #759C75 !important;
        transition: all 0.3s ease !important;
    }

    .saveBtn:hover {
        background-color: #759C75 !important;
        color: white !important;
    }

    .fileBtn {
        width: 200px;
        border-color: #759C75 !important;
        transition: all 0.3s ease !important;
    }

    .fileBtn:hover {
        background-color: #759C75 !important;
        color: white !important;
    }

    .close-btn {
        border-color: #99CC99 !important;
        color: #000 !important;
        transition: all 0.3s ease !important;
    }

    .close-btn:hover {
        background-color: #99CC99 !important;
    }

    .save-btn {
        border-color: #759C75 !important;
        background-color: #759C75 !important;
        color: white !important;
        transition: all 0.3s ease !important;
    }

    .save-btn:hover {
        border-color: #99CC99 !important;
        background-color: #99CC99 !important;
        color: black !important;
    }

    .topicsBtn:hover {
        .topics-icon {
            fill: #759C75;
            transition: all 0.3s ease;
        }
    }

    .filter-btn {
        color: black;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        width: 285px !important
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

    .btn-book {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: white !important;
    }

    .btn-book:hover {
        background-color: #99CC99 !important;
        border-color: #99CC99 !important;
        border-radius: 15px !important;
        color: black !important;
        transition: all 0.3s ease-in-out;
    }

    .btn-view {
        background-color: transparent;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: black;
    }

    .btn-view:hover {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: white !important;
        transition: all 0.3s ease-in-out;
    }
</style>