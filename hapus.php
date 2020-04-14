<?php
include "koneksi.php";

$key = $_GET['key'];

$hasil=$koneksi->query("DELETE FROM `barang` WHERE `barang`.`no` ='$key'");

if($hasil==TRUE){
    echo '<script>alert("Berhasil menghapus data."); document.location="tambah.php";</script>';
}else{
    echo '<div class="alert alert-warning">Gagal melakukan proses hapus data.</div>';
}
?>