<div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searchTerm = $_POST['search'];
        $sqlProducts = "SELECT id, product_name, image, price FROM products WHERE product_name LIKE '%$searchTerm%'";
        $resultProducts = $link->query($sqlProducts);
    }

    if ($resultProducts->num_rows > 0) {
        $totalProducts = $resultProducts->num_rows;
        $productsPerRow = 3;
        $totalRows = ceil($totalProducts / $productsPerRow);

        for ($rowNumber = 1; $rowNumber <= $totalRows; $rowNumber++) {
            echo '<div class="row">';

            for ($productNumber = 1; $productNumber <= $productsPerRow; $productNumber++) {
                $product = $resultProducts->fetch_assoc();

                if ($product) {
    ?>
                    <div class="product-item">
                        <a href="index.php?pid=10&id=<?php echo $product["id"]; ?>">
                            <img src="images/chairs/<?php echo $product['image']; ?>" class="product-thumbnail">
                        </a>
                        <h3 class="product-title"><?php echo $product['product_name']; ?></h3>
                        <strong class="product-price"><?php echo $product['price']; ?></strong>
                        <span class="icon-cross">
                            <a id="add-cart" href="cart.html"><img src="images/cross.svg"></a>
                        </span>
                    </div>
    <?php
                } else {
                    break;
                }
            }

            echo '</div>';
        }
    } else {
        echo "Không có sản phẩm trong danh mục này.";
    }
    ?>
</div>