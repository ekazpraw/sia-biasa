<?php
include "koneksi.php";
if($_SESSION['level'] == "admin"){
?>
<?php $base = "SELECT * FROM admin";
$sql = mysqli_query($koneksi, $base);
$data = mysqli_fetch_array($sql);
?>
		<ul>
			<li class="has-sub"><a href="#"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Beranda</a></span></li>
			<li class="has-sub"><a href="#"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Kelola Data</span></a>
		<ul>
			<li><a href="ad_akun.php"> - Data Admin</a></li>
			<li><a href="ad_guru.php"> - Data Guru</a></li>
			<li><a href="ad_siswa.php"> - Data Siswa</a></li>
			<li><a href="ad_tatausaha.php"> - Data Tata Usaha</a></li>
			<li><a href="ad_kelas.php"> - Data Kelas</a></li>
			<li><a href="ad_matpel.php"> - Data Mata Pelajaran</a></li>
		</ul></li>
			<li class="has-sub"><a href="ak_jadwalguru.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Kelola Jadwal</span></a></li>
			<li class="has-sub"><a href="ak_nilai.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Kelola Nilai</span></a></li>
			<li class="has-sub"><a href="ak_pembayaran.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Kelola Pembayaran</span></a></li>
			<li class="has-sub"><a href="#"><span>&nbsp;&nbsp;<?php	echo '<img src="images/imgadmin/'.$data['foto'].'" class="img-square" width="30">&nbsp;&nbsp;:&nbsp;&nbsp;'.$_SESSION['username'].'';?></span></a>
		<ul>
			<li><a href="a_datapribadi.php"> - Data Pribadi</a></li>
			<li><a href="a_gantipassword.php"> - Ganti Password</a></li>
			<li><a href="s_keluar.php"> - Keluar</a></li>
		</ul></li>
		</ul></li>
<?php } else if($_SESSION['level'] == "guru"){ ?>
<?php $base = "SELECT * FROM guru";
$sql = mysqli_query($koneksi, $base);
$data = mysqli_fetch_array($sql);
?>
		<ul>
			<li class="has-sub"><a href="#"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Beranda</a></span></li>
			<li class="has-sub"><a href="gu_jadwalguru.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Lihat Jadwal</span></a></li>
			<li class="has-sub"><a href="ak_nilai.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Kelola Nilai</span></a></li>
			<li class="has-sub"><a href="#"><span>&nbsp;&nbsp;<?php	echo '<img src="images/imgguru/'.$data['foto'].'" class="img-square" width="30">&nbsp;&nbsp;:&nbsp;&nbsp;'.$_SESSION['username'].'';?></span></a>
		<ul>
			<li><a href="gu_datapribadi.php"> - Data Pribadi</a></li>
			<li><a href="gu_gantipassword.php"> - Ganti Password</a></li>
			<li><a href="s_keluar.php"> - Keluar</a></li>
		</ul></ul></li>
<?php } else if($_SESSION['level'] == "tatausaha"){ ?>
<?php
$base = "SELECT * FROM tatausaha";
$sql = mysqli_query($koneksi, $base);
$data = mysqli_fetch_array($sql);
?>
		<ul>
			<li class="has-sub"><a href="#"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Beranda</a></span></li>
			<li class="has-sub"><a href="ak_pembayaran.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Kelola Data Pembayaran</span></a></li>
			<li class="has-sub"><a href="#"><span>&nbsp;&nbsp;<?php	echo '<img src="images/imgtatausaha/'.$data['foto'].'" class="img-square" width="30">&nbsp;&nbsp;:&nbsp;&nbsp;'.$_SESSION['username'].'';?></span></a>
		<ul>
			<li><a href="tu_datapribadi.php"> - Data Pribadi</a></li>
			<li><a href="tu_gantipassword.php"> - Ganti Password</a></li>
			<li><a href="s_keluar.php"> - Keluar</a></li>
		</ul></ul></li>
<?php } else if($_SESSION['level'] == "siswa"){ ?>
<?php
$base = "SELECT * FROM siswa";
$sql = mysqli_query($koneksi, $base);
$data = mysqli_fetch_array($sql);
?>
		<ul>
			<li class="has-sub"><a href="#"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Beranda</a></span></li>
			<li class="has-sub"><a href="si_nilai.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Lihat Nilai</span></a></li>
			<li class="has-sub"><a href="si_jadwal.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Lihat Jadwal</span></a></li>
			<li class="has-sub"><a href="si_pembayaran.php"><span><img src="images/kLogo.png" width="25" height="25">&nbsp;&nbsp;Lihat Pembayaran</span></a></li>
			<li class="has-sub"><a href="#"><span><?php	echo '<img src="images/imgsiswa/'.$data['foto'].'" class="img-square" width="30">&nbsp;&nbsp;:&nbsp;&nbsp;'.$_SESSION['username'].'';?></span></a>
		<ul>
			<li><a href="si_datapribadi.php"> - Data Pribadi</a></li>
			<li><a href="si_gantipassword.php"> - Ganti Password</a></li>
			<li><a href="s_keluar.php"> - Keluar</a></li>
		</ul></ul></li>
<?php } ?>