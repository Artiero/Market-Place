<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
    header('Location: login.php');
} elseif (isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
    header('Location: login.php');
}
require './function/global.php';
$username = $_SESSION['username'];
$sends = query_data("SELECT*FROM tbl_transaksi WHERE status='Diterima' AND username_seller='$username' ");
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
        $page = 7;
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
                                <form method="POST" action="laporan.php">
                                    <div class="form-group row mt-3">
                                        <div class="col-2">
                                            <label class="form-label">Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tanggal_start">
                                        </div>
                                        <div class="col-2">
                                            <label class="form-label">Tanggal Akhir</label>
                                            <input type="date" class="form-control" name="tanggal_end">
                                        </div>
                                        <div class="col-2 form-group mt-4">
                                            <button type="submit" name="submit" class="btn btn-info ml-2">Download</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Produk</th>
                                            <th>Bukti Transfer</th>
                                            <th>Nama Pengirim</th>
                                            <th>Alamat Pengiriman</th>
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
                                        foreach ($sends as $send) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $send['kode_transaksi'] ?>
                                                </td>
                                                <td>
                                                    <?= tgl_indo($send['tgl_transaksi']) ?>
                                                </td>
                                                <td>
                                                    <?= $send['produk'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <img src="../asset/img/<?= $send['img'] ?>" width="150px" alt="">
                                                </td>
                                                <td>
                                                    <?= $send['nama_pengirim'] ?>
                                                </td>
                                                <td>
                                                    <?= $send['alamat'] ?>
                                                </td>
                                                <td>
                                                    <?= $send['nomor_telpon'] ?>
                                                </td>
                                                <td>
                                                    <?= $send['jumlah_produk'] ?>
                                                </td>
                                                <td>
                                                    <?= rupiah($send['sub_harga']) ?>
                                                </td>
                                                <td>
                                                    <?= $send['kode_unik'] ?>
                                                </td>
                                                <td>
                                                    <?= rupiah($send['total_harga']) ?>
                                                </td>
                                                <td>
                                                    <?= $send['username_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $send['nama_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $send['username_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $send['nama_seller'] ?>
                                                </td>
                                                <td>
                                                    <?= $send['status'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>
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
    // if (isset($_POST['download'])) {
    //     // var_dump($_POST);
    //     if ( $_POST > 0) {
    //         echo '
    //             <script type="text/javascript">
    //                 swal({
    //                     title: "Berhasil",
    //                     text: "Berhasil Ditambahkan",
    //                     icon: "success",
    //                     showConfirmButton: true,
    //                 }).then(function(isConfirm){
    //                     if(isConfirm){
    //                         window.location.replace("laporan.php");
    //                     }
    //                 });
    //             </script>
    //             ';
    //     } else {
    //         echo '
    //             <script type="text/javascript">
    //                 swal({
    //                     title: "Gagal",
    //                     text: "Gagal Ditambahkan",
    //                     icon: "error",
    //                     showConfirmButton: true,
    //                 }).then(function(isConfirm){
    //                     if(isConfirm){
    //                         window.location.replace("transaksi_diterima.php");
    //                     }
    //                 });
    //             </script>
    //             ';
    //     }
    // }
    ?>



</body>

</html>