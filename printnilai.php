<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
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
	<center><b><h2><span>DATA NILAI PARA SISWA MTS - JAMI'IYYAH ISLAMIYAH:</span></h2></center></b>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
		<th class="text-center">Id Nilai</th>
		<th class="text-center">Id Guru</th>
		<th class="text-center">Id Mata Pelajaran</th>
		<th class="text-center">Tahun Ajaran</th>
		<th class="text-center">Semester</th>
		<th class="text-center">Id Kelas</th>
		<th class="text-center">NIS</th>
		<th class="text-center">Nilai Tugas 1</th>
		<th class="text-center">Nilai Tugas 2</th>
		<th class="text-center">Nilai UTS</th>
		<th class="text-center">Nilai UAS</th>
		<th class="text-center">Nilai Akhir</th>
		<th class="text-center">Keterangan</th>
	</tr>
<?php
		$query = "SELECT * FROM nilai ORDER BY nis asc";
		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
	echo '
	<tr>
	<td align="center">'.$data['id_nilai'].'</td>
	<td align="center">'.$data['id_guru'].'</td>
	<td align="center">'.$data['id_matpel'].'</td>
	<td align="center">'.$data['tahun_ajaran'].'</td>
	<td align="center">'.$data['semester'].'</td>
	<td align="center">'.$data['id_kelas'].'</td>
	<td align="center">'.$data['nis'].'</td>
	<td align="center">'.$data['nilaitugas1'].'</td>
	<td align="center">'.$data['nilaitugas2'].'</td>
	<td align="center">'.$data['nilai_uts'].'</td>
	<td align="center">'.$data['nilai_uas'].'</td>
	<td align="center">'.$data['nilai_akhir'].'</td>
	<td align="center">'.$data['keterangan'].'</td>
	</tr>';}
?>
	</div>
	</div>
	</div>
	</table>
<br>
<?php include 'print.php'; ?>