<?php include_once("db_connect.php")?>
<?php
// Assuming $conn is your database connection

// Check if all required fields are set
if(isset($_POST["id"]) && isset($_POST["pickup"]) && isset($_POST["dropoff"]) && isset($_POST["pickup_time"]) && isset($_POST["dropoff_time"]) && isset($_POST["current_status"])) {
    $id = $_POST["id"];
    $pickup = $_POST["pickup"];
    $dropoff = $_POST["dropoff"];
    $pickup_time = date('Y-m-d H:i:s', strtotime($_POST["pickup_time"])); // Format datetime
    $dropoff_time = date('Y-m-d H:i:s', strtotime($_POST["dropoff_time"])); // Format datetime
    $current_status = $_POST["current_status"];

    // Prepare SQL statement with placeholders
    $sql_add_booking = "INSERT INTO bookings (id, pickup, dropoff, pickup_time, dropoff_time, current_status) 
                        VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql_add_booking);
    $stmt->bind_param("ssssss", $id, $pickup, $dropoff, $pickup_time, $dropoff_time, $current_status);

    // Execute the statement
    if($stmt->execute()) {
        // Redirect user upon successful submission
        header("Location: dashboard.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        // Handle database error
        echo "Error: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
