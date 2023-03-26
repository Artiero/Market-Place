<?php
session_start();

if (!isset($_SESSION['username'])&& $_SESSION['role'] != 'seller') {
    header('Location: login.php');
} elseif (isset($_SESSION['username'])&& $_SESSION['role'] != 'seller'){
    header('Location: login.php');
}
require './function/global.php';
$transaksi_pengirimans = query_data("SELECT*FROM tbl_transaksi WHERE status='Pengiriman'");
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

    <title>Pengiriman</title>

    <?php
    require 'views/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $page = 6;
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
                    <h1 class="h3 mb-2 text-gray-800">Pengiriman</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengiriman</h6>
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
                                            <th>Bukti Transaksi</th>
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
                                        foreach ($transaksi_pengirimans as $transaksi_pengiriman) :
                                            ?>
                                            <tr>
                                            <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['kode_transaksi'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['tgl_transaksi'] ?>
                                                    <?= tgl_indo($transaksi_pengiriman['tgl_transaksi']) ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['produk'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <img src="../asset/img/<?=$transaksi_pengiriman['img'] ?>" width="150px" alt="">
                                                    <!-- <img src="../asset/img/640b1c894bc84.jpg" width="150px" alt=""> -->
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['jumlah_produk'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['sub_harga'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['kode_unik'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['total_harga'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['username_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['nama_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['username_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['nama_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $transaksi_pengiriman['status'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>
                                    <!-- Start delete modal -->
                                    <div class="modal fade-costum" id="modalHapus<?= $seller_active['username']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $username = $seller_active['username'];
                                                        $edits = query_data("SELECT * FROM tbl_seller WHERE username='$username'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <input type="hidden" name="username" value="<?= $edit['username']; ?>">
                                                            <input type="hidden" name="image_profile" value="<?= $edit['image_profile']; ?>">
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

    if (isset($_POST['hapus'])) {
        if (hapus_seller($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("seller_active.php");
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
                            window.location.replace("seller_active.php");
                        }
                    });
                </script>
            ';
        }
    }

    ?>



</body>

</html>