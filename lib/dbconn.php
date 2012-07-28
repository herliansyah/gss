<?php
$old_level = error_reporting(0);
require_once $config['lib_dir'].'/adodb/adodb.inc.php';

$oDb = ADONewConnection($config['dbtype']);
$oDb->Connect($config['dbhost'], $config['dbuser'], $config['dbpass'], $config['dbname']);

if (!$oDb->IsConnected()) {
	die("Database connection error ->".$oDb->errorMsg());
	exit;
}
else {
	$oDb->SetFetchMode(ADODB_FETCH_BOTH);
	error_reporting($old_level);
}

function _db_substr_replace($string, $replacement, $start) {
	$ret = substr($string, 0, $start).$replacement.substr($string, $start+1);
	return $ret;
}
function sqlNoBinding($sql, $inputarr) {
	global $oDb;
	foreach($inputarr as $v) {
		if (is_string($v)) {
			$sql = _db_substr_replace($sql, $oDb->qstr($v), strpos($sql,'?'));
		} else if (is_integer($v)) {
			$sql = _db_substr_replace($sql, $v, strpos($sql,'?'));
		} else if (is_float($v)) {
			$sql = _db_substr_replace($sql, $v, strpos($sql,'?'));
		} else if (is_bool($v)) {
			$param = (($v)?'1':'0'); 
			$sql = _db_substr_replace($sql, $param, strpos($sql,'?'));
		} else {
			$sql = _db_substr_replace($sql, $oDb->qstr($v), strpos($sql,'?'));
		}
	}
	return $sql;
}

?>