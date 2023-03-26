<?php
session_start();
$id_produk = $_GET['id'];
if ($id_produk === NULL) {
    header('Location: produk.php');
}

require 'function/function_transaksi.php';
$user = mysqli_query($conn, "SELECT * FROM tbl_user");
$resultUser = mysqli_fetch_assoc($user);
$produk_sellers = query_data("SELECT * FROM tbl_produk");
$cekNama = mysqli_query($conn, "SELECT*FROM tbl_produk WHERE id='$id_produk'");
$resultNama = mysqli_fetch_assoc($cekNama);
$username = $resultNama['username_seller'];
$sellers = query_data("SELECT * FROM tbl_seller WHERE username = '$username'");
$details = query_data("SELECT tbl_produk.nama_produk,
tbl_produk.id,
tbl_produk.harga_produk ,
tbl_produk.satuan_produk,
tbl_produk.image_produk,
tbl_seller.image_profile,
tbl_seller.nama
FROM tbl_produk INNER JOIN tbl_seller
ON tbl_seller.username = tbl_produk.username_seller WHERE tbl_produk.id!=$id_produk LIMIT 4 ");
// var_dump($sellers);
// echo "<br>";
// var_dump($resultNama);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <?php
    require 'views/link.php';
    ?>
</head>

<body>
    <?php
    require 'views/navbar.php';
    ?>
    <main class="container main-class">
        <section>
            <div class="breadcrumb-custom">
                <p><a href="index.php">Beranda</a> <span class="garing-bread">/</span> <a href="produk.php">Produk</a> <span class="garing-bread">/</span> <span class="detail-breadcrumb">Detail Produk</span></p>
            </div>
        </section>
        <section class="detail-product">
            <h1 class="title" data-aos="zoom-in-up" data-aos-duration="1000"><?= $resultNama['nama_produk'] ?></h1>
            <div class="row mt-4 justify-content-center justify-content-md-center justify-content-xl-start">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 offset-xl-1">
                    <div class="card-product mb-4" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="px-3 pt-3">
                            <img src="asset/img/<?= $resultNama['image_produk'] ?>" alt="" class="img-fluid w-100">
                        </div>
                        <div class="deskripsi-product px-3">
                            <h6>Deskripsi <?= $resultNama['nama_produk'] ?> </h6>
                            <p>
                                <?=
                                $resultNama['deskripsi_produk']
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
                    <div class="card-product" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="mx-4 detail-checkout">
                            <form role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">

                                <input type="hidden" name="produk" value="<?= $resultNama['nama_produk'] ?>">
                                <input type="hidden" name="nama_user" value="<?= $resultUser['nama'] ?>">
                                <input type="hidden" name="username_user" value="<?= $resultUser['username'] ?>">
                                <input type="hidden" name="nama_seller" value="<?= $sellers[0]['nama'] ?>">
                                <input type="hidden" name="username_seller" value="<?= $sellers[0]['username'] ?>">

                                <h4>Start Checkout</h4>
                                <p>Stock: <span class="stock"><?= $resultNama['jumlah_produk'] ?> <?= $resultNama['satuan_produk'] ?></span></p>
                                <input type="hidden" name="satuan_produk" value="<?= $resultNama['satuan_produk'] ?>">

                                <h3><span class="price"><?= rupiah($resultNama['harga_produk']) ?></span> / <?= $resultNama['satuan_produk'] ?> </h3>
                                <input type="hidden" name="sub_harga" value="<?= $resultNama['harga_produk'] ?>">

                                <p class="quest">Berapa <?= $resultNama['satuan_produk'] ?> yang ingin kamu beli ?</p>
                                <div class="d-flex">
                                    <a class="btn-minus" onclick="dec()">-</a>
                                    <input type="text" placeholder="0" onchange="getJumlah(this.value)" name="jumlah_produk" id="jumlah" readonly>
                                    <a class="btn-plus" onclick="inc()">+</a>
                                </div>
                                <p class="mt-4">Sub total harga <span class="sub-total" id="subTotal">Rp. 0 / 0 <?= $resultNama['satuan_produk'] ?></span></p>
                                
                                <p class="note">Note: Sub total belum termasuk ongkir</p>
                                <div class="btn-checkout-margin">
                                    <?php
                                    if (isset($_SESSION['username']) && $_SESSION['role'] == 'user') {
                                    ?>
                                        <button type="submit" name="checkout" class="btn-checkout-detail">Checkout</button>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn-login-checkout" href="signin.php">Login</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                        <hr class="hr-checkout">
                        <div class="mx-4 d-flex pb-4 profile-checkout">
                            <div class="foto-penjual">
                                <img src="asset/img/<?= $sellers[0]['image_profile'] ?>" alt="" onload="fixAspect(this);">
                            </div>
                            <div>
                                <p><?= $sellers[0]['nama'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="detail-product-lain">
            <h1 data-aos="zoom-in-up" data-aos-duration="1000">Produk Lainnya</h1>
            <div class="row justify-content-center mt-4">
                <?php
                foreach ($details as $detail) :
                ?>
                    <div class="col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                        <div class="card-product mb-3" data-aos="zoom-in-up" data-aos-duration="1000">
                            <img src="asset/img/<?= $detail['image_produk'] ?>" class="w-100 img-fluid px-3 pt-3" alt="">
                            <div class="px-3">
                                <h4><?= $detail['nama_produk'] ?></h4>
                                <h6><?= rupiah($detail['harga_produk']) ?>/ <?= $detail['satuan_produk'] ?></h6>
                            </div>
                            <hr>
                            <div class="row px-3 profile-product pb-2">
                                <div class="col d-flex">
                                    <div class="foto-penjual">
                                        <img src="asset/img/<?= $detail['image_profile'] ?>" alt="" onload="fixAspect(this);">
                                    </div>
                                    <div>
                                        <p><?= $detail['nama'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4 col-lg2 justify-content-center">
                                    <div class="btn-buy-profile">
                                        <a href="detail_produk.php?id=<?= $detail['id'] ?>">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </section>
    </main>
    <?php
    require 'views/footer.php';
    require 'views/script.php';

    if (isset($_POST['checkout'])) {
        // var_dump($_POST);
        if (transaksi($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("checkout_step_1.php");
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
                            window.location.replace("produk.php");
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