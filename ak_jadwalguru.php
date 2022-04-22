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
	<h2><span>DATA JADWAL GURU, <?php echo $_SESSION['username']; ?> ! :</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Jadwal</th>
		<th class="text-center">Id Kelas</th>
		<th class="text-center">Id Matpel</th>
		<th class="text-center">Hari</th>
		<th class="text-center">Jam Pelajaran</th>
		<th class="text-center">Id Guru</th>
		<th class="text-center">Aksi</th>
	</tr>
<?php
	if(isset($_GET['aksi']) == 'delete'){
		$id_jadwal = $_GET['id_jadwal'];
		$cek = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Jadwal tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'");}}
?>
<?php
	$id_jadwal=0;
		$query = "SELECT * FROM jadwal";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	$id_jadwal++;
		echo '
	<tr>
	<td align="center">'.$id_jadwal.'</td>
	<td align="center">'.$data['id_kelas'].'</td>
	<td align="center">'.$data['id_matpel'].'</td>
	<td align="center">'.$data['hari'].'</td>
	<td align="center">'.$data['jam_pelajaran'].'</td>
	<td align="center">'.$data['id_guru'].'</td>
	<td align="center">
		<a href="ed_jadwalguru.php?id_jadwal='.$data['id_jadwal'].'" title="Detail" data-toggle="modal" class="btn btn-warning" > EDIT </a>
		<a href="ak_jadwalguru.php?aksi=delete&id_jadwal='.$data['id_jadwal'].'" title="Hapus Data Jadwal" onclick="return confirm(\'Anda Yakin Akan Menghapus Data Jadwal Guru Hari '.$data['hari'].', Jam '.$data['jam_pelajaran'].'?\')" class="btn btn-danger "> HAPUS </a>
	</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<?php include "tomboljadwalguru.php"; ?>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>