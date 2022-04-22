<?php
session_start();
if(empty($_SESSION['level'])){
header('location:index.php');
}
$level = $_SESSION['level'];
include 's_atas.php';
?>
	<!-- ISI -->
	<div class="container_12">
	<div class="module">
	<br>
	<h2><span>TAMBAH NILAI SISWA ANDA, <?php echo $_SESSION['username']; ?> ! :</span></h2>
	<div class="module-table-body">
	<table id="" name="myTable" class="tablesorter">
	<tr>
	<td>
	<form method="post" action="ap_nilai.php">
	<div class="form-group col-md-6">
		<label>Nama Guru :</label>
		<select class="form-control" id="id_guru" name="id_guru" onchange="load_content()">
			<option value="">- Pilih Guru -</option>
			<?php 
			$query = mysqli_query($koneksi, "SELECT * FROM guru");
			while($data = mysqli_fetch_array($query)){
			echo '<option value="'.$data['id_guru'].'">'.$data['nama_guru'].'</option>';
			}?>
		</select><br>
		<label>Kelas: </label>
		<select class="form-control" id="id_kelas" name="id_kelas">
			<option value="">- Pilih Kelas -</option>
			<?php 
			$query = mysqli_query($koneksi, "SELECT * FROM kelas");
			while($data = mysqli_fetch_array($query)){
			echo '<option value="'.$data['id_kelas'].'">'.$data['nama_kelas'].'</option>';
			}?>
		</select><br>
		<label>Nama Siswa: </label>
		<select class="form-control" id="nis" name="nis">
			<option value="">- Pilih Siswa -</option>
			<?php 
			$query = mysqli_query($koneksi, "SELECT * FROM siswa");
			while($data = mysqli_fetch_array($query)){
			echo '<option value="'.$data['nis'].'">'.$data['nama_siswa'].'</option>';
			}?>
		</select><br>
		<label>Mata Pelajaran: </label>
		<select class="form-control" id="id_matpel" name="id_matpel">
			<option value='0'>- Pilih Mata Pelajaran -</option>
			<?php $sql = mysqli_query($koneksi, "SELECT * FROM matapelajaran");
			while ($data = mysqli_fetch_array($sql)){
			echo "<option value=".$data['id_matpel'].">".$data['nama_matpel']."</option>";}?>
		</select><br>
		<button class="btn-success btn" type="submit">Submit</button>
		<button class="btn-default btn" type="reset">Reset</button>
	</div>
	<div class="form-group col-md-6">
		<label>Tahun Ajaran: </label>
			<?php $ta=date("Y"); $ta2=$ta+1; ?>
		<input type="text" class="form-control" id="TA" name="TA" value="<?php echo $ta."/".$ta2 ?>" disabled=disabled><br>
		<label>Semester: </label>
		<select class="form-control" id="periode" name="periode">
			<option value="Ganjil">Ganjil</option>
			<option value="Genap">Genap</option>
		</select><br>
		<label>Keterangan: </label>
		<input type="text" class="form-control" id="keterangan" name="keterangan"><br>
	<div class="form-group col-md-4">
		<label>Nilai Tugas: </label>
		<input type="text" class="form-control" id="tugas1" name="tugas1" required maxlength="3" value="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="hitungNilai()">
	</div>
	<div class="form-group col-md-4">
		<label>Nilai Tugas 2: </label>
		<input type="text" class="form-control" id="tugas2" name="tugas2" required maxlength="3" value="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="hitungNilai()">
	</div>
	<div class="form-group col-md-4">
		<label>Nilai UTS: </label>
		<input type="text" class="form-control" id="uts" name="uts" required maxlength="3" value="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="hitungNilai()">
	</div>
	<div class="form-group col-md-4">
		<label>Nilai UAS: </label>
		<input type="text" class="form-control" id="uas" name="uas" required maxlength="3" value="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="hitungNilai()">
	</div>
	<div class="form-group col-md-4">
		<label>Nilai Akhir: </label>
		<input type="text" class="form-control" id="akhir" name="akhir" disabled maxlength="3" value="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
	</div>
	</div>
	</form>
<?php include "f_nilai-bayar.php"; ?>
	</td>
	</tr>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>