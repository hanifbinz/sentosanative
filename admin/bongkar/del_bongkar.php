<?php
if (isset($_GET['kode'])) {
    $kode = $_GET['kode'];
    $sql_cek = "SELECT * FROM bongkar WHERE id_bongkar=?";
    $stmt_cek = mysqli_prepare($koneksi, $sql_cek);
    mysqli_stmt_bind_param($stmt_cek, "s", $kode);
    mysqli_stmt_execute($stmt_cek);
    $query_cek = mysqli_stmt_get_result($stmt_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

    if ($data_cek) {
        $foto = [
            $data_cek['foto_kontainer'],
            $data_cek['foto_segel'],
            $data_cek['foto_sj'],
            $data_cek['foto_barang1'],
            $data_cek['foto_barang2']
        ];
    
        foreach ($foto as $foto_item) {
            if (!empty($foto_item) && file_exists("foto/$foto_item")) {
                unlink("foto/$foto_item");
            }
        }

        $sql_hapus = "DELETE FROM bongkar WHERE id_bongkar=?";
        $stmt_hapus = mysqli_prepare($koneksi, $sql_hapus);
        mysqli_stmt_bind_param($stmt_hapus, "s", $kode);
        $query_hapus = mysqli_stmt_execute($stmt_hapus);

        if ($query_hapus) {
            echo "<script>
            Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value) {window.location = 'index.php?page=bongkar';}});
            </script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value) {window.location = 'index.php?page=bongkar';}});
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({title: 'Data tidak ditemukan',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=bongkar';}});
        </script>";
    }
}
?>
