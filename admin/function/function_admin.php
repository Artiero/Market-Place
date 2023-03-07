<?php
require 'connection.php';
function tambah_data_admin($data)
{
    global $conn;
    $username = $data['username'];
    $password = $data['password'];
    $nama = $data['nama'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO tbl_admin
        VALUES('$username','$hash_password','$nama')");
    return mysqli_affected_rows($conn);
}  

function hapus_data_admin($username)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_admin WHERE username='$username'");
    return mysqli_affected_rows($conn);
}

function ubah_data_admin($data)
{
    global $conn;
    $username = $data['username'];
    $nama = $data['nama'];
    $password = $data['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    if($password==''){
        mysqli_query($conn, "UPDATE tbl_admin SET nama='$nama' WHERE username='$username'");
    }else{
        mysqli_query($conn, "UPDATE tbl_admin SET nama='$nama', password='$hash_password' WHERE username='$username'");
    }
    return mysqli_affected_rows($conn);
}
?>