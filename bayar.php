<script>
$(document).ready(function(){
$(".tampungdata").html("<center>Sedang memuat data...</center>");
load_content();
});
function load_content(){
$.post('tu_prosespembayaran.php',{act: "load-pembayaran"}, function(data){
$(".tampungdata").html(data);
$('#dataTables').DataTable({
"aaSorting": [[ 3, "desc" ]],
"aoColumnDefs": [
{ 'bSortable': false, 'aTargets': [ 6 ] }]});});}
function openForm(){$("#form-data").slideDown("fast", function(){});}
function closeForm(){$("#form-data").slideUp("fast", function(){});}
function showProses(){$(".proses").show();}
function hideProses(){$(".proses").hide();}
function hapusData(id){
showProses();
$.post('tu_prosespembayaran.php',{
'act': 'hapus-pembayaran', 
'kd_bayar': id
},function(data){
if(data == "ok"){
load_content();
hideProses();
}else{
alert("Data gagal dihapus");
hideProses();}});}
function gantiJumlah(){
if ($("#tipe_bayar").val() == "SPP"){$("#jumlah").val('150000');
}else{$("#jumlah").val('100000');}}
function submitData(){
showProses();
var form = "#form-pembayaran";
$.post('tu_prosespembayaran.php',{
'act': 'submit-pembayaran',
'kelas': $(form + ' #kelas').val(),
'siswa': $(form + ' #siswa').val(),
'tipe_bayar': $(form + ' #tipe_bayar').val(),
'jumlah': $(form + ' #jumlah').val(),
'periode_bayar': $(form + ' #periode_bayar').val()
},function(data){
if(data == "ok"){
load_content();
closeForm();
hideProses();
alert("Data Berhasil Ditambah");
}else{
hideProses();
alert("Data gagal ditambah");}});}
function validasi(){
var kelas = document.getElementById("kelas").value;
var siswa = document.getElementById("siswa").value;
var tipebayar = document.getElementById("tipe_bayar").value;
var jumlah = document.getElementById("jumlah").value;
var periode = document.getElementById("periode_bayar").value;
if (kelas != "" && siswa!="" && tipebayar !="" && jumlah !="" && periode !=""){
submitData();}else{alert('Anda harus mengisi semua field !');
openForm();}}
</script>