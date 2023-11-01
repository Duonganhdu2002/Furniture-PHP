<?php

$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET["id"];

    $sql = "SELECT * FROM products WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $productName = $row["product_name"];
    $productPrice = $row["price"];
    $productQuantity = $row["stock_quantity"];
    $productDescription = $row["description"];
    $image = $row["image"];
}

?>

<div class="product-detail">
    <div class="product-datil-child">
        <div class="leftside">
            <img src="images/chairs/<?php echo $image; ?>" alt="">
        </div>
        <div class="rightside">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <h1><?php echo $productName; ?></h1>
            <p>
               <?php echo $productDescription; ?>
            </p>

            <input value="1" type="number" name="quantity" id="quantity" min="1">

            <button>Add to card</button>
            <button>Buy now</button>
            <p>
                <b><?php echo $productPrice; ?></b>
            </p>
            <p>
                Available
                <b><?php echo $productQuantity; ?></b>
            </p>

            <a href="index.php?pid=1">
                <button>Back to shop</button>
            </a>
        </div>
    </div>
</div>

<style>
    .product-detail {
        display: flex;
        justify-content: center;
        height: fit-content;
        width: 100%;
        margin-top: 200px;
        margin-bottom: 200px;
        background-color: #fff;
    }

    .product-detail .product-datil-child {
        width: 68%;
        display: flex;
        height: fit-content;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .product-detail .product-datil-child .leftside {
        width: 50%;
        display: flex;
        justify-content: center;
        border-right: 2px solid gray;
    }

    .product-detail .product-datil-child .leftside img {
        width: 50%;
    }

    .product-detail .product-datil-child .rightside {
        width: 50%;
        padding-left: 40px;
        opacity: 0.8;
    }
</style>