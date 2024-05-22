<?php
$link = new mysqli("localhost", "root", "", "shopping_online");

$categoryID = isset($_GET["categoryId"]) ? $_GET["categoryId"] : NULL;

//Phân trang
$productsPerPage = 9;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $productsPerPage;

// Đếm tổng số sản phẩm
$sqlCountProducts = "SELECT COUNT(*) AS total FROM products WHERE category_id = $categoryID";
$resultCountProducts = $link->query($sqlCountProducts);
$totalProducts = ($resultCountProducts) ? $resultCountProducts->fetch_assoc()['total'] : 0;

// Đếm tổng số page
$totalPages = ceil($totalProducts / $productsPerPage);

$sqlCategory = "SELECT * FROM categories";
$resultCategory = $link->query($sqlCategory);

$sqlProducts = "SELECT * FROM products WHERE category_id = $categoryID LIMIT $offset, $productsPerPage";
$resultProducts = $link->query($sqlProducts);

?>
<div class="shop-detail">
    <div class="product-section">

        <div style="width: 25%; margin-top: 50px;" class="categories-column">
            <ul style="list-style: none; padding-right: 40px; padding-left: 0px;">
                <?php
                if ($resultCategory->num_rows > 0) {
                    while ($row = $resultCategory->fetch_assoc()) {
                ?>
                        <li style="margin-bottom: 10px; width:200px; height:40px;">
                            <a class="categories-column-a" href="index.php?pid=9&categoryId=<?php echo $row["id"]; ?>">
                                <?php echo $row["category_name"]; ?>
                            </a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>

        <div style="width: 75%; margin-top: 50px;" class="products-column">

            <div>
                <?php
                $categoryId = $_GET['categoryId'];
                if ($categoryId == '0') {
                    include "shop-searching.php";
                } else {
                    include "shop-section.php";
                }

                ?>
            </div>

            <div class="pagination">
                <?php
                // Hiển thị nút "First" nếu không ở trang đầu
                if ($current_page > 1) {
                    echo '<a href="?pid=9&categoryId=' . $categoryID . '&page=1">First</a>';
                }

                // Hiển thị tối đa 3 trang trước trang hiện tại
                for ($i = max(1, $current_page - 3); $i < $current_page; $i++) {
                    echo '<a href="?pid=9&categoryId=' . $categoryID . '&page=' . $i . '">' . $i . '</a>';
                }

                // Hiển thị trang hiện tại với lớp active
                echo '<a href="?pid=9&categoryId=' . $categoryID . '&page=' . $current_page . '" class="active">' . $current_page . '</a>';

                // Hiển thị tối đa 3 trang sau trang hiện tại
                for ($i = $current_page + 1; $i <= min($totalPages, $current_page + 3); $i++) {
                    echo '<a href="?pid=9&categoryId=' . $categoryID . '&page=' . $i . '">' . $i . '</a>';
                }

                // Hiển thị nút "End" nếu không ở trang cuối
                if ($current_page < $totalPages) {
                    echo '<a href="?pid=9&categoryId=' . $categoryID . '&page=' . $totalPages . '">End</a>';
                }

                // Hiển thị dấu chấm chấm nếu có nhiều trang hơn
                if ($totalPages > $current_page + 3) {
                    echo '<span>...</span>';
                }
                ?>
            </div>



        </div>
    </div>
</div>

<style>
    /* styles.css */

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;

    }

    .pagination a {
        color: #333;
        padding: 15px 20px;
        text-decoration: none;
        transition: background-color 0.3s;
        border-radius: 20%;
        font-weight: 600;
        margin-left: 2px;
        margin-right: 2px;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination a.active {
        background-color: #f9bf29;
        color: #2f2f2f;
    }

    .categories-column-a {
    text-decoration: none;
    text-transform: uppercase;
    font-size: 18px;
    font-weight: 600;
    color: #3b5d50;
    width: 200px;
    height:35px;
    display:flex;
    align-items: center;
    padding-left: 20px;
    }

    .categories-column-a:hover {
        color: #f9bf29;
        background-color: #2f2f2f;
        transition: 0.4s;
    }

    .categories-column-a:active {
        transition: 0s;
        opacity: 0.8;
    }
    .products-column {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .shop-detail {
        display: flex;
        justify-content: center;
    }

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
        margin-bottom: 100px;
    }

    .product-section {
        width: 68%;
        display: flex;
        justify-content: center;
        align-items: start;
        height: auto;
        margin-bottom: 80px;
    }

    .product-item {
        height: 550px;
        display: flex;
        float: left;
        width: 33%;
        text-align: center;
        text-decoration: none;
        position: relative;
        padding-bottom: 40px;
        cursor: pointer;
        margin-bottom: 80px;
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
        top: -25px;
        border-radius: 20px;
        box-shadow: 0px 10px 20px #949494;
    }

    .product-thumbnail:hover {
        animation: bounce 1s forwards;
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
