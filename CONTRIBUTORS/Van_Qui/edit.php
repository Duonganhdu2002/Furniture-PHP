<?php

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$username = $_SESSION["username_user"];

if (!isset($_SESSION["username_user"])) {
    echo "
    <script>
        alert('Bạn cần phải đăng nhập trước.');
        window.location.href = 'index.php';
    </script>";
    exit;
}



// Lấy tên đăng nhập của người dùng từ phiên làm việc
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    

    $id = "";
    $customerUserName = "";
    $customerName = "";
    $customerEmail = "";
    $customerPhone = "";
    $customerPassword = "";
    $customerBirth = "";
    $customerGender = "";
    $customerAvatar = "";
    $customerAddressNumber = "";
    $customerAddressStreet = "";
    $customerAddressCommune = "";
    $customerAddressDistrict = "";
    $customerAddressProvince = "";
    $customerAddressCountry = "";

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!isset($_GET["id"])) {
            echo "No customer ID has been chosen";
            exit;
        }

        $id = $_GET["id"];

        $sql = "SELECT * FROM information WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Additional data from 'addresses' table
        $sqlAddresses = "SELECT * FROM addresses WHERE id = ?";
        $stmtAddresses = $conn->prepare($sqlAddresses);
        $stmtAddresses->bind_param("i", $id);
        $stmtAddresses->execute();
        $resultAddresses = $stmtAddresses->get_result();
        $rowAddresses = $resultAddresses->fetch_assoc();

        // Additional data from 'users' table
        $sqlUsers = "SELECT * FROM users WHERE id = ?";
        $stmtUsers = $conn->prepare($sqlUsers);
        $stmtUsers->bind_param("i", $id);
        $stmtUsers->execute();
        $resultUsers = $stmtUsers->get_result();
        $rowUsers = $resultUsers->fetch_assoc();


        if (!$row && !$rowUsers && !$rowAddresses) {
            echo "No row";
            exit;
        }

        $customerUserName = $row["username"];
        $customerName = $row["full_name"];
        $customerEmail = $row["email"];
        $customerPhone = $row["phone_number"];
        $customerPassword = $rowUsers["password"]; 
        $customerBirth = $row["date_of_birth"];
        $customerGender = $row["gender"];
        $customerAvatar = $row["avatar"];
        $customerAddressNumber = $rowAddresses["number"]; 
        $customerAddressStreet = $rowAddresses["street"]; 
        $customerAddressCommune = $rowAddresses["commune"]; 
        $customerAddressDistrict = $rowAddresses["district"]; 
        $customerAddressProvince = $rowAddresses["province"]; 
        $customerAddressCountry = $rowAddresses["country"]; 
    } else {

        $id = $_POST["id"];
        $customerUserName = $_POST["customerUserName"];
        $customeName = $_POST["customerName"];
        $customerEmail = $_POST["customerEmail"];
        $customerPhone = $_POST["customerPhone"];
        $customerPassword = $_POST["customerPassword"];
        $customerBirth = $_POST["customerBirth"];
        $customerGender = $_POST["customerGender"];
        $customerAvatar = $_FILES["customerAvatar "]["name"];
        $customerAddressNumber = $_POST["customerAddressNumber"];
        $customerAddressStreet = $_POST["customerAddressStreet"];
        $customerAddressCommune = $_POST["customerAddressCommune"];
        $customerAddressDistrict = $_POST["customerAddressDistrict"];
        $customerAddressProvince = $_POST["customerAddressProvince"];
        $customerAddressCountry = $_POST["customerAddressCountry"];

        do {
            if (
                empty($customerUserName) || empty($customerName) || empty($customerEmail) || empty($customerPhone) || empty($customerPassword) || empty($customerBirth)
                || empty($customerGender) || empty($customerAvatar) || empty($customerAddressNumber) || empty($customerAddressStreet) || empty($customerAddressCommune)
                || empty($customerAddressCommune) || empty($customerAddressDistrict) || empty($customerAddressProvince) || empty($customerAddressCountry)
            ) {
                $message = "All the fields are required";
                break;
            }
            // Xử lí ảnh
            if ($_FILES["customerAvatar"]["error"] !== UPLOAD_ERR_OK) {
                switch ($_FILES["customerAvatar"]["error"]) {
                    case UPLOAD_ERR_PARTIAL:
                        exit("File only partially uploaded");
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        exit("No file was uploaded");
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        exit("File upload stopped by a PHP extension");
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        exit("File exceeds MAX_FILE_SIZE in the HTML form");
                        break;
                    case UPLOAD_ERR_INI_SIZE:
                        exit("File exceeds upload_max_filesize in php.ini");
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        exit("Temporaray folder not found");
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        exit("Failed to write file");
                        break;
                    default:
                        exit("Unknown uploaded file");
                        break;
                }
            }

            // Tối đa kích thuớc ảnh 1MB đảm bảo ảnh load nhanh 

            if ($_FILES["customerAvatar"]["size"] > 1048576) {
                exit("File too large (max 1MB).");
            }

            $fileName = $_FILES["customerAvatar"]["name"];

            $destination = __DIR__ . "/../../../PUBLIC-PAGE/images/chairs/" . $fileName;

            // Thông báo nếu không lưu được ảnh vào đường dẫn 
            if (!is_uploaded_file($_FILES["customerAvatar"]["tmp_name"])) {
                exit("Invalid file upload");
            }

            // Update in 'information' table
            $sqlInformation = "UPDATE information SET username = ?, full_name = ?, date_of_birth = ?, email = ?, gender = ?, phone_number = ?, avatar = ?   WHERE id = ? ";
            $stmtInformation = $conn->prepare($sqlInformation);
            $stmtInformation->bind_param("ssi", $customerUserName, $customeName, $customerBirth, $customerEmail, $customerGender, $customePhone, $customerAvatar, $id);
            $resultInformation = $stmtInformation->execute();

            // Update in 'addresses' table
            $sqlAddresses = "UPDATE addresses SET username = ?, number = ?, street = ?, commune = ?, district = ?, province = ?, country = ?  WHERE id = ?";
            $stmtAddresses = $conn->prepare($sqlAddresses);
            $stmtAddresses->bind_param("si", $customerUserName, $customerAddressStreet, $customerAddressCommune, $customerAddressDistrict, $customerAddressProvince, $customerAddressCountry, $id);
            $resultAddresses = $stmtAddresses->execute();

            // Update in 'users' table
            $sqlUsers = "UPDATE users SET username = ?, password = ?,  WHERE id = ?";
            $stmtUsers = $conn->prepare($sqlUsers);
            $stmtUsers->bind_param("si", $customerUserName, $customerPassword, $id);
            $resultUsers = $stmtUsers->execute();

            if (!$resultInformation || !$resultAddresses || !$resultUsers) {
                $message = "Invalid query: " . $stmtInformation->error . $stmtAddresses->error . $stmtUsers->error;
                break;
            } else {
                header("location: index.php?pid=5");
                $message = "Customer updated correctly";
                exit;
            }
        } while (false);
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
        <label for="customerName"> Full name: </label>
        <input type="text" name="customerName" value="<?php echo $customerName; ?>">
        <br>
        <label for="customerAvatar">customerAvatar:</label>
        <input style="border: none;" type="file" id="customerAvatar" name="customerAvatar">
        <br>
        <label for="">Information</label>
        <br>
        <label for="">Username:</label>
        <input type="text" name="customerUserName" value="<?php echo $customerUserName; ?>">
        <label for="">Date of birth:</label>
        <input type="date" name="customerBirth" value="<?php echo $customerBirth; ?>">
        <br>
        <label for="">Email:</label>
        <input type="text" name="customerEmail" value="<?php echo $customerEmail; ?>">
        <label for="">Gender:</label>
        <select name="customerGender">
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select>
        <br>
        <label for="">Phone number:</label>
        <input type="text" name="customerPhone" value="<?php echo $customerPhone; ?>">
        <br>
        <label for="">Address</label>
        <br>
        <label for="">Country:</label>
        <input type="text" name="customerAddressCountry" value="<?php echo $customerAddressCountry; ?>">
        <label for="">Province:</label>
        <input type="text" name="customerAddressProvince" value="<?php echo $customerAddressProvince; ?>">
        <br>
        <label for="">District:</label>
        <input type="text" name="customerAddressDistrict" value="<?php echo $customerAddressDistrict; ?>">
        <label for="">Commune:</label>
        <input type="text" name="customerAddressCommune" value="<?php echo $customerAddressCommune; ?>">
        <br>
        <label for="">Street:</label>
        <input type="text" name="customerAddressStreet" value="<?php echo $customerAddressStreet; ?>">
        <label for="">Number:</label>
        <input type="text" name="customerAddressNumber" value="<?php echo $customerAddressNumber; ?>">
        <br>
        <div>
            <button type="submit">Change</button>
            <a style="text-decoration: none;">
                <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=11';">Back</button>
            </a>
        </div>
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

<div style="display: flex; justify-content: center; margin-bottom: 150px; margin-top: 100px; background-color: #ffffff; height: 600px">
    <form action="../PUBLIC-PAGE/component/ctrl_edit_profile.php" method="post">
        <label for="customerName"> Full name: </label>
        <input type="text" name="customerName" value="<?php echo $customerName; ?>">
        <br>
        <!-- <label for="customerAvatar">customerAvatar:</label>
        <input style="border: none;" type="file" id="customerAvatar" name="customerAvatar"> -->
        <br>
        <label for="">Information</label>
        <br>
        <label for="">Username:</label>
        <input type="text" name="username" value="<?php echo $customerUserName; ?>">
        <label for="">Date of birth:</label>
        <input type="date" name="customerBirth" value="<?php echo $customerBirth; ?>">
        <br>
        <label for="">Email:</label>
        <input type="text" name="customerEmail" value="<?php echo $customerEmail; ?>">
        <label for="">Gender:</label>
        <select name="customerGender">
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select>
        <br>
        <label for="">Phone number:</label>
        <input type="text" name="customerPhone" value="<?php echo $customerPhone; ?>">
        <br>
        <label for="">Address</label>
        <br>
        <label for="">Country:</label>
        <input type="text" name="customerAddressCountry" value="<?php echo $customerAddressCountry; ?>">
        <label for="">Province:</label>
        <input type="text" name="customerAddressProvince" value="<?php echo $customerAddressProvince; ?>">
        <br>
        <label for="">District:</label>
        <input type="text" name="customerAddressDistrict" value="<?php echo $customerAddressDistrict; ?>">
        <label for="">Commune:</label>
        <input type="text" name="customerAddressCommune" value="<?php echo $customerAddressCommune; ?>">
        <br>
        <label for="">Street:</label>
        <input type="text" name="customerAddressStreet" value="<?php echo $customerAddressStreet; ?>">
        <label for="">Number:</label>
        <input type="text" name="customerAddressNumber" value="<?php echo $customerAddressNumber; ?>">
        <br>
        <div>
            <button type="submit">Change</button>
            <a style="text-decoration: none;">
                <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=11';">Back</button>
            </a>
        </div>
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



<?php

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$username = $_SESSION["username_user"];

$customerUserName = $_POST["username"];
$customerName = $_POST["customerName"];
$customerEmail = $_POST["customerEmail"];
$customerPhone = $_POST["customerPhone"];
$customerBirth = $_POST["customerBirth"];
$customerGender = $_POST["customerGender"];
// $customerAvatar = $_FILES["customerAvatar"]["name"];
$customerAddressNumber = $_POST["customerAddressNumber"];
$customerAddressStreet = $_POST["customerAddressStreet"];
$customerAddressCommune = $_POST["customerAddressCommune"];
$customerAddressDistrict = $_POST["customerAddressDistrict"];
$customerAddressProvince = $_POST["customerAddressProvince"];
$customerAddressCountry = $_POST["customerAddressCountry"];

$message = "";

do {
    if (
        empty($customerUserName) || empty($customerName) || empty($customerEmail) || empty($customerPhone) || empty($customerBirth)
        || empty($customerGender)  || empty($customerAddressNumber) || empty($customerAddressStreet) || empty($customerAddressCommune)
        || empty($customerAddressDistrict) || empty($customerAddressProvince) || empty($customerAddressCountry)
    ) {
        $message = "All the fields are required";
        break;
    }


    
   $sqlInformation = "UPDATE information SET username = ?, full_name = ?, date_of_birth = ?, email = ?, gender = ?, phone_number = ? WHERE username = ?";
   $stmtInformation = $conn->prepare($sqlInformation);
   $stmtInformation->bind_param("ssssiss",$customerUserName, $customerName, $customerBirth, $customerEmail, $customerGender, $customerPhone, $customerUserName);
   $resultInformation = $stmtInformation->execute();

   // Update in 'addresses' table
   $sqlAddresses = "UPDATE addresses SET username = ?, number = ?, street = ?, commune = ?, district = ?, province = ?, country = ? WHERE username = ?";
   $stmtAddresses = $conn->prepare($sqlAddresses);
   $stmtAddresses->bind_param("ssssssss",$customerUserName, $customerAddressNumber, $customerAddressStreet, $customerAddressCommune, $customerAddressDistrict, $customerAddressProvince, $customerAddressCountry, $customerUserName);
   $resultAddresses = $stmtAddresses->execute();

   // Update in 'users' table
   $sqlUsers = "UPDATE users SET username = ?  WHERE username = ? ";
   $stmtUsers = $conn->prepare($sqlUsers);
   $stmtUsers->bind_param("ss", $customerUserName,$customerUserName);
   $resultUsers = $stmtUsers->execute();

   if (!$resultInformation || !$resultAddresses || !$resultUsers) {
       $message = "Invalid query: " . $stmtInformation->error . $stmtAddresses->error . $stmtUsers->error;
       break;
   } else {
       header("location: ../index.php?pid=11");
       $message = "Customer updated correctly";
       exit;
   }
} while (false);

?>






<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra sự tồn tại của session
$username = isset($_SESSION["username_user"]) ? $_SESSION["username_user"] : "";

if (empty($username)) {
    echo "<script>alert('Session không tồn tại.');</script>";
    exit;
}

// Lấy dữ liệu từ form
$customerUserName = $_POST["username"];
$customerName = $_POST["customerName"];
$customerEmail = $_POST["customerEmail"];
$customerPhone = $_POST["customerPhone"];
$customerBirth = $_POST["customerBirth"];
$customerGender = $_POST["customerGender"];
$customerAddressNumber = $_POST["customerAddressNumber"];
$customerAddressStreet = $_POST["customerAddressStreet"];
$customerAddressCommune = $_POST["customerAddressCommune"];
$customerAddressDistrict = $_POST["customerAddressDistrict"];
$customerAddressProvince = $_POST["customerAddressProvince"];
$customerAddressCountry = $_POST["customerAddressCountry"];

$message = "";

// Kiểm tra dữ liệu từ form
if (
    empty($customerUserName) || empty($customerName) || empty($customerEmail) || empty($customerPhone) || empty($customerBirth)
    || empty($customerGender)  || empty($customerAddressNumber) || empty($customerAddressStreet) || empty($customerAddressCommune)
    || empty($customerAddressDistrict) || empty($customerAddressProvince) || empty($customerAddressCountry)
) {
    $message = "All the fields are required";
} else {
    // Kiểm tra xem `username` mới có sẵn trong cơ sở dữ liệu hay không
    $checkUsernameQuery = "SELECT * FROM users WHERE username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $customerUserName);
    $checkUsernameStmt->execute();
    $checkUsernameResult = $checkUsernameStmt->get_result();

    if ($checkUsernameResult->num_rows > 0) {
        $message = "Username already exists";
    } else {
        // Cập nhật thông tin người dùng
        $sqlInformation = "UPDATE information SET username = ?, full_name = ?, date_of_birth = ?, email = ?, gender = ?, phone_number = ? WHERE username = ?";
        $stmtInformation = $conn->prepare($sqlInformation);
        $stmtInformation->bind_param("ssssiss", $customerUserName, $customerName, $customerBirth, $customerEmail, $customerGender, $customerPhone, $username);
        $resultInformation = $stmtInformation->execute();

        // Cập nhật địa chỉ người dùng
        $sqlAddresses = "UPDATE addresses SET username = ?, number = ?, street = ?, commune = ?, district = ?, province = ?, country = ? WHERE username = ?";
        $stmtAddresses = $conn->prepare($sqlAddresses);
        $stmtAddresses->bind_param("ssssssss", $customerUserName, $customerAddressNumber, $customerAddressStreet, $customerAddressCommune, $customerAddressDistrict, $customerAddressProvince, $customerAddressCountry, $username);
        $resultAddresses = $stmtAddresses->execute();

        // Cập nhật username trong bảng users
        $sqlUsers = "UPDATE users SET username = ? WHERE username = ?";
        $stmtUsers = $conn->prepare($sqlUsers);
        $stmtUsers->bind_param("ss", $customerUserName, $username);
        $resultUsers = $stmtUsers->execute();

        if (!$resultInformation || !$resultAddresses || !$resultUsers) {
            $message = "Invalid query: " . $stmtInformation->error . $stmtAddresses->error . $stmtUsers->error;
        } else {
            $message = "Customer updated correctly";
            header("location: ../index.php?pid=11");
            exit;
        }
    }
}

// Hiển thị thông báo
echo "<script>alert('$message');</script>";
?>
