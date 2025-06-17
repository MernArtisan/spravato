
    <?php
include 'include/header.php';
?>

    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/blog-banner-3.webp">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
                <div class="communication-tools">
                    <header class="med-header">
            <h1>Communication Tools</h1>
        </header>
        <!-- In-app Messaging Section -->
        <div class="feature">
            <h3>In-app Messaging</h3>
            <div class="message-list-com">
                <div class="message-item">
                    <div class="message-content">
                        <strong>Dr. Smith:</strong> Your test results have come back normal.
                    </div>
                    <div class="message-time">Today, 10:30 AM</div>
                </div>
                <div class="message-item">
                    <div class="message-content">
                        <strong>Patient:</strong> Thank you doctor. Should I continue with the medication?
                    </div>
                    <div class="message-time">Today, 10:45 AM</div>
                </div>
            </div>
            
            <form class="new-message-form communication-tools">
                <div class="form-group communication-tools">
                    <label for="new-message" class="communication-tools">New Message:</label>
                    <textarea id="new-message" class="communication-tools" rows="3" placeholder="Type your message here..."></textarea>
                </div>
                <button type="submit" class="communication-tools">Send Message</button>
            </form>
        </div>
        
        <!-- Notifications Section -->
        <div class="feature">
            <h3>Send Notification</h3>
            <form class="notification-form communication-tools">
                <div class="form-group communication-tools">
                    <label for="patient-select" class="communication-tools">Select Patient:</label>
                    <select id="patient-select" class="communication-tools">
                        <option value="">-- Select Patient --</option>
                        <option value="1">John Doe</option>
                        <option value="2">Jane Smith</option>
                        <option value="3">Robert Johnson</option>
                    </select>
                </div>
                
                <div class="form-group communication-tools">
                    <label for="notification-type" class="communication-tools">Notification Type:</label>
                    <select id="notification-type" class="communication-tools">
                        <option value="appointment">Appointment Reminder</option>
                        <option value="medication">Medication Alert</option>
                        <option value="test">Test Results</option>
                        <option value="general">General Message</option>
                    </select>
                </div>
                
                <div class="form-group communication-tools">
                    <label for="notification-message" class="communication-tools">Message:</label>
                    <textarea id="notification-message" class="communication-tools" rows="3" placeholder="Enter notification message..."></textarea>
                </div>
                
                <div class="checkbox-group communication-tools">
                    <input type="checkbox" id="urgent-notification" class="communication-tools">
                    <label for="urgent-notification" class="communication-tools">Send as urgent</label>
                    <button type="submit" class="communication-tools">Send Notification</button>
                </div>
            </form>
        </div>
        
        <!-- Notification History -->
        <div class="feature">
            <h3>Notification History</h3>
            <div class="message-list-com">
                <div class="message-item">
                    <div class="message-content">
                        <strong>Appointment Reminder</strong> - Sent to John Doe: Your appointment is tomorrow at 2 PM.
                    </div>
                    <div class="message-time">Yesterday, 3:15 PM</div>
                </div>
                <div class="message-item">
                    <div class="message-content">
                        <strong>Medication Alert</strong> - Sent to Jane Smith: Don't forget to take your afternoon dose.
                    </div>
                    <div class="message-time">Today, 12:30 PM</div>
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

</body>

</html>