@extends('layouts.tutormaster')
@section('content')

@php
$page = 'Transactions';
@endphp

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
        <symbol id="payment" viewBox="0 -960 960 960">
            <title>payment</title>
            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
        </symbol>
        <symbol id="date" viewBox="0 -960 960 960">
            <title>date</title>
            <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
        </symbol>
    </svg>
</head>

<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <h4>Transactions</h4>
        </div>

        <!-- Table with Transactions -->
        <div class="p-3" style="max-height:770px; overflow:auto; scrollbar-width:thin;">
            <table class="table table-borderless text-center" style="border-collapse: separate; border-spacing: 0 10px;">
                <thead class="custom-thead">
                    <tr>
                        <th>Tutor</th>
                        <th>Parent</th>
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
                        <td>{{ $data->booking->tutorMain->tutor->userProfile->fname }} {{ $data->booking->tutorMain->tutor->userProfile->lname }}</td>
                        <td>{{ $data->booking->guardianMain->guardian->userProfile->fname }} {{ $data->booking->guardianMain->guardian->userProfile->lname }}</td>
                        <td>{{ $data->booking->tutorMain->tutor->employmentSession->sessionType->type }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->session_start)->format('M d Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->session_end)->format('M d Y') }}</td>
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