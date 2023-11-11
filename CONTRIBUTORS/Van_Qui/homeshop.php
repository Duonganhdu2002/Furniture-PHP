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
        <divs class="product-section">
            <div class="row">
                <div>
                    <h2 class="section-title"><?php echo $row1["category_name"]; ?></h2>
                    <p style="" class="section-decrition"><?php echo $row1["description"]; ?></p>
                    <p><a href="index.php?pid=9" class="btn">Explore</a></p>
                </div>

                <?php
                $sqlid1 = "SELECT * FROM products WHERE category_id = $category_id";
                $resultid1 = $link->query($sqlid1);

                $i = 0;
                while ($row1 = $resultid1->fetch_assoc()) {
                ?>
                    <div class="product-item">
                        <a href="product-detail.html">
                            <img src="../images/chairs/<?php echo $row1["image"]; ?>" class="product-thumbnail">
                        </a>
                        <h3 class="product-title"><?php echo $row1["product_name"]; ?></h3>
                        <strong class="product-price"><?php echo $row1["price"]; ?></strong>
                        <span class="icon-cross">
                            <button class="add" data-id="<?php echo $row["id"]; ?>"><img src="images/cross.svg"></button>
                            <!-- <a class="add" data-id="< //?php echo $row["id"]; ?>" href="democart.php"><img src="images/cross.svg"></a> -->
                        </span>
                    </div>

                <?php
                    $i++;
                    if ($i >= 3) {
                        break;
                    }
                }
                ?>
            </div>
        </divs>
<?php
    }
}
?>
<script>
    var id = document.getElementsByClassName("add");
    for (var i = 0; i < id.length; i++) {
        id[i].addEventListener("click", function(event) {
            var target = event.target;
            var id_product = target.getAttribute("data-id");
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    target.innerHTML = data.in_cart;
                }
            }
            xml.open("GET", "conection_cart.php?id=" + id_product, true);
            xml.send();
        })
    }
</script>
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

    .product-thumbnail {
        margin-bottom: 30px;
        position: relative;
        width: 90%;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
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