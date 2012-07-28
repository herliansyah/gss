<?php

require_once $config['lib_dir'].'/class.validator.php';

class UserValidator extends Validator {
	var $conn;
	function UserValidator() {
		global $oDb;
		$this->conn =& $oDb;
	}
	function isExist($user_name) {
		$sql = "SELECT user_name FROM tuser WHERE user_name = ?";
		$rs = $this->conn->execute($sql, array($user_name));
		return $rs->recordCount();
	}
	function isActive($user_name) {
		$sql = "SELECT user_name FROM tuser WHERE user_name = ? AND active = ?";
		$rs = $this->conn->execute($sql, array($user_name, _STATUS_YES));
		return $rs->recordCount();
	}
	function isExclusive($user_name){
		$sql = "SELECT user_name FROM tuser WHERE user_name = ? AND exclusive = ?";
		$rs = $this->conn->execute($sql, array($user_name, _STATUS_YES));
		return $rs->recordCount();	
	}
	function isValidLogin($user_name, $password) {
		$md5Pass = MD5(_VKEY.$user_name.$password);
		$sql = "SELECT user_name FROM tuser WHERE user_name = ? AND user_passwd = ? AND active = ?";
		$rs = $this->conn->execute($sql, array($user_name, $md5Pass, _STATUS_YES));
		return $rs->recordCount();
	}
}

?>