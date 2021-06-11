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
	$Nama_Supplier =htmlspecialchars($data ["Nama_Supplier"]);
	$Telepon = htmlspecialchars($data ["Telepon"]);	
	$Alamat = htmlspecialchars($data ["Alamat"]);
	$Kota = htmlspecialchars($data ["Kota"]);	
	$Kode_Post = htmlspecialchars($data ["Kode_Post"]);


	//query insert data
	$query = "INSERT INTO tbldatasupplier VALUES ('','$Nama_Supplier','$Telepon','$Alamat','$Kota','$Kode_Post')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}

//hapus
function hapus ($Kode_Supplier) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tbldatasupplier WHERE Kode_Supplier=$Kode_Supplier");
	return mysqli_affected_rows($conn);
}

// Update data dari tiap elemen dalam form
	function ubah($data){
	global $conn;

	$Kode_Supplier = $data["Kode_Supplier"];
	$Nama_Supplier =htmlspecialchars($data ["Nama_Supplier"]);
	$Telepon = htmlspecialchars($data ["Telepon"]);
	$Alamat = htmlspecialchars($data ["Alamat"]);
	$Kota = htmlspecialchars($data ["Kota"]);
	$Kode_Post = htmlspecialchars($data ["Kode_Post"]);

		//query update data
	$query = "UPDATE tbldataSupplier SET
				Nama_Supplier = '$Nama_Supplier',
				Telepon = '$Telepon',
				Alamat = '$Alamat',
				Kota = '$Kota',
				Kode_Post = '$Kode_Post'
				WHERE Kode_Supplier = $Kode_Supplier
			";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}
function cari($keyword) {
	$query = "SELECT * FROM tbldatasupplier WHERE 
			Nama_Supplier LIKE '%$keyword%' OR 
			Kota LIKE '%$keyword%'
			";

			return query($query);
}


?>