<?php
include 'koneksi.php';
	$id_matpel	  = $_POST['id_matpel'];
	$nama_matpel  = $_POST['nama_matpel'];
	$kkm		  = $_POST['kkm'];
	$id_guru 	  = $_POST['id_guru'];
$updateadmin = mysqli_query($koneksi, "UPDATE matapelajaran SET nama_matpel='$nama_matpel', kkm='$kkm', id_guru='$id_guru' where id_matpel='$id_matpel'");
mysqli_query($koneksi,$updateadmin);
header('location:ad_matpel.php?Update Sukses!');
?>