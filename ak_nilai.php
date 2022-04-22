<?php
session_start();
if(empty($_SESSION['level'])){
header('location:index.php');
}
$level = $_SESSION['level'];
include 's_atas.php';
?>
	<!-- ISI -->
	<div class="container_12">
	<div class="module">
	<br>
	<h2><span>DATA NILAI SISWA MTS - JAMI'IYYAH ISLAMIYAH:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Nilai</th>
		<th class="text-center">Id Guru</th>
		<th class="text-center">Id Mata Pelajaran</th>
		<th class="text-center">Tahun Ajaran</th>
		<th class="text-center">Semester</th>
		<th class="text-center">Id Kelas</th>
		<th class="text-center">NIS</th>
		<th class="text-center">Nilai Tugas 1</th>
		<th class="text-center">Nilai Tugas 2</th>
		<th class="text-center">Nilai UTS</th>
		<th class="text-center">Nilai UAS</th>
		<th class="text-center">Nilai Akhir</th>
		<th class="text-center">Keterangan</th>
		<th class="text-center">Aksi</th>
	</tr>
<?php
	if(isset($_GET['aksi']) == 'delete'){
		$id_nilai = $_GET['id_nilai'];
		$cek = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_nilai='$id_nilai'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data nilai tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai='$id_nilai'");}}
?>
<?php
	$id_nilai=0;
		$query = "SELECT * FROM nilai ORDER BY id_nilai asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	$id_nilai++;
	echo '<tr>
	<td align="center">'.$id_nilai.'</td>
	<td align="center">'.$data['id_guru'].'</td>
	<td align="center">'.$data['id_matpel'].'</td>
	<td align="center">'.$data['tahun_ajaran'].'</td>
	<td align="center">'.$data['semester'].'</td>
	<td align="center">'.$data['id_kelas'].'</td>
	<td align="center">'.$data['nis'].'</td>
	<td align="center">'.$data['nilaitugas1'].'</td>
	<td align="center">'.$data['nilaitugas2'].'</td>
	<td align="center">'.$data['nilai_uts'].'</td>
	<td align="center">'.$data['nilai_uas'].'</td>
	<td align="center">'.$data['nilai_akhir'].'</td>
	<td align="center">'.$data['keterangan'].'</td>
	<td>
		<a href="ed_nilai.php?id_nilai='.$data['id_nilai'].'" data-toggle="modal""><div class="btn btn-warning">EDIT</div></a>
		<br>
		<a href="ak_nilai.php?aksi=delete&id_nilai='.$data['id_nilai'].'" onclick="return confirm(\'Anda yakin akan menghapus Data Nilai dengan NIS='.$data['nis'].'?\')"><div class="btn btn-danger">HAPUS</div></a>
	</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<?php include "tombolnilai.php"; ?>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>