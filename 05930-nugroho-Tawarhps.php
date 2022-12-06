<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_GET["kode"];

//membuat query hapus data
$sql="delete from kultawar where idkultawar='$id'";
mysqli_query($koneksi,$sql);
header("location:05930-nugroho-Tawarupdate.php");
?>