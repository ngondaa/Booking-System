<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | View Drivers</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="fleet.css">
<style>
    .form-container {
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 1000px;
    overflow-x: auto; /* Add horizontal scrolling for smaller screens */
}

.driver-table {
    width: 100%;
    border-collapse: collapse;
}

.driver-table th,
.driver-table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

.driver-table th {
    background-color: #CECECE;
    color: black;
}

.driver-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.driver-table tbody tr:hover {
    background-color: #ddd;
}

</style>
</head>

<?php 
// Include database connection code
include_once("db_connect.php");

// Fetch drivers from the database
$sql = "SELECT * FROM drivercredentials"; // Update table name to drivercredentials
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$drivers = [];
while ($row = $result->fetch_assoc()) {
    $drivers[] = $row;
}
?>

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


           <li>
                <a href="fleet.php" class="brand">
                    <i class=" fa fa-solid fa-car"></i>

                    <span class="text">Fleet</span>
                </a>
            </li>

            <li class="active">
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
       

        <!-- MAIN-->
        <main>
        <h1>View the Drivers</h1>

<div class="form-container">
    <table class="driver-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>License Number</th>
                <th>License Type</th>
                <th>Expiration Date</th>
                <th>Certifications</th>
                <th>Accidents</th>
                <th>Violations</th>
                <th>Profile Picture</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drivers as $driver) : ?>
                <tr>
                    <td><?php echo $driver['fname']; ?></td>
                    <td><?php echo $driver['sname']; ?></td>
                    <td><?php echo $driver['dob']; ?></td>
                    <td><?php echo $driver['contact_number']; ?></td>
                    <td><?php echo $driver['email']; ?></td>
                    <td><?php echo $driver['license_number']; ?></td>
                    <td><?php echo $driver['license_type']; ?></td>
                    <td><?php echo $driver['expiration_date']; ?></td>
                    <td><?php echo $driver['certifications']; ?></td>
                    <td><?php echo $driver['accidents']; ?></td>
                    <td><?php echo $driver['violations']; ?></td>
                    <td><?php echo $driver['profile_picture']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

        </main>

        <script src="../script.js"></script>
        <script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>
    </section>
</body>
</html>
