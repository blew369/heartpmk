<?php
session_start();
if ($_SESSION['username'] == "") {
    header("location: signin?login=1");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>home</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/fonts/font.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    </head>

    <body class="bg-light">
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
                            <a class="nav-link active" href="home">หน้าแรก</a>
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

        <div class="py-2">
            <div class="container col-lg-12 col-md-12 col-xs-auto">
                <div class="row">
                    <h3 class="mt-3 text-center">ยินดีต้อนรับ, คุณ <?php echo $_SESSION['fullname']; ?></h3>
                    <div class="card-body text-center mt-2">
                        <a href="form" class="btn btn-success btn-lg">ทำแบบฟอร์ม <i class="far fa-file-alt"></i></a>
                    </div>
                    <h3 class="mt-4 mb-3 text-center"><u>คำแนะนำผู้ป่วยที่มีภาวะหัวใจล้มเหลว</u></h3>
                    <hr>
                    <?php
                    include_once('class/pagination.php');
                    $postsPagi = new Pagination();

                    $result = $postsPagi->createPagination();
                    while ($row = $result->fetch_assoc()) {
                        $postcontent = $row['post_content'];
                        $posttitle = $row['post_title'];
                    ?>
                        <div class="col-md-4 col-mb-3">
                            <div class="card mt-4">
                                <img style="object-fit: cover;" height="300px" src="contentimg/<?php echo $row['post_image']; ?>">
                                <div class="card-body">
                                    <?php
                                    if (strlen($posttitle) > 20) {
                                        $posttitle = mb_substr($posttitle, 0, 20) . "..."

                                    ?>
                                        <h5><?php echo $posttitle; ?></h5>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (strlen($postcontent) > 20) {
                                        $postcontent = mb_substr($postcontent, 0, 20) . "......"

                                    ?>
                                        <p class="card-text"><?php echo $postcontent; ?></p>
                                    <?php
                                    }
                                    ?>
                                    <div align="right">
                                        <a href="read?id=<?php echo $row['id']; ?>" class="btn btn-md btn-primary">อ่านต่อ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm justify-content-center mt-3">
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
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-3 border-top mt-3">
                    <p class="col-md-12 mb-0 text-muted">&nbsp&nbsp&nbsp&nbsp© Heartpmk, แผนกอายุรกรรมโรคหัวใจ โรงพยาบาลพระมงกุฎเกล้า</p>
                </footer>
            </div>
        </div>

        <script src="assets/jquery/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
    </body>

    </html>


<?php

}
?>