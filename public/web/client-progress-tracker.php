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
      <div class="container client-head">
        <h1>Progress Reports</h1>
        
        <div class="controls">
            <input type="text" class="search-bar" placeholder="Search clients by name or ID...">
            <button class="add-client-btn" id="addClientBtn">+ Add New Client</button>
        </div>
        
        <div class="client-cards" id="clientCards">
            <!-- Client cards will be added here dynamically -->
        </div>
    </div>
    
    <!-- Add Client Modal -->
    <div class="modal" id="addClientModal">
        <div class="modal-content">
            <div class="modal-title">Add New Spravato Client</div>
            <form id="clientForm">
                <div class="form-group">
                    <label for="clientName">Full Name</label>
                    <input type="text" id="clientName" required>
                </div>
                <div class="form-group">
                    <label for="clientId">Client ID</label>
                    <input type="text" id="clientId" required>
                </div>
                <div class="form-group">
                    <label for="startDate">Treatment Start Date</label>
                    <input type="date" id="startDate" required>
                </div>
                <div class="form-group">
                    <label for="totalSessions">Total Sessions Planned</label>
                    <input type="number" id="totalSessions" min="1" value="12" required>
                </div>
                <div class="form-group">
                    <label for="initialPHQ">Initial PHQ-9 Score</label>
                    <input type="number" id="initialPHQ" min="0" max="27" required>
                </div>
                <div class="form-group">
                    <label for="initialGAD">Initial GAD-7 Score</label>
                    <input type="number" id="initialGAD" min="0" max="21" required>
                </div>
                <div class="form-group">
                    <label for="status">Treatment Status</label>
                    <select id="status" required>
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                        <option value="discontinued">Discontinued</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button type="button" class="modal-btn modal-btn-cancel" id="cancelBtn">Cancel</button>
                    <button type="submit" class="modal-btn modal-btn-save">Save Client</button>
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
        // Sample data - in a real app this would come from a database
        let clients = [
            {
                id: "SP-2025-001",
                name: "John Doe",
                startDate: "2025-03-15",
                completedSessions: 8,
                totalSessions: 12,
                lastSession: "2025-05-10",
                nextSession: "2025-05-17",
                initialPHQ: 22,
                currentPHQ: 12,
                initialGAD: 18,
                currentGAD: 8,
                status: "active",
                notes: "Client showing significant improvement in mood and energy levels. Reports better sleep quality."
            },
            {
                id: "SP-2025-002",
                name: "Sarah Johnson",
                startDate: "2025-02-01",
                completedSessions: 12,
                totalSessions: 12,
                lastSession: "2025-04-26",
                nextSession: "Follow-up in 3 months",
                initialPHQ: 25,
                currentPHQ: 5,
                initialGAD: 20,
                currentGAD: 4,
                status: "completed",
                notes: "Client completed full treatment course with excellent response. PHQ-9 and GAD-7 scores show remission of depressive symptoms."
            }
        ];

        // DOM elements
        const clientCards = document.getElementById('clientCards');
        const addClientBtn = document.getElementById('addClientBtn');
        const addClientModal = document.getElementById('addClientModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const clientForm = document.getElementById('clientForm');
        const searchBar = document.querySelector('.search-bar');

        // Display all clients
        function displayClients(clientsToDisplay = clients) {
            clientCards.innerHTML = '';
            
            clientsToDisplay.forEach(client => {
                const progressPercent = (client.completedSessions / client.totalSessions) * 100;
                
                const card = document.createElement('div');
                card.className = 'client-card';
                card.innerHTML = `
                    <div class="client-header">
                        <div class="client-name">${client.name}</div>
                        <div class="client-id">${client.id}</div>
                    </div>
                    <div class="client-details">
                        <div class="detail-row">
                            <span class="detail-label">Treatment Start</span>
                            <span class="detail-value">${formatDate(client.startDate)}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Sessions</span>
                            <span class="detail-value">${client.completedSessions}/${client.totalSessions}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Last Session</span>
                            <span class="detail-value">${client.lastSession}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Next Session</span>
                            <span class="detail-value">${client.nextSession}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">PHQ-9 Score</span>
                            <span class="detail-value">${client.currentPHQ} (Initial: ${client.initialPHQ})</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">GAD-7 Score</span>
                            <span class="detail-value">${client.currentGAD} (Initial: ${client.initialGAD})</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Status</span>
                            <span class="detail-value">
                                <span class="status status-${client.status}">
                                    ${client.status.charAt(0).toUpperCase() + client.status.slice(1)}
                                </span>
                            </span>
                        </div>
                        <div class="progress-section">
                            <div class="progress-title">Treatment Progress</div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: ${progressPercent}%"></div>
                            </div>
                            <div>${Math.round(progressPercent)}% completed</div>
                        </div>
                    </div>
                `;
                clientCards.appendChild(card);
            });
        }

        // Format date as MM/DD/YYYY
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }

        // Show modal
        addClientBtn.addEventListener('click', () => {
            addClientModal.style.display = 'flex';
        });

        // Hide modal
        cancelBtn.addEventListener('click', () => {
            addClientModal.style.display = 'none';
            clientForm.reset();
        });

        // Add new client
        clientForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const newClient = {
                id: document.getElementById('clientId').value,
                name: document.getElementById('clientName').value,
                startDate: document.getElementById('startDate').value,
                completedSessions: 0,
                totalSessions: parseInt(document.getElementById('totalSessions').value),
                lastSession: "Not started",
                nextSession: "To be scheduled",
                initialPHQ: parseInt(document.getElementById('initialPHQ').value),
                currentPHQ: parseInt(document.getElementById('initialPHQ').value),
                initialGAD: parseInt(document.getElementById('initialGAD').value),
                currentGAD: parseInt(document.getElementById('initialGAD').value),
                status: document.getElementById('status').value,
                notes: "New client - initial assessment completed."
            };
            
            clients.push(newClient);
            displayClients();
            addClientModal.style.display = 'none';
            clientForm.reset();
        });

        // Search functionality
        searchBar.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const filteredClients = clients.filter(client => 
                client.name.toLowerCase().includes(searchTerm) || 
                client.id.toLowerCase().includes(searchTerm)
            );
            displayClients(filteredClients);
        });

        // Initialize the display
        displayClients();
    </script>
</body>

</html>