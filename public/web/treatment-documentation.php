
    <?php
include 'include/header.php';
?>

    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/blog-banner-3.webp">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
            <div class="treatment-documentation-container">
        <div class="treatment-documentation-header">
           <!-- <h1 class="treatment-documentation-title">Spravato Treatment Documentation</h1> -->
           <header class="med-header">
            <h1>Treatment Documentation</h1>
        </header>
            <div>
                <span class="treatment-documentation-status treatment-documentation-status-scheduled">Session in Progress</span>
            </div>
        </div>
        
        <div class="treatment-documentation-patient-info">
            <div class="treatment-documentation-patient-field">
                <div class="treatment-documentation-patient-label">Patient Name</div>
                <div>John Doe</div>
            </div>
            <div class="treatment-documentation-patient-field">
                <div class="treatment-documentation-patient-label">Patient ID</div>
                <div>PT1001</div>
            </div>
            <div class="treatment-documentation-patient-field">
                <div class="treatment-documentation-patient-label">Date of Birth</div>
                <div>1985-05-15</div>
            </div>
            <div class="treatment-documentation-patient-field">
                <div class="treatment-documentation-patient-label">Treatment Phase</div>
                <div>Induction Phase (Week 1)</div>
            </div>
        </div>
        
        <div class="treatment-documentation-tabs">
            <div class="treatment-documentation-tab active" data-tab="dosage">Dosage & Administration</div>
            <div class="treatment-documentation-tab" data-tab="monitoring">Patient Monitoring</div>
            <div class="treatment-documentation-tab" data-tab="notes">Clinical Notes</div>
        </div>
        
        <!-- Dosage & Administration Tab -->
        <div class="treatment-documentation-content active" id="dosage-tab">
            <form id="treatment-documentation-dosage-form">
                <div class="treatment-documentation-dosage-grid">
                    <div class="treatment-documentation-form-group">
                        <label for="treatment-date">Treatment Date</label>
                        <input type="date" id="treatment-date" required>
                    </div>
                    <div class="treatment-documentation-form-group">
                        <label for="treatment-time">Treatment Time</label>
                        <input type="time" id="treatment-time" required>
                    </div>
                    <div class="treatment-documentation-form-group">
                        <label for="treatment-dose">Spravato Dose</label>
                        <select id="treatment-dose" required>
                            <option value="">Select Dose</option>
                            <option value="56mg">56mg</option>
                            <option value="84mg">84mg</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="treatment-documentation-form-group">
                        <label for="treatment-lot">Lot Number</label>
                        <input type="text" id="treatment-lot" required>
                    </div>
                </div>
                
                <div class="treatment-documentation-form-group">
                    <label for="treatment-admin-notes">Administration Notes</label>
                    <textarea id="treatment-admin-notes" placeholder="Document any observations during administration..."></textarea>
                </div>
                
                <div class="treatment-documentation-actions">
                    <button type="button" class="treatment-documentation-btn treatment-documentation-btn-outline">Save Draft</button>
                    <button type="submit" class="treatment-documentation-btn treatment-documentation-btn-primary">Complete Documentation</button>
                </div>
            </form>
        </div>
        
        <!-- Patient Monitoring Tab -->
        <div class="treatment-documentation-content" id="monitoring-tab">
            <form id="treatment-documentation-monitoring-form">
                <div class="treatment-documentation-dosage-grid">
                    <div class="treatment-documentation-form-group">
                        <label for="blood-pressure">Blood Pressure (Pre)</label>
                        <input type="text" id="blood-pressure" placeholder="e.g. 120/80">
                    </div>
                    <div class="treatment-documentation-form-group">
                        <label for="blood-pressure-post">Blood Pressure (Post)</label>
                        <input type="text" id="blood-pressure-post" placeholder="e.g. 120/80">
                    </div>
                    <div class="treatment-documentation-form-group">
                        <label for="heart-rate">Heart Rate (Pre)</label>
                        <input type="number" id="heart-rate" placeholder="bpm">
                    </div>
                    <div class="treatment-documentation-form-group">
                        <label for="heart-rate-post">Heart Rate (Post)</label>
                        <input type="number" id="heart-rate-post" placeholder="bpm">
                    </div>
                </div>
                
                <div class="treatment-documentation-form-group">
                    <label for="side-effects">Side Effects Observed</label>
                    <select id="side-effects" multiple>
                        <option value="nausea">Nausea</option>
                        <option value="dizziness">Dizziness</option>
                        <option value="dissociation">Dissociation</option>
                        <option value="headache">Headache</option>
                        <option value="sedation">Sedation</option>
                        <option value="none">None</option>
                    </select>
                </div>
                
                <div class="treatment-documentation-form-group">
                    <label for="monitoring-notes">Monitoring Notes</label>
                    <textarea id="monitoring-notes" placeholder="Document any observations during monitoring..."></textarea>
                </div>
                
                <div class="treatment-documentation-actions">
                    <button type="button" class="treatment-documentation-btn treatment-documentation-btn-outline">Save Draft</button>
                    <button type="submit" class="treatment-documentation-btn treatment-documentation-btn-primary">Complete Documentation</button>
                </div>
            </form>
        </div>
        
        <!-- Clinical Notes Tab -->
        <div class="treatment-documentation-content" id="notes-tab">
            <form id="treatment-documentation-notes-form">
                <div class="treatment-documentation-form-group">
                    <label for="mood-assessment">Mood Assessment</label>
                    <select id="mood-assessment">
                        <option value="">Select Mood</option>
                        <option value="improved">Improved</option>
                        <option value="stable">Stable</option>
                        <option value="worsened">Worsened</option>
                    </select>
                </div>
                
                <div class="treatment-documentation-form-group">
                    <label for="clinical-impression">Clinical Impression</label>
                    <textarea id="clinical-impression" placeholder="Document your clinical impression of the session..."></textarea>
                </div>
                
                <div class="treatment-documentation-form-group">
                    <label for="treatment-plan">Treatment Plan Adjustments</label>
                    <textarea id="treatment-plan" placeholder="Document any adjustments to the treatment plan..."></textarea>
                </div>
                
                <div class="treatment-documentation-notes">
                    <label for="clinician-notes">Clinician Notes</label>
                    <textarea id="clinician-notes" placeholder="Additional notes..."></textarea>
                </div>
                
                <div class="treatment-documentation-actions">
                    <button type="button" class="treatment-documentation-btn treatment-documentation-btn-outline">Save Draft</button>
                    <button type="submit" class="treatment-documentation-btn treatment-documentation-btn-primary">Complete Documentation</button>
                </div>
            </form>
        </div>
        
        <!-- Treatment Session History -->
        <div class="treatment-documentation-session-history">
            <h3>Previous Treatment Sessions</h3>
            <table class="treatment-documentation-history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Dose</th>
                        <th>Clinician</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-02-15</td>
                        <td>84mg</td>
                        <td>Dr. Smith</td>
                        <td><span class="treatment-documentation-status treatment-documentation-status-completed">Completed</span></td>
                        <td>
                            <button class="treatment-documentation-btn treatment-documentation-btn-outline" style="padding: 5px 10px; font-size: 0.8rem;">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-01-08</td>
                        <td>84mg</td>
                        <td>Dr. Smith</td>
                        <td><span class="treatment-documentation-status treatment-documentation-status-completed">Completed</span></td>
                        <td>
                            <button class="treatment-documentation-btn treatment-documentation-btn-outline" style="padding: 5px 10px; font-size: 0.8rem;">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-02-01</td>
                        <td>56mg</td>
                        <td>Dr. Johnson</td>
                        <td><span class="treatment-documentation-status treatment-documentation-status-completed">Completed</span></td>
                        <td>
                            <button class="treatment-documentation-btn treatment-documentation-btn-outline" style="padding: 5px 10px; font-size: 0.8rem;">View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            // Tab functionality
            const tabs = document.querySelectorAll('.treatment-documentation-tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs and content
                    document.querySelectorAll('.treatment-documentation-tab').forEach(t => {
                        t.classList.remove('active');
                    });
                    document.querySelectorAll('.treatment-documentation-content').forEach(c => {
                        c.classList.remove('active');
                    });
                    
                    // Add active class to clicked tab and corresponding content
                    this.classList.add('active');
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });
            
            // Form submission handlers
            document.getElementById('treatment-documentation-dosage-form').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Dosage documentation saved successfully!');
                // In a real app, you would send data to your backend here
            });
            
            document.getElementById('treatment-documentation-monitoring-form').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Monitoring documentation saved successfully!');
            });
            
            document.getElementById('treatment-documentation-notes-form').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Clinical notes saved successfully!');
            });
            
            // Today's date as default for treatment date
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('treatment-date').value = today;
            
            // Current time as default for treatment time
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            document.getElementById('treatment-time').value = `${hours}:${minutes}`;
        });
    </script>

</body>

</html>