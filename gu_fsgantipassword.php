<?php
if(isset($_POST["simpan"])) {
$password_new   = $_POST['password_new']; //Password baru
$password_conf  = $_POST['password_conf']; //Konfirmasi password
if (empty(trim($password_new)) || empty(trim($password_conf)) ) {
echo "<script>alert('Form tidak boleh ada yang kosong!');</script>";
}else{
if($password_new == $password_conf) {
$update=mysqli_query($koneksi, "UPDATE guru SET password = '".$password_new."' WHERE id_guru = '$id_guru'") or die (mysqli_connect_errno());
$update2=mysqli_query($koneksi, "UPDATE pengguna SET password = '".$password_new."' WHERE id_masuk = '$id_masuk'") or die (mysqli_connect_errno());
}}}
?> 