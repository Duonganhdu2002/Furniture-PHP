<?php

$conn = include "db_connect.php";

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý dữ liệu khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị id lớn nhất từ bảng brands
    $result = $conn->query("SELECT MAX(id) AS max_id FROM brands");
    $row = $result->fetch_assoc();
    $next_id = $row["max_id"] + 1;

    $brand_name = $_POST["brand_name"];
    $description = $_POST["description"];
    $logo = $_POST["logo"];

    // Thực hiện truy vấn để thêm brand mới với id mới
    $sql = "INSERT INTO brands (id, brand_name, description, logo) VALUES ($next_id, '$brand_name', '$description', '$logo')";

    if ($conn->query($sql) === TRUE) {
        echo "Brand added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Brand</title>
</head>
<body>
    <h2>Add New Brand</h2>
    <form action="index.php" method="post">
        <label for="brand_name">Brand Name:</label>
        <input type="text" name="brand_name" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description"></textarea>
        <br>
        <label for="logo">Logo URL:</label>
        <input type="text" name="logo">
        <br>
        <input type="submit" value="Add Brand">
    </form>
</body>
</html>
