<div>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['searchByIdproduct'])) {
            $searchTerm = $_POST['searchByIdproduct'];
            $sql = "SELECT p.id, p.category_id, p.product_name, b.brand_name, p.description, p.image, p.price, p.stock_quantity, ctg.category_name FROM products p 
            INNER JOIN brands b ON p.brand_id = b.id
            INNER JOIN categories ctg ON p.category_id = ctg.id WHERE p.id LIKE '%$searchTerm%'";
            $result = $conn->query($sql);
        } else if (isset($_POST['searchByNameproduct'])) {
            $searchTerm = $_POST['searchByNameproduct'];
            $sql = "SELECT p.id, p.category_id, p.product_name, b.brand_name, p.description, p.image, p.price, p.stock_quantity, ctg.category_name FROM products p 
            INNER JOIN brands b ON p.brand_id = b.id
            INNER JOIN categories ctg ON p.category_id = ctg.id WHERE p.product_name LIKE '%$searchTerm%'";
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
                        <a href='../ADMIN/index.php?pid=2&update&id=$id'><button class='edit-button'>Update</button></a>
                        <br>
                        <a href='../ADMIN/component/delete/product.php?id=$id'><button class='delete-button'>Delete</button></a>
                        </div>
                </td>";
            echo "<td style='width: 20%; padding: 10px 20px 10px 20px'>" . $row["product_name"] . "</td>";
            echo "<td style='width: 40%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["description"] . "</td>";
            echo "<td style='width: 6%;height:15%; text-align: center;'><img style='width: 65px; height: 92px;' src='../PUBLIC-PAGE/images/chairs/" . $row["image"] . "' style='width: 100px; height: auto;'></td>";

            echo "<td style='width: 10%; padding: 10px 20px 10px 20px; line-height: 1.5; text-align: center;'>" . $row["price"] . "</td>";
            echo "<td style='width: 5%; padding: 10px 20px 10px 20px; line-height: 1.5; text-align: center;'>" . $row["stock_quantity"] . "</td>";
            echo "<td style='width: 10%; padding: 10px 20px 10px 20px; line-height: 1.5; text-align: center;'>" . $row["category_name"] . "</td>";
            echo "<td style='width: 10%; padding: 10px 20px 10px 20px; line-height: 1.5; text-align: center;'>" . $row["brand_name"] . "</td>";
            echo "</tr>";

            $stt++;
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "<script>
                alert('No results found for the given search term: $searchTerm');
                window.location.href = 'index.php?pid=2';
              </script>";
    }
    ?>
</div>
