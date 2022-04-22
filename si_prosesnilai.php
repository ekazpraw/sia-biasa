<?php 
include('koneksi.php');
session_start();
$act = $_POST['act'];
	if(!empty($act)){
		switch ($act) {
		    case 'load-nilai':
		    	if (!empty($_POST["periode"])){
					$_SESSION["periode_bayar"] = $_POST["periode"];	
				}
		        echo '<table id="dataTables" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
		        	  <thead>
						<tr>
							<th>Nama Matpel</th>
							<th>Tahun Ajar</th>
							<th>Semester</th>
							<th>Tugas</th>
							<th>Tugas 2</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
						</tr>
					</thead>
					<tfoot>
						
					</tfoot>
					<tbody>';
				
 					$query = mysqli_query($connect, "SELECT nilai.id_nilai, matapelajaran.id_matpel, matapelajaran.kkm, matapelajaran.nama_matpel, guru.nama_guru, nilai.tahun_ajaran, nilai.semester, nilai.nis, siswa.nama_siswa, nilai.nilaitugas1, nilai.nilaitugas2, nilai.nilai_uts, nilai_uas, nilai_akhir FROM matapelajaran, guru, nilai, siswa WHERE matapelajaran.id_matpel = nilai.id_matpel AND guru.id_guru = nilai.id_guru AND nilai.nis = siswa.nis AND nilai.nis = '".$_SESSION['nis']."' AND nilai.semester = '".$_SESSION['periode_bayar']."'");
					if (mysqli_num_rows($query) > 0){
						while ($data = mysqli_fetch_array($query)) {
						echo '<tr>
							<td>'.$data['nama_matpel'].'</td>
							<td>'.$data['tahun_ajaran'].'</td>
							<td>'.$data['semester'].'</td>
							<td>'.$data['nilaitugas1'].'</td>
							<td>'.$data['nilaitugas2'].'</td>
							<td>'.$data['nilai_uts'].'</td>
							<td>'.$data['nilai_uas'].'</td>
							<td>'.$data['nilai_akhir'].'</td>
						</tr>';
						}
						echo '</tbody></table>';	
					} else {
						echo '<tr>
								<td colspan="8"><center>Tidak ada data nilai di periode ini</center></td>
							</tr>';

						echo '</tbody></table>';
					}
		        break;
		    case 'submit-pembayaran':
		    	$query = mysqli_query($connect, "INSERT INTO pembayaran SET nis = '$_POST[kd_siswa]', tipe_bayar = '$_POST[tipe_bayar]', jumlah_bayar = '$_POST[jumlah]', periode_bayar = '$_POST[periode_bayar]'");
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