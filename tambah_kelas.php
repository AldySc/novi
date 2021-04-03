<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
   
  </head>
<body>
  <?php
  include ('header.php');
?>
        <section class="base">
	  <div><center><h2> Tambah Data Kelas</div></center>
		     <form method="POST" action="proses_tambahkelas.php" enctype="multipart/form-data" >
              <div>
        <div>
          <label>Nama Kelas</label>
          <input type="text" name="nama_kelas" autofocus="" required="" />
        </div>
        <div>
          <label>Kompetensi Keahlian</label>
         <input type="text" name="kompetensi_keahlian" required=""/>
        </div>
        
        <p><div><center>
         <button type="submit">Simpan</button>
        </div>
        </section>
      </form>
</body>
</html>