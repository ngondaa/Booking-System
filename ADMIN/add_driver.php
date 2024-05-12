<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | Add Driver Form</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="fleet.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }

    form {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="number"],
    input[type="file"],
    select {
        width: calc(100% - 12px);
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 12px 0;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    #response {
        margin-top: 10px;
        color: #333;
    }
</style>
    
</head>
<?php include_once("db_connect.php")?>
<?php include_once("add_driver_process.php")?>

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
            <a href="Student_booking.php" class="brand">
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
        <h1> Add a Driver To the Team</h1>

        <form action="add_driver_process.php" method="POST">

                    <label for="fname">Driver Firstname:</label>
                    <input type="text" id="fname" name="fname" required><br>
                    <label for="sname">Driver Surname:</label>
                    <input type="text" id="sname" name="sname" required><br>
                    <label for="dob">Date of Birth:</label><br>
                    <input type="date" id="DoB" name="dob" min="1964-01-01" max="2000-01-01" required>
                    <br>
                    <br>
                    <label for="contact-number">Contact Number:</label>
                    <input type="text" id="contact-number" name="contact_number" pattern="[0-9]{10}"
                        placeholder="Enter 10-digit phone number" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>
                    <label for="license-number">License Number:</label>
                    <input type="text" id="license-number" name="license_number" required><br>
                    <label for="license_type">License Type:</label>
                    <select name="license_type" id="license_type">
                        <option value="A">Class A</option>
                        <option value="B">Class B</option>
                        <option value="C">Class C</option>
                        <option value="D">Class D</option>
                        <option value="E">Class E</option>
                    </select>
                    <label for="expiration-date">Expiration Date:</label>
                    <input type="date" id="expiration-date" name="expiration_date" required><br>
                    <label for="certification">Certification:</label>
                    <select name="certification" id="certification">
                        <option value="COF">Certificate Of Fitness (COF)</option>
                        <option value="Medical">Medical Fitness Certificate</option>
                        <option value="Defense">Defense Driving Course Certificate</option>
                        <option value="FirstAid">First Aid Training Certificate</option>
                    </select>

                    <label for="accidents">Accidents:</label>
                    <input type="number" id="accidents" name="accidents"><br>
                    <label for="violations">Violations:</label>
                    <input type="number" id="violations" name="violations"><br>
                    <label for="Profile">Upload Profile Picture:</label>
                    <input type="file" id="image" name="image" required accept="image/*">
                    <p id="response"></p>
                    <input type="submit" value="Submit">
                    
                </form>
            </form>
    </section>
    </main>
    </section>
    <script src="../script.js"></script>
    <script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>
</body>
</html>

