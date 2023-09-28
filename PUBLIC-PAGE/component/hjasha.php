<?php
$link = new mysqli("localhost", "root", "", "shopping_online");
$sql = "select * from products";
$result = $link->query($sql);
?>

<table>
    <tr>
        <th>Mã sản phẩm</th>
        <th>Loại sản phẩm</th>
        <th>Tên thương hiệu</th>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {

    ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["category_id"]; ?></td>
            <td><?php echo $row["brand_id"]; ?></td>
            <td><?php echo $row["product_name"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td>
                <img style="width: 80px;" src="../images/<?php echo $row["image"];?>" alt="image">
            </td>
            <td><?php echo $row["price"]; ?></td>
            <td><?php echo $row["stock_quantity"]; ?></td>
        </tr>
    <?php
    }
    ?>
</table>