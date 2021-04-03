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
    $query = "SELECT * FROM petugas WHERE id_petugas='$id'";
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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='petugas.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='petugas.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
   <title> UBAH PETUGAS</title>
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
      outline-color:;
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
      <center>
	
        <h2>Ubah Data Pengguna <?php echo $data['nama_petugas']; ?></h2>
      <center>
      <form method="POST" action="proses_editpetugas.php" enctype="multipart/form-data" >
   
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id_petugas']; ?>"  hidden />
        <label>Username</label>
         <input type="text" name="username" value="<?php echo $data['username']; ?>" required=""/>
        </div>
		<div>
          <label>Nama Petugas</label>
          <input type="text" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" required=""/>
        </div>
        <div>
           <label>Password</label>
          <input type="text" name="password" value="<?php echo $data['password']; ?>" required=""/>
        </div>
		
	    <div>
          <label>Level</label>
		  
          <select name="level">
		  
		  <?php
		  $idlevelyangdipilih=$data['level']; 
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM petugas ORDER BY level ASC";
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
	  <option value="<?php echo $row['level']; ?>" <?php if($row['level']=='$levelyangdipilih'){?> selected="selected" <?php } ?>><?php echo $row['level']; ?></option>
 <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
 </select>
          
      </div>
        <p><div><center>
         <button type="submit">Simpan</button>
        </div>
      </form>
</body>
</html>
