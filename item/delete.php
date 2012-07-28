<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('Item');

$sql = "DELETE FROM tbl_barang WHERE id = ?";
$rs = $oDb->Execute($sql, array($_GET['id']));
if ($oDb->Affected_Rows()) {
	showSuccessJs("Data berhasil dihapus.", '../?mod=item&cmd=index');
	exit;
}
else {
	die("Error sewaktu menghapus data");
}
?>
