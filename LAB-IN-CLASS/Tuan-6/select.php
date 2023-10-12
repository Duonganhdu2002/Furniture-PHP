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
    $sql = "SELECT id, category_name FROM categories";
    $result = $link->query($sql);
    ?>
    <form action="" method="post">
        <p>Select your category</p>
        <select name="data">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="submit">
    </form>
    <?php
    if (isset($_POST["data"])) {
        echo $_POST["data"];
    }
    ?>
</body>

</html>
