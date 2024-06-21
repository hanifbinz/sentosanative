<?php
// Pastikan variabel $koneksi sudah didefinisikan dan terkoneksi dengan benar
include "C:/xampp/htdocs/sentosa/inc/koneksi.php";

// Proses ambil data jika ada parameter kode yang dikirimkan
if(isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM customer WHERE id_customer='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_ASSOC); // Menggunakan MYSQLI_ASSOC agar lebih bersih dan tidak perlu menggunakan index string 'nama_supplier', 'jenis_barang' saat mengakses data
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data Customer</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Id Customer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="id_customer" name="id_customer"
                           value="<?php echo $data_cek['id_customer']; ?>"/>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Customer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_customer" name="nama_customer"
                           value="<?php echo $data_cek['nama_customer']; ?>"/>
                </div>
            </div>

            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Customer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamat_customer" name="alamat_customer"
                           value="<?php echo $data_cek['alamat_customer']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email Customer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="email_customer" name="email_customer"
                           value="<?php echo $data_cek['email_customer']; ?>"/>
                </div>
            </div>

        </div>
       
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=customer" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
// Proses ubah data jika form disubmit
if(isset($_POST['Ubah'])) {
    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $alamat_customer = $_POST['alamat_customer'];
    $email_customer = $_POST['email_customer'];

    // Lakukan validasi form jika diperlukan
 
    // Query untuk melakukan UPDATE data ke database
    $sql_ubah = "UPDATE customer SET
    id_customer='$id_customer',
    nama_customer='$nama_customer',
    alamat_customer='$alamat_customer',
    email_customer='$email_customer'
    WHERE id_customer='" . $_POST['id_customer'] . "'";

    // Eksekusi query
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    // Cek hasil query
    if ($query_ubah) {
        echo "<script>
            Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=customer';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=customer';
                }
            });
        </script>";
    }
}
?>
