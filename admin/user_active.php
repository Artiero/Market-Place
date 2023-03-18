<?php
session_start();
if (!isset($_SESSION['username'])&& $_SESSION['role'] != 'admin') {
    header('Location: login.php');
} elseif (isset($_SESSION['username'])&& $_SESSION['role'] != 'admin'){
    header('Location: login.php');
}
require './function/global.php';
require './function/function_user.php';
$user_actives = query_data("SELECT*FROM tbl_user WHERE status='Active' ");
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

    <title>User Active</title>

    <?php
    require 'views/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $page = 5;
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
                    <h1 class="h3 mb-2 text-gray-800">User Active</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User Active</h6>
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
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($user_actives as $user_active) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $user_active['nama'] ?>
                                                </td>
                                                <td>
                                                    <?= $user_active['tempat_lahir'] ?>
                                                    <?= tgl_indo($user_active['tgl_lahir']) ?>
                                                </td>
                                                <td>
                                                    <?= $user_active['jenis_kelamin'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <img src="../asset/img/<?=$user_active['image_profile'] ?>" width="150px" alt="">
                                                    <!-- <img src="../asset/img/640b1c894bc84.jpg" width="150px" alt=""> -->
                                                </td>
                                                <td>
                                                    <?= $user_active['nomor_telpon'] ?>
                                                </td>
                                                <td>
                                                    <?= $user_active['alamat'] ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $user_active['username']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>
                                    <!-- Start hapus modal -->
                                    <div class="modal fade-costum" id="modalHapus<?= $user_active['username']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $username = $user_active['username'];
                                                        $edits = query_data("SELECT * FROM tbl_user WHERE username='$username'");
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
        if (hapus_user($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("user_active.php");
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
                            window.location.replace("user_active.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>