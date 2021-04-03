  <?php
  include ('header.php');
?>
<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
	<link rel="stylesheet" href="style.css" />
      </head>
<body>
<section class="base">
        <div><center><h2> Tambah Data SPP</h2></div></center>
		     <form method="POST" action="proses_tambahspp.php" enctype="multipart/form-data" >
              <div>
          <label>Tahun</label>
		  <label> <input type="text" name="tahun" autofocus="" required="" /></label>
         
        </div>
        <div>
          <label>Nominal</label>
		   <label><input type="text" name="nominal" required=""/></label>
                 </div>
        
        <div><center>
         <button type="submit">Simpan</button>
        </div></center>
        </section>
      </form>
</body>
</html>