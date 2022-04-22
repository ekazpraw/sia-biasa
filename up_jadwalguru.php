<?php
include 'koneksi.php';
	$id_jadwal	  	  = $_POST['id_jadwal'];
	$id_kelas	  	  = $_POST['id_kelas'];
	$id_matpel	 	  = $_POST['id_matpel'];
	$hari		  	  = $_POST['hari'];
	$jam_pelajaran 	  = $_POST['jam_pelajaran'];
	$id_guru	 	  = $_POST['id_guru'];
$updatejadwal = mysqli_query($koneksi, "UPDATE jadwal SET id_kelas='$id_kelas', id_matpel='$id_matpel', hari='$hari',
jam_pelajaran='$jam_pelajaran', id_guru='$id_guru' where id_jadwal='$id_jadwal'");
mysqli_query($koneksi,$updatejadwal);
header('location:ak_jadwalguru.php?Update Sukses!');
?>