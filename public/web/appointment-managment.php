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
            <div class="appoint-container">
        <header class="appoint-header">
            <h1>Therapist Appointment Management</h1>
        </header>
        
        <div class="appoint-controls">
            <div class="appoint-filter-group">
                <select class="appoint-select" id="appoint-therapist-filter">
                    <option value="">All Therapists</option>
                    <option value="dr_smith">Dr. Smith (Physical Therapy)</option>
                    <option value="dr_johnson">Dr. Johnson (Occupational Therapy)</option>
                    <option value="dr_williams">Dr. Williams (Speech Therapy)</option>
                </select>
                
                <select class="appoint-select" id="appoint-status-filter">
                    <option value="">All Appointments</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="pending">Pending</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                
                <input type="date" class="appoint-datepicker" id="appoint-date-filter">
            </div>
            
            <button class="appoint-button" id="appoint-add-btn">+ New Appointment</button>
        </div>
        
        <div class="appoint-calendar">
            <div class="appoint-calendar-header">
                <h2 id="appoint-current-month">April 2025</h2>
                <div class="appoint-calendar-nav">
                    <button class="appoint-button" id="appoint-prev-month">&lt; Previous</button>
                    <button class="appoint-button" id="appoint-today">Today</button>
                    <button class="appoint-button" id="appoint-next-month">Next &gt;</button>
                </div>
            </div>
            
            <div class="appoint-calendar-grid">
                <!-- Day headers -->
                <div class="appoint-day-header">Sun</div>
                <div class="appoint-day-header">Mon</div>
                <div class="appoint-day-header">Tue</div>
                <div class="appoint-day-header">Wed</div>
                <div class="appoint-day-header">Thu</div>
                <div class="appoint-day-header">Fri</div>
                <div class="appoint-day-header">Sat</div>
                
                <!-- Calendar days will be populated by JavaScript -->
                <!-- Example day cell (this would be generated dynamically) -->
                <div class="appoint-day">
                    <div class="appoint-day-number">1</div>
                    <div class="appoint-event confirmed">
                        <strong>John Doe</strong><br>
                        10:00 AM - PT Session
                    </div>
                    <div class="appoint-event">
                        <strong>Sarah J.</strong><br>
                        2:00 PM - Evaluation
                    </div>
                </div>
                
                <!-- More days would be added here -->
            </div>
        </div>
        
        <div class="appoint-list">
            <div class="appoint-list-header">
                <h2>Upcoming Appointments</h2>
                <div>
                    <span>Showing: </span>
                    <select class="appoint-select" id="appoint-list-filter">
                        <option value="today">Today</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                    </select>
                </div>
            </div>
            
            <!-- Appointment list items -->
            <div class="appoint-list-item">
                <div class="appoint-client-info">
                    <strong>John Doe</strong><br>
                    <small>Physical Therapy - Dr. Smith</small>
                </div>
                <div class="appoint-time-info">
                    <strong>Today</strong><br>
                    10:00 AM - 11:00 AM
                </div>
                <div class="appoint-status-info">
                    <span class="appoint-status-badge" style="background-color: #48cfad; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px;">Confirmed</span>
                </div>
                <div class="appoint-actions">
                    <button class="appoint-action-btn appoint-edit-btn">Edit</button>
                    <button class="appoint-action-btn appoint-cancel-btn">Cancel</button>
                </div>
            </div>
            
            <div class="appoint-list-item">
                <div class="appoint-client-info">
                    <strong>Sarah Johnson</strong><br>
                    <small>Occupational Therapy - Dr. Johnson</small>
                </div>
                <div class="appoint-time-info">
                    <strong>Tomorrow</strong><br>
                    2:00 PM - 2:45 PM
                </div>
                <div class="appoint-status-info">
                    <span class="appoint-status-badge" style="background-color: #ffce54; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px;">Pending</span>
                </div>
                <div class="appoint-actions">
                    <button class="appoint-action-btn appoint-edit-btn">Edit</button>
                    <button class="appoint-action-btn appoint-cancel-btn">Cancel</button>
                </div>
            </div>
            
            <div class="appoint-list-item">
                <div class="appoint-client-info">
                    <strong>Michael Brown</strong><br>
                    <small>Speech Therapy - Dr. Williams</small>
                </div>
                <div class="appoint-time-info">
                    <strong>Jun 15</strong><br>
                    9:30 AM - 10:15 AM
                </div>
                <div class="appoint-status-info">
                    <span class="appoint-status-badge" style="background-color: #48cfad; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px;">Confirmed</span>
                </div>
                <div class="appoint-actions">
                    <button class="appoint-action-btn appoint-edit-btn">Edit</button>
                    <button class="appoint-action-btn appoint-cancel-btn">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Appointment Modal -->
    <div class="appoint-modal" id="appoint-modal">
        <div class="appoint-modal-content">
            <div class="appoint-modal-header">
                <h2 id="appoint-modal-title">New Appointment</h2>
                <span class="appoint-close-btn">&times;</span>
            </div>
            
            <form id="appoint-form">
                <div class="appoint-form-row">
                    <div class="appoint-form-group" style="flex: 1;">
                        <label for="appoint-client" class="appoint-label">Client</label>
                        <select class="appoint-select form-control" id="appoint-client" required style="width: 100%;">
                            <option value="">Select Client</option>
                            <option value="john_doe">John Doe</option>
                            <option value="sarah_johnson">Sarah Johnson</option>
                            <option value="michael_brown">Michael Brown</option>
                        </select>
                    </div>
                    
                    <div class="appoint-form-group" style="flex: 1;">
                        <label for="appoint-therapist" class="appoint-label">Therapist</label>
                        <select class="appoint-select form-control" id="appoint-therapist" required style="width: 100%;">
                            <option value="">Select Therapist</option>
                            <option value="dr_smith">Dr. Smith (Physical Therapy)</option>
                            <option value="dr_johnson">Dr. Johnson (Occupational Therapy)</option>
                            <option value="dr_williams">Dr. Williams (Speech Therapy)</option>
                        </select>
                    </div>
                </div>
                
                <div class="appoint-form-row">
                    <div class="appoint-form-group" style="flex: 1;">
                        <label for="appoint-date" class="appoint-label">Date</label>
                        <input type="date" class="appoint-datepicker form-control" id="appoint-date" required style="width: 100%;">
                    </div>
                    
                    <div class="appoint-form-group" style="flex: 1;">
                        <label for="appoint-time" class="appoint-label">Time</label>
                        <input type="time" class="appoint-input form-control" id="appoint-time" required style="width: 100%;">
                    </div>
                    
                    <div class="appoint-form-group" style="flex: 1;">
                        <label for="appoint-duration" class="appoint-label">Duration (min)</label>
                        <select class="appoint-select form-control" id="appoint-duration" required style="width: 100%;">
                            <option value="30">30 minutes</option>
                            <option value="45">45 minutes</option>
                            <option value="60" selected>60 minutes</option>
                            <option value="90">90 minutes</option>
                        </select>
                    </div>
                </div>
                
                <div class="appoint-form-group">
                    <label for="appoint-type" class="appoint-label">Appointment Type</label>
                    <select class="appoint-select form-control" id="appoint-type" required style="width: 100%;">
                        <option value="">Select Type</option>
                        <option value="evaluation">Evaluation</option>
                        <option value="regular">Regular Session</option>
                        <option value="followup">Follow-up</option>
                        <option value="emergency">Emergency</option>
                    </select>
                </div>
                
                <div class="appoint-form-group">
                    <label for="appoint-status" class="appoint-label">Status</label>
                    <select class="appoint-select form-control" id="appoint-status" required style="width: 100%;">
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                
                <div class="appoint-form-group">
                    <label for="appoint-notes" class="appoint-label">Notes</label>
                    <textarea class="appoint-input form-control" id="appoint-notes" rows="3" style="width: 100%;"></textarea>
                </div>
                
                <div class="appoint-form-actions">
                    <button type="button" class="appoint-button" id="appoint-cancel-btn" style="background-color: #aab2bd;">Cancel</button>
                    <button type="submit" class="appoint-button">Save Appointment</button>
                </div>
            </form>
        </div>
    </div>
     <!-- Wrapping everything in treat-wrapper -->
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
            const modal = document.getElementById('appoint-modal');
            const addBtn = document.getElementById('appoint-add-btn');
            const closeBtn = document.querySelector('.appoint-close-btn');
            const cancelBtn = document.getElementById('appoint-cancel-btn');
            const appointForm = document.getElementById('appoint-form');
            
            // Open modal when Add button is clicked
            addBtn.addEventListener('click', function() {
                document.getElementById('appoint-modal-title').textContent = 'New Appointment';
                // Set default date to today
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('appoint-date').value = today;
                
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
            appointForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Here you would typically save the appointment
                alert('Appointment saved successfully!');
                modal.style.display = 'none';
                
                // Reset form
                appointForm.reset();
            });
            
            // Calendar navigation (simplified for example)
            document.getElementById('appoint-prev-month').addEventListener('click', function() {
                alert('Previous month clicked - would load previous month data');
            });
            
            document.getElementById('appoint-next-month').addEventListener('click', function() {
                alert('Next month clicked - would load next month data');
            });
            
            document.getElementById('appoint-today').addEventListener('click', function() {
                alert('Today clicked - would load current month data');
            });
            
            // Edit appointment buttons
            document.querySelectorAll('.appoint-edit-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    document.getElementById('appoint-modal-title').textContent = 'Edit Appointment';
                    
                    // In a real app, you would populate the form with existing data
                    document.getElementById('appoint-client').value = 'john_doe';
                    document.getElementById('appoint-therapist').value = 'dr_smith';
                    document.getElementById('appoint-status').value = 'confirmed';
                    
                    modal.style.display = 'flex';
                });
            });
            
            // Cancel appointment buttons
            document.querySelectorAll('.appoint-cancel-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (confirm('Are you sure you want to cancel this appointment?')) {
                        alert('Appointment cancelled - would update status in database');
                    }
                });
            });
            
            // Click on calendar events
            document.querySelectorAll('.appoint-event').forEach(event => {
                event.addEventListener('click', function(e) {
                    e.stopPropagation();
                    alert('Showing details for: ' + this.querySelector('strong').textContent);
                });
            });
            
            // Click on calendar days
            document.querySelectorAll('.appoint-day').forEach(day => {
                day.addEventListener('click', function() {
                    const date = this.querySelector('.appoint-day-number').textContent;
                    alert('Creating new appointment for day: ' + date);
                });
            });
        });
    </script>
</body>

</html>