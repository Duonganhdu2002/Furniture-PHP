<div class="content-9">
    <div class="container9">
        <table style="margin-top: 20px; width: 100%; " class="frst-child">

            <thead>
                <tr style="font-size: 20px; opacity: 0.9; text-align: center; height: 80px;">
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include("component/added-product.php");
                ?>
            </tbody>
        </table>



        <div class="second-child">
            <div class="left-side">
                <div style="display: flex;">
                    <div style="margin-right: 160px;">
                        <button>Update Cart</button>
                    </div>
                    <div>
                        <button>Continue Shopping</button>
                    </div>
                </div>
                <div style="margin: 40px 0 40px 0">
                    <p style="font-size: 20px; font-weight: bold">Coupon</p>
                    <p>Enter your coupon code if you have one.</p>
                </div>
                <div style="display: flex; align-items: center;">
                    <input class="input-code" placeholder="Cupon code" type="text" name="code" id="code">
                    <button style="font-size: 16px">Apply Coupon</button>
                </div>
            </div>
            <div class="right-side">
                <div>
                    <p style="font-size: 18px; font-weight: bold;">CART TOTALS</p>
                </div>
                <div style="display: flex; margin: 20px 0 20px 0">
                    <div style="width: 50%;">
                        <p style="font-size: 16px">Subtotal</p>
                        <p style="font-size: 16px">Total</p>
                    </div>
                    <div style="width: 50%;">
                        <p style="font-weight: bold; font-size: 18px">$230.00</p>
                        <p style="font-weight: bold; font-size: 18px">$230.00</p>
                    </div>
                </div>
                <div>
                    <a href="index.php?pid=7">
                        <button style="font-size: 18px; cursor: pointer">Procced to checkout</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .frst-child td,
    th {
        width: 16.67%;
        padding: 8px;
        border: none;
    }

    .frst-child tr {
        font-size: 20px;
        opacity: 0.9;
        text-align: left;
        border-bottom: 2px solid black;
    }


    table {
        width: 100%;
        border-collapse: collapse;
    }

    .content-9 {
        height: fit-content;
        display: flex;
        justify-content: center;
        margin-bottom: 200px;
    }

    .content-9 .container9 {
        width: 68%;
        height: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .container9 .first-child {
        width: 90%;
    }

    .container9 .second-child {
        display: flex;
        margin-top: 80px;
    }

    .container9 .second-child .left-side {
        width: 70%;
    }

    .container9 .second-child .right-side {
        width: 30%;
    }

    .container9 button {
        font-weight: 600;
        padding: 16px 34px;
        border-radius: 30px;
        border: none;
        color: #eff2f1;
        background: #2f2f2f;
        border-color: #2f2f2f;
        text-decoration: none;
    }

    .container9 p {
        font-size: 14px;
        line-height: 1.5;
        opacity: 0.7;
    }

    .container9 .input-code {
        width: 400px;
        height: 50px;
        border-radius: 10px;
        border: solid 1px rgba(128, 128, 128, 0.7);
        padding: 5px 5px 5px 20px;
        box-sizing: border-box;
        margin-right: 60px;
    }
</style>