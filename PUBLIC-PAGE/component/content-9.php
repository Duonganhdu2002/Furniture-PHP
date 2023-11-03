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

                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $index => $product) {
                        echo '<tr style="height: 300px; text-align: center; border-bottom: 1px solid black;">';
                        echo '<td>';
                        echo '<img style="width: 100%;" src="images/chairs/' . $product[0] . '" alt="Image" class="img-fluid">';
                        echo '</td>';
                        echo '<td>';
                        echo '<h3>' . $product[1] . '</h3>'; 
                        echo '</td>';
                        echo '<td>$' . $product[2] . '</td>';
                        echo '<td>';
                        echo '<div style="max-width: 120px; display: flex;">';
                        echo '<button id="minus" onclick="updateQuantity(' . $index . ', \'decrease\')" style="border: none; background-color: #eff2f1; color: #2f2f2f; font-size: 22px; cursor: pointer;" type="button">-</button>';
                        echo '<input id="quantity_' . $index . '" style="width: 50px; text-align: center; border: 1px solid gray; border-radius: 10px" type="text" value="' . $product[4] . '">';
                        echo '<button id="plus" onclick="updateQuantity(' . $index . ', \'increase\')" style="border: none; background-color: #eff2f1; color: #2f2f2f; font-size: 22px; cursor: pointer;" type="button">+</button>';
                        echo '</div>';
                        echo '</td>';
                        echo '<td id="total">$' . $product[2] * $product[4] . '</td>';
                        echo '<td>';
                        echo '<button class="cancel" onclick="deleteProduct(' . $index . ')" style="border: none; background-color: #eff2f1; color: #2f2f2f; font-size: 22px; cursor: pointer;" type="button">X</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }

                echo "<pre>";
                echo var_dump($_SESSION['cart']);
                echo "</pre>";

                ?>
                <script>
                    function updateQuantity(index, action) {

                        var quantityInput = document.getElementById('quantity_' + index);
                        var currentQuantity = parseInt(quantityInput.value);

                        if (action === 'increase') {
                            quantityInput.value = currentQuantity + 1;
                        } else if (action === 'decrease' && currentQuantity > 1) {
                            quantityInput.value = currentQuantity - 1;
                        }

                        // Send the updated quantity to the server using AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'component/ctrl-cart/update_quantity.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (!response.success) {
                                    console.error('Failed to update quantity: ' + response.message);
                                }
                            }
                        };
                        xhr.send('index=' + index + '&quantity=' + quantityInput.value);
                    }
                </script>

                <script>
                    function deleteProduct(index) {
                        // Redirect to a PHP script that handles the deletion
                        window.location.href = 'component/ctrl-cart/delete_product.php?index=' + index;
                    }
                </script>

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