<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
// Create connection
$conn2 = mysqli_connect($dbservername, $dbusername, $dbpassword);
$conn = mysqli_connect("localhost", "root", "", "tbis");
// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}
if (!$conn2) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}

