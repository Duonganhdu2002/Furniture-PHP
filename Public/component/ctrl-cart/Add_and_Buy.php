<?php
session_start();
if (isset($_POST['submitButton1'])) {
    $id = $_POST["id"];
    $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : 1;

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $productIndex = -1;
    foreach ($_SESSION["cart"] as $key => $product) {
        if ($product[3] == $id) {
            $productIndex = $key;
            break;
        }
    }

    if ($productIndex !== -1) {
        $_SESSION["cart"][$productIndex][4] += $quantity;
    } else {
        $image = $_POST["image"];
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $productArray = array($image, $product_name, $price, $id, $quantity);
        $_SESSION["cart"][] = $productArray;
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} elseif (isset($_POST['submitButton2'])) {
    $id = $_POST["id"];
    $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : 1;

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $productIndex = -1;
    foreach ($_SESSION["cart"] as $key => $product) {
        if ($product[3] == $id) {
            $productIndex = $key;
            break;
        }
    }

    if ($productIndex !== -1) {
        $_SESSION["cart"][$productIndex][4] += $quantity;
    } else {
        $image = $_POST["image"];
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $productArray = array($image, $product_name, $price, $id, $quantity);
        $_SESSION["cart"][] = $productArray;
    }

    header("Location: ../../index.php?pid=6");
    exit();
} else {
    // Xử lý khi không có nút submit nào được nhấn
    echo "Không có nút submit nào được nhấn!";
}
