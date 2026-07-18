@extends('layouts.adminmaster')
@section('content')

@php
$page ='Verifications'
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="delete" viewBox="0 -960 960 960">
            <title>delete</title>
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
        </symbol>
        <symbol id="deac" viewBox="0 -960 960 960">
            <title>deac</title>
            <path d="M280-440h400v-80H280v80ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
        <symbol id="add" viewBox="0 -960 960 960">
            <title>add</title>
            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
        </symbol>
        <symbol id="info" viewBox="0 -960 960 960">
            <title>info</title>
            <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
        <symbol id="edit" viewBox="0 -960 960 960">
            <title>edit</title>
            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
        </symbol>
        <symbol id="fact" viewBox="0 -960 960 960">
            <title>fact</title>
            <path d="M160-120q-33 0-56.5-23.5T80-200v-560q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v560q0 33-23.5 56.5T800-120H160Zm0-80h640v-560H160v560Zm40-80h200v-80H200v80Zm382-80 198-198-57-57-141 142-57-57-56 57 113 113Zm-382-80h200v-80H200v80Zm0-160h200v-80H200v80Zm-40 400v-560 560Z" />
        </symbol>
        <symbol id="school" viewBox="0 -960 960 960">
            <title>school</title>
            <path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z" />
        </symbol>
        <symbol id="grad" viewBox="0 -960 960 960">
            <title>grad</title>
            <path d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z" />
        </symbol>
        <symbol id="yearlvl" viewBox="0 -960 960 960">
            <title>year level</title>
            <path d="M411-480q-28 0-46-21t-13-49l12-72q8-43 40.5-70.5T480-720q44 0 76.5 27.5T597-622l12 72q5 28-13 49t-46 21H411Zm24-80h91l-8-49q-2-14-13-22.5t-25-8.5q-14 0-24.5 8.5T443-609l-8 49ZM124-441q-23 1-39.5-9T63-481q-2-9-1-18t5-17q0 1-1-4-2-2-10-24-2-12 3-23t13-19l2-2q2-19 15.5-32t33.5-13q3 0 19 4l3-1q5-5 13-7.5t17-2.5q11 0 19.5 3.5T208-626q1 0 1.5.5t1.5.5q14 1 24.5 8.5T251-596q2 7 1.5 13.5T250-570q0 1 1 4 7 7 11 15.5t4 17.5q0 4-6 21-1 2 0 4l2 16q0 21-17.5 36T202-441h-78Zm676 1q-33 0-56.5-23.5T720-520q0-12 3.5-22.5T733-563l-28-25q-10-8-3.5-20t18.5-12h80q33 0 56.5 23.5T880-540v20q0 33-23.5 56.5T800-440ZM0-240v-63q0-44 44.5-70.5T160-400q13 0 25 .5t23 2.5q-14 20-21 43t-7 49v65H0Zm240 0v-65q0-65 66.5-105T480-450q108 0 174 40t66 105v65H240Zm560-160q72 0 116 26.5t44 70.5v63H780v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5Zm-320 30q-57 0-102 15t-53 35h311q-9-20-53.5-35T480-370Zm0 50Zm1-280Z" />
        </symbol>
        <symbol id="subject" viewBox="0 -960 960 960">
            <title>subject</title>
            <path d="M320-160q-33 0-56.5-23.5T240-240v-120h120v-90q-35-2-66.5-15.5T236-506v-44h-46L60-680q36-46 89-65t107-19q27 0 52.5 4t51.5 15v-55h480v520q0 50-35 85t-85 35H320Zm120-200h240v80q0 17 11.5 28.5T720-240q17 0 28.5-11.5T760-280v-440H440v24l240 240v56h-56L510-514l-8 8q-14 14-29.5 25T440-464v104ZM224-630h92v86q12 8 25 11t27 3q23 0 41.5-7t36.5-25l8-8-56-56q-29-29-65-43.5T256-684q-20 0-38 3t-36 9l42 42Zm376 350H320v40h286q-3-9-4.5-19t-1.5-21Zm-280 40v-40 40Z" />
        </symbol>
        <symbol id="document" viewBox="0 -960 960 960">
            <title>document</title>
            <path d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z" />
        </symbol>
        <symbol id="card" viewBox="0 -960 960 960">
            <title>card</title>
            <path d="M560-440h200v-80H560v80Zm0-120h200v-80H560v80ZM200-320h320v-22q0-45-44-71.5T360-440q-72 0-116 26.5T200-342v22Zm160-160q33 0 56.5-23.5T440-560q0-33-23.5-56.5T360-640q-33 0-56.5 23.5T280-560q0 33 23.5 56.5T360-480ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm0-80h640v-480H160v480Zm0 0v-480 480Z" />
        </symbol>
        <symbol id="msg" viewBox="0 -960 960 960">
            <title>msg</title>
            <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
        <symbol id="check" viewBox="0 -960 960 960">
            <title>check</title>
            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
        </symbol>
    </svg>
</head>

<body>
    <!--MODALS-->
    <!--end of modals-->
    <main class="content px-2 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Verifications</h4>
            </div>
            <div id="alert-div"></div>
            <!--confirm verify modal-->
            <div class="modal fade" id="confirmVerification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="vstack gap-4 d-flex align-items-center">
                                <svg class="" height="50" fill="currentcolor">
                                    <use xlink:href="#info" />
                                </svg>
                                <h3>Are you sure you want to verify this tutor?</h3>
                                <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                    <button class="btn btn-lg viewBtn" type="button" data-bs-toggle="modal" data-bs-target="#verifications">Dismiss</button>
                                    <form class="p-0 m-0" method="POST" data-action="{{route('admin.verify.tutor')}}" id="verifyTutorForm">
                                        @csrf
                                        <input type="hidden" name="verify_tutor_id" value="" id="verifyTutorID">
                                        <button type="submit" class="btn btn-lg submitBtn">Confirm</button><!--confirm booking-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--confirm decline modal-->
            <div class="modal fade" id="confirmDecline" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true"><!--include tutor id-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="vstack gap-4 d-flex align-items-center">
                                <svg class="" height="50" fill="currentcolor">
                                    <use xlink:href="#info" />
                                </svg>
                                <h3>Are you sure you want to decline this tutor?</h3>
                                <div class="vstack gap-2 align-items-center justify-content-center w-100">
                                    <form class="p-0 m-0 w-100" method="POST" data-action="{{route('admin.decline.tutor')}}" id="declineTutorForm">
                                        @csrf
                                        <input type="hidden" name="decline_tutor_id" value="" id="declineTutorID">
                                        <textarea name="reason" class="form-control mb-3" id="reasonForDecline" placeholder="Reason for declining" required></textarea>
                                        <div class="hstack gap-2 align-items-center justify-content-center w-100">
                                            <button class="btn btn-lg viewBtn" type="button" data-bs-toggle="modal" data-bs-target="#verifications">Dismiss</button>
                                            <button type="submit" class="btn btn-lg submitBtn">Confirm</button><!--confirm booking-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--verification modal-->
            <div class="modal fade" id="verifications" data-bs-backdrop="static">
                <div class="modal-dialog  modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tutor Verification</h5>
                            <button type="button" class="btn-close dismissVerify" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <section class="mb-3">
                                <div class="vstack align-items-center gap-2">
                                    <div class="booking-profile-pic">
                                        <img src="" id="tutorProfilePic" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;object-position:50% 50%;border-radius:50%" onerror="this.src='Images/default-profile.png';">
                                    </div>
                                    <h5 class="fw-bold" id="tutorName"></h5>
                                    <h6 class="fw-semibold"><span id="tutorEmployment"></span> <span>Tutor</span></h6>
                                    <h6 class="" id="tutorEmail"></h6>
                                </div>
                            </section>
                            <section class="mb-3">
                                <div class="row row-cols-auto">
                                    <div class="col-12 col-md-6 mb-3">
                                        <h6 class="mb-2">Education</h6>
                                        <hr class="border-3 opacity-75">
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#grad" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Education level:</p>
                                                <p class="mb-0" id="tutorStatus"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#school" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">School:</p>
                                                <p class="mb-0" id="tutorSchool"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <h6 class="mb-2">Expertise</h6>
                                        <hr class="border-3 opacity-75">
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#subject" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Subject:</p>
                                                <p class="mb-0" id="tutorSubject"></p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 mb-2">
                                            <svg fill="currentcolor" height="35" width="35">
                                                <use xlink:href="#yearlvl" />
                                            </svg>
                                            <div>
                                                <p class="fw-semibold mb-0">Year Level:</p>
                                                <p class="mb-0" id="tutorLevel"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <h6 class="mb-2">Requirements</h6>
                                        <hr class="border-3 opacity-75">
                                        <ul id="req-list">
                                            <li class="tor grad-req">
                                                <div class="hstack gap-1 mb-2">
                                                    <svg fill="currentcolor" height="35" width="35">
                                                        <use xlink:href="#document" />
                                                    </svg>
                                                    <h6 class="fw-bold">Transcript of Records</h6>
                                                </div>
                                            </li>
                                            <li class="resume">
                                                <div class="hstack gap-1 mb-2">
                                                    <svg fill="currentcolor" height="35" width="35">
                                                        <use xlink:href="#document" />
                                                    </svg>
                                                    <h6 class="fw-bold">Resume</h6>
                                                </div>
                                            </li>
                                            <li class="diplopma grad-req">
                                                <div class="hstack gap-1 mb-2">
                                                    <svg fill="currentcolor" height="35" width="35">
                                                        <use xlink:href="#document" />
                                                    </svg>
                                                    <h6 class="fw-bold">Diploma</h6>
                                                </div>
                                            </li>
                                            <li class="coe under-req">
                                                <div class="hstack gap-1 mb-2">
                                                    <svg fill="currentcolor" height="35" width="35">
                                                        <use xlink:href="#document" />
                                                    </svg>
                                                    <h6 class="fw-bold">Certificate of Enrollement</h6>
                                                </div>
                                            </li>
                                            <li class="valid">
                                                <div class="hstack gap-1 mb-2">
                                                    <svg fill="currentcolor" height="35" width="35">
                                                        <use xlink:href="#card" />
                                                    </svg>
                                                    <h6 class="fw-bold">Valid ID</h6>
                                                </div>
                                            </li>
                                            <li class="prc grad-req">
                                                <div class="hstack gap-1 mb-2">
                                                    <svg fill="currentcolor" height="35" width="35">
                                                        <use xlink:href="#card" />
                                                    </svg>
                                                    <h6 class="fw-bold">PRC ID (optional)</h6>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <h6 class="mb-2">Submissions</h6>
                                        <hr class="border-3 opacity-75">
                                        <ul class="px-5" id="submission-list">
                                            <li class="tor grad-req">
                                                <div class="hstack align-items-center justify-content-between mb-2">
                                                    <span class="d-flex align-items-center gap-4">
                                                        <button class="btn viewBtn documentBtn" data-file="" data-bs-toggle="modal" data-bs-target="#fileModal" id="viewTOR">View</button>
                                                        <h6 class="fw-semibold">TOR</h6>
                                                    </span>
                                                    <input type="checkbox" class="form-check-input verify-check required-check">
                                                </div>
                                            </li>
                                            <li class="resume">
                                                <div class="hstack align-items-center justify-content-between mb-2">
                                                    <span class="d-flex align-items-center gap-4">
                                                        <button class="btn viewBtn documentBtn" data-file="" data-bs-toggle="modal" data-bs-target="#fileModal" id="viewRESU">View</button>
                                                        <h6 class="fw-semibold">Resume</h6>
                                                    </span>
                                                    <input type="checkbox" class="form-check-input verify-check required-check">
                                                </div>
                                            </li>
                                            <li class="diploma grad-req">
                                                <div class="hstack align-items-center justify-content-between mb-2">
                                                    <span class="d-flex align-items-center gap-4">
                                                        <button class="btn viewBtn documentBtn" data-file="" data-bs-toggle="modal" data-bs-target="#fileModal" id="viewDIP">View</button>
                                                        <h6 class="fw-semibold">Diploma</h6>
                                                    </span>
                                                    <input type="checkbox" class="form-check-input verify-check required-check">
                                                </div>
                                            </li>
                                            <li class="coe under-req">
                                                <div class="hstack align-items-center justify-content-between mb-2">
                                                    <span class="d-flex align-items-center gap-4">
                                                        <button class="btn viewBtn documentBtn" data-file="" data-bs-toggle="modal" data-bs-target="#fileModal" id="viewCOE">View</button>
                                                        <h6 class="fw-semibold">COE</h6>
                                                    </span>
                                                    <input type="checkbox" class="form-check-input verify-check required-check">
                                                </div>
                                            </li>
                                            <li class="valid">
                                                <div class="hstack align-items-center justify-content-between mb-2">
                                                    <span class="d-flex align-items-center gap-4">
                                                        <button class="btn viewBtn documentBtn" data-file="" data-id-number="" data-bs-toggle="modal" data-bs-target="#fileModal" id="viewID">View</button>
                                                        <h6 class="fw-semibold">VALID ID</h6>
                                                    </span>
                                                    <input type="checkbox" class="form-check-input verify-check required-check">
                                                </div>
                                            </li>
                                            <li class="prc grad-req">
                                                <div class="hstack align-items-center justify-content-between mb-2">
                                                    <span class="d-flex align-items-center gap-4">
                                                        <button class="btn viewBtn documentBtn" data-file="" data-id-number="" data-bs-toggle="modal" data-bs-target="#fileModal" id="viewPRC">View</button>
                                                        <h6 class="fw-semibold">PRC ID</h6>
                                                    </span>
                                                    <input type="checkbox" class="form-check-input verify-check">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="modal-footer d-flex align-items-center justify-content-center">
                            <button class="btn submitBtn d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#confirmDecline" id="submitDecline">
                                <svg fill="currentcolor" height="20" width="20">
                                    <use xlink:href="#close" />
                                </svg>
                                Decline
                            </button>
                            <button class="btn viewBtn d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#messageTutor" id="submitMessage">
                                <svg fill="currentcolor" height="20" width="20">
                                    <use xlink:href="#msg" />
                                </svg>
                                Message
                            </button>
                            <button class="btn submitBtn d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#confirmVerification" id="submitVerify">
                                <svg fill="currentcolor" height="20" width="20">
                                    <use xlink:href="#check" />
                                </svg>
                                Verify
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!-- File Preview Modal -->
            <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-focus="false">
                <div class="modal-dialog modal-xl modal-dialog-scrollable" style="max-width: 1200px;"> <!-- increased max-width to 1200px -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileModalLabel">File Preview</h5>
                            <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#verifications" aria-label="Close" id="dismissFilePreview"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="fw-semibold d-none" id="idNumberTEXT">ID Number: <span class="fw-normal" id="idNumber"></span></h6>
                            <iframe src="" id="filePreview" style="width: 100%; height: 600px;"></iframe> <!-- increased iframe height to 800px -->
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--Message modal-->
            <div class="modal fade" id="messageTutor" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-focus="false">
                <div class="modal-dialog modal-xl modal-dialog-scrollable"> <!-- increased max-width to 1200px -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileModalLabel">Message Tutor | <span class="text-capitalize" id="messageName"></span></h5>
                            <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#verifications" aria-label="Close" id="dismissFilePreview"></button>
                        </div>
                        <div class="modal-body">
                            <div id="message-alert"></div>
                            <form method="POST" data-action="{{ route('admin.message.tutor') }}" id="messageTutorForm">
                                @csrf
                                <div class="p-2 vstack gap-3">
                                    <textarea class="form-control" name="message_content" id="messageTextInput" rows="10" required></textarea>
                                    <input type="hidden" value="" name="message_tutor_id" id="messageTutorID">
                                </div>
                                <div class="p-2 vstack gap-3">
                                    <div class="row row-cols-auto">
                                        <div class="col mb-3">
                                            <button type="button" class="btn viewBtn" id="autoMessage1" aria-labelledby="autoMessageBtn1">
                                                Please re-submit the requirements.
                                            </button>
                                        </div>
                                        <div class="col mb-3">
                                            <button type="button" class="btn viewBtn" id="autoMessage2" aria-labelledby="autoMessageBtn2">
                                                We'd like to schedule a personal interview.
                                            </button>
                                        </div>
                                        <div class="col mb-3">
                                            <button type="button" class="btn viewBtn" id="autoMessage3" aria-labelledby="autoMessageBtn3">
                                                Please contact us through the official email or mobile number.
                                            </button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn submitBtn">Send Message</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn viewBtn" data-bs-toggle="modal" data-bs-target="#verifications" id>Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <!--search-->
            <section class="mb-3 d-flex align-items-center justify-content-center">
                <div class="input-group w-50">
                    <div class="input-group mb-3">
                        <span class="input-group-text border-end-0 rounded-start-3 px-2 bg-secondary-subtle">
                            <svg class="search-icon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#search" />
                            </svg>
                        </span>
                        <input type="text" class="form-control border-start-0 bg-secondary-subtle rounded-end-3 px-1" placeholder="Search Tutors" role="search" id="tutorSearch">
                        <button class="btn bg-secondary-subtle rounded-end-3 d-none" type="button" id="ClearSearch">
                            <svg class="close-icon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#close" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
            <!--search-->
            <!--verified count-->
            <div class="mb-3">
                <h6 class="fw-semibold">Total verified tutors: <span class="fw-normal badge badge-success p-2 rounded-3 text-dark" id="verifiedCount"></span></h6>
            </div>
            <!---->
            <!--filters-->
            <section class="mb-3">
                <div class="row row-cols-auto align-items-center justify-content-center justify-content-lg-start pb-4">
                    <div class="col">
                        <div class="dropdown-center mb-3">
                            <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="employTypeDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                Employment Type
                            </button>
                            <div class="dropdown-menu filter-menu w-100">

                                <div class="vstack" id="dayForm">
                                    <!--day looping-->
                                    @foreach($employment as $data)
                                    <div class="form-check ms-3">
                                        <input class="form-check-input radio" type="radio" name="employType" id="employType{{ $data->id }}" value="{{ $data->id }}">
                                        <label class="form-check-label filter-item" for="employType{{ $data->id }}">
                                            {{ $data->type }}<!--day-->
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
                            <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="sessionTypeDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                Session Type
                            </button>
                            <div class="dropdown-menu filter-menu w-100">

                                <div class="vstack" id="dayForm">
                                    <!--day looping-->
                                    @foreach($session as $data)
                                    <div class="form-check ms-3">
                                        <input class="form-check-input radio" type="radio" name="sessionType" id="sessionType{{ $data->id }}" value="{{ $data->id }}">
                                        <label class="form-check-label filter-item" for="sessionType{{ $data->id }}">
                                            {{ $data->type }}<!--day-->
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
                            <button class="btn btn-lg filter-btn dropdown-toggle d-flex align-items-center justify-content-between" id="educLevelDrop" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                Education Level
                            </button>
                            <div class="dropdown-menu filter-menu w-100">
                                <div class="vstack" id="timeForm">
                                    <!--time looping-->
                                    @foreach($education as $data)
                                    <div class="form-check ms-3">
                                        <input class="form-check-input radio" type="radio" name="educLevel" id="educLevel{{ $data->id }}" value="{{ $data->id }}">
                                        <label class="form-check-label filter-item" for="educLevel{{ $data->id }}">
                                            {{ $data->level }}
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
            <section class="" style="max-height:550px; overflow:auto; scroll-behavior:smooth; scrollbar-width:thin;">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Education Level</th>
                            <th scope="col">Employment Type</th>
                            <th scope="col">Session Type</th>
                            <th scope="col">Verfication Status</th>
                            <th scope="col">Account Creation</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tutor-list">

                    </tbody>
                </table>
                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="loading">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <h5 class="p-3 text-center d-none" id="noSearch">No matches.</h5>
                <h5 class="p-3 text-center d-none" id="noApplications">No pending verifications</h5>
            </section>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        loadTutors();
        disableVerifyBtn();
        dropdown();

    });
    
    //dropdowns
    function dropdown() {
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
    //load
    function loadTutors() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.load.verifications') }}",
            beforeSend: function() {
                $('#loading').removeClass('d-none');
            },
            success: function(data) {
               // console.log(data);
                $('#loading').addClass('d-none');

                if (!data.data.length) {
                    $('#noApplications').removeClass('d-none');
                } else {
                    $('#noApplications').addClass('d-none');
                }
                buildTutors(data.data);
                $('#verifiedCount').html(data.count);
            }
        });
    }

    function buildTutors(data) {
        var tutorTable = $('#tutor-list');
        tutorTable.empty();

        const verifyClass = {
            '1': 'text-success',
            '2': 'text-secondary',
            '3': 'text-danger',
        }
        const employmentClass = {
            '1': 'text-warning',
            '2': 'text-info',
        }
        const educationClass = {
            '1': 'text-primary',
            '2': 'text-info',
        }
        const sessionTypeClass = {
            '1': 'text-danger',
            '2': 'text-primary',
        }

        $.each(data, function(index, item) {

            let tutorMainId = item.id;
            let tutorId = item.tutor_id;
            let fname = item.tutor.user_profile.fname;
            let lname = item.tutor.user_profile.lname;
            let gender = item.tutor.user_profile.gender.gender;
            let employment = item.tutor.employment_session.employment_type.type;
            let employmentID = item.tutor.employment_session.employment_type_id;
            let sessionType = item.tutor.employment_session.session_type.type;
            let sessionTypeID = item.tutor.employment_session.session_type_id;
            let education = item.education_level.level;
            let educationID = item.education_level_id;
            let verifyStatus = item.tutor.verification_status.verify_status;
            let verifyStatusID = item.tutor.verification_status_id;
            let accountCreation = moment(item.tutor.user_profile.created_at).format('MM/DD/YY');

            //console.log(sessionTypeID);

            let tableData = `
                <tr class="text-center" data-educ-id="${educationID}" data-session-id="${sessionTypeID}" data-employ-id="${employmentID}">
                    <td class="text-capitalize">${fname}</td>
                    <td class="text-capitalize">${lname}</td>
                    <td>${gender}</td>
                    <td class="${educationClass[educationID]}">${education}</td>
                    <td class="${employmentClass[employmentID]}">${employment}</td>
                    <td class="${sessionTypeClass[sessionTypeID]}">${sessionType}</td>
                    <td class="${verifyClass[verifyStatusID]}">${verifyStatus}</td>
                    <td>${accountCreation}</td>
                    <td class="d-flex justify-content-center">
                        <button type="button" class="btn d-flex align-items-center gap-1 viewBtn verify-btn" data-tutor-id="${tutorId}" data-tutor-main-id="${tutorMainId}" data-bs-toggle="modal" data-bs-target="#verifications">
                            <svg class="actionicon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#fact" />
                            </svg>
                            Verify
                        </button>
                    </td>
                </tr>
                `;
            tutorTable.append(tableData);
        })
    }
    //
    //build display
    $('#tutor-list').on('click', '.verify-btn', function() {
        var userId = $(this).data('tutor-id');
        var tutorMainId = $(this).data('tutor-main-id');

        var declineID = $('#declineTutorID');
        var verifyID = $('#verifyTutorID');
        var messageID = $('#messageTutorID');

        declineID.val(userId);
        verifyID.val(userId);
        messageID.val(userId);

        var hiddenDecline = declineID.val();
        var hiddenVerify = verifyID.val();
        var hiddenMessage = messageID.val();

       // console.log('decline:', hiddenDecline, 'message', hiddenMessage, 'verify:', hiddenVerify, 'tutorMain:', tutorMainId);

        loadRequirements(tutorMainId);
    });

    function loadRequirements(tutorMainId) {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.load.requirements') }}",
            data: {
                tutorMainId: tutorMainId
            },
            beforeSend: function() {

            },
            success: function(data) {
              //  console.log(data);
                buildRequirements(data);
            }
        });
    }

    function buildRequirements(data) {

        let id = data.tutor_id;
        let tutorEducID = data.education_level_id;
        let tutorName = data.tutor.user_profile.fname + ' ' + data.tutor.user_profile.lname;
        let tutorPic = data.tutor.user_profile.profile_pic;
        let tutorEmployment = data.tutor.employment_session.employment_type.type;
        let tutorEducation = data.education_level.level;
        let tutorSchool = data.requirement.school;
        let tutorSubject = data.department_year_subject.subject.subjects;
        let tutorYear = data.department_year_subject.grade_level.year;
        let tutorEmail = data.tutor.user_profile.email;

        let prc_number = data.requirement.prc_number;
        let validID_number = data.requirement.valid_id_number;
        let tor = data.requirement.tor_upload ?? 'about:blank';
        let resume = data.requirement.resume_upload ?? 'about:blank';
        let diploma = data.requirement.diploma_upload ?? 'about:blank';
        let coe = data.requirement.certificate_of_enrollment ?? 'about:blank';
        let validID = data.requirement.upload_valid_id ?? 'about:blank';
        let prcID = data.requirement.upload_prc ?? 'about:blank';

        let iframe = $('#filePreview');
        let tutorNameTEXT = $('#tutorName');
        let tutorProfilePic = $('#tutorProfilePic');
        let tutorEmployTEXT = $('#tutorEmployment');
        let tutorEducationTEXT = $('#tutorStatus');
        let tutorSchoolTEXT = $('#tutorSchool');
        let tutorSubjectTEXT = $('#tutorSubject');
        let tutorYearTEXT = $('#tutorLevel');
        let tutorEmailTEXT = $('#tutorEmail');
        let messageNameTEXT = $('#messageName');
        let idNumberTEXT = $('#idNumberTEXT');

        let btnTOR = $('#viewTOR');
        let btnRESUME = $('#viewRESU');
        let btnDIPLOMA = $('#viewDIP');
        let btnCOE = $('#viewCOE');
        let btnVALID = $('#viewID');
        let btnPRC = $('#viewPRC');

        iframe.attr('src', '');

        tutorNameTEXT.html('');
        tutorProfilePic.attr('src', '');
        tutorEmployTEXT.html('');
        tutorEducationTEXT.html('');
        tutorSchoolTEXT.html('');
        tutorSubjectTEXT.html('');
        tutorYearTEXT.html('');
        tutorEmailTEXT.html('');
        messageNameTEXT.html('');
        idNumberTEXT.addClass('d-none');

        btnTOR.attr('data-file', '');
        btnRESUME.attr('data-file', '');
        btnDIPLOMA.attr('data-file', '');
        btnCOE.attr('data-file', '');
        btnVALID.attr('data-file', '');
        btnPRC.attr('data-file', '');

        let graduateReqs = $('.grad-req');
        let underGraduateReqs = $('.under-req');
        let checkboxes = $('.verify-check');
        checkboxes.prop('checked', false);

        let requiredCheck;


        if (tutorEducID == 1) {
            underGraduateReqs.addClass('d-none');
            graduateReqs.removeClass('d-none');
            requiredCheck = 4

        } else if (tutorEducID == 2) {
            underGraduateReqs.removeClass('d-none');
            graduateReqs.addClass('d-none');
            requiredCheck = 3
        }


        function toggleVerify() {
            if (checkboxes.filter('.required-check:checked').length >= requiredCheck) {
                enableVerifyBtn(); // Enable the verify button if the condition is met
            } else {
                disableVerifyBtn(); // Disable the verify button if the condition is not met
            }
        }

        toggleVerify();

        checkboxes.on('change', function() {
            toggleVerify();
        })

        let validIdNumber;
        let validPRCNumber;

        if (prc_number > 0) {
            validPRCNumber = prc_number;
            btnPRC.attr('data-id-number', validPRCNumber);
        } else {
            validPRCNumber = '';
        }

        if (validID_number > 0) {
            validIdNumber = validID_number;
            btnVALID.attr('data-id-number', validID_number);
        } else {
            validIdNumber = '';
        }

        tutorNameTEXT.html(tutorName);
        tutorProfilePic.attr('src', tutorPic);
        tutorEmployTEXT.html(tutorEmployment);
        tutorEducationTEXT.html(tutorEducation);
        tutorSchoolTEXT.html(tutorSchool);
        tutorSubjectTEXT.html(tutorSubject);
        tutorYearTEXT.html(tutorYear);
        tutorEmailTEXT.html(tutorEmail);
        messageNameTEXT.html(tutorName);

        btnTOR.attr('data-file', tor);
        btnRESUME.attr('data-file', resume);
        btnDIPLOMA.attr('data-file', diploma);
        btnCOE.attr('data-file', coe);
        btnVALID.attr('data-file', validID);
        btnPRC.attr('data-file', prcID);
    }
    //
    //components
    function enableVerifyBtn() {
        let verifyBtn = $('#submitVerify');
        verifyBtn.prop('disabled', false);
    }

    function disableVerifyBtn() {
        let verifyBtn = $('#submitVerify');
        verifyBtn.prop('disabled', true);
    }

    function clearRequirements() {
        let iframe = $('#filePreview');
        let tutorNameTEXT = $('#tutorName');
        let tutorProfilePic = $('#tutorProfilePic');
        let tutorEmployTEXT = $('#tutorEmployment');
        let tutorEducationTEXT = $('#tutorStatus');
        let tutorSchoolTEXT = $('#tutorSchool');
        let tutorSubjectTEXT = $('#tutorSubject');
        let tutorYearTEXT = $('#tutorLevel');
        let tutorEmailTEXT = $('#tutorEmail');
        let messageNameTEXT = $('#messageName');
        let idNumber = $('#idNumber');
        let idNumberTEXT = $('#idNumberTEXT');

        let btnTOR = $('#viewTOR');
        let btnRESUME = $('#viewRESU');
        let btnDIPLOMA = $('#viewDIP');
        let btnCOE = $('#viewCOE');
        let btnVALID = $('#viewID');
        let btnPRC = $('#viewPRC');

        iframe.attr('src', '');

        tutorNameTEXT.html('');
        tutorProfilePic.attr('src', '');
        tutorEmployTEXT.html('');
        tutorEducationTEXT.html('');
        tutorSchoolTEXT.html('');
        tutorSubjectTEXT.html('');
        tutorYearTEXT.html('');
        tutorEmailTEXT.html('');
        messageNameTEXT.html('');
        idNumber.html('');
        idNumberTEXT.addClass('d-none');


        btnTOR.attr('data-file', '');
        btnRESUME.attr('data-file', '');
        btnDIPLOMA.attr('data-file', '');
        btnCOE.attr('data-file', '');
        btnVALID.attr('data-file', '');
        btnVALID.attr('data-id-number', '');
        btnPRC.attr('data-file', '');
        btnPRC.attr('data-id-number', '');
    }
    $('.documentBtn').on('click', function() {
        let file = $(this).attr('data-file');
        let preview = $('#filePreview');
        let idDisplay = $('#idNumber');
        let idholder = $('#idNumberTEXT');
        let idNumber;

        if ($(this).attr('data-id-number')) {
            idNumber = $(this).attr('data-id-number');
            idDisplay.html(idNumber);
            idholder.removeClass('d-none');
        } else {
            idNumber = '';
            idDisplay.html('');
            idholder.addClass('d-none');
        }

        preview.attr('src', '');
        if (file !== '') {
            preview.attr('src', file);
        } else {
            preview.attr('src', 'about:blank');
        }

    });
    $('.dismissVerify').on('click', function() {
        clearRequirements();
    })
    $('#dismissFilePreview').on('click', function() {
        let preview = $('#filePreview');
        preview.attr('src', '');
    });
    //
    //message tutor
    $('#autoMessage1, #autoMessage2, #autoMessage3').on('click', function() {
        let message = $(this).text().trim(); // Get the text of the clicked message and trim whitespace

        let textArea = $('#messageTextInput');

        // Append the message to the existing text in the textarea, ensuring no extra spaces
        let currentText = textArea.val().trim(); // Trim existing content to avoid trailing spaces

        if (currentText) {
            // If there's already text, add a space before appending the new message
            textArea.val(currentText + ' ' + message);
        } else {
            // If the textarea is empty, just append the message without leading space
            textArea.val(message);
        }
    });

    $('#messageTutorForm').on('submit', function(e) {
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
                $('#messageTutorForm').find('[type="submit"]').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#messageTutorForm').find('[type="submit"]').prop('disabled', false);
                    $('#messageTutorForm')[0].reset();


                    let Alert =
                        `
                         <div class="alert alert-success alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#message-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                } else if (response.error) {
                    $('#messageTutorForm').find('[type="submit"]').prop('disabled', false);
                    $('#messageTutorForm')[0].reset();


                    let Alert =
                        `
                         <div class="alert alert-danger alert-dismissible fade show float-center" role="alert">
                             ${response.message}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         `;

                    let alertElement = $(Alert).appendTo('#message-alert');

                    setTimeout(function() {
                        alertElement.alert('close');
                    }, 3000);

                }

            },
            error: function(response) {
                $('#messageTutorForm').find('[type="submit"]').prop('disabled', true);
            }
        })
    })
    //
    //verify tutor
    $('#verifyTutorForm').on('submit', function(e) {
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
                $('#verifyTutorForm').find('[type="submit"]').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#verifyTutorForm').find('[type="submit"]').prop('disabled', false);
                    $('#verifyTutorForm')[0].reset();
                    $('#confirmVerification').modal('hide');
                    $('#verifications').modal('hide');
                    loadTutors();
                    clearRequirements();


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
                    $('#verifyTutorForm').find('[type="submit"]').prop('disabled', false);
                    $('#verifyTutorForm')[0].reset();
                    $('#confirmVerification').modal('hide');
                    $('#verifications').modal('hide');
                    loadTutors();
                    clearRequirements();

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
                $('#verifyTutorForm').find('[type="submit"]').prop('disabled', true);
            }
        })
    })
    //
    //decline tutor
    $('#declineTutorForm').on('submit', function(e) {
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
                $('#declineTutorForm').find('[type="submit"]').prop('disabled', true);
            },
            success: function(response) {

                if (response.success) {
                    $('#declineTutorForm').find('[type="submit"]').prop('disabled', false);
                    $('#declineTutorForm')[0].reset();
                    $('#confirmDecline').modal('hide');
                    $('#verifications').modal('hide');
                    loadTutors();
                    clearRequirements();


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
                    $('#declineTutorForm').find('[type="submit"]').prop('disabled', false);
                    $('#declineTutorForm')[0].reset();
                    $('#confirmDecline').modal('hide');
                    $('#verifications').modal('hide');
                    loadTutors();
                    clearRequirements();

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
                $('#declineTutorForm').find('[type="submit"]').prop('disabled', false);
            }
        })
    })
    //
    //search
    $('#tutorSearch').on('keyup', function() {
        var searchQuery = $(this).val().trim();
        var clearBtn = $('#ClearSearch');
        var searchBox = $('#tutorSearch');

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
        var searchBox = $('#tutorSearch');
        var clearBtn = $('#ClearSearch');
        var noResult = $('#noSearch');
        var tutorList = $('#tutor-list');
        searchBox.val('');
        searchBox.addClass('rounded-end-3');
        clearBtn.addClass('d-none');
        noResult.addClass('d-none');
        tutorList.empty();
        loadTutors();
    };

    function searchContacts(searchQuery) {
        $.ajax({
            type: 'GET',
            url: "{{ route('admin.search.tutors') }}",
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

                    if (!$('#noApplications').hasClass('d-none')) {
                        $('#noApplications').addClass('d-none');
                    }

                } else {
                    $('#noSearch').addClass('d-none');
                }
                displaySearchResults(data);
            },
            complete: function() {
                var spinner = $('#loading');
                spinner.addClass('d-none');

            }
        })
    };

    function displaySearchResults(data) {

        var spinner = $('#loading');
        spinner.removeClass('d-none');

        var tutorTable = $('#tutor-list');
        tutorTable.empty();

        const verifyClass = {
            '1': 'text-success',
            '2': 'text-secondary',
            '3': 'text-danger',
        }
        const employmentClass = {
            '1': 'text-warning',
            '2': 'text-info',
        }
        const educationClass = {
            '1': 'text-primary',
            '2': 'text-info',
        }
        const sessionTypeClass = {
            '1': 'text-danger',
            '2': 'text-primary',
        }

        $.each(data, function(index, item) {

            let tutorMainId = item.id;
            let tutorId = item.tutor_id;
            let fname = item.tutor.user_profile.fname;
            let lname = item.tutor.user_profile.lname;
            let gender = item.tutor.user_profile.gender.gender;
            let employment = item.tutor.employment_session.employment_type.type;
            let employmentID = item.tutor.employment_session.employment_type_id;
            let sessionType = item.tutor.employment_session.session_type.type;
            let sessionTypeID = item.tutor.employment_session.session_type_id;
            let education = item.education_level.level;
            let educationID = item.education_level_id;
            let verifyStatus = item.tutor.verification_status.verify_status;
            let verifyStatusID = item.tutor.verification_status_id;
            let accountCreation = moment(item.tutor.user_profile.created_at).format('MM/DD/YY');

            //console.log(sessionTypeID);

            let tableData = `
                <tr class="text-center" data-educ-id="${educationID}" data-session-id="${sessionTypeID}" data-employ-id="${employmentID}">
                    <td class="text-capitalize">${fname}</td>
                    <td class="text-capitalize">${lname}</td>
                    <td>${gender}</td>
                    <td class="${educationClass[educationID]}">${education}</td>
                    <td class="${employmentClass[employmentID]}">${employment}</td>
                    <td class="${sessionTypeClass[sessionTypeID]}">${sessionType}</td>
                    <td class="${verifyClass[verifyStatusID]}">${verifyStatus}</td>
                    <td>${accountCreation}</td>
                    <td class="d-flex justify-content-center">
                        <button type="button" class="btn d-flex align-items-center gap-1 viewBtn verify-btn" data-tutor-id="${tutorId}" data-tutor-main-id="${tutorMainId}" data-bs-toggle="modal" data-bs-target="#verifications">
                            <svg class="actionicon" height="25" width="25" fill="currentcolor">
                                <use xlink:href="#fact" />
                            </svg>
                            Verify
                        </button>
                    </td>
                </tr>
                `;
            tutorTable.append(tableData);
        });

    };
    //
    //filter 
    $('input[name="employType"], input[name="sessionType"], input[name="educLevel"]').on('change', function() {
        let levelId = $('input[name="educLevel"]:checked').val();
        let sessionId = $('input[name="sessionType"]:checked').val();
        let employId = $('input[name="employType"]:checked').val();

        $('#tutor-list tr').hide();

        if (sessionId && levelId && employId) {
            $('#tutor-list tr[data-educ-id="' + levelId + '"][data-session-id="' + sessionId + '"][data-employ-id="' + employId + '"]').show();
        } else if (sessionId && levelId) {
            $('#tutor-list tr[data-educ-id="' + levelId + '"][data-session-id="' + sessionId + '"]').show();
        } else if (sessionId && employId) {
            $('#tutor-list tr[data-employ-id="' + employId + '"][data-session-id="' + sessionId + '"]').show();
        } else if (levelId && employId) {
            $('#tutor-list tr[data-educ-id="' + levelId + '"][data-employ-id="' + employId + '"]').show();
        } else if (levelId) {
            $('#tutor-list tr[data-educ-id="' + levelId + '"]').show();
        } else if (employId) {
            $('#tutor-list tr[data-employ-id="' + employId + '"]').show();
        } else if (sessionId) {
            $('#tutor-list tr[data-session-id="' + sessionId + '"]').show();
        } else {
            $('#tutor-list tr').show();
        }
    });

    $('#clear-filter').on('click', function() {
        var filterEmploy = $('#employTypeDrop');
        var filterSession = $('#sessionTypeDrop');
        var filterEduc = $('#educLevelDrop');

        filterEmploy.text('Employment Type');
        filterSession.text('Session Type');
        filterEduc.text('Education Level');
        filterEmploy.dropdown('hide');
        filterSession.dropdown('hide');
        filterEduc.dropdown('hide');
        $('input[name="employType"], input[name="sessionType"], input[name="educLevel"]').prop('checked', false);
        $('#tutor-list tr').show(); // modified to show all table rows
    });
    //
</script>

</html>
@endsection

<style>
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

    .verify-check {
        margin: 0 !important;
        height: 20px !important;
        width: 20px !important;
        border-color: black !important;
        transition: all 0.3s ease;
    }

    .verify-check:checked {
        background-color: #759C75 !important;
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
</style>