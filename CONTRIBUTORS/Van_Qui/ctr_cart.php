<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$link = new mysqli($servername, $username, $password, $dbname);

function DatSanPhamVaoGioHang($link) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kt = 0;
        // Mã sản phẩm đã có trong giỏ hàng thì cần tăng số lượng
        for ($i = 1; $i <= $_SESSION['somahang']; $i++) {
            if ($_GET['id'] == $_SESSION["id" . $i]) {
                $kt = 1;
                $_SESSION["soluong$i"] += 1;
                $_SESSION["soluonghang"]++;
                break;
            }
        }
        // Thêm một mặt hàng mới vào trong giỏ hàng nếu chưa có trong giỏ hàng
        if ($kt == 0) {
            $sql = "select * from products where id = '$id'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Tăng số mặt hàng và số lượng hàng trong giỏ hàng
                $_SESSION["somathang"]++;
                $_SESSION["soluonghang"]++;
                $i = $_SESSION["somathang"];
                $_SESSION["id$i"] = $row["id"];
                $_SESSION["product_name$i"] = $row["product_name"];
                $_SESSION["image$i"] = $row["image"];
                $_SESSION["price$i"] = $row["price"];
                $_SESSION["quantity$i"] = 1;
            }
        }
    }
}

// To call the function, pass the database connection as a parameter
DatSanPhamVaoGioHang($link);


?>
