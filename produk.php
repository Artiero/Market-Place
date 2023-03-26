<?php
session_start();
require './function/global.php';



$produks = query_data("SELECT tbl_produk.nama_produk,
tbl_produk.id,
tbl_produk.harga_produk ,
tbl_produk.satuan_produk,
tbl_produk.image_produk,
tbl_seller.image_profile,
tbl_seller.nama
FROM tbl_produk INNER JOIN tbl_seller
ON tbl_seller.username = tbl_produk.username_seller ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <?php
    require 'views/link.php';
    ?>



</head>

<body>
    <?php
    require 'views/navbar.php';
    ?>

    <main class="container">
        <section class="product">
            <div class="title-product" data-aos="zoom-in-up" data-aos-duration="1000">
                <h1 class="text-center">Produk</h1>
                <p class="text-center">“Berbagai jenis beras dengan harga relatif murah”</p>
            </div>

            <div class="row d-flex">
                <?php
                foreach ($produks as $produk) :
                ?>
                    <div class="col-8 col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-2">
                        <div class="card-product mb-3" data-aos="zoom-in-up" data-aos-duration="1000">
                            <img src="asset/img/<?= $produk['image_produk'] ?>" class="w-100 img-fluid px-3 pt-3" alt="">
                            <div class="px-3">
                                <h4><?= $produk['nama_produk'] ?></h4>
                                <h6><?= rupiah($produk['harga_produk']) ?> / <?= $produk['satuan_produk'] ?></h6>
                            </div>
                            <hr>
                            <div class="row px-3 profile-product pb-2">
                                <div class="col d-flex">
                                    <div class="foto-penjual">
                                        <img src="asset/img/<?= $produk['image_profile'] ?>" alt="" onload="fixAspect(this);">
                                    </div>
                                    <div>
                                        <p><?= $produk['nama'] ?></p>
                                    </div>
                                </div>
                                <div class="col-4  justify-content-center">
                                    <div class="btn-buy-profile">
                                        <a href="detail_produk.php?id=<?= $produk['id'] ?>">Beli</a>
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
    ?>
    <script>
        AOS.init();
    </script>
</body>

</html>