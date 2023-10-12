<!DOCTYPE html>
<html>

<head>
    <title>Chọn Thể Loại</title>
</head>

<body>
    <h1>Chọn Thể Loại</h1>

    <?php
    $link = new mysqli('localhost', 'root', '', 'shopping_online');

    // Kiểm tra kết nối
    if ($link->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $link->connect_error);
    }
    $query = "SELECT * FROM categories";
    $result = $link->query($query);
    ?>

    <form action="" method="post">
        Chọn thể loại
        <select name="chon" id="">
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row["id"]; ?>"> <?php echo $row["category_name"]; ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Chọn loại sản phẩm">
    </form>
    <?php 
    if(isset($_POST["chon"])) {
        $selectedCategory = $_POST["chon"];
        echo "Bạn đã chọn thể loại có ID: " . $selectedCategory;
    }
    ?>
</body>

</html>
