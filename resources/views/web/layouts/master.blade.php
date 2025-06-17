<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Spravato</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web/assets/images/favourite_icon.svg') }}">
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
    <link href="{{asset('admin/assets/css/admin_custom.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">
    <!-- LightGallery CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" />

    <!-- LightGallery core & video plugin -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">

    @yield('styles')
</head>


<body>

    @include('web.layouts.header')
    @yield('content')
    @include('web.layouts.footer')


    @yield('scripts')
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
    <script src="{{ asset('admin/assets/js/admin_custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/video/lg-video.umd.min.js"></script>

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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
        @if (session('error'))
            var errorSound = new Audio('{{ asset('sounds/error.mp3') }}');
            errorSound.play();

            toastr.error('{{ session('error') }}', 'Error');
        @endif
    </script>
    <style>
        body{
            z-index 1;
        }
    </style>
</body>

</html>