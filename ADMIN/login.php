<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
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
            width: 50%;
        }

        .login-form {
            height: 400px;
            border: 1px solid #ccc;
            padding: 20px;
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
    </style>
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
        $queryLogin  = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = 'admin'";
        $result = $conn->query($queryLogin);

        if ($result->num_rows == 1) {
            // Đăng nhập thành công, lưu ID người dùng vào SESSION và chuyển hướng đến index.php
            $admin = $result->fetch_assoc();
            $_SESSION['username_admin'] = $admin['username'];
            $_SESSION['id_admin'] = $admin['id'];
            header("Location: index.php?pid=0");
            exit();
        } else {
            echo '<script>alert("Sai thông tin đăng nhập!");</script>';
        }
    }
    ?>

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
            <button type="submit">LOGIN</button>
        </form>
    </div>

</body>

</html>