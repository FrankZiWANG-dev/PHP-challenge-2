<?php
	
	function filled_out($form_vars) {
		//check if each form field contains a value
		foreach ($form_vars as $key => $value) {
			if (!isset($key) || ($value == '')) return false;
		}
		return true;
	}
	
	function valid_email($email)
	{
		//check if email address is valid
		$subject = $email;
		$pattern = '/^[a-zA-Z0-9 \._\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*\.)+[a-zA-Z]+$/';
		if (!preg_match($pattern,$email)) return false;
		return true;
	}
	
	function alpha ($string) {
		$subject = $string;
		$pattern1 = '/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)+$/';
		$pattern2 = '/^[a-zA-Z0-9 ]+$/';
		return ( preg_match($pattern1,$subject) || preg_match($pattern2,$subject) );
	}
	
	function alpha_num ($string) {
		$subject = $string;
		$pattern1 = '/^[a-zA-Z0-9]+( [a-zA-Z0-9]+)+$/';
		$pattern2 = '/^[a-zA-Z0-9 ]+$/';
		//return ( preg_match($pattern1,$subject) || preg_match($pattern2,$subject) );
		return ctype_alnum($string);
	}
	
	function invoicePattern ($string) {
		$subject = $string;
		$pattern = '/^[F][0-9]{5}$/';
		return preg_match($pattern,$subject);
	}
	function vatPattern ($string) {
		$subject = $string;
		$pattern = '/^[0-9]{9}$/';
		return preg_match($pattern,$subject);
	}
	
	
	function html($string) {
		$string = trim($string); // remove spaces
		$string = stripcslashes($string); //remove backslash
		$string = htmlspecialchars($string); //Convert "<"  and ">" to HTML entities:
		return htmlentities($string, ENT_QUOTES, 'ISO-8859-1'); //Convert some characters to HTML entities
	}
