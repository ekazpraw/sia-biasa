<?php
session_start();
if(empty($_SESSION['level'])){
header('location:index.php');
}
$level = $_SESSION['level'];
include 's_atas.php';
$sql = mysqli_query($koneksi, "select * from jadwal");
$hasil = mysqli_fetch_array($sql);
?>
	<!-- ISI -->
	<div class="container_12">
	<div class="module">
	<br>
	<h2><span>EDIT JADWAL GURU ANDA:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
	<td>
<form method="post" action="up_jadwalguru.php">
	<div class="form-group col-md-6">
	<label>Id Jadwal Guru: </label>
	<input type="text" class="form-control" value="<?php echo $hasil['id_jadwal']; ?>" name="id_jadwal"><br>
	<label>Nama Kelas: </label>
	<select class="form-control" name="id_kelas">
		<option value='0'>- Nama Mata Pelajaran -</option>
		<?php $sql = mysqli_query($koneksi, "SELECT * FROM kelas");
		while ($data = mysqli_fetch_array($sql)){
		echo "<option value=".$data['id_kelas'].">".$data['nama_kelas']."</option>";}?>
	</select><br>
	<label>Nama Mata Pelajaran: </label>
	<select class="form-control" name="id_matpel">
		<option value='0'>- Nama Mata Pelajaran -</option>
		<?php $sql = mysqli_query($koneksi, "SELECT * FROM matapelajaran");
		while ($data = mysqli_fetch_array($sql)){
		echo "<option value=".$data['id_matpel'].">".$data['nama_matpel']."</option>";}?>
	</select><br>
	<label>Nama Guru: </label>
	<select class="form-control" name="id_guru">
		<option value='0'>- Nama Guru -</option>
		<?php $sql = mysqli_query($koneksi, "SELECT * FROM guru");
		while ($data = mysqli_fetch_array($sql)){
		echo "<option value=".$data['id_guru'].">".$data['nama_guru']."</option>";}?>
	</select>
	</div>
	<div class="form-group col-md-6">
	<label>Hari: </label>
	<select class="form-control" name="hari">
		<option value="">--Hari--</option>
		<option value="Senin">Senin</option>
		<option value="Selasa">Selasa</option>
		<option value="Rabu">Rabu</option>
		<option value="Kamis">Kamis</option>
		<option value="Jumat">Jumat</option>
		<option value="Sabtu">Sabtu</option>
	</select><br>
	<label>Jam Pelajaran: </label>
	<select class="form-control" name="jam_pelajaran">
		<option value="">- Jam Pelajaran -</option>
		<option value="07:00 - 08:20">I. 07:00 - 08:20</option>
		<option value="08:20 - 09:40">II. 08:20 - 09:40</option>
		<option value="10:00 - 11:20">III. 10:00 - 11:20</option>
		<option value="11:20 - 12:40">IV. 11:20 - 12:40</option>
	</select><br>
		<button class="btn-success btn" type="submit">Submit</button>
		<button class="btn-default btn" type="reset">Reset</button>
</form>
	</tr>
	</td>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>