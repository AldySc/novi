<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>KELAS</title>
   
  </head>
<body>

	<?php

  include ('header.php');
?>


   <table>
      <thead>
	  <tr>
         <th >Data Kelas</th>
		 <th><a href="tambah_kelas.php">Tambah Kelas</a></th>
		 <th ><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"></
    <div>
       
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  placeholder="masukan kata kunci" required/><th><button type="submit">Cari</button></div></th>
		</form></th>
        </tr>
    </thead>
	</table>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kelas</th>
          <th>Kompetensi Keahlian</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
     <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $query="select * from kelas where id_kelas like '%".$kata_kunci."%' or nama_kelas like '%".$kata_kunci."%' or kompetensi_keahlian like '%".$kata_kunci."%' order by nama_kelas asc";

        }else {
            $query="select * from kelas order by nama_kelas asc";
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
          <td><?php echo $row['nama_kelas']; ?></td>
          <td><?php echo substr($row['kompetensi_keahlian'], 0, 20); ?></td>
          <td>
              <a href="edit_kelas.php?id=<?php echo $row['id_kelas']; ?>">Ubah</a> |
              <a href="proses_hapuskelas.php?id=<?php echo $row['id_kelas']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
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