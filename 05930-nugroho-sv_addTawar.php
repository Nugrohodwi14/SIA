<?php
//memanggil file pustaka fungsi
require "05930-nugroho-fungsi.php";

// Memindahkan data kiriman dari form ke var biasa
$mahasiswa  = $_POST["mahasiswa"];
$kultawar   = $_POST["kultawar"];

// Check Kapasitas Berdasar Kul Tawar
$checkKultawar  = mysqli_query($koneksi,"SELECT * FROM kultawar WHERE idkultawar='$kultawar'");
$jdArray        = mysqli_fetch_array($checkKultawar);

if($jdArray['kapasitas']>0){
    // simpan data
    $result = mysqli_query($koneksi,"insert tbl_krs values(NULL,'$mahasiswa','$kultawar')");
    if($result){
        // Update Kapasitas
        $kapasitas  = $jdArray['kapasitas']-1;
        $update     = mysqli_query($koneksi,"UPDATE kultawar SET kapasitas='$kapasitas' WHERE idkultawar='$kultawar'");
        if($update){
            echo "Data telah tersimpan";
        }else{
            echo 'Data belum berhasil disimpan';
        }
    }else{
        echo "Something Error !!!";
    }
}else{
    echo "Kapasitas Sudah Penuh Silahkan Ganti yang Lain";
}
// header("location:05930-nugroho-updateTawar.php");
?>