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
        $headerHomeServicesLinkCss = "opacity: 1;";
        include "component/header.php";
        ?>
        <?php
        include "component/menu-click-icon.php";
        ?>
        <?php
        $Content1IndexFontContent = "Services";
        $Content1IndexPresentContent = "Elevate your experience with services as exceptional as our designs. Welcome to a new standard of curated living";
        include "component/content-1.php";
        ?>
    </div>
    <?php
    include "component/content-2.php"
    ?> 
    <?php
    include "component/content-4.php"
    ?> 
    
    <?php
    include "component/content-6.php"
    ?> 
    
</body>

</html>