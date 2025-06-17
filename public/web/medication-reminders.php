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
    <div class="container-med">
        <header class="med-header">
            <h1>Medication Reminders</h1>
        </header>
        <!-- Reminder cards will be added here dynamically -->
        <div id="reminders-container">
            <!-- Pre-Session Reminder -->
            <div class="reminder-card antidepressant" data-id="1">
                <div class="reminder-header">
                    <span class="med-name antidepressant">Antidepressant (SSRI/SNRI)</span>
                    <span class="timing-badge badge-pre">PRE-SESSION</span>
                </div>
                <div class="reminder-details">
                    <div class="detail-item">
                        <div class="detail-label">Dosage</div>
                        <div class="detail-values">As prescribed (typically morning dose)</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Timing</div>
                        <div class="detail-values">Morning of treatment day</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Important Note</div>
                        <div class="detail-values">Do NOT skip your regular antidepressant</div>
                    </div>
                </div>
                <div class="instructions antidepressant">
                    <div class="instructions-title">Special Instructions:</div>
                    <p>Continue your regular antidepressant medication as prescribed by your doctor. Stopping antidepressants suddenly can cause withdrawal symptoms.</p>
                </div>
                <div class="status-toggle">
                    <span class="toggle-label">Mark as taken:</span>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            
            <!-- During-Session Reminder -->
            <div class="reminder-card spravato" data-id="2">
                <div class="reminder-header">
                    <span class="med-name spravato">Spravato (Esketamine)</span>
                    <span class="timing-badge badge-during">DURING SESSION</span>
                </div>
                <div class="reminder-details">
                    <div class="detail-item">
                        <div class="detail-label">Dosage</div>
                        <div class="detail-values">56mg or 84mg nasal spray</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Timing</div>
                        <div class="detail-values">Administered at clinic under supervision</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Important Note</div>
                        <div class="detail-values">Must remain at clinic for 2 hours post-dose</div>
                    </div>
                </div>
                <div class="instructions spravato">
                    <div class="instructions-title">Special Instructions:</div>
                    <p>Do not eat for at least 2 hours before treatment and limit liquids for 30 minutes prior. You will self-administer the nasal spray under medical supervision.</p>
                </div>
                <div class="status-toggle">
                    <span class="toggle-label">Mark as administered:</span>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
        
        <button id="addReminderBtn" class="add-reminder-btn">+ Add Custom Medication Reminder</button>
    </div>
    
    <!-- Add Reminder Modal -->
    <div id="addReminderModal" class="med-modal">
        <div class="med-modal-content">
            <div class="med-modal-header">
                <h2 class="med-modal-title">Add Custom Medication Reminder</h2>
                <button class="close-btn">&times;</button>
            </div>
            <form id="reminderForm">
                <div class="form-group-med">
                    <label for="medicationName">Medication Name</label>
                    <input type="text" id="medicationName" required>
                </div>
                
                <div class="form-group-med">
                    <label for="medicationType">Medication Type</label>
                    <select id="medicationType" class="form-control" required>
                        <option value="">Select type</option>
                        <option value="antidepressant">Antidepressant</option>
                        <option value="spravato">Spravato/Esketamine</option>
                        <option value="anti-anxiety">Anti-Anxiety</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group-med">
                    <label for="timing">Timing Relative to Spravato</label>
                    <select id="timing" class="form-control" required>
                        <option value="">Select timing</option>
                        <option value="pre">Pre-Session</option>
                        <option value="during">During Session</option>
                        <option value="post">Post-Session</option>
                    </select>
                </div>
                
                <div class="form-group-med">
                    <label for="dosage">Dosage</label>
                    <input type="text" id="dosage" required>
                </div>
                
                <div class="form-group-med">
                    <label for="timingDetails">Timing Details</label>
                    <input type="text" id="timingDetails" required>
                </div>
                
                <div class="form-group-med">
                    <label for="importantNote">Important Note</label>
                    <input type="text" id="importantNote" required>
                </div>
                
                <div class="form-group-med">
                    <label for="specialInstructions">Special Instructions</label>
                    <textarea id="specialInstructions" required></textarea>
                </div>
                
                <div class="form-actions-med">
                    <button type="button" class="btn-med btn-cancel-med" id="cancelReminderBtn">Cancel</button>
                    <button type="submit" class="btn-med btn-submit-med">Save Reminder</button>
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
            // DOM Elements
            const addReminderBtn = document.getElementById('addReminderBtn');
            const addReminderModal = document.getElementById('addReminderModal');
            const closeBtn = document.querySelector('.close-btn');
            const cancelReminderBtn = document.getElementById('cancelReminderBtn');
            const reminderForm = document.getElementById('reminderForm');
            const remindersContainer = document.getElementById('reminders-container');
            
            // Open modal when Add button is clicked
            addReminderBtn.addEventListener('click', function() {
                addReminderModal.style.display = 'flex';
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            });
            
            // Close modal when X or Cancel is clicked
            function closeModal() {
                addReminderModal.style.display = 'none';
                document.body.style.overflow = 'auto'; // Re-enable scrolling
                reminderForm.reset();
            }
            
            closeBtn.addEventListener('click', closeModal);
            cancelReminderBtn.addEventListener('click', closeModal);
            
            // Close modal when clicking outside the modal content
            addReminderModal.addEventListener('click', function(e) {
                if (e.target === addReminderModal) {
                    closeModal();
                }
            });
            
            // Handle form submission
            reminderForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form values
                const medicationName = document.getElementById('medicationName').value;
                const medicationType = document.getElementById('medicationType').value;
                const timing = document.getElementById('timing').value;
                const dosage = document.getElementById('dosage').value;
                const timingDetails = document.getElementById('timingDetails').value;
                const importantNote = document.getElementById('importantNote').value;
                const specialInstructions = document.getElementById('specialInstructions').value;
                
                // Determine badge class based on timing
                let badgeClass = '';
                let timingText = '';
                
                switch(timing) {
                    case 'pre':
                        badgeClass = 'badge-pre';
                        timingText = 'PRE-SESSION';
                        break;
                    case 'during':
                        badgeClass = 'badge-during';
                        timingText = 'DURING SESSION';
                        break;
                    case 'post':
                        badgeClass = 'badge-post';
                        timingText = 'POST-SESSION';
                        break;
                }
                
                // Create new reminder card HTML
                const newReminderId = Date.now(); // Unique ID based on timestamp
                const newReminderHTML = `
                    <div class="reminder-card ${medicationType}" data-id="${newReminderId}">
                        <div class="reminder-header">
                            <span class="med-name ${medicationType}">${medicationName}</span>
                            <span class="timing-badge ${badgeClass}">${timingText}</span>
                        </div>
                        <div class="reminder-details">
                            <div class="detail-item">
                                <div class="detail-label">Dosage</div>
                                <div class="detail-values">${dosage}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Timing</div>
                                <div class="detail-values">${timingDetails}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Important Note</div>
                                <div class="detail-values">${importantNote}</div>
                            </div>
                        </div>
                        <div class="instructions ${medicationType}">
                            <div class="instructions-title">Special Instructions:</div>
                            <p>${specialInstructions}</p>
                        </div>
                        <div class="status-toggle">
                            <span class="toggle-label">Mark as taken:</span>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                `;
                
                // Add the new reminder to the container
                remindersContainer.insertAdjacentHTML('beforeend', newReminderHTML);
                
                // Close the modal and reset the form
                closeModal();
                
                // Scroll to the newly added reminder
                const newReminder = document.querySelector(`[data-id="${newReminderId}"]`);
                newReminder.scrollIntoView({ behavior: 'smooth' });
                
                // Add event listener to the new toggle switch
                const newCheckbox = newReminder.querySelector('.toggle-switch input[type="checkbox"]');
                newCheckbox.addEventListener('change', function() {
                    const slider = this.nextElementSibling;
                    if (this.checked) {
                        slider.style.backgroundColor = 'var(--success)';
                    } else {
                        slider.style.backgroundColor = '#ccc';
                    }
                });
            });
            
            // Initialize toggle switches for existing reminders
            document.querySelectorAll('.toggle-switch input[type="checkbox"]').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const slider = this.nextElementSibling;
                    if (this.checked) {
                        slider.style.backgroundColor = 'var(--success)';
                    } else {
                        slider.style.backgroundColor = '#ccc';
                    }
                });
            });
        });
    </script>

</body>

</html>