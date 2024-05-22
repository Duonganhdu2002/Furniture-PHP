<div class="brand">
    <table class='brand-data-table'>
        <tr>
            <th style='text-align: center;'>STT</th>
            <th style='text-align: center'>ID</th>
            <th style='text-align: center'>
                <img style='width: 25px' src='../PUBLIC-PAGE/images/settingtr.svg'>
            </th>
            <th style='text-align: center'>Brand Name</th>
            <th style='text-align: center'>Description</th>
        </tr>
        <tr>
            <td style='text-align: center'>
                <img style='width: 25px' src='../PUBLIC-PAGE/images/filter.svg'>
            </td>
            <td style='text-align: center' colspan='2'>
                <form action="index.php?pid=3&brandId=0" method="post" id="myForm">
                    <input name="searchByIdBrand" id='searchByIdBrand' type="text">
                </form>
            </td>
            <td style='text-align: center'>
                <form action="index.php?pid=3&brandId=0" method="post" id="myForm">
                    <input name="searchByNameBrand" id='searchByNameBrand' type="text">
                </form>
            </td>
        </tr>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'shopping_online');

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Set the number of items per page
        $itemsPerPage = 8;

        // Get the current page from the URL parameter or default to page 1
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Calculate the offset for the SQL query
        $offset = ($page - 1) * $itemsPerPage;

        // SQL query to retrieve brand data with pagination
        $sql = "SELECT id, brand_name, description, logo FROM brands LIMIT $offset, $itemsPerPage";
        $result = $conn->query($sql);

        // Include appropriate file based on 'brandId' parameter
        if (isset($_GET['brandId'])) {
            $brandId = $_GET['brandId'];
            if ($brandId == '0') {
                include "searching/brand-searching.php";
            } else {
                include "searching/brand-detail.php";
            }
        } else {
            include "searching/brand-detail.php";
        }
        ?>
    </table>
</div>

<script>
// JavaScript functions to show and hide action buttons on hover
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
    padding: 10px 28px;
    background-color: #3b5d50;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
}

.brand {
    width: 100%;
    margin-top: 20px;
}

.brand-data-table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ddd;
}

.brand-data-table th,
.brand-data-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.brand-data-table td {
    height: 50px;
}

.brand-data-table tr td input {
    width: 80%;
    height: 60%;
    padding: 3px 8px;
    border: #3b5d50 1px solid;
    border-radius: 6px;
}

.brand-data-table th {
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
