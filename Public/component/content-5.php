<!-- Start Popular Product -->
<div class="popular-product">
    <div class="container-ct5">
        <div class="row-ct5">
            <div>
                <div class="column product-item-ct5">
                    <div class="thumbnail">
                        <img src="images/product-1.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="text-ct5">
                        <h3>Nordic Chair</h3>
                        <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                        <p><a href="#">Read More</a></p>
                    </div>
                </div>
            </div>
            <div>
                <div class="column product-item-ct5">
                    <div class="thumbnail">
                        <img src="images/product-2.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="text-ct5">
                        <h3>Kruzo Aero Chair</h3>
                        <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                        <p><a href="#">Read More</a></p>
                    </div>
                </div>
            </div>
            <div>
                <div class="column product-item-ct5">
                    <div class="thumbnail">
                        <img src="images/product-3.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="text-ct5">
                        <h3>Ergonomic Chair</h3>
                        <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                        <p><a href="#">Read More</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Popular Product -->
<style>
    .popular-product {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
        margin-bottom: 60px;
        height: 280px;
    }

    .container-ct5 {
        width: 68%;
    }

    .row-ct5 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .column {
        display: flex;
    }

    .thumbnail {
        width: 40%;
    }

    .text-ct5 {
        width: 60%;
    }

    .thumbnail img {
        width: 100%;
    }

    .product-item-ct5 h3 {
        font-size: 14px;
        font-weight: 700;
        color: #2f2f2f;
    }

    .product-item-ct5 a {
        text-decoration: none;
        color: #2f2f2f;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .product-item-ct5 a:hover {
        color: rgba(47, 47, 47, 0.5);
    }

    .product-item-ct5 p {
        line-height: 1.4;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .product-item-ct5 .thumbnail {
        margin-right: 10px;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 120px;
        flex: 0 0 120px;
        position: relative;
    }

    .product-item-ct5 .thumbnail:before {
        content: "";
        position: absolute;
        border-radius: 20px;
        background: #dce5e4;
        width: 98px;
        height: 98px;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        z-index: -1;
    }

    @media (max-width: 400px) {
        .row-ct5 {
            flex-direction: column;
        }

        .column {
            margin: 20px 0 20px 0;
        }

        .container-ct5 {
            width: 100%;
            margin: 0 10px 0 10px;
        }
    }

    @media (max-width: 768px) {
        .row-ct5 {
            flex-direction: column;
        }

        .column {
            margin: 20px 0 20px 0;
        }

        .container-ct5 {
            width: 100%;
            margin: 0 10px 0 10px;
        }
    }
</style>