<?php
session_start();

if (isset($_SESSION['username'])) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("location: ../php/pages/login.php");
}
?>
