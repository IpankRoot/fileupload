<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Download</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="konten">
		<header>
		<center>
			<h2>Halaman Upload File</h2>
		</center>
		</header>
	</div>

	<div class="menu">
	<ul>
		<li><a href="../index.php?">Kembali ke beranda</a></li>
	</ul>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" name="submit" value="Upload">
	<!-- <div class="warning">
		<center><header><h3>Maav Konten Belum dapat digunakan !!</h3></header></center>
	</div> -->
	</form>
</body>
</html>

<?php
$target_dir    = "Uploads/";//menentukan direktori dimana file tersebut akan ditempatkan
$target_file   = $target_dir.basename($_FILES['fileToUpload']['name']);//menentukan path dari file yang akan di-upload
$uploadOk      = 1;//tidak digunakan belum (akan digunakan nanti)
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//memegang ekstensi file dari file (dalam huruf kacil)
//

//Berikutnya. memriksa apakah file gambar adalah gambar sebenarnya atau gambar palsu

if (isset($_POST["submit"]))//kita akan memriksa apakah file sudah ada di folder "upload". Jika tidak, pesan kesalahan ditampilkan, dan $ uploadOk di atur ke 0
{
	print_r($_FILES['fileToUpload']['tmp_name']);
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if ($check !== false) {
		echo "<center>gambar berhasil di upload - </center>".$check["mime"].".";
		$uploadOk = 1;
	} else {
		echo "<font-color = red><center>gagal upload</center></font>";
		$uploadOk = 0;
	}
}

?>