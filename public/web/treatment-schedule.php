    <!-- header area start -->
    <?php
include 'include/header.php';
?>
    <!-- header area end -->
    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/blog-banner-3.webp">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
     <!-- Wrapping everything in treat-wrapper -->
    <div class="treat-wrapper">
        <div class="treat-container">
            <header class="treat-header">
                <h1 class="treat-h1">Therapist Treatment Schedule</h1>
            </header>
            
            <div class="treat-controls">
                <div class="treat-filter-group">
                    <select class="treat-select" id="treat-therapist-select">
                        <option value="">All Therapists</option>
                        <option value="dr_smith">Dr. Smith (Physical Therapy)</option>
                        <option value="dr_johnson">Dr. Johnson (Occupational Therapy)</option>
                        <option value="dr_williams">Dr. Williams (Speech Therapy)</option>
                    </select>
                    
                    <select class="treat-select" id="treat-treatment-type">
                        <option value="">All Treatment Types</option>
                        <option value="physical">Physical Therapy</option>
                        <option value="occupational">Occupational Therapy</option>
                        <option value="speech">Speech Therapy</option>
                        <option value="massage">Therapeutic Massage</option>
                    </select>
                    
                    <input type="date" class="treat-input" id="treat-date-selector">
                </div>
                
                <button class="treat-button" id="treat-add-appointment">+ Add Appointment</button>
            </div>
            
            <div class="treat-schedule">
                <!-- Time column -->
                <div class="treat-time-slot" style="grid-row: 1; grid-column: 1;"></div>
                <div class="treat-time-slot" style="grid-row: 2; grid-column: 1;">8:00 AM</div>
                <div class="treat-time-slot" style="grid-row: 3; grid-column: 1;">9:00 AM</div>
                <div class="treat-time-slot" style="grid-row: 4; grid-column: 1;">10:00 AM</div>
                <div class="treat-time-slot" style="grid-row: 5; grid-column: 1;">11:00 AM</div>
                <div class="treat-time-slot" style="grid-row: 6; grid-column: 1;">12:00 PM</div>
                <div class="treat-time-slot" style="grid-row: 7; grid-column: 1;">1:00 PM</div>
                <div class="treat-time-slot" style="grid-row: 8; grid-column: 1;">2:00 PM</div>
                <div class="treat-time-slot" style="grid-row: 9; grid-column: 1;">3:00 PM</div>
                <div class="treat-time-slot" style="grid-row: 10; grid-column: 1;">4:00 PM</div>
                <div class="treat-time-slot" style="grid-row: 11; grid-column: 1;">5:00 PM</div>
                
                <!-- Day headers -->
                <div class="treat-day-header" style="grid-row: 1; grid-column: 2;">Monday</div>
                <div class="treat-day-header" style="grid-row: 1; grid-column: 3;">Tuesday</div>
                <div class="treat-day-header" style="grid-row: 1; grid-column: 4;">Wednesday</div>
                <div class="treat-day-header" style="grid-row: 1; grid-column: 5;">Thursday</div>
                <div class="treat-day-header" style="grid-row: 1; grid-column: 6;">Friday</div>
                <div class="treat-day-header" style="grid-row: 1; grid-column: 7;">Saturday</div>
                <div class="treat-day-header" style="grid-row: 1; grid-column: 8;">Sunday</div>
                
                <!-- Example appointments -->
                <div class="treat-appointment" style="grid-row: 2; grid-column: 2;">
                    <div class="treat-patient-name">John Doe <span class="treat-status-indicator treat-status-confirmed"></span></div>
                    <div class="treat-treatment-type">Physical Therapy</div>
                    <div class="treat-therapist">Dr. Smith</div>
                </div>
                
                <div class="treat-appointment" style="grid-row: 3; grid-column: 3;">
                    <div class="treat-patient-name">Sarah Johnson <span class="treat-status-indicator treat-status-pending"></span></div>
                    <div class="treat-treatment-type">Occupational Therapy</div>
                    <div class="treat-therapist">Dr. Johnson</div>
                </div>
                
                <div class="treat-appointment" style="grid-row: 5; grid-column: 4;">
                    <div class="treat-patient-name">Michael Brown <span class="treat-status-indicator treat-status-confirmed"></span></div>
                    <div class="treat-treatment-type">Speech Therapy</div>
                    <div class="treat-therapist">Dr. Williams</div>
                </div>
                
                <div class="treat-appointment" style="grid-row: 7; grid-column: 5;">
                    <div class="treat-patient-name">Emily Wilson <span class="treat-status-indicator treat-status-cancelled"></span></div>
                    <div class="treat-treatment-type">Therapeutic Massage</div>
                    <div class="treat-therapist">Dr. Smith</div>
                </div>
            </div>
        </div>
        
        <!-- Add/Edit Appointment Modal -->
        <div class="treat-modal" id="treat-appointment-modal">
            <div class="treat-modal-content">
                <div class="treat-modal-header">
                    <h2 id="treat-modal-title">Add New Appointment</h2>
                    <span class="treat-close-btn">&times;</span>
                </div>
                
                <form id="treat-appointment-form">
                    <div class="treat-form-group">
                        <label for="treat-patient-name" class="treat-label">Patient Name</label>
                        <input type="text" class="treat-input form-control" id="treat-patient-name" required>
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-patient-id" class="treat-label">Patient ID</label>
                        <input type="text" class="treat-input form-control" id="treat-patient-id">
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-treatment-type-modal" class="treat-label">Treatment Type</label>
                        <select class="treat-select form-control" id="treat-treatment-type-modal" required>
                            <option value="">Select Treatment Type</option>
                            <option value="physical">Physical Therapy</option>
                            <option value="occupational">Occupational Therapy</option>
                            <option value="speech">Speech Therapy</option>
                            <option value="massage">Therapeutic Massage</option>
                        </select>
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-therapist-modal" class="treat-label">Therapist</label>
                        <select class="treat-select form-control" id="treat-therapist-modal" required>
                            <option value="">Select Therapist</option>
                            <option value="dr_smith">Dr. Smith</option>
                            <option value="dr_johnson">Dr. Johnson</option>
                            <option value="dr_williams">Dr. Williams</option>
                        </select>
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-appointment-date" class="treat-label">Date</label>
                        <input type="date" class="treat-input form-control" id="treat-appointment-date" required>
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-appointment-time" class="treat-label">Time</label>
                        <input type="time" class="treat-input form-control" id="treat-appointment-time" required>
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-appointment-duration" class="treat-label">Duration (minutes)</label>
                        <input type="number" class="treat-input form-control" id="treat-appointment-duration" value="30" min="15" max="120" step="15">
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-appointment-status" class="treat-label">Status</label>
                        <select class="treat-select form-control" id="treat-appointment-status">
                            <option value="confirmed">Confirmed</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    
                    <div class="treat-form-group">
                        <label for="treat-appointment-notes" class="treat-label">Notes</label>
                        <textarea class="treat-input form-control" id="treat-appointment-notes" rows="3"></textarea>
                    </div>
                    
                    <div class="treat-form-actions">
                        <button type="button" class="treat-btn treat-btn-secondary" id="treat-cancel-appointment">Cancel</button>
                        <button type="submit" class="treat-btn treat-btn-primary">Save Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
    <!-- Scroll to Top End -->

     <!-- footer area start -->
    <?php
    include 'include/footer.php';
?>
    <!-- footer area end -->

    <!-- JS
============================================ -->

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
                const modal = document.getElementById('treat-appointment-modal');
                const addBtn = document.getElementById('treat-add-appointment');
                const closeBtn = document.querySelector('.treat-close-btn');
                const cancelBtn = document.getElementById('treat-cancel-appointment');
                const appointmentForm = document.getElementById('treat-appointment-form');
                
                // Open modal when Add Appointment button is clicked
                addBtn.addEventListener('click', function() {
                    document.getElementById('treat-modal-title').textContent = 'Add New Appointment';
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
                appointmentForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Here you would typically save the appointment data
                    // For now, we'll just show an alert and close the modal
                    alert('Appointment saved successfully!');
                    modal.style.display = 'none';
                    
                    // Reset form
                    appointmentForm.reset();
                });
                
                // Make appointment slots clickable to edit
                const appointments = document.querySelectorAll('.treat-appointment');
                appointments.forEach(appointment => {
                    appointment.addEventListener('click', function() {
                        document.getElementById('treat-modal-title').textContent = 'Edit Appointment';
                        
                        // In a real application, you would populate the form with the appointment data
                        // For this example, we'll just open the modal with some sample data
                        document.getElementById('treat-patient-name').value = 'John Doe';
                        document.getElementById('treat-treatment-type-modal').value = 'physical';
                        document.getElementById('treat-therapist-modal').value = 'dr_smith';
                        document.getElementById('treat-appointment-status').value = 'confirmed';
                        
                        modal.style.display = 'flex';
                    });
                });
                
                // Set default date to today
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('treat-date-selector').value = today;
                document.getElementById('treat-appointment-date').value = today;
            });
        </script>
</body>

</html>