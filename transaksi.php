<?php include "header.php" ?>
<section class="base">
<h3>Transaksi Pembayaran SPP</h3>
<form method="get" action="">
	NIS: <input type="text" name="nis" />
	<input type="submit" name="cari" value="Cari Siswa" />
</form>

<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa,spp,petugas WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?>

<h3>Biodata Siswa</h3>
<table>
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo $ds['nama']; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $ds['alamat']; ?></td>
	</tr>
	<tr>
		<td>Tahun Masuk</td>
		<td>:</td>
		<td><?php echo $ds['tahun']; ?></td>
	</tr>
	<tr>
		<td>Nominal</td>
		<td>:</td>
		<td><?php echo $ds['nominal']; ?></td>
	</tr>
</table>
<table border="1">

        <div><center><h2> Tambah Data Pembayaran</h2></div>
    <form method="POST" action="proses_transaksi1.php" enctype="multipart/form-data" >
	<div>
          <label>Nama petugas</label>
          <input type="text" name="nama_petugas" required="" value="<?php echo $ds['nama_petugas']; ?>" usable="" />
        </div><div>
          <label>No spp</label>
          <input type="text" name="id_spp" required="" value="<?php echo $ds['id_spp']; ?>" usable="" />
        </div>
	   <div>
          <label>Bulan Bayar</label>
         <input type="text" name="bulan_dibayar" required=""/>
        </div>
        <div>
          <label>Tahun Bayar</label>
         <input type="text" name="tahun_dibayar" required=""/>
        </div>
        <div>
          <label>Tanggal bayar</label>
         <input type="texts" name="tgl_dibayar" required=""/>
        </div>
		 <div>
          <label>Nominal</label>
          <input type="text" name="nominal" required="" value="<?php echo $ds['nominal']; ?>"  usable="" />
        </div>
		 <div>
          <label>Keterangan</label>
         <input type="text" name="ket" required=""/>
        </div>

         <p><div><center>
         <button type="submit">Simpan</button>
        </div>
</table>

<?php
}
?>
</section>

<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas, kemudian proses pembayaran</p>

