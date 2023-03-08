<?php
require './function/function_register.php';
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

<body>
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mt-5 py-5 px-5">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Registrasi</h5>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usernama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tempat_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal_lahir">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image Profile</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="image_profile">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Telpon</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nomor_telpon">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_bank">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Rekening</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="nomor_rekening">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Bank</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_bank">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="status">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php
    if (isset($_POST['regis'])) {
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