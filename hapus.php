<?php 

require 'functions.php';

$id_user = $_GET["id_user"];

if(hapus($id_user) > 0) {
	echo"
		<script>
			alert('data berhasil dihapuskan');
			document.location.href = 'datauser.php'
			</script>
			";
} else {
	echo"
		<script>
			alert('data gagal dihapuskan');
			document.location.href = 'datauser.php'
			</script>
		";
	}
 ?>
