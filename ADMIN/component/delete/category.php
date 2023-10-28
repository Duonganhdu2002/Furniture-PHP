<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        $sql = "DELETE FROM categories WHERE id=$id";

        $conn->query($sql);
    }

    header("location: ../../index.php?pid=1");
    exit();
?>