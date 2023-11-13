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
            $id = $row["id"];
            echo "<tr>";
            echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
            echo "<td style='width:4%; text-align: center;'>" . $row["id"] . "</td>";
            echo "<td class='hover-cell'; style='width:4%; cursor: pointer; text-align: center;' onmouseover='showButtons(this)' onmouseout='hideButtons(this)'> 
                    <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                    <div class='action-buttons'>
                        <a href='../ADMIN/index.php?pid=3&update&id=$id'><button class='edit-button'>Update</button></a>
                        <br>
                        <a href='../ADMIN/component/delete/brand.php?id=$id'><button class='delete-button'>Delete</button></a>
                        </div>
                  </td>";
            echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $row["brand_name"] . "</td>";
            echo "<td style='width: 73%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["description"] . "</td>";
            echo "</tr>";

            $stt++; // Tăng biến đếm STT sau mỗi dòng
        }

        echo "</table>";

        // Tính tổng số trang
        $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM brands"))['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);
    } else {
        echo "<script>
                alert('No results found for the given search term: $searchTerm');
                window.location.href = 'index.php?pid=3';
              </script>";
    }
    ?>
</div>
