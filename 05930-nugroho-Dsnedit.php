<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data Dosen</title>
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
	$id=$_GET['kode'];
	$sql="select * from dosen where id='$id'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA DOSEN</h2>	
		<div class="row">
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="05930-nugroho-Dsnsv_edit.php">
				<div class="form-group">
					<label for="npp">NPP:</label>
					<input class="form-control" type="text" name="npp" id="npp" value="<?php echo $row['npp']?>">
				</div>
				<div class="form-group">
					<label for="namadosen">Nama Dosen:</label>
					<input class="form-control" type="text" name="namadosen" id="namadosen" value="<?php echo $row['namadosen']?>">
				</div>
				<div class="form-group">
   					<label for="homebase">Home Base : </label>
    				<select class="form-control" id="homebase" name="homebase">
					<option value=''>Pilih Option
					<?php
						$arrhobe=array('TIS1', 'SIS1', 'TID3');
						foreach($arrhobe as $hb){
							if ($hb==$row['homebase']){
								echo "<option value=$hb selected>$hb";
							}else{
								echo "<option value=$hb>$hb";
							}	
						}
						?>	
    				</select>
  				</div>				
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $id?>">
			</form>
		</div>
		</div>
	</div>
	<script>
		$('#submit').on('click',function(){
			var id 		= $('#id').val();
			var namadosen	= $('#namadosen').val();
			var homebase 	= $('#homebase').val();
			$.ajax({
				method	: "POST",
				url		: "05930-nugroho-Dsnsv_edit.php",
				data	: {id:id, namadosen:namadosen, homebase:homebase}
			});
		});
	</script>
</body>
</html>