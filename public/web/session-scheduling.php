
    <?php
include 'include/header.php';
?>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/blog-banner-3.webp">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
                <div class="session-scheduling-container">
                    <header class="med-header">
            <h1 class="session-scheduling-title">Patient Managment</h1>
        </header>
        <div class="session-scheduling-header">
           <!-- <h1 class="session-scheduling-title">Spravato Session Scheduling</h1> -->
            <div class="session-scheduling-actions">
                <button class="session-scheduling-btn session-scheduling-btn-primary" id="session-scheduling-new-btn">
                    + Schedule New Session
                </button>
            </div>
        </div>

        <div class="session-scheduling-tabs">
            <div class="session-scheduling-tab active" data-tab="calendar">Calendar View</div>
            <div class="session-scheduling-tab" data-tab="list">List View</div>
            <div class="session-scheduling-tab" data-tab="templates">Session Templates</div>
        </div>

        <!-- Calendar View Tab -->
        <div class="session-scheduling-content active" id="calendar-tab">
            <div class="session-scheduling-calendar" id="session-calendar"></div>
        </div>

        <!-- List View Tab -->
        <div class="session-scheduling-content" id="list-tab">
            <div class="session-scheduling-patient-selector">
                <div class="session-scheduling-form-group">
                    <label for="session-patient-filter">Filter by Patient</label>
                    <select id="session-patient-filter">
                        <option value="">All Patients</option>
                        <option value="PT1001">John Doe</option>
                        <option value="PT1002">Jane Smith</option>
                        <option value="PT1003">Robert Johnson</option>
                    </select>
                </div>
                <div class="session-scheduling-form-group">
                    <label for="session-status-filter">Filter by Status</label>
                    <select id="session-status-filter">
                        <option value="">All Statuses</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="session-scheduling-form-group">
                    <label for="session-date-filter">Filter by Date Range</label>
                    <input type="text" id="session-date-filter" placeholder="Select date range">
                </div>
            </div>

            <div class="session-scheduling-session-list">
                <table class="session-scheduling-session-table">
                    <thead>
                        <tr>
                            <th>Date & Time</th>
                            <th>Patient</th>
                            <th>Dose</th>
                            <th>Clinician</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-session-id="1">
                            <td>2023-07-15 10:00 AM</td>
                            <td>John Doe (PT1001)</td>
                            <td>84mg</td>
                            <td>Dr. Smith</td>
                            <td><span class="session-scheduling-status session-scheduling-status-scheduled">Scheduled</span></td>
                            <td>
                                <div class="session-scheduling-action-btns">
                                    <button class="session-scheduling-btn session-scheduling-btn-primary session-edit-btn" style="padding: 5px 10px; font-size: 0.8rem;">Edit</button>
                                    <button class="session-scheduling-btn session-scheduling-btn-danger session-cancel-btn" style="padding: 5px 10px; font-size: 0.8rem;">Cancel</button>
                                </div>
                            </td>
                        </tr>
                        <tr data-session-id="2">
                            <td>2023-07-08 02:00 PM</td>
                            <td>Jane Smith (PT1002)</td>
                            <td>84mg</td>
                            <td>Dr. Anderson</td>
                            <td><span class="session-scheduling-status session-scheduling-status-scheduled">Scheduled</span></td>
                            <td>
                                <div class="session-scheduling-action-btns">
                                    <button class="session-scheduling-btn session-scheduling-btn-primary session-edit-btn" style="padding: 5px 10px; font-size: 0.8rem;">Edit</button>
                                    <button class="session-scheduling-btn session-scheduling-btn-danger session-cancel-btn" style="padding: 5px 10px; font-size: 0.8rem;">Cancel</button>
                                </div>
                            </td>
                        </tr>
                        <tr data-session-id="3">
                            <td>2023-07-01 11:00 AM</td>
                            <td>Robert Johnson (PT1003)</td>
                            <td>56mg</td>
                            <td>Dr. Smith</td>
                            <td><span class="session-scheduling-status session-scheduling-status-completed">Completed</span></td>
                            <td>
                                <div class="session-scheduling-action-btns">
                                    <button class="session-scheduling-btn session-scheduling-btn-primary session-view-btn" style="padding: 5px 10px; font-size: 0.8rem;">View</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Session Templates Tab -->
        <div class="session-scheduling-content" id="templates-tab">
            <div class="session-scheduling-form-group">
                <label for="template-search">Search Templates</label>
                <input type="text" id="template-search" placeholder="Search templates by name...">
            </div>

            <div class="session-scheduling-schedule-grid">
                <div class="session-scheduling-form-group">
                    <div style="background-color: var(--light); padding: 15px; border-radius: 8px;">
                        <h3 style="margin-top: 0;">Induction Phase - Week 1</h3>
                        <p><strong>Frequency:</strong> Twice weekly</p>
                        <p><strong>Dose:</strong> 56mg or 84mg</p>
                        <p><strong>Duration:</strong> 4 weeks</p>
                        <button class="session-scheduling-btn session-scheduling-btn-primary" style="width: 100%; margin-top: 10px;">Use This Template</button>
                    </div>
                </div>
                <div class="session-scheduling-form-group">
                    <div style="background-color: var(--light); padding: 15px; border-radius: 8px;">
                        <h3 style="margin-top: 0;">Maintenance Phase - Monthly</h3>
                        <p><strong>Frequency:</strong> Every 2-4 weeks</p>
                        <p><strong>Dose:</strong> 56mg or 84mg</p>
                        <p><strong>Duration:</strong> Ongoing</p>
                        <button class="session-scheduling-btn session-scheduling-btn-primary" style="width: 100%; margin-top: 10px;">Use This Template</button>
                    </div>
                </div>
                <div class="session-scheduling-form-group">
                    <div style="background-color: var(--light); padding: 15px; border-radius: 8px;">
                        <h3 style="margin-top: 0;">Tapering Phase</h3>
                        <p><strong>Frequency:</strong> Weekly</p>
                        <p><strong>Dose:</strong> 56mg</p>
                        <p><strong>Duration:</strong> 4 weeks</p>
                        <button class="session-scheduling-btn session-scheduling-btn-primary" style="width: 100%; margin-top: 10px;">Use This Template</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Session Modal -->
    <div class="session-scheduling-modal" id="new-session-modal">
        <div class="session-scheduling-modal-content">
            <div class="session-scheduling-modal-header">
                <h2 class="session-scheduling-modal-title">Schedule New Session</h2>
                <button class="session-scheduling-modal-close" id="new-session-close">&times;</button>
            </div>
            <form id="new-session-form">
                <div class="session-scheduling-form-group">
                    <label for="session-patient">Patient</label>
                    <select id="session-patient" required>
                        <option value="">Select Patient</option>
                        <option value="PT1001">John Doe (PT1001)</option>
                        <option value="PT1002">Jane Smith (PT1002)</option>
                        <option value="PT1003">Robert Johnson (PT1003)</option>
                    </select>
                </div>

                <div class="session-scheduling-schedule-grid">
                    <div class="session-scheduling-form-group">
                        <label for="session-date">Date</label>
                        <input type="date" id="session-date" required>
                    </div>
                    <div class="session-scheduling-form-group">
                        <label for="session-time">Time</label>
                        <input type="time" id="session-time" required>
                    </div>
                </div>

                <div class="session-scheduling-schedule-grid">
                    <div class="session-scheduling-form-group">
                        <label for="session-dose">Dose</label>
                        <select id="session-dose" required>
                            <option value="">Select Dose</option>
                            <option value="56mg">56mg</option>
                            <option value="84mg">84mg</option>
                        </select>
                    </div>
                    <div class="session-scheduling-form-group">
                        <label for="session-clinician">Clinician</label>
                        <select id="session-clinician" required>
                            <option value="">Select Clinician</option>
                            <option value="Dr. Smith">Dr. Smith</option>
                            <option value="Dr. Anderson">Dr. Anderson</option>
                            <option value="Dr. Johnson">Dr. Johnson</option>
                        </select>
                    </div>
                </div>

                <div class="session-scheduling-form-group">
                    <label for="session-notes">Notes</label>
                    <textarea id="session-notes" placeholder="Any special instructions or notes..."></textarea>
                </div>

                <div class="session-scheduling-form-group" style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" class="session-scheduling-btn" id="new-session-cancel">Cancel</button>
                    <button type="submit" class="session-scheduling-btn session-scheduling-btn-primary">Schedule Session</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Session Modal -->
    <div class="session-scheduling-modal" id="edit-session-modal">
        <div class="session-scheduling-modal-content">
            <div class="session-scheduling-modal-header">
                <h2 class="session-scheduling-modal-title">Edit Session</h2>
                <button class="session-scheduling-modal-close" id="edit-session-close">&times;</button>
            </div>
            <form id="edit-session-form">
                <input type="hidden" id="edit-session-id">
                <div class="session-scheduling-form-group">
                    <label for="edit-session-patient">Patient</label>
                    <select id="edit-session-patient" required>
                        <option value="">Select Patient</option>
                        <option value="PT1001">John Doe (PT1001)</option>
                        <option value="PT1002">Jane Smith (PT1002)</option>
                        <option value="PT1003">Robert Johnson (PT1003)</option>
                    </select>
                </div>

                <div class="session-scheduling-schedule-grid">
                    <div class="session-scheduling-form-group">
                        <label for="edit-session-date">Date</label>
                        <input type="date" id="edit-session-date" required>
                    </div>
                    <div class="session-scheduling-form-group">
                        <label for="edit-session-time">Time</label>
                        <input type="time" id="edit-session-time" required>
                    </div>
                </div>

                <div class="session-scheduling-schedule-grid">
                    <div class="session-scheduling-form-group">
                        <label for="edit-session-dose">Dose</label>
                        <select id="edit-session-dose" required>
                            <option value="">Select Dose</option>
                            <option value="56mg">56mg</option>
                            <option value="84mg">84mg</option>
                        </select>
                    </div>
                    <div class="session-scheduling-form-group">
                        <label for="edit-session-clinician">Clinician</label>
                        <select id="edit-session-clinician" required>
                            <option value="">Select Clinician</option>
                            <option value="Dr. Smith">Dr. Smith</option>
                            <option value="Dr. Anderson">Dr. Anderson</option>
                            <option value="Dr. Johnson">Dr. Johnson</option>
                        </select>
                    </div>
                </div>

                <div class="session-scheduling-form-group">
                    <label for="edit-session-notes">Notes</label>
                    <textarea id="edit-session-notes" placeholder="Any special instructions or notes..."></textarea>
                </div>

                <div class="session-scheduling-form-group" style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" class="session-scheduling-btn session-scheduling-btn-danger" id="edit-session-delete">Delete Session</button>
                    <button type="submit" class="session-scheduling-btn session-scheduling-btn-primary">Save Changes</button>
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
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab functionality
            const tabs = document.querySelectorAll('.session-scheduling-tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs and content
                    document.querySelectorAll('.session-scheduling-tab').forEach(t => {
                        t.classList.remove('active');
                    });
                    document.querySelectorAll('.session-scheduling-content').forEach(c => {
                        c.classList.remove('active');
                    });
                    
                    // Add active class to clicked tab and corresponding content
                    this.classList.add('active');
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });

            // Initialize calendar
            const calendarEl = document.getElementById('session-calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    {
                        title: 'John Doe - 84mg',
                        start: '2023-07-15T10:00:00',
                        end: '2023-07-15T12:00:00',
                        color: '#5d9cec',
                        textColor: 'white'
                    },
                    {
                        title: 'Jane Smith - 84mg',
                        start: '2023-07-08T14:00:00',
                        end: '2023-07-08T16:00:00',
                        color: '#5d9cec',
                        textColor: 'white'
                    },
                    {
                        title: 'Robert Johnson - 56mg',
                        start: '2023-07-01T11:00:00',
                        end: '2023-07-01T13:00:00',
                        color: '#a0d468',
                        textColor: 'white'
                    }
                ],
                eventClick: function(info) {
                    // In a real app, this would show details for the clicked session
                    alert('Session details:\nPatient: ' + info.event.title + '\nTime: ' + info.event.start.toLocaleString());
                },
                dateClick: function(info) {
                    // Open new session modal with date pre-filled when clicking on a date
                    document.getElementById('session-date').value = info.dateStr;
                    document.getElementById('new-session-modal').style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }
            });
            calendar.render();

            // Modal functionality
            const newSessionBtn = document.getElementById('session-scheduling-new-btn');
            const newSessionModal = document.getElementById('new-session-modal');
            const newSessionClose = document.getElementById('new-session-close');
            const newSessionCancel = document.getElementById('new-session-cancel');
            const newSessionForm = document.getElementById('new-session-form');

            const editSessionModal = document.getElementById('edit-session-modal');
            const editSessionClose = document.getElementById('edit-session-close');
            const editSessionForm = document.getElementById('edit-session-form');
            const deleteSessionBtn = document.getElementById('edit-session-delete');

            // Open new session modal
            newSessionBtn.addEventListener('click', function() {
                // Set default time to next available hour
                const now = new Date();
                const nextHour = new Date(now.getTime() + 60 * 60 * 1000);
                document.getElementById('session-time').value = 
                    nextHour.getHours().toString().padStart(2, '0') + ':' + 
                    nextHour.getMinutes().toString().padStart(2, '0');
                
                newSessionModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });

            // Close modals
            function closeModal(modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            newSessionClose.addEventListener('click', function() {
                closeModal(newSessionModal);
            });

            newSessionCancel.addEventListener('click', function() {
                closeModal(newSessionModal);
            });

            editSessionClose.addEventListener('click', function() {
                closeModal(editSessionModal);
            });

            // Close modals when clicking outside
            document.querySelectorAll('.session-scheduling-modal').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal(modal);
                    }
                });
            });

            // Form submissions
            newSessionForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('New session scheduled successfully!');
                closeModal(newSessionModal);
                // In a real app, you would send the data to your backend here
            });

            editSessionForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Session updated successfully!');
                closeModal(editSessionModal);
                // In a real app, you would send the data to your backend here
            });

            deleteSessionBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this session?')) {
                    alert('Session deleted successfully!');
                    closeModal(editSessionModal);
                    // In a real app, you would send the delete request to your backend here
                }
            });

            // Edit session buttons
            document.querySelectorAll('.session-edit-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const sessionId = this.closest('tr').getAttribute('data-session-id');
                    document.getElementById('edit-session-id').value = sessionId;
                    
                    // In a real app, you would fetch the session data from your backend
                    // Here we're just simulating with the first session's data
                    document.getElementById('edit-session-patient').value = 'PT1001';
                    document.getElementById('edit-session-date').value = '2023-07-15';
                    document.getElementById('edit-session-time').value = '10:00';
                    document.getElementById('edit-session-dose').value = '84mg';
                    document.getElementById('edit-session-clinician').value = 'Dr. Smith';
                    document.getElementById('edit-session-notes').value = 'Regular scheduled session';
                    
                    editSessionModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            });

            // Cancel session buttons
            document.querySelectorAll('.session-cancel-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const sessionRow = this.closest('tr');
                    const patientName = sessionRow.cells[1].textContent;
                    const sessionDate = sessionRow.cells[0].textContent;
                    
                    if (confirm(`Are you sure you want to cancel the session for ${patientName} on ${sessionDate}?`)) {
                        sessionRow.querySelector('.session-scheduling-status').className = 'session-scheduling-status session-scheduling-status-cancelled';
                        sessionRow.querySelector('.session-scheduling-status').textContent = 'Cancelled';
                        
                        // Remove edit/cancel buttons and add view button
                        const actionCell = sessionRow.cells[5];
                        actionCell.innerHTML = `
                            <div class="session-scheduling-action-btns">
                                <button class="session-scheduling-btn session-scheduling-btn-primary session-view-btn" style="padding: 5px 10px; font-size: 0.8rem;">View</button>
                            </div>
                        `;
                        
                        alert('Session cancelled successfully!');
                        // In a real app, you would send the cancellation to your backend here
                    }
                });
            });

            // Set today's date as default in forms
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('session-date').value = today;
        });
    </script>


</body>

</html>