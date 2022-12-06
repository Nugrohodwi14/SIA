<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

// Memindahkan data kiriman dari form ke var biasa
$id				= $_GET['kode'];
$mahasiswa		= $_POST['mahasiswa'];
$id_kulTawar	= $_POST['kultawar'];

// Check tbl_krs
$krs = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_krs 
LEFT JOIN mhs ON tbl_krs.id_mhs=mhs.nim
LEFT JOIN kultawar ON tbl_krs.id_kultawar=kultawar.idkultawar WHERE tbl_krs.id_kultawar	='$id'"));

if($id_kulTawar != $krs['id_krs']){
	$jadArray		= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kultawar WHERE idkultawar='$krs[id_krs]'"));
	$kapasitasBaru 	= $jadArray['kapasitas'] - 1;

	$update     = mysqli_query($koneksi, "UPDATE kultawar SET kapasitas='$kapasitasBaru' WHERE idkultawar='$id'");

	if($update){
		// Update Kapasitas Lama
		$jdArrayLama 	= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kultawar WHERE idkultawar='$id_kulTawar'"));
		$kapasitasLama	= $jdArrayLama['kapasitas']+1;

		$updateLama		= mysqli_query($koneksi, "UPDATE kultawar SET kapasitas='$kapasitasLama' WHERE idkultawar='$id_kulTawar'");
	}
}


header("location:05930-nugroho-updateTawar.php");
?>