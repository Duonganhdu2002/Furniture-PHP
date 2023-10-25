<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

$thu_muc = "../../images/";

if ($_FILES["image"]["error"] == 0) {
    $ten_file = $thu_muc . $_FILES["image"]["name"];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $ten_file)) {
        // Thành công: hiển thị thông báo JavaScript
        echo "<script>alert('Tải lên ảnh thành công');</script>";
    } else {
        // Lỗi: hiển thị thông báo JavaScript
        echo "<script>alert('Tải lên ảnh không thành công');</script>";
    }
} else {
    // Không có tệp hình ảnh được tải lên: hiển thị thông báo JavaScript
    echo "<script>alert('Không có tệp hình ảnh được tải lên.');</script>";
}


if (isset($_POST["product_name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock_quantity"])) {
    $productName = $conn->real_escape_string($_POST["product_name"]);
    $price = intval($_POST["price"]);
    $stockQuantity = intval($_POST["stock_quantity"]);
    $description = $conn->real_escape_string($_POST["description"]);
    $image = isset($_FILES["image"]["name"]) ? $conn->real_escape_string($_FILES["image"]["name"]) : "";

    // Kiểm tra sự tồn tại của biến $category và $brand
    $category = isset($_POST["category"]) ? $conn->real_escape_string($_POST["category"]) : "";
    $brand = isset($_POST["brand"]) ? $conn->real_escape_string($_POST["brand"]) : "";

    // Lưu ý sửa 'decription' thành 'description' trong truy vấn SQL
    $themsp_qr = "INSERT INTO products (product_name, description, image, price, stock_quantity, category_id, brand_id) 
    VALUES ('$productName', '$description', '$image', '$price', '$stockQuantity', '$category', '$brand')";

    if ($conn->query($themsp_qr)) {
        header("Location: ../ADMIN.php?pid=2");
    } else {
        echo "Thêm không thành công, xin kiểm tra lại!";
    }
}

$conn->close();

?>




<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "shopping_online";

// $conn = new mysqli($servername, $username, $password, $dbname);

// $thu_muc = "../images/";
// $ten_file = $thu_muc . $_FILES["image"]["name"];

// if (isset($_FILES["image"])) {
//     move_uploaded_file($_FILES["image"]["tmp_name"], $ten_file);
// }

// if (isset($_POST["product_name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock_quantity"])) {
//     $product_name = $_POST["product_name"];
//     $product_description = $_POST["description"];
//     $product_image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
//     $product_price = intval($_POST["price"]);
//     $product_numberOfProducts = intval($_POST["stock_quantity"]);

//     // Lưu ý sửa 'decription' thành 'description' trong truy vấn SQL
//     $themsp_qr = "INSERT INTO products (product_name, description, image, price, stock_quantity) 
//     VALUES ('$product_name', '$product_description', '$product_image', '$product_price', '$product_numberOfProducts')";

//     if ($conn->query($themsp_qr)) {
//         header("Location: ../ADMIN.php?pid=2");
//     } else {
//         echo "<script>alert('Thêm không thành công, xin kiểm tra lại!'); history.back();</script>";
//     }
// }

// $conn->close();
?>
