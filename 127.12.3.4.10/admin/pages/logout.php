<?php
session_start();
unset($_SESSSION['adid']); // clear session
unset($_SESSION['reqname']);
unset($_SESSION['usereq']);
session_destroy();
header("location: signin");

?>