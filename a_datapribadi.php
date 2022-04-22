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
	<h2><span>DATA PRIBADI ANDA, <?php echo $_SESSION['username']; ?> ! :</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">NIK</th>
		<th class="text-center">Nama Admin</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Tempat Lahir</th>
		<th class="text-center">Tanggal Lahir</th>
		<th class="text-center">Agama</th>
		<th class="text-center">Jenis Kelamin</th>
		<th class="text-center">No Telepon</th>
		<th class="text-center">Foto</th>
	</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from admin");
		while($t = mysqli_fetch_array($data)){
		?>
	<tr>
	<td align="center"><?php echo $t['nik']; ?></td>
	<td align="center"><?php echo $t['nama_admin']; ?></td>
	<td align="center"><?php echo $t['alamat']; ?></td>
	<td align="center"><?php echo $t['tmp_lahir']; ?></td>
	<td align="center"><?php echo $t['tgl_lahir']; ?></td>
	<td align="center"><?php echo $t['agama']; ?></td>
	<td align="center"><?php echo $t['jk']; ?></td>
	<td align="center"><?php echo $t['no_tlp']; ?></td>
	<td align="center"><?php echo "<img src='images/imgadmin/".$t['foto']."' width='100' height='100'>"; ?></td>
	</tr>
<?php } ?>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>