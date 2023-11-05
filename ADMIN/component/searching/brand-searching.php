<div>
    <?php
    $result = null; // Khởi tạo biến $result

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['searchByIdBrand'])) {
            $searchTerm = $_POST['searchByIdBrand'];
            $sql = "SELECT id, brand_name, description, logo FROM brands WHERE id LIKE '%$searchTerm'";
            $result = $conn->query($sql);
        } elseif (isset($_POST['searchByNameBrand'])) {
            $searchTerm = $_POST['searchByNameBrand'];
            $sql = "SELECT id, brand_name, description, logo FROM brands WHERE brand_name LIKE '%$searchTerm'";
            $result = $conn->query($sql);
        }
    }

    if ($result && $result->num_rows > 0) {
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

        echo "<div class 'pagination'>";

        // Always show "First" button
        echo "<a href='index.php?pid=3&page=1'>First</a> ";

        // Determine the first and last two pages to display
        $startPage = max(1, $page - 1);
        $endPage = min($totalPages, $page + 1);

        // Show the page numbers
        for ($i = $startPage; $i <= $endPage; $i++) {
            echo "<a href='index.php?pid=3&page=$i'";
            if ($i == $page) {
                echo " class='current'";
            }
            echo ">$i</a> ";
        }

        // Always show "End" button
        echo "<a href='index.php?pid=3&page=$totalPages'>End</a>";

        echo "</div>";
    } else {
        echo "<script>
        alert('No results found for the given search term: $searchTerm');
        </script>";
    
    }
    ?>
</div>
