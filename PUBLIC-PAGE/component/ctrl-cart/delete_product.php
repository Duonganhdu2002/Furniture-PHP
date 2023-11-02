<?php

session_start();

if (isset($_GET['index']) && !empty($_SESSION['cart'])) {
    $deleteIndex = $_GET['index'];

    if (isset($_SESSION['cart'][$deleteIndex])) {
        
        unset($_SESSION['cart'][$deleteIndex]);

        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

header("Location: ../../index.php?pid=6");
exit();

?>
