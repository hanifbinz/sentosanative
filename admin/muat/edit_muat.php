<?php
// include "../../inc/koneksi.php";
$kode = $_GET['kode'];
if (isset($_GET['kode'])) {
	$sql = mysqli_query($koneksi, "SELECT * FROM muat  WHERE id_muat='$kode'");
	$data_cek = mysqli_fetch_assoc($sql);
  	// var_dump($data_cek['id_muat']);
}

if (isset($_POST['Ubah'])) {

	$id_muat = $_POST['id_muat'];
	$nama_user = $_POST['nama_user'];
	$tanggal = $_POST['tanggal'];
	$nama_angkutan = $_POST['nama_angkutan'];
	$no_mobil = $_POST['no_mobil'];
	$nama_barang = $_POST['nama_barang'];
	$jumlah_barang = $_POST['jumlah_barang'];
	$no_do = $_POST['no_do'];
	$id_customer = $_POST['id_customer'];

    // Update query
	$sql_ubah = "UPDATE muat SET
	id_user=?,
	tanggal=?,
	id_angkutan=?,
	no_mobil=?,
	id_barang=?,
	jumlah_barang=?,
	no_do=?,
	id_customer=?
	WHERE id_muat=?";

	$stmt_ubah = mysqli_prepare($koneksi, $sql_ubah);
	mysqli_stmt_bind_param(
		$stmt_ubah,
		"sssssssss",
		$nama_user,
		$tanggal,
		$nama_angkutan,
		$no_mobil,
		$nama_barang,
		$jumlah_barang,
		$no_do,
		$id_customer,
		$id_muat,
	);

	$query_ubah = mysqli_stmt_execute($stmt_ubah) or die(mysqli_report(true));
	// die('tes');
	if ($query_ubah) {
		echo "<script>
		Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=muat';
			}
			});
			</script>";
		} else {
			echo "<script>
			Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=muat';
				}
				});
				</script>";
			}
		}
		?>

		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-edit"></i> Upload Dokumentasi</h3>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="card-body">
						<!-- Tambahkan input hidden untuk menyimpan id_muat -->
						<input type="hidden" name="id_muat" value="<?php echo $kode; ?>">

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Uploader</label>
							<div class="col-sm-4">
								<select class="form-control" id="nama_user" name="nama_user" required>
									<?php
							// Tampilkan looping opsi nama_user
									$result_user = mysqli_query($koneksi, "SELECT * FROM user");
									while ($row_user = mysqli_fetch_assoc($result_user)) {
										$se = ($data_cek['id_user']==$row_user['id_user']) ? 'selected' : '' ;
										echo '<option value="' . $row_user['id_user'] . '" '.$se.'>' . $row_user['nama_user'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal</label>
							<div class="col-sm-4">
								<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required value="<?=$data_cek['tanggal']?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nama Angkutan</label>
							<div class="col-sm-4">
								<select class="form-control" id="nama_angkutan" name="nama_angkutan" required>
									<?php
							// Tampilkan looping opsi nama_angkutan
									$result_angkutan = mysqli_query($koneksi, "SELECT * FROM angkutan");
									while ($row_angkutan = mysqli_fetch_assoc($result_angkutan)) {
										$sel = ($data_cek['id_angkutan']==$row_angkutan['id_angkutan']) ? 'selected' : '' ;
										echo '<option value="' . $row_angkutan['id_angkutan'] . '" '.$sel.'>' . $row_angkutan['nama_angkutan'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">No Mobil</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="no_mobil" name="no_mobil" placeholder="No mobil" value="<?=$data_cek['no_mobil']?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nama Barang</label>
							<div class="col-sm-4">
								<select class="form-control" id="nama_barang" name="nama_barang" required>
									<?php
							// Tampilkan looping opsi nama_barang
									$result_barang = mysqli_query($koneksi, "SELECT * FROM barang");
									while ($row_barang = mysqli_fetch_assoc($result_barang)) {
										$sel = ($data_cek['id_barang']==$row_barang['id_barang']) ? 'selected' : '' ;
										echo '<option value="' . $row_barang['id_barang'] . '" '.$sel.'>' . $row_barang['nama_barang'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Jumlah Barang</label>
							<div class="col-sm-4">
								<input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" value="<?=$data_cek['jumlah_barang']?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">No Do</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="no_do" name="no_do" placeholder="Kode muat" value="<?=$data_cek['no_do']?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Customer</label>
							<div class="col-sm-4">
								<select class="form-control" id="id_customer" name="id_customer" required>
									<?php
							// Tampilkan looping opsi nama_customer
									$result_customer = mysqli_query($koneksi, "SELECT * FROM customer");
									while ($row_customer = mysqli_fetch_assoc($result_customer)) {
										$sel = ($data_cek['id_customer']==$row_customer['id_customer']) ? 'selected' : '' ;
										echo '<option value="' . $row_customer['id_customer'] . '">' . $row_customer['nama_customer'] . '</option>';
									}
									?>
								</select>
							</div>
						</div>


					</div>
					<div class="card-footer">
						<input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
						<a href="?page=muat" title="Kembali" class="btn btn-secondary">Batal</a>
					</div>
				</form>
			</div>
