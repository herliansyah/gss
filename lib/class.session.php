<?php
require_once $config['lib_dir'].'/class.uservalidator.php';
require_once $config['lib_dir'].'/class.user.php';
require_once $config['lib_dir'].'/common.php';

define("_LOGIN_PAGE", $config['base_url'].'/login.php');

class Session {
	var $userName;
	var $authMenuCodes = array();
	
	function Session() {
		
		$this->userName = isset($_SESSION[_SESSION_PREFIX.'user_name'])? $_SESSION[_SESSION_PREFIX.'user_name']: '';
		$this->authMenuCodes = isset($_SESSION[_SESSION_PREFIX.'authMenuCodes'])? $_SESSION[_SESSION_PREFIX.'authMenuCodes']: '';
	}
	function isLoggedIn() {
		return (trim($this->userName) != '');
	}
	function doLogin($userName, $password) {
		global $oDb;
		global $logger;
		$this->doLogout(false);

		$loginStatus = true;
		$userCheck = new UserValidator();
		if ($userCheck->isValidLogin($userName, $password)) {
			$this->userName = $userName;
			$_SESSION[_SESSION_PREFIX.'user_name'] = $this->userName;

			$oUser = new User($userName);
			$this->authMenuCodes = $oUser->authMenuCodes;
			$_SESSION[_SESSION_PREFIX.'authMenuCodes'] = $this->authMenuCodes;

			$logger->logMsg($this->userName, sprintf("User '%s' login dari host '%s'", $this->userName, $_SERVER['REMOTE_ADDR']));
		}
		else {
			$loginStatus = false;
		}
		return $loginStatus;
	}
	
	function doLogout($log=true) {
		global $logger;
		if ($log) {
			$logger->logMsg($this->userName, sprintf("User '%s' logout.", $this->userName));
		}
		unset($_SESSION[_SESSION_PREFIX.'user_name']);
		unset($_SESSION[_SESSION_PREFIX.'authMenuCodes']);
		$this->userName = '';
		$this->authMenuCodes = array();
	}

	function isAuthorized($menuCode='') {
			$userCheck = new UserValidator();
			$encryptedMenuCode = md5(_VKEY . $this->userName . $menuCode);
			$authStatus = false;
			if ($userCheck->isExclusive($this->userName) || ($menuCode!='' && in_array($encryptedMenuCode, $this->authMenuCodes))) {
				$authStatus = true;
			}
			return $authStatus;
	}
	
	function requireLogin($menuCode='') {
		
		if ( !$this->isLoggedIn()){ 
			goUrlJs(_LOGIN_PAGE);
			exit();
		}
		else if ($menuCode != '' && $this->userName != _USER_DEFAULT_ID && !$this->isAuthorized($menuCode)) {
			showErrorJs('Anda tidak mempunyai hak akses untuk halaman ini');
			exit;
		}		
	}
}

?>