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
	<h2><span>DATA ADMIN MTS - JAMI'IYYAH ISLAMIYAH:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Admin</th>
		<th class="text-center">NIK</th>
		<th class="text-center">Nama Admin</th>
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
		$id_admin = $_GET['id_admin'];
		$cek = mysqli_query($koneksi, "SELECT * FROM Admin WHERE id_admin='$id_admin'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Admin tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM Admin WHERE id_admin='$id_admin'");}}
?>
<?php
		$query = "SELECT * FROM Admin ORDER BY nama_admin asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	echo '
	<tr>
	<td align="center">'.$data['id_admin'].'</td>
	<td align="center">'.$data['nik'].'</td>
	<td align="center">'.$data['nama_admin'].'</td>
	<td align="center">'.$data['alamat'].'</td>
	<td align="center">'.$data['tmp_lahir'].'</td>
	<td align="center">'.$data['tgl_lahir'].'</td>
	<td align="center">'.$data['jk'].'</td>
	<td align="center">'.$data['agama'].'</td>
	<td align="center">'.$data['no_tlp'].'</td>
	<td align="center"><img src=images/imgadmin/'.$data['foto'].' width=100 height=100></td>
	<td>
		<a href="ed_akun.php?id_admin='.$data['id_admin'].'" data-toggle="modal""><div class="btn btn-warning">EDIT</div></a>
		<br>
		<a href="ad_akun.php?aksi=delete&id_admin='.$data['id_admin'].'" onclick="return confirm(\'Anda yakin akan menghapus Data Admin '.$data['nama_admin'].'?\')"><div class="btn btn-danger">HAPUS</div></a>
	</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<?php include "tomboladmin.php"; ?>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>