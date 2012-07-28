<?php

define("PATTERN_USERNAME", '/^\w{3,}$/'); // minimal 3 chars
define("PATTERN_EMAIL", "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/");
define("PATTERN_URL", '/^http:\/\//');
define("PATTERN_VALID_PASSWORD", '/.{4,}/');

class Validator {
	function Validator() {
	}

	function isEmail($s) {
		return preg_match(PATTERN_EMAIL, $s);
	}

	function isNumber($s) {
		return preg_match("/^\d+$/", $s);
	}

	function isUsername($s) {
		return preg_match(PATTERN_USERNAME, $s);
	}

	function isBlank($s) {
		return ($s == '');
	}

	function isValidUrl($s) {
		return preg_match(PATTERN_URL, $s);
	}

	function isValidPassword($s) {
		return preg_match(PATTERN_VALID_PASSWORD, $s);
	}
}

?>