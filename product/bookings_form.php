<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | Bookings</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="form_style.css">
</head>
<?php include_once("db_connect.php")?>
<?php include_once("process_booking.php")?>

<body>
    <!-- SIDEMENU-->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="sidebar-icon"><img src="../Images/must logo.png"></i>
            <span class="text">Booking System</span>
        </a>

        <ul class="side-menu top">
            
            <li>
                <a href="user_dashboard.php" class="brand">
                    <i class=" fa fa-solid fa-table-cells-large"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="active">
                <a href="user_bookings.php" class="brand">
                    <i class=" fa fa-solid fa-calendar-days"></i>
                    
                    <span class="text">Bookings</span>
                </a>
            </li>

            <li>
                <a href="drivers.php" class="brand">
                <i class=" fa fa-solid fa-user-tie"></i>
                    
                    <span class="text">Drivers</span>
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
            
            <a href="#" class="notification">
                <i class="sidebar-icon"><img src="../icons/bell.png" ></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="../icons/user.png">
            </a>
            
        </nav>

        <!-- MAIN-->
        <main>
        <h1> Bookings Form</h1>

                <div class="form-container">
                    <form action="process_booking.php" method="POST">
                    <div class="form-group">
                        <label for="id">ID/RegNo:</label>
                        <input type="text" id="alphanumericInput" name="id" Required>

                        </div>

                        <div class="form-group">
                            <label for="pickup_location">Pick-up Location:</label>
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
                        </div>

                        <div class="form-group">
                            <label for="dropoff_location">Drop-off Location:</label>
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

                        <div class="form-group">
                            <label for="pickup_time">Pick-up Time:</label>
                            <input type="datetime-local" id="pickup_time" name="pickup_time" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="dropoff_time">Drop-off Time:</label>
                            <input type="datetime-local" id="dropoff_time" name="dropoff_time" required>
                        </div>

                        <input type="hidden" name="status" value="Pending">

                        <div>
                        <input type="submit" value="Submit Form">
                        </div>
                        
                    </form>
                </div>                     
        </main>

    </section>
    <script>
        // Get current date and time
        var currentDate = new Date();
        var maxDate = new Date(currentDate);
        // Add 7 days to current date
        maxDate.setDate(maxDate.getDate() + 7);

        // Format current date and time for input value
        var currentDateString = currentDate.toISOString().substring(0, 16);
        var maxDateString = maxDate.toISOString().substring(0, 16);

        // Set min and max attributes for date inputs
        document.getElementById("pickup_time").setAttribute("min", currentDateString);
        document.getElementById("pickup_time").setAttribute("max", maxDateString);
        document.getElementById("dropoff_time").setAttribute("min", currentDateString);
        document.getElementById("dropoff_time").setAttribute("max", maxDateString);

        // Check if the entered date is within the allowed range
        document.getElementById("pickup_time").addEventListener("change", function () {
            var pickupDate = new Date(this.value);
            if (pickupDate < currentDate || pickupDate > maxDate) {
                alert("Please select a date within the next 7 days.");
                this.value = currentDateString;
            }
        });

        document.getElementById("dropoff_time").addEventListener("change", function () {
            var dropoffDate = new Date(this.value);
            if (dropoffDate < currentDate || dropoffDate > maxDate) {
                alert("Please select a date within the next 7 days.");
                this.value = currentDateString;
            }
        });
    </script>

    <script src="../script.js"></script>
    <script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>


</body>
</html>
