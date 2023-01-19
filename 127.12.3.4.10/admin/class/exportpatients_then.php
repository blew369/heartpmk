<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
if ($_SESSION['adid'] == "") {
    header("location: ../pages/signin.php");
} else {

?>
    <?php
    include_once('../config/function.php');
    $conDB = new Db_con();
    $strExcelFileName = "patients.xls";
    header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
    header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
    header("Pragma:no-cache");
    if ($_POST['datef'] && $_POST['datel'] != '' && $_POST['hn']) {
        $datefirst = $_POST['datef'];
        $datelast = $_POST['datel'];
        $hn = $_POST['hn'];
        $export = $conDB->RequestFilterbyHn($hn,$datefirst,$datelast);
    } else {
        header("location: ../pages/exportpatients.php");
    }
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body>
        <center>
            <h2>รายงานประวัติการทำรายการของผู้ป่วย</h2>
        </center>
        <?php $date = date("d-m-Y"); ?>
        <h5 align="left">วันที่ทำรายการ : <?= $date; ?></h5>
        <table id='tableData' class="table table-bordered" x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
            <tr>
                <td width="200" height="30" align="center" valign="middle"><strong>วันที่</strong></td>
                <td width="200" height="30" align="center" valign="middle"><strong>เวลา</strong></td>
                <td width="250" align="center" valign="middle"><strong>รหัสผู้ป่วย</strong></td>
                <td width="200" height="30" align="center" valign="middle"><strong>ชื่อ-สกุล</strong></td>
                <td width="110" align="center" valign="middle"><strong>อาการบวม</strong></td>
                <td width="400" align="center" valign="middle"><strong>อาการเหนื่อยล่าสุด</strong></td>
                <td width="181" align="center" valign="middle"><strong>น้ำหนักดิบ</strong></td>
                <td width="225" align="center" valign="middle"><strong>น้ำหนักล่าสุด</strong></td>
                <td width="181" align="center" valign="middle"><strong>น้ำหนักเพิ่ม/ลด</strong></td>
                <td width="181" align="center" valign="middle"><strong>หมายเหตุน้ำหนัก</strong></td>
                <td width="181" align="center" valign="middle"><strong>จำนวนยา</strong></td>
                <td width="181" align="center" valign="middle"><strong>จำนวนยาหลังปรับ</strong></td>
                <td width="250" align="center" valign="middle"><strong>อาการอื่นๆ</strong></td>
                <td width="250" align="center" valign="middle"><strong>เบอร์โทรศัพท์ติดต่อ</strong></td>
            </tr>
           
            <?php while ($row = $export->fetch_assoc()) {
                    $date = $row['reqdate'];
                    $date1 = substr($date, 0, 10);
                    list($y, $m, $d) = explode('-', $date1);
                    $time = $row['reqdatetime'];
                    $time1 = substr($time, 11, 8);
                    $weightmember = $row['weightbf'];
                    $weightreq = $row['weightreq'];
                    $weightresult = number_format($weightreq - $weightmember, 1);
                ?>

                <tr>
                    <td align="center" valign="middle"><?php echo $d . '/' . $m . '/' . $y; ?></td>
                    <td align="center" valign="middle"><?php echo $time1; ?></td>
                    <td align="center" valign="middle"><?php echo $row['hn']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['prename']; ?><?php echo $row['fullname']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['swellname']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['tiredname']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['weightbf']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['weightreq']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['weightsum']; ?></td>
                <?php if(($weightreq - $weightmember) >= 2 AND ($weightresult != 0) AND ($weightresult != 0.1)){?>

                <td align="center" valign="middle">น้ำหนักเพิ่ม</td>

                <?php
                    } elseif (($weightreq - $weightmember) <= 2 AND ($weightresult != 0) AND ($weightresult != 0.1)) {
                ?>

                <td align="center" valign="middle">น้ำหนักลด</td>

                <?php
                    } elseif  ((($weightreq - $weightmember) >= (1.9)) or (($weightresult) >= (0.1))) {
                ?>

                <td align="center" valign="middle">น้ำหนักเพิ่ม</td>

                <?php
                    } elseif  ((($weightreq - $weightmember) <= (1.9)) and (($weightreq - $weightmember) != (0.0))) {
                ?>

                <td align="center" valign="middle">น้ำหนักลดลง</td>

                <?php
                    } elseif  ((($weightreq - $weightmember) == 0)) {
                ?>

                <td align="center" valign="middle">น้ำหนักเท่าเดิม</td>

                <?php }?>
                    <td align="center" valign="middle"><?php echo $row['drug']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['drugsum']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['other']; ?></td>
                    <td align="center" valign="middle"><?php echo $row['telnumber']; ?></td>
                </tr>
            <?php
                    
            }
            ?>
        </table>
        </table>

        <script>
            window.onbeforeunload = function() {
                return false;
            };
            setTimeout(function() {
                window.close();
            }, 10000);
        </script>
    </body>

    </html>
<?php
}
?>