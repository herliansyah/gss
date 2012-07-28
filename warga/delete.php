<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('warga');

$nama = getData("nama","tbl_warga","id",$_GET['id']);

$sql = "DELETE FROM tbl_warga WHERE id = ?";
$rs = $oDb->Execute($sql, array($_GET['id']));
if ($oDb->Affected_Rows()) {
	
	//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menghapus Data warga a/n '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$nama));

	showSuccessJs("Data berhasil dihapus.", '../?mod=warga&cmd=index');
	exit;
}
else {
	die("Error sewaktu menghapus data");
}
?>
