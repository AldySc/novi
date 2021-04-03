<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
 
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="bootstrap.min.css">
	   </head>

  <?php 
 
  session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=belummasuk");
	}

	?>
	<?php
	if($_SESSION['level']=="admin"){
	?>
	
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	<div class="container">
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link " href="dashboard.php"">Halaman Utama</a></li>
				<li class="nav-item">
				<a class="nav-link " href="spp.php">Data SPP</a>			</li>
				<li class="nav-item">
				<a class="nav-link " href="kelas.php">Kelas</a>			</li>
			<li class="nav-item">
				<a class="nav-link " href="petugas.php">Pengguna</a>			</li>
				<li class="nav-item">
				<a class="nav-link " href="siswa.php">Siswa</a>			</li>
				<li class="nav-item">
				<a class="nav-link " href="transaksi2.php">Transaksi</a>			</li>
				<li class="nav-item">
				<a class="nav-link " href="laporan.php">Laporan siswa</a>			</li>
				<li class="nav-item">
				<a class="nav-link " href="laporan2.php">Laporan pembayaran</a>			</li>
			<li class="nav-item">
				<a class="nav-link " href="tentang_website.php">Tentang Website</a>			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php" onClick="return confirm('apakah anda yakin?')">Logout</a>			</li>
				
						
		</ul>
	</div>
</nav>
</div>
<h3 align="center">HALAMAN ADMIN</h3>

	<p align="center">
	<h5 align="center"> Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h5></b></p>
  
<?php 
}

else if ($_SESSION['level']=="petugas"){

   ?>
   <h1 align="center">HALAMAN PETUGAS</h1>

	<p align="center"><h5 align="center">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h5></b></p>
	
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	<div class="container">
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link " href="dashboard.php"">Halaman Petugas</a></li>
				<a class="nav-link " href="transaksi2.php">Transaksi</a>			</li>
				<li class="nav-item">
				<a class="nav-link " href="tentang_website.php">Tentang Website</a>			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php" onClick="return confirm('apakah anda yakin?')">Logout</a>			</li>
		</ul>
	</div>
</nav>
</div>
<?php 
}

 if ($_SESSION['level']=="siswa"){

   ?>
   <h1 align="center"> HALAMAN SISWA</h1>

	<p align="center"><h5 align="center">Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></h5></b></p>
	
	<div align="center"><a href="laporan.php">HISTORY TRANSAKSI PEMBAYARAN</a> 
	  
	    <a href="logout.php">LOGOUT</a> 
	  </p>
	    <?php
	}
	
	
	?>
	
    </div>

</html>