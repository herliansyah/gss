<?php
defined("_VALID_REQUEST") or die("Invalid Request");
?>
<script>
function checkForm(f) {
	if (trim(f.txtNama.value) == '') {
		alert('Masukkan Nama ');
		f.txtNama.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
</script>
<div id="sectionHeader">Item > Tambah</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
		<form name="frm" method="post" action="item/qadd.php" onSubmit="return checkForm(this)">
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			  
                        <tr>
                                <td>Kode Barang * </td>
                                <td>:</td>
                                <td><input name="txtKode" type="textKode" id="txt" size="10" maxlength="150"></td>
                        </tr>
                        <tr>
                                <td>Nama Barang * </td>
                                <td>:</td>
                                <td><input name="txtNama" type="text" id="txtNama" size="30" maxlength="150"></td>
                        </tr>
                        <tr>
                                <td>Type Real</td>
                                <td>:</td>
                                <td><input name="txtType" type="text" id="txtType" size="20" maxlength="150"></td>
                        </tr>
                         <tr>
                                <td>Type Substitusi</td>
                                <td>:</td>
                                <td><input name="txtTypeS" type="text" id="txtTypeS" size="20" maxlength="150"></td>
                        </tr>
                        <tr>
                                <td>Merk </td>
                                <td>:</td>
                                <td><input name="txtMerk" type="text" id="txtMerk" size="20" maxlength="150"></td>
                        </tr>
                        <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td><input name="txtHarga" type="text" id="txtHarga" size="20" maxlength="150"></td>
                        </tr>
                        <tr>
                                <td>Satuan Masuk</td>
                                <td>:</td>
                                <td><input name="txtSatuanMasuk" type="text" id="txtSatuanMasuk" size="10" maxlength="150"></td>
                        </tr>
                        </td>
                                <td>Satuan Keluar</td>
                                <td>:</td>
                                <td><input name="txtSatuanKeluar" type="text" id="txtSatuanKeluar" size="10" maxlength="150"></td>
                        </tr>
                        <tr>
                                <td>Konversi</td>
                                <td>:</td>
                                <td><input name="txtKonversi" type="text" id="txtKonversi" size="10" maxlength="150"></td>
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
					<input type="button" class="button" value="Batal" onClick="location.href='?mod=item&cmd=index';">
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