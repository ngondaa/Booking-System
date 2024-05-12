<?php
// Include database connection code
include_once("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $errors = [];

    $registration_number = $_POST['registration_number'] ?? '';
    $make = $_POST['make'] ?? '';
    $model = $_POST['model'] ?? '';
    $year_of_make = $_POST['year_of_make'] ?? '';
    $capacity = $_POST['capacity'] ?? '';
    $mileage = $_POST['mileage'] ?? '';
    $vehicle_condition = $_POST['vehicle_condition'] ?? '';

    if (empty($registration_number) || empty($make) || empty($model) || empty($year_of_make) || empty($capacity) || empty($mileage) || empty($vehicle_condition)) {
        $errors[] = "All fields are required.";
    }

    // Additional validation logic can be added here

    if (empty($errors)) {
        // Check if registration number already exists
        $check_sql = "SELECT id FROM vehicles WHERE registration_number = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $registration_number);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $errors[] = "Registration number already exists.";
        } else {
            // Insert into database using question mark placeholders
            $insert_sql = "INSERT INTO vehicles (registration_number, make, model, year_of_make, capacity, mileage, vehicle_condition) 
                           VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("sssisss", $registration_number, $make, $model, $year_of_make, $capacity, $mileage, $vehicle_condition);

            if ($insert_stmt->execute()) {
                
            } else {
                echo "Error adding vehicle.";
            }
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
} 
?>
