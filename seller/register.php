<?php
require './function/function_register.php';
$jenis_banks = query_data('SELECT*FROM tbl_jenis_bank');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php
    require 'views/link.php';
    ?>

</head>

<body style="overflow-x: hidden;">
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card my-5 py-5 px-5">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Registrasi</h5>
                    <form role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option selected>--Pilih---</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image_profile" class="form-label">Image Profile</label>
                            <input type="file" class="form-control" id="image_profile" name="image_profile">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telpon" class="form-label">Nomor Telpon</label>
                            <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
                            <input type="number" class="form-control" id="nomor_rekening" name="nomor_rekening">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_bank" class="form-label">Jenis Bank</label>
                            <select name="jenis_bank" id="jenis_bank" class="form-control">
                                <option selected>--Pilih---</option>
                                <?php
                                $jenis_banks = query_data('SELECT*FROM tbl_jenis_bank');
                                foreach ($jenis_banks as $jenis_bank) :
                                ?>
                                    <option value="<?= $jenis_bank['singkatan'] ?>"><?= $jenis_bank['singkatan'] ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="regis" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require 'views/script.php';

    if (isset($_POST['regis'])) {
        // var_dump($_POST);
        if (register($_POST) > 0) {
            echo '
            <script type="text/javascript">
            swal({
                title: "Berhasil",
                text: "Berhasil Register",
                icon: "success",
                showConfirmButton: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    window.location.replace("login.php");
                }
            });
        </script>
        ';
        } else {
            echo '
            <script type="text/javascript">
            swal({
                title: "Gagal",
                text: "Gagal Register",
                icon: "error",
                showConfirmButton: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    window.location.replace("register.php");
                }
            });
        </script>
        ';
        }
    }
    ?>
</body>

</html>