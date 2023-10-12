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
}else{
    echo "kết nối thành công";
}


$conn->close();
?>
