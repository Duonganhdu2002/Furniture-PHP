<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="revenue">
    <div class="revenue1">
        <div class="revenue1-child">
            <div>Today money</div>
            <div>Icon here</div>
        </div>
        <div class="revenue1-child">
            <div>New user</div> 
            <div>Icon here</div>
        </div>
        <div class="revenue1-child">
            <div>New order</div>
            <div>Icon here</div>
        </div>
        <div class="revenue1-child">
            <div>Today</div>
            <div>Icon here</div>
        </div>
    </div>

    <div class="revenue2">

        <div style="width: 50%;" class="char1">
            <canvas id="revenueChart" width="400" height="400"></canvas>
            <script>
                // Dữ liệu doanh thu của 12 tháng (ví dụ)
                const monthlyRevenueData = [1000, 1200, 800, 1500, 2000, 1800, 1600, 1700, 1400, 1200, 1100, 1300];

                // Lấy thẻ canvas
                const ctx1 = document.getElementById('revenueChart').getContext('2d');

                // Tạo biểu đồ đường
                const revenueChart = new Chart(ctx1, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        datasets: [{
                            label: 'Revenue',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
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

        <div style="width: 50%;" class="char2">
            <canvas id="pieChart" width="400" height="200"></canvas>

            <script>
                // Dữ liệu ví dụ cho biểu đồ tròn
                const data = {
                    labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4'],
                    datasets: [{
                        data: [30, 20, 25, 25],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'],
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
        <div style="width: 50%" class="byCountry">
            byCountry
        </div>
        <div style="width: 40%;" class="byCategory">
            byCategory
        </div>
    </div>
</div>
<style>
    .revenue1 {
        display: flex;
        justify-content: space-between;
    }

    .revenue1-child div:nth-child(1) {
        width: 70%;
        padding: 20px;
    }

    .revenue1-child div:nth-child(2) {
        width: 30%;
        padding: 20px;
    }

    .revenue1-child {
        display: flex;
        width: 20%;
        height: 120px;
        background-color: lightblue;
        border: none;
        border-radius: 18px;
    }

    .revenue2 {
        margin-top: 100px;
        width: 100%;
        display: flex;
        border-radius: 18px;
    }

    .revenue3 {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
        padding-bottom: 50px;
    }

    .revenue3 div {
        height: 200px;
        background-color: lightblue;
        border: none;
        border-radius: 20px;
        padding: 20px;
    }
</style>