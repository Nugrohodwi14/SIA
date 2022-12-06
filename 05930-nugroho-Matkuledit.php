<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Akademik::Edit Data Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "05930-nugroho-fungsi.php";
	require "05930-nugroho-head.html";
	$idmatkul=$_GET['kode'];
	$sql="select * from matkul where idmatkul='$idmatkul'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
	<h2 class="mb-3 text-center">EDIT DATA MATA KULIAH</h2>			
			<form enctype="multipart/form-data" method="post" action="05930-nugroho-Matkulsv_edit.php">
			<div class="form-group">
					<label for="idmatkul">Kode:</label>
					<input class="form-control-ku col-md-3" type="text" name="idmatkul" id="idmatkul" value="<?php echo $row['idmatkul']?>">					
				</div>
				<div class="form-group">
					<label for="namamatkul">Nama Mata Kuliah :</label>
					<input class="form-control" type="text" name="namamatkul" id="namamatkul" value="<?php echo $row['namamatkul']?>">
				</div>
				<div class="form-group">
					<label for="sks">SKS:</label>
					<select class="form-control" name="sks" id="sks">
					<option value=''>Pilih SKS  
					<?php
					for($i=1;$i<=6;$i++){
						if ($i==$row['sks']){
							echo "<option value=$i selected>$i";
						}else{
							echo "<option value=$i>$i";
						}	
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<label for="jnsmatkul">Jenis Mata Kuliah :</label> 
					<select class="form-control" name="jnsmatkul" id="jnsmatkul">
					<option value=''>Pilih Jenis 
					<?php
					$arrjnsmatkul=array('T','P','T/P');
					foreach($arrjnsmatkul as $jnsmatkul){
						if ($jnsmatkul==$row['jnsmatkul']){
							echo "<option value=$jnsmatkul selected>$jnsmatkul";
						}else{
							echo "<option value=$jnsmatkul>$jnsmatkul";
						}
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<label for="smt">Semester</label> 
					<select class="form-control" name="smt" id="smt">
					<option value=''>Pilih Semester  
					<?php
					for($i=1;$i<=8;$i++){
						if ($i==$row['smt']){
							echo "<option value=$i selected>$i";
						}else{
							echo "<option value=$i>$i";
						}
					}
					?>
					</select>
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</form>
	</div>
</body>
</html>