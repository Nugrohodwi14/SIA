<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$id=$_POST["id"];
$npp=$_POST["npp"];
$namadosen=$_POST["namadosen"];
$homebase=$_POST["homebase"];
$uploadOk=1;

//membuat query
$sql="update dosen set npp='$npp',
					namadosen='$namadosen',
					homebase='$homebase'
					where id='$id'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:05930-nugroho-Dsnupdate.php");
?>