<div class="category">
    <table class="category-data-table">
        <tr>
            <th style="text-align: center;">STT</th>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">
                <img style="width: 25px" src="../PUBLIC-PAGE/images/settingtr.svg">
            </th>
            <th style="text-align: center">Category Name</th>
            <th style="text-align: center">Description</th>
        </tr>

        <form id="myForm" action="#" method="post">
            <tr>
                <td style="text-align: center">
                    <img type="image" style="width: 25px" src="../PUBLIC-PAGE/images/filter.svg">
                </td>
                <td style="text-align: center" colspan="2">
                    <input name="searchByIdCategory" id="searchByIdCategory">
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

        $itemsPerPage = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $itemsPerPage;

        $sql = "SELECT id, parent_category_id, category_name, description FROM categories LIMIT $offset, $itemsPerPage";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $stt = $offset + 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
                echo "<td style='width:4%; text-align: center;'>" . $row["id"] . "</td>";
                echo "<td class='hover-cell'; style='width:4%; cursor: pointer; text-align: center;' onmouseover='showButtons(this)' onmouseout='hideButtons(this)'> 
                        <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                        <div class='action-buttons'>
                            <button onclick='updateModal()' class='edit-button'>Update</button>
                            <br>
                            <button onclick='deteleCategory()' class='delete-button'>Delete</button>
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

            echo "<div class='pagination'>";

            // Always show "Previous" button
            echo "<a href='index.php?pid=1&page=" . max(1, $page - 1) . "'>Previous</a> ";

            // Determine the first and last two pages to display
            $startPage = max(1, $page - 2);
            $endPage = min($totalPages, $page + 2);

            // Show the page numbers
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo "<a href='index.php?pid=1&page=$i'";
                if ($i == $page) {
                    echo " class='current'";
                }
                echo ">$i</a> ";
            }

            // Always show "Next" button
            echo "<a href='index.php?pid=1&page=" . min($totalPages, $page + 1) . "'>Next</a>";

            echo "</div>";
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </table>
</div>

<?php
include "modal-update/catgory.php";
?>

<script>
    function showButtons(element) {
        var actionButtons = element.querySelector('.action-buttons');
        if (actionButtons) {
            actionButtons.style.display = 'block';
        }
    }
    function hideButtons(element) {
        var actionButtons = element.querySelector('.action-buttons');
        if (actionButtons) {
            actionButtons.style.display = 'none';
        }
    }
</script>
<style>
    .action-buttons {
        z-index: 1.0;
        position: absolute;
        display: flex;
        flex-direction: column;
        margin-left: 30px;
        margin-top: 0px;
        display: none;
    }

    .edit-button {
        border-radius: 10px 10px 0 0;
        border-bottom: 1px solid white;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .edit-button:hover {
        opacity: 0.7;
    }

    .delete-button {
        border-radius: 0 0 10px 10px;
        border: none;
        width: 100%;
    }

    .delete-button:hover {
        opacity: 0.7;
    }

    .action-buttons button {
        padding: 10px 28px 10px 28px;
        background-color: #3b5d50;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

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