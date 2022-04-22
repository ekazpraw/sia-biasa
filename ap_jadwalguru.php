<?php
include 'koneksi.php';
	$id_kelas	  	  = $_POST['id_kelas'];
	$id_matpel	 	  = $_POST['id_matpel'];
	$id_guru	 	  = $_POST['id_guru'];
	$hari		  	  = $_POST['hari'];
	$jam_pelajaran 	  = $_POST['jam_pelajaran'];
$inputjadwal = mysqli_query($koneksi, "INSERT INTO jadwal (id_kelas, id_matpel, id_guru, hari, jam_pelajaran)
VALUES ('$id_kelas','$id_matpel','$id_guru','$hari','$jam_pelajaran')");
mysqli_query($koneksi,$inputjadwal);
header('location:ak_jadwalguru.php?Input Sukses!');
?>