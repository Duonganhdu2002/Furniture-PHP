<?php

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$username = $_SESSION["username_user"];

// Lấy tên đăng nhập của người dùng từ phiên làm việc
if (isset($_SESSION["username_user"])) {
    // Truy vấn thông tin cá nhân từ bảng Information dựa trên tên đăng nhập
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
        $image = $row["avatar"];
    }

    // Truy vấn địa chỉ từ bảng Addresses dựa trên tên đăng nhập
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
    }

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
} else {

    echo "
    <script>
        alert('Bạn cần phải đăng nhập trước.');
        window.location.href = 'index.php';
    </script>";
    exit();
}
?>

<p style="font-size: x-large; margin-top: 60px; margin-bottom:-70px; margin-left: 300px">Edit Profile:</p>
<div style="display: flex; margin-bottom: 150px; margin-top: 100px; background-color: #ffffff; width:600px; margin-left: 300px; padding:50px; border: solid 1px rgba(128, 128, 128, 0.5);">
    <form action="../PUBLIC-PAGE/component/ctrl_edit_profile.php" method="post" class="form-edit-profile">
        <div class="second-child">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="image" style="font-size: large;">Customer Avatar:</label>
            <input type="file" id="image" name="image" style="padding: 12px 5px 5px 20px; border:none">
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <label for="customerName" class="form-edit-profile-label"> Full name:</label>
                    <input type="text" name="customerName" value="<?php echo $customerName; ?>">
                </div>
                <div>
                    <label for="" class="form-edit-profile-label">Username: </label>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="">
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 28%;">
                    <label for="" class="form-edit-profile-label">Date of birth:</label>
                    <input type="date" name="customerBirth" value="<?php echo $customerBirth; ?>">
                </div>
                <div style="width: 28%;">
                    <label for="" class="form-edit-profile-label">Gender:</label>
                    <select name="customerGender">
                        <option value="1" <?php echo ($customerGender == 1) ? 'selected' : ''; ?>>Male</option>
                        <option value="2" <?php echo ($customerGender == 2) ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
                    <div style="width: 28%;">
                        <label for="" class="form-edit-profile-label">Phone number:</label>
                        <input type="text" name="customerPhone" value="<?php echo $customerPhone; ?>">
                    </div>
                </div>
                <label for="" class="form-edit-profile-label">Email:</label>
                <input type="text" name="customerEmail" value="<?php echo $customerEmail; ?>">
                <div style="display: flex; justify-content: space-between;">
                    <div style="width: 28%;">
                        <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Country:</label>
                        <input type="text" name="customerAddressCountry" value="<?php echo $customerAddressCountry; ?>">
                    </div>
                    <div style="width: 28%;">
                        <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Province:</label>
                        <input type="text" name="customerAddressProvince" value="<?php echo $customerAddressProvince; ?>">
                    </div>
                    <div style="width: 28%;">
                        <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">District:</label>
                        <input type="text" name="customerAddressDistrict" value="<?php echo $customerAddressDistrict; ?>">
                    </div>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <div style="width: 28%;">
                        <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Commune:</label>
                        <input type="text" name="customerAddressCommune" value="<?php echo $customerAddressCommune; ?>">
                    </div>
                    <div style="width: 28%;">
                        <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Street:</label>
                        <input type="text" name="customerAddressStreet" value="<?php echo $customerAddressStreet; ?>">
                    </div>
                    <div style="width: 28%;">
                        <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Number:</label>
                        <input type="text" name="customerAddressNumber" value="<?php echo $customerAddressNumber; ?>">
                    </div>
                </div>

            </div>
            <div class="button-save-back-profile">
                <button type="submit" class="button-1">Change</button>
                <a style="text-decoration: none;">
                    <button type="button" class="button-2" onclick="window.location.href='index.php?pid=11';">Back</button>
                </a>
            </div>
        </div>

    </form>
</div>

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

    .right-side {
        width: 100%;
        height: 5%;
        display: flex;
    }

    .button-save {
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

    .form-edit-profile {
        width: 100%;
    }

    .form-edit-profile-label {
        font-size: large;
        margin-bottom: 10px;
        display: flex;
    }

    .form-edit-profile input {
        font-size: large;
        width: 100%;
        height: 35px;
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 5px 5px 5px 20px;
        border: solid 1px rgba(128, 128, 128, 0.5);
    }

    .form-edit-profile select {
        font-size: large;
        width: 115%;
        height: 47px;
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 5px 5px 5px 20px;
        border: solid 1px rgba(128, 128, 128, 0.5);
    }

    .button-save-back-profile {
        margin-top: 20px;
        text-align: right;
        width: 100%;
        display: flex;
        margin-left: 50%;
    }

    .button-save-back-profile button {
        display: flexbox;
        width: 120px;
        height: 50px;
        margin-left: 20px;
        border: 0;
        border-radius: 10px;
        background: #000000;
        color: #ffffff;
        font-size: 1em;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.2s ease-in-out;
    }

    .button-save-back-profile .button-2 {
        background: #970000;
    }

    .button-save-back-profile button:hover {
        background-color: #f9bf29;
        /* opacity: 0.8; */
    }

    .button-save-back-profile .button-2:hover {
        background-color: #ff4646;
    }

    .button-save-back-profile button:active {
        opacity: 0.6;
    }

    .second-child {
        justify-content: space-between;
        width: 93%;
    }
</style>

<script>
    function saveProfile(pr5_id) {
        window.location.href = '../PUBLIC-PAGE/index.php?pid=11&edit' + pr5_id;
    }

    //Giữ nguyên tại vị trí đã cuộn
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

</html>