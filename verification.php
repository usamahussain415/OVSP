<?php

if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
	
	include 'admin/include/global.php';
	include 'admin/include/function.php';
	
	$user_id 	= $_GET['user_id'];
	$finger		= getUserFinger($user_id);

	echo "$user_id;".$finger[0]['finger_data'].";SecurityKey;".$time_limit_ver.";".$base_path1."process_verification.php;".$base_path1."getac.php".";extraParams";
		
}

?>