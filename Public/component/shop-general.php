<?php
$link = new mysqli("localhost", "root", "", "shopping_online");

$sqlIdArray = "SELECT id FROM categories";
$resultIdArray = $link->query($sqlIdArray);
$category_ids = array();

if ($resultIdArray->num_rows > 0) {
    while ($row = $resultIdArray->fetch_assoc()) {
        $category_ids[] = $row["id"];
    }
} else {
    echo "No Data";
}

foreach ($category_ids as $category_id) {
    $sql1 = "SELECT * FROM categories WHERE id = $category_id";
    $result1 = $link->query($sql1);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
?>
        <div class="product-section">
            <div class="row">
                <div>
                    <h2 class="section-title"><?php echo $row1["category_name"]; ?></h2>
                    <p style="" class="section-decrition"><?php echo $row1["description"]; ?></p>
                    <p><a href="index.php?pid=9&categoryId=<?php echo $row1["id"]; ?>" class="btn">Explore</a></p>
                </div>

                <?php
                $sqlid1 = "SELECT * FROM products WHERE category_id = $category_id";
                $resultid1 = $link->query($sqlid1);

                $i = 0;
                while ($row1 = $resultid1->fetch_assoc()) {
                ?>
                    <div class="product-item">

                        <form action="component/ctrl-cart/addToCart.php" method="post">

                            <input type="hidden" name="id" value="<?php echo $row1["id"]; ?>">

                            <a href="index.php?pid=10&id=<?php echo $row1["id"]; ?>">

                                <input type="hidden" name="image" value="<?php echo $row1["image"]; ?>">
                                <img src="images/chairs/<?php echo $row1["image"]; ?>" class="product-thumbnail">

                            </a>

                            <input type="hidden" name="product_name" value="<?php echo $row1["product_name"]; ?>">
                            <h3 class="product-title"><?php echo $row1["product_name"]; ?></h3>

                            <input type="hidden" name="price" value="<?php echo $row1["price"]; ?>">
                            <strong class="product-price"><?php echo $row1["price"]; ?></strong>

                            <span class="icon-cross">
                                <a class="add" id="<?php echo $row1["id"]; ?>">
                                    <button name="submitButton1" style="background-color: #2f2f2f; border: none;" type="submit">
                                        <img src="images/cross.svg">
                                    </button>
                                </a>
                            </span>

                        </form>

                    </div>
                <?php
                    $i++;
                    if ($i >= 3) {
                        break;
                    }
                }
                ?>
            </div>
        </div>
<?php
    }
}
?>



</div>
<style>
    .btn {
        font-weight: 600;
        padding: 16px 34px;
        border-radius: 30px;
        color: #eff2f1;
        ;
        background: #2f2f2f;
        border-color: #2f2f2f;
        text-decoration: none;
    }

    .btn:hover {
        color: #ffffff;
        background: #222222;
        border-color: #222222;
    }

    .section-title {
        color: #2f2f2f;
        font-size: 34px;
        font-weight: 500;
    }

    .section-decrition {
        color: #2f2f2f;
        font-size: 14px;
        opacity: 0.7;
        line-height: 2.0;
        margin-bottom: 50px;
    }

    .product-section {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 700px;
        margin-bottom: 80px;
    }


    .row {
        width: 68%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .row div {
        width: 25%;
    }

    .product-item {
        text-align: center;
        text-decoration: none;
        display: block;
        position: relative;
        padding-bottom: 50px;
        cursor: pointer;
    }

    @keyframes bounce {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-40px);
    }
    100% {
        transform: translateY(-40px);
    }
    }

    .product-thumbnail {
        margin-bottom: 30px;
        position: relative;
        width: 90%;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
        border-radius: 20px;
        box-shadow: 0px 10px 20px #949494;
    }

    .product-thumbnail:hover {
        animation: bounce 1s forwards;
    }

    .product-item h3 {
        font-weight: 600;
        font-size: 16px;
    }

    .product-item strong {
        font-weight: 800 !important;
        font-size: 18px !important;
    }

    .product-item h3,
    .product-item strong {
        color: #2f2f2f;
        text-decoration: none;
    }

    .icon-cross {
        position: absolute;
        width: 35px;
        height: 35px;
        display: inline-block;
        background: #2f2f2f;
        bottom: 15px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        margin-bottom: -17.5px;
        border-radius: 50%;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .icon-cross img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .product-item:before {
        bottom: 0;
        left: 0;
        right: 0;
        position: absolute;
        content: "";
        background: #dce5e4;
        height: 0%;
        z-index: -1;
        border-radius: 10px;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .product-thumbnail {
        top: -25px;
    }

    .product-item:hover .icon-cross {
        bottom: 0;
        opacity: 1;
        visibility: visible;
    }

    .product-item:hover:before {
        height: 70%;
    }

    @media (max-width: 400px) {
        .row {
            width: 100%;
            flex-direction: column;
            margin: 10px;
        }

        .row div {
            width: 100%;
            height: 550px;
        }

        .row div:nth-child(1) {
            height: 400px;
        }

        .product-section {
            height: auto;
        }
    }

    @media (max-width: 768px) {
        .row {
            width: 100%;
            flex-direction: column;
            margin: 10px;
        }

        .row div {
            width: 100%;
            height: 550px;
        }

        .row div:nth-child(1) {
            height: 400px;
        }

        .product-section {
            height: auto;
        }
    }
</style>
