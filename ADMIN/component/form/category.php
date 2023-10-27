<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = $conn->real_escape_string($_POST["categoryName"]);
    $categoryDescription = $conn->real_escape_string($_POST["categoryDescription"]);

    $checkExistenceQuery = "SELECT * FROM categories WHERE category_name = '$categoryName' OR description = '$categoryDescription'";
    $result = $conn->query($checkExistenceQuery);

    if ($result->num_rows == 0) {
        $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM categories");
        $maxId = $maxIdResult->fetch_assoc()['max_id'];
        $newId = $maxId + 1;

        $sql = "INSERT INTO categories (id, category_name, description) VALUES ($newId, '$categoryName', '$categoryDescription')";
        if ($conn->query($sql)) {
            $success = true;
        }
    }
}

$conn->close();
?>

<script>
    <?php
    if ($success) {
        echo "showNotification('Thêm thành công', 'success');";
    } else {
        echo "showNotification('Thêm không thành công', 'error');";
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

<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div style="width: 50%;">
        <form method="post" action="" class="categoryForm" onsubmit="return submitCategoryForm();">
            <h1>Add new category</h1>
            <label for="categoryName">Category Name</label><br>
            <input type="text" id="categoryName" name="categoryName" required><br>
            <label for="categoryDescription">Category Description</label><br>
            <textarea name="categoryDescription" id="categoryDescription" cols="30" rows="10"></textarea> <br>
            <button type="submit">Add</button>
        </form>
    </div>
</div>


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