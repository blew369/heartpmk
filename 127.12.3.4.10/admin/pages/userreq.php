<?php
session_start();
include_once('../config/function.php');
$conDB = new Db_con();
if ($_SESSION['usereq'] == "") {
	header("location: signin");
} else {

?>
	<!DOCTYPE html>
	<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
	<!--[if !IE]><!-->
	<html lang="en">
	<!--<![endif]-->

	<head>
		<meta charset="utf-8" />
		<title>Admin-Manage</title>
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
		<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
		<!-- ================== END PAGE LEVEL STYLE ================== -->

		<!-- ================== BEGIN BASE JS ================== -->
		<script src="../assets/plugins/pace/pace.min.js"></script>
		<!-- ================== END BASE JS ================== -->
	</head>

	<body>
		<!-- begin page-mountain -->
		<div class="page-mountain"></div>
		<!-- end page-mountain -->

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
					<li class="breadcrumb-item"><a href="manage.php">Tables</a></li>
					<li class="breadcrumb-item active">Admin Managed Tables</li>
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">ตางรางจัดผู้ดูแลระบบ</h1>
				<!-- end page-header -->

				<!-- begin panel -->
				<div class="panel panel-inverse">
					<!-- begin panel-heading -->
					<div class="panel-heading bg-inverse">
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-dark" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-dark" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title">ข้อมูลผู้ดูแลระบบ</h4>
					</div>
					<!-- end panel-heading -->
					<!-- begin panel-body -->
					<div class="panel-body" id="patient">
						<div class="mb-3" align="left">
							<button onclick="document.getElementById('adid').value = ''" type="button" name="add" id="add" data-toggle="modal" class="btn btn-green" data-target="#addModal"><i class="fas fa-plus-circle"></i> เพิ่มผู้ดูแล</button>
						</div>
						<table id="data-table-default" class="table table-striped table-bordered mt-5">
							<thead>
								<tr>
									<th width="10%" class="text-nowrap">ชื่อ-สกุล</th>
									<th width="1%" class="text-nowrap">รายละเอียด</th>
									<th width="1%" class="text-nowrap">แก้ไข</th>
									<th width="1%" class="text-nowrap">ลบ</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$result = $conDB->FetchallAdmin();
								while ($row = $result->fetch_assoc()) {
								?>
									<tr class="odd gradeX">
										<td width="10%"><?php echo $row['fullname']; ?></td>
										<td width="1%"><button type="button" name="view" value="view" class="btn btn-info btn-sm view_data" id="<?php echo $row['adid']; ?>"><i class="fas fa-eye"></i> view</button></td>
										<td width="1%"><button type="button" name="edit" value="edit" class="btn btn-warning btn-sm edit_data" id="<?php echo $row['adid']; ?>"><i class="fas fa-edit"></i> แก้ไข</button></td>
										<td width="1%"><button type="button" name="delete" value="delete" class="btn btn-danger btn-sm delete_data" id="<?php echo $row['adid']; ?>"><i class="fas fa-window-close"></i> ลบ</button></td>
									</tr>
								<?php

								}
								?>
							</tbody>

						</table>
					</div>

					<!-- end panel-body -->
					<!-- view -->
					<div id="dataModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">รายละเอียด</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body" id="detail">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- add -->
					<div id="addModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header ">
									<h4 class="modal-title">ข้อมูลผู้ป่วย</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>

								</div>
								<div class="modal-body">
									<form method="post" id="insert_form">
										<div class="form-group col-mb-3">
                                            <input type="hidden" name="adid" id="adid">
											<label for="username" class="form-label">Username</label>
											<input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)" required>
											<span id="usernameavailable"></span>
										</div>
										<div class="form-group col-mb-3">
											<label for="password" class="form-label">Password</label>
											<input type="password" class="form-control" id="password" name="password" required>
										</div>
										<div class="form-group col-mb-3">
											<label for="firstname" class="form-label mt-2">ชื่อ</label>
											<input type="text" class="form-control" name="name" id="name" required>
										</div>
										<div class="form-group col-mb-3">
											<label for="lastname" class="form-label mt-2">นามสกุล</label>
											<input type="text" class="form-control" name="lname" id="lname" required>
										</div>
										<div class="form-group col-mb-3">
											<label for="role" class="form-label mt-2">สถานะ/สิทธิ์ผู้ใช้งาน</label>
											<select class="form-control" name="role" id="role" required>
													<option value="">เลือก</option>
													<option value="userreq">userreq</option>
													<option value="admin">admin</option>
											</select>
										</div>
										<input type="submit" id="insert" value="Submit" class="btn btn-green" />
									</form>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- #modal-alert -->
					<div class="modal fade" id="modal-alert">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">คุณต้องการลบ หรือไม่?</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<div class="alert alert-danger m-b-0">
										<h5><i class="fa fa-info-circle"></i>คุณต้องการลบ หรือไม่?</h5>
										<p> หากต้องการลบ ให้กด ปุ่ม "ลบ" หากไม่ต้องการ ให้กดปุ่ม "ยกเลิก"</p>
									</div>
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">ยกเลิก</a>
									<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">ลบ</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end #content -->
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
			<script src="../assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
			<script src="../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
			<script src="../assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
			<script src="../assets/js/demo/table-manage-default.demo.min.js"></script>
			<script src="../assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
			<script scrc="../assets/plugins/popper/popper.min.js"></script>
			<script src="../assets/js/sweetalert2.js"></script>
			<!-- ================== END PAGE LEVEL JS ================== -->
			<script>
				$(document).ready(function() {
					App.init();
					TableManageDefault.init();
					$('#data-table-default').DtaTable();
				});
			</script>
			<script>
				$(document).ready(function() {
					//insert
					$('#add').click(function() {
                    $('#addModal').modal('show'); 
                    $('#insert_form')[0].reset();
                    $('.modal-title').text("เพิ่มข้อมูลผู้ดูแลระบบ");
                    $('#insert').val("INSERT");
				});
					$('#insert_form').on('submit', function(e) {
						e.preventDefault();
						$.ajax({
							url: "../class/adminInsert.php",
							method: "post",
							data: $('#insert_form').serialize(),
							beforeSend: function() {
								$('#insert').val("Insert");
							},
							success: function(data) {
								Swal.fire({
									icon: 'success',
									title: 'successfully',
									timer: 3000,
									buttons: [
										'NO',
										'YES'
									],
								}).then(function(isConfirm) {
									if (isConfirm) {
										location.reload();
									} else {

									}
								});
								$('#insert_form')[0].reset();
								$('#addModal').modal('hide');
								$('#insert').val("Insert");
							}
						});
					});


					//view
					$('.view_data').click(function() {
						var adid = $(this).attr("id");
						$.ajax({
							url: "../class/adminSelect.php",
							method: "post",
							data: {
								id: adid
							},
							success: function(data) {
								$('#detail').html(data);
								$('.modal-title').text("รายละเอียด");
								$('#dataModal').modal('show');
							}
						});

					});

					//delete
					$('.delete_data').click(function() {
						var adid = $(this).attr("id");
						var status = confirm("คุณต้องการลบUserนี้ใช่หรือไม่?");
						if (status) {
							$.ajax({
								url: "../class/adminDelete.php",
								method: "post",
								data: {
									id: adid
								},
								success: function(data) {
									Swal.fire({
										icon: 'success',
										title: 'successfully',
										timer: 3000,
										buttons: [
											'NO',
											'YES'
										],
									}).then(function(isConfirm) {
										if (isConfirm) {
											location.reload();
										} else {

										}
									});
								}
							});
						}
					});
					//edit
					$('.edit_data').click(function() {
						var adid = $(this).attr("id");
						$.ajax({
							url: "../class/adminFetch.php",
							method: "post",
							data: {
								id: adid
							},
							dataType: "json",
							success: function(data) {
								$('#adid').val(data.adid);
								$('#username').val(data.username);
								$('#password').val(data.password);
								$('#name').val(data.name);
								$('#lname').val(data.lname);
								$('#role').val(data.role);
								$('#insert').val("Update");
								$('.modal-title').text("แก้ไขข้อมูลผู้ดูแลระบบ");
								$('#addModal').modal('show');
							}
						});

					});

				});
			</script>

			<script>
				function checkusername(val) {
					$.ajax({
						type: 'POST',
						url: '../class/checkuser_available.php',
						data: 'username=' + val,
						success: function(data) {
							$('#usernameavailable').html(data);
						}
					});
				}

				function checkhn(val) {
					$.ajax({
						type: 'POST',
						url: '../class/checkhn_available.php',
						data: 'hn=' + val,
						success: function(data) {
							$('#checkhnavailable').html(data);
						}
					});
				}
			</script>
	</body>

	</html>
<?php

}
?>