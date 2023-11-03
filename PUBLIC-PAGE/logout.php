<?php
    session_start();

    if (isset($_SESSION['username_user'])) {
        unset($_SESSION['username_user']);
    }

    header('location:index.php');
?>