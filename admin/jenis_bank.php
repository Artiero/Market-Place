<?php
session_start();
if (!isset($_SESSION['username'])&& $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}
require './function/global.php';
require './function/function_jenis_bank.php';
$jenis_banks = query_data('SELECT*FROM tbl_jenis_bank');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kategori Produk</title>

    <?php
    require 'views/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $page = 4;
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
                    <h1 class="h3 mb-2 text-gray-800">Jenis Bank</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Bank</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#daftar-data"><i class="fas fa-user-plus mr-2"></i>Tambah</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Singkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jenis_banks as $jenis_bank) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $jenis_bank['nama_bank'] ?>
                                                </td>
                                                <td>
                                                    <?= $jenis_bank['nama_bank'] ?>
                                                </td>
                                                <td>
                                                    <?= $jenis_bank['singkatan'] ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $jenis_bank['id']; ?>"><i class="fas fa-user-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $jenis_bank['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>
                                    <!-- Start delete modal -->
                                    <div class="modal fade-costum" id="modalHapus<?= $satuan_produk['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $id = $satuan_produk['id'];
                                                        $edits = query_data("SELECT * FROM tbl_satuan_produk WHERE id='$id'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <input type="hidden" name="id" value="<?= $edit['id']; ?>">
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
                                    <div class="modal fade-costum" id="modalUbah<?= $satuan_produk['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $id = $satuan_produk['id'];
                                                        $edits = query_data("SELECT * FROM tbl_satuan_produk WHERE id='$id'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                        <input type="hidden" name="id" value="<?=$edit['id']?>">
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Nama Satuan Produk</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="nama_satuan" value="<?= $edit['nama_satuan']?>">
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
                                                            <input type="text" class="form-control" name="nama" required placeholder="Nama Satuan">
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
        if (tambah_satuan_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("satuan_produk.php");
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
                            window.location.replace("satuan_produk.php");
                        }
                    });
                </script>
                ';
        }
    }

    if (isset($_POST['hapus'])) {
        if (hapus_satuan_produk($_POST['id']) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("satuan_produk.php");
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
                            window.location.replace("satuan_produk.php");
                        }
                    });
                </script>
            ';
        }
    }

    if (isset($_POST['ubah'])) {
        if (ubah_satuan_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("satuan_produk.php");
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
                            window.location.replace("satuan_produk.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>