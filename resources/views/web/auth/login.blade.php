<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Spravato</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/assets/images/favourite_icon.svg') }}">

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/vendor/bicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/vendor/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/plyr.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/plugins/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/style.css') }}">
</head>

<body class="bg-transparent">

    <main>
        <div class="main-wrapper pb-0 mb-0">
            <div class="timeline-wrapper overflow-hidden">
                <div class="timeline-header">
                    <div class="container-fluid p-0">
                        <div class="row g-0 align-items-center">
                            <br><br>
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
                                    <h1 class="create-acc text-center">Login to Your Account</h1>
                                    <div class="signup-inner text-center">
                                        <h3 class="title">Welcome Back to Spravato</h3>

                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif

                                        <form class="signup-inner--form" method="POST"
                                            action="{{ route('authenticate') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="email" name="email" class="single-field"
                                                        placeholder="Email" required>
                                                </div>
                                                <div class="col-12">
                                                    <input type="password" name="password" class="single-field"
                                                        placeholder="Password" required>
                                                </div>
                                                <div class="offset-4 coL-md-2">
                                                    <a href="#" class="text-primary" data-bs-toggle="modal"
                                                        data-bs-target="#ltn_forget_password_modal">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <button class="submit-btn" type="submit">Login</button>
                                                </div>
                                            </div>

                                            <h6 class="terms-condition mt-3">
                                                Don’t have an account?
                                                <a href="{{ route('register') }}">Register here</a><br>
                                                {{-- Want to offer services?
                                                <a href="" class="text-primary">Create a Provider Account</a> --}}
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
    <div class="modal fade" id="ltn_forget_password_modal" tabindex="-1" role="dialog"
        aria-labelledby="forgetModalLabel" aria-hidden="true" style="z-index: 1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('password.email') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="text-dark" style="margin-left: 20px">Forget Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Enter your email and we’ll send you a link to reset your password.</p>
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="w-100" style="background: #26aba3;padding: 9px;border-radius: 10px;">Send Reset Link</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('web/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/plugins/slick.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/plugins/nice-select.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/plugins/plyr.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/plugins/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/assets/js/main.js') }}"></script>

</body>

</html>