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
	<th>Nis :</th>
	<th>Nama Lengkap :</th>
	<th>Password :</th>
	<th>Alamat :</th>
	<th>Tempat Lahir :</th>
	<th>Tanggal Lahir :</th>
	<th>Jenis Kelamin :</th>
	<th>Agama :</th>
	<th>Nomor Telepon :</th>
	<th>Foto :</th>
	</tr>
		<?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from siswa");
		while($t = mysqli_fetch_array($data)){
		?>
	<tr>
	<td align="center"><?php echo $t['nis']; ?></td>
	<td align="center"><?php echo $t['nama_siswa']; ?></td>
	<td align="center"><?php echo $t['password']; ?></td>
	<td align="center"><?php echo $t['alamat']; ?></td>
	<td align="center"><?php echo $t['tmp_lahir']; ?></td>
	<td align="center"><?php echo $t['tgl_lahir']; ?></td>
	<td align="center"><?php echo $t['jk']; ?></td>
	<td align="center"><?php echo $t['agama']; ?></td>
	<td align="center"><?php echo $t['no_tlp']; ?></td>
	<td align="center"><?php echo "<img src='images/imgsiswa/".$t['foto']."' width='100' height='100'>"; ?></td>
	</tr>
<?php } ?>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>