<?php

$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$id = "";
$brandName = "";
$brandDescription = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        echo "No brand ID has been chosen";
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM brands WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "No row";
        exit;
    }

    $brandName = $row["brand_name"];
    $brandDescription = $row["description"];
} else {

    $id = $_POST["id"];
    $brandName = $_POST["brandName"];
    $brandDescription = $_POST["brandDescription"];

    do {
        if (empty($brandName) || empty($brandDescription)) {
            $message = "All the fields are required";
            break;
        }

        $sql = "UPDATE brands SET brand_name = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $brandName, $brandDescription, $id);
        $result = $stmt->execute();

        if (!$result) {
            $message = "Invalid query: " . $stmt->error;
            break;
        } else {
            header("location: index.php?pid=3");
            $message = "brand updated correctly";
            exit;
        }
    } while (false);
}

?>

<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div style="width: 40%;">
        <form method="post" action="" class="brandForm" onsubmit="return submitbrandForm();">
            <h1>Update brand</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="brandName">Brand Name</label><br>
            <input type="text" id="brandName" name="brandName" value="<?php echo $brandName; ?>"><br>
            <label for="brandDescription">Brand Description</label><br>
            <input style="height: 100px;" name="brandDescription" id="brandDescription" value="<?php echo $brandDescription; ?>"> <br>
            <button type="submit">Change</button>
            <div>
                <button type="submit">Change</button>
                <a style="text-decoration: none;">
                    <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=3';">Back</button>
                </a>
            </div>
        </form>
    </div>
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