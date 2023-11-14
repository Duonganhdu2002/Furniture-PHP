<div>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['searchByIdOrder'])) {
            $searchTerm = $_POST['searchByIdOrder'];
            $sql = "SELECT shopping_carts.id, shopping_carts.user_id, users.username, shopping_carts.created_at, status_cart.name_status, shipping_methods.method_name, shopping_carts.note
            FROM shopping_carts
            JOIN users ON shopping_carts.user_id = users.id
            JOIN shipping_methods ON shopping_carts.ship_method = shipping_methods.id
            JOIN status_cart ON shopping_carts.status = status_cart.id
            WHERE shopping_carts.id LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
        } else if (isset($_POST['searchByUsernameOrder'])) {
            $searchTerm = $_POST['searchByUsernameOrder'];
            $sql = "SELECT shopping_carts.id, shopping_carts.user_id, users.username, shopping_carts.created_at, status_cart.name_status, shipping_methods.method_name, shopping_carts.note
            FROM shopping_carts
            JOIN users ON shopping_carts.user_id = users.id
            JOIN shipping_methods ON shopping_carts.ship_method = shipping_methods.id
            JOIN status_cart ON shopping_carts.status = status_cart.id
            WHERE users.username LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
        }
    }

    if ($result->num_rows > 0) {
        $stt = $offset + 1;

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            echo "<form action='component/confirm-order.php' method='post'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<tr>";
            echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
            echo "<td style='width:6%; text-align: center;'>" . $row["id"] . "</td>";
            echo "<td style='width:6%; text-align: center;'>" . $row["username"] . "</td>";
            echo "<td class='hover-cell' style='width:4%; cursor: pointer; text-align: center;' onmouseover='showButtons(this)' onmouseout='hideButtons(this)'> 
                    <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                    <div class='action-buttons'>
                        <a href='index.php?pid=6&detail&id=$id'><button type='button' class='edit-button'>Detail</button></a>
                        <br>
                        <a href='../ADMIN/component/delete/order.php?id=$id'><button type='button' class='delete-button'>Delete</button></a>
                    </div>
                </td>";
            echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $row["name_status"] . "</td>";
            echo "<td style='width: 18%; padding: 10px 20px 10px 20px'>" . $row["created_at"] . "</td>";
            echo "<td style='width: 10%; padding: 10px 20px 10px 20px'>" . $row["method_name"] . "</td>";
            echo "<td style='width: 23%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["note"] . "</td>";
            if ($row["name_status"] === "Waiting for confirm") {
                echo "<td style='width: 0%; padding: 10px 20px 10px 20px; line-height: 1.5;'>
                        <button name='submit' type='submit' style='width: 90px; height:40px; background: #3b5d50; color: #ffffff' class='button-order'>Confirm</button>
                    </td>";
            } else  if ($row["name_status"] === "Confirmed") {
                echo "<td style='width: 0%; padding: 10px 20px 10px 20px; line-height: 1.5;'>
                        <button name='submit1' type='submit' style='width: 90px; height:40px; background: #d0aa0f; color: #ffffff' class='button-order'>Delivering</button>
                    </td>";
            } else if ($row["name_status"] === "Delivering") {
                echo "<td style='width: 0%; padding: 10px 20px 10px 20px; line-height: 1.5;'>
                        <button name='submit3' type='submit' style='width: 90px; height:40px; background: #58913e; color: #ffffff' class='button-order'>Delivered</button>
                    </td>";
            } else if ($row["name_status"] === "Delivered") {
                echo "<td style='width: 0%; padding: 10px 20px 10px 20px; line-height: 1.5;'>
                        <button name='submit2' type='submit' style='width: 90px; height:40px; background: #cc0500; color: #ffffff' class='button-order'>Cancle</button>
                    </td>";
            } else {
                echo "<td style='width: 8%; padding: 10px 20px 10px 20px; line-height: 1.5;'></td>";
            }
            echo "</tr>";
            echo "</form>";

            $stt++;
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<script>
                alert('No results found for the given search term: $searchTerm');
                window.location.href = 'index.php?pid=6';
              </script>";
    }
    ?>
</div>

<style>
    .button-order {
        border-radius: 8px;
        border: 0;
        cursor: pointer !important;
    }

    .button-order:hover {
        opacity: 0.5;
    }
</style>