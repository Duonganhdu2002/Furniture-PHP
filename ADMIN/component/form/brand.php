<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandName = $conn->real_escape_string($_POST["brandName"]);
    $brandDescription = $conn->real_escape_string($_POST["brandDescription"]);

    $checkExistenceQuery = "SELECT * FROM brands WHERE brand_name = '$brandName' OR description = '$brandDescription'";
    $result = $conn->query($checkExistenceQuery);

    if ($result->num_rows == 0) {
        $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM brands");
        $maxId = $maxIdResult->fetch_assoc()['max_id'];
        $newId = $maxId + 1;

        $sql = "INSERT INTO brands (id, brand_name, description) VALUES ($newId, '$brandName', '$brandDescription')";

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
        echo "alert('Thêm thành công');";
    } else {
        echo "alert('Thêm không thành công');";
    }
    ?>
</script>

<<<<<<< HEAD
<div style="width: 100%;">
    <form method="post" class="brandForm" onsubmit="return submitbrandForm();">
        <h1>Add new brand</h1>
        <label for="brandName">Brand Name</label><br>
        <input type="text" id="brandName" name="brandName" required><br>
        <label for="brandDescription">Brand Description</label><br>
        <textarea name="brandDescription" id="brandDescription" cols="30" rows="10"></textarea> <br>
        <button type="submit">Add</button>
    </form>
=======
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div style="width: 50%;">
        <form method="post" class="brandForm" onsubmit="return submitbrandForm();">
            <h1>Add new brand</h1>
            <label for="brandName">Brand Name</label><br>
            <input type="text" id="brandName" name="brandName" required><br>
            <label for="brandDescription">Brand Description</label><br>
            <textarea name="brandDescription" id="brandDescription" cols="30" rows="10"></textarea> <br>
            <button type="submit">Submit</button>
        </form>
    </div>
>>>>>>> d20839b522faeef98ab02f871eafeb8b2fc6944b
</div>

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
        height: 200px;border-radius: 10px;
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
