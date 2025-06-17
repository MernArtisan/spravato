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
              <div class="health-container">
        <header class="health-header">
            <h1>Health Journal</h1>
            <p>Track your mood, symptoms, and treatment progress</p>
        </header>
        
        <div class="health-controls">
            <div class="health-date-nav">
                <button class="health-button" id="health-prev-day">&lt;</button>
                <div class="health-date-display" id="health-current-date">June 15, 2023</div>
                <button class="health-button" id="health-next-day">&gt;</button>
            </div>
            
            <button class="health-button" id="health-new-entry">+ New Journal Entry</button>
        </div>
        
        <!-- Mood Tracking Section -->
        <div class="health-section">
            <h2 class="health-section-title">Mood Assessment</h2>
            
            <div class="health-form-group">
                <label class="health-label">Current Mood</label>
                <div class="health-mood-grid">
                    <div class="health-mood-item selected">
                        <div class="health-mood-icon">😊</div>
                        <div>Excellent</div>
                    </div>
                    <div class="health-mood-item">
                        <div class="health-mood-icon">🙂</div>
                        <div>Good</div>
                    </div>
                    <div class="health-mood-item">
                        <div class="health-mood-icon">😐</div>
                        <div>Neutral</div>
                    </div>
                    <div class="health-mood-item">
                        <div class="health-mood-icon">😕</div>
                        <div>Low</div>
                    </div>
                    <div class="health-mood-item">
                        <div class="health-mood-icon">😞</div>
                        <div>Depressed</div>
                    </div>
                </div>
            </div>
            
            <div class="health-form-group">
                <label class="health-label">Mood Stability (1-10)</label>
                <div class="health-scale">
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-1" class="health-scale-radio">
                        <label for="health-stability-1">1</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-2" class="health-scale-radio">
                        <label for="health-stability-2">2</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-3" class="health-scale-radio">
                        <label for="health-stability-3">3</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-4" class="health-scale-radio">
                        <label for="health-stability-4">4</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-5" class="health-scale-radio" checked>
                        <label for="health-stability-5">5</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-6" class="health-scale-radio">
                        <label for="health-stability-6">6</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-7" class="health-scale-radio">
                        <label for="health-stability-7">7</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-8" class="health-scale-radio">
                        <label for="health-stability-8">8</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-9" class="health-scale-radio">
                        <label for="health-stability-9">9</label>
                    </div>
                    <div class="health-scale-item">
                        <input type="radio" name="mood-stability" id="health-stability-10" class="health-scale-radio">
                        <label for="health-stability-10">10</label>
                    </div>
                </div>
            </div>
            
            <div class="health-form-group">
                <label for="health-mood-notes" class="health-label">Mood Notes</label>
                <textarea class="health-textarea" id="health-mood-notes" placeholder="Describe your mood in more detail..."></textarea>
            </div>
        </div>
        
        <!-- Symptoms Tracking Section -->
        <div class="health-section">
            <h2 class="health-section-title">Symptom Tracker</h2>
            
            <div class="health-form-group">
                <label class="health-label">Select Symptoms Experienced Today</label>
                <div class="health-symptoms-grid">
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-anxiety" class="health-input">
                        <label for="health-symptom-anxiety">Anxiety</label>
                    </div>
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-headache" class="health-input" checked>
                        <label for="health-symptom-headache">Headache</label>
                    </div>
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-nausea" class="health-input">
                        <label for="health-symptom-nausea">Nausea</label>
                    </div>
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-dizziness" class="health-input">
                        <label for="health-symptom-dizziness">Dizziness</label>
                    </div>
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-fatigue" class="health-input">
                        <label for="health-symptom-fatigue">Fatigue</label>
                    </div>
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-dissociation" class="health-input">
                        <label for="health-symptom-dissociation">Dissociation</label>
                    </div>
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-sleep" class="health-input" checked>
                        <label for="health-symptom-sleep">Sleep Issues</label>
                    </div>
                    <div class="health-symptom-item">
                        <input type="checkbox" id="health-symptom-appetite" class="health-input">
                        <label for="health-symptom-appetite">Appetite Changes</label>
                    </div>
                </div>
            </div>
            
            <div class="health-form-group">
                <label for="health-symptom-severity" class="health-label">Overall Symptom Severity</label>
                <select class="health-input" id="health-symptom-severity">
                    <option value="">Select severity</option>
                    <option value="mild">Mild</option>
                    <option value="moderate" selected>Moderate</option>
                    <option value="severe">Severe</option>
                </select>
            </div>
            
            <div class="health-form-group">
                <label for="health-symptom-notes" class="health-label">Symptom Notes</label>
                <textarea class="health-textarea" id="health-symptom-notes" placeholder="Describe your symptoms in more detail..."></textarea>
            </div>
        </div>
        
        <!-- Treatment Section -->
        <div class="health-section">
            <h2 class="health-section-title">Treatment Details</h2>
            
            <div class="health-form-group">
                <label for="health-treatment-dose" class="health-label">Spravato Dose</label>
                <select class="health-input" id="health-treatment-dose">
                    <option value="">Select dose</option>
                    <option value="56mg">56mg</option>
                    <option value="84mg" selected>84mg</option>
                </select>
            </div>
            
            <div class="health-form-group">
                <label for="health-treatment-response" class="health-label">Treatment Response</label>
                <select class="health-input" id="health-treatment-response">
                    <option value="">Select response</option>
                    <option value="excellent">Excellent</option>
                    <option value="good" selected>Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                </select>
            </div>
            
            <div class="health-form-group">
                <label for="health-treatment-notes" class="health-label">Treatment Notes</label>
                <textarea class="health-textarea" id="health-treatment-notes" placeholder="Describe your treatment experience..."></textarea>
            </div>
            
            <div class="health-form-actions">
                <button type="button" class="health-button" style="background-color: #aab2bd;">Cancel</button>
                <button type="button" class="health-button" id="health-save-entry">Save Journal Entry</button>
            </div>
        </div>
        
        <!-- Previous Entries Section -->
        <div class="health-section">
            <h2 class="health-section-title">Previous Journal Entries</h2>
            
            <div class="health-entries">
                <div class="health-entry">
                    <div class="health-entry-date">June 14, 2023</div>
                    <div>
                        <span class="health-entry-mood">😊 Excellent</span>
                        <span class="health-entry-mood">💊 84mg</span>
                    </div>
                    <div class="health-entry-content">
                        <p>Felt more energetic today after treatment. Mild dizziness during session but resolved quickly. Mood has been stable throughout the day.</p>
                    </div>
                </div>
                
                <div class="health-entry">
                    <div class="health-entry-date">June 12, 2023</div>
                    <div>
                        <span class="health-entry-mood">😐 Neutral</span>
                        <span class="health-entry-mood">💊 84mg</span>
                    </div>
                    <div class="health-entry-content">
                        <p>Standard treatment session. Experienced some dissociation but it was manageable. Noticed slight improvement in depressive symptoms.</p>
                    </div>
                </div>
                
                <div class="health-entry">
                    <div class="health-entry-date">June 10, 2023</div>
                    <div>
                        <span class="health-entry-mood">😕 Low</span>
                        <span class="health-entry-mood">💊 56mg</span>
                    </div>
                    <div class="health-entry-content">
                        <p>Difficult session today with increased anxiety. Doctor recommended we reduce dose next time. Headache persisted for several hours post-treatment.</p>
                    </div>
                </div>
            </div>
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
            // Mood selection
            const moodItems = document.querySelectorAll('.health-mood-item');
            moodItems.forEach(item => {
                item.addEventListener('click', function() {
                    moodItems.forEach(i => i.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
            
            // Date navigation
            document.getElementById('health-prev-day').addEventListener('click', function() {
                alert('Previous day clicked - would load previous day');
            });
            
            document.getElementById('health-next-day').addEventListener('click', function() {
                alert('Next day clicked - would load next day');
            });
            
            // New entry button
            document.getElementById('health-new-entry').addEventListener('click', function() {
                // Scroll to top of form
                window.scrollTo({ top: 0, behavior: 'smooth' });
                
                // In a real app, this would clear the form for a new entry
                alert('Preparing new journal entry form');
            });
            
            // Save entry button
            document.getElementById('health-save-entry').addEventListener('click', function() {
                // Validate form
                const moodSelected = document.querySelector('.health-mood-item.selected');
                if (!moodSelected) {
                    alert('Please select your current mood');
                    return;
                }
                
                // In a real app, this would save to database
                alert('Journal entry saved successfully!');
                
                // Scroll to entries section
                document.querySelector('.health-entries').scrollIntoView({ behavior: 'smooth' });
            });
            
            // Set current date
            const today = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('health-current-date').textContent = today.toLocaleDateString('en-US', options);
        });
    </script>
</body>

</html>