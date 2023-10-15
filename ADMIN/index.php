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
                <div><a href="#">Category Management</a></div>
                <div><a href="#">Product Management</a></div>
                <div><a href="#">Brand Management</a></div>
                <div><a href="#">Member Management</a></div>
                <div><a href="#">Customer Management</a></div>
                <div><a href="#">Order Management</a></div>
                <div><a href="#">Revenue</a></div>
            </div>
        </div>
        <div class="right-side" id="right-side">
            <div class="header">
                <span>Employee Name</span>
                <img class="bell" src="../PUBLIC-PAGE/images/bell.svg" alt="">
                <img class="avatar" src="../PUBLIC-PAGE/images/person-1.jpg" alt="">
            </div>
            <div class="title">
                Member
            </div>
            <div class="display-info">
                <div class="data">
                    Data. This content can be changed. By the way, including PHP.
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
        margin-top: 10px;
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
        border-right: 1px solid transparent;
        box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.3);
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