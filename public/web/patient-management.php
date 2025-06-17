
    <?php
include 'include/header.php';
?>

    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/blog-banner-3.webp">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
    <div class="patient-management-container">
        <div class="patient-management-header">
        	 <header class="med-header">
            <h1>Patient Managment</h1>
        </header>
           <!-- <h1 class="patient-management-title">Patient Management</h1> -->
        </div>

        <div class="patient-management-search">
            <input type="text" placeholder="Search patients by name, ID, or contact...">
            <div class="patient-management-actions">
                <button class="patient-management-btn patient-management-btn-primary" id="patient-management-add-btn">
                    + Add New Patient
                </button>
            </div>
        </div>

        <table class="patient-management-table">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Last Visit</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="PT1001">
                    <td>PT1001</td>
                    <td>John Doe</td>
                    <td>42</td>
                    <td>Male</td>
                    <td>john.doe@example.com</td>
                    <td>2025-03-15</td>
                    <td><span class="patient-management-status patient-management-status-active">Active</span></td>
                    <td>
                        <div class="patient-management-action-btns">
                            <button class="patient-management-btn patient-management-btn-warning patient-edit-btn">Edit</button>
                            <button class="patient-management-btn patient-management-btn-danger patient-delete-btn">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="PT1002">
                    <td>PT1002</td>
                    <td>Jane Smith</td>
                    <td>35</td>
                    <td>Female</td>
                    <td>jane.smith@example.com</td>
                    <td>2025-02-10</td>
                    <td><span class="patient-management-status patient-management-status-active">Active</span></td>
                    <td>
                        <div class="patient-management-action-btns">
                            <button class="patient-management-btn patient-management-btn-warning patient-edit-btn">Edit</button>
                            <button class="patient-management-btn patient-management-btn-danger patient-delete-btn">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="PT1003">
                    <td>PT1003</td>
                    <td>Robert Johnson</td>
                    <td>58</td>
                    <td>Male</td>
                    <td>robert.j@example.com</td>
                    <td>2025-01-28</td>
                    <td><span class="patient-management-status patient-management-status-inactive">Inactive</span></td>
                    <td>
                        <div class="patient-management-action-btns">
                            <button class="patient-management-btn patient-management-btn-warning patient-edit-btn">Edit</button>
                            <button class="patient-management-btn patient-management-btn-danger patient-delete-btn">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Add/Edit Patient Modal -->
        <div class="patient-management-modal" id="patient-management-modal">
            <div class="patient-management-modal-content">
                <div class="patient-management-modal-header">
                    <h2 class="patient-management-modal-title" id="patient-management-modal-title">Add New Patient</h2>
                    <button class="patient-management-close-btn" id="patient-management-close-btn">&times;</button>
                </div>
                <form id="patient-management-form">
                    <input type="hidden" id="patient-id">
                    <div class="patient-management-form-group">
                        <label for="patient-fullname">Full Name</label>
                        <input type="text" id="patient-fullname" required>
                    </div>
                    
                    <div class="patient-management-form-group">
                        <label for="patient-dob">Date of Birth</label>
                        <input type="date" id="patient-dob" required>
                    </div>
                    
                    <div class="patient-management-form-group">
                        <label for="patient-gender">Gender</label>
                        <select id="patient-gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="patient-management-form-group">
                        <label for="patient-contact">Contact Number</label>
                        <input type="tel" id="patient-contact" required>
                    </div>
                    
                    <div class="patient-management-form-group">
                        <label for="patient-email">Email Address</label>
                        <input type="email" id="patient-email">
                    </div>
                    
                    <div class="patient-management-form-group">
                        <label for="patient-address">Address</label>
                        <textarea id="patient-address"></textarea>
                    </div>
                    
                    <div class="patient-management-form-group">
                        <label for="patient-status">Status</label>
                        <select id="patient-status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    
                    <div class="patient-management-form-actions">
                        <button type="button" class="patient-management-btn" id="patient-management-cancel-btn">Cancel</button>
                        <button type="submit" class="patient-management-btn patient-management-btn-primary">Save Patient</button>
                    </div>
                </form>
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
            // DOM Elements
            const addPatientBtn = document.getElementById('patient-management-add-btn');
            const patientModal = document.getElementById('patient-management-modal');
            const closeModalBtn = document.getElementById('patient-management-close-btn');
            const cancelBtn = document.getElementById('patient-management-cancel-btn');
            const patientForm = document.getElementById('patient-management-form');
            const modalTitle = document.getElementById('patient-management-modal-title');
            const patientIdField = document.getElementById('patient-id');
            
            // Patient data (in a real app, this would come from a database)
            let patients = [
                {
                    id: 'PT1001',
                    fullname: 'John Doe',
                    dob: '1981-01-15',
                    gender: 'male',
                    contact: '555-0101',
                    email: 'john.doe@example.com',
                    address: '123 Main St, Anytown',
                    status: 'active',
                    lastVisit: '2023-06-15'
                },
                {
                    id: 'PT1002',
                    fullname: 'Jane Smith',
                    dob: '1988-03-22',
                    gender: 'female',
                    contact: '555-0102',
                    email: 'jane.smith@example.com',
                    address: '456 Oak Ave, Somewhere',
                    status: 'active',
                    lastVisit: '2023-06-10'
                },
                {
                    id: 'PT1003',
                    fullname: 'Robert Johnson',
                    dob: '1965-11-05',
                    gender: 'male',
                    contact: '555-0103',
                    email: 'robert.j@example.com',
                    address: '789 Pine Rd, Nowhere',
                    status: 'inactive',
                    lastVisit: '2023-05-28'
                }
            ];
            
            // Open modal for adding new patient
            addPatientBtn.addEventListener('click', function() {
                patientIdField.value = '';
                modalTitle.textContent = 'Add New Patient';
                patientForm.reset();
                patientModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
            
            // Close modal functions
            function closeModal() {
                patientModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
            
            closeModalBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);
            
            // Close modal when clicking outside
            patientModal.addEventListener('click', function(e) {
                if (e.target === patientModal) {
                    closeModal();
                }
            });
            
            // Edit patient functionality
            document.querySelectorAll('.patient-edit-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const patientId = row.getAttribute('data-id');
                    const patient = patients.find(p => p.id === patientId);
                    
                    if (patient) {
                        modalTitle.textContent = 'Edit Patient';
                        patientIdField.value = patient.id;
                        document.getElementById('patient-fullname').value = patient.fullname;
                        document.getElementById('patient-dob').value = patient.dob;
                        document.getElementById('patient-gender').value = patient.gender;
                        document.getElementById('patient-contact').value = patient.contact;
                        document.getElementById('patient-email').value = patient.email;
                        document.getElementById('patient-address').value = patient.address;
                        document.getElementById('patient-status').value = patient.status;
                        
                        patientModal.style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                    }
                });
            });
            
            // Delete patient functionality
            document.querySelectorAll('.patient-delete-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const patientId = row.getAttribute('data-id');
                    const patientName = row.cells[1].textContent;
                    
                    if (confirm(`Are you sure you want to delete patient ${patientName} (${patientId})?`)) {
                        // In a real app, you would send a request to your backend here
                        row.remove();
                        patients = patients.filter(p => p.id !== patientId);
                        alert('Patient deleted successfully!');
                    }
                });
            });
            
            // Form submission
            patientForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const patientData = {
                    id: patientIdField.value || 'PT' + Math.floor(1000 + Math.random() * 9000),
                    fullname: document.getElementById('patient-fullname').value,
                    dob: document.getElementById('patient-dob').value,
                    gender: document.getElementById('patient-gender').value,
                    contact: document.getElementById('patient-contact').value,
                    email: document.getElementById('patient-email').value,
                    address: document.getElementById('patient-address').value,
                    status: document.getElementById('patient-status').value,
                    lastVisit: new Date().toISOString().split('T')[0]
                };
                
                if (patientIdField.value) {
                    // Update existing patient
                    const index = patients.findIndex(p => p.id === patientIdField.value);
                    if (index !== -1) {
                        patients[index] = patientData;
                    }
                } else {
                    // Add new patient
                    patients.push(patientData);
                }
                
                // In a real app, you would send the data to your backend here
                alert(`Patient ${patientIdField.value ? 'updated' : 'added'} successfully!`);
                
                // Refresh the table (in a real app, you would re-fetch from the backend)
                refreshPatientTable();
                closeModal();
            });
            
            // Function to refresh the patient table
            function refreshPatientTable() {
                const tbody = document.querySelector('.patient-management-table tbody');
                tbody.innerHTML = '';
                
                patients.forEach(patient => {
                    const row = document.createElement('tr');
                    row.setAttribute('data-id', patient.id);
                    
                    // Calculate age from DOB
                    const dob = new Date(patient.dob);
                    const age = new Date().getFullYear() - dob.getFullYear();
                    
                    row.innerHTML = `
                        <td>${patient.id}</td>
                        <td>${patient.fullname}</td>
                        <td>${age}</td>
                        <td>${patient.gender.charAt(0).toUpperCase() + patient.gender.slice(1)}</td>
                        <td>${patient.email}</td>
                        <td>${patient.lastVisit}</td>
                        <td><span class="patient-management-status patient-management-status-${patient.status}">${patient.status.charAt(0).toUpperCase() + patient.status.slice(1)}</span></td>
                        <td>
                            <div class="patient-management-action-btns">
                                <button class="patient-management-btn patient-management-btn-warning patient-edit-btn">Edit</button>
                                <button class="patient-management-btn patient-management-btn-danger patient-delete-btn">Delete</button>
                            </div>
                        </td>
                    `;
                    
                    tbody.appendChild(row);
                });
                
                // Re-attach event listeners to the new buttons
                attachEventListeners();
            }
            
            // Function to attach event listeners to edit/delete buttons
            function attachEventListeners() {
                document.querySelectorAll('.patient-edit-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const row = this.closest('tr');
                        const patientId = row.getAttribute('data-id');
                        const patient = patients.find(p => p.id === patientId);
                        
                        if (patient) {
                            modalTitle.textContent = 'Edit Patient';
                            patientIdField.value = patient.id;
                            document.getElementById('patient-fullname').value = patient.fullname;
                            document.getElementById('patient-dob').value = patient.dob;
                            document.getElementById('patient-gender').value = patient.gender;
                            document.getElementById('patient-contact').value = patient.contact;
                            document.getElementById('patient-email').value = patient.email;
                            document.getElementById('patient-address').value = patient.address;
                            document.getElementById('patient-status').value = patient.status;
                            
                            patientModal.style.display = 'flex';
                            document.body.style.overflow = 'hidden';
                        }
                    });
                });
                
                document.querySelectorAll('.patient-delete-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const row = this.closest('tr');
                        const patientId = row.getAttribute('data-id');
                        const patientName = row.cells[1].textContent;
                        
                        if (confirm(`Are you sure you want to delete patient ${patientName} (${patientId})?`)) {
                            // In a real app, you would send a request to your backend here
                            row.remove();
                            patients = patients.filter(p => p.id !== patientId);
                            alert('Patient deleted successfully!');
                        }
                    });
                });
            }
        });
    </script>
</body>

</html>