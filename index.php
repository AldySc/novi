<!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APLIKASI PEMBAYARAN SPP</title>
   			 </head>
 <head>
		<link rel="stylesheet" href="style.css">
</head>
<body>
 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
		if($_GET['pesan']=="belummasuk"){
			echo "<div class='alert'>Anda belum masuk, harap login terlebih dahulu !</div>";
		}
	}
	?>
 	<div class="kotak_login">
		<p class="tulisan_login"></p>
		<img src="logo.jpg" width="100%" alt="" srcset="">
<div class="card-header bg-primary text-white"></div>
						<div class="form-group">
					<center>
						<img src="NAME.jpg" width="100%" alt="" srcset="">
					</center>
					</div>
					<div class="form-group">
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 			<input type="submit" class="tombol_login" value="Login">
			<p>
			<a href="dashboardsiswa.php"> Masuk Sebagai Siswa</a>
 </p>			<br/>
			<br/>
			<center>
				
			</center>
		</form>
		
	</div>
 
 
</body>
</html>