<?php

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'shopping_online');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy tên đăng nhập của người dùng từ phiên làm việc
if (isset($_SESSION["username_user"])) {
    $username = $_SESSION["username_user"];

    // Truy vấn thông tin cá nhân từ bảng Information dựa trên tên đăng nhập
    $sqlInformation = "SELECT * FROM information WHERE username = ?";
    $stmtInformation = $conn->prepare($sqlInformation);
    $stmtInformation->bind_param("s", $username);
    $stmtInformation->execute();
    $resultInformation = $stmtInformation->get_result();

    if ($resultInformation->num_rows > 0) {
        $row = $resultInformation->fetch_assoc();
        $full_name = $row["full_name"];
        $date_of_birth = $row["date_of_birth"];
        $email = $row["email"];
        $gender = $row["gender"];
        $phone_number = $row["phone_number"];
        $avatar = $row["avatar"];
    }

    // Truy vấn địa chỉ từ bảng Addresses dựa trên tên đăng nhập
    $sqlAddress = "SELECT * FROM addresses WHERE username = ?";
    $stmtAddress = $conn->prepare($sqlAddress);
    $stmtAddress->bind_param("s", $username);
    $stmtAddress->execute();
    $resultAddress = $stmtAddress->get_result();

    if ($resultAddress->num_rows > 0) {
        $row = $resultAddress->fetch_assoc();
        $country = $row["country"];
        $province = $row["province"];
        $district = $row["district"];
        $commune = $row["commune"];
        $street = $row["street"];
        $number = $row["number"];
        $id = $row["id"];

        $address = "$number, $street, $commune, $district, $province, $country";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUser = isset($_POST["id"]) ? mysqli_real_escape_string($conn, $_POST["id"]) : '';
    $idProducts = isset($_POST["idProduct"]) ? $_POST["idProduct"] : [];
    $quantities = isset($_POST["quantity"]) ? $_POST["quantity"] : [];
    $status = isset($_POST["status"]) ? mysqli_real_escape_string($conn, $_POST["status"]) : '';

    // Get the maximum ID from shopping_carts
    $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM shopping_carts");
    $maxId = $maxIdResult->fetch_assoc()['max_id'];
    $newId = $maxId + 1;

    // Insert into shopping_carts
    $sql1 = "INSERT INTO shopping_carts (id, user_id, created_at, status) VALUES ($newId, '$idUser', NOW(), '$status')";

    // ...

    // Insert into shopping_carts
    $sql1 = "INSERT INTO shopping_carts (id, user_id, created_at, status) VALUES ($newId, '$idUser', NOW(), '$status')";

    if ($conn->query($sql1) === TRUE) {
        // Get the cart_id after successful insertion
        $cartId = $newId;

        // Loop through the products and insert into cart_items
        for ($i = 0; $i < count($idProducts); $i++) {
            $idProduct = mysqli_real_escape_string($conn, $idProducts[$i]);
            $quantity = mysqli_real_escape_string($conn, $quantities[$i]);

            // Get the maximum ID from cart_items
            $maxIdResultProduct = $conn->query("SELECT MAX(id) AS max_id FROM cart_items");
            $maxIdProduct = $maxIdResultProduct->fetch_assoc()['max_id'];
            $newIdProduct = $maxIdProduct + 1;

            // Check if the cart_id exists in shopping_carts
            $cartIdCheckQuery = "SELECT id FROM shopping_carts WHERE id = ?";
            $stmtCartIdCheck = $conn->prepare($cartIdCheckQuery);
            $stmtCartIdCheck->bind_param("i", $cartId);
            $stmtCartIdCheck->execute();
            $resultCartIdCheck = $stmtCartIdCheck->get_result();

            if ($resultCartIdCheck->num_rows > 0) {
                // Insert into cart_items
                $sql2 = "INSERT INTO cart_items (id, cart_id, product_id, quantity, user) VALUES ('$newIdProduct', '$cartId', '$idProduct', '$quantity', '$idUser')";

                // Use prepared statement for the query
                $stmt2 = $conn->prepare($sql2);
                if ($stmt2->execute() !== TRUE) {
                    echo "Error: " . $sql2 . "<br>" . $stmt2->error;
                }
            } else {
                echo "Error: Cart ID does not exist in shopping_carts.";
            }
        }

        echo "New record created successfully";
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    // ...

}


?>


<div class="content-10">
    <form class="container10" action="" method="post" onsubmit="return submitcontainer10();">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="status" value="Chờ xác nhận">
        <?php
        if (!isset($_SESSION["username_user"])) {
            echo "
                <div class='first-child'>
                    <span> Returning customer? <a style='color: black; opacity: 1.0' href=''>Click here</a> to login</span>
                </div>
                ";
        } else {
            echo "";
        }
        ?>
        <div class="second-child">
            <div class="left-side">
                <p style="font-size: 32px; font-weight: 300;">Billing Deatils</p>
                <div style="background-color: white; height: auto; display: flex; justify-content: center; border:rgba(128, 128, 128, 0.3) solid 1px;">
                    <div style="width: 90%; margin: 40px 0 40px 0;" id="billingForm">
                        <div>
                            <label for="first_name">Full Name <span>*</span></label>
                            <input value="<?php echo "$full_name"; ?>" type="text" id="first_name" aria-describedby="first_name_help" required>

                        </div>
                        <div>
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name">
                        </div>
                        <div>
                            <label for="address">Address <span>*</span></label>
                            <input value="<?php echo "$address"; ?>" style="margin-bottom: 20px;" placeholder="Street address" type="text" id="address" required>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="state">State / Country <span>*</span></label>
                                <input value="<?php echo "$country"; ?>" type="text" id="state" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="posta">Posta / Zip</label>
                                <input type="text" id="posta">
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="email">Email Address <span>*</span></label>
                                <input value="<?php echo "$email"; ?>" type="email" id="email" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="phone">Phone <span>*</span></label>
                                <input value="<?php echo "$phone_number"; ?>" type="text" id="phone" required>
                            </div>
                        </div>

                        <div>
                            <label style="font-size: 15px;" for="order_notes">Order Notes</label>
                            <br>
                            <textarea placeholder="Write your notes here..." id="order_notes"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-side">
                <div id="billingForm">
                    <p style="font-size: 32px; font-weight: 300;">Coupon Code</p>
                    <div style="padding: 40px; background-color: white; height: auto; border:rgba(128, 128, 128, 0.3) solid 1px;">
                        <label for="">Enter your coupon code if you have one</label>
                        <br>
                        <div style="display: flex; align-items: center; margin-top: 30px; height: 50px;">
                            <input placeholder="Coupon code" style="margin: 0px; margin-right: 20px" type="text" name="" id="">
                            <button>Apply</button>
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

                        <?php
                        if (isset($_SESSION["cart"])) {
                            $totalPrice = 0;
                            foreach ($_SESSION['cart'] as $product) {
                                echo "<div style='display: flex; height: 40px' class='section-price-product'>";
                                echo "<input type='hidden' name='idProduct[]' value='" . $product[3] . "'>";
                                echo "<input type='hidden' name='quantity[]' value='" . $product[4] . "'>";
                                echo "<p style='width: 70%;'>" . $product[1] . "<span style='font-weight: bold; color: black;'> x</span> <span style='color: black;'>" . $product[4] . "</span></p>";
                                echo "<p><span style='color: black'>$</span>" . ($product[2] * $product[4]) . "</p>";
                                echo "</div>";
                                echo "<hr>";
                                $totalPrice += ($product[2] * $product[4]);
                            }
                        }
                        ?>
                        <div style="display: flex; height: 40px;" class="section-price-product">
                            <p style="width: 70%; font-weight: bold;">Order Total</p>
                            <p><span style="color: black">$ </span><?php if (isset($totalPrice)) {
                                echo "$totalPrice";
                            } else {
                                echo "0";
                            }
                             ?></p>
                        </div>
                        <hr>

                        <button type="submit" onclick="orderComplete()" style="font-size: 22px; margin-top: 20px; cursor: pointer;">
                            Place Order
                        </button>

                        <script>
                            function orderComplete() {
                                var cartExists = <?php echo isset($_SESSION['cart']) ? 'true' : 'false'; ?>;

                                if (cartExists) {
                                    // Clear or unset the cart in PHP
                                    <?php unset($_SESSION['cart']); ?>

                                    // Redirect to the specified page
                                    window.location.href = 'index.php?pid=8';
                                }
                            }
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<style>
    .content-10 {
        display: flex;
        justify-content: center;
        margin-bottom: 200px;
        margin-top: 100px;
    }

    .content-10 .container10 {
        width: 68%;
    }

    .content-10 .container10 .first-child {
        border: solid 1px rgba(128, 128, 128, 0.7);
        padding: 28px;
        font-size: 14px;
        opacity: 0.7;
    }

    .content-10 .container10 .second-child {
        display: flex;
        justify-content: space-between;
    }

    .content-10 .container10 .second-child .left-side {
        width: 48%;
    }

    .content-10 .container10 .second-child .right-side {
        width: 48%;
    }

    .container10 .second-child span {
        color: red;
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