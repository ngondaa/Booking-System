<?php
    $hostname="localhost";
    $user="root";
    $password="";
    $database="buskaro";
    
    $conn2=new mysqli($hostname,$user,$password,$database);

    if($conn2->connect_errno){
        echo "Connection failed: (" .$conn->connect_errno . ") " . $conexao->connect_error;
    }

    
    $conn = mysqli_connect("localhost", "root", "", "tbis");
    // Check connection
    if (!$conn) {
        echo "Connected unsuccessfully";
        die("Connection failed: " . mysqli_connect_error());
    }
    