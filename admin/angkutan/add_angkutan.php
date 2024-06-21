<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Angkutan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

		<div class="form-group row">
				<label class="col-sm-2 col-form-label">Id Angkutan</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="id_angkutan" name="id_angkutan" placeholder="Id Angkutan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Angkutan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_angkutan" name="nama_angkutan" placeholder="Nama Angkutan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Angkutan</label>
				<div class="col-sm-4">
					<select name="jenis_angkutan" id="jenis_angkutan" class="form-control">
						<option>- Pilih -</option>
						<option>Bongkar</option>
						<option>Muat</option>
					</select>
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
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=angkutan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO angkutan (id_angkutan,nama_angkutan,jenis_angkutan,jenis_barang) VALUES (
        '".$_POST['id_angkutan']."',
		'".$_POST['nama_angkutan']."',
        '".$_POST['jenis_angkutan']."',
        '".$_POST['jenis_barang']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);	

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=angkutan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-angkutan';
          }
      })</script>";
    }}
     //selesai proses simpan data
?>