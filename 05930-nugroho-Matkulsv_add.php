<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=$_POST["idmatkul"];
$namamatkul=$_POST["namamatkul"];
$sks=$_POST["sks"];
$jnsmatkul=$_POST["jnsmatkul"];
$smt=$_POST["smt"];

// simpan data
$sql="insert matkul values('$idmatkul','$namamatkul','$sks','$jnsmatkul','$smt')";
mysqli_query($koneksi,$sql);
echo "Data telah tersimpan";
//header("location:05930-nugroho-Matkuladd.php");
?>