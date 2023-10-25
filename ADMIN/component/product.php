<div class="product">
    <table class="product-data-table">
        <tr>
            <th style="text-align: center;">STT</th>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">
                <img style="width: 25px" src="../PUBLIC-PAGE/images/settingtr.svg">
            </th>
            <th style="text-align: center">Tên Sản Phẩm</th>
            <th style="text-align: center">Description</th>
            <th style="text-align: center">Image</th>
            <th style="text-align: center">Price</th>
            <th style="text-align: center">SL</th>
        </tr>

        <form id="myForm" action="#" method="post">
            <tr>
                <td style="text-align: center">
                    <img type="image" style="width: 25px" src="../PUBLIC-PAGE/images/filter.svg">
                </td>
                <td style="text-align: center" colspan="2">
                    <input name="searchByIdproduct" id="searchByIdproduct">
                </td>
                <td style="text-align: center">
                    <input name="searchByNameproduct" id="searchByNameproduct">
                </td>
            </tr>
        </form>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $itemsPerPage = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $itemsPerPage;

        $sql = "SELECT id, category_id, product_name, description, image, price, stock_quantity FROM products LIMIT $offset, $itemsPerPage";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $stt = $offset + 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
                echo "<td style='width:4%; text-align: center;'>" . $row["id"] . "</td>";
                echo "<td style='width:4%; text-align: center;'> 
                        <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                      </td>";
                echo "<td style='width: 20%; padding: 10px 20px 10px 20px'>" . $row["product_name"] . "</td>";
                echo "<td style='width: 40%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["description"] . "</td>";
                echo "<td style='width: 6%;height:15%; text-align: center;'><img style='width: 65px; height: 92px;' src='../PUBLIC-PAGE/images/chairs/" . $row["image"] . "' style='width: 100px; height: auto;'></td>";

                echo "<td style='width: 10%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["price"] . "</td>";
                echo "<td style='width: 10%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["stock_quantity"] . "</td>";
                echo "</tr>";

                $stt++;
            }

            echo "</table>";

            $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM products"))['total'];
            $totalPages = ceil($totalItems / $itemsPerPage);

            echo "<div class='pagination'>";

            // Luôn hiển thị nuts Previous nha
            echo "<a href='index.php?pid=2&page=" . max(1, $page - 1) . "'>Previous</a> ";

            // Determine the first and last two pages to display
            $startPage = max(1, $page - 2);
            $endPage = min($totalPages, $page + 2);

            // Show the page numbers
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo "<a href='index.php?pid=2&page=$i'";
                if ($i == $page) {
                    echo " class='current'";
                }
                echo ">$i</a> ";
            }

            // Always show "Next" button
            echo "<a href='index.php?pid=2&page=" . min($totalPages, $page + 1) . "'>Next</a>";

            echo "</div>";


        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </table>
</div>
<style>
    .product {
        width: 100%;
        margin-top: 20px;
    }

    .product-data-table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
    }

    .product-data-table th,
    .product-data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .product-data-table td {
        height: 50px;
    }

    .product-data-table tr td input {
        width: 80%;
        height: 60%;
        padding: 3px 8px;
        border: #3b5d50 1px solid;
        border-radius: 6px;
    }

    .product-data-table th {
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