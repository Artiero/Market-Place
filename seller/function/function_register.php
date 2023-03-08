<?php
require '../admin/function/connection.php';

function register($data){
  global $conn;
  $nama = $data['nama'];
  $username = $data['username'];
  $password = $data['password'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "INSERT INTO tbl_seller VALUES('$username','$hash_password','$nama','')");
  return mysqli_affected_rows($conn);
}
