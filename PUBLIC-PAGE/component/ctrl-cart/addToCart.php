<?php

session_start();

if (isset($_POST["submit"])) {
    $image = $_POST["image"];
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];
    $id = $_POST["id"];
    $quantity = $_POST["quantity"];
    if (!isset($quantity)) {
        $quantity = 1;
    }

    $productArray = array($image, $product_name, $price, $id, $quantity);

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $_SESSION["cart"][] = $productArray;

    header("Location: ../../index.php?pid=6");
    exit();
}
