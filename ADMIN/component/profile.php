<div class="profile">
    <div class="header-profile">
        <div class="left-side">
            <div class="info-emloyee">
                <img class="avatar-emloyee" src="../PUBLIC-PAGE/images/person-1.jpg" alt="">
            </div>
            <div class="name-employee">
                <h1>Bùi Thị F</h1>
            </div>
        </div>
        <div class="right-side">
            <button class="button-edit">Edit</button>
        </div>
    </div>
    <div class="personality-information">
        <h2>Thông tin cá nhân</h2>
    </div>
    <div class="detail-information">
        <div class="detail">
            <h3>Tài khoản</h3>
            <p>abc@gmail.com</p>
            <h3>Ngày sinh</h3>
            <p>06/12/1990</p>
            <h3>Email</h3>
            <p>buithifabcde@gmail.com</p>
        </div>
        <div class="detail">
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
        align-items: center;
    }

    .detail-information {
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
        margin-left: 20px;
    }

    .detail-information .detail {
        width: 50%;
        height: 100%;
        line-height: 1.5;

    }

    .detail-information .detail h3, p{
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

</html>