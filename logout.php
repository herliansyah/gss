<?php
require_once 'config.inc.php';
require_once $config['lib_dir'].'/common.php';
$session->doLogout(true);
showSuccessJs("Logout berhasil dilakukan", $config['base_url']);

?>
