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
	<center><b><h2><span>DATA MATA PELAJARAN MTS - JAMI'IYYAH ISLAMIYAH:</span></h2></center></b>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Mata Pelajaran</th>
		<th class="text-center">Nama Mata Pelajaran</th>
		<th class="text-center">KKM</th>
		<th class="text-center">Nama Guru</th>
	</tr>
<?php
		$query = "SELECT * FROM matapelajaran, guru ORDER BY nama_matpel asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	echo '
	<tr>
	<td align="center">'.$data['id_matpel'].'</td>
	<td align="center">'.$data['nama_matpel'].'</td>
	<td align="center">'.$data['kkm'].'</td>
	<td align="center">'.$data['nama_guru'].'</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<br>
<?php include 'print.php'; ?>