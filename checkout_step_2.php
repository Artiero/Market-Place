<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['role'] != 'user') {
    header('Location: login.php');
} elseif (isset($_SESSION['username']) && $_SESSION['role'] != 'user') {
    header('Location: login.php');
}


require 'function/function_transaksi.php';
$kode_transaksi = $_GET['kode_transaksi'];
$edits = query_data("SELECT * FROM tbl_transaksi WHERE kode_transaksi");
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
    <title>Step 2</title>
</head>

<body class="container">
    <main class="step-2">
        <section class="step-bar d-flex">
            <div class="row mx-auto">
                <div>
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/check.png" class="img-check" alt="">
                    <img src="asset/img/line.png" class="img-line" alt="">
                    <img src="asset/img/uncheck.png" class="img-check" alt="">
                </div>
            </div>
        </section>
        <section class="row justify-content-center">
            <div class="col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 " data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="card-product">
                    <form role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <?php
                        $edits = query_data("SELECT * FROM tbl_transaksi WHERE kode_transaksi='$kode_transaksi'");
                        foreach ($edits as $edit) :
                        ?>
                        <input type="hidden" name="kode_transaksi" value="<?= $edit['kode_transaksi'] ?>">
                        <?php
                        endforeach;
                        ?>
                        <div>
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="mt-2">
                            <textarea name="alamat" id="alamat" class="form-control col-alamat" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mt-4">
                            <label for="nama_pengirim">Nama Pengirim</label>
                        </div>
                        <div class="mt-2">
                            <input type="text" name="nama_pengirim" class="form-control" id="nama_pengirim">
                        </div>
                        <div class="mt-4">
                            <label for="no_telpon">No Telpon/WA</label>
                        </div>
                        <div class="mt-2">
                            <input type="text" name="nomor_telpon" class="form-control" id="no_telpon">
                        </div>
                        <div class="mt-4">
                            <label for="bukti_pembayaran">Bukti Transfer</label>
                        </div>
                        <div class="mt-2 mb-3">
                            <input type="file" name="img" class="form-control" id="bukti_pembayaran">
                        </div>
                </div>
                <div class="btn-finish-step-2 text-center">
                    <button type="submit" name="finish" class="btn btn-checkout-detail">Finish</button>
                </div>
                </form>
            </div>
        </section>
    </main>
    <?php
    require 'views/script.php';

    if (isset($_POST['finish'])) {
        $bayar =pembayaran($_POST);
        // var_dump($_POST);
        if ($bayar[0] > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("checkout_step_3.php?kode_transaksi='.$bayar[1].'");
                        }
                    });
                </script>
                ';
        } else {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Ditambahkan",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("checkout_step_2.php");
                        }
                    });
                </script>
                ';
        }
    }
    ?>
    <script>
        AOS.init();
    </script>
</body>

</html>