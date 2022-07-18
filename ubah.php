<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah di tekan atau belum
if(isset($_POST["submit"])){
	// ambil data dari tipa element dalam form
	
	// cek apakah data berhasil di ubah atau tidak
if (ubah($_POST)>0){
	echo "
	<script>
		alert('Data berhasil diubah!');
		document.location.href ='index.php';
	</script>
	";
}else { 
	echo "
	<script>
		alert('Data gagal diubah!');
		document.location.href ='index.php';
	</script>
	";
}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data Mahasiswa</title>
</head>
	<body>

	<h1>Ubah data Mahasiswa</h1>

		<form action="" method="post" enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
			<input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">
			<ul>
				<li><label for="nim">NIM :</label>
					<input type="text" name="nim" id="nim" required value="<?php echo $mhs["nim"]; ?>">
				</li>
				<li><label for="nama">Nama :</label>
					<input type="text" name="nama" id="nama" required value="<?php echo $mhs["nama"]; ?>">
				</li>
				<li><label for="email">E-mail :</label>
					<input type="text" name="email" id="email" required value="<?php echo $mhs["email"]; ?>">
				</li>
				<li><label for="jurusan">Jurusan :</label>
					<input type="text" name="jurusan" id="jurusan" required value="<?php echo $mhs["jurusan"]; ?>">
				</li>
				<li>
					<label for="gambar">Gambar :</label><br>
					<img width="50px" src="img/<?php echo $mhs["gambar"] ?>"><br>
					<input type="file" name="gambar" id="gambar">
				</li>
				<li>
					<button type="submit" name="submit">Ubah Data!</button>
				</li>
			</ul>

		</form>
	</body>
</html>