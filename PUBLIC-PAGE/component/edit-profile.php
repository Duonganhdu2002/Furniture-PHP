<?php

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy tên đăng nhập của người dùng từ phiên làm việc
if (isset($_SESSION["username_user"])) {
    $username = $_SESSION["username_user"];

    // Truy vấn thông tin cá nhân từ bảng Information dựa trên tên đăng nhập
    $sqlInformation = "SELECT * FROM information WHERE username = ?";
    $stmtInformation = $conn->prepare($sqlInformation);
    $stmtInformation->bind_param("s", $username);
    $stmtInformation->execute();
    $resultInformation = $stmtInformation->get_result();
    $sqlInformation = "UPDATE information SET * WHERE username = ?";

    if ($resultInformation->num_rows > 0) {
        $row = $resultInformation->fetch_assoc();
        $full_name = $row["full_name"];
        $date_of_birth = $row["date_of_birth"];
        $email = $row["email"];
        $gender = $row["gender"];
        $phone_number = $row["phone_number"];
        $avatar = $row["avatar"];
    }

    // Truy vấn địa chỉ từ bảng Addresses dựa trên tên đăng nhập
    $sqlAddress = "SELECT * FROM addresses WHERE username = ?";
    $stmtAddress = $conn->prepare($sqlAddress);
    $stmtAddress->bind_param("s", $username);
    $stmtAddress->execute();
    $resultAddress = $stmtAddress->get_result();

    if ($resultAddress->num_rows > 0) {
        $row = $resultAddress->fetch_assoc();
        $id = $row["id"];
        $country = $row["country"];
        $province = $row["province"];
        $district = $row["district"];
        $commune = $row["commune"];
        $street = $row["street"];
        $number = $row["number"];

        $address = "$number, $street, $commune, $district, $province, $country";
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
                <form action="" method="post">
                    <label for="full_name"> Full name: </label>
                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    <br>
                    <label for="">Information</label>
                    <br>
                    <label for="">Username:</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <label for="">Date of birth:</label>
                    <input type="date" name="date_of_birth" value="<?php echo $date_of_birth; ?>">
                    <br>
                    <label for="">Email:</label>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <label for="">Gender:</label>
                    <select name="cars">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    </select>
                    <br>
                    <label for="">Phone number:</label>
                    <input type="text" name="phone_number" value="<?php echo $phone_number; ?>">
                    <br>
                    <label for="">Address</label>
                    <br>
                    <label for="">Country:</label>
                    <input type="text" name="country" value="<?php echo $country; ?>">
                    <label for="">Province:</label>
                    <input type="text" name="username" value="<?php echo $province; ?>">
                    <br>
                    <label for="">District:</label>
                    <input type="text" name="username" value="<?php echo $district; ?>">
                    <label for="">Commune:</label>
                    <input type="text" name="username" value="<?php echo $commune; ?>">
                    <br>
                    <label for="">Street:</label>
                    <input type="text" name="username" value="<?php echo $street; ?>">
                    <label for="">Number:</label>
                    <input type="text" name="username" value="<?php echo $number; ?>" >
                    <br>
                    <input type="submit" value="Save">
                    <br>
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
</style>

<script>
    function saveProfile(pr5_id) {
        window.location.href = '../PUBLIC-PAGE/index.php?pid=11&edit=' + pr5_id;
    }
</script>

</html>