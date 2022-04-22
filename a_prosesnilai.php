<?php 
include('../koneksi.php');
session_start();
$act = $_POST['act'];
	if(!empty($act)){
		switch ($act) {
case 'load-nilai':
		    	if (!empty($_POST["id_guru"])){
					$_SESSION["id_guru"] = $_POST["id_guru"];	
				}			    echo '<table id="dataTables" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
		        	  <br>
					  <thead>
						<tr>
							<th>Nama Matpel</th>
							<th>Tahun Ajar</th>
							<th>Semester</th>
							<th>Nama Siswa</th>
							<th>Tugas</th>
							<th>Tugas 2</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai Akhir</th>
							<th>Aksi</th>

						</tr>
					</thead>
					<tfoot>
						
					</tfoot>
					<tbody>';
				
					$query = mysqli_query($connect, "SELECT * FROM matapelajaran, guru, nilai, siswa WHERE matapelajaran.id_matpel = nilai.id_matpel AND guru.id_guru = nilai.id_guru AND nilai.nis = siswa.nis AND nilai.id_guru = '".$_SESSION['id_guru']."'");
					while ($data = mysqli_fetch_array($query)) {
					echo '<tr>
							<td>'.$data['nama_matpel'].'</td>
							<td>'.$data['tahun_ajaran'].'</td>
							<td>'.$data['semester'].'</td>
							<td>'.$data['nama_siswa'].'</td>
							<td>'.$data['nilaitugas1'].'</td>
							<td>'.$data['nilaitugas2'].'</td>
							<td>'.$data['nilai_uts'].'</td>
							<td>'.$data['nilai_uas'].'</td>
							<td>'.$data['nilai_akhir'].'</td>
							<td><a href="editnilai.php?id_nilai='.$data['id_nilai'].'" class="red-text">Edit</a> | <a href="#" onclick="hapusData(\''.$data['id_nilai'].'\')" class="red-text">Hapus</a> </td>
						</tr>';
					}
					echo '</tbody></table>';
		        break;
		    case 'submit-nilai':
		    	$sql = "
		    			INSERT INTO 
		    				nilai 
		    			SET 
		    				id_guru = '$_SESSION[id_guru]',
							id_kelas = '$_POST[kelas]',
		    				id_matpel = '$_POST[matpel]', 
		    				tahun_ajaran = '$_POST[ta]', 
		    				semester = '$_POST[periode]',
		    				nis = '$_POST[siswa]',
		    				nilaitugas1 = '$_POST[tugas1]',
		    				nilaitugas2 = '$_POST[tugas2]',
		    				nilai_uts = '$_POST[uts]',
		    				nilai_uas = '$_POST[uas]',
		    				nilai_akhir = '$_POST[akhir]'
		    				";
		    	$query = mysqli_query($connect, $sql);
		    	if($query){
					echo "ok";
				} else {
					echo "gagal";
				}
		    	break;
		    case 'hapus-nilai':
		    	$query = mysqli_query($connect, "DELETE FROM nilai WHERE id_nilai = '$_POST[id_nilai]'");
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