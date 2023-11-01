<?php
// Thực hiện kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Truy vấn SQL để lấy mã category_id từ bảng categories
$sql = "SELECT id FROM categories";
$result = $conn->query($sql);

// Kiểm tra và xử lý kết quả trả về
$category_ids = array();
if ($result->num_rows > 0) {
    // Duyệt qua các hàng kết quả và thêm vào mảng
    while($row = $result->fetch_assoc()) {
        $category_ids[] = $row["id"];
    }
} else {
    echo "Không có dữ liệu trong bảng categories";
}

// Hiển thị mảng category_ids
print_r($category_ids);
// Đóng kết nối
$conn->close();
?>
