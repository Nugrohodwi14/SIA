<?php
// Memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

// Memindahkan data kiriman dari form ke var biasa
$id=$_GET["kode"];

// Membuat query hapus data
$sql="delete from mhs where id=$id";
mysqli_query($koneksi,"DELETE FROM tbl_krs WHERE id_krs='$id'");
echo 'Data Berhasil Di Hapus';
header("location:05930-nugroho-updateTawar.php");
?>