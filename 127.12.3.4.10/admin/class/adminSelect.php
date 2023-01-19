<?php
date_default_timezone_set("Asia/Bangkok");
$adid = $_POST['id'];
include_once('../config/function.php');
$conDB = new Db_con();
$sql = $conDB->adminUpdateFetch($adid);


while ($row = $sql->fetch_array()) {
    $date = $row['regisdate'];
    $date1 = substr($date, 0, 10);
    list($y, $m, $d) = explode('-', $date1);
    $time = $row['regisdate'];
    $time1 = substr($time,11,8);
     $output='<table class="table table-bordered">';

     $output.='<tr>
                <td width="30%"><label>ชื่อ-สกุล</label></td>
                <td width="70%">'.$row['name'].' '. $row['lname'].'</td>
              </tr>';
     $output.='<tr>
                <td width="30%"><label>สถานะ</label></td>
                <td width="70%">' . $row['role'] . '</td>
            </tr>';
     $output.='<tr>
                <td width="30%"><label>วันที่สร้าง</label></td>
                <td width="70%">' . $d . '/' . $m . '/' . $y  . '</td>
        </tr>';
        $output.='<tr>
                <td width="30%"><label>เวลาที่สร้าง</label></td>
                <td width="70%">' . $time1  . '</td>
        </tr>';
     $output.='</table>';
}
echo $output;



?>
