<?php defined("_VALID_REQUEST") or die("Invalid Request"); ?>
<script>
function checkForm(f) {
	if (trim(f.txtCurrentPass.value) == '') {
		alert('Harap mengisi password sekarang');
		f.txtCurrentPass.select();
	}
	else if (trim(f.txtNewPass.value) == '') {
		alert('Harap mengisi password baru');
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
<div id="sectionHeader">Ganti Password</div>
<form name="frm" method="post" action="changepassword/qchangepassword.php" onSubmit="return checkForm(this)">
  <table border="0" cellpadding="3" cellspacing="0" class="checkbox" id="b2">
    <thead>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Password Lama </td>
        <td>:</td>
        <td><input name="txtCurrentPass" type="password" id="txtCurrentPass"></td>
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
        <td><input type="submit" class="button" value="Simpan">
        </td>
      </tr>
    </tbody>
  </table>
</form>
<script>
	document.frm.txtCurrentPass.focus();
</script>