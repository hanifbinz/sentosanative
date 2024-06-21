<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Customer</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Id Customer</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_customer" name="id_customer" placeholder="Id Barang" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Customer</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Nama Customer" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat Customer</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="Alamat Customer" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email Customer / Telpon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="email_customer" name="email_customer" placeholder="Email Customer" >
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=customer" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO customer (id_customer,nama_customer,alamat_customer,email_customer) VALUES (
        '".$_POST['id_customer']."',
		'".$_POST['nama_customer']."',
        '".$_POST['alamat_customer']."',
        '".$_POST['email_customer']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);	

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=customer';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-customer';
          }
      })</script>";
    }}
     //selesai proses simpan data
?>