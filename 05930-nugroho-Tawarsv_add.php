<?php
include "05930-nugroho-fungsi.php";
$idmatkul=$_POST['idmatkul'];
$npp=$_POST['npp'];
$klp=$_POST['klp'];
$hari=$_POST['hari'];
$jamkul=$_POST['jamkul'];
$ruang=$_POST['ruang'];
$kapasitas=$_POST['kapasitas'];
$sql="insert kultawar values('','$idmatkul','$npp','$klp','$hari','$jamkul','$ruang','$kapasitas')";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
//header("location:05930-nugroho-Tawaradd.php");
echo "Data telah tersimpan";
?>