<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TBIS login</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/Javascript">
        function preventBack() {
            window.history.forward()};
        setTimeout(("preventBack()",0);
        window.onload=function(){null;}
        
    </script>
</head>
<?php include_once("db_connect.php")?>
<body>

    <div class="container">
            <a href="../product/index.html"><h1><img src="assets/logo.png"></h1></a>
        <h4 style="color:black;" style="padding-left:20px; color:darkblue;">MUST TRANSPORT BOOKING </h4>
        <br>
        <form class="loginform" method="post" action="login.php">
            <div class="input-group">
                <label class="label">Email</label>
                <input autocomplete="off" name="username" id="username" class="input" type="email" required>
            
            </div>
            <div class="input-group">
                <label class="label">Password</label>
                <input autocomplete="off" name="password" id="password" class="input" type="password" required>

            </div>
            <a href="signup.php">Create new account</a>
            <p id="wrongp"></p>
            <br><br>
            <button type="submit" name="submit" class="button">
                Get started
                <span class="button-span"> </span>
            </button>
        </form>
    </div> 
    
    <?php
    // Check if username and password are provided
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        //im guessing we hash the password again here
        $input = $password;
        //i guess yes

        // authentication logic here 
        //? serves as place holder
        $sql = "SELECT * FROM users WHERE username = ?";
        //why a stament has to be prepared basically since we use a placeholder we arent 
        //executing in it yet so calm. prepaired if db conn is established
        $stmt = $conn->prepare($sql);
        //attaches username to $sql_statement or query basically placeholder part
        $stmt->bind_param("s", $username);
        //self explanotory finally executes it in what sequence?? 
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // direct to different pages based of user type
            // Compare the stored password with the entered password
            //compare with hashed password lets see\
            if(password_verify($input, $row["password"])) {
                // Authentication successful, set session variable and redirect
                $_SESSION['username'] = $username;
                    if ($row["usertype"] == "admin") {
                        header("Location: ../ADMIN/dashboard.php");
                    } else {
                        header("Location: ../USERS/dashboard.php");
                    }
                
                exit;
            } else {
                // Authentication failed, display an error message
                // This is in the PHP file and sends a Javascript alert to the client
                //$message = "yikes wrong password try again";
                echo "<script type='text/javascript'>
                var message = 'yikes wrong password try again';
                var popup = document.createElement('div');
                popup.innerHTML = message;
                popup.setAttribute('style', ' color: red;');
                
                var targetElement = document.getElementById('wrongp');
                wrongp.appendChild(popup);
                </script>";
            }
        } else {
            // User does not exist
            // This is in the PHP file and sends a Javascript alert to the client
            //$message = "USER DOES NOT EXIST";
            echo "<script type='text/javascript'>
            var message = 'USER DOES NOT EXIST';
            var popup = document.createElement('div');
            popup.innerHTML = message;
            popup.setAttribute('style', ' color: red;');
            
            var targetElement = document.getElementById('wrongp');
            wrongp.appendChild(popup);
            </script>";
        }
    } else {
        // Display an error message if username or password is missing
        // This is in the PHP file and sends a Javascript alert to the client
    }
    ?>
</body>
</html>
