<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

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

$message = "";

// Check if any required field is empty
if (
    empty($customerUserName) || empty($customerName) || empty($customerEmail) || empty($customerPhone) || empty($customerBirth)
    || empty($customerGender)  || empty($customerAddressNumber) || empty($customerAddressStreet) || empty($customerAddressCommune)
    || empty($customerAddressDistrict) || empty($customerAddressProvince) || empty($customerAddressCountry)
) {
    $message = "All the fields are required";
} else {
    // Check if the new username already exists
    $checkIdQuery = "SELECT * FROM users WHERE id = ?";
    $checkIdStmt = $conn->prepare($checkIdQuery);
    $checkIdStmt->bind_param("i", $id);
    $checkIdStmt->execute();
    $checkIdResult = $checkIdStmt->get_result();

    if ($checkIdResult->num_rows > 0) {
        
        // Update user information
        $sqlInformation = "UPDATE information SET username = ?, full_name = ?, date_of_birth = ?, email = ?, gender = ?, phone_number = ? WHERE username = ?";
        $stmtInformation = $conn->prepare($sqlInformation);
        $stmtInformation->bind_param("ssssiss", $customerUserName, $customerName, $customerBirth, $customerEmail, $customerGender, $customerPhone, $username);
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
