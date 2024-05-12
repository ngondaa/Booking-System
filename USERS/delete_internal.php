<?php
// Start session and include database connection
session_start();
include_once('db_connect.php');

// Check if the form is submitted and the ID is provided
if(isset($_POST['cancel'])) {
    // Get the ID from the POST request and sanitize it
    $id = mysqli_real_escape_string($conn, $_POST['cancel']);

    // SQL to delete a booking based on its ID
    $sql_delete_booking = "DELETE FROM bookings WHERE id = '$id'";

    // Perform the delete query
    if(mysqli_query($conn, $sql_delete_booking)) {
        // If deletion is successful, display a success message using JavaScript alert
        echo "<script>alert('Booking deleted successfully.')</script>";
        // Redirect back to the admin dashboard or the page where bookings are listed using JavaScript
        echo "<script>window.location.href = 'student_dashboard.php';</script>";
        exit(); // Ensure no further code execution after redirection
    } else {
        // If there's an error with the query, display an error message
        echo "Error deleting booking: " . mysqli_error($conn);
    }
} else {
    // If the form is not submitted properly, display an error message using JavaScript alert
    echo "<script>alert('Invalid request. Please provide a booking ID to delete.')</script>";
}
