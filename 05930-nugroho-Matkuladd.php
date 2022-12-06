<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Tambah Data Mata Kuliah</title>
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
		<h3>TAMBAH DATA MATA KULIAH</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form method="post" action="05930-nugroho-Matkulsv_add.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="idmatkul">Kode Mata Kuliah :</label>
				<input class="form-control" type="text" name="idmatkul" id="idmatkul" required>
			</div>
			<div class="form-group">
				<label for="namamatkul">Nama Mata Kuliah :</label>
				<input class="form-control" type="text" name="namamatkul" id="namamatkul">
			</div>
			<div class="form-group">
				<label for="sks">SKS:</label>
				<select class="form-control" name="sks" id="sks">
				<option value="">Pilih SKS</option>
					<?php
					$arrhobe=array('2','3','4','6');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>					
				</select>
			</div>
			<div class="form-group">
				<label for="jnsmatkul">Jenis Mata Kuliah:</label>
				<select class="form-control" name="jnsmatkul" id="jnsmatkul">
				<option value="">Pilih Jenis</option>
					<?php
					$arrhobe=array('T','P','T/P');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>					
				</select>
			</div>
			<div class="form-group">
				<label for="semesmtster">Semester:</label>
				<select class="form-control" name="smt" id="smt">
				<option value="">Pilih Semester</option>
					<?php
					$arrhobe=array('1','2','3','4','5','6','7','8');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>					
				</select>
			</div>    	
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>
</html>