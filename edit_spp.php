
<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM spp WHERE id_spp='$id'";
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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='spp.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='spp.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>UBAH SPP</title>
	<link rel="stylesheet" href="style.css" />
      </head>
<body>
  <?php
  
  include ('header.php');
?>
<section class="base">
<div><center><h2>Ubah SPP Tahun <?php echo $data['tahun']; ?></div>
<form method="POST" action="proses_editspp.php" enctype="multipart/form-data" >
      
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id_spp']; ?>"  hidden />
        <div>
          <label>Tahun</label>
          <input type="text" name="tahun" value="<?php echo $data['tahun']; ?>" disabled="disabled"/>
        </div>
        <div>
          <label>Nominal</label>
         <input type="text" name="nominal" value="<?php echo $data['nominal']; ?>" required=""/>
        </div>
   <p><div><center>
      <button type="submit">Simpan</button>
        </div>
</form>
</body>
</html>
