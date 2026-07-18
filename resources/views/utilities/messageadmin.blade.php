@extends((session('clientMain') ? 'layouts.clientmaster' : (session('tutorMain') ? 'layouts.tutormaster' : '')))

@section('content')

@php
$page='Message Admin';
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }

        #message {
            height: 300px !important;
        }

        .message-container {

            margin: 50px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .message-container h4 {
            margin-bottom: 30px;
            font-size: 1.25rem;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            font-size: 1rem;
            padding: 12px;
        }

        .send-btn {
            background-color: #759C75;
            /* Custom button color */
            border-color: #759C75 !important;
            color: #fff;
            padding: 10px 25px;
            font-size: 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .form-group {
            margin-bottom: 25px;
        }
    </style>
</head>

<main class="content px-2 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Message Admin</h4>
        </div>
        <div class="message-container col-10 col-md-6 col-lg-8">
            <h4>Send message to admin</h4>
            <form method="POST" action="{{route('admin.send')}}">
                @if(Session('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif

                @csrf

                <div class="form-group">
                    <label for="title" class="form-label">Subject</label>
                    <input type="text" class="form-control" name="title" placeholder="What is this about?" required>
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="6" placeholder="Write your concern here.." required></textarea>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">

                    </div>
                    <button type="submit" class="btn send-btn">Send</button>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <script>
            setTimeout(function() {
                let alertElement = document.querySelector('.alert');
                if (alertElement) {
                    alertElement.remove();
                }
            }, 3000); // The alert will disappear after 3 seconds
        </script>
    </div>
</main>

</html>

@endsection