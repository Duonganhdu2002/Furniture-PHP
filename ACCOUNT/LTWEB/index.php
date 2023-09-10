<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; // Thay đổi nếu cần
$username = "root"; // Thay đổi username của bạn
$password = ""; // Thay đổi mật khẩu của bạn
$dbname = "quanlyvemaybay"; // Thay đổi tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Biến để lưu thông báo kết quả đăng nhập
$loginMessage = "";

// Kiểm tra xem form đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form đăng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn để kiểm tra tên người dùng và mật khẩu
    $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Đăng nhập thành công
        $loginMessage = "Đăng nhập thành công!";
    } else {
        // Đăng nhập thất bại
        $loginMessage = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <title>LOGIN</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="index.php" method="POST">
                    <h2>Login</h2>
                    <!-- Thêm thông báo kết quả đăng nhập -->
                    <?php if (!empty($loginMessage)) : ?>
                        <p><?php echo $loginMessage; ?></p>
                    <?php endif; ?>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" id="username" name="username">
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <!-- Loại bỏ id="password" thừa -->
                        <input type="password" id="password" name="password">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>

                    </div>
                    <button>Log in</button>
                    <div class="register">
                        <p>Don't have an account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
