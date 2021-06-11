<?php 
session_start();

if(!isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}

require 'functionsObat.php';
$tblinputdataobat = query("SELECT * FROM tblinputdataobat");

// tombol cari ditekan
if (isset($_POST["cari"]) ) {

    $tblinputdataobat = cari ($_POST["keyword"]);
}

// cek apakah tombol submit sudah ditekn apa belum
if (isset($_POST["submit"]) ) {

    // cek apakah data berhasil di tambahkan atau tidak

    if (tambah($_POST) >0 ){
        echo "
            <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'dataobat.php'
            </script>
        ";
    } else {
        echo "<script>
            alert('data gagal ditambahkan');
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

    <title>Data Obat</title>
</head>
<link rel="stylesheet" href="assets/css/styleimage.css">
<body>
<!--Awal Tbl Tambah Data User-->
<br>
<section class="judul" id="judul">
    <h3 class="text-center text-dark">Form Input Data Obat</h3>
        <hr>
</section>
        <section id="cari" class="cari">
        <div class="container bg-dark " style="padding-top: 20px; padding-bottom: 30px; margin-top: 60px;">
            <form action="" method="post" class="form-inline my-2 my-lg-0 text-light">
                <input class="form-control mr-sm-2" type="text" name="keyword" size="28" placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Search"</button>
        </form>
        </div>
        </section>
<section id="user" class="user">
    <div class="container bg-whith" style="padding-top: 20px; padding-bottom: 30px; margin-top: 5px;">
    <div class="row text-dark">
        <div class="col-sm-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Kode_Obat">Kode Obat</label>
                    <input type="text" name="Kode_Obat" id="Kode_Obat" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Nama_Obat">Nama Obat</label>
                    <input type="text" name="Nama_Obat" id="Nama_Obat" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Jenis_Obat">Jenis Obat</label>
                    <input type="text" name="Jenis_Obat" id="Jenis_Obat" class="form-control" autocomplete="off" required >
                </div>
                <div class="form-group">
                   <label for="Satuan">Satuan</label>
                    <input type="text" name="Satuan" id="Satuan" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Klasifikasi_Obat">Klasifikasi Obat</label>
                    <input type="text" name="Klasifikasi_Obat" id="Klasifikasi_Obat" class="form-control" autocomplete="off" required>
                </div>
                 <div class="form-group">
                    <label for="Jumlah">Jumlah</label>
                    <input type="text" name="Jumlah" id="Jumlah" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Expiret">Expiret</label>
                    <input type="text" name="Expiret" id="Expiret" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Status">Status</label>
                    <input type="text" name="Status" id="Status" class="form-control" autocomplete="off" required >
                </div>
                <div class="form-group">
                   <label for="Persediaan">Persediaan</label>
                    <input type="text" name="Persediaan" id="Persediaan" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                   <label for="Harga_Beli">Harga Beli</label>
                    <input type="text" name="Harga_Beli" id="Harga_Beli" class="form-control" autocomplete="off" required>
                </div>
                 <div class="form-group">
                   <label for="Harga_Jual">Harga Jual</label>
                    <input type="text" name="Harga_Jual" id="Harga_Jual" class="form-control" autocomplete="off" required>
                </div>
                     <button type="submit" name="submit" class="btn btn-danger">Tambah Data</button>
            </form>
            <br>
        </div>
            <div class="image col-sm-6">
                <img src="img/farma.jpg" alt="" width="100%" class=" img-thumbnail">
            </div>
        </div>
    </div>
</section>

<section id="obat" class="obat">
    <div class="container bg-dark text-light " style="padding-top: 20px; padding-bottom: 20px; margin-top: 5px;">
        <div class="col-sm-12">
            <h3>Tabel Data Obat</h3>
           <table class="table table-striped table-hover dtabel"  border="2" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Satuan</th>
                        <th>Klasifikasi</th>
                        <th>QTY</th>
                        <th>Expiret</th>
                        <th>Status</th>
                        <th>Persediaan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach( $tblinputdataobat as $row ) : ?>
                    <tr>
                        <td><?=$i; ?></td>
                        <td>
                            <a href="ubahobat.php?Id_Obat=<?=$row["Id_Obat"]; ?>"onclick="return confirm('Yakin?');" class="btn btn-success "role="button">Ubah</a>
                            <a href="hapusobat.php?Id_Obat=<?=$row["Id_Obat"]; ?>"onclick="return confirm('Yakin?');" class="btn btn-danger" role="button">Hpus</a>
                        </td>
                        <td><?=$row["Kode_Obat"]; ?></td>
                        <td><?=$row["Nama_Obat"];?></td>
                        <td><?=$row["Jenis_Obat"]; ?></td>
                        <td><?=$row["Satuan"] ?></td>
                        <td><?=$row["Klasifikasi_Obat"]; ?></td>
                        <td><?=$row["Jumlah"]; ?></td>
                        <td><?=$row["Expiret"]; ?></td>
                        <td><?=$row["Status"];?></td>
                        <td><?=$row["Persediaan"]; ?></td>
                        <td><?=$row["Harga_Beli"] ?></td>
                        <td><?=$row["Harga_Jual"]; ?></td>

                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                 </tbody>
             </table>
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