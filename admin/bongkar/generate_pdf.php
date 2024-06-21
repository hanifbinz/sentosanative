<?php
// generate_pdf.php

require_once('tcpdf/tcpdf.php');
require_once('inc/koneksi.php'); // Pastikan ini sesuai dengan file koneksi Anda

// Mengambil data dari database berdasarkan parameter kode
if (isset($_GET['kode'])) {
    $id_bongkar = $_GET['kode'];
    $query = "SELECT * FROM bongkar WHERE id_bongkar = $id_bongkar";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Membuat instance TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Menambah halaman
        $pdf->AddPage();

        // Menambahkan konten ke dalam PDF
        $content = "
        <h1>Informasi Bongkar</h1>
        <p>Uploader / Nama User: {$row['id_user']}</p>
        <p>Tanggal: {$row['tanggal']}</p>
        <p>Nama Angkutan: {$row['id_angkutan']}</p>
        <p>No Kontainer: {$row['no_kontainer']}</p>
        <p>Nama Barang: {$row['id_barang']}</p>
        <p>Jumlah Barang: {$row['jumlah_barang']}</p>
        <img src='{$row['foto_kontainer']}' alt='Foto Kontainer'>
        <img src='{$row['foto_segel']}' alt='Foto Segel'>
        <img src='{$row['foto_sj']}' alt='Foto SJ'>
        <img src='{$row['foto_barang2']}' alt='Foto Barang 2'>
        <img src='{$row['foto_barang3']}' alt='Foto Barang 3'>
        ";

        $pdf->writeHTML($content, true, false, true, false, '');

        // Menyimpan file PDF
        $pdf->Output("Bongkar_$id_bongkar.pdf", 'D');
    }
}
?>
