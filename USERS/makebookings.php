<?php
session_start();
include_once('db_connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | Home</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>

.booking-container {
    margin-top: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.booking-container h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.booking-form {
    display: flex;
    flex-direction: column;
}

.booking-form label {
    font-weight: bold;
    margin-bottom: 8px;
}

.booking-form select,
.booking-form input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.booking-form button {
    padding: 12px 24px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.booking-form button:hover {
    background-color: #0056b3;
}

/* Modal styles */
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #ffffff;
    margin: 10% auto;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
    max-width: 500px;
    text-align: center;
}

/* Form styles */
.booking-container {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

.booking-container h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.booking-form {
    display: flex;
    flex-direction: column;
}

.booking-form label {
    font-weight: bold;
    margin-bottom: 8px;
}

.booking-form select,
.booking-form input[type="date"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
}

.booking-form button {
    padding: 14px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.booking-form button:hover {
    background-color: #0056b3;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 12px;
}

th {
    background-color: #f2f2f2;
}

a {
    color: #000;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
    color: #007bff;
}
.modal {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
    max-width: 500px;
    text-align: center;
}

#content main{
    margin-top: 0px;
    padding-top: 0px;
}

    </style>
    <link rel="stylesheet" href="../CSSW/style.css">
</head>
<?php include_once("db_connect.php")?>

<body>
    <!-- SIDEMENU-->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="sidebar-icon"><img src="../Images/must logo.png"></i>
            <span class="text">Booking System</span>
        </a>

        <ul class="side-menu top">
            
            <li class="active">
                <a href="dashboard.php" class="brand">
                    <i class=" fa fa-solid fa-table-cells-large"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#.php" class="brand">
                    <i class=" fa fa-solid fa-calendar-days"></i>
                    
                    <span class="text">Bookings</span>
                </a>
            </li>

            <li>
                <a href="review1.php" class="brand">
                <i class=" fa fa-solid fa-chart-simple"></i>
                    
                    <span class="text">Review</span>
                </a>
            </li>

            <li>
                <a href="comments.php" class="brand">
                <i class="fa fa-solid fa-user"></i>
                    
                    <span class="text">Comments</span>
                </a>
            </li>

            <li>
                <a href="logout.php" class="brand">
                    <i class="fa fa-solid fa-right-from-bracket"></i>
                    
                    <span class="logout">Logout</span>
                </a>
            </li>

        </ul>
    </section>

    <!--Dashboard-->
    <section id="content">
        <!--NavBar-->
        <nav>
            <i class="sidebar-icon"> <img src="../icons/menu.png"> </i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><img src="../icons/magnifying-glass.png" class="sidebar-icon"></button>
                </div>
            </form>
            
            <a href="comments.php" class="notification">
                <i class="sidebar-icon"><img src="../icons/bell.png" ></i>
                <span class="num">
                <?php 
                                $admin_sql = "SELECT * from reviews";
                                $admin_result = mysqli_query($conn,$admin_sql);

                                // display  find number of users
                                $number_of_reviews = mysqli_num_rows($admin_result);
                                echo $number_of_reviews;
                            ?>
                </span>
            </a>
            <a href="#" class="profile">
                <img src="../icons/user.png">
            </a>
            
        </nav>

        <!-- MAIN-->
        <main>
    
        <div class="dash-content ">
        <div class="overview ">
                <div class="title ">
                    
                    <span class="text ">BOOKING</span>
                </div>

<table>
    <tr>
        <th>Time</th>
        <th>Route</th>
    </tr>
    <tr>
        <td>7:00 AM</td>
        <td>Limbe to Campus</td>
    </tr>
   
    <tr>
        <td>5:00 PM</td>
        <td>Campus to Limbe</td>
    </tr>
    
</table><br>

</div>

    <div class="booking-container">
        <div>
        <h1>Trip</h1>

        <form id="bookingForm" method="POST" action="addBookings.php" style="display: flex; flex-direction: column;">

                <label for="route" style="font-weight: bold; margin-bottom: 4px; color: #333;">From:</label>
                <select id="pickup_location" name="pickup_location">
                                <option value="Balaka">Balaka </option>
                                <option value="Blantyre">Blantyre </option>
                                <option value="Chikwawa">Chikwawa </option>
                                <option value="Chitipa">Chitipa </option>
                                <option value="Dedza">Dedza </option>
                                <option value="Dowa">Dowa </option>
                                <option value="Karonga">Karonga </option>
                                <option value="Kasungu">Kasungu </option>
                                <option value="Machinga">Machinga </option>
                                <option value="Mchinji">Mchinji </option>
                                <option value="MonkeyBay">MonkeyBay </option>
                                <option value="Mulanje">Mulanje </option>
                                <option value="Mwanza">Mwanza </option>
                                <option value="Mzimba">Mzimba </option>
                                <option value="Mzuzu">Mzuzu </option>
                                <option value="Nkhatabay">Nkhatabay </option>
                                <option value="Nkhotakota">Nkhotakota </option>
                                <option value="Nsanje">Nsanje </option>
                                <option value="Ntcheu">Ntcheu </option>
                                <option value="Ntchisi">Ntchisi </option>
                                <option value="Rumphi">Rumphi </option>
                                <option value="Salima">Salima </option>
                                <option value="Thyolo">Thyolo </option>
                                <option value="Zomba">Zomba </option>
                    </select>
                    <label for="route" style="font-weight: bold; margin-bottom: 4px; color: #333;">To:</label>
                            <select id="dropoff_location" name="dropoff_location">
                                <option value="Balaka" selected>Balaka </option>
                                <option value="Blantyre">Blantyre </option>
                                <option value="Chikwawa">Chikwawa </option>
                                <option value="Chitipa">Chitipa </option>
                                <option value="Dedza">Dedza </option>
                                <option value="Dowa">Dowa </option>
                                <option value="Karonga">Karonga </option>
                                <option value="Kasungu">Kasungu </option>
                                <option value="Machinga">Machinga </option>
                                <option value="Mchinji">Mchinji </option>
                                <option value="MonkeyBay">MonkeyBay </option>
                                <option value="Mulanje">Mulanje </option>
                                <option value="Mwanza">Mwanza </option>
                                <option value="Mzimba">Mzimba </option>
                                <option value="Mzuzu">Mzuzu </option>
                                <option value="Nkhatabay">Nkhatabay </option>
                                <option value="Nkhotakota">Nkhotakota </option>
                                <option value="Nsanje">Nsanje </option>
                                <option value="Ntcheu">Ntcheu </option>
                                <option value="Ntchisi">Ntchisi </option>
                                <option value="Rumphi">Rumphi </option>
                                <option value="Salima">Salima </option>
                                <option value="Thyolo">Thyolo </option>
                                <option value="Zomba">Zomba </option>
                            </select>
                        </div>


                <label for="date" style="font-weight: bold; margin-bottom: 4px; color: #333;">Date:</label>
                <input type="date" id="date" name="date"  min="<?php echo date('Y-m-d'); ?>" 
       max="<?php echo date('Y-m-d', strtotime('+1 week')); ?>"
                required style="width: 100%; padding: 6px; margin-bottom: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 12px; background-color: #f9f9f9;">

                <label for="vehicleType" style="font-weight: bold; margin-bottom: 4px; color: #333;">Vehicle Type:</label>
                <select id="vehicleType" name="vehicletype" required style="width: 100%; padding: 6px; margin-bottom: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 12px; background-color: #f9f9f9;">
                    <option value="">Select a vehicle type...</option>
                    <option value="car">Car</option>
                    <option value="bus">Bus</option>
                </select>

                <button id="confirm" type="submit" style="width: 100%; padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 12px; font-weight: bold; transition: background-color 0.3s ease;">
                    Confirm Booking
                </button>

        </form>



    </div>

                <div id="confirmationMessage"></div> 
                    
 </div>        
        </div>

        
        </main>

    
<script src="../script.js"></script>
<script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>
<script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the confirm button
        var confirmBtn = document.getElementById("confirmBtn");

        // Get the cancel button
        var cancelBtn = document.getElementById("cancelBtn");

        // When the user clicks the confirm button, redirect to dashboard
        confirmBtn.onclick = function () {
            window.location.href = "user_dashboard.php";
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Function to handle form submission
        function submitBookingForm() {
            // Submit the form
            document.getElementById("bookingForm").submit();
        }

        // Show the modal when the confirm booking button is clicked
        function confirmBooking() {
            modal.style.display = "block";
        }
    </script> 

</body>
</html>