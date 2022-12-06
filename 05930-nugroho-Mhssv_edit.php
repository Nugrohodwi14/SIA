<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_POST["id"];
$nama=$_POST["nama"];
$email=$_POST["email"];
$tanggallahir=$_POST["tanggallahir"];
$uploadOk=1;

//membuat query
$sql="update mhs set nama='$nama',
					 email='$email',
					 tanggallahir='$tanggallahir'
					 where id='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:05930-nugroho-Mhsupdate.php");
?>