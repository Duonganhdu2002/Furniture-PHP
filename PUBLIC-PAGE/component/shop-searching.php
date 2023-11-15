<div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searchTerm = $_POST['search'];
        $sqlProducts = "SELECT * FROM products WHERE product_name LIKE '%$searchTerm%'";
        $resultProducts = $link->query($sqlProducts);

        // You might need to fetch the product information from the result set
        // Assuming you have a loop for fetching products, adjust as needed
        while ($product = $resultProducts->fetch_assoc()) {
    ?>
            <div class="product-item">
                <form action="component/ctrl-cart/addToCart.php" method="post">

                    <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">

                    <a href="index.php?pid=10&id=<?php echo $product["id"]; ?>">
                        <input type="hidden" name="image" value="<?php echo $product["image"]; ?>">
                        <img src="images/chairs/<?php echo $product["image"]; ?>" class="product-thumbnail">
                    </a>

                    <input type="hidden" name="product_name" value="<?php echo $product["product_name"]; ?>">
                    <h3 class="product-title"><?php echo $product["product_name"]; ?></h3>

                    <input type="hidden" name="price" value="<?php echo $product["price"]; ?>">
                    <strong class="product-price"><?php echo $product["price"]; ?></strong>

                    <span class="icon-cross">
                        <a class="add" id="<?php echo $product["id"]; ?>">
                            <button name="submitButton1" style="background-color: #2f2f2f; border: none;" type="submit">
                                <img src="images/cross.svg">
                            </button>
                        </a>
                    </span>
                </form>
            </div>
    <?php
        }
    }
    ?>
</div>
