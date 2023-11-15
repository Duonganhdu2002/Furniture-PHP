<?php
$sql = "SELECT address_cart.country, COUNT(*) AS order_count, SUM(shopping_carts.total_price) AS total_value
        FROM shopping_carts
        INNER JOIN address_cart ON shopping_carts.id = address_cart.id_cart
        WHERE YEAR(shopping_carts.created_at) = YEAR(CURDATE())
        GROUP BY address_cart.country
        ORDER BY order_count DESC
        LIMIT 6";

$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the first row
    $row = $result->fetch_assoc();

    // Check if a row was actually fetched
    if ($row) {
        $totalCountry = isset($row['total_value']) ? $row['total_value'] : 0;
    } else {
        $totalCountry = 0; // Set a default value if no row is fetched
    }
} else {
    // Handle the case where the query fails
    echo "Error executing query: " . $conn->error;
    $totalCountry = 0; // Set a default value
}

// Repeat the process for the second query
$sql1 = "SELECT address_cart.country, COUNT(*) AS order_count, SUM(shopping_carts.total_price) AS last_total_value
        FROM shopping_carts
        INNER JOIN address_cart ON shopping_carts.id = address_cart.id_cart
        WHERE YEAR(shopping_carts.created_at) = YEAR(CURDATE()) - 1
        GROUP BY address_cart.country
        ORDER BY order_count DESC
        LIMIT 6";

$result1 = $conn->query($sql1);

if ($result1) {
    $row1 = $result1->fetch_assoc();

    if ($row1) {
        $totalCountryPreviousYear = $row1['last_total_value'];
    } else {
        $totalCountryPreviousYear = 0;
    }
} else {
    echo "Error executing query: " . $conn->error;
    $totalCountryPreviousYear = 0;
}

// Rest of your code remains the same
$percentIncreaseCountry = ($totalCountryPreviousYear != 0) ? (($totalCountry / $totalCountryPreviousYear) * 100) : 0;
$percentIncreaseCountry = round($percentIncreaseCountry, 0);
// Loop through the results of the first query
?>