<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$config['site_title']?></title>
<link href="<?=$config['base_url']?>/inc/style.css" rel="stylesheet" type="text/css">
<script>
	if(window.parent.name=='oFrame')window.parent.location='login.php';
		
	function checkForm(f) {
		if (f.txtUserName.value == "") {
			alert ("Harap mengisi Username dengan benar");
			f.txtUserName.focus();
			return false;
		}
		else if (f.txtPassword.value == "") {
			alert ("Harap mengisi Password dengan benar")
			f.txtPassword.focus();
			return false;
		}
		else {
			return true;
		}
	}
</script>
<style type="text/css">
<!--
body {
	margin:0px;
}
-->
</style>
</head>
<body onload="document.frmLogin.txtUserName.focus();">
	<table width="100%" height="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="middle" align="center">