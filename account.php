<?php
session_start();
include_once('class/function.php');
$conDB = new Db_con();
if ($_SESSION['username'] == "") {
    header("location: signin?login=1");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ข้อมูลผู้ใช้งาน</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
                            <a class="nav-link" href="home">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form">ทำแบบฟอร์ม</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact">ติดต่อ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i> คุณ <?php echo $_SESSION['fullname']; ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="account">Account</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center text-white bg-melon">
                    รายละเอียดบัญชีผู้ใช้
                </div>
                <div class="card-body">
                    <div class="form-group col-lg-6 col-md-6 col-xs-auto">
                        <p style="font-size:16px;">คุณ <?php echo $_SESSION['fullname']; ?>&nbsp;&nbsp;&nbsp; น้ำหนักดิบ : <?php echo $_SESSION['weightbf']; ?></p>
                        <p style="font-size:16px;">อาการบวม : <?php echo $_SESSION['swellname1']; ?></p>
                        <p style="font-size:16px;">ระดับอาการเหนื่อย : <?php echo $_SESSION['tiredname1']; ?></p>
                        <p style="font-size:16px;">ชนิดยาขับปัสสาวะที่รับประทาน : <?php echo $_SESSION['drugname1']; ?></p>
                        <p style="font-size:16px;">จำนวนยาที่รับประทาน : <?php echo $_SESSION['drug1']; ?> เม็ด</p>
                    </div>
                    <hr>
                    <a href="reqdetail" class="card-link">ดูประวัติการทำรายการ</a>
                </div>
                <div class="card-footer text-muted text-center">
                    <p style="font-size:14px;"></p>
                </div>
            </div>
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-12 mb-0 text-muted">© Heartpmk, แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฏเกล้า</p>
            </footer>
        </div>
        <script src="assets/jquery/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
    </body>

    </html>
    <script>
        $(document).ready(function() {

            $('#checkdrugid').change(function() {
                if (($(this).val() == 1) || ($(this).val() == 2) || ($(this).val() == 3)) {
                    $('#checkdrug').prop("disabled", false);
                } else {
                    $('#checkdrug').prop("disabled", true);
                }
            });

        });
    </script>
<?php
}
?>