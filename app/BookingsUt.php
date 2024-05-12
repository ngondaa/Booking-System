
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yathu Ija Admin Hub</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<?php
    session_start();
    if(!$_SESSION["logged_in"]){
        header("Location:Admin.php");
        exit();
    }
?>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-hackernews"></ion-icon>
                        </span>
                        <span class="title">YathuIja Opertations Hub</span>
                    </a>
                </li>

                

                <li>
                    <a href="BookingsUt.php">
                        <span class="icon">
                            <ion-icon name="create-outline"></ion-icon>
                        </span>
                        <span class="title">Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="Bus HiringU.php">
                        <span class="icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </span>
                        <span class="title">Bus Hiring</span>
                    </a>
                </li>


                

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

               

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
        

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                <h1>Booking Form</h1>
                        <div class="cardHeader">
                            <form action="BookingsUt.php" method="post">
                            <label for="passenger_name">Passenger Name:</label>
                            <input type="text" id="passenger_name" name="passenger_name" required><br><br>

                            <label for="departure_location">Departure Location:</label>
                            <select id="departure_location" name="departure_location" required>
                            <option value="Balaka">Balaka</option>
                            <option value="Blantyre">Blantyre</option>
                            <option value="Chikwawa">Chikwawa</option>
                            <option value="Chiradzulu">Chiradzulu</option>
                            <option value="Chitipa">Chitipa</option>
                            <option value="Dedza">Dedza</option>
                            <option value="Dowa">Dowa</option>
                            <option value="Karonga">Karonga</option>
                            <option value="Kasungu">Kasungu</option>
                            <option value="Lilongwe">Lilongwe</option>
                            <option value="Machinga">Machinga</option>
                            <option value="Mangochi">Mangochi</option>
                            <option value="Mchinji">Mchinji</option>
                            <option value="Mulanje">Mulanje</option>
                            <option value="Mwanza">Mwanza</option>
                            <option value="Mzimba">Mzimba</option>
                            <option value="Nkhatabay">Nkhatabay</option>
                            <option value="Nkhotakota">Nkhotakota</option>
                            <option value="Nsanje">Nsanje</option>
                            <option value="Ntcheu">Ntcheu</option>
                            <option value="Ntchisi">Ntchisi</option>
                            <option value="Phalombe">Phalombe</option>
                            <option value="Rumphi">Rumphi</option>
                            <option value="Salima">Salima</option>
                            <option value="Thyolo">Thyolo</option>
                            <option value="Zomba">Zomba</option>
                            </select>
                            <br><br>

                            <label for="destination_location">Destination Location:</label>
                            <select id="destination_location" name="destination_location" required>
                            <option value="Balaka">Balaka</option>
                            <option value="Blantyre">Blantyre</option>
                            <option value="Chikwawa">Chikwawa</option>
                            <option value="Chiradzulu">Chiradzulu</option>
                            <option value="Chitipa">Chitipa</option>
                            <option value="Dedza">Dedza</option>
                            <option value="Dowa">Dowa</option>
                            <option value="Karonga">Karonga</option>
                            <option value="Kasungu">Kasungu</option>
                            <option value="Lilongwe">Lilongwe</option>
                            <option value="Machinga">Machinga</option>
                            <option value="Mangochi">Mangochi</option>
                            <option value="Mchinji">Mchinji</option>
                            <option value="Mulanje">Mulanje</option>
                            <option value="Mwanza">Mwanza</option>
                            <option value="Mzimba">Mzimba</option>
                            <option value="Nkhatabay">Nkhatabay</option>
                            <option value="Nkhotakota">Nkhotakota</option>
                            <option value="Nsanje">Nsanje</option>
                            <option value="Ntcheu">Ntcheu</option>
                            <option value="Ntchisi">Ntchisi</option>
                            <option value="Phalombe">Phalombe</option>
                            <option value="Rumphi">Rumphi</option>
                            <option value="Salima">Salima</option>
                            <option value="Thyolo">Thyolo</option>
                            <option value="Zomba">Zomba</option>
                            </select>
                        </select>
                            <br><br>

                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" required><br><br>

                            <label for="time">Time:</label>
                            <input type="time" id="time" name="time" required><br><br>

                            <label for="age">Age:</label>
                            <input type="number" id="age" name="age" required><br><br>
                                
                            <label for="contactNumber">Contact Number:</label>
                            <input type="text" id="contactNumber" name="contactNumber" required><br><br>
                            
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="Email" required><br><br>

                            <label for="seats_booked">Number of seats booked:</label>
                            <input type="number" id="seats_booked" name="seats_booked" required><br><br>

                            <label>Are you a student?</label><br>
                                <input type="radio" id="yes" name="student_status" value="yes" required>
                                <label for="yes">Yes</label><br>
                                <input type="radio" id="no" name="student_status" value="no" required>
                            <label for="no">No</label><br><br>
                            

                            <label for="payment_method">Payment Method:</label>
                            <select id="payment_method" name="payment_method" required>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="mobile_money">Mobile Money</option>
                            </select><br><br>

                            <input type="submit" name="submit" value="submit">
                            
                        </form>
<?Php
    if(isset($_POST["submit"])){
    $passenger_name= $_POST["passenger_name"];
    $departure_location=$_POST["departure_location"];
    $destination_location=$_POST["destination_location"];
    $_date=$_POST["date"];
    $_time=$_POST["time"];
    $age=$_POST["age"];
    $contactNumber=$_POST["contactNumber"];
    $email=$_POST["Email"];
    $payment_method=$_POST["payment_method"];


    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="yathu_db (1)";

    $conn="";
    $conn=mysqli_connect($db_host,  $db_user, $db_pass, $db_name);
    if($conn){
        echo "you are connected";
    }else{
        die("cant  connect"); 
    }
                            
        $fare = 0; 
        $payment_status = "pending"; 
                            
        $sql = "INSERT INTO Booking (passenger_name, departure_location, destination_location, _date, _time,age,contactNumber,email, payment_method) 
        VALUES ('$passenger_name', '$departure_location', '$destination_location', '$_date', '$_time', '$age','$contactNumber','$email', '$payment_method')";
                            
        if (mysqli_query($conn, $sql)){
            header("Location: distance_fare_calculation.php?source=ticket.php&departure_location=$departure_location&destination_location=$destination_location&age=$age");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
                            
         mysqli_close($conn);
                            
        }
                            
?>
                        <a href="#" class="btn">View All</a>
                    </div>


                </div>

            

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>