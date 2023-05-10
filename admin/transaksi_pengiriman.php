<?php
session_start();
if (!isset($_SESSION['username'])&& $_SESSION['role'] != 'admin') {
    header('Location: login.php');
} elseif (isset($_SESSION['username'])&& $_SESSION['role'] != 'admin'){
    header('Location: login.php');
}
require './function/global.php';
$sudah_bayars = query_data("SELECT*FROM tbl_transaksi WHERE status='Pengiriman' ORDER BY tgl_transaksi DESC");
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transaksi</title>

    <?php
    require 'views/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $page = 11;
        require 'views/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require 'views/navbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pengiriman Barang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengiriman Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Produk</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Nama Pengirim</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telpon</th>
                                            <th>Jumlah Produk</th>
                                            <th>Sub Harga</th>
                                            <th>Kode Unik</th>
                                            <th>Total Harga</th>
                                            <th>Username User</th>
                                            <th>Nama User</th>
                                            <th>Username Seller</th>
                                            <th>Nama Seller</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($sudah_bayars as $sudah_bayar) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['kode_transaksi'] ?>
                                                </td>
                                                <td>
                                                    <?= tgl_indo($sudah_bayar['tgl_transaksi']) ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['produk'] ?>
                                                </td>
                                                <td class="text-center">
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalView<?= $sudah_bayar['img']; ?>"><i class="fas fa-eye"></i></button>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['nama_pengirim'] ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['alamat'] ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['nomor_telpon'] ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['jumlah_produk'] ?>
                                                </td>
                                                <td>
                                                    <?= rupiah($sudah_bayar['sub_harga']) ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['kode_unik'] ?>
                                                </td>
                                                <td>
                                                    <?= rupiah($sudah_bayar['total_harga']) ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['username_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['nama_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['username_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['nama_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $sudah_bayar['status'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>

                                    <!-- Start ubah modal -->
                                    <div class="modal fade-costum" id="modalView<?= $sudah_bayar['img']; ?>" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Bukti Transfer</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $kode_transaksi = $sudah_bayar['kode_transaksi'];
                                                        $edits = query_data("SELECT * FROM tbl_transaksi WHERE kode_transaksi='$kode_transaksi'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <img src="../asset/img/<?= $edit['img'] ?>"  class="img-fluid" alt="gambar">
                                                            <div class="flex text-center mt-4 mb-3">
                                                                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        <?php
                                                        endforeach
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End ubah modal -->

                                    <!-- Start ubah modal -->
                                    <div class="modal fade-costum" id="modalUbah<?= $admin['username']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $username = $admin['username'];
                                                        $edits = query_data("SELECT * FROM tbl_admin WHERE username='$username'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-3 col-form-label">Username</label>
                                                                <div class="col-9">
                                                                    <input type="text" class="form-control" name="username" value="<?= $edit['username']?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-3 col-form-label">Nama</label>
                                                                <div class="col-9">
                                                                    <input type="text" class="form-control" name="nama" value="<?= $edit['nama']?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-3 col-form-label">Password</label>
                                                                <div class="col-9">
                                                                    <input type="password" class="form-control" name="password">
                                                                </div>
                                                            </div>
                                                            <div class="flex text-center mt-4 mb-3">
                                                                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" name="ubah" class="btn btn-info ml-2">Ubah</button>
                                                            </div>
                                                        <?php
                                                        endforeach
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End ubah modal -->
                                <?php
                                        endforeach;
                                ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require 'views/footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    require 'views/modalLogout.php';
    require 'views/script.php';

    if (isset($_POST['ubah'])) {
        if (ubah_data_admin($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("admin.php");
                        }
                    });
                </script>
            ';
        } else {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Diubah",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("admin.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>