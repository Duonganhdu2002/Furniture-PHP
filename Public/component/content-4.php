<!-- Start We Help Section -->
<div class="we-help-section">
    <div class="container-ct4">
        <div class="left-side-ct4 imgs-grid">
            <div class="behind ">
                <div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Image"></div>
                <div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Image"></div>
            </div>
            <div class="front">
                <div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Image"></div>
            </div>
        </div>
        <div class="right-side-ct4">
            <h2 class="section-title-ct4">
                We Help You Make Modern Interior Design
            </h2>
            <p class="text-ct4">We go beyond selling furniture; we're your partners in creating modern interior masterpieces. Let us guide you through a curated selection, turning your vision into a sophisticated reality. Elevate your space with our expertly crafted pieces, where style meets innovation, making your home uniquely yours.</p>
            <div>
                <div>
                    <ul class="custom-list">
                        <li>Discover chic furniture curated for contemporary homes.</li>
                        <li>Trendy and practical pieces for smart, modern living.</li>
                    </ul>
                </div>
                <div>
                    <ul class="custom-list">
                        <li>Our design team ensures your choices match the latest trends.</li>
                        <li>Stylish furniture crafted to endure the test of time.</li>
                    </ul>
                </div>
            </div>
            <p><a herf="#" class="btn">Explore</a></p>
        </div>
    </div>
</div>
<!-- End We Help Section -->
<style>

    .left-side-ct4 {
        z-index: -1;
    }
    .we-help-section {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-ct4 {
        margin-top: 120px;
        width: 68%;
        display: flex;
        justify-content: center;
        align-items: start;
    }

    .left-side-ct4 {
        width: 60%;
    }

    .behind {
        display: flex;
        justify-content: center;
        align-items: start;
        position: absolute;
        width: 40%;
    }

    .front {
        width: 50%;
        position: relative;
        z-index: 2;
        float: right;
        margin-top: 220px;
        margin-right: 20px;

    }


    .right-side-ct4 {
        width: 40%;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
        margin-left: 40px;
    }

    .text-ct4 {
        font-size: 14px;
        line-height: 2.0;
        color: #2f2f2f;
        opacity: 0.8;
        margin-top: 0px;
    }

    .right-side-ct4 div {
        display: flex;
        justify-content: start;
        align-items: center;
    }

    .custom-list {
        list-style: none;
        font-size: 14px;
        color: #2f2f2f;
        opacity: 0.8;
    }

    .imgs-grid:before {
        position: absolute;
        content: "";
        width: 255px;
        height: 217px;
        background-image: url("../images/dots-green.svg");
        background-size: contain;
        background-repeat: no-repeat;
        -webkit-transform: translate(-40%, -40%);
        -ms-transform: translate(-40%, -40%);
        transform: translate(-40%, -40%);
        z-index: -1;
    }

    .grid {
        position: relative;
    }

    .grid img {
        border-radius: 20px;
        max-width: 100%;
    }

    .grid .grid-1 {
        -ms-grid-column: 1;
        -ms-grid-column-span: 18;
        grid-column: 1 / span 18;
        -ms-grid-row: 1;
        -ms-grid-row-span: 27;
        grid-row: 1 / span 27;
    }

    .grid.grid-2 {
        -ms-grid-column: 19;
        -ms-grid-column-span: 27;
        grid-column: 19 / span 27;
        -ms-grid-row: 1;
        -ms-grid-row-span: 5;
        grid-row: 1 / span 5;
        padding-left: 20px;
    }

    .grid.grid-3 {
        -ms-grid-column: 14;
        -ms-grid-column-span: 16;
        grid-column: 14 / span 16;
        -ms-grid-row: 6;
        -ms-grid-row-span: 27;
        grid-row: 6 / span 27;
        padding-top: 20px;
    }

    .custom-list li {
        display: inline-block;
        width: 100%;
        margin-bottom: 12px;
        line-height: 1.5;
        position: relative;
        padding-left: 20px;
    }

    .custom-list li:before {
        content: "";
        width: 4px;
        height: 4px;
        border-radius: 50%;
        border: 2px solid #3b5d50;
        position: absolute;
        left: 0;
        top: 8px;
    }

    @media (max-width: 400px) {
        .container-ct4 {
            flex-direction: column;
            width: 100%;
        }

        .right-side-ct4 {
            width: 100%;
            margin-left: 10px;
            margin-right: 0px;
        }

        .right-side-ct4 div {
            flex-direction: column;
        }

        .left-side-ct4 {
            display: none;
        }

        .text-ct4 {
            margin-right: 0px;
        }
    }

    @media (max-width: 768px) {
        .container-ct4 {
            flex-direction: column;
            width: 100%;
            margin-top: 40px;
        }

        .right-side-ct4 {
            width: 100%;
            margin-left: 10px;
            margin-right: 0px;
        }

        .left-side-ct4 {
            display: none;
        }

        .right-side-ct4 div {
            flex-direction: column;
        }

        .text-ct4 {
            margin-right: 0px;
        }
    }
</style>