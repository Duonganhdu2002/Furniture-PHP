<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    if (isset($_SESSION['username_user'])) {
        $username = $_SESSION['username_user'];

        // Lấy thông tin từ form
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password']; // Mật khẩu không được băm trong cơ sở dữ liệu

            // Xác thực mật khẩu cũ
            if ($oldPassword === $hashedPassword) {
                // Kiểm tra mật khẩu mới và mật khẩu xác nhận
                if ($newPassword === $confirmPassword) {
                    // Update mật khẩu mới trong cơ sở dữ liệu
                    $updateSql = "UPDATE users SET password = ? WHERE username = ?";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("ss", $newPassword, $username);
                    if ($stmt->execute()) {
                        echo '<script>alert("Password has been updated successfully!")
                        window.location.href = "../index.php?pid=11";</script>';
                        
                    } else {
                        echo '<script>alert("Error updating password: ' . $conn->error . '")
                        window.location.href = "../index.php?pid=11&changepassword";</script>';
                    }
                } else {
                    echo '<script>alert("New password and confirm password do not match!")
                    window.location.href = "../index.php?pid=11&changepassword";</script>';
                }
            } else {
                echo '<script>alert("Old password is incorrect!")
                window.location.href = "../index.php?pid=11&changepassword";</script>';
            }
        } else {
            echo '<script>alert("User does not exist!")
            window.location.href = "../index.php?pid=11&changepassword";</script>';
        }
    } else {
        echo '<script>alert("Session not set!")
        window.location.href = "../index.php?pid=11";</script>';
    }

    $conn->close();
}
?>
