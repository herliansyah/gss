<?php

require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

//$session->requireLogin('galery');
$sql = "UPDATE tbl_tarif SET tarif= ? WHERE id = ?";
$rs = $oDb->Execute($sql, 
				array($_POST['txttarif'],$_POST['hId']
				)
			);	
//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Mengubah Data Tarif '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txttarif']));	
showSuccessJs('Data berhasil disimpan','../?mod=tarif&cmd=index');
exit;

?>
