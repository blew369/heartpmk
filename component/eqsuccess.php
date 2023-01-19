<div class="card-header text-center text-white bg-melon">
    สรุปผลการกรอกแบบฟอร์ม
</div>
<img src="cardimg/success.png" class="card-img-top" alt="...">
<div class="card-body">
    <p style="font-size:14px;">คุณ <?php echo $data['patientname'] ?> <?php echo $data['patientlname'] ?> </p>
    <p style="font-size:14px;">น้ำหนักวันนี้ : <?php echo $weightreq ?> กิโลกรัม </p>
    <p style="font-size:14px;">อาการบวมวันนี้ : <?php echo $data['swellname'] ?></p>
    <p style="font-size:14px;">ระดับอาการเหนื่อยวันนี้ : </p>
    <p style="font-size:14px;"><?php echo $data['tiredname'] ?> </p>
    <p style="font-size:14px;">จำนวนยาขับปัสสาวะ <?php echo $drugtype; ?></p>
    <p style="font-size:14px;">ที่รับประทานล่าสุด : <?php echo $drugreq; ?> เม็ด</p>
    <div class="alert alert-success" role="alert">
        <p style="font-size:14px;">คุณมีน้ำหนักเปลี่ยนแปลงเท่ากับ : <?php echo abs($weightresult); ?> กิโลกรัม </p>
        <p style="font-size:14px;">ปฏิบัติตามคำแนะนำและรับประทานยาขับปัสสาวะเท่าเดิม</p>
        <p style="font-size:14px;">จำนวน <?php echo $drugtype; ?> ที่ควรรับประทานวันนี้ : <?php echo ($drugsum); ?> เม็ด </p>
    </div>
</div>