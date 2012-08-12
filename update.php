<?php

require_once 'config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
include_once $config['lib_dir'].'/common.php';

//=============== UPDATE MODULE ============================================================================//
//untuk update DB
$q = mysql_query("ALTER TABLE `tbl_bayar_detail` ADD `id_warga` int NOT NULL AFTER `invoice_no`");

$sqlcek = "select count(menu_name) as jum from tmenu where menu_name = 'Laporan Log'";
$rescek = mysql_query($sqlcek);
$rowcek = mysql_fetch_array($rescek);
$jum 	= $rowcek['jum'];

if($jum < 1){
	//insert new menu
	$sqln = "INSERT INTO tmenu (menu_name,parent_id,menu_code,url,ordering) VALUES ('Laporan Log','163','179','?mod=lap_log&cmd=index','6')";
	$resn = mysql_query($sqln);
}

//update tbl_bayardetail yg belim mempunyai id warga
$sqlu = "select * from tbl_bayar_detail where id_warga = '' or id_warga = '0'";
$resu = mysql_query($sqlu);
while($rowu = mysql_fetch_array($resu)){
	$sqlup = "select * from tbl_pembayaran_ipl where invoice_no = '$rowu[invoice_no]'";
	$resup = mysql_query($sqlup);
	$rowup = mysql_fetch_array($resup);
	$idwarga = $rowup['id_warga'];
	
	$sqlup2 = "update tbl_bayar_detail set id_warga = '$rowup[id_warga]' where invoice_no = '$rowu[invoice_no]'";
	$resup2 = mysql_query($sqlup2);

}

$sqld = "delete from tbl_bayar_detail where id_warga not in (select id from tbl_warga)";
$resd = mysql_query($sqld);
//=================END UPDATE MODULE =======================================================================//