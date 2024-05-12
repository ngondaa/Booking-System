<?php

session_start();

include_once("../Dao/db_connect.php");

if (isset($_POST["dr"])) {
    // Assuming $feedback is defined in Feedback.php
    $feedback->deleteReview($_POST["dr"]);
    unset($_POST["dr"]);
}

// Logout functionality
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: ../login/login.php"); // Redirect to the login page after logout
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS | contact</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<?php include_once("../Dao/db_connect.php")?>
<?php
if (isset($_SESSION['username'])) {
    // Write User name on top left corner if user is logged in
    echo "";
} else {
    // display an anchor tag referring to login page if user is not logged in
    echo "";
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
            
            <li class="active">
                <a href="../ADMIN/dashboard.php" class="brand">
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
            
            <a href="reviews1.php" class="notification">
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
            
        </nav>

        <!-- MAIN-->
        <main>
        <hr>
        <div class="col-12 ">
                
        <div class="col-3">
        <p></p>
         </div>
            <div class="col-6 contact centerText white">
                <h1>Contact Us</h1>
                <p>
                Please use this form to send your reviews. <br> 
                Be informed that your review will be publicly viewed.
                </p>
                <p id="response"></p>
                <!-- Form to enter user review-->
                    <form action="#" method="POST">
                            <?php
                            if(!isset($_SESSION["user_id"])){
                                
                                echo "<h4>Please log in to send feedback</h4>";
                            }
                            ?>
                        <textarea name="review" placeholder="Your Message" cols="80" rows="25" required></textarea>
                        <br>
                        <input type="submit" class="AdvertButton" value="Send">
                    </form>
            </div>
    </div>
        <?php
        //import feedback.php to call method to insert review
        include "Feedback.php";
        //below code will only run when form is submitted and "insertReview" is assigned
        if(isset($_POST["review"])){
        //insert review
        if(strlen($_POST['review'])<=10000){
            $feedback->addReview($_SESSION['username'],$_POST['review']);
            unset($_POST["review"]);
            }
            else{
                echo "<script> alert('Review length is too long');</script>";
            }
        }
        ?>
                        
                </div>
        </main>

    </section>
<script src="../css/script.js"></script>
<script src="../script.js"></script>
<script src="https://kit.fontawesome.com/8d6207a512.js" crossorigin="anonymous"></script>

</body>
</html>