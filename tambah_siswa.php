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
	<style type="text/css">
     * {
      font-family: sans-serif;
	  font-size:15px;
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
	  h2 {
	  font-family: sans-serif;
        color: white;
      }
	  h3 {
	  font-family: sans-serif;
        text-transform: uppercase;
        color: black;
      }
	  h5 {
	  font-family: sans-serif;
        text-transform: uppercase;
        color:black;
      }
    button {
          background-color: green;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
	 select {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
   .base {
      width: 450px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: transparan;
	  margin: 80px auto;
	  padding: 30px 20px;
	  box-shadow: 0px 0px 100px 5px #d6d6d6;
	  border-radius: 10px;
	  color : #FFF8DC ;
    }
	  a {
          background-color:;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
	</style>
  </head>
<body>




<section class="base">
        <div><center><h2> Tambah Data Siswa</h2></div></center>
      <form method="POST" action="proses_tambahsiswa.php" enctype="multipart/form-data" >
	    <div>
          <label>Nisn</label>
         <input type="text" name="nisn" required=""/>
        </div>
        <div>
          <label>Nis</label>
         <input type="text" name="nis" required=""/>
        </div>
        <div>
          <label>Nama Siswa</label>
         <input type="text" name="nama" required=""/>
        </div>
		
		<div>
         <label>Kelas</label>
          <select name="id_kelas">
 <option value="not_option"> Silahkan Pilih Kelas</option>
  <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
 <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
 <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
 </select>
          
      </div>
      <div>
          <label>Alamat</label>
         <input type="text" name="alamat" required=""/>
        </div>
        <div>
          <label>No Telepon</label>
         <input type="text" name="no_telp" required=""/>
        </div>
		<div>
         <label>Tahun Masuk</label>
          <select name="id_spp">
 <option value="not_option"> Silahkan Pilih tahun masuk</option>
  <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM spp ORDER BY tahun ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
 <option value="<?php echo $row['id_spp']; ?>"><?php echo $row['tahun']; ?></option>
 <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
 </select>
          
      </div>
	  <center>
        <p><div><button type="submit">Simpan</button></div></p>
        </div></p>
</form>
</body>
</html>