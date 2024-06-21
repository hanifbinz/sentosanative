<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Bongkar</h3>
    </div>

    <!-- Card body -->
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
            <!-- Add Bongkar Button -->
            <div class="col-md-3">
                <a href="?page=add-bongkar" class="btn btn-primary">
                    <i class="fa fa-camera"></i> Tambah Bongkar</a>

            </div>
            <?php if ($data_level == "Admin"): ?>
            <div class="col-md-9 row">
                <form class="form" id="form_print" action="admin/bongkar/cetak_bongkar.php" method="post">
                    <table>
                        <td><input type="text" name="tgl" class="form-control"></td>
                        <td>
                        <select class="form-control" id="nama_angkutan" name="nama_angkutan" >
                            <option value="" selected disabled>Pilih Angkutan</option>
                        <?php
                            // Tampilkan looping opsi nama_angkutan
                            $result_angkutan = mysqli_query($koneksi, "SELECT * FROM angkutan");
                            while ($row_angkutan = mysqli_fetch_assoc($result_angkutan)) {
                                echo '<option value="' . $row_angkutan['nama_angkutan'] . '">' . $row_angkutan['nama_angkutan'] . '</option>';
                            }
                        ?>
                    </select>
                    </td>
                        <td><select class="form-control" id="nama_barang" name="nama_barang" >
                            <option value="" selected disabled>Pilih Barang</option>
                        <?php
                            // Tampilkan looping opsi nama_barang
                            $result_barang = mysqli_query($koneksi, "SELECT * FROM barang");
                            while ($row_barang = mysqli_fetch_assoc($result_barang)) {
                                echo '<option value="' . $row_barang['nama_barang'] . '">' . $row_barang['nama_barang'] . '</option>';
                            }
                        ?>
                    </select></td>
                    <td>
                        <button type="submit" class="btn btn-secondary"> <i class="fas fa-print"></i> Print</button>
                    </td>

                    </table>
                    
                </form>
                
            </div>
            <?php endif; ?>
            </div>
            <br>
            <script type="text/javascript">
               
            </script>

            <!-- Data Table -->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Uploader</th>
                        <th>Tanggal</th>
                        <th>Nama Angkutan</th>
                        <th>No Kontainer</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Kode Bongkar</th>
                        <th style="text-align: center;"><i class="fas fa-truck" title="Foto Pintu Kontainer"></i></th>
                        <th style="text-align: center;"><i class="fas fa-key" title="Foto Segel Kontainer"></i></th>
                        <th style="text-align: center;"><i class="fas fa-book" title="Foto Surat Jalan"></i></th>
                        <th style="text-align: center;"><i class="fas fa-box" title="Foto Barang1"></i></th>
                        <th style="text-align: center;"><i class="fas fa-box" title="Foto Barang2"></i></th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Query data from database
                    $sql = $koneksi->query("SELECT b.id_bongkar, u.nama_user, b.tanggal, a.nama_angkutan, b.no_kontainer, br.nama_barang, b.jumlah_barang, b.kode_bongkar, b.foto_kontainer, b.foto_segel, b.foto_sj, b.foto_barang1, b.foto_barang2 
                                          FROM bongkar b 
                                          INNER JOIN user u ON b.id_user = u.id_user
                                          INNER JOIN angkutan a ON b.id_angkutan = a.id_angkutan
                                          INNER JOIN barang br ON b.id_barang = br.id_barang");
                    while ($data = $sql->fetch_assoc()) {
                    ?>
                    <tr>
                        <td align="center" style="vertical-align: middle;"><?php echo $no++; ?></td>
                        <td align="center" style="vertical-align: middle;"><?php echo $data['nama_user']; ?></td>
                        <td align="center" style="vertical-align: middle;">
                            <?php
                            $tanggal_data = strtotime($data['tanggal']); // Mengubah tanggal menjadi format timestamp
                            $tanggal_format = date('d M y', $tanggal_data); // Mengubah format tanggal menjadi '10 Jun 23'
                            echo $tanggal_format;
                            ?>
                        </td>
                        <td align="center" style="vertical-align: middle;"><?php echo $data['nama_angkutan']; ?></td>
                        <td align="center" style="vertical-align: middle;"><?php echo $data['no_kontainer']; ?></td>
                        <td align="center" style="vertical-align: middle;"><?php echo $data['nama_barang']; ?></td>
                        <td align="center" style="vertical-align: middle;"><?php echo $data['jumlah_barang']; ?></td>
                        <td align="center" style="vertical-align: middle;"><?php echo $data['kode_bongkar']; ?></td>
                        <!-- Display Camera Icons if Photos Exist -->
                        <td align="center" style="vertical-align: middle;">
                            <?php
                            if (!empty($data['foto_kontainer'])) {
                                $fotoKontainerPath = '' . $data['foto_kontainer'];
                                echo '<a href="' . $fotoKontainerPath . '" title="Download" class="btn btn-success btn-sm" download>
                                        <i class="fa fa-download"></i>
                                    </a>';
                            }
                            ?>
                        </td>
                        <td align="center" style="vertical-align: middle;">
                            <?php
                            if (!empty($data['foto_segel'])) {
                                $fotoSegelPath = '' . $data['foto_segel'];
                                echo '<a href="' . $fotoSegelPath . '" title="Download" class="btn btn-success btn-sm" download>
                                        <i class="fa fa-download"></i>
                                    </a>';
                            }
                            ?>
                        </td>
                        <td align="center" style="vertical-align: middle;">
                            <?php
                            if (!empty($data['foto_sj'])) {
                                $fotoSjPath = '' . $data['foto_sj'];
                                echo '<a href="' . $fotoSjPath . '" title="Download" class="btn btn-success btn-sm" download>
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
                        <!-- Action Buttons -->
                        <td>
                            <a href="?page=edit-bongkar&kode=<?php echo $data['id_bongkar']; ?>" title="Ubah" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="?page=del-bongkar&kode=<?php echo $data['id_bongkar']; ?>" onclick="return confirm('Apakah Anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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
    <!-- /.card-body -->
</div>
