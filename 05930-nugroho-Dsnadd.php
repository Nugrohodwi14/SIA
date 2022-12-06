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
		<h3>TAMBAH DATA DOSEN</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>	
		<form id="faddDosen">
			<div class="form-group">
				<label for="npp2">NPP :</label>
				<input class="form-control-ku col-md-2" type="text" name="npp1" id="npp1" value="0686.11" readonly>
				<select class="form-control-ku col-md-2" name="npp2" id="npp2">
					<?php
					for($th=1990;$th<=2020;$th++){
						echo "<option value=$th>$th";
					}
					?>					
				</select>
				<input type="text" class="form-control-ku col-md-2" name="npp3" id="npp3">
			</div>
			<div class="form-group">
				<label for="namadosen">Nama Dosen :</label>
				<input class="form-control" type="text" name="namadosen" id="namadosen">
			</div>
			<div class="form-group">
				<label for="homebase">Homebase :</label>
				<select class="form-control" name="homebase" id="homebase">
					<?php
					$arrhobe=array('TIS1','SIS1','TID3');
					foreach($arrhobe as $hb){
						echo "<option value=$hb>$hb";
					}
					?>					
				</select>
			</div>
			<div>		
				<button class="btn btn-primary" type="button" name="tombsimpan" id="tombsimpan">Simpan</button>
			</div>
		</form>
	</div>
	<script>
	$(document).ready(function(){
		$("#tombsimpan").on('click', function(){
			var npp1 = $("#npp1").val();
			var npp2 = $("#npp2").val();
			var npp3 = $("#npp3").val();
			var namadosen = $("#namadosen").val();
			var homebase = $("#homebase").val();
			$.ajax({
				type	: "post",
				url 	: "05930-nugroho-Dsnsv_add.php",
				data 	: {
					npp1	: npp1,
					npp2 	: npp2,
					npp3	: npp3,
					namadosen 	: namadosen,
					homebase: homebase
				},
				success : function(data){
					$("#npp1").val('');
					$('#npp2').val('');
					$("#npp3").val('');
					$('#namadosen').val('');
					$('#homebase').val('');
					$('#success').show();
					$('#success').html(data);
				}
			});
		});
	});
	</script>	
</body>
</html>