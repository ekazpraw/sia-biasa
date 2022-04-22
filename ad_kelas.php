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
	<h2><span>DATA KELAS MTS - JAMI'IYYAH ISLAMIYAH:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id kelas</th>
		<th class="text-center">Id Guru</th>
		<th class="text-center">Nama kelas</th>
		<th class="text-center">Aksi</th>
	</tr>
<?php
	if(isset($_GET['aksi']) == 'delete'){
		$id_kelas = $_GET['id_kelas'];
		$cek = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data kelas tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");}}
?>
<?php
	$id_kelas=0;
		$query = "SELECT * FROM kelas ORDER BY nama_kelas asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	$id_kelas++;
	echo '
	<tr>
	<td align="center">'.$id_kelas.'</td>
	<td align="center">'.$data['id_guru'].'</td>
	<td align="center">'.$data['nama_kelas'].'</td>
	<td>
		<a href="ed_kelas.php?id_kelas='.$data['id_kelas'].'" data-toggle="modal""><div class="btn btn-warning">EDIT</div></a>
		<br>
		<a href="ad_kelas.php?aksi=delete&id_kelas='.$data['id_kelas'].'" onclick="return confirm(\'Anda yakin akan menghapus Data kelas '.$data['nama_kelas'].'?\')"><div class="btn btn-danger">HAPUS</div></a>
	</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<?php include "tombolkelas.php"; ?>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>