<?php
$sql = "SELECT COUNT(*) AS new_order_count
FROM shopping_carts
WHERE DATE(created_at) = CURDATE()";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAmountOrder = $row['new_order_count'];

$sql2 = "SELECT COUNT(*) AS last_order_count
FROM shopping_carts
WHERE DATE(created_at) = CURDATE() - 1";


$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$totalAmountOrderYesterday = $row2["last_order_count"];

$percentIncreaseOrder = ($totalAmountOrderYesterday != 0) ? (($totalAmountOrder - $totalAmountOrderYesterday) / $totalAmountOrderYesterday * 100) : 0;
$percentIncreaseOrder = round($percentIncreaseOrder,2);

?>
