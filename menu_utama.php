<?php
session_start();
if(empty($_SESSION['level'])){
header('location:index.php');
}
$level = $_SESSION['level'];
include 's_atas.php';
	echo "<div class='container_12'>";
	echo "<div class='module'>";
include 's_beranda.php';
	echo "</div>";
	echo "</div>";
?>