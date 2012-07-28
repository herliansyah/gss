<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/common.php';
require_once $config['lib_dir'].'/class.menutree.php';

$menu_id = empty($_GET['id']) || !is_numeric($_GET['id']) ? 0 : $_GET['id'];
if($menu_id==0){
	showErrorJs('Invalid menu id');
	exit;
}
else{
	$rs = $oDb->execute("SELECT parent_id FROM tmenu WHERE menu_id = ?",array($menu_id));
	if(!$rs->RecordCount()){
		showErrorJs('Invalid menu id');
		exit;
	}
	$pid = $rs->fields['parent_id'];

	$oMenu = new MenuTree($menu_id,'','',0,1,0);
	$sMenuId = implode(",",$oMenu->getDeleteNodes());	
	$oDb->execute("DELETE FROM tmenu WHERE menu_id IN(".$sMenuId.")");
	
	$ordering = 1;
	$rs = $oDb->execute("SELECT menu_id FROM tmenu WHERE parent_id = ? ORDER BY ordering",array($pid));
	while(!$rs->EOF){
		$oDb->execute("UPDATE tmenu SET ordering = ? WHERE menu_id = ?",array($ordering,$rs->fields['menu_id']));
		$ordering = $ordering + 1;
		$rs->MoveNext();
	}
	
	showSuccessJs('Data successfully deleted','index.php');
}
?>
