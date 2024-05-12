<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS login</title>
    <link rel="stylesheet" href="style.css">

</head>
<?php
session_start(); // Start the session
?>
<?php include_once("db_connect.php")?>
<body>

    <div class="container">
            <a href="../product/index.html"><h1><img src="assets/logo.png"></h1></a>
        <br>
        <form class="loginform" method="post" action="#" onsubmit="return checkPassword()">

            <div class="input-group">
                <label class="label">Firstname</label>
                <input autocomplete="off" name="firstname" id="username" class="input" type="text" minlength="3" required>
            
            </div>
            <div class="input-group">
                <label class="label">Lastname</label>
                <input autocomplete="off" name="lastname" id="username" class="input" type="text" minlength="3" required>
            
            </div>

            <div class="input-group">
                <label class="label">Email</label>
                <input autocomplete="off" name="username" id="username" class="input" type="email" minlength="8" required>
            
            </div>
            <div class="input-group">
                <label class="label">Password</label>
                <input autocomplete="off" name="password" id="password" class="input" type="password" minlength="8" required>

            </div>
            <div class="input-group">
                <label class="label">Confirm Password</label>
                <input autocomplete="off" name="Password" id="Password" class="input" type="password"  minlength="8" required>

            </div>
            <a href="login.php">Already have account</a>
            <br><br>
            <button type="submit" name="submit" class="button">
                Register
                <span class="button-span"> </span>
              </button>
              
        </form>

    </div> 
    
    <?php 
        if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["firstname"]) && isset($_POST["lastname"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $lastname = $_POST["lastname"];
            $firstname = $_POST["firstname"];

            //hash password that user has give us 
            //password_hash is function used to hash arguments
            //PASSWORD_DEFAULT is the algorithm to be used
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Check if username already exists
            $check_username_query = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($check_username_query);

                if($result->num_rows > 0) {
                echo '<script>alert("Jokes on you,Username already exists. ");</script>';
                }else{

                    
                    // adding user details
                    //we store users hashed password for security 
                    $sql_add_student = "INSERT INTO users (username,password,firstname,lastname) 
                                        VALUES ('$username', '$hashed_password','$firstname','$lastname')";
                    // query performs action on DB in this case we're insert into values 
                    // if conn is established                   
                    if($conn->query($sql_add_student) === true){
                        //creating session of user and redirecting him to homepage
                        $_SESSION['username'] = $username;
                        header("Location: ../USERS/dashboard.php");
                    } else{
                        echo "<script>alert('Damn cant add student hopefully you dont see this.');</script>";
                    }
                }
        }
    ?>


    <script>
        //function making sure Confirm password matches initial one
            function checkPassword() {
                // the difference is one is capitalized yes lazy naming but aye works
            var password = document.getElementById("password").value;
            var Password = document.getElementById("Password").value;
                //if no match returns
            if (password !== Password) {
                alert("Passwords do not match!");
                return false; // wont be able to submit
            }
            
            return true; // Allow submit
            }

</script>
</body>
</html>