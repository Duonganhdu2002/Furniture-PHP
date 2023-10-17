<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="container-main">
        <?php
        include "component/side-bar.php";
        ?>
        <div id="right-side">
            <?php
            include "component/header.php";
            ?>
            <?php
            if (isset($_GET['pid'])) {
                $id = $_GET['pid'];
                switch ($id) {
                    case '1':
                        $nameCategory = 'Category';
                        break;
                    case '2':
                        $nameCategory = 'Product';
                        break;
                    case '3':
                        $nameCategory = 'Brand';
                        break;
                    case '4':
                        $nameCategory = 'Member';
                        break;
                    case '5':
                        $nameCategory = 'Customer';
                        break;
                    case '6':
                        $nameCategory = 'Order';
                        break;
                    case '7':
                        $nameCategory = 'Revenue';
                        break;
                }
            } else {
                $nameCategory = 'Nova.';
            }
            include "component/title.php";
            ?>
            <div class="display-info">
                <div class="data">
                    <?php
                    if (isset($_GET['pid'])) {
                        $id = $_GET['pid'];
                        switch ($id) {
                            case '1':
                                include("component/category.php");
                                break;
                            case '2':
                                include("component/product.php");
                                break;
                            case '3':
                                include("component/brand.php");
                                break;
                            case '4':
                                include("component/member.php");
                                break;
                            case '5':
                                include("component/customer.php");
                                break;
                            case '6':
                                include("component/order.php");
                                break;
                            case '7':
                                include("component/revenue.php");
                                break;
                        }
                    } else {
                        include("component/nova.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    body {
        margin: 0;
        font-family: "Inter", sans-serif;
    }

    .container-main {
        display: flex;
        width: 100%;
        height: 100vh;
    }

    #right-side {
        width: 85%;
    }

    .display-info {
        height: 88vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .data {
        width: 97%;
        height: 85%;
        background-color: #EFFFF5;
        border-radius: 20px;
        margin-bottom: 90px;
    }
</style>

</html>