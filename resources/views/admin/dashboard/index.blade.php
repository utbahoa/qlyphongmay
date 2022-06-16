@extends('admin.home')
@section('page_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-0 text-gray-800">Chào mừng bạn đến trang quản trị</h1>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <div id="columnchart_material" style="width: 1000px; height: 500px; margin-bottom: 30px;"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Phòng', 'Số lượng'],
            <?php echo $chartData; ?>
        ]);

        var options = {
            title: 'THỐNG KÊ SỐ LƯỢNG ĐĂNG KÝ CỦA MỖI PHÒNG',
            legend:{
                textStyle:{
                    fontSize: 16,
                    fontName: "Roboto"
                }
            },
            titleTextStyle: {
                    color: "#000",
                    fontName: "Roboto",
                    fontSize: 16,
                    bold: true,
                    italic: false,
            },
            hAxis: {
                title: 'Phòng',
                titleTextStyle: {
                    color: "#000",
                    fontName: "Roboto",
                    fontSize: 14,
                    bold: true,
                    italic: false
                }
            },
            vAxis: {
                title: 'SỐ LƯỢNG',
                titleTextStyle: {
                    color: "#000",
                    fontName: "Roboto",
                    fontSize: 14,
                    bold: true,
                    italic: false
                }
            },
           
         
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
@endsection