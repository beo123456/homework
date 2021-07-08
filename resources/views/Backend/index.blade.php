@extends('Backend.master.master')
@section('title','Trang Quản Trị')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="../admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Tổng quan</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tổng quan</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-9">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-4 widget-left">
							<span class="glyphicon glyphicon-signal icon-50" aria-hidden="true"></span>
						</div>
						<div class="col-sm-9 col-lg-8 widget-right">
							<div class="large">{{ number_format($dl['Tháng '.count($dl)],0,'','.') }} đ</div> <?php  ////$dl['Tháng '.$i] = $dl['Tháng '.count('$dl')] == sum('total') ?>
							<div class="text-muted">Doanh thu tháng {{ count($dl) }}</div> <?php///// đếm số bản ghi foreach, ra tháng htai ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{ $so_dh }}</div> <?php ///số đơn hàng ?>
							<div class="text-muted">Số đơn hàng</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Biểu đồ doanh thu</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->

	</div>
	<!--end main-->

@endsection
@section('script')
@parent
<script>
	
	
	var lineChartData = {
		labels : [@foreach($dl as $key => $value) //// $key = ['Tháng'.$i]
			"{{ $key }}",
			@endforeach],
		datasets : [
		
			{
				label: "My Second dataset",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
				data : [@foreach($dl as $value)   //// $value = sum('total')
					{{ $value }},
					@endforeach]
			}
		]

	}
	


		


window.onload = function(){
var chart1 = document.getElementById("line-chart").getContext("2d");
window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true
});
var chart2 = document.getElementById("bar-chart").getContext("2d");
window.myBar = new Chart(chart2).Bar(barChartData, {
	responsive : true
});
var chart3 = document.getElementById("doughnut-chart").getContext("2d");
window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true
});
var chart4 = document.getElementById("pie-chart").getContext("2d");
window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
});

};
</script>
@endsection