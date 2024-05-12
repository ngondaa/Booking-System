<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | Home</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<?php include_once ("db_connect.php") ?>
<?php include_once ("stats.php") ?>

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

        <!-- MAIN-->
        <main>
            <h1> Driver Management</h1>

            <section class="stats-container">
                <a href="add_driver.php">
                    <div class="stat-box grid-container">
                        <div>
                            <i class="fa fa-solid fa-plus fa-3x"></i>
                        </div>

                        <div>
                            <h2>Add Driver</h2>
                        </div>

                    </div>
                </a>
                <a href="view_drivers.php">
                    <div class="stat-box grid-container">
                        <div>
                            <i class="fa fa-solid fa-eye fa-3x"></i>
                        </div>

                        <div>
                            <h2>View Drivers</h2>
                        </div>
                    </div>
                </a>


            </section>
        </main>

    </section>
    <script src="../script.js"></script>
    <script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>

</body>

</html>