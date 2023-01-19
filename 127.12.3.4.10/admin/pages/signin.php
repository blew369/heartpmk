<?php

    session_start();
	if(isset($_SESSION['usereq'])){
		header("location: index");
	} else {
    include_once('../config/function.php');

    $conDB = new DB_con();

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $result = $conDB->signin($username, $password);
        $numrows = $result->fetch_assoc();

        if($numrows > 0){
            $_SESSION['adid'] = $numrows['adid'];
            $_SESSION['reqname'] = $numrows['reqname'];
			$_SESSION['usereq'] = $numrows['username'];
			$_SESSION['role'] = $numrows['role'];
        echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
        echo "<script>window.location.href='index'</script>";
        }else {
        echo "<script>alert('มีบางอย่างผิดพลาด โปรดลองอีกครั้ง');</script>";
        echo "<script>window.location.href='signin'</script>";
    }

    }

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Login</title>
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
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image" style="background-image: url(../assets/css/default/images/mountain.jpg)" data-id="login-cover-image"></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <b>Login</b> Admin
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form method="post" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="กรอกUsernameของท่าน">
                        <span id="usernameavailable"></span>
                    </div>
                    <div class="form-group m-b-20">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่านของท่าน">
                    </div>
                    <div class="login-buttons">
                        <button type="submit" name="login" class="btn btn-success"><i class="fas fa-key"></i> เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->
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
	<script src="../assets/js/theme/default.min.js"></script>
	<script src="../assets/js/apps.min.js"></script>
    <script src="../assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="../assets/js/demo/login-v2.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
</body>
</html>
<?php }?>