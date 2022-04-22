<?php
include 'koneksi.php';
	$id_guru	= $_POST['id_guru'];
	$nama_kelas = $_POST['nama_kelas'];
$inputkelas = mysqli_query($koneksi, "INSERT INTO kelas (id_guru, nama_kelas)
VALUES ('$id_guru','$nama_kelas')")or die(mysqli_error());
mysqli_query($koneksi,$inputkelas);
header('location:ad_kelas.php?Input Sukses!');
?>