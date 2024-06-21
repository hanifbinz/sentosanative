<div class="card card-primary">
    <div class="card-header">
	<marquee behavior="scroll" direction="left" style="background-color: #FFFFFF; color: #FF0000; padding: 5px; font-size : 30px"><strong>TELITI SEBELUM MEMASUKAN DATA DAN FOTO</strong></marquee>
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Upload Dokumentasi</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <!-- Tambahkan input hidden untuk menyimpan id_bongkar -->
            <input type="hidden" name="id_bongkar" value="<?php echo isset($_SESSION['id_bongkar']) ? $_SESSION['id_bongkar'] : ''; ?>">
			
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Uploader</label>
				<div class="col-sm-1">
					<select class="form-control" id="nama_user" name="nama_user" required>
						<?php
							// Tampilkan looping opsi nama_user
							$result_user = mysqli_query($koneksi, "SELECT * FROM user");
							while ($row_user = mysqli_fetch_assoc($result_user)) {
								echo '<option value="' . $row_user['nama_user'] . '">' . $row_user['nama_user'] . '</option>';
							}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Tanggal</label>
				<div class="col-sm-2">
					<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Nama Angkutan</label>
				<div class="col-sm-2">
					<select class="form-control" id="nama_angkutan" name="nama_angkutan" required>
						<?php
							// Tampilkan looping opsi nama_angkutan
							$result_angkutan = mysqli_query($koneksi, "SELECT * FROM angkutan");
							while ($row_angkutan = mysqli_fetch_assoc($result_angkutan)) {
								echo '<option value="' . $row_angkutan['nama_angkutan'] . '">' . $row_angkutan['nama_angkutan'] . '</option>';
							}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">No Kontainer</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="no_kontainer" name="no_kontainer" placeholder="No Kontainer">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Nama Barang</label>
				<div class="col-sm-2">
					<select class="form-control" id="nama_barang" name="nama_barang" required>
						<?php
							// Tampilkan looping opsi nama_barang
							$result_barang = mysqli_query($koneksi, "SELECT * FROM barang");
							while ($row_barang = mysqli_fetch_assoc($result_barang)) {
								echo '<option value="' . $row_barang['nama_barang'] . '">' . $row_barang['nama_barang'] . '</option>';
							}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Jumlah Barang</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Kode Bongkar</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="kode_bongkar" name="kode_bongkar" placeholder="Kode Bongkar">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Foto Kontainer/Angkutan</label>
				<div class="col-sm-6">
					<input type="file" id="foto_kontainer" name="foto_kontainer" capture="environment">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Foto Segel/Plat</label>
				<div class="col-sm-6">
					<input type="file" id="foto_segel" name="foto_segel" capture="environment">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Foto Sj</label>
				<div class="col-sm-6">
					<input type="file" id="foto_sj" name="foto_sj" capture="environment">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Foto Barang1</label>
				<div class="col-sm-6">
					<input type="file" id="foto_barang1" name="foto_barang1" capture="environment">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Foto Barang2</label>
				<div class="col-sm-6">
					<input type="file" id="foto_barang2" name="foto_barang2" capture="environment">
				</div>
			</div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=bongkar" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

// Memastikan tidak ada error yang ditampilkan di halaman
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['Simpan'])) {
   // Mendapatkan data dari input form
   $nama_user = $_POST['nama_user'];
   $tanggal = $_POST['tanggal'];
   $nama_angkutan = $_POST['nama_angkutan'];
   $no_kontainer = $_POST['no_kontainer'];
   $nama_barang = $_POST['nama_barang'];
   $jumlah_barang = $_POST['jumlah_barang'];
   $kode_bongkar = $_POST['kode_bongkar'];

    // Memeriksa apakah semua file foto telah diunggah
    $foto_kontainer = $_FILES['foto_kontainer']['name'];
    $foto_segel = $_FILES['foto_segel']['name'];
    $foto_sj = $_FILES['foto_sj']['name'];
    $foto_barang1 = $_FILES['foto_barang1']['name'];
    $foto_barang2 = $_FILES['foto_barang2']['name'];

    // Menentukan lokasi folder target untuk menyimpan file foto
    $target_folder = 'foto/';

    // Mendapatkan path lengkap untuk masing-masing foto (jika ada)
    $foto_kontainer_target = $target_folder . $foto_kontainer;
    $foto_segel_target = $target_folder . $foto_segel;
    $foto_sj_target = $target_folder . $foto_sj;
    $foto_barang1_target = $target_folder . $foto_barang1;
    $foto_barang2_target = $target_folder . $foto_barang2;

     // Upload file foto ke folder target (jika ada)
	 if (!empty($foto_kontainer)) {
        move_uploaded_file($_FILES['foto_kontainer']['tmp_name'], $foto_kontainer_target);
    } else {
        $foto_kontainer_target = NULL;
    }

    if (!empty($foto_segel)) {
        move_uploaded_file($_FILES['foto_segel']['tmp_name'], $foto_segel_target);
    } else {
        $foto_segel_target = NULL;
    }

    if (!empty($foto_sj)) {
        move_uploaded_file($_FILES['foto_sj']['tmp_name'], $foto_sj_target);
    } else {
        $foto_sj_target = NULL;
    }

    if (!empty($foto_barang1)) {
        move_uploaded_file($_FILES['foto_barang1']['tmp_name'], $foto_barang1_target);
    } else {
        $foto_barang1_target = NULL;
    }

    if (!empty($foto_barang2)) {
        move_uploaded_file($_FILES['foto_barang2']['tmp_name'], $foto_barang2_target);
    } else {
        $foto_barang2_target = NULL;
    }

 // Ubah query menjadi prepared statement untuk menghindari SQL injection
 $sql_simpan = "INSERT INTO bongkar (id_user, tanggal, id_angkutan, no_kontainer, id_barang, jumlah_barang, kode_bongkar, foto_kontainer, foto_segel, foto_sj, foto_barang1, foto_barang2)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Siapkan prepared statement
$stmt = mysqli_prepare($koneksi, $sql_simpan);

// Cari id_user berdasarkan nama_user yang dipilih
$result_user = mysqli_query($koneksi, "SELECT id_user FROM user WHERE nama_user = '$nama_user'");
$row_user = mysqli_fetch_assoc($result_user);
$id_user = $row_user['id_user'];

// Ambil id_angkutan dari kolom "angkutan" berdasarkan nama_angkutan yang dipilih
$result_angkutan = mysqli_query($koneksi, "SELECT id_angkutan FROM angkutan WHERE nama_angkutan = '$nama_angkutan'");
$row_angkutan = mysqli_fetch_assoc($result_angkutan);
$id_angkutan = $row_angkutan['id_angkutan'];

// Ambil id_barang dari kolom "barang" berdasarkan nama_barang yang dipilih
$result_barang = mysqli_query($koneksi, "SELECT id_barang FROM barang WHERE nama_barang = '$nama_barang'");
$row_barang = mysqli_fetch_assoc($result_barang);
$id_barang = $row_barang['id_barang'];

// Bind parameter ke prepared statement
mysqli_stmt_bind_param($stmt, "ssssssssssss", $id_user, $tanggal, $id_angkutan, $no_kontainer, $id_barang, $jumlah_barang, $kode_bongkar, $foto_kontainer_target, $foto_segel_target, $foto_sj_target, $foto_barang1_target, $foto_barang2_target);

// Eksekusi prepared statement
$query_simpan = mysqli_stmt_execute($stmt);

    // Memeriksa apakah query INSERT berhasil dilakukan
    if ($query_simpan) {
        echo "<script>
              Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.value) {
                      window.location = 'index.php?page=bongkar';
                  }
              });
              </script>";
    } else {
		echo "Error: " . mysqli_error($koneksi);

		echo "<script>
				Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=add-bongkar';
					}
				});
				</script>";
    }
}
?>