<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | Spravato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/assets/images/favourite_icon.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/vendor/bicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/style.css') }}">
</head>

<body class="bg-transparent">
    <main>
        <div class="main-wrapper pb-0 mb-0">
            <div class="timeline-wrapper overflow-hidden">
                <div class="timeline-header">
                    <div class="container-fluid p-0">
                        <div class="row g-0 align-items-center">
                            <div class="col-lg-6">
                                <div class="timeline-logo-area d-flex align-items-center">
                                    <div class="timeline-logo">
                                        <a href="{{ url('/') }}">
                                            <h2 class="my-logo-txt">Spravato</h2>
                                        </a>
                                    </div>
                                    <div class="timeline-tagline">
                                        <h6 class="tagline">It helps you to connect and share with the people in your
                                            life</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                    </div>
                </div>

                <div class="timeline-page-wrapper">
                    <div class="container-fluid p-0">
                        <div class="row g-0">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <div class="timeline-bg-content bg-img"
                                    data-bg="{{ asset('web/assets/images/timeline/adda-timeline.jpg') }}">
                                </div>
                            </div>

                            <div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center justify-content-center">
                                <div class="signup-form-wrapper">
                                    <h1 class="create-acc text-center">Create Your Account</h1>
                                    <div class="signup-inner text-center">
                                        <h3 class="title">Join Spravato</h3>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif
                                        
                                        <form class="signup-inner--form" method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" name="first_name" class="single-field"
                                                        placeholder="First Name" required
                                                        value="{{ old('first_name') }}">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" name="last_name" class="single-field"
                                                        placeholder="Last Name" required value="{{ old('last_name') }}">
                                                </div>
                                                <div class="col-12">
                                                    <input type="email" name="email" class="single-field"
                                                        placeholder="Email Address" value="{{ old('email') }}" required>
                                                </div>
                                                <div class="col-12">
                                                    <input type="password" name="password" class="single-field"
                                                        placeholder="Password" required>
                                                </div>
                                                <div class="col-12">
                                                    <input type="password" name="password_confirmation"
                                                        class="single-field" placeholder="Confirm Password" required>
                                                    <input type="hidden" name="role" value="user">
                                                </div>
                                                <div class="col-12">
                                                    <button class="submit-btn" type="submit">Register</button>
                                                </div>
                                            </div>
                                            <h6 class="terms-condition mt-3">
                                                Already have an account?
                                                <a href="{{ route('login') }}">Login here</a><br>
                                                Want to offer services?
                                                <a href="{{ route('provider.register') }}" class="text-primary">Create a Provider Account</a>
                                            </h6>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('web/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/main.js') }}"></script>

</body>

</html>