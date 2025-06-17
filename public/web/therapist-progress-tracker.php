
    <?php
include 'include/header.php';
?>

    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/blog-banner-3.webp">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
             <div class="progress-tracker">
        <header class="progress-header">
            <h1>Therapist Progress Tracker</h1>
        </header>
        
        <div class="progress-controls">
            <div class="progress-filter-group">
                <select class="progress-select" id="progress-therapist-select">
                    <option value="">All Therapists</option>
                    <option value="dr_smith">Dr. Smith (Physical Therapy)</option>
                    <option value="dr_johnson">Dr. Johnson (Occupational Therapy)</option>
                    <option value="dr_williams">Dr. Williams (Speech Therapy)</option>
                </select>
                
                <select class="progress-select" id="progress-status-filter">
                    <option value="">All Patients</option>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="on_hold">On Hold</option>
                </select>
                
                <input type="text" class="progress-input" id="progress-search" placeholder="Search patients...">
            </div>
            
            <button class="progress-button" id="progress-add-note">+ Add Progress Note</button>
        </div>
        
        <div class="patient-cards">
            <!-- Patient Card 1 -->
            <div class="patient-card">
                <div class="patient-name">John Doe <span class="status-badge" style="background-color: #2ecc71; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px;">Active</span></div>
                <div class="patient-therapist">Dr. Smith - Physical Therapy</div>
                
                <div class="progress-metrics">
                    <div class="metric">
                        <div class="metric-label">
                            <span>Mobility Improvement</span>
                            <span>65%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 65%"></div>
                        </div>
                    </div>
                    
                    <div class="metric">
                        <div class="metric-label">
                            <span>Pain Reduction</span>
                            <span>80%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 80%"></div>
                        </div>
                    </div>
                    
                    <div class="metric">
                        <div class="metric-label">
                            <span>Therapy Compliance</span>
                            <span>90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="progress-notes">
                    <h3>Latest Notes</h3>
                    <p>Showing significant improvement in range of motion. Able to walk 50% longer distances without pain.</p>
                    <p class="note-date">Last updated: March 15, 2025</p>
                </div>
            </div>
            
            <!-- Patient Card 2 -->
            <div class="patient-card">
                <div class="patient-name">Sarah Johnson <span class="status-badge" style="background-color: #f39c12; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px;">On Hold</span></div>
                <div class="patient-therapist">Dr. Johnson - Occupational Therapy</div>
                
                <div class="progress-metrics">
                    <div class="metric">
                        <div class="metric-label">
                            <span>Fine Motor Skills</span>
                            <span>45%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 45%"></div>
                        </div>
                    </div>
                    
                    <div class="metric">
                        <div class="metric-label">
                            <span>Daily Activity Independence</span>
                            <span>60%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="progress-notes">
                    <h3>Latest Notes</h3>
                    <p>Patient on temporary hold due to unrelated medical procedure. Will resume therapy in 2 weeks.</p>
                    <p class="note-date">Last updated: May 10, 2025</p>
                </div>
            </div>
            
            <!-- Patient Card 3 -->
            <div class="patient-card">
                <div class="patient-name">Michael Brown <span class="status-badge" style="background-color: #2ecc71; color: white; padding: 2px 8px; border-radius: 10px; font-size: 12px;">Active</span></div>
                <div class="patient-therapist">Dr. Williams - Speech Therapy</div>
                
                <div class="progress-metrics">
                    <div class="metric">
                        <div class="metric-label">
                            <span>Speech Clarity</span>
                            <span>75%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 75%"></div>
                        </div>
                    </div>
                    
                    <div class="metric">
                        <div class="metric-label">
                            <span>Vocabulary Recovery</span>
                            <span>85%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="progress-notes">
                    <h3>Latest Notes</h3>
                    <p>Excellent progress with consonant sounds. Next session will focus on complex word formations.</p>
                    <p class="note-date">Last updated: May 18, 2025</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Progress Note Modal -->
    <div class="progress-modal" id="progress-note-modal">
        <div class="progress-modal-content">
            <div class="progress-modal-header">
                <h2>Add Progress Note</h2>
                <span class="progress-close-btn">&times;</span>
            </div>
            
            <form id="progress-note-form">
                <div class="progress-form-group">
                    <label for="progress-note-patient" class="progress-label">Patient</label>
                    <select class="progress-select form-control" id="progress-note-patient" required>
                        <option value="">Select Patient</option>
                        <option value="john_doe">John Doe</option>
                        <option value="sarah_johnson">Sarah Johnson</option>
                        <option value="michael_brown">Michael Brown</option>
                    </select>
                </div>
                
                <div class="progress-form-group">
                    <label for="progress-note-date" class="progress-label">Date</label>
                    <input type="date" class="progress-input form-control" id="progress-note-date" required>
                </div>
                
                <div class="progress-form-group">
                    <label for="progress-note-metric" class="progress-label">Progress Metric</label>
                    <select class="progress-select form-control" id="progress-note-metric" required>
                        <option value="">Select Metric</option>
                        <option value="mobility">Mobility Improvement</option>
                        <option value="pain">Pain Reduction</option>
                        <option value="compliance">Therapy Compliance</option>
                        <option value="motor_skills">Fine Motor Skills</option>
                        <option value="independence">Daily Activity Independence</option>
                        <option value="speech">Speech Clarity</option>
                        <option value="vocabulary">Vocabulary Recovery</option>
                    </select>
                </div>
                
                <div class="progress-form-group">
                    <label for="progress-note-percentage" class="progress-label">Progress Percentage</label>
                    <input type="range" class="progress-input" id="progress-note-percentage" min="0" max="100" step="5" value="50" required>
                    <span id="progress-percentage-value">50%</span>
                </div>
                
                <div class="progress-form-group">
                    <label for="progress-note-content" class="progress-label">Notes</label>
                    <textarea class="progress-textarea" id="progress-note-content" required></textarea>
                </div>
                
                <div class="progress-form-actions">
                    <button type="button" class="progress-button" id="progress-note-cancel">Cancel</button>
                    <button type="submit" class="progress-button">Save Progress Note</button>
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
    
</body>

</html>