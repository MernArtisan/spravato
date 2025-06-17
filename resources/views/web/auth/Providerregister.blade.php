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
                                    <div class="signup-inner text-center">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif

                                        <form class="signup-inner--form" method="POST" action="{{ route('register') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <!-- 🔰 Store Logo Preview (Top) -->
                                            <div class="col-12 text-center mb-4">
                                                <input type="file" id="logoInput" name="logo" accept="image/*"
                                                    style="display: none;" onchange="previewLogo(this)">
                                                <label for="logoInput" style="cursor: pointer;">
                                                    <img id="logoPreview" src="{{ asset('store.jpg') }}"
                                                        alt="Store Logo"
                                                        style="width: 120px; height: 120px; object-fit: cover; border-radius: 100px; border: 2px solid #ccc;">
                                                    <br><small class="d-block mt-2 text-muted">Click to upload store
                                                        logo</small>
                                                </label>
                                            </div>

                                            <!-- Form Fields -->
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
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" name="provider_store_name" class="single-field"
                                                        placeholder="Store/Business Name"
                                                        value="{{ old('provider_store_name') }}">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" name="establish_since" class="single-field"
                                                        placeholder="Established Since (e.g., 2015)"
                                                        value="{{ old('establish_since') }}">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div class="input-group">
                                                        <input type="text" id="certificateName" class="form-control"
                                                            placeholder="No file chosen" readonly>
                                                        <label class="input-group-text btn btn-primary"
                                                            style="cursor: pointer;background: #2c9cb5;color: white;margin-top: 1px;">
                                                            &nbsp;
                                                            <p style="margin-top: -12px;padding: 3px;">Upload
                                                                Certificate</p>
                                                            <input type="file" name="certificate" id="certificateInput"
                                                                accept=".pdf,.doc,.docx,.jpg,.png"
                                                                style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <script>
                                                    document.getElementById('certificateInput').addEventListener('change', function () {
                                                        const fileName = this.files[0]?.name || 'No file chosen';
                                                        document.getElementById('certificateName').value = fileName;
                                                    });
                                                </script>

                                                <div class="col-12">
                                                    <textarea name="description" class="single-field" rows="2"
                                                        placeholder="Business Description">{{ old('description') }}</textarea>
                                                </div>

                                                <input type="hidden" name="role" value="provider">

                                                <div class="col-12">
                                                    <button class="submit-btn" type="submit">Register as
                                                        Provider</button>
                                                </div>
                                            </div>
                                            <h6 class="terms-condition mt-3">
                                                Already have an account?
                                                <a href="{{ route('login') }}">Login here</a><br>
                                            </h6>
                                        </form>

                                        <!-- ✅ Image Preview Script -->
                                        <script>
                                            function previewLogo(input) {
                                                if (input.files && input.files[0]) {
                                                    const reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        document.getElementById('logoPreview').src = e.target.result;
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>

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