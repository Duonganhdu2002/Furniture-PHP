<?php
$sql = "SELECT COUNT(*) AS new_canceled_order_count
FROM shopping_carts
WHERE DATE(canceled_at) = CURDATE()";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAmountCancle = $row['new_canceled_order_count'];

$sql2 = "SELECT COUNT(*) AS last_canceled_order_count
FROM shopping_carts
WHERE DATE(canceled_at) = CURDATE() - 1";


$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$totalAmountCancleYesterday = $row2["last_canceled_order_count"];

$percentIncreaseCancel = ($totalAmountCancleYesterday != 0) ? (($totalAmountCancle - $totalAmountCancleYesterday) / $totalAmountCancleYesterday * 100) : 0;
$percentIncreaseCancel = round($percentIncreaseCancel,2);

?>
