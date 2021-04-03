<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SISWA</title>
   
  </head>
<body>

	<?php

  include ('header.php');
?>


    <table>
      <thead>
	  <tr>
         <th>Data Siswa</th>
		 <th><a href="tambah_siswa.php">Tambah Siswa</a></th>
		 <th><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                           <?php
                        $kata_kunci="";
                        if (isset($_POST['kata_kunci'])) {
                            $kata_kunci=$_POST['kata_kunci'];
                        }
                        ?>
                  <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  placeholder="masukan kata kunci" required/>
		<th><button type="submit">Cari</button></div></form></th>
        </tr>
    </thead>
	</table>
    <table>
      <thead>
        <tr>
         <th>NO</th>
          <th>Nisn</th>
          <th>Nis</th>
          <th>Nama </th>
		  <th>Kelas</th>
          <th>Alamat</th>
          <th>No Telepon</th>
          <th>Tahun Masuk</th>
          <th>SPP Perbulan</th>
    <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
     <?php
                          // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                                if (isset($_POST['kata_kunci'])) {
                                $kata_kunci=trim($_POST['kata_kunci']);
                                $query="select * from siswa,kelas,spp where siswa.id_kelas=kelas.id_kelas and siswa.id_spp=spp.id_spp and siswa.nama like '%".$kata_kunci."%' or kelas.nama_kelas like '%".$kata_kunci."%' or spp.tahun like '%".$kata_kunci."%' order by nisn asc";


                            }else {
                            $query="select * from siswa,kelas,spp where siswa.id_kelas=kelas.id_kelas and siswa.id_spp=spp.id_spp order by nisn asc";
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
                                                <td><?php echo $row['nisn']; ?></td>
                                                <td><?php echo $row['nis']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['nama_kelas']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['no_telp']; ?></td>
                                                <td><?php echo $row['tahun']; ?></td>
                                                <td><?php echo substr($row['nominal'], 0, 20); ?></td>
          <td>
              <a href="edit_siswa.php?id=<?php echo $row['nisn']; ?>">Ubah</a> |
              <a href="proses_hapussiswa.php?id=<?php echo $row['nisn']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
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