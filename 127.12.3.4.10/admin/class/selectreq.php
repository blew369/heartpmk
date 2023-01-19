<?php
$reid = $_POST['id'];
date_default_timezone_set("Asia/Bangkok");
include_once('../config/function.php');
$conDB = new Db_con();

$result = $conDB->HeartRequestPost($reid);


while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['reqdate'];
    $date1 = substr($date, 0, 10);
    list($y, $m, $d) = explode('-', $date1);
    $time = $row['reqdatetime'];
    $time1 = substr($time,11,8);

     $output='<table class="table table-bordered">';

     $output.='<tr>
                <td width="30%"><label>ชื่อ-สกุล</label></td>
                <td width="70%">'.$row['prename'].' '. $row['fullname'].'</td>
              </tr>';
     $output.='<tr>
                <td width="30%"><label>HN</label></td>
                <td width="70%">' . $row['hn'] . '</td>
              </tr>';
     $output.='<tr>
                <td width="30%"><label>เบอร์ติดต่อ</label></td>
                <td width="70%">' . $row['telnumber'] . '</td>
            </tr>';
     $output.='<tr>
                <td width="30%"><label>น้ำหนักดิบ</label></td>
                <td width="70%">' . $row['weight'] . '</td>
            </tr>';
    $output.='<tr>
                <td width="30%"><label>น้ำหนักล่าสุด</label></td>
                <td width="70%">' . $row['weightreq'] . '</td>
            </tr>';
    $output.='<tr>
                <td width="30%"><label>น้ำหนัก/เพิ่ม-ลด</label></td>
                <td width="70%">' . $row['weightsum'] . '</td>
            </tr>';
    $output.='<tr>
                <td width="30%"><label>อาการบวม</label></td>
                <td width="70%">' . $row['swellname'] . '</td>
             </tr>';
    $output.='<tr>
                <td width="30%"><label>อาการเหนื่อย</label></td>
                <td width="70%">' . $row['tiredname'] . '</td>
             </tr>';
    $output.='<tr>
                <td width="30%"><label>จำนวนยาที่รับประทานล่าสุด</label></td>
                <td width="70%">' . $row['drug'] . '</td>
             </tr>';
    $output.='<tr>
                <td width="30%"><label>จำนวนยา:เพิ่ม/ลด</label></td>
                <td width="70%">' . $row['drugsum'] . '</td>
             </tr>';
    $output.='<tr>
                <td width="30%"><label>วันที่ทำรายการ</label></td>
                <td width="70%">' . $d . '/' . $m . '/' . $y . '</td>
             </tr>';
    $output.='<tr>
                <td width="30%"><label>เวลาที่ทำรายการ</label></td>
                <td width="70%">' . $time1 .  '&nbsp' .'น.' . '</td>
            </tr>';
     $output.='</table>';
}
echo $output;
