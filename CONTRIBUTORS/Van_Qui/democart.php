<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$link = new mysqli("localhost", "root", "", "shopping_online");

$sqlIdArray = "SELECT id FROM categories";
$resultIdArray = $link->query($sqlIdArray);
$category_ids = array();

if ($resultIdArray->num_rows > 0) {
    while ($row = $resultIdArray->fetch_assoc()) {
        $category_ids[] = $row["id"];
    }
} else {
    echo "Không có dữ liệu trong bảng categories";
}

if (isset($_GET['categoryId'])) {
    $category_id = $_GET['categoryId'];
} else {
    $category_id = $category_ids[0];
}

if (isset($_GET['categoryId'])) {
    $category_id = $_GET['categoryId'];
} else {
    $category_id = $category_ids[0];
}

$sqlProducts = "SELECT id, product_name, image, price FROM products WHERE category_id = $category_id";
$resultProducts = $link->query($sqlProducts);  

?>

<div>
    <h2>Sản phẩm trong danh mục có ID <?php echo $category_id; ?></h2>
    <div class="product-list">
        <?php
        if ($resultProducts->num_rows > 0) {
            while ($row = $resultProducts->fetch_assoc()) {
                echo "<div class='product-item'>";
                echo "<h3>" . $row['product_name'] . "</h3>";
                echo "<p>Giá: $" . $row['price'] . "</p>";
                echo "<img src='" . $row['image'] . "' alt='Hình ảnh sản phẩm' width='100'>";
                echo "<button class='remove' data-product-id='" . $row['id'] . "'>Xóa</button>";
                echo "</div>";
            }
        } else {
            echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
        }
        ?>
    </div>
</div>







?>


</body>
</html>