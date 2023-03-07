<?php
require './function/global.php';
require './function/function_kategori_produk.php';
$kategori_produks = query_data('SELECT*FROM tbl_kategori_produk');
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
        $page = 3;
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
                    <h1 class="h3 mb-2 text-gray-800">Kategori Produk</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Produk</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#daftar-data"><i class="fas fa-user-plus mr-2"></i>Tambah</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($kategori_produks as $kategori_produk) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $kategori_produk['nama_kategori'] ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $kategori_produk['id']; ?>"><i class="fas fa-user-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $kategori_produk['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;

                                            ?>
                                    </tbody>
                                    <!-- Start delete modal -->
                                    <div class="modal fade-costum" id="modalHapus<?= $kategori_produk['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $id = $kategori_produk['id'];
                                                        $edits = query_data("SELECT * FROM tbl_kategori_produk WHERE id='$id'");
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
                                    <div class="modal fade-costum" id="modalUbah<?= $kategori_produk['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off">
                                                        <?php
                                                        $id = $kategori_produk['id'];
                                                        $edits = query_data("SELECT * FROM tbl_kategori_produk WHERE id='$id'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                        <input type="hidden" name="id" value="<?=$edit['id']?>">
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Nama Kategori Produk</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" name="nama_kategori" value="<?= $edit['nama_kategori']?>">
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
                                                        <label class="col-3 col-form-label">Nama Kategori</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="nama_kategori" required placeholder="Nama Kategori">
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
        if (tambah_ketegori_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("kategori_produk.php");
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
                            window.location.replace("kategori_produk.php");
                        }
                    });
                </script>
                ';
        }
    }

    if (isset($_POST['hapus'])) {
        if (hapus_ketegori_produk($_POST['id']) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("kategori_produk.php");
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
                            window.location.replace("kategori_produk.php");
                        }
                    });
                </script>
            ';
        }
    }

    if (isset($_POST['ubah'])) {
        if (ubah_ketegori_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("kategori_produk.php");
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
                            window.location.replace("kategori_produk.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>