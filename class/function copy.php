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
    // checkUser
    public function usernameavailable($username) {
        $stmt = $this->dbcon->prepare("SELECT username FROM members WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    //check HN
    public function checkhnavailable($hn){
        $stmt = $this->dbcon->prepare("SELECT hn FROM members WHERE hn =?");
        $stmt->bind_param("s", $hn);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
       
    }
    //Register
    public function registration($username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote) {
        $check_username = $this->dbcon->query("SELECT * FROM members WHERE username  = '$username'");
        $check_hn =  $this->dbcon->query("SELECT * FROM members WHERE hn = '$hn'");
        if($check_username ->num_rows >0){
            echo "<script>alert('Username ของท่านถูกใช้ไปแล้ว')</script>";

        }else if ($check_hn->num_rows >0){
            echo "<script>alert('HN ของท่านถูกใช้ไปแล้ว')</script>";
        } else{
            $result = $this->dbcon->prepare("INSERT INTO members(username, password, hn, prename, patientname, patientlname, address, telnumber, weight, swellid, tiredid, drugid, drug, docnote) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $result->bind_param("ssssssssssssss", $username, $password, $hn, $prename, $patientname, $patientlname, $address, $telnumber, $weight, $swellid, $tiredid, $drugid, $drug, $docnote);
            $result->execute();
            return $result;
        }
    }
    //Signin
    public function signin($username, $password){
        $stmt = $this->dbcon->prepare("SELECT weight, username, memberid, hn, CONCAT_WS(' ',members.patientname,members.patientlname) AS fullname FROM members WHERE username = ?   AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public function fetchdataprename(){
        $query  = "SELECT * FROM prename WHERE status = 1";
        $result = $this->dbcon->query($query);
        return $result;
    }

    public function fetchdataswell(){
        $query  = "SELECT * FROM swellsymp WHERE status = 1";
        $result = $this->dbcon->query($query);
        return $result;
    }

    public function fetchdrugtype(){
        $query  = "SELECT * FROM drugtype WHERE status = 1";
        $result = $this->dbcon->query($query);
        return $result;
    }

    public function fetchtired(){
        $query  = "SELECT * FROM tiredsymp WHERE status=1 ORDER BY tireid DESC";
        $result = $this->dbcon->query($query);
        return $result;
    }

    public function fetchtiredquestion(){
        $query  = "SELECT * FROM tiredquestion WHERE status=1 ORDER BY tiredid DESC";
        $result = $this->dbcon->query($query);
        return $result;
    }
    public function InsertPatientForm($hn, $weightbf, $weight, $swellid, $tiredid, $drugid, $drug, $other){

        $result = $this->dbcon->prepare("INSERT INTO heartrequest(hn, weightbf, weight, swellid, tiredid, drugid, drug, other) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $result->bind_param("ssssssss", $hn, $weightbf, $weight, $swellid, $tiredid, $drugid, $drug, $other);
        $result->execute();
        $lastid = $this->dbcon->insert_id;
        $_SESSION['lastid'] = $lastid;
        if($result){
            echo header("location:reportpatient?reqpat=$lastid");
        }else{
            echo"<script>alert('เกิดข้อผิดพลาดบางอย่าง')</script>";
            echo"<script>window.location.href='form'</script>";
        }
        return $result;
 
        
    }

    public function UpdateReuest($weight, $weight2, $swellid, $tiredid,  $drug,  $drug2, $other1, $reid){
        $update = $this->dbcon->prepare("UPDATE heartrequest SET weight=?, weightsum=?, swellid=?, tiredid=?, drug=?, drugsum=?, other=? WHERE reid=?");
        $update->bind_param("ssssssss",$weight, $weight2, $swellid, $tiredid,  $drug,  $drug2, $other1, $reid);
        $update->execute();
        return $update;
    }

    public function GetReqquest($lastid){
        $stmt = $this->dbcon->prepare("SELECT heartrequest.hn, members.prename, members.patientname, members.patientlname, swellsymp.swellname, tiredsymp.tiredname,
                                            members.weight, members.swellid, members.tiredid, heartrequest.drug, heartrequest.reid, CONCAT_WS('', heartrequest.weight) As weightreq,
                                            CONCAT_WS('', heartrequest.swellid) As swellidreq,  CONCAT_WS('', heartrequest.tiredid) As tiredidreq, heartrequest.other, drugtype.drugname
                                        FROM heartrequest
                                        INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
                                        INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
                                        INNER JOIN members ON heartrequest.hn = members.hn
                                        INNER JOIN drugtype ON heartrequest.drugid = drugtype.drugid
                                        WHERE heartrequest.reid= ? AND heartrequest.status=1 limit 1");
        $stmt->bind_param("s", $lastid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }

    public function GetSumUp($reqid){
        $stmt = $this->dbcon->prepare("SELECT heartrequest.hn, members.prename, members.patientname, members.patientlname, swellsymp.swellname, tiredsymp.tiredname,
                                            members.weight, members.swellid, members.tiredid, heartrequest.drug, heartrequest.reid, CONCAT_WS('', heartrequest.weight) As weightreq,
                                            CONCAT_WS('', heartrequest.swellid) As swellidreq,  CONCAT_WS('', heartrequest.tiredid) As tiredidreq, heartrequest.other, drugtype.drugname, heartrequest.drugsum
                                        FROM heartrequest
                                        INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
                                        INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
                                        INNER JOIN members ON heartrequest.hn = members.hn
                                        INNER JOIN drugtype ON heartrequest.drugid = drugtype.drugid
                                        WHERE heartrequest.reid= ? AND heartrequest.status=1 limit 1");
        $stmt->bind_param("s", $reqid);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }
    public function displayData(){
        $query  = "SELECT * FROM post WHERE status = 1";
        $result = $this->dbcon->query($query);
        return $result;
    }

    //ดึงข้อมูล single

    public function getSingle($sql){
        $query = $this->dbcon->query($sql);
        $row = $query->fetch_assoc();

        return $row;

    }
   
}

?>