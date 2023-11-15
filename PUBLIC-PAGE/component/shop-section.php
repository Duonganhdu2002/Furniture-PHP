<?php

if ($resultProducts->num_rows > 0) {
    while ($row = $resultProducts->fetch_assoc()) {
?>
        <div class="product-item">
            <form action="component/ctrl-cart/addToCart.php" method="post">
                
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <a href="index.php?pid=10&id=<?php echo $row["id"]; ?>">
                    <input type="hidden" name="image" value="<?php echo $row["image"]; ?>">
                    <img src="images/chairs/<?php echo $row["image"]; ?>" class="product-thumbnail">
                </a>

                <input type="hidden" name="product_name" value="<?php echo $row["product_name"]; ?>">
                <h3 class="product-title"><?php echo $row["product_name"]; ?></h3>

                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                <strong class="product-price"><?php echo $row["price"]; ?></strong>

                <span class="icon-cross">
                    <a class="add" id="<?php echo $row["id"]; ?>">
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