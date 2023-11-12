<?php
$sql = "SELECT address_cart.country, COUNT(*) AS order_count, SUM(shopping_carts.total_price) AS total_value
        FROM shopping_carts
        INNER JOIN address_cart ON shopping_carts.id = address_cart.id_cart
        WHERE YEAR(shopping_carts.created_at) = YEAR(CURDATE())
        GROUP BY address_cart.country
        ORDER BY order_count DESC
        LIMIT 5";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalCountry = isset($row['total_value']) ? $row['total_value'] : 0;

$sql1 = "SELECT address_cart.country, COUNT(*) AS order_count, SUM(shopping_carts.total_price) AS last_total_value
        FROM shopping_carts
        INNER JOIN address_cart ON shopping_carts.id = address_cart.id_cart
        WHERE YEAR(shopping_carts.created_at) = YEAR(CURDATE()) - 1
        GROUP BY address_cart.country
        ORDER BY order_count DESC
        LIMIT 5";

$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$totalCountryPreviousYear = $row1['last_total_value'];

$percentIncreaseCountry = ($totalCountryPreviousYear != 0) ? (($totalCountry / $totalCountryPreviousYear) * 100) : 0;
$percentIncreaseCountry = round($percentIncreaseCountry,0);
?>