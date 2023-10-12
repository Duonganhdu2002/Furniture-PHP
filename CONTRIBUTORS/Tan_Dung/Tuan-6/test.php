<?php
$link = new mysqli("localhost", "root", "", "shopping_online");
$sql = "select * from categories";
$result = $link->query($sql);
?>
<form action="" method="post">
    <select name="chon">
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <option value="<?php echo $row["category_name"]; ?>"> <?php echo $row["category_name"]; ?> </option>
        <?php
        }
        ?>
        <input type="submit" name="ok" value="Submmit">
    </select>
</form>
<?php
if (isset($_POST["chon"])) {
    echo $_POST["chon"];
}
?>