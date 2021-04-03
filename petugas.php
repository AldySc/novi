	<?php
include ('header.php');
?>
<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>PETUGAS</title>
     <link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="bootstrap.min.css">
<body>




 <table>
      <thead>
	  <tr>
         <th>Data Pengguna</th>
		 <th><a href="tambah_petugas.php">Tambah Pengguna</a></th>
		 <th><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div>
       
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  placeholder="masukan kata kunci" required/>
		<th><button type="submit">Cari</button></th>
    </div>
    </form>
	</th>
           </tr>
    </thead>
	</table>
    <table>
      <thead>
         <tr>
          <th>No</th>
          <th>Username</th>
          <th>Password</th>
		  <th>Nama Pengguna</th>
          <th>Level</th>
          
          <th>Aksi</th>
        </tr>  
    </thead>
    <tbody>
    <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $query="select * from petugas where id_petugas like '%".$kata_kunci."%' or username like '%".$kata_kunci."%' or password like '%".$kata_kunci."%' or nama_petugas like '%".$kata_kunci."%' or level like '%".$kata_kunci."%'  order by username asc";

        }else {
            $query="select * from petugas order by username asc";
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
          <td><?php echo $row['username']; ?></td>
          <td><?php echo substr($row['password'], 0, 20); ?></td>
		  <td><?php echo $row['nama_petugas']; ?></td>
		  <td><?php echo $row['level']; ?></td>
          <td>
              <a href="edit_petugas.php?id=<?php echo $row['id_petugas']; ?>">Ubah</a> |
              <a href="proses_hapuspetugas.php?id=<?php echo $row['id_petugas']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
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