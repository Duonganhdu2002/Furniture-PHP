<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');

    $sql = "DELETE FROM products, information, users WHERE id=$id";

    $conn->query($sql);

    // Xác nhận xóa bằng cách sử dụng JavaScript
    echo "<script>
            var result = confirm('Bạn có chắc chắn muốn xóa không?');
            if (result) {
                window.location.href = '../../index.php?pid=2';
            }
        </script>";
}
