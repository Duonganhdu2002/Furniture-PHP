<?php
$sql = "SELECT SUM(total_price) AS total_amount
FROM shopping_carts
WHERE status = (SELECT id FROM status_cart WHERE name_status = 'Delivered')
AND DAY(created_at) = DAY(CURDATE());";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAmountToday = $row['total_amount'];

$sql2 = "SELECT SUM(total_price) AS total_amount
FROM shopping_carts
WHERE status = (SELECT id FROM status_cart WHERE name_status = 'Delivered')
AND DAY(created_at) = DAY(CURDATE()) - 1;";

$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$totalAmountYesterday = $row2["total_amount"];

// Check if $totalAmountYesterday is zero before division
$percentIncrease = ($totalAmountYesterday != 0) ? (($totalAmountToday - $totalAmountYesterday) / $totalAmountYesterday * 100) : 0;
$percentIncrease = round($percentIncrease,2);

?>
