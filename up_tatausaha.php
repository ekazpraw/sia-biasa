<?php
include 'koneksi.php';
	$id_tatausaha	= $_POST['id_tatausaha'];
	$nik	    = $_POST['nik'];
	$username	= $_POST['nik'];
	$nama_tatausaha  = $_POST['nama_tatausaha'];
	$nama 		= $_POST['nama_tatausaha'];
	$password   = $_POST['password'];
	$alamat     = $_POST['alamat'];
	$tmp_lahir  = $_POST['tmp_lahir'];
	$tgl_lahir  = $_POST['tgl_lahir'];
	$agama    	= $_POST['agama'];
	$jk	    = $_POST['jk'];
	$no_tlp = $_POST['no_tlp'];
$lokasi_file=$_FILES['foto']['tmp_name'];
$foto=$_FILES['foto']['name'];
$folder="images/imgtatausaha";
$updatetatausaha = mysqli_query($koneksi, "UPDATE tatausaha SET nik='$nik', nama_tatausaha='$nama_tatausaha', password='$password', alamat='$alamat', tmp_lahir='$tmp_lahir',
tgl_lahir='$tgl_lahir', agama='$agama', jk='$jk', no_tlp='$no_tlp', foto='$foto' where id_tatausaha='$id_tatausaha'");
$updatemasuk = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password',
nama='$nama_tatausaha', level='$level', foto='$foto' WHERE id_masuk=$id_tatausaha");
mysqli_query($koneksi,$updatetatausaha);
mysqli_query($koneksi,$updatemasuk);
header('location:ad_tatausaha.php?Update Sukses!');
?>