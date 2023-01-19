<?php
include_once('../coonfig/function.php');

$fetch = new DB_con();
// Get post value

if(isset($_POST["memberid"])){
$result = mysqli_query($fetch->dbcon,"SELECT members.memberid, members.hn, members.prename, CONCAT_WS(' ',members.patientname, members.patientlname) AS fullname, 
            members.patientname, members.patientlname, swellsymp.swellname, tiredsymp.tiredname, members.address, members.telnumber,
            members.weight, members.swellid, members.tiredid, members.drug, tiredsymp.tiredname, tiredsymp.tiredtype 
        FROM members
        INNER JOIN swellsymp ON members.swellid = swellsymp.swellid
        INNER JOIN tiredsymp ON members.tiredid = tiredsymp.tiredid
        WHERE members.memberid ='".$_POST["memberid"]."'");      
$row = mysqli_fetch_array($result);
echo json_encode($row);
}

?>