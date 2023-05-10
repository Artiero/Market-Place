<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['role'] != 'user') {
    header('Location: login.php');
} elseif (isset($_SESSION['username']) && $_SESSION['role'] != 'user') {
    header('Location: login.php');
}

$kode_transaksi = $_GET['kode_transaksi'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require 'views/link.php';
    ?>
    <title>Step 3</title>
</head>
<body class="container">
    <main class="step-3">
        <section class="step-bar d-flex">
            <div class="row mx-auto">
                <div>
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/check.png" class="img-check" alt="">                    
                </div>
            </div>
        </section>
        <section class="row justify-content-center">
            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 " data-aos="zoom-in-up" data-aos-duration="2000">
                <section class="text-center">
                    <h1>Yay!! Completed</h1>
                    <img src="asset/img/success.png" class="w-75 img-success" alt="">
                    <p>Your order will be processed immediately</p>
                </section>
                <div class="btn-finish-step-3 text-center">
                    <a href="index.php">Beranda</a>
                </div>
            </div>
        </section>
    </main>
    <?php
    require 'views/script.php';
    ?>
    <script>
        AOS.init();
    </script>
</body>
</html>