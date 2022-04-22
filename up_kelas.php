<?php
include 'koneksi.php';
	$id_kelas	= $_POST['id_kelas'];
	$id_guru	= $_POST['id_guru'];
	$nama_kelas  = $_POST['nama_kelas'];
$updatekelas = mysqli_query($koneksi, "UPDATE kelas SET id_guru='$id_guru', nama_kelas='$nama_kelas' where id_kelas='$id_kelas'");
mysqli_query($koneksi,$updatekelas);
header('location:ad_kelas.php?Update Sukses!');
?>