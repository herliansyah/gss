<?php
require_once 'config.inc.php';
require_once $config['lib_dir'].'/common.php';
require_once $config['lib_dir'].'/class.uservalidator.php';

$userName = isset($_POST['txtUserName']) ? $_POST['txtUserName'] : '';
$userPass = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';


// validate user login
$userAcc = new UserValidator();
if ($userAcc->isValidLogin($userName, $userPass)) {
	$loginStatus = $session->doLogin($userName, $userPass);
	if ($loginStatus) {
		goUrlJs($config['base_url']);
		exit;
	}
	else {
		showErrorJs ("Error pada saat login");
	}
}
else {
	showErrorJs ("Proses login tidak berhasil dilakukan.Harap mengisi User Name atau Password dengan benar");
}

?>
