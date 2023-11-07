<div class="title-section">
    <?php
    $nameCategory = '';
    if (isset($_GET['pid'])) {
        $id = $_GET['pid'];
        switch ($id) {
            case '1':
                $nameCategory = 'Category';
                break;
            case '2':
                $nameCategory = 'Product';
                break;
            case '3':
                $nameCategory = 'Brand';
                break;
            case '4':
                $nameCategory = 'Member';
                break;
            case '5':
                $nameCategory = 'Customer';
                break;
            case '6':
                $nameCategory = 'Order';
                break;
            case '7':
                $nameCategory = 'Statistics';
                break;
            case '8':
                $nameCategory = 'Personal information';
                break;
            default:
                $nameCategory = 'Nova';
                break;
        }
    }
    echo $nameCategory;
    ?>
    <?php
    if (isset($_GET['pid']) && in_array($_GET['pid'], [1, 2, 3, 4])) {
        include "component/add-new.php";
    } else if (isset($_GET["pid"]) && in_array($_GET["pid"], [6])) {
        include "component/filter-order.php";
    }
    ?>
</div>

<style>
    .title-section {
        height: 6vh;
        font-size: 18px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-left: 20px;
        color: #3b5d50;
        box-shadow: 5px 0 10px rgba(0, 0, 0, 0.2);
        flex: 1;
    }

    .title-section .button-add {
        background-color: #3b5d50;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        margin-right: 20px;
        cursor: pointer;
    }
</style>