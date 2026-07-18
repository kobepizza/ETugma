<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-bottom: 1px solid #333;
        }
        .header h2 {
            margin: 0;
        }
        .content {
            padding: 20px;
        }
        .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #444;
        }
        .btn{
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Payment Confirmation</h2>
        </div>
        <div class="content">
            <p>Dear ,</p>
            <p>Your balance for booking is {{$bookings}}:</p>
            <p>Please click on the link below to view your booking details:</p>
            <a href="{{$transactionLink}}" class="btn">View Booking Details</a>
        </div>
    </div>
</body>
</html>