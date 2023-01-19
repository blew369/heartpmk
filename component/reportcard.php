<img src="cardimg/report.png" class="card-img-top" alt="...">
<div class="card-body">
    <p>คุณ <?php echo $data['patientname']; ?> <?php echo $data['patientlname']; ?>
    <p>น้ำหนักวันนี้ : <?php echo $weightreq ?> กิโลกรัม &nbsp&nbsp </p>
    <p>น้ำหนักแห้ง : <?php echo $data['weight']; ?> กิโลกรัม</p>
    <p>จำนวนยาขับปัสสาวะ <?php echo $drugtype; ?></p>
    <p>ที่รับประทานล่าสุด : <?php echo $drugreq; ?> เม็ด</p>
    <p>อาการบวมวันนี้ : <?php echo $data['swellname']; ?></p>
    <p>ระดับอาการเหนื่อยวันนี้ : </p>
    <p><?php echo $data['tiredname']; ?></p>
    <p>อาการผิดปกติอื่นๆ : <?php echo $other; ?> </p>
</div>
<div align="center">
    <button type="submit" id="insert" class="btn btn-lg btn-primary mt-2 mb-3 mr-3 ml-3">ยืนยัน <i class="far fa-save"></i></button>
</div>