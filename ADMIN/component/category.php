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

// Lấy dữ liệu từ bảng categories với giới hạn số dòng và offset
$sql = "SELECT id, parent_category_id, category_name, description FROM categories LIMIT $offset, $itemsPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị dữ liệu trong bảng
    echo "<div class='category'>";
    echo "<table class='category-data-table'>";
    echo "<tr><th style='text-align: center;'>STT</th><th style='text-align: center'>ID</th><th style='text-align: center'><img style='width: 25px' src='../PUBLIC-PAGE/images/settingtr.svg'></th><th style='text-align: center'>Category Name</th><th style='text-align: center'>Description</th></tr>";
    echo "<tr><td style='text-align: center'><img style='width: 25px' src='../PUBLIC-PAGE/images/filter.svg'></td><td style='text-align: center' colspan='2'><input></td><td style='text-align: center'><input></td></tr>";

    $stt = $offset + 1; // Biến đếm STT

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
        echo "<td style='width:4%; text-align: center;'>" . $row["id"] . "</td>";
        echo "<td style='width:4%; text-align: center;'> <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'> </td>";
        echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $row["category_name"] . "</td>";
        echo "<td style='width: 73%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["description"] . "</td>";
        echo "</tr>";

        $stt++; // Tăng biến đếm STT sau mỗi dòng
    }

    echo "</table>";

    // Tính tổng số trang
    $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM categories"))['total'];
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Hiển thị nút chuyển trang và nút Next, Previous
    echo "<div class='pagination'>";

    if ($page > 1) {
        echo "<a href='index.php?pid=1&page=" . ($page - 1) . "'>Previous</a> ";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='index.php?pid=1&page=$i'>$i</a> ";
    }

    if ($page < $totalPages) {
        echo "<a href='index.php?pid=1&page=" . ($page + 1) . "'>Next</a> ";
    }

    echo "</div>";

    echo "</div>";
} else {
    echo "0 results";
}

// Đóng kết nối
$conn->close();
?>

<style>
    .category {
        width: 100%;
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
        padding: 3px 8px 3px 8px;
        border: #3b5d50 1px solid;
        border-radius: 6px;
    }

    .category-data-table th {
        background-color: #f2f2f2;
    }

    .pagination {
        margin-top: 20px;
        float: right;
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
        padding: 10px 15px 10px 15px;
        color: white;
    }

    .pagination a:hover {
        background-color: #ddd;
    }
</style>