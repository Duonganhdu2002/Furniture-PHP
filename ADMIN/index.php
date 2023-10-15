<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="container-main">
        <div class="side-bar" id="side-bar">
            <div class="logo-brand" onclick="toggleSidebar()">
                <div class="logo">
                    <a href="#">
                        <img src="../PUBLIC-PAGE/images/logo-black.svg" alt="">
                    </a>
                </div>
                <a style="opacity: 0.8;" href="../PUBLIC-PAGE/index.php">Nova<span>.</span></a>
            </div>
        </div>
        <div class="right-side" id="right-side">
            <div class="header">
                header
            </div>
            <div class="title">
                title
            </div>
            <div class="display-info">
                <div class="data">
                    data. This content can be changed. By the way, including php.
                </div>
            </div>
            <div class="footer">
                footer
            </div>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            var sideBar = document.getElementById("side-bar");
            var rightSide = document.getElementById("right-side");

            if (sideBar.style.width === "15%") {
                sideBar.style.width = "5%";
                rightSide.style.width = "95%";
            } else {
                sideBar.style.width = "15%";
                rightSide.style.width = "85%";
            }
        }
    </script>
</body>
<style>
    .logo-brand {
        height: 7%;
        background-color: lightblue;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logo-brand img {
        width: 50px;
    }

    .logo-brand a {
        text-decoration: none;
        color: #000000;
        font-size: 22px;
        font-weight: bold;
    }

    body {
        margin: 0;
        font-family: "Inter", sans-serif;
    }

    .container-main {
        display: flex;
        width: 100%;
        height: 100vh;
    }

    .side-bar {
        width: 15%;
    }

    .right-side {
        width: 85%;
    }

    .header {
        height: 7vh;
        background-color: bisque;
    }

    .title {
        height: 5vh;
        background-color: lightpink;
    }

    .display-info {
        height: 78vh;
        background-color: lightgray;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .data {
        width: 97%;
        height: 92%;
        background-color: lightcyan;
        border-radius: 20px;
    }

    .footer {
        height: 10vh;
        background-color: lightgreen;
    }
</style>

</html>