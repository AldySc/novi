<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];

  $tgl_bayar = $_POST['tgl_bayar'];
  $bulan_dibayar     = $_POST['bulan_dibayar'];
  $tahun_dibayar     = $_POST['tahun_dibayar'];
  $id_spp     = $_POST['id_spp'];
  $jumlah_bayar     = $_POST['jumlah_bayar'];


  //cek dulu jika merubah gambar produk jalankan coding ini
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE pembayaran SET tgl_bayar = '$tgl_bayar',bulan_dibayar = '$bulan_dibayar',tahun_dibayar = '$tahun_dibayar',id_spp = '$id_spp',jumlah_bayar = '$jumlah_bayar'  WHERE id_pembayaran = '$id'";
                    // periska query apakah ada error
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='transaksi2.php';</script>";
                    }
              
			  
			  ?>
