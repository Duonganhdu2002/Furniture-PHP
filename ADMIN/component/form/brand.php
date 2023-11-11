<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$brandName = "";
$brandDescription = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandName = $conn->real_escape_string($_POST["brandName"]);
    $brandDescription = $conn->real_escape_string($_POST["brandDescription"]);

    do {
        if (empty($brandName) || empty($brandDescription)) {
            $message = "All the fields are required";
            break;
        }

        $result = $conn->query("SELECT * FROM brands WHERE brand_name = '$brandName'");

        if ($result->num_rows > 0) {
            $message = "brand already exists";
            break;
        }

        $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM brands");
        $maxId = $maxIdResult->fetch_assoc()['max_id'];
        $newId = $maxId + 1;

        $stmt = $conn->prepare("INSERT INTO brands (id, brand_name, description) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $newId, $brandName, $brandDescription);
        $stmt->execute();

        if (!$stmt) {
            $message = "Invalid query: " . $conn->error;
            break;
        }

        $brandName = "";
        $brandDescription = "";

        $message = "Brand added correctly";
    } while (false);
}
?>


<script>
    <?php
    if ($message === "Invalid query: " . $conn->error) {
        echo "showNotification('Thêm không thành công', 'error');";
    }

    if ($message === "Brand already exists") {
        echo "showNotification('Tên danh mục đã tồn tại', 'error');";
    }

    if ($message === "All the fields are required") {
        echo "showNotification('Thông tin chưa được điền đủ', 'error');";
    }

    if ($message === "Brand added correctly") {
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
        <form method="post" action="" class="brandForm" onsubmit="return submitBrandForm();">
            <h1>Add new brand</h1>
            <label for="brandName">Brand Name</label><br>
            <input type="text" id="brandName" name="brandName" value="<?php echo $brandName; ?>"><br>
            <label for="brandDescription">Brand Description</label><br>
            <input style="height: 100px;" name="brandDescription" id="brandDescription" value="<?php echo $brandDescription; ?>"> <br>
            <div>
                <button type="submit">Add</button>
                <a style="text-decoration: none;">
                    <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=3';">Back</button>
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
    .brandForm h1 {
        color: #3b5d50;
    }

    .brandForm input {
        width: 99%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .brandForm textarea {
        resize: none;
        width: 99%;
        height: 200px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
        border: 1px solid #3b5d50;
    }

    .brandForm label {
        margin-top: 20px;
        margin-bottom: 20px;
        line-height: 4.0;
    }

    .brandForm button {
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