<?php
include 'koneksi.php';
	$id_nilai   = $_POST['id_nilai'];
	$id_kelas   = $_POST['id_kelas'];
	$id_guru	= $_POST['id_guru'];
	$nis = $_POST['nis'];
	$id_matpel	= $_POST['id_matpel'];
	$TA = $_POST['TA'];
	$periode	= $_POST['periode'];
	$tugas1	= $_POST['tugas1'];
	$tugas2	= $_POST['tugas2'];
	$uts	= $_POST['uts'];
	$uas	= $_POST['uas'];
	$akhir	= $_POST['akhir'];
	$keterangan	= $_POST['keterangan'];
$updatenilai = mysqli_query($koneksi, "UPDATE kelas SET id_kelas='$id_kelas', id_kelas='$id_kelas', id_guru='$id_guru', nis='$nis', id_matpel='$id_matpel',
TA='$TA', periode='$periode', tugas1='$tugas1', tugas2='$tugas2', uts='$uts', uas='$uas', akhir='$akhir', keterangan='$keterangan' where id_nilai='$id_nilai'");
mysqli_query($koneksi,$updatenilai);
header('location:ak_nilai.php?Update Sukses!');
?>