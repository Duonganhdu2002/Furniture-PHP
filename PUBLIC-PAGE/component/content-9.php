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

                // echo "<pre>";
                // if (isset($_SESSION["cart"])) {
                //     echo var_dump($_SESSION["cart"]);
                // } else {
                //     echo "";
                // }
                // echo "</pre>";

                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $totalPrice = 0;
                    foreach ($_SESSION['cart'] as $index => $product) {
                        echo '<tr style="height: 300px; text-align: center; border-bottom: 1px solid black;">';
                        echo '<td>';
                        echo '<img style="width: 75%;" src="images/chairs/' . $product[0] . '" alt="Image" class="img-fluid">';
                        echo '</td>';
                        echo '<td>';
                        echo '<h3>' . $product[1] . '</h3>';
                        echo '</td>';
                        echo '<td>$' . $product[2] . '</td>';
                        echo '<td>';
                        echo '<div style="max-width: 120px; display: flex;">';
                        echo '<button id="minus" onclick="updateQuantity(' . $index . ', \'decrease\')" style="border: none; background-color: #eff2f1; color: #2f2f2f; font-size: 22px; cursor: pointer;" type="button">-</button>';
                        echo '<input id="quantity_' . $index . '" onchange="updateQuantity(' . $index . ', \'change\')" style="width: 50px; text-align: center; border: 1px solid gray; border-radius: 10px" type="text" value="' . $product[4] . '">';
                        echo '<button id="plus" onclick="updateQuantity(' . $index . ', \'increase\')" style="border: none; background-color: #eff2f1; color: #2f2f2f; font-size: 22px; cursor: pointer;" type="button">+</button>';
                        echo '</div>';
                        echo '</td>';
                        echo '<td class="total" id="total_' . $index . '">$' . ($product[2] * $product[4]) . '</td>';
                        echo '<td>';
                        echo '<button class="cancel" onclick="deleteProduct(' . $index . ')" style="border: none; background-color: #eff2f1; color: #2f2f2f; font-size: 22px; cursor: pointer;" type="button">X</button>';
                        echo '</td>';
                        echo '</tr>';

                        $totalPrice += ($product[2] * $product[4]);
                    }

                    echo '<tr style="display: none">';
                    echo '<td colspan="5" style="text-align: right; font-weight: bold;">Total:</td>';
                    echo '<td id="grandTotal">$' . $totalPrice . '</td>';
                    echo '</tr>';
                }
                ?>
                <script>
                    var products = <?php echo json_encode($_SESSION['cart']); ?>;
                    var grandTotalElement = document.getElementById('grandTotal');

                    //Hàm tính tổng giá tất cả sản phẩm có trong giỏ
                    function calculateTotal() {
                        var total = 0;
                        for (var i = 0; i < products.length; i++) {
                            total += products[i][2] * products[i][4];
                        }
                        return total;
                    }

                    //Hàm cập nhật số lượng, giá của từng sản phẩm riêng biệt 
                    function updateQuantity(index, action) {

                        var quantityInput = document.getElementById('quantity_' + index);
                        var currentQuantity = parseInt(quantityInput.value);

                        if (action === 'increase') {
                            quantityInput.value = currentQuantity + 1;
                        } else if (action === 'decrease' && currentQuantity > 1) {
                            quantityInput.value = currentQuantity - 1;
                        }

                        // Update the quantity in the products array
                        products[index][4] = parseInt(quantityInput.value);

                        // Update total price for the specific product
                        var totalElement = document.getElementById('total_' + index);
                        totalElement.textContent = '$' + (products[index][2] * products[index][4]).toFixed(2);

                        // Recalculate and update grand total
                        grandTotalElement.textContent = '$' + calculateTotal().toFixed(2);

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
                        location.reload();
                    }

                    //Hàm xóa sản phẩm dựa trên index của mảng giỏ hàng
                    //Xem mảng giỏ hàng bằng echo var_dump($_SESSION["cart"]);
                    function deleteProduct(index) {
                        window.location.href = 'component/ctrl-cart/delete_product.php?index=' + index;
                    }
                </script>
            </tbody>
        </table>


        <form action="index.php?pid=7" method="post">
            <div style="margin: 20px 0 0 0; display: flex; align-items: center; justify-content: end;">
                <label style="font-size: 18px; font-weight: bold; opacity: 0.8; margin-right: 20px" for="shippingMethod">SHIPPING METHOD</label>
                <select style="width: 120px; font-size: 16px; border-radius: 10px; padding: 10px" name="shippingMethod" id="shippingMethod">
                    <option value="1">Fast</option>
                    <option value="2">Standard</option>
                </select>
            </div>


            <div class="second-child">
                <div class="left-side">
                    <div style="display: flex;">
                        <div>
                            <a id="goBackBtn">
                                <button>Continue Shopping</button>
                            </a>
                            <script>
                                document.getElementById('goBackBtn').addEventListener('click', function() {
                                    goBack();
                                });

                                function goBack() {
                                    window.history.back();
                                }
                            </script>
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
                            <p style="font-size: 16px">Total</p>
                        </div>
                        <div style="width: 50%;">
                            <p style="font-weight: bold; font-size: 18px">
                                <?php
                                if (!isset($_SESSION['cart']) || empty($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
                                    echo '<td>$ 0</td>';
                                } else {
                                    echo '<td>$' . $totalPrice . '</td>';
                                }
                                ?>

                            </p>
                        </div>
                    </div>
                    <div>
                        <a href="index.php?pid=7">
                            <button type="submit" style="font-size: 18px; cursor: pointer">Procced to checkout</button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
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