<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-book"> </i>Data Barang</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-barang" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Barang</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Barang</th>
						<th>Nama Barang</th>
						<th>Nama Supplier</th>
						<th>Jenis Barang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from barang");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_barang']; ?>
						</td>
						<td>
							<?php echo $data['nama_barang']; ?>
						</td>
						<td>
							<?php echo $data['nama_supplier']; ?>
						</td>
						<td>
							<?php echo $data['jenis_barang']; ?>
						</td>
						<td>
							<a href="?page=edit-barang&kode=<?php echo $data['id_barang']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-barang&kode=<?php echo $data['id_barang']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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