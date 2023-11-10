<?php
$link = new mysqli("localhost", "root", "", "shopping_online");

if ($link->connect_error) {
    die("Kết nối không thành công: " . $link->connect_error);
}

if(isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $sql = "SELECT shopping_carts.id, shopping_carts.created_at, shopping_carts.canceled_at, status_cart.name_status, shipping_methods.method_name, shipping_methods.standard_price,
    shopping_carts.status, shopping_carts.note,
    shopping_carts.total_price,
    information.full_name, information.phone_number, information.email, cart_items.product_id, cart_items.quantity, cart_items.price, products.product_name, products.image,
    address_cart.country, address_cart.province, address_cart.district, address_cart.commune,
    address_cart.street, address_cart.number
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


            $address_cart =[];

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
                ];
                $shipping_methods =[
                    'standard_price' => $row['standard_price'],
                ];
            }
        ?>

        <div class="user-cart">
            <div class="user-cart-child">
                <h1>Order Details to ID: <?= $orderDetails['id']; ?></h1>
                <table>
                    <tr>
                        <th>Customer name</th>
                        <th>Phone number</th>
                        <th colspan="2">Email</th>
                    </tr>
                    <tr>
                        <td><?= $orderDetails['full_name']; ?></td>
                        <td><?= $orderDetails['phone_number']; ?></td>
                        <td colspan="2">
                            <?= $orderDetails['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <th>Order date</th>
                        <th data-status="<?= $orderDetails['status']; ?>" colspan="2">Cancellation date</th>
                    </tr>
                    <tr>
                        <td>
                            <?= $address_cart['country'] ?>, <?= $address_cart['province'] ?>,
                            <?= $address_cart['district'] ?>, <?= $address_cart['commune'] ?>,
                            <?= $address_cart['street'] ?>, <?= $address_cart['number'] ?>
                        </td>
                        <td><?= $orderDetails['created_at']; ?></td>
                        <td data-status="<?= $orderDetails['status']; ?>" colspan="2"><?= $orderDetails['canceled_at']; ?></td>
                    </tr>
                    <tr>
                        <th>Order status</th>
                        <th>Shipping method</th>
                        <th colspan="2">Total</th>
                    </tr>
                    <tr>
                        <td data-status="<?= $orderDetails['status']; ?>">
                        <?= $orderDetails['name_status']; ?>
                        </td>
                        <td><?= $orderDetails['method_name']; ?></td>
                        <td colspan="2" style="background: #d1d1d1; font-size: 2em; font-weight: bold; border: 3px solid black" ><?= $orderDetails['total_price']; ?> $</td>
                    </tr>

                </table>
                <div style="height:100px">

                </div>
                <table style="font-size: 1.2em;">
                    <tr>
                        <th colspan="3">Product name id.<?= $orderDetails['id']; ?></th>
                        <th style="color: #dea104;">Shipping fee: +<?= $shipping_methods['standard_price']; ?> $</th>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <th>Products Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php foreach ($products as $product) : ?>
                    <tr>
                            <td>
                                <img src="../PUBLIC-PAGE/images/chairs/<?= $product['image'] ?>" alt="" class="image-order-detail">
                            </td>
                            <td>
                                    <?= $product['product_name'] ?>
                            </td>
                            <td>
                                 x <?= $product['quantity'] ?>
                            </td>
                            <td>
                                <?= $product['price'] ?> $
                            </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
        </div>

        <div class="button">
            <button onclick="goBack()">Back</button>
        </div>
        <?php
    } else {
        echo "Không tìm thấy thông tin chi tiết đơn hàng.";
    }
} else {
    echo "Không có ID đơn hàng được cung cấp.";
}

$link->close(); // Đóng kết nối cơ sở dữ liệu
?>

<style>
        .user-cart {
        display: flex;
        justify-content: center;
        margin-top: 50px;
        margin-bottom: 50px;
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
        color:#F0F7FF;
        border: none !important;
        font-size: 1em;
    }

    .button button:hover {
        opacity: 0.7;
    }

    .button button:active {
        background: black !important;
    }
</style>

<script>
    function goBack() {
        window.history.back();
    }
</script>
