<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');

    $conn->begin_transaction();

    try {

        $sqlAddress = "DELETE FROM address_cart WHERE id_cart=$id";
        $conn->query($sqlAddress);

        $sqlCartItem = "DELETE FROM cart_items WHERE cart_id=$id";
        $conn->query($sqlCartItem);

        $sqlCart = "DELETE FROM shopping_carts WHERE id=$id";
        $conn->query($sqlCart);

        $conn->commit();

        echo "<script>
                var result = confirm('Bạn có chắc chắn muốn xóa không?');
                if (result) {
                    window.location.href = '../../index.php?pid=6';
                }
            </script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
    $conn->close();
}
