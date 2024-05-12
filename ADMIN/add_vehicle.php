<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | Add Vehicle Form</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="fleet.css">

    
</head>
<?php include_once("db_connect.php")?>
<?php include_once("add_vehicle_process.php")?>


<body>
   <!-- SIDEMENU-->
   <section id="sidebar">
        <a href="#" class="brand">
            <i class="sidebar-icon"><img src="../Images/must logo.png"></i>
            <span class="text">Booking System</span>
        </a>

        <ul class="side-menu top">

            <li>
                <a href="dashboard.php" class="brand">
                    <i class=" fa fa-solid fa-table-cells-large"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li>
            <a href="bookings.php" class="brand">
                <i class=" fa fa-solid fa-calendar-days"></i>

                <span class="text">Bookings</span>
            </a>
            </li>


            <li class="active">
                <a href="fleet.php" class="brand">
                    <i class=" fa fa-solid fa-car"></i>

                    <span class="text">Fleet</span>
                </a>
            </li>

            <li>
                <a href="drivers.php" class="brand">
                    <i class=" fa fa-solid fa-user-tie"></i>

                    <span class="text">Drivers</span>
                </a>
            </li>

            <li>
                <a href="../app/review1.php" class="brand">
                    <i class=" fa fa-solid fa-chart-simple"></i>

                    <span class="text">Review</span>
                </a>
            </li>

            <li>
                <a href="../app/comments.php" class="brand">
                    <i class="fa fa-solid fa-user"></i>

                    <span class="text">Comments</span>
                </a>
            </li>

            <li>
                <a href="../app/logout.php" class="brand">
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
                    <button type="submit" class="search-btn"><i class="fa fa-magnifying-glass"></i></button>
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
        <h1> Add a Vehicle To the Fleet</h1>

                <div class="form-container">
                    <form action="add_vehicle_process.php" method="POST">
                        <div class="form-group">
                            <label for="vehicle_license_plate">License Plate:</label>
                            <input type="text" id="vehicle_license_plate" name="registration_number" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_make">Vehicle Make:</label>
                            <input type="text" id="vehicle_make" name="make" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_model">Vehicle Model:</label>
                            <input type="text" id="vehicle_model" name="model" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_year">Vehicle Year:</label>
                            <input type="number" id="vehicle_year" name="year_of_make" min="1900" max="2099" step="1" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="vehicle_mileage">Mileage:</label>
                            <input type="number" id="vehicle_mileage" name="mileage" min="0" step="1" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_capacity">Capacity:</label>
                            <input type="number" id="vehicle_capacity" name="capacity" min="0" step="1" required>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_condition">Vehicle Condition:</label>
                            <select id="vehicle_condition" name="vehicle_condition" required>
                                <option value="">Select Condition</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                            </select>
                        </div>
                        <div class=".stats-container">
                        <input type="submit" value="Add Vehicle">
                        <button>Back</button>
                        </div>
                    </form>
                </div>                     
        </main>

<script src="../script.js"></script>
<script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>

</body>
</html>