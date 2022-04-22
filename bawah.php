<table>
	<tr>
	<td align="right">
	Tanggal Saat Ini:
	<?php
	$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
	echo $date->format('d-m-Y');
	?>
	</td>
	</tr>
</table>