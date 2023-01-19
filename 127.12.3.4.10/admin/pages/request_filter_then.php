<?php
session_start();
include_once('../config/function.php');
$conDB = new Db_con();
if ($_SESSION['usereq'] == "") {
    header("location: signin");
} else {
    if($_POST['datef'] && $_POST['datel'] != ''){
        $datefirst = $_POST['datef'];
        $datelast = $_POST['datel'];
        $getFilter = $conDB->RequestFilter($datefirst, $datelast);
        
    }else{
        header("location: request_filter");
    }

?>
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <title>request-filter-then</title>
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
                            <i class="fas fa-user-circle"></i>
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
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item active">Request</li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">รายการ <small>Request-แยกตามวันที่</small></h1>
                <!-- end page-header -->

                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Request Patients</h4>
                    </div>
                    <div class="panel-body">
                        <div class="container"></div>
                        <table id="data-table-default" class="table table-striped table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th width="15%">วันที่ทำรายการ</th>
                                    <th width="15%">ชื่อ-สกุล</th>
                                    <th width="15%">น้ำหนักดิบ</th>
                                    <th width="15%">น้ำหนักล่าสุด</th>
                                    <th width="15%">น้ำหนักเพิ่ม/ลด</th>
                                    <th width="12%">อาการบวม</th>
                                    <th width="20%">อาการเหนื่อย</th>
                                    <th width="25%">จำนวนยา</th>
                                    <th width="1%" class="text-nowrap">รายละเอียด</th>
									<th width="1%" class="text-nowrap">ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($getFilter) > 0) {
                                ?>
                                    <?php
                                    while ($row = $getFilter->fetch_assoc()) {
                                        $tiredreq = $row['tiredidreq'];
                                        $date = $row['reqdate'];
                                        $drug = $row["drugsum"];
                                        $date1 = substr($date, 0, 10);
                                        list($y, $m, $d) = explode('-', $date1);
                                        $time = substr($date, 11, 8);

                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $d . '/' . $m . '/' . $y; ?></td>
                                            <td><?php echo $row["prename"] ?><?php echo $row["fullname"] ?></td>
                                            <td><?php echo $row["weightbf"] ?></td>
                                            <td><?php echo $row["weightreq"] ?></td>
                                            <td><?php echo $row["weightsum"] ?></td>
                                            <td><?php echo $row["swellname"] ?></td>
                                            <td><?php echo $row["tiredname"] ?></td>
                                            <td><?php echo $row["drugsum"]; ?></td>
                                            <td width="1%"><button type="button" name="view" value="view" class="btn btn-info btn-sm view_data" id="<?php echo $row['reid']; ?>"><i class="fas fa-eye"></i> view</button></td>
                                            <td width="1%"><button type="button" name="delete" value="delete" class="btn btn-danger btn-sm delete_data" id="<?php echo $row['reid']; ?>"><i class="fas fa-window-close"></i> ลบ</button></td>
                                        </tr>
                                    <?php

                                    }
                                } else {
                                    ?>
                        <?php
                                }
                        ?>

                        </table>
                    </div>
                </div>

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


            </div>
            <!-- end panel -->
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
            });
        </script>
        <script>
            $(document).ready(function() {
            //view
                $('body').on('click','.view_data',function(){
                    $('.view_data').click(function() {
                            var reid = $(this).attr("id");
                            $.ajax({
                                url: "../class/selectreq.php",
                                method: "post",
                                data: {
                                    id: reid
                                },
                                success: function(data) {
                                    $('#detail').html(data);
                                    $('#dataModal').modal('show');
                                }
                            });

                        });
                });
                    //delete
                    $('body').on('click','.view_data',function(){
                        $('.delete_data').click(function() {
                            var reid = $(this).attr("id");
                            var status = confirm("คุณต้องการลบข้อลบข้อมูลRequestนี้ใช่หรือไม่?");
                            if (status) {
                                $.ajax({
                                    url: "../class/deletereq.php",
                                    method: "post",
                                    data: {
                                        id: reid
                                    },
                                    success: function(data) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'successfully',
                                            timer : 3000,
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
                    });
                });
        </script>
    </body>

    </html>
<?php

} ?>