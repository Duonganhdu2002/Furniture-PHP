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
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['shippingMethod'])) {
    $shippingMethodOut = $_POST['shippingMethod'];
    // Store the value in a session variable
    $_SESSION['shippingMethodOut'] = $shippingMethodOut;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    if (isset($_SESSION['shippingMethodOut'])) {
        $shippingMethodOutFromSession = $_SESSION['shippingMethodOut'];
    }

    unset($_SESSION['cart']);

    $idUser = isset($_POST["id"]) ? mysqli_real_escape_string($conn, $_POST["id"]) : '';
    $idProducts = isset($_POST["idProduct"]) ? $_POST["idProduct"] : [];

    $quantities = isset($_POST["quantity"]) ? $_POST["quantity"] : [];
    $prices = isset($_POST["price"]) ? $_POST["price"] : [];
    $status = isset($_POST["status"]) ? mysqli_real_escape_string($conn, $_POST["status"]) : '';

    $totalPrice = isset($_POST['totalPrice']) ? $_POST["totalPrice"] : 0;
    $orderNotes = isset($_POST["order_notes"]) ? mysqli_real_escape_string($conn, $_POST["order_notes"]) : '';


    // Get the maximum ID from shopping_carts
    $maxIdResult = $conn->query("SELECT MAX(id) AS max_id FROM shopping_carts");
    $maxId = $maxIdResult->fetch_assoc()['max_id'];
    $newId = $maxId + 1;

    // Insert into shopping_carts
    $sql1 = "INSERT INTO shopping_carts (id, user_id, created_at, status, ship_method, note, total_price) 
        VALUES (?, ?, NOW(), 1, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
        created_at = IF(status = 1 AND created_at IS NULL, VALUES(created_at), created_at)";

    // Sử dụng prepared statement để tránh lỗi SQL injection
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("isssd", $newId, $idUser, $shippingMethodOutFromSession, $orderNotes, $totalPrice);

    if ($stmt1->execute() === TRUE) {

        // Get the cart_id after successful insertion
        $cartId = $newId;

        $country = isset($_POST["state"]) ? mysqli_real_escape_string($conn, $_POST["state"]) : '';
        $province = isset($_POST["province"]) ? mysqli_real_escape_string($conn, $_POST["province"]) : '';
        $district = isset($_POST["disttrict"]) ? mysqli_real_escape_string($conn, $_POST["disttrict"]) : '';
        $commune = isset($_POST["commune"]) ? mysqli_real_escape_string($conn, $_POST["commune"]) : '';
        $street = isset($_POST["street"]) ? mysqli_real_escape_string($conn, $_POST["street"]) : '';
        $number = isset($_POST["number"]) ? mysqli_real_escape_string($conn, $_POST["number"]) : '';
        $email = isset($_POST["email"]) ? mysqli_real_escape_string($conn, $_POST["email"]) : '';
        $phone = isset($_POST["phone"]) ? mysqli_real_escape_string($conn, $_POST["phone"]) : '';

        $sqlAddress = "INSERT INTO address_cart (id_cart, username, country, province, district, commune, street, number, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtAddress = $conn->prepare($sqlAddress);
        $stmtAddress->bind_param("issssssiss", $cartId, $idUser, $country, $province, $district, $commune, $street, $number, $email, $phone);

        // Loop through the products and insert into cart_items
        for ($i = 0; $i < count($idProducts); $i++) {

            $idProduct = mysqli_real_escape_string($conn, $idProducts[$i]);
            $quantity = mysqli_real_escape_string($conn, $quantities[$i]);
            $product_price = mysqli_real_escape_string($conn, $prices[$i]);

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

                $sql2 = "INSERT INTO cart_items (id, cart_id, product_id, quantity, user, price) VALUES ('$newIdProduct', '$cartId', '$idProduct', '$quantity', '$idUser', '$product_price')";

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
        header("Location: index.php?pid=8");
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
}

?>


<div class="content-10">
    <form class="container10" action="" method="post" onsubmit="return submitcontainer10();">
        <input type="hidden" name="id" value="<?php echo $id ?>">
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
                            <input value="<?php echo "$full_name"; ?>" type="text" name="first_name" aria-describedby="first_name_help" required>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 32%;">
                                <label for="province">Province <span>*</span></label>
                                <input value="<?php echo "$province" ?>" type="text" name="province" required>
                            </div>
                            <div style="width: 32%;">
                                <label for="district">District <span>*</span></label>
                                <input value="<?php echo "$district" ?>" type="text" name="disttrict" required>
                            </div>
                            <div style="width: 32%;">
                                <label for="commune">Commune <span>*</span></label>
                                <input value="<?php echo "$commune" ?>" type="text" name="commune" required>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="street">Street <span>*</span></label>
                                <input value="<?php echo "$street" ?>" type="text" name="street" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="number">Number <span>*</span></label>
                                <input value="<?php echo "$number" ?>" type="number" name="number" min="1" required>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="state">State / Country <span>*</span></label>
                                <input value="<?php echo "$country"; ?>" type="text" name="state" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="posta">Posta / Zip</label>
                                <input type="text" id="posta">
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="width: 48%;">
                                <label for="email">Email Address <span>*</span></label>
                                <input value="<?php echo "$email"; ?>" type="email" name="email" required>
                            </div>
                            <div style="width: 48%;">
                                <label for="phone">Phone <span>*</span></label>
                                <input value="<?php echo "$phone_number"; ?>" type="text" name="phone" required>
                            </div>
                        </div>

                        <div>
                            <label style="font-size: 15px;" for="order_notes">Order Notes</label>
                            <br>
                            <input type="hidden" name="order_notes" value="<?php echo $orderNotes; ?>">
                            <input placeholder="Write your notes here..." name="order_notes">
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

                            // Calculate total price of products in the cart
                            foreach ($_SESSION['cart'] as $product) {
                                echo "<div style='display: flex; height: 40px' class='section-price-product'>";
                                echo "<input type='hidden' name='idProduct[]' value='" . $product[3] . "'>";
                                echo "<input type='hidden' name='price[]' value='" . $product[2] . "'>";
                                echo "<input type='hidden' name='quantity[]' value='" . $product[4] . "'>";
                                echo "<p style='width: 70%;'>" . $product[1] . "<span style='font-weight: bold; color: black;'> x</span> <span style='color: black;'>" . $product[4] . "</span></p>";
                                echo "<p><span style='color: black'>$</span>" . ($product[2] * $product[4]) . "</p>";
                                echo "</div>";
                                echo "<hr>";
                                $totalPrice += ($product[2] * $product[4]);
                            }

                            // Add shipping fee to the total price
                            if (isset($_SESSION["shippingMethodOut"])) {
                                $shipId = $_SESSION["shippingMethodOut"];
                                $sql = "SELECT standard_price FROM shipping_methods WHERE id = $shipId";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $row = mysqli_fetch_assoc($result);
                                    $shippingFee = $row['standard_price'];

                                    // Display shipping fee
                                    echo "<div style='display: flex; height: 40px' class='section-price-product'>";
                                    echo "<p style='width: 70%;'>Shipping Fee</p>";
                                    echo "<p><span style='color: black'>$</span>" . $shippingFee . "</p>";
                                    echo "</div>";

                                    // Add shipping fee to the total price
                                    $totalPrice += $shippingFee;
                                } else {
                                    echo "Error in query: " . mysqli_error($conn);
                                }
                            }
                        }
                        ?>


                        <hr>
                        <div style="display: flex; height: 40px;" class="section-price-product">
                            <p style="width: 70%; font-weight: bold;">Order Total</p>
                            <p><span style="color: black">$ </span>
                                <?php if (isset($totalPrice)) {
                                    echo "$totalPrice";
                                } else {
                                    echo "0";
                                }
                                ?></p>
                            <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                        </div>
                        <hr>

                        <button name="submit" type="submit" style="font-size: 22px; margin-top: 20px; cursor: pointer;">
                            Place Order
                        </button>

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