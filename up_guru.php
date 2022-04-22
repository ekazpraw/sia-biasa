<?php
include 'koneksi.php';
	$id_guru	= $_POST['id_guru'];
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
$lokasi_file=$_FILES['foto']['tmp_name'];
$foto=$_FILES['foto']['name'];
$folder="images/imgguru";
$updateguru = mysqli_query($koneksi, "UPDATE guru SET nik='$nik', nama_guru='$nama_guru', password='$password', alamat='$alamat', tmp_lahir='$tmp_lahir',
tgl_lahir='$tgl_lahir', agama='$agama', jk='$jk', no_tlp='$no_tlp', foto='$foto' where id_guru='$id_guru'");
$updatemasuk = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password',
nama='$nama_guru', level='$level', foto='$foto' WHERE id_masuk=$id_guru");
mysqli_query($koneksi,$updateguru);
mysqli_query($koneksi,$updatemasuk);
header('location:ad_guru.php?Update Sukses!');
/*
	$foto	= $_FILES['foto']['name'];
	$uploaddir	= '../images/';	
	$uploadfile = $uploaddir.$foto;
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	$fotobaru = date('dmYHis').$foto;
	// Set path folder tempat menyimpan fotonya
	$path = "../images/".$fotobaru;
*/?>