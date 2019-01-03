<?=$this->load->view('dashboard/header')?>
<?=$this->load->view('dashboard/sidebar-left')?>

<script src="=<?= base_url('tugumuda/plugins/amcharts/amcharts.js')?>"></script>
<script src="=<?= base_url('tugumuda/plugins/amcharts/serial.js')?>"></script>
<script src="=<?= base_url('tugumuda/plugins/amcharts/themes/light.js')?>"></script>
<script src="=<?= base_url('tugumuda/plugins/amcharts/plugins/export/export.js')?>"></script>
<link rel="stylesheet" href="=<?= base_url('tugumuda/plugins/amcharts/plugins/export/export.css') ?>" type="text/css" media="all" />
<script>
$(document).ready(function(){
	var chart = AmCharts.makeChart("chartdiv", {
		"theme": "light",
		"type": "serial",
		"startDuration": 2,
		"dataProvider": [{
			"country": "USA",
			"visits": 4025,
			"color": "#FF0F00"
		}, {
			"country": "China",
			"visits": 1882,
			"color": "#FF6600"
		}, {
			"country": "Japan",
			"visits": 1809,
			"color": "#FF9E01"
		}, {
			"country": "Germany",
			"visits": 1322,
			"color": "#FCD202"
		}, {
			"country": "UK",
			"visits": 1122,
			"color": "#F8FF01"
		}, {
			"country": "France",
			"visits": 1114,
			"color": "#B0DE09"
		}, {
			"country": "India",
			"visits": 984,
			"color": "#04D215"
		}, {
			"country": "Spain",
			"visits": 711,
			"color": "#0D8ECF"
		}, {
			"country": "Netherlands",
			"visits": 665,
			"color": "#0D52D1"
		}, {
			"country": "Russia",
			"visits": 580,
			"color": "#2A0CD0"
		}, {
			"country": "South Korea",
			"visits": 443,
			"color": "#8A0CCF"
		}, {
			"country": "Canada",
			"visits": 441,
			"color": "#CD0D74"
		}, {
			"country": "Brazil",
			"visits": 395,
			"color": "#754DEB"
		}, {
			"country": "Italy",
			"visits": 386,
			"color": "#DDDDDD"
		}, {
			"country": "Australia",
			"visits": 384,
			"color": "#999999"
		}, {
			"country": "Taiwan",
			"visits": 338,
			"color": "#333333"
		}, {
			"country": "Poland",
			"visits": 328,
			"color": "#000000"
		}],
		"valueAxes": [{
			"position": "left",
			"title": "Visitors"
		}],
		"graphs": [{
			"balloonText": "[[category]]: <b>[[value]]</b>",
			"fillColorsField": "color",
			"fillAlphas": 1,
			"lineAlpha": 0.1,
			"type": "column",
			"valueField": "visits"
		}],
		"depth3D": 20,
		"angle": 30,
		"chartCursor": {
			"categoryBalloonEnabled": false,
			"cursorAlpha": 0,
			"zoomable": false
		},
		"categoryField": "country",
		"categoryAxis": {
			"gridPosition": "start",
			"labelRotation": 90
		},
		"export": {
			"enabled": true
		 }

	});

});

</script>
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id='utama'>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->


      <div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
			  <div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-tachometer"></i></span>

				<div class="info-box-content">
				  <span class="info-box-text">CPU Traffic</span>
				  <span class="info-box-number">90<small>%</small></span>
				</div>
				<!-- /.info-box-content -->
			  </div>
			  <!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
			  <div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

				<div class="info-box-content">
				  <span class="info-box-text">Likes</span>
				  <span class="info-box-number">41,410</span>
				</div>
				<!-- /.info-box-content -->
			  </div>
			  <!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-3 col-sm-6 col-xs-12">
			  <div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>

				<div class="info-box-content">
				  <span class="info-box-text">Sales</span>
				  <span class="info-box-number">760</span>
				</div>
				<!-- /.info-box-content -->
			  </div>
			  <!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
			  <div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

				<div class="info-box-content">
				  <span class="info-box-text">New Members</span>
				  <span class="info-box-number">2,000</span>
				</div>
				<!-- /.info-box-content -->
			  </div>
			  <!-- /.info-box -->
			</div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tugumuda Framework 3 (Laravel 5.1)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                Main Content Here
                <?php

                ?>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->

          </div>
		  <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Contoh Grafik Tahun {!!date('Y')!!}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div id="chartdiv"></div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?=$this->load->view('dashboard/footer')?>
