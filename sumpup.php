<?php
session_start();

include_once('class/function.php');
$conDB = new Db_con();
$reqid = $_GET['req'];
if ($_SESSION['username'] == "") {
    header("location: signin?login=1");
} else {

    $sql = $conDB->GetSumUp($reqid);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>สรุปผลการกรอกแบบฟอร์ม</title>
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
        <br>

        <div class="container col-lg-5 col-md-6 col-xs-auto">
            <div class="card">
                <?php
                while ($data = $sql->fetch_assoc()) {

                    $weightmember = $data['weightbf'];
                    $swellmember = $data['swellid'];
                    $tiredmember = $data['tiredid'];
                    $weightreq = $data['weightreq'];
                    $swellreq = $data['swellidreq'];
                    $tiredreq = $data['tiredidreq'];
                    $drugreq = $data['drug'];
                    $other = $data['other'];
                    $drugtype = $data['drugname'];
                    $drugsum = $data['drugsum'];
                    $weightresult = number_format($weightreq - $weightmember, 1);

                     //*นำ้หนักเพิ่มขึ้น 2 กิโล 1, 1, 1
                    if ((($weightreq - $weightmember) >= (2)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '1') ) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                       //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,1,2
                    } elseif  ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                      <?php require('component/sumwarning.php');?>  
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,1, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumdanger.php');?>   
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,1, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                      <?php require('component/sumdanger.php');?>   
                    <?php
                        //*น้ำหนักเพิ่มขึ้น 2 กิโล 1,2,1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,2,2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,2,3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                            //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,2,4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                            //*น้ำหนักเพิ่มขึ้น 2 กิโล 1,3,1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '1')) {
                        ?>
                    <?php require('component/sumwarning.php')?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,3,2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                            //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,3,3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                    <?php require('component/sumwarning.php');?>
                    <?php
                            //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,3,4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                    <?php require('component/sumdanger.php');?>
                    <?php
                        //*น้ำหนักเพิ่มขึ้น 2 กิโล 1,4,1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,4,2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,4,3
                     } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 1,4,4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 1, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 1, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php')?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 1,3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumdanger.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 1,4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 2, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 2, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 2, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 2,4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                        <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 3, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2,3, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 3,3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 3, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 4, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2,4, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2,4, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 2, 4, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 1, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 1, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3,1, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumdanger.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 1, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 2, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 2, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3,2, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 2, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 3, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 3, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3,3, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 3, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 4, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 4, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3,4, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 3, 4, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 1, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 1, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 1, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumdanger.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 1, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 2, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 2, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 2, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 2, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 3, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 3, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 3, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 3, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 4, 1
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 4, 2
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล 4, 4, 3
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/sumwarning.php');?>
                    <?php
                        //*นำ้หนักเพิ่มขึ้น 2 กิโล  4, 4, 4
                    } elseif ((($weightreq - $weightmember) >= 2) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('class/sumwarning.php');?>

                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 1, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>

                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>

                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>

                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 1, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minussuccess.php');?>  
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 1, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>  
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusinfo.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 2, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 1, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?> 
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minussuccess.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 3, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 1, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                    
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minusdanger.php');?>
                       
                    <?php
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    <?php
                       //*น้ำหนักน้อยกว่า 2 กิโล 4, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (-2)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/minuswarning.php');?>
                    
                    <?php
                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 1, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>
                
                    <?php
                            //*น้ำหนักมากกว่า 1.9 กิโล 1, 1, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                    <?php
                         //*น้ำหนักมากกว่า 1.9 กิโล 1, 1, 3
                     } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                    <?php
                            //*น้ำหนักมากกว่า 1.9 กิโล 1, 1, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>
                        
                    <?php
                            //*น้ำหนักมากกว่า 1.9 กิโล 1, 2, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>
                        
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 2, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 2, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                        
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 2, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 3, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 3, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                         <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 3, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '3')) {
                     ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 3, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 4, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 4, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>
                        
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 4, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 4, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 1, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 1, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 1, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 1, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                     <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 2, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 2, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 2, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 2, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 3, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 3, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 3, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                        
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 3, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                        
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 4, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>
                        
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 4, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 4, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumsuccess.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 2, 4, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 1, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 1, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 1, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 1, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 2, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 2, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 2, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 2, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 3, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 3, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 3, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 3, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 4, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 4, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 4, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 3, 4, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 1, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>
                        
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 1, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 1, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 1, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 2, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 2, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 2, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 2, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '4')) {
                     ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 3, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 3, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 3, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 3, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumdanger.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 4, 1
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 4, 2
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 4, 3
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 4, 4, 4
                    } elseif ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/sumwarning.php');?>

                    <?php
                        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>
                
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 1, 3
                     } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minusdanger.php');?>
                    <?php
                        //*น้ำหนักมากกว่า 1.9 กิโล 1, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                         <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '3')) {
                     ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minussuccess.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 1, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 1, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                     <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minuswarning.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minussuccess.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minussuccess.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 2, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 1, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 3, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 1, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>
                        
                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 1, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 1, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 1, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 2, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 2, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 2, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 2, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '4')) {
                     ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 3, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 3, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 3, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 3, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minusdanger.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 4, 1
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 4, 2
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 4, 3
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //*น้ำหนักน้อยกว่า 1.9 กิโล 4, 4, 4
                    } elseif ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/minuswarning.php');?>

                    <?php
                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                        //*น้ำหนักเท่ากับ0 กิโล 1, 1, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>
                
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 1, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 1, 3
                     } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 1, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqdanger.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 2, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 2, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 2, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/eqwarning.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 2, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 3, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 3, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 3, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '3')) {
                     ?>
                       <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 3, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                      <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 4, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 4, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqsuccess.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 4, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 1, 4, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '1') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 1, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                      <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 1, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 1, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 1, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqdanger.php');?>

                     <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 2, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 2, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 2, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 2, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 3, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 3, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 3, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqwarning.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 3, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqwarning.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 4, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 4, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 4, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqsuccess.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 2, 4, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '2') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 1, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 1, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 1, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 1, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 2, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 2, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 2, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 2, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '2') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 3, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 3, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 3, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 3, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                       <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 4, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 4, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 4, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 3, 4, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '3') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 1, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/eqwarning.php');?>
                        
                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 1, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 1, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 1, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '1') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 2, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 2, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '2')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 2, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '3')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 2, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '2') and ($tiredreq == '4')) {
                     ?>
                        <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 3, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '1')) {
                    ?>
                       <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 3, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 3, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 3, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '3') and ($tiredreq == '4')) {
                    ?>
                         <?php require('component/eqdanger.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 4, 1
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '1')) {
                    ?>
                      <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 4, 2
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '2')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 4, 3
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '3')) {
                    ?>
                        <?php require('component/eqwarning.php');?>

                    <?php
                        //*น้ำหนักเท่ากับ0 กิโล 4, 4, 4
                    } elseif ((($weightreq - $weightmember) == (0)) and ($swellreq == '4') and ($tiredmember == '4') and ($tiredreq == '4')) {
                    ?>
                        <?php require('component/eqwarning.php');?>
                    <?php
                        //*น้ำหนักเท่ากับ 0 กิโล 4, 4
                    } elseif (($weightresult == '') and ($swellreq == '') and ($tiredreq == '')) {
                    ?>
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                <p style="font-size:14px;">ไม่มีข้อมูล </p>
                            </div>
                        </div>

                    <?php
                        }else{
                                
                    ?>
                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                <p>การกรอกรายการไม่สมบูรณ์กรุณาตรวจใหม่อีกครั้ง </p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>


            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-12 mb-0 text-muted">© Heartpmk, แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฏเกล้า</p>
            </footer>
        </div>

        <script src="assets/jquery/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/sweetalert2.js"></script>

    </body>

    </html>
<?php
}
?>