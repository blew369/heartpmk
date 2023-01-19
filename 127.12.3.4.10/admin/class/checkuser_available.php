<?php
include_once('../config/function.php');

$usernamecheck = new DB_con();
// Get post value

$username = $_POST['username'];

$sql= $usernamecheck->usernameavailable($username);

$numrows = mysqli_num_rows($sql);

if($numrows > 0){
    echo "<span style='color: red;'>ชื่อผู้ใช้นี้ นี้ถูกเชื่อมโยงกับบัญชีอื่นแล้ว.</span>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
} else {
    echo "<span style='color: green;'>ชื่อผู้ใช้นี้ สามารถใช้ลงทะเบียนได้.</span>";
    echo "<script>$('#submit').prop('disabled', false);</script>";
    }

?>