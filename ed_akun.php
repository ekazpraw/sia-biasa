<?php
session_start();
if(empty($_SESSION['level'])){
header('location:index.php');
}
$level = $_SESSION['level'];
include 's_atas.php';
$sql = mysqli_query($koneksi, "select * from admin");
$hasil = mysqli_fetch_array($sql);
?>
	<!-- ISI -->
	<div class="container_12">
	<div class="module">
	<br>
	<h2><span>EDIT ADMIN ANDA:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
	<td>
	<form method="post" action="up_akun.php">
	<div class="form-group col-md-6">
	<label>Id Admin: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['id_admin']; ?>" name="id_admin"><br>
	<label>NIK: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['nik']; ?>" name="nik"><br>
	<label>Nama Admin: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['nama_admin']; ?>" name="nama_admin"><br>
	<label>Password: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['password']; ?>" name="password"><br>
	<label>Alamat: </label>
		<input type="textarea" name="alamat" cols="50" rows="4" value="<?php echo $hasil['alamat']; ?>" class="form-control"></textarea><br>
	</div>
	<div class="form-group col-md-6">
	<label>Tempat Lahir: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['tmp_lahir']; ?>" name="tmp_lahir"><br>
	<label>Tanggal Lahir: </label>
	<input type="text" id="form-control" class="tanggal" value="<?php echo $hasil['tgl_lahir']; ?>" name="tgl_lahir">
	<script type="text/javascript">
		$(document).ready(function(){
			$('.tanggal').datepicker();		
		});
	</script><br>
	<label>Agama: </label>
	<select class="form-control" name="agama">
		<option value="">- Agama -</option>
		<option value="Islam">Islam</option>
		<option value="Kristen">Kristen</option>
		<option value="Katolik">Katolik</option>
		<option value="Hindu">Hindu</option>
		<option value="Buddha">Buddha</option>
		<option value="Konghucu">Konghucu</option>
	</select><br>
	<label>Jenis Kelamin: </label>
	<br>
		<input type="radio" value="Laki-Laki" checked="" name="jk"> Perempuan</label> /
		<input type="radio" value="Perempuan" checked="" name="jk"> Laki-Laki</label>
	<br><br>
	<label>Nomor Telepon: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['no_tlp']; ?>" name="no_tlp" maxlength="20"><br>
	<label>Foto: </label>
		<input type="file" name="foto"><br>
		<button class="btn-success btn" type="submit">Submit</button>
		<button class="btn-default btn" type="reset">Cancel</button>
</form>
	</tr>
	</td>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>