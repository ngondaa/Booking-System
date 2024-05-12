<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | Home</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
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
                <a href="../ADMIN/dashboard1.php" class="brand">
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
                    <button type="submit" class="search-btn"><img src="../icons/magnifying-glass.png" class="sidebar-icon"></button>
                </div>
            </form>
            
            <a href="../app/comments.php" class="notification">
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
        <h1> Welcome to the ADMIN Dashboard</h1>
        
            <section class="stats-container">
                <div class="stat-box grid-container">
                    <div>
                    <i class="fa fa-solid fa-users fa-3x"></i>
                    </div>

                    <div>
                        <p> 
                            <?php 
                                $admin_sql = "SELECT * from users";
                                $admin_result = mysqli_query($conn,$admin_sql);

                                // display  find number of users
                                $number_of_users = mysqli_num_rows($admin_result);
                                echo $number_of_users;
                            ?>
                        </p>
                        <h2>Users</h2>
                        <h2>
                        <a href="../pdfgeneration/userspdf.php" style="text-decoration:none;" class="action" >
                            <button id="generateBtn" >
                                Generate
                            </button>
                        </a>
                        </h2>
                    </div>         
                </div>                        
              
                <div class="stat-box grid-container">
                    <div>
                    <i class="fa fa-solid fa-car fa-3x"></i>
                    </div>
                   
                    <div>
                        <p> 
                            <?php 
                                $admin_sql = "SELECT * from vehicle";
                                $admin_result = mysqli_query($conn,$admin_sql);

                                // display  find number of users
                                $number_of_vehicles = mysqli_num_rows($admin_result);
                                echo $number_of_vehicles;
                            ?>
                        </p>
                        <h2>Vehicles</h2>
                        <h2>
                        <a href="../pdfgeneration/vehiclesPDF.php" style="text-decoration:none;" class="action" >
                            <button id="generateBtn" >
                                Generate
                            </button>
                        </a>
                        </h2>
                    </div>         
                </div>                        
              
                <div class="stat-box grid-container users">
                    <div>
                    <i class="fa fa-solid fa-user-tie fa-3x"></i>
                    </div>

                    <div>
                        <p> 
                            <?php 
                                $admin_sql = "SELECT * from drivers";
                                $admin_result = mysqli_query($conn,$admin_sql);

                                // display  find number of users
                                $number_of_drivers = mysqli_num_rows($admin_result);
                                echo $number_of_drivers;
                            ?>
                        </p>
                        <h2>Drivers</h2>
                        <h2>
                        <a href="../pdfgeneration/DriverPDF.php" style="text-decoration:none;" class="action" >
                            <button id="generateBtn" >
                                Generate
                            </button>
                        </a>
                        </h2>
                    </div>         
                </div>                        
              
                <div class="stat-box grid-container">
                    <div>
                    <i class="fa fa-solid fa-calendar-days fa-3x"></i>
                    </div>

                    <div>
                        <p> 
                            <?php 
                                $admin_sql = "SELECT * from bookings";
                                $admin_result = mysqli_query($conn,$admin_sql);

                                // display  find number of users
                                $number_of_bookings = mysqli_num_rows($admin_result);
                                echo $number_of_bookings;
                            ?>
                        </p>
                        <h2>Bookings</h2>
                        <h2>
                        <a href="userspdf.php" style="text-decoration:none;" class="action" >
                            <button id="generateBtn" >
                                Generate
                            </button>
                        </a>
                        </h2>
                    </div>         
                </div>                        
              </section>
        </main>

    </section>
<script src="../script.js"></script>
<script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>

</body>
</html>