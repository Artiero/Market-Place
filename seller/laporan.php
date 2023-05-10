<?php
require '../vendor/autoload.php';
require './function/global.php';
session_start();
$username = $_SESSION['username'];
$tanggal_awal = $_POST['tanggal_start'];
$tanggal_akhir = $_POST['tanggal_end'];

$diterimas = query_data("SELECT * FROM tbl_transaksi WHERE tgl_transaksi BETWEEN $tanggal_awal AND $tanggal_akhir AND status='Diterima' AND username_seller = '$username' ORDER BY tgl_transaksi DESC");

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']); 
$laporan = '<div style="margin-bottom: 10px;
                        font-size: 30px"
                        align="center">Laporan Penjualan</div>

<table align="center" border="1" cellSpacing="0" cellPadding="10" >
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Tgl Transaksi</th>
            <th>Produk</th>
            <th>Jumlah Produk</th>
            <th>Sub Harga</th>
            <th>Kode Unik</th>
            <th>Total Harga</th>
            <th>Nama Pembeli</th>
        </tr>';
        $no = 1;
                foreach ($diterimas as $diterima) { 
                    $laporan.='
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$diterima['kode_transaksi'].'</td>
                        <td>'.tgl_indo($diterima['tgl_transaksi']).'</td>
                        <td>'.$diterima['produk'].'</td>
                        <td>'.$diterima['jumlah_produk'].'</td>
                        <td>'.rupiah($diterima['sub_harga']).'</td>
                        <td>'.$diterima['kode_unik'].'</td>
                        <td>'.rupiah($diterima['total_harga']).'</td>
                        <td>'.$diterima['nama_user'].'</td>
                    </tr>';
                    $no++;
                } $laporan.='
        
</table>';
$mpdf->WriteHTML($laporan);
$mpdf->Output();