<?php

session_start();

if (isset($_GET['delete']) && !empty($_SESSION['cart'])) {
    $deleteIndex = $_GET['delete'];

    if (isset($_SESSION['cart'][$deleteIndex])) {
        // Remove the product at the specified index
        unset($_SESSION['cart'][$deleteIndex]);

        // Reindex the array to fix the keys
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Redirect back to the previous page or any desired location
header("Location: ../index.php?pid=6");
exit();

?>
