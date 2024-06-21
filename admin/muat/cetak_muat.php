<?php
include "../../inc/koneksi.php";

$tgl = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
$nama_angkutan = isset($_POST['nama_angkutan']) ? $_POST['nama_angkutan'] : '';
$nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
$nama_customer = isset($_POST['nama_customer']) ? $_POST['nama_customer'] : '';

$periode = ''; // Inisialisasi variabel

if (!empty($tgl)) {
    $date = explode(" - ", $tgl);
    $p1 = date("Y-m-d", strtotime($date[0]));
    $p2 = date("Y-m-d", strtotime($date[1]));
    $and = " AND b.tanggal BETWEEN '$p1' AND '$p2' ";
    $periode = $p1.' - '.$p2;
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
    $and2 ="";
}

if (!empty($nama_customer)) {
    $and3 = " AND b.nama_customer='$nama_customer' ";
}else {
    $and3 ="";
}

$filename = 'Laporan-muat-' . date("ymdhis");
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $filename . '.xls"');
?>
<h3 class="card-title">
    <i class="fa fa-table"></i> Data Muat Periode <?php echo $periode ?></h3>
    <table   border="1" width="100%" cellspacing="0"  nowrap>
    <thead>
        <tr>
            <th>No</th>
            <th>Uploader</th>
            <th>Tanggal</th>
            <th>Angkutan</th>
            <th>No Mobil</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Customer</th>
            <th>No Do</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        // Query data from database
        $sql = $koneksi->query("SELECT b.id_muat, u.nama_user, b.tanggal, a.nama_angkutan, b.no_mobil, br.nama_barang, b.jumlah_barang, b.nama_customer, b.no_do, b.foto_mobil, b.foto_bak, b.foto_do, b.foto_barang1, b.foto_barang2, b.foto_barang3
            FROM muat b 
            INNER JOIN user u ON b.id_user = u.id_user
            INNER JOIN angkutan a ON b.id_angkutan = a.id_angkutan
            INNER JOIN barang br ON b.id_barang = br.id_barang
            INNER JOIN customer c ON b.id_customer = c.id_customer
            WHERE 1=1 $and $and1 $and2 $and3 ");
        if ($sql) {
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
                    <td align="center" style="vertical-align: middle;"><?php echo $data['no_mobil']; ?></td>
                    <td align="center" style="vertical-align: middle;"><?php echo $data['nama_barang']; ?></td>
                    <td align="center" style="vertical-align: middle;"><?php echo $data['jumlah_barang']; ?></td>
                    <td align="center" style="vertical-align: middle;"><?php echo $data['nama_customer']; ?></td>
                    <td align="center" style="vertical-align: middle;"><?php echo $data['no_do']; ?></td>
                    <!-- Display Camera Icons if Photos Exist -->
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
