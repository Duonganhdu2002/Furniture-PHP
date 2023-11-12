<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $status = 2;
    echo $id;

    $sql = "UPDATE shopping_carts SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $id);
    $result = $stmt->execute();

    if (!$result) {
        $message = "Invalid query: " . $stmt->error;
    } else {
        header("location: ../index.php?pid=6");
        $message = "Category updated correctly";
        exit;
    }
} else if (isset($_POST["submit1"])) {
    $id = $_POST["id"];
    $status = 3;
    echo $id;

    $sql = "UPDATE shopping_carts SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $id);
    $result = $stmt->execute();

    if (!$result) {
        $message = "Invalid query: " . $stmt->error;
    } else {
        header("location: ../index.php?pid=6");
        $message = "Category updated correctly";
        exit;
    }
} else if (isset($_POST["submit3"])) {
    $id = $_POST["id"];
    $status = 4;
    echo $id;

    $sql = "UPDATE shopping_carts SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $id);
    $result = $stmt->execute();

    if (!$result) {
        $message = "Invalid query: " . $stmt->error;
    } else {
        header("location: ../index.php?pid=6");
        $message = "Category updated correctly";
        exit;
    }
} else if (isset($_POST["submit2"])) {
    $id = $_POST["id"];
    $status = 5;
    echo $id;

    $sql = "UPDATE shopping_carts SET status = ?, canceled_at = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $id);
    $result = $stmt->execute();

    if (!$result) {
        $message = "Invalid query: " . $stmt->error;
    } else {
        header("location: ../index.php?pid=6");
        $message = "Category updated correctly";
        exit;
    }
}
