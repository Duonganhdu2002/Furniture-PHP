<?php 
if ($resultUser->num_rows > 0 && $resultInformation->num_rows > 0 && $resultAddress->num_rows > 0) {
    $stt = $offset + 1;

    while (($rowUser = $resultUser->fetch_assoc()) && ($rowInformation = $resultInformation->fetch_assoc()) && ($rowAddress = $resultAddress->fetch_assoc())) {
        $id = $rowUser["id"];
        echo "<tr>";
        echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
        echo "<td style='width:4%; text-align: center;'>" . $rowUser["id"] . "</td>";
        echo "<td class='hover-cell'; style='width:4%; cursor: pointer; text-align: center;' onmouseover='showButtons(this)' onmouseout='hideButtons(this)'> 
                <img style='width: 25px' src='../PUBLIC-PAGE/images/settingth.svg'>
                <div class='action-buttons'>
                        <a href='../ADMIN/index.php?pid=5&update&id=$id'><button class='edit-button'>Update</button></a>
                        <br>
                        <a href='../ADMIN/component/delete/customer.php?id=$id'><button class='delete-button'>Delete</button></a>
                    </div>
              </td>";
        echo "<td style='width: 8%; padding: 10px 20px 10px 20px'>" . $rowUser["username"] . "</td>";
        echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>" . $rowInformation["full_name"] . "</td>";
        echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $rowInformation["email"] . "</td>";
        echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>" . $rowInformation["phone_number"] . "</td>";
        echo "<td style='width: 10%; padding: 10px 20px 10px 20px'>" . $rowUser["password"] . "</td>";
        echo "<td style='width: 10%; padding: 10px 20px 10px 20px'>" . $rowInformation["date_of_birth"] . "</td>";
        if ($rowInformation["gender"] === '1') {
            echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>Nam</td>";
        } else if ($rowInformation["gender"] === '2') {
            echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>Nữ</td>";
        } else {
            echo "<td style='width: 5%; padding: 10px 20px 10px 20px'></td>";
        }
        echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>
            <img style='width: 40px' src='../PUBLIC-PAGE/images/" . $rowInformation["avatar"] . "'>
        </td>";
        $province = $rowAddress["province"];
        $district = $rowAddress["district"];
        $commune = $rowAddress["commune"];
        $street = $rowAddress["street"];
        $number = $rowAddress["number"];
        $address = "$number, $street, $commune, $district, $province";
        $rowAddress["address"] = $address;
        echo "<td style='width: 25%; padding: 10px 20px 10px 20px'>" . $rowAddress["address"] . "</td>";
        echo "</tr>";
        $stt++;
    }
    echo "</table>";



$totalItems = mysqli_fetch_assoc($conn->query("SELECT COUNT(*) as total FROM categories"))['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

echo "<div class='pagination'>";

// Always show "Previous" button
echo "<a href='index.php?pid=5&page=" . max(1, $page - 1) . "'>First</a> ";

// Determine the first and last two pages to display
$startPage = max(1, $page - 2);
$endPage = min($totalPages, $page + 2);

// Show the page numbers
for ($i = $startPage; $i <= $endPage; $i++) {
    echo "<a href='index.php?pid=5&page=$i'";
    if ($i == $page) {
        echo " class='current'";
    }
    echo ">$i</a> ";
}

// Always show "Next" button
echo "<a href='index.php?pid=5&page=" . min($totalPages, $page + 1) . "'>Next</a>";

echo "</div>";
} else {
    echo "0 results";
}
?>