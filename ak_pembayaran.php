<?php
session_start();
if(empty($_SESSION['level'])){
header('location:index.php');
}
$level = $_SESSION['level'];
include 's_atas.php';
$no_urut=1;
$no_urut++;
?>
	<!-- ISI -->

	<div class="container_12">
	<div class="module">
	<br>
	<h2><span>DATA PEMBAYARAN ANDA:</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
		<tr>	
		<td>
		<form method="post" action="ap_pembayaran">
		<div class="form-group col-md-6">
		<label>Id Pembayaran: </label>
		<input type="text" class="form-control" value="<?php $no_urut+1 ?>" name="id_pembayaran" id="id_pembayaran"><br>
		<label>Id Tata Usaha: </label>
		<select class="form-control" name="id_tatausaha" id="id_tatausaha">
			<option value="">- Nama Tata Usaha -</option>
		<?php 
		$query = mysqli_query($koneksi, "SELECT * FROM tatausaha ORDER BY nama_tatausaha desc");
		while($data = mysqli_fetch_array($query)){
		echo '<option value="'.$data['id_tatausaha'].'">'.$data['nama_tatausaha'].'</option>';}
		?>
		</select><br>
		<label>Kelas: </label>
		<select class="form-control" name="id_kelas" id="kelas">
			<option value="">- Pilih Kelas -</option>
		<?php 
		$query = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas desc");
		while($data = mysqli_fetch_array($query)){
		echo '<option value="'.$data['id_kelas'].'">'.$data['nama_kelas'].'</option>';}
		?>
		</select>
		</div>
		<div class="form-group col-md-6">
		<label>Siswa: </label>
		<select class="form-control" name="nis" id="siswa">
			<option value="">- Pilih Siswa -</option>
		<?php 
		$query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nama_siswa desc");
		while($data = mysqli_fetch_array($query)){
		echo '<option value="'.$data['nis'].'">'.$data['nama_siswa'].'</option>';}
		?>
		</select>
		</div>
		<div class="form-group col-md-6">
		<label>Jenis Pembayaran: </label>
			<select class="form-control" name="tipe_bayar" id="tipe_bayar" onchange="gantiJumlah()">
			<option selected="true" disabled="disabled">- Pilih Jenis Pembayaran -</option>
			<option value="Buku">Buku Paket</option>
			<option value="SPP">SPP</option>
		</select>
		</div>
		<div class="form-group col-md-6">
		<label>Jumlah Bayar: </label>
			<input type="text" class="form-control" name="jumlah" id="jumlah">
		</div>
		<div class="form-group col-md-6">
		<label>Bulan: </label>
		<select class="form-control" id="periode_bayar" onchange="gantiJumlah()">
			<option value="Januari">Januari</option>
			<option value="Februari">Februari</option>
			<option value="Maret">Maret</option>
			<option value="April">April</option>
			<option value="Mei">Mei</option>
			<option value="Juni">Juni</option>
			<option value="Juli">Juli</option>
			<option value="Agustus">Agustus</option>
			<option value="September">September</option>
			<option value="Oktober">Oktober</option>
			<option value="November">November</option>
			<option value="Desember">Desember</option>					    
		</select>
		<br>
		<div align="center">
			<button type="button" class="btn-primary btn" onclick="validasi()">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" class="btn-default btn" onclick="reset()">Reset</button>
		</div></div>
<?php include "f_nilai-bayar.php"; ?>
		</form>
		</td>
		</tr>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>