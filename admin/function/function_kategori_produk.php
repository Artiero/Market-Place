<?php
require 'connection.php';

function tambah_ketegori_produk($data)
{
    global $conn;
    $nama_kategori = $data['nama_kategori'];
    mysqli_query($conn, "INSERT INTO tbl_kategori_produk VALUES(NULL,'$nama_kategori')");
    return mysqli_affected_rows($conn);
}

function hapus_ketegori_produk($data)
{
    global $conn;
    $id = $data;
    mysqli_query($conn, "DELETE FROM tbl_kategori_produk WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah_ketegori_produk($data)
{
    global $conn;
    $id = $data['id'];
    $nama_kategori = $data['nama_kategori'];
    mysqli_query($conn, "UPDATE tbl_kategori_produk SET nama_kategori='$nama_kategori' WHERE id=$id");
    return mysqli_affected_rows($conn);
}

?>
