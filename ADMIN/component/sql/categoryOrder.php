<?php

$sqlCategoryOrder = "SELECT
c.category_name,
COUNT(ci.product_id) AS total_sold,
SUM(ci.quantity * p.price) AS total_revenue
FROM
categories c
JOIN
products p ON c.id = p.category_id
JOIN
cart_items ci ON p.id = ci.product_id
JOIN
shopping_carts sc ON ci.cart_id = sc.id
JOIN
status_cart scs ON sc.status = scs.id
WHERE
scs.name_status = 'Delivered'
AND YEAR(sc.created_at) = YEAR(CURDATE()) 
GROUP BY
c.id
ORDER BY
total_sold DESC
LIMIT 5
";

$resultCategoryOrder = $conn->query($sqlCategoryOrder);

$conn->close();
?>
