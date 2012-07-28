<?php

class DefaultUser {
	var $conn;

	function DefaultUser() {
		global $oDb;
		$this->conn =& $oDb;
	}
	function createDefaultUser() {
		$sql = "SELECT 1 FROM tuser WHERE user_name = ?";
		$rs = $this->conn->execute($sql, array(_USER_DEFAULT_ID));
		if (!$rs->recordCount()) {
			$sql = "INSERT INTO tuser (user_name,user_passwd,full_name,exclusive,active,nip,bagian,jabatan,created_on,created_by) 
					VALUES (?,?,?,?,?,?,?,?,NOW(),'_SETUP')";
			$password = md5(_VKEY . _USER_DEFAULT_ID . _USER_DEFAULT_PASSWORD);
			$rs = $this->conn->execute($sql, array(_USER_DEFAULT_ID, $password, 'Administrator',_STATUS_YES,_STATUS_YES,'','',''));
			$sql = "INSERT INTO tuser_menu (user_name, menu_code) SELECT ?, MD5(CONCAT(?,?,menu_code)) FROM tmenu";
			$rs = $this->conn->execute($sql, array(_USER_DEFAULT_ID, _VKEY, _USER_DEFAULT_ID ) );
		}
	}
}

?>
