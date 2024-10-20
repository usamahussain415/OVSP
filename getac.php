<?php
		
if (isset($_GET['vc']) && !empty($_GET['vc'])) {
	
	include 'admin/include/global.php';
	include 'admin/include/function.php';
	
	$data = getDeviceAcSn($_GET['vc']);
	
	echo $data[0]['ac'].$data[0]['sn'];
	
}

?>