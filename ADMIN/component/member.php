<div class="category">
    <table class="category-data-table">
        <!-- Tiêu đề nha anh chị -->
        <tr>
            <th style="text-align: center;">STT</th>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Name</th>
            <th style="text-align: center">Email</th>
            <th style="text-align: center">Phone</th>
            <th style="text-align: center">Birth</th>
            <th style="text-align: center">Gender</th>
            <th style="text-align: center">Avatar</th>
            <th style="text-align: center">Address</th>
        </tr>
        <!-- Form chổ tìm kiếm đóa anh chị -->
        <form id="myForm" action="#" method="post">
            <tr>
                <td style="text-align: center">
                    <img type="image" style="width: 25px" src="../PUBLIC-PAGE/images/filter.svg">
                </td>
                <td style="text-align: center;">
                    <input style="width: 50%;" name="searchByIdCategory" id="searchByIdCategory">
                </td>
                <td style="text-align: center">
                    <input name="searchByNameCategory" id="searchByNameCategory">
                </td>
                <td style="text-align: center">
                    <input name="searchByNameCategory" id="searchByNameCategory">
                </td>
                <td style="text-align: center">
                    <input name="searchByNameCategory" id="searchByNameCategory">
                </td>
                <td style="text-align: center">
                    <input name="searchByNameCategory" id="searchByNameCategory">
                </td>
            </tr>
        </form>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Tạo mấy cái biến phân trang chơi
        $itemsPerPage = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $itemsPerPage;
        // SQL của bảng User
        $sqlUser = "SELECT id, username, password, image FROM users WHERE role = 'admin' LIMIT $offset, $itemsPerPage";
        $resultUser = $conn->query($sqlUser);
        // SQL của bảng Information
        $sqlInformation = "SELECT full_name, date_of_birth, email, gender, phone_number, avatar FROM information LIMIT $offset, $itemsPerPage";
        $resultInformation = $conn->query($sqlInformation);
        // SQL của bảng Address
        $sqlAddress = "SELECT country, province, district, commune, street, number FROM addresses LIMIT $offset, $itemsPerPage";
        $resultAddress = $conn->query($sqlAddress);

        if ($resultUser->num_rows > 0 && $resultInformation->num_rows > 0 && $resultAddress->num_rows > 0) {
            $stt = $offset + 1;

            while (($rowUser = $resultUser->fetch_assoc()) && ($rowInformation = $resultInformation->fetch_assoc()) && ($rowAddress = $resultAddress->fetch_assoc())) {
                echo "<tr>";
                echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
                echo "<td style='width:4%; text-align: center;'>" . $rowUser["id"] . "</td>";
                echo "<td style='width: 8%; padding: 10px 20px 10px 20px'>" . $rowUser["username"] . "</td>";
                echo "<td style='width: 14%; padding: 10px 20px 10px 20px'>" . $rowInformation["full_name"] . "</td>";
                echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>" . $rowInformation["phone_number"] . "</td>";
                echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $rowInformation["email"] . "</td>";
                echo "<td style='width: 10%; padding: 10px 20px 10px 20px'>" . $rowInformation["date_of_birth"] . "</td>";
                if ($rowInformation["gender"] === '1') {
                    echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>Nam</td>";
                } else {
                    echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>Nữ</td>";
                }
                echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>
                    <img style='width: 40px' src='../PUBLIC-PAGE/images/" . $rowInformation["avatar"] . "'>
                </td>";
                $province = $rowAddress["province"];
                $district = $rowAddress["district"];
                $commune = $rowAddress["commune"];
                $street = $rowAddress["street"];
                $number = $rowAddress["number"];
                $address = "$number, $street, $commune, $district, $province";
                $rowAddress["address"] = $address;
                echo "<td style='width: 30%; padding: 10px 20px 10px 20px'>" . $rowAddress["address"] . "</td>";
                echo "</tr>";
                $stt++;
            }
            echo "</table>";
        }


        $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM categories"))['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);

        echo "<div class='pagination'>";

        // Always show "First" button
        echo "<a href='index.php?pid=4&page=1'>First</a> ";

        // Determine the first and last two pages to display
        $startPage = max(1, $page - 1);
        $endPage = min($totalPages, $page + 1);

        // Show the page numbers
        for ($i = $startPage; $i <= $endPage; $i++) {
            echo "<a href='index.php?pid=4&page=$i'";
            if ($i == $page) {
                echo " class='current'";
            }
            echo ">$i</a> ";
        }

        // Always show "End" button
        echo "<a href='index.php?pid=4&page=$totalPages'>End</a>";

        echo "</div>";

        $conn->close();
        ?>
    </table>
</div>
<style>
    .category {
        width: 100%;
        margin-top: 20px;
    }

    .category-data-table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    .category-data-table th,
    .category-data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .category-data-table td {
        height: 50px;
    }

    .category-data-table tr td input {
        width: 80%;
        height: 60%;
        padding: 3px 8px;
        border: #3b5d50 1px solid;
        border-radius: 6px;
    }

    .category-data-table th {
        background-color: #f2f2f2;
    }

    .pagination {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #fff;
        padding: 10px;
    }

    .pagination a {
        padding: 8px;
        text-decoration: none;
        color: #000;
        background-color: #f2f2f2;
        margin-right: 5px;
        border: none;
        border-radius: 4px;
        background-color: #3b5d50;
        padding: 10px 15px;
        color: white;
    }

    .pagination a:hover {
        background-color: #ddd;
    }
</style>