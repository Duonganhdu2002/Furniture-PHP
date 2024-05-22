<?php
    session_start(); // Starts the session

    // Unsets the admin username from the session
    if (isset($_SESSION['username_admin'])) {
        unset($_SESSION['username_admin']);
    }

    // Redirects to the login page
    header('location:login.php');
?>
