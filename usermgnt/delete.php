<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('usermgnt');

$user_name = isset($_GET['code']) && $_GET['code']!='' ? $_GET['code'] : '';

if ($user_name == '') {
	showErrorJs("Tidak bisa menghapus user.");
	exit;
}

if ($user_name == _USER_DEFAULT_ID) {
	showErrorJs("Tidak bisa menghapus default user.");
	exit;
}

if ($user_name == $session->userName) {
	showErrorJs("Tidak bisa menghapus user yang sedang login.");
	exit;
}

$sql = "DELETE FROM tuser WHERE user_name = ?";
$rs = $oDb->Execute($sql, array($user_name) );
if ($oDb->Affected_Rows()) {
	$sql = "DELETE FROM tuser_menu WHERE user_name = ?";
	$rs = $oDb->Execute($sql, array($user_name) );
	showSuccessJs("User telah dihapus.", '../?mod=usermgnt&cmd=index');
	exit;
}
else {
	die("Error on deleting user");
}
?>
