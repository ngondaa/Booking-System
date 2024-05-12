<?php
session_start();
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
                <a href="#.php" class="brand">
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
        <main><br><br>
        <br>
    
        <div class="dash-content ">
            <div class="overview ">
                <div class="title ">
                    <i class="uil uil-tachometer-fast-alt "></i>
                    <span class="text ">BOOKING DASHBOARD</span>
                </div>

                <div class="boxes ">
                    <div class="box box1 ">
                        <i class="uil uil-chart "></i>
                        <a href="makebookings.php "><span class="text "> Make Bookings</span></a>
                    </div><br>
                    <br><div></div>
                    <div class="box box2 ">
                        <i class="uil uil-chart "></i>
                       <a href="Student_bookings.php"><span class="text ">View Bookings</span></a> 
                    </div><br><br><div></div>
                    <div class="box box3 ">
                        <i class="uil uil-files-landscapes "></i>
                        <a href="cancel.php"><span class="text ">Cancel Bookings</span></a>
                    </div><br><br>

                    
                </div>
                
            </div>
        </div>
        </main>

    
<script src="../script.js"></script>
<script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>


</body>
</html>