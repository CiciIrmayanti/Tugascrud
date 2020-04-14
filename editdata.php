	<html>

	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
			integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<style>
	body{
		font-family: COMIC Sans MS;
		font-size: 18px;
		align: center
	}
	h2 {
		font-family: COMIC Sans MS;
		font-size: 30px;
		text-align: center;

	}
	.form2{
		border: 1px solid black;
		width:50%;
		margin: 1% 30% 2% 25%;
		text-align:center;

	}
	</style>

	<body>
		<?php
include('koneksi.php');

$pk = $_GET['key'];

$hasil = $koneksi->query("SELECT * FROM `barang` WHERE `barang`.`no` = $pk");

foreach ($hasil as $d){


?>
		<div class="container">
			<form action="edit.php" method="post" class="form2">
			<h2>FORM EDIT MASTER dan Stock DATA BARANG</h2>
			<hr>
				<div class="form-group row">
					<label class="col-sm-5 col-form-label"><input type="hidden" name="no" class="form-control" size="4"
							value="<?php echo $d['no']; ?>" required>Kode Produk</label>
					<div class="col-sm-6">
						<input type="text" name="kode_produk" class="form-control" size="4"
							value="<?php echo $d['kode_produk']; ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-5 col-form-label">Nama Produk</label>
					<div class="col-sm-6">
						<input type="text" name="nama_produk" class="form-control" value="<?php echo $d['nama_produk']; ?>"
							required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-5 col-form-label">Harga Produk</label>
					<div class="col-sm-6">
						<input type="text" name="harga_produk" class="form-control"
							value="<?php echo $d['harga_produk']; ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-5 col-form-label">Satuan</label>
					<div class="col-sm-6">
						<select name="satuan" class="form-control" required>
							<option <?php if($d['satuan']=="Gelas"){echo "selected=selected";}?> value="Gelas">Gelas
							</option>
							<option <?php if($d['satuan']=="Piring"){echo "selected=selected";}?> value="Piring">Piring
							</option>
							<option <?php if($d['satuan']=="Mangkuk"){echo "selected=selected";}?> value="Mangkuk">Mangkuk
							</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-5 col-form-label">Kategori</label>
					<div class="col-sm-6">
						<select name="kategori" class="form-control" required>
							<option <?php if($d['kategori'] == "Gelas"){ echo "selected=selected"; }?> value="Makanan">
								Makanan</option>
							<option <?php if($d['kategori']=="Piring"){echo "selected=selected";}?> value="Minuman">Minuman
							</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-5 col-form-label">URL Gambar</label>
					<div class="col-sm-6">
						<input type="text" name="url" class="form-control" value="<?php echo $d['url']; ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-5 col-form-label">Stok Awal</label>
					<div class="col-sm-6">
						<input type="text" name="stok_awal" class="form-control" value="<?php echo $d['stok_awal']; ?>"
							required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-10 col-form-label">&nbsp;</label>
					<div class="col-sm-10">
						<input style="margin-top: 3%; width: 80%; margin-left:20%" type="submit" name="edit" class="btn btn-primary" value="EDIT">
					</div>
				</div>
			</form>
			<?php } ?>
		</div>

	</body>

	</html>