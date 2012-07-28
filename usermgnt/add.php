<?php
defined("_VALID_REQUEST") or die("Invalid Request");
require_once $config['lib_dir'].'/class.menutree.php';

$menu = new MenuTree(0, '', '',0, 1, -1);
?>
<script>
function checkForm(f) {
	if (trim(f.txtUserName.value) == '') {
		alert('Masukkan username Anda.');
		f.txtUserName.select();
	}
	else if (trim(f.txtPassword.value) == '') {
		alert('Masukkan password');
		f.txtPassword.select();
	}
	else if (trim(f.txtConfirmPassword.value) == '') {
		alert('Masukkan konfirmasi password');
		f.txtConfirmPassword.select();
	}
	else if (trim(f.txtPassword.value) != trim(f.txtConfirmPassword.value)) {
		alert ('Password dan konfirmasi password tidak sama.');
		f.txtConfirmPassword.focus();
	}
	else if (trim(f.txtFullName.value) == '') {
		alert('Masukkan nama lengkap Anda');
		f.txtFullName.select();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
function cekMenuAll(chkAll,chk){
	if (chkAll != null) {
	 	if (chkAll.length == null) chkAll.checked = chk.checked;
	 	else for (i=0;i<chkAll.length;i++) chkAll[i].checked = chk.checked;
	}
}
function isAdministrator(chkAll,chk){
	if(chk.checked){
		cekMenuAll(chkAll,chk);
	}
}
</script>
<div id="sectionHeader">Pengguna Aplikasi > Tambah</div>
<table border="0" cellpadding="1" cellspacing="0" id="b2">
	<thead>
	<tr>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>
		<form name="frm" method="post" action="usermgnt/qadd.php" onSubmit="return checkForm(this)">
		<table border="0" cellpadding="2" cellspacing="0" width="100%">
			<tr>
				<td width="150">Username* </td>
				<td>:</td>
				<td><input name="txtUserName" type="text" id="txtUserName" size="30" maxlength="50"></td>
			</tr>
			<tr>
				<td>Password*</td>
				<td>:</td>
				<td><input name="txtPassword" type="password" id="txtPassword" size="30"> </td>
			</tr>
			<tr>
				<td>Konfirmasi Password* </td>
				<td>:</td>
				<td><input name="txtConfirmPassword" type="password" id="txtConfirmPassword" size="30"></td>
			</tr>
			<tr>
				<td>Nama Lengkap* </td>
				<td>:</td>
				<td><input name="txtFullName" type="text" id="txtFullName" maxlength="100" size="30"></td>
			</tr>
			<tr>
				<td>NIP </td>
				<td>:</td>
				<td><input name="txtNip" type="text" id="txtNip" maxlength="20" size="30"></td>
			</tr>
			<tr>
				<td>Bagian </td>
				<td>:</td>
				<td><input name="txtBagian" type="text" id="txtBagian" maxlength="50" size="30"></td>
			</tr>
			<tr>
				<td>Jabatan </td>
				<td>:</td>
				<td><input name="txtJabatan" type="text" id="txtJabatan" maxlength="50" size="30"></td>
			</tr>
			<tr>
				<td>Administrator</td>
				<td>:</td>
				<td><input name="chkAdministrator" type="checkbox" id="chkAdministrator" value="1" style="border:none" onClick="cekMenuAll(document.frm['chkMenu[]'],document.frm.chkAdministrator)" />
				<label for="chkAdministrator">Ya</label></td>
			</tr>
			<tr>
				<td>Aktif </td>
				<td>:</td>
				<td><input name="chkActive" type="checkbox" id="chkActive" value="1" checked style="border:none" />
				<label for="chkActive">Ya</label></td>
			</tr>
			<tr>
				<td valign="top">Kontrol Akses Pengguna </td>
				<td valign="top">:</td>
				<td>
					<table cellpadding="0" cellspacing="0" border="0">
					<?=$menu->checkBoxTree()?>
					</table>
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
					<input type="button" class="button" value="Batal" onClick="location.href='?mod=usermgnt&cmd=index';">
				</td>
			</tr>
		</table>
		</form>
		</td>
	</tr>
	</tbody>
</table>
<script>
	document.frm.txtUserName.focus();
</script>