<?php
include 'koneksi.php';
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
$inputnilai = mysqli_query($koneksi, "INSERT INTO nilai (id_kelas, id_guru, id_matpel, tahun_ajaran, semester, nis, nilaitugas1, nilaitugas2,
nilai_uts, nilai_uas, nilai_akhir, keterangan)
VALUES ('$id_kelas','$id_guru','$id_matpel','$TA','$periode','$nis','$tugas1','$tugas2','$uts','$uas','$akhir','$keterangan')") or die(mysqli_error());
mysqli_query($koneksi,$inputnilai);
header('location:ak_nilai.php?Input Sukses!');
?>