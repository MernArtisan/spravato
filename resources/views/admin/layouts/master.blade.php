<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('web/assets/images/favourite_icon.svg')}}">
    <link href="{{asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/admin_custom.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
    <link href="{{asset('admin/assets/plugins/custombox/custombox.min.css')}}" rel="stylesheet" type="text/css">

    @yield('styles')
</head>

<body>
    <div class="topbar">
        <nav class="navbar-custom">
            @include('admin.layouts.header')
        </nav>
    </div>

    <x-admin.page-wrapper :wrapper_reppeater="$wrapper_reppeater ?? []" />

    <div class="page-wrapper">
        <div class="page-wrapper-inner">
            <div class="left-sidenav">
                @include('admin.layouts.side')
            </div>
            <div class="page-content">
                @yield('content')
                <footer class="footer text-center text-sm-left">&copy; 2019 Frogetor
                    <span class="text-muted d-none d-sm-inline-block float-right">Crafted with
                        <i class="mdi mdi-heart text-danger"></i> by Mannatthemes
                    </span>
                </footer>
            </div>
        </div>
    </div>


    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/admin_custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
    <script src="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/jquery.dashboard-2.init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('admin/assets/plugins/custombox/custombox.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custombox/custombox.legacy.min.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/jquery.modal-animation.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>


    @yield('scripts')
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
        * {
            text-transform: uppercase;

        }
    </style>

</body>

</html>