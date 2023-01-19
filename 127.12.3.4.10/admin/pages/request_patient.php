<?php
session_start();
include_once('../config/function.php');
$condb = new DB_con();
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
        <title>ดูประวัติการทำรายการของผู้ป่วย</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />


        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="../assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
        <link href="../assets/plugins/animate/animate.min.css" rel="stylesheet" />
        <link href="../assets/css/default/style.min.css" rel="stylesheet" />
        <link href="../assets/css/default/style-responsive.min.css" rel="stylesheet" />
        <link href="../assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
        <link href="../assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
        <link href="../assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="../assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
        <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
        <link href="../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
        <link href="../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
        <link href="../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
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
            <?php require('../sidebar/sidebar.php') ?>
            <div class="sidebar-bg"></div>
            <!-- end #sidebar -->
            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">Request <small>Patients</small></h1>
                <!-- end page-header -->

                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">ดูประวัติการทำรายการของผู้ป่วย</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card">
                            <div class="card-body">
                                <form name="reportdate" method="post" action="request_patient_then.php" target="_blank">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>HN</label>
                                            <select id="hn" name="hn" class="form-control selectpicker" data-live-search="true">
                                                <?php
                                                $prename = $condb->selectHN();
                                                ?>
                                                <option value="">เลือก</option>
                                                <?php
                                                while ($row = $prename->fetch_assoc()) { ?>
                                                    <option value="<?= $row['hn']; ?>"><?php echo $row['hn']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>จากวันที่</label>
                                            <input type="date" name="datef" id="datef" class="form-control" placeholder="วันที่เริ่มต้น">
                                        </div>
                                        <div class="col-md-4">
                                            <label>ถึงวันที่</label>
                                            <div class="input-group">
                                                <input type="date" name="datel" id="datel" class="form-control" placeholder="วันที่สิ้นสุด">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit" name="btn-search"><i class="fas fa-search"></i> ค้นหา</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        <script src="../assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
        <!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
        <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/js-cookie/js.cookie.js"></script>
        <script src="../assets/js/theme/default.min.js"></script>
        <script src="../assets/js/apps.min.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
        <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="../assets/plugins/masked-input/masked-input.min.js"></script>
        <script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="../assets/plugins/password-indicator/js/password-indicator.js"></script>
        <script src="../assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
        <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
        <script src="../assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
        <script src="../assets/plugins/bootstrap-daterangepicker/moment.js"></script>
        <script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
        <script src="../assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script>
        <script src="../assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
        <script src="../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
        <script src="../assets/plugins/clipboard/clipboard.min.js"></script>
        <script src="../assets/js/demo/form-plugins.demo.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function() {
                App.init();
                FormPlugins.init();
            });
        </script>

    </body>

    </html>
<?php

} ?>