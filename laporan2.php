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
<body>
  <?php
  include ('header.php');
?>
   <center>
        <h2>Laporan</h2>
      <center>
      <form method="POST" action="ekspor1.php" enctype="multipart/form-data" >
      <section class="base">
	  <h2>Laporan Transaksi</h2>
        <div>
		
          <label>Dari Tanggal</label>
          <input type="date" name="daritanggal" autofocus="" required="" />
        </div>
        <div>
          <label>Sampai Tanggal</label>
         <input type="date" name="sampaitanggal" required=""/>
        </div>
        
        <div>
         <button type="submit">Ekspor ke Word</button>
        </div>
        </section>
      </form>
	    <form method="POST" action="" enctype="multipart/form-data" >
    
</body>
</html>