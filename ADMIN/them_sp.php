<?php 

// Thực hiện kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

// xác định vị trí thư mục lưu
$thu_muc = "../images/";
$ten_file = $thu_muc . $_FILES["image"]["name"];
// chép hình ảnh vào thư mục
move_uploaded_file($_FILES["image"]["tmp_name"], $ten_file);

//-----
$maloai_sp = $_POST["category_id"];
$thuonghieu_sp = $_POST["brand_id"];
$ten_sp = $_POST["product_name"];
$don_gia = intval($_POST["price"]);
$hinh_anh = $_FILES["image"]["name"];
$mota = $_POST["description"];
$themsp_qr = "INSERT INTO products(category_id, brand_id, product_name, price, image, description) 
VALUES ('$maloai_sp', '$thuonghieu_sp', '$ten_sp', '$don_gia', '$hinh_anh', '$mota')";

if ($conn->query($themsp_qr)) {
    header("Location: ../ADMIN.php?pid=2");
} else {
    echo "<script>alert('Thêm không thành công, xin kiểm tra lại!'); history.back();</script>";
}0
?>
