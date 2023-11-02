<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo '<h2>Your Cart:</h2>';
    echo '<ul>';

    foreach ($_SESSION['cart'] as $product) {
        echo '<li>';
        echo 'Product: ' . $product[1] . '<br>';
        echo 'Price: $' . $product[2] . '<br>';
        // Add more details if needed
        echo '</li>';
    }

    echo '</ul>';
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
