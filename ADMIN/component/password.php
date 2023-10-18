<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="password.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }


        .wrapper {
            margin: auto;
            padding: 80px 100px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            border: 1px solid #fff;
            background: transparent;
            backdrop-filter: blur(2px);
        }

        .wrapper h1 {
            padding-left: 80px;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 80px;

        }

        .container .left {
            width: 350px;
            padding-top: 10px;
            position: relative;
        }

        .container .left span {
            color: red;
        }

        .container .left input {
            width: 300px;
            height: 30px;
            border-radius: 5px;

        }

        .container .left i {
            position: absolute;
            top: 35px;
            right: 55px;
        }



        .container .right {
            width: 350px;
            padding-top: 10px;
            position: relative;
        }

        .container .right .newpass {
            position: relative;
            width: 100%;
        }

        .container .right input {
            width: 300px;
            height: 30px;
            border-radius: 5px;
        }

        .container .right .newpass i {
            position: absolute;
            top: 7px;
            right: 55px;
        }

        .container .right button {
            float: right;
            padding: 5px;
            margin-top: 10px;
            margin-right: 50px;
            background-color: blue;
            border-radius: 5px;
            color: #fff;
            outline: none;
            border: none;
            cursor: pointer;
        }

        .container .right button:hover {
            background-color: rgb(102, 102, 227);
            transition: 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Đổi mật khẩu</h1>
        <div class="container">
            <div class="left">
                <form action="">
                    <p><span>*</span>Mật khẩu cũ</p>
                    <input type="password" placeholder="Nhập mật khẩu">
                    <i class='bx bx-hide'></i>
                </form>
            </div>
            <div class="right">
                <form action="">
                    <p>Mật khẩu mới</p>
                    <div class="newpass">
                        <input type="password" placeholder="Nhập mật khẩu">
                        <i class='bx bx-hide'></i>
                    </div>
                    <p>Mật khẩu xác nhận</p>
                    <div class="newpass">
                        <input type="password" placeholder="Nhập lại mật khẩu">
                        <i class='bx bx-hide'></i>
                    </div>
                </form>
                <button type="submit">Cập nhật</button>
            </div>
        </div>
    </div>
</body>

</html>