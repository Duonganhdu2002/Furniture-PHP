<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body style="background-color: #eff2f1;">
    <div style="background-color: #3b5d50;">
        <?php
        $headerHomeHomeLinkCss = "opacity: 1;";
        include "component/header.php";
        ?>
        <?php
        include "component/menu-click-icon.php";
        ?>
        <?php
        $Content1IndexFontContent = "Modern Interior <br> Design Studio";
        $Content1IndexPresentContent = "Explore unique and elegant furnishings at NOVA. Elevate your space with our curated collection of stylish and comfortable pieces. Discover living redefined at NOVA.        ";
        include "component/content-1.php";
        ?>
    </div>
    <?php
    if (isset($_GET['pid'])) {
        $id = $_GET['pid'];
        switch ($id) {
            case '1':
                include("component/shop-general.php");
                break;
            case '2':
                include("component/content-2.php");
                include("component/content-3.php");
                break;
            case '3':
                include("component/content-2.php");
                include("component/content-4.php");
                break;
            case '4':
                include("component/content-7.php");
                break;
            case '5':
                include("component/content-8.php");
                break;
            case '6':
                include("component/content-9.php");
                break;
            case '7':
                include("component/content-10.php");
                break;
            case '8':
                include("component/content-11.php");
                break;
        }
    } else {
        include("component/content-2.php");
        include("component/content-3.php");
        include("component/content-4.php");
        include("component/content-5.php");
    }
    ?>
    <?php
    include "component/content-6.php"
    ?>

</body>

</html>