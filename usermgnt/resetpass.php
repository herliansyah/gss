<?php
defined("_VALID_REQUEST") or die("Invalid Request");
require_once 'config.inc.php';

$userName = isset($_GET['id']) && $_GET['id']!='' ? $_GET['id'] : '';
?>
<script>
function checkForm(f) {
	if (trim(f.txtNewPass.value) == '') {
		alert('Masukkan password baru');
		f.txtNewPass.select();
	}
	else if (trim(f.txtNewPass.value) != trim(f.txtConfirmPass.value)) {
		alert ('Password dan konfirmasi password tidak sama.');
		f.txtConfirmPass.focus();
	}
	else if (confirm("Simpan?")) {
		return true;
	}
	return false;
}
</script>

<div id="sectionHeader">Pengguna Aplikasi > Reset Password</div>
<form name="frm" method="post" action="usermgnt/qresetpass.php" onSubmit="return checkForm(this)">
<input type="hidden" name="hUserName" value="<?=$userName?>" />
<table border="0" cellpadding="3" cellspacing="0" id="b2">
	<thead>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		</thead>
		<tbody>
          <tr>
            <td>Username </td>
            <td>:</td>
            <td><?=$userName?></td>
          </tr>
          <tr>
            <td> Password Baru </td>
            <td>:</td>
            <td><input name="txtNewPass" type="password" id="txtNewPass"></td>
          </tr>
          <tr>
            <td>Konfirmasi Password Baru </td>
            <td>:</td>
            <td><input name="txtConfirmPass" type="password" id="txtConfirmPass"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" class="button" value="Submit">
            <input type="button" class="button" value="Cancel" onClick="location='?mod=usermgnt&cmd=index'"/></td>
          </tr>
					</tbody>
  </table>
</form>
<script>
	document.frm.txtNewPass.focus();	
</script>