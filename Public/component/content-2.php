<div class="product-section">
    <div class="row">
        <!-- Start Column 1 -->
        <div>
            <h2 class="section-title">Crafted with excellent material.</h2>
            <p class="section-decrition">Discover furniture excellence at NOVA. Each piece is meticulously crafted with premium materials, ensuring quality and style for your space. Elevate your home with our exquisite collection.</p>
            <p><a href="index.php?pid=9" class="btn">Explore</a></p>
        </div>
        <!-- End Column 1 -->

        <!-- Product 1 -->
        <div class="product-item">
            <img src="images/product-1.png" class="product-thumbnail">
            <h3 class="product-title">Nordic Chair</h3>
            <strong class="product-price">$50.00</strong>
            <span class="icon-cross">
                <img src="images/cross.svg">
            </span>
        </div>

        <!-- Product 2 -->
        <div class="product-item">
            <img src="images/product-2.png" class="product-thumbnail">
            <h3 class="product-title">Kruzo Aero Chair</h3>
            <strong class="product-price">$78.00</strong>
            <span class="icon-cross">
                <img src="images/cross.svg">
            </span>
        </div>

        <!-- Product 3 -->
        <div class="product-item">
            <img src="images/product-3.png" class="product-thumbnail">

            <h3 class="product-title">Ergonomic Chair</h3>
            <strong class="product-price">$43.00</strong>
            <span class="icon-cross">
                <img src="images/cross.svg">`
            </span>
        </div>


    </div>
</div>
<!-- End Product Section -->
<style>
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

    .section-title {
        color: #2f2f2f;
        font-size: 34px;
        font-weight: 500;
    }

    .section-decrition {
        color: #2f2f2f;
        font-size: 14px;
        opacity: 0.7;
        line-height: 2.0;
        margin-bottom: 40px;
    }

    .product-section {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 660px;
    }


    .row {
        width: 68%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .row div {
        width: 25%;
    }

    .product-item {
        text-align: center;
        text-decoration: none;
        display: block;
        position: relative;
        padding-bottom: 50px;
        cursor: pointer;
    }

    .product-thumbnail {
        margin-bottom: 30px;
        position: relative;
        width: 100%;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .product-item h3 {
        font-weight: 600;
        font-size: 16px;
    }

    .product-item strong {
        font-weight: 800 !important;
        font-size: 18px !important;
    }

    .product-item h3,
    .product-item strong {
        color: #2f2f2f;
        text-decoration: none;
    }

    .icon-cross {
        position: absolute;
        width: 35px;
        height: 35px;
        display: inline-block;
        background: #2f2f2f;
        bottom: 15px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        margin-bottom: -17.5px;
        border-radius: 50%;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .icon-cross img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .product-item:before {
        bottom: 0;
        left: 0;
        right: 0;
        position: absolute;
        content: "";
        background: #dce5e4;
        height: 0%;
        z-index: -1;
        border-radius: 10px;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .product-thumbnail {
        top: -25px;
    }

    .product-item:hover .icon-cross {
        bottom: 0;
        opacity: 1;
        visibility: visible;
    }

    .product-item:hover:before {
        height: 70%;
    }

    @media (max-width: 400px) {
        .row {
            width: 100%;
            flex-direction: column;
            margin: 10px;
        }

        .row div {
            width: 100%;
            height: 550px;
        }

        .row div:nth-child(1) {
            height: 400px;
        }

        .product-section {
            height: auto;
        }
    }

    @media (max-width: 768px) {
        .row {
            width: 100%;
            flex-direction: column;
            margin: 10px;
        }

        .row div {
            width: 100%;
            height: 550px;
        }

        .row div:nth-child(1) {
            height: 400px;
        }

        .product-section {
            height: auto;
        }
    }
</style>