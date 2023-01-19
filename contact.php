<?php
session_start();
if ($_SESSION['username'] == "") {
    header("location: signin?login=1");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="heartpmk, Heartpmk, แผนกอายุรกรรมโรคหัวใจ, โรงพยาบาลพระมงกุฎเกล้า, คำแนะนำผู้ป่วยที่มีภาวะหัวใจล้มเหลว, heartpmk">
        <meta name="description" content="Heartpmk แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฎเกล้า">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ช่องทางการติดต่::แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฎเกล้า</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/fonts/font.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    </head>

    <body>
        <!--<div class="bg-image" style="background-image: url('assets/bg/bg01.png');height: 100vh;"></div>-->
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
                            <a class="nav-link active" href="contact">ติดต่อ</a>
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
                <div class="card-header text-center text-white">
                    ช่องทางการติดต่อ
                </div>
                <div class="card-body">
                    <p class="card-text">เบอร์ติดต่อ : 02-763-9500</p>
                    <p class="card-text">Hotline(สายด่วน) : 1411</p>
                    <p class="card-text">โรงพยาบาลพระมงกุฎเกล้า</p>
                    <p class="card-text">แผนที่โรงพยาบาล</p>
                    <div class="ratio ratio-2x2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.1867883328828!2d100.53206356527409!3d13.767606650635244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29eb241f8f455%3A0x52e49db99432eed8!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4Lie4Lij4Liw4Lih4LiH4LiB4Li44LiO4LmA4LiB4Lil4LmJ4Liy!5e0!3m2!1sth!2sth!4v1633100263783!5m2!1sth!2sth" width="250" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <p></p>
                </div>
            </div>
            <br><br><br><br>
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-3 border-top">
                <p class="col-md-12 mb-0 text-muted">&nbsp&nbsp&nbsp&nbsp© Heartpmk, แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฎเกล้า</p>
            </footer>
        </div>



        <script src="assets/jquery/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
    </body>

    </html>


<?php

}
?>