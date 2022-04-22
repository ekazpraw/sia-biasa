<?php
include 'koneksi.php';
	$nama_matpel  = $_POST['nama_matpel'];
	$kkm		  = $_POST['kkm'];
	$id_guru 	  = $_POST['id_guru'];
$inputmatpel = mysqli_query($koneksi, "INSERT INTO matapelajaran (nama_matpel, kkm, id_guru)
VALUES ('$nama_matpel','$kkm','$id_guru')")or die(mysqli_error());
mysqli_query($koneksi,$inputmatpel);
header('location:ad_matpel.php?Input Sukses!');
?>