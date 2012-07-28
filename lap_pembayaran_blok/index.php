<?php
defined("_VALID_REQUEST") or die("Invalid Request");
?>
<script>
function checkForm(f) {
	if (trim(f.file.value) == '' && trim(f.txtKet.value) == '' ) {
		alert('Data Harus di isi.');
		f.txtKet.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
</script>
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript" src="js/jquery.datepick-id.js"></script>
<script type="text/javascript">
$(function() {
	$('#date').datepick({showOn: 'both',buttonImageOnly: true, buttonImage: 'images/calendar.gif',defaultDate: '-1w', showDefault: true});
});

$(function(){
    $('#jam').timepickr({
        handle: '#trigger-test',
        convention: 12 });
});

</script>
<link href="js/jquery.datepick.css" rel="stylesheet" type="text/css" />
<div id="sectionHeader">Laporan Pembayaran IPL Per Rumah & Blok</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
		<form name="frm" method="post" action="lap_pembayaran_blok/lap.php" target="_blank">
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			
           <tr>
				<td width="150">Blok</td>
				<td>:</td>
				<td>
                	<select name="selBlok">
                    	<option value=""> -- Semua Blok -- </option>
					<?php
						$sql = "select blok from tbl_warga group by blok order by blok";
						$res = mysql_query($sql);
						while($row = mysql_fetch_array($res)){
								?>
                                	<option value="<?=$row['blok']?>"><?=$row['blok']?></option>
                                <?
								
						}
					?>
                    </select>	
                </td>
            </tr> 
            <tr>
				<td width="150">Nama</td>
				<td>:</td>
				<td>
                	<select name="selNama">
                    	<option value=""> -- Semua Nama -- </option>
					<?php
						$sql = "select * from tbl_warga";
						$res = mysql_query($sql);
						while($row = mysql_fetch_array($res)){
								?>
                                	<option value="<?=$row['nama']?>"><?=$row['nama']?> - <?=$row['blok']?> - <?=$row['no_rumah']?></option>
                                <?
								
						}
					?>
                    </select>	
                </td>
            </tr>  
            
			<tr>
                <td width="150">Jenis Laporan</td>
				<td>:</td>
				<td colspan="3"><input type="radio" name="pilihan" value="view" checked="true" /> View<input type="radio" name="pilihan" value="cetak" /> Cetak</td>
			</tr> 
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<input type="submit" class="button" value="Proses">
				</td>
			</tr>
		</table>
		</form>
		</td>
	</tr>
	</tbody>
</table>
<script>
	document.frm.txtNamaUnit.focus();
</script>