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
            include "component/title.php";
            ?>
            <div class="display-info">
                <div class="data">
                    <?php
                    include "component/password.php";
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
        background-color: #f9f9f9;
        border-radius: 20px;
        margin-bottom: 90px;
    }
</style>

</html>