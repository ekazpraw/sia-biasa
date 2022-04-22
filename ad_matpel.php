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
	<h2><span>DATA MATA PELAJARAN, <?php echo $_SESSION['username']; ?> ! :</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Mata Pelajaran</th>
		<th class="text-center">Nama Mata Pelajaran</th>
		<th class="text-center">Nilai KKM</th>
		<th class="text-center">Nama Guru</th>
		<th class="text-center">Aksi</th>
	</tr>
<?php
	if(isset($_GET['aksi']) == 'delete'){
		$id_matpel = $_GET['id_matpel'];
		$cek = mysqli_query($koneksi, "SELECT * FROM matapelajaran WHERE id_matpel='$id_matpel'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data matpel tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM matapelajaran WHERE id_matpel='$id_matpel'");}}
?>
<?php
	$id_matpel=0;
		$query = "SELECT M.id_matpel, M.nama_matpel, M.kkm, G.nama_guru FROM matapelajaran M, guru G WHERE G.id_guru=M.id_guru ORDER BY nama_matpel asc"; // Query untuk menampilkan semua data siswa
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	$id_matpel++;
	echo '
	<tr>
	<td align="center">'.$id_matpel.'</td>
	<td align="center">'.$data['nama_matpel'].'</td>
	<td align="center">'.$data['kkm'].'</td>
	<td align="center">'.$data['nama_guru'].'</td>
	<td align="center">
		<a href="ed_matpel.php?id_matpel='.$data['id_matpel'].'" title="Detail" data-toggle="modal" class="btn btn-warning" > Edit </a>                          
		<a href="ad_matpel.php?aksi=delete&id_matpel='.$data['id_matpel'].'" title="Hapus Data matpel" onclick="return confirm(\'Anda yakin akan menghapus Data Mata Pelajaran '.$data['nama_matpel'].'?\')" class="btn btn-danger "> Hapus </a>
	</td>
		</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<?php include "tombolmatpel.php"; ?>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>