<?php
require '../admin/function/connection.php';

function tambah_jenis_bank($data)
{
    global $conn;
    $nama_bank = $data['nama_bank'];
    $singkatan = $data['singkatan'];
    mysqli_query($conn, "INSERT INTO tbl_jenis_bank VALUES(NULL,'$nama_bank','$singkatan')");
    return mysqli_affected_rows($conn);
}

function hapus_jenis_bank($data)
{
    global $conn;
    $id = $data;
    mysqli_query($conn, "DELETE FROM tbl_jenis_bank WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah_jenis_bank($data)
{
    global $conn;
    $id = $data['id'];
    $nama_bank = $data['nama_bank'];
    $singkatan = $data['singkatan'];
    mysqli_query($conn, "UPDATE tbl_jenis_bank SET nama_bank='$nama_bank' , singkatan='$singkatan' WHERE id=$id");
    return mysqli_affected_rows($conn);
}

?>
