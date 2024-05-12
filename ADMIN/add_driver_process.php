<?php
// Include database connection code
include_once("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $errors = [];

    $fname = $_POST['fname'] ?? '';
    $sname = $_POST['sname'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $email = $_POST['email'] ?? '';
    $license_number = $_POST['license_number'] ?? '';
    $license_type = $_POST['license_type'] ?? '';
    $expiration_date = $_POST['expiration_date'] ?? '';
    $certifications = $_POST['certification'] ?? '';
    $accidents = $_POST['accidents'] ?? '';
    $violations = $_POST['violations'] ?? '';

    if (empty($fname) || empty($sname) || empty($dob) || empty($contact_number) || empty($email) || empty($license_number) || empty($license_type) || empty($expiration_date) || empty($certifications) || empty($accidents) || empty($violations)) {
        $errors[] = "All fields are required.";
    }

    // Additional validation logic can be added here

    if (empty($errors)) {
        // Check if email already exists
        $check_sql = "SELECT id FROM drivercredentials WHERE email = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $errors[] = "Email already exists.";
        } else {
            // Insert into database using question mark placeholders
            $insert_sql = "INSERT INTO drivercredentials (fname, sname, dob, contact_number, email, license_number, license_type, expiration_date, certifications, accidents, violations) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("sssssssssss", $fname, $sname, $dob, $contact_number, $email, $license_number, $license_type, $expiration_date, $certifications, $accidents, $violations);

            if ($insert_stmt->execute()) {
                echo "Driver credentials added successfully.";
            } else {
                echo "Error adding driver credentials.";
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
