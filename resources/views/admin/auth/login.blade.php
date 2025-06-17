<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spravato | Admin Login</title>
    <link rel="shortcut icon" href="{{asset('web/assets/images/favourite_icon.svg')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
            font-family: 'Poppins', sans-serif;
        }

        .container-fluid {
            height: 100%;
        }

        .row.full-height {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .left-section {
            background: url('{{ asset('login.jpg') }}') no-repeat center;
            background-size: cover;
            background-color: #e0f7f6;
            height: 100%;
        }

        .right-section {
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.05);
            background: #fff;
        }

        .brand {
            font-size: 28px;
            font-weight: bold;
            color: #20b2aa;
            text-align: center;
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            background: #f4f6f9;
            border: none;
        }

        .btn-primary {
            background-color: #20b2aa;
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #1ca19a;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row full-height">

            <div class="col-md-6 d-none d-md-block left-section">
            </div>

            <div class="col-md-6 col-12 right-section">
                <div class="login-card">
                    <div class="brand">Spravato Admins</div>

                    <form method="POST" action="{{ route('admin.authenticate') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
        };

        @if (session('success'))
            var successSound = new Audio('{{ asset('sounds/success.mp3') }}');
            successSound.play();

            var $toast = toastr.success('{{ session('success') }}', 'Success');
            if ($toast) {
                $toast.css({
                    "background-color": "#26aba3",
                    "color": "white"
                });
            }
        @endif

            @if (session('error'))
                var errorSound = new Audio('{{ asset('sounds/error.mp3') }}');
                errorSound.play();

                toastr.error('{{ session('error') }}', 'Error');
            @endif
    </script>

</body>

</html>