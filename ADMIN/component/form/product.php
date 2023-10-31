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
$catgoryId = "";
$image = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $conn->real_escape_string($_POST["productName"]);
    $productPrice = intval($_POST["price"]);
    $productQuantity = intval($_POST["stockQuantity"]);
    $productDescription = $conn->real_escape_string($_POST["productDescription"]);
    $brandId = $conn->real_escape_string($_POST["brand"]);
    $catgoryId = $conn->real_escape_string($_POST["category"]);
    $image = $conn->real_escape_string($_FILES["image"]["name"]);

    do {
        // Thông báo nếu không điền đủ thông tin sản phẩm
        if (empty($brandId) || empty($catgoryId) || empty($image) || empty($productDescription) || empty($productName) || empty($productPrice) || empty($productQuantity)) {
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
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
            exit("Can't move upload file");
        }

        $result = $conn->query("SELECT * FROM products WHERE product_name = '$productName'");

        if ($result->num_rows > 0) {
            $message = "Product already exists";
            break;
        }

        $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM products");
        $maxId = $maxIdResult->fetch_assoc()['max_id'];
        $newId = $maxId + 1;

        $stmt = $conn->prepare("INSERT INTO products (id, category_id, brand_id, product_name, description, image, price, stock_quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissssii", $newId, $catgoryId, $brandId, $productName, $productDescription, $image, $productPrice, $productQuantity);
        $stmt->execute();

        if (!$stmt) {
            $message = "Invalid query: " . $conn->error;
            break;
        }

        //Trả giá trị về rỗng
        $productName = "";
        $productPrice = "";
        $productQuantity = "";
        $productDescription = "";
        $brandId = "";
        $catgoryId = "";
        $image = "";

        $message = "Category added correctly";

    } while (false);
}
?>
<script>
    <?php
    if ($message === "Invalid query: " . $conn->error) {
        echo "showNotification('Thêm không thành công', 'error');";
    }

    if ($message === "Category already exists") {
        echo "showNotification('Tên danh mục đã tồn tại', 'error');";
    }

    if ($message === "All the fields are required") {
        echo "showNotification('Thông tin chưa được điền đủ', 'error');";
    }

    if ($message === "Category added correctly") {
        echo "showNotification('Thêm thành công', 'success');";
    }
    ?>

    function showNotification(message, type) {
        var notification = document.createElement('div');
        notification.className = 'notification ' + type;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(function() {
            notification.style.display = 'none';
        }, 2000);
    }
</script>
<style>
    .notification {
        position: fixed;
        top: 10px;
        left: 50%;
        top: 50%;
        transform: translateX(-50%);
        padding: 20px;
        width: 300px;
        text-align: center;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        transition: 0.5s;
        z-index: 999;
    }

    .success {
        background-color: #3b5d50;
    }

    .error {
        background-color: #ff3333;
    }
</style>

<div style="display: flex; align-items: center; flex-direction: column;">
    <div style="width: 68%;" class="productFormContainer">
        <form class="productForm" enctype="multipart/form-data" method="post" onsubmit="return submitProductForm();">
            <h1>Add Product</h1>
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
                <input type="text" id="productDescription" name="productDescription" value="<?php echo $productDescription; ?>"><br>
            </div>

            <label for="image">Image:</label>
            <input style="border: none;" type="file" id="image" name="image" value="<?php echo $image; ?>"><br>
            <div style="display: flex;">
                <div>
                    <label for="category">Category:</label>
                    <select id="category" name="category" value="<?php echo $catgoryId; ?>">
                        <?php
                        $categorySql = "SELECT id, category_name FROM categories";
                        $categoryResult = $conn->query($categorySql);

                        if ($categoryResult->num_rows > 0) {
                            while ($row = $categoryResult->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                </div>
                <div>
                    <label for="brand">Brand:</label>
                    <select id="brand" name="brand" value="<?php echo $brandId; ?>">
                        <?php
                        $brandSql = "SELECT id, brand_name FROM brands";
                        $brandResult = $conn->query($brandSql);

                        if ($brandResult->num_rows > 0) {
                            while ($row = $brandResult->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['brand_name'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                </div>
            </div>
            <div>
                <button type="submit">Add</button>
                <a style="text-decoration: none;">
                    <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=2';">Back</button>
                </a>
            </div>
        </form>
    </div>
</div>

<?php
$conn->close();
?>

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