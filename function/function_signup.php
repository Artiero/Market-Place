<?php
require 'global.php';

function register_user($data)
{

    global $conn;
    $username = $data['username'];
    $nama = $data['nama'];
    $tempat_lahir = $data['tempat_lahir'];
    $tgl_lahir = $data['tgl_lahir'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $image_profile = upload();
    $nomor_telpon = $data['nomor_telpon'];
    $alamat = $data['alamat'];
    $password = $data['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO tbl_user 
    VALUES('$username',
    '$nama',
    '$tempat_lahir',
    '$tgl_lahir',
    '$jenis_kelamin',
    '$image_profile',
    '$nomor_telpon',
    '$alamat',
    '$hash_password',
    'unactive'
    )");
    return mysqli_affected_rows($conn);
}
