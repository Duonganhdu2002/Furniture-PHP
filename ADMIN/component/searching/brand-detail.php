<?php 
if ($result->num_rows > 0) {


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

    echo "<div class='pagination'>";

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
    echo "0 results";
}
?>