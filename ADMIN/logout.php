<?php
    session_start();

    if (isset($_SESSION['username_admin'])) {
        unset($_SESSION['username_admin']);
    }


    header('location:index.php');
?>