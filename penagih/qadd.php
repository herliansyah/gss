<?php

require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

//$session->requireLogin('galery');
$sql = "INSERT INTO tbl_penagih (penagih) 
				VALUES (?)";
$rs = $oDb->Execute($sql, 
				array($_POST['txtpenagih']
				)
			);	
//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menambah Data Penagih a/n '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txtpenagih']));
showSuccessJs('Data berhasil disimpan','../?mod=penagih&cmd=index');
exit;

?>
