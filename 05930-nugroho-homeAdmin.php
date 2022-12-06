<?php session_start()?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Home Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
    <?php
//memanggil file berisi fungsi2 yang sering dipakai
require "05930-nugroho-fungsi.php";
require "05930-nugroho-head.html";

//cek logout
if (!isset($_SESSION['username'])){
	header("location:index.php");
}
?>
   <div class="utama">
	<br><br>
	<h1 class="text-center">Halaman Administrator</h1>

	<div class="container">
		<div class="container mt-5 mr-5">
		<h3>Selamat datang ADMIN di Sistem Informasi Mahasiswa</h3>
		<p>Ini adalah halaman informasi bagi mahasiswa di Universitas Dian Nuswantoro.</p>
		<hr>

		<h4>Peraturan ADMIN</h4>
		<ol>
			<li>Dilarang memeberikan akses Username dan Password pada siapapun.</li>
			<li>Wajib melakukan checking pedataan Mahasiswa Baru.</li>
			<li>Wajib melakukan update Daftar Mata Kuliah.</li>
			<li>Wajib Melakukan update Daftar Dosen Pengajar.</li>
		</ol>
		</div>
  </div>
</div>
</body>

</html>