<?php
require_once __DIR__ . '/vendor/autoload.php';
require "05930-nugroho-fungsi.php";

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML('
	<!DOCTYPE html>
	<html>
	<head>
	<title>Sistem Informasi Akademik::Daftar KRS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/stylepdf.css">
	</head>
	<body>
		<h1>Daftar KRS<br>
	<sub>Sistem Informasi - Fakultas Ilmu Komputer - Universitas Dian Nuswantoro<sub><br>
	<small>Tahun Akademik 2020-2021</small></h1>
	<table>	
	<tr>
		<th>No.</th>
		<th>KDMK</th>
		<th>Mata Kuliah</th>
		<th>NIM</th>
		<th>Nama Mahasiswa</th>
		<th>Jumlah SKS</th>
		<th>Hari / Jam</th>
		<th>Ruang</th>
	</tr>
	');
$sql		= "SELECT * FROM tbl_krs 
LEFT JOIN mhs ON tbl_krs.id_mhs=mhs.nim
LEFT JOIN kultawar ON tbl_krs.id_kultawar=kultawar.idkultawar";		
$qry 		= mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$no=0;
while($row=mysqli_fetch_assoc($qry)){
	$matkul     = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM matkul WHERE idmatkul='$row[idmatkul]'"));
	$no++;
	$mpdf->WriteHTML('
	<tr>
		<td>'.$no.'</td>
		<td>'.$row["idmatkul"].'</td>
		<td>'.$matkul["namamatkul"].'</td>
		<td>'.$row["nim"].'</td>
		<td>'.$row["nama"].'</td>
		<td>'.$matkul["sks"].'</td>
		<td>'.$row["hari"].' '.$row['jamkul'].'</td>
		<td>'.$row["ruang"].'</td>
	</tr>
');
}
$mpdf->WriteHTML('</table>');
$mpdf->WriteHTML('</body>

</html>');
// Output a PDF file directly to the browser
$mpdf->Output();