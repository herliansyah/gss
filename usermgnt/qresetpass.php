<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/common.php';

$session->requireLogin('usermgnt');

$new = isset($_POST['txtNewPass']) && trim($_POST['txtNewPass'])!='' ? $_POST['txtNewPass'] : '';
$confirm = isset($_POST['txtConfirmPass']) && trim($_POST['txtConfirmPass'])!='' ? $_POST['txtConfirmPass'] : '';
$userName = isset($_POST['hUserName']) && trim($_POST['hUserName'])!='' ? $_POST['hUserName'] : '';

if ($new=='' || $confirm=='') {
	showErrorJs('Harap mengisi semua fields yang diperlukan.');
	exit;
}
if ($new != $confirm) {
	showErrorJs('Password dan konfirmasi password baru Anda tidak sama satu sama lain.');
	exit;
}

$hashPassword = md5(_VKEY.$userName.$new);

$sql = "UPDATE tuser SET user_passwd = ?,modified_on = NOW(),modified_by = ? WHERE user_name = ?";
$rs = $oDb->execute($sql, array($hashPassword, $session->userName, $userName));

showSuccessJs('Passowrd berhasil diganti',"../?mod=usermgnt&cmd=index");
exit;
?>
