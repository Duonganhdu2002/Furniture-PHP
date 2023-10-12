<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    // Kiểm tra xem giỏ hàng đã được tạo trong session chưa
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$product_id])) {
        // Nếu sản phẩm đã tồn tại, cộng thêm số lượng mới vào số lượng hiện có
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
        $_SESSION['cart'][$product_id] = array(
            'product_id' => $product_id,
            'quantity' => $quantity,
            'product_name' => $product_name,
            'product_price' => $product_price
        );
    }

    // Chuyển hướng đến trang giỏ hàng sau khi thêm sản phẩm thành công
    header("Location: cart.php");
    exit();
}
?>
