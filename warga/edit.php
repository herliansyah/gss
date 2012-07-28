<?php
defined("_VALID_REQUEST") or die("Invalid Request");

$sql = "
	SELECT *
	FROM tbl_warga 
	WHERE id = ?
";
$rs = $oDb->execute($sql, array($_GET['id']));
?>
<script>
function checkForm(f) {
	if (trim(f.txtNama.value) == '') {
		alert('Masukkan Nama');
		f.txtNama.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
</script>
<div id="sectionHeader">warga > Edit</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
			<form name="frm" method="post" action="warga/qedit.php" onSubmit="return checkForm(this)">
				<input name="id" type="hidden" value="<?=$rs->fields['id']?>">
				<table border="0" cellpadding="2" cellspacing="0"  width="100%">
					<tr>
						<td>Nama* </td>
						<td>:</td>
						<td><input name="txtNama" type="text" id="txtNama" size="30" maxlength="150" value="<?=htmlspecialchars($rs->fields['nama'])?>"></td>
					</tr>
                    <tr>
						<td>Alamat* </td>
						<td>:</td>
						<td>
                           <textarea name="txtAlamat" type="text" id="txtAlamat" cols="50" rows="4" ><?=htmlspecialchars($rs->fields['alamat'])?></textarea>
                    </td>
                    <tr>    
                    	<td>Blok* </td>
                    	<td>:</td>
                    	<td><input name="txtBlok" type="text" id="txtblok" size="10" maxlength="150" value="<?=htmlspecialchars($rs->fields['blok'])?>"></td>
                    </tr>
                    <tr>    
                    	<td>No Rumah* </td>
                        <td>:</td>
                        <td><input name="txtNoRumah" type="text" id="txtNoRumah" size="10" maxlength="150" value="<?=htmlspecialchars($rs->fields['no_rumah'])?>"></td>
                    </tr>
                    <tr>    
                        <td>Telepon* </td>
						<td>:</td>
						<td><input name="txtTelepon" type="text" id="txtTelepon" size="30" maxlength="150" value="<?=htmlspecialchars($rs->fields['telepon'])?>"></td>
					</tr>
                    <tr>
						<td>Hp* </td>
						<td>:</td>
						<td><input name="txtHp" type="text" id="txtHp" size="30" maxlength="150" value="<?=htmlspecialchars($rs->fields['hp'])?>"></td>
					</tr>
                    <tr>
						<td>Luas Tanah* </td>
						<td>:</td>
						<td><input name="txtLT" type="text" id="txtLT" size="30" maxlength="150" value="<?=htmlspecialchars($rs->fields['luas_tanah'])?>"></td>
					</tr>
                    
                 <tr>
                        <td>Golongan Tarif</td>
                        <td>:</td>
                        <td><?=dropDown("tbl_tarif","","tarif","id","tarif","tarif","tarif","selTarif","$rs->fields[id_tarif]","")?>
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
							<input name="submit" type="submit" class="button" value="Simpan">
							<input name="button" type="button" class="button" onClick="location.href='?mod=warga&cmd=index';" value="Batal">
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
	</tbody>
</table>
<script>
	document.frm.txtNama.select();
</script>
