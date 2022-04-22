<?php
include 'koneksi.php';
	$nis	    = $_POST['nis'];
	$username	= $_POST['nis'];
	$nama_siswa  = $_POST['nama_siswa'];
	$nama 		= $_POST['nama_siswa'];
	$password   = $_POST['password'];
	$alamat     = $_POST['alamat'];
	$tmp_lahir  = $_POST['tmp_lahir'];
	$tgl_lahir  = $_POST['tgl_lahir'];
	$agama    	= $_POST['agama'];
	$jk	    = $_POST['jk'];
	$no_tlp = $_POST['no_tlp'];
	$target_dir = "images/imgsiswa/";
	$nama_file = $_FILES["foto"]["name"];
	$target_file = $target_dir.$nama_file;
	$statusUpload = move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
$inputsiswa = mysqli_query($koneksi, "INSERT INTO siswa (nis, nama_siswa, password, alamat, tmp_lahir, tgl_lahir, agama, jk, no_tlp, foto, level)
VALUES ('$nis','$nama_siswa','$password','$alamat','$tmp_lahir','$tgl_lahir','$agama','$jk','$no_tlp','$nama_file','3')")or die(mysqli_error());
$inputmasuk = mysqli_query($koneksi, "INSERT INTO pengguna (id_masuk, username, password, nama, level, foto)
VALUES ('$username','$password','$nama','3','$nama_file')")or die(mysqli_error());
mysqli_query($koneksi,$inputsiswa);
mysqli_query($koneksi,$inputmasuk);
header('location:ad_siswa.php?Input Sukses!');
?>