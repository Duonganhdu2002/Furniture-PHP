<?php
session_start();
$username = $_SESSION["username_user"];

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
            // Cập nhật session với thông tin mới
            $_SESSION["username_user"] = $customerUserName;
            // Các thông tin khác cần cập nhật trong session cũng có thể thêm vào đây
    
            $message = "Customer updated correctly";
            header("location: ../index.php?pid=11");
            exit;
        }
    }
}

// Hiển thị thông báo
echo "<script>alert('$message');</script>";
?>
