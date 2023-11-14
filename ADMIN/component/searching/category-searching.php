<div>
    <?php
    // $result = null; 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['searchByIdCategory'])) {
            $searchTerm = $_POST['searchByIdCategory'];
            $sql = "SELECT id, parent_category_id, category_name, description FROM categories WHERE id LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
        } else if (isset($_POST['searchByNameCategory'])) {
            $searchTerm = $_POST['searchByNameCategory'];
            $sql = "SELECT id, parent_category_id, category_name, description FROM categories WHERE category_name LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
        }
    }

    if ($result && $result->num_rows > 0) {
        $stt = $offset + 1;

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            echo "<tr>";
            echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
            echo "<td style='width:4%; text-align: center;'>" . $row["id"] . "</td>";
            echo "<td class='hover-cell'; style='width:4%; cursor: pointer; text-align: center;' onmouseover='showButtons(this)' onmouseout='hideButtons(this)'> 
                    <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                    <div class='action-buttons'>
                        <a href='../ADMIN/index.php?pid=1&update&id=$id'><button class='edit-button'>Update</button></a>
                        <br>
                        <a href='../ADMIN/component/delete/category.php?id=$id'><button class='delete-button'>Delete</button></a>
                        </div>
                  </td>";
            echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $row["category_name"] . "</td>";
            echo "<td style='width: 73%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["description"] . "</td>";
            echo "</tr>";

            $stt++;
        }

        echo "</table>";

        $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM categories"))['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);
    } else {
        echo "<script>
                alert('No results found for the given search term: $searchTerm');
                window.location.href = 'index.php?pid=1';
              </script>";
    }
    ?>
</div>