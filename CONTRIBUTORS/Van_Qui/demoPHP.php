<?php

// Thực hiện kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

session_start();

// Đăng nhập
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // --- Kiểm tra tên đăng nhập và mật khẩu trong cơ sở dữ liệu
    $sql = "SELECT * FROM Users WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tên đăng nhập và mật khẩu hợp lệ, đăng nhập thành công
        echo "Đăng nhập thành công!";
    } else {
        // Tên đăng nhập hoặc mật khẩu không chính xác
        echo "Tên đăng nhập hoặc mật khẩu không chính xác.";
    }

    // --- Thực hiện xác thực đăng nhập
    $sql = "SELECT * FROM Users WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) { // NẾU ĐÚNG SẼ TRẢ VỀ 1, NẾU SAI SẼ TRẢ VỀ 0
        // Tên đăng nhập và mật khẩu hợp lệ, đăng nhập thành công
        $_SESSION['username'] = $username; // Lưu tên đăng nhập trong phiên làm việc
        header("Location: dashboard.php"); // Chuyển hướng đến trang Dashboard
        exit();
    } else {
        // Tên đăng nhập hoặc mật khẩu không chính xác
        $error_message = "Tên đăng nhập hoặc mật khẩu không chính xác.";
    }

    // Chuyển hướng đến Dashboard sau khi đăng nhập thành công
    header("Location: dashboard.php");
    exit();
}

// Trang chính (Chưa Đăng Nhập)
if (!isset($_SESSION['user_id'])) {

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (isset($_SESSION['username'])) {
        // Người dùng đã đăng nhập, hiển thị nội dung sau khi đăng nhập
        include('logged_in_content.php'); // Thay đổi tên tệp và đường dẫn tùy theo tên tệp của bạn
    } else {
        // Người dùng chưa đăng nhập, hiển thị form đăng nhập và đăng ký
        include('login_register_form.php'); // Thay đổi tên tệp và đường dẫn tùy theo tên tệp của bạn
    }

    // Hiển thị thông tin sản phẩm hot và khuyến mãi
    $sql = "SELECT * FROM Products WHERE Category = 'Sofa' OR Category = 'Bàn trà' ORDER BY Price DESC LIMIT 5"; // lấy sofa or bàn trà và giới hạn tối đa 5 dòng
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Sản phẩm hot và khuyến mãi:</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "Tên sản phẩm: " . $row["Name"] . "<br>";
            echo "Mô tả: " . $row["Description"] . "<br>";
            echo "Danh mục: " . $row["Category"] . "<br>";
            echo "Giá: $" . $row["Price"] . "<br>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Không có sản phẩm hot hoặc khuyến mãi nào.";
    }
}

// Dashboard (Đã Đăng Nhập)
if (isset($_SESSION['user_id'])) {
    // --- Truy vấn thông tin quan trọng và doanh số bán hàng từ cơ sở dữ liệu
    $sql = "SELECT * FROM sales_data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị thông báo quan trọng
        echo "<h2>Thông báo quan trọng:</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["message"] . "</li>";
        }
        echo "</ul>";

        // Hiển thị tổng quan về doanh số bán hàng
        echo "<h2>Tổng quan về doanh số bán hàng:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "Doanh số bán hàng tháng " . $row["month"] . ": $" . $row["revenue"] . "<br>";
        }
    } else {
        echo "Không có thông báo quan trọng hoặc dữ liệu doanh số bán hàng.";
    }
}

// Quản lý Sản phẩm/Danh mục sản phẩm
if (isset($_SESSION['user_id'])) {

    //--- Tìm kiếm sản phẩm
    $search_results = array();

    if (isset($_GET['search'])) {
        $keyword = $_GET['keyword'];

        // Tìm kiếm sản phẩm trong cơ sở dữ liệu dựa trên từ khóa
        $sql = "SELECT * FROM Products WHERE Name LIKE '%$keyword%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $search_results[] = $row;
            }
        }
    }

    // In kết quả tìm kiếm
    if (count($search_results) > 0) {
        foreach ($search_results as $product) {
            echo "Tên sản phẩm: " . $product['Name'] . "<br>";
            echo "Mô tả: " . $product['Description'] . "<br>";
            echo "Danh mục: " . $product['Category'] . "<br>";
            echo "Giá: " . $product['Price'] . "<br>";
            echo "Số lượng trong kho: " . $product['StockQuantity'] . "<br><br>";
        }
    } else {
        echo "Không tìm thấy sản phẩm phù hợp.";
    }

    // --- Thêm sản phẩm vào giỏ hàng
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $quantity = $_POST['quantity'];

        // Kiểm tra xem giỏ hàng đã được tạo trong session chưa
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$product_id])) {
            // Nếu sản phẩm đã tồn tại, cộng thêm số lượng mới vào số lượng hiện có
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
            $_SESSION['cart'][$product_id] = array(
                'product_id' => $product_id,
                'quantity' => $quantity,
                'product_name' => $product_name,
                'product_price' => $product_price
            );
        }

        // Chuyển hướng đến trang giỏ hàng sau khi thêm sản phẩm thành công
        header("Location: cart.php");
        exit();
    }

    // --- Kiểm tra xem sản phẩm có được thêm vào giỏ hàng không
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Kiểm tra xem sản phẩm có tồn tại trong cơ sở dữ liệu hay không
        $product_query = "SELECT * FROM Products WHERE ProductID = ?";
        $stmt = $conn->prepare($product_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product_name = $row['Name'];
            $product_price = $row['Price'];

            // Kiểm tra xem giỏ hàng đã được tạo trong session hay chưa
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            if (isset($_SESSION['cart'][$product_id])) {
                // Nếu sản phẩm đã tồn tại, cộng thêm số lượng mới vào số lượng hiện có
                $_SESSION['cart'][$product_id]['quantity'] += $quantity;
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
                $_SESSION['cart'][$product_id] = array(
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'product_name' => $product_name,
                    'product_price' => $product_price
                );
            }

            // Chuyển hướng đến trang giỏ hàng sau khi thêm sản phẩm thành công
            header("Location: cart.php");
            exit();
        } else {
            // Sản phẩm không tồn tại trong cơ sở dữ liệu
            echo "Sản phẩm không tồn tại.";
        }
        // Đóng kết nối cơ sở dữ liệu
        $stmt->close();
    }

    // --- Xóa sản phẩm trong giỏ hàng
    if (isset($_GET['remove_product'])) {
        $product_id = $_GET['product_id'];

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($_SESSION['cart'][$product_id])) {
            // Nếu sản phẩm tồn tại trong giỏ hàng, xóa nó
            unset($_SESSION['cart'][$product_id]);
        }

        // Chuyển hướng đến trang giỏ hàng sau khi xóa sản phẩm thành công
        header("Location: cart.php");
        exit();
    }

    // --- Cập nhật giỏ hàng 
    if (isset($_POST['update_cart'])) {
        $new_quantities = $_POST['quantity'];

        // Kiểm tra và cập nhật số lượng sản phẩm trong giỏ hàng
        foreach ($new_quantities as $product_id => $new_quantity) {
            if (isset($_SESSION['cart'][$product_id])) {
                // Kiểm tra số lượng mới phải là một số nguyên dương
                if (is_numeric($new_quantity) && $new_quantity > 0) {
                    $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
                }
            }
        }

        // Chuyển hướng đến trang giỏ hàng sau khi cập nhật thành công
        header("Location: cart.php");
        exit();
    }

    // --- Tính tổng giá trị đơn hàng
    $total_price = 0;

    foreach ($cart as $item) {
        $quantity = $item['quantity'];
        $price = $item['price'];
        $subtotal = $quantity * $price;
        $total_price += $subtotal;
    }

    // Sau khi lặp qua tất cả sản phẩm trong giỏ hàng, $total_price sẽ chứa tổng giá trị đơn hàng
    echo "Tổng giá trị đơn hàng: $" . number_format($total_price, 2);
}

// Quản lý Đơn đặt hàng
if (isset($_SESSION['user_id'])) {
    // --- Kiểm tra và xử lý đơn hàng mới
    // Truy vấn đơn hàng mới (ví dụ: đơn hàng chưa xử lý)
    $sql = "SELECT * FROM orders WHERE status = 'Chưa xử lý'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lặp qua danh sách đơn hàng mới
        while ($row = $result->fetch_assoc()) {
            // Xử lý đơn hàng ở đây (ví dụ: cập nhật trạng thái và gửi xác nhận đơn hàng)

            // Cập nhật trạng thái đơn hàng
            $order_id = $row["order_id"];
            $update_sql = "UPDATE orders SET status = 'Đã xử lý' WHERE order_id = $order_id";
            $conn->query($update_sql);

            // Gửi xác nhận đơn hàng cho khách hàng
            $to_email = $row["customer_email"]; // Địa chỉ email của khách hàng
            $subject = "Xác nhận đơn hàng #" . $order_id; // Tiêu đề email
            $message = "Cảm ơn bạn đã đặt hàng tại cửa hàng chúng tôi. Đơn hàng của bạn có mã số #" . $order_id . " đã được xử lý thành công."; // Nội dung email

            // Địa chỉ email của người gửi
            $from_email = "your_email@example.com";
            $headers = "From: " . $from_email;

            // Gửi email
            if (mail($to_email, $subject, $message, $headers)) {
                echo "Đã gửi xác nhận đơn hàng cho khách hàng.";
            } else {
                echo "Gửi xác nhận đơn hàng không thành công.";
            }

            // Đánh dấu đơn hàng đã được xử lý
            echo "Đã xử lý đơn hàng #" . $order_id . "<br>";
        }
    } else {
        echo "Không có đơn hàng mới cần xử lý.";
    }

    // -- Cập nhật trạng thái vận chuyển và thông tin liên quan
    // Lấy thông tin đơn hàng cần cập nhật
    $order_id = 123; // Thay thế bằng mã đơn hàng cần cập nhật
    $new_status = "Đang giao hàng"; // Trạng thái vận chuyển mới
    $tracking_number = "ABC123XYZ"; // Số theo dõi vận chuyển mới

    // Cập nhật thông tin đơn hàng
    $sql = "UPDATE orders SET status = ?, tracking_number = ? WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_status, $tracking_number, $order_id);

    if ($stmt->execute()) {
        echo "Cập nhật trạng thái vận chuyển và thông tin liên quan thành công.";
    } else {
        echo "Cập nhật không thành công: " . $stmt->error;
    }
}

// --- Quản lý Khách hàng
if (isset($_SESSION['user_id'])) {
    if (isset($_POST['add_customer'])) {
        // --- Thêm mới thông tin khách hàng vào cơ sở dữ liệu
        // Lấy thông tin từ biểu mẫu
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $phoneNumber = $_POST["phoneNumber"];

            // Chuẩn bị truy vấn SQL để thêm dữ liệu khách hàng
            $sql = "INSERT INTO Customers (FirstName, LastName, Email, Address, PhoneNumber)
            VALUES ('$firstName', '$lastName', '$email', '$address', '$phoneNumber')";

            if ($conn->query($sql) === TRUE) {
                echo "Thêm khách hàng mới thành công.";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    if (isset($_POST['edit_customer'])) {
        // --- Sửa đổi thông tin khách hàng trong cơ sở dữ liệu
        // Lấy thông tin khách hàng cần sửa đổi
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["customerID"])) {
            $customerID = $_GET["customerID"];

            // Kiểm tra xem khách hàng có tồn tại trong cơ sở dữ liệu không
            $checkCustomerQuery = "SELECT * FROM Customers WHERE CustomerID = $customerID";
            $result = $conn->query($checkCustomerQuery);

            if ($result->num_rows == 0) {
                echo "Khách hàng không tồn tại.";
                exit();
            }

            $customerData = $result->fetch_assoc();
        }

        // Lưu thông tin đã sửa đổi
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["customerID"])) {
            $customerID = $_POST["customerID"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $phoneNumber = $_POST["phoneNumber"];

            // Chuẩn bị truy vấn SQL để cập nhật thông tin khách hàng
            $updateQuery = "UPDATE Customers SET FirstName='$firstName', LastName='$lastName', Email='$email', Address='$address', PhoneNumber='$phoneNumber' WHERE CustomerID=$customerID";

            if ($conn->query($updateQuery) === TRUE) {
                echo "Cập nhật thông tin khách hàng thành công.";
            } else {
                echo "Lỗi: " . $updateQuery . "<br>" . $conn->error;
            }
        }
    }

    // xóa thông tin khách hàng trong cơ sở dữ liệu
    if (isset($_GET['customer_id'])) {
        $customer_id = $_GET['customer_id'];

        // Truy vấn SQL để xóa thông tin khách hàng
        $delete_query = "DELETE FROM Customers WHERE CustomerID = ?";
        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param("i", $customer_id);

        if ($stmt->execute()) {
            echo "Xóa thông tin khách hàng thành công.";
        } else {
            echo "Xóa thông tin khách hàng thất bại: " . $stmt->error;
        }

        // Đóng kết nối cơ sở dữ liệu
        $stmt->close();
    }
}

// Thống kê và Báo cáo
if (isset($_SESSION['user_id'])) {
    // --- Tạo và hiển thị các báo cáo về doanh số bán hàng, tỉ lệ chuyển đổi, lợi nhuận và các chỉ số khác
    // Tính tổng doanh số bán hàng
    $revenueQuery = "SELECT SUM(TotalAmount) AS TotalRevenue FROM Orders";
    $revenueResult = $conn->query($revenueQuery);
    $totalRevenue = 0;
    if ($revenueResult->num_rows > 0) {
        $row = $revenueResult->fetch_assoc();
        $totalRevenue = $row["TotalRevenue"];
    }

    // Tính tỉ lệ chuyển đổi
    $conversionRateQuery = "SELECT COUNT(*) AS TotalOrders FROM Orders";
    $conversionRateResult = $conn->query($conversionRateQuery);
    $totalOrders = 0;
    if ($conversionRateResult->num_rows > 0) {
        $row = $conversionRateResult->fetch_assoc();
        $totalOrders = $row["TotalOrders"];
    }
    $conversionRate = 0;
    if ($totalOrders > 0) {
        $conversionRate = ($totalOrders / $totalRevenue) * 100;
    }

    // Tính lợi nhuận
    $profitQuery = "SELECT SUM(Profit) AS TotalProfit FROM Orders";
    $profitResult = $conn->query($profitQuery);
    $totalProfit = 0;
    if ($profitResult->num_rows > 0) {
        $row = $profitResult->fetch_assoc();
        $totalProfit = $row["TotalProfit"];
    }

    // Hiển thị báo cáo
    echo "<h2>Báo Cáo Doanh Số Bán Hàng</h2>";
    echo "Tổng Doanh Số Bán Hàng: $" . number_format($totalRevenue, 2) . "<br>";
    echo "Tỉ Lệ Chuyển Đổi: " . number_format($conversionRate, 2) . "%<br>";
    echo "Lợi Nhuận: $" . number_format($totalProfit, 2);
}

// Quản lý Người dùng/Admin
if (isset($_SESSION['user_id'])) {
    if (isset($_POST['add_user'])) {
        // --- Thêm mới tài khoản người dùng vào cơ sở dữ liệu
        // Dữ liệu tài khoản ADMIN mới
        $adminUsername = "newadmin";
        $adminPassword = password_hash("adminpassword", PASSWORD_DEFAULT); // Hash mật khẩu

        // Thêm tài khoản ADMIN vào cơ sở dữ liệu
        $sql = "INSERT INTO Users (Username, Password, Role) VALUES (?, ?, 'Admin')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $adminUsername, $adminPassword);

        if ($stmt->execute()) {
            echo "Thêm tài khoản ADMIN thành công.";
        } else {
            echo "Lỗi khi thêm tài khoản ADMIN: " . $stmt->error;
        }
    }

    if (isset($_POST['edit_user'])) {
        // --- Sửa đổi thông tin tài khoản người dùng trong cơ sở dữ liệu
        // Dữ liệu tài khoản ADMIN cần sửa đổi
        $adminID = 1; // Thay thế bằng ID của tài khoản ADMIN cần sửa
        $newUsername = "new_admin_username";
        $newPassword = "new_admin_password";

        // Chuỗi SQL UPDATE
        $updateQuery = "UPDATE Users SET Username = ?, Password = ? WHERE UserID = ?";

        // Sử dụng prepared statement để thực hiện truy vấn với các tham số
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssi", $newUsername, $newPassword, $adminID);

        // Thực hiện truy vấn UPDATE
        if ($stmt->execute()) {
            echo "Sửa đổi thông tin tài khoản ADMIN thành công.";
        } else {
            echo "Sửa đổi thông tin tài khoản ADMIN thất bại: " . $stmt->error;
        }

        // Đóng kết nối
        $stmt->close();
    }

    if (isset($_POST['delete_user'])) {
        // Xóa tài khoản người dùng khỏi cơ sở dữ liệu
        // ID của tài khoản ADMIN cần xóa
        $adminIDToDelete = 1; // Thay thế bằng ID của tài khoản ADMIN cần xóa

        // Chuỗi SQL DELETE
        $deleteQuery = "DELETE FROM Users WHERE UserID = ?";

        // Sử dụng prepared statement để thực hiện truy vấn với tham số
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $adminIDToDelete);

        // Thực hiện truy vấn DELETE
        if ($stmt->execute()) {
            echo "Xóa tài khoản ADMIN thành công.";
        } else {
            echo "Xóa tài khoản ADMIN thất bại: " . $stmt->error;
        }

        // Đóng kết nối
        $stmt->close();
    }
}


// Hỗ trợ và Liên lạc KHI CÓ BẢNG DATA VỀ PHẢN HỒI KHÁCH HÀNG
if (isset($_SESSION['user_id'])) {
    // Xem hộp thư hoặc hệ thống hỗ trợ để xem và trả lời câu hỏi từ khách hàng
    // Lấy danh sách câu hỏi từ khách hàng
    $sql = "SELECT * FROM CustomerQuestions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Câu hỏi từ khách hàng:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>";
            echo "Tên: " . $row["Name"] . "<br>";
            echo "Email: " . $row["Email"] . "<br>";
            echo "Câu hỏi: " . $row["QuestionText"] . "<br>";
            echo "Trạng thái: " . $row["Status"] . "<br>";
            echo "</p>";
        }
    } else {
        echo "Không có câu hỏi từ khách hàng.";
    }

    // TRẢ LỜI CÂU HỎI TỪ KHÁCH HÀNG
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $questionID = $_POST["question_id"];
        $replyText = $_POST["reply_text"];

        // Thêm phản hồi vào bảng SupportReplies
        $insertQuery = "INSERT INTO SupportReplies (QuestionID, ReplyText) VALUES ($questionID, '$replyText')";

        if ($conn->query($insertQuery) === TRUE) {
            // Cập nhật trạng thái câu hỏi thành "Closed"
            $updateQuery = "UPDATE CustomerQuestions SET Status = 'Closed' WHERE QuestionID = $questionID";
            $conn->query($updateQuery);

            echo "Đã trả lời câu hỏi và đánh dấu là đã đóng.";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}

// Đăng xuất
if (isset($_POST['logout'])) {
    // Thực hiện đăng xuất và hủy phiên làm việc
    session_destroy();
    header("Location: login.php");
    exit();
}
