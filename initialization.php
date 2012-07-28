<?php 
require_once $config['lib_dir']."/dbconn.php";
require_once $config['lib_dir']."/class.default.php";
$oDefaultUser = new DefaultUser();
$oDefaultUser->createDefaultUser();

require_once $config['lib_dir'].'/class.logger.php';
$logger = new Logger();

require_once $config['lib_dir'].'/class.session.php';
$session = new Session();
?>