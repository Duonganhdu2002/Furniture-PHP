<?php

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra sự tồn tại của session
$username = $_SESSION["username_user"];

if (empty($username)) {
    echo "<script>alert('Session không tồn tại.');</script>";
    exit;
}
// Lấy tên đăng nhập của người dùng từ phiên làm việc
if (isset($_SESSION["username_user"])) {


    // Lấy thông tin cá nhân từ bảng Information
    $sqlInformation = "SELECT * FROM information WHERE username = ?";
    $stmtInformation = $conn->prepare($sqlInformation);
    $stmtInformation->bind_param("s", $username);
    $stmtInformation->execute();
    $resultInformation = $stmtInformation->get_result();

    if ($resultInformation->num_rows > 0) {
        $row = $resultInformation->fetch_assoc();
        $customerName = $row["full_name"];
        $customerEmail = $row["email"];
        $customerPhone = $row["phone_number"];
        $customerBirth = $row["date_of_birth"];
        $customerGender = $row["gender"];
        $customerAvatar = $row["avatar"];
    }

    // Lấy thông tin địa chỉ từ bảng Addresses
    $sqlAddress = "SELECT * FROM addresses WHERE username = ?";
    $stmtAddress = $conn->prepare($sqlAddress);
    $stmtAddress->bind_param("s", $username);
    $stmtAddress->execute();
    $resultAddress = $stmtAddress->get_result();

    if ($resultAddress->num_rows > 0) {
        $rowAddresses = $resultAddress->fetch_assoc();
        $id =  $rowAddresses["id"];
        $customerAddressNumber = $rowAddresses["number"];
        $customerAddressStreet = $rowAddresses["street"];
        $customerAddressCommune = $rowAddresses["commune"];
        $customerAddressDistrict = $rowAddresses["district"];
        $customerAddressProvince = $rowAddresses["province"];
        $customerAddressCountry = $rowAddresses["country"];

        $address = "$customerAddressNumber, $customerAddressStreet, $customerAddressCommune, $customerAddressDistrict, $customerAddressProvince, $customerAddressCountry";
    } else {
        // Xử lý theo yêu cầu của bạn nếu không có thông tin địa chỉ
        $address = "Không có địa chỉ";
    }
} else {
    echo "
    <script>
        alert('Bạn cần phải đăng nhập trước.');
        window.location.href = 'index.php';
    </script>";
    exit;
}
?>

<div style="display: flex; justify-content: center; margin-bottom: 150px; margin-top: 100px; background-color: #ffffff; height: 600px">
    <div class="profile">
        <div class="header-profile">
            <div class="left-side">
                <div class="info-emloyee">
                    <img class="avatar-emloyee" src="../PUBLIC-PAGE/images/<?php echo $customerAvatar ?>" alt="">
                </div>
                <div class="name-employee">
                    <h1><?php echo $customerName; ?></h1>
                </div>
            </div>
            <div class="right-side">
                <a href="index.php?pid=13">
                    <button style="margin-right: 20px" class="button-edit">History order</button>
                </a>
                <button class="button-edit" onclick="editProfile(<?php echo $id ?>)">Edit</button>
            </div>
        </div>
        <div class="personality-information">
            <h2>Information</h2>
        </div>
        <div class="detail-information">
            <div class="detail" style="border-right: 2px solid gray;">
                <h3>Username</h3>
                <p><?php echo $username; ?></p>
                <h3>Date of birth</h3>
                <p><?php echo $customerBirth; ?></p>
                <h3>Email</h3>
                <p><?php echo $customerEmail; ?></p>
            </div>
            <div class="detail" style="padding-left: 100px">
                <h3>Gender</h3>
                <p>
                    <?php
                    echo ($customerGender == 1) ? "Male" : "Female";
                    ?>
                </p>
                <h3>Phone number</h3>
                <p><?php echo $customerPhone; ?></p>
                <h3>Address</h3>
                <p><?php echo $address; ?></p>
            </div>
        </div>
    </div>
</div>

<script>
    function editProfile(pr5_id) {
        window.location.href = '../PUBLIC-PAGE/index.php?pid=11&edit';
    }

    window.addEventListener('beforeunload', function() {
        sessionStorage.setItem('scrollPosition', window.scrollY);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var scrollPosition = sessionStorage.getItem('scrollPosition');

        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
            sessionStorage.removeItem('scrollPosition'); // Xóa vị trí đã lưu
        }
    });
</script>

<style>
    .profile {
        padding-left: 200px;
        padding-right: 50px;
        padding-top: 30px;
        width: 68%;
    }

    .header-profile {
        display: flex;
    }

    .left-side {
        width: 70%;
    }

    .right-side {
        width: 30%;
        display: flex;
    }

    .button-edit {
        width: fit-content;
        height: 40px;
        padding: 10px 20px 10px 20px;
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
        height: 65%;
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
        height: 80%;
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