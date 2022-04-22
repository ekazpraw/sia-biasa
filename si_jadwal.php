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
	<h2><span>JADWAL ANDA, <?php echo $_SESSION['username']; ?> ! :</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
	<th>Id Jadwal: </th>
	<th>Id Kelas: </th>
	<th>Id Matpel: </th>
	<th>Hari: </th>
	<th>Jam Pelajaran: </th>
	<th>Guru: </th>
	<th>Aksi: </th>
	</tr>
		<?php 
		include 'koneksi.php';
		$username = $_SESSION['username'];
		$query = "SELECT * FROM jadwal ";
		$sql = mysqli_query($koneksi, $query);
		while($t = mysqli_fetch_array($sql)){
		?>
	<tr>
	<td align="center"><?php echo $t['id_jadwal']; ?></td>
	<td align="center"><?php echo $t['id_kelas']; ?></td>
	<td align="center"><?php echo $t['id_matpel']; ?></td>
	<td align="center"><?php echo $t['hari']; ?></td>
	<td align="center"><?php echo $t['jam_pelajaran']; ?></td>
	<td align="center"><?php echo $t['id_guru']; ?></td>
	<td align="center">
		<a href="printjadwalguru.php?id_jadwal=" target="_blank"><div class="btn btn-warning">CETAK</div></a>
	</td>
	</tr>
		<?php } ?>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>