<?php 
include 'koneksi.php';

$pk = $_POST['no'];

$kode			= $_POST['kode_produk'];
$nama       	= $_POST['nama_produk'];
$harga  		= $_POST['harga_produk'];
$satuan			= $_POST['satuan'];
$kategori   	= $_POST['kategori'];
$url			= $_POST['url'];
$stok			= $_POST['stok_awal'];

$hasil =$koneksi->query("UPDATE `barang` SET `kode_produk`='$kode', `nama_produk`='$nama', `harga_produk`='$harga', `satuan`='$satuan', `kategori`='$kategori', `url`='$url', `stok_awal`='$stok' WHERE `barang`.`no` =$pk");

if($hasil == TRUE){
    echo '<script>alert("Berhasil mengedit data."); document.location="tambah.php";</script>';
}else {
	echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}  //Pesan jika proses simpan gagal
    
   
?>