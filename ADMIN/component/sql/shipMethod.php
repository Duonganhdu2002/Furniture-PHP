<?php

$shippingMethodCount = [];
$totalOrders = 0;

for ($methodId = 1; $methodId <= 3; $methodId++) {
    $sql = "SELECT COUNT(*) AS method_count
            FROM shopping_carts
            WHERE ship_method = $methodId AND YEAR(created_at) = YEAR(CURDATE())";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    // Lấy kết quả cho mỗi phương thức và lưu vào mảng
    $row = $result->fetch_assoc();
    $shippingMethodCount[$methodId] = $row['method_count'];

    // Cộng dồn vào tổng số đơn hàng
    $totalOrders += $row['method_count'];
}

for ($methodId = 1; $methodId <= 3; $methodId++) {
    if ($totalOrders != 0) {
        $shippingMethodCount[$methodId] = round(($shippingMethodCount[$methodId] / $totalOrders) * 100, 0);
    } else {
        $shippingMethodCount[$methodId] = 100;
    }
}
