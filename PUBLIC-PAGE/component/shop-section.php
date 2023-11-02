<div>
    <?php
    if ($resultProducts->num_rows > 0) {
        $totalProducts = $resultProducts->num_rows;
        $productsPerRow = 3;
        $totalRows = ceil($totalProducts / $productsPerRow);

        for ($rowNumber = 1; $rowNumber <= $totalRows; $rowNumber++) {
            echo '<form action="component/addToCart.php" method="post">';
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
                            <a class="add">
                                <button name="submit" style="background-color: #2f2f2f; border: none;" type="submit">
                                    <img src="images/cross.svg">
                                </button>
                            </a>
                        </span>
                    </div>

    <?php
                } else {
                    break;
                }
            }

            echo '</div>';
            echo '</form>';
        }
    } else {
        echo "Không có sản phẩm trong danh mục này.";
    }
    ?>
</div>