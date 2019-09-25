<?php
function num_to_month($num){
	$eng_months = array(
		'Jan',
		'Feb',
		'Mar',
		'Apr',
		'May',
		'Jun',
		'Jul',
		'Aug',
		'Sep',
		'Oct',
		'Nov',
		'Dec'
	);
	return $eng_months[(int)$num - 1];
}