<?php
include "C:/xampp/htdocs/sentosa/inc/koneksi.php";

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT b.*, u.nama_user, a.nama_angkutan, br.nama_barang
            FROM bongkar b
            JOIN user u ON b.id_user = u.id_user
            JOIN angkutan a ON b.id_angkutan = a.id_angkutan
            JOIN barang br ON b.id_barang = br.id_barang
            WHERE b.id_bongkar=?";
    $stmt_cek = mysqli_prepare($koneksi, $sql_cek);
    mysqli_stmt_bind_param($stmt_cek, "s", $_GET['kode']);
    mysqli_stmt_execute($stmt_cek);
    $query_cek = mysqli_stmt_get_result($stmt_cek);
    if ($query_cek) {
        $data_cek = mysqli_fetch_assoc($query_cek);
    } else {
        echo "Query error: " . mysqli_error($koneksi);
    }
}

if (isset($_POST['Ubah'])) {
    $id_user = $_POST['id_user'];
    $tanggal = $_POST['tanggal'];
    $id_angkutan = $_POST['id_angkutan'];
    $no_kontainer = $_POST['no_kontainer'];
    $id_barang = $_POST['id_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $kode_bongkar = $_POST['kode_bongkar'];

    // Update query
    $sql_ubah = "UPDATE bongkar SET
     id_user=?,
     tanggal=?,
     id_angkutan=?,
     no_kontainer=?,
     id_barang=?,
     jumlah_barang=?,
     kode_bongkar=?
     WHERE id_bongkar=?";

    $stmt_ubah = mysqli_prepare($koneksi, $sql_ubah);
    mysqli_stmt_bind_param(
        $stmt_ubah,
        "ssssssss",
        $id_user,
        $tanggal,
        $id_angkutan,
        $no_kontainer,
        $id_barang,
        $jumlah_barang,
        $kode_bongkar,
        $_GET['kode']
    );

    $query_ubah = mysqli_stmt_execute($stmt_ubah);

    if ($query_ubah) {
        echo "<script>
            Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=bongkar';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=bongkar';
                }
            });
        </script>";
    }
}
?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data Bongkar</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Uploader</label>
                <div class="col-sm-3">
                    <select class="form-control" id="id_user" name="id_user">
                        <?php
                        $sql_user = "SELECT id_user, nama_user FROM user";
                        $query_user = mysqli_query($koneksi, $sql_user);

                        while ($row_user = mysqli_fetch_assoc($query_user)) {
                            $selected = ($row_user['id_user'] == $data_cek['id_user']) ? "selected" : "";
                            echo "<option value='" . $row_user['id_user'] . "' " . $selected . ">" . $row_user['nama_user'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Tanggal</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?php echo $data_cek['tanggal']; ?>"/> 
				</div>
			</div>
            
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Angkutan</label>
                <div class="col-sm-3">
                <select class="form-control" id="id_angkutan" name="id_angkutan" value="<?php echo $data_cek['nama_angkutan']; ?>"/>>
                    <?php
                    $sql_angkutan = "SELECT id_angkutan, nama_angkutan FROM angkutan";
                    $query_angkutan = mysqli_query($koneksi, $sql_angkutan);

                    while ($row_angkutan = mysqli_fetch_assoc($query_angkutan)) {
                        $selected = ($row_angkutan['id_angkutan'] == $data_cek['id_angkutan']) ? "selected" : "";
                        echo "<option value='" . $row_angkutan['id_angkutan'] . "' " . $selected . ">" . $row_angkutan['nama_angkutan'] . "</option>";
                    }
                    ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">No Kontainer</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="no_kontainer" name="no_kontainer"
                           value="<?php echo $data_cek['no_kontainer']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Barang</label>
                <div class="col-sm-3">
                <select class="form-control" id="id_barang" name="id_barang" value="<?php echo $data_cek['nama_barang']; ?>"/>>
                    <?php
                    $sql_barang = "SELECT id_barang, nama_barang FROM barang";
                    $query_barang = mysqli_query($koneksi, $sql_barang);

                    while ($row_barang = mysqli_fetch_assoc($query_barang)) {
                        $selected = ($row_barang['id_barang'] == $data_cek['id_barang']) ? "selected" : "";
                        echo "<option value='" . $row_barang['id_barang'] . "' " . $selected . ">" . $row_barang['nama_barang'] . "</option>";
                    }
                    ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jumlah Bongkar</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang"
                           value="<?php echo $data_cek['jumlah_barang']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Kode Bongkar</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="kode_bongkar" name="kode_bongkar"
                           value="<?php echo $data_cek['kode_bongkar']; ?>"/>
                </div>
            </div>


        </div>
       
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-warning">
            <a href="?page=bongkar" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
