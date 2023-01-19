<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: home");
} else {
include_once('class/function.php');

$conDB = new DB_con();


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = $conDB->signin($username, $password);
    $row = $result->fetch_assoc();

    if ($row > 0) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['hn'] = $row['hn'];
        $_SESSION['weightbf'] = $row['weight'];
        $_SESSION['prename1'] = $row['prename'];
        $_SESSION['swellname1'] = $row['swellname'];
        $_SESSION['tiredname1'] = $row['tiredname'];
        $_SESSION['drugname1'] = $row['drugname'];
        $_SESSION['drug1'] = $row['drug'];
        header("location: home");
    } else if ($row[0] == 0){
    
        echo "<script>window.location.href='signin?login=0'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fonts/font.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand"><img src="assets/brand/heart01.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Heartpmk</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarColor02">
                    <ul class="navbar-nav align-items-end">
                        <li class="nav-item">
                            <a class="nav-link" href="index">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactme">ติดต่อ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="signin">ลงชื่อเข้าใช้</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container d-flex justify-content-center">
        <div class="row col-md-6">
            <h2 class="mt-5"><i class="fas fa-lock"></i> เข้าสู่ระบบ (สำหรับผู้ป่วย)</h2>
            <hr class="col-md-10">
            <form method="post">
                <div class="mb-3 col-md-12">
                    <label for="username" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="กรอกเบอร์โทรศัพท์ที่ท่านใช้ลงทะเบียน">
                    <span id="usernameavailable"></span>
                </div>
                <div class="mb-3 col-md-12">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน">
                </div>
                <button type="submit" name="login" class="btn btn-success"><i class="fas fa-key"></i> เข้าสู่ระบบ</button><br>
                <a href="register.php" class="btn btn-primary mt-3"><i class="fas fa-pencil-alt"></i> สมัครสมาชิก (สำหรับทีมรักษา)</a>
            </form>
        </div>
    </div>

    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/sweetalert2.js"></script>
    <script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});

		<?php
			if(isset($_GET['login'])) {
				if($_GET['login'] == 0) {
		?>
					Swal.fire({
						title: "ไม่สามารถเข้าสู่ระบบได้",
						text: "กรุณาตรวจสอบ Username หรือ Password ของท่าน",
						icon: "error",
						button: "ตกลง",
					});
		<?php
				}
				else if($_GET['login'] == 1) {
		?>
					Swal.fire({
						title: "ไม่สามารถเข้าสู่ระบบได้",
						text: "กรุณาเข้าสู่ระบบก่อนใช้งาน",
						icon: "error",
						button: "ตกลง",
					});
		<?php
				}
			}
		?>

	</script>
</body>

</html>
<?php
}
?>