<?php
// Start session and include database connection
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
/* Button styling */
.cancel-btn {
        background-color: #007bff; /* Blue color */
        color: #fff; /* White text */
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .cancel-btn:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
    </style>
</head>

<body>
    <!-- Your existing sidebar and dashboard content -->
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
                <a href="student_dashboard.php" class="brand">
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
    <!-- Main content -->
    <main>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <!-- Your existing title -->
                </div>
               
                <?php
                if (isset($_SESSION['username'])) {
                    $email = $_SESSION['username'];
                    $sql_fetch_Ibookings = "SELECT * FROM bookings WHERE username=?";
                    $stmt_fetch_Ibookings = mysqli_prepare($conn, $sql_fetch_Ibookings);

                    if ($stmt_fetch_Ibookings) {
                        mysqli_stmt_bind_param($stmt_fetch_Ibookings, "s", $email);
                        mysqli_stmt_execute($stmt_fetch_Ibookings);
                        $result_fetch_Ibookings = mysqli_stmt_get_result($stmt_fetch_Ibookings);

                        if ($result_fetch_Ibookings && mysqli_num_rows($result_fetch_Ibookings) > 0) {
                            echo "<table>";
                            echo "<tr>";
                            echo "<th>Username</th>";
                            echo "<th>From</th>";
                            echo "<th>To</th>";
                            echo "<th>Date</th>";
                            echo "<th>Vehicle Type</th>";
                            echo "<th>Action</th>"; // New column for cancel button
                            echo "</tr>";

                            while ($row = mysqli_fetch_assoc($result_fetch_Ibookings)) {
                                echo "<tr>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['pickup_location'] . "</td>";
                                echo "<td>" . $row['dropoff_location'] . "</td>";
                                echo "<td>" . $row['booking_date'] . "</td>";
                                echo "<td>" . $row['vehicle_type'] . "</td>";
                                echo "<form method='post' action='delete_internal.php'>";
                                echo "<input type='hidden' name='cancel' value='" . $row['id'] . "'>";
                                echo "<td><button type='submit' class='cancel-btn'>Cancel</button></td>";
                                echo "</form>";

                            }

                            echo "</table>";
                        } else {
                            echo "No bookings found for this user.";
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "User email not found in session.";
                }
                ?>
            </div>
        </div>
    </main>

<script src="../script.js"></script>
<script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>

<!-- JavaScript for cancel button functionality -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener for cancel button click
        $('.cancel-btn').click(function() {
            var bookingId = $(this).data('booking-id');
            if (confirm('Are you sure you want to cancel this booking?')) {
                // AJAX request to delete booking
                $.ajax({
                    url: 'delete_booking.php',
                    type: 'POST',
                    data: { booking_id: bookingId },
                    success: function(response) {
                        // Reload page or update UI as needed
                        location.reload(); // Reload page for simplicity
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting booking: ' + error);
                    }
                });
            }
        });
    });
</script>

<?php
?>

</body>
</html>
