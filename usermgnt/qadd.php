<?php
require_once '../config.inc.php';
require_once $config['lib_dir'].'/class.session.php';
require_once $config['lib_dir'].'/class.validator.php';
include_once $config['lib_dir'].'/common.php';

$session->requireLogin('usermgnt');

// check if user already exist
$sql = "SELECT user_name FROM tuser WHERE user_name = ?";
$rs = $oDb->Execute($sql, array($_POST['txtUserName']) );

if ($rs->RecordCount()) {
	showErrorJs('Username sudah terdaftar!');
	exit;
}
else {
	$val = new Validator();
	if (!$val->isUsername($_POST['txtUserName'])) {
		showErrorJs('Masukkan nama user yang valid. Karakter yang valid adalah: A-Z atau a-z atau 0-9 atau _. Panjang minimal nama user adalah 3 karakter.');
		exit;
	}
	else if (!$val->isValidPassword($_POST['txtPassword'])) {
		showErrorJs('Masukkan password minimal 4 karakter.');
		exit;
	}
	
	$password = MD5(_VKEY.$_POST['txtUserName'].$_POST['txtPassword']);
	$active = 'N';
	if (!empty($_POST['chkActive']) && $_POST['chkActive'] == 1) {
		$active = 'Y';
	}
	$administrator = 'N';
	if (!empty($_POST['chkAdministrator']) && $_POST['chkAdministrator'] == 1) {
		$administrator = 'Y';
	}

	$sql = "INSERT INTO tuser (user_name, user_passwd, full_name,nip,jabatan,bagian,exclusive, active, created_on,created_by) 
					VALUES (?,?,?,?,?,?,?,?,NOW(),?)";
	$rs = $oDb->Execute($sql, 
					array($_POST['txtUserName'],$password,$_POST['txtFullName'],$_POST['txtNip'],$_POST['txtJabatan'],$_POST['txtBagian'],$administrator,$active,$session->userName)
				);
	
	$arMenuSelected = $_POST['chkMenu'];
	if (is_array($arMenuSelected) && count($arMenuSelected)) {
		$rs = $oDb->execute("CREATE TEMPORARY TABLE tmp_tuser_menu (menu_id int(12), menu_code varchar(32))");

		$sqlInsert = "INSERT INTO tmp_tuser_menu (menu_id, menu_code) VALUES (?,?)";
		foreach ($arMenuSelected as $menuId) {
			$sqlMenuCode = "SELECT menu_code FROM tmenu WHERE menu_id = ?";
			$rsMenuCode = $oDb->execute($sqlMenuCode, array($menuId));
			$menuCode = md5(_VKEY.$_POST['txtUserName'].$rsMenuCode->fields['menu_code']);
			$rs = $oDb->execute($sqlInsert, array($menuId, $menuCode) );
		}
		$sql = "SELECT DISTINCT parent_id FROM tmenu INNER JOIN tmp_tuser_menu ON tmenu.menu_id = tmp_tuser_menu.menu_id";
		$rs = $oDb->execute($sql);
		while (!$rs->EOF) {
			$sqlMenuCode = "SELECT menu_code FROM tmenu WHERE menu_id = ?";
			$rsMenuCode = $oDb->execute($sqlMenuCode, array($rs->fields['parent_id']));
			$menuCode = md5(_VKEY.$_POST['txtUserName'].$rsMenuCode->fields['menu_code']);
			
			$status = $oDb->execute($sqlInsert, array($rs->fields['parent_id'], $menuCode) );
			$rs->moveNext();
		}
		
		$sql = "
			INSERT INTO tuser_menu (user_name, menu_code)
				SELECT ?, menu_code
				FROM tmp_tuser_menu
		";
		$rs = $oDb->execute($sql, array($_POST['txtUserName']));
	}
	
	showSuccessJs('Data berhasil disimpan','../?mod=usermgnt&cmd=index');
	exit;
}
?>
