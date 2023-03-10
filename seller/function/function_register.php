<?php
require '../admin/function/global.php';

function register($data){

  global $conn;
  $username = $data['username'];
  $nama = $data['nama'];
  $tempat_lahir = $data['tempat_lahir'];
  $tgl_lahir = $data['tgl_lahir'];
  $jenis_kelamin = $data['jenis_kelamin'];
  $image_profile = upload();
  $nomor_telpon = $data['nomor_telpon'];
  $alamat = $data['alamat'];
  $nama_bank = $data['nama_bank'];
  $nomor_rekening = $data['nomor_rekening'];
  $jenis_bank = $data['jenis_bank'];
  $password = $data['password'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $status = $data['status'];

  mysqli_query($conn, "INSERT INTO tbl_seller 
  VALUES('$username',
  '$nama',
  '$tempat_lahir',
  '$tgl_lahir',
  '$jenis_kelamin',
  '$image_profile',
  '$nomor_telpon',
  '$alamat',
  '$nama_bank',
  '$nomor_rekening',
  '$jenis_bank',
  '$hash_password',
  'unactive'
  )");
  return mysqli_affected_rows($conn);
}
