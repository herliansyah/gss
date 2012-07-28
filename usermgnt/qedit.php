<?php
require_once '../config.inc.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('usermgnt');

$active = 'N';
if (!empty($_POST['chkActive']) && $_POST['chkActive'] == 1) {
	$active = 'Y';
}
$administrator = 'N';
if (!empty($_POST['chkAdministrator']) && $_POST['chkAdministrator'] == 1) {
	$administrator = 'Y';
}

$sql = "UPDATE tuser SET full_name = ?,nip = ?,bagian = ?,jabatan = ?,exclusive = ?, active = ?,modified_on=NOW(),modified_by = ? WHERE user_name = ?";
$rs = $oDb->execute($sql, array($_POST['txtFullName'],$_POST['txtNip'],$_POST['txtBagian'],$_POST['txtJabatan'],$administrator,$active,$session->userName,$_POST['hUserName']) );


	$sql = "DELETE FROM tuser_menu WHERE user_name = ?";
	$rs = $oDb->execute($sql, array($_POST['hUserName']));
	$arMenuSelected = $_POST['chkMenu'];
	if (is_array($arMenuSelected) && count($arMenuSelected)) {
		$rs = $oDb->execute("CREATE TEMPORARY TABLE tmp_tuser_menu (menu_id int(3), menu_code varchar(32))");
		
		$sqlInsert = "INSERT INTO tmp_tuser_menu (menu_id, menu_code) VALUES (?,?)";
		foreach ($arMenuSelected as $menuId) {
			$sqlMenuCode = "SELECT menu_code FROM tmenu WHERE menu_id = ?";
			$rsMenuCode = $oDb->execute($sqlMenuCode, array($menuId));
			$menuCode = md5(_VKEY.$_POST['hUserName'].$rsMenuCode->fields['menu_code']);
			$rs = $oDb->execute($sqlInsert, array($menuId, $menuCode) );
		}

		$sql = "SELECT DISTINCT parent_id FROM tmenu INNER JOIN tmp_tuser_menu ON tmenu.menu_id = tmp_tuser_menu.menu_id";
		$rs = $oDb->execute($sql);
		while (!$rs->EOF) {
			$sqlMenuCode = "SELECT menu_code FROM tmenu WHERE menu_id = ?";
			$rsMenuCode = $oDb->execute($sqlMenuCode, array($rs->fields['parent_id']));
			$menuCode = md5(_VKEY.$_POST['hUserName'].$rsMenuCode->fields['menu_code']);
			
			$status = $oDb->execute($sqlInsert, array($rs->fields['parent_id'], $menuCode) );
			$rs->moveNext();
		}
		
		$sql = "
			INSERT INTO tuser_menu (user_name, menu_code)
				SELECT ?, menu_code
				FROM tmp_tuser_menu
		";
		$rs = $oDb->execute($sql, array($_POST['hUserName']));
	}


	showSuccessJs('Data berhasil disimpan','../?mod=usermgnt&cmd=index');
	exit;
?>
