<?php
include 'include/header.php';
?>
<style>
    /****appointment-css*****/
.booking-calendar-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .month-year {
            font-size: 22px;
            font-weight: bold;
            color: #26aba3;
        }
        .nav-buttons button {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
            color: #26aba3;
        }
        .nav-buttons button:hover {
            background-color: #f0f0f0;
        }
        .booking-calendar {
            width: 100%;
            border-collapse: collapse;
        }
        .booking-calendar th {
            padding: 12px 0;
            text-align: center;
            color: #fff;
            font-weight: normal;
            background-color: #26aba3;
        }
        .booking-calendar td {
            padding: 12px 0;
            text-align: center;
            cursor: pointer;
            position: relative;
        }
        .booking-calendar td:hover {
            background-color: #f0f0f0;
            
        }
        .selected-date-cell {
            background-color: #26aba3;
            color: white;
           
            font-weight: bold;
        }
        .other-month-day {
            color: #ccc;
        }
        .current-day-cell {
            border: 2px solid #071c1f;
            
        }
        .time-slots-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 20px;
            display: none;
        }
        .time-slots-container h3 {
            margin-top: 0;
            color: #26aba3;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .time-slot {
            display: inline-block;
            margin: 8px;
            padding: 10px 15px;
            background-color: #f5f5f5;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .time-slot:hover {
            background-color: #26aba3;
            color: white;
        }
        .selected-time-slot {
            background-color: #26aba3 !important;
            color: white !important;
        }
        .selected-date-display {
            text-align: center;
            font-size: 16px;
            margin: 15px 0;
            font-weight: bold;
            color: #26aba3;
        }
        .booking-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .booking-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .submit-booking-btn {
            background-color: #071c1f;
            color: white;
        }
        .view-booking-btn {
            background-color: #071c1f;
            color: white;
        }
        .home-btn {
            background-color: #f44336;
            color: white;
        }
        .appointment-dialog-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .appointment-dialog-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: fadeIn 0.3s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .close-dialog-btn {
            float: right;
            cursor: pointer;
            font-size: 24px;
            color: #888;
            transition: color 0.3s;
        }
        .close-dialog-btn:hover {
            color: #333;
        }
        .appointment-details-container {
            margin: 20px 0;
        }
        h2.appoint {
    color: #26aba3;
    font-size: 25px;
}
        .appointment-details-container p {
            margin: 10px 0;
            font-size: 16px;
            color: #071c1f;
        }
        .appointment-details-container strong {
            color: #333;
            display: inline-block;
            width: 100px;
        }
        .dialog-action-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .dialog-btn {
            padding: 8px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }
        .confirm-btn {
            background-color: #071c1f;
            color: white;
        }
        .return-home-btn {
            background-color: #071c1f;
            color: #fff;
        }
        .return-home-btn:hover {
            background-color: #e0e0e0;
        }
        tbody, td, tfoot, th, thead, tr {
    padding: 30px 0px !important;
    border: 1px solid #000;
}
button#view-booking {
    background: #26aba3;
    color: #fff;
    padding: 15px;
}
p.time-slot-p {
    font-size: 15px;
    padding: 10px;
}
button#confirm-appointment {
    background: #26aba3;
    color: #fff;
    padding: 10px;
}


</style>


    <main>

        <div class="main-wrapper">
            <div class="profile-banner-large bg-img" data-bg="assets/images/banner/blog-banner-3.webp">
            </div>
            <!-- Wrapping everything in treat-wrapper -->
             <div class="progress-tracker">
        <header class="progress-header">
            <h1>Appointment</h1>
        </header>
       <!--my-code--->
      <div class="ltn__appointment-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__appointment-inner">
                
    
    
 
 <div class="booking-calendar-container">
        <div class="calendar-header">
            <div class="nav-buttons">
                <button id="prev-month-btn">&lt;</button>
            </div>
            <div class="month-year" id="month-year-display">March 2025</div>
            <div class="nav-buttons">
                <button id="next-month-btn">&gt;</button>
            </div>
        </div>
        <table class="booking-calendar">
            <thead>
                <tr>
                    <th>Su</th>
                    <th>Mo</th>
                    <th>Tu</th>
                    <th>We</th>
                    <th>Th</th>
                    <th>Fr</th>
                    <th>Sa</th>
                </tr>
            </thead>
            <tbody id="calendar-body">
                <!-- Calendar will be generated here -->
            </tbody>
        </table>
    </div>

    <div id="selected-date-display" class="selected-date-display"></div>

    <div id="time-slots-section" class="time-slots-container">
        <h3>Available Time Slots</h3>
        <div id="time-slots-list"></div>
        <p class="time-slot-p">First Consultation</p>
        
        <div class="booking-actions">
            <button id="view-booking" class="spravato-btn">Make An Appointment</button>
        </div>
    </div>

    <!-- Appointment Dialog -->
    <div id="appointment-dialog" class="appointment-dialog-overlay">
        <div class="appointment-dialog-box">
            <span class="close-dialog-btn">&times;</span>
            <h2 class="appoint">Your Appointment Successfully</h2>
            <div class="appointment-details-container" id="appointment-details">
                <!-- Appointment details will be inserted here -->
            </div>
            <div class="dialog-action-buttons">
               <!-- <button id="confirm-appointment" class="theme-btn-1 btn btn-effect-1">Confirm</button> -->
               <!-- <button id="go-to-home" class="theme-btn-1 btn btn-effect-1">Back to Home</button> -->
               <button id="confirm-appointment" class="spravato-btn" onclick="window.location.href='#'">All Appointment</button>
                <button id="go-to-home" class="spravato-btn"></button>
            </div>
        </div>
    </div>
  

 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- APPOINTMENT AREA END -->

       <!--my-code--->

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

   <script src="js/plugins.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

 <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const calendarBody = document.getElementById('calendar-body');
            const monthYearDisplay = document.getElementById('month-year-display');
            const prevMonthBtn = document.getElementById('prev-month-btn');
            const nextMonthBtn = document.getElementById('next-month-btn');
            const selectedDateDisplay = document.getElementById('selected-date-display');
            const timeSlotsSection = document.getElementById('time-slots-section');
            const timeSlotsList = document.getElementById('time-slots-list');
            const viewBookingBtn = document.getElementById('view-booking');
            const appointmentDialog = document.getElementById('appointment-dialog');
            const closeDialogBtn = document.querySelector('.close-dialog-btn');
            const appointmentDetails = document.getElementById('appointment-details');
            const confirmAppointmentBtn = document.getElementById('confirm-appointment');
            const goToHomeBtn = document.getElementById('go-to-home');
            
            // Calendar data
            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();
            let selectedBooking = null;
            
            // Available time slots
            const availableTimeSlots = [
                "9:00 AM - 10:00 AM",
                "11:00 AM - 12:00 PM",
                "2:00 PM - 3:00 PM",
                "4:00 PM - 5:00 PM",
                "6:00 PM - 7:00 PM"
            ];
            
            // Generate calendar for given month and year
            function generateCalendar(month, year) {
                calendarBody.innerHTML = '';
                
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const daysInPrevMonth = new Date(year, month, 0).getDate();
                
                monthYearDisplay.textContent = new Date(year, month).toLocaleDateString('en-US', { 
                    month: 'long', 
                    year: 'numeric' 
                });
                
                let date = 1;
                let nextMonthDate = 1;
                
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement('tr');
                    
                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement('td');
                        
                        if (i === 0 && j < firstDay) {
                            // Previous month days
                            const prevDate = daysInPrevMonth - (firstDay - j - 1);
                            cell.textContent = prevDate;
                            cell.classList.add('other-month-day');
                        } else if (date > daysInMonth) {
                            // Next month days
                            cell.textContent = nextMonthDate;
                            cell.classList.add('other-month-day');
                            nextMonthDate++;
                        } else {
                            // Current month days
                            cell.textContent = date;
                            
                            // Highlight current day
                            if (date === currentDate.getDate() && 
                                month === currentDate.getMonth() && 
                                year === currentDate.getFullYear()) {
                                cell.classList.add('current-day-cell');
                            }
                            
                            // Add click event
                            cell.addEventListener('click', function() {
                                const allCells = document.querySelectorAll('.booking-calendar td');
                                allCells.forEach(c => c.classList.remove('selected-date-cell'));
                                
                                this.classList.add('selected-date-cell');
                                
                                const selectedDate = new Date(year, month, date);
                                selectedDateDisplay.textContent = selectedDate.toLocaleDateString('en-US', { 
                                    weekday: 'long', 
                                    month: 'long', 
                                    day: 'numeric', 
                                    year: 'numeric' 
                                });
                                
                                // Generate time slots
                                timeSlotsList.innerHTML = '';
                                availableTimeSlots.forEach(slot => {
                                    const slotElement = document.createElement('div');
                                    slotElement.className = 'time-slot';
                                    slotElement.textContent = slot;
                                    slotElement.addEventListener('click', function() {
                                        // Remove previous selection
                                        document.querySelectorAll('.time-slot').forEach(s => {
                                            s.classList.remove('selected-time-slot');
                                        });
                                        
                                        // Highlight selected slot
                                        this.classList.add('selected-time-slot');
                                        
                                        // Store booking details
                                        selectedBooking = {
                                            date: selectedDate.toLocaleDateString(),
                                            time: slot,
                                            service: "Standard Appointment"
                                        };
                                    });
                                    timeSlotsList.appendChild(slotElement);
                                });
                                
                                timeSlotsSection.style.display = 'block';
                            });
                            
                            date++;
                        }
                        
                        row.appendChild(cell);
                    }
                    
                    calendarBody.appendChild(row);
                    
                    if (date > daysInMonth && nextMonthDate > 7) {
                        break;
                    }
                }
            }
            
            // Month navigation
            prevMonthBtn.addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentMonth, currentYear);
                timeSlotsSection.style.display = 'none';
            });
            
            nextMonthBtn.addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentMonth, currentYear);
                timeSlotsSection.style.display = 'none';
            });
            
            // View booking - opens popup directly
            viewBookingBtn.addEventListener('click', function() {
                if (selectedBooking) {
                    appointmentDetails.innerHTML = `
                        <p><strong>Date:</strong> ${selectedBooking.date}</p>
                        <p><strong>Time:</strong> ${selectedBooking.time}</p>
                        <p><strong>Service:</strong> ${selectedBooking.service}</p>
                        <p><strong>Status:</strong> Pending Confirmation</p>
                    `;
                    appointmentDialog.style.display = 'flex';
                } else {
                    alert('Please select a date and time slot first');
                }
            });
            
            // Close dialog
            closeDialogBtn.addEventListener('click', function() {
                appointmentDialog.style.display = 'none';
            });
            
            
            
            // Return to home
            goToHomeBtn.addEventListener('click', function() {
                appointmentDialog.style.display = 'none';
                timeSlotsSection.style.display = 'none';
                document.querySelectorAll('.booking-calendar td').forEach(c => c.classList.remove('selected-date-cell'));
                document.querySelectorAll('.time-slot').forEach(s => {
                    s.classList.remove('selected-time-slot');
                });
                selectedDateDisplay.textContent = '';
                selectedBooking = null;
            });
            
            // Initialize calendar
            generateCalendar(currentMonth, currentYear);
        });

    </script>
    
</body>

</html>