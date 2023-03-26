<?php
require 'global.php';



function tambah_produk($data)
{
    global $conn;
    $nama_produk = $data['nama_produk'];
    $deskripsi_produk = $data['deskripsi_produk'];
    $jumlah_produk = $data['jumlah_produk'];
    $harga_produk = $data['harga_produk'];
    $satuan_produk = $data['satuan_produk'];
    $image_produk = upload_produk();
    $kategori_produk = $data['kategori_produk'];
    $username_seller = $data['username_seller'];

    mysqli_query($conn, "INSERT INTO tbl_produk VALUES(NULL,
    '$nama_produk',
    '$deskripsi_produk',
    $jumlah_produk,
    $harga_produk,
    '$satuan_produk',
    '$image_produk',
    '$kategori_produk',
    '$username_seller'
    )");
    return mysqli_affected_rows($conn);
}

function hapus_produk($data)
{
    global $conn;
    $id = $data['id'];
    $image_produk = $data['image_produk'];
    

    unlink("../asset/img/$image_produk");
    mysqli_query($conn, "DELETE FROM tbl_produk WHERE id=$id");

    return mysqli_affected_rows($conn);
    
}

function ubah_produk($data)
{
    global $conn;
    $id = $data['id'];
    $nama_produk = $data['nama_produk'];
    $deskripsi_produk = $data['deskripsi_produk'];
    $jumlah_produk = $data['jumlah_produk'];
    $harga_produk = $data['harga_produk'];
    $satuan_produk = $data['satuan_produk'];
    $img_lama = $data['image_lama'];
    if ($_FILES['image_produk']['error'] === 4) {
        $file = $img_lama;
        // var_dump($img_lama);
    } else {
        $file = upload_produk();
        unlink("../asset/img/$img_lama");
    }
    $kategori_produk = $data['kategori_produk'];

    mysqli_query($conn, "UPDATE tbl_produk SET
    nama_produk='$nama_produk',
    deskripsi_produk='$deskripsi_produk',
    jumlah_produk=$jumlah_produk,
    harga_produk=$harga_produk,
    satuan_produk='$satuan_produk',
    image_produk='$file',
    kategori_produk='$kategori_produk'
    WHERE id=$id");
    return mysqli_affected_rows($conn);
}

?>
