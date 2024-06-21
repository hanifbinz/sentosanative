<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Barang</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Id Barang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="Id Barang" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Supplier</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" required>
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
			<a href="?page=barang" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO barang (id_barang,nama_barang,nama_supplier,jenis_barang) VALUES (
        '".$_POST['id_barang']."',
		'".$_POST['nama_barang']."',
        '".$_POST['nama_supplier']."',
        '".$_POST['jenis_barang']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);	

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=barang';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-barang';
          }
      })</script>";
    }}
     //selesai proses simpan data
?>