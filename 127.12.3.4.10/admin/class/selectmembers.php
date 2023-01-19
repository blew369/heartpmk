<?php
$memberid = $_POST['id'];
date_default_timezone_set("Asia/Bangkok");
include_once('../config/function.php');
$conDB = new Db_con();

$result = mysqli_query($conDB->dbcon, "SELECT members.memberid, members.hn, members.prename, CONCAT_WS(' ',members.patientname, members.patientlname) AS fullname, 
                        members.patientname, members.patientlname, swellsymp.swellname, tiredsymp.tiredname, members.address, members.telnumber, members.docnote,
                        members.weight, members.swellid, members.tiredid, members.drug, tiredsymp.tiredname, tiredsymp.tiredtype, members.regdate, drugtype.drugname
                        FROM members
                        INNER JOIN swellsymp ON members.swellid = swellsymp.swellid
                        INNER JOIN tiredsymp ON members.tiredid = tiredsymp.tiredid
                        INNER JOIN drugtype ON members.drugid = drugtype.drugid
                        WHERE memberid = $memberid");


while ($row = mysqli_fetch_array($result)) {
     $date = $row['regdate'];
    $date1 = substr($date, 0, 10);
    list($y, $m, $d) = explode('-', $date1);
    $time = $row['regdate'];
    $time1 = substr($time,11,8);
     $output='<table class="table table-bordered">';

     $output.='<tr>
                <td width="30%"><label>ชื่อ-สกุล</label></td>
                <td width="70%">'.$row['prename'].' '. $row['fullname'].'</td>
              </tr>';
     $output.='<tr>
                <td width="30%"><label>ที่อยู่</label></td>
                <td width="70%">' . $row['address'] . '</td>
              </tr>';
     $output.='<tr>
                <td width="30%"><label>เบอร์ติดต่อ</label></td>
                <td width="70%">' . $row['telnumber'] . '</td>
            </tr>';
     $output.='<tr>
                <td width="30%"><label>น้ำหนัก</label></td>
                <td width="70%">' . $row['weight'] . '</td>
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
                <td width="50%"><label>ชนิดยาขับปัสสาวะที่รับประทาน</label></td>
                <td width="50%">' . $row['drugname'] . '</td>
      </tr>';
     $output.='<tr>
                <td width="30%"><label>จำนวนยา</label></td>
                <td width="70%">' . $row['drug'] .' '.'เม็ด' .'</td>
      </tr>';
     $output.='<tr>
                <td width="30%"><label>Doctor Note</label></td>
                <td width="70%">' . $row['docnote'] . '</td>
      </tr>';
      $output.='<tr>
                <td width="30%"><label>วันที่สมัครสมาชิก</label></td>
                <td width="70%">' . $d . '/' . $m . '/' . $y  . '</td>
        </tr>';
        $output.='<tr>
                <td width="30%"><label>เวลาที่สสมัครสมาชิก</label></td>
                <td width="70%">' . $time1  . 'น.' .'</td>
        </tr>';
     $output.='</table>';
}
echo $output;



?>
