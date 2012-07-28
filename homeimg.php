<?
	//defined('_VALID_REQUEST') or die( 'Direct Access to this location is not allowed.' );
?>
<script language="javascript">
function SwapImage(imgobj,imgsrc) {
   document[imgobj].src=imgsrc;
}
</script>
<link href="style.css" rel="stylesheet" type="text/css">
<table border="0" align="center">
	<tr>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=pendaftaran'" width="100" height="60" name="imgdok" src="images/pendaftaran.jpg" ></td>
		<td><img src="images/arrow_right.jpg" width="70"></td>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=pendataan'" width="100" height="60" name="imgau" src="images/pendataan.jpg"></td>
		<td><img src="images/arrow_right.jpg" width="70"></td>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=penetapan'" width="100" height="60" name="imgahs" src="images/penetapan.jpg"></td>
		<td><img src="images/arrow_right.jpg" width="70"></td>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=angsurtunda'" width="100" height="60" name="imgwbs" src="images/time.jpg"></td>
		<td><img src="images/arrow_right.jpg" width="70"></td>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=penagihan'" width="100" height="60" name="imgwbs" src="images/penagihan.gif"></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr class="imagecaption">
		<td>Pendaftaran</td>
		<td></td>
		<td>Pendataan</td>
		<td></td>
		<td>Penetapan</td>
		<td></td>
		<td>Angsuran & Penundaan</td>
		<td></td>
		<td>Penagihan</td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="9"></td>
		<td><img src="images/arrow_downright.jpg" width="40" height="50"></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="9"></td>
		<td><img onclick="javascript:location='index.php?mod=penyetoran&cmd=index'" width="100" height="60" name="imgjad" src="images/penyetoran.gif"></td>
	</tr>
	<tr class="imagecaption">
		<td colspan="9"></td>
		<td>Penyetoran</td>
	</tr>
	<tr>
		<td colspan="9"></td>
		<td><img src="images/arrow_downleft.jpg" width="40" height="50"></td>
		<td></td>
	</tr>
	<tr>
		
		<td><img onclick="javascript:location='index.php?mod=usermgnt&cmd=index'" width="100" height="60" name="imgcf" src="images/admin.jpg"></td>
		<td></td>
		<td><img onclick="javascript:location='index.php?mod=grafik&cmd=home'" width="100" height="60" name="imgcf" src="images/grafik.jpg"></td>
		<td></td>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=lap'" width="100" height="60" name="imgcf" src="images/laporan.jpg"></td>
		<td><img src="images/arrow_left.jpg" width="70"></td>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=rekap'" width="100" height="60" name="imgcf" src="images/rekap.jpg"></td>
		<td><img src="images/arrow_left.jpg" width="70"></td>
		<td><img onclick="javascript:location='index.php?mod=akses&cmd=benda'" width="100" height="60" name="imglr" src="images/pengelolaan.gif"></td>
		</tr>
	<tr class="imagecaption">
		
		<td>User Management</td>
		<td></td>
		<td>Grafik Pendapatan</td>
		<td></td>
		<td>Laporan</td>
		<td></td>
		<td>Rekapitulasi PAD</td>
		<td></td>
		<td>Pengelolaan Benda Berharga</td>
	</tr>
</table>
