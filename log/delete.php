<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('log');

foreach($_POST['chkCheck'] As $key => $val){
	$sql = "DELETE FROM tlog WHERE log_id = ?";
	$rs = $oDb->Execute($sql, array($val) );
}

showSuccessJs('Data berhasil dihapus','../?mod=log&cmd=index');
?>
