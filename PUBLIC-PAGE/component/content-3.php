<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="left-side-ct3">
            <div class='header-why-section'>
                <div>
                    <h2 class="section-title">Why Choose Us</h2>
                </div>
                <div>
                    <p class="descrition">Choose us for unparalleled quality and style. Our curated selection features meticulously crafted pieces, blending functionality with aesthetics. Elevate your living space with confidence.</p>
                </div>
            </div>
            <div class="for-stack">
                <div class="two-stack">
                    <div class="feature">
                        <div class="icon">
                            <img src="images/truck.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>Fast &amp; Free Shipping</h3>
                        <p>Swift & Complimentary Shipping – Your Orders, Our Priority. Experience Seamless Shopping.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">
                            <img src="images/bag.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>Easy to Shop</h3>
                        <p>Effortless Shopping Experience – Simplify Your Lifestyle with Ease.</p>
                    </div>
                </div>
                <div class="two-stack">
                    <div class="feature">
                        <div class="icon">
                            <img src="images/support.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>24/7 Support</h3>
                        <p>Always There for You – 24/7 Support for Seamless Assistance.</p>
                    </div>
                    <div class="feature">
                        <div class="icon">
                            <img src="images/return.svg" alt="Image" class="imf-fluid">
                        </div>
                        <h3>Hassle Free Returns</h3>
                        <p>Stress-Free Returns – Your Satisfaction, Our Commitment</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-side-ct3">
            <div class="img-wrap">
                <img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
            </div>
        </div>

    </div>
</div>
<!-- End Why Choose Us Section -->
<style>
    .why-choose-section {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        display: flex;
        width: 68%;
        justify-content: center;
        align-items: center;
    }

    .two-stack {
        display: flex;
    }

    .left-side-ct3 {
        width: 50%;
    }

    .right-side-ct3 {
        width: 50%;
    }

    .header-why-section {
        display: flex;
        flex-direction: column;
    }

    .header-why-section div p {
        opacity: 0.7;
        margin-bottom: 40px;
        margin-right: 10px;
    }

    .header-why-section div h2 {
        margin: 0;
    }

    .container {
        font-size: 14px;
        line-height: 2.0;
        color: #2f2f2f;
    }

    .img-wrap {
        position: relative;
    }

    .img-wrap:before {
        position: absolute;
        content: "";
        width: 255px;
        height: 217px;
        background-image: url("../images/dots-yellow.svg");
        margin-left: 30%;
        background-repeat: no-repeat;
        background-size: contain;
        -webkit-transform: translate(-40%, -40%);
        -ms-transform: translate(-40%, -40%);
        transform: translate(-40%, -40%);
        z-index: -1;
    }

    .img-wrap img {
        border-radius: 20px;
        width: 70%;
        float: right;
        margin-right: 10%;
    }

    .feature {
        margin-bottom: 30px;
    }

    .icon {
        display: inline-block;
        position: relative;
        margin-bottom: 20px;
    }

    .icon:before {
        content: "";
        width: 33px;
        height: 33px;
        position: absolute;
        background: rgba(59, 93, 80, 0.2);
        border-radius: 50%;
        right: -8px;
        bottom: 0;
    }

    .feature h3 {
        font-size: 16px;
        color: #2f2f2f;
    }

    .feature p {
        font-size: 14px;
        line-height: 2.0;
        color: #6a6a6a;
    }

    @media (max-width: 400px) {
        .container {
            flex-direction: column;
            width: 100%;
            margin: 10px;
        }

        .left-side-ct3 {
            flex-direction: column;
            width: 100%;
        }

        .right-side-ct3 {
            flex-direction: column;
            width: 100%;
            margin-top: 40px;
        }

        .img-wrap:before {
            width: 117px;
            height: 155px;
            margin-left: 20%;
        }

        .img-wrap img {
            margin-right: 10%;
        }
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            width: 100%;
            margin: 10px;
        }

        .left-side-ct3 {
            flex-direction: column;
            width: 100%;
        }

        .right-side-ct3 {
            flex-direction: column;
            width: 100%;
            margin-top: 80px;
        }

        .img-wrap:before {
            width: 167px;
            height: 205px;
            margin-left: 20%;
        }

        .img-wrap img {
            margin-right: 10%;
        }
    }
</style>