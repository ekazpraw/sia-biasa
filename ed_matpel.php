<?php
session_start();
if(empty($_SESSION['level'])){
header('location:index.php');
}
$level = $_SESSION['level'];
include 's_atas.php';
$sql = mysqli_query($koneksi, "select * from matapelajaran");
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
	<form method="post" action="up_matpel.php">
	<div class="form-group col-md-6">
	<label>Id Mata Pelajaran: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['id_matpel']; ?>" name="id_matpel"><br>
	<label>Nama Mata Pelajaran: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['nama_matpel']; ?>" name="nama_matpel"><br>
	<label>KKM: </label>
		<input type="text" class="form-control" value="<?php echo $hasil['kkm']; ?>" name="kkm"><br>
	<label>Nama Guru: </label>
	<select class="form-control" name="id_guru">
		<option value='0'>- Nama Guru -</option>
		<?php $sql = mysqli_query($koneksi, "SELECT id_guru, nama_guru FROM guru");
		while ($data = mysqli_fetch_array($sql)){
		echo "<option value=".$data['id_guru'].">".$data['nama_guru']."</option>";}?>
	</select><br>
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