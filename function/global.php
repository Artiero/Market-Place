<?php
require './admin/function/connection.php';

function query_data($data)
{
    global $conn;
    $result = mysqli_query($conn, $data);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload_pembayaran()
{
    $namaFile = $_FILES['img']['name'];
    $ukuranFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpName = $_FILES['img']['tmp_name'];
    // cek jika tidak ada gambar diupload

    if ($error === 4) {
        echo "
            <script>
                alert('Masukkan image');
            </script>
            ";
        return false;
    }
    if ($ukuranFile > 5000000) {
        echo "
            <script>
                alert('Tidak lebih dari 3mb');
            </script>
            ";
        return false;
    }
    // cek yang boleh diupload
    $ekstensiFileValid = ['jpg', 'png', 'jpeg', 'svg'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
            <script>
                alert('Upload file berekstensi jpg, png, jpeg atau svg');
            </script>
            ";
        return false;
    }
    // lolos pengecekan
    //generate
    $namaFileBaru = uniqid();
    // 8sdfi989898
    $namaFileBaru .= '.';
    // 8sdfi989898.
    $namaFileBaru .= $ekstensiFile;
    // 8sdfi989898.docx
    move_uploaded_file($tmpName, './asset/img/' . $namaFileBaru);
    return $namaFileBaru;
}

function upload()
{
    $namaFile = $_FILES['image_profile']['name'];
    $ukuranFile = $_FILES['image_profile']['size'];
    $error = $_FILES['image_profile']['error'];
    $tmpName = $_FILES['image_profile']['tmp_name'];
    // cek jika tidak ada gambar diupload

    if ($error === 4) {
        echo "
            <script>
                alert('Masukkan image');
            </script>
            ";
        return false;
    }
    if ($ukuranFile > 5000000) {
        echo "
            <script>
                alert('Tidak lebih dari 3mb');
            </script>
            ";
        return false;
    }
    // cek yang boleh diupload
    $ekstensiFileValid = ['jpg', 'png', 'jpeg', 'svg'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
            <script>
                alert('Upload file berekstensi jpg, png, jpeg atau svg');
            </script>
            ";
        return false;
    }
    // lolos pengecekan
    //generate
    $namaFileBaru = uniqid();
    // 8sdfi989898
    $namaFileBaru .= '.';
    // 8sdfi989898.
    $namaFileBaru .= $ekstensiFile;
    // 8sdfi989898.docx
    move_uploaded_file($tmpName, './asset/img/' . $namaFileBaru);
    return $namaFileBaru;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

?>