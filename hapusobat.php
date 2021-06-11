<?php 

require 'functionsObat.php';

$Id_Obat = $_GET["Id_Obat"];

if(hapus($Id_Obat) > 0) {
	echo"
		<script>
			alert('data berhasil dihapuskan');
			document.location.href = 'dataobat.php'
			</script>
			";
} else {
	echo"
		<script>
			alert('data gagal dihapuskan');
			document.location.href = 'dataobat.php'
			</script>
		";
	}
 ?>