<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<?php include_once ("db_connect.php") ?>


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

            <li class="active">
                <a href="bookings.php" class="brand">
                    <i class=" fa fa-solid fa-calendar-days"></i>

                    <span class="text">Bookings</span>
                </a>
            </li>

            <li>
                <a href="fleet.php" class="brand">
                    <i class=" fa fa-solid fa-car"></i>

                    <span class="text">Fleet</span>
                </a>
            </li>

            <li>
                <a href="#" class="brand">
                    <i class=" fa fa-solid fa-user-tie"></i>

                    <span class="text">Drivers</span>
                </a>
            </li>



            <li>
                <a href="#" class="brand">
                    <i class="fa fa-solid fa-comments"></i>

                    <span class="text">Message</span>
                </a>
            </li>


            <li>
                <a href="reviews.php" class="brand">
                    <i class="fa fa-solid fa-copy"></i>

                    <span class="text">Reviews</span>
                </a>
            </li>

            <li>
                <a href="../login/login.php" class="brand">
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
                            <button type="submit" class="search-btn"><img src="../icons/magnifying-glass.png"
                                    class="sidebar-icon"></button>
                        </div>
                    </form>

                    <a href="#" class="notification">
                        <i class="sidebar-icon"><img src="../icons/bell.png"></i>
                        <span class="num">8</span>
                    </a>
                    <a href="#" class="profile">
                        <img src="../icons/user.png">
                    </a>

                </nav>





                <div class="container">
                    <button type="button" class="btn" onclick="openPopup()">CREATE BOOKING</button>

                    <div class="popup" id="popup">
                        <div class="close-btn">&times;</div>


                        <div class="form">
                            <h2> YOUR BOOKING</h2>
                            <p>Please specify your details</p>


                            <form action="#" method="POST">

                                        <div class="form-element">
                                                <label for="id">ID/RegNo:</label>
                                                <input type="text" id="alphanumericInput" name="id" Required>
                                        </div>

                                        <div class="form-element">
                                                            <label for="pickup">Pick-up Location:</label>
                                                            <input type="text" id="_pickup" name="pickup" Required>
                                        </div>

                                        <div class="form-element">
                                                            <label for="dropoff">Drop-off Location:</label>
                                                            <input type="text" id="_dropoff" name="dropoff" Required>
                                        </div>

                                    <div class="form-element">
                                                            <label for="pickup_time">Pick-up Time:</label>
                                                            <input type="datetime-local" id="pickup_time" name="pickup_time" required>
                                        </div>

                                    <div class="form-element">
                                                            <label for="dropoff_time">Drop-off Time:</label>
                                                            <input type="datetime-local" id="dropoff_time" name="dropoff_time" required>
                                        </div>


                                    <div class="form-element">
                                                                    <label for="status">Current_Status:</label>
                                                                    <select id="status" name="current_status">
                                                                        <option value="Scheduled">Scheduled</option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="Cancelled">Cancelled</option>
                                                                    </select>
                                        </div>  
                                        <input type="submit" name="submit" value="submit">

                            </form> 
<?php include_once("db_connect.php")?>
<?php
// Assuming $conn is your database connection

// Check if all required fields are set
if(isset($_POST["id"]) && isset($_POST["pickup"]) && isset($_POST["dropoff"]) && isset($_POST["pickup_time"]) && isset($_POST["dropoff_time"]) && isset($_POST["current_status"])) {
    $id = $_POST["id"];
    $pickup = $_POST["pickup"];
    $dropoff = $_POST["dropoff"];
    $pickup_time = date('Y-m-d H:i:s', strtotime($_POST["pickup_time"])); // Format datetime
    $dropoff_time = date('Y-m-d H:i:s', strtotime($_POST["dropoff_time"])); // Format datetime
    $current_status = $_POST["current_status"];

    // Prepare SQL statement with placeholders
    $sql_add_booking = "INSERT INTO bookings (id, pickup, dropoff, pickup_time, dropoff_time, current_status) 
                        VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql_add_booking);
    $stmt->bind_param("ssssss", $id, $pickup, $dropoff, $pickup_time, $dropoff_time, $current_status);

    // Execute the statement
    if($stmt->execute()) {
        // Redirect user upon successful submission
        header("Location: ../ADMIN/dashboard1.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        // Handle database error
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

                        </div>
                
                    
                    </div>
                </div>

            



    </section>
    <script src="script.js"> </script>
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
    document.getElementById("pickup_time").addEventListener("change", function() {
        var pickupDate = new Date(this.value);
        if (pickupDate < currentDate || pickupDate > maxDate) {
            alert("Please select a date within the next 7 days.");
            this.value = currentDateString;
        }
    });

    document.getElementById("dropoff_time").addEventListener("change", function() {
        var dropoffDate = new Date(this.value);
        if (dropoffDate < currentDate || dropoffDate > maxDate) {
            alert("Please select a date within the next 7 days.");
            this.value = currentDateString;
        }
    });
</script>
    <script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>
</body>

</html>