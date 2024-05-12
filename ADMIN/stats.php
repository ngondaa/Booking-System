<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TBIS";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Example queries to fetch statistics
    $userCountQuery = "SELECT COUNT(*) AS totalUsers FROM users";
    $userCountStmt = $conn->prepare($userCountQuery);
    $userCountStmt->execute();
    $userCountResult = $userCountStmt->fetch(PDO::FETCH_ASSOC);

    $vehicleCountQuery = "SELECT COUNT(*) AS totalVehicles FROM vehicles";
    $vehicleCountStmt = $conn->prepare($vehicleCountQuery);
    $vehicleCountStmt->execute();
    $vehicleCountResult = $vehicleCountStmt->fetch(PDO::FETCH_ASSOC);
    
    $driverCountQuery = "SELECT COUNT(*) AS totalDrivers FROM drivers";
    $driverCountStmt = $conn->prepare($driverCountQuery);
    $driverCountStmt->execute();
    $driverCountResult = $driverCountStmt->fetch(PDO::FETCH_ASSOC);
    /*
    $reviewCountQuery = "SELECT COUNT(*) AS totalReviews FROM customer_reviews";
    $reviewCountStmt = $conn->prepare($reviewCountQuery);
    $reviewCountStmt->execute();
    $reviewCountResult = $reviewCountStmt->fetch(PDO::FETCH_ASSOC);
    */
    $bookingCountQuery = "SELECT COUNT(*) AS totalBookings FROM bookings";
    $bookingCountStmt = $conn->prepare($bookingCountQuery);
    $bookingCountStmt->execute();
    $bookingCountResult = $bookingCountStmt->fetch(PDO::FETCH_ASSOC);
    /*
    $transactionAmountQuery = "SELECT SUM(amount) AS totalAmount FROM transactions";
    $transactionAmountStmt = $conn->prepare($transactionAmountQuery);
    $transactionAmountStmt->execute();
    $transactionAmountResult = $transactionAmountStmt->fetch(PDO::FETCH_ASSOC);
    */
    // Close the connection
    $conn = null;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Exit script if there's a connection error
}
?>
