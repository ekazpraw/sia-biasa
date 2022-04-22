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
	<h2><span>PEMBAYARAN ANDA, <?php echo $_SESSION['username']; ?> ! :</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Pembayaran</th>
		<th class="text-center">Id Tata Usaha</th>
		<th class="text-center">NIS</th>
		<th class="text-center">Id Kelas</th>
		<th class="text-center">Jumlah Bayar</th>
		<th class="text-center">Tipe Bayar</th>
		<th class="text-center">Periode Bayar</th>
		<th class="text-center">Tanggal Bayar</th>
		<th class="text-center">Aksi</th>
	</tr>
<?php
		$query = "SELECT * FROM pembayaran ORDER BY id_pembayaran asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	echo '<tr>
	<td align="center">'.$data['id_pembayaran'].'</td>
	<td align="center">'.$data['id_tatausaha'].'</td>
	<td align="center">'.$data['nis'].'</td>
	<td align="center">'.$data['id_kelas'].'</td>
	<td align="center">'.$data['jumlah_bayar'].'</td>
	<td align="center">'.$data['tipe_bayar'].'</td>
	<td align="center">'.$data['periode_bayar'].'</td>
	<td align="center">'.$data['inputTime'].'</td>
	<td>
		<a href="si_printpembayaran.php?id_pembayaran="><div class="btn btn-warning"> CETAK </div></a>
	</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>