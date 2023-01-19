<?php
session_start();
if ($_SESSION['username'] == "") {
    header("location: signin?login=1");
} else {
    include_once('class/function.php');
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];
        $postdata =  new DB_con();
        $sql = "SELECT * FROM post WHERE id = $post_id";
        $row = $postdata->getSingle($sql);
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $row['post_title']; ?></title>
            <link rel="stylesheet" href="assets/css/bootstrap.css">
            <link rel="stylesheet" href="assets/fonts/font.css">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        </head>

        <body class="bg-light">
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
                                <a class="nav-link active" href="home">หน้าแรก</a>
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


            <div class="container py-5 ">
                <div class="row"></div>
                <div class="col-lg-6 col-md-8 mx-auto">
                <?php


                function DateThai($strDate)
                {
                    $strYear = date("Y", strtotime($strDate)) + 543;
                    $strMonth = date("n", strtotime($strDate));
                    $strDay = date("j", strtotime($strDate));
                    $strHour = date("H", strtotime($strDate));
                    $strMinute = date("i", strtotime($strDate));
                    $strSeconds = date("s", strtotime($strDate));
                    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                    $strMonthThai = $strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
                }

                $strDate = $row['post_date'];
            }
                ?>
                <h1 class="fw-light text-center"><?php echo $row['post_title']; ?></h1>
                <hr>
                <div class="div">
                    <span class="text-muted float-start"><?php echo DateThai($strDate); ?> น.</span><br>
                    <img src="contentimg/<?php echo $row['post_image']; ?>" class="img-fluid rounded mt-4" alt="<?php echo $row['post_title']; ?>">
                    <p class="my-4"><?php echo $row['post_content']; ?></p>
                </div>
                <a class="btn btn-danger" href="home" role="button"><i class="fas fa-angle-double-left"></i> กลับ</a>
                </div>
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-3 border-top mt-5">
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