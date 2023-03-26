<?php
require 'global.php';
function ubah_data_profile($data)
{
    global $conn;
    $username = $data['username'];
    $nama = $data['nama'];
    $tempat_lahir = $data['tempat_lahir'];
    $tgl_lahir = $data['tgl_lahir'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $nomor_telpon = $data['nomor_telpon'];
    $alamat = $data['alamat'];
    $nama_bank = $data['nama_bank'];
    $nomor_rekening = $data['nomor_rekening'];
    $jenis_bank = $data['jenis_bank'];
    $password = $data['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $img_lama = $data['image_lama'];
    if ($_FILES['image_profile']['error'] === 4) {
        $file = $img_lama;
        // var_dump($img_lama);
    } else {
        $file = upload();
        unlink("../asset/img/$img_lama");
    }


    mysqli_query($conn, "UPDATE tbl_seller SET
    nama='$nama',
    tempat_lahir='$tempat_lahir',
    tgl_lahir='$tgl_lahir', 
    jenis_kelamin='$jenis_kelamin',
    image_profile='$file',
    nomor_telpon='$nomor_telpon',
    alamat = '$alamat',
    nama_bank = '$nama_bank',
    nomor_rekening = '$nomor_rekening',
    jenis_bank = '$jenis_bank',
    password = '$hash_password'
    
    WHERE username='$username'");
    return mysqli_affected_rows($conn);
}


?>

