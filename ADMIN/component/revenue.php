<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

include('sql/todayMoney.php');
include('sql/amountUser.php');
include('sql/amountOrder.php');
include('sql/cancleOrder.php');
include('sql/sales.php');
include('sql/shipMethod.php');
include('sql/countryOrder.php');
include('sql/categoryOrder.php');

?>

<div class="revenue">
    <div class="revenue1">
        <div class="revenue1-child">
            <div>
                <h4>TODAY'S MONEY</h4>
                <h3><?php echo $totalAmountToday ?> $</h3>
                <h4>
                    <?php
                    if ($percentIncrease > 0) {
                        echo "<span style='color: green'>+$percentIncrease%</span>";
                    } else {
                        echo "<span style='color: red'>$percentIncrease%</span>";
                    }
                    ?>
                    since yesterday
                </h4>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <img src="../PUBLIC-PAGE/images/icon/money.svg" alt="" class="image-icon">
            </div>
        </div>
        <div class="revenue1-child">
            <div>
                <h4>NEW USER</h4>
                <h3><?php echo $totalAccout ?></h3>
                <h4>
                    <?php
                    if ($percentIncreaseAccount > 0) {
                        echo "<span style='color: green'>+$percentIncreaseAccount%</span>";
                    } else {
                        echo "<span style='color: red'>$percentIncreaseAccount%</span>";
                    }
                    ?>
                    since yesterday
                </h4>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <img src="../PUBLIC-PAGE/images/icon/user.svg" alt="" class="image-icon">
            </div>
        </div>
        <div class="revenue1-child">
            <div>
                <h4>NEW ORDER</h4>
                <h3><?php echo $totalAmountOrder ?></h3>
                <h4>
                    <?php
                    if ($percentIncreaseOrder > 0) {
                        echo "<span style='color: green'>+$percentIncreaseOrder%</span>";
                    } else {
                        echo "<span style='color: red'>$percentIncreaseOrder%</span>";
                    }
                    ?>
                    since yesterday
                </h4>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <img src="../PUBLIC-PAGE/images/icon/order.svg" alt="" class="image-icon">
            </div>
        </div>
        <div class="revenue1-child">
            <div>
                <h4>CANCLED ORDER</h4>
                <h3><?php echo $totalAmountCancle ?></h3>
                <h4>
                    <?php
                    if ($percentIncreaseCancel <= 0) {
                        echo "<span style='color: green'>$percentIncreaseCancel%</span>";
                    } else {
                        echo "<span style='color: red'>$percentIncreaseCancel%</span>";
                    }
                    ?>
                    since yesterday
                </h4>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <img src="../PUBLIC-PAGE/images/icon/today.svg" alt="" class="image-icon">
            </div>
        </div>
    </div>

    <div class="revenue2">

        <div style="width: 50%;" class="char1">
            <canvas id="revenueChart" width="400" height="400"></canvas>
            <script>
                // Dữ liệu doanh thu của 12 tháng (ví dụ)
                const monthlyRevenueData = [
                    <?php
                    for ($month = 1; $month <= 12; $month++) {
                        echo round($salesByMonth[$month], 2);
                        echo ", ";
                    }
                    ?>
                ];

                // Lấy thẻ canvas
                const ctx1 = document.getElementById('revenueChart').getContext('2d');

                // Tạo biểu đồ đường
                const revenueChart = new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [{
                            label: 'Sales overview',
                            borderColor: 'rgba(59, 93, 80, 1)',
                            backgroundColor: 'rgba(59, 93, 80, 0.2)',
                            data: monthlyRevenueData,
                            fill: true,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>

        <div style="width: 40%;" class="char2">
            <canvas id="pieChart" width="400" height="200"></canvas>

            <script>
                // Dữ liệu ví dụ cho biểu đồ tròn
                const data = {
                    labels: ['Fast', 'Standard', 'Free ship'],
                    datasets: [{
                        data: [
                            <?php
                            for ($methodId = 1; $methodId <= 3; $methodId++) {
                                echo $shippingMethodCount[$methodId];
                                echo ", ";
                            }
                            ?>
                        ],
                        backgroundColor: ['#3b5d50', '#3b5d12   ', '#3b5d65'],
                    }]
                };

                // Lấy thẻ canvas
                const ctx2 = document.getElementById('pieChart').getContext('2d');

                // Tạo biểu đồ tròn
                const pieChart = new Chart(ctx2, {
                    type: 'pie',
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            </script>
        </div>
    </div>

    <div class="revenue3">
        <div style="width: 55%; height: fit-content" class="byCountry">
            <h3>Sale by country</h3>
            <table class="tableCountry">
                <tr>
                    <td style="width: 20%;">Country name</td>
                    <td style="width: 30%;">Sales</td>
                    <td style="width: 30%;">Values</td>
                    <td style="width: 20%;">Bonces</td>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $country = $row['country'];
                    $orderCount = $row['order_count'];
                    $totalValue = $row['total_value'];

                    // Find the corresponding result from the second query
                    $totalValuePreviousYear = 0; // Default value
                    while ($row1 = $result1->fetch_assoc()) {
                        if ($row1['country'] === $country) {
                            $totalValuePreviousYear = $row1['last_total_value'];
                            break;
                        }
                    }

                    // Calculate and display the percentage increase
                    $percentIncrease = ($totalValuePreviousYear != 0) ? (($totalValue / $totalValuePreviousYear) * 100) : 0;
                    $percentIncrease = round($percentIncrease, 0);
                    echo "<tr>";
                    echo "<td style='width: 20%;'>$country</td>";
                    echo "<td style='width: 30%;'>$orderCount</td>";
                    echo "<td style='width: 30%;'>$totalValue</td>";
                    echo "<td style='width: 20%;'>$percentIncrease %</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div style="width: 35%; height: fit-content" class="byCategory">
            <h3>Sale by Category</h3>
            <table class="tableCountry">
                <tr>
                    <td style="width: 40%;">Category name</td>
                    <td style="width: 30%;">Sales</td>
                    <td style="width: 30%;">Values</td>
                </tr>
                <?php
                if ($resultCategoryOrder->num_rows > 0) {
                    // Output data of each row
                    while ($row = $resultCategoryOrder->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='width: 40%;'>". $row["category_name"] ."</td>";
                        echo "<td style='width: 30%;'>". $row["total_sold"] ."</td>";
                        echo "<td style='width: 30%;'>". $row["total_revenue"] ."</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<style>
    .tableCountry {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .tableCountry,
    .tableCountry th,
    .tableCountry td {
        border: 1px solid #ddd;
    }

    .tableCountry th,
    .tableCountry td {
        padding: 8px;
        text-align: center;
    }

    .tableCountry th {
        background-color: #f2f2f2;
    }

    /* Apply styling to alternate rows for better readability */
    .tableCountry tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .revenue1 {
        display: flex;
        justify-content: space-between;
    }

    .revenue1-child div:nth-child(1) {
        width: 90%;
        padding: 20px;
    }

    .revenue1-child div:nth-child(2) {
        width: 10%;
        padding: 20px;
    }

    .revenue1-child {
        display: flex;
        width: 20%;
        height: fit-content;
        border-radius: 18px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .revenue1-child div h4 {
        color: #67748E;
    }

    .revenue1-child div h3 {
        color: #344767;
    }

    .revenue2 {
        margin-top: 30px;
        width: 100%;
        display: flex;
        border-radius: 18px;
        justify-content: space-between;
    }

    .revenue2 div {
        border-radius: 18px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .revenue3 {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
        padding-bottom: 50px;
    }

    .revenue3 div {
        height: 200px;
        border: none;
        padding: 20px;
        border-radius: 18px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .image-icon {
        /* display: flex;
        align-items: center;
        justify-content: center; */
        /* margin: 10px; */
        width: 40px;
        /* height: 20px; */
    }
</style>