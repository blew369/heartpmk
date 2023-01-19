<?php
class Pagination{
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $dbname = "drthon";
    public $dbcon;
    public $totalPages;
    public $pages;
    

    public function __construct(){
        try {
            $this->dbcon = new mysqli($this->servername, $this->username, $this->password, $this->dbname);	
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
   
    public function createPagination(){
        $rpp =6;

        if(isset($_GET['page'])){
            $page = $_GET['page'];

        }else{
            $page = 0;
        }

        if($page > 1){
            $start = ($page * $rpp) - $rpp;

        }else{
            $start = 0;
        }

        $resultSet = $this->dbcon->query("SELECT id FROM post");
        $numRows = $resultSet->num_rows;
        $this->totalPages = ceil($numRows / $rpp);
        $this->pages = ceil($page);
        $resultSet = $this->dbcon->query("SELECT * FROM post LIMIT $start, $rpp ");
        return $resultSet;

    }

    public function getRequest($hn){

        $rpp =3;

        if(isset($_GET['page'])){
            $page = $_GET['page'];

        }else{
            $page = 1;
        }

        if($page > 1){
            $start = ($page * $rpp) - $rpp;

        }else{
            $start = 0;
        }

       $result=$this->dbcon->query("SELECT reid FROM heartrequest WHERE heartrequest.hn = '$hn'");
       $numrows = $result->num_rows;
       $this->pages = ceil($page);
       $this->totalPages  = ceil($numrows /$rpp);
       $result = $this->dbcon->query("SELECT heartrequest.hn, members.prename, CONCAT_WS(' ',members.patientname, members.patientlname) AS fullname, swellsymp.swellname, tiredsymp.tiredname,
                                        members.weight, members.swellid, members.tiredid, heartrequest.drug, heartrequest.reid, CONCAT_WS('', heartrequest.weight) As weightreq,
                                        CONCAT_WS('', heartrequest.swellid) As swellidreq,  CONCAT_WS('', heartrequest.tiredid) As tiredidreq, heartrequest.other, drugtype.drugname, heartrequest.drugsum,
                                        heartrequest.reqdate, heartrequest.reqdatetime, tiredsymp.tiredtype
                                    FROM heartrequest
                                    INNER JOIN swellsymp ON heartrequest.swellid = swellsymp.swellid
                                    INNER JOIN tiredsymp ON heartrequest.tiredid = tiredsymp.tiredid
                                    INNER JOIN members ON heartrequest.hn = members.hn
                                    INNER JOIN drugtype ON heartrequest.drugid = drugtype.drugid
                                    WHERE heartrequest.hn = '$hn' AND heartrequest.status = 1
                                    ORDER BY  heartrequest.reid DESC
                                    LIMIT $start, $rpp");
        return $result;
    }

   
}

?>