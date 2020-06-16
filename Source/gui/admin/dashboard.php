<div id="content-page">
    <div class="container">
        
        <div class="title-header">
            <span>Thống kê đơn đặt hàng theo ngày</span>
        </div>

        <div id="chart-area"  style="height: 400px;"> 
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

<script>
    var myChar = document.getElementById("myChart").getContext('2d');

    <?php 
        $ddhBUS = new DonDatHangBUS();
        $lst = $ddhBUS->Statistical();
    ?>

    var Chart = new Chart(myChar, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_keys($lst)); ?>,
            datasets: [{
                label: 'Đơn hàng',
                data: <?= json_encode(array_values($lst)); ?>,
                backgroundColor: 'grey',
                borderColor: 'teal',
                hoverBackgroundColor: 'teal'
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    barPercentage: 0.5
                }]
            }
        }
    });
</script>
