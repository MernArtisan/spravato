@extends('web.layouts.master')

@section('content')
    <style>
        /* All classes prefixed with all-provides- to prevent conflicts */
        .all-provides-container {
            padding: 30px 15px;
            max-width: 1200px;
            margin: 0 auto;
            font-family: inherit;
        }

        .all-provides-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .all-provides-header h2 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .all-provides-header p {
            font-size: 16px;
            color: #7f8c8d;
        }

        .all-provides-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .all-provides-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .all-provides-card:hover {
            transform: translateY(-5px);
        }

        .all-provides-img-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .all-provides-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .all-provides-card:hover .all-provides-img {
            transform: scale(1.05);
        }

        .all-provides-view-btn {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #26aba3;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .all-provides-view-btn:hover {
            background: #26aba3;
            box-shadow: 0 5px 15px rgba(78, 102, 248, 0.4);
        }

        .all-provides-content {
            padding: 20px;
        }

        .all-provides-content h3 {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .all-provides-content p {
            font-size: 14px;
            color: #7f8c8d;
            line-height: 1.5;
        }

        /* Modal Styles */
        .all-provides-modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .all-provides-modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 0;
            border-radius: 8px;
            max-width: 800px;
            width: 90%;
            overflow: hidden;
            position: relative;
        }

        .all-provides-modal-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .all-provides-modal-body {
            padding: 30px;
        }

        .all-provides-modal-body h3 {
            font-size: 24px;
            color: #26aba3;
            margin-bottom: 20px;
        }

        .all-provides-modal-body p {
            font-size: 16px;
            color: #34495e;
            margin-bottom: 15px;
        }

        .all-provides-modal-body ul {
            margin-bottom: 25px;
            padding-left: 20px;
        }

        .all-provides-modal-body li {
            margin-bottom: 8px;
            color: #34495e;
        }

        .all-provides-appointment-btn {
            background: #26aba3;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 20px auto 0;
            transition: all 0.3s ease;
        }

        .all-provides-appointment-btn:hover {
            background: #26aba3;
            box-shadow: 0 5px 15px rgba(78, 102, 248, 0.4);
        }

        .all-provides-close {
            position: absolute;
            right: 20px;
            top: 20px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            z-index: 1;
        }

        .all-provides-close:hover {
            color: #555;
        }

        @media (max-width: 768px) {
            .all-provides-grid {
                grid-template-columns: 1fr;
            }

            .all-provides-modal-content {
                margin: 10% auto;
                width: 95%;
            }

            .all-provides-modal-img {
                height: 200px;
            }
        }
    </style>

    <main>
        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="{{ asset('web/assets/images/blog-banner-3.webp') }}">
            </div>

            <div class="progress-tracker">
                <header class="progress-header">
                    <h1>Services</h1>
                </header>

                <div class="all-provides-container">
                    <br><br><br>

                    @if ($services->count() > 0)
                        <div class="row">
                            @foreach ($services as $service)
                                <div class="col-md-4 mb-4">
                                    <div class="all-provides-card">
                                        <div class="all-provides-img-container">
                                            <img src="{{ asset($service->image_path ?? '') }}" alt="{{ $service->name }}"
                                                class="all-provides-img">
                                            <button class="all-provides-view-btn" data-service="{{ $service->id }}">
                                                <i class="bi bi-info-circle"></i> View Details
                                            </button>
                                        </div>
                                        <div class="all-provides-content">
                                            <h3>{{ $service->title }}</h3>
                                            <p>Type : {{ $service->type }}</p>
                                            <p>{{ $service->description }}</p>
                                            <p><strong>Price:</strong> ${{ $service->price }}</p>
                                        </div>
                                    </div>

                                    <!-- Modal for each service -->
                                    <div class="all-provides-modal" id="serviceModal{{ $service->id }}">
                                        <div class="all-provides-modal-content">
                                            <span class="all-provides-close">&times;</span>
                                            <img src="{{ asset($service->image_path ?? '') }}" alt="{{ $service->name }}"
                                                class="all-provides-modal-img">
                                            <div class="all-provides-modal-body">
                                                <h3>{{ $service->title }}</h3>
                                                <p>Type : {{ $service->type }}</p>
                                                <p>{{ $service->description }}</p>

                                                <a href="">
                                                    <button class="all-provides-appointment-btn">
                                                        <i class="bi bi-calendar-plus"></i> Make an Appointment
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <h4>No services available at this time</h4>
                            <p>This provider hasn't listed any services yet.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>

@endsection

@section('scripts')
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <!-- Slick Slider JS -->
    <script src="{{ asset('assets/js/plugins/slick.min.js') }}"></script>
    <!-- nice select JS -->
    <script src="{{ asset('assets/js/plugins/nice-select.min.js') }}"></script>
    <!-- audio video player JS -->
    <script src="{{ asset('assets/js/plugins/plyr.min.js') }}"></script>
    <!-- perfect scrollbar js -->
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!-- light gallery js -->
    <script src="{{ asset('assets/js/plugins/lightgallery-all.min.js') }}"></script>
    <!-- image loaded js -->
    <script src="{{ asset('assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <!-- isotope filter js -->
    <script src="{{ asset('assets/js/plugins/isotope.pkgd.min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal functionality
            const viewBtns = document.querySelectorAll('.all-provides-view-btn');
            const closeBtns = document.querySelectorAll('.all-provides-close');

            // Open modal when View Details button is clicked
            viewBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service');
                    document.getElementById(`serviceModal${serviceId}`).style.display = 'block';
                });
            });

            // Close modal when X is clicked
            closeBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.all-provides-modal').style.display = 'none';
                });
            });

            // Close modal when clicking outside the modal content
            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('all-provides-modal')) {
                    event.target.style.display = 'none';
                }
            });
        });
    </script>
@endsection
