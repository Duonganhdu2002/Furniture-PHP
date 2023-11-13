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
        // $customerPassword = $rowUsers["password"]; 
        $customerBirth = $row["date_of_birth"];
        $customerGender = $row["gender"];
        $customerAvatar = $row["avatar"];
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
    exit;
}
?>

<div id="myForm" style="display: flex; justify-content: center; margin-bottom: 150px; margin-top: 100px; background-color: #ffffff; height: 700px">
    <form action="../PUBLIC-PAGE/component/ctrl_edit_profile.php" method="post" class="form-edit-profile">
        
        <div class="form-edit-profile-div-1" style="height: 30%; display:flex; align-items: center; justify-content: center;">
        <label for="customerAvatar" style="font-size: large;">Customer Avatar:</label>
        <input style="margin-left: 30px; margin-bottom:-10px;" type="file" id="customerAvatar" name="customerAvatar">
        </div>
        <div class="form-edit-profile-div-2" style="height: 30%;display:flex; align-items: center;">
        <label for="customerName" style="font-size: x-large;"> Full name:</label>
        <input type="text" name="customerName" style="margin-left: 30px; margin-bottom:0" value="<?php echo $customerName; ?>">
        </div>
        <label for="" style="font-size: x-large; margin-left:30px">Information</label>
        <br>
        <br>
        <div class="form-edit-profile-div-1" style="border-right: 2px solid gray;">
            <div class="form-edit-profile-div-1" style="width: 25%; margin-top:10px; margin-left:30px;">
            <label for="" class="form-edit-profile-label">Username: </label>
            <br>
            <label for="" class="form-edit-profile-label">Date of birth:</label>
            <br>
            <label for="" class="form-edit-profile-label">Email:</label>
            <br>
            <label for="" class="form-edit-profile-label">Gender:</label>
            <br>
            <label for="" class="form-edit-profile-label">Phone number:</label>
            </div>
            <div class="form-edit-profile-div-2" style="width: 60%">
                <input type="text" name="username" value="<?php echo $username; ?>">
                <br>
                <input type="date" name="customerBirth" value="<?php echo $customerBirth; ?>">
                <br>
                <input type="text" name="customerEmail" value="<?php echo $customerEmail; ?>">
                <br>
                <select name="customerGender">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <br>
                <input type="text" name="customerPhone" value="<?php echo $customerPhone; ?>">
            </div>
        
        
        
        </div>
        <div class="form-edit-profile-div-2" style="margin-right: -50px;">
            <div class="form-edit-profile-div-1" style="width: 40%;">
            
            <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Country:</label>
            <input type="text" name="customerAddressCountry" value="<?php echo $customerAddressCountry; ?>">
            <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Province:</label>
            <input type="text" name="customerAddressProvince" value="<?php echo $customerAddressProvince; ?>">
            <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">District:</label>
            <input type="text" name="customerAddressDistrict" value="<?php echo $customerAddressDistrict; ?>">
            </div>

            <div class="form-edit-profile-div-2" style="width: 50%">
            <!-- <label for="" class="form-edit-profile-label" style="margin-top: 21px;"></label> -->
            <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Commune:</label>
            <input type="text" name="customerAddressCommune" value="<?php echo $customerAddressCommune; ?>">
            <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Street:</label>
            <input type="text" name="customerAddressStreet" value="<?php echo $customerAddressStreet; ?>">
            <label for="" class="form-edit-profile-label" style="margin-bottom: 5px">Number:</label>
            <input type="text" name="customerAddressNumber" value="<?php echo $customerAddressNumber; ?>">
            </div>
        </div>
        <div class="button-save-back-profile">
            <button type="submit" class="button-1">Change</button>
            <a style="text-decoration: none;">
                <button type="button" class="button-2" onclick="window.location.href='index.php?pid=11';">Back</button>
            </a>
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

    .form-edit-profile  {
        width: 70%;
        height: 93%;
        margin-top: 25px;
    }

    .form-edit-profile-label {
        font-size: large;
        margin-bottom: 20px;
        display: flex;
    }

    .form-edit-profile input {
        font-size: large;
        width: 220px;
        height: 35px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .form-edit-profile select {
        font-size: large;
        width: 225px;
        height: 35px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .form-edit-profile-div-1 {
        width: 47%;
        height: 45%;
        float: left;
    }
    .form-edit-profile-div-2 {
        width: 52%;
        height: 45%;
        float: right;
    }

    .button-save-back-profile {
        text-align:right;
    }

    .button-save-back-profile button {
        display:flexbox;
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
        background: #dfaaaa;
    }

    .button-save-back-profile button:hover {
        background-color: #f9bf29;
        /* opacity: 0.8; */
    }

    .button-save-back-profile .button-2:hover {
        background-color: #aa0000;
    }

    .button-save-back-profile button:active {
        opacity: 0.6;
    }
</style>

<script>
    function saveProfile(pr5_id) {
        window.location.href = '../PUBLIC-PAGE/index.php?pid=11&edit=' + pr5_id;
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var formElement = document.getElementById('myForm');
            var elementPosition = formElement.getBoundingClientRect().top;
            var offsetPosition = elementPosition + window.scrollY;

            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });
        }, 1000); // Dùng setTimeout để chậm việc cuộn xuống
    });





</script>

</html>