<?php

$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$productName = "";
$productPrice = "";
$productQuantity = "";
$productDescription = "";
$brandId = "";
$categoryId = "";
$image = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        echo "No product ID has been chosen";
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM products WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "No row";
        exit;
    }

    $productName = $row["product_name"];
    $productPrice = $row["price"];
    $productQuantity = $row["stock_quantity"];
    $productDescription = $row["description"];
    $brandId = $row["brand_id"];
    $categoryId = $row["category_id"];
    $image = $row["image"];

} else {

    $id = $_POST["id"];
    $productName = $_POST["productName"];
    $productPrice = $_POST["price"];
    $productQuantity = $_POST["stockQuantity"];
    $productDescription = $_POST["productDescription"];
    $brandId = $_POST["brand"];
    $categoryId = $_POST["category"];
    $image = $_FILES["image"]["name"];

    do {
        if (empty($brandId) || empty($categoryId) || empty($image) || empty($productDescription) || empty($productName) || empty($productPrice) || empty($productQuantity)) {
            $message = "All the fields are required";
            break;
        }

        // Xử lí ảnh
        if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
            switch ($_FILES["image"]["error"]) {
                case UPLOAD_ERR_PARTIAL:
                    exit("File only partially uploaded");
                    break;
                case UPLOAD_ERR_NO_FILE:
                    exit("No file was uploaded");
                    break;
                case UPLOAD_ERR_EXTENSION:
                    exit("File upload stopped by a PHP extension");
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    exit("File exceeds MAX_FILE_SIZE in the HTML form");
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    exit("File exceeds upload_max_filesize in php.ini");
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    exit("Temporaray folder not found");
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    exit("Failed to write file");
                    break;
                default:
                    exit("Unknown uploaded file");
                    break;
            }
        }

        // Tối đa kích thuớc ảnh 1MB đảm bảo ảnh load nhanh 

        if ($_FILES["image"]["size"] > 1048576) {
            exit("File too large (max 1MB).");
        }

        $fileName = $_FILES["image"]["name"];

        $destination = __DIR__ . "/../../../PUBLIC-PAGE/images/chairs/" . $fileName;

        // Thông báo nếu không lưu được ảnh vào đường dẫn 
        if (!is_uploaded_file($_FILES["image"]["tmp_name"])) {
            exit("Invalid file upload");
        }
        
        

        $sql = "UPDATE products SET category_id = ?, brand_id = ?, product_name = ?,  description = ?,  image = ?,  price = ?,  stock_quantity = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisssiii", $categoryId, $brandId, $productName, $productDescription, $image, $productPrice, $productQuantity, $id);
        $result = $stmt->execute();

        if (!$result) {
            $message = "Invalid query: " . $stmt->error;
            break;
        } else {
            header("location: index.php?pid=2");
            $message = "product updated correctly";
            exit;
        }
    } while (false);
}

?>

<div style="display: flex; align-items: center; flex-direction: column;">
    <div style="width: 68%;" class="productFormContainer">
        <form class="productForm" enctype="multipart/form-data" method="post" onsubmit="return submitProductForm();">
            <h1>Update Product</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div style="display: flex; justify-content: space-between">
                <div style="width: 30%;">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" value="<?php echo $productName; ?>"><br>
                </div>
                <div style="width: 20%;">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" value="<?php echo $productPrice; ?>"><br>
                </div>
                <div style="width: 20%;">
                    <label for="stockQuantity">Stock Quantity:</label>
                    <input type="number" id="stockQuantity" name="stockQuantity" value="<?php echo $productQuantity; ?>"><br>
                </div>
            </div>
            <div>
                <label for="productDescription">Description:</label>
                <input style="height: 100px;" type="text" id="productDescription" name="productDescription" value="<?php echo $productDescription; ?>"></input><br>
            </div>

            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576"> -->

            <label for="image">Image:</label>
            <input style="border: none;" type="file" id="image" name="image"><br>

            <div style="display: flex;">
                <div>
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <?php
                        $categorySql = "SELECT id, category_name FROM categories";
                        $categoryResult = $conn->query($categorySql);

                        if ($categoryResult->num_rows > 0) {
                            while ($row = $categoryResult->fetch_assoc()) {
                                $selected = ($row['id'] == $categoryId) ? 'selected' : '';
                                echo "<option value='" . $row['id'] . "' $selected>" . $row['category_name'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>

                </div>
                <div>
                    <label for="brand">Brand:</label>
                    <select id="brand" name="brand">
                        <?php
                        $brandSql = "SELECT id, brand_name FROM brands";
                        $brandResult = $conn->query($brandSql);

                        if ($brandResult->num_rows > 0) {
                            while ($row = $brandResult->fetch_assoc()) {
                                $selected = ($row['id'] == $brandId) ? 'selected' : '';
                                echo "<option value='" . $row['id'] . "' $selected>" . $row['brand_name'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                </div>
            </div>
            <div>
                <button type="submit">Change</button>
                <a style="text-decoration: none;">
                    <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=2';">Back</button>
                </a>
            </div>
        </form>
    </div>
</div>
<style>
    .productFormContainer h1 {
        color: #3b5d50;
        justify-content: space-between;
    }

    .productFormContainer input {
        width: 99%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .productFormContainer textarea {
        resize: none;
        width: 99%;
        height: 150px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
        border: 1px solid #3b5d50;
    }

    .productFormContainer label {
        margin-top: 20px;
        margin-bottom: 20px;
        line-height: 4.0;
    }

    .productFormContainer button {
        width: 80px;
        height: 40px;
        border: none;
        border-radius: 5px;
        background-color: #3b5d50;
        color: white;
        font-size: 16px;
        margin-top: 30px;
    }
</style>