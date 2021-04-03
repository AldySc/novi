<?php
  include ('header.php');
?>
<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
   $query = "SELECT * FROM siswa,kelas,spp where siswa.nisn='$id' AND siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='siswa.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='siswa.php';</script>";
  }         
  ?>
  <!DOCTYPE html>
<html>
  <head>
    <title>UBAH SISWA</title>
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
      outline-color: ;
    }
	 select {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: ;
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
          background-color: ;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
      </head>
<body>

 
      <section class="base">
<center><h2 class="title">Ubah Data Siswa <?php echo $data['nama']; ?></h2>
      <center>
      <form method="POST" action="proses_editsiswa.php" enctype="multipart/form-data" >
		<input type="text" class="form-control" name="id" value="<?php echo $data['nisn']; ?>" hidden />
        <div>
          <label>Nisn</label>
          <input type="text" name="nama" required="" value="<?php echo $data['nisn']; ?>" disabled="" />
        </div>
        <div>
          <label>Nis</label>
          <input type="text" name="nama" required=""value="<?php echo $data['nis']; ?>" disabled=""/>
        </div>
        <div>
          <label>Nama Siswa</label>
        <input type="text" name="nama" required="" value="<?php echo $data['nama']; ?>"/>
        </div>
    
	    <div>
          <label>kelas</label>
		  
          <select name="id_kelas">
		  
		  <?php
		  $idkelasyangdipilih=$data['nama_kelas']; 
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM kelas ORDER BY id_kelas ASC";
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
	  <option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas']=="$idkelasyangdipilih"){?> selected="selected" <?php } ?>><?php echo $row['nama_kelas']; ?></option>
 <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
 </select>

	    </div>
		 <div>
          <label>Alamat</label>
         <input type="text" name="alamat" required="" value="<?php echo $data['alamat']; ?>"/>
        </div>
        <div>
          <label>No Telepon</label>
         <input type="text" name="no_telp" required="" value="<?php echo $data['no_telp']; ?>"/>
        </div>

		<div>
          <label>tahun</label>
		  
          <select name="id_spp" disabled="">
		  
		  <?php
		  $idtahunyangdipilih=$data['id_spp']; 
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
	  <option value="<?php echo $row['id_spp']; ?>" <?php if($row['id_spp']=="$idtahunyangdipilih"){?> selected="selected" <?php } ?>><?php echo $row['tahun']; ?></option>
 <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
 </select>
</div>
	    </div>
        <div><center>
         <button type="submit">Simpan</button>
        </div>
</form></center>
</body>
</html>
