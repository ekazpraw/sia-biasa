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
	<label>Id Kelas: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['id_kelas']; ?>" name="id_kelas"><br>
	<label>Id Guru: </label>
	<select class="form-control" name="id_guru">
		<option value='0'>- Id Guru -</option>
		<?php $sql = mysqli_query($koneksi, "SELECT id_guru FROM guru");
		while ($data = mysqli_fetch_array($sql)){
		echo "<option value=".$data['id_guru'].">".$data['id_guru']."</option>";}?>
	</select><br>
	<label>Nama Kelas: </label>
	<select class="form-control" name="nama_kelas">
		<option value="">- Nama Kelas -</option>
		<option value="VII-1">VII-1</option>
		<option value="VII-2">VII-2</option>
		<option value="VII-3">VII-3</option>
		<option value="VII-4">VII-4</option>
		<option value="VIII-1">VIII-1</option>
		<option value="VIII-2">VIII-2</option>
		<option value="VIII-3">VIII-3</option>
		<option value="VIII-4">VIII-4</option>
		<option value="IX-1">IX-1</option>
		<option value="IX-2">IX-2</option>
		<option value="IX-3">IX-3</option>
		<option value="IX-4">IX-4</option>
	</select>
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