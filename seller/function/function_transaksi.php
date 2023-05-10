<?php
require 'global.php';

function send($data)
{
    global $conn;
    $kode_transaksi = $data['kode_transaksi'];

    mysqli_query($conn, "UPDATE tbl_transaksi SET status='Pengiriman' WHERE kode_transaksi='$kode_transaksi'");
    return mysqli_affected_rows($conn);
}

function hapus_data_transaksi($data)
{
    global $conn;
    $produk = $data['produk'];
    $kode_transaksi = $data['kode_transaksi'];
    $jumlah_produk = $data['jumlah_produk'];

    mysqli_query($conn, "UPDATE tbl_produk SET
    jumlah_produk = jumlah_produk + $jumlah_produk
    WHERE nama_produk = '$produk' ");

    mysqli_query($conn, "DELETE FROM tbl_transaksi WHERE kode_transaksi='$kode_transaksi' ");

    return mysqli_affected_rows($conn);
}


?>