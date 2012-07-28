<?php
class Logger {
	var $conn;
	function Logger() {
		global $oDb;
		$this->conn = &$oDb;
	}
	function logMsg($userName, $message) {
		$ip = $_SERVER['REMOTE_ADDR'];
		$sql = "
			INSERT INTO tlog (log_date, log_ip, log_user, log_desc)
			VALUES (NOW(), ?, ?, ?)
		";
		$rs = $this->conn->execute($sql, array($ip, $userName, $message));
	}
}
?>