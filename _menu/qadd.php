<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/common.php';
/*
$sql = "SELECT menu_id FROM tmenu WHERE (menu_name <> '|' AND menu_name <> '-') AND  menu_name = ?";
$rs = $oDb->Execute($sql, array($_POST['txtMenuName']));

if ($rs->RecordCount()) {
	showErrorJs('Menu Name already exist!');
	exit;
}
else {
*/
	if(!empty($_POST['txtMenuCode'])){
		$sql = "SELECT menu_id FROM tmenu WHERE menu_code = ?";
		$rs = $oDb->Execute($sql, array($_POST['txtMenuCode']));
		if($rs->RecordCount()){
			showErrorJs('Menu Code already exist!.Menu Code must be uniq');		
			exit;
		}
	}

	if($_POST['selOrder']<$_POST['hMaxOrder']){
		$oDb->execute("UPDATE tmenu SET ordering=ordering+1 WHERE parent_id = ? AND ordering >= ?",
						array($_POST['hParentId'],$_POST['selOrder']));
	}

	if(empty($_POST['txtMenuCode'])){
		$sql ="SELECT IFNULL(MAX(menu_id),0)+1 AS max_menu FROM tmenu";
		$rs = $oDb->execute($sql);
		$menu_code = $rs->fields['max_menu'];					
	}else{
		$menu_code = $_POST['txtMenuCode'];
	}
	
	
	$sql = "INSERT INTO tmenu (menu_name,parent_id,menu_code,url,ordering) 
					VALUES (?,?,?,?,?)";
	$oDb->Execute($sql, 
					array(
						$_POST['txtMenuName']
						,$_POST['hParentId']
						,$menu_code
						,empty($_POST['txtURL'])?"":$_POST['txtURL']
						,$_POST['selOrder']
					)
				);	
	showSuccessJs('Data successfully saved','index.php');
	exit;
//}
?>
