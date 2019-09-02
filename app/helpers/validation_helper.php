<?php

/* The validation feature is disabled by default
 * More validation will be added upon request
 * To activate it you need to include it to the bootstrap.php file
 * e.g: include 'validation_helper.php';
 * Good Luck
 */

	// validating email
	function ch_email_val($value){
		$value = trim($value);
		if(!empty($value)){
			$value = filter_var($value, FILTER_VALIDATE_EMAIL);
			return $value;
		} 
		else{
			return false;
		}
	}

	// sanitize email
/**
 * @param $value
 * @return bool|mixed|string
 */
function ch_email_san($value){
		$value =trim($value);
		if (!empty($value)) {
			$value = filter_var($value, FILTER_SANITIZE_EMAIL);
			return $value;
		}
		else{
			return false;
		}
	}

	// sanitize input array
	function ch_arr_san($arr){
		if(!empty($arr)){
			$arr = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			return $arr;
		}
		else{
			return false;
		}
	}

	//sanitize value as string
	function ch_str_san($str){
		if (!empty($str)) {
			$str = filter_var($str, FILTER_SANITIZE_STRING);
			return $str;
		}else{
			return false;
		}
	}

	//hashing passwords the default way
	function ch_pwd_hash($pwd){
		if(!empty($pwd)){
			$pwd = password_hash($pwd, PASSWORD_DEFAULT);
			return $pwd;
		}
		else{
			return false;
		}
	}

	//hashing password the bcrypt way
	function ch_pwd($pwd){
		if(!empty($pwd)){
			$pwd = password_hash($pwd, PASSWORD_BCRYPT);
			return $pwd;
		}
		else{
			return false;
		}
	}

	//dehashing password
	function ch_dehash($pwd, $sim_pwd){
		$res = password_verify($pwd, $sim_pwd);
		if($res){
			return true;
		}
		else{
			return false;
		}
	}