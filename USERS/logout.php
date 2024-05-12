<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("Location: ../product/index.html"); // Redirect the user to the login page
exit;

