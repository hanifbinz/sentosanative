<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Muat
        </h3>
    </div>

    <!-- Card body -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <!-- Add Muat -->
                <div class="col-md-3">
                    <a href="?page=add-muat" class="btn btn-primary">
                        <i class="fa fa-camera"></i> Tambah Muat
                    </a>
                </div>

                <?php if ($data_level == "Admin"): ?>
                    <div class="col-md-9 row">
                        <form class="form" id="form_print" action="admin/muat/cetak_muat.php" method="post">
                            <table>
                                <td><input type="text" name="tgl" class="form-control"></td>
                                <td>
                                    <select class="form-control" id="nama_angkutan" name="nama_angkutan">
                                        <option value="" selected disabled>Pilih Angkutan</option>
                                        <?php
                                        $result_angkutan = mysqli_query($koneksi, "SELECT * FROM angkutan");
                                        while ($row_angkutan = mysqli_fetch_assoc($result_angkutan)) {
                                            echo '<option value="' . $row_angkutan['nama_angkutan'] . '">' . $row_angkutan['nama_angkutan'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" id="nama_barang" name="nama_barang">
                                        <option value="" selected disabled>Pilih Barang</option>
                                        <?php
                                        $result_barang = mysqli_query($koneksi, "SELECT * FROM barang");
                                        while ($row_barang = mysqli_fetch_assoc($result_barang)) {
                                            echo '<option value="' . $row_barang['nama_barang'] . '">' . $row_barang['nama_barang'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" id="nama_customer" name="nama_customer">
                                        <option value="" selected disabled>Pilih Customer</option>
                                        <?php
                                        $result_customer = mysqli_query($koneksi, "SELECT * FROM customer");
                                        while ($row_customer = mysqli_fetch_assoc($result_customer)) {
                                            echo '<option value="' . $row_customer['nama_customer'] . '">' . $row_customer['nama_customer'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-print"></i> Print
                                    </button>
                                </td>
                            </table>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <br>

            <!-- Data Table -->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Uploader</th>
                        <th>Tanggal</th>
                        <th>Angkutan</th>
                        <th>No Mobil</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Customer</th>
                        <th>No Do</th>
                        <th style="text-align: center;"><i class="fa fa-car" title="Foto Plat Mobil"></i></th>
                        <th style="text-align: center;"><i class="fa fa-truck" title="Foto Box Truck"></i></th>
                        <th style="text-align: center;"><i class="fa fa-file" title="Foto Form Do"></i></th>
                        <th style="text-align: center;"><i class="fas fa-box" title="Foto Barang1"></i></th>
                        <th style="text-align: center;"><i class="fas fa-box" title="Foto Barang2"></i></th>
                        <th style="text-align: center;"><i class="fas fa-box" title="Foto Barang3"></i></th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Query data from database
                    $sql = $koneksi->query("SELECT b.id_muat, u.nama_user, b.tanggal, a.nama_angkutan, b.no_mobil, br.nama_barang, b.jumlah_barang, b.no_do, b.foto_mobil, b.foto_bak, b.foto_do, b.foto_barang1, b.foto_barang2, b.foto_barang3, c.nama_customer
                            FROM muat b 
                            INNER JOIN user u ON b.id_user = u.id_user
                            INNER JOIN angkutan a ON b.id_angkutan = a.id_angkutan
                            INNER JOIN barang br ON b.id_barang = br.id_barang
                            INNER JOIN customer c ON c.id_customer = b.id_customer");
                    while ($data = $sql->fetch_assoc()) {
                        ?>

                        <tr>
                            <td align="center" style="vertical-align: middle;"><?php echo $no++; ?></td>
                            <td align="center" style="vertical-align: middle;"><?php echo $data['nama_user']; ?></td>
                            <td align="center" style="vertical-align: middle;">
                                <?php
                                $tanggal_data = strtotime($data['tanggal']);
                                $tanggal_format = date('d M y', $tanggal_data);
                                echo $tanggal_format;
                                ?>
                            </td>
                            <td align="center" style="vertical-align: middle;"><?php echo $data['nama_angkutan']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?php echo $data['no_mobil']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?php echo $data['nama_barang']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?php echo $data['jumlah_barang']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?php echo $data['nama_customer']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?php echo $data['no_do']; ?></td>
                            <!-- Display Camera Icons if Photos Exist -->
                            <td align="center" style="vertical-align: middle;">
                                <?php
                                if (!empty($data['foto_mobil'])) {
                                    $fotoMobilPath = '' . $data['foto_mobil'];
                                    echo '<a href="' . $fotoMobilPath . '" title="Download" class="btn btn-success btn-sm" download>
                                    <i class="fa fa-download"></i>
                                    </a>';
                                }
                                ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php
                                if (!empty($data['foto_bak'])) {
                                    $fotobakPath = '' . $data['foto_bak'];
                                    echo '<a href="' . $fotobakPath . '" title="Download" class="btn btn-success btn-sm" download>
                                    <i class="fa fa-download"></i>
                                    </a>';
                                }
                                ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php
                                if (!empty($data['foto_do'])) {
                                    $fotoDoPath = '' . $data['foto_do'];
                                    echo '<a href="' . $fotoDoPath . '" title="Download" class="btn btn-success btn-sm" download>
                                    <i class="fa fa-download"></i>
                                    </a>';
                                }
                                ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php
                                if (!empty($data['foto_barang1'])) {
                                    $fotoBarang1Path = '' . $data['foto_barang1'];
                                    echo '<a href="' . $fotoBarang1Path . '" title="Download" class="btn btn-success btn-sm" download>
                                    <i class="fa fa-download"></i>
                                    </a>';
                                }
                                ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php
                                if (!empty($data['foto_barang2'])) {
                                    $fotoBarang2Path = '' . $data['foto_barang2'];
                                    echo '<a href="' . $fotoBarang2Path . '" title="Download" class="btn btn-success btn-sm" download>
                                    <i class="fa fa-download"></i>
                                    </a>';
                                }
                                ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php
                                if (!empty($data['foto_barang3'])) {
                                    $fotoBarang3Path = '' . $data['foto_barang3'];
                                    echo '<a href="' . $fotoBarang3Path . '" title="Download" class="btn btn-success btn-sm" download>
                                    <i class="fa fa-download"></i>
                                    </a>';
                                }
                                ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <a href="?page=edit-muat&kode=<?php echo $data['id_muat']; ?>" title="Ubah" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-muat&kode=<?php echo $data['id_muat']; ?>" onclick="return confirm('Apakah Anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.card-body -->
