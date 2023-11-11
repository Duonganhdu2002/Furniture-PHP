<?php

$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$id = "";
$categoryName = "";
$categoryDescription = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        echo "No category ID has been chosen";
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM categories WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "No row";
        exit;
    }

    $categoryName = $row["category_name"];
    $categoryDescription = $row["description"];

} else {

    $id = $_POST["id"];
    $categoryName = $_POST["categoryName"];
    $categoryDescription = $_POST["categoryDescription"];

    do {
        if (empty($categoryName) || empty($categoryDescription)) {
            $message = "All the fields are required";
            break;
        }

        $sql = "UPDATE categories SET category_name = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $categoryName, $categoryDescription, $id);
        $result = $stmt->execute();

        if (!$result) {
            $message = "Invalid query: " . $stmt->error;
            break;
        } else {
            header("location: index.php?pid=1");
            $message = "Category updated correctly";
            exit;
        }
    } while (false);
}

?>

<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div style="width: 40%;">
        <form method="post" action="" class="categoryForm" onsubmit="return submitCategoryForm();">
            <h1>Update category</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <label for="categoryName">Category Name</label><br>
            <input type="text" id="categoryName" name="categoryName" value="<?php echo $categoryName; ?>"><br>
            <label for="categoryDescription">Category Description</label><br>
            <input style="height: 100px;" name="categoryDescription" id="categoryDescription" value="<?php echo $categoryDescription; ?>"> <br>
            <div>
                <button type="submit">Change</button>
                <a style="text-decoration: none;">
                    <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=1';">Back</button>
                </a>
            </div>
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