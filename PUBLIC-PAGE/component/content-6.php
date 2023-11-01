<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Start Footer Section -->
<footer class="footer-section">
    <div style="margin-top: 0px;" class="relative">

        <div class="sofa-img">
            <img src="images/sofa.png" alt="Image" class="img-fluid">
        </div>

        <div class="col-lg-8">
            <div class="subscription-form">

                <h3 class="d-flex align-items-center">
                    <span class="me-1">
                        <img src="images/envelope-outline.svg" alt="Image" class="img-fluid">
                    </span>
                    <span style="margin-left: 10px">
                        Subscribe to Newsletter
                    </span>
                </h3>

                <form action="#" class="input-form">
                    <div>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div>
                        <button class="btn btn-primary">
                            <span class="fa fa-paper-plane"></span>
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <div style="display: flex; margin-bottom: 60px">
            <div style="width: 30%;">
                <div style="font-weight: bold;" class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Nova<span>.</span></a></div>
                <p style="line-height: 1.8; font-size: 14px; opacity: 0.7" class="mb-4">Welcome to Nova - where sophistication meets comfort. Discover a curated selection of exquisite furniture pieces, from cozy chairs to stylish tables, all tailored to elevate every living space. Step into a new realm of living with Nova - where furniture comes to life with vibrancy and allure.</p>

                <ul style="display: flex; justify-content: start;" class="custom-social">
                    <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                </ul>
            </div>

            <div style="width: 70%; margin-top: 25px">
                <div class="links-wrap">
                    <div class="text-column">
                        <ul class="list-unstyled">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="text-column">
                        <ul class="list-unstyled">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Knowledge base</a></li>
                            <li><a href="#">Live chat</a></li>
                        </ul>
                    </div>

                    <div class="text-column">
                        <ul class="list-unstyled">
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Our team</a></li>
                            <li><a href="#">Leadership</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="text-column">
                        <ul class="list-unstyled">
                            <li><a href="#">Nordic Chair</a></li>
                            <li><a href="#">Kruzo Aero</a></li>
                            <li><a href="#">Ergonomic Chair</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <hr style="border: none; border-top: 1px solid rgba(128, 128, 128, 0.3);">


        <div style="display: flex; font-size: 14px; opacity: 0.9;">
            <div style="width: 70%;">
                <p class="mb-2 text-center text-lg-start">Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> <!-- License information: https://untree.co/license/ -->
                </p>
            </div>

            <div style="width: 30%;">
                <ul style="display: flex;" class="list-unstyled">
                    <li style="width: 50%; float: right;" class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                    <li style="width: 50%;"><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>
<!-- End Footer Section -->
<style>
    .footer-section {
        padding: 80px 0;
        background: hsl(0, 0%, 100%);
        display: flex;
        justify-content: center;
        margin-top: 0px;
    }

    .footer-section .relative {
        position: relative;
        width: 68%;
    }

    .footer-section a {
        text-decoration: none;
        color: #2f2f2f;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .footer-section a:hover {
        color: rgba(47, 47, 47, 0.5);
    }

    .footer-section .subscription-form {
        margin-bottom: 40px;
        position: relative;
        z-index: 2;
        margin-top: 100px;
    }

    .subscription-form h3 {
        font-size: 20px;
        font-weight: 500;
        color: #3b5d50;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .input-form {
        display: flex;
        align-items: center;
    }

    .input-form div input {
        border: solid 1px rgba(128, 128, 128, 0.7);
        padding-left: 10px;
        width: 240px;
        color: #3b5d50;
    }

    .input-form div {
        margin-right: 20px;
    }

    .input-form div button {
        border: none;
        background-color: #3b5d50;
        padding-top: 20px;
        padding-bottom: 20px;
        transition: background-color 0.5s ease;
    }

    .input-form div button:hover {
        background-color: #224135;
    }

    .form-control {
        height: 50px;
        border-radius: 10px;
        font-family: "Inter", sans-serif;
    }

    .footer-section .subscription-form .form-control:active,
    .footer-section .subscription-form .form-control:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #3b5d50;
        -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.2);
    }

    .footer-section .subscription-form .form-control::-webkit-input-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .form-control::-moz-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .form-control:-ms-input-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .form-control:-moz-placeholder {
        font-size: 14px;
    }

    .footer-section .subscription-form .btn {
        border-radius: 10px !important;
    }

    .footer-section .sofa-img {
        position: absolute;
        top: -200px;
        z-index: 0;
        right: 0;
    }

    .footer-section .sofa-img img {
        max-width: 380px;
    }

    .footer-section .links-wrap {
        margin-top: 0px;
        display: flex;
    }

    .footer-section .links-wrap ul li {
        margin-bottom: 20px;
    }

    .footer-section .links-wrap ul li a {
        font-size: 14px;
        opacity: 0.9;
    }

    .footer-section .footer-logo-wrap .footer-logo {
        font-size: 32px;
        font-weight: 500;
        text-decoration: none;
        color: #3b5d50;
    }

    .footer-section .custom-social {
        padding-left: 0px;
    }

    .footer-section .custom-social li {
        margin: 2px;
        display: inline-block;
    }

    .footer-section .custom-social li a {
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        display: inline-block;
        background: #dce5e4;
        color: #3b5d50;
        border-radius: 50%;
    }

    .footer-section .custom-social li a:hover {
        background: #3b5d50;
        color: #ffffff;
    }

    .footer-section .border-top {
        border-color: #dce5e4;
    }

    .footer-section .border-top.copyright {
        font-size: 14px !important;
    }

    .list-unstyled {
        list-style: none;
    }

    .text-column {
        width: 25%;
    }

    .btn {
        font-weight: 600;
        padding: 16px 34px;
        border-radius: 30px;
        color: #eff2f1;
        ;
        background: #2f2f2f;
        border-color: #2f2f2f;
        text-decoration: none;
    }

    .btn:hover {
        color: #ffffff;
        background: #222222;
        border-color: #222222;
    }
</style>