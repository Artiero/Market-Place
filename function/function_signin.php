<?php
require './admin/function/connection.php';

function signin($data)
{
    global $conn;
    $username = $data['username'];
    $password = $data['password'];
    // Perintah query sql
    $query = "SELECT * FROM tbl_user WHERE username='$username' AND status='Active'";
    $get = mysqli_query($conn, $query);
    // Mengambil jumlah baris
    $result = mysqli_num_rows($get);
    // Mengambil data
    $row_account = mysqli_fetch_assoc($get);
    if ($result === 1) {
        if (password_verify($password, $row_account['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
