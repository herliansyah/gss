<?php
defined("_VALID_REQUEST") or die("Invalid Request");
$sql = "select * from tbl_bendahara where id = '$_GET[id]'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
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
<div id="sectionHeader">Data Bendahara > Ubah</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
		<form name="frm" method="post" action="bendahara/qedit.php" onSubmit="return checkForm(this)" enctype="multipart/form-data">
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			</tr>
            <tr>
				<td width="150">Bendahara* </td>
				<td>:</td>
				<td>
                <input type="hidden" name="hId" id="hId" size="70" value="<?=$row['id']?>"/>
                <input type="text" name="txtBendahara" id="txtBendahara" size="70" value="<?=$row['bendahara']?>"/>
                </td>
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
					<input type="submit" class="button" value="Simpan">
					<input type="button" class="button" value="Batal" onClick="location.href='?mod=bendahara&cmd=index';">
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