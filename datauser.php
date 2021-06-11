<?php 
session_start();

if(!isset($_SESSION["login"]) ) {
	header("location:login.php");
	exit;
}

require 'functions.php';
$tbldatauser = query("SELECT * FROM tbldatauser");

// tombol cari ditekan
if (isset($_POST["cari"]) ) {

	$tbldatauser = cari ($_POST["keyword"]);
}

// cek apakah tombol submit sudah ditekn apa belum
if (isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak

	if (tambah($_POST) >0 ){
		echo "
			<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'datauser.php'
			</script>
		";
	} else {
		echo "<script>
			alert('data gagal ditambahkan');
			document.location.href = 'datauser.php'
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
        <!--My CSS-->
    <style>
      section{
        min-height: 10px;
      }
    </style>
    <title>Apotek Abdullah Farma</title>

</head>
<body>
<!--Awal navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Apotek Abdullah Farma</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="tambah.php">Tambah Data User</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Input Data
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="dataobat.php">Input Data Obat</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="IndekSupplier.php">Input Data Supplier</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Transaksi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Penjualan</a>
                        <a class="dropdown-item" href="#">Pembelian</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Retur Obat</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Laporan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Penjualan</a>
                        <a class="dropdown-item" href="#">Pembelian</a>
                        <a class="dropdown-item" href="#">Persediaan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Retur Obat</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Ganti Password</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="registrasi.php">Registrasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                </li> 
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <hr>
 <!--Akhir navbar-->

 <!--Awal tampilan Profil Perusahaan-->
<section id="gambar" class="gambar">
    <div class="container pt-5 margin-top-5">
        <div class="jumbotron jumbotron-fluid ">
            <div class="container text-center">
                <div class="container"></div>
                <img src="img/farma.jpg" width="20%" class="rounded-circle  img-thumbnail border: 2px solid #800517;">
                <h2 class="display-4">Welcome</h2>
                <p class="lead">Jl. Petek No.15 Semarang</p>
            </div>
        </div>
    </div>
</section>
 <!--Akhir Tmpilan Profil Perusahaan-->

 <section id="garis" class="garis">
     <div class="col text-center">
        <h2>Tambah Data User</h2>
        <hr class="border-2">
    </div>
</section>

<<!--Awal Tbl Tambah Data User-->
<section id="user" class="user">
<div class="container bg-secondary" style="padding-top: 20px; padding-bottom: 30px; margin-top: 60px;">
    <h3 class="text-center text-light">Form Tambah Data User </h3>
    <form action="" method="post" class="form-inline my-2 my-lg-0 bg-dark text-light">
		<input class="form-control mr-sm-2" type="text" name="keyword" size="28" placeholder="Search" aria-label="Search" autocomplete="off">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Search"</button>
</form>
    <hr>
    <div class="row text-light">
        <div class="col-sm-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_user">Nama User :</label>
					<input type="text" name="nama_user" id="nama_user" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
					<input type="text" name="email" id="email" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="level_user">level user</label>
					<input type="level_user" name="level_user" id="level_user" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="gambar">Gambar</label>
					<br>
					<input type="file" name="gambar" id="gambar" class="form-control" autocomplete="off" required >
                </div>
              		 <button type="submit" name="submit" class="btn btn-danger">Tambah Data</button>
            </form>

		</div>
		<div class="col-sm-8">
			<h3>Tabel Daftar User</h3>
           <table class="table table-striped table-hover dtabel"  border="2" cellpadding="10" cellspacing="0">
                <thead>
					<tr>
						<th>No.</th>
						<th>Aksi</th>
						<th>Nama User</th>
						<th>Gambar</th>
						<th>ID User</th>
						<th>Email</th>
						<th>Level User</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach( $tbldatauser as $row ) : ?>
					<tr>
						<td><?=$i; ?></td>
						<td>
							<a href="ubah.php?id_user=<?=$row["id_user"]; ?>"onclick="return confirm('Yakin?');" class="btn btn-success "role="button">Ubah</a>
							<a href="hapus.php?id_user=<?=$row["id_user"]; ?>"onclick="return confirm('Yakin?');" class="btn btn-danger" role="button">Hpus</a>
						</td>
						<td><?=$row["nama_user"]; ?></td>
						<td><img src="img/<?= $row["gambar"];?>" width="50"></td>
						<td><?=$row["id_user"]; ?></td>
						<td><?=$row["email"] ?></td>
						<td><?=$row["level_user"]; ?></td>

					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
			     </tbody>
			 </table>
		  </div>
        </div>
    
</div>
</section>
<hr>
<!--Akhir Tbl Data User-->
<footer class="bg-dark text-white">
  <div class="container">
    <div class="row pt-3 mb-2 ">
      <div class="col text-center">
        <p>Copyright 2021</p>
      </div>
    </div>
  </div>
</footer>


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>