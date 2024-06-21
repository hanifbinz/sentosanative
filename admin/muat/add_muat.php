<div class="card card-primary">
	<div class="card-header">
	<marquee behavior="scroll" direction="left" style="background-color: #FFFFFF; color: #FF0000; padding: 5px; font-size : 30px"><strong>TELITI SEBELUM MEMASUKAN DATA DAN FOTO</strong></marquee>

		<h3 class="card-title">
			<i class="fa fa-edit"></i> Upload Dokumentasi</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<!-- Tambahkan input hidden untuk menyimpan id_muat -->
				<input type="hidden" name="id_muat" value="<?php echo isset($_SESSION['id_muat']) ? $_SESSION['id_muat'] : ''; ?>">

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Uploader</label>
					<div class="col-sm-2">
						<select class="form-control" id="nama_user" name="nama_user" required>
							<?php
							// Tampilkan looping opsi nama_user
							$result_user = mysqli_query($koneksi, "SELECT * FROM user");
							while ($row_user = mysqli_fetch_assoc($result_user)) {
								echo '<option value="' . $row_user['id_user'] . '">' . $row_user['nama_user'] . '</option>';
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
								echo '<option value="' . $row_angkutan['id_angkutan'] . '">' . $row_angkutan['nama_angkutan'] . '</option>';
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">No Mobil</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="no_mobil" name="no_mobil" placeholder="No mobil">
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
								echo '<option value="' . $row_barang['id_barang'] . '">' . $row_barang['nama_barang'] . '</option>';
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
					<label class="col-sm-4 col-form-label">No Do</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="no_do" name="no_do" placeholder="Kode muat">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Customer</label>
					<div class="col-sm-2">
						<select class="form-control" id="id_customer" name="id_customer" required>
							<?php
							// Tampilkan looping opsi nama_customer
							$result_customer = mysqli_query($koneksi, "SELECT * FROM customer");
							while ($row_customer = mysqli_fetch_assoc($result_customer)) {
								echo '<option value="' . $row_customer['id_customer'] . '">' . $row_customer['nama_customer'] . '</option>';
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Foto Mobil</label>
					<div class="col-sm-6">
						<input type="file" id="foto_mobil" name="foto_mobil" capture="environment">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Foto Bak</label>
					<div class="col-sm-6">
						<input type="file" id="foto_bak" name="foto_bak" capture="environment">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Foto Do</label>
					<div class="col-sm-6">
						<input type="file" id="foto_do" name="foto_do" capture="environment">
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

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Foto Barang3</label>
					<div class="col-sm-6">
						<input type="file" id="foto_barang3" name="foto_barang3" capture="environment">
					</div>
				</div>

			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=muat" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php

// Memastikan tidak ada error yang ditampilkan di halaman
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	if (isset($_POST['Simpan'])) {
   // Mendapatkan data dari input form
		$id_user = $_POST['nama_user'];
		$tanggal = $_POST['tanggal'];
		$id_angkutan = $_POST['nama_angkutan'];
		$no_mobil = $_POST['no_mobil'];
		$id_barang = $_POST['nama_barang'];
		$jumlah_barang = $_POST['jumlah_barang'];
		$no_do = $_POST['no_do'];
		$id_customer = $_POST['id_customer'];

    // Memeriksa apakah semua file foto telah diunggah
		$foto_mobil = $_FILES['foto_mobil']['name'];
		$foto_bak = $_FILES['foto_bak']['name'];
		$foto_do = $_FILES['foto_do']['name'];
		$foto_barang1 = $_FILES['foto_barang1']['name'];
		$foto_barang2 = $_FILES['foto_barang2']['name'];
		$foto_barang3 = $_FILES['foto_barang3']['name'];
    // Menentukan lokasi folder target untuk menyimpan file foto
		$target_folder = 'foto/';

    // Mendapatkan path lengkap untuk masing-masing foto (jika ada)
		$foto_mobil_target = $target_folder . $foto_mobil;
		$foto_bak_target = $target_folder . $foto_bak;
		$foto_do_target = $target_folder . $foto_do;
		$foto_barang1_target = $target_folder . $foto_barang1;
		$foto_barang2_target = $target_folder . $foto_barang2;
		$foto_barang3_target = $target_folder . $foto_barang3;

     // Upload file foto ke folder target (jika ada)
		if (!empty($foto_mobil)) {
			move_uploaded_file($_FILES['foto_mobil']['tmp_name'], $foto_mobil_target);
		} else {
			$foto_mobil_target = NULL;
		}

		if (!empty($foto_bak)) {
			move_uploaded_file($_FILES['foto_bak']['tmp_name'], $foto_bak_target);
		} else {
			$foto_bak_target = NULL;
		}

		if (!empty($foto_do)) {
			move_uploaded_file($_FILES['foto_do']['tmp_name'], $foto_do_target);
		} else {
			$foto_do_target = NULL;
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

		if (!empty($foto_barang3)) {
			move_uploaded_file($_FILES['foto_barang3']['tmp_name'], $foto_barang3_target);
		} else {
			$foto_barang3_target = NULL;
		}
 // Ubah query menjadi prepared statement untuk menghindari SQL injection
		
		$sql_simpan = "INSERT INTO muat (id_user, tanggal, id_angkutan, no_mobil, id_barang, jumlah_barang, id_customer,no_do, foto_mobil, foto_bak, foto_do, foto_barang1, foto_barang2,foto_barang3)
		VALUES (?, ?, ?, ?, ?, ?, ?,? , ?, ?, ?, ?, ?,?)";
		// die($sql_simpan);
		// Siapkan prepared statement
		$stmt = mysqli_prepare($koneksi, $sql_simpan) or die('error 1');




		/*$sql_simpan = "INSERT INTO muat (id_user, tanggal, id_angkutan, no_mobil, id_barang, jumlah_barang, id_customer,no_do, foto_mobil, foto_bak, foto_do, foto_barang1, foto_barang2,foto_barang3)
		VALUES ('$id_user', '$tanggal', '$id_angkutan','$no_mobil', '$id_barang', '$jumlah_barang', '$id_customer','$no_do' , '$foto_mobil_target', '$foto_bak_target', '$foto_do_target', '$foto_barang1_target', '$foto_barang2_target', '$foto_barang3_target')";*/

// Bind parameter ke prepared statement
		mysqli_stmt_bind_param($stmt, "ssssssssssssss", $id_user, $tanggal, $id_angkutan, $no_mobil, $id_barang, $jumlah_barang, $id_customer, $no_do , $foto_mobil_target, $foto_bak_target, $foto_do_target, $foto_barang1_target, $foto_barang2_target, $foto_barang3_target);
		// die($sql_simpan);
// Eksekusi prepared statement
		$query_simpan = mysqli_stmt_execute($stmt) or die(mysqli_error($koneksi));
		// die('test');
		// die($query_simpan);
    // Memeriksa apakah query INSERT berhasil dilakukan
		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=muat';
				}
				});
				</script>";
			} else {
				echo "Error: " . mysqli_error($koneksi);

				echo "<script>
				Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'index.php?page=add-muat';
					}
					});
					</script>";
				}
			}
		?>