<?php
if(isset($_POST['login'])){
include("koneksi.php");
$username	= $_POST['username'];
$password	= $_POST['password'];
$level		= $_POST['level'];
$query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($query) == 0){
		echo '<div class="alert alert-danger">"Astagfirullah, Masuk Gagal !"<br>Silakan Periksa Kembali Nama Pengguna, Sandi, Maupun Tipe Anda Untuk Masuk.</div>';
	}else{
		$row = mysqli_fetch_assoc($query);
		if($row['level'] == 1 && $level == 1){
		$_SESSION['username']=$username;
		$_SESSION['level']='admin';
	header("Location: menu_utama.php");
	}else if($row['level'] == 2 && $level == 2){
		$_SESSION['username']=$username;
		$_SESSION['level']='guru';
	header("Location: menu_utama.php");
	}else if($row['level'] == 3 && $level == 3){
		$_SESSION['username']=$username;
		$_SESSION['level']='siswa';
	header("Location: menu_utama.php");
	}else if($row['level'] == 4 && $level == 4){
		$_SESSION['username']=$username;
		$_SESSION['level']='tatausaha';
	header("Location: menu_utama.php");
	}else{
		echo '<div class="alert alert-danger">"Astagfirullah, Masuk Gagal !"<br>Silakan Periksa Kembali Nama Pengguna, Sandi, Maupun Tipe Anda Untuk Masuk.</div>';
}}}
?>