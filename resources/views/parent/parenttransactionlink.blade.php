@extends('layouts.clientmaster')
@section('content')
@php
$page ='Assessment'
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    .qr-code {
        max-width: 250px;
        height: auto;
    }

    .container-wrapper {
        background-color: #789D73;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px; /* Adds space below the container */
    }

    .container-wrapper .form-label {
        color: white; /* Change label color to white */
    }

    .row.align-items-center {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>

    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Booking Payment</h2>

        <!-- Flexbox container with QR Code on the Left and Form on the Right -->
        <div class="row align-items-center container-wrapper">
            <!-- Left Column: QR Code Image -->
            <div class="col-md-6 text-center">
                <p>Scan this QR code to make the payment:</p>
                <img src="{{ asset('Images/gcash.jpg') }}" alt="QR Code" class="qr-code">
            </div>

            <!-- Right Column: Form -->
            <div class="col-md-6">
                <form action="{{route('parent.payment')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="referenceNumber" class="form-label">Reference Number</label>
                        <input type="text" class="form-control" id="referenceNumber" name="reference_number" placeholder="Enter Reference Number" required>
                    </div>

                    <div class="mb-3">
                        <label for="amountPaid" class="form-label">Amount Paid</label>
                        <input type="number" class="form-control" id="amountPaid" name="amount_paid" placeholder="Enter Amount Paid" required>
                    </div>

                    <div class="mb-3">
                        <label for="receiptImage" class="form-label">Upload Receipt</label>
                        <input type="file" class="form-control" id="receiptImage" name="receipt_image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit Payment</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

@endsection