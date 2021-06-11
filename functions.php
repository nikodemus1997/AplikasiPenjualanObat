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
	$nama_user =htmlspecialchars($data ["nama_user"]);
	$email = htmlspecialchars($data ["email"]);	
	$level_user = htmlspecialchars($data ["level_user"]);

	// upload gambar 
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	//query insert data
	$query = "INSERT INTO tbldatauser VALUES ('$nama_user','$gambar','','$email','$level_user')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}

function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

// cek apakah tidak ada gambar yang diupload

	if($error === 4) {
		echo 
		"<script>
		alert('pilih gambar terlebih dahulu!');
		</script>";
		return false;	
	}

// cek apakah yg diupload adalah gambar
	$ektensiGambarValid = ['jpg','jpeg','png'];
	$ektensiGambar = explode('.',$namaFile);
	$ektensiGambar = strtolower(end($ektensiGambar));
	if (!in_array($ektensiGambar, $ektensiGambarValid))
	 {
		echo "<script>
		alert('yang anda upload bukan gambar!');
			</script>
		";
		return false;
	}


// cek jika gambar terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
		alert('Ukuran gambar terlalu besar!');
			</script>
		";
		return false;
	}

// lolos pengecekan gambar siap di upload
//generate nama gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ektensiGambar;


	move_uploaded_file($tmpname, 'img/'. $namaFileBaru);

	return $namaFileBaru;

}

//hapus
function hapus ($id_user) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tbldatauser WHERE id_user=$id_user");
	return mysqli_affected_rows($conn);
}


// Update data dari tiap elemen dalam form
	function ubah($data){
	global $conn;

	$id_user = $data["id_user"];
	$nama_user =htmlspecialchars($data ["nama_user"]);
	$email = htmlspecialchars($data ["email"]);
	$level_user = htmlspecialchars($data ["level_user"]);
	$gambarLama = htmlspecialchars($data ["gambarLama"]);

// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error']===4) {
		$gambar = $gambarLama;
	}else {
		$gambar = $upload;
	}

	//query update data
	$query = "UPDATE tbldatauser SET
				nama_user = '$nama_user',
				gambar = '$gambar',
				email = '$email',
				level_user = '$level_user'
				WHERE id_user = $id_user
			";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

}


function cari($keyword) {
	$query = "SELECT * FROM tbldatauser WHERE 
			nama_user LIKE '%$keyword%' OR 
			level_user LIKE '%$keyword%'
			";

			return query($query);
}

// registrasi
function registrasi($data){
	global $conn;

	$username =   strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);

	// cek username udah ada apa belum
	$result = mysqli_query($conn, "SELECT username FROM tbllogin WHERE username = '$username'");

	if ( mysqli_fetch_assoc($result) ){
		echo "<script>
		alert ('username sudah terdaftar')
		</script>
		";
		return false;
	}

	//cek konfirmasi password
	if ($password !== $konfirmasi_password){
		echo "<script>
		alert ('konfirmasi password tidak sesuai')
		</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru kedatabase
	mysqli_query($conn, "INSERT INTO tbllogin VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}



 ?>