<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username_user"])) {
    echo "<script>alert('Session không tồn tại.');</script>";
    exit;
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Get the current username from the session
$username = $_SESSION["username_user"];

// Get data from the form
$id = $_POST["id"];
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
$image = $_FILES["image"]["name"];

$message = "";

// Check if any required field is empty
if (
    empty($customerUserName) || empty($customerName) || empty($customerEmail) || empty($customerPhone) || empty($customerBirth)
    || empty($customerGender)  || empty($customerAddressNumber) || empty($customerAddressStreet) || empty($customerAddressCommune)
    || empty($customerAddressDistrict) || empty($customerAddressProvince) || empty($customerAddressCountry) || empty($image)
) {
    $message = "All the fields are required";
} else {

    // Check if the new id already exists
    $checkIdQuery = "SELECT * FROM users WHERE id = ?";
    $checkIdStmt = $conn->prepare($checkIdQuery);
    $checkIdStmt->bind_param("i", $id);
    $checkIdStmt->execute();
    $checkIdResult = $checkIdStmt->get_result();

    // Xử lí ảnh
    if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        switch ($_FILES["image"]["error"]) {
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

    if ($_FILES["image"]["size"] > 1048576) {
        exit("File too large (max 1MB).");
    }

    $fileName = $_FILES["image"]["name"];

    $destination = __DIR__ . "../PUBLIC-PAGE/images/chairs/" . $fileName;

    // Thông báo nếu không lưu được ảnh vào đường dẫn 
    if (!is_uploaded_file($_FILES["image"]["tmp_name"])) {
        exit("Invalid file upload");
    }

    if ($checkIdResult->num_rows > 0) {

        // Update user information
        $sqlInformation = "UPDATE information SET username = ?, full_name = ?, date_of_birth = ?, email = ?, gender = ?, phone_number = ?, avatar = ? WHERE username = ?";
        $stmtInformation = $conn->prepare($sqlInformation);
        $stmtInformation->bind_param("ssssisss", $customerUserName, $customerName, $customerBirth, $customerEmail, $customerGender, $customerPhone, $image, $username);
        $resultInformation = $stmtInformation->execute();

        // Update user address
        $sqlAddresses = "UPDATE addresses SET username = ?, number = ?, street = ?, commune = ?, district = ?, province = ?, country = ? WHERE username = ?";
        $stmtAddresses = $conn->prepare($sqlAddresses);
        $stmtAddresses->bind_param("ssssssss", $customerUserName, $customerAddressNumber, $customerAddressStreet, $customerAddressCommune, $customerAddressDistrict, $customerAddressProvince, $customerAddressCountry, $username);
        $resultAddresses = $stmtAddresses->execute();

        // Update username in the users table
        $sqlUsers = "UPDATE users SET username = ? WHERE username = ?";
        $stmtUsers = $conn->prepare($sqlUsers);
        $stmtUsers->bind_param("ss", $customerUserName, $username);
        $resultUsers = $stmtUsers->execute();

        if (!$resultInformation || !$resultAddresses || !$resultUsers) {
            $message = "Error updating user: " . $stmtInformation->error . $stmtAddresses->error . $stmtUsers->error;
        } else {
            // Update session with new information
            $_SESSION["username_user"] = $customerUserName;
            // Additional information to update in the session can be added here

            $message = "Customer updated correctly";
            header("location: ../index.php?pid=11");
            exit;
        }
    }
}

echo "<script>alert('$message');</script>";
header("location: ../index.php?pid=11&edit");
exit();
