<?php
session_start();
if (!isset($_SESSION['username'])&& $_SESSION['role'] != 'seller') {
    header('Location: login.php');
} elseif (isset($_SESSION['username'])&& $_SESSION['role'] != 'seller'){
    header('Location: login.php');
}
require './function/global.php';
$username = $_SESSION['username'];
$belum_bayars = query_data("SELECT*FROM tbl_transaksi WHERE status='Belum Bayar' AND username_seller='$username' ");
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
        $page = 9;
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
                    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
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
                                            <th>Image Produk</th>
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
                                        foreach ($belum_bayars as $belum_bayar) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['kode_transaksi'] ?>
                                                </td>
                                                <td>
                                                    <?= tgl_indo($belum_bayar['tgl_transaksi']) ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['produk'] ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['img'] ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['jumlah_produk'] ?>
                                                </td>
                                                <td>
                                                    <?= rupiah($belum_bayar['sub_harga']) ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['kode_unik'] ?>
                                                </td>
                                                <td>
                                                    <?= rupiah($belum_bayar['total_harga']) ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['username_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['nama_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['username_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['nama_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $belum_bayar['status'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>
                                    <!-- Start delete modal -->
                                    <div class="modal fade-costum" id="modalHapus<?= $admin['username']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $username = $admin['username'];
                                                        $edits = query_data("SELECT * FROM tbl_admin WHERE username='$username'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <input type="hidden" name="username" value="<?= $edit['username']; ?>">
                                                            <p>Yakin untuk menghapus data ?</p>
                                                            <div class="flex text-center mt-4 mb-3">
                                                                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" name="hapus" class="btn btn-danger ml-2">Hapus</button>
                                                            </div>
                                                        <?php
                                                        endforeach
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End delete modal -->

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

                                <!-- Start modal tambah data -->
                                <div class="modal modal-custom fade" id="daftar-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="#" autocomplete="off" id="daftarForm">
                                                    <div class="form-group row mt-3">
                                                        <label class="col-3 col-form-label">Nama</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="nama" required placeholder="Nama lengkap">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-3">
                                                        <label class="col-3 col-form-label">Username</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="username" required placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-3">
                                                        <label class="col-3 col-form-label">Password</label>
                                                        <div class="col">
                                                            <input type="password" class="form-control" name="password" required>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mt-3 mb-2">
                                                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End modal -->

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
    if (isset($_POST['tambah'])) {
        if (tambah_data_admin($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
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
                        text: "Gagal Ditambahkan",
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

    if (isset($_POST['hapus'])) {
        if (hapus_data_admin($_POST['username']) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
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
                        text: "Gagal Dihapus",
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