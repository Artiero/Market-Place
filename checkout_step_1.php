<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['role'] != 'user') {
    header('Location: login.php');
} elseif (isset($_SESSION['username']) && $_SESSION['role'] != 'user') {
    header('Location: login.php');
}

require 'function/global.php';
$kode_transaksi = $_GET['kode_transaksi'];
// var_dump($kode_transaksi);
$cekNama = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE kode_transaksi='$kode_transaksi'");
$resultNama = mysqli_fetch_assoc($cekNama);

$seller = query_data("SELECT tbl_seller.jenis_bank,
tbl_seller.nomor_rekening
FROM tbl_seller INNER JOIN tbl_transaksi 
ON tbl_seller.username = tbl_transaksi.username_seller WHERE tbl_transaksi.kode_transaksi = '$kode_transaksi' ");
// var_dump($seller);
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
    <title>Step 1</title>
</head>
<body class="container">
    <main class="step-1">
        <section class="step-bar d-flex">
            <div class="row mx-auto">
                <div>
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/uncheck.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/uncheck.png" class="img-check" alt="">                    
                </div>
            </div>
        </section>
        <section class="row justify-content-center">
            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 ">
                <div class="card-product" data-aos="zoom-in-up" data-aos-duration="1000">
                    <h1 class="title-transaksi"><?= $resultNama['kode_transaksi'] ?></h1>
                    <div class="row">
                        <div class="col">
                            <div>
                                <h2 class="title-product"><?= $resultNama['produk'] ?></h2>
                            </div>
                            <div>
                                <h3 class="quantity-product"><?= $resultNama['jumlah_produk'] ?></h3>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            <h2 class="sub-total"><?= rupiah($resultNama['sub_harga']) ?></h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h3 class="title-kode-unik">Kode Unik</h3>
                        </div>
                        <div class="col">
                            <h4 class="kode-unik"><?= $resultNama['kode_unik'] ?></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row total-bayar-row">
                        <div class="col">
                            <div>
                                <h1 class="title-total">Total Bayar</h1>
                            </div>
                            <div>
                                <h6 class="note-ongkir">Ongkir bayar ditempat</h6>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            <h5 class="total-price"><?= rupiah($resultNama['total_harga']) ?></h5>
                        </div>
                    </div>
                    <div class="rekening d-flex">
                        <div class="mt-2">
                            <img src="asset/img/icon_bank.png" width="40px" alt="">
                        </div>
                        <div class="desk-rekening">
                            <h6 class="nama-penjual"><?= $resultNama['nama_seller'] ?></h6>
                            <p class="rek-penjual"><?= $seller[0]['jenis_bank'] ?> - <?= $seller[0]['nomor_rekening'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="btn-cancel-step-1 text-center" data-aos="zoom-in-up" data-aos-duration="1000">
                            <a href="produk.php">Cancel</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="btn-paid-step-1 text-center" data-aos="zoom-in-up" data-aos-duration="1000">
                            <a href="checkout_step_2.php?kode_transaksi=<?= $kode_transaksi?>">Paid</a>
                        </div>
                    </div>
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