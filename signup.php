<?php
require './function/function_signup.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require 'views/link.php';
    ?>
    <title>Sign up</title>
</head>

<body class="background-register">
    <main>
        <div class="text-center">
            <a href="index.php">
                <img src="asset/img/logo_baru.png" alt="" width="160px">
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-4">
                <div class="card-login">
                    <form role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <h1 class="text-center mb-4">Sign Up</h1>
                        <div class="input-login mb-4 mt-3">
                            <h5>Fullname</h5>
                            <input type="text" placeholder="Enter your fullname" name="nama">
                        </div>
                        <div class="input-login mb-4 mt-3">
                            <h5>Username</h5>
                            <input type="text" placeholder="Enter your username" name="username">
                        </div>
                        <div class="input-login  mb-4 mt-3">
                            <h5>Place Date</h5>
                            <input type="text" placeholder="" name="tempat_lahir">
                        </div>
                        <div class="input-login  mb-4 mt-3">
                            <h5>Place Date Of Birth</h5>
                            <input type="date" placeholder="" name="tgl_lahir">
                        </div>
                        <div class="input-login  mb-4 mt-3">
                            <h5>Gender</h5>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option selected>--Pilih---</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="input-login  mb-4 mt-3">
                            <h5>Image</h5>
                            <input type="file" class="form-control" name="image_profile">
                        </div>
                        <div class="input-login  mb-4 mt-3">
                            <h5>Addres</h5>
                            <textarea name="alamat" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="input-login  mb-4 mt-3">
                            <h5>Phone Number</h5>
                            <input type="number" placeholder="Enter your Phone Number" name="nomor_telpon">
                        </div>
                        <div class="input-login">
                            <h5>Password</h5>
                            <input type="password" placeholder="Enter your password" name="password">
                        </div>
                        <div class="text-center btn-sign-up">
                            <button type="submit" name="submit_signup" class="btn-signup">Create Account</button>
                        </div>
                    </form>
                </div>
                <p class="text-center link-signup">Already have an account ? <a href="signin.php">Sign in</a></p>
            </div>
        </div>
    </main>
    <?php
    require 'views/script.php';
    ?>
    <script>
        AOS.init();
    </script>
    
    <?php
    if (isset($_POST['submit_signup'])) {
        // var_dump($_POST);
        if (register_user($_POST) > 0) {
            echo '
            <script type="text/javascript">
            swal({
                title: "Berhasil",
                text: "Berhasil Register",
                icon: "success",
                showConfirmButton: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    window.location.replace("signin.php");
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
                    window.location.replace("signup.php");
                }
            });
        </script>
        ';
        }
    }
    ?>
</body>

</html>