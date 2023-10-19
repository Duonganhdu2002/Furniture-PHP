<div class="brand">
    <?php
    $conn = new mysqli('localhost', 'root', '', 'shopping_online');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Định số mục trên mỗi trang
    $itemsPerPage = 8;

    // Lấy trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính offset để lấy dữ liệu từ database
    $offset = ($page - 1) * $itemsPerPage;

    // Lấy dữ liệu từ bảng brands với giới hạn số dòng và offset
    $sql = "SELECT id, brand_name, description, logo FROM brands LIMIT $offset, $itemsPerPage";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu trong bảng
        echo "<div class='brand'>";
        echo "<table class='brand-data-table'>";
        echo
        "<tr>
        <th style='text-align: center;'>STT</th>
        <th style='text-align: center'>ID</th>
        <th style='text-align: center'>
            <img style='width: 25px' src='../PUBLIC-PAGE/images/settingtr.svg'>
        </th>
        <th style='text-align: center'>Brand Name</th>
        <th style='text-align: center'>Description</th>
    </tr>";
        echo
        "<tr>
        <td style='text-align: center'>
            <img style='width: 25px' src='../PUBLIC-PAGE/images/filter.svg'>
        </td>
        <td style='text-align: center'colspan='2'>
            <input id='searchByIdBrand'>
        </td>
        <td style='text-align: center'>
            <input id='searchByIdBrand'>
        </td>
    </tr>";

        $stt = $offset + 1; // Biến đếm STT

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
            echo "<td style='width:4%; text-align: center;'>" . $row["id"] . "</td>";
            echo "<td style='width:4%; text-align: center;'> <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'> </td>";
            echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $row["brand_name"] . "</td>";
            echo "<td style='width: 73%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["description"] . "</td>";
            echo "</tr>";

            $stt++; // Tăng biến đếm STT sau mỗi dòng
        }

        echo "</table>";

        // Tính tổng số trang
        $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM brands"))['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);

        // Hiển thị nút chuyển trang và nút Next, Previous
        echo "<div class='pagination'>";

        // Always show "Previous" button
        echo "<a href='index.php?pid=3&page=" . max(1, $page - 1) . "'>Previous</a> ";

        // Determine the first and last two pages to display
        $startPage = max(1, $page - 2);
        $endPage = min($totalPages, $page + 2);

        // Show the page numbers
        for ($i = $startPage; $i <= $endPage; $i++) {
            echo "<a href='index.php?pid=3&page=$i'";
            if ($i == $page) {
                echo " class='current'";
            }
            echo ">$i</a> ";
        }

        // Always show "Next" button
        echo "<a href='index.php?pid=3&page=" . min($totalPages, $page + 1) . "'>Next</a>";

        echo "</div>";

        echo "</div>";
    } else {
        echo "0 results";
    }

    //Đóng kết nối
    $conn->close();
    ?>
</div>

<style>
    .brand {
        width: 100%;
        margin-top: 20px;
    }

    .brand-data-table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    .brand-data-table th,
    .brand-data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .brand-data-table td {
        height: 50px;
    }

    .brand-data-table tr td input {
        width: 80%;
        height: 60%;
        padding: 3px 8px;
        border: #3b5d50 1px solid;
        border-radius: 6px;
    }

    .brand-data-table th {
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