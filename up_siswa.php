<?php
include 'koneksi.php';
	$id_siswa	= $_POST['id_siswa'];
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
$lokasi_file=$_FILES['foto']['tmp_name'];
$foto=$_FILES['foto']['name'];
$folder="images/imgsiswa";
$updatesiswa = mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nama_siswa='$nama_siswa', password='$password', alamat='$alamat', tmp_lahir='$tmp_lahir',
tgl_lahir='$tgl_lahir', agama='$agama', jk='$jk', no_tlp='$no_tlp', foto='$foto' where id_siswa='$id_siswa'");
$updatemasuk = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password',
nama='$nama_siswa', level='$level', foto='$foto' WHERE id_masuk=$id_siswa");
mysqli_query($koneksi,$updatesiswa);
mysqli_query($koneksi,$updatemasuk);
header('location:ad_siswa.php?Update Sukses!');
?>