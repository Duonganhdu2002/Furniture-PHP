<?php
$link = new mysqli("localhost", "root", "", "shopping_online");

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    // Update 'status' in 'shopping_carts' table from 1 to 5
    $updateSql = "UPDATE shopping_carts SET status = 5 WHERE id = $orderId";

    $update_query = "UPDATE shopping_carts SET canceled_at = CURRENT_TIMESTAMP WHERE id = $orderId AND canceled_at IS NULL";

    // Debug: In ra câu lệnh SQL để kiểm tra
    echo "Update Query: " . $update_query . "<br>";

    // Debug: In ra giá trị của orderId để kiểm tra
    echo "Order ID: " . $orderId . "<br>";

    $link->query($update_query);

    $result = $link->query($updateSql);

    if ($result) {
        echo "Order cancelled successfully.";
    } else {
        echo "Error cancelling order: " . $link->error;
    }
}
?>
