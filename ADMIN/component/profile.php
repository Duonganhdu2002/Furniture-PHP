<?php
// Đảm bảo đã xác định người dùng đã đăng nhập và có thông tin đăng nhập



    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy tên đăng nhập của người dùng từ phiên làm việc
    $username = $_SESSION["username"];

    // Truy vấn để lấy thông tin cá nhân từ cơ sở dữ liệu dựa trên tên đăng nhập
    $sql = "SELECT * FROM information WHERE username = '$username' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $full_name = $row["full_name"];
        $date_of_birth = $row["date_of_birth"];
        $email = $row["email"];
        $gender = $row["gender"];
        $phone_number = $row["phone_number"];
        //  $address = $row["address"]; trong bảng information k có 
    } else {
        // Xử lý tài khoản không tồn tại
        echo "không tồn tại admin này!";
        // Có thể hiển thị thông báo hoặc thực hiện xử lý khác tùy thuộc vào trường hợp
    }



// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>


<div class="profile">
    <div class="header-profile">
        <div class="left-side">
            <div class="info-emloyee">
                <img class="avatar-emloyee" src="../PUBLIC-PAGE/images/person-1.jpg" alt="">
            </div>
            <div class="name-employee">
                <h1><?php echo $full_name; ?></h1>
            </div>
        </div>
        <div class="right-side">
            <button class="button-edit">Edit</button>
        </div>
    </div>
    <div class="personality-information">
        <h2>Thông tin cá nhân</h2>
    </div>
    <div class="detail-information">
        <div class="detail">
            <h3>Tài khoản</h3>
            <p><?php echo $username; ?></p>
            <h3>Ngày sinh</h3>
            <p><?php echo $date_of_birth; ?></p>
            <h3>Email</h3>
            <p><?php echo $email; ?></p>
        </div>
        <div class="detail">
            <h3>Giới tính</h3>
            <p><?php echo $gender; ?></p>
            <h3>Số điện thoại</h3>
            <p><?php echo $phone_number; ?></p>
            <h3>Địa chỉ</h3>
            <p><?php //echo $address; 
                ?></p>
        </div>
    </div>
</div>



<style>
    .profile {
        padding-left: 200px;
        padding-right: 50px;
        padding-top: 30px;
    }

    .header-profile {
        display: flex;
    }

    .right-side {
        width: 100%;
        height: 5%;
        display: flex;
    }

    .button-edit {
        margin-left: 90%;
        width: 70px;
        height: 40px;
        color: #F0F7FF;
        cursor: pointer;
        font-size: 1em;
        background: #3b5d50;
        border: none;
        border-radius: 5px;
    }

    .profile .header-profile .left-side {
        width: 100%;
        height: 30%;
        display: flex;
        align-items: center;
    }

    .detail-information {
        width: 100%;
        height: 70%;
        display: flex;
    }

    .profile .header-profile .left-side .info-emloyee {
        width: 30%;
        height: 100%;
        display: flex;
        align-items: center;
        position: relative;
    }

    .profile .header-profile .left-side .name-employee {
        margin-left: 20px;
    }

    .detail-information .detail {
        width: 50%;
        height: 100%;
        line-height: 1.5;

    }

    .detail-information .detail h3,
    p {
        opacity: 0.8;
    }

    .avatar-emloyee {
        width: 190px;
        height: 190px;
        border-radius: 100%;
        display: flex;
        margin: auto;
        position: relative;

    }
</style>

</html>