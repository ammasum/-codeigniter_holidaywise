<?php

function string_to_url_form($string){
    $url = '';
	foreach (explode(' ', $string) as $value) {
		$url .= $value . '-';
	}
	$letter_arr = str_split($url);
	foreach ($letter_arr as $key => $value) {
		if(!ctype_alpha($value) && !ctype_digit($value)){
			$url[$key] = '-';
		}
	}
	return strtolower(substr($url, 0, -1));
}