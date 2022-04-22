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
	<h2><span>DATA TATA USAHA MTS - JAMI'IYYAH ISLAMIYAH:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Tata Usaha</th>
		<th class="text-center">NIK</th>
		<th class="text-center">Nama Tata Usaha</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Tempat Lahir</th>
		<th class="text-center">Tanggal Lahir</th>
		<th class="text-center">Jenis Kelamin</th>
		<th class="text-center">Agama</th>
		<th class="text-center">No Telepon</th>
		<th class="text-center">Foto</th>
		<th class="text-center">Aksi</th>
	</tr>
<?php
	if(isset($_GET['aksi']) == 'delete'){
		$id_tatausaha = $_GET['id_tatausaha'];
		$cek = mysqli_query($koneksi, "SELECT * FROM tatausaha WHERE id_tatausaha='$id_tatausaha'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tatausaha tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM tatausaha WHERE id_tatausaha='$id_tatausaha'");}}
?>
<?php
	$id_tatausaha=0;
		$query = "SELECT * FROM tatausaha ORDER BY nama_tatausaha asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	$id_tatausaha++;
	echo '
	<tr>
	<td align="center">'.$id_tatausaha.'</td>
	<td align="center">'.$data['nik'].'</td>
	<td align="center">'.$data['nama_tatausaha'].'</td>
	<td align="center">'.$data['alamat'].'</td>
	<td align="center">'.$data['tmp_lahir'].'</td>
	<td align="center">'.$data['tgl_lahir'].'</td>
	<td align="center">'.$data['jk'].'</td>
	<td align="center">'.$data['agama'].'</td>
	<td align="center">'.$data['no_tlp'].'</td>
	<td align="center"><img src=images/imgtatausaha/'.$data['foto'].' width=100 height=100></td>
	<td>
		<a href="ed_tatausaha.php?id_tatausaha='.$data['id_tatausaha'].'" data-toggle="modal""><div class="btn btn-warning">EDIT</div></a>
		<br>
		<a href="ad_tatausaha.php?aksi=delete&id_tatausaha='.$data['id_tatausaha'].'" onclick="return confirm(\'Anda yakin akan menghapus Data tatausaha '.$data['nama_tatausaha'].'?\')"><div class="btn btn-danger">HAPUS</div></a>
	</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<?php include "tomboltatausaha.php"; ?>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>