<?php
class DB_con{
    private $servername = "localhost";
    private $username   = "heartpmk_01";
    private $password   = "Iris@4569";
    private $dbname = "heartpmk_01";
    public $dbcon;

    public function __construct(){
        try {
            $this->dbcon = new mysqli($this->servername, $this->username, $this->password, $this->dbname);	
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    //เข้าสู่ระบบ
    public function signin($username, $password){
        $stmt = $this->dbcon->prepare("SELECT userreq.adid, userreq.role, userreq.username, CONCAT_WS(' ',userreq.name,userreq.lname) AS reqname FROM userreq WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //ดูรายการRequest แยกตาม-วันที่
    public function RequestFilter($datefirst,$datelast){
        $stmt = $this->dbcon->prepare("SELECT heartrequest.reid,  heartrequest.hn, members.prename, 
                                    CONCAT_WS(' ', members.patientname, members.patientlname) As fullname , members.telnumber, 
                                    swellsymp.swellname, tiredsymp.tiredname, heartrequest.drug, heartrequest.weightbf,
                                    CONCAT_WS('', heartrequest.weight) As weightreq,CONCAT_WS('', heartrequest.swellid) As swellidreq,  
                                    CONCAT_WS('', heartrequest.tiredid) As tiredidreq, heartrequest.other , heartrequest.reqdate, 
                                    heartrequest.drugsum, heartrequest.weightsum, heartrequest.reqdatetime
                                    FROM heartrequest
                                    INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
                                    INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
                                    INNER JOIN members ON heartrequest.hn = members.hn
                                    WHERE heartrequest.reqdate BETWEEN ? AND ? ORDER BY heartrequest.reid ASC");
        $stmt->bind_param("ss", $datefirst, $datelast);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //Export Excel
    public function ExportData($datefirst,$datelast){
        $stmt = $this->dbcon->prepare("SELECT heartrequest.reid,  heartrequest.hn, members.prename, 
                                            CONCAT_WS(' ', members.patientname, members.patientlname) As fullname , 
                                            swellsymp.swellname, tiredsymp.tiredname, heartrequest.drug, heartrequest.weightbf,
                                            CONCAT_WS('', heartrequest.weight) As weightreq,CONCAT_WS('', heartrequest.swellid) As swellidreq,  
                                            CONCAT_WS('', heartrequest.tiredid) As tiredidreq, heartrequest.other , heartrequest.reqdate, members.telnumber,
                                            heartrequest.drugsum, heartrequest.weightsum, heartrequest.reqdatetime
                                    FROM heartrequest
                                    INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
                                    INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
                                    INNER JOIN members ON heartrequest.hn = members.hn
                                    WHERE heartrequest.reqdate BETWEEN ? AND ? ORDER BY heartrequest.reid ASC");
        $stmt->bind_param("ss", $datefirst, $datelast);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    //check USER
    public function usernameavailable($username) { 
        $stmt = $this->dbcon->prepare("SELECT username FROM members WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $checkusername= $stmt->get_result();
        return $checkusername;
    }
    //check HN
    public function checkhnavailable($hn){
        $stmt = $this->dbcon->prepare("SELECT hn FROM members WHERE hn =?");
        $stmt->bind_param("s", $hn);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
       
    }
    // admin regis
    public function adminRegister($username, $password, $name, $lname ,$role){
        $check_user = $this->dbcon->query("SELECT * FROM userreq WHERE username = '$username'");
        if($check_user->num_rows > 0){
            echo "<script>alert('Username ของท่านถูกใช้ไปแล้ว')</script>";
        }else{
            $result = $this->dbcon->prepare("INSERT INTO userreq(username, password, name, lname, role) VALUES(?, ?, ?, ?, ?)");
            $result->bind_param("sssss", $username, $password, $name, $lname, $role);
            $result->execute();
            return $result;
        }
    }
    //Update admin
    public function adminUpdate($username, $password, $name, $lname, $role, $adid){
        $update = $this->dbcon->prepare("UPDATE userreq SET username = ?, password = ?, name = ?, lname= ?, role = ? WHERE adid =?");
        $update->bind_param("ssssss", $username, $password, $name, $lname, $role, $adid);
        $update->execute();
        return $update;

    }
    //Fetch รายละเอียด Admin
    public function adminUpdateFetch($adid){
        $query = "SELECT * FROM userreq WHERE adid ='$adid'";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //ลบ ข้อมูล Admin
    public function adminDelete($adid){
        $stmt = $this->dbcon->prepare("DELETE FROM userreq WHERE adid =?");
        $stmt->bind_param("s", $adid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //ตารางแสดงรายการAdmin
    public function FetchallAdmin(){
        $query = "SELECT  CONCAT_WS(' ', name,lname) As fullname, adid FROM userreq WHERE status =1";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //เพิ่มสมาชิก User
    public function registration($username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote) {
        $check_username = $this->dbcon->query("SELECT * FROM members WHERE username  = '$username'");
        $check_hn =  $this->dbcon->query("SELECT * FROM members WHERE hn = '$hn'");
        if($check_username ->num_rows >0){
            echo "<script>alert('Username ของท่านถูกใช้ไปแล้ว')</script>";

        }else if ($check_hn->num_rows >0){
            echo "<script>alert('HN ของท่านถูกใช้ไปแล้ว')</script>";
        } else{
            $result = $this->dbcon->prepare("INSERT INTO members(username, password, hn, prename, patientname, patientlname, address, telnumber, weight, swellid, tiredid, drugid, drug, docnote) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
            $result->bind_param("ssssssssssssss", $username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote);
            $result->execute();
            return $result;
        }
    }
    //Update user
    public function updatemembers($username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote, $memberid){
        $update = $this->dbcon->prepare("UPDATE members SET username =?, password=?, hn=?, prename=?, patientname=?, patientlname=?, address=?, telnumber=?, weight=?, swellid=?, tiredid=?, drugid=?, drug=?, docnote=? WHERE memberid=?");
        $update->bind_param("sssssssssssssss", $username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote, $memberid);
        $update->execute();
        return $update;

    }
    //ลบข้อมูล User
    public function deletemembers($memberid){
        $result = mysqli_query($this->dbcon, "DELETE FROM members WHERE memberid = '$memberid'");
        return $result;

    }
    //ลบรายการที่ Requuuuest
    public function DeleteRequest($reid){
        $stmt = $this->dbcon->prepare("DELETE FROM heartrequest WHERE reid = ?");
        $stmt->bind_param("s", $reid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
   //จำนวนสมาชิกทั้งหมด
   public function countmembers(){
    $query = "SELECT * FROM members ORDER BY memberid ASC";
    $result = $this->dbcon->query($query);
    return $result;

}

//จำนวนที่Requestมาทั้งหมด
public function countpatientrequest(){
    $query = "SELECT * FROM heartrequest ORDER BY reid ASC";
    $result = $this->dbcon->query($query);
    return $result;
}
//จำนวนผู้ป่วยที่มีภาวะเสี่ยง
public function countReqToday(){
   $query = "SELECT * FROM heartrequest WHERE reqdate = CURDATE() ORDER BY reid ASC";
   $result = $this->dbcon->query($query);
   return $result;
}
// แสดงผู้ป่วยที่มีภาวะเสี่ยง
public function Reqtoday(){
    $query = "SELECT members.hn, members.prename, members.patientname, members.patientlname, swellsymp.swellname, tiredsymp.tiredname, members.address, members.telnumber,
            members.weight, members.swellid, members.tiredid, heartrequest.drug, heartrequest.reid, CONCAT_WS('', heartrequest.weight) As weightreq,
            CONCAT_WS('', heartrequest.swellid) As swellidreq,  CONCAT_WS('', heartrequest.tiredid) As tiredidreq, tiredsymp.tiredname, tiredsymp.tiredtype,
            heartrequest.reqdate, heartrequest.reqdatetime
            FROM heartrequest
            INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
            INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
            INNER JOIN members ON heartrequest.hn = members.hn
            WHERE heartrequest.reqdate = CURDATE()
            ORDER BY heartrequest.reid ASC";
    $result = $this->dbcon->query($query);
    return $result;
}
//แสดงรายการUser ทั้งหมด
public function fetchallmembers(){
    $query = "SELECT members.memberid, members.hn, members.prename, CONCAT_WS(' ',members.patientname, members.patientlname) AS fullname, 
                    members.patientname, members.patientlname, swellsymp.swellname, tiredsymp.tiredname, members.address, members.telnumber,
                    members.weight, members.swellid, members.tiredid, members.drug, tiredsymp.tiredname, tiredsymp.tiredtype, drugtype.drugname 
            FROM members
            INNER JOIN swellsymp ON members.swellid = swellsymp.swellid
            INNER JOIN tiredsymp ON members.tiredid = tiredsymp.tiredid
            INNER JOIN drugtype ON members.drugid = drugtype.drugid
            WHERE members.status = 1 ORDER BY members.memberid ASC";
    $result = $this->dbcon->query($query);
    return $result;
}
//แสดงรายละเอียดUser-Update
public function fetchupdatemember($memberid){
   $query = "SELECT members.username, members.password, members.memberid, members.hn, members.prename, CONCAT_WS(' ',members.patientname, members.patientlname) AS fullname, 
            members.patientname, members.patientlname, swellsymp.swellname, tiredsymp.tiredname, members.address, members.telnumber, members.docnote,
            members.weight, members.swellid, members.tiredid, members.drug, tiredsymp.tiredname, tiredsymp.tiredtype , drugtype.drugid
            FROM members
            INNER JOIN swellsymp ON members.swellid = swellsymp.swellid
            INNER JOIN tiredsymp ON members.tiredid = tiredsymp.tiredid
            INNER JOIN drugtype ON members.drugid = drugtype.drugid
            WHERE memberid = $memberid";
            $result = $this->dbcon->query($query);
    return $result;
}
//แสดงรายการคำนำหน้าชื่อ
public function fetchdataprename(){
    $query = "SELECT * FROM prename WHERE status = 1";
    $result = $this->dbcon->query($query);
    return $result;
}
//แสดงรายการอาการบวม
public function fetchdataswell(){
    $query = "SELECT * FROM swellsymp WHERE status = 1";
    $result = $this->dbcon->query($query);
    return $result;
}
//แสดงรายการอาการเหนื่อย
public function fetchtired(){
    $query = "SELECT * FROM tiredsymp WHERE status=1";
    $result = $this->dbcon->query($query);
    return $result;
}
//แสดงรายการชนิดยา
public function fetchdrugtype(){
    $query  = "SELECT * FROM drugtype WHERE status = 1";
    $result = $this->dbcon->query($query);
    return $result;
}
    //แสดงรายการContent
    public function fetchContentImage(){
        $query  = "SELECT * FROM post WHERE status = 1";
        $result = $this->dbcon->query($query);
        return $result;
    }

    //Fetch Request from Patients 
    public function HeartRequestPost($reid){
        $stmt = $this->dbcon->prepare("SELECT heartrequest.reid,  heartrequest.hn, members.prename, CONCAT_WS(' ', members.patientname, members.patientlname) As fullname , swellsymp.swellname, 
        tiredsymp.tiredname,members.weight, heartrequest.drug, CONCAT_WS('', heartrequest.weight) As weightreq, heartrequest.other , heartrequest.reqdate, 
        heartrequest.drugsum, heartrequest.weightsum, heartrequest.reqdatetime, members.telnumber, members.address, heartrequest.reqdate, heartrequest.reqdatetime
        FROM heartrequest
        INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
        INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
        INNER JOIN members ON heartrequest.hn = members.hn
        WHERE heartrequest.reid = ?
        ");
        $stmt->bind_param("s", $reid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }
    //เพิ่มContent
    public function insertContent($post_title, $post_content, $post_image){
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $post_image['name']); 
        $fileActExt = strtolower(end($extension));
        $filenew = rand(). "." . $fileActExt;
        $filePath = '../../../contentimg/'.$filenew;

        if(in_array($fileActExt, $allow)){
            if($post_image['size'] >0 & $post_image['error'] ==0){
                if(move_uploaded_file($post_image['tmp_name'], $filePath)){
                    $query = "INSERT INTO post(post_title, post_content, post_image)  VALUES ('$post_title', '$post_content', '$filenew')";
                    $result  = $this->dbcon->query($query);
                    return $result;

                }
            }
        }

    }
    //Update รายอาการContent
    public function Updatecontent($post_title, $post_content, $post_image, $postid){

        $un = $this->dbcon->query("SELECT post_image FROM post WHERE id='$postid'");
        if ($un->num_rows >0){
            $data = $un->fetch_assoc();
            $imagename = $data['post_image'];
            @unlink('../../../contentimg/'. $imagename);
        }
      
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $post_image['name']); 
        $fileActExt = strtolower(end($extension));
        $filenew = rand(). "." . $fileActExt;
        $filePath = '../../../contentimg/'.$filenew;

        if(in_array($fileActExt, $allow)){
            if($post_image['size'] <5000000 & $post_image['error'] ==0){
                if(move_uploaded_file($post_image['tmp_name'], $filePath)){
                    $query = "UPDATE post SET post_title='$post_title', post_content='$post_content', post_image='$filenew' WHERE id='$postid'";
                    $result  = $this->dbcon->query($query);
                    return $result;

                }
            }
        }

    }
    //แสดงรายการ Content-Update
    public function fetchcontent($postid){
        $query  = "SELECT * FROM post WHERE id = '$postid'";
        $result = $this->dbcon->query($query);
        return $result;

    }
    //แสดงรายการคำถามทั้งหมด
    public function fetchAllquestion(){
        $query = "SELECT tiredquestion.question, tiredsymp.tiredname, tiredquestion.tdid
                  FROM tiredquestion
                  INNER JOIN tiredsymp ON tiredsymp.tiredid = tiredquestion.tiredid
                  WHERE tiredquestion.status = 1 ORDER BY tiredquestion.tiredid ASC";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //แสดงรายการคำถาม-Update
    public function FetchtiredQuestion($tiredid){
        $query  = "SELECT tiredquestion.question, tiredsymp.tiredname, tiredquestion.tdid, tiredquestion.tiredid
                    FROM tiredquestion
                    INNER JOIN tiredsymp ON tiredsymp.tiredid = tiredquestion.tiredid
                    WHERE tiredquestion.tdid = '$tiredid'";
        $result = $this->dbcon->query($query);
        return $result;

    }
    //Update-คำถาม
    public function Updatequestiontired($question, $tiredid, $tdid){

        $updatequestion = $this->dbcon->prepare("UPDATE tiredquestion SET question = ?, tiredid =? WHERE tdid =?");
        $updatequestion->bind_param("sss", $question, $tiredid, $tdid);
        $updatequestion->execute();
        return $updatequestion;

    }
    //Insert-คำถาม
    public function InsertQuestion($question, $tiredid){
        $insertQuestion = $this->dbcon->prepare("INSERT INTO tiredquestion(question, tiredid) VALUES (?,?)");
        $insertQuestion->bind_param("ss", $question, $tiredid);
        $insertQuestion->execute();
        return $insertQuestion;
    }
    //Delete-คำถาม
    public function Deletequestion($tdid){
        $stmt = $this->dbcon->prepare("DELETE FROM tiredquestion WHERE tdid = ?");
        $stmt->bind_param("s", $tdid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //แสดงอาการเหนื่อยทั้งหมด
    public function FetchAlltired(){
        $query  = "SELECT * FROM tiredsymp WHERE status=1";
        $result = $this->dbcon->query($query);
        return $result;

    }
    //Insert-อาการเหนื่อย
    public function InserttiredSymp($triedname, $tiredid){
        $insertQuestion = $this->dbcon->prepare("INSERT INTO tiredsymp(tiredname, tiredid) VALUES (?,?)");
        $insertQuestion->bind_param("ss", $triedname, $tiredid);
        $insertQuestion->execute();
        return $insertQuestion;
    }
    //Update-อาการเหนื่อย
    public function UpdateTiredsymp($triedname, $tiredid, $tireid){

        $updatequestion = $this->dbcon->prepare("UPDATE tiredsymp SET tiredname = ?, tiredid =? WHERE tireid =?");
        $updatequestion->bind_param("sss", $triedname, $tiredid, $tireid);
        $updatequestion->execute();
        return $updatequestion;

    }
    //แสดงรายการเหนื่อย-Update
    public function FetchTiredsymp($tireid){
        $query  = "SELECT * FROM tiredsymp WHERE tireid = '$tireid'";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //Delete-อาการเหนื่อย
    public function Deltetiredsymp($tiredid){
        $stmt = $this->dbcon->prepare("DELETE FROM tiredsymp WHERE tiredid = ?");
        $stmt->bind_param("s", $tiredid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //แสดงอาการบวม
    public function FetchAllSwell(){
        $query = "SELECT * FROM swellsymp WHERE status =1 ORDER BY swid ASC";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //แสดงอาการบวม-Update
    public function FetchSwellsymp($swid){
        $query = "SELECT * FROM swellsymp WHERE swid ='$swid'";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //Update-อาการบวม
    public function Updateswellsymp($swellname, $swellid, $swid){

        $updatequestion = $this->dbcon->prepare("UPDATE swellsymp SET swellname = ?, swellid =? WHERE swid =?");
        $updatequestion->bind_param("sss", $swellname, $swellid, $swid);
        $updatequestion->execute();
        return $updatequestion;

    }
    //Delete-อาการบวม
    public function Delteswellsymp($swid){
        $stmt = $this->dbcon->prepare("DELETE FROM swellsymp WHERE swid = ?");
        $stmt->bind_param("s", $swid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //Insert-อาการบวม
    public function Insertswellsymp($swellname, $swellid){
        $insertQuestion = $this->dbcon->prepare("INSERT INTO swellsymp(swellname, swellid) VALUES (?,?)");
        $insertQuestion->bind_param("ss", $swellname, $swellid);
        $insertQuestion->execute();
        return $insertQuestion;
    }
    //แสดงชนิดยา
    public function Fetchdrugtyep(){
        $query = "SELECT * FROM drugtype WHERE status =1";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //แสดงชนิดยา-Update
    public function FetchmasDrugtype($id){
        $query = "SELECT * FROM drugtype WHERE id ='$id'";
        $result = $this->dbcon->query($query);
        return $result;
    }
    //Update-ชนิดยา
    public function Updatemasdrugtype($drugname,$drugid,$id){
        $updatedrugtype = $this->dbcon->prepare("UPDATE drugtype SET drugid = ?, drugname =? WHERE id =?");
        $updatedrugtype->bind_param("sss", $drugid, $drugname, $id);
        $updatedrugtype->execute();
        return $updatedrugtype;
    }
    //Insert-ชนิดยา
    public function Insertmasdrugtype($drugname,$drugid){
        $insertdrugtype = $this->dbcon->prepare("INSERT INTO drugtype(drugid, drugname) VALUES (?, ?)");
        $insertdrugtype->bind_param("ss", $drugid, $drugname);
        $insertdrugtype->execute();
        return $insertdrugtype;
    }
    //Delete-ชนิดยา
    public function Deletemasdrugtype($id){
        $stmt = $this->dbcon->prepare("DELETE FROM drugtype WHERE id =?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    //Select-hn
    public function selectHN(){
        $query = "SELECT * FROM members WHERE status = 1";
        $resuult = $this->dbcon->query($query);
        return $resuult;
    }

     //ดูรายการRequest แยกตาม-วันที่-HN-ผู้ป่วย
     public function RequestFilterbyHn($hn,$datefirst,$datelast){
        $stmt = $this->dbcon->prepare("SELECT heartrequest.reid,  heartrequest.hn, members.prename, 
                                    CONCAT_WS(' ', members.patientname, members.patientlname) As fullname , members.telnumber, 
                                    swellsymp.swellname, tiredsymp.tiredname, heartrequest.drug, heartrequest.weightbf,
                                    CONCAT_WS('', heartrequest.weight) As weightreq,CONCAT_WS('', heartrequest.swellid) As swellidreq,  
                                    CONCAT_WS('', heartrequest.tiredid) As tiredidreq, heartrequest.other , heartrequest.reqdate, 
                                    heartrequest.drugsum, heartrequest.weightsum, heartrequest.reqdatetime
                                    FROM heartrequest
                                    INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
                                    INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
                                    INNER JOIN members ON heartrequest.hn = members.hn
                                    WHERE heartrequest.hn LIKE ? AND heartrequest.reqdate BETWEEN ? AND ? ORDER BY heartrequest.reid ASC");
        $stmt->bind_param("sss",  $hn, $datefirst, $datelast);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function ReqAll(){
        $query = "SELECT heartrequest.reid,  heartrequest.hn, members.prename, CONCAT_WS(' ', members.patientname, members.patientlname) As fullname , swellsymp.swellname, tiredsymp.tiredname,
        members.weight, heartrequest.drug, CONCAT_WS('', heartrequest.weight) As weightreq,CONCAT_WS('', heartrequest.swellid) As swellidreq,  CONCAT_WS('', heartrequest.tiredid) As tiredidreq, 
        heartrequest.other , heartrequest.reqdate, heartrequest.drugsum, heartrequest.weightsum, heartrequest.reqdatetime
        FROM heartrequest
        INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
        INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
        INNER JOIN members ON heartrequest.hn = members.hn
        WHERE heartrequest.status = 1 ORDER BY heartrequest.reqdatetime ASC";
        $result = $this->dbcon->query($query);
        return $result;
    }
  
}

?>