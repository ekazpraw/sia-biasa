<?php 
include('../koneksi.php');
session_start();
$act = $_POST['act'];
	if(!empty($act)){
		switch ($act) {
		    case 'load-pembayaran':
			if (!empty($_POST["periode_bayar"])){
					$_SESSION["periode_bayar1"] = $_POST["periode_bayar"];	
				}	
			    echo '<table id="dataTables" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
				<br>
		        	  <thead>
						<tr>
							<th>ID</th>
							<th>Nama Siswa</th>
							<th>Tipe Pembayaran</th>
							<th>Tanggal Bayar</th>
							<th>Periode Pembayaran</th>
							<th>Nominal</th>
							<th>Aksi</th>
							
						</tr>
					</thead>
					<tfoot>
						
					</tfoot>
					<tbody>';
				
					$query = mysqli_query($connect, "SELECT pembayaran.id_pembayaran, pembayaran.nis, pembayaran.jumlah_bayar, pembayaran.tipe_bayar, pembayaran.periode_bayar, siswa.nama_siswa, pembayaran.inputTime FROM pembayaran INNER JOIN siswa ON pembayaran.nis = siswa.nis AND periode_bayar = '".$_SESSION['periode_bayar1']."' ORDER BY inputTime DESC");
					while ($data = mysqli_fetch_array($query)) {
					echo '<tr>
							<td>'.$data['nis'].'</td>
							<td>'.$data['nama_siswa'].'</td>
							<td>'.$data['tipe_bayar'].'</td>
							<td>'.$data['inputTime'].'</td>
							<td>'.$data['periode_bayar'].'</td>
							<td>'.$data['jumlah_bayar'].'</td>
							<td><a href="editpembayaran.php?id_pembayaran='.$data['id_pembayaran'].'" class="red-text">Edit</a> | <a href="#" onclick="hapusData(\''.$data['id_pembayaran'].'\')" class="red-text">Hapus</a> </td>
						</tr>';
					}
					echo '</tbody></table>';
		        break;
		    case 'submit-pembayaran':
		    	$query = mysqli_query($connect, "INSERT INTO pembayaran SET id_kelas = '$_POST[kelas]', nis = '$_POST[siswa]', tipe_bayar = '$_POST[tipe_bayar]', jumlah_bayar = '$_POST[jumlah]', periode_bayar = '$_POST[periode_bayar]'");
		    	if($query){
					echo "ok";
				} else {
					echo "gagal";
				}
		    	break;
		    case 'hapus-pembayaran':
		    	$query = mysqli_query($connect, "DELETE FROM pembayaran WHERE id_pembayaran = '$_POST[kd_bayar]'");
		    	if($query){
					echo "ok";
				} else {
					echo "gagal";
				}
		    	break;
		    case 'get-pembayaran':
		    	$query = mysql_query("SELECT * FROM pembayaran WHERE id_pembayaran = '$_POST[kd_bayar]'");
		    	if($query){
					$data = mysql_fetch_array($query);
					echo json_encode($data);
				} else {
					echo "gagal";
				}
		    	break;
		    default:
		         echo "tidak-valid";
		         break;
		}
	} else {
		echo "tidak-valid";
	}
?>