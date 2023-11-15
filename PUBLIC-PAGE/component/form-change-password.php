<div class="popup">
<form action="../PUBLIC-PAGE/component/change-password.php" method="post">
    <div class="form-div">
        <label for="old_password">Old Password:</label><br>
        <input type="password" id="old_password" name="old_password" class="input"><br>

        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" class="input"><br>

        <label for="confirm_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" class="input"><br><br>
        <div style="justify-content: center; display:flex">
        <input type="submit" class="submit">
        </div>
    </div>
</form>
</div>
<style>
        .popup {
            display: block !important;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid #ccc;
            background: #fff;
            z-index: 9999;
            font-size: x-large;
            border-radius: 7px;
        }

        .input {
            font-size: x-large;
            border-radius: 10px;
            margin-bottom: 20px;
            margin-top: 10px;
            height: 40px;
        }

        .submit {
            display: flex;
            font-size: x-large;
            justify-content: center;
            align-items: center;
            width: 120px;
            height: 45px;
            cursor: pointer;
            border-radius: 10px;
            border: 0;
            background: #3b5d50;
            color: #ffffff;
        }

        .submit:hover {
            opacity: 0.8;
        }

        .submit:active {
            opacity: 0.5;
        }
</style>