<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php session_start(); ?>
    <div class="container-main">
        <?php
        include "component/side-bar.php";
        ?>
        <div id="right-side">
            <?php
            include "component/header.php";
            include "component/title.php";
            ?>
            <div class="display-info">
                <div class="data">
                    <?php
                    if (isset($_SESSION["username_admin"])) {
                        if (isset($_GET['pid'])) {
                            $id = $_GET['pid'];
                            if ($id == '1' && isset($_GET['add-new'])) {
                                include("component/form/category.php");
                            } else if ($id == '2' && isset($_GET['add-new'])) {
                                include("component/form/product.php");
                            } else if ($id == '3' && isset($_GET['add-new'])) {
                                include("component/form/brand.php");
                            } else if ($id == '4' && isset($_GET['add-new'])) {
                                include("component/form/member.php");
                            } else {
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
                                    case '8':
                                        include("component/profile.php");
                                        break;
                                    default:
                                        include("component/nova.php");
                                        break;
                                }
                            }
                        }
                    } else {
                        //echo '<script> alert("Bạn cần đăng nhập trước "); </script>';
                        header("location: login.php");
                        exit(); 
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
        height: 87vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .data {
        width: 97%;
        height: 95%;
    }
</style>

</html>