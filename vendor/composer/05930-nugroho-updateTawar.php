<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Daftar Dosen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <!-- Use fontawesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script>
    function cetak(hal) {
        var xhttp;
        var dtcetak;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                dtcetak = this.responseText;
            }
        };
        xhttp.open("GET", "05930-nugroho-DsnajaxUpdate.php?hal=" + hal, true);
        xhttp.send();
    }
    </script>
</head>

<body>
    <?php

//memanggil file berisi fungsi2 yang sering dipakai
require "05930-nugroho-fungsi.php";
require "05930-nugroho-head.html";

/*	---- cetak data per halaman ---------	*/

//--------- konfigurasi

//jumlah data per halaman
$jmlDataPerHal = 5;

//cari jumlah data
if (isset($_POST['cari'])){
	$cari   = $_POST['cari'];
	$sql    = "SELECT * FROM tbl_krs 
                LEFT JOIN mhs ON tbl_krs.id_mhs=mhs.nim
                LEFT JOIN kultawar ON tbl_krs.id_kultawar= kultawar.idkultawar
                WHERE 
                nim like'%$cari%' or
                nama like '%$cari%' or
                email like '%$cari%'";
}else{
	$sql    = " SELECT * FROM tbl_krs 
                LEFT JOIN mhs ON tbl_krs.id_mhs=mhs.nim
                LEFT JOIN kultawar ON tbl_krs.id_kultawar= kultawar.idkultawar";
}
$qry        = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
$jmlData    = mysqli_num_rows($qry);
$jmlHal     = ceil($jmlData / $jmlDataPerHal);

if (isset($_GET['hal'])){
	$halAktif   = $_GET['hal'];
}else{
	$halAktif   = 1;
}
$awalData=($jmlDataPerHal * $halAktif)-$jmlDataPerHal;

//Jika tabel data kosong
$kosong     = false;
if (!$jmlData){
	$kosong = true;
}
//data berdasar pencarian atau tidak
if (isset($_POST['cari'])){
	$cari= $_POST['cari'];
	$sql = "SELECT * FROM tbl_krs LEFT JOIN mhs ON tbl_krs.id_mhs=mhs.nim LEFT JOIN kultawar ON tbl_krs.id_kultawar= kultawar.idkultawar 
    WHERE
    mhs.nim like'%$cari%' or
    mhs.nama like '%$cari%' or
    mhs.email like '%$cari%' 
    limit $awalData,$jmlDataPerHal";
}else{
	$sql="SELECT * FROM tbl_krs 
    LEFT JOIN mhs ON tbl_krs.id_mhs=mhs.nim
    LEFT JOIN kultawar ON tbl_krs.id_kultawar=kultawar.idkultawar limit $awalData,$jmlDataPerHal";		
}
//Ambil data untuk ditampilkan
$hasil  = mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
?>
    <div class="utama">
        <h2 class="text-center">Daftar Penawaran KRS</h2>
        <div class="text-center"><a href="05930-nugroho-Krspdfprn.php" target="_blank"><span
                    class="fas fa-print">&nbsp;Print</span></a>
        </div>
        <span class="float-left">
            <a class="btn btn-success" href="05930-nugroho-addTawar.php">Tambah Data</a>
        </span>
        <span class="float-right">
            <form action="" method="post" class="form-inline">
                <button class="btn btn-success" type="submit">Cari</button>
                <input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data kuliah tawar..."
                    autofocus autocomplete="off">
            </form>
        </span>
        <br><br>
        <ul class="pagination">
            <?php
		//navigasi pagination
		//cetak navigasi back
		if ($halAktif>1){
			$back=$halAktif-1;
			echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
		}
		//cetak angka halaman
		for($i=1;$i<=$jmlHal;$i++){
			if ($i==$halAktif){
				echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
			}else{
				echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
			}	
		}
		//cetak navigasi forward
		if ($halAktif<$jmlHal){
			$forward=$halAktif+1;
			echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
		}
		?>
        </ul>
        <!-- Cetak data dengan tampilan tabel -->
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>KDMK</th>
                    <th>Mata Kuliah</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jumlah SKS</th>
                    <th>Hari / Jam</th>
                    <th>Ruang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
	//jika data tidak ada
	if ($kosong){
		?>
                <tr>
                    <th colspan="12">
                        <div class="alert alert-info alert-dismissible fade show text-center">
                            <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                            Data tidak ada
                        </div>
                    </th>
                </tr>
                <?php
	}else{	
		if($awalData==0){
			$no=$awalData+1;
		}else{
			$no=$awalData;
		}
		while($row      = mysqli_fetch_assoc($hasil)){
            $matkul     = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM matkul WHERE idmatkul='$row[idmatkul]'"));
			?>
                <tr>
                    <td><?= $no?></td>
                    <td><?= $row["idmatkul"];?></td>
                    <td><?= $matkul['namamatkul'] ;?></td>
                    <td><?= $row["nim"];?></td>
                    <td><?= $row["nama"];?></td>
                    <td><?= $matkul["sks"];?></td>
                    <td><?= $row["hari"].', '.$row['jamkul'];?></td>
                    <td><?= $row["ruang"];?></td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm"
                            href="05930-nugroho-editTawar.php?kode=<?= $row['id_krs']?>">Edit</a>
                        <a class="btn btn-outline-danger btn-sm"
                            href="05930-nugroho-hpsTawar.php?kode=<?= $row["id_krs"]?>" id="linkHps"
                            onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
                    </td>
                </tr>
                <?php 
			$no++;
		}
	}
	?>
            </tbody>
        </table>
    </div>
</body>

</html>