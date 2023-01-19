<?php
session_start();
include_once('../config/function.php');
$conDB = new Db_con();
if ($_SESSION['usereq'] == "") {
	header("location:signin");
} else {
?>
	<!DOCTYPE html>
	<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
	<!--[if !IE]><!-->
	<html lang="en">
	<!--<![endif]-->

	<head>
		<meta charset="utf-8" />
		<title>Dashboard</title>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />

		<!-- ================== BEGIN BASE CSS STYLE ================== -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
		<link href="../assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
		<link href="../assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
		<link href="../assets/plugins/animate/animate.min.css" rel="stylesheet" />
		<link href="../assets/css/default/style.css" rel="stylesheet" />
		<link href="../assets/css/default/style-responsive.min.css" rel="stylesheet" />
		<link href="../assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
		<!-- ================== END BASE CSS STYLE ================== -->

		<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
		<link href="../assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
		<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
		<!-- ================== END PAGE LEVEL STYLE ================== -->

		<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
		<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
		<!-- ================== END PAGE LEVEL STYLE ================== -->

		<!-- ================== BEGIN BASE JS ================== -->
		<script src="../assets/plugins/pace/pace.min.js"></script>
		<!-- ================== END BASE JS ================== -->
	</head>

	<body>
		<!-- begin #page-loader -->
		<div id="page-loader" class="fade show"><span class="spinner"></span></div>
		<!-- end #page-loader -->

		<!-- begin #page-container -->
		<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
			<!-- begin #header -->
			<div id="header" class="header navbar-default">
				<!-- begin navbar-header -->
				<div class="navbar-header">
					<a href="#" class="navbar-brand"> <img src="../assets/brand/heart01.svg" alt="" width="30" height="24" class="d-inline-block align-text-top"> <b>Heart</b>pmk</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end navbar-header -->

				<!-- begin header-nav -->
				<ul class="navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user-circle text-theme-black m-l-5"></i>&nbsp
							<span class="d-none d-md-inline"><?php echo $_SESSION['reqname']; ?></span> <b class="caret"></b>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="logout" class="dropdown-item">Log Out</a>
						</div>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end #header -->

			<!-- begin #sidebar -->
			<?php require('../sidebar/sidebar.php')?>
			<div class="sidebar-bg"></div>
			<!-- end #sidebar -->

			<!-- begin #content -->
			<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb pull-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">ยินดีต้อนรับ <small><?php echo $_SESSION['reqname']; ?></small></h1>
				<!-- end page-header -->

				<!-- begin row -->
				<div class="row">
					<?php
					$sql = $conDB->countmembers();
					$numrows = $sql->num_rows;
					?>
						<!-- begin col-3 -->
						<div class="col-lg-3 col-md-6">
							<div class="widget widget-stats bg-green">
								<div class="stats-icon"><i class="fa fa-users"></i></div>
								<div class="stats-info">
									<h4>จำนวนสมาชิกทั้งหมด</h4>
									<p><?php echo $numrows; ?></p>
								</div>
								<div class="stats-link">
									<a href="javascript:;"><i class="fas fa-align-justify"></i></a>
								</div>
							</div>
						</div>
					<!-- end col-3 -->
					<?php
					$sql = $conDB->countpatientrequest();
					$numrows = $sql->num_rows;
					?>
						<!-- begin col-3 -->
						<div class="col-lg-3 col-md-6">
							<div class="widget widget-stats bg-warning">
								<div class="stats-icon"><i class="fas fa-sticky-note"></i></div>
								<div class="stats-info">
									<h4></h4>จำนวนRequestทั้งหมด</h3>
									<p><?php echo $numrows; ?></p>
								</div>
								<div class="stats-link">
									<a href="javascript:;"><i class="fas fa-align-justify"></i></a>
								</div>
							</div>
						</div>
						<!-- end col-3 -->

					<?php
					$sql = $conDB->countReqToday();
					$numrows = $sql->num_rows;
					?>
						<!-- begin col-3 -->
						<div class="col-lg-3 col-md-6">
							<div class="widget widget-stats bg-primary">
								<div class="stats-icon"><i class="fas fa-star"></i></div>
								<div class="stats-info">
									<h4>จำนวนRequestวันนี้</h4>
									<p><?php echo $numrows; ?></p>
								</div>
								<div class="stats-link">
									<a href="#modal-alert" data-toggle="modal">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
								</div>
							</div>
						</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
				<!-- #modal-dialog -->

				<div class="modal fade" id="modal-alert">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">ผู้ป่วยที่ทำรายการวันนี้</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
									<?php
									$sql = $conDB->Reqtoday();
									if($sql->num_rows >0){
									while ($data =$sql->fetch_assoc()) {
										?>
								<table class="table">
									<thead>
										<tr>
											<th class="text-nowrap">วัน-เวลาที่ทำรายการ</th>
											<th class="text-nowrap">ชื่อ-สกุล</th>
											<th class="text-nowrap">เบอร์ติดต่อ</th>
											<th class="text-nowrap">หมายเหตุ</th>
										</tr>
									</thead>
										<?php
										$weightmember = $data['weight'];
										$swellmember = $data['swellid'];
										$tiredmember = $data['tiredid'];
										$weightreq = $data['weightreq'];
										$swellreq = $data['swellidreq'];
										$tiredreq = $data['tiredidreq'];
										$weightresult = number_format($weightreq - $weightmember, 1);
										$date = $data['reqdate'];
										$date1 = substr($date, 0, 10);
										list($y, $m, $d) = explode('-', $date1);
										$time = $data['reqdatetime'];
										$time1 = substr($time, 11, 8);
										?>
										<?php 
											require('../tablebody/tableviewindex.php');
										?>
								</table>
										<?php
											}
										?>
										<?php 	
										}else{
										?>
										<p class="text-center">ไม่พบข้อมูลในวันนี้</p>
										<?php
										}
										?>	
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- begin scroll to top btn -->
				<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
				<!-- end scroll to top btn -->
			</div>
			<!-- end page container -->

			<!-- ================== BEGIN BASE JS ================== -->
			<script src="../assets/plugins/jquery/jquery-3.2.1.min.js"></script>
			<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
			<script src="../assets/plugins/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
			<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
			<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
			<script src="../assets/plugins/js-cookie/js.cookie.js"></script>
			<script src="../assets/js/theme/transparent.min.js"></script>
			<script src="../assets/js/apps.min.js"></script>
			<!-- ================== END BASE JS ================== -->

			<!-- ================== BEGIN PAGE LEVEL JS ================== -->
			<script src="../assets/plugins/flot/jquery.flot.min.js"></script>
			<script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
			<script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
			<script src="../assets/plugins/flot/jquery.flot.pie.min.js"></script>
			<script src="../assets/plugins/sparkline/jquery.sparkline.js"></script>
			<script src="../assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
			<script src="../assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
			<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script src="../assets/js/demo/dashboard.min.js"></script>
			<!-- ================== END PAGE LEVEL JS ================== -->

			<!-- ================== BEGIN DATA TABLES LEVEL JS ================== -->
			<script src="../assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
			<script src="../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
			<script src="../assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
			<script src="../assets/js/demo/table-manage-default.demo.min.js"></script>
			<script src="../assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
			<!-- ================== END DATA TABLES LEVEL JS ================== -->

			<script>
				$(document).ready(function() {
					App.init();
					Dashboard.init();
				});
			</script>
	</body>

	</html>
<?php

} ?>