<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('galery');

$code = isset($_GET['code']) && $_GET['code']!='' ? $_GET['code'] : '';

if ($code == '') {
	showErrorJs("Tidak bisa menghapus data.");
	exit;
}

$nama = getData("penagih","tbl_penagih","id",$code);

$sql = "DELETE FROM tbl_penagih WHERE id = ?";
$rs = $oDb->Execute($sql, array($code) );
if ($oDb->Affected_Rows()) {
	//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menghapus Data Penagih a/n '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$nama));
	showSuccessJs("Data berhasil dihapus.", '../?mod=penagih&cmd=index');
	exit;
}
else {
	die("Error sewaktu menghapus data");
}
?>
