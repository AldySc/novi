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
   $query = "SELECT * FROM siswa,kelas,spp, pembayaran where siswa.nisn='$id' AND siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp";
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
    <title>UBAH PEMBAYARAN</title>
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
<center><h2 class="title">Ubah Data Pembayaran <?php echo $data['nisn']; ?></h2>
      <center>
      <form method="POST" action="proses_edittransaksi.php" enctype="multipart/form-data" >
		 <input type="text" class="form-control" name="id" value="<?php echo $data['nama_pembayaran']; ?>" hidden />
        <div>
          <label>Nama Petugas</label>
       <input type="text"  name="id_petugas" value="<?php echo $data['id_petugas']; ?>" usable=""/>
        </div>
        <div>
          <label>Nis</label>
          <input type="text" name="nama" required=""value="<?php echo $data['nis']; ?>" disabled=""/>
        </div>
        <div>
          <label>Nama </label>
        <input type="text" name="nama" required="" value="<?php echo $data['nama']; ?>"/>
        </div>
		<div>
          <label>Bulan</label>
        <input type="text" name="bulan_dibayar" required="" value="<?php echo $data['bulan_dibayar']; ?>"/>
        </div>
		 <div>
          <label>Tanggal bayar</label>
         <input type="text" name="tgl_bayar" required="" value="<?php echo $data['tgl_bayar']; ?>"/>
        </div>
        <div>
          <label>Tahun bayar</label>
         <input type="text" name="tahun_dibayar" required="" value="<?php echo $data['tahun_dibayar']; ?>"/>
        </div>
		<div>
<label>Jumlah Bayar</label>
      <input type="text" name="jumlah_bayar" value="<?php echo $data['jumlah_bayar']; ?>"  />
                      </div>
	    </div>
        <div><center>
         <button type="submit">Simpan</button>
        </div>
		</center>
      </form>
</body>
</html>
