<?php
ini_set("display_errors",0);
session_start();

$config['site_title']  = 'GSS - Aplikasi Warga Lingkungan';
$config['site_footer'] = "Copyright ". date('Y') ." - All Right Reserved";
$config['secret_key']  = 'gss';

$config['dbhost'] = 'localhost';
$config['dbuser'] = 'root';
$config['dbpass'] = '';
$config['dbname'] = 'db_gss';
$config['dbtype'] = 'mysql';

$config['base_dir'] = str_replace('\\','/',dirname(__FILE__));
$config['lib_dir']  = $config['base_dir'].'/lib';
$config['inc_dir']  = $config['base_dir'].'/inc';
$config['img_dir']  = $config['base_dir'].'/img';
$config['base_url'] = "http://".$_SERVER['SERVER_NAME']."/gss";
$config['img_url']  = $config['base_url'].'/img';

$config['exclude_menu_check'] = array();

set_magic_quotes_runtime(0);

require_once "constant.php";
require_once "initialization.php";

//$oDb->debug=true;
?>
