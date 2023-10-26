<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

$thu_muc = "../../../PUBLIC-PAGE/images/chairs/";

if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    // Kiểm tra xem có tệp hình ảnh được tải lên và không có lỗi
    $ten_file = $thu_muc . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $ten_file);
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
// $conn = new mysqli('localhost', 'root', '', 'shopping_online');

// if ($conn->connect_error) {
//     die("Kết nối thất bại: " . $conn->connect_error);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $productName = $conn->real_escape_string($_POST["productName"]);
//     $productPrice = intval($_POST["price"]);
//     $productQuantity = intval($_POST["stockQuantity"]);
//     $productDescription = $conn->real_escape_string($_POST["productDescription"]);
//     $brandId = $conn->real_escape_string($_POST["category"]);
//     $catgoryId = $conn->real_escape_string($_POST["brand"]);

//     $folder = "../../../PUBLIC-PAGE/images/chairs/";
//     $image = $_FILES["image"]["name"];
//     $fileName = $folder . $_FILES["image"]["name"];
//     if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileName)) {
//             // Thành công: hiển thị thông báo JavaScript
//             echo "<script>alert('Tải lên ảnh thành công');</script>";
//         } else {
//             // Lỗi: hiển thị thông báo JavaScript
//             echo "<script>alert('Tải lên ảnh không thành công');</script>";
//         }
//     } else {
//         // Không có tệp hình ảnh được tải lên: hiển thị thông báo JavaScript
//         echo "<script>alert('Không có tệp hình ảnh được tải lên.');</script>";
//     }

//     $checkExistenceQuery = "SELECT * FROM products WHERE product_name = '$productName' OR description = '$productDescription'";
//     $result = $conn->query($checkExistenceQuery);
//     if ($result->num_rows == 0) {
//         $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM products");
//         $maxId = $maxIdResult->fetch_assoc()['max_id'];
//         $newId = $maxId + 1;

//         $sql = "INSERT INTO products (id, category_id, brand_id, product_name, description, image, price, stock_quantity) 
//         VALUES ($newId, '$catgoryId', '$brandId', '$productName','$productDescription', '$image', '$productPrice', '$productQuantity')";
//         if ($conn->query($sql)) {
//             // Gửi thành công: bạn có thể thực hiện các hành động khác sau khi thêm sản phẩm
//         } else {
//             // Lỗi: xử lý lỗi tại đây hoặc hiển thị thông báo lỗi
//             echo "Lỗi khi thêm sản phẩm: " . $conn->error;
//         }
//     } else {
//         echo "Sản phẩm đã tồn tại!";
//     }
// }
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
