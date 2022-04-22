<?php
include 'koneksi.php';
	$nik	    = $_POST['nik'];
	$username	= $_POST['nik'];
	$nama_admin  = $_POST['nama_admin'];
	$nama 		= $_POST['nama_admin'];
	$password   = $_POST['password'];
	$alamat     = $_POST['alamat'];
	$tmp_lahir  = $_POST['tmp_lahir'];
	$tgl_lahir  = $_POST['tgl_lahir'];
	$agama    	= $_POST['agama'];
	$jk	    = $_POST['jk'];
	$no_tlp = $_POST['no_tlp'];
$lokasi_file=$_FILES['foto']['tmp_name'];
$foto=$_FILES['foto']['name'];
$folder="images/imgadmin";
$updateadmin = mysqli_query($koneksi, "UPDATE admin SET nik='$nik', nama_admin='$nama_admin', password='$password', alamat='$alamat', tmp_lahir='$tmp_lahir',
tgl_lahir='$tgl_lahir', agama='$agama', jk='$jk', no_tlp='$no_tlp', foto='$foto' where id_admin='$id_admin'");
$updatemasuk = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password',
nama='$nama_admin', level='$level', foto='$foto' WHERE id_masuk=$id_admin");
mysqli_query($koneksi,$updateadmin);
mysqli_query($koneksi,$updatemasuk);
header('location:ad_akun.php?Update Sukses!');
?>