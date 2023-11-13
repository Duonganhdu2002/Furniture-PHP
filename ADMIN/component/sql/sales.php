<?php
for ($month = 1; $month <= 12; $month++) {
    $sql = "SELECT SUM(total_price) AS sales
            FROM shopping_carts
            WHERE MONTH(created_at) = $month AND YEAR(created_at) = YEAR(CURDATE())";

    $result = $conn->query($sql);

    if ($result === false) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    // Lấy kết quả cho mỗi tháng và lưu vào mảng
    $row = $result->fetch_assoc();
    $salesByMonth[$month] = $row['sales'];
}



?>