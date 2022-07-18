<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// cek apakah tombol submit sudah di tekan atau belum
if(isset($_POST["submit"])){


	// ambil data dari tipa element dalam form
	
	// cek apakah data berhasil di tambahakan atau tidak
if (tambah($_POST)>0){
	echo "
	<script>
		alert('Data berhasil ditambahkan!');
		document.location.href ='index.php';
	</script>
	";
}else { 
	echo "
	<script>
		alert('Data gagal ditambahkan!');
		document.location.href ='index.php';
	</script>
	";
}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Mahasiswa</title>
</head>
	<body>

	<h1>Tambah data Mahasiswa</h1>

		<form action="" method="post" enctype="multipart/form-data">
			<ul>
				<li><label for="nim">NIM :</label>
					<input type="text" name="nim" id="nim" required>
				</li>
				<li><label for="nama">Nama :</label>
					<input type="text" name="nama" id="nama">
				</li>
				<li><label for="email">E-mail :</label>
					<input type="text" name="email" id="email">
				</li>
				<li><label for="jurusan">Jurusan :</label>
					<input type="text" name="jurusan" id="jurusan">
				</li>
				<li><label for="gambar">Gambar :</label>
					<input type="file" name="gambar" id="gambar">
				</li>
				<li>
					<button type="submit" name="submit">Tambah Data</button>
				</li>
			</ul>

		</form>
	</body>
</html>