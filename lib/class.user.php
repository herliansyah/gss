<?php
require_once $config['lib_dir'].'/dbconn.php';

class User {
	var $data;
	var $userName;
	var $authMenuCodes; // array()
	
	function User($userName) {
		$this->userName = $userName;
		$this->_fetchData(); // retrieve every fields in tuser table for specified user
	}
	
	function _fetchData() {
		global $oDb;
		$oDb->setFetchMode(ADODB_FETCH_ASSOC);

		$sql = "
			SELECT tuser.*
			FROM tuser
			WHERE tuser.user_name = ?
		";
		$rs = $oDb->execute($sql, array($this->userName) );
		if ($rs->recordCount()) {
			$this->data = $rs->fields;
		}
		// top Menu granted
		$sql = "
			SELECT menu_code
			FROM tuser_menu 
			WHERE user_name = ?
		";
		$rs = $oDb->execute($sql, array($this->userName));
		$arMenuCode = array();
		while (!$rs->EOF) {
			array_push($arMenuCode, $rs->fields['menu_code']);
			$rs->moveNext();
		}
		$this->authMenuCodes = $arMenuCode;
	}
}
?>
