<?php include "header.php" ?>
<section class="base">
<h3>History Pembayaran SPP</h3>
<form method="get" action="">
	NIS: <input type="text" name="nis" />
	<input type="submit" name="cari" value="Cari Siswa" />
</form>

<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlSiswa = mysqli_query($koneksi, "SELECT * FROM siswa,spp WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlSiswa);
	$nis = $ds['nis'];
?>

<h3>Data Siswa</h3>
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
</table>

<h3>Tagihan SPP Siswa</h3>
<table border="1">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Tahun</th>
		<th>Nominal spp perbulan</th>
		<th>Tanggal Bayar</th>
		<th>Keterangan</th>
		<th>Petugas</th>
		
	</tr>

	<?php
	$sql = mysqli_query($koneksi, "SELECT * FROM siswa,spp,pembayaran,petugas WHERE id_kelas='$ds[nis]'order by nis asc");

	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan_dibayar]</td>
			<td>$d[tahun_dibayar]</td>
			<td>$d[nominal]</td>
			<td>$d[tgl_dibayar]</td>
			<td>$d[ket]</td>
			<td>$d[nama_petugas]</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php
}
?>
</section>
<div>
<p><a href="logout.php">LOGOUT</a></p></div> 
<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas</p> 