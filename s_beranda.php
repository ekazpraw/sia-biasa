<?php include "slide.php"; ?>
<br>
<h2><span>Selamat Datang, <?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['level']; ?>) !</span></h2>
<table>
<tr>
<td>
	<div class="slideshow-container">
	<div class="mySlides fade">
		<img src="images/imgslider/slide1.png" style="width:100%">
	</div>
	<div class="mySlides fade">
		<img src="images/imgslider/slide2.png" style="width:100%">
	</div>
	<div class="mySlides fade">
		<img src="images/imgslider/slide3.png" style="width:100%">
	</div>
	</div>
	<br>
	<div style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>
</td>
</tr>
</table>
<?php include "bawah.php"; ?>
<?php include "slidejs.php"; ?>