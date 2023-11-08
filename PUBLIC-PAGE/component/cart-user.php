<?php

$link = new mysqli("localhost", "root", "", "shopping_online");

if (isset($_SESSION["id_user"])) {
    $userId = $_SESSION["id_user"];
}

$sql = "SELECT shopping_carts.id, shopping_carts.created_at, status_cart.name_status, shipping_methods.method_name, shopping_carts.note
        FROM shopping_carts
        JOIN users ON shopping_carts.user_id = users.id
        JOIN shipping_methods ON shopping_carts.ship_method = shipping_methods.id
        JOIN status_cart ON shopping_carts.status = status_cart.id
        WHERE user_id = $userId";

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
                <th>Your note</th>
            </tr>
            <?php
            $stt = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['name_status']; ?></td>
                    <td><?php echo $row['method_name']; ?></td>
                    <td><?php echo $row['note']; ?></td>
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
    }

    .user-cart-child th {
        background-color: #f2f2f2;
    }
</style>