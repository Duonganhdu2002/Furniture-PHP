<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


$memberUserName = "";
$memberName = "";
$memberEmail = "";
$memberPhone = "";
$memberBirth = "";
$memberGender = "";
$image = "";
$memberAddressNumber = "";
$memberAddressStreet = "";
$memberAddressCommune = "";
$memberAddressDistrict = "";
$memberAddressProvince = "";
$memberAddressCountry = "";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberUserName = $conn->real_escape_string($_POST["memberUserName"]);
    $memberName = $conn->real_escape_string($_POST["memberName"]);
    $memberEmai = $conn->real_escape_string($_POST["memberEmail"]);
    $memberPhone = $conn->real_escape_string($_POST["memberPhone"]);
    $memberBirth = $conn->real_escape_string($_POST["memberBirth"]);
    $memberGender = intval($_POST["memberGender"]);
    $image = $conn->real_escape_string($_FILES["image"]["name"]);
    $memberAddressNumber = $conn->real_escape_string($_POST["memberAddressNumber"]);
    $memberAddressStreet = $conn->real_escape_string($_POST["memberAddressStreet"]);
    $memberAddressCommune = $conn->real_escape_string($_POST["memberAddressCommune"]);
    $memberAddressDistrict = $conn->real_escape_string($_POST["memberAddressDistrict"]);
    $memberAddressProvince = $conn->real_escape_string($_POST["memberAddressProvince"]);
    $memberAddressCountry = $conn->real_escape_string($_POST["memberAddressCountry"]);


    do {
        // Thông báo nếu không điền đủ thông tin sản phẩm
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $missingFields = [];

            // Kiểm tra từng trường
            if (empty($memberUserName)) {
                $missingFields[] = "Username";
            }

            if (empty($memberName)) {
                $missingFields[] = "Full Name";
            }

            if (empty($memberEmail)) {
                $missingFields[] = "Email";
            }

            if (empty($memberPhone)) {
                $missingFields[] = "Phone Number";
            }

            if (empty($memberBirth)) {
                $missingFields[] = "Date of Birth";
            }

            if (empty($memberGender)) {
                $missingFields[] = "Gender";
            }

            if (empty($image)) {
                $missingFields[] = "Avatar";
            }

            if (empty($memberAddressNumber)) {
                $missingFields[] = "Address Number";
            }

            if (empty($memberAddressStreet)) {
                $missingFields[] = "Address Street";
            }

            if (empty($memberAddressCommune)) {
                $missingFields[] = "Address Commune";
            }

            if (empty($memberAddressDistrict)) {
                $missingFields[] = "Address District";
            }

            if (empty($memberAddressProvince)) {
                $missingFields[] = "Address Province";
            }

            if (empty($memberAddressCountry)) {
                $missingFields[] = "Address Country";
            }

            // Nếu có trường nào chưa điền, thông báo lỗi
            if (!empty($missingFields)) {
                $message = "Please fill in the following fields: " . implode(", ", $missingFields);
                // break;

            } // Xử lí ảnh
        }
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

        $destination = __DIR__ . "/../../../PUBLIC-PAGE/images/chairs/" . $fileName;

        // Thông báo nếu không lưu được ảnh vào đường dẫn 
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
            exit("Can't move upload file");
        }

        $result = $conn->query("SELECT * FROM information WHERE username = '$memberUserName'");

        if ($result->num_rows > 0) {
            $message = "Product already exists";
            break;
        }

        $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM users");
        $maxId = $maxIdResult->fetch_assoc()['max_id'];
        $newId = $maxId + 1;


        $stmt = $conn->prepare("INSERT INTO users (id, username) VALUES (?, ?)");
        $stmt->bind_param("is", $newId, $memberUserName);
        $stmt->execute();


        $stmt = $conn->prepare("INSERT INTO information (id, username, full_name, date_of_birth, email, gender, phone_number, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssiss", $newId, $memberUserName, $memberName, $memberBirth, $memberEmail, $memberGender, $memberPhone, $image);
        $stmt->execute();


        $stmt = $conn->prepare("INSERT INTO addresses (id, username, number, street, commune, district, province, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssss", $newId, $memberUserName, $memberAddressNumber, $memberAddressStreet, $memberAddressCommune, $memberAddressDistrict, $memberAddressProvince, $memberAddressCountry);
        $stmt->execute();



        if (!$stmt) {
            $message = "Invalid query: " . $conn->error;
            break;
        }

        //Trả giá trị về rỗng
        $memberUserName = "";
        $memberName = "";
        $memberEmail = "";
        $memberPhone = "";
        $memberBirth = "";
        $memberGender = "";
        $image = "";
        $memberAddressNumber = "";
        $memberAddressStreet = "";
        $memberAddressCommune = "";
        $memberAddressDistrict = "";
        $memberAddressProvince = "";
        $memberAddressCountry = "";

        $message = "Category added correctly";
    } while (false);
}
?>
<script>
    <?php
    if ($message === "Invalid query: " . $conn->error) {
        echo "showNotification('Thêm không thành công', 'error');";
    }

    if ($message === "Category already exists") {
        echo "showNotification('Tên danh mục đã tồn tại', 'error');";
    }

    if ($message === "All the fields are required") {
        echo "showNotification('Thông tin chưa được điền đủ', 'error');";
    }

    if ($message === "Category added correctly") {
        echo "showNotification('Thêm thành công', 'success');";
    }
    ?>

    function showNotification(message, type) {
        var notification = document.createElement('div');
        notification.className = 'notification ' + type;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(function() {
            notification.style.display = 'none';
        }, 2000);
    }
</script>
<style>
    .notification {
        position: fixed;
        top: 10px;
        left: 50%;
        top: 50%;
        transform: translateX(-50%);
        padding: 20px;
        width: 300px;
        text-align: center;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        transition: 0.5s;
        z-index: 999;
    }

    .success {
        background-color: #3b5d50;
    }

    .error {
        background-color: #ff3333;
    }
</style>

<div style="display: flex; align-items: center; flex-direction: column;">
    <div style="width: 68%;" class="memberFormContainer">
        <form class="memberForm" enctype="multipart/form-data" method="post" onsubmit="return submitmemberForm();">
            <h1>Add new member</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div style="width: 40%;">
                <label for="memberUserName">UserName:</label>
                <input type="text" id="memberUserName" name="memberUserName" value="<?php echo $memberUserName; ?>">
            </div>
            <div style="width: 40%;">
                <label for="memberName">Name:</label>
                <input type="text" id="memberName" name="memberName" value="<?php echo $memberName; ?>">
            </div>
            <div style="width: 40%;">
                <label for="memberEmail">Email:</label>
                <input type="text" id="memberEmail" name="memberEmail" value="<?php echo $memberEmail; ?>">
            </div>
            <div style="width: 40%;">
                <label for="memberPhone">Phone:</label>
                <input type="Phone" id="Phone" name="memberPhone" value="<?php echo $memberPhone; ?>">
            </div>
            <div style="width: 40%;">
                <label for="memberBirth">Birth</label>
                <input type="date" id="memberBirth" name="memberBirth" value="<?php echo $memberBirth; ?>">
            </div>
            <div style="width: 40%;">
                <label for="">Gender:</label>
                <select name="memberGender">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>

            <label for="image">image:</label>
            <input style="border: none;" type="file" id="image" name="image"><br>

            <div style="width:40%;">
                <label for="memberAddressNumber">memberAddressNumber</label>
                <div>
                    <input type="text" id="memberAddressNumber" name="memberAddressNumber" value="<?php echo $memberAddressNumber; ?>"><br>
                </div>
                <div>
                    <label for="memberAddressStreet">memberAddressStreet</label>
                    <input type="text" id="memberAddressStreet" name="memberAddressStreet" value="<?php echo $memberAddressStreet; ?>"><br>
                </div>
                <div>
                    <label for="memberAddressCommune">memberAddressCommune</label>
                    <input type="text" id="memberAddressCommune" name="memberAddressCommune" value="<?php echo $memberAddressCommune; ?>"><br>
                </div>
                <div>
                    <label for="memberAddressDistrict">memberAddressDistrict</label>
                    <input type="text" id="memberAddressDistrict" name="memberAddressDistrict" value="<?php echo $memberAddressDistrict; ?>"><br>
                </div>
                <div>
                    <label for="memberAddressProvince">memberAddressProvince</label>
                    <input type="text" id="memberAddressProvince" name="memberAddressProvince" value="<?php echo $memberAddressProvince; ?>"><br>
                </div>
                <div>
                    <label for="memberAddressCountry">memberAddressCountry</label>
                    <input type="text" id="memberAddressCountry" name="memberAddressCountry" value="<?php echo $memberAddressCountry; ?>"><br>
                </div>

                <div>
                    <button type="submit">Add member</button>
                    <a style="text-decoration: none;">
                        <button type="button" style="background-color: #BB0000;" onclick="window.location.href='index.php?pid=4';">Back</button>
                    </a>
                </div>
        </form>
    </div>
</div>



<style>
    .memberFormContainer h1 {
        color: #3b5d50;
        justify-content: space-between;
    }

    .memberFormContainer input {
        width: 99%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .memberFormContainer textarea {
        resize: none;
        width: 99%;
        height: 150px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
        border: 1px solid #3b5d50;
    }

    .memberFormContainer label {
        margin-top: 20px;
        margin-bottom: 20px;
        line-height: 4.0;
    }

    .memberFormContainer button {
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
