<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["filter-order"])) {
        $selectedValue = $_POST["filter-order"];
        $_SESSION["selectedValue"] = $selectedValue;
    }
}
?>

<form method="post" action="" id="filterForm">
    <select name="filter-order" onchange="document.getElementById('filterForm').submit()" style="width:180px; height:35px; font-size: 1em; border-radius: 7px">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');
        $sql = "SELECT * FROM status_cart";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $optionText = $row["name_status"];
                echo "<option value='".$optionText."'";
                if (isset($_SESSION["selectedValue"]) && $_SESSION["selectedValue"] == $optionText) {
                    echo " selected";
                }
                echo ">".$optionText."</option>";
            }
        }

        $conn->close();
        ?>
    </select>
</form>

<style>
    #filterForm {
        margin-right: 5%;
    }
</style>