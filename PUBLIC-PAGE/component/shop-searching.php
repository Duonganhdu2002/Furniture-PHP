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
                    <div class="col"> 
                        <a class="product-item" href="cart.html">
                            <img src="images/chairs/<?php echo $product['image']; ?>" class="product-thumbnail">
                            <h3 class="product-title"><?php echo $product['product_name']; ?></h3>
                            <strong class="product-price"><?php echo $product['price']; ?></strong>
                            <span class="icon-cross">
                                <img src="images/cross.svg">
                            </span>
                        </a>
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