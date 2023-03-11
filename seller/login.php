<?php
// session_start();
// if (isset($_SESSION['username'])) {
//     header('Location: index.php');
// }
require 'function/function_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
    require 'views/link.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <div class="card mt-5 py-5 px-5">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Login</h5>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="username" class="form-control" id="exampleInputEmail1" name="username">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" name="login" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="text-center mt-4">
                            <a href="register.php">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require 'views/script.php';
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        if (login($_POST) === true) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            echo '
        <script type="text/javascript">
            swal({
                title: "Berhasil",
                text: "Berhasil Login",
                icon: "success",
                showConfirmButton: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    window.location.replace("index.php");
                }
            });
        </script>
        ';
        } else {
            echo '
        <script type="text/javascript">
            swal({
                title: "Gagal",
                text: "Gagal Login",
                icon: "error",
                showConfirmButton: true,
            }).then(function(isConfirm){
                if(isConfirm){
                    window.location.replace("login.php");
                }
            });
        </script>
        ';
        }
    }
    ?>
</body>

</html>