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
	<th>Id Tata Usaha :</th>
	<th>Nama Lengkap :</th>
	<th>NIK :</th>
	<th>Password :</th>
	<th>Alamat :</th>
	<th>Jenis Kelamin :</th>
	<th>Nomor Telepon :</th>
	<th>Foto :</th>
	</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from tata_usaha");
		while($t = mysqli_fetch_array($data)){
		?>
	<tr>
	<td align="center"><?php echo $no++; ?></td>
	<td align="center"><?php echo $t['namalengkap']; ?></td>
	<td align="center"><?php echo $t['nik']; ?></td>
	<td align="center"><?php echo $t['password']; ?></td>
	<td align="center"><?php echo $t['alamat']; ?></td>
	<td align="center"><?php echo $t['jeniskelamin']; ?></td>
	<td align="center"><?php echo $t['notelepon']; ?></td>
	<td align="center"><?php echo "<img src='images/imgkaryawan/".$t['foto']."' width='100' height='100'>"; ?></td>
	</tr>
<?php } ?>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>