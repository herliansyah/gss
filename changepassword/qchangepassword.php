<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/common.php';
require_once $config['lib_dir'].'/class.user.php';

$session->requireLogin('changepassword');

$current = isset($_POST['txtCurrentPass']) && trim($_POST['txtCurrentPass'])!='' ? $_POST['txtCurrentPass'] : '';
$new = isset($_POST['txtNewPass']) && trim($_POST['txtNewPass'])!='' ? $_POST['txtNewPass'] : '';
$confirm = isset($_POST['txtConfirmPass']) && trim($_POST['txtConfirmPass'])!='' ? $_POST['txtConfirmPass'] : '';

if ($current=='' || $new=='' || $confirm=='') {
	showErrorJs('Harap mengisi semua fields yang diperlukan.');
	exit;
}
if ($new != $confirm) {
	showErrorJs('Password dan konfirmasi password baru Anda tidak sama satu sama lain.');
	exit;
}

$user = new User($session->userName);
$hashPassword = md5(_VKEY.$session->userName.$new);

if ($user->data['user_passwd'] != md5(_VKEY.$session->userName.$current)) {
	showErrorJs('Password lama yang Anda masukkan salah');
	exit;
}
else {
	$sql = "UPDATE tuser SET user_passwd = ?, modified_on= NOW(),modified_by = ? WHERE user_name = ?";
	$rs = $oDb->execute($sql, array($hashPassword,$session->userName ,$user->userName));
	showSuccessJs('Password telah diganti','../?mod=changepassword&cmd=index');
	exit;
}
?>
