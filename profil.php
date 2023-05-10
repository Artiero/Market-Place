<?php
session_start();
require 'function/function_transaksi.php';
require 'function/function_profile.php';

$username = $_SESSION['username'];
$users = query_data("SELECT*FROM tbl_transaksi WHERE username_user = '$username' ORDER BY status ASC");
$cekNama = mysqli_query($conn, "SELECT*FROM tbl_user WHERE username='$username'");
$resultNama = mysqli_fetch_assoc($cekNama);
// var_dump($resultNama);
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
                <img src="asset/img/<?= $resultNama['image_profile'] ?>" alt="" width="120px" class="position-absolute top-50 start-50 translate-middle img-profile-page">
                <img src="asset/img/img-camera.png" alt="" width="120px" class="position-absolute top-50 start-50 translate-middle img-camera">
            </div>
        </div>
        <form action="" method="post">
            <div class="row justify-content-center">
                <div class="col-9 col-md-8 col-lg-4 col-xl-4">
                    <form role="form" action="" method="POST" autocomplete="off">
                        <div class="mt-4">
                            
                            <label for="" class="form-label">
                                Nama Lengkap
                            </label>
                            <?php
                            if (isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
                            ?>
                                <input type="hidden" name="username" value="<?= $resultNama['username'] ?>">
                                <input type="text" name="nama" value="<?= $resultNama['nama'] ?>" class="form-control">
                            <?php
                            } else {
                            ?>
                                <input type="text" value="" class="form-control">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">
                                Nomor Handphone
                            </label>
                            <?php
                            if (isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
                            ?>
                                <input type="text" name="nomor_telpon" value="<?= $resultNama['nomor_telpon'] ?>" class="form-control">
                            <?php
                            } else {
                            ?>
                                <input type="text" value="" class="form-control">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">
                                Alamat
                            </label>
                            <?php
                            if (isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
                            ?>
                                <textarea name="alamat" id="" cols="30" rows="5" class="form-control"><?= $resultNama['alamat'] ?></textarea>
                            <?php
                            } else {
                            ?>
                                <textarea id="" cols="30" rows="5" class="form-control"></textarea>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mt-4">
                            <label for="" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control">
                        </div>

                </div>
            </div>
            <div class="text-center mt-4">
                <button class="btn-save" type="submit" name="save">Save</button>
            </div>
        </form>
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
                                    <th>Kode Transaksi</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($users as $user) :
                                ?>
                                    <tr>
                                        <td>
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <?= $user['kode_transaksi'] ?>
                                        </td>
                                        <td>
                                            <?= $user['produk'] ?>
                                        </td>
                                        <td>
                                            <?= $user['jumlah_produk'] ?>
                                        </td>
                                        <td>
                                            <?= rupiah($user['total_harga']) ?>
                                        </td>
                                        <td>
                                            <?= $user['status'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            // var_dump($user['status']=='Belum Bayar');
                                            if ($user['status'] == 'Belum Bayar') {
                                            ?>
                                                <a href="checkout_step_1.php?kode_transaksi=<?= $user['kode_transaksi'] ?>" class="btn btn-sm btn-info">Checkout</a>
                                            <?php
                                            } elseif ($user['status'] == 'Pengiriman') {
                                            ?>
                                                <form role="form" action="" method="POST" autocomplete="off">

                                                    <input type="hidden" name="kode_transaksi" value="<?= $user['kode_transaksi'] ?>">
                                                    <button name="terima" class="btn btn-sm btn-success">Diterima</button>

                                                </form>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach;
                                ?>
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

    if (isset($_POST['save'])) {
        // var_dump($_POST);
        if (ubah_data_user($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Di Aktifkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("profil.php");
                        }
                    });
                </script>
            ';
        } else {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Dihapus",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("profil.php");
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['terima'])) {
        // var_dump($_POST);
        if (diterima($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Di Aktifkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("profil.php");
                        }
                    });
                </script>
            ';
        } else {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Dihapus",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("profil.php");
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