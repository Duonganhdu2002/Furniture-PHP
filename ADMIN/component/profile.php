<div class="profile">
    <div class="header-profile">
        <div class="left-side">
            <div class="info-emloyee">
                <img class="avatar-emloyee" src="../PUBLIC-PAGE/images/person-1.jpg" alt="">
                <div class="camera-icon">
                    <a href="#">
                        <img src="../PUBLIC-PAGE/images/camera-outline.svg" alt="Camera Icon">
                    </a>
                </div>
            </div>
            <div class="name-employee">
                <h1>Bùi Thị F</h1>
            </div>
        </div>
        <div class="right-side">
            <button class="button-edit">Edit</button>
        </div>
    </div>
    <div class="header-data-2">
        <h2>Thông tin cá nhân</h2>
    </div>
    <div class="data-2">

        <div class="data-left-2">
            <h3>Tài khoản</h3>
            <p>abc@gmail.com</p>
            <h3>Ngày sinh</h3>
            <p>06/12/1990</p>
            <h3>Email</h3>
            <p>buithifabcde@gmail.com</p>
        </div>
        <div class="data-right-2">
            <h3>Giới tính</h3>
            <p>Nữ</p>
            <h3>Só điện thoại</h3>
            <p>090995663</p>
            <h3>Địa chỉ</h3>
            <p>Địa chỉ số 456, Đường Hà Nội, Ngõ B, Quận C, Hà nội</p>
        </div>
    </div>
</div>
<style>
    .profile {
        padding-left: 200px;
        padding-right: 50px;
        padding-top: 30px;
    }
    .header-profile {
        display: flex;
    }
    .right-side {
        width: 100%;
        height: 5%;
        display: flex;
    }

    .button-edit {
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
    }

    .data-2 {
        width: 100%;
        height: 70%;
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
        width: 70%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .data-2 .data-left-2 {
        width: 50%;
        height: 100%;
        line-height: 1.5;

    }



    .data-2 .data-right-2 {
        width: 50%;
        height: 100%;
        line-height: 1.5;
    }

    .avatar-emloyee {
        width: 190px;
        height: 190px;
        border-radius: 100%;
        display: flex;
        margin: auto;
        position: relative;

    }

    .camera-icon {
        position: absolute;
        bottom: 20px;
        right: 145px;
        width: 35px;
        height: 35px;
        border-radius: 100%;
        background-color: #dee3df;
    }

    h3 {
        color: #9b9f9c;
    }
</style>

</html>