<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('Penjualan');

$invoice = getData("invoice_no","tbl_pembayaran_ipl","id",$_GET['id']);

//delete sql detail
$sqld = "delete from tbl_bayar_detail where invoice_no =".$_GET['id'];
$resd = mysql_query($sqld);

$sql = "DELETE FROM tbl_pembayaran_ipl WHERE invoice_no = ".$_GET['id'];
$res = mysql_query($sql);
//log
$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menghapus Data Pembayaran dengan no Invoice '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$invoice));
showSuccessJs("Data berhasil dihapus.", '../?mod=pembayaran_ipl&cmd=index');
?>
