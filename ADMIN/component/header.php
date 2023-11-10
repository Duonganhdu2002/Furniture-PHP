<?php 
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy tên đăng nhập của người dùng từ phiên làm việc
$username = $_SESSION["username_admin"];

// Truy vấn thông tin cá nhân từ bảng Information dựa trên tên đăng nhập
$sqlInformation = "SELECT * FROM information WHERE username = '$username' ";
$resultInformation = $conn->query($sqlInformation);

if ($resultInformation->num_rows > 0) {
    $row = $resultInformation->fetch_assoc();
    $full_name = $row["full_name"];
    $avatar = $row["avatar"];
}

?>

<div class="header">
    <span><?php echo $full_name ?></span>
    <img class="bell" src="../PUBLIC-PAGE/images/bell.svg" alt="">
    <a href="index.php?pid=8">
    <img class="avatar" src="../PUBLIC-PAGE/images/<?php echo $avatar ?>" alt="">
    </a>
</div>

<style>
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
</style>