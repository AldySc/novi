<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
    include ('header.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TRANSAKSI</title>
   
  </head>
<body>
  <table>
      <thead>
	  <tr>
         <th>Data Pembayaran</th>
		 <th><a href="transaksi.php">Tambah  Pembayaran</a></th>
		 <th><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                           <?php
                        $kata_kunci="";
                        if (isset($_POST['kata_kunci'])) {
                            $kata_kunci=$_POST['kata_kunci'];
                        }
                        ?>
                  <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  placeholder="masukan kata kunci" required/>
		<th><button type="submit">Cari</button></div></form></tr>
    </thead>
	</table>
  <table>
      <thead>
        <tr>
         <th>NO</th>
		 <th>Nisn</th>
          <th>Nama </th>
          <th>Bulan</th>
          <th>Tahun Masuk</th>
          <th>Nominal spp perbulan </th>
		  <th>Tanggal Bayar</th>
		  <th>Tahun Bayar</th>
          <th>Keterangan</th>
          <th>Petugas</th>
    <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
                         
                          // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

                            if (isset($_POST['kata_kunci'])) {
                                $kata_kunci=trim($_POST['kata_kunci']);
                                $query="select * from siswa, pembayaran,petugas,where id_pembayaran like '%".$kata_kunci."%' or bulan_dibayar like '%".$kata_kunci."%' or tahun_dibayar like '%".$kata_kunci."%' order by bulan_dibayar asc";

                            }else {
                            $query="select * from siswa, pembayaran,petugas,spp where pembayaran.id_petugas=petugas.id_petugas and pembayaran.id_spp=spp.id_spp order by id_pembayaran asc";
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
                                               
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['bulan_dibayar']; ?></td>
                                                <td><?php echo $row['tahun']; ?></td>
												<td><?php echo substr($row['nominal'], 0, 20); ?></td>
                                                <td><?php echo $row['tgl_bayar']; ?></td>
                                                <td><?php echo $row['tahun_dibayar']; ?></td>
												<td><?php echo $row['ket']; ?></td>
                                                <td><?php echo $row['nama_petugas']; ?></td>
                                               
                                             
          <td>
              <a href="edit_transaksi.php?id=<?php echo $row['nisn']; ?>">Ubah</a> |
              <a href="proses_hapustransaksi.php?id=<?php echo $row['nisn']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
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
