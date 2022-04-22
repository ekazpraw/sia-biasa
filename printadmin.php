<?php
session_start();
include 'koneksi.php';
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Copyright" content="BMI">
	<meta name="Author" content="M. Wildan Fathoni">
	<title>Madrasah Tsanawiyah - Jami'iyyah Islamiyyah</title>
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/grid.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/menu.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="css/masuk.css" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/masuk.js"></script>
	<link rel="shortcut icon" href="Images/kLogo.png"/>
</head>
	<div class="container_12">
	<div class="module">
	<br>
	<center><img src="Images/Logo.png"></center>
	<h3><center>MTS - JAMI'IYYAH ISLAMIYYAH</center></h3>
	<center><b><h2><span>DATA PARA ADMIN MTS - JAMI'IYYAH ISLAMIYAH:</span></h2></center></b>
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
	</tr>
<?php
	if(isset($_GET['aksi']) == 'delete'){
		$id_admin = $_GET['id_admin'];
		$cek = mysqli_query($koneksi, "SELECT * FROM Admin WHERE id_admin='$id_admin'");
	if(mysqli_num_rows($cek) == 0){
		echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Admin tidak ditemukan.</div>';
	}else{
		$delete = mysqli_query($koneksi, "DELETE FROM Admin WHERE id_admin='$id_admin'");
	if($delete){
		echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Admin berhasil dihapus.</div>';
	}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Admin gagal dihapus.</div>';
}}}
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
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<br>
<?php include 'print.php'; ?>