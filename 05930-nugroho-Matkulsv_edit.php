<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=$_POST["idmatkul"];
$namamatkul=$_POST["namamatkul"];
$sks=$_POST["sks"];
$jnsmatkul=$_POST["jnsmatkul"];
$smt=$_POST["smt"];

//membuat query
$sql="update matkul set namamatkul='$namamatkul',
					    sks='$sks',
						jnsmatkul='$jnsmatkul',
						smt='$smt'
						where idmatkul='$idmatkul'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:05930-nugroho-Matkulupdate.php");
?>