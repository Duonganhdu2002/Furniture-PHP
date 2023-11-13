<div class="category">
    <table class="category-data-table">
        <!-- Tiêu đề nha anh chị -->
        <tr>
            <th style="text-align: center;">STT</th>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Name</th>
            <th style="text-align: center">Phone</th>
            <th style="text-align: center">Email</th>
            <th style="text-align: center">Birth</th>
            <th style="text-align: center">Gender</th>
            <th style="text-align: center">Avatar</th>
            <th style="text-align: center">Address</th>
        </tr>
        <!-- Form chổ tìm kiếm đóa anh chị -->
        <tr>
            <td style="text-align: center">
                <img type="image" style="width: 25px" src="../PUBLIC-PAGE/images/filter.svg">
            </td>
            <td style="text-align: center;">
            </td>
            <td style="text-align: center">
                <form action="index.php?pid=4&memberId=0" method="post">
                    <input name="searchByUsernameMember" type="text">
                </form>
            </td>
            <td style="text-align: center">

            </td>
            <td style="text-align: center">
            </td>
            <td style="text-align: center">
                <form action="index.php?pid=4&memberId=0" method="post">
                    <input name="searchByEmailMember" type="text">
                </form>
            </td>
        </tr>

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
        $sqlInformation = "SELECT username, full_name, date_of_birth, email, gender, phone_number, avatar FROM information WHERE role = 'admin' LIMIT $offset, $itemsPerPage";
        $resultInformation = $conn->query($sqlInformation);
        // SQL của bảng Address
        $sqlAddress = "SELECT username, country, province, district, commune, street, number FROM addresses WHERE role = 'admin' LIMIT $offset, $itemsPerPage";
        $resultAddress = $conn->query($sqlAddress);

        if (isset($_GET['memberId'])) {
            $memberId = $_GET['memberId'];
            if ($memberId === '0') {
                include "searching/member-searching.php";
            } else {
                include "searching/member-detail.php";
            }
        } else {
            include "searching/member-detail.php";
        }

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
        height: 30%;
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