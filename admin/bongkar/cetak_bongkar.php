<?php
include "../../inc/koneksi.php";
$tgl = isset($_POST['tgl']) ? $_POST['tgl'] : '';
$nama_angkutan = isset($_POST['nama_angkutan']) ? $_POST['nama_angkutan'] : '';
$nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';

if (!empty($tgl)) {
    $date = explode(" - ", $tgl);
    $p1 = date("Y-m-d", strtotime($date[0]));
    $p2 = date("Y-m-d", strtotime($date[1]));
    $and = " AND b.tanggal BETWEEN '$p1' AND '$p2' ";
    $periode =  $p1.' - '.$p2;
} else {
    $and = ""; // Jika tanggal kosong, reset kondisi
}

if (!empty($nama_angkutan)) {
    $and1 = " AND a.nama_angkutan='$nama_angkutan' ";
} else {
    $and1 = ""; // Jika angkutan kosong, reset kondisi
}

if (!empty($nama_barang)) {
    $and2 = " AND br.nama_barang='$nama_barang' ";
} else {
    $and2 = ""; // Jika barang kosong, reset kondisi
}

$filename = 'Laporan-bongkar-' . date("ymdhis");
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $filename . '.xls"');
?>

<h3 class="card-title">
    <i class="fa fa-table"></i> Data Bongkar Periode <?php echo $periode ?></h3>
<!-- Data Table -->
<table   border="1" width="100%" cellspacing="0"  nowrap>
    <thead>
        <tr>
            <th>No</th>
            <th>Uploader</th>
            <th>Tanggal</th>
            <th>Nama Angkutan</th>
            <th>No Kontainer</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Kode Bongkar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        // Query data from database
        $sql = $koneksi->query("SELECT b.id_bongkar, u.nama_user, b.tanggal, a.nama_angkutan, b.no_kontainer, br.nama_barang, b.jumlah_barang, b.kode_bongkar, b.foto_kontainer, b.foto_segel, b.foto_sj, b.foto_barang1, b.foto_barang2 
          FROM bongkar b 
          LEFT JOIN user u ON b.id_user = u.id_user
          LEFT JOIN angkutan a ON b.id_angkutan = a.id_angkutan
          LEFT JOIN barang br ON b.id_barang = br.id_barang WHERE 1=1 $and $and1 $and2 ");
        while ($data = $sql->fetch_assoc()) {
        ?>
            <tr>
                <td align="center" style="vertical-align: middle;"><?php echo $no++; ?></td>
                <td align="center" style="vertical-align: middle;"><?php echo $data['nama_user']; ?></td>
                <td align="center" style="vertical-align: middle;">
                    <?php
                    $tanggal_data = strtotime($data['tanggal']); // Mengubah tanggal menjadi format timestamp
                    $tanggal_format = date('d M y', $tanggal_data); // Mengubah format tanggal menjadi '10 Jun 23'
                    echo $tanggal_format;
                    ?>
                </td>
                <td align="center" style="vertical-align: middle;"><?php echo $data['nama_angkutan']; ?></td>
                <td align="center" style="vertical-align: middle;"><?php echo $data['no_kontainer']; ?></td>
                <td align="center" style="vertical-align: middle;"><?php echo $data['nama_barang']; ?></td>
                <td align="center" style="vertical-align: middle;"><?php echo $data['jumlah_barang']; ?></td>
                <td align="center" style="vertical-align: middle;"><?php echo $data['kode_bongkar']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
