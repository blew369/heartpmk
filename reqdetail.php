<?php
session_start();
include_once('class/pagination.php');
$postsPagi = new Pagination();
if ($_SESSION['username'] == "") {
    header("location: signin?login=1");
} else {
    $hn = $_SESSION['hn'];
    $sql = $postsPagi->getRequest($hn);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ข้อมูลผู้ใช้งาน</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/fonts/font.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand"><img src="assets/brand/heart01.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Heartpmk</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarColor02">
                    <ul class="navbar-nav align-items-end">
                        <li class="nav-item">
                            <a class="nav-link" href="home">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form">ทำแบบฟอร์ม</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact">ติดต่อ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i> คุณ <?php echo $_SESSION['fullname']; ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="account">Account</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-3 col-lg-8 col-md-6 col-xs-auto">
            <div class="card">
                <div class="card-header text-center text-white bg-melon">
                    ประวัติการทำรายการ
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <?php
                            while ($row = $sql->fetch_assoc()) {
                                $date = $row['reqdate'];
                                $date1 = substr($date, 0, 10);
                                list($y, $m, $d) = explode('-', $date1);
                                $time = $row['reqdatetime'];
                                $time1 = substr($time, 11, 8);
                            ?>
                                <tr>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap">วันที่ทำรายการ</td>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap"><?php echo $d . '/' . $m . '/' . $y; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap">เวลาที่ทำรายการ</td>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap"><?php echo $time1; ?>&nbsp;น.</td>
                                </tr>
                                <tr>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap">อาการบวม</td>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap"><?php echo $row['swellname']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap">อาการเหนื่อย</td>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap "><?php echo $row['tiredtype']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap">ชนิดยาขับปัสสาวะที่รับประทาน</td>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap"><?php echo $row['drugname']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap">จำนวนยาขับปัสสาวะที่ต้องรับประทาน</td>
                                    <td style="font-size:13px;" width="30%" class="text-nowrap"><?php echo $row['drugsum']; ?>&nbsp;เม็ด</td>
                                </tr>
                                <tr>
                                    <td width="30%" class="text-nowrap bg-dark"></td>
                                    <td width="30%" class="text-nowrap bg-dark"></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <hr>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="?page=1">First</a>
                            </li>
                            <li class="page-item <?= $postsPagi->pages > 1 ? '' : 'disabled' ?>">
                                <a class="page-link" href="?page=<?php echo $postsPagi->pages - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($val = 1; $val < $postsPagi->totalPages + 1; $val++) : ?>
                                <?php if ($postsPagi->pages <= 2) : ?>
                                    <?php if ($val <= 5) : ?>
                                        <li class="page-item <?= $postsPagi->pages == $val ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?php echo $val; ?>"><?php echo $val; ?></a>
                                        </li>
                                    <?php endif; ?>

                                <?php elseif ($postsPagi->pages > 2) : ?>
                                    <?php if ($val <= $postsPagi->pages + 2 && $val >= $postsPagi->pages - 2) : ?>
                                        <li class="page-item <?= $postsPagi->pages == $val ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?php echo $val; ?>"><?php echo $val; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <li class="page-item <?= $postsPagi->pages < $postsPagi->totalPages ? '' : 'disabled' ?>">
                                <a class="page-link" href="?page=<?php echo $postsPagi->pages + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $postsPagi->totalPages ?>">Last</a>
                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="card-footer text-muted text-center">
                    <p style="font-size:14px;"></p>
                </div>
            </div>
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-12 mb-0 text-muted">© Heartpmk, แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฏเกล้า</p>
            </footer>
        </div>
        <script src="assets/jquery/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
    </body>

    </html>
    <script>
        $(document).ready(function() {

            $('#checkdrugid').change(function() {
                if (($(this).val() == 1) || ($(this).val() == 2) || ($(this).val() == 3)) {
                    $('#checkdrug').prop("disabled", false);
                } else {
                    $('#checkdrug').prop("disabled", true);
                }
            });

        });
    </script>
<?php
}
?>