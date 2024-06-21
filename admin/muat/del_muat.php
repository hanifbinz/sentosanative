<?php


    $sql_cek = "select * from muat where id_muat='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek);


    $foto_mobil= $data_cek['foto_mobil'];
    if (file_exists($foto_mobil)){
        unlink($foto_mobil);
    }
     $foto_bak= $data_cek['foto_bak'];
    if (file_exists($foto_bak)){
        unlink($foto_bak);
    }
     $foto_do= $data_cek['foto_do'];
    if (file_exists($foto_do)){
        unlink($foto_do);
    }
     $foto_barang1= $data_cek['foto_barang1'];
    if (file_exists($foto_barang1)){
        unlink($foto_barang1);
    }
    $foto_barang2 =$data_cek['foto_barang2'];
    if (file_exists($foto_barang2)){
        unlink($foto_barang2);
    }

    $foto_barang3= $data_cek['foto_barang3'];
    if (file_exists($foto_barang3)){
        unlink($foto_barang3);
    }

    $sql_hapus = "DELETE FROM muat WHERE id_muat='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=muat'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=muat'
        ;}})</script>";
    }
