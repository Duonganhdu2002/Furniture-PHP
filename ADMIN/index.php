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
                <a id="brand-letter" style="opacity: 0.8;">Nova<span>.</span></a>
            </div>
            <div class="menu-bar">
                <div><a href="#">Quản trị danh mục</a></div>
                <div><a href="#">Quản trị sản phẩm</a></div>
                <div><a href="#">Quản trị thương hiệu</a></div>
                <div><a href="#">Quản trị thành viên</a></div>
                <div><a href="#">Quản trị khách hàng</a></div>
                <div><a href="#">Quản lý đơn hàng</a></div>
                <div><a href="#">Doanh thu</a></div>
            </div>
        </div>
        <div class="right-side" id="right-side">
            <div class="header">
                <span>Employee name</span>
                <img class="bell" src="../PUBLIC-PAGE/images/bell.svg" alt="">
                <img class="avatar" src="../PUBLIC-PAGE/images/person-1.jpg " alt="">
            </div>
            <div class="title">
                Thành viên
            </div>
            <div class="display-info">
                <div class="data">
                    data. This content can be changed. By the way, including php.
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            var sideBar = document.getElementById("side-bar");
            var rightSide = document.getElementById("right-side");
            var brandLetter = document.getElementById("brand-letter");

            if (sideBar.style.width === "15%") {
                sideBar.style.width = "5%";
                rightSide.style.width = "95%";
                brandLetter.style.display = "none";
            } else {
                sideBar.style.width = "15%";
                rightSide.style.width = "85%";
                brandLetter.style.display = "block";
            }
        }
    </script>
</body>
<style>
    .menu-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .menu-bar div {
        font-size: 16px;
        font-weight: bold;
        width: 70%;
        margin: 5px 0 5px 0;
        padding: 10px;
        border-radius: 10px;
    }

    .menu-bar div:hover {
        background-color: #F0F7FF;
    }


    .menu-bar div a {
        text-decoration: none;
        color: #3b5d50;
    }

    .title {
        height: 5vh;
        font-size: 18px;
        font-weight: bold;
        display: flex;
        align-items: center;
        padding-left: 40px;
        color: #3b5d50;
        box-shadow: 5px 0 10px rgba(0, 0, 0, 0.2);
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 40px;
    }

    .header {
        display: flex;
        justify-content: end;
        align-items: center;
        height: 7vh;
    }

    .header img {
        margin-right: 20px;
    }

    .header span {
        margin-right: 20px;
        font-size: 16px;
        font-weight: bold;
        opacity: 0.8;
        text-transform: uppercase;
    }

    .bell {
        width: 25px;
    }

    .logo-brand {
        height: 7%;
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

    .display-info {
        height: 88vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .data {
        width: 97%;
        height: 85%;
        background-color: lightcyan;
        border-radius: 20px;
        margin-bottom: 90px;
    }
</style>

</html>