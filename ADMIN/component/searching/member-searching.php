<div>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['searchByUsernameMember'])) {
            $searchTerm = $_POST['searchByUsernameMember'];
            // SQL của bảng Information
            $sqlInformation = "SELECT username,full_name, date_of_birth, email, gender, phone_number, avatar FROM information WHERE role = 'admin' AND username LIKE '%$searchTerm%'";
            $resultInformation = $conn->query($sqlInformation);
            // SQL của bảng Users
            $sqlUser = "SELECT id, username, password, image FROM users WHERE role = 'admin' AND username LIKE '%$searchTerm%'";
            $resultUser = $conn->query($sqlUser);
            // SQL của bảng Address (địa chỉ)
            $sqlAddress = "SELECT username, province, district, commune, street, number FROM addresses WHERE role = 'admin' AND username LIKE '%$searchTerm%'";
            $resultAddress = $conn->query($sqlAddress);
        } elseif (isset($_POST['searchByEmailMember'])) {
            $searchTerm = $_POST['searchByEmailMember'];
            // SQL của bảng Information
            $sqlInformation = "SELECT username,full_name, date_of_birth, email, gender, phone_number, avatar FROM information WHERE role = 'admin' AND email LIKE '%$searchTerm%'";
            $resultInformation = $conn->query($sqlInformation);
            // SQL của bảng Users
            $sqlUser = "SELECT id, username, password, image FROM users WHERE role = 'admin'";
            $resultUser = $conn->query($sqlUser);
            // SQL của bảng Address (địa chỉ)
            $sqlAddress = "SELECT username, province, district, commune, street, number FROM addresses WHERE role = 'admin'";
            $resultAddress = $conn->query($sqlAddress);
        }
    }

    if (($resultInformation && $resultInformation -> num_rows > 0) && ($resultUser && $resultUser -> num_rows > 0) && ($resultAddress && $resultInformation -> num_rows > 0)) {
        $stt = $offset + 1;

        while (($rowUser = $resultUser->fetch_assoc()) && ($rowInformation = $resultInformation->fetch_assoc()) && ($rowAddress = $resultAddress->fetch_assoc())) {
            echo "<tr>";
            echo "<td style='width:4%; text-align: center;'>" . $stt . "</td>";
            echo "<td style='width:4%; text-align: center;'>" . $rowUser["id"] . "</td>";
            echo "<td style='width: 8%; padding: 10px 20px 10px 20px'>" . $rowUser["username"] . "</td>";
            echo "<td style='width: 14%; padding: 10px 20px 10px 20px'>" . $rowInformation["full_name"] . "</td>";
            echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>" . $rowInformation["phone_number"] . "</td>";
            echo "<td style='width: 15%; padding: 10px 20px 10px 20px'>" . $rowInformation["email"] . "</td>";
            echo "<td style='width: 10%; padding: 10px 20px 10px 20px'>" . $rowInformation["date_of_birth"] . "</td>";
            if ($rowInformation["gender"] === '1') {
                echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>Nam</td>";
            } else {
                echo "<td style='width: 5%; padding: 10px 20px 10px 20px'>Nữ</td>";
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
            echo "<td style='width: 30%; padding: 10px 20px 10px 20px'>" . $rowAddress["address"] . "</td>";
            echo "</tr>";
            $stt++;
        }
        echo "</table>";
        echo "</div>";
        
    } else {
        echo "<script>
                alert('No results found for the given search term: $searchTerm');
                window.location.href = 'index.php?pid=4';
              </script>";
    }
    ?>
</div>