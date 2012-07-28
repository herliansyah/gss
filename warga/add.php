<?php
defined("_VALID_REQUEST") or die("Invalid Request");
?>
<script>
function checkForm(f) {
	if (trim(f.txtNama.value) == '') {
		alert('Masukkan Nama ');
		f.txtNamaUnit.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
</script>
<div id="sectionHeader">warga > Tambah</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
		<form name="frm" method="post" action="warga/qadd.php" onSubmit="return checkForm(this)">
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<tr>
                    <td>Nama* </td>
                    <td>:</td>
                    <td><input name="txtNama" type="text" id="txtNama" size="30" maxlength="150"></td>
            </tr>
            <tr>
                    <td>Alamat* </td>
                    <td>:</td>
                    <td>
                        <textarea name="txtAlamat" type="text" id="txtAlamat" cols="50" rows="4" ></textarea>
                    </td>
            </tr>            
            <tr>    <td>Blok* </td>
                    <td>:</td>
                    <td><input name="txtBlok" type="text" id="txtblok" size="10" maxlength="150"></td>
            </tr>
            <tr>    <td>No Rumah* </td>
                    <td>:</td>
                    <td><input name="txtNoRumah" type="text" id="txtNoRumah" size="10" maxlength="150"></td>
            </tr>
            <tr>    <td>Telepon* </td>
                    <td>:</td>
                    <td><input name="txtTelepon" type="text" id="txtTelepon" size="30" maxlength="150"></td>
            </tr>
            <tr>
                    <td>Hp* </td>
                    <td>:</td>
                    <td><input name="txtHp" type="text" id="txtHp" size="30" maxlength="150"></td>
            </tr>
            <tr>
                    <td>Luas Tanah* </td>
                    <td>:</td>
                    <td><input name="txtLT" type="text" id="txtLT" size="30" maxlength="150">&nbsp;m2</td>
            </tr>
            <tr>
                    <td>Golongan Tarif</td>
                    <td>:</td>
                    <td><?=dropDown("tbl_tarif","","tarif","id","tarif","tarif","tarif","selTarif","","")?>
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
					<input type="button" class="button" value="Batal" onClick="location.href='?mod=warga&cmd=index';">
				</td>
			</tr>
		</table>
		</form>
		</td>
	</tr>
	</tbody>
</table>
<script>
	document.frm.txtNama.focus();
</script>