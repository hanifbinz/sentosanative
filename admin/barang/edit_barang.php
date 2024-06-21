<?php
// Pastikan variabel $koneksi sudah didefinisikan dan terkoneksi dengan benar
include "C:/xampp/htdocs/sentosa/inc/koneksi.php";

// Proses ambil data jika ada parameter kode yang dikirimkan
if(isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM barang WHERE id_barang='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC); // Menggunakan MYSQLI_ASSOC agar lebih bersih dan tidak perlu menggunakan index string 'nama_supplier', 'jenis_barang' saat mengakses data
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data Barang</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Id Barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="id_barang" name="id_barang"
                           value="<?php echo $data_cek['id_barang']; ?>"/>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                           value="<?php echo $data_cek['nama_barang']; ?>"/>
                </div>
            </div>

            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Supplier</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                           value="<?php echo $data_cek['nama_supplier']; ?>"/>
                </div>
            </div>

            
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Barang</label>
				<div class="col-sm-4">
					<select name="jenis_barang" id="jenis_barang" class="form-control">
						<option>- Pilih -</option>
						<option>Impor</option>
						<option>Lokal</option>
					</select>
				</div>
			</div>
            
        </div>
       
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=barang" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
// Proses ubah data jika form disubmit
if(isset($_POST['Ubah'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $nama_supplier = $_POST['nama_supplier'];
    $jenis_barang = $_POST['jenis_barang'];

    // Lakukan validasi form jika diperlukan
 
    // Query untuk melakukan UPDATE data ke database
    $sql_ubah = "UPDATE barang SET
    id_barang='$id_barang',
    nama_barang='$nama_barang',
    nama_supplier='$nama_supplier',
    jenis_barang='$jenis_barang'
    WHERE id_barang='" . $_POST['id_barang'] . "'";

    // Eksekusi query
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    // Cek hasil query
    if ($query_ubah) {
        echo "<script>
            Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=barang';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=barang';
                }
            });
        </script>";
    }
}
?>
