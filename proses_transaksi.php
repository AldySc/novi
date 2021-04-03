<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	if($_GET['act']=='bayar'){

		$id_spp 	= $_GET['id'];
		$nis	= $_GET['nis'];

		//membuat nomor pembayaran
		$today = date("ymd");
		$query = mysqli_query($konek, "SELECT max(id_pembayaran) AS last FROM pembayaran WHERE id_pembayaran LIKE '$today%'");
		$data = mysqli_fetch_array($query);
		$lastNoBayar	= $data['last'];
		$lastNoUrut		= substr($lastNoBayar, 6, 4);
		$nextNoUrut		= $lastNoUrut + 1;
		$nextNoBayar	= $today.sprintf('%04s', $nextNoUrut);

		//tanggal Bayar
		$tglBayar 	= date('Y-m-d');

		//id admin
		$admin = $_SESSION['id'];

		mysqli_query($konek, "UPDATE pembayaran SET id_pembayaran='$nextid_pembayaran',
											tgl_dibayar='$tgl_dibayar',
											ket='LUNAS',
											id_petugas='$id_petugas'
									WHERE id_spp='$id_spp'");

		header('location:transaksi.php?nis='.$nis);
	}
}
?>