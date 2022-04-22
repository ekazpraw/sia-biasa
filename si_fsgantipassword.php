<?php
if(isset($_POST["simpan"])) {
$password_new   = $_POST['password_new']; //Password baru
$password_conf  = $_POST['password_conf']; //Konfirmasi password
if (empty(trim($password_new)) || empty(trim($password_conf)) ) {
echo "<script>alert('Form tidak boleh ada yang kosong!');</script>";
}else{
$id = $_SESSION['id'];
if($password_new == $password_conf) {
$update=mysqli_query($koneksi, "UPDATE siswa SET password = '".$password_new."' WHERE id = '$id'") or die (mysqli_connect_errno());
if($update){
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Berhasil Diubah!</div>';
}else{
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Password Gagal Diubah!</div>';
}}else{
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak Sama!</div>';
}}}
?> 