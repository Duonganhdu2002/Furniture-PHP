<?php

$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

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
    $customerPassword = $rowUsers["password"]; // Fix here
    $customerBirth = $row["date_of_birth"];
    $customerGender = $row["gender"];
    $customerAvatar = $row["avatar"];
    $customerAddressNumber = $rowAddresses["number"]; // Fix here
    $customerAddressStreet = $rowAddresses["street"]; // Fix here
    $customerAddressCommune = $rowAddresses["commune"]; // Fix here
    $customerAddressDistrict = $rowAddresses["district"]; // Fix here
    $customerAddressProvince = $rowAddresses["province"]; // Fix here
    $customerAddressCountry = $rowAddresses["country"]; // Fix here
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

?>

<div style="display: flex; align-items: center; flex-direction: column;">
    <div style="width: 68%;" class="customerFormContainer">
        <form class="customerForm" enctype="multipart/form-data" method="post" onsubmit="return submitcustomerForm();">
            <h1>Update customer</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div style="display: flex; justify-content: space-between">
                <div style="width: 15%;">
                    <label for="customerUserName">customer UserName:</label>
                    <input type="text" id="customerUserName" name="customerUserName" value="<?php echo $customerUserName; ?>"><br>
                </div>
                <div style="width: 15%;">
                    <label for="customerName">customer Name:</label>
                    <input type="text" id="customerName" name="customerName" value="<?php echo $customerName; ?>"><br>
                </div>
                <div style="width: 15%;">
                    <label for="customerEmail">customerEmail</label>
                    <input type="text" id="customerEmail" name="customerEmail" value="<?php echo $customerEmail; ?>"><br>
                </div>
                <div style="width: 15%;">
                    <label for="customerPhone">customerPhone:</label>
                    <input type="number" id="customerPhone" name="customerPhone" value="<?php echo $customerPhone; ?>"><br>
                </div>
                <div style="width: 15%;">
                    <label for="customerPassword">customerPassword</label>
                    <input type="number" id="customerPassword" name="customerPassword" value="<?php echo $customerPassword; ?>"><br>
                </div>
                <div>
                    <label for="customerGender">customerGender:</label>
                    <select id="customerGender" name="customerGender">
                        <?php
                        $genderSql = "SELECT id, gender FROM information";
                        $genderResult = $conn->query($genderSql);

                        if ($genderResult->num_rows > 0) {
                            while ($row = $genderResult->fetch_assoc()) {
                                $selected = ($row['id'] == $customerGender) ? 'selected' : '';
                                echo "<option value='" . $row['id'] . "' $selected>" . $row['gender'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                </div>

                <label for="customerAvatar">customerAvatar:</label>
                <input style="border: none;" type="file" id="customerAvatar" name="customerAvatar"><br>

                <div style="width: 5%;">
                    <label for="customerAddressNumber">customerAddressNumber</label>
                    <input type="number" id="customerAddressNumber" name="customerAddressNumber" value="<?php echo $customerAddressNumber; ?>"><br>
                </div>
                <div style="width: 5%;">
                    <label for="customerAddressStreet">customerAddressStreet</label>
                    <input type="number" id="customerAddressStreet" name="customerAddressStreet" value="<?php echo $customerAddressStreet; ?>"><br>
                </div>
                <div style="width: 5%;">
                    <label for="customerAddressCommune">customerAddressCommune</label>
                    <input type="number" id="customerAddressCommune" name="customerAddressCommune" value="<?php echo $customerAddressCommune; ?>"><br>
                </div>
                <div style="width: 5%;">
                    <label for="customerAddressDistrict">customerAddressDistrict</label>
                    <input type="number" id="customerAddressDistrict" name="customerAddressDistrict" value="<?php echo $customerAddressDistrict; ?>"><br>
                </div>
                <div style="width: 5%;">
                    <label for="customerAddressProvince">customerAddressProvince</label>
                    <input type="number" id="customerAddressProvince" name="customerAddressProvince" value="<?php echo $customerAddressProvince; ?>"><br>
                </div>
                <div style="width: 5%;">
                    <label for="customerAddressCountry">customerAddressCountry</label>
                    <input type="number" id="customerAddressCountry" name="customerAddressCountry" value="<?php echo $customerAddressCountry; ?>"><br>
                </div>

                <div>
                    <button type="submit">Change</button>
                    <a style="text-decoration: none;">
                        <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=5';">Back</button>
                    </a>
                </div>
        </form>
    </div>
</div>
<style>
    .customerFormContainer h1 {
        color: #3b5d50;
        justify-content: space-between;
    }

    .customerFormContainer input {
        width: 99%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .customerFormContainer textarea {
        resize: none;
        width: 99%;
        height: 150px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
        border: 1px solid #3b5d50;
    }

    .customerFormContainer label {
        margin-top: 20px;
        margin-bottom: 20px;
        line-height: 4.0;
    }

    .customerFormContainer button {
        width: 80px;
        height: 40px;
        border: none;
        border-radius: 5px;
        background-color: #3b5d50;
        color: white;
        font-size: 16px;
        margin-top: 30px;
    }
</style>