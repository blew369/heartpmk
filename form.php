<?php
session_start();
include_once('class/function.php');
$conDB = new Db_con();
if ($_SESSION['username'] == "") {
    header("location: signin?login=1");
} else {
    $hn = $_SESSION['hn'];
    $weightbf =  $_SESSION['weightbf'];
    $_POST['hn'] = $_SESSION['hn'];
    $_POST['weightbf'] = $_SESSION['weightbf'];

    if (isset($_POST['submit'])) {
        $hn = $_POST['hn'];
        $weightbf = $_POST['weightbf'];
        $weight = $_POST['weight'];
        $swellid = $_POST['swellid'];
        $tiredid = $_POST['tiredid'];
        $drugid = $_POST['drugid'];
        $drug = $_POST['drug'];
        $other = $_POST['other'];
        $sql = $conDB->InsertPatientForm($hn, $weightbf, $weight, $swellid, $tiredid, $drugid, $drug, $other);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ฟอร์มกรอกข้อมูล</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/fonts/font.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="assets/brand/heart01.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
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
                            <a class="nav-link active" href="form">ทำแบบฟอร์ม</a>
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
                <div class="card-header text-center text-white">
                    กรอกน้ำหนักตัวและอาการเพื่อประเมินภาวะน้ำคั่ง
                </div>
                <div class="card-body">
                    <form class="row g-3" method="post">
                        <div class="input-group">
                            <input type="hidden" class="form-control" name="hn" id="hn" value="<?php echo $hn; ?>" disabled required>
                            <input type="hidden" class="form-control" name="weightbf" id="weightbf" value="<?php echo $weightbf; ?>" disabled required>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-xs-auto">
                            <label for="weight" class="form-label">น้ำหนักที่ชั่งได้วันนี้ (กิโลกรัม)</label>
                            <input type="text" class="form-control" name="weight" id="weight" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-auto">
                            <label for="tirename" class="form-label">ชนิดยาขับปัสสาวะที่รับประทาน</label>
                            <select class="form-select" id="checkdrugid" name="drugid" class="selectpicker" data-live-search="true" required>
                                <option value="0">เลือก</option>
                                <?php
                                $drugtype = $conDB->fetchdrugtype();
                                while ($row = $drugtype->fetch_array()) { ?>
                                    <option value="<?= $row['drugid']; ?>"><?php echo $row['drugname']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-auto">
                            <label for="drug" class="form-label">จำนวนยาขับปัสสาวะที่รับประทาน จำนวน (เม็ด)</label>
                            <input type="text" class="form-control" id="checkdrug" name="drug" disabled required>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="swellname" class="form-label">อาการบวม</label>
                            </div>
                            <?php
                            $swelltype = $conDB->fetchdataswell();
                            while ($row =  $swelltype->fetch_array()) { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="swellid" id="swellid" value="<?php echo $row['swellid']; ?>" required>
                                    <label class="form-check-label" for="swellid">
                                        <?php echo $row['swellname']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-auto">
                            <div class="row">
                                <label for="tired" class="form-label">ท่านมีอาการ เหนื่อย อ่อนเพลีย ใจสั่น หรือ เจ็บหน้าอก ขณะทำกิจกรรมเหล่านี้หรือไม่</label>
                            </div>
                            <?php
                            $question = $conDB->fetchtiredquestion();
                            while ($row = $question->fetch_array()) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tiredid" id="tiredid" value="<?php echo $row['tiredid']; ?>" required>
                                    <label for="tiredid" class="form-label"><?php echo $row['question']; ?></label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-xs-auto">
                            <label for="other" class="form-label">หากมีอาการผิดปกติอื่น ๆ โปรดระบุ</label>
                            <textarea class="form-control" name="other" id="other" rows="7" placeholder="ระบุ"></textarea>
                        </div>
                        <hr>
                        <div class="mt-3 gap-2 d-md-flex justify-content-md-start">
                            <a class="btn btn-md btn-danger" href="home" role="button"><i class="fas fa-angle-double-left"></i></a>
                            <button type="submit" name="submit" id="submit" class="btn btn-md btn-primary">ถัดไป <i class="fas fa-angle-double-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    <p style="font-size:14px;">กรุณากรอกข้อมูลตามความเป็นจริงเพื่อประโยชน์ของท่าน </p>
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
                if (($(this).val() == 1) || ($(this).val() == 2 ) || ($(this).val() == 3 )) {
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