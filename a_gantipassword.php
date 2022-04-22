<?php
session_start();
$level = $_SESSION['level'];
include 's_atas.php';
?>
<?php include 'koneksi.php'; ?>
	<!-- ISI -->
	<div class="container_12">
	<div class="module">
	<br>
	<h2><span>DATA PRIBADI ANDA, <?php echo $_SESSION['username']; ?> ! :</span></h2>
	<div class="module-table-body">
	<table id="myTable" class="tablesorter">
	<tr>
	<td>
	<?php include "a_fsgantipassword.php"; ?>
	<form method="post">
	<div class="form-group col-md-6">
	<div class="form-group">
		Password Baru:</label>
		<input type="password" class="form-control" name="password_new" placeholder="Masukan Password Baru">
    </div>
    <div class="form-group">
        Ulangi Password Baru:</label>
        <input type="password" class="form-control" name="password_conf" placeholder="Ulangi Password Baru">
    </div>
    <div class="form-group">
		<button class="btn btn-primary" name="simpan" type="submit"> Simpan </button>
		<button class="btn btn-default" type="reset"> Batal </button>
    </div>
    </div>
    </form>
	</td>
	</tr>
	</div>
	</div>
	</div>
	</table>
	<!-- Akhir Isi -->
<?php include "bawah.php"; ?>