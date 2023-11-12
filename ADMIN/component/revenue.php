<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(id) AS total_orders
        FROM shopping_carts
        WHERE status = (SELECT id FROM status_cart WHERE name_status = 'Delivered')
        AND MONTH(created_at) = MONTH(CURRENT_DATE);";

$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

$row = $result->fetch_assoc();

if ($row) {
    $totalOrders = $row['total_orders'];
    echo "Total Delivered Orders this Month: " . $totalOrders;
} else {
    echo "No results found.";
}

$conn->close();
?>
