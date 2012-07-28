<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';


$invoice = getData("invoice_no","tbl_bayar_detail","autono",$_GET['id']);
$bulan = getData("bulan","tbl_bayar_detail","autono",$_GET['id']);
$tahun = getData("tahun","tbl_bayar_detail","autono",$_GET['id']);
	
$query = "Delete From tbl_bayar_detail where autono = '$_GET[id]'";
$res = mysql_query($query) or die("$query");

//log
	$logger->logMsg($_SESSION[_SESSION_PREFIX.'user_name'], sprintf("User '%s' Menghapus Data Detail Pembayaran dengan No Invoice '%s' untuk Bulan '%s' Tahun '%s'.", $_SESSION[_SESSION_PREFIX.'user_name'],$invoice,$bulan,$tahun));
?>
<script language="javascript">
	history.back();
</script>