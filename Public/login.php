<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    session_start(); // Khởi tạo phiên làm việc
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');

    // Kiểm tra khi có sự kiện đăng nhập
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Lấy thông tin từ form đăng nhập
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Bảo vệ chống SQL injection
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        // Kiểm tra thông tin đăng nhập
        $queryLogin  = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = 'user'";
        $result = $conn->query($queryLogin);

        if ($result->num_rows == 1) {
            // Đăng nhập thành công, lưu ID người dùng vào SESSION và chuyển hướng đến index.php
            $user = $result->fetch_assoc();
            $_SESSION['username_user'] = $user['username'];
            $_SESSION['id_user'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!");</script>';
        }
    }
    ?>
    <div style="background-color: #3b5d50; width: 100%; height: 100%; display:flex">

        <div style="width: 50%; height: 100vh; display:flex; flex-direction: column; " class="Form-login">
            <div style="margin-bottom: 30px;" class="logo-brand">
                <div class="logo">
                    <a href="../PUBLIC-PAGE/index.php">
                        <img src="./images/logo.svg" alt="">
                    </a>
                </div>
                <a href="../PUBLIC-PAGE/index.php">Nova<span>.</span></a>
            </div>
            <!-- form -->
            <div class="login">
                <form class="login-form" action="" method="post">
                    <h1>LOGIN</h1>
                    <label for="username">Username</label>
                    <br>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password">
                    <br>
                    <div class="remember-forgot">
                        <label><input type="checkbox">Remember me</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit">LOGIN</button>
                    <div class="login-register">
                        <p>
                            Don't have an account?
                            <a href="../PUBLIC-PAGE/register.php" class="register-link">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div style="width: 50%; display:flex; justify-content: center; align-items: center; height: 100vh;" class="images">
            <div class="right-side-ct1">
                <img class="chair" src="../PUBLIC-PAGE/images/couch.png" alt="">
                <img class="dot-light" src="../PUBLIC-PAGE/images/dots-light.svg" alt="">
            </div>
        </div>
        <script>

        </script>
    </div>

    <style>
        body {
            margin: 0;
            font-family: "Inter", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login {
            text-align: center;
            width: 60%;
        }

        .login-form {
            position: relative;
            height: 490px;
            border: 1px solid #ccc;
            padding: 30px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .login-form h1 {
            color: #3b5d50;
        }

        .login-form label {
            font-size: 16px;
            font-weight: bold;
            float: left;
            line-height: 3.0;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-radius: 10px;
            border: #3b5d50 solid 1px;
            height: 50px;
            font-size: large;
        }

        button {
            margin-top: 40px;
            font-size: 20px;
            width: 100%;
            padding: 15px;
            background-color: #3b5d50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .Form-login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Đảm bảo chiều cao của div bằng chiều cao của màn hình */
        }

        .right-side-ct1 {
            width: 60vh;
            height: 50vh;
            position: relative;
            z-index: 0;
            /* justify-content: center;
        align-items: center; */
        }

        .chair {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
        }

        .dot-light {
            position: relative;
            z-index: 1;
            float: right;
        }

        .logo-brand {
            width: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
            /* position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2; */

        }

        .logo-brand a {
            text-decoration: none;
            color: #eff2f1;
            font-size: 45px;
            font-weight: 600;

        }

        .logo-brand a span {
            font-size: 32px;
            font-weight: 600;
            opacity: 0.7;
        }

        .logo {
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }

        .remember-forgot {
            font-size: 1em;
            color: #3b5d50;
            /* font-weight: 50; */
            margin: 15px 0 -15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* .remember-forgot label {
            margin-top: -16px;
        } */

        .remember-forgot label input {
            accent-color: #3b5d50;
            /* justify-content: center; */
            /* align-items: center; */
            width: 40px;
            height: 12px;
        }

        .remember-forgot input {
            margin-left: -13px;
            margin-right: -8px;
        }

        .remember-forgot a {
            color: #3b5d50;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .login-register {
            font-size: .9em;
            color: #3b5d50;
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px;
        }

        .login-register p a {
            color: #3b5d50;
            text-decoration: none;
            font-weight: 600;
        }

        .login-register p a:hover {
            text-decoration: underline;
        }
    </style>

</body>

</html>