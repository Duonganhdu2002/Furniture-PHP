<?php

$sql = "SELECT COUNT(*) AS new_account_count
FROM users
WHERE DATE(created_at) = CURDATE();
";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAccout = $row['new_account_count'];

$sql1 = "SELECT COUNT(*) AS last_account_count
FROM users
WHERE DATE(created_at) = CURDATE() - 1;
";

$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$totalAccoutYesterday = $row1['last_account_count'];

$percentIncreaseAccount = ($totalAccoutYesterday != 0) ? (($totalAccout - $totalAccoutYesterday) / $totalAccoutYesterday * 100) : 0;
$percentIncreaseAccount = round($percentIncreaseAccount,2);

?>