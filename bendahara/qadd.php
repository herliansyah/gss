<?php

require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

//$session->requireLogin('galery');
$sql = "INSERT INTO tbl_bendahara (bendahara) 
				VALUES (?)";
$rs = $oDb->Execute($sql, 
				array($_POST['txtBendahara']
				)
			);	
//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menambah Data Bendahara a/n '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txtBendahara']));
showSuccessJs('Data berhasil disimpan','../?mod=bendahara&cmd=index');
exit;

?>
