<?php
session_start();
include_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $pickup_location = $_POST['pickup_location'];
    $booking_date = $_POST['date'];
    $vehicle_type = $_POST['vehicletype'];
    $dropoff_location = $_POST['dropoff_location'];

    // Get username from session
    $username = $_SESSION['username'];
    // Insert data into the database
    $sql = "INSERT INTO bookings (pickup_location,dropoff_location, booking_date, vehicle_type,username) VALUES (?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $pickup_location,$dropoff_location, $booking_date, $vehicle_type,$username);

    if ($stmt->execute()) {
        // Booking successful
        $_SESSION['success_message'] = "Booking successful!";
        header("Location: student_dashboard.php");
        exit();
    } else {
        // Error occurred
        $_SESSION['error_message'] = "Error occurred while booking. Please try again.";
        header("Location: dashboard.php");
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: dashboard.php");
    exit();
}
