<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
    header('Location: login.php');
} elseif (isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
    header('Location: login.php');
}

require './function/function_satuan_produk.php';
$username = $_SESSION['username'];
// var_dump($username);
$produks = query_data("SELECT*FROM tbl_produk WHERE username_seller='$username'");
$kategori_produks = query_data("SELECT*FROM tbl_kategori_produk");
$satuan_produks = query_data("SELECT*FROM tbl_satuan_produk");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Produk</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Produk</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#daftar-data"><i class="fas fa-user-plus mr-2"></i>Tambah</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi Produk</th>
                                            <th>Jumlah Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Image Produk</th>
                                            <th>Kategori Produk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($produks as $produk) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no ?>
                                                </td>
                                                <td>
                                                    <?= $produk['nama_produk'] ?>
                                                </td>
                                                <td>
                                                    <?= $produk['deskripsi_produk'] ?>
                                                </td>
                                                <td>
                                                    <?= $produk['jumlah_produk'] ?>
                                                    <?= $produk['satuan_produk'] ?>
                                                </td>
                                                <td>

                                                    <?= rupiah($produk['harga_produk']) ?>
                                                </td>
                                                <td class="text-center">
                                                    <img src="../asset/img/<?= $produk['image_produk'] ?>" width="150px" alt="">
                                                </td>
                                                <td>
                                                    <?= $produk['kategori_produk'] ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $produk['id']; ?>"><i class="fas fa-user-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $produk['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            ?>
                                    </tbody>
                                    <!-- Start delete modal -->
                                    <div class="modal fade-costum" id="modalHapus<?= $produk['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                        <?php
                                                        $id = $produk['id'];
                                                        $edits = query_data("SELECT * FROM tbl_produk WHERE id='$id'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <input type="hidden" name="id" value="<?= $edit['id']; ?>">
                                                            <input type="hidden" name="image_produk" value="<?= $edit['image_produk']; ?>">
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
                                    <div class="modal fade-costum" id="modalUbah<?= $produk['id']; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Data</h5>
                                                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                        <?php
                                                        $id = $produk['id'];
                                                        $edits = query_data("SELECT * FROM tbl_produk WHERE id='$id'");
                                                        foreach ($edits as $edit) :
                                                        ?>
                                                            <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                                                            <input type="hidden" name="image_lama" value="<?= $edit['image_produk']; ?>">
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Nama Produk</label>
                                                                <div class="col">
                                                                    <input type="text" class="form-control" name="nama_produk" value="<?= $edit['nama_produk'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Deskripsi Produk</label>
                                                                <div class="col">
                                                                    <textarea name="deskripsi_produk" class="form-control" cols="30" rows="3"><?= $edit['deskripsi_produk'] ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Jumlah Produk</label>
                                                                <div class="col">
                                                                    <input type="number" class="form-control" name="jumlah_produk" value="<?= $edit['jumlah_produk'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Harga Produk</label>
                                                                <div class="col">
                                                                    <input type="number" class="form-control" name="harga_produk" value="<?= $edit['harga_produk'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Satuan Produk</label>
                                                                <div class="col">
                                                                    <select name="satuan_produk" id="" class="form-control">
                                                                        <option selected><?= $edit['satuan_produk'] ?></option>
                                                                        <?php
                                                                        $satuan = $produk['satuan_produk'];
                                                                        $satuan_produks = query_data("SELECT * FROM tbl_satuan_produk WHERE nama_satuan!= '$satuan' ");
                                                                        foreach ($satuan_produks as $satuan_produk) :
                                                                        ?>
                                                                            <option value="<?= $satuan_produk['nama_satuan'] ?>"><?= $satuan_produk['nama_satuan'] ?></option>
                                                                        <?php
                                                                        endforeach;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Image</label>
                                                                <div class="col">
                                                                    <input type="file" class="form-control" name="image_produk">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mt-3">
                                                                <label class="col-4 col-form-label">Kategori Produk</label>
                                                                <div class="col">
                                                                    <select name="kategori_produk" id="" class="form-control">
                                                                        <option selected><?= $edit['kategori_produk'] ?></option>
                                                                        <?php
                                                                        $ktg_produk = $produk['kategori_produk'];
                                                                        $kategori_produks = query_data("SELECT * FROM tbl_kategori_produk WHERE nama_kategori!='$ktg_produk' ");
                                                                        foreach ($kategori_produks as $kategori_produk) :
                                                                        ?>
                                                                            <option value="<?= $kategori_produk['nama_kategori'] ?>"><?= $kategori_produk['nama_kategori'] ?></option>
                                                                        <?php
                                                                        endforeach;
                                                                        ?>
                                                                    </select>
                                                                </div>
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
                                        <form method="post" action="#" autocomplete="off" id="daftarForm" enctype="multipart/form-data">
                                            <div class="form-group row mt-3">
                                                <label class="col-4 col-form-label">Nama Produk</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="nama_produk" required placeholder="Nama Produk">
                                                    <input type="hidden" name="username_seller" value="<?= $username ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="col-4 col-form-label">Deskripsi Produk</label>
                                                <div class="col">
                                                    <textarea name="deskripsi_produk" class="form-control" cols="30" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="col-4 col-form-label">Jumlah Produk</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="jumlah_produk" required placeholder="Jumlah Produk">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="col-4 col-form-label">Harga Produk</label>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="harga_produk" required placeholder="Harga Produk">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="col-4 col-form-label">Satuan Produk</label>
                                                <div class="col">
                                                    <select name="satuan_produk" id="" class="form-control">
                                                        <option selected>--Pilih Satuan Produk--</option>
                                                        <?php
                                                        $satuan_produks = query_data("SELECT nama_satuan FROM tbl_satuan_produk");
                                                        foreach ($satuan_produks as $satuan_produk) :
                                                        ?>
                                                            <option value="<?= $satuan_produk['nama_satuan'] ?>"><?= $satuan_produk['nama_satuan'] ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="col-4 col-form-label">Image</label>
                                                <div class="col">
                                                    <input type="file" class="form-control" name="image_produk" required placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label class="col-4 col-form-label">Kategori Produk</label>
                                                <div class="col">
                                                    <select name="kategori_produk" id="" class="form-control">
                                                        <option selected>--Pilih Kategori--</option>
                                                        <?php
                                                        $kategori_produks = query_data("SELECT nama_kategori FROM tbl_kategori_produk ");
                                                        foreach ($kategori_produks as $kategori_produk) :
                                                        ?>
                                                            <option value="<?= $kategori_produk['nama_kategori'] ?>"><?= $kategori_produk['nama_kategori'] ?></option>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </select>
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
        // var_dump($_POST);
        if (tambah_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("satuan_produk_seller.php");
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
                            window.location.replace("satuan_produk_seller.php");
                        }
                    });
                </script>
                ';
        }
    }

    if (isset($_POST['hapus'])) {
        // var_dump($_POST);
        if (hapus_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("satuan_produk_seller.php");
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
                            window.location.replace("satuan_produk_seller.php");
                        }
                    });
                </script>
            ';
        }
    }

    if (isset($_POST['ubah'])) {
        // var_dump($_POST);
        if (ubah_produk($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("satuan_produk_seller.php");
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
                            window.location.replace("satuan_produk_seller.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>