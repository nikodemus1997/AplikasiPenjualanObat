<?php 
//koneksi kedatabase
$conn = mysqli_connect("localhost","root","","dbpenjualanobat");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[]=$row;
	}
	return $rows;
}

// ambil data dari tiap elemen dalam form
	function tambah($data){
	global $conn;
	$Kode_Obat =htmlspecialchars($data ["Kode_Obat"]);
	$Nama_Obat = htmlspecialchars($data ["Nama_Obat"]);	
	$Jenis_Obat = htmlspecialchars($data ["Jenis_Obat"]);
	$Satuan = htmlspecialchars($data ["Satuan"]);	
	$Klasifikasi_Obat = htmlspecialchars($data ["Klasifikasi_Obat"]);
	$Jumlah =htmlspecialchars($data ["Jumlah"]);
	$Expiret = htmlspecialchars($data ["Expiret"]);	
	$Status = htmlspecialchars($data ["Status"]);
	$Persediaan = htmlspecialchars($data ["Persediaan"]);	
	$Harga_Beli = htmlspecialchars($data ["Harga_Beli"]);
	$Harga_Jual = htmlspecialchars($data ["Harga_Jual"]);
	



	//query insert data
	$query = "INSERT INTO tblinputdataobat VALUES ('$Kode_Obat','$Nama_Obat','$Jenis_Obat','$Satuan','$Klasifikasi_Obat','$Jumlah','$Expiret','$Status','$Persediaan','$Harga_Beli','$Harga_Jual','')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}

//hapus
function hapus ($Id_Obat) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tblinputdataobat WHERE Id_Obat=$Id_Obat");
	return mysqli_affected_rows($conn);
}

// Update data dari tiap elemen dalam form
	function ubah($data){
	global $conn;
	$Id_Obat = $data ["Id_Obat"];
	$Kode_Obat =htmlspecialchars($data ["Kode_Obat"]);
	$Nama_Obat = htmlspecialchars($data ["Nama_Obat"]);	
	$Jenis_Obat = htmlspecialchars($data ["Jenis_Obat"]);
	$Satuan = htmlspecialchars($data ["Satuan"]);	
	$Klasifikasi_Obat = htmlspecialchars($data ["Klasifikasi_Obat"]);
	$Jumlah =htmlspecialchars($data ["Jumlah"]);
	$Expiret = htmlspecialchars($data ["Expiret"]);	
	$Status = htmlspecialchars($data ["Status"]);
	$Persediaan = htmlspecialchars($data ["Persediaan"]);	
	$Harga_Beli = htmlspecialchars($data ["Harga_Beli"]);
	$Harga_Jual = htmlspecialchars($data ["Harga_Jual"]);


		//query update data
	$query = "UPDATE tblinputdataobat SET
				Kode_Obat = '$Kode_Obat',
				Nama_Obat = '$Nama_Obat',
				Jenis_Obat = '$Jenis_Obat',
				Satuan = '$Satuan',
				Klasifikasi_Obat = '$Klasifikasi_Obat',
				Jumlah = '$Jumlah',
				Expiret = '$Expiret',
				Status = '$Status',
				Persediaan = '$Persediaan',
				Harga_Beli = '$Harga_Beli',
				Harga_Jual = '$Harga_Jual'
				WHERE Id_Obat = $Id_Obat
			";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}
function cari($keyword) {
	$query = "SELECT * FROM tblinputdataobat WHERE 
			Nama_Obat LIKE '%$keyword%' OR 
			Kode_Obat LIKE '%$keyword%' OR
			Expiret LIKE '%$keyword%'
			";

			return query($query);
}


?>