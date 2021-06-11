<?php 
session_start();

if(!isset($_SESSION["login"]) ) {
	header("location:login.php");
	exit;
}

require 'functionsSupplier.php';
$tbldatasupplier = query("SELECT * FROM tbldatasupplier");

// tombol cari ditekan
if (isset($_POST["cari"]) ) {

	$tbldatasupplier = cari ($_POST["keyword"]);
}

// cek apakah tombol submit sudah ditekn apa belum
if (isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak

	if (tambah($_POST) >0 ){
		echo "
			<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'IndekSupplier.php'
			</script>
		";
	} else {
		echo "<script>
			alert('data gagal ditambahkan');
			document.location.href = 'IndekSupplier.php'
			</script>
		";
	}

}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styleimage.css">
	<title>Data Supplier</title>
</head>
<body>
<<!--Awal Tbl Tambah Data User-->
<section id="user" class="user">
<div class="container bg-dark" style="padding-top: 20px; padding-bottom: 30px; margin-top: 60px;">
    <h3 class="text-center text-light">Form Tambah Data Supplier</h3>
    <form action="" method="post" class="form-inline my-2 my-lg-0 bg-danger text-light">
		<input class="form-control mr-sm-2" type="text" name="keyword" size="28" placeholder="Search" aria-label="Search" autocomplete="off">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Search"</button>
</form>
    <hr>
    <div class="row text-light">
        <div class="col-sm-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Nama_Supplier">Nama Supplier</label>
					<input type="text" name="Nama_Supplier" id="Nama_Supplier" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Telepon">Telepon</label>
					<input type="text" name="Telepon" id="Telepon" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Alamat">Alamat</label>
					<input type="text" name="Alamat" id="Alamat" class="form-control" autocomplete="off" required >
                </div>
                <div class="form-group">
                   <label for="Kota">Kota</label>
					<input type="text" name="Kota" id="Kota" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="level_user">Kode Post</label>
					<input type="text" name="Kode_Post" id="Kode_Post" class="form-control" autocomplete="off" required>
                </div>
              		 <button type="submit" name="submit" class="btn btn-danger">Tambah Data</button>
            </form>
            <br>
		</div>
			<div class="image col-sm-6">
				<img src="img/farma.jpg" alt="" width="85%" class=" img-thumbnail">
			</div>
		<div class="col-sm-12">
			<h3>Tabel Daftar Supplier</h3>
           <table class="table table-striped table-hover dtabel"  border="2" cellpadding="10" cellspacing="0">
                <thead>
					<tr>
						<th>No.</th>
						<th>Aksi</th>
						<th>Kode</th>
						<th>Nama Supplier</th>
						<th>Telepon</th>
						<th>Alamat</th>
						<th>Kota</th>
						<th>Kode Post</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach( $tbldatasupplier as $row ) : ?>
					<tr>
						<td><?=$i; ?></td>
						<td>
							<a href="ubahSupplier.php?Kode_Supplier=<?=$row["Kode_Supplier"]; ?>"onclick="return confirm('Yakin?');" class="btn btn-success "role="button">Ubah</a>
							<a href="hapusSupplier.php?Kode_Supplier=<?=$row["Kode_Supplier"]; ?>"onclick="return confirm('Yakin?');" class="btn btn-danger" role="button">Hpus</a>
						</td>
						<td><?=$row["Kode_Supplier"]; ?></td>
						<td><?=$row["Nama_Supplier"];?></td>
						<td><?=$row["Telepon"]; ?></td>
						<td><?=$row["Alamat"] ?></td>
						<td><?=$row["Kota"]; ?></td>
						<td><?=$row["Kode_Post"]; ?></td>

					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
			     </tbody>
			 </table>
		  </div>
        </div>
    
</div>
</section>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
</body>
</html>