<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Edit Data KRS</title>>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body onload="kode_klp_klik()">
    <?php 
	require "05930-nugroho-head.html";
	require "05930-nugroho-fungsi.php";

	$id		= $_GET['kode'];
	$sql	= "SELECT * FROM tbl_krs 
                LEFT JOIN mhs ON tbl_krs.id_mhs=mhs.nim
                LEFT JOIN kultawar ON tbl_krs.id_kultawar=kultawar.idkultawar WHERE id_krs='$id'";
	$qry	= mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
	$data	= mysqli_fetch_assoc($qry);
	?>
    <div class="utama">
        <h2 class="mb-3 text-center" style="margin-top: 2cm;">EDIT PENAWARAN KRS</h2>
        <form action="05930-nugroho-sv_editTawar.php?kode=<?= $id;?>" method="post">
            <div class="form-group">
                <label for="namadosen">Nama Mahasiswa :</label>
                <select class="form-control" id="mahasiswa" name="mahasiswa">
                    <?php
						$mhs		= mysqli_query($koneksi,"SELECT * FROM mhs");
						while($row 	= mysqli_fetch_assoc($mhs)) {
                            if($row['nim']===$data['nim']){
                                $select = 'SELECTED';
                            }else{
                                $select = '';
                            };?>
                    <option value="<?= $row['nim'];?>" <?= $select ;?>> <?= $row['nim'] . ' || ' . $row['nama'];?>
                    </option>
                    <?php } ;?>
                </select>
            </div>

            <div class="form-group">
                <label for="kultawar">Kuliah Tawar :</label>
                <select class="form-control" id="kultawar" name="kultawar">

                    <?php
						$mhs		= mysqli_query($koneksi,"SELECT * FROM kultawar LEFT JOIN matkul ON kultawar.idmatkul=matkul.idmatkul");
						while($row 	= mysqli_fetch_assoc($mhs)) {
                            if($row['idkultawar'] === $data['idkultawar']){
                                $select = 'SELECTED';
                            }else{
                                $select = '';
                            }
                            ;?>
                    <option value="<?= $row['idkultawar'];?>" <?= $select ;?>>
                        <?= $row['namamatkul'] . ' || ' . $row['jamkul']. ' || Sisa : '.$row['kapasitas']. ' Orang';?>
                    </option>

                    <?php }
					;?>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</body>

</html>