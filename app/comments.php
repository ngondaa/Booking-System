<?php
session_start(); // Start the session
if(isset($_POST["username"])){
    $username = $_POST["username"];
    $_SESSION['username'] = $username;
}

?>

<?php

include_once("Feedback.php");

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
    header("Location: ../../../login/login.php"); // Redirect to the login page after logout
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
<?php
if (isset($_SESSION['username'])) {
    // Write User name on top left corner if user is logged in
    echo "";
  }  
  else{
    // display an anchor tag referring to login page if user is not logged in
      echo "";
  }  

 

  if(isset($_POST["dr"])){
 
    $feedback->deleteReview($_POST["dr"]);
    unset($_POST);
  
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
                <a href="../ADMIN/Student_bookings.php" class="brand">
                    <i class=" fa fa-solid fa-calendar-days"></i>
                    
                    <span class="text">Bookings</span>
                </a>
            </li>

            <li>
                <a href="../ADMIN/fleet.php" class="brand">
                    <i class=" fa fa-solid fa-car"></i>
                    
                    <span class="text">Fleet</span>
                </a>
            </li>

            <li>
                <a href="../ADMIN/drivers.php" class="brand">
                <i class=" fa fa-solid fa-user-tie"></i>
                    
                    <span class="text">Drivers</span>
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
            
        </nav>

        <!-- MAIN-->
        <main>
        <p id="deletion"></p>
        <div class="container">
                    
                    <h1 class='col-12 centerText'>Reviews</h1>
                    <p id="deletion"></p>
                    
                    <?php 
                    
                    $answers=$feedback->loadReviews("*");
                    
                    if ($answers->num_rows > 0) {
                        //output data of each row
                        while($row = $answers->fetch_assoc()) {
                        echo "<div class='col-3 centerText advert'><p><strong>#".$row['userName']."</strong></p><p>" . $row["review"]."</p>";
                    if(isset($_SESSION["username"])){
                        if($row['userName']===$_SESSION["username"]){
                    echo "  <p>  <form method='POST' action='#'>
                    <input type='text' name='dr' value='".$row["reviewID"]."' hidden>
                    <input type='submit' class='AdvertButton' value='Delete'>
                    </form></p>";}
                    }
                    
                    echo "</div>";
                    echo "<p id='deletion'></p>";                    
                    
                    }
                        } else {
                        echo "<h3 class='col-12 centerText'>0 reviews found</h3>";
                        echo "<h4 class='col-12 centerText'>To make a review go to <a href='contact.php'>Contact Us</a> page</h4>";
                        
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