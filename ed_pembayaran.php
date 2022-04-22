<?php
include_once 'header.php';
include('../koneksi.php');
?>

<?php
    $id_pembayaran = $_GET['id_pembayaran'];
            $sql = mysqli_query($connect, "SELECT * FROM pembayaran,siswa WHERE pembayaran.nis=siswa.nis and id_pembayaran='$id_pembayaran' ");
            if(mysqli_num_rows($sql) == 0){
                header("Location: pembayaran.php");
            }else{
                $row = mysqli_fetch_assoc($sql);
            }
?>


 <?php
			if(isset($_POST['add'])){
				$tp  		= $_POST['tipe_bayar'];
				$pb  		= $_POST['periode_bayar'];
				$j  		= $_POST['jumlah'];
				/*
				$gambar			= $_FILES['foto']['name'];
				$uploaddir		= '../images/';	
				$uploadfile 	=$uploaddir.$gambar;

				$foto = $_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];

				$fotobaru = date('dmYHis').$foto;
				// Set path folder tempat menyimpan fotonya
				$path = "../images/".$fotobaru;

					
					if(move_uploaded_file($tmp, $path)) {
						echo'<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Foto Berhasil Di upload.</div>';
					}else {
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Foto Gagal Di simpan !</div>';
					}
				*/
				$update = mysqli_query($connect, "UPDATE pembayaran SET jumlah_bayar='$j', tipe_bayar='$tp', periode_bayar='$pb' WHERE id_pembayaran='$id_pembayaran'")or die(mysqli_error());
                        if($update){
						echo "<script language=\"JavaScript\">\n";
						  echo "alert('Sukses Update pembayaran!');\n";
						  echo "window.location='pembayaran.php'";
						  echo "</script>";
						} else {
						  echo "<script language=\"JavaScript\">\n";
						  echo "alert('Gagal update pembayaran!');\n";
						  echo "window.location='editpembayaran.php?id_pembayaran=$id_pembayaran'";
						  echo "</script>";
						  }

				}	
				
			?>


<div id="page-wrapper">

<!-- start content -->
<div class="graphs">
	<h3 class="blank1">Ubah Pembayaran</h3>
	<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post">
								
								<div class="form-group col-md-6"><br>
								  <label for="sel1">Nama Siswa</label>
								  <input type="text" class="form-control" id="nama" value="<?php echo $row['nama_siswa'];?>" disabled>
								</div>
		
								<div class="form-group col-md-6"><br>
							    <label for="siswa">Jenis Pembayaran</label>
							    <select class="form-control" id="tipe_bayar" name="tipe_bayar" required onchange="gantiJumlah()">
							    	<option value="<?php echo $row['tipe_bayar'];?>"><?php echo $row['tipe_bayar'];?></option>
									<option value="SPP">SPP</option>
							    	<option value="Buku">Buku Paket</option>
							    </select>
							  </div>
							  <div class="form-group col-md-6">
							    <label for="siswa">Bulan</label>
							    <select class="form-control" id="periode_bayar" name="periode_bayar" required >
							    	<option value="<?php echo $row['periode_bayar'];?>"><?php echo $row['periode_bayar'];?></option>
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
							  </div>
							  
							  <div class="form-group col-md-6">
							    <label for="siswa">Biaya</label>
							  <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah_bayar'];?>" readonly>
							  </div>
							  
							  <div class="panel-footer">
									<div class="row">
										<div class="col-sm-8 col-sm-offset">
											<button class="btn-success btn" name="add" type="submit">Submit</button>
											<button class="btn-default btn" ><a href="pembayaran.php">Cancel</a></button>
										</div>
									</div>
						 		</div>
								
							</form>
						</div>
					</div>
		</div>
		
<!-- end content -->
		</div>
	<!--body wrapper start-->
	<script>
	$(document).ready(function(){
		$(".tampungdata").html("<center>Sedang memuat data...</center>");
	    load_content();
	});
	
	function hitungNilai(){
		tugas1 = $("#tugas1").val() * 0.1;
		tugas2 = $("#tugas2").val() * 0.2;
		uts = $("#uts").val() * 0.3;
		uas = $("#uas").val() * 0.4;
		
		akhir = tugas1 + tugas2 + uts + uas;
		$("#akhir").val(akhir);
	}
	
	function load_content(){
		$.post('proses-nilai.php', {act: "load-pembayaran"}, function(data){
	        $(".tampungdata").html(data);
	        $('#dataTables').DataTable({
	        	"aaSorting": [[ 3, "desc" ]],
	        	"aoColumnDefs": [
			          { 'bSortable': false, 'aTargets': [ 6 ] }
			       ]
	        });
	    });
	}
	
	function openForm(){
		$( "#form-data" ).slideDown( "fast", function() {
		    // Animation complete.
		  });
	}
	
	function closeForm(){
		$( "#form-data" ).slideUp( "fast", function() {
		    // Animation complete.
		  });
	}
	
	function showProses(){
		$(".proses").show();
	}
	
	function hideProses(){
		$(".proses").hide();
	}
	
	function hapusData(id){
		showProses();
		$.post('proses-nilai.php', {
			'act': 'hapus-nilai', 
			'id_nilai': id
			}, function(data){
	    		if(data == "ok"){
					load_content();
					hideProses();
				} else {
					alert("Data gagal dihapus");
					hideProses();
				}
	    	});
	}
	
	function gantiJumlah(){
		if ($("#tipe_bayar").val() == "SPP"){
			$("#jumlah").val('150000');
		} else {
			$("#jumlah").val('100000');
		}
	}
	
	function submitData(){
		showProses();
		var form = "#form-pembayaran";
		$.post('proses-nilai.php', {
			'act': 'submit-nilai', 
			'kelas': $(form + ' #kelas').val(),
			'siswa': $(form + ' #siswa').val(),
			'tugas1': $(form + ' #tugas1').val(),
			'tugas2': $(form + ' #tugas2').val(),
			'uts': $(form + ' #uts').val(),
			'uas': $(form + ' #uas').val(),
			'periode': $(form + ' #periode').val(),
			'matpel': $(form + ' #matpel').val(),
			'akhir': $(form + ' #akhir').val(),
			'ta': $(form + ' #TA').val()
			}, function(data){
	    		if(data == "ok"){
					load_content();
					closeForm();
					hideProses();
				} else {
					hideProses();
					alert("Data gagal ditambah");
				}
	    	});
	}
</script>
<?php
include_once 'footer.php';
?>