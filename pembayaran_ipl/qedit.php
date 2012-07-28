<?php

require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

$tgl = calToMysqlDate($_POST['txtTgl']);

$id_tarif = getData("id_tarif", "tbl_warga", "id",$_POST['txtWarga']);

//$session->requireLogin('galery');
$sql = "UPDATE tbl_pembayaran_ipl 
		SET 
			invoice_no = ?,
			tanggal = ?,
			id_warga = ?,
			id_penagih = ?,
			id_bendahara = ?,
			id_tarif = ?
		WHERE id = ?";
$rs = $oDb->Execute($sql, 
				array(
					$_POST['txtinvoice_no'],
					$tgl,
					$_POST['txtWarga'],
					$_POST['txtPenagih'],
					$_POST['txtBendahara'],
					$id_tarif,
					$_POST['hId']
				)
			);	

//log
$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Mengubah Data Pembayaran dengan No Invoice '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$_POST['txtinvoice_no']));
showSuccessJs('Data berhasil disimpan','../?mod=pembayaran_ipl&cmd=index');
exit;

?>
