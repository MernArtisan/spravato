@extends('web.layouts.master')

@section('content')
<style>
    /* Prefix all classes with sp- to avoid conflicts */
    .sp-provider-wrapper {
        font-family: inherit;
        line-height: inherit;
        color: inherit;
    }
    
    .sp-container {
        width: 100%;
        padding: 0 15px;
        margin: 0 auto;
        max-width: 1200px;
    }
    
    .sp-section-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .sp-section-title {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #2c3e50;
    }
    
    .sp-section-subtitle {
        font-size: 16px;
        color: #7f8c8d;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .sp-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }
    
    .sp-service-card {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
    }
    
    .sp-service-card:hover {
        transform: translateY(-5px);
    }
    
    
    .sp-card-icon {
        font-size: 24px;
        color: #4e66f8;
    }
    
    .sp-card-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
        margin-top: 15px;
        color: #2c3e50;
    }
    
    .sp-card-text {
        margin-bottom: 20px;
        color: #34495e;
    }
    
    .sp-card-list {
        color: #7f8c8d;
    }
    
    .sp-card-list li {
        margin-bottom: 8px;
    }
    
    .sp-bg-light {
        background-color: #f8f9fa;
        padding: 50px 0;
    }
    
    .sp-process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
    
    .sp-process-step {
        text-align: center;
        background: #fff;
        padding: 25px 15px;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }
    
    .sp-step-number {
        width: 50px;
        height: 50px;
        background: #4e66f8;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: bold;
        margin: 0 auto 15px;
    }
    
    .sp-step-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #2c3e50;
    }
    
    .sp-step-desc {
        font-size: 14px;
        color: #7f8c8d;
    }
    
    .sp-info-section {
        padding: 50px 0;
    }
    
    .sp-info-section .sp-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
    }
    
    .sp-info-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #2c3e50;
    }
    
    .sp-info-text {
        margin-bottom: 20px;
        color: #34495e;
    }
    
    .sp-info-point {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
    }
    
    .sp-info-icon {
        color: #27ae60;
        font-size: 20px;
        margin-right: 10px;
    }
    
    
    @media (max-width: 768px) {
        .sp-info-section .sp-container {
            grid-template-columns: 1fr;
        }
        
        .sp-services-grid {
            grid-template-columns: 1fr;
        }
        
        .sp-process-steps {
            grid-template-columns: 1fr 1fr;
        }
    }
    
    @media (max-width: 480px) {
        .sp-process-steps {
            grid-template-columns: 1fr;
        }
    }

    .sp-service-card {
        background: #fff;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;

        /* ADD these lines for fixed height */
        height: 450px; /* you can adjust this height as per need */
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .sp-card-img-box img {
        width: 100%;
        height: 200px; /* fix image height */
        object-fit: cover;
    }

    .sp-card-text {
        margin-bottom: 20px;
        color: #34495e;

        /* Add these for text control */
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 6; /* show 6 lines max */
        -webkit-box-orient: vertical;
        flex-grow: 1;
    }

</style>
    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="{{ asset('web/assets/images/blog-banner-3.webp') }}">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
             <div class="progress-tracker">
        <header class="progress-header">
            <h1>Services Provider</h1>
        </header>
       <!--my-code--->
<div class="sp-provider-wrapper">
    <!-- Services Section -->
    <section class="sp-services-section">
        <div class="sp-container">
            <div class="sp-section-header">
                <h2 class="sp-section-title">Our Spravato Treatment Services</h2>
                <p class="sp-section-subtitle">FDA-approved esketamine therapy for treatment-resistant depression</p>
            </div>
            
            <div class="sp-services-grid">
            
                <div class="row">
                  @foreach ($providers as $sp)
                    <div class="col-md-4">
                        <div class="sp-service-card">
                            <div class="sp-card-img-box">
                                <a href="#">
                                    <img src="{{ asset($sp->provider->logo) }}" >
                                </a>
                            </div>
                            <h3 class="sp-card-title"><a href="{{route('provider.services', $sp->id)}}" style="text-decoration: none;color: black">{{ $sp->provider->name }} </a></h3>
                            <p class="sp-card-text">
                                {{ $sp->provider->description }} 
                            </p>
                            

                        </div>
                    </div>
                @endforeach

                </div>
         
            </div>
        </div>
    </section>
    <div class="modal fade" id="serviceOverviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <p class="modal-title" id="modalTitle">Service Title</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex gap-3" >
            <img id="modalImage" src="" style="width: 200px; height: 150px; object-fit: cover;" alt="Service Image">
            <div>
            <b id="servicetitle" style="font-size: 18px;"></b>
            </br>
            <b style="font-size: 14px;">Type</b> : <b id="serviceType" style="font-size: 14px;">:</b>
            <p id="modalDescription"></p>
            <p><strong>Price:</strong> $<span id="modalPrice"></span></p>
            <div class="d-flex align-items-center gap-2">
                <img id="modalAddedByImage" src="" style="width: 25px; height: 25px; border-radius: 50%; object-fit: cover;">
                <span id="modalAddedBy"></span>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Process Section -->
    <section class="sp-process-section sp-bg-light">
        <div class="sp-container">
            <div class="sp-section-header">
                <h2 class="sp-section-title">Treatment Process</h2>
                <p class="sp-section-subtitle">What to expect during your therapy journey</p>
            </div>
            
            <div class="sp-process-steps">
                <div class="sp-process-step">
                    <div class="sp-step-number">1</div>
                    <h4 class="sp-step-title">Evaluation</h4>
                    <p class="sp-step-desc">Comprehensive assessment</p>
                </div>
                
                <div class="sp-process-step">
                    <div class="sp-step-number">2</div>
                    <h4 class="sp-step-title">Scheduling</h4>
                    <p class="sp-step-desc">Plan your sessions</p>
                </div>
                
                <div class="sp-process-step">
                    <div class="sp-step-number">3</div>
                    <h4 class="sp-step-title">Treatment</h4>
                    <p class="sp-step-desc">Supervised administration</p>
                </div>
                
                <div class="sp-process-step">
                    <div class="sp-step-number">4</div>
                    <h4 class="sp-step-title">Progress</h4>
                    <p class="sp-step-desc">Regular assessments</p>
                </div>
            </div>
        </div>
    </section>
</div>
        <!--my-code--->

    </div>
     <!-- Wrapping everything in treat-wrapper -->
    </div>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
@endsection
@section('scripts')
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- audio video player JS -->
    <script src="assets/js/plugins/plyr.min.js"></script>
    <!-- perfect scrollbar js -->
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!-- light gallery js -->
    <script src="assets/js/plugins/lightgallery-all.min.js"></script>
    <!-- image loaded js -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- isotope filter js -->
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal functionality
            const modal = document.getElementById('progress-note-modal');
            const addBtn = document.getElementById('progress-add-note');
            const closeBtn = document.querySelector('.progress-close-btn');
            const cancelBtn = document.getElementById('progress-note-cancel');
            const noteForm = document.getElementById('progress-note-form');
            const percentageInput = document.getElementById('progress-note-percentage');
            const percentageValue = document.getElementById('progress-percentage-value');
            
            // Update percentage value display
            percentageInput.addEventListener('input', function() {
                percentageValue.textContent = this.value + '%';
            });
            
            // Open modal when Add Note button is clicked
            addBtn.addEventListener('click', function() {
                // Set default date to today
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('progress-note-date').value = today;
                
                modal.style.display = 'flex';
            });
            
            // Close modal when X is clicked
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });
            
            // Close modal when Cancel button is clicked
            cancelBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });
            
            // Close modal when clicking outside the modal content
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
            
            // Handle form submission
            noteForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Here you would typically save the progress note
                // For now, we'll just show an alert and close the modal
                alert('Progress note saved successfully!');
                modal.style.display = 'none';
                
                // Reset form
                noteForm.reset();
                percentageValue.textContent = '50%';
                percentageInput.value = 50;
            });
            
            // Make patient cards clickable to view details
            const patientCards = document.querySelectorAll('.patient-card');
            patientCards.forEach(card => {
                card.addEventListener('click', function() {
                    // In a real application, this would open a detailed view
                    alert('Opening detailed view for patient: ' + 
                          this.querySelector('.patient-name').textContent);
                });
            });
        });

        
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.sp-quick-btn');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const title = this.dataset.title;
                    const description = this.dataset.description;
                    const image = this.dataset.image;
                    const price = this.dataset.price;
                    const addedBy = this.dataset.addedby;
                    const addedByImage = this.dataset.addedbyimage;
                    const type = this.dataset.type;

                    
                    document.getElementById('modalTitle').innerText = "Services Overviewe";
                    document.getElementById('servicetitle').innerText = title;
                    document.getElementById('serviceType').innerText = type;
                    document.getElementById('modalDescription').innerText = description;
                    document.getElementById('modalImage').src = image;
                    document.getElementById('modalPrice').innerText = price;
                    document.getElementById('modalAddedBy').innerText = addedBy;
                    document.getElementById('modalAddedByImage').src = addedByImage;

                    const modal = new bootstrap.Modal(document.getElementById('serviceOverviewModal'));
                    modal.show();
                });
            });
        });
    </script>


    
@endsection