<?php
class FormValidator {
	
	// private vars
	private $_error_list			= Array();
	
	public function __construct () {
		
	}
	
	public function isEmpty ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		if (empty($value)) {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
		else
			return true;
	}

	public function isString ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		if (!is_string($value)) {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
		else
			return true;
	}

	public function isAlpha ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		$pattern = "/^[a-zA-Z]+$/";
		if (preg_match($pattern, $value))
			return true;
		else {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
	}

	public function isAlphaNumeric ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		$pattern = "/^[a-zA-Z0-9]+$/";
		if (preg_match($pattern, $value))
			return true;
		else {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
	}

	public function isNumeric ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		if (!is_numeric($value)) {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
		else
			return true;
	}
	
	public function isInteger ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		if (!is_integer($value)) {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
		else
			return true;
	}

	public function isFloat ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		if (!is_float($value)) {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
		else
			return true;
	}

	public function isInRange ($field_name, $min, $max, $error_msg) {
		$value = $this->getValue($field_name);
		if (!is_numeric($value) || $value < $min || $value > $max) {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
		else
			return true;
	}

	public function isEmail ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		$pattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
		if (preg_match($pattern, $value))
			return true;
		else {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
	}

	public function isPhone ($field_name, $error_msg) {
		$value = $this->getValue($field_name);
		$pattern = "/^([0-9]( |-)?)?(\(?[0-9]{3}\)?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{7})$/";
		if (preg_match($pattern, $value))
			return true;
		else {
			$this->error_list[] = array('field' => $field_name, 'value' => $value, 'msg' => $error_msg);
			return false;
		}
	}

	public function isError () {

	}

	public function getErrorList () {

	}

	public function resetErrorList () {

	}

	private function getValue($field_name) {
		return $_POST[$field_name];
	}
}
?>
