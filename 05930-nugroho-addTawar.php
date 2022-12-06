<?php
require "05930-nugroho-fungsi.php";
;?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Tambah Daftar Dosen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
    <?php
	require "05930-nugroho-head.html";
	?>
    <div class="utama">
        <br><br><br>
        <h3>TAMBAH DATA KRS</h3>

        <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        <form id="faddDosen">
            <div class="form-group">
                <label for="namadosen">Nama Mahasiswa :</label>
                <select class="form-control" id="mahasiswa" name="mahasiswa">
                    <option value="">-- Silahkan Pilih --</option>
                    <?php
						$mhs		= mysqli_query($koneksi,"SELECT * FROM mhs");
						while($row 	= mysqli_fetch_assoc($mhs)) {;?>
                    <option value="<?= $row['nim'];?> "> <?= $row['nim'] . ' || ' . $row['nama'];?> </option>

                    <?php }
					;?>
                </select>
            </div>
            <!-- <div class=" form-group">
                <label for="namadosen">Nama Dosen :</label>
                <select class="form-control" id="namadosen" name="namadosen">
                    <option value="">-- Silahkan Pilih --</option>
                    <?php
						$mhs		= mysqli_query($koneksi,"SELECT * FROM dosen");
						while($row 	= mysqli_fetch_assoc($mhs)) {;?>
                    <option value="<?= $row['npp'];?> "> <?= $row['npp'] . ' || ' . $row['namadosen'];?> </option>

                    <?php }
					;?>
                </select>
            </div> -->
            <div class="form-group">
                <label for="kultawar">Kuliah Tawar :</label>
                <select class="form-control" id="kultawar" name="kultawar">
                    <option value="">-- Silahkan Pilih --</option>
                    <?php
						$mhs		= mysqli_query($koneksi,"SELECT * FROM kultawar LEFT JOIN matkul ON kultawar.idmatkul=matkul.idmatkul");
						while($row 	= mysqli_fetch_assoc($mhs)) {;?>
                    <option value="<?= $row['idkultawar'];?> ">
                        <?= $row['namamatkul'] . ' || ' . $row['jamkul']. ' || Sisa : '.$row['kapasitas']. ' Orang';?>
                    </option>

                    <?php }
					;?>
                </select>
            </div>

            <div>
                <button class="btn btn-primary" type="button" name="tombsimpan" id="tombsimpan">Simpan</button>
            </div>
        </form>
    </div>
    <script>
    $(document).ready(function() {
        $("#tombsimpan").on('click', function() {
            var mahasiswa = $("#mahasiswa").val();
            var kultawar = $("#kultawar").val();
            $.ajax({
                type: "post",
                url: "05930-nugroho-sv_addTawar.php",
                data: {
                    mahasiswa: mahasiswa,
                    kultawar: kultawar
                },
                success: function(data) {
                    $("#mahasiswa").val('');
                    $('#kultawar').val('');
                    $('#success').show();
                    $('#success').html(data);
                    window.location = "05930-nugroho-updateTawar.php";
                }
            });
        });
    });
    </script>
</body>

</html>