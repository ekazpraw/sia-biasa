<?php
include 'koneksi.php';
	$nik	    = $_POST['nik'];
	$username	= $_POST['nik'];
	$nama_guru  = $_POST['nama_guru'];
	$nama 		= $_POST['nama_guru'];
	$password   = $_POST['password'];
	$alamat     = $_POST['alamat'];
	$tmp_lahir  = $_POST['tmp_lahir'];
	$tgl_lahir  = $_POST['tgl_lahir'];
	$agama    	= $_POST['agama'];
	$jk	    = $_POST['jk'];
	$no_tlp = $_POST['no_tlp'];
	$target_dir = "images/imgguru/";
	$nama_file = $_FILES["foto"]["name"];
	$target_file = $target_dir.$nama_file;
	$statusUpload = move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
$inputguru = mysqli_query($koneksi, "INSERT INTO guru (nik, nama_guru, password, alamat, tmp_lahir, tgl_lahir, agama, jk, no_tlp, foto, level)
VALUES ('$nik','$nama_guru','$password','$alamat','$tmp_lahir','$tgl_lahir','$agama','$jk','$no_tlp','$nama_file','')")or die(mysqli_error());
$inputmasuk = mysqli_query($koneksi, "INSERT INTO pengguna (username, password, nama, level, foto)
VALUES ('$username','$password','$nama','2','$nama_file')")or die(mysqli_error());
mysqli_query($koneksi,$inputguru);
mysqli_query($koneksi,$inputmasuk);
header('location:ad_guru.php?Input Sukses!');
?>