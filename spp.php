<?php
  include ('header.php');
?>
<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>SPP</title>
  </head>
<body>
 	

  <table>
      <thead>
	  <tr>
         <th>Data SPP</th>
		 <th><a href="tambah_spp.php">Tambah SPP</a></th>
		 
<th><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		         <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
	             <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  placeholder="masukan kata kunci" required/><th><button type="submit">Cari</button></form></th></th>
				 </tr>
				 </thead>
    
</table>
  <table>
      <thead>
       <th >No</th>
          <th >Tahun</th>
          <th>Nominal</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
       <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $query="select * from spp where id_spp like '%".$kata_kunci."%' or tahun like '%".$kata_kunci."%' or nominal like '%".$kata_kunci."%' order by tahun asc";

        }else {
            $query="select * from spp order by tahun asc";
        }

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
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['tahun']; ?></td>
          <td><?php echo substr($row['nominal'], 0, 20); ?></td>
          <td>
              <a href="edit_spp.php?id=<?php echo $row['id_spp']; ?>">Ubah</a> |
              <a href="proses_hapusspp.php?id=<?php echo $row['id_spp']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
</body>
</html>