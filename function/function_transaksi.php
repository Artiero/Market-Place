<?php
require 'global.php';

function kode_transaksi() {
    // Mendapatkan waktu saat ini dalam detik
    $timestamp = time();

    // Mendapatkan tanggal hari ini dalam format YYMMDD
    $date_string = date('ymd', $timestamp);

    // Mendapatkan nomor urut transaksi dengan memanfaatkan timestamp
    // dan memastikan nomor urut memiliki 6 digit
    $transaksi_num = substr($timestamp, -6);

    // Membuat karakter acak sepanjang 3 karakter
    $acak = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 3)), 0, 3);

    // Menggabungkan elemen-elemen tersebut untuk menghasilkan kode transaksi
    $transaksi_id = $date_string.$transaksi_num.$acak;

    return $transaksi_id;
}

function transaksi($data){

    global $conn;
    $id_produk = $data['id'];
    $kode_transaksi = kode_transaksi();
    $nama_produk = $data['produk'];
    $tgl_transaksi = date("Y-m-d");
    $jumlah_produk = $data ['jumlah_produk'];
    $username_seller = $data ['username_seller'];
    $nama_seller = $data ['nama_seller'];
    $username_user = $data ['username_user'];
    $nama_user = $data ['nama_user'];
    $harga_produk = $data['sub_harga'];
    $sub_harga = $jumlah_produk * $harga_produk;
    $kode_unik = rand(1,300);
    $total = $sub_harga + $kode_unik;
    // var_dump($tgl_transaksi);
    

    mysqli_query($conn, "INSERT INTO tbl_transaksi VALUES(
    '$kode_transaksi',
    '$tgl_transaksi',
    '$nama_produk',
    '',
    '',
    '',
    '',
    $jumlah_produk,
    $sub_harga,    
    $kode_unik,
    $total,
    '$username_user',
    '$nama_user',
    '$username_seller',
    '$nama_seller',
    'Belum Bayar'
    )");
    

    mysqli_query($conn, "UPDATE tbl_produk SET
    jumlah_produk = jumlah_produk - $jumlah_produk
    WHERE id = $id_produk ");

    // return mysqli_affected_rows($conn);
    return [mysqli_affected_rows($conn),$kode_transaksi];
    

    

}



function pembayaran($data){
    global $conn;
    $kode_transaksi = $data['kode_transaksi'];
    $nama_pengirim = $data['nama_pengirim'];
    $alamat = $data['alamat'];
    $nomor_telpon = $data['nomor_telpon'];
    if ($_FILES['img']['error'] === 4) {
        $file = ['img'];
    } else {
        $file = upload_pembayaran();
    }
    
    // var_dump($_FILES);
    mysqli_query($conn, "UPDATE tbl_transaksi SET
    img='$file',
    nama_pengirim='$nama_pengirim',
    alamat='$alamat',
    nomor_telpon='$nomor_telpon',
    status='Sudah Bayar'
    WHERE kode_transaksi='$kode_transaksi' ");
    return [mysqli_affected_rows($conn),$kode_transaksi];
}

function diterima($data){
    global $conn;
    $kode_transaksi = $data['kode_transaksi'];

    mysqli_query($conn, "UPDATE tbl_transaksi SET status='Diterima' WHERE kode_transaksi='$kode_transaksi'");
    return mysqli_affected_rows($conn);
}
