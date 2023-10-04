<footer class="footer-section">
    <div class="container relative">

        <div class="sofa-img">
            <img src="images/sofa.png" alt="Image" class="img-fluid">
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="subscription-form">
                    <h3 class=" word d-flex align-items-center"><span class="me-1"><img src="/images/email.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                    <form action="#" class="row">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="col-auto">
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">
                                <img class="location-arow" src="/images/location-arrow.svg" alt="image">
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
                <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus
                    malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
                    Pellentesque habitant</p>

                <ul class="list-unstyled custom-social">
                    <li><a href="#"><img class="size-icon" src="/images/facebook.png" alt="image"></a></li>
                    <li><a href="#"><img class="size-icon" src="/images/twitter.png" alt="image"></a></li>
                    <li><a href="#"><img class="size-icon" src="/images/instagram.png" alt="image"></a></li>
                    <li><a href="#"><img class="size-icon" src="/images/linkedin.png" alt="image"></a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Knowledge base</a></li>
                            <li><a href="#">Live chat</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Our team</a></li>
                            <li><a href="#">Leadership</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="#">Nordic Chair</a></li>
                            <li><a href="#">Kruzo Aero</a></li>
                            <li><a href="#">Ergonomic Chair</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved. &mdash;
                        Designed with love by <a href="https://untree.co">Untree.co</a>

                    </p>
                </div>

                <div class="col-lg-6 text-center text-lg-end">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
<style>
    .footer-section {
        padding: 80px;
        background: #ffffff;
    }

    .footer-section .relative {
        position: relative;
    }

    .footer-section .sofa-img img {
        max-width: 380px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .sofa-img {
        position: fixed;
        /* Đặt phần tử với vị trí cố định */
        right: 0;
        /* Đặt ảnh ở bên phải */
        top: 0;
        /* Đặt ảnh ở đỉnh cùng với màn hình */
    }

    .row {
        display: flex;
    }

    .row.g-5.mb-5 {
        width: 100%;
        height: auto;
    }

    .col-lg-8 {
        flex: 0 0 auto;
        width: 66.66666667%;
    }

    .footer-section .subscription-form {
        position: relative;
        margin-top: 0px;
        margin-bottom: 80px;
    }

    .d-flex {
        display: flex !important;
    }

    .align-items-center {
        align-items: center !important;
        margin: 0px 0px 8px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
        vertical-align: middle;
    }

    .word {
        font: 20px sans-serif;
        font-weight: bold;
        color: #3b5d50;
    }

    .me-1 {
        box-sizing: border-box;
        color: #ffffff;
    }

    .col-auto {
        margin: 0px 0px;
        padding: 0px 8px;
    }

    .footer-section .subscription-form .form-control {
        padding: 15px 12px;
        border-radius: 10px;
        font-family: "Inter", sans-serif;
        opacity: 0.5;
    }

    .btn.btn-primary {
        font: 16px "inter", sans-serif;
        background: #3b5d50;
        border-color: #3b5d50;
        padding: 12px 30px;
        border-radius: 10px;
    }

    .location-arow {
        color: #ffffff;
    }

    .row .mb-5 {
        margin-bottom: 3rem !important;
        font-family: "Inter", sans-serif;
        font-weight: 400;
        line-height: 28px;
        color: #6a6a6a;
        font-size: 14px;
    }

    .col-lg-4 {
        float: left;
        width: 33.33333333%;
    }

    .footer-logo-wrap {
        margin: 0px 0px 24px;
    }

    .footer-section .footer-logo-wrap .footer-logo {
        font-size: 32px;
        font-weight: 500;
        text-decoration: none;
        color: #3b5d50;
    }

    p {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    p.mb-4 {
        font: 14px "inter", sans-serif;
        color: #6a6a6a;
        margin: 0px 0px 24px;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }

    ul.list-unstyled.custom-social {
        margin: 5px;
        display: flex;
    }

    .size-icon {
        width: 40px;
        height: 40px;
        text-align: center;
        margin: 0px 10px;
    }

    .footer-section .links-wrap {
        margin-top: 45px;
    }

    .col-6.col-sm-6.col-md-3 {
        flex: 0 0 auto;
        width: 25%;
    }

    ul .list-unstyled {
        padding-left: 0;
        list-style: none;
        width: auto;
        height: 104px;
        margin: 16px;
        margin-bottom: 16px;
        margin-top: 12px;
    }

    ul {
        display: block;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    .footer-section .links-wrap ul li {
        margin: 10px;
    }

    li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    .footer-section a {
        text-decoration: none;
        color: #2f2f2f;
        font: 14px "Inter", sans-serif;
        opacity: 0.9;
    }

    .footer-section .border-top.copyright {
        font-size: 14px !important;
    }

    .footer-section .border-top {
        border-color: #dce5e4;
    }

    .border-top {
        border-top: 1px solid #dee2e6 !important;
    }

    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .col-lg-6 {
        flex: 0 0 auto;
        width: 50%;
        font: 14px "Inter", sans-serif;
        color: #6a6a6a;
    }

    .col-lg-6.text-center.text-lg-end {
        text-align: right;
    }

    .text-lg-start {
        text-align: left !important;
    }

    .d-inline-flex {
        display: inline-flex !important;
    }

    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }

    ul.list-unstyled.d-inline-flex.ms-auto {
        margin-left: auto !important;
    }

    .me-4 {
        margin-right: 1.5rem !important;
    }
</style>