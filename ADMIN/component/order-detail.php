<?php
echo "<table class='category-data-table'>";
echo "<tr>";
echo "<th style='text-align: center;'>Item</th>";
echo "<th style='text-align: center;'>Price</th>";
echo "<th style='text-align: center;'>Quantity</th>";
echo "</tr>";

if ($result1 && $result2) {
    while ($row1 = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td style='text-align: center;'>" . $row1['product_name'] . "</td>";
        echo "<td style='text-align: center;'>" . $row1['price'] . "</td>";
        echo "<td style='text-align: center;'>" . $row1['quantity'] . "</td>";
        echo "</tr>";
    }
}
echo "</table>";

if ($result2) {
    if ($row2 = mysqli_fetch_array($result2)) {
        echo "<h4>Shipping fee: " . $row2['standard_price'] . " $</h4>";
    }
}

if ($result3) {
    if ($row3 = mysqli_fetch_array($result3)) {
        echo "<h4>Total price: " . $row3["total_price"] . " $</h4>";
    }
}

if ($result4) {
    if ($row4 = mysqli_fetch_array($result4)) {
        echo "<h4>Address shipping: " . $row4["number"] . ", " . $row4["street"] . ", " . $row4["commune"] . ", " . $row4["district"] . ", " . $row4["province"] . ", " . $row4["country"] . ".</h4>";
    }
}
?>
<a href="index.php?pid=6"><button>Back</button></a>
