<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"> </i>Data Customer</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-customer" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Customer</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Customer</th>
						<th>Nama Customer</th>
						<th>Alamat Customer</th>
						<th>Email Customer</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from customer");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['id_customer']; ?>
						</td>
						<td>
							<?php echo $data['nama_customer']; ?>
						</td>
						<td>
							<?php echo $data['alamat_customer']; ?>
						</td>
						<td>
							<?php echo $data['email_customer']; ?>
						</td>
						<td>
							<a href="?page=edit-customer&kode=<?php echo $data['id_customer']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-customer&kode=<?php echo $data['id_customer']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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