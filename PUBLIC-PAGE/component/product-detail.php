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
            <div style="width:50%; height: 60px; align-items: center; background-color:#ebebeb; display:flex; margin-top: 40px">
                    <b style="font-size: 45px; margin-left: 20px;"><?php echo $productPrice; ?> $</b>
            </div>
            <div style="display: flex; margin-top: 40px; margin-bottom: 40px">
                
                <div style="display:flex; align-items: center; width:50%;">
                <input value="1" type="number" name="quantity" id="quantity" min="1">
                </div>
                <div style="display: flex; width:100%; align-items: center; margin-left: 30px">
                <p>
                    Available:
                    <b><?php echo $productQuantity; ?></b>
                </p>
                </div>
            </div>

            <div style="display:flex; margin-top: 40px; margin-bottom: 40px; ">
                <div style="margin-right: 20px;">
                    <button class="button">
                    <img src="../PUBLIC-PAGE/images/cart.svg" alt="" style="margin-right:8px">
                    Add to card
                    </button>
                </div>
                <div>
                    <button class="button">Buy now</button>
                </div>
            </div>
            <div style="position: relative; height: 150px; /* Chiều cao của phần tử chứa */">
                <a href="index.php?pid=1" style="position: absolute; bottom: 0; right: 0;">
                    <button class="button">Back to shop</button>
                </a>
            </div>
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
        width: 80%;
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
        width: 60%;
        border-radius: 20px;
        border-bottom: black 10 10 10;
    }

    .product-detail .product-datil-child .rightside {
        width: 60%;
        padding-left: 100px;
        opacity: 0.8;
    }

    .product-detail .product-datil-child .rightside h1 {
        font-size: 40px;
        display: flex;
        margin-top: 0px;
    }

    .product-detail .product-datil-child .rightside input {
        width:100%;
        height: 30px;
        font-size: x-large;
        text-align: center;
    }

    .button {
        display: flex;
        width: 200px;
        height: 50px;
        border-radius: 12px;
        background-color: black;
        border: none;
        color: #fff;
        cursor:pointer;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .button:hover {
        background-color: #f9bf29;
        color: black;
    }

    .button:active {
        opacity: 0.5;
    }
</style>