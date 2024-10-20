<?php
	
if (isset($_GET['msg']) && !empty($_GET['msg'])) {
	
	echo $_GET['msg'];

} elseif (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
	
	include 'admin/include/global.php';
	include 'admin/include/function.php';
	
	$user_id	= $_GET['user_id'];
	
	echo $user_id;
	
} else {
		
	$msg = "Parameter invalid..";
	
	echo "$msg";
	
}

	
?>