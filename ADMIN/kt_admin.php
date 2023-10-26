
<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

//Lấy tất cả các bản ghi từ cơ sở dữ liệu
$sql = "SELECT id, password FROM users WHERE role = 'admin'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userId = $row['id'];
        $currentPassword = $row['password'];

        // Mã hóa mật khẩu và cập nhật lại vào cơ sở dữ liệu
        $password = password_hash($currentPassword, PASSWORD_DEFAULT);
        $updateSql = "UPDATE users SET password = '$password' WHERE id = $userId";
        if ($conn->query($updateSql) === TRUE) {
            echo "Đã cập nhật mật khẩu cho user có ID: " . $userId . "<br>";
        } else {
            echo "Lỗi khi cập nhật mật khẩu cho user có ID: " . $userId . "<br>";
        }
    }
} else {
    echo "Không có user nào trong cơ sở dữ liệu.";
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_user = "SELECT * FROM users WHERE username = '$username'";
    $run_qry = mysqli_query($conn, $select_user);

    if (mysqli_num_rows($run_qry) > 0) {
        $row = mysqli_fetch_assoc($run_qry);
        if (password_verify($password, $row['password'])) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
        } else {
            // Sai mật khẩu
            header("Location: login.php");
            $error = "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng đăng nhập lại.";
            header("Location: login.php?error=" . urlencode($error));
        }
    } else {
        // Không tìm thấy người dùng
        $error = "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng đăng nhập lại.";
        header("Location: login.php?error=" . urlencode($error));
    }
}


// phần đăng kí 
//  case 'registration':
//         $email = $_POST['email'];
//         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//         $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
//         $run_qry = mysqli_query($conn, $sql);
//         if ($run_qry) {
//             header("location: login.php");
//         }
//         break;
$conn->close();
?>




