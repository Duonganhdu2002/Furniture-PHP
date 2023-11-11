<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');

    $conn->begin_transaction();

    try {
        // Delete from 'products' table
        $sqlProducts = "DELETE FROM addresses WHERE id=$id";
        $conn->query($sqlProducts);

        // Delete from 'information' table
        $sqlInformation = "DELETE FROM information WHERE id=$id";
        $conn->query($sqlInformation);

        // Delete from 'users' table
        $sqlUsers = "DELETE FROM users WHERE id=$id";
        $conn->query($sqlUsers);

        $conn->commit();

        echo "<script>
                var result = confirm('Bạn có chắc chắn muốn xóa không?');
                if (result) {
                    window.location.href = '../../index.php?pid=5';
                }
            </script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
    $conn->close();
}
