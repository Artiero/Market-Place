<?php
session_start();
if (!isset($_SESSION['username'])&& $_SESSION['role'] != 'admin') {
    header('Location: login.php');
} elseif (isset($_SESSION['username'])&& $_SESSION['role'] != 'admin'){
    header('Location: login.php');
}
require './function/global.php';
require './function/function_seller.php';
$seller_pendings = query_data("SELECT*FROM tbl_seller WHERE status='Unactive' ");
$username = $_SESSION['username'];
// var_dump($seller_pendings)
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seller Pending</title>

    <?php
    require 'views/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $page = 8;
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
                    <h1 class="h3 mb-2 text-gray-800">Seller Pending</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Seller Pending</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Photo Profile</th>
                                            <th>No. Telpon</th>
                                            <th>Alamt</th>
                                            <th>Bank</th>
                                            <th>No. Rekening</th>
                                            <th>Jenis Bank</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($seller_pendings as $seller_pending) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $seller_pending['nama'] ?>
                                                </td>
                                                <td>
                                                    <?= $seller_pending['tempat_lahir'] ?>
                                                    <?= tgl_indo($seller_pending['tgl_lahir']) ?>
                                                </td>
                                                <td>
                                                    <?= $seller_pending['jenis_kelamin'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <img src="../asset/img/<?=$seller_pending['image_profile'] ?>" width="150px" alt="">
                                                    <!-- <img src="../asset/img/640b1c894bc84.jpg" width="150px" alt=""> -->
                                                </td>
                                                <td>
                                                    <?= $seller_pending['nomor_telpon'] ?>
                                                </td>
                                                <td>
                                                    <?= $seller_pending['alamat'] ?>
                                                </td>
                                                <td>
                                                    <?= $seller_pending['nama_bank'] ?>
                                                </td>
                                                <td>
                                                    <?= $seller_pending['nomor_rekening'] ?>
                                                </td>
                                                <td>
                                                    <?= $seller_pending['jenis_bank'] ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $seller_pending['username']; ?>"><i class="fas fa-user-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $seller_pending['username']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>
                                    <!-- Start hapus modal -->
                                    <div class="modal fade-costum" id="modalHapus<?= $seller_pending['username']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $username = $seller_pending['username'];
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
                                    <!-- End hapus modal -->

                                    <!-- Start ubah modal -->
                                    <div class="modal fade-costum" id="modalUbah<?= $seller_pending['username']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Activasi Akun Seller</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $username = $seller_pending['username'];
                                                        $edits = query_data("SELECT * FROM tbl_seller WHERE username='$username'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <input type="hidden" name="username" value="<?= $edit['username']; ?>">
                                                            <div class="flex text-center mt-4 mb-3">
                                                                <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" name="ubah" class="btn btn-info ml-2">Aktifkan</button>
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
        
        if (active_seller($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Di Aktifkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("seller_pending.php");
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
                            window.location.replace("seller_pending.php");
                        }
                    });
                </script>
            ';
        }
    }

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
                            window.location.replace("seller_pending.php");
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
                            window.location.replace("seller_pending.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>