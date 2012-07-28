<?php

require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

//$session->requireLogin('galery');
$sql = "UPDATE tbl_penagih SET penagih= ? WHERE id = ?";
$rs = $oDb->Execute($sql, 
				array($_POST['txtpenagih'],$_POST['hId']
				)
			);	
//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Mengubah Data Penagih a/n '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txtpenagih']));
showSuccessJs('Data berhasil disimpan','../?mod=penagih&cmd=index');
exit;

?>
