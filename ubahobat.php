<?php 


// koneksi database 
require 'functionsObat.php';
// cek apakah tombol submit sudah ditekn apa belum

// ambil data di URL
$Id_Obat = $_GET["Id_Obat"];

//query data user berdasarkan id user
$Ubahobat= query("SELECT * FROM tblinputdataobat WHERE Id_Obat=$Id_Obat")[0];


if (isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak

	if (ubah($_POST) >0 ){
		echo "<script>
			alert('data berhasil diubah');
			document.location.href = 'dataobat.php'
			</script>
		";
	} else {
		echo "<script>
			alert('data gagal diubah');
			document.location.href = 'dataobat.php'
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
	<title>Edit Data Obat</title>
<link href="assets/css/styleobat.css" rel="stylesheet">
</head>
<body>
<section id="contact" class="contact mb-4">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Edit Data Obat</h2>
        <hr> 
      </div>
    </div>

    <div class="container row justify-content-center ">
      <div class="col-lg-4 text-center">
        <div class="card text-white bg-dark mb-3">
          <div class="card-body">
            <h5 class="card-title">Apotek Abdullah Farma</h5>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Omnis, tenetur.</p>
          </div>
           <div class="card text-white bg-dark">
          <div class="card-body">
             <img src="img/farma.jpg" alt="" width="100%" class=" img-thumbnail">
          </div>
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
        </ul>
      </div>

  <div class="col-lg-4">
    <form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="Id_Obat" value="<?= $Ubahobat["Id_Obat"]; ?>">
			<div class="form-group">
				<label for="Kode_Obat">Kode Obat</label>
        <input type="text" name="Kode_Obat" id="Kode_Obat" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Kode_Obat"] ?>">
			</div>
			<div class="form-group">
				 <label for="Nama_Obat">Nama Obat</label>
          <input type="text" name="Nama_Obat" id="Nama_Obat" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Nama_Obat"] ?>">
			</div>
			<div class="form-group">
				<label for="Jenis_Obat">Jenis Obat</label>
        <input type="text" name="Jenis_Obat" id="Jenis_Obat" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Jenis_Obat"] ?>">
			</div>
			<div class="form-group">
				<label for="Satuan">Satuan</label>
        <input type="text" name="Satuan" id="Satuan" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Satuan"] ?>"> 
			</div>
      <div class="form-group">
         <label for="Klasifikasi_Obat">Klasifikasi Obat</label>
        <input type="text" name="Klasifikasi_Obat" id="Klasifikasi_Obat" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Klasifikasi_Obat"] ?>"> 
      </div>
      <div class="form-group">
        <label for="Jumlah">Jumlah</label>
        <input type="text" name="Jumlah" id="Jumlah" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Jumlah"] ?>">
      </div>
      <div class="form-group">
        <label for="Expiret">Expiret</label>
        <input type="text" name="Expiret" id="Expiret" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Expiret"] ?>">
      </div>
      <div class="form-group">
        <label for="Status">Status</label>
        <input type="text" name="Status" id="Status" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Status"] ?>"> 
      </div>
      <div class="form-group">
         <label for="Persediaan">Persediaan</label>
        <input type="text" name="Persediaan" id="Persediaan" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Persediaan"] ?>"> 
      </div>  
      <div class="form-group">
         <label for="Harga_Beli">Harga Beli</label>
        <input type="text" name="Harga_Beli" id="Harga_Beli" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Harga_Beli"] ?>"> 
      </div>
      <div class="form-group">
         <label for="Harga_Jual">Harga Jual</label>
        <input type="text" name="Harga_Jual" id="Harga_Jual" class="form-control" autocomplete="off" required value="<?= $Ubahobat["Harga_Jual"] ?>"> 
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