<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=$_GET["kode"];

//membuat query hapus data
$sql="delete from matkul where idmatkul='$idmatkul'";
mysqli_query($koneksi,$sql);
header("location:05930-nugroho-Matkulupdate.php");
?>