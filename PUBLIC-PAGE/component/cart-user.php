<?php

$link = new mysqli("localhost", "root", "", "shopping_online");

if (isset($_SESSION["id_user"])) {
    $userId = $_SESSION["id_user"];
}

$sql = "SELECT shopping_carts.id, shopping_carts.created_at, status_cart.name_status, shipping_methods.method_name, shopping_carts.status, shopping_carts.note, shopping_carts.total_price
        FROM shopping_carts
        JOIN users ON shopping_carts.user_id = users.id
        JOIN shipping_methods ON shopping_carts.ship_method = shipping_methods.id
        JOIN status_cart ON shopping_carts.status = status_cart.id
        WHERE user_id = $userId
        ORDER BY shopping_carts.id ASC";

$result = $link->query($sql);

?>

<div class="user-cart">
    <div class="user-cart-child">
        <h2>History order</h2>
        <table>
            <tr>
                <th>STT</th>
                <th>Order Id</th>
                <th>Day order</th>
                <th>Order status</th>
                <th>Shipping method</th>
                <th>Total price</th>
                <th>Your note</th>
                <th>Cancel Order </th>
                <th>Order Details</th>
            </tr>
            <?php
            $stt = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td data-status="<?php echo $row['status']; ?>">
                    <?php echo $row['name_status']; ?>
                    </td>
                    <td><?php echo $row['method_name']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['note']; ?></td>
                    <td>
                        <?php if ($row['status'] == 1) { ?>
                            <div class="div-button">
                                <button onclick="cancelOrder(<?php echo $row['id']; ?>)"  class="button">Cancel Order</button>
                            </div>
                        
                        <?php } ?>
                    </td>
                    <td>
                        <div class="div-button">
                        <button onclick="showOrderDetails(<?php echo $row['id']; ?>)" class="button" style="background: #3b5d50; color:#F0F7FF">
                        Order Details
                        </button>
                        </div>
                    </td>
                </tr>
            <?php
                $stt++;
            }
            ?>
        </table>
    </div>
</div>

<style>
    .user-cart {
        display: flex;
        justify-content: center;
        margin-bottom: 200px;
        margin-top: 50px;
    }

    .user-cart .user-cart-child {
        width: 68%;
    }

    .user-cart-child table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-cart-child th,
    .user-cart-child td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        justify-content: center;

    }
    .div-button {
        display: flex;
        justify-content: center;
    }

    .user-cart-child th {
        background-color: #f2f2f2;
    }

    .button {
        width: 130px;
        height: 40px;
        color: #F0F7FF;
        cursor: pointer;
        font-size: 1em;
        background: #9c3b3b;
        border: none;
        border-radius: 10px;
    }

    .button:hover {
        opacity: 0.7;
    }

    .button:active {
        background: black !important;
    }

    .user-cart-child td[data-status= "5"] {
        color: red;
    }
</style>

<script>
    function cancelOrder(orderId) {
        if (confirm('Are you sure you want to cancel this order?')) {
            // Tạo một yêu cầu AJAX
            var xhr = new XMLHttpRequest();
            
            // Xử lý phản hồi khi yêu cầu được gửi đi
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Cập nhật giao diện người dùng tại đây nếu cần
                    location.reload(); // Refresh the page after order cancellation
                }
            };
            
            // Mở yêu cầu AJAX
            xhr.open('GET', '../PUBLIC-PAGE/component/cancel_order.php?order_id=' + orderId, true);
            xhr.send();
        }
    }

    function showOrderDetails(orderId) {
    window.location.href = '../PUBLIC-PAGE/index.php?pid=12&order_id=' + orderId;
}

</script>