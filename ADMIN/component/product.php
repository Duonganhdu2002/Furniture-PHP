<div class="product">
    <table class="product-data-table">
        <tr>
            <th style="text-align: center;">STT</th>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">
                <img style="width: 25px" src="../PUBLIC-PAGE/images/settingtr.svg">
            </th>
            <th style="text-align: center">Product Name</th>
            <th style="text-align: center">Description</th>
            <th style="text-align: center">Image</th>
            <th style="text-align: center">Price</th>
            <th style="text-align: center">Product Quantity</th>
            <th style="text-align: center">Category</th>
            <th style="text-align: center">Brand</th>
        </tr>

        <tr>
            <td style="text-align: center">
                <img type="image" style="width: 25px" src="../PUBLIC-PAGE/images/filter.svg">
            </td>
            <td style="text-align: center" colspan="2">
                <form action="index.php?pid=2&productId=0" method="post">
                    <input name="searchByIdproduct" type="text">
                </form>
            </td>
            <td style="text-align: center">
                <form action="index.php?pid=2&productId=0" method="post">
                    <input name="searchByNameproduct" type="text">
                </form>
            </td>
            <td style="text-align: center">
            </td>
            <td style="text-align: center">
            </td>
            <td style="text-align: center">
            </td>
            <td style="text-align: center">
            </td>
            <td style="text-align: center">

            </td>
            <td style="text-align: center">

            </td>
        </tr>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $itemsPerPage = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $itemsPerPage;

        $sql = "SELECT p.id, p.category_id, p.product_name, b.brand_name, p.description, p.image, p.price, p.stock_quantity, ctg.category_name FROM products p 
        INNER JOIN brands b ON p.brand_id = b.id
        INNER JOIN categories ctg ON p.category_id = ctg.id
        LIMIT $offset, $itemsPerPage";

        $result = $conn->query($sql);

        if (isset($_GET['productId'])) {
            $productId = $_GET['productId'];
            if ($productId === '0') {
                include "searching/product-searching.php";
            } else {
                include "searching/prodcut-detail.php";
            }
        } else {
            include "searching/product-detail.php";
        }

        ?>
    </table>
</div>

<script>
    function showButtons(element) {
        var actionButtons = element.querySelector('.action-buttons');
        if (actionButtons) {
            actionButtons.style.display = 'block';
        }
    }

    function hideButtons(element) {
        var actionButtons = element.querySelector('.action-buttons');
        if (actionButtons) {
            actionButtons.style.display = 'none';
        }
    }
</script>

<style>
    .action-buttons {
        z-index: 1.0;
        position: absolute;
        display: flex;
        flex-direction: column;
        margin-left: 30px;
        margin-top: 0px;
        display: none;
    }

    .edit-button {
        border-radius: 10px 10px 0 0;
        border-bottom: 1px solid white;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .edit-button:hover {
        opacity: 0.7;
    }

    .delete-button {
        border-radius: 0 0 10px 10px;
        border: none;
        width: 100%;
    }

    .delete-button:hover {
        opacity: 0.7;
    }

    .action-buttons button {
        padding: 10px 28px 10px 28px;
        background-color: #3b5d50;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

    .product {
        width: 100%;
        margin-top: 20px;
    }

    .product-data-table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    .product-data-table th,
    .product-data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .product-data-table td {
        height: 50px;
    }

    .product-data-table tr td input {
        width: 80%;
        height: 30%;
        padding: 3px 8px;
        border: #3b5d50 1px solid;
        border-radius: 6px;
    }

    .product-data-table th {
        background-color: #f2f2f2;
    }

    .pagination {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #fff;
        padding: 10px;
    }

    .pagination a {
        padding: 8px;
        text-decoration: none;
        color: #000;
        background-color: #f2f2f2;
        margin-right: 5px;
        border: none;
        border-radius: 4px;
        background-color: #3b5d50;
        padding: 10px 15px;
        color: white;
    }

    .pagination a:hover {
        background-color: #ddd;
    }
</style>