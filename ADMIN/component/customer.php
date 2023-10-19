<div class="category">
    <table class="category-data-table">
        <tr>
            <th style="text-align: center;">STT</th>
            <td style='width:4%; text-align: left;'> 
                        <img style='width: 25px' src='../PUBLIC-PAGE/images/support.svg'>
                      </td>
            <th style="text-align: center">Họ và tên</th>
            <th style="text-align: center">Số điện thoại</th>
            <th style="text-align: center">Email</th>
            <th style="text-align: center">Địa chỉ</th>
            <th style="text-align: center">Giới tính</th>
            

        </tr>

        <form id="myForm" action="#" method="post">
            <tr>
                <td style="text-align: center">
                    <img type="image" style="width: 25px" src="../PUBLIC-PAGE/images/filter.svg">
                </td>
               
                <td style="text-align: center"colspan="2">
                    <input name="searchByfull_nameinformation" id="searchByfull_nameinformation">
                </td>
                <td style="text-align: center">
                    <input name="searchByphone_numberinformation" id="searchByphone_numberinformation">
                </td>
                <td style="text-align: center">
                    <input name="searchByemailinformation" id="searchByemailinformation">
                </td>
                <td style="text-align: center">
                    <input name="searchByemailinformation" id="searchByemailinformation">
                </td>
                <td style="text-align: center">
                    <input name="searchBygenderinformation" id="searchBygenderinformation">
                </td>
            </tr>
        </form>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $itemsPerPage = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $itemsPerPage;

        $sql = "SELECT id, full_name, date_of_birth, email, gender, phone_number FROM information LIMIT $offset, $itemsPerPage";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $stt = $offset + 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
                echo "<td style='width:8%; text-align: left;'> 
                        <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                      </td>";
                echo "<td style='width: 13%'; text-align: left;'>" . $row["full_name"] . "</td>";
                echo "<td style='width: 14%'; >" . $row["phone_number"] . "</td>";
                echo "<td style='width: 25%'; >" . $row["email"] . "</td>";
                echo "<td style='width: 30%'; >" . $row["date_of_birth"] . "</td>";
                echo "<td style='width: 25%; text-align: center;' >" . $row["gender"] . "</td>";
                echo "</tr>";

                $stt++;
            }

            echo "</table>";

            $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM categories"))['total'];
            $totalPages = ceil($totalItems / $itemsPerPage);

            echo "<div class='pagination'>";

            if ($page > 1) {
                echo "<a href='index.php?pid=5&page=" . ($page - 1) . "'>Previous</a> ";
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='index.php?pid=5&page=$i'>$i</a> ";
            }

            if ($page < $totalPages) {
                echo "<a href='index.php?pid=5&page=" . ($page + 1) . "'>Next</a> ";
            }

            echo "</div>";
        } else {
            echo "0 results";
        }

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
        border: 1px solid #ddd;
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
