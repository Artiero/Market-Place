<?php
function ubah_data_user($data)
{
    global $conn;
    $username = $data['username'];
    $nama = $data['nama'];
    $nomor_telpon = $data['nomor_telpon'];
    $alamat = $data['alamat'];
    $password = $data['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    if($password==''){
        mysqli_query($conn, "UPDATE tbl_user SET
        nama='$nama',
        nomor_telpon = '$nomor_telpon',
        alamat = '$alamat'
        WHERE username='$username'");
    }else{
        mysqli_query($conn, "UPDATE tbl_user SET 
        nama='$nama',
        nomor_telpon = '$nomor_telpon',
        alamat = '$alamat',
        password='$hash_password'
        WHERE username='$username'");
    }
    return mysqli_affected_rows($conn);
}
