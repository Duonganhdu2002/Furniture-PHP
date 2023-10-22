
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

$thu_muc = "../images/";

// Kiểm tra xem tệp hình ảnh đã được tải lên hay chưa
if (isset($_FILES["image"])) {
    $ten_file = $thu_muc . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $ten_file);
}
else{
    echo "up ảnh không thành công";
} // bị lôi up ảnh

if (isset($_POST["product_name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock_quantity"])) {
    $product_name = $_POST["product_name"];
    $product_description = $_POST["description"];
    $product_image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
    $product_price = intval($_POST["price"]);
    $product_numberOfProducts = intval($_POST["stock_quantity"]);

    // Lưu ý sửa 'decription' thành 'description' trong truy vấn SQL
    $themsp_qr = "INSERT INTO products (product_name, description, image, price, stock_quantity) 
    VALUES ('$product_name', '$product_description', '$product_image', '$product_price', '$product_numberOfProducts')";

    if ($conn->query($themsp_qr)) {
        header("Location: ../ADMIN.php?pid=2");
    } else {
        // echo "<script>alert('Thêm không thành công, xin kiểm tra lại!'); history.back();</script>";
    echo "them không thành công ";
    
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



<!-- 
    // view_them_thêm_sp
<div style="width: 80%;">
        <form  action="/ADMIN/component/form/them_sp.php" method="post" class="categoryForm" onsubmit="return submitCategoryForm();">
            <h1>Add new product</h1>
            <label for="productName">Product Name</label><br>
            <input type="text" id="productName" name="productName" required><br>
            <label for="productDescription">Product Description</label><br>
            <input type="text" name="productDescription" id="productDescription" required><br>
            <label for="productImage">Product Image</label><br>
            <input type="file" name="productImage" id="productImage" required><br>
            <label for="productPrice">Product Price</label><br>
            <input type="number" name="productPrice" id="productPrice" required><br>
            <label for="numberOfProducts">Number of products</label><br>
            <input type="number" name="numberOfProducts" id="numberOfProducts" required><br>
            <button type="submit">Submit</button>
        </form>
    </div>

<style>
        /* CSS của bạn */
        .categoryForm input {
            width: 100%;
            height: 30px;
            border: 1px solid #3b5d50;
            border-radius: 10px;
            padding: 5px 10px 5px 10px;
        }

        .categoryForm label {
            margin-top: 20px;
            margin-bottom: 20px;
            line-height: 4.0;
        }

        .categoryForm button {
            width: 80px;
            height: 40px;
            border: none;
            border-radius: 5px;
            background-color: #3b5d50;
            color: white;
            font-size: 16px;
            margin-top: 30px;
        }
    </style> -->