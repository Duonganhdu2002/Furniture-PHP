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
                <a href="./profile.php">
                <img class="avatar" src="../PUBLIC-PAGE/images/person-1.jpg " alt="">
                </a>
            </div>
            <div class="title">
                Thông tin cá nhân
            </div>
            <div class="display-info">
                <div class="data">
                    <div class="header-data">
                        <button class="button-edit">Sủa</button>
                    </div>
                    <div class="data-1">
                        <div class="data-left-1">
                            <img class="avatar-data" src="../PUBLIC-PAGE/images/person-1.jpg" alt="">
                            <div class="camera-icon">
                                <a href="#">
                                    <img src="../PUBLIC-PAGE/images/camera-outline.svg" alt="Camera Icon">
                                </a>
                            </div>
                        </div>
                        <div class="data-right-1">
                            <h1>Bùi Thị F</h1>
                        </div>
                    </div>
                    <div class="header-data-2">
                            <h2>Thông tin cá nhân</h2>
                        </div>
                    <div class="data-2">
                        
                        <div class="data-left-2">
                            <h3>Tài khoản</h3>
                            <p>abc@gmail.com</p>
                            <h3>Ngày sinh</h3>
                            <p>06/12/1990</p>
                            <h3>Email</h3>
                            <p>buithifabcde@gmail.com</p>
                        </div>
                        <div class="data-right-2">
                            <h3>Giới tính</h3>
                            <p>Nữ</p>
                            <h3>Só điện thoại</h3>
                            <p>090995663</p>
                            <h3>Địa chỉ</h3>
                            <p>Địa chỉ số 456, Đường Hà Nội, Ngõ B, Quận C, Hà nội</p>
                        </div>
                    </div>
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
        background-color: white;
        border-radius: 20px;
        margin-bottom: 90px;
    }

    .header-data {
        width: 100%;
        height: 5%;
        display: flex;
    }

    .button-edit {
        margin-left: 95%;
        width: 70px;
        height: 40px;
        color: #F0F7FF;
        cursor: pointer;
        font-size: 1em;
        background: #3b5d50;
        border: none;
        border-radius: 5px;
    }

    .data-1 {
        width: 100%;
        height: 30%;
        display: flex;
    }

    .data-2 {
        width: 100%;
        height: 70%;
        display: flex;
    }

    .data-1 .data-left-1 {
        width: 30%;
        height: 100%;
        display: flex;
        align-items: center;
        position: relative;
    }

    .data-1 .data-right-1 {
        width: 70%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .data-2 .data-left-2 {
        width: 50%;
        height: 100%;
        line-height: 1.5;

    }



    .data-2 .data-right-2 {
        width: 50%;
        height: 100%;
        line-height: 1.5;
    }

    .avatar-data {
        width: 190px;
        height: 190px;
        border-radius: 100%;
        display: flex;
        margin: auto;
        position: relative;

    }

    .camera-icon {
    position: absolute;
    bottom: 20px;
    right: 145px;
    width: 35px;
    height: 35px;
    border-radius: 100%;
    background-color: #dee3df;
    }

    h3{
        color: #9b9f9c;
    }
</style>

</html>