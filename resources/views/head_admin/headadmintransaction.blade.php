@extends('layouts.headadminmaster')
@section('content')

@php
$page = 'Transactions';
@endphp
<html>

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="verify" viewBox="0 -960 960 960">
            <title>verify</title>
            <path d="m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
        </symbol>
        <symbol id="search" viewBox="0 -960 960 960">
            <title>search</title>
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </symbol>
        <symbol id="close" viewBox="0 -960 960 960">
            <title>close</title>
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </symbol>
    </svg>
</head>

<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Transactions</h4>
        </div>
        <!--search bar-->
        <section class="d-flex align-items-center justify-content-center">
            <div class="input-group w-75">
                <div class="input-group mb-3">
                    <span class="input-group-text border-end-0 rounded-start-3 px-2 bg-secondary-subtle">
                        <svg class="search-icon" height="25" width="25" fill="currentcolor">
                            <use xlink:href="#search" />
                        </svg>
                    </span>
                    <input type="text" class="form-control border-start-0 bg-secondary-subtle rounded-end-3 px-1" placeholder="Search Reference Numbers" role="search" id="AsessmentSearch">
                    <button class="btn bg-secondary-subtle rounded-end-3 d-none" type="button" id="ClearSearch">
                        <svg class="close-icon" height="25" width="25" fill="currentcolor">
                            <use xlink:href="#close" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
        <!---->
        <div class="p-3">
            <!-- Table with Transactions -->
            <table class="table table-borderless text-center" style="border-collapse: separate; border-spacing: 0 10px;">
                <thead class="custom-thead">
                    <tr>
                        <th>Parent</th>
                        <th>Tutor</th>
                        <th>Session Type</th>
                        <th>Session Start Date</th>
                        <th>Session End Date</th>
                        <th>Amount Transferred</th>
                        <th>Reference Number</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody id="transactionTable">

                </tbody>
            </table>
            <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="loading">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <h5 class="p-3 text-center d-none" id="noSearch">No matches.</h5>
            <h5 class="p-3 text-center d-none" id="noSession">No transactions yet.</h5>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        loadTransactions();
    });

    function loadTransactions() {
        $.ajax({
            type: "GET",
            url: "{{route('headadmin.load.transactions')}}",
            beforeSend: function() {
                var spinner = $('#loading');
                spinner.removeClass('d-none');
            },
            success: function(data) {
                //console.log(data);
                var spinner = $('#loading');
                spinner.addClass('d-none');

                if(!data.length){
                    $('#noSession').removeClass('d-none');
                }else{
                    $('#noSession').addClass('d-none');
                }

                buildTransactions(data);
            }
        })
    }

    function buildTransactions(data) {
        let tableBody = $('#transactionTable');
        tableBody.empty();

        $.each(data, function(index, item) {

            let id = item.id;
            let parentName = item.booking.guardian_main.guardian.user_profile.fname + " " + item.booking.guardian_main.guardian.user_profile.lname;
            let tutorName = item.booking.tutor_main.tutor.user_profile.fname + " " + item.booking.tutor_main.tutor.user_profile.lname;
            let sessionType = item.booking.tutor_main.tutor.employment_session.session_type.type;
            let sessionStart = moment(item.booking.session_start_date).format('MMM D, YYYY');
            let sessionEnd = moment(item.booking.session_end_date).format('MMM D, YYYY');
            let amount = "₱" + Number(item.amount_transferred).toLocaleString();
            let reference = item.reference_number;
            let createdAt = moment(item.updated_at).format('MMM D, YYYY, h:mm A');

            let tableItem = `
            <tr class="table-row" data-id="${id}">
                <td>${parentName}</td>
                <td>${tutorName}</td>
                <td>${sessionType}</td>
                <td>${sessionStart}</td>
                <td>${sessionEnd}</td>
                <td>${amount}</td>
                <td>${reference}</td>
                <td>${createdAt}</td>
            </tr>
            `;

            tableBody.append(tableItem);
        })

    }

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
        var assessmentTable = $('#transactionTable');
        searchBox.val('');
        searchBox.addClass('rounded-end-3');
        clearBtn.addClass('d-none');
        noResult.addClass('d-none');
        assessmentTable.empty();
        loadTransactions();
    };

    function searchContacts(searchQuery) {
        $.ajax({
            type: 'GET',
            url: "{{ route('headadmin.search.transactions') }}",
            data: {
                query: searchQuery
            },
            beforeSend: function() {
                var spinner = $('#loading');
                spinner.removeClass('d-none');
            },
            success: function(data) {
                //console.log(data);
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

            }
        })
    };

    function displaySearchResults(data) {
        //console.log('search success!');

        var spinner = $('#loading');
        spinner.removeClass('d-none');

        let tableBody = $('#transactionTable');
        tableBody.empty();

        $.each(data, function(index, item) {

            let id = item.id;
            let parentName = item.booking.guardian_main.guardian.user_profile.fname + " " + item.booking.guardian_main.guardian.user_profile.lname;
            let tutorName = item.booking.tutor_main.tutor.user_profile.fname + " " + item.booking.tutor_main.tutor.user_profile.lname;
            let sessionType = item.booking.tutor_main.tutor.employment_session.session_type.type;
            let sessionStart = moment(item.booking.session_start_date).format('MMM D, YYYY');
            let sessionEnd = moment(item.booking.session_end_date).format('MMM D, YYYY');
            let amount = "₱" + Number(item.amount_transferred).toLocaleString();
            let reference = item.reference_number;
            let createdAt = moment(item.updated_at).format('MMM D, YYYY, h:mm A');

            let tableItem = `
            <tr class="table-row" data-id="${id}">
                <td>${parentName}</td>
                <td>${tutorName}</td>
                <td>${sessionType}</td>
                <td>${sessionStart}</td>
                <td>${sessionEnd}</td>
                <td>${amount}</td>
                <td>${reference}</td>
                <td>${createdAt}</td>
            </tr>
            `;

            tableBody.append(tableItem);
        })

    };
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
    
    .custom-thead {
        background-color: #759C75;
        color: white;
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