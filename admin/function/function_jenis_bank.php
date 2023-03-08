<?php
require 'connection.php';

function tambah_satuan_produk($data)
{
    global $conn;
    $nama_satuan = $data['nama_satuan'];
    mysqli_query($conn, "INSERT INTO tbl_satuan_produk VALUES(NULL,'$nama_satuan')");
    return mysqli_affected_rows($conn);
}

function hapus_satuan_produk($data)
{
    global $conn;
    $id = $data;
    mysqli_query($conn, "DELETE FROM tbl_satuan_produk WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah_satuan_produk($data)
{
    global $conn;
    $id = $data['id'];
    $nama_satuan = $data['nama_satuan'];
    mysqli_query($conn, "UPDATE tbl_satuan_produk SET nama_satuan='$nama_satuan' WHERE id=$id");
    return mysqli_affected_rows($conn);
}

?>
