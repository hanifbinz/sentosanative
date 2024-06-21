<?php
		include "inc/koneksi.php";

        $sql_cek = "SELECT * FROM profil";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil Perusahaan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Perusahaan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?php echo $data_cek['nama_perusahaan']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat_perushaaan" name="alamat_perushaaan" value="<?php echo $data_cek['alamat_perushaaan']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tentang Perusahaan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="about" name="about" value="<?php echo $data_cek['about']; ?>"
					 readonly/>
				</div>
			</div>

		</div>
	</form>
</div>


