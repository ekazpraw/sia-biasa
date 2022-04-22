<?php
include 'koneksi.php';
	$id_tatausaha  = $_POST['id_tatausaha'];
	$nis	       = $_POST['nis'];
	$id_kelas      = $_POST['id_kelas'];
	$jumlah_bayar  = $_POST['jumlah_bayar'];
	$tipe_bayar    = $_POST['tipe_bayar'];
	$periode_bayar = $_POST['periode_bayar'];
	$inputTime	   = date("Y-m-d H:i:s");
$inputbayar = mysqli_query($koneksi, "INSERT INTO pembayaran (id_tatausaha, nis, id_kelas, jumlah_bayar, tipe_bayar, periode_bayar, inputTime)
VALUES ('$id_tatausaha','$nis','$id_kelas','$jumlah_bayar','$tipe_bayar','$periode_bayar','$inputTime')")or die(mysqli_error());
mysqli_query($koneksi,$inputbayar);
header('location:ak_pembayaran.php?Input Sukses!');
?>