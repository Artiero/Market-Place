<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <?php
    require 'views/link.php';
    ?>
</head>

<body>
    <?php
    require 'views/navbar.php';
    ?>
    <main class="container profil-page">
        <div class="card-profile-page">
            <div class="position-relative">
                <img src="asset/img/profile.png" alt="" width="120px" class="position-absolute top-50 start-50 translate-middle img-profile-page">
                <img src="asset/img/img-camera.png" alt="" width="120px" class="position-absolute top-50 start-50 translate-middle img-camera">
            </div>
        </div>
        <form action="" method="post">
            <div class="row justify-content-center">
                <div class="col-9 col-md-8 col-lg-4 col-xl-4">
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Nama Lengkap
                        </label>
                        <input type="text" value="Alexander" class="form-control">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Email
                        </label>
                        <input type="email" value="alexander@gmail.com" class="form-control">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Nomor Handphone
                        </label>
                        <input type="text" value="129873812321" class="form-control">
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Alamat
                        </label>
                        <textarea name="" id="" cols="30" rows="5" class="form-control">Tobadak</textarea>
                    </div>
                    <div class="mt-4">
                        <label for="" class="form-label">
                            Password
                        </label>
                        <input type="password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button class="btn-save" type="submit">Save</button>
            </div>
            <div class="text-center mt-4">
                <a href="logout.php" class="btn-logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </form>
        <div class="tabel-riwayat">
            <h1 class="text-center">Riwayat Transaksi</h1>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-10">
                    <div class="table-responsive">
                        <table class="table table-striped table-transaksi">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Beras Pandawangi</td>
                                    <td>5 kg</td>
                                    <td>Rp. 283.000</td>
                                    <td>Pengiriman</td>
                                    <td>Diterima</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Beras Pandawangi</td>
                                    <td>5 kg</td>
                                    <td>Rp. 283.000</td>
                                    <td>Pengiriman</td>
                                    <td>Diterima</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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