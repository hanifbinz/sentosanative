<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-truck"> </i>Data Angkutan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-angkutan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Angkutan</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Angkutan</th>
						<th>Nama Angkutan</th>
						<th>Jenis Angkutan</th>
						<th>Jenis Barang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from angkutan");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_angkutan']; ?>
						</td>
						<td>
							<?php echo $data['nama_angkutan']; ?>
						</td>
						<td>
							<?php echo $data['jenis_angkutan']; ?>
						</td>
						<td>
							<?php echo $data['jenis_barang']; ?>
						</td>
						<td>
							<a href="?page=edit-angkutan&kode=<?php echo $data['id_angkutan']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-angkutan&kode=<?php echo $data['id_angkutan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->