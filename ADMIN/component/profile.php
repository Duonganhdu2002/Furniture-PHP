<?php

// Đảm bảo đã xác định người dùng đã đăng nhập và có thông tin đăng nhập

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
    $date_of_birth = $row["date_of_birth"];
    $email = $row["email"];
    $gender = $row["gender"];
    $phone_number = $row["phone_number"];
    $avatar = $row["avatar"];
}

$sqlAddress = "SELECT * FROM addresses WHERE username = '$username' ";
$resultAddress = $conn->query($sqlAddress);

if ($resultAddress->num_rows > 0) {
    $row = $resultAddress->fetch_assoc();
    $province = $row["province"];
    $district = $row["district"];
    $commune = $row["commune"];
    $street = $row["street"];
    $number = $row["number"];
}

$address = "$number, $street, $commune, $district, $province";

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>


<div class="profile">
    <div class="header-profile">
        <div class="left-side">
            <div class="info-emloyee">
                <img class="avatar-emloyee" src="../PUBLIC-PAGE/images/<?php echo $avatar?>" alt="">
            </div>
            <div class="name-employee">
                <h1><?php echo $full_name; ?></h1>
            </div>
        </div>
        <div class="right-side">
            <button class="button-edit">Edit</button>
        </div>
        <div >
                <a href="../ADMIN/logout.php"><button type="submit" name="logout" class="logout-button">Logout</button></a>
        </div>

    </div>
    <div class="personality-information">
        <h2>Information</h2>
    </div>
    <div class="detail-information">
        <div class="detail">
            <h3>Username</h3>
            <p><?php echo $username; ?></p>
            <h3>Date of birth</h3>
            <p><?php echo $date_of_birth; ?></p>
            <h3>Email</h3>
            <p><?php echo $email; ?></p>
        </div>
        <div class="detail">
            <h3>Gender</h3>
            <p>
                <?php
                if ($gender == 1) {
                    echo "Male";
                } else {
                    echo "Female";
                }
                ?>
            </p>
            <h3>Phone number</h3>
            <p><?php echo $phone_number; ?></p>
            <h3>Address</h3>
            <p>
                <?php 
                    echo $address;
                ?>
            </p>
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

    .logout-button {
        margin-left: 20%;
        width: 70px;
        height: 40px;
        color: #F0F7FF;
        cursor: pointer;
        font-size: 1em;
        background: #9c3b3b;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }
</style>

</html>