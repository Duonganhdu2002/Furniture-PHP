<?php
$link = new mysqli("localhost", "root", "", "shopping_online");

if ($link->connect_error) {
    die("Kết nối không thành công: " . $link->connect_error);
}

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $sql = "SELECT shopping_carts.id, shopping_carts.created_at, shopping_carts.canceled_at, status_cart.name_status, shipping_methods.method_name, shipping_methods.standard_price,
    shopping_carts.status, shopping_carts.note,
    shopping_carts.total_price,
    information.full_name, information.phone_number, cart_items.product_id, cart_items.quantity, cart_items.price, products.product_name, products.image,
    address_cart.country, address_cart.province, address_cart.district, address_cart.commune,
    address_cart.street, address_cart.number, address_cart.phone , address_cart.email
            FROM shopping_carts
            JOIN users ON shopping_carts.user_id = users.id
            JOIN shipping_methods ON shopping_carts.ship_method = shipping_methods.id
            JOIN status_cart ON shopping_carts.status = status_cart.id
            JOIN cart_items ON shopping_carts.id = cart_items.cart_id
            JOIN information ON shopping_carts.user_id = information.id
            JOIN products ON cart_items.product_id = products.id
            JOIN address_cart ON shopping_carts.id  = address_cart.id_cart
            WHERE shopping_carts.id = $orderId";

    $result = $link->query($sql);

    // Lấy thông tin đơn hàng
    if ($result->num_rows > 0) {
        $orderDetails = $result->fetch_assoc();
        $products = [];
        $result->data_seek(0); // Đưa con trỏ về hàng đầu tiên


        $address_cart = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = [
                'product_name' => $row['product_name'],
                'quantity' => $row['quantity'],
                'price' => $row['price'],
                'image' => $row['image'],
            ];
            $address_cart = [
                'country' => $row['country'],
                'province' => $row['province'],
                'district' => $row['district'],
                'commune' => $row['commune'],
                'street' => $row['street'],
                'number' => $row['number'],
                'phone' => $row['phone'],
                'email' => $row['email'],
            ];
            $shipping_methods = [
                'standard_price' => $row['standard_price'],
            ];
        }
?>

        <div class="user-cart">
            <div class="user-cart-child">
                <div class="second-child">
                    <div class="left-side">
                        <p style="font-size: 32px; font-weight: 300;">Billing Deatils</p>
                        <div style="background-color: white; height: auto; display: flex; justify-content: center; border:rgba(128, 128, 128, 0.3) solid 1px;">
                            <div style="width: 90%; margin: 40px 0 40px 0;" id="billingForm">
                                <div>
                                    <label style="margin-bottom: 50px;"><b>Order ID: <?= $orderDetails['id']; ?></b></label> <br>
                                    <label for="first_name">Full Name:</label>
                                    <input value="<?= $orderDetails['full_name']; ?>" type="text" name="first_name">
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="width: 32%;">
                                        <label for="province">Province:</label>
                                        <input value="<?= $address_cart['province'] ?>" type="text" name="province">
                                    </div>
                                    <div style="width: 32%;">
                                        <label for="district">District:</label>
                                        <input value="<?= $address_cart['district'] ?>" type="text" name="disttrict">
                                    </div>
                                    <div style="width: 32%;">
                                        <label for="commune">Commune:</label>
                                        <input value="<?= $address_cart['commune'] ?>" type="text" name="commune">
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="width: 48%;">
                                        <label for="street">Street:</label>
                                        <input value="<?= $address_cart['street'] ?>" type="text" name="street">
                                    </div>
                                    <div style="width: 48%;">
                                        <label for="number">Number:</label>
                                        <input value="<?= $address_cart['number'] ?>" type="number" name="number">
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="width: 48%;">
                                        <label for="state">State / Country:</label>
                                        <input value="<?= $address_cart['country'] ?>" type="text" name="state">
                                    </div>
                                    <div style="width: 48%;">
                                        <label for="posta">Posta / Zip</label>
                                        <input type="text" id="posta">
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="width: 48%;">
                                        <label for="email">Email Address:</label>
                                        <input value="<?= $address_cart['email']; ?>" type="email" name="email">
                                    </div>
                                    <div style="width: 48%;">
                                        <label for="phone">Phone:</label>
                                        <input value="<?= $address_cart['phone']; ?>" type="text" name="phone">
                                    </div>
                                </div>

                                <div>
                                    <label style="font-size: 15px;" for="order_notes">Order Notes</label>
                                    <br>
                                    <input placeholder="Write your notes here..." name="order_notes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-side">
                        <div id="billingForm">
                            <p style="font-size: 32px; font-weight: 300;">Shipping</p>
                            <div style="padding: 40px; background-color: white; height: auto; border:rgba(128, 128, 128, 0.3) solid 1px;">
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="width: 48%;">
                                        <label for="email">Order status</label>
                                        <input value="<?= $orderDetails['name_status']; ?>" type='text'>
                                    </div>
                                    <div style="width: 48%;">
                                        <label for="phone">Shipping method</label>
                                        <input value="<?= $orderDetails['method_name']; ?>" type='text'>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="width: 48%;">
                                        <label for="email">Order date</label>
                                        <input value="<?= $orderDetails['created_at']; ?>" type='text'>
                                    </div>
                                    <div style="width: 48%;">
                                        <label for="phone">Cancled at</label>
                                        <input value="<?= $orderDetails['canceled_at']; ?>" type='text'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="billingForm">
                            <p style="font-size: 32px; font-weight: 300;">Your order</p>
                            <div style="padding: 40px; background-color: white; height: auto; border:rgba(128, 128, 128, 0.3) solid 1px;">
                                <div style="display: flex; font-weight: bold;">
                                    <p style="width: 70%;">Product</p>
                                    <p>Total</p>
                                </div>
                                <hr style="width: 100%; border: black 1px solid;">


                                <?php foreach ($products as $product) : ?>
                                    <div style="display: flex;">
                                        <p style='width: 70%'>
                                            <?= $product['product_name'] ?> <span style="color: black">x </span> <?= $product['quantity'] ?>
                                        </p>
                                        <p>
                                            <?= $product['price'] ?> $
                                        </p>
                                    </div>
                                    <hr>
                                <?php endforeach; ?>
                                <div style="display: flex; height: 40px;" class="section-price-product">
                                    <p style="width: 70%; font-weight: bold;">Shipping fee</p>
                                    <p style="width: 30%; font-weight: bold;"><?= $shipping_methods['standard_price']; ?> $</p>
                                </div>
                                <hr>
                                <div style="display: flex; height: 40px;" class="section-price-product">
                                    <p style="width: 70%; font-weight: bold;">Order Total</p>
                                    <p style="width: 30%; font-weight: bold;"><?= $orderDetails['total_price']; ?> $</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}

$link->close(); // Đóng kết nối cơ sở dữ liệu
?>

<style>
    .second-child {
        display: flex;
        justify-content: space-between;
    }

    .second-child .left-side {
        width: 48%;
    }

    .second-child .right-side {
        width: 48%;
    }

    .second-child span {
        color: red;
    }

    .user-cart {
        display: flex;
        justify-content: center;
        margin-top: 50px;
        margin-bottom: 200px;
    }

    .user-cart .user-cart-child {
        width: 65%;
    }

    .user-cart-child table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-cart-child th,
    .user-cart-child td {
        border: 1px gray solid;
        padding: 8px;
        text-align: left;
        justify-content: center;
        font-size: 1.1em;
    }

    .user-cart-child td[data-status='5'] {
        color: red;
    }

    .user-cart-child th[data-status='5'] {
        color: red;
    }

    .image-order-detail {
        max-width: 120px;
        border-radius: 15px;
    }

    .button {
        margin-bottom: 150px;
        margin-left: 75%;
    }

    .button button {
        width: 140px;
        height: 60px;
        border-radius: 15px;
        cursor: pointer;
        background: #3b5d50;
        color: #F0F7FF;
        border: none !important;
        font-size: 1em;
    }

    .button button:hover {
        opacity: 0.7;
    }

    .button button:active {
        background: black !important;
    }

    #billingForm label {
        font-size: 15px;
        opacity: 0.9;
        font-weight: 500;
        line-height: 1.5;
    }

    #billingForm input {
        width: 100%;
        height: 50px;
        border-radius: 10px;
        border: solid 1px rgba(128, 128, 128, 0.5);
        padding: 5px 5px 5px 20px;
        box-sizing: border-box;
        margin-top: 10px;
    }

    #billingForm button {
        font-weight: 600;
        height: 50px;
        padding: 0px 40px 0px 40px;
        border-radius: 30px;
        border: none;
        color: #eff2f1;
        background: #2f2f2f;
        border-color: #2f2f2f;
        text-decoration: none;
    }

    #billingForm div {
        margin-bottom: 10px;
    }

    #billingForm textarea {
        height: 100px;
        width: 100%;
        border-radius: 10px;
        border: solid 1px rgba(128, 128, 128, 0.7);
        margin: 10px 0;
        padding: 20px;
        box-sizing: border-box;
        resize: none;
        font-size: 14px;
    }
</style>

<script>
    function goBack() {
        window.history.back();
    }
</script>