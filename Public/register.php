<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $fullName = '';
    $dateOfBirth = '';
    $gender = '';
    $email = '';
    $phone = '';
    $username = '';
    $password = '';
    $confirmPassword = '';

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullName = $conn->real_escape_string($_POST["full-name"]);
        $dateOfBirth = $conn->real_escape_string($_POST["birthday"]);
        $gender = intval($_POST["gender"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $phone = $conn->real_escape_string($_POST["phone"]);
        $username = $conn->real_escape_string($_POST["username"]);
        $password = $conn->real_escape_string($_POST["password"]);
        $confirmPassword = $conn->real_escape_string($_POST["confirmPassword"]);
    }

    do {

        if (empty($fullName) || empty($dateOfBirth) || empty($gender) || empty($email) || empty($phone) || empty($username) || empty($password) || empty($confirmPassword)) {
            $message = "All the fields are required";
            break;
        }

        $resultCheckUsername = $conn->query("SELECT * FROM users WHERE username = '$username' AND role = 'user'");

        if ($resultCheckUsername->num_rows > 0) {
            $message = "Username already exists. Please choose another one.";
            break;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM users");
        $maxId = $maxIdResult->fetch_assoc()['max_id'];
        $newId = $maxId + 1;

        $role = 'user';


        $stmt1 = $conn->prepare("INSERT INTO users (id, username, password, role, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt1->bind_param("isss", $newId, $username, $password, $role);
        $stmt1->execute();

        $stmt2 = $conn->prepare("INSERT INTO information (id, username, full_name, date_of_birth, email, gender, phone_number, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("issssiss", $newId, $username, $fullName, $dateOfBirth, $email, $gender, $phone, $role);
        $stmt2->execute();

        $stmt3 = $conn->prepare("INSERT INTO addresses (id, username, role) VALUES (?, ?, ?)");
        $stmt3->bind_param("iss", $newId, $username, $role);
        $stmt3->execute();

        if (!$stmt1 || !$stmt2 || !$stmt3) {
            $message = "Invalid query: " . $conn->error;
            break;
        }

        if ($password != $confirmPassword) {
            $message = "Password confirmation failed.";
            break;
        }

        $fullName = '';
        $dateOfBirth = '';
        $gender = '';
        $email = '';
        $phone = '';
        $username = '';
        $password = '';
        $confirmPassword = '';

        $message = "Category added correctly";
        
    } while (false);

    ?>
    <div style="background-color: #3b5d50; width: 100%; height: 100%; display:flex; align-items: center;">
        <div style="width: 50%; height: 90vh; display:flex; flex-direction: column; " class="Form-register">
            <div class="register">
                <form class="register-form" action="" method="post" oninput="checkForm()">
                    <div style="display: flex; justify-content: space-between;">
                        <h1>REGISTER</h1>
                    </div>
                    <label for="full-name">Full Name</label> <br>
                    <input type="text" name="full-name" id="full-name">
                    <div style="width:100%; height: 80px; display:flex; align-items: center;">
                        <div style="width:50%; margin-right: 20px">
                            <label for="birthday">Date of Birth</label>
                            <input type="date" name="birthday" id="birthday">
                        </div>
                        <div style="width:50%; margin-left: 20px; margin-top: -10px">
                            <label for="gender">Gender:</label>
                            <br>
                            <select id="gender" name="gender" class="gender-select">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="0">Other</option>
                            </select>
                        </div>
                    </div>
                    <div style="width:100%; height: 90px; display:flex; align-items: center;">
                        <div style="width:50%; margin-right: 20px">
                            <label for="email">Email</label>
                            <br>
                            <input type="text" name="email" id="email" placeholder="<name mail>@<email>.com">
                        </div>
                        <div style="width:50%; margin-left: 20px">
                            <label for="phone">Phone Number</label>
                            <br>
                            <input type="tel" id="phone" name="phone" placeholder="123-456-7890">
                        </div>
                    </div>
                    <label for="username">Username</label>
                    <br>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password">
                    <br>
                    <label for="confirmPassword">Comfirm password</label>
                    <br>
                    <input type="password" name="confirmPassword" id="confirmPassword">
                    <br>
                    <div class="remember-forgot">
                        <label style="display:flex; align-items: center;">
                            <input type="checkbox" id="accept-terms" name="accept-terms" style="display:flex; align-items: center; margin-top:5px">Accept all terms</label>
                        <a href="#">All terms</a>
                    </div>
                    <button type="submit" id="registerButton">REGISTER</button>
                    <div class="login-register">
                        <p>
                            Already have an account?
                            <a href="../PUBLIC-PAGE/login.php" class="register-link">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div style="width: 50%; display:flex; justify-content: center; align-items: center; height: 100vh;" class="images">
            <div style="margin-bottom: 30px;" class="logo-brand">
                    <div class="logo">
                        <a href="../PUBLIC-PAGE/index.php">
                            <img src="./images/logo.svg" alt="">
                        </a>
                    </div>
                    <a href="../PUBLIC-PAGE/index.php">Nova<span>.</span></a>
                </div>
            <div class="right-side-ct1">

                <img class="chair" src="../PUBLIC-PAGE/images/couch.png" alt="">
                <img class="dot-light" src="../PUBLIC-PAGE/images/dots-light.svg" alt="">
            </div>
        </div>
        <script>
            <?php
            if ($message === "Invalid query: " . $conn->error) {
                echo "showNotification('Thêm không thành công', 'error');";
            }

            if ($message === "Username already exists. Please choose another one.") {
                echo "showNotification('Username đã tồn tại', 'error');";
            }

            if ($message === "All the fields are required") {
                echo "showNotification('Thông tin chưa được điền đủ', 'error');";
            }

            if ($message === "Category added correctly") {
                echo "showNotification('Thêm thành công', 'success');";
            }

            if ($message === "Password confirmation failed.") {
                echo "showNotification('Mật khẩu không khớp nhau', 'error');";
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
    </div>
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
    <style>
        body {
            margin: 0;
            font-family: "Inter", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .register {
            text-align: center;
            width: 70%;
        }

        .register-form {
            position: relative;
            height: 760px;
            border: 1px solid #ccc;
            padding: 40px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .register-form h1 {
            color: #3b5d50;
        }

        .register-form label {
            font-size: 16px;
            font-weight: bold;
            float: left;
            line-height: 1.8;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-radius: 10px;
            border: #3b5d50 solid 1px;
            height: 50px;
            font-size: larger;
        }

        button {
            margin-top: 40px;
            font-size: 20px;
            width: 100%;
            padding: 15px;
            background-color: #3b5d50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .Form-register {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Đảm bảo chiều cao của div bằng chiều cao của màn hình */
        }

        .right-side-ct1 {
            width: 60vh;
            height: 50vh;
            position: relative;
            z-index: 0;
            /* justify-content: center;
        align-items: center; */
        }

        .chair {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
        }

        .dot-light {
            position: relative;
            z-index: 1;
            float: right;
        }

        .logo-brand {
            width: 13%;
            display:flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 25%;
            /* 
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        ; */
            z-index: 2;
        }

        .logo-brand a {
            text-decoration: none;
            color: #eff2f1;
            font-size: 45px;
            font-weight: 600;

        }

        .logo-brand a span {
            font-size: 32px;
            font-weight: 600;
            opacity: 0.7;
        }

        .logo {
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }

        .remember-forgot {
            font-size: 1.25em;
            color: #3b5d50;
            /* font-weight: 50; */
            margin: 15px 0 -15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .remember-forgot label input {
            accent-color: #3b5d50;
            width: 70px;
            height: 20px;
        }

        .remember-forgot input {
            margin-left: -13px;
            margin-right: -5px;


        }

        .remember-forgot a {
            color: #3b5d50;
            text-decoration: none;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .login-register {
            font-size: 1em;
            color: #3b5d50;
            text-align: center;
            font-weight: 500;
            margin: 25px 0 10px;
        }

        .login-register p a {
            color: #3b5d50;
            text-decoration: none;
            font-weight: 600;
        }

        .login-register p a:hover {
            text-decoration: underline;
        }

        .gender-select {
            border-radius: 10px;
            width: 100%;
            height: 50px;
            border-color: #3b5d50;
            font-size: larger;
        }
    </style>
</body>

</html>