<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$categoryName = "";
$categoryDescription = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = $conn->real_escape_string($_POST["categoryName"]);
    $categoryDescription = $conn->real_escape_string($_POST["categoryDescription"]);

    do {
        if (empty($categoryName) || empty($categoryDescription)) {
            $message = "All the fields are required";
            break;
        }

        $result = $conn->query("SELECT * FROM categories WHERE category_name = '$categoryName'");

        if ($result->num_rows > 0) {
            $message = "Category already exists";
            break;
        }

        $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM categories");
        $maxId = $maxIdResult->fetch_assoc()['max_id'];
        $newId = $maxId + 1;

        $stmt = $conn->prepare("INSERT INTO categories (id, category_name, description) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $newId, $categoryName, $categoryDescription);
        $stmt->execute();

        if (!$stmt) {
            $message = "Invalid query: " . $conn->error;
            break;
        }

        $categoryName = "";
        $categoryDescription = "";

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

<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div style="width: 40%;">
        <form method="post" action="" class="categoryForm" onsubmit="return submitCategoryForm();">
            <h1>Add new category</h1>
            <label for="categoryName">Category Name</label><br>
            <input type="text" id="categoryName" name="categoryName" value="<?php echo $categoryName; ?>"><br>
            <label for="categoryDescription">Category Description</label><br>
            <input style="height: 100px;" name="categoryDescription" id="categoryDescription" value="<?php echo $categoryDescription; ?>"> <br>
            <div>
                <button type="submit">Add</button>
                <a style="text-decoration: none;">
                    <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=1';">Back</button>
                </a>
            </div>
        </form>
    </div>
</div>

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

<style>
    .categoryForm h1 {
        color: #3b5d50;
    }

    .categoryForm input {
        width: 99%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .categoryForm textarea {
        resize: none;
        width: 99%;
        height: 200px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
        border: 1px solid #3b5d50;
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
</style>