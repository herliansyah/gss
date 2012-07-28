<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/common.php';

if(empty($_POST['hId'])){
	showErrorJs('Invalid menu id');
	exit;
}
/*
$sql = "SELECT menu_name FROM tmenu WHERE (menu_name <> '|' AND menu_name <> '-') AND menu_name = ? AND menu_id <> ?";
$rs = $oDb->Execute($sql, array($_POST['txtMenuName'],$_POST['hId']));

if ($rs->RecordCount()) {
	showErrorJs('Menu Name already exist!');
	exit;
}
else {
*/	
	if($_POST['selOrder'] < $_POST['hOriOrder']){
		$oDb->execute("UPDATE tmenu SET ordering=ordering+1 WHERE parent_id = ? AND ordering >= ? AND ordering < ?",
						array($_POST['hParentId'],$_POST['selOrder'],$_POST['hOriOrder']));
	}
	else if($_POST['selOrder'] > $_POST['hOriOrder']){
		$oDb->execute("UPDATE tmenu SET ordering=ordering-1 WHERE parent_id = ? AND ordering <= ? AND ordering > ?",
						array($_POST['hParentId'],$_POST['selOrder'],$_POST['hOriOrder']));
	}
	
	$sql = "UPDATE tmenu SET 
					menu_name = ?
					,menu_code = ?
					,url = ?
					,ordering = ?  
			WHERE menu_id = ?";
	$oDb->Execute($sql, 
					array(
						$_POST['txtMenuName']
						,(empty($_POST['txtMenuCode'])?$_POST['hId']:$_POST['txtMenuCode'])
						,empty($_POST['txtURL'])?"":$_POST['txtURL']
						,$_POST['selOrder']
						,$_POST['hId']
					)
				);	
	showSuccessJs('Data successfully saved','index.php');
	exit;
//}
?>
