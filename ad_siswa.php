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
	<h2><span>DATA SISWA MTS - JAMI'IYYAH ISLAMIYAH:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Siswa</th>
		<th class="text-center">Nis</th>
		<th class="text-center">Nama Siswa</th>
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
		$id_siswa = $_GET['id_siswa'];
		$cek = mysqli_query($koneksi, "SELECT * FROM Siswa WHERE id_siswa='$id_siswa'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Siswa tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM Siswa WHERE id_siswa='$id_siswa'");}}
?>
<?php
	$id_siswa=0;
		$query = "SELECT * FROM Siswa ORDER BY nama_siswa asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	$id_siswa++;
	echo '
	<tr>
	<td align="center">'.$id_siswa.'</td>
	<td align="center">'.$data['nis'].'</td>
	<td align="center">'.$data['nama_siswa'].'</td>
	<td align="center">'.$data['alamat'].'</td>
	<td align="center">'.$data['tmp_lahir'].'</td>
	<td align="center">'.$data['tgl_lahir'].'</td>
	<td align="center">'.$data['jk'].'</td>
	<td align="center">'.$data['agama'].'</td>
	<td align="center">'.$data['no_tlp'].'</td>
	<td align="center"><img src=images/imgsiswa/'.$data['foto'].' width=100 height=100></td>
	<td>
		<a href="ed_siswa.php?id_siswa='.$data['id_siswa'].'" data-toggle="modal""><div class="btn btn-warning">EDIT</div></a>
		<br>
		<a href="ad_siswa.php?aksi=delete&id_siswa='.$data['id_siswa'].'" onclick="return confirm(\'Anda yakin akan menghapus Data Siswa '.$data['nama_siswa'].'?\')"><div class="btn btn-danger">HAPUS</div></a>
	</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<?php include "tombolsiswa.php"; ?>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>