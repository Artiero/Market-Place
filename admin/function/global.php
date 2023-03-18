<?php
require 'connection.php';

function total_account_admin(){
    global $conn;
    $cekData = mysqli_query($conn,"SELECT*FROM tbl_admin ");
    $resultData = mysqli_num_rows($cekData);

    return $resultData;
}

function user($data){
    global $conn;
    $cekData = mysqli_query($conn,"SELECT status FROM tbl_user WHERE status='$data' ");
    $resultData = mysqli_num_rows($cekData);

    return $resultData;
}

function seller($data){
    global $conn;
    $cekData = mysqli_query($conn,"SELECT status FROM tbl_seller WHERE status='$data' ");
    $resultData = mysqli_num_rows($cekData);

    return $resultData;
}

function data($table){
    global $conn;
    $cekData = mysqli_query($conn,"SELECT * FROM $table ");
    
    $resultData = mysqli_num_rows($cekData);
    return $resultData;
}



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

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
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
    move_uploaded_file($tmpName, '../assets-cms/img/' . $namaFileBaru);
    return $namaFileBaru;
}

?>