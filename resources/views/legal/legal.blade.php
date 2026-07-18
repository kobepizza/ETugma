@extends('layouts.signmaster')
@section('content')

@php
$page ='Legal Center';
@endphp

<head>

</head>

<main class="p-5 legal">
    <h1 class="header-text fw-bold mb-3">Legal Center</h1>
    <div class="row row-cols-auto">
        <div class="col-12 col-lg-2">
            <ul class="nav nav-pills gap-2 nav-fill flex-lg-column w-100 p-2" id="cms-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active close-tab" data-bs-toggle="tab" data-bs-target="#terms-tab-pane" type="button" role="tab" aria-controls="contents-tab" id="terms-tab-button">Terms of Service</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link close-tab" data-bs-toggle="tab" data-bs-target="#privacy-tab-pane" type="button" role="tab" aria-controls="rates-tab" id="privacy-tab-button">Privacy Policy</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link close-tab" data-bs-toggle="tab" data-bs-target="#subjects-tab-pane" type="button" role="tab" aria-controls="subjects-tab">Licenses</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link close-tab" data-bs-toggle="tab" data-bs-target="#organization-tab-pane" type="button" role="tab" aria-controls="organization-tab">Copyright Policy</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link close-tab" data-bs-toggle="tab" data-bs-target="#organization-tab-pane" type="button" role="tab" aria-controls="organization-tab">Developers</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link close-tab" data-bs-toggle="tab" data-bs-target="#organization-tab-pane" type="button" role="tab" aria-controls="organization-tab">Third-Party Agreements</button>
                </li>
            </ul>
        </div>
        <div class="col-12 col-lg-10">
            <div class="tab-content px-2 py-1" id="cms-tab-content">
                <div class="tab-pane fade show active" id="terms-tab-pane" role="tabpanel" aria-labelledby="contents-tab" tabindex="0">
                    <h5>Terms of Service</h5>
                </div>
                <div class="tab-pane fade" id="privacy-tab-pane" role="tabpanel" aria-labelledby="rates-tab" tabindex="0">
                    <h5>Privacy Policy</h5>
                </div>
                <div class="tab-pane fade" id="subjects-tab-pane" role="tabpanel" aria-labelledby="subjects-tab" tabindex="0">
                    <h5>Subjects</h5>
                </div>
                <div class="tab-pane fade" id="organization-tab-pane" role="tabpanel" aria-labelledby="organization-tab" tabindex="0">
                    <h5>Organization</h5>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        openTab();
    });

    function openTab() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('openTerms')) {
            jQuery('#terms-tab-button').tab('show');
            console.log('open Terms')
            //$('#change-password-tab-pane').addClass('show active');
        }
        if (urlParams.has('openPrivacy')) {
            jQuery('#privacy-tab-button').tab('show');
            console.log('open Privacy')
            //$('#change-password-tab-pane').addClass('show active');
        }
    }

    function closeTab() {
        const url = new URL(window.location.href);
        url.searchParams.delete('openTerms'); // Replace 'parameter_name' with the actual name of your URL parameter
        url.searchParams.delete('openPrivacy'); // Replace 'parameter_name' with the actual name of your URL parameter
        window.history.replaceState(null, '', url);
    }

    $('.close-tab').on('click', function() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('openTerms') || urlParams.has('openPrivacy')) {
            closeTab();
        }
    })
</script>
@endsection
<style>
    .legal {
        height: 73.1vh;
    }

    .header-text {
        font-family: Arial, Helvetica, sans-serif;
        color: #759C75;
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
</style>