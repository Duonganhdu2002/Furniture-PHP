<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['index']) && isset($_POST['quantity'])) {
        $index = $_POST['index'];
        $quantity = $_POST['quantity'];

        // Update the quantity in the session
        if (isset($_SESSION['cart'][$index])) {
            $_SESSION['cart'][$index][4] = $quantity;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid index']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
