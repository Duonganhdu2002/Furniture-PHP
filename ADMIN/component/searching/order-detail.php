<?php

if ($result->num_rows > 0) {
    $stt = $offset + 1;

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        // echo "<form action='' method='post'>";
        echo "<input type='hidden' name='cartID' value='" . $row["id"] . "'>";
        echo "<tr>";
        echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
        echo "<td style='width:6%; text-align: center;'>" . $row["id"] . "</td>";
        echo "<td style='width:6%; text-align: center;'>" . $row["username"] . "</td>";
        echo "<td class='hover-cell' style='width:4%; cursor: pointer; text-align: center;' onmouseover='showButtons(this)' onmouseout='hideButtons(this)'> 
                <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                <div class='action-buttons'>
                    <a href='index.php?pid=6&detail&id=$id'><button class='edit-button'>Detail</button></a>
                    <br>
                    <a href='../ADMIN/component/delete/order.php?id=$id'><button class='delete-button'>Delete</button></a>
                </div>
            </td>";
        echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $row["name_status"] . "</td>";
        echo "<td style='width: 18%; padding: 10px 20px 10px 20px'>" . $row["created_at"] . "</td>";
        echo "<td style='width: 10%; padding: 10px 20px 10px 20px'>" . $row["method_name"] . "</td>";
        echo "<td style='width: 23%; padding: 10px 20px 10px 20px; line-height: 1.5;'>" . $row["note"] . "</td>";
        echo "<td style='width: 10%; padding: 10px 20px 10px 20px; line-height: 1.5;'><button type='submit'>Confirm</button></td>";
        echo "</tr>";
        // echo "</form>";

        $stt++;
    }

    echo "</table>";

    $totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM shopping_carts"))['total'];
    $totalPages = ceil($totalItems / $itemsPerPage);

    echo "<div class='pagination'>";

    // Always show "First" button
    echo "<a href='index.php?pid=6&page=1'>First</a> ";

    // Determine the first and last two pages to display
    $startPage = max(1, $page - 1);
    $endPage = min($totalPages, $page + 1);

    // Show the page numbers
    for ($i = $startPage; $i <= $endPage; $i++) {
        echo "<a href='index.php?pid=6&page=$i'";
        if ($i == $page) {
            echo " class='current'";
        }
        echo ">$i</a> ";
    }

    // Always show "End" button
    echo "<a href='index.php?pid=6&page=$totalPages'>End</a>";

    echo "</div>";
} else {
    echo "0 results";
}
