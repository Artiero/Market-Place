<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
    header('Location: login.php');
} elseif (isset($_SESSION['username']) && $_SESSION['role'] != 'seller') {
    header('Location: login.php');
}
require 'function/global.php';
$username = $_SESSION['username'];
$jenis_banks = query_data('SELECT*FROM tbl_jenis_bank');
$sellers = query_data("SELECT*FROM tbl_seller WHERE username = '$username' ");
// var_dump($sellers);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <?php
    require 'views/link.php'
    ?>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        $page = 2;
        require 'views/sidebar.php'
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php
                require 'views/navbar.php'
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">Profile</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 px-5 py-4">
                        <?php
                        foreach ($sellers as $seller) :
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="text-center my-3">
                                    <img src="img/<?= $seller['image_profile'] ?>" width="300px" alt="">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Name</label>
                                            <div class="col">
                                                <input type="hidden" name="username" value="<?= $seller['username'] ?>">
                                                <input type="hidden" name="image_lama" value="<?= $seller['image_profile'] ?>">
                                                <input type="text" name="nama" value="<?= $seller['name'] ?>" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Tempat Lahir</label>
                                            <div class="col">
                                                <input type="text" name="tempat_lahir" value="<?= $seller['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col">
                                                <input type="date" name="tempat_lahir" value="<?= $seller['tgl_lahir'] ?>" class="form-control" placeholder="Tanggal Lahir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col">
                                                <select name="jenis_kelamin" id="" class="form-control">
                                                    <option selected>--Pilih---</option>
                                                    <option value="<?= $seller['jenis_kelamin'] ?>">Laki-laki</option>
                                                    <option value="<?= $seller['jenis_kelamin'] ?>">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Image Profile</label>
                                            <div class="col">
                                                <input type="file" name="image_profile" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">No Telpon</label>
                                            <div class="col">
                                                <input type="text" name="nomor_telpon" value="<?= $seller['nomor_telpon'] ?>" class="form-control" placeholder="+62081xxxxx">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Alamat</label>
                                            <div class="col">
                                                <textarea name="alamat" class="form-control" cols="30" rows="3"><?= $seller['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Nama Bank</label>
                                            <div class="col">
                                                <input type="text" name="nama_bank" value="<?= $seller['nama_bank'] ?>" class="form-control" placeholder="Nama Bank">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Nomor Rekening</label>
                                            <div class="col">
                                                <input type="number" name="nomor_rekening" value="<?= $seller['nomor_rekening'] ?>" class="form-control" placeholder="Nama Bank">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Jenis Bank</label>
                                            <div class="col">
                                                <select name="jenis_bank" id="jenis_bank" class="form-control">
                                                    <option selected><?= $seller['jenis_bank'] ?></option>
                                                    <?php
                                                    $jenis_banks = query_data('SELECT*FROM tbl_jenis_bank');
                                                    foreach ($jenis_banks as $jenis_bank) :
                                                    ?>
                                                        <option value="<?= $jenis_bank['singkatan'] ?>"><?= $jenis_bank['singkatan'] ?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-1 col-form-label">Passwor</label>
                                            <div class="col">
                                                <input type="password" name="password" class="form-control" placeholder="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center my-3">
                                    <button class="btn btn-info" type="submit" name="ubah">Update Profile</button>
                                </div>
                            </form>
                        <?php
                        endforeach;
                        ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
            require 'views/footer.php'
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
    require 'views/modalLogout.php';
    require 'views/script.php';
    // if (isset($_POST['ubah'])) {
    //     echo '
    //             <script type="text/javascript">
    //                 swal({
    //                     title: "Berhasil",
    //                     text: "Berhasil Diubah",
    //                     icon: "success",
    //                     showConfirmButton: true,
    //                 }).then(function(isConfirm){
    //                     if(isConfirm){
    //                         window.location.replace("profile.php");
    //                     }
    //                 });
    //             </script>
    //         ';
    //     } else {
    //     echo '
    //             <script type="text/javascript">
    //                 swal({
    //                     title: "Gagal",
    //                     text: "Gagal Diubah",
    //                     icon: "error",
    //                     showConfirmButton: true,
    //                 }).then(function(isConfirm){
    //                     if(isConfirm){
    //                         window.location.replace("profile.php");
    //                     }
    //                 });
    //             </script>
    //         ';
    // }
    ?>
</body>

</html>