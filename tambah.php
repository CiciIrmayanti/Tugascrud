<?php 
    include('koneksi.php');

    if(isset($_POST['submit'])) {
    $kode			= $_POST['kode_produk'];
    $nama       	= $_POST['nama_produk'];
    $harga  		= $_POST['harga_produk'];
    $satuan			= $_POST['satuan'];
    $kategori   	= $_POST['kategori'];
    $url			= $_POST['url'];
    $stok			= $_POST['stok_awal'];

    $query = "INSERT INTO `barang`(`no`,`kode_produk`,`nama_produk`,`harga_produk`,`satuan`,`kategori`,`url`,`stok_awal`) VALUES('', '$kode', '$nama', '$harga', '$satuan', '$kategori', '$url', '$stok')";

        if(mysqli_query($koneksi, $query)){
            echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
		}else{
			echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
		}
		}
	

?>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
    </head>
    <style>
	body{
		font-family: COMIC Sans MS;
		font-size: 18px;
		align: center
	}
        .red {
        background: red;
        color: white;
        text-align: center;
    }
    .text{
        background: white;
        color: black;
        text-align: center;
    }
	h2 {
		font-family: COMIC Sans MS;
		font-size: 30px;
		text-align: center;

	}
	.form1{
		border: 1px solid black;
		width:50%;
		margin: 1% 30% 2% 25%;
		text-align:center;

	}
    </style>
    <body>
    <div class="container">
    <form action="" method="post" class="form1">
	<h2>FORM INPUT MASTER dan Stock DATA BARANG</h2>
	<hr>
			<div class="form-group row">
				<label class="col-sm-5 col-form-label">Kode Produk</label>
				<div class="col-sm-6">
					<input type="text" name="kode_produk" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-5 col-form-label">Nama Produk</label>
				<div class="col-sm-6">
					<input type="text" name="nama_produk" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-5 col-form-label">Harga Produk</label>
				<div class="col-sm-6">
					<input type="text" name="harga_produk" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-5 col-form-label">Satuan</label>
				<div class="col-sm-6">
					<select name="satuan" class="form-control" required>
						<option value="Gelas">Gelas</option>
						<option value="Piring">Piring</option>
						<option value="Mangkuk">Mangkuk</option>
					</select>
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-5 col-form-label">Kategori</label>
				<div class="col-sm-6">
					<select name="kategori" class="form-control" required>
						<option value="Minuman">Minuman</option>
						<option value="Makanan">Makanan</option>
					</select>
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-5 col-form-label">URL Gambar</label>
				<div class="col-sm-6">
					<input type="text" name="url" class="form-control" required>
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-5 col-form-label">Stok Awal</label>
				<div class="col-sm-6">
					<input type="text" name="stok_awal" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-10 col-form-label"></label>
				<div class="col-sm-10">
					<input style="margin-top: 3%; width: 80%; margin-left:20%" type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
		</form>
    </div>
    <table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>No.</th>
					<th>Kode Produk</th>
					<th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok Produk</th>
                    <th>Gambar Produk</th>
                    <th>Modify</th>
				</tr>
			</thead>
			<tbody>
			
            <?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"SELECT * FROM `barang`");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['no']; ?></td>
				<td><?php echo $d['kode_produk']; ?></td>
				<td><?php echo $d['nama_produk']; ?></td>
                <td><?php echo $d['kategori']; ?></td>
                <?php if ($d['stok_awal'] < 5) {
                 echo "<td class='red'> " . $d['stok_awal'] . "</td>";
                } else {
                  echo "<td class='text'>". $d['stok_awal'] . "</td>";
                }
                ?>
                <td><img src="<?php echo$d['url']; ?>" style="width:120px;"></td>
               
				<td>
					   <a href="editdata.php?key=<?php echo $d['no']; ?>">Edit</a>
					|| <a href="hapus.php?key=<?php echo $d['no']; ?>">Hapus</a>
				</td>
			</tr>
			<?php 
		}
		?>
			<tbody>
		</table>
		
    </body>
</html>