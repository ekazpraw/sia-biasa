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
	</tr>
<?php
	$id_jadwal=0;
		$query = "SELECT * FROM jadwal ORDER BY id_guru desc";
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
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>