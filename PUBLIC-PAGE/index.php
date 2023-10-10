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
        if (isset($_GET['pid'])) {
            $id = $_GET['pid'];
            switch ($id) {
                case '1':
                    $headerHomeShopLinkCss = "opacity: 1;";
                    break;
                case '2':
                    $headerHomeAboutUsLinkCss = "opacity: 1;";
                    break;
                case '3':
                    $headerHomeServicesLinkCss = "opacity: 1;";
                    break;
                case '4':
                    $headerHomeBlogLinkCss = "opacity: 1;";
                    break;
                case '5':
                    $headerHomeContactUsLinkCss = "opacity: 1;";
                    break;
            }
        } else {
            $headerHomeHomeLinkCss = "opacity: 1;";
        }
        include "component/header.php";
        ?>
        <?php
        include "component/menu-click-icon.php";
        ?>
        <?php
        if (isset($_GET['pid'])) {
            $id = $_GET['pid'];
            switch ($id) {
                case '1':
                    $Content1IndexFontContent = "Shop";
                    $Content1IndexPresentContent = "Explore unique and elegant furnishings at NOVA. Elevate your space with our curated collection of stylish and comfortable pieces. Discover living redefined at NOVA.";
                    break;
                case '2':
                    $Content1IndexFontContent = "About Us";
                    $Content1IndexPresentContent = "Learn about our story and commitment to providing high-quality and stylish furnishings for your home.";
                    break;
                case '3':
                    $Content1IndexFontContent = "Services";
                    $Content1IndexPresentContent = "Explore our services that go beyond selling furniture. From design consultations to delivery, we've got you covered.";
                    break;
                case '4':
                    $Content1IndexFontContent = "Blog";
                    $Content1IndexPresentContent = "Read our latest blog posts for interior design tips, product highlights, and more.";
                    break;
                case '5':
                    $Content1IndexFontContent = "Contact Us";
                    $Content1IndexPresentContent = "Contact our team for any inquiries. We're here to assist you with your furniture needs.";
                    break;
                case '6':
                    $Content1IndexFontContent = "Your Bill";
                    $Content1IndexPresentContent = "Review your bill details here. Thank you for choosing NOVA for your furniture purchase.";
                    break;
                case '7':
                    $Content1IndexFontContent = "Fill Out Your Information";
                    $Content1IndexPresentContent = "Provide your details to ensure a seamless shopping experience. We respect your privacy.";
                    break;
                case '8':
                    $Content1IndexFontContent = "Thank you so much!";
                    $Content1IndexPresentContent = "We appreciate your business. Your satisfaction is our top priority.";
                    break;
            }
        } else {
            $Content1IndexFontContent = "Modern Interior <br> Design Studio";
            $Content1IndexPresentContent = "Explore unique and elegant furnishings at NOVA. Elevate your space with our curated collection of stylish and comfortable pieces. Discover living redefined at NOVA.        ";
        }
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