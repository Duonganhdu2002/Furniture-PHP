<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            height: 100vh; /* Đảm bảo chiều cao của div bằng chiều cao của màn hình */
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
        width: 20%;
        display:flex;
        justify-content: center;
        align-items: center;
        /* position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2; */
        
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

        .gender-select{
            border-radius: 10px ;
            width: 100%;
            height: 50px;
            border-color: #3b5d50;
        }
    </style>
</head>
<body>
    <!-- Sửa code cho thêm dữ liệu vừa nhập vào database và sử dụng điều kiện khi
    nhập mật khẩu đúng thì lưu và vào trang login đăng nhập lại, còn không đúng thì nhập lại mật khẩu
    -->
    <div style="background-color: #3b5d50; width: 100%; height: 100%; display:flex">

        <div style="width: 50%; height: 100vh; display:flex; flex-direction: column; " class="Form-register">
                <div style="margin-bottom: 30px;" class="logo-brand">
                        <div class="logo">
                            <a href="../PUBLIC-PAGE/index.php">
                                <img src="./images/logo.svg" alt="">
                            </a>
                        </div>
                        <a href="../PUBLIC-PAGE/index.php">Nova<span>.</span></a>
                </div>
            <div class="register">
                <form class="register-form" action="" method="post" oninput="checkForm()">
                    <h1>REGISTER</h1>
                    <label for="full-name">Full Name</label>
                    <br>
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
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
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
                            <input type="tel" id="phone" name="phone"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">
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
                    <label for="enter-password">Enter the password</label>
                    <br>
                    <input type="password" name="enter-password" id="enter-password">
                    <br>
                    <div class="remember-forgot">
                        <label style="display:flex; align-items: center;"><input type="checkbox" id="accept-terms" style="display:flex; align-items: center; margin-top:5px">Accept all terms</label>
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
            <div class="right-side-ct1">
                
                <img class="chair" src="../PUBLIC-PAGE/images/couch.png" alt="">
                <img class="dot-light" src="../PUBLIC-PAGE/images/dots-light.svg" alt="">
            </div>
        </div>
        <script>
            
        </script>
    </div>
    
</body>
</html>