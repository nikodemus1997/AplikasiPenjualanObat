<?php 


// koneksi database 
require 'functions.php';
// cek apakah tombol submit sudah ditekn apa belum

// ambil data di URL
$id_user = $_GET["id_user"];

//query data user berdasarkan id user
$Ubahuser= query("SELECT * FROM tbldatauser WHERE id_user=$id_user")[0];


if (isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak

	if (ubah($_POST) >0 ){
		echo "<script>
			alert('data berhasil diubah');
			document.location.href = 'datauser.php'
			</script>
		";
	} else {
		echo "<script>
			alert('data gagal diubah');
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
	<title>Edit Data User</title>
</head>
<body>
<section id="contact" class="contact mb-4">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Edit Data User</h2>
        <hr> 
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-4 text-center">
        <div class="card text-white bg-dark mb-3">
          <div class="card-body">
            <h5 class="card-title">Apotek Abdullah Farma</h5>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Omnis, tenetur.</p>
          </div>
        </div>
        <ul class="list-group">
          <li class="list-group-item"><h2>Location</h2></li>
          <li class="list-group-item">Apotek</li>
          <li class="list-group-item">Jl. Pandan Sari No.15</li>
          <li class="list-group-item">No.Hp: 0812223869</li>
          <br>
         <div class="card text-white bg-dark mb-3">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
          </div>
        </div>
        <div class="card text-white bg-dark mb-3">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
          </div>
        </div>
        </ul>
      </div>

  <div class="col-lg-6">
    <form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_user" value="<?= $Ubahuser["id_user"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $Ubahuser["gambar"]; ?>">
			<div class="form-group">
				<label for="nama_user">Nama User :</label>
				<input type="text" name="nama_user" id="nama_user"class="form-control" required value="<?= $Ubahuser["nama_user"] ?>">
			</div>
			<div class="form-group">
				<label for="email">Email :</label>
				<input type="text" name="email" id="email"class="form-control" required value="<?= $Ubahuser["email"] ?>">
			</div>
			<div class="form-group">
				<label for="level_user">level user :</label> 
				<input type="text" name="level_user" id="level_user"class="form-control"  required value="<?= $Ubahuser["level_user"] ?>">
			</div>
			<div class="form-group">
				<label for="gambar">Gambar :</label>
				<br>
				<img src="img/<?= $Ubahuser['gambar'];?>" width="150"><br>
				<input type="file" name="gambar" id="gambar">
			</div>
			<div clas="text-light bg-secondary">
			<button type="submit" name="submit" class="btn btn-dark">Kirim Pesan</button>
		</div>
		</ul>
	</form>
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