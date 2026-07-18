@extends('layouts.clientmaster')
@section('content')

@php
$page = 'Transactions';
@endphp

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="payment" viewBox="0 -960 960 960">
            <title>payment</title>
            <path d="M160-240v-320 13-173 480Zm0-400h640v-80H160v80Zm307 480H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v210q-36-25-78-37.5T716-560q-54 0-104 21t-88 59H160v240h283q3 21 9 41t15 39Zm320-25 28-28-75-75v-112h-40v128l87 87ZM721-80q-84 0-142.5-58T520-280q0-84 58.5-142T721-480q83 0 141 58.5T920-280q0 83-58 141.5T721-80Z" />
        </symbol>
        <symbol id="date" viewBox="0 -960 960 960">
            <title>date</title>
            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
        </symbol>
        <symbol id="pending" viewBox="0 -960 960 960">
            <title>pending</title>
            <path d="M444-200h70v-50q50-9 86-39t36-89q0-42-24-77t-96-61q-60-20-83-35t-23-41q0-26 18.5-41t53.5-15q32 0 50 15.5t26 38.5l64-26q-11-35-40.5-61T516-710v-50h-70v50q-50 11-78 44t-28 74q0 47 27.5 76t86.5 50q63 23 87.5 41t24.5 47q0 33-23.5 48.5T486-314q-33 0-58.5-20.5T390-396l-66 26q14 48 43.5 77.5T444-252v52Zm36 120q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
        </symbol>
    </svg>
</head>

<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <h4>Transactions</h4>
            <button class="btn btn-view d-flex align-items-center gap-1" type="button" data-bs-toggle="modal" data-bs-target="#bookingsModal">
                <svg fill="currentcolor" height="20" width="20">
                    <use xlink:href="#payment" />
                </svg>
                Pending Payments
            </button>
        </div>
        <div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif
        </div>
        <!-- Bookings Modal -->
        <div class="modal fade" tabindex="-1" id="bookingsModal" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content" id="asssessment-rubrics">
                    <form action="">
                        <div class="modal-header">
                            <h5 class="modal-title">My Pending Payments | {{ ucfirst(strtolower(session('user_profiles')->fname)) . ' ' .  ucfirst(strtolower(session('user_profiles')->lname)) ?? 'N/A' }}</h5>
                        </div>
                        <div class="modal-body">
                            <div id="bookings-alert-div"></div>
                            <section class="px-2" style="max-height:450px; overflow-y:auto; scrollbar-width:thin;">
                                <div class="d-flex align-items-center w-100 justify-content-center bg-text-secondary d-none" id="bookingLoading">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <ul class="client-bookings m-0 p-0" id="bookings-list">
                                    <!-- Pending payments will be loaded here -->
                                </ul>
                                <h5 class="p-3 text-center d-none" id="noBookings">No Pending Payments.</h5>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-view close-payment" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cancel Booking Modal -->
        <div class="modal fade" id="cancelBookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Left Side QR Code Container -->
                            <div class="col-md-5">
                                <div class="qr-container">
                                    <img id="dynamicQR" src="{{ asset('Images/gcash_payment.jpg') }}" alt="QR Code" class="img-fluid">
                                </div>
                            </div>

                            <!-- Right Side Payment Details -->
                            <div class="col-md-7">
                                <h3 id="checkoutModalLabel">Payment Total</h3>
                                <div class="price-display" id="dynamicAmount">PHP 1,760.00</div>

                                <!-- Payment Method Form -->
                                <div class="card shadow-sm payment-details mt-3">
                                    <div class="card-body">
                                        <form action="" method="" enctype="multipart/form-data" id="cancelBookingForm">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label for="uploadReceipt" class="form-label fw-semibold">Upload Receipt</label>
                                                <input type="file" id="uploadReceipt" name="uploadReceipt" class="form-control" accept="image/png, image/jpg">
                                                <p class="fw-semibold">Accepted documents: .jpg .png</p>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="referenceNumber" class="form-label">Reference Number</label>
                                                <input type="text" class="form-control" id="referenceNumber" name='referenceNumber' placeholder="6082324124 e.g">
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount Transferred</label>
                                                <input type="text" class="form-control" id="amount" name="amount" placeholder="e.g. 1760.00">
                                            </div>

                                            <input type="hidden" id="cancelBookingID" name="cancelBookingID">
                                            <button type="submit" class="btn btn-pay">Pay Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table with Transactions -->
        <div class="p-3" style="max-height:770px; overflow:auto; scrollbar-width:thin;">
            <table class="table table-borderless table-responsive text-center" style="border-collapse: separate; border-spacing: 0 10px;">
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
                <tbody>
                    @forelse ($transaction as $data)
                    @if($data->paid == 1)
                    <tr class="table-row">
                        <td>{{ $data->booking->guardianMain->guardian->userProfile->fname }} {{ $data->booking->guardianMain->guardian->userProfile->lname }}</td>
                        <td>{{ $data->booking->tutorMain->tutor->userProfile->fname }} {{ $data->booking->tutorMain->tutor->userProfile->lname }}</td>
                        <td>{{ $data->booking->tutorMain->tutor->employmentSession->sessionType->type }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->booking->session_start_date)->format('M d Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->booking->session_end_date)->format('M d Y') }}</td>
                        <td>₱ {{ number_format($data->amount_transferred) }}</td>
                        <td>{{ $data->reference_number }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('M d Y, g:i A') }}</td>
                    </tr>
                    @endif
                    @empty
                    <tr>
                        <td colspan="8">
                            <h5 class="p-2">No transactions yet</h5>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        // Load Pending Payments
        loadPendingPayment();
        openPaymentModal();
    });

    setTimeout(function() {
        $('.alert').remove();
    }, 15000)

    function openPaymentModal() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('openPayments')) {
            $('#bookingsModal').modal('show');
        }
    }

    function closePaymentModal() {
        const url = new URL(window.location.href);
        url.searchParams.delete('openPayments'); // Replace 'parameter_name' with the actual name of your URL parameter
        window.history.replaceState(null, '', url);
    }

    $('.close-payment').on('click', function() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('openPayments')) {
            closePaymentModal();
        }
    })

    function loadPendingPayment() {
        $.ajax({
            type: 'GET',
            url: "{{ route('parent.load.payment.pendings') }}",
            beforeSend: function() {
                $('#bookingLoading').removeClass('d-none');
            },
            success: function(data) {
                $('#bookingLoading').addClass('d-none');
                if (!data.length) {
                    $('#noBookings').removeClass('d-none');
                } else {
                    $('#noBookings').addClass('d-none');
                }
                buildBookings(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        })
    }

    function buildBookings(data) {
        let bookingList = $('#bookings-list');
        bookingList.empty();

        $.each(data, function(index, item) {
            //console.log(item);

            let rate = item.booking.tutor_main.tutor.employment_session.session_type_id == 2 ?
                item.booking.rate_multiply :
                item.booking.rate.rate;
            let formattedRate = new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(rate);

            let bookingItem = `
                <li class="booking-item" data-booking-id="${item.id}">
                    <div class="card shadow-sm booking-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="row align-items-center justify-content-center w-100">
                                <div class="col-12 col-md-4 d-flex justify-content-center mb-2">
                                    <div class="booking-profile-pic">
                                        <img src="${item.booking.tutor_main.tutor.user_profile.profile_pic}" class="rounded-circle border border-4 border-white" alt="" width="117" height="115" style="object-fit:cover;" onerror="this.src='Images/default-profile.png';">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2">
                                    <div>
                                        <h6 class="text-break fw-semibold">Tutor: <span class="fw-normal">${item.booking.tutor_main.tutor.user_profile.fname} ${item.booking.tutor_main.tutor.user_profile.lname}</span></h6>
                                        <h6 class="text-break fw-semibold">Student: <span class="fw-normal">${item.booking.guardian_main.child.fname} ${item.booking.guardian_main.child.lname}</span></h6>
                                        <h6 class="text-break fw-semibold">Subject: <span class="fw-normal">${item.booking.tutor_main.department_year_subject.subject.subjects}</span></h6>
                                        <h6 class="text-break fw-semibold mb-3">Year Level: <span class="fw-normal">${item.booking.tutor_main.department_year_subject.grade_level.year}</span></h6>
                                        <p class="mb-0 fw-semibold">Session Type: <span class="fw-normal">${item.booking.booking_availability.session_type.type}</span></p>
                                        <p class="mb-0 fw-semibold">Day & Time: <span class="fw-normal">${item.booking.booking_availability.day.day}, ${item.booking.booking_availability.availability_start.availability} - ${item.booking.booking_availability.availability_end.availability}</span></p>
                                        <p class="mb-0 fw-semibold">Start Date: <span class="fw-normal">${moment(item.booking.session_start_date).format('MMMM D, YYYY')}</span></p>
                                        <p class="mb-3 fw-semibold">End Date: <span class="fw-normal">${moment(item.booking.session_end_date).format('MMMM D, YYYY')}</span></p>
                                        <p class="mb-0 fw-semibold">Payment Status: <span class="fw-normal ${item.paid === 0 ? 'text-warning' : 'text-success'}">${item.paid === 0 ? 'Pending' : 'Paid'}</span></p>
                                        <h6 class="text-break fw-semibold">Total: <span class="fw-normal">${formattedRate} </span></h6>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2 d-flex justify-content-center mb-2">
                                    <form action="{{route('send.payment')}}" method="POST">
                                    @csrf
                                        <input type="hidden" name="transaction_id" value="${item.booking_id}">
                                        <button type="submit" class="btn bookingPaymentBtn btn-view">Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            `;
            bookingList.append(bookingItem);
        })
    }

    // Event listener for cancel button to load modal
    $('#bookings-list').on('click', '.bookingDismissBtn', function() {
        var transactionId = $(this).data('cancel-id');
        loadTransactionDetails(transactionId); // Load transaction details into modal
    });

    function loadTransactionDetails(transactionId) {
        $.ajax({
            url: "{{ route('getTransactionDetails') }}",
            type: 'GET',
            data: {
                transaction_id: transactionId
            },
            success: function(response) {
                // Set data into modal
                $('#dynamicQR').attr('src', response.qr_image);
                $('#dynamicAmount').text('PHP ' + response.amount_due);
                $('#referenceNumber').val(''); // Clear reference number
                $('#amount').val(response.amount_due);
                $('#cancelBookingID').val(response.transaction_id);
                // Show modal
                $('#cancelBookingModal').modal('show');
            },
            error: function(xhr) {
                console.error('Error fetching transaction details:', xhr.responseText);
            }
        });
    }

    // Handle form submission for payment
    $('#cancelBookingForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('submitTransactionPayment') }}", // Submit payment URL
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#cancelBookingModal').modal('hide');
                    alert('Payment completed successfully!');
                    loadPendingPayment(); // Reload pending payments
                } else {
                    alert('Failed to complete payment.');
                }
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    });
</script>

<style>
    .table-row {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table-row td {
        padding: 15px;
        border: none;
    }

    .custom-thead {
        background-color: #759C75;
        color: white;
    }

    .qr-container {
        background-color: #007bff;
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
    }

    .qr-container img {
        width: 100%;
        /* Adjusted width to fit the container */
        height: auto;
        max-width: 400px;
        /* Adjusted maximum width for better visibility */
        object-fit: cover;
        border-radius: 10px;
    }

    .price-display {
        font-size: 32px;
        font-weight: bold;
        color: #007bff;
    }

    .payment-details {
        padding: 10px;
    }

    .card-body {
        padding: 10px;
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

    .btn-pay {
        width: 100%;
        /* Make the button full width */
        padding: 10px;
        /* Add some padding for a nicer look */
        font-size: 16px;
        /* Adjust font size */
        background-color: transparent;
        border-color: #759C75 !important;
        color: black;
        /* Set the text color */
        /* Remove borders */
        border-radius: 15px !important;
        /* Optional: Add some border-radius for rounded corners */
    }

    .btn-pay:hover {
        background-color: #759C75 !important;
        border-color: #759C75 !important;
        border-radius: 15px !important;
        color: white !important;
        transition: all 0.3s ease-in-out;
        /* Darken the button color on hover */
    }
</style>

@endsection