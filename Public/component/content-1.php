<div class="content-1">
    <div class="child">
        <div class="left-side-ct1">
            <div class="div-1">
                <?php
                echo "$Content1IndexFontContent";
                ?>
            </div>
            <div class="div-2">
                <?php
                echo "$Content1IndexPresentContent";
                ?>
            </div>
            <div class="div-3">
                <div>
                    <a href="index.php?pid=1">
                        <button class="shop-now">Shop now</button>
                    </a>
                </div>
                <div>
                    <a href="index.php?pid=9&categoryId=1">
                        <button class="explore">Explore</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="right-side-ct1">
            <img class="chair" src="../PUBLIC-PAGE/images/couch.png" alt="">
            <img class="dot-light" src="../PUBLIC-PAGE/images/dots-light.svg" alt="">
        </div>
    </div>
</div>
<style>
    .content-1 {
        height: 56vh;
        background-color: #3b5d50;
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 10vh;
    }

    .child {
        width: 68%;
        background-color: #3b5d50;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .left-side-ct1 {
        width: 40%;
        height: 100%;
        position: relative;
        
    }

    .right-side-ct1 {
        width: 60%;
        height: 100%;
        position: relative;
        z-index: 0;
    }

    .div-1 {
        width: 100%;
        font-size: 54px;
        color: white;
        font-weight: 600;
        height: 40%;
        display: flex;
        justify-content: start;
        align-items: end;
    }

    .div-2 {
        width: 100%;
        font-size: 14px;
        color: white;
        opacity: 0.5;
        height: 25%;
        display: flex;
        justify-content: start;
        align-items: center;
        margin-top: 0px;
        line-height: 2.0;
    }

    .div-3 {
        width: 100%;
        display: flex;
        font-size: 16px;
        justify-content: start;
        align-items: start;
        height: 35%;
    }

    .shop-now {
        width: 140px;
        height: 55px;
        background-color: #f9bf29;
        font-size: 16px;
        border-radius: 50px;
        border: none;
        padding: 16px 30px;
        color: #2f2f2f;
        font-weight: 600;
        margin-right: 10px;
    }

    .explore {
        width: 140px;
        height: 55px;
        background-color: #3b5d50;
        font-size: 16px;
        border-radius: 50px;
        border: solid 2px rgba(255, 255, 255, 0.3);
        padding: 16px 30px;
        color: #ffffff;
        font-weight: 600;
        transition: border-color 0.3s ease;
    }

    .explore:hover {
        border: solid 2px rgba(255, 255, 255, 1);
    }

    .dot-light {
        position: relative;
        z-index: 1;
        float: right;
    }

    .chair {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
    }

    @media (max-width: 400px) {
        .content-1 {
            width: 100%;
            height: 93vh;
        }

        .child {
            width: 100%;
            flex-direction: column;
        }

        .left-side-ct1 {
            margin-left: 16px;
            width: 100%;
        }

        .right-side-ct1 {
            width: 100%;
            margin-right: 16px;
        }

        .div-1 {
            font-size: 30px;
            height: 12vh;
        }

        .div-2 {
            margin-bottom: 20px;
            margin-right: 20px;
            height: 16vh;

        }

        .shop-now {
            height: 50px;
        }

        .explore {
            height: 50px;
        }

        .chair {
            width: 100%;
        }

        .dot-light {
            width: 40%;
        }
    }

    @media (max-width: 768px) {
        .content-1 {
            height: 93vh;
        }

        .child {
            width: 100%;
            flex-direction: column;
        }

        .left-side-ct1 {
            margin-left: 16px;
            width: 100%;
        }

        .right-side-ct1 {
            width: 100%;
            margin-right: 16px;
        }

        .div-1 {
            font-size: 30px;
            height: 12vh;
        }

        .div-2 {
            margin-bottom: 20px;
            margin-right: 20px;
            height: 16vh;

        }

        .shop-now {
            height: 50px;
        }

        .explore {
            height: 50px;
        }

        .chair {
            width: 100%;
        }

        .dot-light {
            width: 40%;
        }
    }
</style>