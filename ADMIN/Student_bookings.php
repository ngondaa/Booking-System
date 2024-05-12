

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
    <link rel="stylesheet" href="../CSSW/style.css">
    <style>
        /* CSS for the table */
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

/* Hover effect on table rows */
tr:hover {
    background-color: #f5f5f5;
}

/* Alternate row color */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

    </style>
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
                <a href="#" class="brand">
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
                <a href="logout.php" class="brand">
                    <i class="fa fa-solid fa-right-from-bracket"></i>
                    
                    <span class="logout">Logout</span>
                </a>
            </li>

        </ul>
    </section>

    <!--Dashboard-->
    <div id="content">
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
                    <i class="uil uil-tachometer-fast-alt "></i>
                    <span class="text ">USER  BOOKINGS</span>
                </div>
               
                <?php
if (isset($_SESSION['username'])) {
    // Prepare statement to fetch all data from the bookings table
    $sql_fetch_bookings = "SELECT * FROM bookings";
    $result_fetch_bookings = mysqli_query($conn, $sql_fetch_bookings);

    if ($result_fetch_bookings) {
        if (mysqli_num_rows($result_fetch_bookings) > 0) {
            // Display table header
            echo "<table>";
            echo "<tr>";
            echo "<th>Username</th>";
            echo "<th>From</th>";
            echo "<th>To</th>";
            echo "<th>Date</th>";
            echo "<th>Vehicle Type</th>";
            echo "</tr>";

            // Fetch and display the retrieved data
            while ($row = mysqli_fetch_assoc($result_fetch_bookings)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['pickup_location'] . "</td>";
                echo "<td>" . $row['dropoff_location'] . "</td>";
                echo "<td>" . $row['booking_date'] . "</td>";
                echo "<td>" . $row['vehicle_type'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No bookings found.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "User email not found in session.";
}

// Close connection
mysqli_close($conn);
?>

    
        </main>

    </section>    

    
<script src="../script.js"></script>
<script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>

</body>
</html>