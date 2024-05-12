

<?php
session_start();
include_once('db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/script.js "></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Admin Dashboard Panel</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            color: rgba(0, 0, 0, 1);
            text-decoration: none;
        }
    </style>
</head>

<body>
<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="images/must.jpg" alt="">
        </div>
        <span class="logo_name">TBIS</span>
    </div>
    <div class="menu-items">
        <ul class="nav-links">
            <li>
                <i class="uil uil-estate"></i>
                <a href="dashboard.php"><span class="link-name">Dahsboard</span></a>
            </li>
            <li class="has-children ">
                <a href=" # ">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Driver Management</span><i class="fa fa-angle-right arrow "></i>
                </a>
                <ul class=" child-nav ">
                    <li><a href="driver_info.php"><i class="fa fa-bars "></i>Manage Drivers<span></span></a></li>
                    <li><a href="Drivers.php"><i class="fa fa-bars "></i>Add Drivers<span></span></a></li>
                </ul>
            </li>
            <li class="has-children ">
                <a href=" # ">
                    <i class="uil uil-files-landscapes "></i>
                    <span class="link-name ">Booking Management</span><i class="fa fa-angle-right arrow "></i>
                </a>
                <ul class="child-nav ">
                    <li><a href="Bookings.php"><i class="fa fa fa-server "></i> <span>Manage Bookings</span></a></li>
                </ul>
            </li>
            <li class="has-children ">
                <a href=" # ">
                    <i class="uil uil-chart "></i>
                    <span class="link-name ">Fleet Management</span><i class="fa fa-angle-right arrow "></i></a>
                <ul class="child-nav ">
                    <li><a href="Fleet.php "><i class="fa fa-bars "></i> <span>Add Vehicles</span></a></li>
                    <li><a href="fleet_info.php"><i class="fa fa fa-server "></i> <span>Manage Vehicles</span></a></li>
                </ul>
            </li>
            <li class="has-children ">
                <a href="# ">
                    <i class="uil uil-files-landscapes "></i>
                    <span class="link-name ">User Management</span><i class="fa fa-angle-right arrow "></i>
                </a>
                <ul class="child-nav ">
                    <li><a href="User.php "><i class="fa fa fa-server "></i> <span>Manage Users</span></a></li>
                </ul>
            </li>
        </ul>
        <ul class="logout-mode ">
            <li>
                <a href="Logout.php ">
                    <i class="uil uil-signout "></i>
                    <span class="link-name ">Logout</span>
                </a>
            </li>
            <li class="mode ">
                <a href="# ">
                    <i class="toggle-icon"></i>
                    <span class="link-name ">Dark Mode</span>
                </a>
                <div class="mode-toggle ">
                    <span class="switch "></span>
                </div>
            </li>
        </ul>
    </div>
</nav>
<section class="dashboard ">
    <div class="top ">
        <i class="uil uil-bars sidebar-toggle "></i>
    </div>
    <div class="dash-content ">
        <div class="overview ">
            <div class="title ">
                <i class="uil uil-tachometer-fast-alt "></i>
                <span class="text ">Internal Bookings</span>
            </div>
            <div>
                <?php
                // Fetch all bookings from the internal_bookings table
                $sql_fetch_Ibookings = "SELECT * FROM interna_bookings";
                $result_fetch_Ibookings = mysqli_query($conn, $sql_fetch_Ibookings);
                if ($result_fetch_Ibookings && mysqli_num_rows($result_fetch_Ibookings) > 0) {
                    // Display table header
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Email</th>";
                    echo "<th>User Type</th>";
                    echo "<th>Route</th>";
                    echo "<th>Date</th>";
                    echo "<th>Vehicle Type</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";

                    // Fetch and display the retrieved data
                    while ($row = mysqli_fetch_assoc($result_fetch_Ibookings)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['EMAIL']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['USER_TYPE']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ROUTE']) . "</td>";
                        echo "<td>" . date("Y-m-d", strtotime($row['DATE'])) . "</td>";
                        echo "<td>" . htmlspecialchars($row['V_TYPE']) . "</td>";
                        echo "<td>
                        <form id='deleteForm' method='post' action='delete_internal.php' onsubmit='return confirmDelete()'>
                        <input type='hidden' name='delete_booking' value='" . $row['ID'] . "'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    
                                </td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No bookings found.";
                }
                ?>
            </div>
        </div>
    </div>
</section>
<script>
function confirmDelete() {
            return confirm("Are you sure you want to delete this booking?");
        }

</script>
</body>
</html>
