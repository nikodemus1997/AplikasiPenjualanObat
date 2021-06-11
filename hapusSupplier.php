<?php 

require 'functionsSupplier.php';

$Kode_Supplier = $_GET["Kode_Supplier"];

if(hapus($Kode_Supplier) > 0) {
	echo"
		<script>
			alert('data berhasil dihapuskan');
			document.location.href = 'IndekSupplier.php'
			</script>
			";
} else {
	echo"
		<script>
			alert('data gagal dihapuskan');
			document.location.href = 'IndekSupplier.php'
			</script>
		";
	}
 ?>