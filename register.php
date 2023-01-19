<?php
session_start();
include_once('class/function.php');
$conDB = new Db_con();

if (isset($_POST['submit'])) {
  $username =  $_POST['username'];
  $password = md5($_POST['password']);
  $hn = $_POST['hn'];
  $prename = $_POST['prename'];
  $patientname = $_POST['patientname'];
  $patientlname = $_POST['patientlname'];
  $address = $_POST['address'];
  $telnumber = $_POST['telnumber'];
  $weight = $_POST['weight'];
  $swellid = $_POST['swellid'];
  $tiredid = $_POST['tiredid'];
  $drugid = $_POST['drugid'];
  $drug = $_POST['drug'];
  $docnote = $_POST['docnote'];
  $sql = $conDB->registration($username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote);

  if ($sql) {
    echo "<script>alert('ลงทะเบียนเสร็จสมบูรณ์')</script>";
    echo "<script>window.location.href='signin'</script>";
  } else {
    echo "<script>alert('เกิดข้อผิดพลาดบางอย่างกรุณาลองใหม่อีกครั้ง')</script>";
    echo "<script>window.location.href='register'</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<title>Register-Patient</title>
</head>

<body>

  <div class="container">
    <h1 class="mt-5" style="text-align:center;">ลงทะเบียนผู้ป่วย <img src="assets/brand/heart01.svg" alt="" width="30" height="24" class="d-inline-block align-text"></h1> <span></span>
    <div class="card">
      <div class="card-body mt-2">
        <form class="row g-3" method="post">
          <div class="form-group col-md-4">
            <label for="username" class="form-label">เบอร์โทรศัพท์(Username)</label>
            <input type="text" class="form-control" id="username" name="username" onkeyup="checkusername(this.value)" required>
            <span id="usernameavailable"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group col-md-4">
            <label for="fullname" class="form-label">HN</label>
            <input type="text" class="form-control" id="hn" name="hn" onkeyup="checkhn(this.value)" required>
            <span id="checkhnavailable"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="prename" class="form-label">คำนำหน้า</label>
            <select class="form-select" id="prename" name="prename" class="selectpicker" data-live-search="true" required>
              <option value="">เลือก</option>
              <?php
              $sql = $conDB->fetchdataprename();
              while ($row = mysqli_fetch_array($sql)) { ?>
                <option value="<?= $row['prename']; ?>"><?php echo $row['prename']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="patientname" class="form-label">ชื่อผู้ป่วย</label>
            <input type="text" class="form-control" id="patientname" name="patientname" required>
          </div>
          <div class="form-group col-md-4">
            <label for="patientlname" class="form-label">นามสกุลผู้ป่วย</label>
            <input type="text" class="form-control" id="patientlname" name="patientlname" required>
          </div>
          <div class="form-group col-md-4">
            <label for="address" class="form-label">ที่อยู่</label>
            <input type="text" class="form-control" id="address" name="address" required>
          </div>
          <div class="form-group col-md-4">
            <label for="telnumber" class="form-label">เบอร์บุคคลที่สามารถติดต่อได้</label>
            <input type="text" class="form-control" id="telnumber" name="telnumber" required>
          </div>
          <div class="form-group col-md-4">
            <label for="weight" class="form-label">น้ำหนักแห้ง</label>
            <input type="text" class="form-control" id="weight" name="weight" required>
          </div>
          <div class="form-group col-md-4">
            <label for="swellname" class="form-label">ระดับอาการบวม</label>
            <select class="form-select" id="swellid" name="swellid" class="selectpicker" data-live-search="true" required>
              <option value="">เลือก</option>
              <?php
              $sql = $conDB->fetchdataswell();
              while ($row = mysqli_fetch_array($sql)) { ?>
                <option value="<?= $row['swellid']; ?>"><?php echo $row['swellname']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="tirename" class="form-label">ระดับอาการเหนื่อย NYHA</label>
            <select class="form-select" id="tiredid" name="tiredid" class="selectpicker" data-live-search="true" required>
              <option value="">เลือก</option>
              <?php
              $sql = $conDB->fetchtired();
              while ($row = mysqli_fetch_array($sql)) { ?>
                <option value="<?= $row['tiredid']; ?>"><?php echo $row['tiredname']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
            <div class="form-group col-md-4">
              <label for="tirename" class="form-label">ชนิดยาขขับปัสสาวะที่รับประทาน</label>
              <select class="form-select" id="checkdrugid" name="drugid" class="selectpicker" data-live-search="true" required>
                <option value="0">เลือก</option>
                <?php
                $sql = $conDB->fetchdrugtype();
                while ($row = mysqli_fetch_array($sql)) { ?>
                  <option value="<?= $row['drugid']; ?>"><?php echo $row['drugname']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="drug" class="form-label">จำนวนยาขับปัสสาวะที่รับประทาน จำนวน (เม็ด)</label>
              <input type="text" class="form-control" id="checkdrug" name="drug" disabled required>
            </div>
          <div class="form-group col-lg-6 col-md-6 col-xs-auto">
            <label for="other" class="form-label">Doctor Note...</label>
            <textarea class="form-control" name="docnote" id="docnote" rows="7" placeholder="ระบุ"></textarea>
          </div>

          <div class="mt-5">
            <a href="signin" class="btn btn-primary"><i class="fas fa-key"></i> Go to Signin</a>
            <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="far fa-address-card"></i> Register</button>
          </div>
        </form>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-6 mb-0 text-muted">© Heartpmk, แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฏเกล้า</p>
          <ul class="nav col-md-4 justify-content-end">
          </ul>
        </footer>
      </div>
    </div>
  </div>
  <script src="assets/jquery/jquery-3.6.0.min.js"></script>
  <script>
    //checkuser
    function checkusername(val) {
      $.ajax({
        type: 'POST',
        url: 'class/checkuser_available.php',
        data: 'username=' + val,
        success: function(data) {
          $('#usernameavailable').html(data);
        }
      });
    }
    //check'HN'
    function checkhn(val) {
      $.ajax({
        type: 'POST',
        url: 'class/checkhn_available.php',
        data: 'hn=' + val,
        success: function(data) {
          $('#checkhnavailable').html(data);
        }
      });
    }
  </script>
  <script>
    $(document).ready(function() {

      $('#checkdrugid').change(function() {
        if (($(this).val() == 1) || ($(this).val() == 2)) {
          $('#checkdrug').prop("disabled", false);
        } else {
          $('#checkdrug').prop("disabled", true);
        }
      });

    });
  </script>


  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/sweetalert2.js"></script>
</body>

</html>